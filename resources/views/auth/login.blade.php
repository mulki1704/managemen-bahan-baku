<x-guest-layout>
    <div class="login-form-page">
        <a href="{{ route('login') }}" class="back-to-roles">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:16px;height:16px;"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            Ganti Peran
        </a>

        <div class="login-role-badge" id="roleBadge">
            <div class="lrb-icon" id="roleIcon"></div>
            <div class="lrb-info">
                <span class="lrb-label">Masuk sebagai</span>
                <span class="lrb-name" id="roleName"></span>
            </div>
        </div>

        @if ($errors->any())
            <div class="auth-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="hidden" name="role" value="{{ $role }}">

            <div class="auth-field">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="nama@sikerrel.id" />
            </div>

            <div class="auth-field">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required placeholder="Masukkan password" />
            </div>

            <div class="auth-check">
                <input id="remember_me" type="checkbox" name="remember">
                <label for="remember_me">Ingat saya</label>
            </div>

            <button type="submit" class="auth-btn">Masuk</button>
        </form>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var role = '{{ $role }}';
        var roles = {
            'super_admin':     { name: 'Super Admin',     color: '#16213A', icon: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>' },
            'admin_produksi':  { name: 'Admin Produksi',  color: '#C1652F', icon: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 6h16M4 12h16M4 18h10"/></svg>' },
            'staff_produksi':  { name: 'Staff Produksi',  color: '#3F7A5C', icon: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/></svg>' },
            'admin_marketing': { name: 'Admin Marketing', color: '#2980B9', icon: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 01-3.46 0"/></svg>' },
            'staff_marketing': { name: 'Staff Marketing', color: '#8E44AD', icon: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>' }
        };
        var r = roles[role];
        if (r) {
            document.getElementById('roleName').textContent = r.name;
            var icon = document.getElementById('roleIcon');
            icon.style.background = r.color;
            icon.innerHTML = r.icon;
        }
    });
    </script>
</x-guest-layout>