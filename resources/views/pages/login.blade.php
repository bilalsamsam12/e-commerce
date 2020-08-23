@extends('layout')
@section('content')
<section id="form"><!--form-->
    <div class="">
        <div class="row">
            <div class="col-sm-5 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                <form action="{{url('/customer-login')}}" method="post">
                        {{ csrf_field() }}
                        <input type="email" placeholder="Email Address"  name="customer_email"/>
                        <input type="password" placeholder="Password" name="customer_password" />
                        
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-5">
                <div class="signup-form"><!--sign up form-->
                    <h2>New Customer Signup!</h2>
                    <form action="{{url('/add-customer')}}" method="post">
                        {{ csrf_field() }}
                        <input type="text" placeholder="Customer Name" required name="customer_name"/>
                        <input type="email" placeholder="Email Address" required name="customer_email"/>
                        <input type="text" placeholder="Mobile Number" required name="customer_number"/>
                        <input type="password" placeholder="Password" required name="customer_password"/>
                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection