<?= $this->include('layouts/header'); ?>
<?= $this->renderSection('content'); ?>

<main class="main">

<section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About</h2>
        <p>Mahasiswa aktif semester 6 Program Studi Sistem Informasi yang memiliki motivasi tinggi, disiplin, dan bertanggung jawab. Memahami analisis kebutuhan, perancangan sistem informasi, serta pengelolaan basis data melalui pengalaman akademik. Mampu bekerja secara mandiri maupun dalam tim, komunikatif, dan berkomitmen untuk terus belajar serta berkontribusi secara positif.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 justify-content-center">
          <div class="col-lg-4">
            <img src="assets/img/profile.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 content">
            <h2>Iqbal Ramadan</h2>
            <p class="fst-italic py-3">
              Mahasiswa Sistem Informasi Semester 6
            </p>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>22 November 2001</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Instagram:</strong> <span>@iqbalr22</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>0895328113437</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>Jakarta</span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>24</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>S.Kom.</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>iqbalramadan221101@gmail.com</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>Ojol Grab</span></li>
                </ul>
              </div>
            </div>
            <p class="py-3">
              belajar, belajar, dan belajar
          </div>
        </div>

      </div>

</section><!-- /About Section -->

</main>

<?= $this->include('layouts/footer'); ?>