@extends('layouts.add')

@section('name', 'Quảng cáo')
@section('action_url', route('advertisement.store'))

@section('form_content')

    <div class="mb-3">
        <label for="adv-title" class="form-label">Tiêu đề</label>
        <textarea class="form-control" id="adv-title" name="title"></textarea>

    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Hình ảnh</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/*">
        <img id="preview" src="#" alt="Xem trước hình ảnh"
            style="display: none; max-width: 20%; margin-top: 10px; ">
        <button id="clearPreview" type="button" style="display: none; margin-top: 10px;">Xóa ảnh</button>

    </div>

    <div class="mb-3">
        <label for="adv-link" class="form-label">Link</label>
        <textarea class="form-control" id="adv-link" name="link"></textarea>
    </div>

    <div class="mb-3">
        <label for="adv-status" class="form-label">Tình Trạng</label>
        <select name="status" id="adv-status" class="form-control">
            <option value="ACTIVE">ACTIVE</option>
            <option value="INACTIVE">INACTIVE</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Thêm quảng cáo</button>
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
