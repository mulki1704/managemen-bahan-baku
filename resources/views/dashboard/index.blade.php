@extends('layouts.app')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('breadcrumb', 'Dashboard')

@vite('resources/css/bahan-baku.css')

@section('content')

<div class="stat-grid" style="margin-bottom:24px;">
    <div class="stat-card">
        <div class="stat-top">
            <div>
                <div class="stat-value">{{ $totalBahan }}</div>
                <div class="stat-label">Total Bahan Baku</div>
            </div>
            <div class="stat-icon i-thread">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 6h16M4 12h16M4 18h10"/></svg>
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-top">
            <div>
                <div class="stat-value" style="color:var(--warning);">{{ $stokMenipis }}</div>
                <div class="stat-label">Stok Menipis</div>
            </div>
            <div class="stat-icon i-warn">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-top">
            <div>
                <div class="stat-value" style="color:var(--danger);">{{ $stokHabis }}</div>
                <div class="stat-label">Stok Habis</div>
            </div>
            <div class="stat-icon" style="background:var(--danger-bg);color:var(--danger);">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-top">
            <div>
                <div class="stat-value">{{ $totalBOM }}</div>
                <div class="stat-label">Data BOM</div>
            </div>
            <div class="stat-icon i-navy">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/></svg>
            </div>
        </div>
    </div>
</div>

<hr class="stitch-rule">

<section class="panel-grid">
    <div class="panel">
        <div class="panel-head">
            <div>
                <h3>Daftar Bahan Baku</h3>
                <div class="hint">{{ $totalBahan }} item</div>
            </div>
            <a href="{{ route('bahan-baku.index') }}" class="link-all">Lihat semua &rarr;</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Bahan Baku</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bahanBaku->take(6) as $item)
                    <tr>
                        <td>
                            <span class="item-name">{{ $item->nama_bahan }}</span>
                            <span class="item-code">{{ $item->kode_bahan }}</span>
                        </td>
                        <td>{{ $item->kategori }}</td>
                        <td class="qty-cell">{{ $item->stok }} {{ $item->satuan }}</td>
                        <td>
                            @if ($item->stok == 0)
                                <span class="badge out">Habis</span>
                            @elseif($item->stok <= $item->stok_minimum)
                                <span class="badge low">Menipis</span>
                            @else
                                <span class="badge ok">Aman</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="text-align:center;color:#999;padding:30px;">Belum ada data bahan baku.</td>
                    </tr>
                @endforelse
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

        @forelse($bahanHabis as $item)
            <div style="padding:12px 20px;border-bottom:1px solid #EFEBE1;display:flex;align-items:center;gap:12px;">
                <div class="alert-dot crit" style="width:28px;height:28px;border-radius:6px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
                </div>
                <div>
                    <div style="font-size:13px;font-weight:600;">{{ $item->nama_bahan }}</div>
                    <div style="font-size:11.5px;color:var(--ink-soft);">Stok habis &middot; {{ $item->kode_bahan }}</div>
                </div>
            </div>
        @empty
            @forelse($bahanMenipis as $item)
                <div style="padding:12px 20px;border-bottom:1px solid #EFEBE1;display:flex;align-items:center;gap:12px;">
                    <div class="alert-dot" style="width:28px;height:28px;border-radius:6px;display:flex;align-items:center;justify-content:center;flex-shrink:0;background:var(--warning-bg);color:var(--warning);">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/></svg>
                    </div>
                    <div>
                        <div style="font-size:13px;font-weight:600;">{{ $item->nama_bahan }}</div>
                        <div style="font-size:11.5px;color:var(--ink-soft);">Stok: {{ $item->stok }} {{ $item->satuan }} &middot; Min: {{ $item->stok_minimum }}</div>
                    </div>
                </div>
            @empty
                <div style="text-align:center;padding:30px;color:#999;">
                    Semua stok dalam kondisi aman.
                </div>
            @endforelse
        @endforelse

        <div class="panel-head" style="border-top:2px dashed var(--stitch);border-bottom:none;">
            <div>
                <h3 style="font-size:13.5px;">Jadwal Aktif</h3>
            </div>
            <span style="font-size:12px;color:var(--ink-soft);">{{ $jadwalBerjalan }} berjalan &middot; {{ $jadwalDijadwalkan }} dijadwalkan</span>
        </div>
    </div>
</section>

@endsection
