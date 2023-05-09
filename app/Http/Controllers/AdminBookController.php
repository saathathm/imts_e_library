<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::join('categories', 'categories.id', '=', 'books.category_id')
            ->join('authors', 'authors.id', '=', 'books.author_id')->get([
                'books.id', 'books.title',
                'books.isbn', 'books.file', 'categories.cat_name', 'authors.author_name'
            ]);

        return view('admins.book.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        $categories = Category::where('status', 1)->get();
        return view('admins.book.create', ['authors' => $authors, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|regex:/[a-z]+$/i',
            'isbn' => 'required|numeric',
            'file' => 'required|file|mimes:pdf,docx|max:5120'
        ]);

        $imageName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('uploads'), $imageName);

        $books = new Book();
        $books->title = request('title');
        $books->isbn = request('isbn');
        $books->category_id = request('cat_id');
        $books->author_id = request('author_id');
        $books->file = $imageName;
        $books->save();

        return back()->with('status', 'Book successfully uploaded');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $books = Book::find($id);
        $authors = Author::all();
        $categories = category::where('status', 1)->get();
        return view('admins.book.edit', ['books' => $books, 'authors' => $authors, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|regex:/[a-z]+$/i',
            'isbn' => 'required|numeric',
            'file' => 'file|mimes:pdf,docx|max:5120'
        ]);

        $books = Book::find($id);
        $books->title = request('title');
        $books->isbn = request('isbn');
        $books->category_id = request('cat_id');
        $books->author_id = request('author_id');

        if (request('file')) {
            $target_dir = "D:\Projects\Laravel\ELibrary\public\uploads/";
            $exist_file_dir = $target_dir . $books->file;
            if (file_exists($exist_file_dir)) {
                if (unlink($exist_file_dir)) {
                    $imageName = time() . '.' . $request->file->extension();
                    $request->file->move(public_path('uploads'), $imageName);
                    $books->file = $imageName;
                    $books->update();
                }
            }
        } else {
            $books->update();
        }
        return redirect('/admin/books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books = Book::find($id);
        $target_dir = "D:\Projects\Laravel\imtsProject\public\uploads/";
        $exist_file_dir = $target_dir . $books->file;
        if (file_exists($exist_file_dir)) {
            if (unlink($exist_file_dir)) {
                $books->delete();
            }
        }

        return back();
    }
}
