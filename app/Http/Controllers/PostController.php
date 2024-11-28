<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cocur\Slugify\Slugify;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $limit = 4;
        $posts = Post::paginate($limit);
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

            // Lấy tên gốc của ảnh
            $imageName = $image->getClientOriginalName();

            $uploadPath = public_path('storage/photos/19/post');

            if (!file_exists($uploadPath . '/' . $imageName)) {
                $image->move($uploadPath, $imageName);

            }
        }
        $cleanTitle = strip_tags($request->title);

        $create = Post::create([
            'title' => ($request->title),
            'slug' => Str::slug($cleanTitle),
            'image' => $imageName,
            'content' => ($request->content),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'status' => $request->status,
            'category_id' => $request->category,
            'user_id' => $request->user_id

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
        $post = Post::find($id);
        $categories = Category::get();
        return view('post.add', ['is_edit' => true, 'data' => $post, 'categories' => $categories]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $cleanTitle = convert_vi_to_en($request->title);
        $slug = Str::slug($cleanTitle);


        $post = Post::findOrFail($id);
        $imageName = $post->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Lấy tên gốc của ảnh
            $imageName = $image->getClientOriginalName();

            $uploadPath = public_path('storage/photos/19/post');

            if (!file_exists($uploadPath . '/' . $imageName)) {
                $image->move($uploadPath, $imageName);

            }
        }







        $update = $post->update([
            'title' => ($request->title),
            'slug' => $slug,
            'image' => $imageName,
            'content' => ($request->content),
            'updated_at' => \Carbon\Carbon::now(),
            'status' => $request->status,
            'category_id' => $request->category,
            'user_id' => $request->user_id
        ]);
        if ($update) {
            flash()->success("Cập nhật tin tức thành công");
            return redirect()->route('post.index');

        } else {
            flash()->error("Cập nhật tin tức thất bại");

            return redirect()->route('post.index');
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = Post::destroy($id);

        if ($deleted) {
            return response()->json(['success' => true, 'message' => 'Xóa quảng cáo thành công.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Xóa quảng cáo thất bại.'], 500);
        }
    }

}
