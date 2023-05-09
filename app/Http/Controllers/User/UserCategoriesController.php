<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class UserCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('status', '1')->get();
        return view('users.category.index', ['categories' => $categories]);
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
        $categories = category::all();
        $catname = category::find($id);
        $catlist = Book::join('categories', 'categories.id', '=', 'books.category_id')
            ->join('authors', 'authors.id', '=', 'books.author_id')->where('category_id', $id)->get([
                'books.id', 'books.title',
                'books.isbn', 'books.file', 'categories.cat_name', 'authors.author_name'
            ]);
        return view('users.category.index', ['categories' => $categories, 'catlist' => $catlist, 'catname' => $catname]);

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
