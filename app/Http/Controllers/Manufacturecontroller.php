<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

session_start();
class Manufacturecontroller extends Controller
{
    public function index(){
        $this->Adminauthcheck();
        return View('admin.add_manufacture');
    }
        public function all_manufacture(){
            $this->Adminauthcheck();
            $manufactures=DB::table('tbl_manufacture')->get();
            $manage_manufacture=View('admin.all_manufacture')->with('manufactures',$manufactures);
            return view('admin_layout')->with('admin.all_manufacture', $manage_manufacture);
       
       }

       public function save_manufacture(Request $request){
        $this->Adminauthcheck();
        $date=array();
        $val=0;
        $date['manufacture_name']=$request->manufacture_name;
        $date['manufacture_description']=$request->manufacture_description;
        if($request->ps!=0){
            $val=1;
        }else{
            $val=0;
        }
        $date['publication_statut']=$val;
        DB::table('tbl_manufacture')->insert($date);
        Session::put('message','Manufacture add successfully !!');
        return Redirect::to('/add-manufacture');
    
    }
    public function unactive_manufacture($manufacture_id){
        $this->Adminauthcheck();
        DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)->update(['publication_statut'=>0]);
        Session::put('message','Manufacture ative successfully !!');
        return Redirect::to('/all-manufacture');
    }
    public function active_manufacture($manufacture_id){
        
        DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)->update(['publication_statut'=>1]);
        Session::put('message','Manufacture unative successfully !!');
        return Redirect::to('/all-manufacture');
    }

    public function edit_manufacture($manufacture_id){
       
        $cat=DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)->get();
           return view('admin.edit_manufacture',['cat'=>$cat]);
   }
   public function update_manufacture(Request $request){
    $this->Adminauthcheck();
        $date=array();
        $cat_id=$request->manufacture_id;
        $date['manufacture_name']=$request->manufacture_name;
        $date['manufacture_description']=$request->manufacture_description;
        DB::table('tbl_manufacture')->where('manufacture_id',$cat_id)->update($date);
        Session::put('message','Manufacture updated successfully !!');
       return Redirect::to('/all-manufacture');
   }
   public function delete_manufacture($manufacture_id){
    $this->Adminauthcheck();
       DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)->delete();
       Session::put('message','Manufacture deleted successfully !!');
       return Redirect::to('/all-manufacture');
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

