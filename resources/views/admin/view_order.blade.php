@extends('admin_layout')
@section('admin_content')
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{asset('frontand/w3.css')}}">
<body>
 
<div class="w3-container">
 </br>

  <div class="w3-card-1" style="width:70%">
    <header class="w3-container w3-light-grey">
      <h3>Customer details</h3>
    </header>
    <div class="w3-container">
    </br>
      <table class="w3-table-all">
    <tr>
      <th>customer name</th>
      <th>costomer mobile</th>
    </tr>
      <tr>
      <td>{{$first->customer_name}}</td>
      <td>{{$first->customer_number}}</td>
      </tr>
  </table><br>
    </div>
  </div>
  </br>
 
</div>

<div class="w3-container">
</br>
 <div class="w3-card-6" style="width:70%">
   <header class="w3-container w3-light-grey">
     <h3>Shipping details</h3>
   </header>
   <div class="w3-container">
  </br>
     <table class="w3-table-all">
   <tr>
     <th>Username</th>
     <th>address</th>
     <th>Mobile </th>  
     <th>City </th>  
     <th>email</th>

   </tr>
   <tr>
     <td>{{$first->shipping_last_name .' '.$first->shipping_first_name}}</td>
     <td>{{$first->shipping_address}}</td>
     <td>{{$first->shipping_phone_number}}</td>
     <td>{{$first->shipping_city}}</td>
     <td>{{$first->shipping_email}}</td>
   </tr>

 </table><br>
   </div>
  
 </div>
 </br>
 
</div>
<div class="w3-container">
 </br>
  <div class="w3-card-5" style="width:70%">
    <header class="w3-container w3-light-grey">
      <h3>Order Details</h3>
    </header>
    <div class="w3-container">
    </br>
      <table class="w3-table-all">
    <tr>
      <th>product Name</th>
      <th>product price</th>  
      <th>Poduct quantity</th>
      <th>Poduct sub total</th>

    </tr>
     @foreach ($all_info as $item)
      <tr>
      <td>{{$item->product_name}}</td>
      <td>{{$item->product_price}}</td>
      <td>{{$item->product_sales_quantite}}</td>
      <td>{{($item->product_price)*$item->product_sales_quantite}}</td>
      </tr> 
     @endforeach
     <tr>
      <td>Order Total :</td>
      <td></td>
      <td></td>
      <td>{{$first->order_total}}</td>
     </tr>
  </table>
  
  <br>
    </div>
   
  </div>
  </br>
  
</div>
</body>
</html>

@endsection