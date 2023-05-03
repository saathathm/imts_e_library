@extends('layouts.userLayout')
@section('title', 'Search book')

@section('main-content')

    <div class="content-wrapper">
        <div class="content-header ">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        <h1 class="m-0">Search</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">Search</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <h3 class="text-center display-4 pt-3">Search Book here</h3>
                    <div class="row mt-4">
                        <div class="col-md-8 offset-md-2">
                            <form action="/user/books/" method="post">
                                @csrf
                                <div class="input-group">
                                    <input type="search" name="search" style="border-color:#a4fff1;"
                                        class="form-control form-control-md" placeholder="Enter something about book...">
                                    <div class="input-group-append">
                                        <button type="submit" name="submit" class="btn btn-md btn-info">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <div style="position: absolute; left:50%; transform:translateX(-50%)">
                                    <span class="d-flex" style="color: red;">
                                        @error('search')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            @if (isset($searches))

                <div class="container p-5">
                    <div class="card">
                        <div class="pl-4 bg-black">
                            <h4 class="card-title text-white"><b>
                                    @if ($count > 1)
                                        {{ $count }} Results
                                    @else
                                        {{ $count }} Result
                                    @endif
                                </b></h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead style="background:#8aa9a3;">
                                    <tr>
                                        <th>ISBN</th>
                                        <th>Book Name</th>
                                        <th>Author</th>
                                        <th>Category</th>
                                        <th>View</th>
                                        <th>Comment</th>
                                    </tr>
                                </thead>

                                @forelse ($searches as $search)
                                    <tbody>
                                        <tr>
                                            <td>{{ $search->isbn }}</td>
                                            <td>{{ $search->title }}</td>
                                            <td>{{ $search->author_name }}</td>
                                            <td>{{ $search->cat_name }}</td>
                                            <td><a class="btn btn-sm btn-primary" href="/uploads/{{ $search->file }}"
                                                    target="_blank">Open</a></td>
                                            <td><a class="btn btn-sm btn-primary"
                                                    href="/user/comments/{{ $search->id }}">Write here</a></td>
                                        </tr>
                                    </tbody>
                                @empty
                                <div class="bg-warning text-center text-bold">No Books are found!!</div>
                                @endforelse


                            </table>

                        </div>

                    </div>
                    <!-- /.card -->
            @endif

        </div>
    </div>
    </div>

@endsection
