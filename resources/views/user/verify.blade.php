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


<body class="bg-primary-subtle">
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-3 col-1"></div>
            <div class="col-sm-6 col-10 shadow p-3 mb-5 bg-body-tertiary rounded">
                {{-- <a class=" text-center" href="#"><img src="img/logo.png" alt="Logo"></a> --}}
                <h3 class="text-center" style="color: rgb(0, 0, 0)"> <img src="img/logo.png" alt="Logo"> <br>Fogot
                    Password</h3>               
                <form action="">
                    <div id="code">
                        <div class="mb-3">
                            <label for="" class="form-label">Enter the code sent to your email address:</label>
                            <input type="text" class="form-control" id="Code" aria-describedby="emailHelp">
                        </div>
                        <a href="#" class="text-decoration-none">
                            <p>Gửi lại mã code?</p>
                        </a>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-3 col-1"></div>
        </div>
    </div>
</body>

</html>
