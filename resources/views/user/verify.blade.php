<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Fogot Password</title>
</head>
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

<body class="bg-primary-subtle">
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-3 col-1"></div>
            <div class="col-sm-6 col-10 shadow p-3 mb-5 bg-body-tertiary rounded">
                {{-- <a class=" text-center" href="#"><img src="img/logo.png" alt="Logo"></a> --}}
                <h3 class="text-center" style="color: rgb(0, 0, 0)"> <img src="img/logo.png" alt="Logo"> <br>Fogot
                    Password</h3>               
                <form action="{{ route('verifyCode') }}">
                    <div id="code">
                        <div class="mb-3">
                            <label for="" class="form-label">Enter the code sent to your email address:</label>
                            <input type="hidden" name="email" value="{{ $email }}">
                            <input type="text" class="form-control" name="verifyCode" id="Code" aria-describedby="emailHelp">
                        </div>
                        <a href="{{ route('displayVerify') }}" class="text-decoration-none">
                            <p>Gửi lại mã code?</p>
                        </a>
                        <input type="submit" class="btn btn-primary" value="Send">
                    </div>
                </form>
            </div>
            <div class="col-sm-3 col-1"></div>
        </div>
    </div>
</body>

</html>
