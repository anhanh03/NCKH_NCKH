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
            <h1>Document</h1>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên Tài liệu</th>
                        <th scope="col">Tác giả</th>
                        <th scope="col">Ngày đăng</th>
                        <th scope="col">Setting</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($docs as $doc)
                    <tr>
                        <th scope="row">{{ $doc->ID }}</th>
                        <td>{{ $doc->Document_Name }}</td>
                        <td>{{ $doc->Author }}</td>
                        <td>{{ $doc->create_date }}</td>
                        <td>
                            <a href="{{ route('dpDocumentUpdate', ['id' => $doc->ID]) }}"><button type="button" class="btn btn-info">Update</button></a>
                            &ensp;&ensp;
                            <a href="{{ route('deleteDocument', ['id' => $doc->ID]) }}"><button type="button" class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
