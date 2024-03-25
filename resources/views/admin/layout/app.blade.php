<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <base href="/">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Custom fonts for this template-->
    <link href="./css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="img/logoo.png" type="image/x-icon">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>ADMIN-HOME</title>
</head>

<body id="page-top">
    <div id="wrapper">
        
    {{-- <div class="container-fluid"> --}}
        @include('admin.layout.sidebar') 
        @include('admin.layout.header')
        
        @yield('content')
        @include('admin.layout.footer')
    {{-- </div> --}}
    </div>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="./js/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="./js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="./js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="./js/chart-area-demo.js"></script>
    <script src="./js/chart-pie-demo.js"></script>
</body>

</html>
