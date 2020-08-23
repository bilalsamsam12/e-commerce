@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="{{url('/dashboard')}}">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="{{url('/all-category')}}">All Manufacture</a></li>
</ul>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-edit"></i><span class="break"></span>All Manufacture</h2>
           
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
                      <th>id</th>
                      <th>manufacture Name</th>
                      <th>manufacture description</th>
                      <th>manufacture statut</th>
                      <th>Actions</th>
                  </tr>
              </thead>   
              <tbody>
                  @foreach ($manufactures as $item)
                      
                  
                <tr>
                    <td>{{$item->manufacture_id}}</td>
                    <td class="center">{{$item->manufacture_name}}</td>
                    <td class="center">{{$item->manufacture_description}}</td>
                    <td class="center">
                        @if ($item->publication_statut==1)
                        <span class="label label-success">active</span> 
                        @else
                        <span class="label label-danger">unactive</span> 
                        @endif
                       
                    </td>
                    <td class="center">
                        @if ($item->publication_statut==1)
                    <a class="btn btn-danger" href="{{url('/unactive-manufacture/'.$item->manufacture_id)}}">
                            <i class="halflings-icon white thumbs-down"></i>  
                        </a>
                        @else 
                        <a class="btn btn-success" href="{{url('/active-manufacture/'.$item->manufacture_id)}}">
                            <i class="halflings-icon white thumbs-up"></i>  
                        </a>
                        @endif

                        <a class="btn btn-info" href="{{url('/edit-manufacture/'.$item->manufacture_id)}}">
                            <i class="halflings-icon refresh"></i>  
                        </a>
                        <a class="btn btn-danger" href="{{url('/delete-manufacture/'.$item->manufacture_id)}}" id="delete">
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