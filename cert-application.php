<?php
  $active = 'cert';
  $page_css = ['sections.css'];
  include 'header.php';
?>

<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2">Certification Application</h1>
    <p class="text-muted mb-0">Apply for SIET certification by submitting your application form and professional review report.</p>
  </div>
</section>

<section class="section-pad">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-8">
        <div class="lead-card p-4 p-md-5">
          <h2 class="h5 fw-bold">Overview</h2>
          <p class="text-muted">
            SIET’s Professional Certification Scheme was established in 2008 and officially launched in 2009.
            Existing and suitably qualified SIET members may apply to sit for the SIET–TPC and register under
            the appropriate certified grade.
          </p>

          <h3 class="h6 fw-bold mt-4">Three Levels</h3>
          <ul class="text-muted mb-0">
            <li>Level 1 – Certified Engineering Associate (CertEA)</li>
            <li>Level 2 – Certified Engineering Technologist (CertET)</li>
            <li>Level 3 – Certified Technical Specialist (CertTS)</li>
          </ul>
          <br>


          <h2 class="h5 fw-bold">Membership Requirement</h2>
          <p class="text-muted">
            SIET Professional Certification remains valid only when the Certified Professional continues to be registered and is a current member of SIET.
          </p>

          <h2 class="h5 fw-bold">Integrity and Professional Standing </h2>
          <p class="text-muted">
            Membership in good standing is essential to uphold the integrity, ethics, recognition, and professional status conferred by the certification.
          </p>

          <h2 class="h5 fw-bold">Continuing Professional Development (CPD)</h2>
          <p class="text-muted">
            To renew registration, Certified Professionals must complete at least 20 PDU units or its equivalent over a period of three consecutive years.
            <b>Note: 1PDU = 3 hours of CPD</b>
          </p>

          <h2 class="h5 fw-bold">Post-Nominal Entitlement</h2>
          <p class="text-muted">
            Certified Professionals in good standing are entitled to use the appropriate post-nominal letters after their names, for example: MSIET, CertET.
          </p>
        </div>
          

      </div>

      <div class="col-lg-4">
        <div class="lead-card p-4">
          <h2 class="h6 fw-bold">Downloads</h2>
          <!-- <p class="text-muted small">Add your official forms here (PDF). Sample provided below.</p> -->

          <a class="btn btn-download w-100" href="assets/downloads/SIET_Certification_Application_Form.pdf" download>
            Download Application Form
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======================
     VISUAL REFERENCE SECTION 
     ====================== -->
<!-- <section class="section-pad pt-0">
  <div class="container">
    <div class="cert-layout-wrap">
      <img
        src="images/cert/sampletcp.PNG"
        alt="SIET Certification Scheme Layout"
        class="cert-layout-img"
      />
    </div>
  </div>
</section> -->

<style>
  /* ============================
     CERT APPLICATION IMAGE LAYOUT
     ============================ */
  .cert-layout-wrap{
    background: transparent;
    padding: 0;
    margin: 0 auto;
    max-width: 1200px; /* keeps it like slide size */
  }

  .cert-layout-img{
    width: 100%;
    height: auto;
    display: block;

    /* slight shadow only 
    box-shadow: 0 16px 30px rgba(0,0,0,.12);
 */
    border-radius: 0;

    /* Keep crisp look */
    image-rendering: auto;
  }

  @media (max-width: 576px){
    .cert-layout-wrap{ max-width: 100%; }
    .cert-layout-img{ box-shadow: 0 10px 18px rgba(0,0,0,.10); }
  }
</style>

<?php include 'footer.php'; ?>
