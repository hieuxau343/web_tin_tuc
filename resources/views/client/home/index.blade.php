<body>
    <style>
        /* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
}

/* Feature Post Section */
#wp-feature-post {
    margin-bottom: 20px;
}

.feature-item {
    width: 250px;
    margin: 0 10px;
}

.post-thumb img {
    border-radius: 5px;
    transition: transform 0.3s ease-in-out;
}

.post-thumb img:hover {
    transform: scale(1.05);
}

/* New Post List */
.list-post .post-thumb img {
    transition: transform 0.3s ease-in-out;
}

.list-post .post-thumb img:hover {
    transform: scale(1.1);
}

.more-info .post-title:hover {
    color: #007bff;
    text-decoration: underline;
}

/* Sidebar */
#side-bar .ads img {
    max-width: 100%;
    border-radius: 5px;
}

.list-topic a {
    text-decoration: none;
    font-weight: 500;
    color: #333;
}

.list-topic a:hover {
    color: #007bff;
}

.list-topic .badge {
    background-color: #007bff;
    font-size: 0.9rem;
}
.carousel-item img {
    border-radius: 8px;
    transition: transform 0.3s ease-in-out;
}

.carousel-item img:hover {
    transform: scale(1.05);
}

.carousel-caption {
    background: rgba(0, 0, 0, 0.6);
    padding: 10px;
    border-radius: 5px;
}


    </style>
</body>
@extends('client.layouts.main')

@section('content')
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Feature Post Section -->
    <div id="wp-feature-post" class="container my-4">
        <div class="box feature-post p-3 bg-light rounded shadow-sm">
            <div class="box-head mb-3">
                <h3 class="text-primary">Nổi bật</h3>
            </div>
            <div id="featurePostCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($specials as $index => $item)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <a href="{{ route('client-post.show', $item->slug) }}" class="post-thumb d-block">
                                <img style="height: 500px; width: 100%; object-fit: cover;" class="d-block w-100 rounded"
                                    src="{{ asset('storage/photos/19/post/' . $item->image) }}" alt="{{ $item->title }}" />
                            </a>
                            <div class="carousel-caption d-none d-md-block">
                                <a href="{{ route('client-post.show', $item->slug) }}" class="post-title text-white fw-bold">
                                    {!! strip_tags($item->title) !!}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#featurePostCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#featurePostCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    
    <!-- End feature post -->

    <!-- Content and Sidebar -->
    <div id="wrp-content" class="container d-flex flex-wrap my-4">
        <!-- Main Content -->
        <div id="content" class="col-lg-8 col-md-12 mb-4">
            <div class="box new-post p-3 bg-white rounded shadow-sm">
                <div class="box-head mb-3">
                    <h3 class="text-primary">Bài viết mới</h3>
                </div>
                <div class="box-body">
                    <ul class="list-post list-unstyled">
                        @foreach ($posts as $index => $post)
                            <li class="d-flex mb-4 border-bottom pb-3">
                                <a href="{{ route('client-post.show', $post->slug) }}" class="post-thumb flex-shrink-0 me-3">
                                    <img style="width: 120px; height: 80px; object-fit: cover;" 
                                         class="rounded" 
                                         src="{{ asset('storage/photos/19/post/' . $post->image) }}" alt="" />
                                </a>
                                <div class="more-info">
                                    <a href="{{ route('client-post.show', $post->slug) }}" class="post-title text-dark fw-bold mb-2 d-block">
                                        {{ $post->title }}
                                    </a>
                                    <div class="post-published small text-muted">
                                        <span class="post-author fw-semibold">{{ $post->user->fullname }}</span>
                                        <span class="post-date">• {{ $post->formatted_created_at }}</span>
                                    </div>
                                    <p class="post-excerpt mt-2">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($post->content), 100, '...') }}
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div id="side-bar" class="col-lg-4 col-md-12">
            <div class="ads mb-4 d-flex justify-content-center">
                <a href="#">
                    <img class="img-fluid rounded shadow" src="{{ asset('storage/images/logo.png') }}" alt="Advertisement" />
                </a>
            </div>
            
            <div class="box top-topic p-3 bg-white rounded shadow-sm">
                <div class="box-head mb-3">
                    <h3 class="text-primary">Chủ đề quan tâm</h3>
                </div>
                <div class="box-body">
                    <ul class="list-topic list-unstyled">
                        @foreach ($categories as $index => $category)
                            <li class="mb-2">
                                <a href="#" class="text-dark d-flex justify-content-between align-items-center">
                                    <span>{{ $category->name }}</span>
                                    <span class="badge bg-primary rounded-pill">{{ $category->posts_count }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
