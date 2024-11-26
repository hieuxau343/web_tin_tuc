<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $limit = 4;
        $users = User::paginate($limit);
        return view('user.index', ['users' => $users]);
    }


    public function create()
    {
        return view('user.add', ['is_edit' => false]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'fullname' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'role' => $request->role,
            'username' => $request->username,
            'password' => $request->password
        ]);

        return redirect()->route('user.index');
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
        $user = User::find($id);

        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'fullname' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'role' => $request->role
        ]);

        return response()->json([
            'id' => $user->id,
            'name' => $user->fullname,
            'phone' => $user->phone,
            'email' => $user->email,
            'gender' => $user->gender,
            'birthday' => $user->birthday,
            'role' => $user->role,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = user::destroy($id);

        if ($deleted) {
            return response()->json(['success' => true, 'message' => 'user deleted successfully.']);
        } else {
            return response()->json(['success' => false, 'message' => 'user deletion failed.'], 500);
        }
    }
}
