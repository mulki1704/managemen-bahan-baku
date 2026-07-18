@extends('layouts.app')

@vite('resources/css/bahan-baku.css')

@section('content')
    <div class="page-header">
        <div class="title">
            <h2>Kelola Akun Pengguna</h2>
            <p>Buat, ubah, dan hapus akun admin & staff.</p>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="toolbar">
        <div class="search-section">
            <form action="{{ route('kelola-user.index') }}" method="GET" class="search-form">
                <input type="text" name="search" placeholder="Cari nama atau email..." value="{{ request('search') }}">
                <select name="role" style="height:40px;border:1.5px solid var(--stitch);border-radius:8px;padding:0 12px;font-size:13px;background:var(--card);color:var(--ink);">
                    <option value="">Semua Peran</option>
                    <option value="admin_produksi" {{ request('role') == 'admin_produksi' ? 'selected' : '' }}>Admin Produksi</option>
                    <option value="staff_produksi" {{ request('role') == 'staff_produksi' ? 'selected' : '' }}>Staff Produksi</option>
                    <option value="admin_marketing" {{ request('role') == 'admin_marketing' ? 'selected' : '' }}>Admin Marketing</option>
                    <option value="staff_marketing" {{ request('role') == 'staff_marketing' ? 'selected' : '' }}>Staff Marketing</option>
                </select>
                <button type="submit">Cari</button>
            </form>
        </div>
        <div class="toolbar-action">
            <a href="{{ route('kelola-user.create') }}" class="btn-primary">
                <i class="fas fa-plus"></i>
                Tambah Akun
            </a>
        </div>
    </div>

    <div class="table-container">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Peran</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $users->firstItem() + $loop->index }}</td>
                        <td>
                            <div style="display:flex;align-items:center;gap:10px;">
                                <div style="width:32px;height:32px;border-radius:8px;background:{{ match($user->role) { 'admin_produksi' => '#C1652F', 'staff_produksi' => '#3F7A5C', 'admin_marketing' => '#2980B9', 'staff_marketing' => '#8E44AD', default => '#6B7280' } }};color:#fff;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;">
                                    {{ strtoupper(mb_substr($user->name, 0, 2)) }}
                                </div>
                                <strong>{{ $user->name }}</strong>
                            </div>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @php
                                $roleColors = [
                                    'admin_produksi' => 'background:#C1652F;color:#fff;',
                                    'staff_produksi' => 'background:#3F7A5C;color:#fff;',
                                    'admin_marketing' => 'background:#2980B9;color:#fff;',
                                    'staff_marketing' => 'background:#8E44AD;color:#fff;',
                                ];
                            @endphp
                            <span style="display:inline-block;padding:3px 10px;border-radius:6px;font-size:11px;font-weight:600;letter-spacing:0.3px;{{ $roleColors[$user->role] ?? '' }}">
                                {{ $user->role_label }}
                            </span>
                        </td>
                        <td>{{ $user->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="action-button">
                                <a href="{{ route('kelola-user.show', $user) }}" class="btn-detail">Detail</a>
                                <a href="{{ route('kelola-user.edit', $user) }}" class="btn-edit">Edit</a>
                                @if($user->id !== auth()->id())
                                    <form action="{{ route('kelola-user.destroy', $user) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Hapus akun {{ $user->name }}?')" class="btn-delete">Hapus</button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="empty">Belum ada akun pengguna.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top:16px;">
        {{ $users->links() }}
    </div>
@endsection