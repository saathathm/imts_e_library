@extends('layouts.userLayout')
@section('title', 'Comment here')

@section('main-content')

    <div class="content-wrapper">
        <div class="content-header ">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        <h3 class="m-0">Comment Section</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">Comment</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">

            @if (isset($books->title))
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <tbody style="background:#8aa9a3;">
                                <tr>
                                    <th>Book Name</th>
                                    <td>{{ $books->title }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif



            <br>
            <center>

                <!-- /input-group -->


                <form action="/user/comments" method="post">
                    @csrf
                    <div class="input-group input-group-sm" style="width:500px">
                        <input type="hidden" value="{{ $books->id }}" name="id">
                        <input type="text" name="comment" class="form-control" placeholder="Enter Your FeedBack"
                            style="border: 1px solid greenyellow;">
                        <span class="input-group-append">
                            <button type="submit" name="submit" class="btn btn-info btn-flat ml-2">Post</button>
                        </span>
                    </div>
                    <div style="position: absolute; left:50%; transform:translateX(25px)">
                        <span class="d-flex" style="color: red;">
                            @error('comment')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </form>

                <h4 style="margin-bottom: 5px; margin-top:25px">Comments</h4>
            </center>

            <hr>

            <div style="margin-top:8px;">
                @if (isset($allComments))
                    @forelse ($allComments as $clist)
                        <ul>
                            <li style="list-style: circle;">
                                <span style='font-size:13.5px; color:maroon'>{{ strtoupper($clist['name']) }} -</span>

                                <strong><span style='color:black;font-size:15px;'> {{ $clist['comment'] }} </span></strong>

                                <span style='font-size:13px; margin-left: 5px;'>{{ $clist['updated_at'] }}</span><br>

                                @if (session('user_id') == $clist->userid)
                                    <form action="/user/comments/{{ $clist->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-danger btn btn-sm" style="padding:0 3px"
                                            onclick="return confirm('are you sure?')">Delete</button>
                                    </form>
                                @endif


                            </li>
                        </ul>
                    @empty
                        <div class="bg-warning text-center text-bold">No one commented yet!!</div>
                    @endforelse

                @endif
            </div>
        </div>
    </div>

@endsection
