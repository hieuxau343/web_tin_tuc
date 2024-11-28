<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập/Đăng ký</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!-- Form Đăng nhập -->
        <div id="loginForm" class="auth-form w-100" style="max-width: 400px;"> <!-- Giới hạn chiều rộng của form -->
            <h3>Đăng nhập</h3>
            <form method="POST" action="{{ route('auth.login') }}">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Email" name="email">
                </div>
                @if ($errors->has('email'))
                    <p class="error-message">{{ $errors->first('email') }}</p>
                @endif
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                @if ($errors->has('password'))
                    <p class="error-message">{{ $errors->first('password') }}</p>
                @endif
                <button type="submit" class="btn btn-primary form-control mb-3">Đăng nhập</button>
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="text-center">
                    <a href="#" id="showRegister">Chưa có tài khoản? Đăng ký</a>
                </div>
            </form>
        </div>

        <!-- Form Đăng ký -->
        <div id="registerForm" class="auth-form w-100 d-none" style="max-width: 400px;">
            <h3>Đăng ký</h3>
            <form method="POST" action="{{ route('auth.register') }}">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Tên" name="name">
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                <button type="submit" class="btn btn-success form-control mb-3">Đăng ký</button>
                <div class="text-center">
                    <a href="#" id="showLogin">Đã có tài khoản? Đăng nhập</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/login&register.js"></script>
</body>

</html>
