<?php
  $active = 'global';
  $page_css = ['sections.css'];
  include 'header.php';
?>

<section class="page-hero">
  <div class="container py-5">
    <div class="d-flex align-items-center gap-3 flex-wrap">
      <div class="globe-icon" aria-hidden="true">🌍</div>
      <div>
        <h1 class="mb-1">International Recognitions</h1>
        <p class="text-muted mb-0">
          Suitably qualified SIET members may apply for professional registration with leading international bodies,
          affirming their recognition on the global stage.
        </p>
      </div>
    </div>
  </div>
</section>

<section class="section-pad">
  <div class="container">

    <div class="row g-4">
      <!-- AUSTRALIA -->
      <div class="col-lg-6">
        <div class="ir-card h-100">
          <div class="ir-card-head">
            <h2 class="ir-country mb-0">Australia</h2>
          </div>

          <div class="ir-card-body">
            <div class="ir-row">
              <div class="ir-label">Registration Body</div>
              <div class="ir-value">
                Engineers Australia
                <a class="ir-link"
                   href="https://www.engineersaustralia.org.au/"
                   target="_blank" rel="noopener">
                  (https://www.engineersaustralia.org.au/)
                </a>
              </div>
            </div>

            <hr class="ir-divider">

            <div class="ir-label mb-2">Recognized titles</div>
            <ul class="ir-list">
              <li>
                <span class="ir-badge ir-badge-blue">CPEng</span>
                Chartered Professional Engineer
              </li>
              <li>
                <span class="ir-badge ir-badge-purple">CEngT</span>
                Chartered Engineering Technologist
              </li>
              <li>
                <span class="ir-badge ir-badge-green">CEngA</span>
                Chartered Engineering Associate
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- UNITED KINGDOM -->
      <div class="col-lg-6">
        <div class="ir-card h-100">
          <div class="ir-card-head">
            <h2 class="ir-country mb-0">United Kingdom</h2>
          </div>

          <div class="ir-card-body">
            <div class="ir-row">
              <div class="ir-label">Registration Body</div>
              <div class="ir-value">
                The Engineering Council UK
                <a class="ir-link"
                   href="https://www.engc.org.uk/"
                   target="_blank" rel="noopener">
                  (https://www.engc.org.uk/)
                </a>
              </div>
            </div>

            <hr class="ir-divider">

            <div class="ir-label mb-2">Recognized titles</div>
            <ul class="ir-list">
              <li>
                <span class="ir-badge ir-badge-blue">CEng</span>
                Chartered Engineer
              </li>
              <li>
                <span class="ir-badge ir-badge-purple">IEng</span>
                Incorporated Engineer
              </li>
              <li>
                <span class="ir-badge ir-badge-green">EngTech</span>
                Engineering Technician
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- ROYAL CHARTER NOTE -->
      <div class="col-12">
        <div class="ir-callout">
          <div class="ir-callout-title">The Royal Charter Certifications</div>
          <div class="ir-callout-text">
            Through these pathways, SIET members may attain internationally respected certifications under
            <strong>Royal Charter</strong>.
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<style>
  /* =========================================================
     International Recognitions (User-friendly layout)
     ========================================================= */

  .globe-icon{
    width: 54px;
    height: 54px;
    border-radius: 14px;
    display: grid;
    place-items: center;
    background: rgba(13,110,253,.10);
    border: 1px solid rgba(13,110,253,.22);
    font-size: 28px;
  }

  .ir-card{
    background: #fff;
    border: 1px solid rgba(0,0,0,.12);
    border-radius: 14px;
    box-shadow: 0 16px 34px rgba(0,0,0,.08);
    overflow: hidden;
  }

  .ir-card-head{
    padding: 14px 16px;
    background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
    border-bottom: 1px solid rgba(0,0,0,.10);
  }

  .ir-country{
    font-weight: 900;
    letter-spacing: .2px;
    font-size: 1.35rem;
  }

  .ir-card-body{
    padding: 16px;
  }

  .ir-row{
    display: grid;
    grid-template-columns: 160px 1fr;
    gap: 12px;
    align-items: start;
  }

  .ir-label{
    font-weight: 800;
    color: #111827;
  }

  .ir-value{
    color: #111827;
    font-weight: 600;
    line-height: 1.5;
  }

  .ir-link{
    color: #0b5ed7;
    text-decoration: underline;
    font-weight: 700;
    word-break: break-word;
  }
  .ir-link:hover{ color: #084db2; }

  .ir-divider{
    margin: 14px 0;
    opacity: .15;
  }

  .ir-list{
    list-style: none;
    padding-left: 0;
    margin: 0;
    display: grid;
    gap: 12px;
  }

  .ir-list li{
    display: flex;
    gap: 10px;
    align-items: center;
    background: #f8fafc;
    border: 1px solid rgba(0,0,0,.08);
    border-radius: 12px;
    padding: 10px 12px;
  }

  .ir-badge{
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 70px;
    padding: 6px 10px;
    border-radius: 10px;
    font-weight: 900;
    letter-spacing: .3px;
    border: 1px solid rgba(0,0,0,.10);
  }

  .ir-badge-blue{
    background: rgba(13,110,253,.14);
    color: #0b5ed7;
    border-color: rgba(13,110,253,.22);
  }

  .ir-badge-purple{
    background: rgba(124,58,237,.14);
    color: #6d28d9;
    border-color: rgba(124,58,237,.22);
  }

  .ir-badge-green{
    background: rgba(34,197,94,.14);
    color: #15803d;
    border-color: rgba(34,197,94,.22);
  }

  .ir-callout{
    background: #ffffff;
    border: 1px solid rgba(0,0,0,.12);
    border-left: 6px solid #0b5ed7;
    border-radius: 14px;
    box-shadow: 0 14px 30px rgba(0,0,0,.06);
    padding: 16px;
  }

  .ir-callout-title{
    font-weight: 900;
    font-size: 1.2rem;
    margin-bottom: 6px;
  }

  .ir-callout-text{
    color: #111827;
    font-weight: 600;
    line-height: 1.6;
  }

  @media (max-width: 575.98px){
    .ir-row{
      grid-template-columns: 1fr;
    }
    .ir-country{
      font-size: 1.2rem;
    }
    .globe-icon{
      width: 48px;
      height: 48px;
      border-radius: 12px;
      font-size: 24px;
    }
  }
</style>

<?php include 'footer.php'; ?>
