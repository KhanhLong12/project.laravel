@extends('backend.layouts.master')
@section('content-header')
		<div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Chỉnh sửa thông tin</h1>
                @if(session()->has('success4'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success4') }}
                    </div> 
                @endif
                @if(session()->has('success3'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success3') }}
                    </div> 
                @endif
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Chỉnh sửa</li>
                </ol>
            </div><!-- /.col -->
        </div>
@endsection
@section('content')
		<div class="row">
            <div class="col-md-4">
                <div class="card">
                    <form style="height: 530px;" role="form" method="post" action="{{ route('backend.user.updateimage', $user->id) }}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="PUT">
                        <div class="form-group" style="text-align: center;padding-top: 10px;">
                                <label for="exampleInputEmail1"><i class="far fa-image"></i> ảnh đại diện</label>
                                <br>
                                <img style="height: 250px; width: 250px;border-radius:50%;margin-bottom: 10%;border: 6px solid white; box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);" src="/{{ $user->avatar }}" name="img">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <label class="btn btn-primary" style="width: 70%;margin: 0 auto;"><input style="height: 0px;width: 0px;" type="file" src="/{{ $user->avatar }}" class="custom-file-input" id="exampleInputFile" name="images" multiple><i class="fas fa-camera-retro"></i> Chọn ảnh</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group">
                                <button type="submit" style="width: 70%;margin: 0 auto;" class="btn btn-success"><i class="fas fa-save"></i> Lưu</button>
                            </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cài đặt thông tin</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" style="height: 485px;" method="post" action="{{ route('backend.user.updateinfo', $user->id) }}" enctype="multipart/form-data">
                         {{csrf_field()}}
                         <input name="_method" type="hidden" value="PUT">
                        <div class="card-body col-md-6" style="float: left;">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Họ và Tên: <span style="color: #dc3545;">*</span></label>
                                @error('username')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <input style="border-top: none; border-right: none;border-left: none; " name="fullname" type="text" class="form-control" id="" placeholder="Name" value="{{ $userInfo->fullname }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email: <span style="color: #dc3545;">*</span></label>
                                @error('email')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <input style="border-top: none; border-right: none;border-left: none; " name="email" type="email" class="form-control" placeholder="email" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số điện thoại</label>
                                @error('phone')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <input style="border-top: none; border-right: none;border-left: none; " name="phone" type="text" class="form-control" id="" placeholder="phone" value="{{ $user->phone }}">
                            </div>
                            <div class="form-group">
                                <label>Giới tính: <span style="color: #dc3545;">*</span></label>
                                @error('sex')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <select style="border-top: none; border-right: none;border-left: none;" name="sex" class="form-control select2" style="width: 100%;">
                                    <option>--Chọn giới tính---</option>
                                    <option value="1" @if($user->sex == 1) selected @endif>Nam</option>
                                    <option value="2" @if($user->sex == 2) selected @endif>Nữ</option>
                                    <option value="0" @if($user->sex == 0) selected @endif>Chưa xác định</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-body col-md-6" style="float: left;">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ngày sinh</label>
                                @error('birthday')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <input style="border-top: none; border-right: none;border-left: none; " name="birthday" type="date" class="form-control" @if(isset($userInfo->birthday)) value="{{ $userInfo->birthday }}" @elseif(!isset($userInfo->birthday)) value="" @endif>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ</label>
                                @error('address')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <input style="border-top: none; border-right: none;border-left: none; " name="address" type="text" class="form-control" id="" placeholder="Nhập địa chỉ" @if(isset($userInfo->address)) value="{{ $userInfo->address }}" @elseif(!isset($userInfo->birthday)) value="" @endif>
                            </div>
                        </div>
                        <p style="clear: both;"></p>
                        <!-- /.card-body -->
                        <div class="card-footer" style="margin-top: 39px">
                            <a href="{{ route('backend.dashboard') }}" class="btn btn-default">Huỷ bỏ</a>
                            <button type="submit" class="btn btn-success">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection