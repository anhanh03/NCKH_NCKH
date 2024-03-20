@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Kết quả tìm kiếm cho: "{{ $keyword }}"</h2>

    <div class="row">
        <div class="col-md-6">
            <h3>Tài liệu:</h3>
            <ul class="list-group">
                @foreach($documents as $document)
                    <li class="list-group-item">
                        <a href="{{ route('documents.show', $document->ID) }}">{{ $document->Document_Name }}</a>
                        <!-- Hiển thị các thông tin khác của tài liệu nếu cần -->
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-6">
            <h3>Bài viết:</h3>
            <ul class="list-group">
                @foreach($posts as $post)
                    <li class="list-group-item">
                        <a href="{{ route('posts.show', $post->ID) }}">{{ $post->title }}</a>
                        <!-- Hiển thị các thông tin khác của bài viết nếu cần -->
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
