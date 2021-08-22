<?php

namespace Tests\Feature;

use App\Models\Tag;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TagDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthenticated_user_can_not_see_create_tag_page()
    {
        $this->get(route('tag.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_see_create_tag_page()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('tag.create'))
            ->assertStatus(200);
    }

    public function test_user_can_create_tag()
    {
        $user = User::factory()->create();

        $tag = [
            'name' => 'Test'
        ];

        $this->actingAs($user)
            ->post(route('tag.store'), $tag)
            ->assertStatus(302)
            ->assertRedirect(route('dashboard'));
    }

    public function test_unauthenticated_user_can_not_see_edit_tag_page()
    {
        $tag = Tag::factory()->create();

        $this->get(route('tag.edit', $tag))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_see_edit_tag_page()
    {
        $user = User::factory()->create();

        $tag = Tag::factory()->create();

        $this->actingAs($user)
            ->get(route('tag.edit', $tag))
            ->assertStatus(200)
            ->assertSee($tag->name, false);
    }

    public function test_user_can_edit_tag()
    {
        $user = User::factory()->create();

        $oldTag = Tag::factory()->create();

        $newTag = [
            'name' => 'Test'
        ];

        $this->actingAs($user)
            ->put(route('tag.update', $oldTag), $newTag)
            ->assertStatus(302)
            ->assertRedirect(route('dashboard'));
    }

    public function test_user_can_delete_tag()
    {
        $user = User::factory()->create();

        $tag = Tag::factory()->create();

        $this->actingAs($user)
            ->delete(route('tag.destroy', $tag))
            ->assertStatus(302)
            ->assertRedirect(route('dashboard'));
    }
}
