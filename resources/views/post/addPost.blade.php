@extends('layouts.app')
@section('content')
    

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif
    <div class="container">
        <h2>Đăng bài</h2>

        <form action="{{ route('addPost') }}" method="GET">
            @csrf


            <div class="form-group row">
                <label for="ID_topic" class="col-sm-2 col-form-label">Chủ đề:</label>
                <div class="col-sm-10">
                    <input type="text" id="query" class="form-control" placeholder="Nhập chủ đề. Nếu không có chủ đề hãy nhập 'Khác'">
                    <ul id="suggestions" class="list-group">
                    </ul>
                </div>
                <input id="ID_topic" type="hidden" name="ID_topic" value="">
            </div>

            <div class="form-group row">
                <label for="Document_Name" class="col-sm-2 col-form-label">Tên bài đăng:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Document_Name" name="Document_Name">
                </div>
            </div>

            <div class="form-group row">
                <label for="Description" class="col-sm-2 col-form-label">Mô tả:</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="Description" name="Description"></textarea>
                </div>
            </div>

            {{-- <div class="form-group row">
            <label for="Author" class="col-sm-2 col-form-label">Tác giả:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Author" name="Author">
            </div>
        </div> --}}

            <div class="form-group row">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Tải lên</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Lắng nghe sự kiện nhập vào input
        document.getElementById('query').addEventListener('input', function() {
            var query = this.value;

            document.getElementById('suggestions').style.display = 'block';

            // Gửi yêu cầu Ajax đến tệp route xử lý
            axios.get('/topic-suggestions', {
                    params: {
                        query: query
                    }
                })
                .then(function(response) {
                    console.log(response.data);
                    var suggestions = response.data; // Không cần sử dụng Object.values() nữa
                    var suggestionsList = '';

                    // Tạo danh sách gợi ý chủ đề
                    Object.entries(suggestions).forEach(function([topicName, topicId]) {
                        var $topicID = topicId;
                        var $topicName = topicName;
                        suggestionsList += '<li class="list-group-item" data-topic-id="' + $topicID +
                            '">' + $topicName + '</li>';
                        console.log($topicID);
                    });

                    // Hiển thị danh sách gợi ý chủ đề
                    document.getElementById('suggestions').innerHTML = suggestionsList;
                })
                .catch(function(error) {
                    console.error(error);
                });
        });

        // Lắng nghe sự kiện khi click vào một gợi ý
        document.getElementById('suggestions').addEventListener('click', function(event) {
            // Kiểm tra xem phần tử được nhấp vào có là thẻ <li> không
            if (event.target.tagName === 'LI') {
                // Lấy giá trị của gợi ý và cập nhật vào thẻ input
                document.getElementById('query').value = event.target.textContent;

                // Lấy giá trị ID_topic từ thuộc tính dữ liệu
                var topicId = event.target.getAttribute('data-topic-id');
                console.log(topicId);

                // Gán giá trị ID_topic vào trường ẩn
                document.getElementById('ID_topic').value = topicId;

                document.getElementById('suggestions').style.display = 'none';
            }

        });
    </script>
@endsection
