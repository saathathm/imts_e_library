<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!(session()->has('admin_id'))) {
            return redirect('/admin/login');
        }
        $comments = Comment::join('books', 'books.id', '=', 'comments.book_id')->join('users', 'users.id', '=', 'comments.user_id')->get([
            'books.title', 'users.name', 'comments.comment', 'comments.updated_at', 'comments.id'
        ]);
        return view('admins.comment.index', ['comments' => $comments]);
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
        $comments = Comment::find($id);
        $comments->delete();
        return redirect('/admin/comments');
    }
}
