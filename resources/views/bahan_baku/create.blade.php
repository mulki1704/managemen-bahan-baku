@extends('layouts.app')

@vite('resources/css/bahan-baku.css')

@section('content')

<div class="page-header">

    <div class="title">
        <h2>Tambah Bahan Baku</h2>
        <p>Masukkan data bahan baku baru ke dalam sistem.</p>
    </div>

</div>

<div class="form-card">

    <form action="{{ route('bahan-baku.store') }}" method="POST">

        @csrf

        <div class="form-grid">

            <div class="form-group">
                <label>Kode Bahan</label>

                <input
                    type="text"
                    name="kode_bahan"
                    value="{{ old('kode_bahan') }}"
                    required>

                @error('kode_bahan')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Nama Bahan</label>

                <input
                    type="text"
                    name="nama_bahan"
                    value="{{ old('nama_bahan') }}"
                    required>

                @error('nama_bahan')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">

                <label>Kategori</label>

                <select name="kategori">

                    <option value="">Pilih Kategori</option>

                    <option value="Kain">Kain</option>
                    <option value="Benang">Benang</option>
                    <option value="Aksesoris">Aksesoris</option>

                </select>

            </div>

            <div class="form-group">

                <label>Satuan</label>

                <select name="satuan">

                    <option value="">Pilih Satuan</option>

                    <option value="Meter">Meter</option>
                    <option value="Kg">Kg</option>
                    <option value="Roll">Roll</option>
                    <option value="Pcs">Pcs</option>

                </select>

            </div>

            <div class="form-group">

                <label>Jumlah Stok</label>

                <input
                    type="number"
                    name="stok"
                    value="{{ old('stok') }}"
                    required>

            </div>

            <div class="form-group">

                <label>Stok Minimum</label>

                <input
                    type="number"
                    name="stok_minimum"
                    value="{{ old('stok_minimum') }}"
                    required>

            </div>

            <div class="form-group full-width">

                <label>Harga</label>

                <input
                    type="number"
                    name="harga"
                    value="{{ old('harga') }}"
                    required>

            </div>

        </div>

        <div class="form-action">

            <a href="{{ route('bahan-baku.index') }}" class="btn-secondary">

                Kembali

            </a>

            <button type="submit" class="btn-primary">

                Simpan Data

            </button>

        </div>

    </form>

</div>

@endsection