@extends('layouts.app')
@section('content')
<section class="header-descriptin329" >
    <div class="container">
        <h3>Document</h3>
        <ol class="breadcrumb breadcrumb839">
            <li><a href="#">Home</a></li>
            <li><a href="#">Document</a></li>
            <li class="active">title</li>
        </ol>
    </div>
</section>

<section class="main-content920">
    <div class="container">
        
        <div class="row" >
            <div class="col-md-3" style="overflow: auto; height: 600px; margin-top: 80px">
                    <h3 class="fw-bold" style="color: blue"><ins>Information</ins></h3>
                    <b >Tài liệu abc(full)</b>
                    <table class="table">
                        <tr>
                            <td>
                                <div class="row" style="margin: 10px 0px">
                                    <div class="col-md-12" >
                                        <i class="fa fa-folder" aria-hidden="true" style="margin: 10px 0px">Sourse</i><br>
                                        <a href="#">Tên Sourse</a>
                                    </div>
                                </div>
                                <div class="row" style="margin: 10px 0px">
                                    <div class="col-md-12" >
                                        <i class="fa fa-university" aria-hidden="true">University</i><br>
                                        <a href="#">Tên Trường đại học</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Academic year: <small>2023-2024</small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Upload by: 
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="left-user12923 left-user12923-repeat">
                                            <a href="#"><img src="img/images.png" alt="image"></a><a href="#">Tên người đăng</a>
                                        </div>
                                    </div>
                                </div>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Comment:
                                <div class="row" style="margin: 10px 0">
                                    <div class="row">
                                        <div class="col-md-12" style="background: white">
                                            <div class="left-user12923 left-user12923-repeat">
                                                <a href="#"><img src="img/images.png" alt="image"></a><a href="#">Tên người cmt</a><br>
                                                <ul >
                                                    akjsdhakjs
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="write-cmt">
                                    <form action="">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="" id="" placeholder="Viết đánh giá">
                                            </div>
                                            <div class="col-md-12 text-right" style="margin: 10px 0">
                                                <input class="btn btn-default" type="submit" value="Submit">
                                            </div>
                                                
                                            
                                        </div>
                                        
                                        
                                    </form>
                                    
                                </div>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>Gợi ý:
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul>
                                            <li>
                                                <a href="#"><b>Các tài liệu liên quan</b></a>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </td>
                        </tr>
                    </table>
               
            </div>
            <div class="col-md-6">
                {{-- <h3 class="fw-bold">Tài liệu</h3> --}}
                <div class="row" style="margin: 20px 0;">
                    <div class="col-md-12" style="">
                        <ul style="float: left;">
                            <button type="button" class="btn btn-success" style="margin: 0 8px;"><i class="fa fa-download" aria-hidden="true" ></i>Download</button>
                            <a href="" style="margin: 0 8px;"><i class="fa fa-thumbs-up" aria-hidden="true"></i>Like</a>
                            <a href="" style="margin: 0 8px;"><i class="fa fa-save" aria-hidden="true"></i>Save</a>
                            <a href="" style="margin: 0 8px;"><i class="fa fa-share" aria-hidden="true"></i>Share</a>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" style="overflow: auto; height: 600px;" >
                        <table class="table">
                            <tr >
                                <div class="col-md-12">
                                    <img src="img/images.png" alt="image" style="width: 100%;">
                                </div>
                                <div class="col-md-12">
                                    <img src="img/images.png" alt="image" style="width: 100%;">
                                </div>
                                   
                            </tr>
                            
                    </table>
                    </div>
                </div>
            </div>
            
            @include('layouts.sidebar')
        </div>
       
    </div>
</section>
@endsection