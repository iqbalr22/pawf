<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Post</title>

<link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />

<style>
body {
    background: #0f0f0f;
    color: #ffffff;
    font-family: 'Segoe UI', sans-serif;
}

/* NAVBAR */
.navbar {
    border-bottom: 2px solid #d4af37;
}

/* HERO */
.hero {
    background: #1a1a1a;
    border-left: 5px solid #d4af37;
}

/* FORM CONTAINER */
.form-container {
    background: #1a1a1a;
    padding: 25px;
    border-radius: 12px;
    border: 1px solid #2c2c2c;
}

/* INPUT */
.form-control {
    background: #111;
    border: 1px solid #333;
    color: #fff;
}

.form-control:focus {
    border-color: #d4af37;
    box-shadow: none;
}

/* LABEL */
label {
    color: #ffd700;
    font-weight: bold;
}

/* BUTTON */
.btn-primary {
    background: linear-gradient(45deg, #d4af37, #ff4d4d);
    border: none;
}

.btn-secondary {
    background: #444;
    border: none;
}

/* FOOTER */
footer {
    color: #aaa;
}
</style>

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
<div class="container">
<a class="navbar-brand fw-bold text-warning" href="<?= base_url() ?>">Admin</a>

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse justify-content-between" id="navbarNav">

<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" href="<?= base_url('admin/post') ?>">Blog</a>
</li>
</ul>

<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" href="<?= base_url('admin/setting') ?>">Setting</a>
</li>

<li class="nav-item">
<?php if (logged_in()) : ?>
<a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
<?php else: ?>
<a class="nav-link" href="<?= base_url('login') ?>">Login</a>
<?php endif; ?>
</li>
</ul>

</div>
</div>
</nav>

<!-- HERO -->
<div class="p-5 mb-4 hero rounded-3 mt-5">
<div class="container py-4">
<h1 class="fw-bold text-warning">Create New Post</h1>
<p>Tulis artikel baru untuk blog kamu</p>
</div>
</div>

<!-- FORM -->
<div class="container">
<div class="form-container">

<form action="" method="post" enctype="multipart/form-data" id="text-editor">

<div class="form-group mb-3">
<label for="title">Judul Artikel</label>
<input type="text" name="title" class="form-control"
placeholder="Masukkan judul artikel..." required>
</div>

<div class="form-group mb-3">
<label for="content">Isi Artikel</label>
<textarea name="content" class="form-control" rows="10"
placeholder="Tulis konten artikel di sini..."></textarea>
</div>

<div class="form-group mb-3">
    <label for="image">Gambar Artikel</label>
    <input type="file" name="image" class="form-control">
</div>

<div class="form-group mt-4">
<button type="submit" name="status" value="published"
class="btn btn-primary me-2">
Publish
</button>

<button type="submit" name="status" value="draft"
class="btn btn-secondary">
Save Draft
</button>
</div>

</form>

</div>
</div>

<!-- FOOTER -->
<div class="container py-4">
<footer class="pt-3 mt-4 border-top text-center">
&copy; <?= Date('Y') ?> Barbershop Admin
</footer>
</div>

<script src="<?= base_url('js/jquery.min.js') ?>"></script>
<script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>

</body>
</html>