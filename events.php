<?php
  $active = 'evnets';
  $page_css = ['sections.css'];
  include 'header.php';

  include 'events-data.php';

  $data = load_events_data();
  $events = $data['events'] ?? [];

  // Small helper for 1 vs many
  function plural_label(int $n, string $one, string $many): string {
    return $n === 1 ? $one : $many;
  }

  // Group: Category -> SubCategory
  $groups = [];
  foreach ($events as $e) {
    $cat = trim($e['category'] ?? 'Other');
    $sub = trim($e['subcategory'] ?? '');
    if ($sub === '') $sub = 'General';

    if (!isset($groups[$cat])) $groups[$cat] = [];
    if (!isset($groups[$cat][$sub])) $groups[$cat][$sub] = [];
    $groups[$cat][$sub][] = $e;
  }
?>

<section class="page-hero">
  <div class="container py-5">
    <div class="d-flex align-items-end justify-content-between flex-wrap gap-2">
      <div>
        <h1 class="mb-2">Events</h1>
        <p class="text-muted mb-0">Events can include talks, seminars, conferences, and activities with photos/videos.</p>
      </div>

      <div class="d-flex gap-2 flex-wrap">
        <a href="event-admin.php" class="btn btn-primary btn-lg rounded-pill px-4 ev-hero-btn">
          Edit Events
        </a>
      </div>
    </div>
  </div>
</section>
<br>
<section class="section-pad">
  <div class="container">

    <?php if (count($events) === 0): ?>
      <div class="callout">
        <h4 class="mb-1">No events yet</h4>
        <p class="text-muted mb-0">Add your first event in the admin panel.</p>
      </div>
    <?php endif; ?>

    <?php foreach ($groups as $cat => $subGroups): ?>
      <?php
        $catCount = 0;
        foreach ($subGroups as $s => $list) $catCount += count($list);

        $subCount = count($subGroups); //  number of sub-categories
        $subLabel = plural_label($subCount, 'Sub-Category', 'Sub-Categories');
      ?>

      <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2">
        <h4 class="mb-0"><?php echo htmlspecialchars($cat); ?></h4>

        <!--  Auto text for 1 vs many -->
        <span class="pill">
          <?php echo $subCount . ' ' . $subLabel; ?>
        </span>
      </div>

      <?php foreach ($subGroups as $sub => $list): ?>
        <?php
          $itemsCount = count($list);
          $itemsLabel = plural_label($itemsCount, 'item', 'items');
        ?>
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2 mt-3">
          <h5 class="mb-0" style="font-weight:900;"><?php echo htmlspecialchars($sub); ?></h5>

          <!--  Auto text for 1 vs many -->
          <span class="pill">
            <?php echo $itemsCount . ' ' . $itemsLabel; ?>
          </span>
        </div>

        <div class="row g-4 mb-3">
          <?php foreach ($list as $e): ?>
            <div class="col-md-4">
              <a class="link-card" href="event-detail.php?id=<?php echo urlencode($e['id'] ?? ''); ?>">
                <div class="doc-card h-100 card-hover">
                  <?php
                  if (!empty($e['image'])) { ?>
                  <img class="doc-thumb"
                       src="<?php echo htmlspecialchars($e['image'] ?? 'images/1.jpg'); ?>"
                       alt="<?php echo htmlspecialchars($e['title'] ?? ''); ?>" />
                  <?php }
                  else { ?>
                  <div class="doc-thumb placeholder">
                    <img src="images/example.png" alt="example" class="doc-thumb">
                  </div> <?php } ?>
                  <div class="p-3">
                    <div class="meta-row mb-2">
                      <span class="badge-soft"><?php echo htmlspecialchars($e['date'] ?? ''); ?></span>
                      <span class="text-muted small"><?php echo htmlspecialchars($e['location'] ?? ''); ?></span>
                    </div>
                    <h5 class="mb-1"><?php echo htmlspecialchars($e['title'] ?? ''); ?></h5>
                    <p class="text-muted mb-0"><?php echo htmlspecialchars($e['summary'] ?? ''); ?></p>
                  </div>
                </div>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>

      <hr class="my-4">
    <?php endforeach; ?>

  </div>
  <br>
</section>

<style>
.ev-hero-btn{
  box-shadow: 0 14px 28px rgba(13,110,253,.18);
}
.ev-hero-btn:hover{
  transform: translateY(-1px);
  box-shadow: 0 18px 36px rgba(13,110,253,.22);
}
</style>

<?php include 'footer.php'; ?>