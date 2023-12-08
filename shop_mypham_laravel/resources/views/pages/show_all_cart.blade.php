@extends('welcome')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="/">Trang chủ</a></li>
                <li class="active">Giỏ hàng sản phẩm</li>
            </ol>
        </div>
        <div class="heading">
            <h3 style="text-align: center">Thông tin giỏ hàng</h3>
        </div>
        <form action="{{URL::to('/update-cart-quantity')}}" method="post">
            {{ csrf_field() }}
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
                                            class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                @if ($_SESSION['cart'] == true)
                    <div class="update-clear">
                        <button type="submit" href="{{URL::to('/update-cart-quantity')}}" class="btn btn-fefault cart"
                           style="margin-left: 1000px; margin-top: 10px">Cập
                            nhật
                        </button>
                    </div>
                    <a href="{{URL::to('/clear-cart')}}" class="btn btn-fefault cart"
                       style="margin-left: 1000px; margin-top: 10px">Xóa tất cả</a>
            </div>
            @else
                <span class="alert" style="font-weight: bold">Giỏ hàng trống</span>
            @endif

        </form>
    </div>
    </div>
    </section> <!--/#cart_items-->
    @php
        $sum = 0;
        foreach ($_SESSION['cart'] as $key => $value) {
            $sum += $value['total'];
        }
        $total_coupon = $sum;
    @endphp
    <div class="sum">
        <h2 style="margin-left: 700px; font-weight: bold">
            Thành tiền: <span>{{number_format($total_coupon)}} VND</span>
        </h2>
    </div>
    <section id="do_action">
        <div class="container">
            <?php
            $customer_id = Session::get('customer_id');
            if ($customer_id == null){
                ?>
            <a class="btn btn-default check_out" style="margin-left: 350px" href="{{URL::to('/login-checkout')}}">Thanh
                toán</a>
                <?php
            }else{
                ?>
            <a class="btn btn-default check_out" style="margin-left: 350px" href="{{URL::to('/checkout')}}">Thanh
                toán</a>
                <?php
            }
            ?>
        </div>
    </section><!--/#do_action-->
@endsection
