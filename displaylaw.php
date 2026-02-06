<?php
  
  $page_id  = 'history-identity';
  $active   = "about";
  $page_css = ["sections.css"]; 
  include "header.php";
?>
<main>

  <section class="page-hero py-5">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-7">
        <span class="badge-soft mb-3 d-inline-block">About SIET</span>
        <h1 class="mb-2">SIET History & Identity</h1>
        <!-- <p class="lead mb-0">
          Honouring our founder members and the leadership legacy of SIET since 1980.
        </p> -->
      </div>
    </div>
  </div>
</section>
<!-- ======================
     BACK BUTTON SECTION
     ====================== -->
<section class="page-back-section">
  <div class="container">
    <!-- Option A: Browser back (works for any previous page) -->
    <a href="javascript:history.back()" class="page-back-btn" aria-label="Go back">
      <span class="page-back-ico">←</span>
      <span class="page-back-text">Back</span>
    </a>

    <!-- Option B: Direct back link (use this instead if you want fixed page) -->
    <!--
    <a href="founders.php" class="page-back-btn" aria-label="Back to Founders">
      <span class="page-back-ico">←</span>
      <span class="page-back-text">Back to Founders</span>
    </a>
    -->
  </div>
</section>
  
  <section class="history-wrap py-5">
    <div class="container">

      <div class="history-paper" role="article" aria-label="SIET history and identity">
        <div class="history-frame">

          <!-- Top text paragraph -->
          <div class="history-text">
            <p class="history-paragraph mb-0">
              <span class="brand">SIET</span> originated from the
              <strong class="emph">Singapore Institute of Engineering Technicians</strong>
              founded on <strong class="date">23 August 1980</strong> as the national society of
              engineering technologists and technicians in Singapore to cater for the interests of
              Polytechnic and VITB (now ITE) engineering graduates.
              Its name was changed to the
              <strong class="emph">Singapore Institute of Engineering Technologists (SIET)</strong>
              in <strong class="date">1986</strong>.
            </p>
          </div>

          <!-- Main visual layout -->
          <div class="history-grid mt-4">

            <!-- LEFT PANEL -->
            <div class="panel left">
              <div class="panel-top">
                <div class="stamp">
                  <img
                    src="images/SIET Logo and Banner/Singapore Institute of Engineering Technicians - 1980.png"
                    alt="Old institute logo"
                  />
                </div>
              </div>

              <div class="book book-blue">
                <img
                  src="images/SIET Constitution & Bye-laws/SIET Constitution & Bye-laws 1980 _ List of Exempting Qualifications.jpg"
                  alt="Singapore Institute of Engineering Technicians constitution and bye-laws"
                />
              </div>
            </div>

            <!-- ARROW CENTER -->
            <div class="panel mid" aria-hidden="true">
              <div class="arrow-wrap">
                <div class="arrow"></div>
              </div>
            </div>

            <!-- RIGHT PANEL -->
            <div class="panel right">
              <div class="panel-top right-top">
                <div class="stamp stamp-right">
                  <img
                    src="images/SIET Logo and Banner/SIET Logo for Media Platform.png"
                    alt="SIET logo founded 1980"
                  />
                  <div class="founded">Founded 1980</div>
                </div>
              </div>

              <div class="right-books">
                <div class="book book-purple">
                  <img
                    src="images/SIET Constitution & Bye-laws/SIET Constitution & Bye-laws 1987 _ List of Exempting Qualifications.jpg"
                    alt="Singapore Institute of Engineering Technologists constitution and bye-laws"
                  />
                </div>

                <div class="book book-2010">
                  <img
                    src="images/About SIET/History/constitution-2010.png"
                    alt="SIET constitution and bye-laws 2010 edition"
                  />
                </div>
              </div>
            </div>

          </div>

          <!-- Small caption (optional but nice) -->
          <div class="history-caption">
            <span class="dot"></span>
            Visual timeline of SIET’s identity evolution — from “Engineering Technicians” to “Engineering Technologists”.
          </div>

        </div>
      </div>

    </div>
  </section>

  <!-- ======================
       PAGE CSS 
       ====================== -->
  <style>
    .history-wrap{
      background: #f6f7f9;
    }

    /* Paper frame like scanned poster */
    .history-paper{
      max-width: 1200px;
      margin: 0 auto;
      background: #fff;
      border: 2px solid #111827;
      box-shadow: 0 18px 40px rgba(0,0,0,.10);
    }

    .history-frame{
      margin: 10px;
      border: 1px solid rgba(0,0,0,.35);
      padding: 18px 18px 16px;
    }

    /* Top text (good design) */
    .history-text{
      background: #ffffff;
      border: 1px solid rgba(0,0,0,.10);
      border-radius: 12px;
      padding: 14px 16px;
      box-shadow: 0 10px 22px rgba(0,0,0,.06);
    }

    .history-paragraph{
      margin: 0;
      font-size: 1.05rem;
      line-height: 1.75;
      color: #111827;
    }

    .history-paragraph .brand{
      font-weight: 900;
      color: #0b5ed7;
      letter-spacing: .2px;
    }

    .history-paragraph .emph{
      font-weight: 900;
      color: #111827;
    }

    .history-paragraph .date{
      font-weight: 900;
      color: #b91c1c;
    }

    /* Main grid layout to match the uploaded style */
    .history-grid{
      display: grid;
      grid-template-columns: 1fr 220px 1.25fr;
      gap: 18px;
      align-items: center;
      padding: 6px 0 4px;
    }

    .panel{
      min-height: 420px;
      position: relative;
    }

    /* Top stamps (logos) */
    .panel-top{
      display: flex;
      justify-content: flex-start;
      align-items: flex-start;
      margin-bottom: 10px;
      min-height: 120px;
    }

    .right-top{
      justify-content: flex-end;
    }

    .stamp{
      width: 160px;
      height: 160px;
      border-radius: 10px;
      overflow: hidden;
      border: 1px solid rgba(0,0,0,.18);
      background: #fff;
      box-shadow: 0 12px 22px rgba(0,0,0,.08);
    }

    .stamp img{
      width: 100%;
      height: 100%;
      object-fit: contain;
      display: block;
      padding: 8px;
    }

    .stamp-right{
      width: 180px;
      height: 180px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 10px 10px 8px;
      text-align: center;
    }

    .stamp-right img{
      padding: 6px;
      height: 132px;
      width: 100%;
    }

    .founded{
      margin-top: 4px;
      font-size: .92rem;
      font-weight: 800;
      color: #374151;
    }

    /* Books (image cards) */
    .book{
      border-radius: 10px;
      overflow: hidden;
      border: 1px solid rgba(0,0,0,.18);
      background: #fff;
      box-shadow: 0 16px 30px rgba(0,0,0,.10);
    }

    .book img{
      width: 100%;
      height: auto;
      display: block;
    }

    /* Slight color hint borders like your image */
    .book-blue{ border-color: rgba(37,99,235,.35); }
    .book-purple{ border-color: rgba(124,58,237,.35); }
    .book-2010{ border-color: rgba(107,114,128,.35); }

    .right-books{
      display: grid;
      grid-template-columns: 1fr 0.8fr;
      gap: 14px;
      align-items: end;
    }

    /* Arrow center (green) */
    .arrow-wrap{
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .arrow{
      width: 100%;
      height: 64px;
      background: #2ecc2e; /* vivid green */
      position: relative;
      border-radius: 6px;
      box-shadow: 0 10px 20px rgba(0,0,0,.14);
      border: 1px solid rgba(0,0,0,.18);
    }

    .arrow::after{
      content: "";
      position: absolute;
      right: -60px;
      top: 50%;
      transform: translateY(-50%);
      border-left: 60px solid #2ecc2e;
      border-top: 32px solid transparent;
      border-bottom: 32px solid transparent;
      filter: drop-shadow(0 6px 10px rgba(0,0,0,.12));
    }

    /* Caption */
    .history-caption{
      margin-top: 14px;
      display: flex;
      gap: 10px;
      align-items: center;
      font-size: .95rem;
      color: #374151;
      font-weight: 600;
    }

    .history-caption .dot{
      width: 10px;
      height: 10px;
      background: #0b5ed7;
      border-radius: 999px;
      display: inline-block;
    }

    /* Responsive */
    @media (max-width: 992px){
      .history-grid{
        grid-template-columns: 1fr;
        gap: 14px;
      }
      .panel{
        min-height: unset;
      }
      .panel-top{
        justify-content: center;
      }
      .right-top{
        justify-content: center;
      }
      .arrow{
        height: 56px;
      }
      .arrow::after{
        right: -48px;
        border-left-width: 48px;
        border-top-width: 28px;
        border-bottom-width: 28px;
      }
      .right-books{
        grid-template-columns: 1fr;
      }
    }

    @media (max-width: 576px){
      .history-frame{ padding: 14px; }
      .history-paragraph{ font-size: 1rem; }
      .stamp{ width: 140px; height: 140px; }
      .stamp-right{ width: 160px; height: 160px; }
      .arrow{ height: 50px; }
      .arrow::after{
        right: -42px;
        border-left-width: 42px;
        border-top-width: 25px;
        border-bottom-width: 25px;
      }
    }
      /* =========================================================
   BACK BUTTON SECTION (Reusable)
   ========================================================= */
.page-back-section{
  padding: 12px 0 0;
  margin-bottom: 12px;
}

.page-back-btn{
  display: inline-flex;
  align-items: center;
  gap: 10px;
  padding: 10px 14px;
  border-radius: 999px;
  text-decoration: none;
  font-weight: 900;
  color: #111827;
  background: #ffffff;
  border: 1px solid rgba(0,0,0,.10);
  box-shadow: 0 12px 22px rgba(0,0,0,.08);
  transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
}

.page-back-btn:hover{
  transform: translateY(-1px);
  box-shadow: 0 16px 28px rgba(0,0,0,.12);
  border-color: rgba(13,110,253,.25);
}

.page-back-btn:active{
  transform: translateY(0);
  box-shadow: 0 10px 18px rgba(0,0,0,.10);
}

.page-back-ico{
  width: 30px;
  height: 30px;
  display: grid;
  place-items: center;
  border-radius: 999px;
  background: rgba(13,110,253,.10);
  color: #0d6efd;
  font-size: 18px;
  line-height: 1;
}

.page-back-text{
  font-size: .98rem;
}
  </style>

</main>
<?php include "footer.php"; ?>
