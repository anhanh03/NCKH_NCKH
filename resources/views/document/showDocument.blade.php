@extends('layouts.app')
@section('content')

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
                    <h3 class="fw-bold" style="color: blue"><b>Information</b></h3>
                    <b >{{ $document->Document_Name}}</b>
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
                                            <a href="#"><img src="img/images.png" alt="image"></a><b><a href="#" style="padding-left: 5px; "> {{ $document ->uploaded_by }} </a></b>
                                        </div>
                                    </div>
                                </div>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Comment:
                                @foreach ($comment as $comment)                                   
                                <div class="row" style="margin: 10px 0">
                                    <div class="row">
                                        <div class="col-md-12" style="background: white">
                                            <div class="left-user12923 left-user12923-repeat">
                                                {{-- Tên người comment --}}
                                                <a href="#"><img src="img/images.png" alt="image"></a><a style="padding-left: 5px; " href="#">{{ $comment->user_name }}</a><br> 
                                                <ul>
                                                    {{ $comment->Content }}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @endforeach
                                <div class="write-cmt">
                                    <form action="{{ route('upcomment') }}">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="hidden" name="user_id" value="{{ $document->id_user }}">
                                                <input type="hidden" name="post_id" value="">
                                                <input type="hidden" name="document_id" value="{{ $document->ID }}">
                                                <input type="text" class="form-control" name="comment" id="comment" placeholder="Viết đánh giá">
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
                            <a type="button" href="{{ $document->Storage_Path }}" class="btn btn-success" style="margin: 0 8px;"><i class="fa fa-download" aria-hidden="true" ></i>Download</a>
                            <a href="" style="margin: 0 8px;"><i class="fa fa-thumbs-up" aria-hidden="true"></i>Like</a>
                            <a href="" style="margin: 0 8px;"><i class="fa fa-save" aria-hidden="true"></i>Save</a>
                            <a href="" style="margin: 0 8px;"><i class="fa fa-share" aria-hidden="true"></i>Share</a>
                        </ul>
                    </div>
                </div>

                {{-- Hiển thị view --}}
                <div class="row">
                    @if ($document->Document_Type === 'pdf')
                        <iframe src="{{ $document->Storage_Path }}" width="100%" height="600px"></iframe>
                    @elseif ($document->Document_Type === 'docx')
                        <iframe id="docxIframe" width="100%" height="600px"></iframe>
                        <script src="{{ asset('js/mammoth.browser.min.js') }}"></script>
                        <script>
                            var xhr = new XMLHttpRequest();
                            xhr.open("GET", "{{ $document->Storage_Path }}", true);
                            xhr.responseType = "arraybuffer";
                            xhr.onload = function(e) {
                                var arrayBufferView = new Uint8Array(this.response);
                                var docxFile = new Blob([arrayBufferView], {
                                    type: "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                });
                
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    var arrayBuffer = e.target.result;
                                    var options = { arrayBuffer: arrayBuffer };
                
                                    var result = Mammoth.convertToHtml(options).then(function(result) {
                                        var html = result.value;
                                        var iframe = document.getElementById("docxIframe");
                                        iframe.contentDocument.open();
                                        iframe.contentDocument.write(html);
                                        iframe.contentDocument.close();
                                    });
                                };
                                reader.readAsArrayBuffer(docxFile);
                            };
                            xhr.send();
                        </script>
                    @endif
                </div>
            </div>
            
            @include('layouts.sidebar')
        </div>
       
    </div>
</section>
@endsection