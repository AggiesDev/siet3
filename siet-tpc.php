<?php
  $active = 'cert';
  $page_css = ['sections.css'];
  include 'header.php';
?>

<main>

  <!-- ======================
       PAGE HERO
       ====================== -->
  <section class="page-hero">
    <div class="container py-5">
      <h1 class="mb-2">SIET Test of Professional Competence (SIET – TPC)</h1>
      <p class="text-muted mb-0">
        Assessment options, preparation reference, and exemption pathways under SIET Professional Certifications.
      </p>
    </div>
  </section>


  <!-- ======================
       Assessment Options 
       ====================== -->
  <section class="section-pad">
    <div class="container">

      <div class="tpc-assessment-card">
        <div class="tpc-assessment-inner">

          <div class="tpc-assess-top">
            <div class="tpc-assess-star">Certification Assessment</div>
          </div>

          <div class="tpc-assess-mid">
            <div class="tpc-assess-title">
              Test of Professional Competence<br>
              <span class="tpc-assess-sub">(Engineering Ethics)</span>
            </div>
          </div>

          <div class="tpc-assess-list">
            <div class="tpc-assess-item">
              <span class="tpc-num">1.</span>
              <span class="tpc-text">Part A : MCQs + Case Studies</span>
            </div>

            <div class="tpc-assess-or">or</div>

            <div class="tpc-assess-item">
              <span class="tpc-num">2.</span>
              <span class="tpc-text">Part B: Professional Report + Interview</span>
            </div>
          </div>

        </div>
      </div>

    </div>
  </section>


  <!-- ======================
       Preparation Reference 
       ====================== -->
  <section class="section-pad pt-0">
    <div class="container">

      <div class="tpc-ref-wrap">
        <p class="tpc-ref-lead">
          To assist the preparation of Engineering Ethics examination, applicants are encouraged to read up
          <strong>“Engineering Ethics in Practice: a guide for engineers”</strong> published by Engineering Council, UK.
        </p>

        <div class="row g-4 align-items-start">
          <!-- LEFT: cover + note + download -->
          <div class="col-lg-4">
            <div class="tpc-cover-card">
              <img
                src="images/cert/tcppdf.PNG"
                alt="Engineering Ethics in Practice cover"
                class="tpc-cover-img"
              />

              <!-- <div class="tpc-red-note">
                Please attach the above file in SIET website for reference.
              </div> -->

              <!-- <a
                class="btn btn-primary tpc-download-btn"
                href="assets/pdfs/Engineering Ethics in practice - A Guide for Engineers.pdf"
                download
              >
                Download PDF Reference
              </a> -->
            </div>
          </div>

          <!-- RIGHT: article excerpt style -->
          <div class="col-lg-8">
            <div class="tpc-article-card">
              <div class="tpc-article-head">Engineering ethics in practice</div>

              <div class="tpc-article-body">
                <p class="tpc-article-p">
                  The Engineering Council is circulating and promoting a new document from the Royal Academy of Engineering on
                  <em>Engineering Ethics in Practice: a guide to engineers</em>. The document includes case studies and discussions
                  on ethical situations a professional engineer may encounter.
                </p>

                <p class="tpc-article-p">
                  For existing registered Engineering professionals the document is a well-written and useful guide. Moreover, reading this document
                  would contribute towards Continued Professional Development (CPD).
                </p>

                <div class="tpc-article-footer">
                  <!-- <span class="tpc-footer-text">You can download a PDF copy using the button on the left.</span> -->
                  <a
                class="btn btn-primary tpc-download-btn"
                href="assets/pdfs/Engineering Ethics in practice - A Guide for Engineers.pdf"
                download
              >
                Download PDF Reference
              </a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>


  <!-- ======================
Exemptions / Recognition Pathways
       ====================== -->
  <section class="section-pad pt-0">
    <div class="container">

      <div class="tpc-slide-block">
        <h2 class="tpc-slide-title">SIET Professional Certifications</h2>

        <!-- QSS / IES-ACES / BCA -->
        <div class="tpc-slide-card">
          <p class="tpc-slide-para">
            Qualified Site Supervisors (QSS) accredited by <strong>IES-ACES</strong> under the Building Control Act (BCA),
            Chapter 29, who register with the SIET Certification Scheme, may be <strong>exempted from the SIET-TPC</strong>.
          </p>

          <ul class="tpc-colored-list">
            <li class="tpc-bullet-blue">
              <span class="tpc-bullet-dot"></span>
              <span>
                Resident Engineer (RE) <span style="font-weight: normal; color: black;">can be registered as SIET Certified Technical Specialist
                (<span class="tpc-underline">CertTS</span>)</span>
              </span>
            </li>

            <li class="tpc-bullet-pink">
              <span class="tpc-bullet-dot"></span>
              <span>
                Resident Technical Officer (RTO) <span style="font-weight: normal; color: black;">can be registered as SIET Certified Engineering Technologists
                (<span class="tpc-underline">CertET</span>)</span>
              </span>
            </li>
          </ul>
        </div>

        <!-- EMA / LEW -->
        <div class="tpc-slide-card mt-4">
          <p class="tpc-slide-para">
            Energy Market Authority (EMA) approved <strong>Licensed Electrical Worker (LEW)</strong> may be
            <strong>exempted from the SIET-TPC</strong>.
          </p>

          <div class="tpc-lew-group">
            <div class="tpc-lew-item">
              <div class="tpc-lew-head">LEW (Grade 9):</div>
              <ul class="tpc-black-list">
                <li>
                  Can apply to become SIET Certified Technical Specialist with proven track records of complex projects and substantial practical experience
                </li>
              </ul>
            </div>

            <div class="tpc-lew-item">
              <div class="tpc-lew-head">LEW (Grade 8):</div>
              <ul class="tpc-black-list">
                <li>Can apply to become SIET Certified Engineering Technologist</li>
                <li>
                  Can apply to become SIET Certified Engineering Technologist with proven track records of complex projects and substantial practical experience
                </li>
              </ul>
            </div>

            <div class="tpc-lew-item">
              <div class="tpc-lew-head">LEW (Grade 7):</div>
              <ul class="tpc-black-list">
                <li>Can apply to become SIET Certified Engineering Associate</li>
                <li>
                  Can apply to become SIET Certified Engineering Technologists with proven track records of complex projects and substantial practical experience and leadership
                </li>
              </ul>
            </div>
          </div>

        </div>

      </div>

    </div>
  </section>


  <!-- ======================
       PAGE CSS 
       ====================== -->
  <style>
    /* ============ Assessment Options (Slide look) ============ */
    .tpc-assessment-card{
      background:#fff;
      border: 2px solid #111827;
      box-shadow: 0 18px 35px rgba(0,0,0,.10);
    }
    .tpc-assessment-inner{
      margin: 10px;
      border: 3px solid #111;
      background: #ccffcc;
      padding: 26px 18px 28px;
      text-align: center;
    }

    .tpc-assess-star{
      font-weight: 900;
      font-size: 3rem;
      line-height: 1.1;
      color: #ff0000;
      text-shadow: 2px 2px 0 rgba(0,0,0,.12);
      margin-bottom: 6px;
    }

    .tpc-assess-title{
      font-weight: 900;
      font-size: 3.0rem;
      color: #003cff;
      text-shadow: 2px 2px 0 rgba(0,0,0,.12);
      line-height: 1.15;
      margin: 10px 0 14px;
    }

    .tpc-assess-list{ margin-top: 8px; }

    .tpc-assess-item{
      display: inline-flex;
      gap: 10px;
      align-items: baseline;
      justify-content: center;
      font-weight: 900;
      font-size: 2.2rem;
      color: #2b2b2b;
      text-shadow: 2px 2px 0 rgba(0,0,0,.12);
      margin: 10px 0;
      flex-wrap: wrap;
    }

    .tpc-assess-or{
      font-weight: 900;
      font-size: 2.3rem;
      color: #111;
      text-shadow: 2px 2px 0 rgba(0,0,0,.12);
      margin: 8px 0;
    }

    @media (max-width: 992px){
      .tpc-assess-star{ font-size: 2.3rem; }
      .tpc-assess-title{ font-size: 2.1rem; }
      .tpc-assess-item{ font-size: 1.55rem; }
      .tpc-assess-or{ font-size: 1.65rem; }
    }

    /* ============ Preparation Reference ============ */
    .tpc-ref-wrap{
      background:#fff;
      border: 2px solid #111827;
      box-shadow: 0 18px 35px rgba(0,0,0,.08);
      padding: 18px;
      border-radius: 12px;
    }

    .tpc-ref-lead{
      margin: 0 0 14px 0;
      line-height: 1.65;
      color: #111;
      font-size: 1.05rem;
    }

    .tpc-cover-card{
      border: 1px solid rgba(0,0,0,.12);
      border-radius: 12px;
      padding: 12px;
      background: #fff;
      box-shadow: 0 12px 22px rgba(0,0,0,.06);
    }

    .tpc-cover-img{
      width: 100%;
      height: auto;
      display: block;
      border-radius: 10px;
      border: 1px solid rgba(0,0,0,.10);
      background: #fff;
    }

    .tpc-red-note{
      margin-top: 10px;
      color: #ff0000;
      font-weight: 800;
      font-size: .95rem;
      line-height: 1.35;
    }

    .tpc-download-btn{
      margin-top: 12px;
      width: 100%;
      font-weight: 900;
      border-radius: 12px;
      padding: 10px 14px;
      box-shadow: 0 12px 22px rgba(0,0,0,.10);
    }

    .tpc-article-card{
      border: 1px solid rgba(0,0,0,.12);
      border-radius: 12px;
      background: #fff;
      box-shadow: 0 12px 22px rgba(0,0,0,.06);
      overflow: hidden;
    }

    .tpc-article-head{
      font-weight: 900;
      font-size: 2.2rem;
      padding: 14px 16px 6px;
      line-height: 1.1;
      color: #111;
      letter-spacing: .3px;
    }

    .tpc-article-body{ padding: 10px 16px 16px; }

    .tpc-article-p{
      margin: 0 0 12px 0;
      color: #111;
      line-height: 1.7;
      font-size: 1.02rem;
    }

    .tpc-article-footer{
      margin-top: 8px;
      padding-top: 10px;
      border-top: 1px dashed rgba(0,0,0,.22);
      color: #111;
      font-weight: 700;
    }

    /* ============ NEW: Slide-style exemption blocks ============ */
    .tpc-slide-block{
      background: #fff;
      border: 2px solid #111827;
      box-shadow: 0 18px 35px rgba(0,0,0,.08);
      border-radius: 12px;
      padding: 18px;
    }

    .tpc-slide-title{
      text-align: center;
      font-weight: 900;
      font-size: 2.6rem;
      margin: 6px 0 14px;
      color: #111;
      text-shadow: 2px 2px 0 rgba(0,0,0,.10);
    }

    .tpc-slide-card{
      background: #fff;
      border: 1px solid rgba(0,0,0,.12);
      border-radius: 12px;
      padding: 16px;
      box-shadow: 0 12px 22px rgba(0,0,0,.06);
    }

    .tpc-slide-para{
      font-size: 1.22rem;
      line-height: 1.85;
      color: #111;
      margin: 0 0 14px;
    }

    .tpc-colored-list{
      list-style: none;
      padding: 0;
      margin: 0;
      display: grid;
      gap: 12px;
    }

    .tpc-bullet-blue,
    .tpc-bullet-pink{
      display: flex;
      gap: 12px;
      align-items: flex-start;
      font-weight: 900;
      font-size: 1.6rem;
      line-height: 1.35;
    }

    .tpc-bullet-blue{ color: #0b3dff; }
    .tpc-bullet-pink{ color: #ff2f7a; }

    .tpc-bullet-dot{
      width: 10px;
      height: 10px;
      border-radius: 50%;
      margin-top: 12px;
      background: currentColor;
      flex: 0 0 auto;
    }

    .tpc-underline{
      /*text-decoration: underline;*/
      font-weight: normal;
    }

    .tpc-lew-group{
      display: grid;
      gap: 18px;
      margin-top: 6px;
    }

    .tpc-lew-head{
      color: #0b3dff;
      font-weight: 900;
      font-size: 1.55rem;
      margin-bottom: 6px;
    }

    .tpc-black-list{
      margin: 0 0 0 18px;
      line-height: 1.75;
      font-size: 1.12rem;
      color: #111;
      font-weight: 600;
    }

    @media (max-width: 992px){
      .tpc-slide-title{ font-size: 2.0rem; }
      .tpc-bullet-blue, .tpc-bullet-pink{ font-size: 1.2rem; }
      .tpc-slide-para{ font-size: 1.05rem; }
      .tpc-lew-head{ font-size: 1.25rem; }
      .tpc-black-list{ font-size: 1rem; }
    }
  </style>

</main>

<?php include 'footer.php'; ?>
