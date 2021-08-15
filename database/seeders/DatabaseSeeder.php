<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategorySeeder::class);
        Post::factory(30)->create();
        $this->call(TagSeeder::class);
    }
}
