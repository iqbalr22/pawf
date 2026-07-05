from django.contrib.auth import get_user_model
from django.test import TestCase
from django.urls import reverse

from .models import Post


class BlogTests(TestCase):
    @classmethod
    def setUpTestData(cls):
        cls.user = get_user_model().objects.create_user(
            username="testuser", email="test@email.com", password="secret"
        )
        cls.post = Post.objects.create(
            title="A good title",
            body="Nice body content",
            author=cls.user,
        )

    def test_post_model(self):
        self.assertEqual(self.post.title, "A good title")
        self.assertEqual(self.post.body, "Nice body content")
        self.assertEqual(self.post.author.username, "testuser")
        self.assertEqual(str(self.post), "A good title")
        self.assertEqual(self.post.get_absolute_url(), "/post/1/")

    def test_url_exists_at_correct_location_listview(self):
        response = self.client.get("/")
        self.assertEqual(response.status_code, 200)

    def test_url_exists_at_correct_location_detailview(self):
        response = self.client.get("/post/1/")
        self.assertEqual(response.status_code, 200)

    def test_post_listview(self):
        response = self.client.get(reverse("home"))
        self.assertEqual(response.status_code, 200)
        self.assertContains(response, "Nice body content")
        self.assertTemplateUsed(response, "home.html")

    def test_post_detailview(self):
        response = self.client.get(reverse("post_detail", kwargs={"pk": self.post.pk}))
        no_response = self.client.get("/post/100000/")
        self.assertEqual(response.status_code, 200)
        self.assertEqual(no_response.status_code, 404)
        self.assertContains(response, "A good title")
        self.assertTemplateUsed(response, "post_detail.html")

    def test_create_post_requires_login(self):
        response = self.client.get(reverse("post_new"))
        self.assertEqual(response.status_code, 302)

    def test_logged_in_user_can_create_post(self):
        self.client.login(username="testuser", password="secret")
        response = self.client.post(
            reverse("post_new"),
            {"title": "New blog post", "body": "This is a brand new post."},
        )
        self.assertEqual(response.status_code, 302)
        self.assertTrue(Post.objects.filter(title="New blog post").exists())

    def test_user_can_register_account(self):
        response = self.client.post(
            reverse("register"),
            {
                "username": "newuser",
                "password1": "StrongPass123!",
                "password2": "StrongPass123!",
            },
        )
        self.assertEqual(response.status_code, 302)
        self.assertTrue(get_user_model().objects.filter(username="newuser").exists())

    def test_logged_in_author_can_edit_their_post(self):
        self.client.login(username="testuser", password="secret")
        response = self.client.post(
            reverse("post_edit", kwargs={"pk": self.post.pk}),
            {"title": "Updated title", "body": "Updated body content"},
        )
        self.assertEqual(response.status_code, 302)
        self.post.refresh_from_db()
        self.assertEqual(self.post.title, "Updated title")
        self.assertEqual(self.post.body, "Updated body content")

    def test_logged_in_author_can_delete_their_post(self):
        self.client.login(username="testuser", password="secret")
        response = self.client.post(reverse("post_delete", kwargs={"pk": self.post.pk}))
        self.assertEqual(response.status_code, 302)
        self.assertFalse(Post.objects.filter(pk=self.post.pk).exists())


class AdminDashboardTests(TestCase):
    def test_admin_dashboard_has_clickable_links_for_admin_and_users(self):
        admin_user = get_user_model().objects.create_superuser(
            username="adminuser",
            email="admin@example.com",
            password="adminpass123",
        )
        self.client.force_login(admin_user)

        response = self.client.get(reverse("admin:index"))

        self.assertEqual(response.status_code, 200)
        self.assertContains(response, '<a class="hero-card" href="/admin/">')
        self.assertContains(response, '<a class="hero-card" href="/admin/auth/user/">')


class SearchTests(TestCase):
    def setUp(self):
        self.user = get_user_model().objects.create_user(
            username="searcher",
            email="searcher@example.com",
            password="secret123",
        )
        self.post = Post.objects.create(
            title="Django search test",
            body="Isi artikel yang bisa dicari",
            author=self.user,
        )

    def test_search_returns_matching_articles(self):
        response = self.client.get(reverse("home"), {"q": "django"})

        self.assertEqual(response.status_code, 200)
        self.assertContains(response, "Django search test")
        self.assertContains(response, "Hasil pencarian")

    def test_search_with_no_results_shows_empty_state(self):
        response = self.client.get(reverse("home"), {"q": "tidakada"})

        self.assertEqual(response.status_code, 200)
        self.assertContains(response, "Belum ada posting yang sesuai pencarian.")
