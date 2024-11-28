<div id="header">
    <div class="container justify-content align-items-center">
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
                <li><a href="#">Trang chủ</a></li>
                @foreach ($categories as $index => $category)
                    <li><a href="#">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </nav>
    </div>
</div>
