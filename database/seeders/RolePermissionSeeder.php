<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $adminR = Role::firstOrCreate(['name' => 'admin']);
        $modR   = Role::firstOrCreate(['name' => 'reviewer']);
        $teachR = Role::firstOrCreate(['name' => 'teacher']);
        $studR  = Role::firstOrCreate(['name' => 'student']);

        if (!User::where('name', 'Admin')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@test.com',
                'password' => Hash::make('admin123'),
            ])->assignRole($adminR);
        }

        if (!User::where('name', 'Moderator')->exists()) {
            User::create([
                'name' => 'Moderator',
                'email' => 'mod@test.com',
                'password' => Hash::make('mod123'),
            ])->assignRole($modR);
        }
    }
}