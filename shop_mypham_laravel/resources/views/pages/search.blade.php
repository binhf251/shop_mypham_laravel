@extends('welcome')
@section('content')
    <div class="features_items">
        <h2 class="title text-center">Sản phẩm tìm kiếm</h2>
        @foreach($search_product as $key => $pro)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <a href="{{URL::to('product/'.$pro->product_id)}}"><img src="../../upload/product/{{ $pro->product_image }}" height="300" width="500"></a>
                            <h2>{{number_format($pro->product_price).' '.'VND'}}</h2>
                            <a href="{{URL::to('product/'.$pro->product_id)}}"><p>{{$pro->product_name}}</p></a>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


@endsection
