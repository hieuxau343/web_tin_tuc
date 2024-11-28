@extends('layouts.add')

@section('name', $is_edit ? 'Chỉnh sửa tin tức' : 'Thêm tin tức')

@section('action_url', $is_edit ? route('post.update', $data->id) : route('post.store'))



@section('form_content')

    <div class="mb-3">
        <h3 for="post-title" class="form-label">Tiêu đề</h3>
        <input type="text" name="title" class="form-control"
            value="  @if ($is_edit && $data->title) {{ $data->title }} @endif">

        </input>

    </div>


    <div class="mb-3">
        <h3 for="image" class="form-label">Hình ảnh</h3>
        <input type="file" class="form-control" id="image" name="image" accept="image/*">
        @if ($is_edit && $data->image)
            <img id="preview" src="{{ asset('storage/photos/19/post/' . $data->image) }}" alt="Xem trước hình ảnh"
                style="max-width: 20%; margin-top: 10px;">
            <button id="clearPreview" type="button" style="display: block; margin-top: 10px;">Xóa ảnh</button>
        @else
            <img id="preview" src="#" alt="Xem trước hình ảnh"
                style="display: none; max-width: 20%; margin-top: 10px;">
        @endif
    </div>

    <div class="mb-3">
        <h3 for="post-content" class="form-label">Nội dung</h3>
        <textarea name="content">   
            @if ($is_edit && $data->content)
{!! $data->content !!}
@endif    
</textarea>
    </div>



    <div class="mb-3">
        <h3 for="post-status" class="form-label">Tình Trạng</h3>
        <select name="status" id="post-status" class="form-control">
            <option value="ACTIVE" {{ $is_edit && $data->status == 'ACTIVE' ? 'selected' : '' }}>ACTIVE</option>
            <option value="INACTIVE" {{ $is_edit && $data->status == 'INACTIVE' ? 'selected' : '' }}>INACTIVE</option>
        </select>
    </div>

    <div class="mb-3">
        <h3 for="post-category" class="form-label">Tên danh mục</h3>
        <select name="category" id="post-category" class="form-control">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if ($is_edit && $data->category_id == $category->id) selected @endif>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    <input type="hidden" name="user_id" value="{{ $currentUser->id }}">

    <button type="submit" class="btn form-control {{ $is_edit ? 'btn-warning' : 'btn-primary' }}">
        {{ $is_edit ? 'Lưu' : 'Thêm mới' }}
    </button>

@endsection

@section('js-custom')
    <script>
        ClassicEditor
            .create(document.querySelector('#post-title'))
            .catch(error => {
                console.log(error);
            });
        CKEDITOR.replace('post-content', {
            removePlugins: 'notification',
            // Các cấu hình khác của CKEditor
        });
    </script>
@endsection
