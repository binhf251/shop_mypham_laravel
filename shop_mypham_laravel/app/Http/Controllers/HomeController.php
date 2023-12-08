<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class HomeController extends Controller
{
    //

    public function index(){
        $cate_product = DB::table('tbl_category_product')->where('cate_status','1')->orderby('cate_id','asc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','asc')->get();
//        $all_pro = DB::table('tbl_product')
//            ->join('tbl_category_product','tbl_category_product.cate_id','=','tbl_product.cate_id')
//            ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')->get();
        $all_pro = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','asc')->limit(12)->get();
        return view('pages.home')->with('category_product',$cate_product)->with('brand_product',$brand_product)->with('all_product',$all_pro);
    }

    public function search(Request $request) {
        $key = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('cate_status','1')->orderby('cate_id','asc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','asc')->get();
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$key.'%')->get();
        return view('pages.search')->with('category_product',$cate_product)->with('brand_product',$brand_product)->with('search_product',$search_product);

    }
}
