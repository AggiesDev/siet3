<?php
  $active = "about";
  $page_css = ["about.css","sections.css", "contact.css"];
  include "header.php";
?>
<main>
<?php $page_id = 'founders'; ?>


<!-- ======================
     FOUNDERS PAGE 
     ====================== -->

<section class="page-hero py-5">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-7">
        <span class="badge-soft mb-3 d-inline-block">About SIET</span>
        <h1 class="mb-2">Our Founders & Past Leaders</h1>
        <p class="lead mb-0">
          Honouring our founder members and the leadership legacy of SIET since 1980.
        </p>
      </div>
    </div>
  </div>
</section>


<section class="founders-page py-5">
  <div class="container">
    <div class="row g-4 align-items-start">

      <!-- LEFT SECTION: FOUNDERS IMAGES -->
      <div class="col-lg-5">
        <div class="founders-card">
          <h2 class="founders-title text-center">Our Founder Members</h2>

          <!-- Use a single collage-style image as per your reference -->
          <div class="founders-poster-wrap">
            <img
              src="images/About SIET/Photos of Patron & Founders/SIET Founders.png"
              alt="Founder Members"
              class="founders-poster"
            />
          </div>

          <!-- <p class="founders-note text-center mb-0">
            *Replace <strong>images/1.jpg</strong> if you want to update the founders poster image.
          </p> -->
        </div>
      </div>

      <!-- RIGHT SECTION: TABLE + PDF DOWNLOAD -->
      <div class="col-lg-7">
        <div class="leaders-card">


          <!-- ======================
     NEW: FOUNDING LEADERS (2 PHOTOS) - TOP RIGHT
     ====================== -->
<div class="leaders-top-gallery mb-3">
  <div class="row g-3">
    <!-- Leader 1 -->
    <div class="col-12 col-md-6">
      <div class="leader-mini-card">
        <div class="leader-mini-img">
          <img
            src="images/About SIET/Photos of Patron & Founders/SIET Initiator Sam Man Keong.png"
            alt="Mr Sam Man Keong"
          />
        </div>
        <div class="leader-mini-text">
          <div class="leader-mini-title">
            SIET was first initiated in 1980 by <span>Mr Sam Man Keong</span>
          </div>
          <div class="leader-mini-sub">
            First Honorary Secretary <strong>(1980/1981)</strong>
          </div>
        </div>
      </div>
    </div>

    <!-- Leader 2 -->
    <div class="col-12 col-md-6">
      <div class="leader-mini-card">
        <div class="leader-mini-img">
          <img
            src="images/About SIET/Photos of Patron & Founders/SIET 1st President Osman Bin Mohamed.png"
            alt="Mr Osman Bin Mohamed"
          />
        </div>
        <div class="leader-mini-text">
          <div class="leader-mini-title">
            <span>Mr Osman Bin Mohamed</span> became SIET’s first President
          </div>
          <div class="leader-mini-sub">
            Session <strong>(1980/1981)</strong>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ======================
     NEW: QUICK ACTION BUTTONS
     ====================== -->
<div class="leaders-actions mb-3">
  <a href="notificationundersection.php" class="leaders-action-btn btn-gazette">
    <span class="btn-icon">📄</span>
    <span class="btn-text">
      <span class="btn-title">Societies Act Notice</span>
      <span class="btn-sub">Registration record (1980)</span>
    </span>
  </a>

  <a href="displaylaw.php" class="leaders-action-btn btn-history">
    <span class="btn-icon">🏛️</span>
    <span class="btn-text">
      <span class="btn-title">SIET History & Identity</span>
      <span class="btn-sub">Name change & documents (1980–2010)</span>
    </span>
  </a>
</div>
          <h2 class="leaders-title">
            SIET – Past Presidents / Past Honorary Secretaries / Past Honorary Treasurers
            <span class="leaders-sub">since 1980</span>
          </h2>

          <div class="leaders-text">
            <p class="mb-2">
              This section summarises SIET’s leadership history by session, including the President, Honorary Secretary,
              and Honorary Treasurer. For the complete official record, please download the PDF.
            </p>
          </div>

          <div class="leaders-table-wrap">
            <table class="table table-bordered leaders-table align-middle">
              <thead>
                <tr>
                  <th style="width:70px;">No.</th>
                  <th style="width:130px;">Session</th>
                  <th>President</th>
                  <th>Honorary Secretary</th>
                  <th>Honorary Treasurer</th>
                </tr>
              </thead>
              <tbody>
                <!-- Sample rows (edit/extend anytime) -->
                <tr>
                  <td>1.</td>
                  <td>1980/1981</td>
                  <td>Osman Bin Mohamed</td>
                  <td>Sam Man Keong</td>
                  <td>Tan Chor Him</td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>1981/1982</td>
                  <td>Osman Bin Mohamed</td>
                  <td>Kwek Seng Heng</td>
                  <td>
                    Soon Lay Tin (Oct 81 – Mar 82)<br>
                    Eng Lee Song (Apr 82 – Sep 82)
                  </td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>1982/1983</td>
                  <td>Eng Lee Song</td>
                  <td>Kwek Seng Heng</td>
                  <td>Tan Eng Siong</td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>1983/1984</td>
                  <td>Osman Bin Mohamed</td>
                  <td>Kwek Seng Heng</td>
                  <td>Tan Meng Kim</td>
                </tr>
                <tr>
                  <td>5.</td>
                  <td>1984/1985</td>
                  <td>Osman Bin Mohamed</td>
                  <td>Koo Fong</td>
                  <td>Eng Lee Song</td>
                </tr>
                <tr>
                  <td>6.</td>
                  <td>1985/1986</td>
                  <td>Osman Bin Mohamed</td>
                  <td>Koo Fong</td>
                  <td>Paat B Kamsi</td>
                </tr>
                <tr>
                  <td>7.</td>
                  <td>1986/1987</td>
                  <td>Sam Man Keong</td>
                  <td>
                    Teng Kwok Heong (Oct 86 – Jul 87)<br>
                    Chow Kwok Weng
                  </td>
                  <td>
                    Lee Teik Leng (Oct 86 – Jul 87)<br>
                    Koo Fong (Jul 87 – Sep 87)
                  </td>
                </tr>
                <tr>
                  <td>8.</td>
                  <td>1987/1988</td>
                  <td>Sam Man Keong</td>
                  <td>Koh Beng Thong</td>
                  <td>Chow Kwok Weng</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="leaders-download mt-3">
            <div class="leaders-download__text">
              <h6 class="mb-1 fw-bold">Download the full leadership record</h6>
              <p class="mb-0 text-muted">
                Click the button below to download the official PDF file containing the complete list of past leaders and sessions.
              </p>
            </div>

            <a href="assets/pdfs/Past Presidents.pdf" class="btn btn-primary leaders-btn" download>
              PDF Download
            </a>
          </div>

          <!-- <p class="text-muted small mt-3 mb-0">
            *Update the PDF path in the button: <strong>assets/pdfs/siet-past-leaders.pdf</strong>
          </p> -->
        </div>
      </div>

    </div>
  </div>
</section>


<style>
  /* =========================================================
     FOUNDERS PAGE CSS
     ========================================================= */
  .founders-hero{
    background:
      radial-gradient(900px 380px at 20% 10%, rgba(13,110,253,.16), transparent 60%),
      radial-gradient(700px 360px at 90% 20%, rgba(168,85,247,.12), transparent 55%),
      linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
    border-bottom: 1px solid rgba(0,0,0,.06);
  }

  .founders-hero__inner{
    padding: 44px 0;
    max-width: 980px;
  }

  .founders-hero__badge{
    display: inline-flex;
    align-items: center;
    font-weight: 800;
    font-size: .85rem;
    color: #0d6efd;
    background: rgba(13,110,253,.10);
    border: 1px solid rgba(13,110,253,.18);
    padding: 8px 12px;
    border-radius: 999px;
    margin-bottom: 12px;
  }

  .founders-hero__title{
    font-weight: 900;
    letter-spacing: .2px;
    margin: 0 0 10px 0;
    color: #111827;
  }

  .founders-hero__subtitle{
    margin: 0;
    color: #6b7280;
    font-size: 1.05rem;
    line-height: 1.6;
  }

  .founders-page{ background: #f6f7f9; }

  .founders-card,
  .leaders-card{
    background: #fff;
    border: 1px solid rgba(0,0,0,.08);
    box-shadow: 0 18px 35px rgba(0,0,0,.10);
    border-radius: 10px;
    padding: 18px;
    height: 100%;
  }

  .founders-title{
    font-weight: 900;
    font-size: 1.7rem;
    margin-bottom: 12px;
  }

  .founders-poster-wrap{
    border: 1px solid rgba(0,0,0,.10);
    border-radius: 10px;
    overflow: hidden;
    background: #fff;
  }

  .founders-poster{
    width: 100%;
    height: auto;
    display: block;
  }

  .founders-note{
    color: #6b7280;
    font-size: .85rem;
    margin-top: 10px;
  }

  .leaders-title{
    font-weight: 900;
    color: #6d70ff;            /* similar purple-blue heading */
    margin-bottom: 10px;
    line-height: 1.2;
  }

  .leaders-sub{
    display: inline-block;
    font-weight: 900;
  }

  .leaders-text{
    color: #374151;
    line-height: 1.7;
    margin-bottom: 10px;
  }

  .leaders-table-wrap{
    border: 1px solid rgba(0,0,0,.10);
    border-radius: 10px;
    overflow: auto; /* makes table scroll on small screens */
    background: #fff;
  }

  .leaders-table{
    margin: 0;
    min-width: 860px; /* keeps like your sample table */
  }

  .leaders-table thead th{
    background: #f8fafc;
    font-weight: 900;
    white-space: nowrap;
  }

  .leaders-table td{
    vertical-align: top;
    font-size: .95rem;
  }

  .leaders-download{
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 14px;
    padding: 14px;
    border: 1px solid rgba(13,110,253,.18);
    background: rgba(13,110,253,.06);
    border-radius: 12px;
  }

  .leaders-btn{
    white-space: nowrap;
    padding: 10px 16px;
    font-weight: 800;
  }

  @media (max-width: 991.98px){
    .leaders-download{
      flex-direction: column;
      align-items: stretch;
      text-align: center;
    }
    .leaders-btn{
      width: 100%;
    }
  }

  @media (max-width: 576px){
    .founders-hero__inner{ padding: 34px 0; }
    .founders-hero__title{ font-size: 1.6rem; }
  }

  /* =========================================================
   TOP RIGHT 2-LEADERS GALLERY (ABOVE TABLE) 
   ========================================================= */
.leaders-top-gallery{
  padding: 12px;
  border-radius: 12px;
  border: 1px solid rgba(13,110,253,.14);
  background:
    radial-gradient(700px 280px at 10% 0%, rgba(13,110,253,.10), transparent 60%),
    linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
}

.leader-mini-card{
  height: 100%;
  display: grid;
  grid-template-columns: 96px 1fr;
  gap: 12px;
  align-items: center;
  padding: 12px;
  border-radius: 12px;
  border: 1px solid rgba(0,0,0,.08);
  background: #fff;
  box-shadow: 0 10px 20px rgba(0,0,0,.08);
  transition: transform .18s ease, box-shadow .18s ease;
}

.leader-mini-card:hover{
  transform: translateY(-2px);
  box-shadow: 0 14px 26px rgba(0,0,0,.12);
}

.leader-mini-img{
  width: 96px;
  height: 96px;
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid rgba(0,0,0,.10);
  background: #fff;
}

.leader-mini-img img{
  width: 100%;
  height: 100%;
  display: block;
  object-fit: cover;
  object-position: center;
  filter: grayscale(15%);
}

.leader-mini-title{
  font-weight: 900;
  color: #1d4ed8; /* bold blue like your reference */
  line-height: 1.25;
  font-size: 0.98rem;
}

.leader-mini-title span{
  color: #0b5ed7;
}

.leader-mini-sub{
  margin-top: 6px;
  color: #374151;
  font-size: .92rem;
  line-height: 1.3;
}

@media (max-width: 576px){
  .leader-mini-card{
    grid-template-columns: 84px 1fr;
  }
  .leader-mini-img{
    width: 84px;
    height: 84px;
    border-radius: 10px;
  }
}

/* =========================================================
   NEW: FOUNDERS PAGE ACTION BUTTONS
   ========================================================= */
.leaders-actions{
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 12px;
}

.leaders-action-btn{
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px 14px;
  border-radius: 14px;
  text-decoration: none;
  border: 1px solid rgba(0,0,0,.10);
  background: #ffffff;
  box-shadow: 0 12px 22px rgba(0,0,0,.08);
  transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
}

.leaders-action-btn:hover{
  transform: translateY(-2px);
  box-shadow: 0 16px 28px rgba(0,0,0,.12);
  border-color: rgba(13,110,253,.25);
}

.leaders-action-btn:active{
  transform: translateY(0);
  box-shadow: 0 10px 18px rgba(0,0,0,.10);
}

.leaders-action-btn .btn-icon{
  width: 44px;
  height: 44px;
  border-radius: 12px;
  display: grid;
  place-items: center;
  font-size: 20px;
  border: 1px solid rgba(0,0,0,.08);
}

.leaders-action-btn .btn-text{
  display: flex;
  flex-direction: column;
  line-height: 1.2;
}

.leaders-action-btn .btn-title{
  font-weight: 900;
  color: #111827;
}

.leaders-action-btn .btn-sub{
  margin-top: 4px;
  font-size: .9rem;
  color: #6b7280;
}

/* Theme variations */
.btn-gazette .btn-icon{
  background: rgba(17,24,39,.06);
  color: #111827;
}

.btn-history .btn-icon{
  background: rgba(13,110,253,.10);
  color: #0d6efd;
}

/* Make buttons stack on small screens */
@media (max-width: 768px){
  .leaders-actions{
    grid-template-columns: 1fr;
  }
}

</style>


</main>
<?php
include "footer.php";
?>
