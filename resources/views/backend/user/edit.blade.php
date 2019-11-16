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
                    <form role="form" method="post" action="{{ route('backend.user.update', $item->id) }}" enctype="multipart/form-data">
                         {{csrf_field()}}
                         <input name="_method" type="hidden" value="PUT">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Họ và Tên :<span style="color: #dc3545;">*</span></label>
                                @error('username')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <input name="username" type="text" class="form-control" id="" placeholder="Name" value="{{ $item->name }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email :<span style="color: #dc3545;">*</span></label>
                                @error('email')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <input name="email" type="email" class="form-control" placeholder="Email" value="{{ $item->email }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số điện thoại :</label>
                                @error('phone')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <input name="phone" type="text" class="form-control" id="" placeholder="phone" value="{{ $item->phone }}">
                            </div>
                            <div class="form-group">
                                <label>Giới tính: <span style="color: #dc3545;">*</span></label>
                                @error('sex')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <select name="sex" class="form-control select2" style="width: 100%;">
                                    <option>--Chọn giới tính---</option>
                                    <option value="1" @if($item->sex == 1) selected @endif>Nam</option>
                                    <option value="2" @if($item->sex == 2) selected @endif>Nữ</option>
                                    <option value="0" @if($item->sex == 0) selected @endif>Chưa xác định</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">ảnh đại diện :</label>
                                <img style="height: 100px; width: 100px;" src="/{{ $item->avatar }}" name="img">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" src="/{{ $item->avatar }}" class="custom-file-input" id="exampleInputFile" name="images" multiple>
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Quyền :</label>
                                @error('role')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <select name="role" class="form-control select2" style="width: 100%;">
                                    <option>--Chọn quyền---</option>
                                    <option value="1" @if($item->role == 1) selected @endif>Admin</option>
                                    <option value="2" @if($item->role == 2) selected @endif>Quản lý</option>
                                    <option value="0" @if($item->role == 0) selected @endif>User</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{ route('backend.user.index') }}" class="btn btn-default">Huỷ bỏ</a>
                            <button type="submit" class="btn btn-success">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection