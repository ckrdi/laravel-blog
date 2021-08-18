<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Category;
use App\Models\Post;
class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'posts' => Post::with('user', 'category', 'tags')->latest('id')->simplePaginate(10),
            'categories' => Category::latest('id')->simplePaginate(5),
            'tags' => Tag::latest('id')->simplePaginate(5)
        ]);
    }
}
