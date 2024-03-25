@extends('admin.layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Title &ensp;<a href="{{ route('manageAmin') }}">
                    <button type="button" class="btn btn-success">Add</button>
                </a></h1>
                
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Setting</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topic as $key => $topic)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $topic->TopicName }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($topic->Description, 31, $end = '...') }}</td>
                                <td>
                                    <a href="{{ route('manageAmin', ['id' => $topic->ID]) }}">
                                        <button type="button" class="btn btn-info">Update</button>
                                    </a>

                                    &ensp;&ensp;
                                    <a href="#">
                                        <button type="button" class="btn btn-danger">Delete</button>
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
