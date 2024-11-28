@extends('client.layouts.main')

@section('content')
    <div id="wp-feature-post" class="container">
        <div class="box feature-post">
            <div class="box-head">
                <h3>Nổi bật</h3>
            </div>
            <div class="box-body">
                <ul class="d-flex justify-content overflow-hidden" style="list-style: none">

                    @foreach ($specials as $index => $item)
                        <li>
                            <a href="" class="post-thumb">
                                <img style="height: 250px" class="img-fluid"
                                    src="{{ asset('storage/photos/19/post/' . $item->image) }}" alt="" />
                            </a>
                            <a href="" class="post-title">
                                {!! strip_tags($item->title) !!}
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>
            <hr />
        </div>
    </div>
    <!-- End feature post -->
    <div id="wrp-content" class="container">
        <div id="content">
            <div class="box new-post">
                <div class="box-head">
                    <h3>Bài viết mới</h3>
                </div>
                <div class="box-body">
                    <ul class="list-post">
                        <li class="">
                            <a href="" class="post-thumb">
                                <img src="assets/images/pic-1.png" alt="" />
                            </a>
                            <div class="more-info">
                                <a href="" class="post-title">Bạn có phải là một người phụ nữ có phong cách?
                                </a>
                                <div class="post-published">
                                    <a href="" class="post-author">123qjk</a>
                                    <span class="post-date">20/11/2020</span>
                                </div>
                                <p class="post-excerpt">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Quis ipsum suspendisse ultrices gravida. Risus
                                    commodo viverra maecenas accumsan lacus vel facilisis.
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="post-thumb">
                                <img src="assets/images/pic-2.png" alt="" />
                            </a>
                            <div class="more-info">
                                <a href="" class="post-title">Bạn có phải là một người phụ nữ có phong cách?
                                </a>
                                <div class="post-published">
                                    <a href="" class="post-author">123qjk</a>
                                    <span class="post-date">20/11/2020</span>
                                </div>
                                <p class="post-excerpt">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Quis ipsum suspendisse ultrices gravida. Risus
                                    commodo viverra maecenas accumsan lacus vel facilisis.
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="post-thumb">
                                <img src="assets/images/pic-3.png" alt="" />
                            </a>
                            <div class="more-info">
                                <a href="" class="post-title">Bạn có phải là một người phụ nữ có phong cách?
                                </a>
                                <div class="post-published">
                                    <a href="" class="post-author">123qjk</a>
                                    <span class="post-date">20/11/2020</span>
                                </div>
                                <p class="post-excerpt">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Quis ipsum suspendisse ultrices gravida. Risus
                                    commodo viverra maecenas accumsan lacus vel facilisis.
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="post-thumb">
                                <img src="assets/images/pic-4.png" alt="" />
                            </a>
                            <div class="more-info">
                                <a href="" class="post-title">Bạn có phải là một người phụ nữ có phong cách?
                                </a>
                                <div class="post-published">
                                    <a href="" class="post-author">123qjk</a>
                                    <span class="post-date">20/11/2020</span>
                                </div>
                                <p class="post-excerpt">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Quis ipsum suspendisse ultrices gravida. Risus
                                    commodo viverra maecenas accumsan lacus vel facilisis.
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="post-thumb">
                                <img src="assets/images/pic-5.png" alt="" />
                            </a>
                            <div class="more-info">
                                <a href="" class="post-title">Bạn có phải là một người phụ nữ có phong cách?
                                </a>
                                <div class="post-published">
                                    <a href="" class="post-author">123qjk</a>
                                    <span class="post-date">20/11/2020</span>
                                </div>
                                <p class="post-excerpt">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Quis ipsum suspendisse ultrices gravida. Risus
                                    commodo viverra maecenas accumsan lacus vel facilisis.
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="post-thumb">
                                <img src="assets/images/pic-6.png" alt="" />
                            </a>
                            <div class="more-info">
                                <a href="" class="post-title">Bạn có phải là một người phụ nữ có phong cách?
                                </a>
                                <div class="post-published">
                                    <a href="" class="post-author">123qjk</a>
                                    <span class="post-date">20/11/2020</span>
                                </div>
                                <p class="post-excerpt">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Quis ipsum suspendisse ultrices gravida. Risus
                                    commodo viverra maecenas accumsan lacus vel facilisis.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="side-bar">
            <a href="" class="ads">
                <img src="assets/images/ads.png" alt="" />
            </a>
            <div class="box top-topic">
                <div class="box-head">
                    <h3>Chủ đề quan tâm</h3>
                </div>
                <div class="box-body">
                    <ul class="list-topic">
                        <li>
                            <a href="">Thời trang<span class="num-post">20</span></a>
                        </li>
                        <li>
                            <a href="">Đời Sống<span class="num-post">30</span></a>
                        </li>
                        <li>
                            <a href="">Xã Hội<span class="num-post">26</span></a>
                        </li>
                        <li>
                            <a href="">Bóng Đá<span class="num-post">35</span></a>
                        </li>
                        <li>
                            <a href="">Điện Ảnh<span class="num-post">29</span></a>
                        </li>
                        <li>
                            <a href="">Sự Kiện<span class="num-post">15</span></a>
                        </li>
                        <li>
                            <a href="">Du Lịch<span class="num-post">34</span></a>
                        </li>
                        <li>
                            <a href="">Nội Trợ<span class="num-post">45</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
