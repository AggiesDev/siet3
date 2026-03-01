<?php
  $active = 'news';
  $page_css = ['sections.css'];
  include 'header.php';
?>

<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2">Expert Services</h1>
    <p class="text-muted mb-0">
      Our members bring trusted expertise to the community, offering licensed and professional services that uphold safety, quality, and sustainable innovation.
    </p>
  </div>
</section>
<br>

<section class="section-pad">
  <div class="container">

    <!-- Intro / Hotline -->
    <div class="res-hero-card">
      <div class="res-hero-left">
        <div class="res-badge">Member Referral Platform</div>
        <h2 class="res-h2">Find trusted professionals quickly</h2>
        <p class="res-muted mb-0">
          Explore service categories below. For a referral and quote, contact our hotline.
        </p>

        <div class="res-cta">
          <a class="btn btn-primary btn-lg res-btn" href="tel:+6580373662">
            📞 Call Hotline: +6580373662
          </a>
          <a class="btn btn-outline-primary btn-lg res-btn" href="cert-application.php">
            Get Certified with SIET
          </a>
        </div>
      </div>

      <div class="res-hero-right">
        <div class="res-hotline-card">
          <div class="res-hotline-title">Need Assistance?</div>
          <div class="res-hotline-sub">Referral &amp; Quotation Support</div>
          <div class="res-hotline-number">+6580373662</div>
          <div class="res-hotline-note text-muted">
            Operating hours: Mon–Fri, 9:00 AM – 5:00 PM
          </div>
        </div>
      </div>
    </div>

    <!-- Categories -->
    <div class="row g-4 mt-2">

      <!-- 1) Built Environment & Safety -->
      <div class="col-lg-4">
        <div class="res-card h-100">
          <div class="res-card-head">
            <div class="res-card-icon" aria-hidden="true">🏢</div>
            <div class="res-card-head-text">
              <div class="res-card-title">Built Environment &amp; Safety</div>
              <div class="res-card-sub">Compliance • Inspections • Maintenance</div>
            </div>
          </div>

          <ul class="res-list">
            <li><span class="res-li-ico">❄️</span><span class="res-li-text">Air-condition Services</span></li>
            <li><span class="res-li-ico">🏢</span><span class="res-li-text">Building Maintenance Services</span></li>
            <li><span class="res-li-ico">🏠</span><span class="res-li-text">Home Renovation Services</span></li>
            <li><span class="res-li-ico">🛗</span><span class="res-li-text">Lift &amp; Escalator Inspection</span></li>
            <li><span class="res-li-ico">🎨</span><span class="res-li-text">Painting Services</span></li>
            <li><span class="res-li-ico">🏢</span><span class="res-li-text">Periodic Facade Inspection</span></li>
            <li><span class="res-li-ico">📝</span><span class="res-li-text">Pre- &amp; Post-Construction Condition Survey</span></li>
            <li><span class="res-li-ico">👷</span><span class="res-li-text">Qualified Persons Supervision Services</span></li>
            <li><span class="res-li-ico">🌱</span><span class="res-li-text">Safety &amp; Environmental Services</span></li>
          </ul>
        </div>
      </div>

      <!-- 2) Utilities & Infrastructure -->
      <div class="col-lg-4">
        <div class="res-card h-100">
          <div class="res-card-head">
            <div class="res-card-icon" aria-hidden="true">⚡</div>
            <div class="res-card-head-text">
              <div class="res-card-title">Utilities &amp; Infrastructure</div>
              <div class="res-card-sub">Licensed works • Detection • Systems</div>
            </div>
          </div>

          <ul class="res-list">
            <li><span class="res-li-ico">📹</span><span class="res-li-text">CCTV pipeline &amp; manholes inspection service</span></li>
            <li><span class="res-li-ico">⚙️</span><span class="res-li-text">Distribution Box Maker Services</span></li>
            <li><span class="res-li-ico">🔌</span><span class="res-li-text">Licensed Electrical Worker</span></li>
            <li><span class="res-li-ico">🚰</span><span class="res-li-text">Licensed Sanitary &amp; Plumbing</span></li>
            <li><span class="res-li-ico">⚡</span><span class="res-li-text">Licensed Electric Cable Jointing</span></li>
            <li><span class="res-li-ico">⚡</span><span class="res-li-text">Licensed Cable Detection</span></li>
            <li><span class="res-li-ico">📡</span><span class="res-li-text">Licensed Telecommunication Cable Detection Worker</span></li>
          </ul>
        </div>
      </div>

      <!-- 3) Specialist Expertise -->
      <div class="col-lg-4">
        <div class="res-card h-100">
          <div class="res-card-head">
            <div class="res-card-icon" aria-hidden="true">🧠</div>
            <div class="res-card-head-text">
              <div class="res-card-title">Specialist Expertise</div>
              <div class="res-card-sub">Digital • Audits • Modelling</div>
            </div>
          </div>

          <ul class="res-list">
            <li><span class="res-li-ico">🖥️</span><span class="res-li-text">AI Analytics services</span></li>
            <li><span class="res-li-ico">🌳</span><span class="res-li-text">Arborist, Tree Felling &amp; Landscaping Services</span></li>
            <li><span class="res-li-ico">🏗️</span><span class="res-li-text">BIM Modelling</span></li>
            <li><span class="res-li-ico">🌿</span><span class="res-li-text">Landscape Architecture</span></li>
            <li><span class="res-li-ico">🏢</span><span class="res-li-text">Data Centre Auditing</span></li>
            <li><span class="res-li-ico">♻️</span><span class="res-li-text">Energy Auditing &amp; GMP/LEED</span></li>
            <li><span class="res-li-ico">🌐</span><span class="res-li-text">Website Design &amp; Development</span></li>
          </ul>
        </div>
      </div>

    </div>

    <!-- Join Us -->
    <div class="res-join mt-4">
      <div class="res-join-text">
        <h3 class="res-h3 mb-1">Join Us</h3>
        <p class="mb-0 res-muted">
          Whether you are an existing member or a new professional, we welcome you to be certified with SIET and contribute your expertise.
          Suggestions to add on to members’ expert services are welcome. Together, we strengthen our professional network and extend meaningful support to society.
        </p>
      </div>
      <div class="res-join-actions">
        <a class="btn btn-primary res-btn-wide" href="cert-application.php">Apply for Certification</a>
        <a class="btn btn-outline-primary res-btn-wide" href="contact.php">Send a Suggestion</a>
      </div>
    </div>

    <!-- Disclaimer & Contribution Framework (Accordion) -->
    <div class="accordion res-acc mt-4" id="resAccordion">

      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Disclaimer &amp; Indemnity
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#resAccordion">
          <div class="accordion-body">
            <p class="res-muted">
              SIET is a professional body that provides a network and referral platform to connect the public with certified members offering specialised services.
              SIET does not act as a contractor, employer, agency, or principal consultant, and does not enter into service agreements on behalf of members.
            </p>

            <div class="res-callouts">
              <div class="res-callout">
                <div class="res-callout-title">No Contractual Role</div>
                <div class="res-muted mb-0">
                  SIET does not act as a contractor, employer, agency, or principal consultant, and does not enter into service agreements on behalf of members.
                </div>
              </div>

              <div class="res-callout">
                <div class="res-callout-title">No Technical Liability</div>
                <div class="res-muted mb-0">
                  All technical outcomes, performance, and service quality remain the sole responsibility of the engaged professional.
                </div>
              </div>

              <div class="res-callout">
                <div class="res-callout-title">Non-Profit Integrity</div>
                <div class="res-muted mb-0">
                  Contributions made to SIET are voluntary sponsorships or capped referral donations, not commissions or fees.
                  This ensures transparency, compliance, and protection of SIET’s non-profit standing.
                </div>
              </div>

              <div class="res-callout">
                <div class="res-callout-title">Community Assurance</div>
                <div class="res-muted mb-0">
                  By maintaining this framework, SIET upholds integrity, avoids regulatory risks, and ensures that both members and the institution remain safeguarded.
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Contribution Framework
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#resAccordion">
          <div class="accordion-body">
            <p class="res-muted">
              To sustain this initiative while remaining legally safe and transparent, members who receive opportunities through SIET may contribute in the following way:
            </p>

            <div class="res-callouts">
              <div class="res-callout">
                <div class="res-callout-title">Referral / Administration Contribution</div>
                <div class="res-muted mb-0">
                  A small, capped referral or administration contribution (maximum 10% or a fixed nominal amount depending on the task)
                  may be made voluntarily by the member to SIET as a sponsorship or donation.
                </div>
              </div>

              <div class="res-callout">
                <div class="res-callout-title">Non-Profit Integrity</div>
                <div class="res-muted mb-0">
                  These contributions are not commissions or service fees. This framework ensures transparency, compliance with regulatory requirements,
                  and protection of SIET’s non-profit standing.
                </div>
              </div>
            </div>

            <p class="res-muted mt-3 mb-0">
              By maintaining this framework, SIET upholds integrity, avoids regulatory risks, and safeguards the interests of both members and the institution.
              All contractual, financial, and technical obligations remain strictly between the client and the engaged professional.
            </p>
          </div>
        </div>
      </div>

    </div>

  </div>
</section>
<br>

<style>
  /* ===== resources2.php styling ===== */
  .res-hero-card{
    background:#fff;
    border:1px solid rgba(0,0,0,.10);
    border-radius:18px;
    box-shadow: 0 18px 38px rgba(0,0,0,.08);
    padding: 20px;
    display:grid;
    grid-template-columns: 1.3fr .7fr;
    gap: 18px;
    align-items:stretch;
  }

  .res-badge{
    display:inline-flex;
    align-items:center;
    padding: 8px 12px;
    border-radius: 999px;
    font-weight: 900;
    font-size: .85rem;
    color:#0b3dff;
    background: rgba(13,110,253,.08);
    border: 1px solid rgba(13,110,253,.18);
    margin-bottom: 10px;
  }

  .res-h2{
    font-weight: 900;
    letter-spacing: .2px;
    margin: 0 0 8px 0;
    color: #111827;
    font-size: clamp(1.35rem, 2.2vw, 2rem);
  }
  .res-h3{
    font-weight: 900;
    letter-spacing: .2px;
    color:#111827;
  }
  .res-muted{
    color:#6b7280;
    line-height:1.7;
  }

  .res-cta{
    display:flex;
    gap: 10px;
    flex-wrap: wrap;
    margin-top: 14px;
  }
  .res-btn{
    border-radius: 999px;
    font-weight: 800;
    padding: 10px 16px;
  }

  .res-hotline-card{
    height:100%;
    border-radius: 16px;
    border: 1px solid rgba(0,0,0,.10);
    background: linear-gradient(180deg, rgba(13,110,253,.10), rgba(255,255,255,1));
    padding: 16px;
    display:flex;
    flex-direction:column;
    justify-content:center;
    text-align:center;
  }
  .res-hotline-title{
    font-weight: 900;
    color:#111827;
    font-size: 1.05rem;
  }
  .res-hotline-sub{
    color:#6b7280;
    font-weight: 700;
    margin-top: 2px;
  }
  .res-hotline-number{
    font-weight: 900;
    font-size: 2rem;
    color:#0b3dff;
    margin-top: 8px;
    letter-spacing: .5px;
  }
  .res-hotline-note{
    font-size: .92rem;
    margin-top: 8px;
  }

  .res-card{
    background:#fff;
    border:1px solid rgba(0,0,0,.10);
    border-radius:18px;
    box-shadow: 0 16px 30px rgba(0,0,0,.08);
    padding: 18px;
    transition: transform .16s ease, box-shadow .16s ease, border-color .16s ease;
  }
  .res-card:hover{
    transform: translateY(-2px);
    box-shadow: 0 22px 44px rgba(0,0,0,.10);
    border-color: rgba(13,110,253,.20);
  }

  /* Header alignment (icon + title) */
  .res-card-head{
    display:grid;
    grid-template-columns: 56px 1fr;
    align-items:center;
    column-gap: 12px;
    margin-bottom: 12px;
    min-height: 64px;
  }
  .res-card-icon{
    width: 56px;
    height: 56px;
    display:grid;
    place-items:center;
    border-radius: 14px;
    background: rgba(13,110,253,.10);
    border: 1px solid rgba(13,110,253,.18);
    font-size: 26px;
    line-height: 1;
  }
  .res-card-title{
    font-weight: 900;
    color:#111827;
    line-height:1.2;
    font-size: 1.05rem;
  }
  .res-card-sub{
    color:#6b7280;
    font-weight: 700;
    font-size: .92rem;
    margin-top: 2px;
    line-height: 1.3;
  }

  /* ✅ FIX LIST: no mixed icon/text on wrap */
  .res-list{
    list-style: none;     /* remove default bullets */
    padding: 0;
    margin: 0;
    display: grid;
    gap: 10px;
  }
  .res-list li{
    display: grid;
    grid-template-columns: 22px 1fr; /* icon column + text column */
    align-items: start;
    gap: 10px;
  }
  .res-li-ico{
    display: inline-grid;
    place-items: center;
    width: 22px;
    height: 22px;
    line-height: 1;
    font-size: 18px;
    margin-top: 1px; /* optical alignment */
  }
  .res-li-text{
    line-height: 1.6;
    color:#111827;
    min-width: 0;
  }

  .res-join{
    background: #fff;
    border: 1px solid rgba(0,0,0,.10);
    border-radius: 18px;
    box-shadow: 0 16px 30px rgba(0,0,0,.08);
    padding: 18px;
    display:flex;
    align-items:flex-start;
    justify-content: space-between;
    gap: 14px;
  }
  .res-join-actions{
    display:flex;
    flex-direction: column;
    gap: 10px;
    min-width: 240px;
  }
  .res-btn-wide{
    border-radius: 999px;
    font-weight: 800;
    padding: 10px 16px;
    width:100%;
    white-space: nowrap;
  }

  .res-acc .accordion-item{
    border-radius: 18px;
    overflow:hidden;
    border: 1px solid rgba(0,0,0,.10);
    box-shadow: 0 16px 30px rgba(0,0,0,.08);
    margin-bottom: 12px;
  }
  .res-acc .accordion-button{
    font-weight: 900;
    padding: 14px 16px;
  }

  .res-callouts{
    display:grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-top: 12px;
  }
  .res-callout{
    border: 1px solid rgba(0,0,0,.08);
    border-radius: 16px;
    padding: 14px;
    background: rgba(17,24,39,.02);
  }
  .res-callout-title{
    font-weight: 900;
    color:#111827;
    margin-bottom: 6px;
  }

  @media (max-width: 991.98px){
    .res-hero-card{ grid-template-columns: 1fr; }
    .res-join{ flex-direction: column; }
    .res-join-actions{ width:100%; min-width: 0; }
    .res-callouts{ grid-template-columns: 1fr; }
  }

  @media (max-width: 575.98px){
    .res-card-head{
      grid-template-columns: 52px 1fr;
      min-height: 60px;
    }
    .res-card-icon{
      width: 52px;
      height: 52px;
      font-size: 24px;
    }
  }
</style>

<?php include 'footer.php'; ?>