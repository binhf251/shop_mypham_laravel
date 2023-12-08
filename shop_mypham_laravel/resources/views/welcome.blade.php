<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Trang chủ</title>
    <link href="../../frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../frontend/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../frontend/css/prettyPhoto.css" rel="stylesheet">
    <link href="../../frontend/css/price-range.css" rel="stylesheet">
    <link href="../../frontend/css/animate.css" rel="stylesheet">
    <link href="../../frontend/css/main.css" rel="stylesheet">
    <link href="../../frontend/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +84 705799891</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> nghia@st.vimaru.edu.vn</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="https://www.facebook.com/xeecii" target="_blank"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="http://127.0.0.1:8000/#" target="_blank"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li><a href="https://www.instagram.com/xeeciihn/" target="_blank"><i
                                        class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{URL::to('/trang-chu')}}"><img src="../../frontend/img/logofn.png" style="height: 80px; width: 100px" alt=""/></a>
                    </div>

                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="/login-checkout"><i class="fa fa-user"></i> Tài khoản</a></li>
                            <li><a href="/show-cart"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                            <?php
                            $customer_id = Session::get('customer_id');
                            if ($customer_id != NULL){
                                ?>
                            <li><a href="/logout-checkout"><i class="fa fa-unlock"></i> Đăng xuất</a></li>
                                <?php
                            }else{
                                ?>

                            <li><a href="/login-checkout"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                <?php
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{URL::to('/trang-chu')}}" class="active">Trang chủ</a></li>
                            <li class="dropdown"><a href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    @foreach($category_product as $key => $cate)
                                        <li>
                                            <a href="{{URL::to('category-product/'.$cate->cate_id)}}">{{$cate->cate_name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Thương hiệu<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    @foreach($brand_product as $key => $brand)
                                        <li>
                                            <a href="{{URL::to('brand-product/'.$brand->brand_id)}}">{{$brand->brand_name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <form action="{{URL::to('/search')}}" method="post">
                        @csrf
                        <div class="search_box pull-right">
                            <input type="text" name="keywords_submit" placeholder="Tìm kiếm sản phẩm"/>
                            <input type="submit" style="margin-left: 170px; margin-top: -72px; width: 50px; background-color: #B2B2B2" name="search_items" class="btn btn-default btn-sm" value="&#x1F50D">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<section id="slider"><!--slider-->
    <img src="../../frontend/img/banner.jpg"/>
</section><!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Danh mục sản phẩm</h2>
                    <div class="panel-group category-products" id="accordian">
                        @foreach($category_product as $key => $cate)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="{{URL::to('category-product/'.$cate->cate_id)}}">{{$cate->cate_name}}</a>
                                    </h4>
                                </div>
                            </div>

                        @endforeach
                    </div><!--/category-products-->

                    <div class="brands_products"><!--brands_products-->
                        <h2>Thương hiệu</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                @foreach($brand_product as $key => $brand)
                                    <li>
                                        <a href="{{URL::to('brand-product/'.$brand->brand_id)}}">{{$brand->brand_name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!--/brands_products-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                @yield('content')

            </div>
        </div>
    </div>
</section>

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">

                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="images/home/map.png" alt=""/>
                        <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">

        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © VMU Inc. All rights reserved.</p>
                <p class="pull-right">Designed by <a target="_blank" href="https://www.facebook.com/xeecii">Nghia</a>
                </p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->


<script src="../../frontend/js/jquery.js"></script>
<script src="../../frontend/js/bootstrap.min.js"></script>
<script src="../../frontend/js/jquery.scrollUp.min.js"></script>
<script src="../../frontend/js/price-range.js"></script>
<script src="../../frontend/js/jquery.prettyPhoto.js"></script>
<script src="../../frontend/js/main.js"></script>
</body>
</html>
