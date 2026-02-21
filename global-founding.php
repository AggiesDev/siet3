<?php
  $active = 'about';
  $page_css = ['sections.css'];
  include 'header.php';
  $spc_certificate_img = "images/Singapore Professional Centre (SPC).jpg";
?>
<br>
<section class="section-pad global-founding-wrap">
  <div class="container">
    <div class="row g-4 align-items-start">

      <!-- LEFT: TEXT -->
      <div class="col-lg-7">
        <h1 class="gf-title">Founding Members &amp; Members</h1>

        <div class="gf-block">
          <div class="gf-subtitle gf-blue">Founding Member</div>

          <ul class="gf-list">
            <li>
              Founding Members of the World Federation of Technology Organizations (WFTO)
              <ul>
                <li>
                  <a class="gf-link" href="https://wfto.org/" target="_blank" rel="noopener">
                    World Federation of Technology Organizations
                  </a>
                </li>
              </ul>
            </li>

            <li>
              Founding Members of the Global Technological Alliance (GTA)
              <ul>
                <li>
                  <a class="gf-link" href="https://www.mbot.org.my/" target="_blank" rel="noopener">
                    MBOT - Malaysia Board Of Technologists
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>

        <div class="gf-block mt-4">
          <div class="gf-subtitle gf-pink">Member</div>

          <ul class="gf-list">
            <li>
              Member of ASEAN Federation of Engineering Organisations (AFEO)
              <ul>
                <li>
                  <a class="gf-link" href="https://www.afeo.org/" target="_blank" rel="noopener">
                    ASEAN Federation of Engineering Organisations (AFEO)
                  </a>
                </li>
              </ul>
            </li>

            <li>
              Member of the Singapore Professional Centre (SPC)
              <ul>
                <li>
                  <a class="gf-link" href="http://www.spc.org.sg" target="_blank" rel="noopener">
                    Welcome to the Singapore Professional Centre
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>

      <!-- RIGHT: IMAGE -->
      <!-- <div class="col-lg-5">
        <div class="gf-img-card">
          <div class="gf-img-inner">
            <img
              src="<?= htmlspecialchars($spc_certificate_img) ?>"
              alt="Singapore Professional Centre Certificate of Membership"
              class="img-fluid gf-img"
              onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
            />
            <div class="gf-img-fallback" style="display:none;">
              <div class="gf-fb-title">Certificate Image Not Found</div>
              <div class="gf-fb-text">
                Please upload your image and set the correct path in:
                <span class="gf-path"><?= htmlspecialchars($spc_certificate_img) ?></span>
              </div>
            </div>
          </div>

          <div class="gf-caption">
            <span class="gf-cap-title">Singapore Professional Centre</span>
            <span class="gf-cap-sub">Certificate of Membership (Reference)</span>
          </div>
        </div>
      </div> -->

    </div>
  </div>
</section>
<br>
<style>
  /* === Page look (matches your slide style) === */
  .global-founding-wrap{ background:#fff; }

  .gf-title{
    font-size: 3.1rem;
    font-weight: 300;
    letter-spacing: .2px;
    margin: 0 0 18px;
    color:#111;
    text-shadow: 2px 2px 0 rgba(0,0,0,.10);
  }

  .gf-block{
    padding-top: 6px;
  }

  .gf-subtitle{
    font-size: 1.25rem;
    font-weight: 800;
    margin-bottom: 10px;
  }
  .gf-blue{ color:#0b3dff; }
  .gf-pink{ color:#ff2f7a; }

  .gf-list{
    margin: 0;
    padding-left: 18px;
    color:#111;
    font-size: 1.05rem;
    line-height: 1.65;
  }
  .gf-list > li{ margin-bottom: 12px; }
  .gf-list ul{
    margin-top: 6px;
    margin-bottom: 0;
    padding-left: 22px;
    list-style: none;
  }
  .gf-list ul li::before{
    content: "– ";
    margin-right: 6px;
    color:#111;
    font-weight: 700;
  }

  .gf-link{
    color:#0b3dff;
    text-decoration: underline;
    text-underline-offset: 3px;
    font-weight: 600;
  }
  .gf-link:hover{
    color:#0630cc;
  }

  /* Right image card */
  .gf-img-card{
    background:#fff;
    border-radius: 14px;
    border: 1px solid rgba(0,0,0,.10);
    box-shadow: 0 16px 30px rgba(0,0,0,.08);
    overflow: hidden;
  }
  .gf-img-inner{
    padding: 14px;
    background: #fafafa;
  }
  .gf-img{
    width: 100%;
    height: auto;
    display:block;
    border-radius: 10px;
    border: 1px solid rgba(0,0,0,.10);
    background:#fff;
  }

  .gf-img-fallback{
    border: 1px dashed rgba(0,0,0,.25);
    border-radius: 10px;
    padding: 18px;
    background: #fff;
    text-align: center;
  }
  .gf-fb-title{
    font-weight: 900;
    margin-bottom: 6px;
  }
  .gf-fb-text{
    color:#6b7280;
    font-size: .95rem;
  }
  .gf-path{
    display:inline-block;
    margin-top: 6px;
    padding: 6px 10px;
    border-radius: 999px;
    background: rgba(13,110,253,.10);
    color:#0b3dff;
    font-weight: 800;
    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
    font-size: .85rem;
  }

  .gf-caption{
    padding: 12px 14px 14px;
    border-top: 1px solid rgba(0,0,0,.08);
    background:#fff;
  }
  .gf-cap-title{
    display:block;
    font-weight: 900;
    color:#111;
  }
  .gf-cap-sub{
    display:block;
    color:#6b7280;
    font-size: .95rem;
    margin-top: 2px;
  }

  @media (max-width: 991.98px){
    .gf-title{ font-size: 2.3rem; }
  }
</style>

<?php include 'footer.php'; ?>
