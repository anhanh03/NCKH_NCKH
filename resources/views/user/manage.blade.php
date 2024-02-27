@extends('layouts.app')
@section('content')
    <script>
        function onclickinfor() {
            document.getElementById('updateuser').style.display = "none";
            // document.getElementById('title').style.display="none";
            document.getElementById('displayinfor').style.transition = "all 0.3s ease-in-out";
            document.getElementById('displayinfor').style.display = "block";
            // alert("alo")
        }

        function onclickupdate() {
            document.getElementById('displayinfor').style.display = "none";
            // document.getElementById('title').style.display="none";
            document.getElementById('updateuser').style.display = "block";
            document.getElementById('updateuser').style.transition = "all 0.3s ease-in-out";
            // alert("alo")

        }

        function onclickTitle() {
            document.getElementById('title').style.display = "block";
            document.getElementById('updateuser').style.display = "none";
            document.getElementById('displayinfor').style.display = "none";
        }
    </script>
    <section class="main-content920">
        <div class="container">
            <div class="row mt-5 pt-5">
                <div class="col-sm-1"></div>
                <div class="col-12 col-sm-10">
                    <div id="titleupdate">
                        <h1 class="fw-bold text-center" id="title">Kho quản lý</h1>
                    </div>
                    <div class="row ">
                        <div class="col-12 col-sm-3 border-end  m-0 p-0">
                            <div class="list-group p-0 m-0 ">
                                <button type="button" id="btn-inforuser" onclick="return onclickinfor()"
                                class="list-group-item list-group-item-action border-0 ms-0    ">Danh sách tệp đã tải lên</button>
                                <button type="button" id="btn-updateuser" onclick="return onclickupdate()"
                                class="list-group-item list-group-item-action border-0">Danh sách bài viết</button>
                                {{-- <a href="{{ route('logout') }}"  
                                    class="list-group-item list-group-item-action bg-warning border-0">
                                    Đăng xuất
                                </a> --}}
                            </div>
                        </div>
                        <div class="col-8 col-sm-9">
                            <div id="displayinfor" class="inforuser w-100">
                                <a href="{{route('showCreateDocument')}}"><button type="button" class="q-type238">Add<i class="fa fa-plus" aria-hidden="true"></i></button></a>
                                <table class="table">
                                    <tr>
                                        <th>Tên tài liệu</th>
                                        <th>Tác giả</th>
                                        <th >Thao tác</th>
                                    </tr>
                                    @foreach ($documents as $document)    
                                    
                                    <tr>
                                        <td>{{ $document->Document_Name }} ({{ $document->Document_Type }})</td>
                                        <td><i>{{ $document->Author}}</i></td>
                                        <td><a href="{{ route('editDocument', ['id' => $document->ID]) }}" class="btn btn-info" >Sửa</a> <a href="{{ route('deleteDocument', ['id' => $document->ID]) }}" class="btn btn-danger">Xóa</a></td>
                                        
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="updateuser" id="updateuser">
                                <a href="{{route('displayAddPost')}}"><button type="button" class="q-type238">Add<i class="fa fa-plus" aria-hidden="true"></i></button></a>
                                <form action="" method="get">
                                    <table class="table">
                                        <tr> 
                                            <th>Tên bài viết</th>
                                            <th>Ngày tạo</th>
                                            <th >Thao tác</th>
                                        </tr>
                                        @foreach ($posts as $post)    
                                        <tr>
                                            <td>{{ $post->title }} </td>
                                            <td><i style="max-width: 2ch;">{{ $post->create_date}}</i></td>
                                            <td><a href="{{ route('editDocument', ['id' => $post->ID]) }}" class="btn btn-info" >Sửa</a> <a  href="{{ route('deleteDocument', ['id' => $post->ID]) }}" class="btn btn-danger">Xóa</a></td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </section>
@endsection
