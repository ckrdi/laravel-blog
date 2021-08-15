<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::factory()->create([ 'name' => 'HTML' ]);
        Tag::factory()->create([ 'name' => 'CSS' ]);
        Tag::factory()->create([ 'name' => 'PHP' ]);
        Tag::factory()->create([ 'name' => 'Javascript' ]);
        Tag::factory()->create([ 'name' => 'Arsenal' ]);
        Tag::factory()->create([ 'name' => 'Liverpool' ]);
        Tag::factory()->create([ 'name' => 'Chelsea' ]);
        Tag::factory()->create([ 'name' => 'Man Utd' ]);
        Tag::factory()->create([ 'name' => 'Health' ]);
        Tag::factory()->create([ 'name' => 'Money' ]);
        Tag::factory()->create([ 'name' => 'Career' ]);
        Tag::factory()->create([ 'name' => 'Business' ]);

        foreach (Tag::all() as $tag) {
            $posts = \App\Models\Post::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $tag->posts()->attach($posts);
        }
    }
}
