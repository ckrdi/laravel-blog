<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexPostsTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_posts_is_rendered()
    {
        $this->get('/')->assertStatus(200);
        $this->get('/')->assertSee('There is no post.', false);
    }

    public function test_index_posts_receives_data_correctly()
    {
        User::factory()->create();
        $post = Post::factory()->create();

        $this->get('/')->assertSee($post->title);
    }
}
