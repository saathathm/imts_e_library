<?php

namespace App\Http\Controllers;

use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;

class AdminRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!(session()->has('admin_id'))) {
            return redirect('/admin/login');
        }
        $request = ModelsRequest::join('users', 'users.id', '=', 'requests.user_id')->get([
            'users.name', 'requests.user_id', 'requests.message', 'requests.updated_at', 'requests.id'
        ]);
        return view('admins.request.index', ['request' => $request]);
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
        //
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
        $request = ModelsRequest::find($id);
        $request->delete();
        return redirect('/admin/requests');
    }
}
