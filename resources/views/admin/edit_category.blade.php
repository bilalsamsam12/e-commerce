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
        <a href="{{url('/add-category')}}">Edit Category</a>
        </li>
    </ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit category</h2>
      
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
        <form class="form-horizontal" method="post" action="{{url('/update-category')}}" >
          {{ csrf_field() }}
          @method('put')
              <fieldset>
                  @foreach ($cat as $item)
                      
                  
                <div class="control-group">
                  <label class="control-label" for="typeahead">Category Name :</label>
                  <div class="controls">
                  <input type="text" class="span6 typeahead" id="typeahead" name="category_name"  value="{{$item->category_name}}">
                  <input type="hidden" class="span6 typeahead" id="typeahead" name="category_id"  value="{{$item->category_id}}">
                  </div>
                </div>
                <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Category Description : </label>
                    <div class="controls">
                      <textarea  id="textarea2" rows="10" cols="6" name="category_description"  >{{$item->category_description}}</textarea>
                    </div>
                  </div>
               
                <div class="form-actions">
                  <button type="submit" class="btn btn-danger">Update Category</button>
                </div>
                @endforeach
              </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->

@endsection