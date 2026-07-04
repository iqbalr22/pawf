from django.urls import path

from .views import post_delete, post_detail, post_edit, post_list, post_new

urlpatterns = [
    path("post/<int:pk>/", post_detail, name="post_detail"),
    path("post/<int:pk>/edit/", post_edit, name="post_edit"),
    path("post/<int:pk>/delete/", post_delete, name="post_delete"),
    path("new/", post_new, name="post_new"),
    path("", post_list, name="home"),
]
