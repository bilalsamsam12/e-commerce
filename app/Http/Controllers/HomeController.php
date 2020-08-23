<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function index(){
        $pros=DB::table('tbl_products')->
        join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')->
        join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')->
        where('tbl_products.publication_statut',1)->limit(9)->get();
        return view('pages.home_content',['products'=>$pros]);
        

    }
    public function show_product_by_category($category_id){
        $product_by_category=DB::table('tbl_products')->where('category_id',$category_id)->where('publication_statut',1)->limit(18)->get();
        return view('pages.product_by_category',['product_by_category'=>$product_by_category]);
    }

    public function show_product_by_manufacture($manufacture_id){
        $product_by_maufacture=DB::table('tbl_products')->where('manufacture_id',$manufacture_id)->where('publication_statut',1)->limit(18)->get();
        return view('pages.product_by_manufactre',['product_by_manufacture'=>$product_by_maufacture]);
    }
    public function view_product($product_id){
        $pros=DB::table('tbl_products')->
        join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')->
        join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')->
        select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')->
        where('product_id',$product_id)->where('tbl_products.publication_statut',1)->first();
        return view('pages.view_product',['pros'=>$pros]);
      // print_r($pros);
    }
}
