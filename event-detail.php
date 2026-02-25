<?php
  $active = 'events';
  $page_css = ['sections.css'];
  include 'header.php';

  include 'events-data.php';

  $data = load_events_data();
  $events = $data['events'] ?? [];

  $id = $_GET['id'] ?? '';
  $event = null;

  foreach ($events as $e){
    if (($e['id'] ?? '') === $id) { $event = $e; break; }
  }
?>

<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2"><?php echo $event ? htmlspecialchars($event['title'] ?? '') : 'Event Details'; ?></h1>

    <?php if ($event): ?>
      <div class="meta-row">
        <?php if (!empty($event['date'])): ?>
          <span class="pill">📅 <?php echo htmlspecialchars($event['date']); ?></span>
        <?php endif; ?>
        <?php if (!empty($event['location'])): ?>
          <span class="pill">📍 <?php echo htmlspecialchars($event['location']); ?></span>
        <?php endif; ?>
        <?php if (!empty($event['category'])): ?>
          <span class="pill"><?php echo htmlspecialchars($event['category']); ?></span>
        <?php endif; ?>
        <?php if (!empty($event['subcategory'])): ?>
          <span class="pill"><?php echo htmlspecialchars($event['subcategory']); ?></span>
        <?php endif; ?>
      </div>
    <?php else: ?>
      <p class="text-muted mb-0">Event not found. Please return to Events.</p>
    <?php endif; ?>
  </div>
</section>
<br>
<section class="section-pad">
  <div class="container">
    <?php if ($event): ?>

      <img src="<?php echo htmlspecialchars($event['banner'] ?? ($event['image'] ?? 'images/1.jpg')); ?>"
           alt="<?php echo htmlspecialchars($event['title'] ?? ''); ?>"
           class="w-100 rounded-4 img-hover"
           style="max-height:360px; object-fit:cover;" />

      <div class="row g-4 mt-1">

        <!-- LEFT -->
        <div class="col-lg-8">
          <div class="lead-card">
            <h4 class="mb-2">About this event</h4>
            <?php foreach (($event['desc'] ?? []) as $p): ?>
              <p class="text-muted mb-2"><?php echo htmlspecialchars($p); ?></p>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- RIGHT: one column blocks -->
        <div class="col-lg-4">

          <div class="lead-card">
            <h5 class="mb-2">Back</h5>
            <a class="btn btn-outline-primary w-100 rounded-pill" href="events.php">← Back to Events</a>
          </div>

          <?php $embed = trim($event['youtube_embed'] ?? ''); ?>
          <?php if ($embed !== ''): ?>
            <div class="lead-card mt-4">
              <h5 class="mb-3">Video</h5>
              <div class="ev-media-box">
                <iframe
                  src="<?php echo htmlspecialchars($embed); ?>"
                  title="YouTube video"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                  allowfullscreen>
                </iframe>
              </div>
            </div>
          <?php endif; ?>

          <?php
            $gallery_on = !empty($event['gallery_on']);
            $imgs = $event['gallery'] ?? [];
            $imgs = is_array($imgs) ? array_values(array_filter($imgs, fn($x)=>is_string($x) && trim($x)!=='')) : [];
          ?>
          <?php if ($gallery_on && !empty($imgs)): ?>
            <div class="lead-card mt-4">
              <h5 class="mb-3">Gallery</h5>
              <div class="ev-gallery">
                <?php foreach ($imgs as $i => $img): ?>
                  <button
                    type="button"
                    class="ev-gallery-item"
                    data-bs-toggle="modal"
                    data-bs-target="#galleryLightbox"
                    data-img="<?php echo htmlspecialchars($img); ?>"
                    data-cap="Event photo <?php echo ($i+1); ?>"
                  >
                    <img src="<?php echo htmlspecialchars($img); ?>" alt="Event photo <?php echo ($i+1); ?>" />
                  </button>
                <?php endforeach; ?>
              </div>
              <?php if (count($imgs) > 6): ?>
                <div class="text-muted small mt-2">Scroll to view more images.</div>
              <?php endif; ?>
            </div>
          <?php endif; ?>

          <?php
            $downloads_on = !empty($event['downloads_on']);
            $files = $event['downloads'] ?? [];
            $files = is_array($files) ? array_values(array_filter($files, fn($x)=>is_string($x) && trim($x)!=='')) : [];
            $btnName = trim($event['download_button_name'] ?? '');
          ?>
          <?php if ($downloads_on && !empty($files)): ?>
            <div class="lead-card mt-4">
              <h5 class="mb-2">Downloads</h5>
              <p class="text-muted mb-3">Download event related files.</p>
              <div class="d-grid gap-2">
                <?php foreach ($files as $file): ?>
                  <?php $label = $btnName !== '' ? $btnName : ("Download " . basename($file)); ?>
                  <a class="btn btn-primary rounded-pill" href="<?php echo htmlspecialchars($file); ?>" download>
                    <?php echo htmlspecialchars($label); ?>
                  </a>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>

        </div>
      </div>

      <style>
        .ev-media-box{ position:relative; padding-top:56.25%; border-radius:16px; overflow:hidden; border:1px solid rgba(0,0,0,.08); background:#000; }
        .ev-media-box iframe{ position:absolute; inset:0; width:100%; height:100%; border:0; }

        .ev-gallery{
          display:grid;
          grid-template-columns: repeat(3, minmax(0, 1fr));
          gap:10px;
          max-height:260px;
          overflow-y:auto;
          padding-right:4px;
        }
        .ev-gallery-item{
          padding:0;
          border:0;
          background:transparent;
          border-radius:12px;
          overflow:hidden;
          cursor:pointer;
          box-shadow:0 10px 18px rgba(0,0,0,.06);
          border:1px solid rgba(0,0,0,.08);
          transition: transform .15s ease, box-shadow .15s ease;
        }
        .ev-gallery-item:hover{ transform: translateY(-2px); box-shadow:0 16px 30px rgba(0,0,0,.12); }
        .ev-gallery-item img{ width:100%; height:78px; object-fit:cover; display:block; }

        .ev-gallery::-webkit-scrollbar{ width:10px; }
        .ev-gallery::-webkit-scrollbar-track{ background: rgba(0,0,0,.06); border-radius:999px; }
        .ev-gallery::-webkit-scrollbar-thumb{ background: rgba(13,110,253,.28); border-radius:999px; }
        .ev-gallery::-webkit-scrollbar-thumb:hover{ background: rgba(13,110,253,.40); }
      </style>

      <script>
        document.addEventListener("DOMContentLoaded", function () {
          const modal = document.getElementById("galleryLightbox");
          if (!modal) return;

          modal.addEventListener("show.bs.modal", function (event) {
            const btn = event.relatedTarget;
            if (!btn) return;

            const img = btn.getAttribute("data-img") || "";
            const cap = btn.getAttribute("data-cap") || "";

            const imgEl = document.getElementById("galleryLightboxImg");
            const capEl = document.getElementById("galleryLightboxCap");
            if (imgEl) imgEl.src = img;
            if (capEl) capEl.textContent = cap;
          });
        });
      </script>

    <?php else: ?>
      <div class="lead-card">
        <p class="mb-0">Please return to <a href="events.php">Events</a>.</p>
      </div>
    <?php endif; ?>
  </div>
  <br>
</section>

<?php include 'footer.php'; ?>