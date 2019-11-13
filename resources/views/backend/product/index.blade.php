@extends('backend.layouts.master')
@section('content-header')
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách sản phẩm  <a href="{{ route('backend.product.create') }}"><i class="fas fa-plus" style="color: blue;font-size: 20px;"></i></a></h1>
                @if(session()->has('success4'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success4') }}
                    </div> 
                @endif
                @if(session()->has('success1'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success1') }}
                    </div> 
                @endif
                @if(session()->has('success2'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success2') }}
                    </div> 
                @endif
                @if(session()->has('success5'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success5') }}
                    </div> 
                @endif
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Danh sách</li>
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
                        <h3 class="card-title">Sản phẩm mới nhập</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                @php
                                    $stt = 1;
                                @endphp
                            <tr>
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>danh mục</th>
                                {{-- <th>Người tạo</th> --}}
                                <th>hình ảnh</th>
                                <th>Trạng thái</th>
                                <th>Mô tả</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td><a href="{{ route('fontend.product.product', $product->slug) }}">{{ $product->name }}</a></td>
                                        <td>{{ $product->category->name }}</td>
                                        {{-- <td>{{ $product->user->name }}</td> --}}
                                        <td>
                                            @if( isset($product->images[0]->path) )
                                             <img height="100px" width="100px" src="/{{ $product->images[0]->path }}">
                                             <br>
                                            <a href="{{ route('backend.product.images',$product->id) }}">Xem thêm</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($product->status == 0)
                                            Đang nhập
                                            @elseif($product->status == 1)
                                            Mở bán
                                            @elseif($product->status == 2)
                                            hết hàng
                                            @endif
                                        </td>
                                        <td>{!! substr(strip_tags($product->content), 0, 60) !!}</td>
                                        <td>
                                            <a href="{{ route('backend.product.show', $product->id)}}"><i class="far fa-eye"></i></a>
                                            <a href="{{ route('backend.product.edit', $product->id) }}"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('backend.product.destroy', $product->id) }}" data-toggle="modal" data-target="#exampleModalCenter-{{$product->id}}"><i class="fas fa-trash-alt"></i></a>
                                            <div class="modal fade" id="exampleModalCenter-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle" style="display: inline-block;">Bạn có chắc chắn xóa ko?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                             <h4>Bạn chắc chắn muốn xóa?</h4>
                                                          </div>
                                                          <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <form style="display: inline-block;" action="{{ route('backend.product.destroy', $product->id) }}" method="post" accept-charset="utf-8">
                                                                @csrf
                                                                {{method_field('delete')}}
                                                                <button type="submit" class="btn btn-danger">Đồng ý</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                 </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $products->links() !!}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
@endsection