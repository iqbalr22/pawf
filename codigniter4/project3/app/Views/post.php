<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Blog - Barbershop</title>

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
    color: #fff;
    border-bottom: 3px solid #d4af37;
}

.hero h1 {
    color: #ffd700;
}

/* CARD */
.blog-card {
    background: #1a1a1a;
    border: 1px solid #2c2c2c;
    border-radius: 12px;
    overflow: hidden;
    transition: 0.3s;
    height: 100%;
}

.blog-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 30px rgba(212, 175, 55, 0.3);
}

/* CARD CONTENT */
.blog-card .card-body h5 a {
    color: #ffd700;
    text-decoration: none;
}

.blog-card .card-body h5 a:hover {
    color: #ff4d4d;
}

.blog-card p {
    color: #ccc;
}

/* BUTTON */
.btn-barber {
    background: linear-gradient(45deg, #d4af37, #ff4d4d);
    border: none;
    color: white;
    font-size: 14px;
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
<h1 class="display-4 fw-bold">Blog</h1>
<p>Artikel & informasi terbaru dunia barbershop</p>
</div>
</div>

<!-- CONTENT -->
<div class="container">
<div class="row">

<?php foreach ($posts as $post) : ?>
<div class="col-md-6 col-lg-4 my-3">
    <div class="blog-card">

    <!-- GAMBAR -->
    <?php if($post['image']): ?>
        <img src="/uploads/<?= $post['image'] ?>" 
             style="width:100%; height:200px; object-fit:cover;">
    <?php else: ?>
        <img src="https://via.placeholder.com/400x200?text=No+Image" 
             style="width:100%; height:200px; object-fit:cover;">
    <?php endif; ?>

    <div class="card-body">
            <h5>
                <a href="/post/<?= $post['slug'] ?>">
                    <?= $post['title'] ?>
                </a>
            </h5>

            <p>
                <?= substr($post['content'], 0, 120) ?>...
            </p>

            <a href="/post/<?= $post['slug'] ?>" class="btn btn-barber btn-sm">
                Baca Selengkapnya
            </a>
        </div>
    </div>
</div>
<?php endforeach ?>

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