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
        return view('advertisement.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
        }

        Advertisement::create([
            'title' => $request->title,
            'image' => $imageName,
            'link' => $request->link,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'status' => $request->status

        ]);
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

        return response()->json($adv);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return '1';

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $imageName = $image->getClientOriginalName();
        //     $image->move(public_path('images'), $imageName);

        // }


        // $adv = Advertisement::find($id);
        // $adv->update([
        //     'title' => $request->title,
        //     // 'image' => $imageName,
        //     // 'link' => $request->link,
        //     // 'updated_at' => \Carbon\Carbon::now(),
        //     // 'status' => $request->status
        // ]);

        // return response()->json([
        //     'id' => $adv->id,
        //     'title' => $adv->title,
        //     'img' => asset('images/' . $adv->image),
        //     'link' => $adv->link,
        //     'updated_at' => $adv->updated_at,
        //     'status' => $adv->status
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
