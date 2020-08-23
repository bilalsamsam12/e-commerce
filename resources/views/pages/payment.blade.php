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

<section id="cart_items">
   

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-3">
                    <div class="order-message">
                        <p>Cash on delivery</p>
                    <a href="{{url('/methode/cashondelivery')}}"><img src="{{URL::to('frontand/images/payment/cashondelivery.JPG')}}" width="150px" height="70px"  alt="cash on delivery" /></a>
                    </div>	
                </div>	
                <div class="col-sm-3">
                    <div class="order-message">
                        <p>Pypale</p>
							<a href="{{url('/methode/paypal')}}"><img src="{{URL::to('frontand/images/payment/PayPal.JPG')}}" width="180px" height="70px"  alt="PayPal" /></a>
                    </div>	
                </div>	
                <div class="col-sm-3">
                    <div class="order-message">
                        <p>Shipping Order</p>
                    </div>	
                </div>				
            </div>
        </div>
        
    </div>
</section> <!--/#cart_items-->
@endsection