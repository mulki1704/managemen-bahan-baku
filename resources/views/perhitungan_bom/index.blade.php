@extends('layouts.app')

@vite('resources/css/bom.css')

@section('content')
    <div class="page-header">
        <div class="title">
            <h2>Bill of Material (BOM)</h2>
            <p>Kelola kebutuhan bahan baku untuk setiap produk.</p>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Toolbar -->
    <div class="toolbar">

        <div class="search-section">
            <form action="{{ route('perhitungan-bom.index') }}" method="GET" class="search-form">

                <input type="text" name="search" placeholder="Cari kode atau nama produk..."
                    value="{{ request('search') }}">

                <button type="submit">
                    Cari
                </button>

            </form>
        </div>

        <div class="toolbar-action">

            <a href="{{ route('perhitungan-bom.create') }}" class="btn-primary">

                <i class="fas fa-plus"></i>

                Tambah BOM

            </a>

        </div>

    </div>

    <!-- Table -->

    <div class="table-container">

        <table class="custom-table">

            <thead>

                <tr>

                    <th>No</th>

                    <th>Kode Produk</th>

                    <th>Nama Produk</th>

                    <th>Bahan Baku</th>

                    <th>Kategori</th>

                    <th>Qty / Produk</th>

                    <th>Waste (%)</th>

                    <th>Satuan</th>

                    <th>Harga</th>

                    <th>Total Biaya</th>

                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($bom as $item)
                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->kode_produk }}</td>

                        <td>{{ $item->nama_produk }}</td>

                        <td>{{ $item->bahanBaku->nama_bahan }}</td>

                        <td>{{ $item->bahanBaku->kategori }}</td>

                        <td>{{ $item->qty_per_produk }}</td>

                        <td>{{ $item->waste }} %</td>

                        <td>{{ $item->bahanBaku->satuan }}</td>

                        <td>
                            Rp {{ number_format($item->bahanBaku->harga, 0, ',', '.') }}
                        </td>

                        <td>

                            Rp

                            {{ number_format(
                                ($item->qty_per_produk + ($item->qty_per_produk * $item->waste) / 100) * $item->bahanBaku->harga,
                            
                                0,
                                ',',
                                '.',
                            ) }}

                        </td>

                        <td>

                            <div class="action-button">

                                <a href="{{ route('perhitungan-bom.show', $item->id) }}" class="btn-detail">

                                    Detail

                                </a>

                                <a href="{{ route('perhitungan-bom.edit', $item->id) }}" class="btn-edit">

                                    Edit

                                </a>

                                <form action="{{ route('perhitungan-bom.destroy', $item->id) }}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn-delete">

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="11" class="empty">

                            Belum ada data Bill Of Material.

                        </td>

                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>
@endsection
