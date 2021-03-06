@extends('backend.layouts.master')
@section('content-header')
	<div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tạo danh mục</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Danh mục</a></li>
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
                        <h3 class="card-title">Tạo mới danh mục</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('backend.category.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name: <span style="color: #dc3545;">*</span></label>
                                @error('name')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <input value="{{old('name')}}" name="name" type="text" class="form-control" id="" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label>Danh mục cha</label>
                                <select name="parent_id" class="form-control select2" style="width: 100%;">
                                    <option value="0">--Danh mục cha---</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ảnh: <span style="color: #dc3545;">*</span></label>
                                @error('images')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="images" multiples>
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Mô tả: <span style="color: #dc3545;">*</span></label>
                                @error('description')
                                    <a style="color: red;"> ! {{ $message }}</a>
                                @enderror
                                <input value="{{ old('description') }}" name="description" type="text" class="form-control" id="" placeholder="Mô tả">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="{{ route('backend.category.index') }}" class="btn btn-default">Huỷ bỏ</a>
                            <button type="submit" class="btn btn-success">Tạo mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection