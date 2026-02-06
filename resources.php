<?php
  // If you later add a Resources menu, change to: $active = 'news' or 'resources'
  $active = 'news';
  $page_css = ['sections.css'];
  include 'header.php';
?>

<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2">Resources</h1>
    <p class="text-muted mb-0">Expert services provided by SIET members to support the community.</p>
  </div>
</section>

<section class="section-pad">
  <div class="container resources-wrap">

    <!-- Intro -->
    <div class="lead-card resources-intro-card">
      <div class="resources-intro-top">
        <div>
          <div class="resources-kicker">Expert Services</div>
          <p class="resources-lead mb-0">
            SIET members are proud to provide a wide range of licensed and professional services that uphold safety, quality and innovation.
            These services reflect our collective expertise and commitment to supporting the community.
          </p>
        </div>

        <div class="resources-hotline">
          <div class="resources-hotline-label">Hotline</div>
          <a class="resources-hotline-num" href="tel:12345678">12345678</a>
          <div class="resources-hotline-sub">For enquiry / quotation</div>
        </div>
      </div>
    </div>

    <!-- Grid of sections -->
    <div class="row g-4 mt-1">

      <!-- 1 -->
      <div class="col-lg-6">
        <div class="resources-card card-hover h-100">
          <div class="resources-card-head">
            <span class="resources-badge">01</span>
            <div>
              <h2 class="resources-h2 mb-0">Built Environment &amp; Safety</h2>
              <div class="resources-sub">Services related to inspection, safety and supervision.</div>
            </div>
          </div>

          <ol class="resources-alpha" type="a">
            <li>Home Renovation Services</li>
            <li>Lift &amp; Escalator Inspection</li>
            <li>Painting Services</li>
            <li>Periodic Facade Inspection</li>
            <li>Pre- &amp; Post-Construction Condition Survey</li>
            <li>Qualified Supervision Services</li>
            <li>Safety &amp; Environmental Services</li>
          </ol>
        </div>
      </div>

      <!-- 2 -->
      <div class="col-lg-6">
        <div class="resources-card card-hover h-100">
          <div class="resources-card-head">
            <span class="resources-badge">02</span>
            <div>
              <h2 class="resources-h2 mb-0">Utilities &amp; Infrastructure</h2>
              <div class="resources-sub">Licensed trades and detection services.</div>
            </div>
          </div>

          <ol class="resources-alpha" type="a">
            <li>Distribution Box Maker</li>
            <li>Licensed Electrical Worker</li>
            <li>Licensed Plumber</li>
            <li>Licensed Electric Cable Jointer</li>
            <li>Licensed Cable Detection</li>
            <li>Telecommunication Cable Detection Worker’s License</li>
          </ol>
        </div>
      </div>

      <!-- 3 -->
      <div class="col-lg-12">
        <div class="resources-card card-hover">
          <div class="resources-card-head">
            <span class="resources-badge">03</span>
            <div>
              <h2 class="resources-h2 mb-0">Specialist Expertise</h2>
              <div class="resources-sub">Professional specialist services for industry and technical work.</div>
            </div>
          </div>

          <ol class="resources-alpha" type="a">
            <li>Arborist</li>
            <li>Landscape Architecture</li>
            <li>Data Centre Auditing</li>
            <li>Energy Auditing &amp; GMP/LEED</li>
            <li>Website Design &amp; Development</li>
          </ol>
        </div>
      </div>

    </div>

    <!-- Join Us CTA -->
    <div class="resources-cta mt-4">
      <div class="resources-cta-inner">
        <div>
          <h3 class="resources-cta-title mb-1">Join Us</h3>
          <p class="resources-cta-text mb-0">
            We welcome both members and non-members to be Certified with SIET and contribute your specialist expertise.
            Suggestions to add-on to the above services are welcome. Together, we strengthen this network and extend meaningful support to the community.
          </p>
        </div>

        <div class="resources-cta-actions">
          <a class="btn btn-primary btn-download" href="contact.php">
            Contact SIET
          </a>
          <a class="btn btn-outline-primary btn-download" href="why-member.php" style="background:none;">
            Become a Member
          </a>
        </div>
      </div>
    </div>

  </div>
</section>

<style>
  /* =========================================================
     RESOURCES — Modern, user-friendly, responsive
     ========================================================= */

  .resources-wrap{ max-width: 1100px; }

  .resources-intro-card{
    position: relative;
    overflow: hidden;
  }

  /* subtle background glow */
  .resources-intro-card::before{
    content:"";
    position:absolute;
    inset:-40px;
    background: radial-gradient(circle at 20% 10%, rgba(13,110,253,.12), transparent 55%),
                radial-gradient(circle at 85% 35%, rgba(6,182,212,.10), transparent 55%);
    pointer-events:none;
  }

  .resources-intro-top{
    position: relative;
    display:flex;
    gap: 18px;
    align-items:flex-start;
    justify-content: space-between;
  }

  .resources-kicker{
    font-weight: 800;
    letter-spacing: .2px;
    font-size: 14px;
    color: #0b2a4a;
    margin-bottom: 6px;
  }

  .resources-lead{
    font-size: 15px;
    line-height: 1.75;
    color: #111827;
    max-width: 780px;
  }

  .resources-hotline{
    min-width: 220px;
    background: rgba(255,255,255,.72);
    border: 1px solid rgba(15,23,42,.08);
    border-radius: 16px;
    padding: 12px 14px;
    box-shadow: 0 14px 34px rgba(0,0,0,.08);
    backdrop-filter: blur(8px);
    text-align: center;
    transition: transform .18s ease, box-shadow .18s ease;
  }

  .resources-hotline:hover{
    transform: translateY(-2px);
    box-shadow: 0 18px 44px rgba(0,0,0,.12);
  }

  .resources-hotline-label{
    font-size: 12px;
    font-weight: 800;
    color: rgba(17,24,39,.7);
    text-transform: uppercase;
    letter-spacing: .6px;
  }

  .resources-hotline-num{
    display:inline-block;
    margin-top: 3px;
    font-weight: 900;
    font-size: 22px;
    color: #d11a2a;
    text-decoration:none;
    padding: 2px 10px;
    border-radius: 999px;
    background: rgba(209,26,42,.08);
    border: 1px dashed rgba(209,26,42,.35);
  }
  .resources-hotline-num:hover{
    text-decoration: underline;
    background: rgba(209,26,42,.12);
  }

  .resources-hotline-sub{
    font-size: 12px;
    margin-top: 6px;
    color: rgba(17,24,39,.65);
  }

  /* Cards */
  .resources-card{
    background: #fff;
    border-radius: 18px;
    padding: 18px 18px 14px;
    border: 1px solid rgba(15,23,42,.10);
    box-shadow: 0 12px 28px rgba(0,0,0,.06);
    transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
    position: relative;
    overflow: hidden;
  }

  .resources-card::after{
    content:"";
    position:absolute;
    top:0; left:0; right:0;
    height: 4px;
    background: linear-gradient(90deg, rgba(13,110,253,.95), rgba(6,182,212,.9));
    opacity: .85;
  }

  .resources-card:hover{
    transform: translateY(-2px);
    box-shadow: 0 18px 42px rgba(0,0,0,.10);
    border-color: rgba(13,110,253,.18);
  }

  .resources-card-head{
    display:flex;
    gap: 12px;
    align-items: center;
    margin-bottom: 10px;
    padding-top: 6px;
  }

  .resources-badge{
    width: 44px;
    height: 44px;
    border-radius: 14px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight: 900;
    color: #0b2a4a;
    background: rgba(13,110,253,.10);
    border: 1px solid rgba(13,110,253,.18);
    flex: 0 0 auto;
  }

  .resources-h2{
    font-size: 17px;
    font-weight: 900;
    color: #111827;
  }

  .resources-sub{
    font-size: 13px;
    color: rgba(17,24,39,.65);
    margin-top: 2px;
  }

  /* a) lists */
  .resources-alpha{
    margin: 10px 0 0;
    padding-left: 28px;
    font-size: 14px;
    line-height: 1.75;
    color: #111827;
    column-gap: 34px;
  }

  .resources-alpha li{
    padding-left: 6px;
    margin: 2px 0;
  }

  /* 2 columns on desktop for long lists */
  @media (min-width: 992px){
    .resources-alpha{
      columns: 2;
    }
  }

  /* CTA */
  .resources-cta{
    background: linear-gradient(135deg, rgba(13,110,253,.08), rgba(6,182,212,.07));
    border: 1px solid rgba(15,23,42,.10);
    border-radius: 20px;
    padding: 18px;
    box-shadow: 0 14px 34px rgba(0,0,0,.06);
  }

  .resources-cta-inner{
    display:flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
  }

  .resources-cta-title{
    font-weight: 900;
    font-size: 18px;
    color: #111827;
  }

  .resources-cta-text{
    color: rgba(17,24,39,.75);
    line-height: 1.7;
    font-size: 14px;
    max-width: 780px;
  }

  .resources-cta-actions{
    display:flex;
    gap: 10px;
    flex-wrap: wrap;
    justify-content: flex-end;
  }

  /* Mobile adjustments */
  @media (max-width: 991.98px){
    .resources-intro-top{
      flex-direction: column;
    }
    .resources-hotline{
      width: 100%;
      text-align: left;
      padding: 12px 14px;
    }
    .resources-hotline-num{
      display:inline-flex;
      margin-top: 6px;
    }
    .resources-cta-inner{
      flex-direction: column;
      align-items: flex-start;
    }
    .resources-cta-actions{
      width: 100%;
      justify-content: flex-start;
    }
    .resources-alpha{
      columns: 1;
    }
  }
</style>

<?php include 'footer.php'; ?>
