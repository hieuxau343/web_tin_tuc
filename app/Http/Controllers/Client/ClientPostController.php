<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class ClientPostController extends Controller
{
    public function show(string $id)
    {
        return $id;

    }
}
