@extends('layouts.adminLayout')
@section('title', 'View User')

@section('main-content')
    <div class="content-wrapper">
        <div class="content-header ">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        <h1 class="m-0">View Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">View users</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead style="background:#8aa9a3;">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>User ID</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @forelse ($users as $user => $val)
                            <tbody>
                                <tr>
                                    <td>{{ ++$user }}</td>
                                    <td>{{ $val['name'] }}</td>
                                    <td class="pl-5">{{ $val['id'] }}</td>
                                    <td>{{ $val['email'] }}</td>
                                    <td>
                                        <form action="/admin/users/{{ $val['id'] }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Are you sure?')" type="submit"
                                                class="btn btn-sm btn-danger ml-2">Remove</button>
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
