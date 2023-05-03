<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session()->has('user_id')) {
            return redirect('/user/home');
        }

        return view('users.authentication.login');
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

        $users = User::where('email', request('email'))->get();
        if (isset($users[0])) {
            if (Crypt::decrypt($users[0]->password) == $request->password) {
                $request->session()->put('user_id', $users[0]->id);
                $request->session()->put('user_name', $users[0]->name);
                return redirect('/user/home');
            } else {
                return back()->with('h', 'Password is wrong');
            }
        } else {
            return redirect('/user/login')->with('h', 'Email or Password is wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (session()->has('user_id')) {
            session()->pull('user_id');
            session()->pull('user_name');
        }
        return redirect('/user/login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!(session()->has('user_id'))) {
            return redirect('/user/login');
        }
        return view('users.authentication.edit', ['id' => $id]);
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

        $users = User::find($id);
        if (Crypt::decrypt($users->password) == $request->opass) {
            $users->password = Crypt::encrypt($request->npass);
            $users->update();
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
