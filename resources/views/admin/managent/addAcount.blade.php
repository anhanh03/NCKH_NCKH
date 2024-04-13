@extends('admin.layout.app')

@section('content')
   
    <div class="container">
        <div class="row">
     
            <div class="col-sm-4"></div>
            <div class="col-12 col-sm-4">
                
                <div class="row ">
                    <div class="col-12 border-end m-0 p-0 shadow p-3 mb-5 bg-body-tertiary rounded">
                        <form method="GET" action="{{ route('createAccount') }}">
                            @csrf
                            <div id="titleupdate">
                                <h1 class="fw-bold text-center" id="title">Thêm tài khoản Admin</h1>
                            </div>
                            <div class="mb-3">
                                <label for="Username" class="form-label">Họ tên</label>
                                <input type="Username" name="username" class="form-control" id="Username" aria-describedby="UsernameHelp">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Địa chỉ email</label>
                                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Thêm</button>  
                            </div>
                        </form>
                    </div>
                    

                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
        
    </div>
@endsection