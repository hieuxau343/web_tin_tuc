<div id="header">
    <div class=" container d-flex justify-content align-items-center">
        <a id="logo" href="">
            <img src="{{ asset('storage/images/white_logo.png') }}" alt="Logo" />

        </a>
        
        <form action="{{ route('search') }}" method="GET" class="d-flex ms-auto">
            <input type="text" name="query" placeholder="Search..." class="form-control me-2" required>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        
        
▸
    </div>
    <div class="container">
        <nav>
            <ul id="main-menu" class="d-flex">
                <li><a href="{{ route('homepage') }}">Trang chủ</a></li>
                @foreach ($categories as $index => $category)
                    @if ($category->posts_count != 0)
                        <li><a href="{{ route('client-category.show', $category->slug) }}">{{ $category->name }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </nav>
    </div>
</div>
