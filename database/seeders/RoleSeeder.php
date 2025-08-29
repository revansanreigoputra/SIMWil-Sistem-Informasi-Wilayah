<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\Desa;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Remove existing roles
        Role::whereIn('name', ['admin', 'kasir'])->delete();

        // Define new roles
        $roles = ['adminkabupaten', 'admindesa'];
        foreach ($roles as $roleName) {
            $role = Role::firstOrCreate(['name' => $roleName]);

            $email = $roleName . '@mail.com';

            // Ambil id desa pertama jika ada, null jika tidak ada
            $desa_id = $roleName === 'admindesa' ? Desa::first()?->id : null;

            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => ucfirst(str_replace('_', ' ', $roleName)),
                    'password' => Hash::make('password'),
                    'desa_id' => $desa_id,
                ]
            );

            if (!$user->hasRole($roleName)) {
                $user->assignRole($roleName);
            }
        }
    }
}
