<?php

namespace Tests\Unit;

use App\Models\Tag;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TagTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_tag_can_belong_to_a_post()
    {
        User::factory()->create();
        Category::factory(3)->create();
        $post = Post::factory()->create();
        $tag = Tag::factory()->create();

        $tag->posts()->attach($post);

        $this->assertDatabaseHas('post_tag', [
            'post_id' => $post->id,
            'tag_id' => $tag->id
        ]);
    }
}
