@extends('layouts.app')
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
        {{-- // --}}
        <div class="row">
            
            <h3>Bấm vào nút sau để tải xuống tài liệu</h1>
            <h6>Bạn chỉ có thể tải bây giờ nếu thoát ra sẽ không tải được tài liệu nữa!</h3>
            <a type="button" href="{{ $document->Storage_Path }}" class="btn btn-success" style="margin: 0 8px;">
                <i class="fa fa-download" aria-hidden="true"></i> Tải xuống
            </a>
        </div>
    </div>


    @endsection
