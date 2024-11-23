@extends('layouts.main')
@section('name_page', 'Quảng cáo')

@section('content')
    <table class="table" style="min-height: 204px">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tiêu đề </th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Link</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Ngày cập nhật</th>
                <th scope="col">Trạng thái</th>
                <th scope="col" colspan="2"><a href="{{ route('advertisement.create') }}" class='text-primary'>Thêm</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($advers as $index => $adv)
                <tr id="row-{{ $adv->id }}">
                    <th scope="row">{{ ($advers->currentPage() - 1) * $advers->perPage() + $index + 1 }}</th>
                    <td class="advTitle">{!! $adv->title !!}</td>
                    <td class="advImg"><img src="{{ asset('storage/photos/19/advertisement/' . $adv->image) }}"
                            alt=""></td>
                    <td><a class='text-primary' href="{{ $adv->link }}">{!! $adv->link !!}</a></td>
                    <td class="advCreated">{{ $adv->formatted_created_at }}</td>
                    <td class="advUpdated">{{ $adv->formatted_updated_at }}</td>
                    <td class="advStatus">{{ $adv->status }}</td>
                    <td><a href="{{ route('advertisement.edit', $adv->id) }}" class='text-warning '
                            data-id="{{ $adv->id }}">Sửa</a>
                    </td>
                    <td><a href="" class='text-danger btn-delete' data-id="{{ $adv->id }}">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    <!-- Thanh phân trang -->
    <nav aria-label="...">
        <ul class="pagination justify-content-end">
            <!-- Liên kết "Previous" -->
            @if ($advers->currentPage() > 1)
                <li class="page-item">
                    <a class="page-link bg-warning" href="{{ $advers->previousPageUrl() }}">
                        Previous
                    </a>
                </li>
            @endif

            <!-- Liên kết các số trang -->
            @foreach ($advers->getUrlRange(1, $advers->lastPage()) as $page => $url)
                <li class="page-item {{ $page == $advers->currentPage() ? 'active' : '' }}">
                    <a class="page-link text-black" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

            <!-- Liên kết "Next" -->
            @if ($advers->hasMorePages())
                <li class="page-item">
                    <a class="page-link bg-success" href="{{ $advers->nextPageUrl() }}">
                        Next
                    </a>
                </li>
            @endif
        </ul>
    </nav>

    {{-- Chinh sua quang cao --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Chỉnh sửa quảng cáo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" name="id" id="editId">
                        <div class="mb-3">
                            <label for="editTitle" class="form-label">Tiêu đề</label>
                            <textarea type="text" class="form-control" id="editTitle" name="title" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editImg" class="form-label">Hình ảnh</label>
                            <input type="file" class="form-control" id="editImg" name="image" required>
                            {{-- Hien thi neu co hinh anh --}}
                            <img id="previewImg" src="" alt="Preview"
                                style="max-width: 100px; margin-top: 10px; display: none;">

                        </div>
                        <div class="mb-3">
                            <label for="editLink" class="form-label">Link</label>
                            <textarea type="file" class="form-control" id="editLink" name="link" required></textarea>
                        </div>



                        <div class="mb-3">
                            <label for="editStatus" class="form-label">Tình trạng</label>
                            <select name="status" id="editStatus" class="form-control">
                                <option value="ACTIVE">ACTIVE</option>
                                <option value="INACTIVE">INACTIVE</option>
                            </select>
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

@section('js-custom')
    <script>
        let editTitleEditor, editLinkEditor;

        ClassicEditor
            .create(document.querySelector('#editTitle'))
            .then(editor => {
                editTitleEditor = editor;
            })
            .catch(error => console.error(error));

        ClassicEditor
            .create(document.querySelector('#editLink'))
            .then(editor => {
                editLinkEditor = editor;
            })
            .catch(error => console.error(error));
    </script>
@endsection
