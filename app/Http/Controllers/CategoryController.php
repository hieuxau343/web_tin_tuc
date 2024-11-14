<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Enums\CategoryStatus;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $limit = 4; // Số mục trên mỗi trang

        // Lấy các danh mục với phân trang từ model Category
        $categories = Category::paginate($limit);

        // Trả về view với các dữ liệu phân trang
        return view('category.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);



        return redirect()->route('category.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);


        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        // Trả về dữ liệu đã cập nhật
        return response()->json([
            'id' => $category->id,
            'name' => $category->name,
            'slug' => $category->slug,
            'updated_at' => $category->updated_at->format('Y-m-d H:i:s')
        ]);
    }

    /** 
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = Category::destroy($id);

        if ($deleted) {
            return response()->json(['success' => true, 'message' => 'Category deleted successfully.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Category deletion failed.'], 500);
        }
    }
}


