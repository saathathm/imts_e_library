@extends('layouts.adminLayout')
@section('title', 'View request')

@section('main-content')

    <div class="content-wrapper">
        <div class="content-header ">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        <h1 class="m-0">View requests</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">View requests</li>
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
                                <th>UserID</th>
                                <th>Name</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        @forelse ($request as $req)
                            <tbody>
                                <tr>
                                    <td>{{ $req->user_id }}</td>
                                    <td>{{ $req->name }}</td>
                                    <td>{{ $str = $req['message'] }}
                                        @if (strlen($str) > 50)
                                            {{ $str = substr($str, 0, 50) . '...' }}
                                            {{ $str }}
                                        @endif
                                    </td>
                                    <td>{{ $req->updated_at }}</td>
                                    <td>
                                        <form action="/admin/requests/{{ $req['id'] }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Are you sure?')" type="submit"
                                                class="btn btn-sm btn-danger ml-2">Delete</button>
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

    <script>
        function confirmDelete(id) {
            // Display a confirmation message
            var result = confirm("Hey, you're sure to delete this request?");

            // If the user clicks "OK", redirect to the delete.php page with the ID as a parameter
            if (result) {
                window.location.href = "delete_request?id=" + id;
            }
        }
    </script>

@endsection
