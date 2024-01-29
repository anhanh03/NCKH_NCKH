@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Tải lên tài liệu</h2>

    <form action="/documents" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
            <label for="document_file" class="col-sm-2 col-form-label">Chọn tệp tin:</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="document_file" name="document_file">
            </div>
        </div>

        <div class="form-group row">
            <label for="ID_topic" class="col-sm-2 col-form-label">Chủ đề:</label>
            <div class="col-sm-10">
                <input type="text" id="query" class="form-control" placeholder="Enter a query">
                <ul id="suggestions" class="list-group">
                </ul>
            </div>
        </div>

        <div class="form-group row">
            <label for="Document_Name" class="col-sm-2 col-form-label">Tên tài liệu:</label>
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

        <div class="form-group row">
            <label for="Author" class="col-sm-2 col-form-label">Tác giả:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Author" name="Author">
            </div>
        </div>

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
            var suggestions = response.data;
            var suggestionsList = '';

            // Tạo danh sách gợi ý chủ đề
            suggestions.forEach(function(topic) {
                suggestionsList += '<li class="list-group-item" >' + topic + '</li>';
            });

            // Hiển thị danh sách gợi ý chủ đề
            document.getElementById('suggestions').innerHTML = suggestionsList;
        })
        .catch(function(error) {
            console.error(error);
        });
    });


    // Lắng nghe sự kiện khi click vào một gợi ý
  document.getElementById('suggestions').addEventListener('click', function (event) {
    // Kiểm tra xem phần tử được nhấp vào có là thẻ <li> không
    if (event.target.tagName === 'LI') {
      // Lấy giá trị của gợi ý và cập nhật vào thẻ input
      document.getElementById('query').value = event.target.textContent;
      document.getElementById('suggestions').style.display = 'none';
    }
  });
</script>

@endsection