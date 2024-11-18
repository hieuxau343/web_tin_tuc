<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    {{-- Bat buoc --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
</head>

<body>
    <style>
        * {
            border: 0;
            margin: 0;
            box-sizing: border-box;
        }

        #sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 234px;
            padding: 13px 0px;
            background-color: hsl(210 11% 15%);
            color: hsl(none 0% 100%);
        }

        img {
            width: 33px;
            height: 33px;
            object-fit: cover
        }

        .brand-link {
            font-size: 1.25rem;
            line-height: 1.5;
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 0 20px;
        }

        a {
            color: hsl(none 0% 100%) !important;
            text-decoration: none;
        }

        .sidebar-content {
            padding: 0 8px;
        }

        #header {
            position: relative;
            margin-left: 0;
            /* Đặt lại margin-left thành 0 */
            padding: 0 20px;
            background-color: orange;
            color: black;
            width: calc(100% - 234px);
        }

        .main-content {
            margin-left: 0;
            /* Sát sidebar */
            padding: 10px;
            height: 550px;
            background-color: hsl(220, 29%, 97%);
            width: calc(100% - 234px);
            /* Adjust width to account for sidebar */
        }

        .table-container {
            margin: 0;
            /* Loại bỏ khoảng cách thừa */
            padding: 0;
        }


        .small-box {
            border-radius: .25rem;
            box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
            display: block;
            margin-bottom: 20px;
            position: relative;
        }

        .inner {
            padding: 10px
        }

        .icon {
            color: rgba(0, 0, 0, .15);
            z-index: 0;
        }

        .small-box-footer {
            background-color: rgba(0, 0, 0, .1);
            color: rgba(255, 255, 255, .8);
            display: block;
            padding: 3px 0;
            position: relative;
            text-align: center;
            text-decoration: none;
            z-index: 10;
        }
    </style>
    @include('layouts.sidebar')
    @include('layouts.header')
    <div
        style="width: calc(100% - 234px); float: right; padding: 10px 0px; height: 550px; background-color: hsl(220 29% 97%)">
        <div class="container-fluid">

            <div class="d-flex align-items-center justify-content-between mb-3">
                <h3>@yield('name_page')</h3>
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="text-primary" href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item">Admin</li>
                </ol>
            </div>

            @yield('content')
        </div>
    </div>
    @include('layouts.footer')
    @yield('js-custom')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('js/ajax.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>

</html>
