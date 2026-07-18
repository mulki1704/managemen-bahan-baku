<header class="topbar">
    <button class="hamburger" id="hamburgerBtn" aria-label="Buka menu">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18M3 12h18M3 18h18"/></svg>
    </button>

    <div>
        <div class="page-title">@yield('page-title', 'Dashboard')</div>
        <div class="page-crumb">@yield('breadcrumb', 'Dashboard')</div>
    </div>

    <div class="topbar-actions">
        <div class="topbar-right">
            <div class="topbar-user">
                <div class="topbar-avatar">{{ Auth::user()->initials }}</div>
                <div class="topbar-user-info">
                    <span class="topbar-user-name">{{ Auth::user()->name }}</span>
                    <span class="topbar-user-role">{{ Auth::user()->role_label }}</span>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="btn-primary" style="background:var(--navy-700);font-size:12px;padding:8px 14px;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                    Keluar
                </button>
            </form>
        </div>
    </div>
</header>