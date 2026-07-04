from django import forms

from .models import Post


class PostForm(forms.ModelForm):
    class Meta:
        model = Post
        fields = ["title", "body", "image"]
        widgets = {
            "title": forms.TextInput(attrs={"class": "form-input", "placeholder": "Judul artikel"}),
            "body": forms.Textarea(attrs={"class": "form-textarea", "rows": 8, "placeholder": "Tulis isi artikel..."}),
            "image": forms.ClearableFileInput(attrs={"class": "form-input"}),
        }
