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
        <h1 class="mb-2">Honorary Patron and Honorary Fellows</h1>
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
          <div class="patron-wrap text-center">
            <h1 style="font-weight: bold;">Honorary Patron</h1>
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

        <!-- RIGHT: HONORARY FELLOWS -->
        <div class="col-lg-7">
          <h1 class="fellows-title text-center text-lg-start">Honorary Fellows</h1>

          <!-- NEW: Fellows grid with photos -->
          <div class="fellows-grid mt-3">

            <!-- Fellow 1 -->
            <div class="fellow-card">
              <div class="fellow-photo">
                <img
                  src="images/About SIET/Photos of Honorary Fellows/Dr Sam Man Keong.png"
                  alt="Dr Sam Man Keong"
                  onerror="this.onerror=null; this.src='images/global/placeholder.png';"
                />
              </div>
              <div class="fellow-body">
                <div class="fellow-top">
                  <div class="fellow-num">1</div>
                  <div class="fellow-name">Dr Sam Man Keong</div>
                </div>
                <div class="fellow-meta">Honorary Fellow</div>
              </div>
            </div>

            <!-- Fellow 2 -->
            <div class="fellow-card">
              <div class="fellow-photo">
                <img
                  src="images/About SIET/Photos of Honorary Fellows/Mr TRC Raja.png"
                  alt="Mr TRC Raja"
                  onerror="this.onerror=null; this.src='images/global/placeholder.png';"
                />
              </div>
              <div class="fellow-body">
                <div class="fellow-top">
                  <div class="fellow-num">2</div>
                  <div class="fellow-name">Mr TRC Raja</div>
                </div>
                <div class="fellow-meta">Honorary Fellow</div>
              </div>
            </div>

            <!-- Fellow 3 -->
            <div class="fellow-card">
              <div class="fellow-photo">
                <img
                  src="images/About SIET/Photos of Honorary Fellows/Low-Sui-Pheng.x728e5ad6.jpg"
                  alt="Dr Low Sui Pheng"
                  onerror="this.onerror=null; this.src='images/global/placeholder.png';"
                />
              </div>
              <div class="fellow-body">
                <div class="fellow-top">
                  <div class="fellow-num">3</div>
                  <div class="fellow-name">Dr Low Sui Pheng</div>
                </div>
                <div class="fellow-meta">Honorary Fellow</div>
              </div>
            </div>

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

  .fellows-title{
    font-weight: 900;
    font-size: clamp(2rem, 3.2vw, 3.2rem);
    color: #000;
    text-shadow: 0 4px 0 rgba(0,0,0,.12);
    margin-bottom: 18px;
  }

  /* Patron image block */
  .patron-wrap{ padding: 6px 0; }

  .patron-img{
    width: 240px;
    height: 300px;
    object-fit: cover;
    border-radius: 2px;
    border: 1px solid rgba(0,0,0,.15);
    background: #fff;
  }

  .patron-caption{ line-height: 1.25; }
  .patron-name{ font-weight: 700; color: #111; }
  .patron-role{ color: #111; }

  /* =========================
     NEW: Fellows grid
     ========================= */
  .fellows-grid{
    display: grid;
    grid-template-columns: 1fr;
    gap: 14px;
  }

  .fellow-card{
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 14px;
    border-radius: 14px;
    background: #fff;
    border: 1px solid rgba(0,0,0,.08);
    box-shadow: 0 10px 22px rgba(0,0,0,.06);
    transition: transform .16s ease, box-shadow .16s ease, border-color .16s ease;
  }
  .fellow-card:hover{
    transform: translateY(-2px);
    box-shadow: 0 18px 40px rgba(0,0,0,.10);
    border-color: rgba(13,110,253,.22);
  }

  .fellow-photo{
    width: 88px;
    height: 88px;
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid rgba(0,0,0,.10);
    background: #f3f4f6;
    flex: 0 0 auto;
    display: grid;
    place-items: center;
  }
  .fellow-photo img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
  }

  .fellow-body{ min-width: 0; }
  .fellow-top{
    display: flex;
    align-items: baseline;
    gap: 10px;
  }
  .fellow-num{
    width: 30px;
    height: 30px;
    border-radius: 999px;
    display: grid;
    place-items: center;
    font-weight: 900;
    font-size: .95rem;
    background: rgba(13,110,253,.12);
    border: 1px solid rgba(13,110,253,.22);
    color: #0d6efd;
    flex: 0 0 auto;
  }
  .fellow-name{
    font-weight: 900;
    font-size: 1.15rem;
    color: #111;
    line-height: 1.2;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
  .fellow-meta{
    margin-top: 4px;
    color: rgba(17,24,39,.68);
    font-size: .95rem;
  }

  /* Responsive */
  @media (max-width: 991.98px){
    .fellows-card{ padding: 22px 18px; }
    .fellows-title{ text-align: center !important; }
    .patron-img{ width: 220px; height: 280px; }
  }

  @media (max-width: 575.98px){
    .fellow-photo{ width: 72px; height: 72px; border-radius: 14px; }
    .fellow-name{ font-size: 1.05rem; }
  }
</style>

</main>
<?php include "footer.php"; ?>