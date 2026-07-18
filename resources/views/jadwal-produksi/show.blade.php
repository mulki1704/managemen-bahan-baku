@extends('layouts.app')

@section('title', 'Detail Jadwal Produksi')

@section('page-title', 'Detail Jadwal')

@section('breadcrumb', 'Dashboard / Jadwal Produksi / Detail')

@vite('resources/css/bahan-baku.css')

@section('content')

<div class="page-header">
    <div class="title">
        <h2>Detail Jadwal Produksi</h2>
        <p>Informasi lengkap jadwal produksi.</p>
    </div>
</div>

<div class="form-card">
    <div class="detail-grid">
        <div class="detail-item">
            <label>Kode Jadwal</label>
            <p>{{ $jadwalProduksi->kode_jadwal }}</p>
        </div>

        <div class="detail-item">
            <label>Qty Produksi</label>
            <p>{{ $jadwalProduksi->qty_produksi }} unit</p>
        </div>

        <div class="detail-item">
            <label>Tanggal Mulai</label>
            <p>{{ \Carbon\Carbon::parse($jadwalProduksi->tanggal_mulai)->format('d M Y') }}</p>
        </div>

        <div class="detail-item">
            <label>Tanggal Selesai</label>
            <p>{{ \Carbon\Carbon::parse($jadwalProduksi->tanggal_selesai)->format('d M Y') }}</p>
        </div>

        <div class="detail-item">
            <label>Status</label>
            <p>
                @switch($jadwalProduksi->status)
                    @case('Dijadwalkan')
                        <span class="status" style="background:#3498db;">Dijadwalkan</span>
                        @break
                    @case('Berjalan')
                        <span class="status" style="background:#f39c12;">Berjalan</span>
                        @break
                    @case('Selesai')
                        <span class="status" style="background:#2ecc71;">Selesai</span>
                        @break
                    @case('Ditunda')
                        <span class="status" style="background:#e74c3c;">Ditunda</span>
                        @break
                @endswitch
            </p>
        </div>

        <div class="detail-item full-width">
            <label>Catatan</label>
            <p>{{ $jadwalProduksi->catatan ?? '-' }}</p>
        </div>
    </div>

    <div class="form-action">
        <a href="{{ route('jadwal-produksi.index') }}" class="btn-secondary">Kembali</a>
        <a href="{{ route('jadwal-produksi.edit', $jadwalProduksi->id) }}" class="btn-primary">Edit Jadwal</a>
    </div>
</div>

@endsection
