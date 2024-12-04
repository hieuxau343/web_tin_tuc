@extends('client.layouts.main')

@section('title', 'Kết quả tìm kiếm') <!-- Phần này gán tiêu đề -->

@section('content') <!-- Đây là phần nội dung chính -->
    <div class="container">
        <h3>Kết quả tìm kiếm cho: "{{ $query }}"</h3>

        @if($results->isEmpty())
            <p>Không tìm thấy kết quả nào.</p>
        @else
            <div class="row">
                @foreach($results as $result)
                    <div class="col-md-4 mb-4">
                        <!-- Thẻ chứa bài viết -->
                        <div class="card">
                            <!-- Hình ảnh bài viết -->
                            <img class="card-img-top" 
                                 src="{{ asset('storage/photos/19/post/' . $result->image) }}" 
                                 alt="{{ $result->title }}" 
                                 style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <!-- Tiêu đề bài viết -->
                                <h5 class="card-title">
                                    <a href="{{ route('client-post.show', $result->slug) }}" class="text-dark">
                                        {{ $result->title }}
                                    </a>
                                </h5>
                                <!-- Tác giả và ngày đăng -->
                                <p class="card-text text-muted">
                                    <small>Đăng bởi {{ $result->user->fullname }} vào ngày {{ $result->formatted_created_at }}</small>
                                </p>
                                <!-- Nội dung tóm tắt -->
                                <p class="card-text">
                                    {{ \Illuminate\Support\Str::limit(strip_tags(html_entity_decode($result->content)), 100) }}
                                </p>
                                <!-- Nút đọc thêm -->
                                <a href="{{ route('client-post.show', $result->slug) }}" class="btn btn-primary btn-sm">
                                    Đọc thêm
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
