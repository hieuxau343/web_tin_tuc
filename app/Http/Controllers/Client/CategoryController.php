<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(string $slug)
    {
        $categories = Category::withCount('posts')->get();
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->orderBy('created_at', 'desc')->get();
        return view('client.category.index', compact('category', 'categories', 'posts'));

    }
}
