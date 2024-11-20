@extends('layouts.main')
@section('name_page', 'Tin tức')
@section('content')
    <table class="table" style="min-height: 204px">
        <thead>
            <tr>
                <th scope="col" style="width:40px">#</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Slug</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Status</th>
                <th style="width:100px" scope="col">Ngày tạo</th>
                <th style="width:150px" scope="col">Ngày cập nhật</th>
                <th style="width:150px" scope="col">Tên danh mục</th>
                <th scope="col" colspan="2"><a href="{{ route('post.create') }}" class='text-primary'>Thêm</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $index => $post)
                <tr id="row-{{ $post->id }}">
                    <th scope="row">{{ ($posts->currentPage() - 1) * $posts->perPage() + $index + 1 }}</th>
                    <td class="postName">{{ $post->title }}</td>
                    <td class="postSlug">{{ $post->slug }}</td>
                    <td class="ellipsis">
                        <img src="" alt="">
                        {{ $post->image }}
                    </td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->status }}</td>
                    <td class="postCreate">{{ $post->formatted_created_at }}</td>
                    <td class="postUpdate">{{ $post->formatted_updated_at }}</td>
                    <td class="postCategoryName text-danger">{{ $post->category->name }}</td>
                    <td><a href="#" class='text-warning btn-edit' data-id="{{ $post->id }}">Sửa</a></td>
                    <td><a href="#" class='text-danger btn-delete' data-id="{{ $post->id }}">Xóa</a></td>
                </tr>
            @endforeach
        </tbody>

    </table>
    <!-- Thanh phân trang -->
    <nav aria-label="...">
        <ul class="pagination justify-content-end">
            <!-- Liên kết "Previous" -->
            @if ($posts->currentPage() > 1)
                <li class="page-item">
                    <a class="page-link bg-warning" href="{{ $posts->previousPageUrl() }}">
                        Previous
                    </a>
                </li>
            @endif

            <!-- Liên kết các số trang -->
            @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                <li class="page-item {{ $page == $posts->currentPage() ? 'active' : '' }}">
                    <a class="page-link text-black" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

            <!-- Liên kết "Next" -->
            @if ($posts->hasMorePages())
                <li class="page-item">
                    <a class="page-link bg-success" href="{{ $posts->nextPageUrl() }}">
                        Next
                    </a>
                </li>
            @endif
        </ul>
    </nav>



    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Chỉnh sửa danh mục</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- FORM --}}
                    <form id="editForm">
                        @csrf
                        <input type="hidden" name="id" id="editId"> <!-- Trường ẩn -->
                        <div class="mb-3">
                            <label for="editName" class="form-label">Tên danh mục</label>
                            <input type="text" class="form-control" id="editName" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="editSlug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="editSlug" name="slug">
                        </div>

                        <button type="submit" class="btn btn-primary btn-save">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Confirm delete --}}
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Xác nhận xóa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
                    <button type="button" class="btn btn-danger btn-confirm" id="confirmDelete">Xác nhận</button>
                </div>
            </div>
        </div>
    </div>


@endsection
