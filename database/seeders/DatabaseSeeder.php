<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::findOrCreate(RolesEnum::USER->name);
        Role::findOrCreate(RolesEnum::ANALYST->name);
        User::query()
            ->firstOrCreate([
                'name' => 'Administrador',
                'email' => 'admin@agiliza.com',
                'password' => Hash::make('acai@3306'),
            ])
            ->assignRole(Role::findOrCreate(RolesEnum::ADMIN->name));
    }
}
