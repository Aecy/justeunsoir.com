<?php

namespace Tests\Feature\Search;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SearchingTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_user_cannot_see_searching_page_if_not_logged(): void
    {
        $response = $this->get(
            route('search.index')
        );

        $response->assertRedirect(
            route('login')
        );
    }

    public function test_if_user_can_see_searching_page_if_is_logged(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(
            route('search.index')
        );

        $response->assertStatus(200);
    }

    public function test_if_user_can_search_by_gender(): void
    {
        $user = User::factory()->create([
            'gender' => 'man'
        ]);

        $response = $this->actingAs($user)->get('recherches?looking=man');
        $response->assertSee('man');
    }

    public function test_if_user_can_search_by_age(): void
    {
        $user = User::factory()->create([
            'age' => 25
        ]);

        $response = $this->actingAs($user)->get('recherches?start_age=18&end_age=25');
        $response->assertSee(25);
    }

    public function test_if_user_can_search_by_country(): void
    {
        $user = User::factory()->create([
            'country' => 'FR'
        ]);

        $response = $this->actingAs($user)->get('recherches?country=FR');
        $response->assertSee('FR');
    }

    public function test_if_user_can_search_by_state(): void
    {
        $user = User::factory()->create([
            'state' => "Champagne-Ardenne"
        ]);

        $response = $this->actingAs($user)->get('recherches?state=Champagne-Ardenne');
        $response->assertSee('Champagne-Ardenne');
    }
}
