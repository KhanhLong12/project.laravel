@extends('backend.layouts.master')
@section('content-header')
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Chi tiết sản phẩm</h1>
                <a href="{{ route('backend.user.index') }}" class="btn btn-primary">Về trang danh sách</a>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
                    <li class="breadcrumb-item active">Thông tin tài khoản</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
@endsection
@section('content')
    <table class="table table-striped">
        <hr width="100%">
            <tr>
              <th scope="row">Họ tên: </th>
              <td>{{ $user->name }}</td>
            </tr>
            <tr>
              <th scope="row">hình ảnh: </th>
                <td>
                    <img style="padding:0 10px;" width=200px height=200px src="{{ url($user->avatar) }}">
                </td>
            </tr>
            <tr>
              <th scope="row">Email: </th>
              <td>{{ $user->email }}</td>
            </tr>
            <tr>
              <th scope="row" style="width: 15%">Số điện thoại: </th>
              <td>{{ $user->phone }}</td>
            </tr>
            <tr>
              <th scope="row">Giới tính: </th>
                @if($user->sex == 0)
                  <td>chưa xác định</td>
                @elseif($user->sex == 1)
                  <td>nam</td>
                @elseif($user->sex == 2)
                  <td>nữ</td>
                @endif
            </tr>
            <tr>
              <th scope="row">Quyền : </th>
                @if($user->role == 2)
                  <td>Quản lý</td>
                @elseif($user->role == 0)
                  <td>Người sử dụng</td>
                @endif
            </tr>
        </table>
@endsection