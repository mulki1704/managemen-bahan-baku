@extends('layouts.app')

@section('title', 'Jadwal Produksi')

@section('page-title')
Jadwal Produksi
@endsection

@section('breadcrumb')
Dashboard / Jadwal Produksi
@endsection

@section('content')

<div class="page-content">

    <!-- Header -->
    <div class="panel">
        <div class="panel-head">
            <div>
                <h3>Jadwal Produksi</h3>
                <div class="hint">
                    Kelola seluruh jadwal produksi perusahaan.
                </div>
            </div>

            <a href="{{ route('jadwal-produksi.create') }}" class="btn-primary">
                + Tambah Jadwal
            </a>
        </div>
    </div>

    <!-- Statistik -->
    <section class="stat-grid">

        <div class="stat-card">
            <div class="stat-value">
                {{ $jadwalProduksi->count() }}
            </div>
            <div class="stat-label">
                Total Jadwal
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-value">
                {{ $jadwalProduksi->where('status','Berjalan')->count() }}
            </div>
            <div class="stat-label">
                Sedang Berjalan
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-value">
                {{ $jadwalProduksi->where('status','Dijadwalkan')->count() }}
            </div>
            <div class="stat-label">
                Dijadwalkan
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-value">
                {{ $jadwalProduksi->where('status','Selesai')->count() }}
            </div>
            <div class="stat-label">
                Selesai
            </div>
        </div>

    </section>

    <!-- Tabel -->
    <div class="panel">

        <div class="panel-head">
            <div>
                <h3>Daftar Jadwal Produksi</h3>
                <div class="hint">
                    Seluruh jadwal produksi yang telah dibuat.
                </div>
            </div>
        </div>

        <table>

            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Status</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>

            <tbody>

            @forelse($jadwalProduksi as $jadwal)

                <tr>

                    <td>
                        JP-{{ str_pad($jadwal->id, 3, '0', STR_PAD_LEFT) }}
                    </td>

                    <td>
                        Produk #{{ $jadwal->produk_id }}
                    </td>

                    <td>
                        {{ $jadwal->qty_produksi }}
                    </td>

                    <td>
                        {{ $jadwal->tanggal_mulai }}
                    </td>

                    <td>
                        {{ $jadwal->tanggal_selesai }}
                    </td>

                    <td>

                        @if($jadwal->status == 'Dijadwalkan')
                            <span class="badge ok">Dijadwalkan</span>

                        @elseif($jadwal->status == 'Berjalan')
                            <span class="badge warning">Berjalan</span>

                        @elseif($jadwal->status == 'Selesai')
                            <span class="badge success">Selesai</span>

                        @else
                            <span class="badge danger">
                                {{ $jadwal->status }}
                            </span>
                        @endif

                    </td>

                    <td>

                        <a href="{{ route('jadwal-produksi.show', $jadwal->id) }}">
                            Detail
                        </a>

                        |

                        <a href="{{ route('jadwal-produksi.edit', $jadwal->id) }}">
                            Edit
                        </a>

                        |

                        <form action="{{ route('jadwal-produksi.destroy', $jadwal->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                style="border:none;background:none;color:red;cursor:pointer;"
                                onclick="return confirm('Yakin ingin menghapus jadwal ini?')">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7" style="text-align:center;padding:25px;">
                        Belum ada jadwal produksi.
                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection