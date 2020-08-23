<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
session_start();
class SliderController extends Controller
{
    public function index(){
        $this->Adminauthcheck();
           return View('admin.add_slider');
       }
       public function all_slider(){
        $this->Adminauthcheck();
            $sliders=DB::table('tbl_slider')->get();
            return view('admin.all_slider',['sliders'=>$sliders]);
       }
    
       public function save_slider(Request $request){
        $this->Adminauthcheck();
        $date=array();
        $val=0;
        if($request->ps!=0){
            $val=1;
        }else{
            $val=0;
        }
        $date['publication_statut']=$val;
        $image=$request->file('slider_image');
        if($image){
            $image_name=Str::random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $date['slider_image']=$image_url;
                DB::table('tbl_slider')->insert($date);
                Session::put('message','Slider add successfully !!');
                return Redirect::to('/add-slider');
            }
        }
                $date['slider_image']='';
                DB::table('tbl_slider')->insert($date);
                Session::put('message','Slider add successfully  without image!!');
                return Redirect::to('/add-slider');
    
    }
        public function unactive_slider($slider_id){
            DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['publication_statut'=>0]);
            Session::put('message','Slider ative successfully !!');
            return Redirect::to('/all-slider');
        }
        public function active_slider($slider_id){
            DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['publication_statut'=>1]);
            Session::put('message','slider unative successfully !!');
            return Redirect::to('/all-slider');
        }
        public function edit_slider($slider_id){
            $this->Adminauthcheck();
             $cat=DB::table('tbl_slider')->where('category_id',$slider_id)->get();
                return view('admin.edit_slider',['cat'=>$cat]);
        }
        public function update_slider(Request $request){
            $this->Adminauthcheck();
             $date=array();
             $cat_id=$request->category_id;
             $date['category_name']=$request->category_name;
             $date['category_description']=$request->category_description;
             DB::table('tbl_category')->where('category_id',$cat_id)->update($date);
             Session::put('message','Category updated successfully !!');
            return Redirect::to('/all-category');
        }
        public function delete_slider($slider_id){
            $this->Adminauthcheck();
            DB::table('tbl_slider')->where('slider_id',$slider_id)->delete();
            Session::put('message','slider deleted successfully !!');
            return Redirect::to('/all-slider');
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
