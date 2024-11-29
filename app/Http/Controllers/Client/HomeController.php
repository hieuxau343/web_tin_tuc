<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('posts')->get();
        $specials = Post::latest()->take(3)->get();
        $posts = Post::latest()->take(10)->get();

        return view('client.home.index', compact('categories', 'specials', 'posts'));
    }
}
