@extends('layouts.add')

@section('name', $is_edit ? 'Chỉnh sửa quảng cáo' : 'Thêm quảng cáo')

@section('action_url', $is_edit ? route('advertisement.update', $data->id) : route('advertisement.store'))




@section('form_content')

    <div class="mb-3">
        <h3 for="adv-title" class="form-label">Tiêu đề</h3>
        <textarea name="title">
@if ($is_edit && $data->title)
{{ $data->title }}
@endif
</textarea>
    </div>


    <div class="mb-3">
        <h3 for="image" class="form-label">Hình ảnh</h3>
        <input type="file" class="form-control" id="image" name="image" accept="image/*">

        <!-- Hiển thị ảnh hiện tại khi chỉnh sửa -->
        @if ($is_edit && $data->image)
            <div id="previewContainer" style="margin-top: 10px;">
                <img id="preview" src="{{ asset('storage/photos/19/advertisement/' . $data->image) }}"
                    alt="Xem trước hình ảnh" style="max-width: 20%; display: block;">
                <button id="clearPreview" type="button" class="btn btn-danger btn-sm mt-2">Xóa ảnh</button>
            </div>
        @else
            <div id="previewContainer" style="margin-top: 10px; display: none;">
                <img id="preview" src="#" alt="Xem trước hình ảnh" style="max-width: 20%; display: none;">
                <button id="clearPreview" type="button" class="btn btn-danger btn-sm mt-2">Xóa ảnh</button>
            </div>
        @endif
    </div>


    <div class="mb-3">
        <h3 for="adv-link" class="form-label">Link</h3>
        <textarea name="link">
@if ($is_edit && $data->link)
{!! $data->link !!}
@endif
</textarea>

    </div>


    <div class="mb-3">
        <h3 for="adv-status" class="form-label">Tình Trạng</h3>
        <select name="status" id="adv-status" class="form-control">
            <option value="ACTIVE" {{ $is_edit && $data->status == 'ACTIVE' ? 'selected' : '' }}>ACTIVE</option>
            <option value="INACTIVE" {{ $is_edit && $data->status == 'INACTIVE' ? 'selected' : '' }}>INACTIVE</option>
        </select>
    </div>

    <input type="submit" class="btn form-control {{ $is_edit ? 'btn-warning' : 'btn-primary' }}">
    {{ $is_edit ? 'Lưu' : 'Thêm mới' }}
    </input>

@endsection
