@extends('admin.layout.app')

@section('content')
<div class="container">
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
    <div class="row">
        <div class="col-12">
            <h1>Account_Admin</h1>
            <table class="table table-striped table-hover" id="account">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Address</th>
                        <th scope="col">Setting</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->ID }}</td>
                        <td>{{ $user->Username }}</td>
                        <td>{{ $user->Email }}</td>
                        <td>{{ $user->sex }}</td>
                        <td>{{ $user->address }}</td>
                        <td>
                            <button type="button" class="btn btn-info" onclick="return onclickupdate({{ $user->ID }})">Update</button>
                            &ensp;&ensp;
                            <a href="#"><button type="button" class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="updateuser" id="updateuser" style="display: none">
                <form action="" method="get">
                    <table class="table">
                        <tr>
                            <th><label for="Fullname">Fullname:</label></th>
                            <td><input type="text" class="input-field" value="" name="Fullname" id="username"
                                    placeholder=""></td>
                        </tr>
                        <tr>
                            <th><label for="gender">Gender:</label></th>
                            <td>
                                <input type="radio" name="Sex" value="nam" id="gender-male" checked>
                                <label for="gender-male">Nam</label>
                                <input type="radio" name="Sex" value="nu" id="gender-female">
                                <label for="gender-female">Nữ</label>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="email">Email:</label></th>
                            <td><input type="email" name="Email" id="email" value="" placeholder="email"
                                    class="input-field">
                            </td>
                        </tr>
                        <tr>
                            <th><label for="address">Address:</label></th>
                            <td><input type="text" name="Address" id="address" value="" placeholder="address"
                                    class="input-field"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td rowspan="2"><button type="submit" class="btn btn-primary"
                                    name="Update">Update</button>
                                <button type="button" class="btn btn-danger" onclick="return onclickBack()"
                                    name="Update">Back</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function onclickupdate(userId) {
        document.getElementById('account').style.display = "none";
        document.getElementById('updateuser').style.display = "block";
        // Lấy thông tin tài khoản admin từ server và điền vào form update tương ứng với userId
        // Đoạn mã AJAX có thể được sử dụng để gửi yêu cầu lấy dữ liệu tài khoản từ server
        // Sau khi nhận được dữ liệu, điền vào các trường input trong form update
    }

    function onclickBack() {
        document.getElementById('account').style.display = "table";
        document.getElementById('updateuser').style.display = "none";
    }
</script>
@endsection
