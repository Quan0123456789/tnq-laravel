@extends('contenttop')
@section('layout') 
                <!--	Latest Product	-->

                <div class="products">
                    <h3>Sản phẩm mới</h3>
                        <div class="product-list card-deck">
                            @foreach ($category as $data)
                            <div class="product-item card text-center">
                                <a href="{{ route('productDetail', $data->id ) }}"><img src={{asset('upload/' . $data->image)}} ></a>
                                <h4><a href="#">{{ $data->productname }}</a></h4>
                                <p>Giá Bán: <span>{{ $data->price }}.đ</span></p>
                            </div>
                            @endforeach
                    </div>
                    
                </div>
                <!--	End Latest Product	-->
                
            </div>





@endsection('layout')    