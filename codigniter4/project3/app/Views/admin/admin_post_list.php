<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Blog</title>

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

/* TABLE */
.table {
    color: #ffffff;
}

.table thead {
    background: #1a1a1a;
}

.table tbody tr {
    background: #111;
    transition: 0.2s;
}

.table tbody tr:hover {
    background: #1c1c1c;
}

/* STATUS */
.text-success {
    color: #4caf50 !important;
}

.text-muted {
    color: #474600 !important;
}

/* BUTTON */
.btn-primary {
    background: linear-gradient(45deg, #d4af37, #ff4d4d);
    border: none;
}

.btn-outline-secondary {
    border-color: #005de9;
    color: #0011fc;
}

.btn-outline-secondary:hover {
    background: #7998fd;
    color: black;
}

.btn-outline-danger {
    border-color: #e40000;
    color: #f70000;
}

.btn-outline-danger:hover {
    background: #ff0000;
    color: white;
}

/* MODAL */
.modal-content {
    background: #1a1a1a;
    color: #ff0000;
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

<ul class="navbar-nav align-items-center">

<li class="nav-item me-2">
<a href="<?= base_url('admin/post/new') ?>" class="btn btn-primary">+ New Post</a>
</li>

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
<h1 class="fw-bold text-warning">Blog Admin Panel</h1>
<p>Kelola semua artikel dengan mudah</p>
</div>
</div>

<!-- TABLE -->
<div class="container">

<div class="table-responsive">
<table class="table align-middle">

<thead>
<tr>
<th>#</th>
<th>Image</th>
<th>Title</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>

<tbody>
<?php $no = 0; foreach($posts as $post): $no++; ?>
<tr>

<td><?= $no; ?></td>

<!-- GAMBAR -->
<td>
<?php if($post['image']): ?>
    <img src="/uploads/<?= $post['image'] ?>" 
     style="max-width:80px; max-height:80px; height:auto; object-fit:contain; border-radius:8px;">
<?php else: ?>
    <span class="text-muted">No Image</span>
<?php endif; ?>
</td>

<td>
<strong><?= $post['title'] ?></strong><br>
<small class="text-muted"><?= $post['created_at'] ?? '' ?></small>
</td>

<td>
<?php if($post['status'] === 'published'): ?>
<span class="badge bg-success">Published</span>
<?php else: ?>
<span class="badge bg-secondary">Draft</span>
<?php endif ?>
</td>

<td>
<a href="<?= base_url('admin/post/'.$post['id'].'/preview') ?>"
class="btn btn-sm btn-outline-secondary" target="_blank">Preview</a>

<a href="<?= base_url('admin/post/'.$post['id'].'/edit') ?>"
class="btn btn-sm btn-outline-secondary">Edit</a>

<a href="#"
data-href="<?= base_url('admin/post/'.$post['id'].'/delete') ?>"
onclick="confirmToDelete(this)"
class="btn btn-sm btn-outline-danger">Delete</a>
</td>

</tr>
<?php endforeach ?>
</tbody>

</table>
</div>

</div>

<!-- MODAL DELETE -->
<div id="confirm-dialog" class="modal fade" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">

<div class="modal-body">
<h4>Yakin hapus data?</h4>
<p>Data akan hilang permanen.</p>
</div>

<div class="modal-footer">
<a href="#" id="delete-button" class="btn btn-danger">Delete</a>
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
</div>

</div>
</div>
</div>

<script>
function confirmToDelete(el) {
    document.getElementById("delete-button")
        .setAttribute("href", el.dataset.href);

    var myModal = new bootstrap.Modal(
        document.getElementById('confirm-dialog')
    );
    myModal.show();
}
</script>

<!-- FOOTER -->
<div class="container py-4">
<footer class="pt-3 mt-4 border-top text-center text-muted">
&copy; <?= Date('Y') ?> Barbershop Admin
</footer>
</div>

<script src="<?= base_url('js/jquery.min.js') ?>"></script>
<script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>

</body>
</html>