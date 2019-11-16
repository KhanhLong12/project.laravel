@extends('backend.layouts.master')
@section('content-header')
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                        @if(session()->has('success3'))
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('success3') }}
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
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div>
            </div>
@endsection
@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $Order }}</h3>

                                <p>Đơn hàng</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $demproducts }}</h3>

                                <p>Sản phẩm</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $demusers }}</h3>

                                <p>Khách hàng</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{number_format($demorder)}} VNĐ</h3>

                                <p>Doanh thu</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>

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
                                        <th>Thời gian</th>
                                        <th>hình ảnh</th>
                                        <th>Trang thái</th>
                                        <th>hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $stt++ }}</td>
                                            <td><a style="color: #007bff" href="{{ route('fontend.product.product', $product->slug) }}">{{ $product->name }}</a></td>
                                            <td>{{ $product->created_at }}</td>
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
                                            <td><a href="{{ route('backend.product.show', $product->id)}}" class="btn btn-info">Xem chi tiết</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
@endsection