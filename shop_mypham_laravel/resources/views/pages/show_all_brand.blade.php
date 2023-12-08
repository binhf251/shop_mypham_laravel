@extends('welcome')
@section('content')
    <div class="features_items">
        @foreach ($brand_name as $key => $name)
            <h2 class="title text-center">{{$name->brand_name}}</h2>
        @endforeach
        @foreach($brand_by_id as $key => $pro)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <form role="form" action="{{URL::to('/save-cart')}}" method="post">
                                @csrf
                                <a href="{{URL::to('product/'.$pro->product_id)}}"><img
                                        src="../../upload/product/{{ $pro->product_image }}" height="300"
                                        width="500"></a>
                                <h2>{{number_format($pro->product_price).' '.'VND'}}</h2>
                                <input type="hidden" name="quantity" min="1" value="1"/>
                                <input type="hidden" name="product_id_hidden" value="{{$pro->product_id}}"/>
                                <a href="{{URL::to('product/'.$pro->product_id)}}"><p>{{$pro->product_name}}</p></a>
                                <button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm
                                    vào giỏ hàng</button>
                            </form>
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
