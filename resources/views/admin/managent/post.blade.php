@extends('admin.layout.app')

@section('content')
    <div class="container">
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
        <div class="row">
            <div class="col-12">
                <h1>Bài đăng</h1>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Tác giả</th>
                            <th scope="col">Ngày đăng</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post as $item)
                            <tr>
                                <th scope="row">{{ $item->ID }}</th>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->create_date }}</td>
                                <td>
                                    <a href="{{ route('dpPostUpdate', ['id' => $item->ID]) }}">
                                        <button type="button" class="btn btn-info">Sửa</button>
                                    </a>
                                    &ensp;&ensp;
                                    <a href="{{ route('deletePost', ['id' => $item->ID]) }}"><button type="button"
                                            class="btn btn-danger">Xóa</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
