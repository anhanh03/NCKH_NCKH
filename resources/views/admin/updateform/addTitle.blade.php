@extends('admin.layout.app')

@section('content')



    <div class="container">
        <div class="row">
            <div class="col-1 col-sm-4 ">
               
            </div>
            <div class="col-10 col-sm-4 mt-5 text-center">
                <form action="" class="shadow p-3 mb-5 bg-body-tertiary rounded">
                    <h2>Form Title</h2>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="TopicName">
                      </div>
                      <div class="mb-3">
                        
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Decription">
                      </div>
                      
                      <button type="submit" class="btn btn-primary">Add</button>
                </form>
                
            </div>
            <div class="col-1 col-sm-4 "></div>
        </div>
    </div>
   
@endsection