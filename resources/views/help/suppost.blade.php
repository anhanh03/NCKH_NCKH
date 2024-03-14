@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Diễn đàn IT - Trang Hỗ Trợ</h1>
                <p>Xin chào và chào mừng bạn đến với trang hỗ trợ của chúng tôi. Dưới đây là các dịch vụ và tính năng mà chúng tôi cung cấp để giúp bạn.</p>

                <h2>Câu hỏi thường gặp (FAQ)</h2>
                <ul>
                    <li><strong>Làm thế nào để đăng ký tài khoản?</strong></li>
                    <p>Để đăng ký tài khoản, bạn chỉ cần nhấp vào nút "Đăng ký" ở góc trên bên phải của trang web và điền vào mẫu đăng ký.</p>
                    <li><strong>Tôi quên mật khẩu của mình. Làm thế nào để khôi phục?</strong></li>
                    <p>Để khôi phục mật khẩu, bạn có thể nhấp vào liên kết "Quên mật khẩu" trên trang đăng nhập và làm theo hướng dẫn.</p>
                    <!-- Thêm các câu hỏi thường gặp khác và câu trả lời tương ứng -->
                </ul>

                <h2>Biểu mẫu liên hệ</h2>
                <p>Nếu bạn không tìm thấy câu trả lời cho câu hỏi của mình hoặc cần hỗ trợ bổ sung, hãy gửi yêu cầu của bạn thông qua biểu mẫu liên hệ dưới đây.</p>
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Họ và tên:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="message">Nội dung:</label>
                        <textarea class="form-control" id="message" name="message" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi</button>
                </form>
            </div>
            <div class="col-md-4">
                <h2>Hỗ Trợ Trực Tuyến</h2>
                <p>Nếu bạn cần sự giúp đỡ ngay lập tức, hãy liên hệ với nhóm hỗ trợ của chúng tôi qua chat trực tuyến.</p>
                <div class="quick-chat text-center" >
                    <a href="https://t.me/Diendan_IT_bot" target="_blank">Chat với tôi trên Telegram</a>
                </div>
                {{-- có thể sử dụng để xác thực tài khoản:data-auth-url="https://example.com/auth/" --}}
                {{-- <script async src="https://telegram.org/js/telegram-widget.js?7" data-telegram-login="Diendan_IT_bot" data-size="large" data-radius="10" ></script>   --}}

            </div>
            
        </div>
    </div>
@endsection
