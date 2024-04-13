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
    <section class="main-content920">
        <div class="container">
            <div class="row mt-5 pt-5">
                <div class="col-sm-1"></div>
                <div class="col-12 col-sm-10">
                    <div id="titleupdate">
                        <h1 class="fw-bold text-center" id="title">Thông tin người dùng</h1>
                    </div>
                    <div class="row ">
                        <div class="col-12 col-sm-3 border-end  m-0 p-0">
                            <div class="list-group p-0 m-0 ">
                                <button type="button" id="btn-inforuser" onclick="return onclickinfor()"
                                    class="list-group-item list-group-item-action border-0 ms-0 " style="text-align: center">Thông tin</button>
                                <button type="button" id="btn-updateuser" onclick="return onclickupdate()"
                                    class=" list-group-item list-group-item-action border-0" style="text-align: center">Chỉnh sửa</button>
                                <a href="{{ route('displayUpdatePass') }}"
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
                                        <th>Họ tên: </th>
                                        <td>{{ $full_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Giới tính: </th>
                                        <td>{{ $sex }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email: </th>
                                        <td>{{ $email }}</td>
                                    </tr>
                                    {{-- <tr>
                                        <th>Phone: </th>
                                        <td>{{ $phone }}</td>
                                    </tr> --}}
                                    <tr>
                                        <th>Địa chỉ: </th>
                                        <td>{{ $address }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="updateuser" id="updateuser">
                                <form action="{{ route('updateInforUser') }}" method="get">
                                    <table class="table">

                                        <tr>
                                            <th><label for="Fullname">Họ tên:</label></th>
                                            <td><input type="text" class="input-field" value="{{ $full_name }}"
                                                    name="Fullname" id="username" placeholder="{{ $full_name }}"></td>
                                        </tr>
                                        <tr>
                                            <th><label for="gender">Giới tính:</label></th>
                                            <td>
                                                <input type="radio" name="Sex" value="nam" id="gender-male">
                                                <label for="gender-male">Nam</label>
                                                <input type="radio" name="Sex" value="nu" id="gender-female">
                                                <label for="gender-female">Nữ</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label for="email">Email:</label></th>
                                            <td><input type="email" name="Email" id="email"
                                                    value="{{ $email }}" placeholder="{{ $email }}"
                                                    class="input-field"></td>
                                        </tr>
                                        {{-- <tr>
                                            <th><label for="phone">Phone:</label></th>
                                            <td><input type="text" name="Phone" id="phone" value="phone"
                                                    placeholder="Số điện thoại" class="input-field"></td>
                                        </tr> --}}
                                        <tr>
                                            <th><label for="address">Địa chỉ:</label></th>
                                            <td><input type="text" name="Address" id="address"
                                                    value="{{ $address }}" placeholder="{{ $address }}"
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
        </div>
    </section>

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
@endsection
