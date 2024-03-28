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
            <div class="col-1 col-sm-4 ">

            </div>
            <div class="col-10 col-sm-4 mt-5 text-center">
                <form action="" class="shadow p-3 mb-5 bg-body-tertiary rounded">
                    <h2>Form Post</h2>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="exampleInputPassword1" name="title" value="{{ $post->title }}">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" id="exampleInputPassword1" name="content">{{ $post->content }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                

            </div>
            <div class="col-1 col-sm-4 "></div>
        </div>
    </div>
@endsection
