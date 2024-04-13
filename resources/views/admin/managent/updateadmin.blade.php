@extends('admin.layout.app')

@section('content')
   


    
    <style>
        #displayinfor,
        #updateuser {
            display: none;
        }
    </style>
    <div class="container">
        <div class="row mt-5 pt-5">
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
            <div class="col-sm-1"></div>
            <div class="col-12 col-sm-10">
                <div id="titleupdate">
                    <h1 class="fw-bold text-center" id="title">Thông tin người dùng</h1>
                </div>
                <div class="row ">
                    <div class="col-12 col-sm-3 border-end  m-0 p-0">
                        <div class="list-group p-0 m-0 ">
                            <button type="button" id="btn-inforuser" onclick="return onclickinfor()"
                                class="list-group-item list-group-item-action border-0 ms-0 ">Thông tin</button>
                            <button type="button" id="btn-updateuser" onclick="return onclickupdate()"
                                class=" list-group-item list-group-item-action border-0">Chỉnh sửa</button>
                            <a href="{{ route('displayUpdatePass', ['email' => session('email')]) }}"
                                class="list-group-item list-group-item-action border-0 ms-0 " style="font-weight: 0;">
                                Đổi mật khẩu
                            </a>

                            <a href="{{ route('logout') }}"
                                class="list-group-item list-group-item-action border-0 ms-0 " style="font-weight: 0;">
                                Đăng xuất
                            </a>
                        </div>
                    </div>
                    <div class="col-8 col-sm-9">
                        <div id="displayinfor" class="inforuser w-100">
                            <table class="table">
                                <tr>
                                    <th>Họ và tên: </th>
                                    <td>{{ session('full_name') }}</td>
                                </tr>
                                <tr>
                                    <th>Giới tính: </th>
                                    <td>{{ session('sex') }}</td>
                                </tr>
                                <tr>
                                    <th>Email: </th>
                                    <td>{{ session('email') }}</td>
                                </tr>
                                <tr>
                                    <th>Địa chỉ: </th>
                                    <td>{{ session('address') }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="updateuser" id="updateuser">
                            <form action="{{ route('updateInforUser') }}" method="get">
                                <table class="table">
                                    <tr>
                                        <th><label for="Fullname">Họ tên:</label></th>
                                        <td><input type="text" class="input-field" value="{{ session('full_name') }}"
                                                name="Fullname" id="username" placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <th><label for="gender">Giới tính:</label></th>
                                        <td>
                                            <input type="radio" name="Sex" value="nam" id="gender-male"
                                                {{ session('sex') === 'nam' ? 'checked' : '' }}>
                                            <label for="gender-male">Nam</label>
                                            <input type="radio" name="Sex" value="nu" id="gender-female"
                                                {{ session('sex') === 'nu' ? 'checked' : '' }}>
                                            <label for="gender-female">Nữ</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><label for="email">Email:</label></th>
                                        <td><input type="email" name="Email" id="email"
                                                value="{{ session('email') }}" placeholder="email" class="input-field">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><label for="address">Địa chỉ:</label></th>
                                        <td><input type="text" name="Address" id="address"
                                                value="{{ session('address') }}" placeholder="address"
                                                class="input-field"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td rowspan="2"><button type="submit" class="btn btn-primary"
                                                name="Update">Sửa</button></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
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
    </div>
@endsection