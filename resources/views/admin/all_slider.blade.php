@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="{{url('/dashboard')}}">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="{{url('/all-slider')}}">All Slider</a></li>
</ul>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-edit"></i><span class="break"></span>All Slider</h2>
           
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
                      <th>product id</th>
                      <th>product image</th>
                      <th>publcation statut</th>
                      <th>Actions</th>
                  </tr>
              </thead>   
              <tbody>
                  @foreach ($sliders as $item)
                      
                  
                <tr>
                    <td>{{$item->slider_id}}</td>
                    <td class="center"><img src="{{url($item->slider_image)}}" style="height:80px;width:80px"></td>
                    <td class="center">
                        @if ($item->publication_statut==1)
                        <span class="label label-success">active</span> 
                        @else
                        <span class="label label-danger">unactive</span> 
                        @endif
                       
                    </td>
                    <td class="center">
                        @if ($item->publication_statut==1)
                    <a class="btn btn-danger" href="{{url('/unactive-slider/'.$item->slider_id)}}">
                            <i class="halflings-icon white thumbs-down"></i>  
                        </a>
                        @else 
                        <a class="btn btn-success" href="{{url('/active-slider/'.$item->slider_id)}}">
                            <i class="halflings-icon white thumbs-up"></i>  
                        </a>
                        @endif
                        <a class="btn btn-danger" href="{{url('/delete-slider/'.$item->slider_id)}}" id="delete">
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