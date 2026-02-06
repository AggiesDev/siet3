<?php
  $active = 'membership';
  $page_css = ['sections.css'];
  include 'header.php';
?>
<main>
<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2">Mature Candidate Scheme (MCS)</h1>
    <p class="text-muted mb-0">An alternative pathway recognising substantial responsible experience (first approved in 1986; amended in 2011).</p>
  </div>
</section>

  <section class="mc-wrap py-4">
    <div class="container">

      <!-- ======================
           SLIDE 1 (Intro)
           ====================== -->
      <section class="mc-slide">
        <div class="mc-frame">

          <header class="mc-head">
            <h1 class="mc-title">
              SIET <span class="mc-title-accent">Mature Candidate Scheme</span>
            </h1>
            <div class="mc-approved">[First Approved in 1986; Amended in 2011]</div>
          </header>

          <h2 class="mc-subtitle">Mature Candidate Scheme (MCS)</h2>

          <p class="mc-p">
            At SIET, we believe that <strong>professional excellence</strong> is defined not only by academic qualifications
            but also by the depth of <strong>real-world experience</strong>. Hands-on training, leadership in practice, and
            years of industry contribution shape the professionals who drive engineering and technology forward.
          </p>

          <p class="mc-p">
            Since its approval in 1986, the <strong>Mature Candidate Scheme (MCS)</strong> has provided an alternative pathway
            to membership for individuals with substantial responsible experience who may not hold the conventional academic
            qualifications. Through this scheme, eligible candidates can be considered for:
          </p>

          <ul class="mc-ul">
            <li>Associate Member Grade (AMSIET)</li>
            <li>Member Grade (MSIET)</li>
          </ul>

          <p class="mc-p">
            By <span class="mc-u-red">recognising</span> proven expertise, lifelong contribution, and professional competence,
            SIET ensures that experience stands proudly alongside education. This is your opportunity to gain formal recognition,
            elevate your professional standing, and join a respected body that values integrity, excellence, and global connection.
          </p>

          <p class="mc-cta">
            <strong>Step forward with courage. Be certified professionally. Be recognized globally.</strong>
          </p>

        </div>
      </section>


      <!-- ======================
           SLIDE 2 (Eligibility + Alternatives)
           ====================== -->
      <section class="mc-slide mt-18">
        <div class="mc-frame">

          <header class="mc-head">
            <h1 class="mc-title">
              SIET <span class="mc-title-accent">Mature Candidate Scheme</span>
            </h1>
            <div class="mc-approved">[First Approved in 1986; Amended in 2011]</div>
          </header>

          <p class="mc-p mt-6">
            A Mature Candidate is a person with considerable responsible experience in engineering or related practice who may lack
            the normal academic qualifications prescribed by the Council for Associate Membership (AMSIET) / Corporate Membership (MSIET).
          </p>

          <p class="mc-elig">
            <span class="mc-elig-label">Eligibility:</span><br>
            A candidate for admission to Associate Membership (AMSIET) / Corporate Membership (MSIET) under the Mature Candidate Scheme
            should comply with one of the following alternatives:
          </p>

          <div class="mc-cols">

            <!-- LEFT: AMSIET -->
            <section class="mc-col">
              <h3 class="mc-col-title">Associate Membership (AMSIET)</h3>

              <h4 class="mc-alt mc-alt-blue">Alternative I</h4>
              <ol class="mc-ol">
                <li>Have passed the ITE – Nitec in a technical stream;</li>
                <li>Be at least 23 years of age at the date of election;</li>
                <li>Have a minimum of 8 years’ approved experience in the particular trade.</li>
              </ol>

              <h4 class="mc-alt mc-alt-pink">Alternative II</h4>
              <ol class="mc-ol">
                <li>Be at least 35 years of age at the date of election;</li>
                <li>Have at least 12 years’ approved experience in the particular field;</li>
                <li>
                  A Letter of Recommendation from his/her present employer showing clearly his/her present position,
                  length of service and competence in the said trade.
                </li>
              </ol>
            </section>

            <!-- RIGHT: MSIET -->
            <section class="mc-col">
              <h3 class="mc-col-title">Corporate Membership (MSIET)</h3>

              <h4 class="mc-alt mc-alt-blue">Alternative I</h4>
              <ol class="mc-ol">
                <li>Have passed the ITE – Higher Nitec in a technical stream;</li>
                <li>Be at least 35 years of age at the date of acceptance;</li>
                <li>Be required to submit a ‘Technical Report’; and</li>
                <li>
                  Be required to undertake an oral examination as may be decided upon by the Council,
                  to test the technical knowledge and competence of the applicant.
                </li>
              </ol>

              <h4 class="mc-alt mc-alt-pink">Alternative II</h4>
              <ol class="mc-ol">
                <li>Be at least 40 years of age at the date of acceptance;</li>
                <li>
                  Be required to submit either a ‘Technical Report’ or a detailed record of past experience or projects undertaken; and
                </li>
                <li>
                  Be required to undertake an oral examination as may be decided upon by the Council,
                  to test the technical knowledge and competence of the applicant.
                </li>
              </ol>
            </section>

          </div>

        </div>
      </section>

    </div>
  </section>


  <style>
    /* =========================================================
       Mature Candidate Scheme (Slide look)
       ========================================================= */
    .mc-wrap{ background:#f6f7f9; }
    .mt-18{ margin-top: 18px; }
    .mt-6{ margin-top: 6px; }

    .mc-slide{
      max-width: 1200px;
      margin: 0 auto;
      background:#fff;
      border: 2px solid #111827;
      box-shadow: 0 18px 40px rgba(0,0,0,.10);
    }

    .mc-frame{
      margin: 10px;
      border: 1px solid rgba(0,0,0,.35);
      background:#fff;
      padding: 18px 18px 20px;
    }

    /* Header line */
    .mc-head{
      display: flex;
      align-items: baseline;
      justify-content: space-between;
      gap: 14px;
      flex-wrap: wrap;
      margin-bottom: 10px;
    }

    .mc-title{
      margin: 0;
      font-size: 2.6rem;
      font-weight: 900;
      letter-spacing: .2px;
      color:#111;
      line-height: 1.05;
    }

    .mc-title-accent{
      color: #c46100; /* orange like screenshot */
      text-shadow: 0 2px 0 rgba(0,0,0,.12);
    }

    .mc-approved{
      font-weight: 900;
      color:#111;
      font-size: 1.08rem;
      white-space: nowrap;
    }

    .mc-subtitle{
      margin: 6px 0 10px 0;
      font-size: 1.35rem;
      font-weight: 900;
      color:#111;
    }

    /* Paragraph design (strong spacing like slide) */
    .mc-p{
      margin: 0 0 16px 0;
      font-size: 1.18rem;
      line-height: 1.65;
      color:#111;
    }

    .mc-ul{
      margin: 0 0 16px 26px;
      padding: 0;
      font-size: 1.18rem;
      line-height: 1.65;
      color:#111;
    }

    .mc-cta{
      margin: 18px 0 0 0;
      font-size: 1.18rem;
      color:#111;
    }

    .mc-u-red{
      color: #ff0000;
      text-decoration: underline;
      font-weight: 900;
    }

    /* Eligibility block */
    .mc-elig{
      margin: 8px 0 14px 0;
      font-size: 1.18rem;
      line-height: 1.65;
      color:#111;
    }
    .mc-elig-label{
      color: #00a000; /* green "Eligibility:" */
      font-weight: 900;
    }

    /* Two columns */
    .mc-cols{
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 36px;
      margin-top: 8px;
    }

    .mc-col-title{
      margin: 0 0 10px 0;
      font-size: 1.45rem;
      font-weight: 900;
      color:#111;
    }

    .mc-alt{
      margin: 10px 0 8px 0;
      font-size: 1.12rem;
      font-weight: 900;
      text-decoration: underline;
      display: inline-block;
    }

    .mc-alt-blue{ color: #0037ff; }  /* Alternative I */
    .mc-alt-pink{ color: #ff2a7a; }  /* Alternative II */

    .mc-ol{
      margin: 0 0 18px 22px;
      padding: 0;
      font-size: 1.12rem;
      line-height: 1.65;
      color:#111;
    }
    .mc-ol li{ margin-bottom: 8px; }

    /* Back button (reusable) */
    .page-back-section{ padding: 12px 0 0; margin-bottom: 12px; }
    .page-back-btn{
      display:inline-flex; align-items:center; gap:10px;
      padding:10px 14px; border-radius:999px;
      text-decoration:none; font-weight:900; color:#111827;
      background:#fff; border:1px solid rgba(0,0,0,.10);
      box-shadow:0 12px 22px rgba(0,0,0,.08);
      transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
    }
    .page-back-btn:hover{
      transform: translateY(-1px);
      box-shadow:0 16px 28px rgba(0,0,0,.12);
      border-color: rgba(13,110,253,.25);
    }
    .page-back-ico{
      width:30px; height:30px; display:grid; place-items:center;
      border-radius:999px; background:rgba(13,110,253,.10);
      color:#0d6efd; font-size:18px; line-height:1;
    }
    .page-back-text{ font-size:.98rem; }

    /* Responsive */
    @media (max-width: 992px){
      .mc-title{ font-size: 2.1rem; }
      .mc-approved{ font-size: 1rem; }
      .mc-cols{ grid-template-columns: 1fr; gap: 18px; }
      .mc-p, .mc-ul, .mc-elig{ font-size: 1.05rem; }
      .mc-ol{ font-size: 1.02rem; }
    }
  </style>

</main>
<?php include "footer.php"; ?>

