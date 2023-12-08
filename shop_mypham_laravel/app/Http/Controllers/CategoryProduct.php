<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class CategoryProduct extends Controller
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
    public function add_category_product(){
        $this->AuthLogin();
        return view ('admin.add_category_product');
    }
    public function all_category_product(){
        $this->AuthLogin();
        $all_cate = DB::table('tbl_category_product')->get();
        $manage_cate = view('admin.all_category_product')->with('all_category_product', $all_cate);
        return view ('admin_layout')->with('admin.all_category_product',$manage_cate);
    }

    public function save_category_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['cate_name'] = $request->category_product_name;
        $data['cate_desc'] = $request->category_product_desc;
        $data['cate_status'] = $request->category_product_status;


        DB::table('tbl_category_product')->insert($data);
        return Redirect::to('all-category-product');
    }

    public function active_category_product($cate_pro_id) {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('cate_id',$cate_pro_id)->update(['cate_status'=>0]);
        return Redirect::to('all-category-product');
    }
    public function unactive_category_product($cate_pro_id) {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('cate_id',$cate_pro_id)->update(['cate_status'=>1]);
        return Redirect::to('all-category-product');
    }
    public function edit_category_product($cate_pro_id) {
        $this->AuthLogin();
        $edit_cate = DB::table('tbl_category_product')->where('cate_id',$cate_pro_id)->get();
        $manage_cate = view('admin.edit_category_product')->with('edit_category_product', $edit_cate);
        return view ('admin_layout')->with('admin.edit_category_product',$manage_cate);
    }
    public function update_category_product(Request $request, $cate_pro_id) {
        $this->AuthLogin();
        $data = array();
        $data['cate_name'] = $request->category_product_name;
        $data['cate_desc'] = $request->category_product_desc;
        DB::table('tbl_category_product')->where('cate_id', $cate_pro_id)->update($data);
        return Redirect::to('all-category-product');
    }
    public function delete_category_product($cate_pro_id) {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('cate_id', $cate_pro_id)->delete();
        return Redirect::to('all-category-product');
    }
    // Het admin
    public function show_category($cate_id) {
        $cate_product = DB::table('tbl_category_product')->where('cate_status','1')->orderby('cate_id','asc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','asc')->get();
        $cate_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.cate_id','=','tbl_category_product.cate_id')
            -> where('tbl_product.cate_id',$cate_id)->get();
        $cate_name = DB::table('tbl_category_product')->where('tbl_category_product.cate_id',$cate_id)->limit(1)->get();
        return view('pages.show_all_category')->with('category_product',$cate_product)->with('brand_product',$brand_product)->
        with('category_by_id',$cate_by_id)->with('category_name',$cate_name);
    }

}
