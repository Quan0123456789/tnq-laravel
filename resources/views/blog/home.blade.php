@extends('layout')
@section('content')  
	<div class="container">
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Thành viên</h3>
            </div>
            <div class="pull-right" style="margin-top: 20px;">
                <a class="btn btn-success" href="{{ route('create') }}">Thêm thành viên
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mật khẩu</th>
            <th width="280px">Hành động</th>
        </tr>
        @foreach (session('value') as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->password }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('edit', $data->id) }}">Edit</a>
                    <form action="{{ route('delete', $data->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection('content')