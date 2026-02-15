<?php
  $active = "about";
  $page_css = ["about.css","sections.css", "contact.css"];
  include "header.php";
?>
<main>
<?php $page_id = 'introduction'; ?>


<!-- ======================
     ABOUT / INTRODUCTION PAGE
     ====================== -->
<section class="page-hero py-5">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-7">
        <span class="badge-soft mb-3 d-inline-block">About SIET</span>
        <h1 class="mb-2">Introduction</h1>
        <p class="lead mb-0">
          A national professional body supporting engineering and ICT technologists and technicians in Singapore, with strong
        regional and global connections.
        </p>
      </div>
    </div>
  </div>
</section>

<section class="about-content py-5">
  <div class="container">
    <div class="row g-4 align-items-stretch">

      <!-- Main Content -->
      <div class="col-lg-8">
        <div class="about-card">
          <h2 class="about-card__title">Who We Are</h2>
          <p class="about-card__text">
            SIET originated from the <strong>Singapore Institute of Engineering Technicians</strong>, founded on
            <strong>23 August 1980</strong> as the national society for engineering technologists and technicians in
            Singapore, established to support the interests of <strong>Polytechnic</strong> and <strong>VITB (now ITE)</strong>
            engineering graduates. In <strong>1986</strong>, the institute was renamed the
            <strong>Singapore Institute of Engineering Technologists (SIET)</strong>.
          </p>

          <hr class="about-divider">

          <h3 class="about-card__subtitle">Governance & Structure</h3>
          <p class="about-card__text">
            SIET is governed by an elected <strong>Executive Council</strong> and supported by <strong>four working committees</strong>:
          </p>

          <div class="about-list">
            <div class="about-list__item">Membership &amp; Qualifications</div>
            <div class="about-list__item">Education &amp; Training</div>
            <div class="about-list__item">Publications</div>
            <div class="about-list__item">Social Functions</div>
          </div>

          <p class="about-card__text mt-3">
            SIET is also supported by the <strong>SIET – Accreditation Board</strong>.
          </p>

          <hr class="about-divider">

          <h3 class="about-card__subtitle">Regional & Global Links</h3>
          <p class="about-card__text">
            SIET maintains close links with professional organizations of engineering technologists and technicians
            regionally and worldwide, including partners in <strong>Malaysia</strong>, <strong>Canada</strong>,
            <strong>South Africa</strong>, and the <strong>United Kingdom</strong>.
          </p>

          <p class="about-card__text mb-0">
            SIET was also a founder member of the <strong>World Federation of Technological Organizations (WFTO)</strong>
            and the <strong>Global Technological Alliance (GTA)</strong>.
          </p>
        </div>
      </div>

      <!-- Side Info -->
      <div class="col-lg-4">
        <div class="about-side">
          <div class="about-side__card">
            <h3 class="about-side__title">Quick Highlights</h3>

            <div class="about-kpi">
              <div class="about-kpi__label">Founded</div>
              <div class="about-kpi__value">23 Aug 1980</div>
            </div>

            <div class="about-kpi">
              <div class="about-kpi__label">Renamed to SIET</div>
              <div class="about-kpi__value">1986</div>
            </div>

            <div class="about-kpi">
              <div class="about-kpi__label">Leadership</div>
              <div class="about-kpi__value">Executive Council</div>
            </div>

            <div class="about-kpi mb-0">
              <div class="about-kpi__label">Committees</div>
              <div class="about-kpi__value">4 Working Committees</div>
            </div>

            <a class="about-link mt-4" href="https://www.wfto.org" target="_blank" rel="noopener">
              Visit WFTO Website
              <span class="about-link__arrow">→</span>
            </a>
          </div>

          <div class="about-side__card">
            <h3 class="about-side__title">Need More Info?</h3>
            <p class="about-side__text">
              For membership details, accreditation, or partnerships, feel free to contact us.
            </p>
            <a href="contact.php" class="btn btn-primary w-100">Contact Us</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


</main>
<?php
include "footer.php";
?>
