<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>RayaApparel MRP — Manajemen Bahan Baku</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
@vite(['resources/css/dashboard.css'])
</head>
<body>

<aside class="sidebar" id="sidebar">
  <div class="sidebar-brand">
    <svg class="spool" viewBox="0 0 40 40" fill="none">
      <rect x="4" y="4" width="32" height="32" rx="8" fill="#C1652F"/>
      <circle cx="20" cy="20" r="10" fill="#16213A"/>
      <path d="M13 15c4 3 10 3 14 0M13 20c4 3 10 3 14 0M13 25c4 3 10 3 14 0" stroke="#EDEFF4" stroke-width="1.3" stroke-linecap="round"/>
    </svg>
    <div class="brand-text">
      <span class="name">RayaApparel</span>
      <span class="sub">MRP System</span>
    </div>
  </div>

  <nav class="nav-scroll">
    <div class="nav-group">
      <div class="nav-group-label">Utama</div>
      <div class="nav-item active" data-page="dashboard">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="8" height="8" rx="1.5"/><rect x="13" y="3" width="8" height="8" rx="1.5"/><rect x="3" y="13" width="8" height="8" rx="1.5"/><rect x="13" y="13" width="8" height="8" rx="1.5"/></svg>
        Dashboard
      </div>
      <div class="nav-item" data-page="bahan-baku">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 6h16M4 12h16M4 18h10"/></svg>
        Bahan Baku
        <span class="nav-badge">128</span>
      </div>
      <div class="nav-item" data-page="bom">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M8 8h8M8 12h8M8 16h5"/></svg>
        Bill of Material
      </div>
    </div>

    <div class="nav-group">
      <div class="nav-group-label">Perencanaan</div>
      <div class="nav-item" data-page="mrp">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 17l5-5 4 4 8-8"/><path d="M14 8h6v6"/></svg>
        Perhitungan MRP
      </div>
      <div class="nav-item" data-page="po">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6 3h9l5 5v13H6z"/><path d="M14 3v5h5"/></svg>
        Purchase Order
      </div>
      <div class="nav-item" data-page="produksi">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="8"/><path d="M12 8v4l3 2"/></svg>
        Jadwal Produksi
      </div>
    </div>

    <div class="nav-group">
      <div class="nav-group-label">Sistem</div>
      <div class="nav-item" data-page="laporan">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 19V5M4 19h16M8 15v-4M12 15V8M16 15v-7"/></svg>
        Laporan
      </div>
      <div class="nav-item" data-page="pengguna">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="8" r="3.2"/><path d="M5 20c1.5-4 5-5.5 7-5.5S17.5 16 19 20"/></svg>
        Pengguna &amp; Peran
      </div>
      <div class="nav-item" data-page="pengaturan">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.7 1.7 0 00.34 1.87l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.7 1.7 0 00-1.87-.34 1.7 1.7 0 00-1 1.55V21a2 2 0 11-4 0v-.09a1.7 1.7 0 00-1-1.55 1.7 1.7 0 00-1.87.34l-.06.06a2 2 0 11-2.83-2.83l.06-.06a1.7 1.7 0 00.34-1.87 1.7 1.7 0 00-1.55-1H3a2 2 0 110-4h.09a1.7 1.7 0 001.55-1 1.7 1.7 0 00-.34-1.87l-.06-.06a2 2 0 112.83-2.83l.06.06a1.7 1.7 0 001.87.34H9a1.7 1.7 0 001-1.55V3a2 2 0 114 0v.09a1.7 1.7 0 001 1.55 1.7 1.7 0 001.87-.34l.06-.06a2 2 0 112.83 2.83l-.06.06a1.7 1.7 0 00-.34 1.87V9a1.7 1.7 0 001.55 1H21a2 2 0 110 4h-.09a1.7 1.7 0 00-1.55 1z"/></svg>
        Pengaturan
      </div>
    </div>
  </nav>

  <div class="sidebar-footer">
    <div class="avatar">MA</div>
    <div class="user-meta">
      <div class="u-name">Mulki A.</div>
      <div class="u-role">Admin Produksi</div>
    </div>
  </div>
</aside>

<div class="main">
  <header class="topbar">
    <button class="hamburger" id="hamburgerBtn" aria-label="Buka menu">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18M3 12h18M3 18h18"/></svg>
    </button>
    <div>
      <div class="page-title">Manajemen Bahan Baku</div>
      <div class="page-crumb">Dashboard / Inventori / Bahan Baku</div>
    </div>
    <div class="search-box">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/></svg>
      <input id="searchInput" type="text" placeholder="Cari kode, nama bahan, atau supplier...">
    </div>
    <button class="topbar-icon-btn" aria-label="Notifikasi">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6 8a6 6 0 1112 0c0 5 2 6 2 6H4s2-1 2-6z"/><path d="M10 20a2 2 0 004 0"/></svg>
      <span class="dot-alert"></span>
    </button>
    <button class="btn-primary">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 5v14M5 12h14"/></svg>
      Tambah Bahan Baku
    </button>
  </header>

  <div class="content">

    <section class="stat-grid">
      <div class="stat-card">
        <div class="stat-top">
          <div class="stat-icon i-thread">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 6h16M4 12h16M4 18h10"/></svg>
          </div>
          <span class="stat-trend trend-up">+4.2%</span>
        </div>
        <div class="stat-value">128</div>
        <div class="stat-label">Total Jenis Bahan Baku</div>
      </div>

      <div class="stat-card">
        <div class="stat-top">
          <div class="stat-icon i-warn">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 9v4M12 17h.01M10.3 3.9L2.7 17a2 2 0 001.7 3h15.2a2 2 0 001.7-3L13.7 3.9a2 2 0 00-3.4 0z"/></svg>
          </div>
          <span class="stat-trend trend-down">-2</span>
        </div>
        <div class="stat-value">9</div>
        <div class="stat-label">Stok Menipis (di bawah minimum)</div>
      </div>

      <div class="stat-card">
        <div class="stat-top">
          <div class="stat-icon i-ok">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 12l6 6 12-12"/></svg>
          </div>
          <span class="stat-trend trend-up">+12</span>
        </div>
        <div class="stat-value">46</div>
        <div class="stat-label">Bahan Masuk Bulan Ini</div>
      </div>

      <div class="stat-card">
        <div class="stat-top">
          <div class="stat-icon i-navy">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>
          </div>
          <span class="stat-trend trend-up">+6.8%</span>
        </div>
        <div class="stat-value">Rp 812jt</div>
        <div class="stat-label">Nilai Total Inventori</div>
      </div>
    </section>

    <hr class="stitch-rule">

    <section class="panel-grid">
      <div class="panel">
        <div class="panel-head">
          <div>
            <h3>Daftar Bahan Baku</h3>
            <div class="hint">128 item &middot; diperbarui 2 menit lalu</div>
          </div>
          <span class="link-all">Lihat semua &rarr;</span>
        </div>
        <div class="filter-row">
          <span class="chip active">Semua</span>
          <span class="chip">Kain</span>
          <span class="chip">Benang</span>
          <span class="chip">Aksesoris</span>
          <span class="chip">Stok Menipis</span>
        </div>
        <table id="stockTable">
          <thead>
            <tr>
              <th>Bahan Baku</th>
              <th>Kategori</th>
              <th>Stok</th>
              <th>Level Stok</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><span class="item-name">Kain Katun Combed 24s</span><span class="item-code">RM-KT-0012</span></td>
              <td>Kain</td>
              <td class="qty-cell">840 m</td>
              <td><span class="bar-track"><span class="bar-fill" style="width:82%;background:var(--success);"></span></span></td>
              <td><span class="badge ok">Aman</span></td>
            </tr>
            <tr>
              <td><span class="item-name">Kain Denim 12oz</span><span class="item-code">RM-KT-0031</span></td>
              <td>Kain</td>
              <td class="qty-cell">96 m</td>
              <td><span class="bar-track"><span class="bar-fill" style="width:22%;background:var(--warning);"></span></span></td>
              <td><span class="badge low">Menipis</span></td>
            </tr>
            <tr>
              <td><span class="item-name">Benang Jahit Polyester 40</span><span class="item-code">RM-BN-0104</span></td>
              <td>Benang</td>
              <td class="qty-cell">1.240 cone</td>
              <td><span class="bar-track"><span class="bar-fill" style="width:90%;background:var(--success);"></span></span></td>
              <td><span class="badge ok">Aman</span></td>
            </tr>
            <tr>
              <td><span class="item-name">Kancing Kemeja 4-Lubang</span><span class="item-code">RM-AK-0220</span></td>
              <td>Aksesoris</td>
              <td class="qty-cell">0 pcs</td>
              <td><span class="bar-track"><span class="bar-fill" style="width:0%;background:var(--danger);"></span></span></td>
              <td><span class="badge out">Habis</span></td>
            </tr>
            <tr>
              <td><span class="item-name">Ritsleting YKK 18cm</span><span class="item-code">RM-AK-0187</span></td>
              <td>Aksesoris</td>
              <td class="qty-cell">312 pcs</td>
              <td><span class="bar-track"><span class="bar-fill" style="width:35%;background:var(--warning);"></span></span></td>
              <td><span class="badge low">Menipis</span></td>
            </tr>
            <tr>
              <td><span class="item-name">Kain Drill Twill</span><span class="item-code">RM-KT-0045</span></td>
              <td>Kain</td>
              <td class="qty-cell">560 m</td>
              <td><span class="bar-track"><span class="bar-fill" style="width:75%;background:var(--success);"></span></span></td>
              <td><span class="badge ok">Aman</span></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="panel">
        <div class="panel-head">
          <div>
            <h3>Peringatan Stok</h3>
            <div class="hint">Perlu tindakan segera</div>
          </div>
        </div>
        <div class="alert-list">
          <div class="alert-item">
            <div class="alert-dot crit">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 9v4M12 17h.01M10.3 3.9L2.7 17a2 2 0 001.7 3h15.2a2 2 0 001.7-3L13.7 3.9a2 2 0 00-3.4 0z"/></svg>
            </div>
            <div class="alert-text">
              <div class="a-title">Kancing Kemeja 4-Lubang habis</div>
              <div class="a-desc">RM-AK-0220 &middot; buat PO segera</div>
            </div>
          </div>
          <div class="alert-item">
            <div class="alert-dot">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 9v4M12 17h.01M10.3 3.9L2.7 17a2 2 0 001.7 3h15.2a2 2 0 001.7-3L13.7 3.9a2 2 0 00-3.4 0z"/></svg>
            </div>
            <div class="alert-text">
              <div class="a-title">Kain Denim 12oz di bawah minimum</div>
              <div class="a-desc">RM-KT-0031 &middot; sisa 96 m dari 400 m</div>
            </div>
          </div>
          <div class="alert-item">
            <div class="alert-dot">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 9v4M12 17h.01M10.3 3.9L2.7 17a2 2 0 001.7 3h15.2a2 2 0 001.7-3L13.7 3.9a2 2 0 00-3.4 0z"/></svg>
            </div>
            <div class="alert-text">
              <div class="a-title">Ritsleting YKK 18cm menipis</div>
              <div class="a-desc">RM-AK-0187 &middot; sisa 312 dari 900 pcs</div>
            </div>
          </div>
        </div>
        <div class="panel-head" style="border-top:2px dashed var(--stitch);border-bottom:none;">
          <div>
            <h3 style="font-size:13.5px;">Kebutuhan MRP Minggu Ini</h3>
          </div>
          <span class="link-all">Detail &rarr;</span>
        </div>
      </div>
    </section>

  </div>
</div>


</body>
</html>