<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!(session()->has('admin_id'))) {
            return redirect('/admin/login');
        }
        $categories = category::latest()->get();
        return view('admins.category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!(session()->has('admin_id'))) {
            return redirect('/admin/login');
        }

        return view('admins.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (request('cat_name')  == '') {
            $result = array("success" => false, "msg" => "Field can't be empty!");
        } else if (is_numeric($_POST['cat_name'])) {
            $result = array("success" => false, "msg" => "Name should be written in letters!");
        } else {

            $categories = new Category();
            $categories->cat_name = request('cat_name');
            $categories->status = request('status') ?? 0;
            $categories->save();
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
        $categories = Category::find($id);
        return view('admins.category.edit', ['categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (request('cat_name')  == '') {
            $result = array("success" => false, "msg" => "Field can't be empty!");
        } else if (is_numeric($_POST['cat_name'])) {
            $result = array("success" => false, "msg" => "Name should be written in letters!");
        } else {

            $categories = category::find($id);
            $categories->cat_name = request('cat_name') ?? 'nop';
            $categories->status = request('status') ?? 0;
            $categories->update();

            $result = array("success" => true, "msg" => "");
        }
        return json_encode($result);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = category::find($id);
        $categories->delete();
        return back();
    }
}
