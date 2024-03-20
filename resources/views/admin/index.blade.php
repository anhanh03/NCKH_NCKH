@extends('admin.layout.app')

@section('content')
{{-- <div class="row m-3">
    <div class="col-sm-3 col-6 ">
        <div class="row" style="height: 140px;">
            <div class="col-12 w-75 my-2 bg-success-subtle text-center shadow p-3 rounded">
                Số bài đăng
                <h3>{{ session('totalCountPost') }}</h3>
            </div>
            
        </div>

    </div>
    <div class="col-sm-3 col-6 ">
        <div class="row" style="height: 140px;">
            <div class="col-12 w-75 my-2 bg-info-subtle text-center shadow p-3 rounded">
                Số thành viên
                <h3>{{ session('totalCountUser') }}</h3>
            </div>
        </div>

    </div>
    <div class="col-sm-3 col-6 ">
        <div class="row" style="height: 140px;">
            <div class="col-12 w-75 my-2 bg-warning-subtle text-center shadow p-3 rounded">
                Tổng tài liệu
                <h3>{{ session('totalCountDoc') }}</h3>
            </div>
            
        </div>

    </div>
    <div class="col-sm-3 col-6 ">
        <div class="row" style="height: 140px;">
            <div class="col-12 w-75 my-2 bg-danger-subtle text-center shadow p-3 rounded">
                Đang truy cập
                <h3>{{ session('totalCountActiveUser') }}</h3>
            </div>
        </div>

    </div>
</div> --}}

<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
            <form
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            {{-- <i class="fas fa-search fa-sm"></i> --}}
                            Search
                        </button>
                    </div>
                </div>
            </form>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                        <img class="img-profile rounded-circle"
                            src="img/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                       
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                
            </div>
            
            <!-- Page Heading -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Số bài đăng</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ session('totalCountPost') }}</div>
                                </div>
                                <div class="col-auto">
                                    {{-- <i class="fa fa-upload" aria-hidden="true"></i> --}}
                                    <!-- <i class="fas fa-post fa-2x text-gray-300"></i> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Số thành viên</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ session('totalCountUser') }}</div>
                                </div>
                                <div class="col-auto">
                                    {{-- <i class="fa fa-user" aria-hidden="true"></i> --}}
                                    <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tài liệu
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ session('totalCountDoc') }}</div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-auto">
                                    {{-- <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Đang truy cập</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ session('totalCountActiveUser') }}</div>
                                </div>
                                <div class="col-auto">
                                    {{-- <i class="fas fa-comments fa-2x text-gray-300"></i> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



{{-- <div class="row mt-5"> --}}
    @if (isset($_GET['type']))
        @switch($_GET['type'])
            @case("post")
                @include('admin.managent.post')
                @break
            @case("member")
                @include('admin.managent.member')
                @break 
            @case("document")
                @include('admin.managent.document')
                @break
            @case("title")
                @include('admin.managent.title')
                @break 
            @case("managentAdmin")
                @include('admin.managent.updateadmin')
                @break
            @case("updatePost")
                @include('admin.updateform.updatePost')
                @break
            @case("updateMember")
                @include('admin.updateform.updateMember')
                @break
            @case("updateDocument")
                @include('admin.updateform.updateDocument')
                @break
            @case("updateTitle")
                @include('admin.updateform.updateTitle')
                @break
            @case("addTitle")
                @include('admin.updateform.addTitle')
                @break 
        @endswitch
        
    @else
        @include('admin.managent.thongke')
    
    @endif
{{-- </div> --}}
<footer class="sticky-footer bg-white">
       
</footer>

@endsection