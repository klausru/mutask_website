---
title: Publications
order: 5
---

# Publications

<div id="pubs">Loading publications…</div>
<script>
fetch('https://api.zotero.org/groups/6602460/collections/7LPFJ5HR/items/top?format=json&include=bib&style=apa&linkwrap=1&sort=date&direction=desc&limit=100')
  .then(r => r.json())
  .then(items => {
    document.getElementById('pubs').innerHTML =
      '<div class="csl-bib-body">' + items.map(i => i.bib).join('') + '</div>';
  })
  .catch(() => { document.getElementById('pubs').textContent = 'Could not load publications right now.'; });
</script>
