
@extends('admin.layout.app')

@section('content')

<!-- Content Row -->
<div class="row">
    
    
    <!-- Biểu đồ hiển thị Thành viên mới -->
    <div class="col-lg-6 mb-4">
       {!! $chart->container() !!}
    </div>

    <div class="col-lg-6 mb-4">
        <!-- Biểu đồ thống kê số bài đăng -->
        {!! $postNew->container() !!}
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Thêm script để vẽ biểu đồ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
{!! $chart->script() !!}
{!! $postNew->script() !!}



</div>

<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">


    </div>

    <div class="col-lg-6 mb-4">

    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->   





@endsection
