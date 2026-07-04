from django.contrib.auth import login
from django.contrib.auth.decorators import login_required
from django.contrib.auth.forms import UserCreationForm
from django.core.paginator import Paginator
from django.db.models import Q
from django.http import HttpResponseForbidden
from django.shortcuts import get_object_or_404, redirect, render

from .forms import PostForm
from .models import Post


def post_list(request):
    query = request.GET.get("q", "").strip()
    posts = Post.objects.all().order_by("-id")

    if query:
        posts = posts.filter(Q(title__icontains=query) | Q(body__icontains=query))

    latest_post = posts.first()

    paginator = Paginator(posts, 4)
    page_number = request.GET.get("page")
    page_obj = paginator.get_page(page_number)

    return render(
        request,
        "home.html",
        {
            "page_obj": page_obj,
            "posts": page_obj.object_list,
            "query": query,
            "total_posts": posts.count(),
            "latest_post": latest_post,
        },
    )


def post_detail(request, pk):
    post = get_object_or_404(Post, pk=pk)
    return render(request, "post_detail.html", {"post": post})


def register(request):
    if request.method == "POST":
        form = UserCreationForm(request.POST)
        if form.is_valid():
            user = form.save()
            login(request, user)
            return redirect("home")
    else:
        form = UserCreationForm()

    return render(request, "registration/register.html", {"form": form})


@login_required
def post_new(request):
    if request.method == "POST":
        form = PostForm(request.POST, request.FILES)
        if form.is_valid():
            post = form.save(commit=False)
            post.author = request.user
            post.save()
            return redirect(post.get_absolute_url())
    else:
        form = PostForm()

    return render(
        request,
        "post_form.html",
        {
            "form": form,
            "page_title": "Buat artikel baru",
            "heading": "Tulis postinganmu",
            "subtitle": "Tambahkan artikel baru ke blog dengan cepat dan mudah.",
            "submit_label": "Publikasikan",
        },
    )


@login_required
def post_edit(request, pk):
    post = get_object_or_404(Post, pk=pk)
    if post.author != request.user:
        return HttpResponseForbidden("Anda tidak berwenang mengedit posting ini.")

    if request.method == "POST":
        form = PostForm(request.POST, request.FILES, instance=post)
        if form.is_valid():
            form.save()
            return redirect(post.get_absolute_url())
    else:
        form = PostForm(instance=post)

    return render(
        request,
        "post_form.html",
        {
            "form": form,
            "post": post,
            "page_title": "Edit artikel",
            "heading": "Perbarui postinganmu",
            "subtitle": "Sunting judul, isi, dan gambar artikel dengan mudah.",
            "submit_label": "Simpan perubahan",
        },
    )


@login_required
def post_delete(request, pk):
    post = get_object_or_404(Post, pk=pk)
    if post.author != request.user:
        return HttpResponseForbidden("Anda tidak berwenang menghapus posting ini.")

    if request.method == "POST":
        post.delete()
        return redirect("home")

    return render(request, "post_confirm_delete.html", {"post": post})
