<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session()->has('user_id')) {
            return redirect('/user/home');
        }

        return view('users.authentication.register');
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed'
        ]);

        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Crypt::encrypt($request->password);

        $users->save();

        $user = User::where('email', request('email'))->get();

        if (Crypt::decrypt($user[0]->password) == $request->password) {
            $request->session()->put('user_id', $user[0]->id);
            $request->session()->put('user_name', $user[0]->name);
            return redirect('/user/home');
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
