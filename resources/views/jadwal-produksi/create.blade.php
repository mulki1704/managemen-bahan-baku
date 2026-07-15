@extends('layouts.app')

@section('title', 'Tambah Jadwal Produksi')

@section('page-title')
Tambah Jadwal Produksi
@endsection

@section('breadcrumb')
Dashboard / Jadwal Produksi / Tambah Jadwal
@endsection

@section('content')

<style>
    .form-panel{
        background:#fff;
        border-radius:12px;
        padding:25px;
        box-shadow:0 2px 8px rgba(0,0,0,.08);
    }

    .form-grid{
        display:grid;
        grid-template-columns:repeat(2,1fr);
        gap:20px;
        margin-top:20px;
    }

    .form-group{
        display:flex;
        flex-direction:column;
    }

    .form-group label{
        font-size:14px;
        font-weight:600;
        margin-bottom:8px;
        color:#374151;
    }

    .form-group input,
    .form-group select,
    .form-group textarea{
        width:100%;
        padding:12px;
        border:1px solid #d1d5db;
        border-radius:8px;
        font-size:14px;
        outline:none;
        transition:.3s;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus{
        border-color:#A6521F;
        box-shadow:0 0 0 3px rgba(166, 82, 31, 0.15);
    }

    .full-width{
        grid-column:1 / -1;
    }

    .form-action{
        display:flex;
        justify-content:flex-end;
        gap:12px;
        margin-top:25px;
    }

    .btn-primary{
        background:#C1652F;
        color:#fff;
        border:none;
        padding:10px 20px;
        border-radius:8px;
        cursor:pointer;
        transition:.3s;
    }

    .btn-primary:hover{
        background:#A6521F;
    }

    .btn-secondary{
        background:#e5e7eb;
        color:#111827;
        text-decoration:none;
        padding:10px 20px;
        border-radius:8px;
        transition:.3s;
    }

    .btn-secondary:hover{
        background:#d1d5db;
    }
</style>

<div class="panel form-panel">

    <div class="panel-head">
        <div>
            <h3>Tambah Jadwal Produksi</h3>
            <div class="hint">
                Lengkapi data berikut untuk membuat jadwal produksi baru.
            </div>
        </div>
    </div>

    <form action="{{ route('jadwal-produksi.store') }}" method="POST">

        @csrf

        <div class="form-grid">

            <div class="form-group">
                <label>Produk</label>
                <select name="produk_id">
                    <option value="1">Kaos Polos</option>
                    <option value="2">Jaket Hoodie</option>
                    <option value="3">Kemeja</option>
                </select>
            </div>

            <div class="form-group">
                <label>Jumlah Produksi</label>
                <input type="number" name="qty_produksi" placeholder="Masukkan jumlah produksi">
            </div>

            <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai">
            </div>

            <div class="form-group">
                <label>Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai">
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option selected>Dijadwalkan</option>
                    <option>Berjalan</option>
                    <option>Selesai</option>
                    <option>Ditunda</option>
                </select>
            </div>

            <div class="form-group full-width">
                <label>Catatan</label>
                <textarea name="catatan" rows="4" placeholder="Tambahkan catatan jika diperlukan"></textarea>
            </div>

        </div>

        <div class="form-action">
            <a href="{{ route('jadwal-produksi.index') }}" class="btn-secondary">
                Kembali
            </a>

            <button type="submit" class="btn-primary">
                Simpan Jadwal
            </button>
        </div>

    </form>

</div>

@endsection