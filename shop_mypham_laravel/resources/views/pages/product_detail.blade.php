@extends('welcome')
@section('content')
    @foreach ($product_detail as $key => $detail)
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="../../upload/product/{{ $detail->product_image }}" alt=""/>
                </div>

            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->
                    <h2>{{$detail->product_name}}</h2>
                    <form role="form" action="{{URL::to('/save-cart')}}" method="post">
                        @csrf
                        <span>
                    <span>{{number_format($detail->product_price).' VND'}}</span>
                    <label>Số lượng:</label>
                    <input type="number" name="quantity" min="1" value="1"/>
                    <input type="hidden" name="product_id_hidden" value="{{$detail->product_id}}"/>
                    <button type="submit" class="btn btn-fefault cart" style="font-size: 15px">
                        <i class="fa fa-shopping-cart"></i>
                        Thêm vào giỏ hàng
                    </button>
                </span>
                    </form>
                    <p><b>Tình trạng:</b> Còn hàng</p>
                    <p><b>Loại:</b> {{$detail->cate_name}}</p>
                    <p><b>Thương hiệu:</b> {{$detail->brand_name}}</p>
                </div><!--/product-information-->
            </div>
        </div><!--/product-details-->


        <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#desc" data-toggle="tab">Mô tả sản phẩm</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="desc">
                    @php
                        echo $detail->product_desc;
                    @endphp
                </div>


            </div>
        </div><!--/category-tab-->
    @endforeach
    <div class="recommended_items"><!--recommended_items-->
        <h2 class="title text-center">Sản phẩm cùng thương hiệu</h2>
        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($relative_product as $key => $value )
                    <a href="{{URL::to('/product/'.$value->product_id)}}">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="../../upload/product/{{ $value->product_image }}"
                                             alt=""/>
                                        <h2>{{number_format($value->product_price).' VND'}}</h2>
                                        <p>{{$value->product_name}}</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Thêm giỏ hàng
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                    @if(($key+1) % 3 == 0 || $key == count($relative_product)-1)
            </div>
            @endif
            @endforeach
        </div>
    </div>
    </div><!--/recommended_items-->
@endsection
