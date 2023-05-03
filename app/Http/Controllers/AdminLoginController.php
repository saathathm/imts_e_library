<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session()->has('admin_id')) {
            return redirect('/admin/home');
        }

        return view('admins.authentication.login');
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
            'email' => 'required|email|',
            'password' => 'required'
        ]);

        $admins = Admin::where('email', request('email'))->get();
        if (isset($admins[0])) {
            if (Crypt::decrypt($admins[0]->password) == $request->password) {
                $request->session()->put('admin_id', $admins[0]->id);
                $request->session()->put('admin_name', $admins[0]->name);
                return redirect('/admin/home');
            } else {
                return back()->with('h', 'Password is wrong');
            }
        } else {
            return redirect('/admin/login')->with('h', 'Email or Password is wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (session()->has('admin_id')) {
            session()->pull('admin_id');
            session()->pull('admin_name');
        }
        return redirect('/admin/login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!(session()->has('admin_id'))) {
            return redirect('/admin/login');
        }
        return view('admins.authentication.edit', ['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'opass' => 'required',
            'npass' => 'required|min:8'
        ]);

        $admins = Admin::find($id);
        if (Crypt::decrypt($admins->password) == $request->opass) {
            $admins->password = Crypt::encrypt($request->npass);
            $admins->update();
            return back()->with('h', 'Password is changed successfully!');
        } else {
            return back()->with('f', 'Old password is wrong!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
