@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Sản phẩm
            </div>

            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên sản phẩm</th>
                        <th>Danh mục sản phẩm</th>
                        <th>Thương hiệu</th>
                        <th>Mô tả</th>
                        <th>Giá thành</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Hiển thị</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($all_product as $key => $pro)
                        <tr>
                            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                            <td>{{ $pro->product_name }}</td>
                            <td>{{ $pro->cate_name }}</td>
                            <td>{{ $pro->brand_name }}</td>
                            <td><span class="text-ellipsis">{{ $pro->product_desc }}</span></td>
                            <td>{{ $pro->product_price }}</td>
                            <td><img src="../../upload/product/{{ $pro->product_image }}" height="100" width="100"></td>
                            <td><span class="text-ellipsis">
                                <?php
                                    if ($pro->product_status == 0) {
                                        ?>
                                    <a href="{{URL::to('/unactive-product/'.$pro->product_id)}}"><span class="fa fa-check-circle-o"></span></a>
                                <?php
                                    }else{
                                        ?>
                                    <a href="{{URL::to('/active-product/'.$pro->product_id)}}"><span class="fa fa-check-circle"></span></a>
                                <?php
                                    }
                                        ?>
                            </span></td>
                            <td>
                                <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="active" ui-toggle-class="">
                                    <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                <a onclick="return confirm('Bạn có muốn xóa sản phẩm này không ?')" href="{{URL::to('/delete-product/'.$pro->product_id)}}" class="active" ui-toggle-class="">
                                    <i class="fa fa-times text-danger text"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
