@extends('layouts.add')

@section('name', $is_edit ? 'Chỉnh sửa quảng cáo' : 'Thêm quảng cáo')

@section('action_url', $is_edit ? route('advertisement.update', $data->id) : route('advertisement.store'))



@section('form_content')

    <div class="mb-3">
        <h3 for="adv-title" class="form-label">Tiêu đề</h3>
        <textarea class="form-control" id="adv-title" name="title">{{ $is_edit ? $data->title : old('title') }}</textarea>
    </div>

    <div class="mb-3">
        <h3 for="image" class="form-label">Hình ảnh</h3>
        <input type="file" class="form-control" id="image" name="image" accept="image/*">
        <!-- Hiển thị ảnh hiện tại khi chỉnh sửa -->
        @if ($is_edit && $data->image)
            <img id="preview" src="{{ asset('images/' . $data->image) }}" alt="Xem trước hình ảnh"
                style="max-width: 20%; margin-top: 10px;">
            <button id="clearPreview" type="button" style="display: block; margin-top: 10px;">Xóa ảnh</button>
        @else
            <img id="preview" src="#" alt="Xem trước hình ảnh"
                style="display: none; max-width: 20%; margin-top: 10px;">
        @endif
    </div>

    <div class="mb-3">
        <h3 for="adv-link" class="form-label">Link</h3>
        <textarea class="form-control" id="adv-link" name="link">{{ $is_edit ? $data->link : old('link') }}</textarea>
    </div>

    <div class="mb-3">
        <h3 for="adv-status" class="form-label">Tình Trạng</h3>
        <select name="status" id="adv-status" class="form-control">
            <option value="ACTIVE" {{ $is_edit && $data->status == 'ACTIVE' ? 'selected' : '' }}>ACTIVE</option>
            <option value="INACTIVE" {{ $is_edit && $data->status == 'INACTIVE' ? 'selected' : '' }}>INACTIVE</option>
        </select>
    </div>

    <button type="submit" class="btn form-control {{ $is_edit ? 'btn-warning' : 'btn-primary' }}">
        {{ $is_edit ? 'Lưu' : 'Thêm mới' }}
    </button>

@endsection

@section('js-custom')
    <script>
        ClassicEditor
            .create(document.querySelector('#adv-title'))
            .catch(error => {
                console.log(error);
            });
        ClassicEditor
            .create(document.querySelector('#adv-link'))
            .catch(error => {
                console.log(error);
            });
    </script>
@endsection
