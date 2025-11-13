(function(){
  function qs(sel, ctx){ return (ctx||document).querySelector(sel); }
  function qsa(sel, ctx){ return Array.prototype.slice.call((ctx||document).querySelectorAll(sel)); }

  function rebuildOptions(select, items, placeholder){
    const val = select.value;
    const exists = new Set(items.map(i => i.slug));
    // Zachowaj pierwszy option (placeholder)
    select.innerHTML = '';
    const first = document.createElement('option');
    first.value = '';
    first.textContent = placeholder || 'Wszystkie';
    select.appendChild(first);

    items.forEach(it => {
      const opt = document.createElement('option');
      opt.value = it.slug;
      opt.textContent = it.name + (typeof it.count !== 'undefined' ? ` (${it.count})` : '');
      select.appendChild(opt);
    });

    // Przywróć poprzedni wybór, jeśli wciąż dostępny
    if (exists.has(val)) select.value = val;
  }

  function fetchNarrowing(){
    const wrap = qs('#pf-filters-wrap');
    if (!wrap) return;
    const url = wrap.dataset.ajax;
    const nonce = wrap.dataset.nonce;

    const cat   = qs('#pf-cat')?.value || '';
    const size  = qs('#pf-size')?.value || '';
    const brand = qs('#pf-brand')?.value || '';

    const fd = new FormData();
    fd.append('action', 'pf_filter_terms');
    fd.append('nonce', nonce);
    fd.append('cat', cat);
    fd.append('rozmiar', size);
    fd.append('brand', brand);

    fetch(url, { method: 'POST', body: fd, credentials: 'same-origin' })
      .then(r => r.json())
      .then(json => {
        if (!json || !json.success) return;
        const data = json.data || {};

        const catSel   = qs('#pf-cat');
        const sizeSel  = qs('#pf-size');
        const brandSel = qs('#pf-brand');

        if (data.categories && catSel) {
          rebuildOptions(catSel, data.categories, catSel.options[0]?.textContent || 'Wszystkie kategorie');
        }
        if (data.sizes && sizeSel) {
          rebuildOptions(sizeSel, data.sizes, sizeSel.options[0]?.textContent || 'Wszystkie rozmiary');
        }
        if (data.brands && brandSel) {
          rebuildOptions(brandSel, data.brands, brandSel.options[0]?.textContent || 'Wszyscy producenci');
        }
      })
      .catch(() => {});
  }

  function init(){
    const wrap = qs('#pf-filters-wrap');
    if (!wrap) return;

    // Zdarzenia: po zmianie dowolnego selecta zawężamy pozostałe
    ['#pf-cat','#pf-size','#pf-brand'].forEach(sel => {
      const el = qs(sel);
      if (el) el.addEventListener('change', fetchNarrowing);
    });

    // Opcjonalnie: pierwsze zawężenie po załadowaniu (pasuje do aktualnych parametrów URL)
    fetchNarrowing();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
