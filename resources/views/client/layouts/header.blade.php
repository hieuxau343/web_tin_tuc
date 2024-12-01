<div id="header">
    <div class=" container d-flex justify-content align-items-center">
        <a id="logo" href="">
            <img src="{{ asset('storage/images/earth.png') }}" alt="Logo" />

        </a>
        <form id="search">
            <input type="text" placeholder="Bạn muốn tìm gì" />
            <button><i class="bx bx-search"></i></button>
        </form>
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
