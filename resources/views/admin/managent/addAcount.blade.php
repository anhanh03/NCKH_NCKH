@extends('admin.layout.app')

@section('content')
   
    <div class="container">
        <div class="row">
     
            <div class="col-sm-4"></div>
            <div class="col-12 col-sm-4">
                
                <div class="row ">
                    <div class="col-12 border-end  m-0 p-0 shadow p-3 mb-5 bg-body-tertiary rounded">
                        <form method="POST" action="">
                            <div id="titleupdate">
                                <h1 class="fw-bold text-center" id="title">Thêm tài khoản Admin</h1>
                                
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Email address</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Password</label>
                              <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <button type="button" class="btn btn-dark">Back</button>
                            </div>
                            
                          </form>
                    </div>

                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
        
    </div>
@endsection