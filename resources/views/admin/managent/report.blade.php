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
                <h1>Báo cáo</h1>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Người dùng</th>
                            <th scope="col">Bài đăng hoặc tài liệu</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Setting</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th >1</th>
                            <td><a href="#">Dẫn đến trang người dùng</a></td>
                            <td><a href="#">Title dẫn đến bài đăng hoặc báo cáo</a></td>
                            <td>Vi phạm bản quyền</td>
                            <td>00:00 00-00-0000</td>
                            <td>
                                <a href="#"><button type="button"
                                        class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                        {{-- @foreach ($post as $item)
                            <tr>
                                <th scope="row">{{ $item->ID }}</th>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->create_date }}</td>
                                <td>
                                    <a href="{{ route('dpPostUpdate', ['id' => $item->ID]) }}">
                                        <button type="button" class="btn btn-info">Update</button>
                                    </a>
                                    &ensp;&ensp;
                                    <a href="{{ route('deletePost', ['id' => $item->ID]) }}"><button type="button"
                                            class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
