<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function add_to_cart(Request $request){
        
        $qte=$request->quantite;
        $product_id=$request->product_id;
        $info_product=DB::table('tbl_products')->where('product_id',$product_id)->get();
        foreach($info_product as $item){
           
            $data['id']=$item->product_id;
            $data['name']=$item->product_name;
            $data['price']=$item->product_price;
            $data['quantity']=$qte;
            $data['image']=$item->product_image;
        }
        Cart::add(array(
            'id' => $data['id'],
            'name' => $data['name'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'attributes' =>$data['image'],
            'conditions'=> $data['id'] 
        ));
        return Redirect::to('/show-cart');
    }
    public function show_cart(){
        return view('pages.add_to_cart');
    }
    public function delete_product_rowid($rowid){
        Cart::remove($rowid);
        return view('pages.add_to_cart');
    }
    public function up_quantity($id,$qty){
        Cart::update($id, array(
            'quantity' => 1,
          ));
        return view('pages.add_to_cart');

    }
    public function down_quantity($id,$qty){
        Cart::update($id, array(
            'quantity' => -1,
          ));
        return view('pages.add_to_cart');
    }
}
