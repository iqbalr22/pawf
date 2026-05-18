<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FAQ - Barbershop</title>

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

/* ACCORDION */
.accordion-item {
    background: #1a1a1a;
    border: 1px solid #2c2c2c;
    margin-bottom: 10px;
    border-radius: 10px;
    overflow: hidden;
}

.accordion-button {
    background: #1a1a1a;
    color: #ffd700;
    font-weight: bold;
}

.accordion-button:not(.collapsed) {
    background: #111;
    color: #ff4d4d;
}

.accordion-body {
    color: #ccc;
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
<h1 class="display-4 fw-bold">FAQ</h1>
<p>Pertanyaan yang sering ditanyakan</p>
</div>
</div>

<!-- CONTENT -->
<div class="container">
<div class="accordion" id="faqAccordion">

<!-- ITEM 1 -->
<div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
            Pertanyaan? (Q)
        </button>
    </h2>
    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
            (A) Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam perferendis commodi tenetur.
        </div>
    </div>
</div>

<!-- ITEM 2 -->
<div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
            Pertanyaan? (Q)
        </button>
    </h2>
    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
            (A) Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam perferendis commodi tenetur.
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