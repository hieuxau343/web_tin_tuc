@extends('layouts.main')
@section('name_page','Thành viên')
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
    <tbody>
     @foreach ($accounts as $index => $account)
     <tr id="row-{{$account->id}}">
        <th scope="row">{{ ($accounts->currentPage() - 1) * $accounts->perPage() + $index + 1 }}</th>
        <td class="accountName">{{$account->fullname}}</td>
        <td class="accountEmail">{{$account->email}}</td>
        <td class="accountPhone">{{$account->phone}}</td>
        <td class="accountGender">{{$account->gender}}</td>
        <td class="accountBirth">{{$account->birthday}}</td>
        <td class="accountRole">{{$account->role}}</td>
        <td><a href="#" class='text-warning btn-edit' data-id="{{$account->id}}">Sửa</a></td>
        <td><a href="#" class='text-danger btn-delete' data-id="{{$account->id}}">Xóa</a></td>
      </tr>
    
         
     @endforeach
    </tbody>
  
  </table>
  <!-- Thanh phân trang -->
  <nav aria-label="...">
    <ul class="pagination justify-content-end">
        <!-- Liên kết "Previous" -->
        @if ($accounts->currentPage() > 1)
            <li class="page-item">
                <a class="page-link bg-warning" href="{{ $accounts->previousPageUrl() }}">
                    Previous
                </a>
            </li>
        @endif

        <!-- Liên kết các số trang -->
        @foreach ($accounts->getUrlRange(1, $accounts->lastPage()) as $page => $url)
            <li class="page-item {{ $page == $accounts->currentPage() ? 'active' : '' }}">
                <a class="page-link text-black" href="{{ $url }}">{{ $page }}</a>
            </li>
        @endforeach

        <!-- Liên kết "Next" -->
        @if ($accounts->hasMorePages())
            <li class="page-item">
                <a class="page-link bg-success" href="{{ $accounts->nextPageUrl() }}">
                    Next
                </a>
            </li>
        @endif
    </ul>
</nav>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Chỉnh sửa thành viên</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <input type="hidden" name="id" id="editId">
                    <div class="mb-3">
                        <label for="editName" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" id="editName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="editPhone" class="form-label">Số điện thoại</label>
                        <input type="number" class="form-control" id="editPhone" name="phone" maxlength="10" required>
                    </div>
                    <div class="mb-3">
                        <div>
                            <label for="editGender" class="form-label">Giới tính</label>
                            
                            <input type="radio" id="male" name="gender" value="Nam" required>
                            <label for="male">Nam</label>
                        
                            <input type="radio" id="female" name="gender" value="Nữ">
                            <label for="female">Nữ</label>
                        </div>
                        
                    </div>
                    <div class="mb-3">
                        <label for="editDateOfBirth" class="form-label">Ngày sinh</label>
                        <input type="date" id="editDateOfBirth" name="dateOfBirth" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="editRole" class="form-label">Quyền</label>
                        <select name="role" id="editRole" class="form-control">
                            <option value="Admin">Người quản trị</option>
                            <option value="User">Người dùng</option>
                        </select>
                    </div>
                  
                    <button type="submit" class="btn btn-primary btn-save">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
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