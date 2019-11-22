@extends('fontend.layouts.master')
@section('css')
	<link rel="stylesheet" type="text/css" href="/fontend/styles/bootstrap4/bootstrap.min.css">
	<link href="/fontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="/fontend/styles/cart_styles.css">
	<link rel="stylesheet" type="text/css" href="/fontend/styles/cart_responsive.css">
@endsection
@section('content')
	<div class="row" style="padding: 20px;">
            <div class="col-md-8" style="margin: 0 auto;">
                <!-- general form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin giao hàng</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('fontend.orderstore') }}" enctype="multipart/form-data">
                         {{csrf_field()}}
                        <div class="card-body col-md-6" style="float: left;">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Họ và Tên: <span style="color: #dc3545;">*</span></label>
                                @error('name')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <input style="border-top: none; border-right: none;border-left: none; " name="name" type="text" value="{{ Auth::user()->name }}" class="form-control" id="" placeholder="Nhập tên">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email: <span style="color: #dc3545;">*</span></label>
                                @error('email')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <input style="border-top: none; border-right: none;border-left: none; " name="email" type="email" class="form-control" value="{{ Auth::user()->email }}" placeholder="Nhập email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số điện thoại: <span style="color: #dc3545;">*</span></label>
                                @error('phone')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <input style="border-top: none; border-right: none;border-left: none; " name="phone" type="text" class="form-control" value="{{ Auth::user()->phone }}" placeholder="Nhập số điện thoại">
                            </div>
                        </div>
                        <div class="card-body col-md-6" style="float: left;">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ nhận hàng: <span style="color: #dc3545;">*</span></label>
                                @error('address')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <input style="border-top: none; border-right: none;border-left: none; " name="address" type="text" class="form-control" value="{{ old('address') }}" placeholder="Nhập địa chỉ" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tỉnh/Thành phố:</label>
                                @error('city')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <input style="border-top: none; border-right: none;border-left: none; " name="city" type="text" class="form-control" value="{{ old('city') }}" placeholder="Nhập tỉnh/thành phố" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Quận/Huyện </label>
                                @error('district')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <input style="border-top: none; border-right: none;border-left: none; " name="district" type="text" class="form-control" value="{{ old('district') }}" placeholder="Nhập quận/huyện" >
                            </div>
                        </div>
                        <p style="clear: both;"></p>
                        <!-- /.card-body -->
                        <div style="margin-top: 45px; padding: 20px">
                        	<a href="{{ route('fontend.indexcart') }}" style="padding: 10px 30px;" class="btn btn-secondary">huỷ</a>
                            <button type="submit" style="padding: 10px 30px;" class="btn btn-success">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
@section('js')
	<script src="/fontend/js/jquery-3.3.1.min.js"></script>
	<script src="/fontend/styles/bootstrap4/popper.js"></script>
	<script src="/fontend/styles/bootstrap4/bootstrap.min.js"></script>
	<script src="/fontend/plugins/greensock/TweenMax.min.js"></script>
	<script src="/fontend/plugins/greensock/TimelineMax.min.js"></script>
	<script src="/fontend/plugins/scrollmagic/ScrollMagic.min.js"></script>
	<script src="/fontend/plugins/greensock/animation.gsap.min.js"></script>
	<script src="/fontend/plugins/greensock/ScrollToPlugin.min.js"></script>
	<script src="/fontend/plugins/easing/easing.js"></script>
	<script src="/fontend/js/cart_custom.js"></script>
@endsection