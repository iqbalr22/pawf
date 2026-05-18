<nav class="navbar navbar-expand-md fixed-top navbar-dark barber-navbar">
<div class="container">

<!-- BRAND -->
<a class="navbar-brand fw-bold" href="#">
MyBarber
</a>

<!-- TOGGLER -->
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
<span class="navbar-toggler-icon"></span>
</button>

<!-- MENU -->
<div class="collapse navbar-collapse" id="navbarSupportedContent">

<ul class="navbar-nav me-auto mb-2 mb-lg-0">

<li class="nav-item">
<a class="nav-link active" href="/">Home</a>
</li>

<li class="nav-item">
<a class="nav-link" href="<?= base_url('about') ?>">About</a>
</li>

<li class="nav-item">
<a class="nav-link" href="<?= base_url('post') ?>">Blog</a>
</li>

<li class="nav-item">
<a class="nav-link" href="<?= base_url('contact') ?>">Contact</a>
</li>

<li class="nav-item">
<a class="nav-link" href="<?= base_url('faqs') ?>">FAQ</a>
</li>

</ul>

<!-- LOGIN / LOGOUT -->
<div class="d-flex">
<?php if (logged_in()) : ?>
    <a href="<?= base_url('logout') ?>" class="btn btn-barber ms-2">Logout</a>
<?php else: ?>
    <a href="<?= base_url('login') ?>" class="btn btn-barber ms-2">Login</a>
<?php endif; ?>
</div>

</div>
</div>
</nav>

<style>
/* NAVBAR STYLE */
.barber-navbar {
    background: rgba(0, 0, 0, 0.9);
    backdrop-filter: blur(8px);
    border-bottom: 2px solid #d4af37;
}

/* BRAND */
.navbar-brand {
    color: #ffd700 !important;
    font-size: 1.4rem;
    letter-spacing: 1px;
}

/* LINK */
.nav-link {
    color: #ddd !important;
    margin-right: 10px;
    position: relative;
    transition: 0.3s;
}

/* HOVER EFFECT */
.nav-link:hover {
    color: #ffd700 !important;
}

/* UNDERLINE ANIMATION */
.nav-link::after {
    content: '';
    display: block;
    width: 0;
    height: 2px;
    background: #ff4d4d;
    transition: width .3s;
}

.nav-link:hover::after {
    width: 100%;
}

/* BUTTON */
.btn-barber {
    background: linear-gradient(45deg, #d4af37, #ff4d4d);
    border: none;
    color: white;
    font-weight: bold;
    transition: 0.3s;
}

.btn-barber:hover {
    transform: scale(1.05);
    box-shadow: 0 0 10px rgba(255, 77, 77, 0.5);
}
</style>