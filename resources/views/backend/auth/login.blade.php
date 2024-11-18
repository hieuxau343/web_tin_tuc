<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">


</head>

<body>

    <div style="width:400px;background-color:#fff;border-radius:10px;" class='text-center container p-3'>
        <h3>Đăng nhập</h3>
        <form method="POST" action="{{ route('auth.login') }}">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
            </div>
            @if ($errors->has('email'))
                <p class="error-message">{{ $errors->first('email') }}</p>
            @endif
            <div class="mb-3">
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                    name="password">
            </div>
            @if ($errors->has('password'))
                <p class="error-message">{{ $errors->first('password') }}</p>
            @endif
            <button id="submitButton" type="submit" class="btn btn-primary form-control mb-3 ">Đăng nhập</button>
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class='d-flex justify-content-between'>
                <div class="forget-pass"><a href="">Quên mật khẩu?</a></div>
                <button type="submit"class="btn btn-danger  ">Đăng ký</button>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
