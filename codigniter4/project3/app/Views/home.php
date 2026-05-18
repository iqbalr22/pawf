<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Barbershop</title>

<link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />

<style>
body {
    background: #0f0f0f;
    color: #f1f1f1;
    font-family: 'Segoe UI', sans-serif;
}

/* HERO */
.hero {
    background: linear-gradient(rgba(0,0,0,0.75), rgba(0,0,0,0.85)),
    url('https://images.unsplash.com/photo-1585747860715-2ba37e788b70');
    background-size: cover;
    background-position: center;
    color: #fff;
    border-bottom: 3px solid #d4af37;
}

.hero h1 {
    color: #ffd700;
}

.hero p {
    color: #ddd;
}

/* CARD */
.card {
    background: #1a1a1a;
    border: 1px solid #2c2c2c;
    border-left: 5px solid #d4af37;
    border-radius: 12px;
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 30px rgba(212, 175, 55, 0.4);
}

.card h5 {
    color: #ffffff;
    font-weight: bold;
}

.card p {
    color: #cccccc;
}

/* TITLE */
.section-title {
    color: #ffd700;
    border-left: 5px solid #ff4d4d;
    padding-left: 10px;
    margin-bottom: 20px;
}

/* BUTTON */
.btn-barber {
    background: linear-gradient(45deg, #d4af37, #ff4d4d);
    border: none;
    color: white;
}

.card a:hover {
    color: #ffd700 !important;
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
<h1 class="display-4 fw-bold">Barbershop</h1>
<p class="fs-5">Tampil rapi bukan hanya soal rambut, tetapi juga tentang kepercayaan diri.
Di barbershop kami, setiap potongan dibuat dengan detail dan penuh gaya.
Saatnya upgrade penampilanmu dan rasakan perubahan yang lebih fresh setiap hari.
</p>
</div>
</div>

<!-- CONTENT -->
<div class="container">
<h3 class="section-title">Artikel Terbaru</h3>

<div class="row">

<?php if (!empty($posts)) : ?>
<?php foreach ($posts as $post) : ?>

<div class="col-md-4 my-3">
<div class="card h-100">

    <!-- GAMBAR -->
    <?php if($post['image']): ?>
        <img src="/uploads/<?= $post['image'] ?>" 
             style="width:100%; height:200px; object-fit:cover; border-radius:12px 12px 0 0;">
    <?php else: ?>
        <img src="https://via.placeholder.com/400x200?text=No+Image" 
             style="width:100%; height:200px; object-fit:cover; border-radius:12px 12px 0 0;">
    <?php endif; ?>

    <div class="card-body p-3">

<h5>
<a href="/post/<?= $post['slug'] ?>" 
   class="text-decoration-none text-light">
<?= $post['title'] ?>
</a>
</h5>

<small style="color: #ffd700; font-size: 12px;">
<?= $post['created_at'] ?>
</small>

<p class="mt-2">
<?= substr($post['content'], 0, 100) ?>...
</p>

<a href="/post/<?= $post['slug'] ?>" 
   class="btn btn-barber btn-sm mt-2">
Baca Selengkapnya
</a>

</div>
</div>
</div>

<?php endforeach; ?>
<?php else: ?>

<div class="col-12">
<p class="text-muted">Belum ada artikel terbaru.</p>
</div>

<?php endif; ?>

</div>
</div>

<!-- FOOTER -->
<div class="container py-4">
<footer class="pt-3 mt-4 border-top text-center">
&copy; <?= Date('Y') ?> Barbershop
</footer>
</div>

<script src="<?= base_url('js/jquery.min.js') ?>"></script>
<script src="<?= base_url('js/bootstrap.min.js') ?>"></script>

</body>

</html>