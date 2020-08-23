@extends('admin_layout')
@section('admin_content')

    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{url('/dashboard')}}">Home</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <i class="icon-edit"></i>
        <a href="{{url('/add-manufacture')}}">Add manufacture</a>
        </li>
    </ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Manufacture</h2>
      
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
        <form class="form-horizontal" method="post" action="{{url('/save-manufacture')}}" >
          {{ csrf_field() }}
              <fieldset>
                <div class="control-group">
                  <label class="control-label" for="typeahead">Manufacture Name :</label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" id="typeahead" name="manufacture_name" >
                  </div>
                </div>
               
                <div class="control-group hidden-phone">
                  <label class="control-label" for="textarea2">Manufacture Description : </label>
                  <div class="controls">
                    <textarea id="textarea2" rows="10" name="manufacture_description" ></textarea>
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Publication Statut:</label>
                    <div class="controls">
                      <input type="checkbox" class="span6 typeahead"  id="typeahead" name="ps" value="1" >
                    </div>
                  </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Add Manufacture</button>
                </div>
              </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->

@endsection