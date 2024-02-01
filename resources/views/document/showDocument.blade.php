@extends('layouts.app')
@section('content')
<section class="header-descriptin329">
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
        <div class="row">
            <div class="col-md-9">
                <h3 class="fw-bold">Tài liệu</h3>
                <table class="table">
                        <tr >
                               <td><a href="#"> tên tệp (.zip,.exe,... click để download)</a></td> 
                        </tr>
                        <tr >
                                <td><a href="#"> tên tệp (.zip,.exe,... click để download)</a></td>
                        </tr>
                       
                </table>
                
            </div>
            
            @include('layouts.sidebar')
        </div>
       
    </div>
</section>
@endsection