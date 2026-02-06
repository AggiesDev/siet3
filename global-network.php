<?php
  $active = 'global';
  $page_css = ['sections.css'];
  include 'header.php';
?>

<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2">SIET’s Global Network</h1>
    <p class="text-muted mb-0">Overview of SIET’s global network since 1980.</p>
  </div>
</section>

<section class="section-pad pt-0">
  <div class="container">
    <!-- Poster wrapper  -->
    <div class="gn-poster">

      <!-- ======= TOP LEFT: WFTO header (image or text) ======= -->
      <div class="gn-wfto-head">
        <img
          src="images/Affiliated Organisations Logo/SIET Affiliations Logo/logoWFTO.jpg"
          alt="World Federation of Technology Organizations"
          class="gn-img"
          onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
        />
        <div class="gn-fallback" style="display:none;">
          <div class="gn-fallback-title">World Federation of Technology Organizations</div>
        </div>
      </div>

      <!-- ======= TOP CENTER: Yellow banner ======= -->
      <div class="gn-banner">
        <div class="gn-banner-title">SIET’s Global Network</div>
        <div class="gn-banner-sub">since 1980</div>
      </div>

      <!-- ======= TOP RIGHT: GTA event photo ======= -->
      <div class="gn-gta-photo">
        <img
          src="images/Affiliated Organisations Logo/SIET Affiliations Logo/other-gplogo.PNG"
          alt="Global Technological Alliance (GTA)"
          class="gn-img gn-photo"
          onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
        />
        <div class="gn-fallback" style="display:none;">
          <div class="gn-fallback-title">GTA Event Photo</div>
        </div>
      </div>

      <!-- ======= LEFT TEXT (WFTO founding) ======= -->
      <div class="gn-left-text">
        <div class="gn-blue-title">SIET – A Founding member of</div>
        <div class="gn-blue-title">WFTO since 13 June 1995</div>
        <a class="gn-link" href="https://www.wfto.org" target="_blank" rel="noopener">
          World Federation of Technology Organizations
        </a>
      </div>

      <!-- ======= CENTER BIG SIET LOGO ======= -->
      <div class="gn-center-logo">
        <img
          src="images/SIET Logo and Banner/Singapore Institute of Engineering Technologists _ 1980.jpg"
          alt="Singapore Institute of Engineering Technologists"
          class="gn-img gn-siet"
          onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
        />
        <div class="gn-fallback" style="display:none;">
          <div class="gn-fallback-title">SIET Logo</div>
        </div>
      </div>

      <!-- ======= RIGHT TEXT (GTA founding) ======= -->
      <div class="gn-right-text">
        <div class="gn-blue-title">SIET – A Founding member of</div>
        <div class="gn-blue-title">Global Technological Alliance</div>
        <div class="gn-blue-title">(GTA) since 15 August 2023</div>

        <a class="gn-link" href="https://www.mbot.org.my" target="_blank" rel="noopener">
          MBOT – Malaysia Board of Technologists (Official Website)
        </a>
      </div>

      <!-- ======= SCATTERED LOGOS  ======= -->

      <!-- Left column logos -->
      <img class="gn-logo gn-logo-1"
           src="images/Affiliated Organisations Logo/SIET Affiliations Logo/TAM Logo.webp"
           alt="Malaysia Crest"
           onerror="this.style.display='none';" />

      <img class="gn-logo gn-logo-2"
           src="images/Affiliated Organisations Logo/SIET Affiliations Logo/IED-Logo-80-2 (1).webp"
           alt="IFD"
           onerror="this.style.display='none';" />

      <img class="gn-logo gn-logo-3"
           src="images/Affiliated Organisations Logo/SIET Affiliations Logo/cropped-IPET_combined_logos.png"
           alt="IPET"
           onerror="this.style.display='none';" />

      <!-- <img class="gn-logo gn-logo-4"
           src="images/Affiliated Organisations Logo/SIET Affiliations Logo/coat_of_arms.png"
           alt="Coat of Arms"
           onerror="this.style.display='none';" /> -->

      <img class="gn-logo gn-logo-5"
           src="images/Affiliated Organisations Logo/SIET Affiliations Logo/Engineers Australia Logo.svg"
           alt="Engineers Australia"
           onerror="this.style.display='none';" />

      <!-- Center/bottom logos -->
      <img class="gn-logo gn-logo-6"
           src="images/Affiliated Organisations Logo/SIET Affiliations Logo/ASTTBC-Horizontal-Blue-Large-RGB.jpg"
           alt="ASTTBC"
           onerror="this.style.display='none';" />

      <img class="gn-logo gn-logo-7"
           src="images/Affiliated Organisations Logo/SIET Affiliations Logo/The-Institute-of-Engineering-and-Technology.png"
           alt="IET"
           onerror="this.style.display='none';" />

      <img class="gn-logo gn-logo-8"
           src="images/Affiliated Organisations Logo/SIET Affiliations Logo/other-logo.PNG"
           alt="Other Badge"
           onerror="this.style.display='none';" />

      <!-- Right logos -->
      <img class="gn-logo gn-logo-9"
           src="images/Affiliated Organisations Logo/SIET Affiliations Logo/IIESL.webp"
           alt="IIESL"
           onerror="this.style.display='none';" />

      <img class="gn-logo gn-logo-10"
           src="images/Affiliated Organisations Logo/SIET Affiliations Logo/Engineering Council UK Logo.jpg"
           alt="Engineering Council"
           onerror="this.style.display='none';" />

    </div>
  </div>
</section>
<br><br>
<style>
  /* =========================================================
     GLOBAL NETWORK POSTER 
     ========================================================= */

  .gn-poster{
    position: relative;
    background: #fff;
    border: 2px solid rgba(17,24,39,.85);
    box-shadow: 0 18px 35px rgba(0,0,0,.08);
    border-radius: 10px;
    overflow: hidden;

    /* keeps same slide-like ratio */
    aspect-ratio: 16 / 9;
    width: 100%;
  }

  .gn-img{ width: 100%; height: 100%; object-fit: contain; display:block; }
  .gn-photo{ object-fit: cover; }

  /* Top left WFTO header */
  .gn-wfto-head{
    position:absolute;
    top: 1.5%;
    left: 1.5%;
    width: 26%;
    height: 18%;
  }

  /* Top center yellow banner */
  .gn-banner{
    position:absolute;
    top: 0;
    left: 28%;
    width: 44%;
    height: 20%;
    background: #fff200;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    text-align:center;
    border-left: 2px solid rgba(0,0,0,.15);
    border-right: 2px solid rgba(0,0,0,.15);
  }
  .gn-banner-title{
    font-weight: 900;
    font-size: clamp(18px, 2.4vw, 34px);
    line-height: 1.05;
    color:#111;
    text-shadow: 2px 2px 0 rgba(0,0,0,.12);
  }
  .gn-banner-sub{
    font-weight: 900;
    font-size: clamp(14px, 2vw, 28px);
    margin-top: 4px;
  }

  /* Top right GTA photo */
  .gn-gta-photo{
    position:absolute;
    top: 0;
    right: 0;
    width: 28%;
    height: 26%;
    border-left: 2px solid rgba(0,0,0,.15);
  }

  /* Left text block */
  .gn-left-text{
    position:absolute;
    top: 22%;
    left: 2%;
    width: 26%;
  }

  /* Right text block */
  .gn-right-text{
    position:absolute;
    top: 30%;
    right: 2%;
    width: 28%;
    text-align:left;
  }

  .gn-blue-title{
    color: #0b3dff;
    font-weight: 900;
    font-size: clamp(14px, 1.7vw, 22px);
    line-height: 1.15;
    margin-bottom: 6px;
  }

  .gn-link{
    color:#0b3dff;
    text-decoration: underline;
    font-size: clamp(12px, 1.2vw, 16px);
    font-weight: 700;
    display:inline-block;
    margin-top: 4px;
  }

  /* Center SIET logo */
  .gn-center-logo{
    position:absolute;
    top: 24%;
    left: 33%;
    width: 34%;
    height: 34%;
    display:flex;
    align-items:center;
    justify-content:center;
  }
  .gn-siet{ object-fit: contain; }

  /* Fallback blocks */
  .gn-fallback{
    width:100%;
    height:100%;
    display:flex;
    align-items:center;
    justify-content:center;
    background: #f1f5f9;
    border: 1px dashed rgba(0,0,0,.25);
  }
  .gn-fallback-title{
    font-weight:900;
    color:#111;
    font-size: 14px;
    text-align:center;
    padding: 8px 10px;
  }

  /* ===== scattered logos: positioned to match slide ===== */
  .gn-logo{
    position:absolute;
    object-fit: contain;
    width: auto;
    height: auto;
    max-width: 22%;
    max-height: 18%;
    filter: saturate(1.02);
  }

  /* left area */
  .gn-logo-1{ left: 3%; top: 40%; width: 18%; }
  .gn-logo-2{ left: 14%; top: 40%; width: 16%; }
  .gn-logo-3{ left: 3%; top: 58%; width: 18%; }
  .gn-logo-4{ left: 14%; top: 60%; width: 12%; }
  .gn-logo-5{ left: 2%; bottom: 4%; width: 22%; }

  /* center/bottom */
  .gn-logo-6{ left: 38%; top: 66%; width: 22%; }
  .gn-logo-7{ left: 30%; bottom: 6%; width: 12%; }
  .gn-logo-8{ left: 49%; bottom: 7%; width: 12%; }

  /* right area */
  .gn-logo-9{ right: 6%; top: 62%; width: 16%; }
  .gn-logo-10{ right: 1%; bottom: 2%; width: 26%; }

  /* ===== responsive (stack fallback) ===== */
  @media (max-width: 991.98px){
    .gn-poster{
      aspect-ratio: auto;
      padding: 14px;
      height: auto;
      min-height: 640px;
    }

    /* Make it readable on mobile: stack sections */
    .gn-wfto-head, .gn-banner, .gn-gta-photo, .gn-left-text, .gn-right-text, .gn-center-logo,
    .gn-logo{
      position: static;
      width: 100%;
      height: auto;
      max-width: none;
      max-height: none;
      margin: 10px 0;
    }

    .gn-banner{ border:none; border-radius: 10px; padding: 12px; }
    .gn-gta-photo{ border:none; }

    .gn-right-text{ text-align:left; }
  }
</style>

<?php include 'footer.php'; ?>
