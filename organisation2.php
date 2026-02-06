<?php
  $active = "about";
  $page_css = ["about.css", "organisation.css","sections.css", "contact.css"];
  include "header.php";
?>

<!-- ======================
     ORGANISATION STRUCTURE
     ====================== -->

<section class="page-hero py-5">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-7">
        <span class="badge-soft mb-3 d-inline-block">About SIET</span>
        <h1 class="mb-2">Organisation Structure</h1>
        <!-- <p class="lead mb-0">
          The Executive Council is elected from among corporate members and leads the Institute’s governance and direction.
        </p> -->
      </div>
    </div>
  </div>
</section>

<main class="org-page py-5">
  <div class="container">

    <div class="org-card">
      <div class="org-card__header">
        <h2 class="org-title">Organisation Structure</h2>
        <div class="org-title-rule"></div>
        <p class="org-lead">
          The Executive Council of the Institute shall be elected from among corporate members and shall consist of the following Council Members:
        </p>
      </div>

      <div class="org-card__body">

        <ol class="org-ol">
          <li>The President</li>
          <li>The Immediate Past President</li>

          <li>
            The Vice-Presidents:
            <ol class="org-sub-ol">
              <li>First Vice-President <span class="org-dash">—</span> Chairman for Membership &amp; Qualification Sub-Committee</li>
              <li>Second Vice-President <span class="org-dash">—</span> Chairman for Education &amp; Training Sub-Committee</li>
            </ol>
          </li>

          <li>The Honorary Secretary</li>
          <li>The Honorary Assistant Secretary</li>
          <li>The Honorary Treasurer</li>
          <li>The Honorary Assistant Treasurer</li>

          <li>
            Seven Council Members consisting of at least one each of the following disciplines:
            <ol class="org-sub-ol">
              <li>Civil Engineering</li>
              <li>Electrical Engineering</li>
              <li>Mechanical Engineering</li>
            </ol>
          </li>
        </ol>

        <div class="org-divider"></div>

        <p class="org-paragraph">
          Any corporate member shall be eligible to hold the office of President, Vice-President, Honorary Secretary, Honorary Assistant Secretary,
          Honorary Treasurer, Honorary Assistant Treasurer provided that one is a Citizen or Permanent Resident of Singapore.
        </p>

        <p class="org-paragraph mb-0">
          The Executive Council may, at its discretion, co-opt up to two additional corporate members to serve as Council Members.
          Such members shall hold office until the next Annual General Meeting.
        </p>

      </div>
    </div>

  </div>
</main>

<?php include "footer.php"; ?>
