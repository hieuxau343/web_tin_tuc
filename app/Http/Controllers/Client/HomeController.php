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
        $categories = Category::get();
        $specials = Post::orderBy('created_at', 'desc')->get();
        return view('client.home.index', compact('categories', 'specials'));
    }
}
