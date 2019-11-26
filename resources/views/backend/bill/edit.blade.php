@extends('backend.layouts.master')
@section('content-header')
  <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Chỉnh sửa hóa đơn</h1>
                <a href="{{ route('backend.bill.index') }}" class="btn btn-primary">back</a>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Hóa đơn</a></li>
                    <li class="breadcrumb-item active">Chỉnh sửa hóa đơn</li>
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
                        <h3 class="card-title">Sửa hóa đơn</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('backend.bill.updatebill', $bill->id) }}" enctype="multipart/form-data">
                        @csrf
                        <input name="_method" type="hidden" value="PUT">
                        <div class="card-body">
                            <div class="form-group">
                                <label>email: <span style="color: #dc3545;">*</span></label>
                                @error('email')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <input value="{{ $bill->customer_email }}" name="email" type="email" class="form-control" placeholder="Nhập email">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                @error('address')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <input value="{{ $bill->customer_address }}" name="address" type="text" class="form-control" placeholder="Nhập địa chỉ">
                            </div>
                            <div class="form-group">
                                <label>Tên khách hàng</label>
                                @error('name')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <input value="{{ $bill->customer_name }}" name="name" type="text" class="form-control" placeholder="Nhập địa chỉ">
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại: <span style="color: #dc3545;">*</span></label>
                                @error('phone')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <input value="{{ $bill->customer_mobile }}" name="phone" type="text" class="form-control" placeholder="Nhập số điện thoại">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="{{ route('backend.bill.index') }}" class="btn btn-default">Huỷ bỏ</a>
                            <button type="submit" class="btn btn-success">Cập nhập</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection