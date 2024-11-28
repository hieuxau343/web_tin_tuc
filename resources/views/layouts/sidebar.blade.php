<div id='sidebar' style="z-index: 9999">
    <a href="" class='brand-link a-primary'>
        <img src="{{ asset('storage/photos/19/AdminLTELogo.png') }}" alt="">
        <span>Admin</span>
    </a>
    <hr>
    <div class='sidebar-content'>

        <ul class='nav nav-pills nav-sidebar flex-column menu'>
            <li class='nav-item has-treeview mt-2 info-user'>
                <div>
                    <img src="{{ $currentUser->image ? asset('storage/photos/19/user/' . $currentUser->image) : asset('storage/photos/19/avatar-trang-4.jpg') }}"
                        class="avatar" />

                    <span>{{ $currentUser->fullname }}</span>
                </div>

                <div class="arrow-right">
                </div>
                <div class="list-group" style="display:none">

                    <a href="#" class="list-group-item list-group-item-action">Chỉnh sửa thông tin</a>
                    <a href="{{ route('auth.logout') }}" class="list-group-item list-group-item-action">Đăng xuất</a>

                </div>
            </li>
            <li class='nav-item has-treeview mt-2'>
                <a href="{{ route('dashboard.index') }}"
                    class="nav-link a-primary @if (request()->is('/')) active @endif">
                    <i class="fa-solid fa-house"></i> <span class='mb-0'>Trang chủ</span>
                </a>
            </li>
            <li class='nav-item has-treeview mt-2'>
                <a href="{{ route('category.index') }}"
                    class='nav-link a-primary @if (request()->is('category*')) active @endif'>
                    <i class="fa-solid fa-layer-group"></i> <span class='mb-0'>Danh mục</span>
                </a>
            </li>
            <li class='nav-item has-treeview mt-2'>
                <a href="{{ route('post.index') }}"
                    class='nav-link a-primary @if (request()->is('news*')) active @endif'>
                    <i class="fa-regular fa-newspaper"></i> <span class='mb-0'>Tin tức</span>
                </a>
            </li>
            <li class='nav-item has-treeview mt-2'>
                <a href="{{ route('user.index') }}"
                    class='nav-link a-primary @if (request()->is('members*')) active @endif'>
                    <i class="fa-solid fa-user"></i> <span class='mb-0'>Thành viên</span>
                </a>
            </li>
            <li class='nav-item has-treeview mt-2'>
                <a href="{{ route('advertisement.index') }}"
                    class='nav-link a-primary @if (request()->is('ads*')) active @endif'>
                    <i class="fa-solid fa-bullhorn"></i> <span class='mb-0'>Quảng cáo</span>
                </a>
            </li>
            <li class='nav-item has-treeview mt-2'>
                <a href="" class='nav-link a-primary @if (request()->is('comments*')) active @endif'>
                    <i class="fa-solid fa-comments-dollar"></i> <span class='mb-0'>Bình luận</span>
                </a>
            </li>
            <li class='nav-item has-treeview mt-2'>
                <a href="{{ route('auth.logout') }}"
                    class='nav-link a-primary @if (request()->is('logout*')) active @endif'>
                    <i class="fa-solid fa-right-from-bracket"></i> <span class='mb-0'>Đăng xuất</span>
                </a>
            </li>
        </ul>

    </div>

</div>
