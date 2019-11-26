@extends('backend.layouts.master')
@section('content-header')
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">danh sách Hóa đơn</h1>
                @if(session()->has('success'))
                    <div class="alert alert-success" style="text-align: center;" role="alert">
                        {{ session()->get('success') }}
                    </div> 
                @endif
                @if(session()->has('success1'))
                    <div class="alert alert-success" style="text-align: center;" role="alert">
                        {{ session()->get('success1') }}
                    </div> 
                @endif
                <a href="{{ route('backend.dashboard') }}" class="btn btn-primary">Về trang chủ</a>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Hóa đơn</a></li>
                    <li class="breadcrumb-item active">Danh sách</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
@endsection
@section('content')
@php
 $stt = 1 ;
@endphp
<div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card" style="padding: 10px;">
                  <div class="card-header">
                        <h3 class="card-title">Danh sách</h3>
                    </div>
      @foreach($bills as $bill)
        <table class="table table-bordered table-warning">
            <thead>
              <tr>
                <th scope="col">Hóa đơn</th>
                <th scope="col">code</th>
                {{-- <th scope="col">Tên sản phẩm</th> --}}
                {{-- <th scope="col">số lượng</th> --}}
                <th scope="col">Tên khách hàng</th>
                <th scope="col">email khách hàng</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">hành động</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">{{ $stt ++ }}</th>
                <td>{{ $bill->code }}</td>
                <td>{{ $bill->customer_name }}</td>
                <td>{{ $bill->customer_email }}</td>
                {{-- <td>{{ $product->name }}</td>
                <td>{{ $detail->quantity }}</td> --}}
                <td>{{ $bill->customer_address }}
                  @if($bill->customer_districtaddress != null)
                  -{{ $bill->customer_districtaddress }}
                  @elseif($bill->customer_cityaddress !=null)
                  -{{ $bill->customer_cityaddress }}
                  @endif
                </td>
                <td>{{ $bill->total }} VNĐ</td>
                <td>
                  @if($bill->status == 1)
                    <span style="color: red;font-weight: bold">Chưa giao hàng</span>
                  @elseif($bill->status == 0)
                    <span style="color: blue; font-weight: bold">đã giao hàng</span>
                  @endif
                </td>
                @if($bill->status == 1)
                    <td>
                      <a href="{{ route('backend.bill.detailbill', $bill->id) }}"><i class="far fa-eye"></i></a>
                      <a href="{{ route('backend.bill.editbill', $bill->id) }}"><i class="fas fa-edit"></i></a>
                      <form style="display: inline-block;" role="form" method="post" action="{{ route('backend.bill.billupdate', $bill->id) }}" enctype="multipart/form-data">
                        <a href="{{ route('backend.bill.billupdate', $bill->id) }}"><i class="fas fa-check"></i></a>
                      </form>
                      <a href="{{ route('backend.bill.destroy', $bill->id) }}" data-toggle="modal" data-target="#exampleModalCenter-{{$bill->id}}"><i class="fas fa-trash-alt"></i></a>
                                            <div class="modal fade" id="exampleModalCenter-{{$bill->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle" style="display: inline-block;">Thông báo</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                             <h4>Bạn chắc chắn muốn xóa đơn hàng?</h4>
                                                          </div>
                                                          <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <form style="display: inline-block;" action="{{ route('backend.bill.destroy', $bill->id) }}" method="post" accept-charset="utf-8">
                                                                    @csrf
                                                                    {{method_field('delete')}}
                                                                    <button type="submit" class="btn btn-danger">Đồng ý</button>
                                                                </form>
                                                        </div>
                                                    </div>
                                                 </div>
                                            </div>
                  </td>
                @else
                <td>
                  <a href="{{ route('backend.bill.destroy', $bill->id) }}" data-toggle="modal" data-target="#exampleModalCenter-{{$bill->id}}"><i class="fas fa-trash-alt"></i></a>
                                            <div class="modal fade" id="exampleModalCenter-{{$bill->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle" style="display: inline-block;">Thông báo</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                             <h4>Bạn chắc chắn muốn xóa đơn hàng?</h4>
                                                          </div>
                                                          <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <form style="display: inline-block;" action="{{ route('backend.bill.destroy', $bill->id) }}" method="post" accept-charset="utf-8">
                                                                    @csrf
                                                                    {{method_field('delete')}}
                                                                    <button type="submit" class="btn btn-danger">Đồng ý</button>
                                                                </form>
                                                        </div>
                                                    </div>
                                                 </div>
                                            </div>
                  </td>
                @endif
              </tr>
            </tbody>
        </table>
      @endforeach
      {!! $bills->links() !!}
  </div>
            </div>
        </div>
@endsection