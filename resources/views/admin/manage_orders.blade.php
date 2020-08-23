@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="{{url('/dashboard')}}">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="{{url('/manage-orders')}}">manage order</a></li>
</ul>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-edit"></i><span class="break"></span>Manage Order</h2>
           
        </div>
        <p class="alert-success"> 
            <?php 
            $message=Session::get('message');
            if ($message){
               echo $message;
               Session::put('message',null);
            }
             ?>  
              </p>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                      <th>Order id</th>
                      <th>Customer name</th>
                      <th>Order total</th>
                      <th>statut</th>
                      <th>Actions</th>
                  </tr>
              </thead>   
              <tbody>
                  @foreach ($orders as $item)
                      
                  
                <tr>
                    <td>{{$item->order_id}}</td>
                    <td class="center">{{$item->customer_name}}</td>
                    <td class="center">{{$item->order_total}}</td>
                    <td class="center">
                        @if ($item->order_statut=='pending')
                        <span class="label label-success">{{$item->order_statut}}</span> 
                        @else
                        <span class="label label-danger">{{$item->order_statut}}</span> 
                        @endif
                       
                    </td>
                    <td class="center">
                        @if ($item->order_statut=='pending')
                    <a class="btn btn-danger" href="{{url('/unactive-order/'.$item->order_id)}}">
                            <i class="halflings-icon white thumbs-down"></i>  
                        </a>
                        @else 
                        <a class="btn btn-success" href="{{url('/active-order/'.$item->order_id)}}">
                            <i class="halflings-icon white thumbs-up"></i>  
                        </a>
                        @endif

                        <a class="btn btn-info" href="{{url('/view-order/'.$item->order_id)}}">
                            <i class="halflings-icon white eye"></i>  
                        </a>
                        <a class="btn btn-danger" href="{{url('/delete-order/'.$item->order_id)}}" id="delete">
                            <i class="halflings-icon white trash"></i> 
                        </a>
                    </td>
                </tr>
               @endforeach
              </tbody>
          </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->

@endsection