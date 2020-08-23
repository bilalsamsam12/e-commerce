<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
session_start();
class ProductController extends Controller
{
    public function index(){
        $this->Adminauthcheck();
        return View('admin.add_product');
    }
    public function save_product(Request $request){
        $this->Adminauthcheck();
        $date=array();
        $val=0;
        if($request->ps!=0){
            $val=1;
        }else{
            $val=0;
        }
        $date['product_name']=$request->product_name;
        $date['category_id']=$request->category_id;
        $date['manufacture_id']=$request->manufacture_id;
        $date['product_short_description']=$request->product_short_description;
        $date['product_long_description']=$request->product_long_description;
        $date['product_price']=$request->product_price;
        $date['product_size']=$request->product_size;
        $date['product_color']=$request->product_color;
        $date['quantite']=$request->quantite;
        $date['publication_statut']=$val;
        $image=$request->file('product_image');
        if($image){
            $image_name=Str::random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $date['product_image']=$image_url;
                DB::table('tbl_products')->insert($date);
                Session::put('message','Product add successfully !!');
                return Redirect::to('/add-product');
            }
        }
                $date['product_image']='';
                DB::table('tbl_products')->insert($date);
                Session::put('message','Product add successfully  without image!!');
                return Redirect::to('/add-product');
    }

    public function all_product(){
        $this->Adminauthcheck();
        $pro=DB::table('tbl_products')->
        join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')->
        join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
        ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
        ->get();
       return view('admin.all_product',['pros'=>$pro]);
        // print_r($pro);
   }
   public function unactive_product($product_id){
    DB::table('tbl_products')->where('product_id',$product_id)->update(['publication_statut'=>0]);
    Session::put('message','Product ative successfully !!');
    return Redirect::to('/all-product');
}
   public function active_product($product_id){
    DB::table('tbl_products')->where('product_id',$product_id)->update(['publication_statut'=>1]);
    Session::put('message','Product unative successfully !!');
    return Redirect::to('/all-product');
   }

   public function edit_product($product_id){
    $this->Adminauthcheck();
    $cat=DB::table('tbl_products')->
    join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')->
    join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
    ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
    ->where('product_id',$product_id)->get();
        
    return view('admin.edit_product',['cat'=>$cat]);
}

public function update_product(Request $request){
    $this->Adminauthcheck();
    $date=array();
    $val=0;
    if($request->ps!=0){
        $val=1;
    }else{
        $val=0;
    }
    $date['product_name']=$request->product_name;
    $product_id=$request->product_id;
    $date['category_id']=$request->category_id;
    $date['manufacture_id']=$request->manufacture_id;
    $date['product_short_description']=$request->product_short_description;
    $date['product_long_description']=$request->product_long_description;
    $date['product_price']=$request->product_price;
    $date['product_size']=$request->product_size;
    $date['product_color']=$request->product_color;
    $date['quantite']=$request->quantite;
    $date['publication_statut']=$val;
    $image=$request->file('product_image');
    if($image){
        $image_name=Str::random(20);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        if($success){
            $date['product_image']=$image_url;
            DB::table('tbl_products')->where('product_id',$product_id)->update($date);
            Session::put('message','Product updated successfully !!');
           return Redirect::to('/all-product');
        }
    }
            $date['product_image']='';
            DB::table('tbl_products')->where('product_id',$product_id)->update($date);
            Session::put('message','Product update successfully  without image  !!');
            return Redirect::to('/all-product');
   }


public function delete_product($product_id){
    $this->Adminauthcheck();
    DB::table('tbl_products')->where('product_id',$product_id)->delete();
    Session::put('message','Product deleted successfully !!');
    return Redirect::to('/all-product');
}

public function Adminauthcheck(){
    $admin_id=Session::get('admin_id');
    if($admin_id){
        return;
    }else{
        return Redirect::to('/admin')->send();
    }
}
}
