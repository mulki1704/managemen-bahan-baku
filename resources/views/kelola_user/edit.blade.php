@extends('layouts.app')

@vite('resources/css/bahan-baku.css')

@section('content')
    <div class="page-header">
        <div class="title">
            <h2>Edit Akun Pengguna</h2>
            <p>Perbarui data akun <strong>{{ $user->name }}</strong>.</p>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="margin:0;padding-left:16px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-card">
        <form action="{{ route('kelola-user.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <div class="form-field">
                    <label for="name">Nama Lengkap</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required autofocus>
                </div>

                <div class="form-field">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="form-field">
                    <label for="role">Peran</label>
                    <select id="role" name="role" required>
                        <option value="admin_produksi" {{ old('role', $user->role) == 'admin_produksi' ? 'selected' : '' }}>Admin Produksi</option>
                        <option value="staff_produksi" {{ old('role', $user->role) == 'staff_produksi' ? 'selected' : '' }}>Staff Produksi</option>
                        <option value="admin_marketing" {{ old('role', $user->role) == 'admin_marketing' ? 'selected' : '' }}>Admin Marketing</option>
                        <option value="staff_marketing" {{ old('role', $user->role) == 'staff_marketing' ? 'selected' : '' }}>Staff Marketing</option>
                    </select>
                </div>

                <div class="form-field">
                    <label for="password">Password <span style="font-weight:400;color:var(--ink-soft);">(kosongkan jika tidak ingin mengubah)</span></label>
                    <input id="password" type="password" name="password" placeholder="Minimal 8 karakter">
                </div>

                <div class="form-field">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Ulangi password">
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('kelola-user.index') }}" class="btn-cancel">Batal</a>
                <button type="submit" class="btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection