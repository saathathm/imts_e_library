@extends('layouts.adminLayout')
@section('title', 'Authors list')

@section('main-content')

    <div class="content-wrapper">
        <div class="content-header ">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        <h1 class="m-0">Author list</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">Author list</li>
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
                                <th>Author Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        @forelse ($authors as $author => $val)
                            <tbody>
                                <tr>
                                    <td>{{ ++$author }}</td>
                                    <td>{{ $val->author_name }}</td>
                                    <td class="text-center d-flex justify-content-center">
                                        <div>
                                            <a class="btn btn-sm btn-info mr-1"
                                                href="/admin/authors/{{ $val['id'] }}/edit">Edit</a>
                                        </div>
                                        <form action="/admin/authors/{{ $val['id'] }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Are you sure?')" type="submit"
                                                class="btn btn-sm btn-danger ml-2">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        @empty
                            <div class="bg-warning text-center text-bold" id="errorDiv">
                                No records are found!!
                            </div>
                        @endforelse
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

    </div>

    <script>
        function confirmDelete(id) {
            // Display a confirmation message
            var result = confirm("Are you sure to delete this Author?");

            // If the user clicks "OK", redirect to the delete.php page with the ID as a parameter
            if (result) {
                window.location.href = "delete_authors?id=" + id;
            }
        }
    </script>

@endsection
