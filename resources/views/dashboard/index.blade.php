@extends('layouts.main')
@section('name_page', 'Trang chủ')
@section('content')
    <div class='row'>
        <div class='col-lg-3 col-6'>
            <div class="small-box bg-info ">
                <div class="d-flex align-items-center justify-content-between ">
                    <div class="inner">
                        <h3>{{ $categories }}</h3>
                        <h4>DANH MỤC</h4>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-bag-shopping  mx-3" style="font-size:60px"></i>
                    </div>
                </div>
                <a href="{{ route('category.index') }}" class="small-box-footer text-center">Chi tiết <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>

        </div>
        <div class='col-lg-3 col-6'>
            <div class="small-box bg-success ">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="inner">
                        <h3>{{ $posts }}</h3>
                        <h4>Tin tức</h4>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-bag-shopping  mx-3" style="font-size:60px"></i>
                    </div>
                </div>
                <a href="{{ route('post.index') }}" class="small-box-footer text-center">Chi tiết <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>

        </div>
        <div class='col-lg-3 col-6'>
            <div class="small-box bg-warning ">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="inner">
                        <h3>{{ $users }}</h3>
                        <h4>Thành viên</h4>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-bag-shopping  mx-3" style="font-size:60px"></i>
                    </div>
                </div>
                <a href="{{ route('user.index') }}" class="small-box-footer text-center">Chi tiết <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>

        </div>
        <div class='col-lg-3 col-6'>
            <div class="small-box bg-danger ">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="inner">
                        <h3>65</h3>
                        <h4>Bình luận</h4>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-bag-shopping  mx-3" style="font-size:60px"></i>
                    </div>
                </div>
                <a href="ds_danhmuc.php" class="small-box-footer text-center">Chi tiết <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>

        </div>

    </div>
@endsection
