<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class BrandProduct extends Controller
{
    //
    public function AuthLogin() {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_brand_product(){
        $this->AuthLogin();
        return view ('admin.add_brand_product');
    }
    public function all_brand_product(){
        $this->AuthLogin();
        $all_brand = DB::table('tbl_brand_product')->get();
        $manage_brand = view('admin.all_brand_product')->with('all_brand_product', $all_brand);
        return view ('admin_layout')->with('admin.all_brand_product',$manage_brand);
    }

    public function save_brand_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_status'] = $request->brand_product_status;


        DB::table('tbl_brand_product')->insert($data);
        return Redirect::to('add-brand-product');
    }

    public function active_brand_product($brand_pro_id) {
        $this->AuthLogin();
        DB::table('tbl_brand_product')->where('brand_id',$brand_pro_id)->update(['brand_status'=>0]);
        return Redirect::to('all-brand-product');
    }
    public function unactive_brand_product($brand_pro_id) {
        $this->AuthLogin();
        DB::table('tbl_brand_product')->where('brand_id',$brand_pro_id)->update(['brand_status'=>1]);
        return Redirect::to('all-brand-product');
    }
    public function edit_brand_product($brand_pro_id) {
        $this->AuthLogin();
        $edit_brand = DB::table('tbl_brand_product')->where('brand_id',$brand_pro_id)->get();
        $manage_brand = view('admin.edit_brand_product')->with('edit_brand_product', $edit_brand);
        return view ('admin_layout')->with('admin.edit_brand_product',$manage_brand);
    }
    public function update_brand_product(Request $request, $brand_pro_id) {
        $this->AuthLogin();
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        DB::table('tbl_brand_product')->where('brand_id', $brand_pro_id)->update($data);
        return Redirect::to('all-brand-product');
    }
    public function delete_brand_product($brand_pro_id) {
        $this->AuthLogin();
        DB::table('tbl_brand_product')->where('brand_id', $brand_pro_id)->delete();
        return Redirect::to('all-brand-product');
    }

    public function show_brand($brand_id) {
        $cate_product = DB::table('tbl_category_product')->where('cate_status','1')->orderby('cate_id','asc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','asc')->get();
        $brand_by_id = DB::table('tbl_product')->join('tbl_brand_product','tbl_product.brand_id','=','tbl_brand_product.brand_id')
            -> where('tbl_product.brand_id',$brand_id)->get();
        $brand_name = DB::table('tbl_brand_product')->where('tbl_brand_product.brand_id',$brand_id)->limit(1)->get();
        return view('pages.show_all_brand')->with('category_product',$cate_product)->with('brand_product',$brand_product)->
        with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name);
    }
}
