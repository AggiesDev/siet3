<?php
 
  $page_id  = 'founding-members-1980';
  $active   = "about";
  $page_css = []; 
  include "header.php";
?>
<main>
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
  <!-- ======================
       FOUNDING MEMBERS 1980 
       ====================== -->
  <section class="fm-wrap py-5">
    <div class="container">

      <div class="fm-paper" role="article" aria-label="SIET founding members in 1980">
        <div class="fm-frame">

          <div class="fm-grid">
            <!-- LEFT: 2 leader portraits + captions -->
            <div class="fm-left">

              <!-- Leader 1 -->
              <article class="fm-leader">
                <h2 class="fm-leader-title">
                  SIET was first initiated in 1980 by Mr Sam Man Keong
                  <br>
                  who became SIET’s first Honorary Secretary (1980/1981)
                </h2>

                <div class="fm-photo">
                  <img
                    src="images/About SIET/Photos of Patron & Founders/SIET Initiator Sam Man Keong.png"
                    alt="Mr Sam Man Keong portrait"
                  />
                </div>
              </article>

              <!-- Spacer like the scan -->
              <div class="fm-space" aria-hidden="true"></div>

              <!-- Leader 2 -->
              <article class="fm-leader">
                <h2 class="fm-leader-title">
                  Mr Osman Bin Mohamed became SIET’s first President
                  <br>
                  (1980/1981)
                </h2>

                <div class="fm-photo fm-photo--large">
                  <img
                    src="images/About SIET/Photos of Patron & Founders/SIET 1st President Osman Bin Mohamed.png"
                    alt="Mr Osman Bin Mohamed portrait"
                  />
                </div>
              </article>

            </div>

            <!-- RIGHT: Founders poster -->
            <aside class="fm-right">
              <h2 class="fm-right-title">SIET – Founding Members in 1980</h2>

              <div class="fm-poster">
                <img
                  src="images/About SIET/Photos of Patron & Founders/SIET Founders.png"
                  alt="SIET founding members collage poster"
                />
              </div>
            </aside>

          </div>

        </div>
      </div>

    </div>
  </section>

  <!-- ======================
       PAGE CSS (kept here to match uploaded image style)
       ====================== -->
  <style>
    .fm-wrap{
      background: #f6f7f9;
    }

    /* Paper + frame like the uploaded image border */
    .fm-paper{
      max-width: 1200px;
      margin: 0 auto;
      background: #fff;
      border: 2px solid #111827;            /* dark outer border */
      box-shadow: 0 18px 40px rgba(0,0,0,.10);
    }

    .fm-frame{
      margin: 10px;
      border: 1px solid rgba(0,0,0,.35);     /* inner border */
      padding: 16px;
      background: #ffffff;
    }

    /* Main grid: left big area + right poster */
    .fm-grid{
      display: grid;
      grid-template-columns: 1.05fr 1fr;
      gap: 18px;
      align-items: start;
    }

    /* LEFT column */
    .fm-left{
      min-height: 720px; /* keeps poster-like tall layout */
      display: flex;
      flex-direction: column;
    }

    .fm-leader-title{
      margin: 0 0 10px 0;
      color: #0037ff; /* strong blue like your image */
      font-weight: 900;
      font-size: 1.18rem;
      line-height: 1.25;
      letter-spacing: .2px;
    }

    .fm-photo{
      width: 210px;
      height: 190px;
      border-radius: 4px;
      overflow: hidden;
      border: 1px solid rgba(0,0,0,.25);
      background: #fff;
    }

    .fm-photo--large{
      width: 260px;
      height: 240px;
    }

    .fm-photo img{
      width: 100%;
      height: 100%;
      display: block;
      object-fit: cover;
      object-position: center;
      filter: grayscale(18%); /* classic look */
    }

    /* Big white space between the two blocks (like scan) */
    .fm-space{
      flex: 1;
      min-height: 220px;
    }

    /* RIGHT column */
    .fm-right{
      text-align: right;
    }

    .fm-right-title{
      margin: 0 0 10px 0;
      color: #0037ff;
      font-weight: 900;
      font-size: 1.18rem;
      line-height: 1.2;
      letter-spacing: .2px;
    }

    .fm-poster{
      border: 1px solid rgba(0,0,0,.25);
      border-radius: 2px;
      overflow: hidden;
      background: #fff;
      box-shadow: 0 14px 26px rgba(0,0,0,.10);
    }

    .fm-poster img{
      width: 100%;
      height: auto;
      display: block;
    }

    /* Responsive */
    @media (max-width: 992px){
      .fm-grid{
        grid-template-columns: 1fr;
      }
      .fm-right{
        text-align: left;
      }
      .fm-left{
        min-height: unset;
      }
      .fm-space{
        display: none; /* remove big gap on mobile */
      }
    }

    @media (max-width: 576px){
      .fm-frame{ padding: 14px; }
      .fm-leader-title,
      .fm-right-title{
        font-size: 1.05rem;
      }
      .fm-photo{
        width: 190px;
        height: 175px;
      }
      .fm-photo--large{
        width: 220px;
        height: 210px;
      }
    }

    @media print{
      .fm-wrap{ background: #fff; }
      .fm-paper{ box-shadow: none; }
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
