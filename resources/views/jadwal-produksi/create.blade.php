@extends('layouts.app')

@section('title', 'Tambah Jadwal Produksi')

@section('page-title', 'Tambah Jadwal')

@section('breadcrumb', 'Dashboard / Jadwal Produksi / Tambah')

@vite('resources/css/bahan-baku.css')

@section('content')

<div class="page-header">
    <div class="title">
        <h2>Tambah Jadwal Produksi</h2>
        <p>Buat jadwal produksi baru.</p>
    </div>
</div>

@if ($errors->any())
    <div class="alert-box alert-error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-card">
    <form action="{{ route('jadwal-produksi.store') }}" method="POST">
        @csrf

        <div class="form-grid">
            <div class="form-group">
                <label>Kode Jadwal</label>
                <input type="text" name="kode_jadwal" value="{{ old('kode_jadwal') }}" placeholder="Contoh: JDW-001" required>
            </div>

            <div class="form-group">
                <label>Qty Produksi</label>
                <input type="number" name="qty_produksi" value="{{ old('qty_produksi') }}" min="1" placeholder="0" required>
            </div>

            <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
            </div>

            <div class="form-group">
                <label>Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" required>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" required>
                    <option value="Dijadwalkan" {{ old('status') == 'Dijadwalkan' ? 'selected' : '' }}>Dijadwalkan</option>
                    <option value="Berjalan" {{ old('status') == 'Berjalan' ? 'selected' : '' }}>Berjalan</option>
                    <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="Ditunda" {{ old('status') == 'Ditunda' ? 'selected' : '' }}>Ditunda</option>
                </select>
            </div>

            <div class="form-group full-width">
                <label>Catatan</label>
                <textarea name="catatan" rows="3" placeholder="Catatan tambahan (opsional)">{{ old('catatan') }}</textarea>
            </div>
        </div>

        <div class="form-action">
            <a href="{{ route('jadwal-produksi.index') }}" class="btn-secondary">Kembali</a>
            <button type="submit" class="btn-primary">Simpan Jadwal</button>
        </div>
    </form>
</div>

@endsection
