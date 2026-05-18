<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detail Blog</title>

<link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />

<style>
body {
    background: #0f0f0f;
    color: #f1f1f1;
    font-family: 'Segoe UI', sans-serif;
}

/* HERO */
.hero {
    background: linear-gradient(rgba(0,0,0,0.75), rgba(0,0,0,0.9)),
                url('https://images.unsplash.com/photo-1585747860715-2ba37e788b70');
    background-size: cover;
    background-position: center;
    border-bottom: 3px solid #d4af37;
}

.hero h1 {
    color: #ffd700;
}

/* ARTICLE CARD */
.article-card {
    background: #1a1a1a;
    border: 1px solid #2c2c2c;
    border-radius: 12px;
    padding: 25px;
}

/* TITLE */
.article-title {
    color: #ffd700;
    font-weight: bold;
    margin-bottom: 10px;
}

/* META */
.article-meta {
    font-size: 14px;
    color: #aaa;
    margin-bottom: 20px;
}

/* CONTENT */
.article-content {
    color: #ddd;
    line-height: 1.8;
    text-align: justify;
}

/* BUTTON */
.btn-barber {
    background: linear-gradient(45deg, #d4af37, #ff4d4d);
    border: none;
    color: white;
}

/* FOOTER */
footer {
    color: #aaa;
}
</style>

</head>

<body>

<?= $this->include('layouts/navbar'); ?>

<!-- HERO -->
<div class="p-5 mb-4 hero rounded-3">
<div class="container py-5 text-center">
<h1 class="display-5 fw-bold">Blog Detail</h1>
<p>Baca artikel lengkap</p>
</div>
</div>

<!-- CONTENT -->
<div class="container">
<div class="row justify-content-center">

<div class="col-md-10 my-3">
<div class="article-card">

<h2 class="article-title"><?= $post['title'] ?></h2>

<!-- 🔥 GAMBAR ARTIKEL -->
<?php if($post['image']): ?>
    <img src="/uploads/<?= $post['image'] ?>" 
            style="max-width:100%; height:auto; border-radius:12px 12px 0 0;">
    <?php else: ?>
        <img src="https://via.placeholder.com/400x200?text=No+Image" 
     		style="max-width:100%; height:auto; border-radius:12px 12px 0 0;">
<?php endif; ?>

<div class="article-meta">
✍️ <?= $post['author'] ?> &nbsp; | &nbsp; 📅 <?= $post['created_at'] ?>
</div>

<div class="article-content">
<?= $post['content'] ?>
</div>

<div class="mt-4">
<a href="<?= base_url('post') ?>" class="btn btn-barber">
← Kembali ke Blog
</a>
</div>

</div>
</div>

</div>
</div>

<!-- FOOTER -->
<div class="container py-4">
<footer class="pt-3 mt-4 border-top text-center">
&copy; <?= Date('Y') ?> Barbershop Blog
</footer>
</div>

<script src="<?= base_url('js/jquery.min.js') ?>"></script>
<script src="<?= base_url('js/bootstrap.min.js') ?>"></script>

</body>

</html>