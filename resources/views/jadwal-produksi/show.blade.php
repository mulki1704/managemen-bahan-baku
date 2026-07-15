@extends('layouts.app')

@section('title', 'Detail Jadwal Produksi')

@section('page-title')
Detail Jadwal Produksi
@endsection

@section('breadcrumb')
Dashboard / Jadwal Produksi / Detail
@endsection

@section('content')

<style>
    /* =========================
   DETAIL JADWAL PRODUKSI
========================= */

.detail-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
    gap:20px;
    margin-top:20px;
}

.detail-item{
    background:#fff;
    border:1px solid #e5e7eb;
    border-radius:12px;
    padding:18px;
    transition:.2s ease;
}

.detail-item:hover{
    box-shadow:0 4px 12px rgba(0,0,0,.08);
}

.detail-item label{
    display:block;
    font-size:13px;
    font-weight:600;
    color:#6b7280;
    margin-bottom:8px;
    text-transform:uppercase;
    letter-spacing:.5px;
}

.detail-item p{
    margin:0;
    font-size:15px;
    font-weight:500;
    color:#111827;
    line-height:1.6;
}

.full-width{
    grid-column:1 / -1;
}

.btn-secondary{
    display:inline-flex;
    align-items:center;
    gap:6px;
    padding:10px 16px;
    border-radius:8px;
    background:#f3f4f6;
    color:#374151;
    text-decoration:none;
    font-size:14px;
    font-weight:600;
    transition:.2s ease;
}

.btn-secondary:hover{
    background:#e5e7eb;
}

.badge{
    display:inline-flex;
    align-items:center;
    padding:6px 12px;
    border-radius:999px;
    font-size:12px;
    font-weight:600;
}

.badge.ok{
    background:#dcfce7;
    color:#166534;
}

.badge.warning{
    background:#fef3c7;
    color:#92400e;
}

.badge.danger{
    background:#fee2e2;
    color:#991b1b;
}

.badge.info{
    background:#dbeafe;
    color:#1d4ed8;
}
</style>

<div class="panel">

    <div class="panel-head">
        <div>
            <h3>Detail Jadwal Produksi</h3>
            <div class="hint">
                Informasi lengkap mengenai jadwal produksi.
            </div>
        </div>

        <a href="{{ route('jadwal-produksi.index') }}" class="btn-secondary">
            ← Kembali
        </a>
    </div>

    <div class="detail-grid">

        <div class="detail-item">
            <label>Kode Jadwal</label>
            <p>{{ $jadwalProduksi->id }}</p>
        </div>

        <div class="detail-item">
            <label>Produk</label>
            <p>{{ $jadwalProduksi->produk_id }}</p>
        </div>

        <div class="detail-item">
            <label>Jumlah Produksi</label>
            <p>{{ $jadwalProduksi->qty_produksi }}</p>
        </div>

        <div class="detail-item">
            <label>Tanggal Mulai</label>
            <p>{{ $jadwalProduksi->tanggal_mulai }}</p>
        </div>

        <div class="detail-item">
            <label>Tanggal Selesai</label>
            <p>{{ $jadwalProduksi->tanggal_selesai }}</p>
        </div>

        <div class="detail-item">
            <label>Status</label>
            <p>
                <span class="badge ok">
                    {{ $jadwalProduksi->status }}
                </span>
            </p>
        </div>

        <div class="detail-item full-width">
            <label>Catatan</label>
            <p>
                {{ $jadwalProduksi->catatan ?? '-' }}
            </p>
        </div>

    </div>

</div>

@endsection