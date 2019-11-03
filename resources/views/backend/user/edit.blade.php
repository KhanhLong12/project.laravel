@extends('backend.layouts.master')
@section('content-header')
		<div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Chỉnh sửa thông tin</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Người dùng</a></li>
                    <li class="breadcrumb-item active">Chỉnh sửa</li>
                </ol>
            </div><!-- /.col -->
        </div>
@endsection
@section('content')
		<div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Chỉnh sửa thông tin</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('backend.user.update', $item->id) }}">
                         {{csrf_field()}}
                         <input name="_method" type="hidden" value="PUT">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Họ và Tên</label>
                                <input name="username" type="text" class="form-control" id="" placeholder="Name" value="{{ $item->name }}">
                                @error('username')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số điện thoại</label>
                                <input name="phone" type="text" class="form-control" id="" placeholder="phone" value="{{ $item->phone }}">
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Quyền</label>
                                <select name="role" class="form-control select2" style="width: 100%;">
                                    <option>--Chọn quyền---</option>
                                    <option value="1" @if($item->role == 1) selected @endif>Admin</option>
                                    <option value="0" @if($item->role == 0) selected @endif>User</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{ route('backend.user.index') }}" class="btn btn-default">Huỷ bỏ</a>
                            <button type="submit" class="btn btn-sucess">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection