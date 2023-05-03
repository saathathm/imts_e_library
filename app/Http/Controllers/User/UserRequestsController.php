<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;

class UserRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!(session()->has('user_id'))) {
            return redirect('/user/login');
        }
        return view('users.request.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required'
        ]);

        $req = new ModelsRequest();
        $req->user_id = session('user_id');
        $req->message = $request->message;
        $req->save();
        return back()->with('status', 'Request Sent');
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
}
