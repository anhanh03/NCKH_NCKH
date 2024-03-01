<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>ADMIN-HOME</title>
</head>

<body>
    <div class="container-fluid">
        @include('admin.layout.header')
        @yield('content')
        {{-- @include('layouts.sidebar') --}}
        {{-- @include('admin.layout.footer') --}}

        
    </div>
</body>

</html>
