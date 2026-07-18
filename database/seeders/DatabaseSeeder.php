<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'Super Admin',   'email' => 'superadmin@sikerrel.id', 'role' => 'super_admin'],
            ['name' => 'Admin Produksi','email' => 'admin.produksi@sikerrel.id', 'role' => 'admin_produksi'],
            ['name' => 'Staff Produksi','email' => 'staff.produksi@sikerrel.id', 'role' => 'staff_produksi'],
            ['name' => 'Admin Marketing','email' => 'admin.marketing@sikerrel.id', 'role' => 'admin_marketing'],
            ['name' => 'Staff Marketing','email' => 'staff.marketing@sikerrel.id', 'role' => 'staff_marketing'],
        ];

        foreach ($roles as $user) {
            DB::table('users')->updateOrInsert(
                ['email' => $user['email']],
                [
                    'name'              => $user['name'],
                    'role'              => $user['role'],
                    'password'          => Hash::make('password'),
                    'email_verified_at' => now(),
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]
            );
        }
    }
}