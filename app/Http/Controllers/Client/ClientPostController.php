<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class ClientPostController extends Controller
{
    public function show(string $slug)
    {
        $categories = Category::withCount('posts')->get();
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('client.post.show', compact('categories', 'post'));

    }
}
