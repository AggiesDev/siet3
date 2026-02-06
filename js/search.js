(function () {
  function renderResults(query, box, items) {
    if (!box) return;
    var q = (query || '').trim().toLowerCase();
    box.innerHTML = '';
    if (!q) return;

    var matches = items.filter(function (it) {
      return String(it[0]).toLowerCase().indexOf(q) !== -1;
    }).slice(0, 10);

    if (matches.length === 0) {
      var empty = document.createElement('div');
      empty.className = 'nav-search-empty';
      empty.textContent = 'No results found';
      box.appendChild(empty);
      return;
    }

    matches.forEach(function (it) {
      var a = document.createElement('a');
      a.className = 'nav-search-result';
      a.href = it[1];
      a.textContent = it[0];
      box.appendChild(a);
    });
  }

  function firstMatchHref(query, items) {
    var q = (query || '').trim().toLowerCase();
    if (!q) return null;
    for (var i = 0; i < items.length; i++) {
      if (String(items[i][0]).toLowerCase().indexOf(q) !== -1) return items[i][1];
    }
    return null;
  }

  function init() {
    var items = Array.isArray(window.__NAV_SEARCH_ITEMS__) ? window.__NAV_SEARCH_ITEMS__ : [];

    var panel = document.getElementById('navSearchPanel');
    var toggleBtn = document.getElementById('navSearchToggle');

    var desktopInput = document.getElementById('navSearchInput');
    var desktopResults = document.getElementById('navSearchResults');

    var mobileInput = document.getElementById('navSearchInputMobile');
    var mobileResults = document.getElementById('navSearchResultsMobile');

    function openPanel() {
      if (!panel) return;
      panel.classList.remove('is-hidden');
      if (desktopInput) desktopInput.focus();
    }

    function closePanel() {
      if (!panel) return;
      panel.classList.add('is-hidden');
    }

    function bind(input, resultsBox, isDesktop) {
      if (!input) return;

      input.addEventListener('input', function () {
        renderResults(input.value, resultsBox, items);
      });

      input.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
          input.value = '';
          if (resultsBox) resultsBox.innerHTML = '';
          if (isDesktop) closePanel();
          input.blur();
        }

        if (e.key === 'Enter') {
          var href = firstMatchHref(input.value, items);
          if (href) window.location.href = href;
        }
      });
    }

    bind(desktopInput, desktopResults, true);
    bind(mobileInput, mobileResults, false);

    if (toggleBtn && panel) {
      toggleBtn.addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        if (panel.classList.contains('is-hidden')) openPanel();
        else closePanel();
      });

      document.addEventListener('click', function (e) {
        var within = panel.contains(e.target) || toggleBtn.contains(e.target);
        if (!within && !panel.classList.contains('is-hidden')) closePanel();
      });

      document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closePanel();
      });
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
