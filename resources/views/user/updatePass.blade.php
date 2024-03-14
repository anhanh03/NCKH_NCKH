<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Update Password</title>
</head>

<body class="bg-primary-subtle">

    <div class="contaner">
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
        <div class="container">
            <div class="row mt-5">
                <div class="col-sm-3 col-1"></div>
                <div class="col-sm-6 col-10 shadow p-3 mb-5 bg-body-tertiary rounded">
                    <h3 class="text-center" style="color: rgb(5, 5, 5)"><img src="img/logo.png" alt="Logo">
                        <br>Update Password
                    </h3>
                    <form method="GET" action="{{ route('updatePassword') }}">
                        @csrf <!-- CSRF protection -->
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    
                </div>
                <div class="col-sm-3 col-1"></div>
            </div>
        </div>
</body>

</html>