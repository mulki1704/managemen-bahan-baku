@extends('layouts.app')

@vite('resources/css/bahan-baku.css')

@section('content')
    <div class="page-header">
        <div class="title">
            <h2>Stok Bahan Baku</h2>
            <p>Kelola seluruh stok bahan baku produksi.</p>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- Toolbar -->
    <div class="toolbar">
        <!-- Search -->
        <div class="search-section">
            <form action="{{ route('bahan-baku.index') }}" method="GET" class="search-form">
                <input type="text" name="search" placeholder="Cari kode atau nama bahan..."
                    value="{{ request('search') }}">
                <button type="submit">
                    Cari
                </button>
            </form>
        </div>
        <!-- Tombol -->
        <div class="toolbar-action">
            <a href="{{ route('bahan-baku.create') }}" class="btn-primary">
                <i class="fas fa-plus"></i>
                Tambah Bahan
            </a>
        </div>
    </div>
    {{-- Tabel --}}
    <div class="table-container">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Bahan</th>
                    <th>Kategori</th>
                    <th>Satuan</th>
                    <th>Stok</th>
                    <th>Minimum</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bahan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <strong>{{ $item->kode_bahan }}</strong>
                        </td>
                        <td>{{ $item->nama_bahan }}</td>
                        <td>{{ $item->kategori }}</td>
                        <td>{{ $item->satuan }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>{{ $item->stok_minimum }}</td>
                        <td>
                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </td>
                        <td>
                            @if ($item->stok == 0)
                                <span class="status danger">
                                    Habis
                                </span>
                            @elseif($item->stok <= $item->stok_minimum)
                                <span class="status warning">
                                    Menipis
                                </span>
                            @else
                                <span class="status success">
                                    Aman
                                </span>
                            @endif
                        </td>
                        <td>
                            <div class="action-button">
                                <a href="{{ route('bahan-baku.show', $item->id) }}" class="btn-detail">
                                    Detail
                                </a>
                                <a href="{{ route('bahan-baku.edit', $item) }}" class="btn-edit">
                                    Edit
                                </a>
                                <form action="{{ route('bahan-baku.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Hapus data?')" class="btn-delete">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="empty">
                            Belum ada data bahan baku.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    </div>
@endsection
