<?php

namespace Tests\Feature\Admin;

use App\Enums\User\UserRolesEnum;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_admin_can_see_admin_page(): void
    {
        $user = User::factory()->create([
            'role' => UserRolesEnum::ADMIN
        ]);

        $response = $this->actingAs($user)->get(
            route('admin.index')
        );

        $response->assertStatus(200);
    }

    public function test_if_user_cant_see_admin_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(
            route('admin.index')
        );

        $response->assertRedirect('/');
    }
}
