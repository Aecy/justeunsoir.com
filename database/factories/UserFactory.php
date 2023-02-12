<?php

namespace Database\Factories;

use App\Enums\User\UserDrinkingEnum;
use App\Enums\User\UserGendersEnum;
use App\Enums\User\UserMartialsEnum;
use App\Enums\User\UserMorphologyEnum;
use App\Enums\User\UserSmokingEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'age' => rand(18, 58),
            'about_me' => "unset",
            'looking_for' => fake()->sentence,
            'interest_for' => fake()->sentence,
            'martial' => UserMartialsEnum::random(),
            'smoking' => UserSmokingEnum::random(),
            'drinking' => UserDrinkingEnum::random(),
            'height' => rand(150, 210),
            'hair_color' => fake()->safeColorName,
            'eye_color' => fake()->safeColorName,
            'morphology' => UserMorphologyEnum::random(),
            'country' => collect(['FR', 'BE'])->random(),
            'state' => "unset",
            'gender' => UserGendersEnum::random(),
            'created_at' => fake()->dateTimeBetween('-3 months', 'now')
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
