<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact - Barbershop</title>

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
                url('https://images.unsplash.com/photo-1599351431202-1e0f0137899a');
    background-size: cover;
    background-position: center;
    color: #fff;
    border-bottom: 3px solid #d4af37;
}

.hero h1 {
    color: #ffd700;
}

/* CARD */
.info-card {
    background: #1a1a1a;
    border: 1px solid #2c2c2c;
    border-left: 5px solid #d4af37;
    border-radius: 12px;
    transition: 0.3s;
}

.info-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(212, 175, 55, 0.3);
}

.info-card h5 {
    color: #ffd700;
}

/* SOCIAL */
.social a {
    display: inline-block;
    margin-right: 10px;
    padding: 10px 15px;
    border-radius: 8px;
    text-decoration: none;
    color: white;
    font-size: 14px;
    transition: 0.3s;
}

/* WARNA SOSIAL */
.facebook { background: #3b5998; }
.instagram { background: #e1306c; }
.whatsapp { background: #25d366; }
.twitter { background: #1da1f2; }

.social a:hover {
    transform: scale(1.1);
    opacity: 0.9;
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
<h1 class="display-4 fw-bold">Contact</h1>
<p>Terhubung dengan kami melalui berbagai platform</p>
</div>
</div>

<!-- CONTENT -->
<div class="container">
<div class="row">

<div class="col-md-12 my-3">
<div class="info-card p-3">
<div class="card-body">
<h5>Alamat</h5>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
</div>
</div>
</div>

<div class="col-md-12 my-3">
<div class="info-card p-3">
<div class="card-body">
<h5>Email</h5>
<p>barbershop@email.com</p>
</div>
</div>
</div>

<div class="col-md-12 my-3">
<div class="info-card p-3">
<div class="card-body">
<h5>📞 No. HP</h5>
<p>0812-3456-7890</p>
</div>
</div>
</div>

<!-- SOCIAL MEDIA -->
<div class="col-md-12 my-3">
<div class="info-card p-3">
<div class="card-body">
<h5>Sosial Media</h5>

<div class="social mt-3">
    <a href="#" class="facebook">Facebook</a>
    <a href="#" class="instagram">Instagram</a>
    <a href="#" class="whatsapp">WhatsApp</a>
    <a href="#" class="twitter">Twitter</a>
</div>

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