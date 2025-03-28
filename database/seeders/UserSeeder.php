<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Models\User;
use Modules\Auth\Support\Role;

final class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::query()
            ->where('email', 'admin@example.com')
            ->first();

        if (is_null($user)) {
            User::query()->create([
                'email' => 'admin@example.com',
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'role' => Role::ADMIN,
            ]);

            return;
        }

        $user->update([
            'name' => 'Admin',
            'password' => Hash::make('password'),
            'role' => Role::ADMIN,
        ]);
    }
}
