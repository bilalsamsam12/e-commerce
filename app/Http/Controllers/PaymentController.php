<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Cart;
use Facade\FlareClient\View;
use PhpParser\Node\Stmt\Else_;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
session_start();
class PaymentController extends Controller
{
    public function payment(){
        return view('pages.payment');
    }
    public function methode($methode){
        $pdata=$odata=$oddata=array();
        $pdata['payment_methode']=$methode;
        $pdata['payment_statut']='pending';
        $payment_id=DB::table('tbl_payment')->insertGetId($pdata);

        $odata['customer_id']=Session::get('customer_id');
        $odata['shipping_id']=Session::get('shipping_id');
        $odata['payment_id']=$payment_id;
        $odata['order_total']=Cart::getTotal();
        $odata['order_statut']='pending';
        $order_id=DB::table('tbl_order')->insertGetId($odata);

        $contents=Cart::getContent(); 
        foreach ($contents as $info){
            $oddata['order_id']=$order_id;
            $oddata['product_id']=$info->id;
            $oddata['product_name']=$info->name;
            $oddata['product_price']=$info->price;
            $oddata['product_sales_quantite']=$info->quantity;
           DB::table('tbl_order_details')->insert($oddata);
        }

           if($methode=='paypal'){
            print_r('sesses pypale');
           }else{
               Cart::clear();
            return View('pages.cashondelivery');
           }
    }


    public function manage_orders(){
    $orders=DB::table('tbl_order')->
    join('tbl_customer','tbl_order.customer_id','=','tbl_order.customer_id')
    ->select('tbl_order.*','tbl_customer.customer_name')->get();
    return view('admin.manage_orders',['orders'=>$orders]);
    }

    public function unactive_order($order_id){
        DB::table('tbl_order')->where('order_id',$order_id)->update(['order_statut'=>0]);
        Session::put('message','order ative successfully !!');
        return Redirect::to('/manage-orders');
    }
    public function active_order($order_id){
        DB::table('tbl_order')->where('order_id',$order_id)->update(['order_statut'=>'pending']);
        Session::put('message','order unative successfully !!');
        return Redirect::to('/manage-orders');
    }
    public function view_order($order_id){
        $this->Adminauthcheck();
        $orders_all_info=DB::table('tbl_order')
        -> join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        -> join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        -> join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')->where('tbl_order.order_id',$order_id)
        ->select('tbl_order.*','tbl_customer.*','tbl_shipping.*','tbl_order_details.*')->get();
        
      return view('admin.view_order',['all_info'=>$orders_all_info,'first'=>$orders_all_info->first()]);
    }
   
    public function delete_order($order_id){
        $this->Adminauthcheck();
        DB::table('tbl_order')->where('order_id',$order_id)->delete();
        Session::put('message','order deleted successfully !!');
        return Redirect::to('/manage-orders');
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
