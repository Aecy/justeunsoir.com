<?php

namespace Tests\Feature\Reward;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RewardTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_user_cannot_see_reward_page_if_not_logged(): void
    {
        $response = $this->get(
            route('reward.index')
        );

        $response->assertRedirect(
            route('login')
        );
    }

    public function test_if_user_can_see_reward_page_if_is_logged(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(
            route('reward.index')
        );

        $response->assertStatus(200);
    }

    public function test_if_user_can_get_reward(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->post(
            route('reward.store')
        );

        $user->refresh();

        $this->assertNotNull($user->last_reward);
        $this->assertNotSame(0, $user->credits);
    }

    public function test_if_user_cannot_get_reward(): void
    {
        $user = User::factory()->create([
            'last_reward' => now()
        ]);

        $response = $this->actingAs($user)->post(
            route('reward.store')
        );

        $response->assertStatus(302);
    }
}
