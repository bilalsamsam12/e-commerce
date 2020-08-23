<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
session_start();
class CategoryController extends Controller
{
   public function index(){
    $this->Adminauthcheck();
       return View('admin.add_category');
   }
   public function all_category(){
    $this->Adminauthcheck();
        $categorys=DB::table('tbl_category')->get();
        $manage_category=View('admin.all_category')->with('categorys',$categorys);
        return view('admin_layout')->with('admin.all_category',$manage_category);
   }

   public function save_category(Request $request){
    $this->Adminauthcheck();
    $date=array();
    $val=0;
    $date['category_name']=$request->category_name;
    $date['category_description']=$request->category_description;
    if($request->ps!=0){
        $val=1;
    }else{
        $val=0;
    }
    $date['publication_statut']=$val;
    DB::table('tbl_category')->insert($date);
    Session::put('message','Category add successfully !!');
    return Redirect::to('/add-category');

}
    public function unactive_category($category_id){
        DB::table('tbl_category')->where('category_id',$category_id)->update(['publication_statut'=>0]);
        Session::put('message','Category ative successfully !!');
        return Redirect::to('/all-category');
    }
    public function active_category($category_id){
        DB::table('tbl_category')->where('category_id',$category_id)->update(['publication_statut'=>1]);
        Session::put('message','Category unative successfully !!');
        return Redirect::to('/all-category');
    }
    public function edit_category($category_id){
        $this->Adminauthcheck();
         $cat=DB::table('tbl_category')->where('category_id',$category_id)->get();
            return view('admin.edit_category',['cat'=>$cat]);
    }
    public function update_category(Request $request){
        $this->Adminauthcheck();
         $date=array();
         $cat_id=$request->category_id;
         $date['category_name']=$request->category_name;
         $date['category_description']=$request->category_description;
         DB::table('tbl_category')->where('category_id',$cat_id)->update($date);
         Session::put('message','Category updated successfully !!');
        return Redirect::to('/all-category');
    }
    public function delete_category($category_id){
        $this->Adminauthcheck();
        DB::table('tbl_category')->where('category_id',$category_id)->delete();
        Session::put('message','Category deleted successfully !!');
        return Redirect::to('/all-category');
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
