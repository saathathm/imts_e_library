<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdminRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session()->has('admin_id')) {
            return redirect('/admin/home');
        }

        return view('admins.authentication.register');
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
            'name' => 'required|regex:/[a-z]+$/i',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:8|confirmed'
        ]);

        $admins = new Admin();
        $admins->name = $request->name;
        $admins->email = $request->email;
        $admins->password = Crypt::encrypt($request->password);

        $admins->save();

        $admin = Admin::where('email', request('email'))->get();

        if (Crypt::decrypt($admin[0]->password) == $request->password) {
            $request->session()->put('admin_id', $admin[0]->id);
            $request->session()->put('admin_name', $admin[0]->name);
            return redirect('/admin/home');
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
}
