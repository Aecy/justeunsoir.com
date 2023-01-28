<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(9)->create();

         User::factory()->create([
             'name' => 'Night Lovell',
             'role' => 'admin',
             'email' => 'aecy@dev.fr',
         ]);
    }
}
