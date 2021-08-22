<?php

namespace Tests\Feature;

use App\Models\Category;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthenticated_user_can_not_see_create_category_page()
    {
        $this->get(route('category.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_see_create_category_page()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('category.create'))
            ->assertStatus(200);
    }

    public function test_user_can_create_category()
    {
        $user = User::factory()->create();

        $category = [
            'name' => 'Test'
        ];

        $this->actingAs($user)
            ->post(route('category.store'), $category)
            ->assertStatus(302)
            ->assertRedirect(route('dashboard'));
    }

    public function test_unauthenticated_user_can_not_see_edit_category_page()
    {
        $category = Category::factory()->create();

        $this->get(route('category.edit', $category))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_see_edit_category_page()
    {
        $user = User::factory()->create();

        $category = Category::factory()->create();

        $this->actingAs($user)
            ->get(route('category.edit', $category))
            ->assertStatus(200)
            ->assertSee($category->name, false);
    }

    public function test_user_can_edit_category()
    {
        $user = User::factory()->create();

        $oldCategory = Category::factory()->create();

        $newCategory = [
            'name' => 'Test'
        ];

        $this->actingAs($user)
            ->put(route('category.update', $oldCategory), $newCategory)
            ->assertStatus(302)
            ->assertRedirect(route('dashboard'));
    }

    public function test_user_can_delete_category()
    {
        $user = User::factory()->create();

        $category = Category::factory()->create();

        $this->actingAs($user)
            ->delete(route('category.destroy', $category))
            ->assertStatus(302)
            ->assertRedirect(route('dashboard'));
    }
}
