@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                   Đăng nhập thành công
                </div>
                <div class= "col-md 4">
                <a  class="btn btn-success " href="{{ route('users') }}"> User</a>
                <a  class="btn btn-success " href="{{ route('product') }}" >Product</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection