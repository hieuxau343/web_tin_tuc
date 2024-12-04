<<<<<<< HEAD
<body>
    <style>
        #header {
    background-color: #f8f9fa;
    padding: 10px 0;
}
=======
<div id="header">
    <div class=" container d-flex justify-content align-items-center">
        <a id="logo" href="{{ url('/') }}">
            <img src="{{ asset('storage/images/white_logo.png') }}" alt="Logo" />
>>>>>>> b9582709a3b44a45f58f2dc358f5c8cb17fa3964

#header #logo img {
    height: 50px;
}

#main-menu .nav-link {
    font-weight: 500;
    color: #333;
    transition: color 0.3s;
}

#main-menu .nav-link:hover {
    color: #007bff;
}

@media (max-width: 768px) {
    #header {
        text-align: center;
    }

    #header #logo img {
        margin-bottom: 10px;
    }
}

    </style>
</body>
<div id="header" class="bg-light shadow-sm">
    <div class="container">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- Logo -->
            <a id="logo" class="navbar-brand" href="#">
                <img src="{{ asset('storage/images/logo.png') }}" alt="Logo" style="height: 50px;" />
            </a>

            <!-- Toggler for Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Content -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <!-- Menu -->
                <ul id="main-menu" class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('homepage') }}">Trang chủ</a>
                    </li>
                    @foreach ($categories as $index => $category)
                        @if ($category->posts_count != 0)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('client-category.show', $category->slug) }}">{{ $category->name }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>

                <!-- Search Form -->
                <form action="{{ route('search') }}" method="GET" class="d-flex">
                    <input type="text" name="query" placeholder="Search..." class="form-control me-2" required>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </nav>
    </div>
</div>
