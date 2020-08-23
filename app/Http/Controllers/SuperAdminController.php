<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class SuperAdminController extends Controller
{
    public function logout(){
     //  Session::put('admin_name',null);
     //  Session::put('admin_id',null);
        // return  Redirect::to('/admin');
        Session::flush();
        return Redirect::to('/admin');
    }
    public function index(){
        $this->Admunauthcheck();
        return view('admin.dashboard');

    }
    public function Admunauthcheck(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return;
        }else{
            return Redirect::to('/admin')->send();
        }
    }
}
