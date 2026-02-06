<?php
  $active = "about";
  $page_css = ["about.css","sections.css", "contact.css"];
  include "header.php";
?>
<main>
<?php $page_id = 'organisation'; ?>


<!-- ======================
     ORGANISATION PAGE
     ====================== -->
<section class="page-hero py-5">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-7">
        <span class="badge-soft mb-3 d-inline-block">About SIET</span>
        <h1 class="mb-2">Organisation Structure</h1>
        <p class="lead mb-0">
          The Executive Council is elected from among corporate members and leads the Institute’s governance and direction.
        </p>
      </div>
    </div>
  </div>
</section>

<section class="org-content py-5">
  <div class="container">
    <div class="row g-4 align-items-stretch">

      <!-- MAIN CONTENT -->
      <div class="col-lg-8">
        <div class="org-card">
          <h2 class="org-card__title">Executive Council Composition</h2>
          <p class="org-card__text">
            The Executive Council of the Institute shall be elected from among corporate members and shall consist of the
            following Council Members:
          </p>

          <div class="org-grid mt-3">

            <!-- PRESIDENT -->
            <div class="org-role">
              <div class="org-role__title">The President</div>
              <div class="org-role__desc">Head of the Executive Council.</div>
            </div>

            <!-- PAST PRESIDENT -->
            <div class="org-role">
              <div class="org-role__title">The Immediate Past President</div>
              <div class="org-role__desc">Provides continuity and guidance.</div>
            </div>

            <!-- VP 1 -->
            <div class="org-role">
              <div class="org-role__title">First Vice-President</div>
              <div class="org-role__desc">Chairman for Membership &amp; Qualification Sub-Committee.</div>
            </div>

            <!-- VP 2 -->
            <div class="org-role">
              <div class="org-role__title">Second Vice-President</div>
              <div class="org-role__desc">Chairman for Education &amp; Training Sub-Committee.</div>
            </div>

            <!-- SECRETARY -->
            <div class="org-role">
              <div class="org-role__title">Honorary Secretary</div>
              <div class="org-role__desc">Oversees administrative and governance documentation.</div>
            </div>

            <div class="org-role">
              <div class="org-role__title">Honorary Assistant Secretary</div>
              <div class="org-role__desc">Supports the Honorary Secretary in administration.</div>
            </div>

            <!-- TREASURER -->
            <div class="org-role">
              <div class="org-role__title">Honorary Treasurer</div>
              <div class="org-role__desc">Oversees financial governance and reporting.</div>
            </div>

            <div class="org-role">
              <div class="org-role__title">Honorary Assistant Treasurer</div>
              <div class="org-role__desc">Supports the Honorary Treasurer with finance duties.</div>
            </div>

          </div>

          <hr class="org-divider">

          <h3 class="org-card__subtitle">Council Members (7 Seats)</h3>
          <p class="org-card__text">
            Seven Council Members shall be appointed, consisting of at least one representative from each of the following disciplines:
          </p>

          <div class="org-disciplines">
            <span class="org-chip">Civil Engineering</span>
            <span class="org-chip">Electrical Engineering</span>
            <span class="org-chip">Mechanical Engineering</span>
          </div>

          <hr class="org-divider">

          <h3 class="org-card__subtitle">Eligibility Requirement</h3>
          <p class="org-card__text">
            Any corporate member shall be eligible to hold the office of President, Vice-President, Honorary Secretary,
            Honorary Assistant Secretary, Honorary Treasurer, or Honorary Assistant Treasurer, provided that the member is a
            <strong>Citizen or Permanent Resident of Singapore</strong>.
          </p>

          <hr class="org-divider">

          <h3 class="org-card__subtitle">Co-opted Council Members</h3>
          <p class="org-card__text mb-0">
            The Executive Council may, at its discretion, co-opt up to <strong>two additional corporate members</strong> to serve
            as Council Members. Such members shall hold office until the next <strong>Annual General Meeting (AGM)</strong>.
          </p>
        </div>
      </div>

      <!-- SIDE PANEL -->
      <div class="col-lg-4">
        <div class="org-side">

          <div class="org-side__card">
            <h3 class="org-side__title">Quick Highlights</h3>

            <div class="org-kpi">
              <div class="org-kpi__label">Key Leadership Roles</div>
              <div class="org-kpi__value">8 Roles</div>
            </div>

            <div class="org-kpi">
              <div class="org-kpi__label">Council Members</div>
              <div class="org-kpi__value">7 Seats</div>
            </div>

            <div class="org-kpi">
              <div class="org-kpi__label">Co-opted Members</div>
              <div class="org-kpi__value">Up to 2</div>
            </div>

            <div class="org-kpi mb-0">
              <div class="org-kpi__label">Eligibility (Key Offices)</div>
              <div class="org-kpi__value">SG Citizen / PR</div>
            </div>
          </div>

          <div class="org-side__card">
            <h3 class="org-side__title">Next Steps</h3>
            <p class="org-side__text">
              Interested in membership or council participation? Explore membership pathways and requirements.
            </p>
            <a href="membership-pathways.php" class="btn btn-primary w-100">View Membership Pathways</a>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>


<style>
  /* =========================================================
     ORGANISATION PAGE CSS
     ========================================================= */

  /* Hero */
  .org-hero{
    background:
      radial-gradient(900px 380px at 20% 10%, rgba(13,110,253,.18), transparent 60%),
      radial-gradient(700px 360px at 90% 20%, rgba(22,163,74,.14), transparent 55%),
      linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
    border-bottom: 1px solid rgba(0,0,0,.06);
  }

  .org-hero__inner{
    padding: 44px 0;
    max-width: 980px;
  }

  .org-hero__badge{
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

  .org-hero__title{
    font-weight: 900;
    letter-spacing: .2px;
    margin: 0 0 10px 0;
    color: #111827;
  }

  .org-hero__subtitle{
    margin: 0;
    color: #6b7280;
    font-size: 1.05rem;
    line-height: 1.6;
  }

  /* Main card */
  .org-card{
    background: #fff;
    border: 1px solid rgba(0,0,0,.06);
    border-radius: 18px;
    padding: 22px;
    box-shadow: 0 10px 25px rgba(0,0,0,.06);
    height: 100%;
  }

  .org-card__title{
    font-weight: 900;
    margin-bottom: 10px;
  }

  .org-card__subtitle{
    font-weight: 900;
    margin: 0 0 10px 0;
    font-size: 1.1rem;
  }

  .org-card__text{
    color: #374151;
    line-height: 1.75;
    margin: 0;
  }

  .org-divider{
    border: none;
    height: 1px;
    background: rgba(0,0,0,.08);
    margin: 18px 0;
  }

  /* Roles grid */
  .org-grid{
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 12px;
  }

  .org-role{
    background: #f8fafc;
    border: 1px solid rgba(0,0,0,.06);
    border-radius: 16px;
    padding: 14px 14px;
  }

  .org-role__title{
    font-weight: 900;
    color: #111827;
    margin-bottom: 6px;
  }

  .org-role__desc{
    color: #6b7280;
    font-size: .95rem;
    line-height: 1.5;
  }

  /* Discipline chips */
  .org-disciplines{
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 10px;
  }

  .org-chip{
    display: inline-flex;
    align-items: center;
    font-weight: 800;
    font-size: .95rem;
    padding: 10px 12px;
    border-radius: 999px;
    border: 1px solid rgba(13,110,253,.18);
    background: rgba(13,110,253,.08);
    color: #0d6efd;
  }

  /* Side panel */
  .org-side{
    display: grid;
    gap: 14px;
  }

  .org-side__card{
    background: #fff;
    border: 1px solid rgba(0,0,0,.06);
    border-radius: 18px;
    padding: 18px;
    box-shadow: 0 10px 25px rgba(0,0,0,.05);
  }

  .org-side__title{
    font-weight: 900;
    margin-bottom: 12px;
    font-size: 1.05rem;
  }

  .org-side__text{
    color: #6b7280;
    margin-bottom: 14px;
    line-height: 1.6;
  }

  .org-kpi{
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    padding: 10px 12px;
    border-radius: 14px;
    background: #f8fafc;
    border: 1px solid rgba(0,0,0,.06);
    margin-bottom: 10px;
  }

  .org-kpi__label{
    color: #6b7280;
    font-weight: 800;
    font-size: .9rem;
  }

  .org-kpi__value{
    color: #111827;
    font-weight: 900;
    font-size: .95rem;
    text-align: right;
  }

  /* Responsive */
  @media (max-width: 991.98px){
    .org-hero__inner{ padding: 34px 0; }
    .org-grid{ grid-template-columns: 1fr; }
  }

  @media (max-width: 576px){
    .org-hero__title{ font-size: 1.6rem; }
    .org-hero__subtitle{ font-size: .98rem; }
    .org-card{ padding: 18px 16px; }
    .org-side__card{ padding: 16px 14px; }
  }
</style>


</main>
<?php
include "footer.php";
?>
