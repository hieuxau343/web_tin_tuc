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
                <th scope="col" colspan="2"><a href="{{ route('account.create') }}" class='text-primary'>Thêm</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($advers as $index => $adv)
                <tr id="row-{{ $adv->id }}">
                    <th scope="row">{{ ($advers->currentPage() - 1) * $advers->perPage() + $index + 1 }}</th>
                    <td class="advTitle">{{ $adv->title }}</td>
                    <td class="advSlug">{{ $adv->slug }}</td>
                    <td>{{ $adv->created_at }}</td>
                    <td class="advUpdate">{{ $adv->updated_at }}</td>
                    <td><a href="#" class='text-warning btn-edit' data-id="{{ $adv->id }}">Sửa</a></td>
                    <td><a href="#" class='text-danger btn-delete' data-id="{{ $adv->id }}">Xóa</a></td>
                </tr>
            @endforeach
        </tbody>

    </table>

@endsection
