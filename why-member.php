<?php
  $page_id = 'why-member';
  $active = 'membership';
  $page_css = ['sections.css'];
  include 'header.php';
?>
<main>
<section class="page-hero">
  <div class="container py-5">
    <div class="row align-items-center g-4">
      <div class="col-lg-7">
        <h1 class="mb-2">Why Become SIET Member</h1>
        <p class="text-muted mb-0">Professional membership is more than a credential — it is a living connection to knowledge, networks, and a collective voice.</p>
      </div>
      
    </div>
  </div>
</section>

<section class="why-wrap py-4">
  <div class="container">

    <div class="why-slide">
      <div class="why-frame">

        <div class="why-grid">

          <!-- ======================
               LEFT: IMAGE PANEL
               ====================== -->
          <aside class="why-left" aria-label="Why become SIET member image">
            <img
              src="images/Why Become SIET Member.png"
              alt="Why Become SIET Member"
              class="why-img"
            />
          </aside>

          <!-- ======================
               RIGHT: 3 TEXT BLOCKS
               ====================== -->
          <section class="why-right">

            <!-- Block 1 -->
            <div class="why-block">
              <h2 class="why-h2">1. Professional Membership: More Than a Credential</h2>
              <p class="why-p">
                SIET membership is not just a title. It is entry into a vibrant, multi-disciplinary network of engineering and ICT professionals.
                As a member, you gain access to a community that values collaboration, knowledge-sharing, and collective achievement.
                It is where professional identity meets belonging.
              </p>
            </div>

            <!-- Block 2 -->
            <div class="why-block">
              <h2 class="why-h2">2. Professional Certifications: Upholding Standards, Elevating Excellence</h2>
              <p class="why-p">
                Through the SIET Examination &amp; Accreditation Board (EAB), members are rigorously reviewed and accredited as Technical
                Professionals at their respective level. Since 2008, SIET’s Professional Certification Scheme has set benchmarks for integrity,
                industry standards, and professional excellence. Certification means joining a respected body of professionals who lead with
                credibility and uphold the highest standards of practice.
              </p>
            </div>

            <!-- Block 3 -->
            <div class="why-block">
              <h2 class="why-h2">3. International Recognition: Pathway to Chartered Engineer</h2>
              <p class="why-p">
                SIET membership is a gateway to international recognition. Accredited members are supported in their progression towards
                <strong>Chartered Engineer status under the Royal Charter</strong>, aligning with global standards of professional excellence.
                This recognition elevates your career, positioning you among the world’s most respected engineering professionals.
              </p>
            </div>
<!-- ======================
     BUTTONS (Restored)
     ====================== -->
<div class="why-actions">
  <!-- <a href="professionalexaminations.php" class="why-btn why-btn-primary">
    Professional Membership
  </a> -->

  <a href="membership-benefits.php" class="why-btn why-btn-outline">
    Membership Benefits
  </a>

  <a href="membership-pathways.php" class="why-btn why-btn-primary">
    Membership Pathways
  </a>
</div>
          </section>

        </div>

      </div>
    </div>

  </div>
</section>


<style>
  /* =========================================================
   WHY MEMBER - ACTION BUTTONS (Restored)
   ========================================================= */
.why-actions{
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  justify-content: flex-end;   /* align right like “good location” */
  margin-bottom: 10px;
}

.why-btn{
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 10px 14px;
  border-radius: 12px;
  font-weight: 900;
  text-decoration: none;
  transition: transform .18s ease, box-shadow .18s ease, filter .18s ease, border-color .18s ease;
  box-shadow: 0 12px 22px rgba(0,0,0,.10);
  border: 1px solid rgba(0,0,0,.12);
  white-space: nowrap;
}

.why-btn:hover{
  transform: translateY(-1px);
  box-shadow: 0 16px 28px rgba(0,0,0,.14);
  filter: brightness(1.02);
}

.why-btn:active{
  transform: translateY(0);
  box-shadow: 0 10px 18px rgba(0,0,0,.10);
}

/* Variants */
.why-btn-primary{
  background: linear-gradient(180deg, #0d6efd 0%, #0b5ed7 100%);
  color: #fff;
  border-color: rgba(13,110,253,.30);
}

.why-btn-outline{
  background: #ffffff;
  color: #0b5ed7;
  border: 1px solid rgba(13,110,253,.35);
}

.why-btn-dark{
  background: #111827;
  color: #ffffff;
  border-color: rgba(17,24,39,.35);
}

/* Mobile: full width buttons */
@media (max-width: 576px){
  .why-actions{
    justify-content: stretch;
  }
  .why-btn{
    width: 100%;
  }
}

  /* =========================================================
     WHY MEMBER (Slide Style)
     ========================================================= */
  .why-wrap{ background:#f6f7f9; }

  .why-slide{
    max-width: 1200px;
    margin: 0 auto;
    background:#fff;
    border: 2px solid #111827;
    box-shadow: 0 18px 40px rgba(0,0,0,.10);
  }

  .why-frame{
    margin: 10px;
    border: 1px solid rgba(0,0,0,.35);
    background: #fff;
  }

  .why-grid{
    display: grid;
    grid-template-columns: 38% 62%;
    min-height: 620px;
  }

  /* LEFT image */
  .why-left{
    border-right: 1px solid rgba(0,0,0,.18);
    background: #ffffff;
    overflow: hidden;
    display: grid;
    place-items: stretch;
  }

  .why-img{
    width: 100%;
    height: 100%;
    object-fit: cover; /* like slide */
    display: block;
  }

  /* RIGHT text blocks */
  .why-right{
    padding: 20px 22px;
    display: grid;
    grid-template-rows: 1fr 1fr 1fr; /* 3 blocks top-down */
    gap: 14px;
  }

  .why-block{
    border: 1px solid rgba(0,0,0,.14);
    border-radius: 12px;
    background: #ffffff;
    padding: 14px 14px 12px;
    box-shadow: 0 12px 22px rgba(0,0,0,.06);
  }

  .why-h2{
    font-size: 1.18rem;
    font-weight: 900;
    margin: 0 0 8px 0;
    color: #111827;
  }

  .why-p{
    margin: 0;
    color: #111;
    font-size: 1.02rem;
    line-height: 1.55;
  }

  /* Responsive */
  @media (max-width: 992px){
    .why-grid{
      grid-template-columns: 1fr;
      min-height: auto;
    }
    .why-left{
      border-right: 0;
      border-bottom: 1px solid rgba(0,0,0,.18);
    }
    .why-img{
      height: auto;
      object-fit: contain;
      background: #fff;
    }
    .why-right{
      grid-template-rows: auto;
    }
  }

  @media (max-width: 576px){
    .why-right{ padding: 16px; }
    .why-h2{ font-size: 1.05rem; }
    .why-p{ font-size: .98rem; }
  }
</style>

</main>
<?php include "footer.php"; ?>
