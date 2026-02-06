<?php
  $active = 'cert';
  $page_css = ['sections.css'];
  include 'header.php';
?>

<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2">SIET Membership Grade vs SIET Certifications</h1>
    <p class="text-muted mb-0">
      Quick visual reference showing how SIET membership grades align with SIET professional certification levels.
    </p>

    <!-- Action buttons (optional, nice UX) -->
    <div class="cvm-actions mt-3">
      <a href="cert-directory.php" class="cvm-btn cvm-btn-primary">
        Directory of Professionals
      </a>
      <a href="membership-pathways.php" class="cvm-btn cvm-btn-outline">
        Membership Pathways
      </a>
      <a href="javascript:history.back()" class="cvm-btn cvm-btn-dark">
        Back
      </a>
    </div>
  </div>
</section>

<section class="section-pad">
  <div class="container">

    <!-- ======================
         IMAGE GALLERY
         ====================== -->
    <div class="row g-4">

      <!-- Image 1 -->
      <div class="col-12 col-lg-6">
        <div class="lead-card cvm-card">
          <div class="cvm-card-head">
            <h3 class="mb-0">Membership Grade vs Certifications</h3>
            <span class="cvm-chip">Overview</span>
          </div>

          <div class="cvm-img-wrap">
            <img
              src="images/cert/membershipvscertifications.PNG"
              alt="SIET Membership Grade vs SIET Certifications (overview)"
              class="cvm-img"
              loading="lazy"
            />
          </div>

          <!-- <p class="text-muted small mb-0 mt-2">
            Use this diagram to understand how AMSIET/MSIET/FSIET relate to CertTN/CertET/CertTS.
          </p> -->
        </div>
      </div>

      <!-- Image 2 -->
      <div class="col-12 col-lg-6">
        <div class="lead-card cvm-card">
          <div class="cvm-card-head">
            <h3 class="mb-0">SIET Professional Certifications Progression</h3>
            <span class="cvm-chip">Progression</span>
          </div>

          <div class="cvm-img-wrap">
            <img
              src="images/cert/sietprofecer.PNG"
              alt="SIET Professional Certifications progression (CertTN → CertET → CertTS)"
              class="cvm-img"
              loading="lazy"
            />
          </div>

          <!-- <p class="text-muted small mb-0 mt-2">
            Visual pathway from CertTN to CertET and progression to CertTS.
          </p> -->
        </div>
      </div>

    </div>

  </div>
</section>

<!-- =========================================================
     PAGE CSS      
     ========================================================= -->
<style>
  .cvm-actions{
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
  }

  .cvm-btn{
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 10px 14px;
    border-radius: 12px;
    font-weight: 900;
    text-decoration: none;
    transition: transform .18s ease, box-shadow .18s ease, filter .18s ease, border-color .18s ease;
    box-shadow: 0 12px 22px rgba(0,0,0,.10);
    border: 1px solid rgba(0,0,0,.12);
    white-space: nowrap;
  }
  .cvm-btn:hover{
    transform: translateY(-1px);
    box-shadow: 0 16px 28px rgba(0,0,0,.14);
    filter: brightness(1.02);
  }
  .cvm-btn:active{
    transform: translateY(0);
    box-shadow: 0 10px 18px rgba(0,0,0,.10);
  }

  .cvm-btn-primary{
    background: linear-gradient(180deg, #0d6efd 0%, #0b5ed7 100%);
    color: #fff;
    border-color: rgba(13,110,253,.30);
  }
  .cvm-btn-outline{
    background: #ffffff;
    color: #0b5ed7;
    border: 1px solid rgba(13,110,253,.35);
  }
  .cvm-btn-dark{
    background: #111827;
    color: #ffffff;
    border-color: rgba(17,24,39,.35);
  }

  /* Card */
  .cvm-card{
    border-radius: 12px;
    border: 1px solid rgba(0,0,0,.08);
    box-shadow: 0 18px 35px rgba(0,0,0,.08);
    height: 100%;
  }

  .cvm-card-head{
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 10px;
  }

  .cvm-chip{
    font-weight: 900;
    padding: 6px 10px;
    border-radius: 999px;
    border: 1px solid rgba(0,0,0,.12);
    background: rgba(0,0,0,.04);
    white-space: nowrap;
  }

  /* Image framing */
  .cvm-img-wrap{
    border: 1px solid rgba(0,0,0,.12);
    border-radius: 12px;
    overflow: hidden;
    background: #ffffff;
    box-shadow: 0 12px 22px rgba(0,0,0,.06);
  }

  .cvm-img{
    width: 100%;
    height: auto;
    display: block;
    object-fit: contain; /* important: keeps whole slide visible */
    background: #fff;
  }

  /* Mobile */
  @media (max-width: 576px){
    .cvm-btn{ width: 100%; }
  }
</style>

<?php include 'footer.php'; ?>
