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
                            <a href="{{ route('client-post.show', $item->slug) }}" class="post-thumb">
                                <img style="height: 250px" class="img-fluid"
                                    src="{{ asset('storage/photos/19/post/' . $item->image) }}" alt="" />
                            </a>
                            <a href="{{ route('client-post.show', $item->slug) }}" class="post-title">
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
        <div class="d-flex">
            <div id="content">
                <div class="box new-post">
                    <div class="box-head">
                        <h3>Bài viết mới</h3>
                    </div>
                    <div class="box-body">
                        <ul class="list-post">
                            @include('client.home.partials.post', ['posts' => $posts])
                        </ul>
                    </div>
                </div>
            </div>
            <div id="side-bar">
                <a href="" class="ads">
                    <img src="{{ asset('storage/images/earth.png') }}" alt="" />
                </a>
                <div class="box top-topic">
                    <div class="box-head">
                        <h3>Chủ đề quan tâm</h3>
                    </div>
                    <div class="box-body">
                        <ul class="list-topic">

                            @foreach ($categories as $index => $category)
                                <li>
                                    <a href="{{ route('client-category.show', $category->slug) }}">{{ $category->name }}<span
                                            class="num-post">{{ $category->posts_count }}</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
