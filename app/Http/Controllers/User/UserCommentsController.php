<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;

class UserCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'comment' => 'required'
        ]);

        $id = request('id');
        // $books = Book::find($id);
        $comments = new Comment();
        $comments->book_id = $id;
        $comments->user_id = session('user_id');
        $comments->comment = request('comment');
        $comments->save();

        return redirect('/user/comments/' . $id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $books = Book::find($id);

        $allComments = Comment::join('users', 'users.id', '=', 'comments.user_id')->where('book_id', $id)->orderBy('updated_at', 'desc')->get([
            'users.name', 'users.id as userid', 'comments.comment', 'comments.id', 'comments.updated_at'
        ]);
        return view('users.comment.show', ['books' => $books, 'allComments' => $allComments]);
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
        return back();
    }
}
