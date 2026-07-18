<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class KelolaUserController extends Controller
{
    private $manageableRoles = [
        'admin_produksi',
        'admin_marketing',
        'staff_produksi',
        'staff_marketing',
    ];

    public function index(Request $request)
    {
        $query = User::whereIn('role', $this->manageableRoles);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        $users = $query->latest()->paginate(10)->withQueryString();

        return view('kelola_user.index', compact('users'));
    }

    public function create()
    {
        return view('kelola_user.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role'     => ['required', 'string', 'in:'.implode(',', $this->manageableRoles)],
        ]);

        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role'     => $validated['role'],
        ]);

        return redirect()
            ->route('kelola-user.index')
            ->with('success', 'Akun berhasil dibuat.');
    }

    public function show(User $user)
    {
        if (in_array($user->role, ['super_admin'])) {
            abort(403);
        }

        return view('kelola_user.show', compact('user'));
    }

    public function edit(User $user)
    {
        if (in_array($user->role, ['super_admin'])) {
            abort(403);
        }

        return view('kelola_user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if (in_array($user->role, ['super_admin'])) {
            abort(403);
        }

        $validated = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class.',id,'.$user->id],
            'role'     => ['required', 'string', 'in:'.implode(',', $this->manageableRoles)],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        $data = [
            'name'  => $validated['name'],
            'email' => $validated['email'],
            'role'  => $validated['role'],
        ];

        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        $user->update($data);

        return redirect()
            ->route('kelola-user.index')
            ->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        if (in_array($user->role, ['super_admin'])) {
            abort(403);
        }

        if ($user->id === auth()->id()) {
            return redirect()
                ->route('kelola-user.index')
                ->with('error', 'Tidak dapat menghapus akun sendiri.');
        }

        $user->delete();

        return redirect()
            ->route('kelola-user.index')
            ->with('success', 'Akun berhasil dihapus.');
    }
}
