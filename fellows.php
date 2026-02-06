<?php
  $active = "about";
  $page_css = ["about.css","sections.css"];
  include "header.php";
?>
<main>
<?php $page_id = 'fellows'; ?>
<section class="page-hero py-5">
    <div class="container">
      <div class="row align-items-center g-4">
        <div class="col-lg-8">
          <span class="badge-soft mb-3 d-inline-block">About SIET</span>
          <h1 class="mb-2">Honorary Advisers with Honorary Fellows</h1>
          <!-- <p class="lead mb-0">
            Key milestones and achievements in SIET’s journey since 1980.
          </p> -->
        </div>
      </div>
    </div>
  </section>


<!-- ======================
     FELLOWS / HONORARY PAGE
     ====================== -->

<section class="fellows-page py-5">
  <div class="container">

    <div class="fellows-card">
      <div class="row g-4 align-items-start">

        <!-- LEFT: HONORARY PATRON -->
        <div class="col-lg-5">
          <!-- ✅ removed title "Our Honorary Patron" -->

          <div class="patron-wrap text-center">
            <img
              src="images/About SIET/Photos of Patron & Founders/Patron - Late Mr Edmund William Barker.png"
              alt="Honorary Patron"
              class="patron-img"
              
            />

            <div class="patron-caption mt-3">
              <div class="patron-name">Late Mr Edmund William Barker</div>
              <div class="patron-role">Formerly Minister of Law</div>
            </div>
          </div>
        </div>

        <!-- RIGHT: HONORARY ADVISERS -->
        <div class="col-lg-7">
          <!-- ✅ replaced title text -->
          <h1 class="fellows-title text-center text-lg-start">Honorary Fellows</h1>

          <div class="advisers-table mt-3">
            <div class="advisers-head">
              <div class="advisers-col advisers-col--name">Honorary Fellows
</div>
              <div class="advisers-col advisers-col--func">Function</div>
            </div>

            <!-- Row 1 -->
            <div class="advisers-row">
              <div class="advisers-col advisers-col--name">
                <span class="num">1.</span> <span class="name fw-bold">Dr Sam Man Keong
</span>
              </div>
              <div class="advisers-col advisers-col--func">Financial Matters</div>
            </div>

            <!-- Row 2 -->
            <div class="advisers-row">
              <div class="advisers-col advisers-col--name">
                <span class="num">2.</span> <span class="name fw-bold">Mr TRC Raja
 </span>
              </div>
              <div class="advisers-col advisers-col--func">Legal Matters</div>
            </div>

            <!-- Row 3 -->
            <div class="advisers-row">
              <div class="advisers-col advisers-col--name">
                <span class="num">3.</span> <span class="name fw-bold">Dr Low Sui Pheng 
</span>
              </div>
              <div class="advisers-col advisers-col--func">Education</div>
            </div>


            <!-- Row 5 -->
            <!-- <div class="advisers-row">
              <div class="advisers-col advisers-col--name">
                <span class="num">4.</span> <span class="name fw-bold">Dr Sam Man Keong</span>
              </div>
              <div class="advisers-col advisers-col--func">Publications</div>
            </div> -->

          </div>

          <!-- optional small note -->
          <!-- <p class="text-muted mt-3 mb-0 small">
            *You can edit the names/functions anytime in <strong>fellows.php</strong>.
          </p> -->
        </div>

      </div>
    </div>

  </div>
</section>

<!-- ======================
     PAGE CSS 
     ====================== -->
<style>

  .fellows-page{
    background: #f6f7f9;
  }

  .fellows-card{
    background: #ffffff;
    border: 1px solid rgba(0,0,0,.08);
    box-shadow: 0 18px 35px rgba(0,0,0,.12);
    border-radius: 6px;
    padding: 28px 28px;
  }

  /* Big headings with shadow like sample */
  .fellows-title{
    font-weight: 900;
    font-size: clamp(2rem, 3.2vw, 3.2rem);
    color: #000;
    text-shadow: 0 4px 0 rgba(0,0,0,.12);
    margin-bottom: 18px;
  }

  /* Patron image block */
  .patron-wrap{
    padding: 6px 0;
  }

  .patron-img{
    width: 240px;
    height: 300px;
    object-fit: cover;
    border-radius: 2px;
    border: 1px solid rgba(0,0,0,.15);
    background: #fff;
  }

  .patron-img--fallback{
    object-fit: contain;
    padding: 12px;
  }

  .patron-caption{
    line-height: 1.25;
  }

  .patron-name{
    font-weight: 700;
    color: #111;
  }

  .patron-role{
    color: #111;
  }

  /* Advisers table  */
  .advisers-table{
    width: 100%;
  }

  .advisers-head{
    display: grid;
    grid-template-columns: 1.4fr 1fr;
    gap: 24px;
    font-weight: 900;
    font-size: 1.1rem;
    padding: 6px 0 14px;
  }

  .advisers-row{
    display: grid;
    grid-template-columns: 1.4fr 1fr;
    gap: 24px;
    padding: 18px 0;
  }

  .advisers-col{
    font-size: 1.15rem;
    color: #111;
  }

  .advisers-col--name .num{
    font-weight: 900;
    display: inline-block;
    width: 32px;
  }

  /* Responsive: stack table nicely on mobile */
  @media (max-width: 991.98px){
    .fellows-card{ padding: 22px 18px; }
    .fellows-title{ text-align: center !important; }
    .patron-img{ width: 220px; height: 280px; }

    .advisers-head, .advisers-row{
      grid-template-columns: 1fr;
      gap: 8px;
    }

    .advisers-head{
      text-align: center;
      padding-bottom: 10px;
      border-bottom: 1px solid rgba(0,0,0,.08);
      margin-bottom: 8px;
    }

    .advisers-row{
      border-bottom: 1px dashed rgba(0,0,0,.10);
      padding: 14px 0;
    }

    .advisers-col--func{
      color: #444;
      font-size: 1.05rem;
      padding-left: 32px; /* aligns with number width */
    }
  }
</style>


</main>
<?php
include "footer.php";
?>
