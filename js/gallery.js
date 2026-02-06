/* =========================================================
   Lightweight Gallery Lightbox (Bootstrap Modal)
   - No external libraries
   - Click any .gallery-item to preview bigger image
   ========================================================= */
(function(){
  "use strict";

  function ready(fn){
    if(document.readyState !== "loading") fn();
    else document.addEventListener("DOMContentLoaded", fn);
  }

  ready(function(){
    const modalEl = document.getElementById("galleryLightbox");
    const imgEl = document.getElementById("galleryLightboxImg");
    const capEl = document.getElementById("galleryLightboxCap");
    if(!modalEl || !imgEl) return;

    const modal = new bootstrap.Modal(modalEl, { keyboard: true });

    function open(src, cap){
      imgEl.src = src;
      imgEl.alt = cap || "Gallery preview";
      if(capEl) capEl.textContent = cap || "";
      modal.show();
    }

    // Delegate clicks to any gallery-item
    document.addEventListener("click", function(e){
      const item = e.target.closest(".gallery-item");
      if(!item) return;
      const img = item.querySelector("img");
      if(!img) return;

      const src = item.getAttribute("data-full") || img.getAttribute("data-full") || img.currentSrc || img.src;
      const cap = item.getAttribute("data-cap") || (item.querySelector(".cap") ? item.querySelector(".cap").textContent.trim() : "");
      open(src, cap);
    });

    // Reset image on close (avoid keeping memory)
    modalEl.addEventListener("hidden.bs.modal", function(){
      imgEl.src = "";
      if(capEl) capEl.textContent = "";
    });
  });
})();
