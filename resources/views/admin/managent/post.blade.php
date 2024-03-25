@extends('admin.layout.app')

@section('content')
    <div class="container">
        <div class="row">
            @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif
            <div class="col-12">
                <h1>Post</h1>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Tác giả</th>
                            <th scope="col">Ngày đăng</th>
                            <th scope="col">Setting</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($post as $key => $item)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->create_date }}</td>
                                <td>
                                    <a href="{{ route('manageAmin', ['id' => $item->id]) }}">
                                        <button type="button" class="btn btn-info">Update</button>
                                    </a>
                                    &ensp;&ensp;
                                    <a href="#"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
