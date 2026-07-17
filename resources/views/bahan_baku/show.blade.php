@extends('layouts.app')

@vite('resources/css/bahan-baku.css')

@section('content')

<div class="page-header">
    <div class="title">
        <h2>Detail Bahan Baku</h2>
        <p>Informasi lengkap bahan baku.</p>
    </div>
</div>

<div class="form-card">

    <div class="detail-grid">

        <div class="detail-item">
            <label>Kode Bahan</label>
            <p>{{ $bahanBaku->kode_bahan }}</p>
        </div>

        <div class="detail-item">
            <label>Nama Bahan</label>
            <p>{{ $bahanBaku->nama_bahan }}</p>
        </div>

        <div class="detail-item">
            <label>Kategori</label>
            <p>{{ $bahanBaku->kategori }}</p>
        </div>

        <div class="detail-item">
            <label>Satuan</label>
            <p>{{ $bahanBaku->satuan }}</p>
        </div>

        <div class="detail-item">
            <label>Stok</label>
            <p>{{ $bahanBaku->stok }}</p>
        </div>

        <div class="detail-item">
            <label>Stok Minimum</label>
            <p>{{ $bahanBaku->stok_minimum }}</p>
        </div>

        <div class="detail-item full-width">
            <label>Harga</label>
            <p>Rp {{ number_format($bahanBaku->harga,0,',','.') }}</p>
        </div>

    </div>

    <div class="form-action">

        <a href="{{ route('bahan-baku.index') }}" class="btn-secondary">

            Kembali

        </a>

        <a href="{{ route('bahan-baku.edit',$bahanBaku) }}" class="btn-primary">

            Edit Data

        </a>

    </div>

</div>

@endsection