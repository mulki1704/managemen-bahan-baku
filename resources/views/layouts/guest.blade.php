<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SIKERREL.ID</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/auth.css', 'resources/js/app.js'])
</head>
<body>
    <div class="auth-wrapper">
        <div class="auth-brand">
            <div class="brand-content">
                <div class="brand-logo">
                    <svg class="spool" viewBox="0 0 40 40" fill="none">
                        <rect x="4" y="4" width="32" height="32" rx="8" fill="#C1652F" />
                        <circle cx="20" cy="20" r="10" fill="#16213A" />
                        <path d="M13 15c4 3 10 3 14 0M13 20c4 3 10 3 14 0M13 25c4 3 10 3 14 0" stroke="#EDEFF4" stroke-width="1.3" stroke-linecap="round" />
                    </svg>
                    <div>
                        <span class="brand-name">SIKERREL.ID</span>
                        <span class="brand-sub">MRP System</span>
                    </div>
                </div>

                <p class="brand-tagline">Sistem Manajemen Bahan Baku & Perencanaan Produksi</p>
                <p class="brand-desc">Kelola stok bahan baku, hitung kebutuhan material, dan jadwalkan produksi dalam satu platform.</p>

                <div class="brand-features">
                    <div class="brand-feature">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 6h16M4 12h16M4 18h10"/></svg>
                        <span>Manajemen Stok Bahan Baku</span>
                    </div>
                    <div class="brand-feature">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/></svg>
                        <span>Perhitungan Bill of Material</span>
                    </div>
                    <div class="brand-feature">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="8"/><path d="M12 8v4l3 2"/></svg>
                        <span>Jadwal Produksi</span>
                    </div>
                </div>
            </div>
            <div class="stitch-line"></div>
        </div>

        <div class="auth-form-side">
            <div class="auth-form-container">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>
