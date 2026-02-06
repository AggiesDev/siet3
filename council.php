<?php
  $active = "about";
  $page_css = ["about.css"];
  include "header.php";
?>
<main>
<?php $page_id = 'council'; ?>


<!-- ======================
     EXECUTIVE COUNCIL PAGE
     ====================== -->

<section class="council-page py-5">
  <div class="container">

    <div class="council-card">
      <!-- Title (center like sample) -->
      <div class="council-title-wrap text-center">
        <h1 class="council-title">Executive Council<br><span>2025/2026</span></h1>
      </div>

      <!-- GRID (positions similar to screenshot) -->
      <div class="council-grid">

        <!-- TOP ROW -->
        <div class="council-person pos-top-left">
          <img src="images/About SIET/Photos of Council Member/Mrs Soo-Ng Geok Ling.jpg" alt="Mrs Soo-Ng Geok Ling" class="council-photo">
          <div class="council-name">Mrs Soo-Ng Geok Ling</div>
          <div class="council-role">1<sup>st</sup> Vice-President</div>
        </div>

        <div class="council-person pos-top-center">
          <img src="images/About SIET/Photos of Council Member/Mr Mohd Ridzwan Bin Ramli.jpg" alt="Mr Mohd Ridwan Bin Ramli" class="council-photo">
          <div class="council-name">Mr Mohd Ridwan Bin Ramli</div>
          <div class="council-role">2<sup>nd</sup> Vice-President</div>
        </div>

        <div class="council-person pos-top-right">
          <img src="images/About SIET/Photos of Council Member/Ong Ming Hor Roy.png" alt="Mr Ong Ming Hor Roy" class="council-photo">
          <div class="council-name">Mr Ong Ming Hor Roy</div>
          <div class="council-role">Honorary Secretary</div>
        </div>

        <!-- LEFT SIDE -->
        <div class="council-person pos-left-top">
          <img src="images/About SIET/Photos of Council Member/Mr TRC Raja.png" alt="Mr TRC Raja" class="council-photo">
          <div class="council-name">Mr TRC Raja</div>
          <div class="council-role">Honorary Treasurer</div>
        </div>

        <div class="council-person pos-left-mid">
          <img src="images/About SIET/Photos of Council Member/Ms Goh Joon Loung.jpg" alt="Ms Goh Joon Loung" class="council-photo">
          <div class="council-name">Ms Goh Joon Loung</div>
          <div class="council-role">Honorary Assistant Treasurer</div>
        </div>

        <div class="council-person pos-left-bottom">
          <img src="images/About SIET/Photos of Council Member/Ts Dr Soong Cai Juan Jennifer.jpg" alt="Ts Dr Soong Cai Juan Jennifer" class="council-photo">
          <div class="council-name">Ts Dr Soong Cai Juan Jennifer</div>
          <div class="council-role">Council Member</div>
        </div>

        <!-- RIGHT SIDE -->
        <div class="council-person pos-right-top">
          <img src="images/About SIET/Photos of Council Member/Ms Sam Peck Har.png" alt="Ms Sam Peck Har" class="council-photo">
          <div class="council-name">Ms Sam Peck Har</div>
          <div class="council-role">Honorary Assistant Secretary</div>
        </div>

        <div class="council-person pos-right-mid">
          <img src="images/About SIET/Photos of Council Member/Ms Lu Hongwei.png" alt="Ms Lu Hongwei" class="council-photo">
          <div class="council-name">Ms Lu Hongwei</div>
          <div class="council-role">Council Member</div>
        </div>

        <div class="council-person pos-right-bottom">
          <img src="images/About SIET/Photos of Council Member/Mr Michael Hong Jun Hwa.png" alt="Mr Michael Hong Jun Hwa" class="council-photo">
          <div class="council-name">Mr Michael Hong Jun Hwa</div>
          <div class="council-role">Council Member</div>
        </div>

        <!-- CENTER MAIN (President + Immediate Past President) -->
        <div class="council-person pos-center-president">
          <img src="images/About SIET/Photos of Council Member/Ms Rosalind Li Ying Lim.png" alt="Ms Rosalind Li Ying Lim" class="council-photo council-photo--big">
          <div class="council-name">Ms Rosalind Li Ying Lim</div>
          <div class="council-role">President</div>
        </div>

        <div class="council-person pos-center-past">
          <img src="images/About SIET/Photos of Council Member/Dr Sam Man Keong.png" alt="Dr Sam Man Keong" class="council-photo council-photo--big">
          <div class="council-name">Dr Sam Man Keong</div>
          <div class="council-role">Immediate Past President</div>
        </div>

        <!-- BOTTOM ROW (Council Members) -->
        <div class="council-person pos-bottom-1">
          <img src="images/About SIET/Photos of Council Member/Dr Kyaw Naing.png" alt="Dr Kyaw Naing" class="council-photo">
          <div class="council-name">Dr Kyaw Naing</div>
          <div class="council-role">Council Member</div>
        </div>

        <div class="council-person pos-bottom-2">
          <img src="images/About SIET/Photos of Council Member/Dr Lee Say Chyuan Max.png" alt="Dr Lee Say Chyuan Max" class="council-photo">
          <div class="council-name">Dr Lee Say Chyuan Max</div>
          <div class="council-role">Council Member</div>
        </div>

        <div class="council-person pos-bottom-3">
          <img src="images/About SIET/Photos of Council Member/Ms Tan Chun Wei Jenny.png" alt="Ms Tan Chun Wei Jenny" class="council-photo">
          <div class="council-name">Ms Tan Chun Wei Jenny</div>
          <div class="council-role">Council Member</div>
        </div>

        <div class="council-person pos-bottom-4">
          <img src="images/About SIET/Photos of Council Member/Mr Leo Hee Swee.png" alt="Mr Leo Hee Swee" class="council-photo">
          <div class="council-name">Mr Leo Hee Swee</div>
          <div class="council-role">Council Member</div>
        </div>

      </div>

      <!-- <p class="text-muted small mt-4 mb-0 text-center">
        *Replace images in <strong>assets/images/council/</strong> (p1.jpg, p2.jpg, ...) with your real council photos.
      </p> -->
    </div>

  </div>
</section>


<style>
  /* =========================================================
     COUNCIL PAGE CSS 
     ========================================================= */

  .council-page{
    background: #f6f7f9;
  }

  .council-card{
    background: #fff;
    border: 1px solid rgba(0,0,0,.08);
    box-shadow: 0 18px 35px rgba(0,0,0,.12);
    border-radius: 6px;
    padding: 26px 20px 22px;
    overflow: hidden;
  }

  /* Big blue title like sample */
  .council-title{
    margin: 10px 0 12px;
    font-weight: 900;
    color: #0b46ff;
    text-shadow: 0 2px 0 rgba(0,0,0,.25);
    line-height: 1.05;
    font-size: clamp(2rem, 3.2vw, 3.2rem);
  }
  .council-title span{
    font-weight: 900;
  }

  /* ======= Grid layout (desktop) ======= */
  .council-grid{
    position: relative;
    min-height: 640px;
    margin-top: 10px;
  }

  .council-person{
    position: absolute;
    text-align: center;
    width: 200px;
  }

  /* Photo styling + hover grow effect */
  .council-photo{
    width: 92px;
    height: 112px;
    object-fit: cover;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: 2px;
    background: #fff;
    transition: transform .25s ease, box-shadow .25s ease;
    will-change: transform;
  }

  .council-photo--big{
    width: 102px;
    height: 125px;
  }

  .council-person:hover .council-photo{
    transform: scale(1.10);           /* ✅ hover "a little big" effect */
    box-shadow: 0 14px 24px rgba(0,0,0,.18);
  }

  .council-name{
    margin-top: 8px;
    font-size: 13px;
    font-weight: 400;
    color: #111;
    line-height: 1.2;
  }

  .council-role{
    font-size: 13px;
    font-weight: 400;
    color: #111;
    line-height: 1.2;
  }

  /* ======= Positions (approx match screenshot) ======= */
  .pos-top-left   { top: 0; left: 230px; }
  .pos-top-center { top: 0; left: 50%; transform: translateX(-50%); }
  .pos-top-right  { top: 0; right: 230px; }

  .pos-left-top   { top: 140px; left: 40px; }
  .pos-left-mid   { top: 300px; left: 40px; }
  .pos-left-bottom{ top: 460px; left: 40px; }

  .pos-right-top  { top: 140px; right: 40px; }
  .pos-right-mid  { top: 300px; right: 40px; }
  .pos-right-bottom{ top: 460px; right: 40px; }

  .pos-center-president{ top: 260px; left: 44%; transform: translateX(-50%); width: 220px; }
  .pos-center-past     { top: 260px; left: 56%; transform: translateX(-50%); width: 220px; }

  .pos-bottom-1 { bottom: 10px; left: 260px; }
  .pos-bottom-2 { bottom: 10px; left: 420px; }
  .pos-bottom-3 { bottom: 10px; left: 580px; }
  .pos-bottom-4 { bottom: 10px; left: 740px; }

  /* ======= Responsive: convert to clean grid on tablet/mobile ======= */
  @media (max-width: 1199.98px){
    .council-grid{ min-height: 720px; }
    .pos-bottom-4{ left: 700px; }
  }

  @media (max-width: 991.98px){
    .council-grid{
      position: static;
      min-height: unset;
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 18px 14px;
      margin-top: 18px;
    }

    .council-person{
      position: static;
      width: 100%;
      transform: none !important;
    }

    .council-photo{ width: 92px; height: 112px; }
    .council-photo--big{ width: 100px; height: 124px; }
  }

  @media (max-width: 576px){
    .council-grid{
      grid-template-columns: 1fr;
    }
    .council-title{ font-size: 2rem; }
  }
</style>


</main>
<?php
include "footer.php";
?>
