<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();
class CartController extends Controller
{
    //
    public function save_cart(Request $request)
    {
        $quantity = $request->quantity;
        $product_id = $request->product_id_hidden;
        $products = DB::table('tbl_product')->where('product_id',$product_id)->get();

        if(isset($_SESSION['cart'])){

        }else{
            $_SESSION['cart'] = array();
        }

        //check exist product
        foreach($_SESSION['cart'] as $key => $value){
            if($value['id'] == $product_id){
                $_SESSION['cart'][$key]['quantity'] += $quantity;
                $_SESSION['cart'][$key]['total'] += $quantity * $_SESSION['cart'][$key]['price'];
                return Redirect::to('/show-cart');
            }
        }

        foreach($products as $key => $product_info){
            $row_id = substr(md5(microtime()),rand(0,26),5);
            $_SESSION['cart'][$row_id] =
                array('id' => $product_id,
                    'name' => $product_info->product_name,
                    'quantity' => $quantity,
                    'price' => $product_info->product_price,
                    'total' => $product_info->product_price * $quantity,
                    'image' => $product_info->product_image);
            break;
        }

        return Redirect::to('/show-cart');

    }

    public function show_cart(Request $request) {
        $cate_product = DB::table('tbl_category_product')->where('cate_status', '1')->orderby('cate_id', 'asc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status', '1')->orderby('brand_id', 'asc')->get();
        $request->url();
        return view('pages.show_all_cart')->with('category_product', $cate_product)->with('brand_product', $brand_product);
    }
    public function add_cart_ajax(Request $request){
        $data = $request->all();
        if(isset($_SESSION['cart'])){

        }else{
            $_SESSION['cart'] = array();
        }
        //check exist product
        foreach($_SESSION['cart'] as $key => $value){
            if($value['id'] == $data['cart_product_id']){
                $_SESSION['cart'][$key]['quantity'] += $data['cart_product_qty'];
                $_SESSION['cart'][$key]['total'] += $data['cart_product_qty'] * $_SESSION['cart'][$key]['price'];
                return;
            }
        }
        $row_id = substr(md5(microtime()),rand(0,26),5);
        $_SESSION['cart'][$row_id] =
            array('id' => $data['cart_product_id'],
                'name' => $data['cart_product_name'],
                'quantity' => $data['cart_product_qty'],
                'price' => $data['cart_product_price'],
                'total' => $data['cart_product_price'] * $data['cart_product_qty'],
                'image' => $data['cart_product_image']);
    }
    public function update_cart_quantity(Request $request){
        $data = $request->all();
        $cart = $_SESSION['cart'];
        if($cart){
            foreach($data['quantity'] as $key => $value){
                foreach($cart as $row_id => $val){
                    if($row_id == $key){
                        $_SESSION['cart'][$row_id]['quantity'] = $value;
                        $_SESSION['cart'][$row_id]['total'] = $value * $_SESSION['cart'][$row_id]['price'];
                    }
                }
            }
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    public function delete_cart($row_id) {
        unset($_SESSION['cart'][$row_id]);
        return Redirect::to('/show-cart');
    }

    public function clear_cart() {
        if ($_SESSION['cart'] == true) {
            foreach ($_SESSION['cart'] as $key => $value) {
                unset($_SESSION['cart'][$key]);
            }
        }
        return Redirect::to('/show-cart');
    }
}
