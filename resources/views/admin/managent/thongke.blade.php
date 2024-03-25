
@extends('admin.layout.app')

@section('content')



<!-- Content Row -->


<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tương tác</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary bg-primary"></i> Bài đăng
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success bg-success"></i> Thành viên
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info bg-info"></i> Tài liệu
                    </span>
                </div>
            </div>
        </div>
    </div>
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


<script>
    // Đảm bảo rằng DOM đã được tải hoàn toàn trước khi thao tác trên nó
    document.addEventListener("DOMContentLoaded", function() {
        // Lấy thẻ canvas bằng ID
        var ctx = document.getElementById('myAreaChart').getContext('2d');

        // Tạo biến myAreaChart để lưu trữ biểu đồ
        var myAreaChart = new Chart(ctx, {
            type: 'area', // Loại biểu đồ là đường (area chart)
            data: {
                labels: ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ Nhật'], // Nhãn trên trục x
                datasets: [{
                    label: 'View', // Nhãn của dữ liệu
                    data: [10000, 15000, 12000, 18000, 20000, 25000, 22000], // Dữ liệu của biểu đồ
                    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Màu nền của biểu đồ
                    borderColor: 'rgba(54, 162, 235, 1)', // Màu viền của biểu đồ
                    borderWidth: 2, // Độ rộng của viền
                    fill: true // Đánh dấu vùng dưới đường biểu đồ được tô màu
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true // Trục y bắt đầu từ 0
                    }
                }
            }
        });
    });
</script>




@endsection
