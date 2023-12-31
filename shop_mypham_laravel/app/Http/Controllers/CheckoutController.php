<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class CheckoutController extends Controller
{
    //
    public function login_checkout()
    {
        $cate_product = DB::table('tbl_category_product')->where('cate_status', '1')->orderby('cate_id', 'asc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status', '1')->orderby('brand_id', 'asc')->get();
        return view('pages.login_checkout')->with('category_product', $cate_product)->with('brand_product', $brand_product);
    }

    public function add_customer(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);
        $customer_id = DB::table('tbl_customer')->insertGetId($data);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);
        return Redirect::to('/checkout');
    }

    public function checkout()
    {
        $cate_product = DB::table('tbl_category_product')->where('cate_status', '1')->orderby('cate_id', 'asc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status', '1')->orderby('brand_id', 'asc')->get();
        return view('pages.checkout')->with('category_product', $cate_product)->with('brand_product', $brand_product);
    }

    public function save_checkout_customer(Request $request)
    {
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_address'] = $request->shipping_address;
        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
        Session::put('shipping_id', $shipping_id);
        return Redirect::to('/payment');
    }

    public function payment()
    {
        $cate_product = DB::table('tbl_category_product')->where('cate_status', '1')->orderby('cate_id', 'asc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status', '1')->orderby('brand_id', 'asc')->get();
        return view('pages.payment')->with('category_product', $cate_product)->with('brand_product', $brand_product);
    }

    public function order(Request $request)
    {
    }

    public function logout_checkout()
    {
        Session::flush();
        return Redirect::to('/login-checkout');
    }

    public function login_customer(Request $request)
    {
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table('tbl_customer')->where('customer_email', $email)->where('customer_password', $password)->first();

        Session::put('customer_id', $result->customer_id);

        return Redirect::to('/');
    }
}
