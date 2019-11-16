@extends('backend.layouts.master')
@section('content-header')
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tạo sản phẩm</h1>
            </div><!-- /.col -->
            @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('error') }}
                    </div> 
                @endif
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Tạo sản phẩm</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
@endsection
<!-- Content Header -->
@section('content')
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tạo sản phẩm</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('backend.product.store') }}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm :<span style="color: #dc3545;">*</span></label>
                                @error('name')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <input type="text" class="form-control" id="" placeholder="Điền tên sản phẩm " name="name" value="{{ old('name') }}">
                                {{-- @if($errors->has('name'))
                                    <div class="alert alert-danger">Lỗi</div>
                                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                                @endif --}}
                            </div>
                            <div class="form-group">
                                <label>Danh mục sản phẩm :<span style="color: #dc3545;">*</span></label>
                                @error('category_id')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <select name="category_id" class="form-control select2" style="width: 100%;">
                                    <option>--Chọn danh mục---</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
 {{--                            <div class="form-group">
                                <label>Thương hiệu sản phẩm</label>
                                <select class="form-control select2" style="width: 100%;">
                                    <option>-Chọn thương hiệu-</option>
                                    <option>Apple</option>
                                    <option>Samsung</option>
                                    <option>Nokia</option>
                                    <option>Oppo</option>
                                </select>
                            </div> --}}
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Giá khuyến mại :<span style="color: #dc3545;">*</span></label>
                                        @error('sale_price')
                                            <a style="color: red;"> ! {{ $message }}</a>
                                        @enderror
                                        <input type="text" class="form-control" placeholder="Điền giá khuyến mại" name="sale_price" value="{{ old('sale_price') }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Giá bán :<span style="color: #dc3545;">*</span> </label>
                                        @error('origin_price')
                                            <a style="color: red;">{{ $message }}</a>
                                        @enderror
                                        <input type="text" class="form-control" placeholder="Giá nhập vào" name="origin_price" value="{{ old('origin_price') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả sản phẩm : <span style="color: #dc3545;">*</span></label>
                                @error('content')
                                    <a style="color: red;">{{ $message }}</a>
                                @enderror
                                <textarea class="textarea" name="content" placeholder="Place some text here"
                                          style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('content') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Hình ảnh sản phẩm :<span style="color: #dc3545;">*</span></label>
                                @if(isset($images))
                                    @foreach($images as $image)
                                        <a data-toggle="modal" data-target="#exampleModalCenter-{{$image->id}}"><img src="/{{ $image->path }}" width=100px height=100px></a>
                                    @endforeach
                                @endif
                                @error('images')
                                    <a style="color: red;">! {{ $message }}</a>
                                @enderror
                                @error('images.*')
                                    <a style="color: red;">! {{ $message }}</a>
                                @enderror
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="images[]" multiple>
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                               {{--  @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif --}}
                            </div>
                            <div class="form-group">
                                <label>Trạng thái sản phẩm : <span style="color: #dc3545;">*</span></label>
                                @error('status')
                                    <a style="color: red;">! {{ $message }}</a>
                                @enderror
                                <select name="status" class="form-control select2" style="width: 100%;">
                                    <option>--Chọn trạng thái---</option>
                                    <option value="0">Đang nhập</option>
                                    <option value="1">Mở bán</option>
                                    <option value="2">Hết hàng</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="{{ route('backend.product.index') }}" class="btn btn-default">Huỷ bỏ</a>
                            <button type="submit" class="btn btn-success">Tạo mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection