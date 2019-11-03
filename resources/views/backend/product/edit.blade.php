@extends('backend.layouts.master')
@section('content-header')
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Sửa sản phẩm</h1>
                {{-- @if(session()->has('error1'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('error1') }}
                    </div> 
                @endif --}}
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Chỉnh sửa</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
@endsection
@section('content')
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sửa sản phẩm</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('backend.product.update', $item->id) }}" enctype="multipart/form-data">
                        {{csrf_field()}}
                         <input name="_method" type="hidden" value="PUT">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="" placeholder="Điền tên sản phẩm " name="name" value="{{ $item->name }} ">
                                {{-- @if($errors->has('name'))
                                    <div class="alert alert-danger">Lỗi</div>
                                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                                @endif --}}
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Danh mục sản phẩm</label>
                                <select name="category_id" class="form-control select2" style="width: 100%;">
                                    <option>--Chọn danh mục---</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if($item->category_id == $category->id) Selected @endif >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="form-group">
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
                                        <label>Giá khuyến mại</label>
                                        <input type="text" class="form-control" placeholder="Điền giá khuyến mại" name="sale_price" value=" {{ $item->sale_price }}">
                                        @error('sale_price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Giá bán</label>
                                        <input type="text" class="form-control" placeholder="Giá nhập vào" name="origin_price" value="{{ $item->origin_price }}">
                                        @error('origin_price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                                <textarea class="textarea" name="content" placeholder="Place some text here"
                                          style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> {{ $item->content }}</textarea>
                                        @error('content')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                            </div>
                            <div class="form-group">
                                    <label>Hình ảnh sản phẩm đã có :</label>
                                <br>
                                @foreach($images as $image)
                                    <a href="{{ $image->name }}" data-toggle="modal" data-target="#exampleModalCenter-{{$image->id}}"><img src="/{{ $image->path }}" width=100px height=100px></a>
                                    {{-- <div class="modal fade" id="exampleModalCenter-{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle" style="display: inline-block;">announce</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                             <h4>Bạn muốn xóa ảnh này?</h4>
                                                          </div>
                                                          <div class="modal-footer">
                                                                <button  type="button" class="btn btn-secondary" data-dismiss="modal">Giữ lại ảnh</button>
                                                                <form style="display: inline-block;" action="{{ route('backend.image.destroy', $image->id) }}" method="post" accept-charset="utf-8">
                                                                @csrf
                                                                {{method_field('delete')}}
                                                                <input type="submit" class="btn btn-danger" value="đồng ý">
                                                            </form>
                                                        </div>
                                                    </div>
                                                 </div>
                                            </div> --}}
                                @endforeach
                                <br>
                                <label for="exampleInputFile">Thêm mới :</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="images[]" multiple>
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái sản phẩm</label>
                                <select name="status" class="form-control select2" style="width: 100%;">
                                    <option>--Chọn trạng thái---</option>
                                    <option value="0" @if($item->status == 0) Selected  @endif >Đang nhập</option>
                                    <option value="1" @if($item->status == 1) Selected  @endif>Mở bán</option>
                                    <option value="2" @if($item->status == 2) Selected  @endif>Hết hàng</option>
                                </select>
                                @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="{{ route('backend.product.index') }}" class="btn btn-default">Huỷ bỏ</a>
                            <button type="submit" class="btn btn-sucess">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection