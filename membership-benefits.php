<?php
  $active = 'membership';
  $page_css = ['sections.css'];
  include 'header.php';
?>
<main>
<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2">SIET Benefits</h1>
    <p class="text-muted mb-0">Recognized. Certified. Globally Connected.</p>
  </div>
</section>

  <section class="benefits-wrap py-4">
    <div class="container">

      <div class="benefits-slide" role="article" aria-label="SIET Benefits slide">
        <div class="benefits-frame">

          <div class="benefits-grid">

            <aside class="benefits-left" aria-label="SIET certification poster">
              <img
                src="images/The 3 SIET Benefits/Refine the promotion 3.png"
                alt="Credential with confidence. Get certified under the SIET certification scheme."
                class="benefits-poster"
              />
            </aside>

            <!-- RIGHT: White content -->
            <section class="benefits-right">

              <div class="right-head">
                <h1 class="right-title">SIET – Benefits</h1>

                <div class="right-list">
                  <ol>
                    <li>SIET Professional Membership</li>
                    <li>SIET Certifications</li>
                    <li>International Recognitions</li>
                  </ol>
                </div>

                <!-- Pointing hand (image) -->
                <img
                  src="images/The 3 SIET Benefits/hand1.PNG"
                  class="right-hand"
                  alt="Pointing hand"
                />
              </div>

              <div class="right-quote">
                <p class="q-line">
                  Join SIET and elevate your professional journey.
                </p>

                <p class="q-line">
                  Your membership is more than a
                  <span class="c-brown">professional<br>credential.</span>
                </p>

                <p class="q-line mb-0">
                  It is a <span class="c-green">commitment</span> to
                  <span class="c-blue">excellence</span>,
                  <span class="c-pink">community</span><br>
                  and <span class="c-red">global recognition</span>.
                </p>
              </div>

            </section>

          </div>

        </div>
      </div>

    </div>
  </section>

  <style>
    /* ===== Slide frame ===== */
    .benefits-wrap{ background:#f6f7f9; }

    .benefits-slide{
      max-width: 1200px;
      margin: 0 auto;
      background: #fff;
      border: 2px solid #111827;
      box-shadow: 0 18px 40px rgba(0,0,0,.10);
    }

    .benefits-frame{
      margin: 10px;
      border: 1px solid rgba(0,0,0,.35);
      background: #fff;
    }

    .benefits-grid{
      display: grid;
      grid-template-columns: 36% 64%;
      min-height: 640px;
    }

    /* ===== LEFT (image poster) ===== */
    .benefits-left{
      background: #0b67d1;
      border-right: 1px solid rgba(0,0,0,.18);
      overflow: hidden;
      display: grid;
      place-items: stretch;
    }

    .benefits-poster{
      width: 100%;
      height: 100%;
      object-fit: cover; /* fills like slide */
      display: block;
    }

    /* ===== RIGHT panel ===== */
    .benefits-right{
      padding: 28px 30px 22px;
      position: relative;
      background: #ffffff;
      overflow: hidden;
    }

    .right-head{
      position: relative;
      padding-right: 180px; /* room for hand */
      min-height: 220px;
    }

    .right-title{
      font-weight: 900;
      font-size: 3rem;
      margin: 0 0 12px 0;
      color: #111;
      letter-spacing: .4px;
    }

    .right-list{
      font-size: 1.55rem;
      font-weight: 500;
      color: #111;
    }

    .right-list ol{
      margin: 0 0 0 22px;
      padding: 0;
    }

    .right-list li{ margin-bottom: 6px; }

    .right-hand{
      position: absolute;
      right: 10px;
      top: 52px;
      width: 160px;
      height: auto;
      pointer-events: none;
      filter: drop-shadow(0 10px 10px rgba(0,0,0,.12));
    }

    /* Quote box (blue border) */
    .right-quote{
      margin-top: 46px;
      border: 3px solid #0b5ed7;
      padding: 18px 18px 16px;
      max-width: 760px;
      font-size: 1.7rem;
      line-height: 1.25;
      color: #111;
    }

    .q-line{ margin: 0 0 18px 0; }

    /* Colored words like the slide */
    .c-brown{ color: #a34100; font-weight: 900; }
    .c-green{ color: #0a8a0a; font-weight: 900; }
    .c-blue{ color: #0037ff; font-weight: 900; }
    .c-pink{ color: #c400c4; font-weight: 900; }
    .c-red{ color: #ff0000; font-weight: 900; }

    /* ===== Back button (reuse) ===== */
    .page-back-section{ padding: 12px 0 0; margin-bottom: 12px; }
    .page-back-btn{
      display:inline-flex; align-items:center; gap:10px;
      padding:10px 14px; border-radius:999px;
      text-decoration:none; font-weight:900; color:#111827;
      background:#fff; border:1px solid rgba(0,0,0,.10);
      box-shadow:0 12px 22px rgba(0,0,0,.08);
      transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
    }
    .page-back-btn:hover{ transform: translateY(-1px); box-shadow:0 16px 28px rgba(0,0,0,.12); border-color: rgba(13,110,253,.25); }
    .page-back-ico{
      width:30px; height:30px; display:grid; place-items:center;
      border-radius:999px; background:rgba(13,110,253,.10);
      color:#0d6efd; font-size:18px; line-height:1;
    }
    .page-back-text{ font-size:.98rem; }

    /* ===== Responsive ===== */
    @media (max-width: 992px){
      .benefits-grid{ grid-template-columns: 1fr; min-height: unset; }
      .benefits-left{ border-right: 0; border-bottom: 1px solid rgba(0,0,0,.18); }
      .benefits-poster{ height: auto; object-fit: contain; background: #0b67d1; }

      .benefits-right{ padding: 18px 16px 18px; }
      .right-head{ padding-right: 0; }
      .right-hand{
        position: static;
        width: 150px;
        display: block;
        margin: 10px 0 0 auto;
      }
      .right-title{ font-size: 2.3rem; }
      .right-list{ font-size: 1.3rem; }
      .right-quote{ font-size: 1.25rem; margin-top: 18px; }
    }

    @media (max-width: 576px){
      .right-title{ font-size: 2rem; }
    }
  </style>

</main>
<?php include "footer.php"; ?>

