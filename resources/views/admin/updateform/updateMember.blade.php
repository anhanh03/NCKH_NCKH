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
                <form action="{{ route('MemberUpdate') }}" class="shadow p-3 mb-5 bg-body-tertiary rounded">
                    <input type="hidden" name="id" value="{{ $id }}">
                    <h2>Form Member</h2>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="fullName" id="exampleInputEmail1" value="{{ $fullName }}">
                      </div>
                      <div class="mb-3">
                        
                        <input type="text" class="form-control" name="email" id="exampleInputPassword1" value="{{ $email }}">
                      </div>
                      
                      <button type="submit" class="btn btn-primary">Update</button>
                </form>
                
            </div>
            <div class="col-1 col-sm-4 "></div>
        </div>
    </div>
@endsection

    
