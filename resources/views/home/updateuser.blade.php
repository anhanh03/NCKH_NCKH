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
                        <h1 class="fw-bold text-center" id="title">Thông tin người dùng</h1>
                    </div>
                    <div class="row ">
                        <div class="col-12 col-sm-3 border-end  m-0 p-0">
                            <div class="list-group p-0 m-0 ">
                                <button type="button" onclick="onclickTitle()"
                                    class="list-group-item list-group-item-action bg-warning border-0" aria-current="true">
                                    Tổng quan
                                </button>
                                <button type="button" id="btn-inforuser" onclick="return onclickinfor()"
                                    class="list-group-item list-group-item-action border-0 ms-0    ">Thông tin</button>
                                <button type="button" id="btn-updateuser" onclick="return onclickupdate()"
                                    class="list-group-item list-group-item-action border-0">Chỉnh sửa</button>
                            </div>
                        </div>
                        <div class="col-8 col-sm-9">
                            <div id="displayinfor" class="inforuser w-100">
                                <table class="table">
                                    <tr>
                                        <th>Username: </th>
                                        <td>Họ và tên user</td>
                                    </tr>
                                    <tr>
                                        <th>Gender: </th>
                                        <td>Giới tính user</td>
                                    </tr>
                                    <tr>
                                        <th>Email: </th>
                                        <td>Email user</td>
                                    </tr>
                                    <tr>
                                        <th>Phone: </th>
                                        <td>Số điện thoại user</td>
                                    </tr>
                                    <tr>
                                        <th>Address: </th>
                                        <td>Địa chỉ user</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="updateuser" id="updateuser">
                                <form action="" method="get">
                                    <table class="table">
                                        <tr>
                                            <th><label for="username">Username:</label></th>
                                            <td><input type="text" class="input-field" value="Họ tên" name="Username"
                                                    id="username" placeholder="Họ và tên"></td>
                                        </tr>
                                        <tr>
                                            <th><label for="gender">Gender:</label></th>
                                            <td>
                                                <input type="radio" name="Gender" value="nam" id="gender-male">
                                                <label for="gender-male">Nam</label>
                                                <input type="radio" name="Gender" value="nu" id="gender-female">
                                                <label for="gender-female">Nữ</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label for="email">Email:</label></th>
                                            <td><input type="email" name="Email" id="email" value="Email"
                                                    placeholder="Email" class="input-field"></td>
                                        </tr>
                                        <tr>
                                            <th><label for="phone">Phone:</label></th>
                                            <td><input type="text" name="Phone" id="phone" value="phone"
                                                    placeholder="Số điện thoại" class="input-field"></td>
                                        </tr>
                                        <tr>
                                            <th><label for="address">Address:</label></th>
                                            <td><input type="text" name="Address" id="address" value="Address"
                                                    placeholder="Địa chỉ" class="input-field"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td rowspan="2"><button type="submit" class="btn btn-primary"
                                                    name="Update">Update</button></td>
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
@endsection
