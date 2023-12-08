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


            <div class="shopper-informations">
                <div class="col-sm-5 clearfix">
                    <div class="bill-to">
                        <p>Thông tin</p>
                        <div class="form-one">
                            <form action="{{URL::to('/save-checkout-customer')}}" method="post">
                                @csrf
                                <input type="text" name="shipping_email" placeholder="Email">
                                <input type="text" name="shipping_name" placeholder="Họ và tên">
                                <input type="text" name="shipping_address" placeholder="Dia chi">
                                <input type="submit" value="Xác nhận" name="save_order" class="btn btn-primary cart" style="margin-left: 500px">
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="review-payment">
            <h2>Giỏ hàng của bạn</h2>
        </div>


        <div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
            <span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
            <span>
						<label><input type="checkbox"> Paypal</label>
					</span>
        </div>
        </div>
    </section> <!--/#cart_items-->
@endsection
