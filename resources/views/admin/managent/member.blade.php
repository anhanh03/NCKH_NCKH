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
      <h1>Member</h1>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tên</th>
            <th scope="col">Email</th>
            <th scope="col">Ngày tham gia</th>
            <th scope="col">Setting</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <th scope="row">{{ $user->ID }}</th>
            <td>{{ $user->full_name }}</td>
            <td>{{ $user->Email }}</td>
            <td>{{ $user->joindate }}</td>
            <td style="align-items: center">
              <a href="{{ route('dpMemberUpdate', ['id'=>$user->ID]) }}"><button type="button" class="btn btn-info">Update</button></a>
              &ensp;&ensp;
              <a href="{{ route('deleteMember', ['id' => $user->ID]) }}"><button type="button" class="btn btn-danger">Delete</button></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
