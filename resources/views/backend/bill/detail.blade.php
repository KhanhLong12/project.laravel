@extends('backend.layouts.master')
@section('content-header')
  <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Chi tiết hóa đơn</h1>
                <a href="{{ route('backend.bill.index') }}" class="btn btn-primary">back</a>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Hóa đơn</a></li>
                    <li class="breadcrumb-item active">Chi tiết</li>
                </ol>
            </div><!-- /.col -->
        </div>
@endsection
@section('content')
    @php
        $stt = 1;
    @endphp
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Stt</th>
          <th scope="col">Tên sản phẩm</th>
          <th scope="col">số lượng</th>
          <th scope="col">Giá</th>
        </tr>
      </thead>
      <tbody>
        @foreach($bill_details as $bill_detail)
            <tr>
              <th scope="row">{{ $stt++ }}</th>
                <td>
                    {{ $bill_detail->product->name }}
                </td>
              <td>{{ $bill_detail->quantity }}</td>
              <td>{{ number_format($bill_detail->subtotal) }} VNĐ</td>
            </tr>
        @endforeach
        <tr>
            <td style="font-weight: bold; color: orange">Tổng tiền : </td>
            <td></td>
            <td></td>
            <td style="font-weight: bold;">{{ $bill->total }} VNĐ</td>
        </tr>
      </tbody>
    </table>
@endsection