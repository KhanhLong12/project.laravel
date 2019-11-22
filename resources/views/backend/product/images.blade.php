@extends('backend.layouts.master')
@section('content-header')
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">hình ảnh</h1>
                <a href="{{ route('backend.product.edit',$item->id) }}" class="btn btn-primary">back</a>
                @if(session()->has('success2'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('success2') }}
                    </div> 
                @endif
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Quản lý hình ảnh</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
@endsection
@section('content')
<!-- Content -->
        <!-- Main row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">hình ảnh sản phẩm</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <br>
                               @foreach($images as $image)
                                    <a style="padding: 20px;" href="{{ $image->name }}" data-toggle="modal" data-target="#exampleModalCenter-{{$image->id}}"><img src="{{ url($image->path) }}" width=200px height=200px style="border-right: 1px solid black;border-left: 1px solid black"></a>
                                    <div class="modal fade" id="exampleModalCenter-{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                                <button class="btn btn-secondary" data-dismiss="modal">Giữ lại ảnh</button>
                                                                <form style="display: inline-block;" action="{{ route('backend.image.destroy',[$image->id, $image->product_id]) }}" method="post" accept-charset="utf-8">
                                                                @csrf
                                                                {{method_field('delete')}}
                                                                <button type="submit" class="btn btn-danger">Đồng ý</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                 </div>
                                            </div>
                                @endforeach
                            </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
@endsection