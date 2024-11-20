<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $limit = 4;
        $comments = Comment::paginate($limit);

        return view('comment.index', ['comments' => $comments]);
    }
}
