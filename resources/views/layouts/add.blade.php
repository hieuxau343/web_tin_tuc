<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    {{-- CKEditor-5 --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
</head>

<body>
    <div class='container'>

        <h1>Thêm @yield('name')</h1>
        <form method="POST" action="@yield('action_url')" enctype="multipart/form-data">
            @csrf
            @yield('form_content')

        </form>
    </div>
    @yield('js-custom')
    <script src="{{ asset('js/toggle.js') }}"></script>
</body>

</html>
