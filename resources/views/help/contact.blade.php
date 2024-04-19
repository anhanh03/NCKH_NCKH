@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Thông tin liên hệ</h1>
                <p><strong>Tên:</strong> Diễn đàn - IT</p>
                <p><strong>Địa chỉ:</strong> Phú Diễn - Bắc Từ Liêm - Thành phố Hà Nội</p>
                <p><strong>Số điện thoại:</strong> 0899-9999-99</p>
            </div>
            <div class="col-md-6">
                <h1>Bản đồ</h1>
                <div id="map" style="height: 400px;"></div>
                
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
    <script>
        var map = L.map('map').setView([21.047096, 105.762677], 13);
        L.tileLayer('https://{s}.tile.thunderforest.com/outdoors/{z}/{x}/{y}.png?apikey={apikey}', {
        maxZoom: 19,
        apikey: '78b3037de72240598a6020d6a4f79536',
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
        var marker = L.marker([21.047096, 105.762677]).addTo(map);
        marker.bindPopup("<b>Xin chào!</b><br>Bạn có thể tìm chúng tôi tại đây.").openPopup();
    </script>
@endsection
