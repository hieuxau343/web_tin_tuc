<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>

<body>
    <style>
        .title1 {
            font-weight: 700;
            font-size: 20px;
            line-height: 30px;
            color: #292929;
            display: block;
            margin-bottom: 16px;
            text-decoration: none;
        }

        .post-excerpt {
            font-size: 13px;
            color: #adadad;
            margin-bottom: 0;
            display: -webkit-box;
            /* Thiết lập để hỗ trợ nhiều dòng */
            -webkit-line-clamp: 4;
            /* Giới hạn số dòng (ở đây là 3 dòng) */
            -webkit-box-orient: vertical;
            /* Đảm bảo văn bản sẽ được cắt theo chiều dọc */
            overflow: hidden;
            /* Ẩn văn bản vượt quá giới hạn */
            text-overflow: ellipsis;
        }
    </style>
    <div id="wrapper">
        @include('client.layouts.header')

        @yield('content')


        @include('client.layouts.footer')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @yield('script')

</body>

</html>
