@extends('layouts.adminLayout')
@section('title', 'View comments')

@section('main-content')

    <div class="content-wrapper">
        <div class="content-header ">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        <h1 class="m-0">View comments</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">View comments</li>
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
                                <th>Book Title</th>
                                <th>Name</th>
                                <th>Comment</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        @forelse ($comments as $comment => $val)
                            <tbody>
                                <tr>
                                    <td>{{ ++$comment }}</td>
                                    <td>{{ $val->title }}</td>
                                    <td>{{ $val->name }}</td>
                                    <td>
                                        {{ $str = $val['comment'] }}
                                        @if (strlen($str) > 50)
                                            {{ $str = substr($str, 0, 50) . '...' }}
                                            {{ $str }}
                                        @endif
                                    </td>
                                    <td>{{ $val->updated_at }}</td>
                                    <td>
                                        <form action="/admin/comments/{{ $val->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('are you sure?')" type="submit"
                                                class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        @empty
                        @endforelse
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
