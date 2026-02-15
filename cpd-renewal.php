<?php
  $active = 'cert'; 
  $page_css = ['sections.css'];
  include 'header.php';
?>

<!-- ======================
     CPD RENEWAL
     ====================== -->
<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2">Professional Development (CPD)</h1>
    <p class="text-muted mb-0">Renewal of Professional Registration</p>
  </div>
</section>

<section class="section-pad">
  <div class="container">

    <div class="cpd-frame">
      <div class="cpd-inner">

        <h2 class="cpd-main-title">Professional Development (CPD)</h2>

        <div class="cpd-subhead">
          <span class="cpd-subhead-text">Renewal of Professional Registration</span>
          <span class="cpd-subtag"></span>
        </div>

        <div class="cpd-block">
          <div class="cpd-num">1.0</div>
          <div class="cpd-content">
            <h3 class="cpd-h">Introduction</h3>

            <p class="cpd-p">
              Certified Professionals are required to accumulate a minimum number of CPD hours for the renewal of the
              professional registration. The CPD activities must be relevant to the enhancement and competency of
              registrants. The CPD application should cover the related Technical areas and <strong>not limited</strong>
              to the field registered and existing programmes approved by SIET Executive Council.
            </p>

            <p class="cpd-p mb-0">
              The objective of this requirement is to ensure that SIET’s Certified Professionals constantly improve and upgrade
              their knowledge and skills. The formulation of the CPD is based on the industry requirements after going through
              a strict verification cycle.
            </p>
          </div>
        </div>

        <div class="cpd-divider"></div>

        <div class="cpd-block">
          <div class="cpd-num">2.0</div>
          <div class="cpd-content">
            <h3 class="cpd-h">Renewal</h3>

            <div class="cpd-callout">
              <div class="cpd-callout-title">Minimum Requirement</div>
              <div class="cpd-callout-text">
                All members registered under SIET Certification Scheme are required to attend
                <strong>at least 20 PDU units</strong> or its equivalent over a period of three consecutive years to renew its registration.
                <span class="cpd-bracket">[ 1 PDU = 3 hours of CPD ]</span>
              </div>
            </div>

            <p class="cpd-p mb-0">
              SIET Professional Certification remains valid only when the Certified Professional continues to be a registered
              and current member of SIET. Membership renewal and good standing are essential to uphold the integrity,
              ethics recognition, and professional status conferred by the certification.
            </p>
          </div>
        </div>

      </div>
    </div>

    <!-- Back button section (reusable) -->
    <!-- <div class="mt-4 text-center">
      <a href="javascript:history.back()" class="btn btn-outline-primary cpd-back-btn">
        ← Back
      </a>
    </div> -->

  </div>
</section>

<style>
  /* =========================
     CPD RENEWAL
     ========================= */

  .cpd-frame{
    background: #fff;
    border: 3px solid #111;
    border-radius: 10px;
    box-shadow: 0 18px 35px rgba(0,0,0,.08);
    padding: 18px;
  }

  .cpd-inner{
    background: #fff;
    border-radius: 8px;
  }

  .cpd-main-title{
    font-weight: 900;
    font-size: clamp(1.8rem, 2.8vw, 3.2rem);
    text-align: center;
    margin: 4px 0 14px;
    color: #111;
    text-shadow: 2px 2px 0 rgba(0,0,0,.18);
  }

  .cpd-subhead{
    display: flex;
    align-items: baseline;
    gap: 10px;
    flex-wrap: wrap;
    margin: 0 0 18px;
    padding-bottom: 10px;
    border-bottom: 3px solid #111;
  }

  .cpd-subhead-text{
    font-weight: 900;
    font-size: 1.35rem;
    color: #111;
    text-decoration: underline;
    text-decoration-thickness: 3px;
    text-underline-offset: 5px;
  }

  .cpd-subtag{
    font-weight: 900;
    color: #ff2f7a;
    font-size: 1.25rem;
  }

  .cpd-block{
    display: grid;
    grid-template-columns: 70px 1fr;
    gap: 14px;
    padding: 10px 6px;
  }

  .cpd-num{
    font-weight: 900;
    font-size: 1.15rem;
    color: #111;
    padding-top: 2px;
  }

  .cpd-h{
    font-weight: 900;
    font-size: 1.25rem;
    margin: 0 0 8px;
    color: #111;
  }

  .cpd-p{
    font-size: 1.05rem;
    line-height: 1.75;
    color: #111;
    margin-bottom: 14px;
  }

  .cpd-underline{
    border-bottom: 2px solid #ff2f7a;
    padding-bottom: 1px;
  }

  .cpd-divider{
    height: 1px;
    background: rgba(0,0,0,.25);
    margin: 6px 0 2px;
  }

  .cpd-callout{
    border: 2.5px solid #111;
    border-radius: 10px;
    padding: 14px 14px 12px;
    margin: 6px 0 16px;
    background: #fff;
  }

  .cpd-callout-title{
    font-weight: 900;
    margin-bottom: 6px;
    color: #111;
    font-size: 1.05rem;
  }

  .cpd-callout-text{
    font-size: 1.05rem;
    line-height: 1.7;
    color: #111;
  }

  .cpd-bracket{
    font-weight: 900;
    margin-left: 6px;
  }

  .cpd-back-btn{
    font-weight: 900;
    padding: 10px 18px;
    border-width: 2px;
    border-radius: 999px;
  }

  @media (max-width: 576px){
    .cpd-block{ grid-template-columns: 54px 1fr; }
    .cpd-subhead-text{ font-size: 1.15rem; }
    .cpd-subtag{ font-size: 1.05rem; }
  }
</style>

<?php include 'footer.php'; ?>
