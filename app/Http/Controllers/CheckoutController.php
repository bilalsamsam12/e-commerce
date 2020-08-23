<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
session_start();
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{
    public function login_check(){
        return view('pages.login');
    }
    public function add_customer(Request $request){
        $data=array();
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;
        $data['customer_password']=$request->customer_password;
        $data['customer_number']=$request->customer_number;
        $customer_id=DB::table('tbl_customer')->insertGetId($data);
        Session::put('message','Customer add successfully !!');
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$data['customer_name']);
        return Redirect::to('/checkout');

    }
    public function checkout(){
        return view('pages.checkout');
    }
    public function save_shipping_detail(Request $request){
        $data['shipping_email']=$request->shipping_email;
        $data['shipping_first_name']=$request->shipping_first_name;
        $data['shipping_last_name']=$request->shipping_last_name;
        $data['shipping_address']=$request->shipping_address;
        $data['shipping_phone_number']=$request->shipping_phone_number;
        $data['shipping_city']=$request->shipping_city;
        $shipping_id=DB::table('tbl_shipping')->insertGetId($data);
        Session::put('shipping_id',$shipping_id);
        return Redirect::to('/payment');

    }
    public function customer_login(Request $request){
        $customer_email=$request->customer_email;
        $customer_password=$request->customer_password;
        $result=DB::table('tbl_customer')
        ->where('customer_email',$customer_email)
        ->where('customer_password',$customer_password)->first();
        if($result){
            Session::put('customer_id',$result->customer_id);
            return Redirect::to('/checkout');
        }else{
            return Redirect::to('/login-check');
        }


    }
    public function customer_logout(){
        Session::flush();
        return Redirect::to('/');
    }
    public function page_note_fond(){
        return view('pages.page_note_fond');
    }
    public function contact(){
        return view('pages.contact');

    }
}
 