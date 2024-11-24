<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;

use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $categories = Category::count();
        $posts = Post::count();
        $users = User::count();
        $advertisements = Advertisement::count();

        return view('dashboard.index', compact('categories', 'posts', 'users', 'advertisements'));
    }

}
