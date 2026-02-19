<?php
  $active = 'home';
  $page_css = ['home.css'];
  include "header.php";
?>
<main>
<?php $page_id = 'home1'; ?>


  <!-- ======================
       HERO SLIDER
       ====================== -->
  <section class="hero-slider">
  <div id="heroCarousel"
       class="carousel slide carousel-fade"
       data-bs-ride="carousel"
       data-bs-interval="5000"
       data-bs-pause="hover"
       data-bs-touch="true">

    <!-- INDICATORS (dots) -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0"
              class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"
              aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"
              aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="3"
              aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="4"
              aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">

      <div class="carousel-item active">
        <img
          src="images/SIET Logo and Banner/1.png"
          class="d-block w-100 hero-img" alt="Hero Slide 1" />
        <!-- <div class="carousel-caption">
          <h1>Building Global Recognition</h1>
          <p>Engineering Technologists &amp; Technicians</p>
          <a class="btn btn-primary btn-lg" href="why-member.php">Join SIET</a>
        </div> -->
      </div>

      <div class="carousel-item">
        <img
          src="images/SIET Logo and Banner/2.png"
          class="d-block w-100 hero-img" alt="Hero Slide 2" />
        <!-- <div class="carousel-caption">
          <h1>Professional Excellence</h1>
          <p>Integrity • Trust • Global Network</p>
          <a class="btn btn-primary btn-lg" href="professionalexaminations.php">Join SIET</a>
        </div> -->
      </div>

      <div class="carousel-item">
        <img
          src="images/SIET Logo and Banner/3.png"
          class="d-block w-100 hero-img" alt="Hero Slide 3" />
        <!-- <div class="carousel-caption">
          <h1>Connected Worldwide Since 1980</h1>
          <p>Global Partnerships &amp; Recognition</p>
          <a class="btn btn-primary btn-lg" href="global-affiliations.php">Explore Networks</a>
        </div> -->
      </div>

      <div class="carousel-item">
        <img
          src="images/SIET Logo and Banner/1.png"
          class="d-block w-100 hero-img" alt="Hero Slide 3" />
        <!-- <div class="carousel-caption">
          <h1>Connected Worldwide Since 1980</h1>
          <p>Global Partnerships &amp; Recognition</p>
          <a class="btn btn-primary btn-lg" href="global-affiliations.php">Explore Networks</a>
        </div> -->
      </div>

      <div class="carousel-item">
        <img
          src="images/SIET Logo and Banner/2.png"
          class="d-block w-100 hero-img" alt="Hero Slide 3" />
        <!-- <div class="carousel-caption">
          <h1>Connected Worldwide Since 1980</h1>
          <p>Global Partnerships &amp; Recognition</p>
          <a class="btn btn-primary btn-lg" href="global-affiliations.php">Explore Networks</a>
        </div> -->
      </div>
    </div>

    <!-- PREV / NEXT buttons -->
    <button class="carousel-control-prev" type="button"
            data-bs-target="#heroCarousel" data-bs-slide="prev" aria-label="Previous slide">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>

    <button class="carousel-control-next" type="button"
            data-bs-target="#heroCarousel" data-bs-slide="next" aria-label="Next slide">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>

  </div>
</section>


  <!-- ======================
       VISION / MISSION / VALUES
       ====================== -->
  <section class="py-5 section-soft text-center">
    <div class="container">
      <h2 class="section-title">Our Vision</h2>
      <p class="mb-4 text-muted">
        As a Global Professional Body for Engineering & ICT Technologists and Technicians with practical skills.
      </p>

      <hr class="my-4">

      <h2 class="section-title">Our Mission</h2>
      <p class="mb-4 text-muted">
        As the National Professional Body for Engineering Technologists and Technicians in Singapore to promote the Advancement of ICT Engineering and to advance the Profession of Engineering Technologists through Partnerships and Global Network.
      </p>

      <hr class="my-4">

      <h2 class="section-title">Our Core Values</h2>

      <div class="row mt-4 g-4">
        <!-- S -->
        <div class="col-12 col-md-6 col-lg-3">
          <div class="value-card">
            <div class="value-letter letter-s">S</div>
            <div class="value-title">Self-Discipline</div>
            <p class="value-line"><strong>Disiplin Diri</strong> </p>
            <p class="value-line"><strong>自律</strong> </p>
          </div>
        </div>

        <!-- I -->
        <div class="col-12 col-md-6 col-lg-3">
          <div class="value-card">
            <div class="value-letter letter-i">I</div>
            <div class="value-title">Impartiality</div>
            <p class="value-line"><strong>Keadilan</strong></p>
            <p class="value-line"><strong>公正</strong></p>
          </div>
        </div>

        <!-- E -->
        <div class="col-12 col-md-6 col-lg-3">
          <div class="value-card">
            <div class="value-letter letter-e">E</div>
            <div class="value-title">Excellence</div>
            <p class="value-line"><strong>Kecemeriangan</strong> </p>
            <p class="value-line"><strong>卓越</strong> </p>
          </div>
        </div>

        <!-- T -->
        <div class="col-12 col-md-6 col-lg-3">
          <div class="value-card">
            <div class="value-letter letter-t">T</div>
            <div class="value-title">Trustworthiness</div>
            <p class="value-line"><strong>Integriti</strong> </p>
            <p class="value-line"><strong>诚信</strong> </p>
          </div>
        </div>
      </div>

      <!-- ======================
           CHINESE MOTTO / VALUES BANNER
           ====================== -->
      <div class="values-motto-section mt-5">
        <div class="values-motto-oval" role="group" aria-label="Values motto banner">
          <div class="motto-item">
            <div class="motto-cn">饮水思源</div>
            <div class="motto-en">Remembering our roots &amp; be grateful</div>
          </div>

          <div class="motto-item">
            <div class="motto-cn">自强不息</div>
            <div class="motto-en">Strive for self-improvement Ceaselessly</div>
          </div>

          <div class="motto-item">
            <div class="motto-cn">厚德载物</div>
            <div class="motto-en">Embrace the world with great virtue</div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- ======================
     OUR GLOBAL PARTNERS & AFFILIATIONS
     ====================== -->
<section class="section-pad section-soft">
  <div class="container">

    <div class="d-flex align-items-end justify-content-between flex-wrap gap-2 mb-3">
      <div>
        <h2 class="section-title mb-1">Our Global Partners &amp; Affiliations</h2>
        <p class="text-muted mb-0">
          Working with respected professional bodies to strengthen recognition and collaboration worldwide.
        </p>
      </div>

      <a href="global-network.php" class="btn btn-outline-primary btn-sm rounded-pill">
        View Global Network
      </a>
    </div>

    <!-- Logo grid -->
    <div class="gp-grid">

      <!-- CARD 1 -->
      <a class="gp-card" href="https://www.wfto.org" target="_blank" rel="noopener">
        <div class="gp-logo">
          <img class="img-hover" src="images/Affiliated Organisations Logo/SIET Affiliations Logo/logoWFTO.jpg" alt="WFTO" />
        </div>
        <div class="gp-meta">
          <div class="gp-name">WFTO</div>
          <div class="gp-desc text-muted">World Federation of Technology Organizations</div>
        </div>
      </a>

      <!-- CARD 2 -->
      <a class="gp-card" href="https://www.mbot.org.my" target="_blank" rel="noopener">
        <div class="gp-logo">
          <img class="img-hover" src="images/Affiliated Organisations Logo/SIET Affiliations Logo/other-gplogo.PNG" alt="GTA / MBOT" />
        </div>
        <div class="gp-meta">
          <div class="gp-name">GTA</div>
          <div class="gp-desc text-muted">Global Technological Alliance (via MBOT)</div>
        </div>
      </a>

      <!-- CARD 3 -->
      <a class="gp-card" href="https://www.engineersaustralia.org.au/" target="_blank" rel="noopener">
        <div class="gp-logo">
          <img class="img-hover" src="images/Affiliated Organisations Logo/SIET Affiliations Logo/Engineers Australia Logo.svg" alt="Engineers Australia" />
        </div>
        <div class="gp-meta">
          <div class="gp-name">Engineers Australia</div>
          <div class="gp-desc text-muted">Professional registration pathways</div>
        </div>
      </a>

      <!-- CARD 4 -->
      <a class="gp-card" href="https://www.engc.org.uk/" target="_blank" rel="noopener">
        <div class="gp-logo">
          <img class="img-hover" src="images/Affiliated Organisations Logo/SIET Affiliations Logo/Engineering Council UK Logo.jpg" alt="Engineering Council UK" />
        </div>
        <div class="gp-meta">
          <div class="gp-name">Engineering Council (UK)</div>
          <div class="gp-desc text-muted">Recognized titles &amp; standards</div>
        </div>
      </a>

      <!-- CARD 5 -->
      <a class="gp-card" href="https://www.theiet.org/" target="_blank" rel="noopener">
        <div class="gp-logo">
          <img class="img-hover" src="images/Affiliated Organisations Logo/SIET Affiliations Logo/The-Institute-of-Engineering-and-Technology.png" alt="IET" />
        </div>
        <div class="gp-meta">
          <div class="gp-name">IET</div>
          <div class="gp-desc text-muted">Institution of Engineering and Technology</div>
        </div>
      </a>

      <!-- CARD 6 -->
      <a class="gp-card" href="https://asttbc.org/" target="_blank" rel="noopener">
        <div class="gp-logo">
          <img class="img-hover" src="images/Affiliated Organisations Logo/SIET Affiliations Logo/ASTTBC-Horizontal-Blue-Large-RGB.jpg" alt="ASTTBC" />
        </div>
        <div class="gp-meta">
          <div class="gp-name">ASTTBC</div>
          <div class="gp-desc text-muted">Technology Professionals (Canada)</div>
        </div>
      </a>

    </div>

    <div class="text-muted small mt-3 d-md-none">
      Tip: swipe to explore more partners.
    </div>

  </div>
</section>

<style>
  .motto-cn{
    font-size: 45px;
  }
  /* ======================
     Global Partners section
     ====================== */
  .gp-grid{
    display: grid;
    gap: 14px;
    grid-template-columns: repeat(3, minmax(0, 1fr));
  }

  .gp-card{
    display:flex;
    gap: 12px;
    align-items:center;
    text-decoration:none;
    background:#fff;
    border: 1px solid rgba(0,0,0,.08);
    border-radius: 16px;
    padding: 14px 14px;
    box-shadow: 0 10px 25px rgba(0,0,0,.06);
    transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
  }
  .gp-card:hover{
    transform: translateY(-2px);
    box-shadow: 0 18px 40px rgba(0,0,0,.12);
    border-color: rgba(13,110,253,.22);
  }

  .gp-logo{
    width: 84px;
    height: 58px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius: 14px;
    background: #f8fafc;
    border: 1px solid rgba(0,0,0,.06);
    overflow:hidden;
    flex: 0 0 auto;
  }
  .gp-logo img{
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 8px;
    background:#fff;
    max-height: 100%;
  }

  .gp-meta{ min-width: 0; }
  .gp-name{
    font-weight: 900;
    color: #111827;
    line-height: 1.1;
  }
  .gp-desc{
    font-size: .92rem;
    line-height: 1.25;
    margin-top: 2px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
  }

  /* ===== Responsive ===== */
  @media (max-width: 991.98px){
    .gp-grid{ grid-template-columns: repeat(2, minmax(0, 1fr)); }
    .gp-logo{ width: 78px; height: 56px; }
  }

  
  /* Mobile FIX for "OUR GLOBAL PARTNERS & AFFILIATIONS"  */
@media (max-width: 575.98px){

  /* Horizontal swipe list */
  .gp-grid{
    display: grid;
    grid-auto-flow: column;
    grid-auto-columns: 92%;        /* wider card so text doesn't get cut */
    grid-template-columns: none;
    overflow-x: auto;

    padding: 4px 12px 10px;        /* safe padding so edges not cut */
    gap: 12px;

    scroll-snap-type: x mandatory;
    -webkit-overflow-scrolling: touch;
  }

  /* Keep horizontal card layout */
  .gp-card{
    flex-direction: row;           /* keep logo left */
    align-items: center;
    gap: 12px;

    padding: 12px;
    min-height: 92px;              /* enough height for 2-3 lines */
    scroll-snap-align: start;
  }

  /*  small logo (like previous version) */
  .gp-logo{
    width: 60px;
    height: 46px;
    border-radius: 12px;
    flex: 0 0 auto;
  }

  .gp-logo img{
    padding: 6px;
  }

  /*  make text show fully */
  .gp-meta{
    min-width: 0;                  /* important for flex text wrap */
    flex: 1 1 auto;
  }

  .gp-name{
    font-size: 0.98rem;
    line-height: 1.15;
  }

  /* remove clamp so it won't hide text */
  .gp-desc{
    font-size: .9rem;
    line-height: 1.25;
    display: block;
    overflow: visible;
    -webkit-line-clamp: unset;
  }
}
</style>


</main>
<?php
include "footer.php";
?>