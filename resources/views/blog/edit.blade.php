@extends('layout')
  
@section('content') 
<div class="container"> 
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Sửa thành viên</h3>
            </div>
        </div>
    </div>
    <form action="{{ route('update', $data->id) }}" method="POST">
        @csrf
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{$data->name}}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="mail" value="{{$data->email}}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Mật khẩu:</strong>
                    <input type="text" name="password" value="{{$data->password}}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success " >Cập nhật</button>
            </div>
        </div>

    </form>

</div>
  
@endsection('content')