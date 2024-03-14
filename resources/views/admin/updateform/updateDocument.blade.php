<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Update-Title</title>
</head>
<body style="background: rgb(241, 243, 235)">
    @include('admin.updateform.header')
    <div class="container">
        <div class="row">
            <div class="col-1 col-sm-4 ">
               
            </div>
            <div class="col-10 col-sm-4 mt-5 text-center">
                <form action="" class="shadow p-3 mb-5 bg-body-tertiary rounded">
                    <h2>Form Document</h2>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="exampleInputEmail1" value="Toppic">
                      </div>
                      <div class="mb-3">
                        <input type="text" class="form-control" id="exampleInputPassword1" value="Name">
                      </div>
                      <div class="mb-3">
                        <input type="text" class="form-control" id="exampleInputPassword1" value="Size">
                      </div>
                      <div class="mb-3">
                        <input type="text" class="form-control" id="exampleInputPassword1" value="Decription">
                      </div>
                      <button type="submit" class="btn btn-primary">Update</button>
                </form>
                
            </div>
            <div class="col-1 col-sm-4 "></div>
        </div>
    </div>
</body>
</html>