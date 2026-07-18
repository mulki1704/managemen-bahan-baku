<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <svg class="spool" viewBox="0 0 40 40" fill="none">
            <rect x="4" y="4" width="32" height="32" rx="8" fill="#C1652F" />
            <circle cx="20" cy="20" r="10" fill="#16213A" />
            <path d="M13 15c4 3 10 3 14 0M13 20c4 3 10 3 14 0M13 25c4 3 10 3 14 0" stroke="#EDEFF4" stroke-width="1.3"
                stroke-linecap="round" />
        </svg>
        <div class="brand-text">
            <span class="name">SIKERREL.ID</span>
            <span class="sub">MRP System</span>
        </div>
    </div>

    <nav class="nav-scroll">
        <div class="nav-group">
            <div class="nav-group-label">Utama</div>

            <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <circle cx="12" cy="12" r="8" />
                    <path d="M12 8v4l3 2" />
                </svg>
                <span>Dashboard</span>
            </a>

            @if(in_array(Auth::user()->role, ['super_admin', 'admin_produksi', 'admin_marketing']))
            <a href="{{ route('bahan-baku.index') }}"
                class="nav-item {{ request()->routeIs('bahan-baku.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M4 6h16M4 12h16M4 18h10" />
                </svg>
                <span>Bahan Baku</span>
            </a>
            @endif

            @if(in_array(Auth::user()->role, ['super_admin', 'admin_produksi', 'admin_marketing', 'staff_marketing']))
            <a href="{{ route('perhitungan-bom.index') }}"
                class="nav-item {{ request()->routeIs('perhitungan-bom.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/>
                </svg>
                <span>Perhitungan BOM</span>
            </a>
            @endif
        </div>

        <div class="nav-group">
            <div class="nav-group-label">Perencanaan</div>

            @if(in_array(Auth::user()->role, ['super_admin', 'admin_produksi', 'staff_produksi']))
            <a href="{{ route('jadwal-produksi.index') }}"
                class="nav-item {{ request()->routeIs('jadwal-produksi.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <circle cx="12" cy="12" r="8" />
                    <path d="M12 8v4l3 2" />
                </svg>
                <span>Jadwal Produksi</span>
            </a>
            @endif

            @if(Auth::user()->role === 'super_admin')
            <div class="nav-item" data-page="mrp" style="opacity:0.5;cursor:default;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M3 17l5-5 4 4 8-8" />
                    <path d="M14 8h6v6" />
                </svg>
                Perhitungan MRP
                <span class="nav-badge">Soon</span>
            </div>
            <div class="nav-item" data-page="po" style="opacity:0.5;cursor:default;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M6 3h9l5 5v13H6z" />
                    <path d="M14 3v5h5" />
                </svg>
                Purchase Order
                <span class="nav-badge">Soon</span>
            </div>
            @endif
        </div>

        @if(Auth::user()->role === 'super_admin')
        <div class="nav-group">
            <div class="nav-group-label">Sistem</div>
            <a href="{{ route('kelola-user.index') }}"
                class="nav-item {{ request()->routeIs('kelola-user.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 00-3-3.87"/>
                    <path d="M16 3.13a4 4 0 010 7.75"/>
                </svg>
                <span>Kelola Akun</span>
            </a>
            <div class="nav-item" data-page="laporan" style="opacity:0.5;cursor:default;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M4 19V5M4 19h16M8 15v-4M12 15V8M16 15v-7" />
                </svg>
                Laporan
            </div>
        </div>
        @endif
    </nav>

    <div class="sidebar-footer">
        <div class="avatar">{{ Auth::user()->initials }}</div>
        <div class="user-meta">
            <div class="u-name">{{ Auth::user()->name }}</div>
            <div class="u-role">{{ Auth::user()->role_label }}</div>
        </div>
    </div>
</aside>