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

    <section class="header-descriptin329">
        <div class="container">
            <h3>Tài liệu</h3>
            <ol class="breadcrumb breadcrumb839">
                <li><a href="{{ Route('home') }}">Trang chủ</a></li>
                <li><a href="{{ Route('homeD') }}">Tài liệu</a></li>
                <li class="active">title</li>
            </ol>
        </div>
    </section>

    <section class="main-content920">
        <div class="container">

            <div class="row">
                <div class="col-md-3" style="overflow: auto; height: 600px; margin-top: 80px">
                    <h3 class="fw-bold" style="color: blue"><b>Information</b></h3>
                    <b>{{ $document->Document_Name }}</b>
                    <table class="table">
                        <tr>
                            <td>
                                <div class="row" style="margin: 10px 0px">
                                    <div class="col-md-12">
                                        <i class="fa fa-folder" aria-hidden="true" style="margin: 10px 0px"> Tác Giả</i><br>
                                        <a href="#">{{ $document->Author }}</a>
                                    </div>
                                </div>
                                <div class="row" style="margin: 10px 0px">
                                    <div class="col-md-12">
                                        <i class="fa fa-university" aria-hidden="true"> Mô tả</i><br>
                                        <a href="#">{{ $document->Description }}</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Năm học: <small>2023-2024</small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Đăng lên bởi:
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="left-user12923 left-user12923-repeat">
                                            <a href="#"><img src="img/images.png" alt="image"></a><b><a
                                                    href="#" style="padding-left: 5px; ">
                                                    {{ $document->uploaded_by }} </a></b>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Bình luận:
                                @foreach ($comment as $comment)
                                    <div class="row" style="margin: 10px 0">
                                        <div class="row">
                                            <div class="col-md-12" style="background: white">
                                                <div class="left-user12923 left-user12923-repeat">
                                                    {{-- Tên người comment --}}
                                                    <a href="#"><img src="img/images.png" alt="image"></a><a
                                                        style="padding-left: 5px; "
                                                        href="#">{{ $comment->user_name }}</a><br>
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
                                                <input type="hidden" name="user_id" value="{{ session('username') }}">
                                                <input type="hidden" name="post_id" value="">
                                                <input type="hidden" name="document_id" value="{{ $document->ID }}">
                                                <input type="text" class="form-control" name="comment" id="comment"
                                                    placeholder="Viết đánh giá">
                                            </div>
                                            <div class="col-md-12 text-right" style="margin: 10px 0">
                                                <input class="btn btn-default" type="submit" value="Submit">
                                            </div>


                                        </div>


                                    </form>

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
                                {{-- Check nút dowload --}}
                                {{-- <a type="button" href="{{ $document->Storage_Path }}" class="btn btn-success"
                                    style="margin: 0 8px;">
                                    <i class="fa fa-download" aria-hidden="true"></i> Download
                                </a> --}}

                                @if ($remaining_downloads == 1)
                                    <a type="button" href="{{ route('Dowload.Document', ['id' => $document->ID]) }}"
                                        class="btn btn-primary" style="margin: 0 8px;">
                                        <i class="fa fa-download" aria-hidden="true"></i> Tải về
                                    </a>
                                @else
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal">
                                        <i class="fa fa-download" aria-hidden="true"></i> Tải về
                                    </button>
                                @endif

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Hãy tạo bài đăng hoặc đăng thêm tài liệu để có thể tải!
                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{ Route('displayAddPost') }}"><button type="button"
                                                        class="btn btn-warning">Tạo bài đăng</button></a>
                                                <a href="{{ Route('showCreateDocument') }}"><button type="button"
                                                        class="btn btn-info">Thêm tài liệu</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <a href="#" style="margin: 0 8px;"><i class="fa fa-thumbs-up"
                                        aria-hidden="true"></i>Thích</a>
                                <a href="#" style="margin: 0 8px;"><i class="fa fa-save"
                                        aria-hidden="true"></i>Lưu</a>
                                <!-- Nút chia sẻ -->
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}"
                                    style="margin: 0 8px;" target="_blank">
                                    <i class="fa fa-facebook" aria-hidden="true"></i> Chia sẻ Facebook
                                </a>

                                <!-- Nút sao chép liên kết -->
                                <a href="javascript:void(0)" onclick="copyLink()" style="margin: 0 8px;">
                                    <i class="fa fa-copy" aria-hidden="true"></i> Sao chép link
                                </a>
                                
                                <script>
                                function copyLink() {
                                    var url = window.location.href; // Lấy đường dẫn hiện tại của trang
                                    navigator.clipboard.writeText(url); // Sao chép liên kết vào clipboard
                                    alert("Đã sao chép liên kết!");
                                }
                                </script>
                                


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
                                        var options = {
                                            arrayBuffer: arrayBuffer
                                        };

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

                    <div class="row">
                        <div class="col-md-12">
                            <ul>

                                @if ($relatedDocuments->isEmpty())
                                    <div class="alert alert-info" role="alert">
                                        <h5 class="alert-heading">Chưa có tài liệu liên quan</h5>
                                    </div>
                                @else
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Các tài liệu liên quan</h5>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            @foreach ($relatedDocuments as $relatedDocument)
                                                <li class="list-group-item">
                                                    <a href="{{ route('documents.show', $relatedDocument->ID) }}">
                                                        {{ $relatedDocument->Document_Name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


                            </ul>
                        </div>
                    </div>


                </div>

                @include('layouts.sidebar')
            </div>

        </div>
    </section>
@endsection
