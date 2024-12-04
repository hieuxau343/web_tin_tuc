<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // Lấy từ khóa tìm kiếm
        $categories = Category::withCount('posts')->get();

        $query = $request->input('query');

        // Tìm kiếm trong cột 'title'
        $results = [];
        if (!empty($query)) {
            $results = Post::where('title', 'like', '%' . $query . '%')->get();
        }

        // Trả về view kết quả tìm kiếm
        return view('search.results', compact('results', 'query','categories'));
    }
}


