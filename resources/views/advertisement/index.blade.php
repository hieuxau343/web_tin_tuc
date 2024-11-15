@extends('layouts.main')
@section('name_page',"Quảng cáo")

@section('content')
<table class="table" style="min-height: 204px">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Họ và tên</th>
        <th scope="col">Email</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Giới tính</th>
        <th scope="col">Ngày sinh</th>
        <th scope="col">Quyền</th>
        <th scope="col" colspan="2"><a href="{{route('account.create')}}" class='text-primary'>Thêm</a></th>
      </tr>
    </thead>
</table>

@endsection