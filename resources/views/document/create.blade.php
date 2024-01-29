

@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Tải lên tài liệu</h2>

    <form action="/documents" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="document_file">Chọn tệp tin:</label>
            <input type="file" class="form" id="document_file" name="document_file">
        </div>

        <div class="form-group">
            <label for="Document_Name">Tên tài liệu:</label>
            <input type="text" class="form-control" id="Document_Name" name="Document_Name">
        </div>

        <div class="form-group">
            <label for="Description">Mô tả:</label>
            <textarea class="form-control" id="Description" name="Description"></textarea>
        </div>

        <div class="form-group">
            <label for="Author">Tác giả:</label>
            <input type="text" class="form-control" id="Author" name="Author">
        </div>

        <button type="submit" class="btn btn-primary">Tải lên</button>
    </form>
</div>

@endsection