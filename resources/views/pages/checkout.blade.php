@extends('layout')
@section('content')
<section id="cart_items">
    <div class="">

        <div class="register-req">
            <p>Please full up this pages </p>
                 </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                
                <div class="col-sm-12 clearfix">
                    <div class="bill-to">
                        <p>Shipping detail</p>
                        <div class="form-one">
                        <form action="{{url('/save-shipping-detail')}}" method="post">
                            {{ csrf_field() }}
                                <input type="text" placeholder="Email" name="shipping_email">
                                <input type="text" placeholder="First Name *" name="shipping_first_name">
                                <input type="text" placeholder="Last Name *" name="shipping_last_name">
                                <input type="text" placeholder="Address *" name="shipping_address">
                                <input type="text" placeholder="Phone Number *" name="shipping_phone_number">
                                <input type="text" placeholder="city" name="shipping_city">
                                <input type="submit" value="Done" class="">

                            </form>
                        </div>
                        
                    </div>
                </div>
               					
            </div>
        </div>
        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div>
       
    </div>
</section> <!--/#cart_items-->
@endsection