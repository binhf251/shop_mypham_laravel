<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class Product extends Controller
{
    //
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function add_product()
    {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('cate_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id', 'desc')->get();

        return view('admin.add_product')->with('cate_product', $cate_product)->with('brand_product', $brand_product);

    }

    public function all_product()
    {
        $this->AuthLogin();
        $all_pro = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.cate_id', '=', 'tbl_product.cate_id')
            ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')->get();
        $manage_pro = view('admin.all_product')->with('all_product', $all_pro);
        return view('admin_layout')->with('admin.all_product', $manage_pro);
    }

    public function save_product(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['product_id'] = $request->product_id;
        $data['cate_id'] = $request->cate_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_price'] = $request->product_price;
        $data['product_status'] = $request->product_status;

        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('C:\xampp\htdocs\shop_mypham_laravel\public\upload\product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            return Redirect::to('/all-product');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        return Redirect::to('all-product');
    }

    public function active_product($pro_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $pro_id)->update(['product_status' => 0]);
        return Redirect::to('all-product');
    }

    public function unactive_product($pro_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $pro_id)->update(['product_status' => 1]);
        return Redirect::to('all-product');
    }

    public function edit_product($pro_id)
    {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('cate_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id', 'desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id', $pro_id)->get();
        $manage_product = view('admin.edit_product')->with('edit_product', $edit_product)->with('cate_product', $cate_product)
            ->with('brand_product', $brand_product);
        return view('admin_layout')->with('admin.edit_product', $manage_product);
    }

    public function update_product(Request $request, $pro_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['cate_id'] = $request->cate_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_price'] = $request->product_price;
        $data['product_status'] = $request->product_status;

        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('C:\xampp\htdocs\shop_mypham_laravel\public\upload\product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id', $pro_id)->update($data);
            return Redirect::to('/all-product');
        }
        DB::table('tbl_product')->where('product_id', $pro_id)->update($data);
        return Redirect::to('all-product');
    }

    public function delete_product($pro_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $pro_id)->delete();
        return Redirect::to('all-product');
    }

    public function product_detail($pro_id)
    {
        $cate_product = DB::table('tbl_category_product')->where('cate_status', '1')->orderby('cate_id', 'asc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status', '1')->orderby('brand_id', 'asc')->get();
        $detail_pro = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.cate_id', '=', 'tbl_product.cate_id')
            ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
            ->where('tbl_product.product_id', $pro_id)->get();

        foreach ($detail_pro as $key => $detail) {
            $brand_id = $detail->brand_id;
        }


        $relative_pro = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.cate_id', '=', 'tbl_product.cate_id')
            ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
            ->where('tbl_brand_product.brand_id', $brand_id)->whereNotIn('tbl_product.product_id',[$pro_id])->get();

        return view('pages.product_detail')->with('category_product', $cate_product)->with('brand_product', $brand_product)
            ->with('product_detail', $detail_pro)->with('relative_product', $relative_pro);


    }


}
