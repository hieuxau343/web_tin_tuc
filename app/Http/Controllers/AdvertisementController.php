<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $limit = 4;

        $ad = Advertisement::paginate($limit);
        return view('advertisement.index', ['advers' => $ad]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('advertisement.add', ['is_edit' => false]);
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
            // Di chuyển ảnh vào thư mục 'images' trong public
            $image->move(public_path('images'), $imageName);

        }


        // Tạo mới quảng cáo
        Advertisement::create([
            'title' => strip_tags($request->title),
            'image' => $imageName,  // Đảm bảo giá trị này hợp lệ
            'link' => strip_tags($request->link),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'status' => $request->status
        ]);

        // Sau khi lưu thành công, chuyển hướng về danh sách quảng cáo
        return redirect()->route('advertisement.index');
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
        $adv = Advertisement::find($id);

        return view('advertisement.add', ['data' => $adv, 'is_edit' => true]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $adv = Advertisement::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Tạo tên ảnh ngẫu nhiên
            $imageName = time() . '_' . $image->getClientOriginalName();
            // Di chuyển ảnh vào thư mục 'images' trong public
            $image->move(public_path('images'), $imageName);

        } else {
            $imageName = $adv->image;
        }


        $isUpdated = $adv->update([
            'title' => $request->title,
            'image' => $imageName,
            'link' => $request->link,
            'updated_at' => \Carbon\Carbon::now(),
            'status' => $request->status
        ]);
        if ($isUpdated) {
            flash()->success('Cập nhật thành công');
            return redirect()->route('advertisement.index');
        } else
            flash()->error("Cập nhật thất bại");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = Advertisement::destroy($id);
        if ($deleted) {
            flash()->success("Xóa thành công");
        } else {
            flash()->error("Xóa thất bại");
        }
    }
}
