<div class="row sticky-top">
    <div class="col-12 m-0 p-0">
        <nav class="navbar navbar-dark bg-dark sticky-top ">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar"
                aria-label="Toggle navigation">
                <a class="navbar-brand" href="#">Admin</a>
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-start text-bg-dark " tabindex="-1" id="offcanvasDarkNavbar"
                    aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
                            <img src="" alt="avata">Tên Admin
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('manageAmin', ['type'=>"member"]) }}">Thành viên</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Quản lý
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark ">
                                    <li><a class="dropdown-item" href="{{ route('manageAmin', ['type'=>"post"]) }}">Bài viết</a></li>
                                    <li><a class="dropdown-item" href="{{ route('manageAmin', ['type'=>"title"]) }}">Tiêu đề</a></li>
                                    {{-- <li>
                                        <hr class="dropdown-divider">
                                    </li> --}}
                                    <li><a class="dropdown-item" href="{{ route('manageAmin', ['type'=>"document"]) }}">Tài liệu</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="d-flex mt-3" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </div>

</div>