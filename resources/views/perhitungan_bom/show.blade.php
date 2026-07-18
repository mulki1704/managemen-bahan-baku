@extends('layouts.app')

@section('title', 'Detail BOM')

@section('page-title', 'Detail BOM')

@section('breadcrumb', 'Dashboard / Perhitungan BOM / Detail')

@vite('resources/css/bom.css')

@section('content')

<div class="page-header">
    <div class="title">
        <h2>Detail Bill of Material</h2>
        <p>Informasi lengkap kebutuhan bahan baku untuk produk ini.</p>
    </div>
</div>

<div class="form-card">
    <div class="detail-grid">
        <div class="detail-item">
            <label>Kode Produk</label>
            <p>{{ $perhitunganBom->kode_produk }}</p>
        </div>

        <div class="detail-item">
            <label>Nama Produk</label>
            <p>{{ $perhitunganBom->nama_produk }}</p>
        </div>

        <div class="detail-item">
            <label>Bahan Baku</label>
            <p>{{ $perhitunganBom->bahanBaku->nama_bahan ?? '-' }}</p>
        </div>

        <div class="detail-item">
            <label>Kode Bahan</label>
            <p>{{ $perhitunganBom->bahanBaku->kode_bahan ?? '-' }}</p>
        </div>

        <div class="detail-item">
            <label>Kategori</label>
            <p>{{ $perhitunganBom->bahanBaku->kategori ?? '-' }}</p>
        </div>

        <div class="detail-item">
            <label>Satuan</label>
            <p>{{ $perhitunganBom->bahanBaku->satuan ?? '-' }}</p>
        </div>

        <div class="detail-item">
            <label>Qty per Produk</label>
            <p>{{ $perhitunganBom->qty_per_produk }} {{ $perhitunganBom->bahanBaku->satuan ?? '' }}</p>
        </div>

        <div class="detail-item">
            <label>Waste</label>
            <p>{{ $perhitunganBom->waste }} %</p>
        </div>

        <div class="detail-item">
            <label>Harga Satuan</label>
            <p>Rp {{ number_format($perhitunganBom->bahanBaku->harga ?? 0, 0, ',', '.') }}</p>
        </div>

        <div class="detail-item">
            <label>Total Biaya</label>
            <p class="total-highlight">Rp {{ number_format($perhitunganBom->total_biaya, 0, ',', '.') }}</p>
        </div>

        <div class="detail-item full-width">
            <label>Keterangan</label>
            <p>{{ $perhitunganBom->keterangan ?? '-' }}</p>
        </div>
    </div>

    <div class="form-action">
        <a href="{{ route('perhitungan-bom.index') }}" class="btn-secondary">Kembali</a>
        <a href="{{ route('perhitungan-bom.edit', $perhitunganBom->id) }}" class="btn-primary">Edit Data</a>
    </div>
</div>

@endsection
