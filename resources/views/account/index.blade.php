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
        <td id="accountName">{{$account->fullname}}</td>
        <td id="accountEmail">{{$account->email}}</td>
        <td id="accountPhone">{{$account->phone}}</td>
        <td id="accountGender">{{$account->gender}}</td>
        <td id="accountBirth">{{$account->birthday}}</td>
        <td id="accountRole">{{$account->role}}</td>
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
@endsection