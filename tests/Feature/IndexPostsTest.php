<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexPostsTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_posts_is_rendered_correctly_when_there_is_no_post()
    {
        $this->get(route('index'))->assertStatus(200);
        $this->get(route('index'))->assertSee('There is no post.', false);
    }

    public function test_index_posts_receives_data_correctly()
    {
        User::factory()->create();
        Category::factory(3)->create();
        $post = Post::factory()->create();

        $this->get(route('index'))
            ->assertSee($post->title, false)
            ->assertSee($post->category->name, false);
    }
}
