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
                            <a href="{{ route('client-post.show', $item->id) }}" class="post-thumb">
                                <img style="height: 250px" class="img-fluid"
                                    src="{{ asset('storage/photos/19/post/' . $item->image) }}" alt="" />
                            </a>
                            <a href="{{ route('client-post.show', ['id' => $item->id]) }}" class="post-title">
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
                        @foreach ($posts as $index => $post)
                            <li class="">
                                <a href="" class="post-thumb">
                                    <img style="width:263px;height:176px"
                                        src="{{ asset('storage/photos/19/post/' . $post->image) }}" alt="" />
                                </a>
                                <div class="more-info">
                                    <a href="" class="post-title">{{ $post->title }}
                                    </a>
                                    <div class="post-published">
                                        <a href="" class="post-author">{{ $post->user->fullname }} </a>
                                        <span class="post-date">{{ $post->formatted_created_at }}</span>
                                    </div>
                                    <p class="post-excerpt">
                                        {{ strip_tags(html_entity_decode($post->content)) }}
                                    </p>
                                </div>
                            </li>
                        @endforeach
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
                                <a href="">{{ $category->name }}<span
                                        class="num-post">{{ $category->posts_count }}</span></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
