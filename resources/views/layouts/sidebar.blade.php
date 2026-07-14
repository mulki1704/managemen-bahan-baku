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

     <a href="{{ route('dashboard') }}"
   class="nav-item {{ request()->routeIs('dashboard.*') ? 'active' : '' }}">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
        <circle cx="12" cy="12" r="8"/>
        <path d="M12 8v4l3 2"/>
    </svg>
    <span>Dashboard</span>
</a>
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

      <a href="{{ route('jadwal-produksi.index') }}"
   class="nav-item {{ request()->routeIs('jadwal-produksi.*') ? 'active' : '' }}">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
        <circle cx="12" cy="12" r="8"/>
        <path d="M12 8v4l3 2"/>
    </svg>
    <span>Jadwal Produksi</span>
</a>
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
      <div class="u-role">Admin Produksi</div>
    </div>
  </div>
</aside>