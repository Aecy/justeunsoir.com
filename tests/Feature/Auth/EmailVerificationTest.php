<?php

namespace Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_email_verification_page_can_be_render(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($user)->get('/verify-email');
        $response->assertStatus(200);
    }

    public function test_if_email_can_be_verified(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => null
        ]);

        Event::fake();

        $verifyUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addHour(1),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        );

        $response = $this->actingAs($user)->get($verifyUrl);

        Event::assertDispatched(Verified::class);
        $this->assertTrue($user->fresh()->hasVerifiedEmail());
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_if_email_is_not_verified_with_invalid_flash(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        $verifyUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addHour(1),
            ['id' => $user->id, 'hash' => sha1('wrong-email')]
        );

        $this->actingAs($user)->get($verifyUrl);
        $this->assertFalse($user->fresh()->hasVerifiedEmail());
    }
}
