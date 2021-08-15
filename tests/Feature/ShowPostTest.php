<?php

namespace Tests\Feature;

use App\Models\Category;
use Tests\TestCase;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowPostTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_post_is_rendered_and_receives_data_correctly()
    {
        User::factory()->create();
        Category::factory(3)->create();
        $post = Post::factory()->create();
        $tag = Tag::factory()->create();
        $tag->posts()->attach($post);
        
        $this->get(route('show', [ 'post' => $post ]))
            ->assertStatus(200)
            ->assertSee($post->title, false)
            ->assertSee($post->category->name, false)
            ->assertSee($post->tags[0]->name, false);
    }
}
