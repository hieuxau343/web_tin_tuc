@extends('layouts.main')
@section('name_page', 'Danh mục')
@section('content')
    <table class="table" style="min-height: 204px">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Slug</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Ngày cập nhật</th>
                <th scope="col" colspan="2"><a href="{{ route('category.create') }}" class='text-primary'>Thêm</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $index => $category)
                <tr id="row-{{ $category->id }}">
                    <th scope="row">{{ ($categories->currentPage() - 1) * $categories->perPage() + $index + 1 }}</th>
                    <td class="categoryName">{{ $category->name }}</td>
                    <td class="categorySlug">{{ $category->slug }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td class="categoryUpdate">{{ $category->updated_at }}</td>
                    <td><a href="#" class='text-warning btn-edit' data-id="{{ $category->id }}">Sửa</a></td>
                    <td><a href="#" class='text-danger btn-delete' data-id="{{ $category->id }}">Xóa</a></td>
                </tr>
            @endforeach
        </tbody>

    </table>
    <!-- Thanh phân trang -->
    <nav aria-label="...">
        <ul class="pagination justify-content-end">
            <!-- Liên kết "Previous" -->
            @if ($categories->currentPage() > 1)
                <li class="page-item">
                    <a class="page-link bg-warning" href="{{ $categories->previousPageUrl() }}">
                        Previous
                    </a>
                </li>
            @endif

            <!-- Liên kết các số trang -->
            @foreach ($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                <li class="page-item {{ $page == $categories->currentPage() ? 'active' : '' }}">
                    <a class="page-link text-black" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

            <!-- Liên kết "Next" -->
            @if ($categories->hasMorePages())
                <li class="page-item">
                    <a class="page-link bg-success" href="{{ $categories->nextPageUrl() }}">
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
