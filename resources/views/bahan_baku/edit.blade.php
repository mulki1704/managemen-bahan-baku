@extends('layouts.app')

@vite('resources/css/bahan-baku.css')

@section('content')

<div class="page-header">
    <div class="title">
        <h2>Edit Bahan Baku</h2>
        <p>Perbarui informasi bahan baku.</p>
    </div>
</div>

<div class="form-card">

    <form action="{{ route('bahan-baku.update', $bahanBaku->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-grid">

            <div class="form-group">
                <label>Kode Bahan</label>

                <input
                    type="text"
                    name="kode_bahan"
                    value="{{ old('kode_bahan', $bahanBaku->kode_bahan) }}"
                    required>

            </div>

            <div class="form-group">
                <label>Nama Bahan</label>

                <input
                    type="text"
                    name="nama_bahan"
                    value="{{ old('nama_bahan', $bahanBaku->nama_bahan) }}"
                    required>

            </div>

            <div class="form-group">

                <label>Kategori</label>

                <select name="kategori">

                    <option value="Kain" {{ $bahanBaku->kategori=='Kain'?'selected':'' }}>Kain</option>

                    <option value="Benang" {{ $bahanBaku->kategori=='Benang'?'selected':'' }}>Benang</option>

                    <option value="Aksesoris" {{ $bahanBaku->kategori=='Aksesoris'?'selected':'' }}>Aksesoris</option>

                </select>

            </div>

            <div class="form-group">

                <label>Satuan</label>

                <select name="satuan">

                    <option value="Meter" {{ $bahanBaku->satuan=='Meter'?'selected':'' }}>Meter</option>

                    <option value="Kg" {{ $bahanBaku->satuan=='Kg'?'selected':'' }}>Kg</option>

                    <option value="Roll" {{ $bahanBaku->satuan=='Roll'?'selected':'' }}>Roll</option>

                    <option value="Pcs" {{ $bahanBaku->satuan=='Pcs'?'selected':'' }}>Pcs</option>

                </select>

            </div>

            <div class="form-group">

                <label>Stok</label>

                <input
                    type="number"
                    name="stok"
                    value="{{ old('stok', $bahanBaku->stok) }}"
                    required>

            </div>

            <div class="form-group">

                <label>Stok Minimum</label>

                <input
                    type="number"
                    name="stok_minimum"
                    value="{{ old('stok_minimum', $bahanBaku->stok_minimum) }}"
                    required>

            </div>

            <div class="form-group full-width">

                <label>Harga</label>

                <input
                    type="number"
                    name="harga"
                    value="{{ old('harga', $bahanBaku->harga) }}"
                    required>

            </div>

        </div>

        <div class="form-action">

            <a href="{{ route('bahan-baku.index') }}" class="btn-secondary">
                Kembali
            </a>

            <button class="btn-primary">
                Update Data
            </button>

        </div>

    </form>

</div>

@endsection