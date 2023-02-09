<?php

namespace Database\Seeders;

use App\Enums\User\UserGendersEnum;
use App\Enums\User\UserRolesEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(500)->create();

        User::factory()->create([
            'name' => 'Night Lovell',
            'gender' => UserGendersEnum::Homme,
            'country' => 'FR',
            'state' => "Champagne-Ardenne",
            'role' => UserRolesEnum::ADMIN,
            'email' => 'aecy@dev.fr',
        ]);
    }
}
