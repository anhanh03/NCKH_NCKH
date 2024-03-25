<!-- Page Wrapper -->


    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('homeAdmin') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                {{-- <i class="fas fa-laugh-wink"></i> --}}
            </div>
            <div class="sidebar-brand-text mx-3">Admin</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Addons
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('manageAmin', ['type'=>"managentAdmin"]) }}" >
                {{-- <i class="fas fa-fw fa-folder"></i> --}}
                <span>Admin</span>
            </a>
           
        </li>


        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('managerMember') }}">
                {{-- <i class="fas fa-fw fa-table"></i> --}}
                <span>Member</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('managerDocument') }}">
                {{-- <i class="fas fa-fw fa-table"></i> --}}
                <span>Tài liệu</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('managerPost') }}">
                {{-- <i class="fas fa-fw fa-table"></i> --}}
                <span>Bài đăng</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('managerTopic') }}">
                {{-- <i class="fas fa-fw fa-table"></i> --}}
                <span>Chủ đề</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('homeAdmin') }}">
                {{-- <i class="fas fa-fw fa-table"></i> --}}
                <span>Thống kê</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle">
                
            </button>
        </div>

    </ul>


