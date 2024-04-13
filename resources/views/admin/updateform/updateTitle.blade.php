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

            <div class="col-1 col-sm-4 ">

            </div>
            <div class="col-10 col-sm-4 mt-5 text-center">
                <form action="{{ route('UpdateTopic') }}" class="shadow p-3 mb-5 bg-body-tertiary rounded">
                    <h2>Form Chủ đề</h2>
                    <input type="hidden" name="id" value="{{ $id }}">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="exampleInputEmail1" name="topicName"
                            value="{{ $topic->TopicName }}">
                    </div>
                    <div class="mb-3">
                        <textarea type="text" class="form-control" id="exampleInputPassword1" name="description">{{ $topic->Description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </form>


            </div>
            <div class="col-1 col-sm-4 "></div>
        </div>
    </div>
@endsection
