<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $limit = 4;
        $posts = Post::with('category')->paginate($limit);
        return view('post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('post.add', ['is_edit' => false, 'categories' => $categories]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Tạo tên ảnh ngẫu nhiên
            $imageName = time() . '_' . $image->getClientOriginalName();

            $path = $image->move(public_path('storage/photos/19/post'), $imageName);

        }
        $create = Post::create([
            'title' => ($request->title),
            'image' => $imageName,
            'content' => ($request->link),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'status' => $request->status,
            'category_id' => $request->category

        ]);

        if ($create) {
            flash()->success("Thêm tin tức thành công");
            return redirect()->route('post.index');

        } else {
            flash()->error("Thêm tin tức thất bại");

            return redirect()->route('post.index');
        }



    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function uploadImage(Request $request)
    {

    }
}
