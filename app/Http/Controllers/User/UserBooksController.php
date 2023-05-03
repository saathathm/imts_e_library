<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class UserBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!(session()->has('user_id'))) {
            return redirect('/user/login');
        }
        $allBooks = Book::join('authors', 'authors.id', '=', 'books.author_id')->join('categories', 'categories.id', '=', 'books.category_id')
            ->get(['books.id', 'books.isbn', 'books.title', 'books.file', 'authors.author_name', 'categories.cat_name']);

        return view('users.book.index', ['allBooks' => $allBooks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!(session()->has('user_id'))) {
            return redirect('/user/login');
        }
        return view('users.book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);
        $search = $request->search;

        $searches = Book::join('authors', 'authors.id', '=', 'books.author_id')->join('categories', 'categories.id', '=', 'books.category_id')
            ->where('title', 'LIKE', "%$search%")->orWhere('categories.cat_name', 'LIKE', "%$search%")
            ->orWhere('authors.author_name', 'LIKE', "%$search%")->orWhere('isbn', 'LIKE', "%$search%")->get(['books.id', 'books.isbn', 'books.title', 'books.file', 'authors.author_name', 'categories.cat_name']);

        $count = count($searches);

        return view('users.book.create', ['searches' => $searches, 'count' => $count]);

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
