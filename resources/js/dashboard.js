import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/dashboard.css',   
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});

// toggle sidebar (mobile)
const sidebar = document.getElementById('sidebar');
document.getElementById('hamburgerBtn').addEventListener('click', () => {
  sidebar.classList.toggle('open');
});

// nav active state
document.querySelectorAll('.nav-item').forEach(item => {
  item.addEventListener('click', () => {
    document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
    item.classList.add('active');
    if (window.innerWidth <= 820) sidebar.classList.remove('open');
  });
});

// filter chips
document.querySelectorAll('.chip').forEach(chip => {
  chip.addEventListener('click', () => {
    document.querySelectorAll('.chip').forEach(c => c.classList.remove('active'));
    chip.classList.add('active');
    const cat = chip.textContent.trim();
    document.querySelectorAll('#stockTable tbody tr').forEach(row => {
      if (cat === 'Semua') { row.style.display = ''; return; }
      if (cat === 'Stok Menipis') {
        const status = row.querySelector('.badge').textContent.trim();
        row.style.display = (status === 'Menipis' || status === 'Habis') ? '' : 'none';
        return;
      }
      const rowCat = row.children[1].textContent.trim();
      row.style.display = rowCat === cat ? '' : 'none';
    });
  });
});

// search filter
document.getElementById('searchInput').addEventListener('input', (e) => {
  const q = e.target.value.toLowerCase();
  document.querySelectorAll('#stockTable tbody tr').forEach(row => {
    row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
  });
});
