<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthenticated_user_can_not_see_create_post_page()
    {
        $this->get(route('post.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_see_create_post_page()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('post.create'))
            ->assertStatus(200);
    }

    public function test_user_can_create_post()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();

        Storage::fake('thumbnails');

        $file = UploadedFile::fake()->image('thumbnail.jpg');

        $post = [
            'title' => 'A random title',
            'body' => 'A random paragraph',
            'category' => $category->id,
            'thumbnail' => $file
        ];

        $this->actingAs($user)
            ->post(route('post.store'), $post)
            ->assertStatus(302)
            ->assertRedirect(route('dashboard'));
    }

    public function test_unauthenticated_user_can_not_see_edit_post_page()
    {
        User::factory()->create();
        Category::factory(3)->create();
        $post = Post::factory()->create();

        $this->get(route('post.edit', $post))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_see_edit_post_page()
    {
        $user = User::factory()->create();
        Category::factory(3)->create();
        $post = Post::factory()->create();

        $this->actingAs($user)
            ->get(route('post.edit', $post))
            ->assertStatus(200)
            ->assertSee($post->title, false);
    }

    public function test_user_can_edit_post()
    {
        Storage::fake('thumbnails');

        $user = User::factory()->create();
        $category = Category::factory(3)->create();
        
        $oldPost = Post::factory()->create();
        $file = UploadedFile::fake()->image('thumbnail.jpg');

        $newPost = [
            'title' => 'A random title',
            'body' => 'A random paragraph',
            'category' => $category[1]->id,
            'thumbnail' => $file
        ];

        $this->actingAs($user)
            ->put(route('post.update', $oldPost), $newPost)
            ->assertStatus(302)
            ->assertRedirect(route('dashboard'));
    }

    public function test_user_can_delete_post()
    {
        $user = User::factory()->create();
        
        Category::factory(3)->create();
        
        $post = Post::factory()->create();

        $this->actingAs($user)
            ->delete(route('post.destroy', $post))
            ->assertStatus(302)
            ->assertRedirect(route('dashboard'));
    }
}
