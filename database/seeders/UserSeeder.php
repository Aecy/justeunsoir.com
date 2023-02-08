<?php

namespace Database\Seeders;

use App\Enums\User\UserRolesEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(500)->create();

        User::factory()->create([
            'name' => 'Night Lovell',
            'gender' => 'H',
            'country' => 'FR',
            'state' => "Champagne-Ardenne",
            'role' => UserRolesEnum::ADMIN,
            'email' => 'aecy@dev.fr',
        ]);
    }
}
