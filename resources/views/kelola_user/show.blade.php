@extends('layouts.app')

@vite('resources/css/bahan-baku.css')

@section('content')
    <div class="page-header">
        <div class="title">
            <h2>Detail Akun Pengguna</h2>
            <p>Informasi lengkap akun <strong>{{ $user->name }}</strong>.</p>
        </div>
        <div class="header-action">
            <a href="{{ route('kelola-user.edit', $user) }}" class="btn-primary">Edit</a>
            <a href="{{ route('kelola-user.index') }}" class="btn-cancel">Kembali</a>
        </div>
    </div>

    <div class="form-card">
        <div class="detail-grid">
            <div class="detail-item">
                <span class="detail-label">Nama Lengkap</span>
                <span class="detail-value">{{ $user->name }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Email</span>
                <span class="detail-value">{{ $user->email }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Peran</span>
                <span class="detail-value">
                    @php
                        $roleColors = [
                            'admin_produksi' => 'background:#C1652F;color:#fff;',
                            'staff_produksi' => 'background:#3F7A5C;color:#fff;',
                            'admin_marketing' => 'background:#2980B9;color:#fff;',
                            'staff_marketing' => 'background:#8E44AD;color:#fff;',
                        ];
                    @endphp
                    <span style="display:inline-block;padding:4px 12px;border-radius:6px;font-size:12px;font-weight:600;{{ $roleColors[$user->role] ?? '' }}">
                        {{ $user->role_label }}
                    </span>
                </span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Dibuat Pada</span>
                <span class="detail-value">{{ $user->created_at->format('d M Y, H:i') }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Terakhir Diperbarui</span>
                <span class="detail-value">{{ $user->updated_at->format('d M Y, H:i') }}</span>
            </div>
        </div>
    </div>

    @if($user->id !== auth()->id())
        <div class="form-card" style="margin-top:16px;border:1.5px solid #F5C6BE;">
            <h3 style="font-size:14px;color:#B9432F;margin-bottom:12px;">Zona Bahaya</h3>
            <p style="font-size:13px;color:var(--ink-soft);margin-bottom:16px;">Menghapus akun ini akan menghapus semua data terkait secara permanen.</p>
            <form action="{{ route('kelola-user.destroy', $user) }}" method="POST">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Yakin ingin menghapus akun {{ $user->name }}? Tindakan ini tidak dapat dibatalkan.')" class="btn-delete">Hapus Akun</button>
            </form>
        </div>
    @endif
@endsection