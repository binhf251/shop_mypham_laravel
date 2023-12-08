@extends('welcome')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/">Trang chủ</a></li>
                    <li class="active">Thanh toán</li>
                </ol>
            </div>

        </div>
        <div class="review-payment">
            <h2>Xem lại giỏ hàng</h2>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu" style="background: #FF99CC;
                    color: #fff;
                    font-size: 16px;
                    font-family: 'Roboto', sans-serif;
                    font-weight: normal;
                    height: 50px">
                    <td class="image" style="color: #FFFFFF; font-weight: bold">Hình ảnh</td>
                    <td class="description" style="color: #FFFFFF; font-weight: bold">Tên sản phẩm</td>
                    <td class="price" style="color: #FFFFFF; font-weight: bold">Giá</td>
                    <td class="quantity" style="color: #FFFFFF; font-weight: bold">Số lượng</td>
                    <td class="total" style="color: #FFFFFF; font-weight: bold">Tổng</td>

                </tr>
                </thead>
                <tbody>
                @if ($_SESSION['cart'] == true)
                    @foreach ($_SESSION['cart'] as $key => $value)
                        <tr>
                            <td class="cart_product" style="margin: 0px; margin-left: 6px">
                                <a href="{{URL::to('/product/'.$value['id'])}}"><img
                                        style="max-height: 100px; max-width: 100px;"
                                        src="../../upload/product/{{$value['image']}}" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a style="font-weight: bold; font-size: 20px"
                                       href="{{URL::to('/product/'.$value['id'])}}">{{$value['name']}}</a></h4>
                            </td>
                            <td class="cart_price" style="font-weight: bold; font-size: 20px">
                                <p>{{number_format($value['price'])}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <input class="cart_quantity_input" type="number"
                                           min="1" name="quantity[{{$key}}]" value="{{$value['quantity']}}">
                                </div>
                            </td>
                            <td class="cart_total" style="font-weight: bold; font-size: 20px">
                                <p class="cart_total_price">{{number_format($value['total'])}}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{URL::to('/delete-cart/'.$key)}}"><i
                                        class="fa fa-times" style=""></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

            <h4>Chọn hình thức thanh toán</h4>
            <form action="{{URL::to('/order')}}" method="post">
                @csrf

                <div class="payment-options" style="margin: 10px; font-size: 30px">
					<span>
						<label><input name="payment_option" value="0" type="checkbox"> Thanh toán thẻ</label>
					</span>
                    <span>
						<label><input name="payment_option" value="1" type="checkbox"> COD</label>
					</span>
                    <input type="submit" value="Đặt hàng" name="order" class="btn btn-primary btn-sm">
                </div>
            </form>
        </div>
    </section> <!--/#cart_items-->
@endsection
