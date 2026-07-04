from django.contrib import admin
from django.contrib.admin.sites import NotRegistered
from django.contrib.auth import get_user_model
from django.contrib.auth.admin import UserAdmin as DefaultUserAdmin

from .models import Post


def _register_admin_branding():
    admin.site.site_header = "Iqbal Blog Admin"
    admin.site.site_title = "Iqbal Blog Admin"
    admin.site.index_title = "Dashboard Admin"


class PostAdmin(admin.ModelAdmin):
    list_display = ("id", "title", "author", "short_body")
    search_fields = ("title", "body", "author__username")
    list_filter = ("author",)
    ordering = ("-id",)
    list_per_page = 25

    def short_body(self, obj):
        return (obj.body[:75] + "...") if len(obj.body) > 75 else obj.body

    short_body.short_description = "Ringkasan"


User = get_user_model()


class UserAdmin(DefaultUserAdmin):
    list_display = ("username", "email", "is_staff", "is_active")
    search_fields = ("username", "email")
    ordering = ("username",)


_register_admin_branding()
admin.site.register(Post, PostAdmin)

try:
    admin.site.unregister(User)
except NotRegistered:
    pass

admin.site.register(User, UserAdmin)
