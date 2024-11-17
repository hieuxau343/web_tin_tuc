<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $limit = 4;
        $accounts = Account::paginate($limit);
        return view('account.index', ['accounts' => $accounts]);
    }


    public function create()
    {
        return view('account.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Account::create([
            'fullname' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'role' => $request->role,
            'username' => $request->username,
            'password' => $request->password
        ]);

        return redirect()->route('account.index');
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
        $account = Account::find($id);

        return response()->json($account);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $account = Account::findOrFail($id);
        $account->update([
            'fullname' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'role' => $request->role
        ]);

        return response()->json([
            'id' => $account->id,
            'name' => $account->fullname,
            'phone' => $account->phone,
            'email' => $account->email,
            'gender' => $account->gender,
            'birthday' => $account->birthday,
            'role' => $account->role,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = Account::destroy($id);

        if ($deleted) {
            return response()->json(['success' => true, 'message' => 'Account deleted successfully.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Account deletion failed.'], 500);
        }
    }
}
