@extends('layouts.add')

@section('name', 'Thành viên')
@section('action_url', route('user.store'))

@section('form_content')


    <div class="mb-3">
        <label for="userEmail" class="form-label">Email</label>
        <input type="email" class="form-control" id="userEmail" name="email"
            value="{{ $is_edit && $data->email ? $data->email : '' }}">

    </div>
    <div class="mb-3">
        <label for="userPass" class="form-label">Mật khẩu</label>
        <input type="password" class="form-control" id="userUserName" name="password" autocomplete="off">
    </div>


    <div class="mb-3">
        <label for="userRole" class="form-label">Quyền</label>
        <select name="role" id="userRole" class="form-control">
            <option value="">-- Chọn quyền --</option>
            <option value="ADMIN" {{ $is_edit && $data->role == 'ADMIN' ? 'selected' : '' }}>Người quản trị</option>
            <option value="USER" {{ $is_edit && $data->role == 'USER' ? 'selected' : '' }}>Người dùng</option>
        </select>

    </div>
    <button type="submit" class="btn btn-primary">Thêm thành viên</button>

@endsection
