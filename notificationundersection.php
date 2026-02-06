<?php
  
  $page_id  = 'societies-notice-1980';
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
        <h1 class="mb-2">Societies Act Notice</h1>
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


  <!-- ======================
       GAZETTE / NOTICE STYLE PAGE
       ====================== -->
  <section class="gazette-wrap py-5">
    <div class="container">

      <div class="gazette-paper" role="article" aria-label="Societies Act registration notice">
        <div class="gazette-frame">

          <!-- Top line -->
          <div class="gazette-topline">
            <span>No. 3310 — THE SOCIETIES ACT (CHAPTER 262).</span>
          </div>

          <!-- Main title -->
          <h1 class="gazette-title">NOTIFICATION UNDER SECTION 4 (5).</h1>

          <!-- Body paragraph -->
          <p class="gazette-paragraph">
            It is hereby notified for general information in accordance with subsection (5)
            of section 4 of the Societies Act, that the Registrar of Societies has registered the
            societies specified in the Schedule hereto with effect from the dates shown against
            such societies.
          </p>

          <!-- Schedule title -->
          <h2 class="gazette-schedule-title">THE SCHEDULE.</h2>

          <!-- Column headings row (like the scan) -->
          <div class="gazette-colheads" aria-hidden="true">
            <div class="colhead">
              <div class="colhead-top">First Column.</div>
              <div class="colhead-bottom">Name.</div>
            </div>
            <div class="colhead">
              <div class="colhead-top">Second Column.</div>
              <div class="colhead-bottom">Place of Business.</div>
            </div>
            <div class="colhead">
              <div class="colhead-top">Third Column.</div>
              <div class="colhead-bottom">Date of Registration.</div>
            </div>
          </div>

          <!-- Schedule table (text layout like the scan) -->
          <div class="gazette-table">
            <div class="gazette-row">
              <div class="gazette-cell">
                <strong>Rotary Club of Raffles City, Singapore</strong>
              </div>
              <div class="gazette-cell">
                Raffles Hotel, Beach Road<br>
                Singapore 0718
              </div>
              <div class="gazette-cell">
                20th August, 1980.
              </div>
            </div>

            <div class="gazette-row">
              <div class="gazette-cell">
                <strong>Singapore Institute of Engineering Technicians</strong>
              </div>
              <div class="gazette-cell">
                c/o Department of Civil Engineering and Building,<br>
                Singapore Polytechnic,<br>
                Dover Road,<br>
                Singapore 0513
              </div>
              <div class="gazette-cell">
                23rd August, 1980.
              </div>
            </div>
          </div>

          <!-- Footnote -->
          <div class="gazette-footnote">
            [R. of S. 6/72 Vol. 3 (4)]
          </div>

        </div>
      </div>

    </div>
  </section>

  <!-- ======================
       PAGE CSS 
       ====================== -->
  <style>
    /* Page background (soft like paper on site) */
    .gazette-wrap{
      background: #f6f7f9;
    }

    /* Paper + outer frame (like the scan border) */
    .gazette-paper{
      max-width: 980px;
      margin: 0 auto;
      background: #ffffff;
      border: 2px solid #1f2937; /* dark border like scan edge */
      box-shadow: 0 18px 40px rgba(0,0,0,.10);
    }

    .gazette-frame{
      padding: 28px 28px 24px;
      border: 1px solid rgba(0,0,0,.35); /* inner line like scanned frame */
      margin: 10px;
      font-family: "Times New Roman", Times, serif;
      color: #111;
    }

    .gazette-topline{
      text-align: center;
      font-size: 18px;
      letter-spacing: .2px;
      margin-bottom: 16px;
      font-weight: 600;
    }

    .gazette-title{
      text-align: center;
      font-size: 22px;
      margin: 0 0 18px 0;
      letter-spacing: .4px;
      font-weight: 800;
      text-transform: uppercase;
    }

    .gazette-paragraph{
      font-size: 16px;
      line-height: 1.75;
      margin: 0 auto 18px;
      max-width: 860px;
      text-align: justify; /* scan-like paragraph */
    }

    .gazette-schedule-title{
      text-align: center;
      font-size: 18px;
      margin: 6px 0 14px 0;
      letter-spacing: .4px;
      font-weight: 800;
      text-transform: uppercase;
    }

    /* Column headers styled like the scan */
    .gazette-colheads{
      display: grid;
      grid-template-columns: 1.1fr 1.5fr .8fr;
      gap: 18px;
      padding: 6px 4px 8px;
      margin: 0 auto 6px;
      max-width: 920px;
    }

    .colhead{
      text-align: center;
    }

    .colhead-top{
      font-style: italic;
      font-size: 15px;
      margin-bottom: 2px;
    }

    .colhead-bottom{
      font-size: 16px;
      font-weight: 700;
    }

    /* Schedule rows (no boxy borders — scan layout) */
    .gazette-table{
      max-width: 920px;
      margin: 0 auto;
      padding: 2px 4px 0;
    }

    .gazette-row{
      display: grid;
      grid-template-columns: 1.1fr 1.5fr .8fr;
      gap: 18px;
      padding: 12px 0;
    }

    .gazette-row + .gazette-row{
      padding-top: 16px;
    }

    .gazette-cell{
      font-size: 16px;
      line-height: 1.55;
    }

    .gazette-cell strong{
      font-weight: 700;
    }

    .gazette-footnote{
      text-align: right;
      margin-top: 10px;
      font-size: 14px;
      font-weight: 600;
    }

    /* Responsive adjustments */
    @media (max-width: 768px){
      .gazette-frame{
        padding: 20px 16px 18px;
      }

      .gazette-colheads,
      .gazette-row{
        grid-template-columns: 1fr; /* stack columns on mobile */
        gap: 8px;
      }

      .gazette-colheads{
        display: none; /* hide heading grid on small screens */
      }

      .gazette-row{
        border-top: 1px solid rgba(0,0,0,.18);
        padding: 14px 0;
      }

      .gazette-row:first-child{
        border-top: 0;
      }

      /* Add labels on mobile for clarity */
      .gazette-row .gazette-cell:nth-child(1)::before{
        content: "Name: ";
        font-weight: 700;
      }
      .gazette-row .gazette-cell:nth-child(2)::before{
        content: "Place of Business: ";
        font-weight: 700;
      }
      .gazette-row .gazette-cell:nth-child(3)::before{
        content: "Date of Registration: ";
        font-weight: 700;
      }
    }

    @media print{
      .gazette-wrap{ background: #fff; }
      .gazette-paper{ box-shadow: none; }
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
