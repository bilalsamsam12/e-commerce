@extends('layout')
@section('content')


<div class="col-sm-9 padding-right">
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product"  >
                <img src="{{url($pros->product_image)}}" style="height: 300px" alt="" />
                
            </div>
            <div id="similar-product" class="carousel slide" data-ride="carousel">
                
                 
            </div>

        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                <h2>{{$pros->product_name}}</h2>
                <p>Color :{{$pros->product_color}}</p>
                <img src="{{asset('frontand/images/product-details/rating.png')}}" alt="" />
                <span>
                    <span>US {{$pros->product_price}}$</span>
                <form action="{{url('/add-to-cart')}}" method="POST">
                    {{ csrf_field() }}
                          <label>Quantity:</label>
                          <input type="text"  name="quantite" value="1" style="margin-bottom:15px "/>
                          <input type="hidden"  name="product_id" style="margin-bottom:15px " value="{{$pros->product_id}}"/>
                          <button type="submit" class="btn btn-fefault cart">
                         <i class="fa fa-shopping-cart"></i> Add to cart </button>
                    </form>
                </span>

                <p><b>Availability:
                    @if ($pros->quantite >=1)
                    <b class="label label-success"> In Stock  ({{$pros->quantite}})</b>
                    @else
                    <b class="label label-danger"> out Stock  ({{$pros->quantite}})</b>
                    @endif
                  </b>
                <p><b>Condition:</b> New</p>
                <p><b>Brand:</b> {{$pros->manufacture_name}}</p>
                <p><b>Category:</b>{{$pros->category_name}}</p>
                <p><b>size:</b> {{$pros->product_size}}</p>
                <a href=""><img src="images/product-details/share.png"
                     class="share img-responsive"  alt="" /></a>
            </div><!--/product-information-->
        </div>
    </div><!--/product-details-->
    <div class="category-tab shop-details-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li><a href="#details" data-toggle="tab">Details</a></li>
                <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
                <li><a href="#tag" data-toggle="tab">Tag</a></li>
                <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade" id="details" >
                <div class="col-sm-3">
                                 <p> {{$pros->product_long_description}}</p>
                           
                </div>
               
            </div>
            
            <div class="tab-pane fade" id="companyprofile" >
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery1.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
            <div class="tab-pane fade" id="tag" >
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery1.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
            
            <div class="tab-pane fade active in" id="reviews" >
                <div class="col-sm-12">
                    <ul>
                        <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                        <li><a href=""><i class="fa fa-clock-o"></i><?php  echo date("h:i a");  ?></a></li>
                        <li><a href=""><i class="fa fa-calendar-o"></i><?php echo date("D d M Y");  ?></a></li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <p><b>Write Your Review</b></p>
                    
                    <form action="#">
                        <span>
                            <input type="text" placeholder="Your Name"/>
                            <input type="email" placeholder="Email Address"/>
                        </span>
                        <textarea name="" ></textarea>
                        <b>Rating: </b> <img src="{{url('frontand/images/product-details/rating.png')}}" alt="" />
                        <button type="button" class="btn btn-default pull-right">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
            
        </div>
    </div><!--/category-tab-->
@endsection