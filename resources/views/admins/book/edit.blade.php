@extends('layouts.adminLayout')
@section('title', 'Edit books')

@section('main-content')

    <div class="content-wrapper">
        <div class="content-header ">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        <h1 class="m-0">Upload Books</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">Upload</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">

            <!-- general form elements -->
            <div class="card elevation-2">

                <!-- form start -->
                <form action="/admin/books/{{ $books->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Book Title</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter title name" name="title" value="{{ $books->title }}">
                            <div>
                                <span class="d-flex" style="color: red;">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ISBN</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter isbn number" name="isbn" value="{{ $books->isbn }}">
                            <div>
                                <span class="d-flex" style="color: red;">
                                    @error('isbn')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" required name="cat_id">
                                @foreach ($categories as $category)
                                    <option {{ $books->cat_id == $category->id ? 'selected' : '' }}
                                        value=" {{ $category->id }} "> {{ $category->cat_name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <select class="form-control" required name="author_id">
                                @foreach ($authors as $author)
                                    <option {{ $books->author_id == $author->id ? 'selected' : '' }}
                                        value=" {{ $author->id }} "> {{ $author->author_name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Upload File</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="file">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div style="position: absolute; bottom:-22px">
                                    <span class="d-flex" style="color: red;">
                                        @error('file')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning" name="submit">Update Book</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
