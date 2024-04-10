<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Quên mật khẩu</title>
</head>


<body class="bg-primary-subtle">
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
        <div class="row mt-5">
            <div class="col-sm-3 col-1"></div>
            <div class="col-sm-6 col-10 shadow p-3 mb-5 bg-body-tertiary rounded">
                {{-- <a class=" text-center" href="#"><img src="img/logo.png" alt="Logo"></a> --}}
                <h3 class="text-center" style="color: rgb(0, 0, 0)"> <img src="img/logo.png" alt="Logo"> <br>Quên
                    mật khẩu</h3>
                <form action="{{ route('displayVerify') }}">
                    <div id="email">
                        <div class="mb-3">
                            <label for="Email" class="form-label">Địa chỉ email:</label>
                            <input type="email" name="email" class="form-control" id="Email"
                                aria-describedby="emailHelp">
                        </div>
                        <p id="err"></p>
                        <input type="submit" id="continue" class="btn btn-primary" value="Tiếp tục">
                    </div>
                </form>

            </div>
            <div class="col-sm-3 col-1"></div>
        </div>
    </div>
</body>

</html>
