@extends('layouts.add')

@section('name','Thành viên')
@section('action_url', route('account.store'))

@section('form_content')

<div class="mb-3">
  <label for="accountName" class="form-label">Họ và tên</label>
  <input type="text" class="form-control" id="accountName" name="name" required>
</div>
<div class="mb-3">
  <label for="accountUserName" class="form-label">Tên đăng nhập</label>
  <input type="text" class="form-control" id="accountUserName" name="username" required>
</div>
<div class="mb-3">
  <label for="accountPass" class="form-label">Mật khẩu</label>
  <input type="password" class="form-control" id="accountUserName" name="password" required>
</div>
<div class="mb-3">
  <label for="accountEmail" class="form-label">Email</label>
  <input type="email" class="form-control" id="accountEmail" name="email" required>
</div>
<div class="mb-3">
  <label for="accountPhone" class="form-label">Số điện thoại</label>
  <input type="number" class="form-control" id="accountPhone" name="phone" maxlength="10" required>
</div>
<div class="mb-3">
  <div>
      <label for="accountGender" class="form-label">Giới tính</label>
      
      <input type="radio" id="male" name="gender" value="Nam" required>
      <label for="male">Nam</label>
  
      <input type="radio" id="female" name="gender" value="Nữ">
      <label for="female">Nữ</label>
  </div>
  
</div>
<div class="mb-3">
  <label for="accountBirthday" class="form-label">Ngày sinh</label>
  <input type="date" id="accountDateOfBirth" name="birthday" class="form-control" required>
</div>
<div class="mb-3">
  <label for="accountRole" class="form-label">Quyền</label>
  <select name="role" id="accountRole" class="form-control">
      <option value="Admin">Người quản trị</option>
      <option value="User">Người dùng</option>
  </select>
</div>
    <button type="submit" class="btn btn-primary">Thêm danh mục</button>
  
@endsection