@extends('backend.layouts.master')
@section('content-header')
		<div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách người dùng <a href="{{ route('backend.user.create') }}"><i class="fas fa-plus" style="color: blue;font-size: 20px;"></i></a></h1></h1>
                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div> 
                @endif
                @if(session()->has('success1'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success1') }}
                    </div> 
                @endif
                @if(session()->has('success5'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('success5') }}
                    </div> 
                @endif
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Người dùng</a></li>
                    <li class="breadcrumb-item active">Danh sách</li>
                </ol>
            </div><!-- /.col -->
        </div>
@endsection
@section('content')
		<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách người dùng</h3>

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
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Thời gian</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td><span class="tag tag-success">Approved</span></td>
                                        <td>
                                            <a href="{{ route('backend.user.show', $user->id)}}"><i class="far fa-eye"></i></a>
                                            <a href="{{ route('backend.user.edit', $user->id) }}"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('backend.user.destroy', $user->id) }}" data-toggle="modal" data-target="#exampleModalCenter-{{$user->id}}"><i class="fas fa-trash-alt"></i></a>
                                            <div class="modal fade" id="exampleModalCenter-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle" style="display: inline-block;">Thông báo</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                             <h4>Bạn chắc chắn muốn xóa?</h4>
                                                          </div>
                                                          <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <form style="display: inline-block;" action="{{ route('backend.user.destroy', $user->id) }}" method="post" accept-charset="utf-8">
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
                        {!! $users->links() !!}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
@endsection