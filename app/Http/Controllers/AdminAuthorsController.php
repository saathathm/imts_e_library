<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AdminAuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!(session()->has('admin_id'))) {
            return redirect('/admin/login');
        }
        $authors = Author::latest()->get();
        return view('admins.author.index', ['authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!(session()->has('admin_id'))) {
            return redirect('/admin/login');
        }

        return view('admins.author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (request('author_name')  == '') {
            $result = array("success" => false, "msg" => "Field can't be empty!");
        } else if (is_numeric($_POST['author_name'])) {
            $result = array("success" => false, "msg" => "Name should be written in letters!");
        } else {

            $authors = new Author();
            $authors->author_name = request('author_name');
            $authors->save();
            $result = array("success" => true, "msg" => "");
        }

        return json_encode($result);
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
        if (!(session()->has('admin_id'))) {
            return redirect('/admin/login');
        }
        $authors = Author::find($id);
        return view('admins.author.edit', ['authors' => $authors]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (request('author_name')  == '') {
            $result = array("success" => false, "msg" => "Field can't be empty!");
        } else if (is_numeric($_POST['author_name'])) {
            $result = array("success" => false, "msg" => "Name should be written in letters!");
        } else {

            $authors = Author::find($id);
            $authors->author_name = request('author_name');
            $authors->update();
            $result = array("success" => true, "msg" => "");
        }

        return json_encode($result);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $authors = Author::find($id);
        $authors->delete();
        return back();
    }
}
