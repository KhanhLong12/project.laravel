@extends('backend.layouts.master')
@section('content-header')
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Chi tiết sản phẩm</h1>
                <a href="{{ route('backend.product.index') }}" class="btn btn-primary">Về trang danh sách</a>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Chi tiết sản phẩm</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
@endsection
@section('content')
    <table class="table table-striped">
        <hr width="100%">
            <tr>
              <th scope="row">Tên sản phẩm: </th>
              <td>{{ $product->name }}</td>
            </tr>
            <tr>
              <th scope="row">hình ảnh: </th>
                <td>
                    @foreach($images as $image)
                        <img style="padding:0 10px;" width=200px height=200px src="{{ url($image->path) }}">
                    @endforeach
                </td>
            </tr>
            <tr>
              <th scope="row">danh mục: </th>
              <td>{{ $category->name }}</td>
            </tr>
            <tr>
              <th scope="row" style="width: 15%">Nội dung: </th>
              <td>{!! $product->content !!}</td>
            </tr>
            <tr>
              <th scope="row">Giá nhập: </th>
              <td>{{ number_format( $product->sale_price )}} VNĐ</td>
            </tr>
            <tr>
              <th scope="row">Giá bán: </th>
              <td>{{ number_format( $product->origin_price )}} VNĐ</td>
            </tr>
            <tr>
              <th scope="row">Ngày tạo: </th>
              <td>{{ $product->created_at }}</td>
            </tr>
        </table>
        <a href="{{ route('backend.dashboard') }}" class="btn btn-primary">Về trang chủ</a>
@endsection