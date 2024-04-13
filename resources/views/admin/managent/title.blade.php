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
                <h1>Chủ đề &ensp;<a href="{{ route('dpTitleAdd') }}">
                    <button type="button" class="btn btn-success">Add</button>
                </a></h1>
                
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topic as $key => $topic)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $topic->TopicName }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($topic->Description, 31, $end = '...') }}</td>
                                <td>
                                    <a href="{{ route('dpTitleUpdate', ['id' => $topic->ID]) }}">
                                        <button type="button" class="btn btn-info">Sửa</button>
                                    </a>
                                    &ensp;&ensp;
                                    <a href="{{ route('deleteTopic', ['id' => $topic->ID]) }}">
                                        <button type="button" class="btn btn-danger">Xóa</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
