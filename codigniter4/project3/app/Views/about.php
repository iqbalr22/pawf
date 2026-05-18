<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About - Barbershop</title>

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
                url('https://images.unsplash.com/photo-1622288432450-277d0fef5ed6');
    background-size: cover;
    background-position: center;
    color: #fff;
    border-bottom: 3px solid #d4af37;
}

.hero h1 {
    color: #ffd700;
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
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(212, 175, 55, 0.3);
}

.card h5 {
    color: #ffd700;
    font-weight: bold;
}

.card p {
    color: #cccccc;
}

/* SECTION TITLE */
.section-title {
    color: #fff;
    border-left: 5px solid #ff4d4d;
    padding-left: 10px;
    margin-bottom: 20px;
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
<h1 class="display-4 fw-bold">About Us</h1>
<p>Mengenal lebih dekat dunia barbershop & passion di baliknya</p>
</div>
</div>

<!-- CONTENT -->
<div class="container">

<h3 class="section-title">Tentang Kami</h3>

<div class="row">

<div class="col-md-12 my-3">
<div class="card p-3">
<div class="card-body">
<h5>Siapa Aku</h5>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam perferendis commodi tenetur quos ducimus repellat nulla.</p>
</div>
</div>
</div>

<div class="col-md-12 my-3">
<div class="card p-3">
<div class="card-body">
<h5>Bisa Apa Aku</h5>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam perferendis commodi tenetur quos ducimus repellat nulla.</p>
</div>
</div>
</div>

<div class="col-md-12 my-3">
<div class="card p-3">
<div class="card-body">
<h5>Bagaimana Aku</h5>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam perferendis commodi tenetur quos ducimus repellat nulla.</p>
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