@extends('layout')
@section('content')  
	<div class="container">
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Sản phẩm</h3>
            </div>
            <nav class="nav nav-tabs">
                <a class="nav-link" id="home-tab" data-toggle="tab" href=" ">Trang chủ</a>
                <a class="nav-link" id="product-tab" data-toggle="tab" href="{{route('users')}}">Quản lý User</a>
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact">Thống kê</a>
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact">Chương trình khuyến mại</a>
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact">Liên hệ</a>
                <form role="search" method="GET" id="searchForm" action="{{ route('search') }}">
                    <input type="search" name="key" placeholder="Tìm kiếm..."/>
                    <button class="fa fa-search" type="submit">Tìm kiếm</button>
                </form>
                </nav>
            <div class="pull-left" style="margin-top: 20px;">
                <a class="btn btn-success" href="{{ route('createProduct') }}">Thêm Sản phẩm
                </a>
            </div>
        </div>
    </div>
    {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif --}}
    <table class="table table-bordered">
        <tr>
            <th>ProductName</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Description</th>
            <th>Title</th>
            <th>Image</th>
            <th width="280px">Hành động</th>
        </tr>
        @foreach ($value as $data)
            <tr>
                <td>{{ $data->productname }}</td>
                <td>{{ $data->price }}.đ</td>
                <td>{{ $data->discount }} %</td>
                <td>{{ $data->description}}</td>
                <td>{{ $data->title }}</td>
                <td>
                    <img src={{asset('upload/' . $data->image)}} width="80px" height="80px">
                </td>
                <td>
                    <form action="{{ route('editProduct', $data->id) }}" >
                        <input type="submit" class="btn btn-primary col-xs-3 col-sm-3 col-md-3" value="edit">
                    </form>
                    <form action="{{ route('deleteProduct', $data->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-danger col-xs-3 col-sm-3 col-md-3" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
{{-- <script type="text/javascript">
    $(document).ready(function($) {
    var engine1 = new Bloodhound({
        remote: {
            url: '/search/value=%QUERY%',
            wildcard: '%QUERY%'
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });
    $(".search-input").typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, [
        {
            source: engine1.ttAdapter(),
            name: 'product-name',
            display: function(data) {
                return data.name;
            },
            templates: {
                empty: [
                    '<div class="header-title">Name</div><div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                ],
                header: [
                    '<div class="header-title">Name</div><div class="list-group search-results-dropdown"></div>'
                ],
                suggestion: function (data) {
                    return '<a href="/students/' + data.id + '" class="list-group-item">' + data.name + '</a>';
                }
            }
        }
</script> --}}
@endsection('content')