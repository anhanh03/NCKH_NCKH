@extends('admin.layout.app')

@section('content')
<div class="container">
    <div class="row">
        {{-- @if (session('success'))
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
    @endif --}}
        <div class="col-12">
            <h1>Account_Admin</h1>
            <table class="table table-striped table-hover" id="account">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">username</th>
                        <th scope="col">email</th>
                        <th scope="col">gender</th>
                        <th scope="col">address</th>
                        <th scope="col">Setting</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <th >1</th>
                        <td>abc</td>
                        <td>abc@gmail.com</td>
                        <td>nam</td>
                        <td>Ha noi</td>
                        <td>
                            <button type="button" class="btn btn-info" onclick="return onclickupdate()">Update</button>
                            &ensp;&ensp;
                            <a href="#"><button type="button" class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                   
                </tbody>
            </table>
            <div class="updateuser" id="updateuser" style="display: none">
                <form action="" method="get">
                    <table class="table">
                        <tr>
                            <th><label for="Fullname">Fullname:</label></th>
                            <td><input type="text" class="input-field" value=""
                                    name="Fullname" id="username" placeholder=""></td>
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
                            <td><input type="email" name="Email" id="email"
                                    value="" placeholder="email" class="input-field">
                            </td>
                        </tr>
                        <tr>
                            <th><label for="address">Address:</label></th>
                            <td><input type="text" name="Address" id="address"
                                    value="" placeholder="address"
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
    <script>
        function onclickupdate() {
                document.getElementById('account').style.display = "none";
                // document.getElementById('title').style.display="none";
                document.getElementById('updateuser').style.display = "block";
                // document.getElementById('updateuser').style.transition = "all 0.3s ease-in-out";
                // alert("alo")

            }
            function onclickBack() {
                document.getElementById('account').style.display = "table";
                // document.getElementById('title').style.display="none";
                document.getElementById('updateuser').style.display = "none";
                // document.getElementById('updateuser').style.transition = "all 0.3s ease-in-out";
                // alert("alo")

            }
    </script>
</div>
@endsection
