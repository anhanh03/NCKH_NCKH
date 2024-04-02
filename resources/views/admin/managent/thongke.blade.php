
@extends('admin.layout.app')

@section('content')

<!-- Content Row -->
<div class="row">
    
    
    <!-- Biểu đồ hiển thị Thành viên mới -->
    <div class="col-lg-6 mb-4">
        <canvas id="accessChart"></canvas>
    </div>

    <div class="col-lg-6 mb-4">
        <!-- Biểu đồ thống kê số bài đăng -->
        <canvas id="postChart"></canvas>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Thêm script để vẽ biểu đồ -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Dữ liệu mẫu cho biểu đồ Thành viên mới
    var accessData = {
        labels: ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 7', 'Chủ Nhật'],
        datasets: [{
            label: 'Thành viên mới',
            data: @json($newAccounts),
            backgroundColor: 'rgba(0, 123, 255, 0.5)',
            borderColor: 'rgba(0, 123, 255, 1)',
            borderWidth: 1
        }]
    };

    // Tạo biểu đồ Thành viên mới
    var accessChart = new Chart(document.getElementById('accessChart'), {
        type: 'bar',
        data: accessData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Dữ liệu mẫu cho biểu đồ số bài đăng
    var postData = {
        labels: ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 7', 'Chủ Nhật'],
        datasets: [{
            label: 'Số bài đăng',
            data: @json($postCounts),
            backgroundColor: 'rgba(255, 99, 132, 0.5)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    };

    // Tạo biểu đồ số bài đăng
    var postChart = new Chart(document.getElementById('postChart'), {
        type: 'bar',
        data: postData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>




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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
