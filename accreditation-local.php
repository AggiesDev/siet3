<?php
  $active = 'accreditation';
  $page_css = ['sections.css'];
  include 'header.php';
?>

<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-0 accred-local-title">
      Accreditation (Local Polytechnics and ITE)
      <!-- <span class="accred-local-tab">- Tab 6</span> -->
    </h1>
  </div>
</section>

<section class="section-pad pt-0">
  <div class="container">
    <div class="lead-card p-4 p-md-5 accred-local-card">
      <div class="row g-4 align-items-start">
        <!-- Left list -->
        <div class="col-lg-4">
          <h2 class="h6 fw-bold mb-3">Recognised Institutions</h2>
          <ul class="accred-local-list mb-0">
            <li>Singapore Polytechnic</li>
            <li>Ngee Ann Polytechnic</li>
            <li>Nanyang Polytechnic</li>
            <li>Republic Polytechnic</li>
            <li>Temasek Polytechnic</li>
            <li>Institute of Technical Education</li>
          </ul>
        </div>

        <!-- Right logos -->
        <div class="col-lg-8">
          <div class="accred-local-logos">
            <div class="logo-item">
              <img src="images/ITE and Polytechnics Logo/300px-Republic_Polytechnic_Logo.jpg" alt="Singapore Polytechnic" loading="lazy">
            </div>

            <div class="logo-item">
              <img src="images/ITE and Polytechnics Logo/FSUnsiT.png" alt="Institute of Technical Education (ITE)" loading="lazy">
            </div>

            <div class="logo-item">
              <img src="images/ITE and Polytechnics Logo/logo-ITE.png" alt="Ngee Ann Polytechnic" loading="lazy">
            </div>

            <div class="logo-item">
              <img src="images/ITE and Polytechnics Logo/Marketing-NYP-Logo_CMYK-1.jpg" alt="Nanyang Polytechnic" loading="lazy">
            </div>

            <div class="logo-item">
              <img src="images/ITE and Polytechnics Logo/Ngee_Ann_Polytechnic_Logo.png" alt="Republic Polytechnic" loading="lazy">
            </div>

            <div class="logo-item">
              <img src="images/ITE and Polytechnics Logo/rp-1024x640.jpg" alt="Temasek Polytechnic" loading="lazy">
            </div>
            <div class="logo-item">
              <img src="images/ITE and Polytechnics Logo/SP Logo.png" alt="Temasek Polytechnic" loading="lazy">
            </div>
            <div class="logo-item">
              <img src="images/ITE and Polytechnics Logo/Temasek Poly Logo.jpg" alt="Temasek Polytechnic" loading="lazy">
            </div>
          </div>

          
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  /* Title (match your slide: big title + red Tab text) */
  .accred-local-title{
    font-weight: 300;
    font-size: clamp(1.8rem, 3.4vw, 3rem);
    letter-spacing: .2px;
  }
  .accred-local-tab{
    color: #ff2b2b;
    font-weight: 500;
    margin-left: .25rem;
  }

  /* Card spacing */
  .accred-local-card{
    border-radius: 14px;
  }

  /* Left list */
  .accred-local-list{
    margin: 0;
    padding-left: 1.05rem;
    line-height: 1.9;
    font-size: 1.05rem;
  }
  .accred-local-list li{
    margin: 2px 0;
  }

  /* Logos layout: neat grid, consistent sizing, no huge blank space */
  .accred-local-logos{
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px 22px;
    align-items: center;
  }

  .logo-item{
    background: #fff;
    border: 1px solid rgba(0,0,0,.10);
    border-radius: 12px;
    padding: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 10px 18px rgba(0,0,0,.05);
    min-height: 108px;
  }

  .logo-item img{
    max-width: 100%;
    max-height: 82px;
    width: auto;
    height: auto;
    object-fit: contain;
    display: block;
  }

  @media (max-width: 991.98px){
    .accred-local-logos{
      grid-template-columns: 1fr;
    }
    .logo-item{
      min-height: 96px;
    }
    .logo-item img{
      max-height: 72px;
    }
  }
</style>

<?php include 'footer.php'; ?>
