@extends('backend.layouts.master')
@section('content-header')
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Đổi mật khẩu</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Mật khẩu</a></li>
                    <li class="breadcrumb-item active">Đổi mật khẩu</li>
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
                        <h3 class="card-title">Đổi mật khẩu</h3>
                    </div>
                    @if(session()->has('error5'))
                            <div class="alert alert-danger" role="alert">
                                {{ session()->get('error5') }}
                            </div> 
                        @endif
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form style="padding: 30px 50px;" role="form" method="post" action="{{ route('backend.user.updatepass',$user->id) }}">
                         {{csrf_field()}}
                         <input name="_method" type="hidden" value="PUT">
                         <div class="form-group">
                            <label for="exampleInputEmail1">Mật khẩu cũ :<span style="color: #dc3545;">*</span></label>
                                <input class="form-control" placeholder="Nhập mật khẩu cũ" name="passwordold">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật khẩu mới :<span style="color: #dc3545;">*</span></label>
                                <input class="form-control" placeholder="Mật khẩu mới" name="passwordnew">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nhập lại mật khẩu mới :<span style="color: #dc3545;">*</span></label>
                                <input class="form-control" placeholder="Nhập lại mật khẩu" name="repasswordnew">
                            </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{ route('backend.dashboard') }}" class="btn btn-default">Huỷ bỏ</a>
                            <button type="submit" class="btn btn-primary">Lưu
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
