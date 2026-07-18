@extends('layouts.app')

@section('title', 'Jadwal Produksi')

@section('page-title', 'Jadwal Produksi')

@section('breadcrumb', 'Dashboard / Jadwal Produksi')

@vite('resources/css/bahan-baku.css')

@section('content')

<div class="page-header">
    <div class="title">
        <h2>Jadwal Produksi</h2>
        <p>Kelola jadwal dan status produksi.</p>
    </div>
</div>

@if (session('success'))
    <div class="alert-box alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="toolbar">
    <div class="search-section">
        <form action="{{ route('jadwal-produksi.index') }}" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Cari kode jadwal atau catatan..." value="{{ request('search') }}">
            <button type="submit">Cari</button>
        </form>
    </div>
    <div class="toolbar-action">
        <a href="{{ route('jadwal-produksi.create') }}" class="btn-primary">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" style="width:15px;height:15px;"><path d="M12 5v14M5 12h14"/></svg>
            Tambah Jadwal
        </a>
    </div>
</div>

<div class="table-container">
    <table class="custom-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Jadwal</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Qty Produksi</th>
                <th>Status</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jadwalProduksis as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><strong>{{ $item->kode_jadwal }}</strong></td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d M Y') }}</td>
                    <td>{{ $item->qty_produksi }}</td>
                    <td>
                        @switch($item->status)
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
                    </td>
                    <td>{{ Str::limit($item->catatan, 30) ?? '-' }}</td>
                    <td>
                        <div class="action-button">
                            <a href="{{ route('jadwal-produksi.show', $item->id) }}" class="btn-detail">Detail</a>
                            <a href="{{ route('jadwal-produksi.edit', $item->id) }}" class="btn-edit">Edit</a>
                            <form action="{{ route('jadwal-produksi.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Hapus jadwal ini?')" class="btn-delete">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="empty">Belum ada jadwal produksi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
