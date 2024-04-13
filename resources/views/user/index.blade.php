<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css" />
    <title>Đăng nhập & đăng ký</title>
</head>

<body>
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
        <div class="forms-container">
            <div class="signin-signup">
                <form action="{{ route('login') }}" class="sign-in-form" method="GET">
                    <h2 class="title">Đăng nhập</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="username" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" />
                    </div>
                    <input type="submit" value="Đăng nhập" class="btn solid" />
                    <a class="forgotpwd" href="{{ route('displayFogot') }}">Quên mật khẩu ?</a>

                    <p class="social-text">Hoặc đăng nhập bằng nền tảng xã hội</p>
                    <div class="social-media">
                        <a href="{{ route('fblogin') }}" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>

                        <a href="{{ route('gglogin') }}" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>

                    </div>
                </form>
                <form action="{{ route('signup') }}" class="sign-up-form" method="GET">
                    <h2 class="title">Đăng ký</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="username" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" name="email" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" />
                    </div>
                    <input type="submit" class="btn" value="Đăng ký" />
                    <p class="social-text">Hoặc đăng ký với nền tảng mạng xã hội</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>

                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>

                    </div>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Đăng ký ngay!</h3>
                    <p>
                        Bạn chưa có tài khoản, hãy đăng kí để tham gia thảo luận cùng chúng tôi!
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Đăng ký
                    </button>
                </div>
                <img src="img/log.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Một trong số chúng tôi?</h3>
                    <p>
                        Bạn đã có tài khoản, hãy đăng nhập thể thảo luận cùng chúng tôi
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Đăng nhập
                    </button>
                </div>
                <img src="img/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="js/app.js"></script>
</body>

</html>
