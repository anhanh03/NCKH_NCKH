@extends('admin.layout.app')

@section('content')
<div class="row m-3">
    <div class="col-sm-3 col-6 ">
        <div class="row" style="height: 140px;">
            <div class="col-12 w-75 my-2 bg-success-subtle text-center shadow p-3 rounded">
                Số bài đăng
                <h3>100</h3>
            </div>
            
        </div>

    </div>
    <div class="col-sm-3 col-6 ">
        <div class="row" style="height: 140px;">
            <div class="col-12 w-75 my-2 bg-info-subtle text-center shadow p-3 rounded">
                Số thành viên
                <h3>100</h3>
            </div>
        </div>

    </div>
    <div class="col-sm-3 col-6 ">
        <div class="row" style="height: 140px;">
            <div class="col-12 w-75 my-2 bg-warning-subtle text-center shadow p-3 rounded">
                Tổng tài liệu
                <h3>100</h3>
            </div>
            
        </div>

    </div>
    <div class="col-sm-3 col-6 ">
        <div class="row" style="height: 140px;">
            <div class="col-12 w-75 my-2 bg-danger-subtle text-center shadow p-3 rounded">
                Số tương tác %
                <h3>100</h3>
            </div>
        </div>

    </div>
</div>
<div class="row mt-5">
    @if (isset($_GET['type']))
        @switch($_GET['type'])
            @case("post")
                @include('admin.managent.post')
                @break
            @case("member")
                @include('admin.managent.member')
                @break 
            @case("document")
                @include('admin.managent.document')
                @break
            @case("title")
                @include('admin.managent.title')
                @break 
        @endswitch
        
    @endif
</div>

@endsection