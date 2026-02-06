
document.addEventListener('DOMContentLoaded', async () => {
  const page = document.body?.dataset?.pageid;
  if (!page) return;

  // Apply saved edits for ALL users (no login required)
  try {
    const res = await fetch(`editdata/${page}.json`, { cache: 'no-store' });
    if (res.ok) {
      const data = await res.json();
      applyEdits(data);
    }
  } catch (_) {}

  const toolbar = document.getElementById('editToolbar');
  if (!toolbar) return; // not logged in => no editing controls

  const btnToggle = document.getElementById('btnEditToggle');
  const btnSave = document.getElementById('btnEditSave');
  const status = document.getElementById('editStatus');

  let editOn = false;
  function setStatus(msg){ if(status) status.textContent = msg; }

  function toggleEdit(){
    editOn = !editOn;
    document.documentElement.classList.toggle('edit-mode', editOn);
    setStatus(editOn ? 'Edit mode ON (click text / images to edit). Save when done.' : 'Edit mode OFF');
    if(btnToggle) btnToggle.textContent = editOn ? 'Exit Edit' : 'Edit Page';
  }

  function collectEdits(){
    const grabText = (sel) => Array.from(document.querySelectorAll(sel)).map(el => el.innerText.trim());
    const grabHtml = (sel) => Array.from(document.querySelectorAll(sel)).map(el => el.innerHTML);
    const grabImg  = (sel) => Array.from(document.querySelectorAll(sel)).map(el => el.getAttribute('src') || '');
    return {
      h1: grabText('main h1, section h1'),
      h2: grabText('main h2, section h2'),
      h3: grabText('main h3, section h3'),
      p:  grabHtml('main p, section p'),
      li: grabHtml('main li, section li'),
      img: grabImg('main img, section img')
    };
  }

  async function saveEdits(){
    try{
      setStatus('Saving...');
      const data = collectEdits();
      const body = new URLSearchParams();
      body.set('page', page);
      body.set('data', JSON.stringify(data));

      const res = await fetch('save_page_data.php', {
        method: 'POST',
        headers: {'Content-Type':'application/x-www-form-urlencoded'},
        body
      });
      const out = await res.json();
      if(out.ok) setStatus('Saved ✔ (visible for all users)');
      else setStatus('Save failed: ' + (out.error || 'Unknown error'));
    }catch(_){
      setStatus('Save failed.');
    }
  }

  function makeEditableText(){
    const targets = document.querySelectorAll('main h1, main h2, main h3, main p, main li, section h1, section h2, section h3, section p, section li');
    targets.forEach(el => {
      el.setAttribute('contenteditable','true');
      el.classList.add('editable');
      el.addEventListener('paste', (e) => {
        e.preventDefault();
        const text = (e.clipboardData || window.clipboardData).getData('text');
        document.execCommand('insertText', false, text);
      });
    });
  }

  function makeEditableImages(){
    const imgs = Array.from(document.querySelectorAll('main img, section img'));
    imgs.forEach((img, idx) => {
      img.dataset.editImgIndex = String(idx);
      img.classList.add('editable-img');
      img.style.cursor = 'pointer';
      img.title = 'Click to replace image';
      img.addEventListener('click', (e) => {
        if(!document.documentElement.classList.contains('edit-mode')) return;
        e.preventDefault(); e.stopPropagation();

        const input = document.createElement('input');
        input.type = 'file';
        input.accept = 'image/*';
        input.onchange = async () => {
          const file = input.files && input.files[0];
          if(!file) return;
          setStatus('Uploading image...');
          const fd = new FormData();
          fd.append('page', page);
          fd.append('index', img.dataset.editImgIndex || '0');
          fd.append('image', file);

          try{
            const res = await fetch('upload_image.php', {method:'POST', body: fd});
            const out = await res.json();
            if(out.ok && out.path){
              img.src = out.path + '?v=' + Date.now(); // cache bust
              setStatus('Image replaced ✔ (replacement system)');
            }else{
              setStatus('Image upload failed: ' + (out.error || 'Unknown error'));
            }
          }catch(_){
            setStatus('Image upload failed.');
          }
        };
        input.click();
      });
    });
  }

  function applyEdits(data){
    const setTextList = (sel, arr, useHtml=false) => {
      const els = Array.from(document.querySelectorAll(sel));
      for(let i=0;i<els.length && i<(arr||[]).length;i++){
        if(useHtml) els[i].innerHTML = arr[i];
        else els[i].innerText = arr[i];
      }
    };
    const setImgList = (sel, arr) => {
      const els = Array.from(document.querySelectorAll(sel));
      for(let i=0;i<els.length && i<(arr||[]).length;i++){
        if(arr[i]) els[i].setAttribute('src', arr[i]);
      }
    };

    if(data.h1) setTextList('main h1, section h1', data.h1);
    if(data.h2) setTextList('main h2, section h2', data.h2);
    if(data.h3) setTextList('main h3, section h3', data.h3);
    if(data.p)  setTextList('main p, section p', data.p, true);
    if(data.li) setTextList('main li, section li', data.li, true);
    if(data.img) setImgList('main img, section img', data.img);
  }

  window.__applyEdits = applyEdits;

  btnToggle?.addEventListener('click', () => {
    if(!editOn){
      makeEditableText();
      makeEditableImages();
    }
    toggleEdit();
  });
  btnSave?.addEventListener('click', saveEdits);

  setStatus('Ready');
});

function applyEdits(data){
  if(window.__applyEdits) window.__applyEdits(data);
}
