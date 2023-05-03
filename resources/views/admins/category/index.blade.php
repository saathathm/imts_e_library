@extends('layouts.adminLayout')
@section('title', 'Category list')

@section('main-content')

    <div class="content-wrapper">
        <div class="content-header ">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category list</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">Category list</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        @forelse ($categories as $category => $val)
                            <tbody>
                                <tr>
                                    <td>{{ ++$category }}</td>
                                    <td>{{ $val['cat_name'] }}</td>
                                    <td>
                                        <div class="">
                                            @if ($val['status'] == 1)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Deactive</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="text-center d-flex justify-content-center">
                                        <div>
                                            <a class="btn btn-sm btn-info mr-1"
                                                href="/admin/categories/{{ $val['id'] }}/edit">Edit</a>
                                        </div>

                                        <form action="/admin/categories/{{ $val['id'] }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Are you sure?')" type="submit"
                                                class="btn btn-sm btn-danger ml-2">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        @empty
                        <div class="bg-warning text-center text-bold">No Records!!</div>
                        @endforelse

                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
