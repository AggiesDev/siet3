/* Global lightweight interactions (no dependencies). */
(function(){
  const btn = document.getElementById('goTopBtn');
  if (btn){
    const toggle = () => {
      const y = window.scrollY || document.documentElement.scrollTop;
      btn.classList.toggle('show', y > 300);
    };
    toggle();
    window.addEventListener('scroll', toggle, { passive: true });
    btn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
  }
})();
