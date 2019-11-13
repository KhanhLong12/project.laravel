@extends('backend.layouts.master')
@section('content-header')
		<div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tạo người dùng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Người dùng</a></li>
                    <li class="breadcrumb-item active">Tạo mới</li>
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
                        <h3 class="card-title">Tạo mới người dùng</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('backend.user.store') }}" enctype="multipart/form-data">
                         {{csrf_field()}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Họ và Tên :<span style="color: #dc3545;">*</span></label>
                                @error('username')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <input name="username" type="text" class="form-control" id="" placeholder="Name" value="{{ old('username') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email :<span style="color: #dc3545;">*</span></label>
                                @error('email')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <input name="email" type="email" class="form-control" id="" placeholder="Email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số điện thoại :</label>
                                @error('phone')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <input name="phone" type="text" class="form-control" id="" placeholder="phone" value="{{ old('phone') }}">
                            </div>
                            <div class="form-group">
                                <label>Giới tính :<span style="color: #dc3545;">*</span></label>
                                @error('sex')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <select name="sex" class="form-control select2" style="width: 100%;">
                                    <option>--Chọn giới tính---</option>
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                    <option value="0">Chưa xác định</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật khẩu :<span style="color: #dc3545;">*</span></label>
                                @error('password')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <input name="password" type="password" class="form-control" id="" placeholder="password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">ảnh đại diện :</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="images" multiple>
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Quyền :<span style="color: #dc3545;">*</span></label>
                                @error('role')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <select name="role" class="form-control select2" style="width: 100%;">
                                    <option>--Chọn quyền---</option>
                                    <option value="2">Quản lý</option>
                                    <option value="0">User</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="{{ route('backend.user.index') }}" class="btn btn-default">Huỷ bỏ</a>
                            <button type="submit" class="btn btn-success">Tạo mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection