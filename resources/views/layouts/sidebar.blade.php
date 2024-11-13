<div style="width:234px;float-left">
    
    <div id='sidebar'>
        <a href="" class='brand-link'>
            <img src="{{ asset('images/AdminLTELogo.png') }}" alt="">
            <span>Admin</span>
        </a>
        <hr>
        <div class='sidebar-content'>
            <img src="" alt=""> 
            <span>Trần Minh Hiếu</span>   
            <hr>
            <ul class='nav nav-pills nav-sidebar flex-column'>
                <li class='nav-item has-treeview mt-2'>
                    <a href="{{ url('/') }}" class="nav-link @if(request()->is('/')) active @endif">
                        <i class='nav-icon fas fa-tachometer-alt'></i>
                        <span class='mb-0'>Trang chủ</span>
                    </a>
                </li>
                <li class='nav-item has-treeview mt-2'>
                    <a href="{{ route('category.index') }}" class='nav-link @if(request()->is('category*')) active @endif'>
                        <i class='nav-icon fas fa-tachometer-alt'></i>
                        <span class='mb-0'>Danh mục</span>
                    </a>
                </li>
                <li class='nav-item has-treeview mt-2'>
                    <a href="" class='nav-link @if(request()->is('news*')) active @endif'>
                        <i class='nav-icon fas fa-tachometer-alt'></i>
                        <span class='mb-0'>Tin tức</span>
                    </a>
                </li>
                <li class='nav-item has-treeview mt-2'>
                    <a href="{{ route('account.index') }}" class='nav-link @if(request()->is('members*')) active @endif'>
                        <i class='nav-icon fas fa-tachometer-alt'></i>
                        <span class='mb-0'>Thành viên</span>
                    </a>
                </li>
                <li class='nav-item has-treeview mt-2'>
                    <a href="" class='nav-link @if(request()->is('ads*')) active @endif'>
                        <i class='nav-icon fas fa-tachometer-alt'></i>
                        <span class='mb-0'>Quảng cáo</span>
                    </a>
                </li>
                <li class='nav-item has-treeview mt-2'>
                    <a href="" class='nav-link @if(request()->is('comments*')) active @endif'>
                        <i class='nav-icon fas fa-tachometer-alt'></i>
                        <span class='mb-0'>Bình luận</span>
                    </a>
                </li>
                <li class='nav-item has-treeview mt-2'>
                    <a href="" class='nav-link @if(request()->is('logout*')) active @endif'>
                        <i class='nav-icon fas fa-tachometer-alt'></i>
                        <span class='mb-0'>Đăng xuất</span>
                    </a>
                </li>
            </ul>
            
        </div>
    
    </div>
</div>