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
                            <th scope="col">Bài đăng</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                            <tr>
                                <th>{{ $report->id }}</th>
                                <td>{{ $report->User_ID }}</td>
                                <td><a href="{{ route('posts.show', ['id' => $report->Post_ID]) }}">{{ $report->Post_ID }}</a></td>
                                <td>{{ $report->Report_Content }}</td>
                                <td>{{ $report->Report_Time }}</td>
                                <td class="d-flex align-items-center">
                                    <form action="{{ route('manageReportDelete', $report->ID) }}" method="POST">
                                        @csrf    
                                        <button type="submit" class="btn btn-danger mr-2">Xóa</button>
                                    </form>
                                    <form action="{{ route('deletePost') }}" method="GET">
                                        @csrf    
                                        <input type="hidden" name="id" value="{{ $report->Post_ID }}">
                                        <button type="submit" class="btn btn-danger">Xóa bài</button>
                                    </form>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
