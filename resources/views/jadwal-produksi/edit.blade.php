@extends('layouts.app')

@section('title', 'Edit Jadwal Produksi')

@section('page-title', 'Edit Jadwal')

@section('breadcrumb', 'Dashboard / Jadwal Produksi / Edit')

@vite('resources/css/bahan-baku.css')

@section('content')

<div class="page-header">
    <div class="title">
        <h2>Edit Jadwal Produksi</h2>
        <p>Perbarui informasi jadwal produksi.</p>
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
    <form action="{{ route('jadwal-produksi.update', $jadwalProduksi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-grid">
            <div class="form-group">
                <label>Kode Jadwal</label>
                <input type="text" name="kode_jadwal" value="{{ old('kode_jadwal', $jadwalProduksi->kode_jadwal) }}" required>
            </div>

            <div class="form-group">
                <label>Qty Produksi</label>
                <input type="number" name="qty_produksi" value="{{ old('qty_produksi', $jadwalProduksi->qty_produksi) }}" min="1" required>
            </div>

            <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai', $jadwalProduksi->tanggal_mulai) }}" required>
            </div>

            <div class="form-group">
                <label>Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai', $jadwalProduksi->tanggal_selesai) }}" required>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" required>
                    @foreach(['Dijadwalkan', 'Berjalan', 'Selesai', 'Ditunda'] as $status)
                        <option value="{{ $status }}" {{ old('status', $jadwalProduksi->status) == $status ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group full-width">
                <label>Catatan</label>
                <textarea name="catatan" rows="3">{{ old('catatan', $jadwalProduksi->catatan) }}</textarea>
            </div>
        </div>

        <div class="form-action">
            <a href="{{ route('jadwal-produksi.index') }}" class="btn-secondary">Kembali</a>
            <button type="submit" class="btn-primary">Update Jadwal</button>
        </div>
    </form>
</div>

@endsection
