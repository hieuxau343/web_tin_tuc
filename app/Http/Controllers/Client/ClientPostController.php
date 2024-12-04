<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class ClientPostController extends Controller
{
    public function show(string $slug)
    {
        $categories = Category::withCount('posts')->get();
        $post = Post::where('slug', $slug)->firstOrFail();
        $shouldDisplayAd = rand(1, 100) <= 30; // Xác suất 30%
        $ads = $shouldDisplayAd ? Advertisement::inRandomOrder()->first() : null;

        return view('client.post.show', compact('categories', 'post'));

    }
}
