@extends('layouts.adminLayout')
@section('title', 'Upload book')

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
                <div class="bg-success text-center">
                    {{ session('status') }}
                </div>
                <!-- form start -->
                <form action="/admin/books" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Book Title</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter title name" name="title" value="{{ old('title') }}">
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
                                placeholder="Enter isbn number" name="isbn" value="{{ old('isbn') }}">
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
                                @forelse ($categories as $category)
                                    <option value="{{ $category['id'] }}">{{ $category['cat_name'] }}</option>
                                @empty
                                    Category isn't listed yet
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <select class="form-control" required name="author_id">
                                @forelse ($authors as $author)
                                    <option value="{{ $author['id'] }}">{{ $author['author_name'] }}</option>
                                @empty
                                    <option value="">Author isn't listed yet</option>
                                @endforelse
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
                        <button type="submit" class="btn btn-info" name="submit">Upload Books</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
