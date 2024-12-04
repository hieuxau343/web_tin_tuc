@extends('client.layouts.main')

@section('content')
    <div id="wp-content" class="container">
        <h1>{{ $category->name }}</h1>

        <div class="header" style="margin-bottom: 40px">
            <div class="header__main d-flex">
                <!-- Header Left -->
                <div class="header__left" style="width: calc(88% - 300px)">
                    @foreach ($posts as $post)
                        @if ($loop->index == 0)
                            <!-- Lấy bài viết đầu tiên -->
                            <a href="" class="title1">
                                <img style="width:100%;max-width:840px;" class="img-fluid "
                                    src="{{ asset('storage/photos/19/post/' . $post->image) }}" alt="{{ $post->title }}">
                            </a>

                            <h2>
                                <a href="" class="title1">{{ $post->title }}</a>
                            </h2>
                            <a href="" class="post-excerpt"> {{ strip_tags(html_entity_decode($post->content)) }}</a>
                        @endif
                    @endforeach
                </div>
                <!-- Header Right -->
                <div class="header__right"
                    style="width: 400px;padding-left: 16px;border-left: 1pxolid #ebebeb;margin-left: 16px;">
                    @foreach ($posts as $post)
                        @if ($loop->index >= 1 && $loop->index <= 2)
                            <!-- Lấy bài viết thứ 2 và 3 -->
                            <a href="" class="title1">
                                <img class="img-fluid" src="{{ asset('storage/photos/19/post/' . $post->image) }}"
                                    alt="{{ $post->title }}">
                            </a>

                            <h2>
                                <a href="" class="title1">{{ $post->title }}</a>
                            </h2>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Header Sub -->
            <div class="header__sub d-flex">
                <div class="d-flex" style="width: calc(60% - 0px); gap: 15px;">
                    @foreach ($posts as $post)
                        @if ($loop->index >= 3 && $loop->index <= 4)
                            <!-- Lấy bài viết thứ 4 và 5 -->
                            <div class="post-item d-flex" style="gap:20px">
                                <a href="">
                                    <img style="width:500px;object-fit: cover" class="img-fluid"
                                        src="{{ asset('storage/photos/19/post/' . $post->image) }}"
                                        alt="{{ $post->title }}">
                                </a>
                                <a href="" class="title1">{{ $post->title }}</a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div id="content" class="container">
        <div class="box new-post">
            <div class="box-head">
                <h3>Bài viết mới</h3>
            </div>
            <div class="box-body">
                <ul class="list-post">
                    @foreach ($posts as $index => $post)
                        @if ($loop->index >= 5)
                        @endif
                        <li class="">
                            <a href="{{ route('client-post.show', $post->slug) }}" class="post-thumb">
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
        <div class="pagination">
            {{ $posts->links() }}
        </div>

    </div>
@endsection
