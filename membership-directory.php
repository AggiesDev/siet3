<?php
  $active = 'membership';
  $page_css = ['sections.css'];
  include 'header.php';
?>

<section class="page-hero">
  <div class="container py-5">
    <h1 class="mb-2">Directory of Members &amp; Status</h1>
    <p class="text-muted mb-0">A simple, layman-friendly listing layout (sample). Replace with real data when available.</p>
  </div>
</section>

<section class="section-pad">
  <div class="container">
    <div class="row g-4 align-items-end">
      <div class="col-md-6">
        <label for="memberFilter" class="form-label fw-semibold">Search member</label>
        <input id="memberFilter" type="text" class="form-control" placeholder="Type a name or grade (e.g., MSIET)" />
      </div>
      <div class="col-md-6">
        <label class="form-label fw-semibold">Filter grade</label>
        <select id="gradeFilter" class="form-select">
          <option value="">All grades</option>
          <option>HonFSIET</option>
          <option>FSIET</option>
          <option>MSIET</option>
          <option>AMSIET</option>
          <option>Assoc. SIET</option>
        </select>
      </div>
    </div>

    <div class="table-responsive mt-4">
      <table class="table align-middle table-hover bg-white">
        <thead class="table-light">
          <tr>
            <th>Name</th>
            <th>Grade</th>
            <th class="text-end">Status</th>
          </tr>
        </thead>
        <tbody id="memberTable">
          <tr>
            <td>Sample Member A</td>
            <td>MSIET</td>
            <td class="text-end"><span class="badge rounded-pill bg-success">Active</span></td>
          </tr>
          <tr>
            <td>Sample Member B</td>
            <td>AMSIET</td>
            <td class="text-end"><span class="badge rounded-pill bg-secondary">Inactive</span></td>
          </tr>
          <tr>
            <td>Sample Fellow C</td>
            <td>FSIET</td>
            <td class="text-end"><span class="badge rounded-pill bg-success">Active</span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<script>
  (function(){
    const input = document.getElementById('memberFilter');
    const grade = document.getElementById('gradeFilter');
    const tbody = document.getElementById('memberTable');
    if (!input || !grade || !tbody) return;

    function apply(){
      const q = (input.value || '').toLowerCase().trim();
      const g = (grade.value || '').toLowerCase().trim();
      [...tbody.querySelectorAll('tr')].forEach(tr => {
        const txt = tr.innerText.toLowerCase();
        const gradeTxt = (tr.children[1]?.innerText || '').toLowerCase();
        const okQ = !q || txt.includes(q);
        const okG = !g || gradeTxt === g;
        tr.style.display = (okQ && okG) ? '' : 'none';
      });
    }

    input.addEventListener('input', apply, { passive: true });
    grade.addEventListener('change', apply);
  })();
</script>

<?php include 'footer.php'; ?>
