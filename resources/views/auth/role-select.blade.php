<x-guest-layout>
    <div class="role-select-page">
        <div class="role-select-header">
            <div class="brand-logo-center">
                <svg class="spool" viewBox="0 0 40 40" fill="none">
                    <rect x="4" y="4" width="32" height="32" rx="8" fill="#C1652F" />
                    <circle cx="20" cy="20" r="10" fill="#16213A" />
                    <path d="M13 15c4 3 10 3 14 0M13 20c4 3 10 3 14 0M13 25c4 3 10 3 14 0" stroke="#EDEFF4" stroke-width="1.3" stroke-linecap="round" />
                </svg>
            </div>
            <h1>SIKERREL.ID</h1>
            <p class="subtitle">Pilih peran Anda untuk masuk ke sistem</p>
        </div>

        <div class="role-select-grid">
            <a href="{{ route('login.role', 'super_admin') }}" class="role-select-card">
                <div class="rs-icon" style="background: linear-gradient(135deg, #16213A, #2B3E63);">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                </div>
                <div class="rs-info">
                    <span class="rs-name">Super Admin</span>
                    <span class="rs-desc">Akses penuh ke seluruh sistem</span>
                </div>
                <svg class="rs-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
            </a>

            <a href="{{ route('login.role', 'admin_produksi') }}" class="role-select-card">
                <div class="rs-icon" style="background: linear-gradient(135deg, #C1652F, #A6521F);">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 6h16M4 12h16M4 18h10"/></svg>
                </div>
                <div class="rs-info">
                    <span class="rs-name">Admin Produksi</span>
                    <span class="rs-desc">Kelola bahan baku & bill of material</span>
                </div>
                <svg class="rs-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
            </a>

            <a href="{{ route('login.role', 'staff_produksi') }}" class="role-select-card">
                <div class="rs-icon" style="background: linear-gradient(135deg, #3F7A5C, #2D5A42);">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/></svg>
                </div>
                <div class="rs-info">
                    <span class="rs-name">Staff Produksi</span>
                    <span class="rs-desc">Lihat data & jadwalkan produksi</span>
                </div>
                <svg class="rs-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
            </a>

            <a href="{{ route('login.role', 'admin_marketing') }}" class="role-select-card">
                <div class="rs-icon" style="background: linear-gradient(135deg, #2980B9, #1F6A94);">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 01-3.46 0"/></svg>
                </div>
                <div class="rs-info">
                    <span class="rs-name">Admin Marketing</span>
                    <span class="rs-desc">Kelola data produk & BOM</span>
                </div>
                <svg class="rs-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
            </a>

            <a href="{{ route('login.role', 'staff_marketing') }}" class="role-select-card">
                <div class="rs-icon" style="background: linear-gradient(135deg, #8E44AD, #6C3483);">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                </div>
                <div class="rs-info">
                    <span class="rs-name">Staff Marketing</span>
                    <span class="rs-desc">Lihat data produk & laporan</span>
                </div>
                <svg class="rs-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
            </a>
        </div>

        <div class="role-select-footer">
            <span>© 2026 SIKERREL.ID — Sistem Manajemen Bahan Baku</span>
        </div>
    </div>
</x-guest-layout>