<nav class="navbar bg-primary-subtle">
    <div class="container-fluid">
        <a class="btn btn-info" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
            Managent
          </a>
          <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasExampleLabel"><strong>Managent</strong></h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
             
              <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown">
                 Update
                </button>
                <ul class="dropdown-menu w-100 text-center">
                  <li><a class="dropdown-item" href="{{ route('dpTitleUpdate') }}">Title</a></li>
                  <li><a class="dropdown-item" href="{{ route('dpPostUpdate') }}">Post</a></li>
                  <li><a class="dropdown-item" href="{{ route('dpDocumentUpdate') }}">Document</a></li>
                  <li><a class="dropdown-item" href="{{ route('dpMemberUpdate') }}">Member</a></li>
                </ul>
              </div>
              <div class="dropdown mt-3 w-100">
                <button class="btn btn-secondary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown">
                 Add
                </button>
                <ul class="dropdown-menu w-100 text-center">
                  <li><a class="dropdown-item" href="{{route('dpTitleAdd')}}">Title</a></li>
                </ul>
              </div>
              <div class="text-center"><a href="{{route('homeAdmin')}}">Admin Home</a></div>
              
            </div>
          </div>
    </div>
  </nav>