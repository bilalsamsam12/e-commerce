@extends('layout')
@section('content')

<section id="cart_items">
    <div class="">
        <div class="table-responsive cart_info">
            <?php  if(Cart::isEmpty()) {?>
            <table class="table table-condensed"  style="display:none;">
            <?php }else{ ?>
            <table class="table table-condensed" >
            <?php } ?>
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Image</td>
                        <td class="description">Nome</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $contents=Cart::getContent(); 
                        foreach ($contents as $info) {?>
                    <tr>
                        <td class="cart_product">
                            <?php foreach($info->attributes as $it){ ?>
                        <img src="{{url($it)}}" width="80px" height="80px" alt="{{$info->name}}">
                            <?php } ?>
                        </td>
                        <td class="cart_quantity">
                            <h4>{{$info->name}}</h4>
                        </td>
                        <td class="cart_price">
                            <p> {{$info->price}} $</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                            <a class="cart_quantity_up" href="{{url('/up-quantity/'.$info->id.'/'.$info->quantity)}}"> + </a>
                            <input class="cart_quantity_input" type="text" name="quantity" value="{{$info->quantity}}" autocomplete="off" size="2">
                            <a class="cart_quantity_down" href="{{url('/down-quantity/'.$info->id.'/'.$info->quantity)}}"> - </a>
                            </div>
                        </td>
                        <td class="cart_price">
                            <p >{{($info->price)*($info->quantity)}} $</p>
                        </td>
                        <td class="cart_delete">
                        <a class="cart_quantity_delete" href="{{url('/delete-product-rowid/'.$info->id)}}"><i class="fa fa-times"></i></a>
                            
                    </td>

                    </tr>
                <?php }?>
                   
                </tbody>
            </table>
         
        </div> 
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                            
                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                        
                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div> </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                    <li>Cart Sub Total <span>{{Cart::getSubTotal()}}$</span></li>
                        <li>Eco Tax <span> $</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>{{Cart::getTotal()}} $</span></li>
                    </ul>
                       <a class="btn btn-default update" href="">Update</a>
                       <?php $customer=Session::get('customer_id'); ?>
                       <?php if($customer!=null){ ?>
                       <a class="btn btn-default check_out" href="{{url('/checkout')}}">Check Out</a>
                       <?php }else{ ?>
                       <a class="btn btn-default check_out" href="{{url('/login-check')}}">Check Out</a>
					<?php } ?>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
@endsection