<?php

namespace Tests\Feature\Account;

use App\Enums\User\UserDrinkingEnum;
use App\Enums\User\UserGendersEnum;
use App\Enums\User\UserMartialsEnum;
use App\Enums\User\UserMorphologyEnum;
use App\Enums\User\UserSmokingEnum;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccountTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_can_render_account_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(
            route('dashboard')
        );
        $response->assertOk();
    }

    public function test_if_user_can_update_account_information(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->patch(
            route('account.update.information'), [
                'name' => "Test User",
                'email' => "test@user.com",
                'gender' => UserGendersEnum::Homme->value,
                'martial' => UserMartialsEnum::COMPLICATED->value,
                'age' => '18',
                'country' => 'FR',
                'state' => "Champagne-Ardenne",
            ]
        );

        $response->assertSessionHasNoErrors()
            ->assertRedirect(
                route('dashboard')
            );

        $user->refresh();

        $this->assertSame('Test User', $user->name);
        $this->assertSame('test@user.com', $user->email);
        $this->assertSame(UserGendersEnum::Homme->value, $user->gender->value);
        $this->assertSame(UserMartialsEnum::COMPLICATED, $user->martial);
        $this->assertSame(18, $user->age);
        $this->assertSame('FR', $user->country);
        $this->assertSame('Champagne-Ardenne', $user->state);
        $this->assertNull($user->email_verified_at);
    }

    public function test_if_user_can_update_account_about(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->patch(
            route('account.update.about'), [
                'about_me' => "A propos de moi..."
            ]
        );

        $response->assertSessionHasNoErrors()
            ->assertRedirect(
                route('dashboard')
            );

        $user->refresh();

        $this->assertSame('A propos de moi...', $user->about_me);
    }

    public function test_if_user_can_update_account_looking(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->patch(
            route('account.update.looking'), [
                'looking_for' => "Je cherche..."
            ]
        );

        $response->assertSessionHasNoErrors()
            ->assertRedirect(
                route('dashboard')
            );

        $user->refresh();

        $this->assertSame('Je cherche...', $user->looking_for);
    }

    public function test_if_user_can_update_account_interest(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->patch(
            route('account.update.interest'), [
                'interest_for' => "J'adore les avions",
                'smoking' => UserSmokingEnum::NO->value,
                'drinking' => UserDrinkingEnum::NO->value,
            ]
        );

        $response->assertSessionHasNoErrors()
            ->assertRedirect(
                route('dashboard')
            );

        $user->refresh();

        $this->assertSame("J'adore les avions", $user->interest_for);
        $this->assertSame(UserSmokingEnum::NO, $user->smoking);
        $this->assertSame(UserDrinkingEnum::NO, $user->drinking);
    }


    public function test_if_user_can_update_account_physical(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->patch(
            route('account.update.physical'), [
                'height' => 180,
                'morphology' => UserMorphologyEnum::ATHLETE->value,
                'hair_color' => "Brun",
                'eye_color' => "Vert",
            ]
        );

        $response->assertSessionHasNoErrors()
            ->assertRedirect(
                route('dashboard')
            );

        $user->refresh();

        $this->assertSame(180, $user->height);
        $this->assertSame(UserMorphologyEnum::ATHLETE, $user->morphology);
        $this->assertSame("Brun", $user->hair_color);
        $this->assertSame("Vert", $user->eye_color);
    }

    public function test_if_email_verification_is_unchanged_when_the_email_is_unchanged(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->patch(
            route('account.update.information'), [
                'name' => 'Test User',
                'email' => $user->email
            ]
        );

        $response->assertSessionHasNoErrors()
            ->assertRedirect(
                route('dashboard')
            );

        $this->assertNotNull($user->refresh()->email_verified_at);
    }

    public function test_if_user_can_delete_his_account(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->delete(
            route('account.delete'), [
                'password' => 'password'
            ]
        );

        $response->assertSessionHasNoErrors()
            ->assertRedirect(
                url('/')
            );

        $this->assertGuest();
        $this->assertNull($user->fresh());
    }

    public function test_if_user_cannot_delete_his_account_if_wrong_password(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->from(
            route('account.security')
        )->delete(
            route('account.delete'), [
                'password' => 'wrong-password'
            ]
        );

        $response->assertSessionHasErrorsIn('userDeletion', 'password')
            ->assertRedirect(
                route('account.security')
            );

        $this->assertNotNull($user->fresh());
    }
}
