@extends('layouts.add')

@section('name', 'Thêm Danh mục')
@section('action_url', route('category.store'))

@section('form_content')

    <div class="mb-3">
        <label for="category_name" class="form-label">Tên danh mục</label>
        <input type="text" class="form-control" id="category_name" name='name'>
    </div>
    <div class="mb-3">
        <label for="slug_name" class="form-label">Slug</label>
        <input type="text" class="form-control" id="slug_name" name='slug'>
    </div>

    <button type="submit" class="btn btn-primary">Thêm danh mục</button>

@endsection
