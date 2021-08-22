<?php

namespace Tests\Feature;

use App\Models\Tag;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthenticated_user_can_be_redirected_to_login_page()
    {
        $response = $this->get(route('dashboard'));

        $response->assertRedirect(route('login'));
    }
    
    public function test_dashboard_can_be_rendered()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('dashboard'));

        $response->assertStatus(200)
            ->assertSee('There is no post.', false)
            ->assertSee('No Categories', false)
            ->assertSee('No Tags', false);
    }

    public function test_dashboard_can_receive_data()
    {
        $user = User::factory()->create();
        $category = Category::factory(3)->create();
        $post = Post::factory()->create();
        $tag = Tag::factory()->create();
        $post->tags()->attach($tag);

        $response = $this->actingAs($user)->get(route('dashboard'));

        $response->assertStatus(200)
            ->assertDontSee('There is no post.', false)
            ->assertDontSee('No Categories', false)
            ->assertDontSee('No Tags', false)
            ->assertSee($post->title, false)
            ->assertSee($post->category->name, false)
            ->assertSee($post->tags[0]->name, false)
            ->assertSee($category[0]->name, false)
            ->assertSee($tag->name, false);
    }
}
