<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

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

            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => ucfirst(str_replace('_', ' ', $roleName)),
                    'password' => Hash::make('password'),
                ]
            );

            if (!$user->hasRole($roleName)) {
                $user->assignRole($roleName);
            }
        }
    }
}
