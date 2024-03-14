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

    <script>
        function initMap() {
            
            var myLatLng = {lat: 21.046543259246523, lng: 105.76221362392573}; // Tọa độ của địa chỉ, có thể thay đổi

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: myLatLng
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Địa chỉ của bạn'
            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDz3x7KKEssYTk_Dj9rh-oT4uKFI9FwD4E&callback=initMap">
    </script>
@endsection
