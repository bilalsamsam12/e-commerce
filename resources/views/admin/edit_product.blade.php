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
        <a href="{{url('/edit-product')}}">Edit Product</a>
        </li>
    </ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Product</h2>
      
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
        <form class="form-horizontal" method="post" action="{{url('/update-product')}}"  enctype="multipart/form-data">
          {{ csrf_field() }}
          @method('put')
              <fieldset>
                @foreach ($cat as $item)
                <div class="control-group">
                  <label class="control-label" for="typeahead">Product Name :</label>
                  <div class="controls">
                  <input type="text" class="span6 typeahead" id="typeahead" name="product_name" value="{{$item->product_name}}" >
                  <input type="hidden" class="span6 typeahead" id="typeahead" name="product_id" value="{{$item->product_id}}" >
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="selectError3">Category Name :</label>
                    <div class="controls">
                      <select id="selectError3" name="category_id">
                        <option >-----select category-----</option>
                        <?php 
					      	$category=DB::table('tbl_category')->where('publication_statut',1)->get();
					      	foreach ($category as $item3) {
			   	      	   	?>
					      		<div class="panel panel-default">
					      			<div class="panel-heading">
                         <option value="{{$item3->category_id}}">{{$item3->category_name}}</option>
				   			   	</div>
				   			</div>
					  		<?php } ?>
                          
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="selectError3">Manufacture Name :</label>
                    <div class="controls">
                      <select id="selectError3" name="manufacture_id">
                        <option>-----select manufacture-----</option>

                        <?php 
                        $manufacture=DB::table('tbl_manufacture')->where('publication_statut',1)->get();
                        foreach ($manufacture as $item2) {
                        ?>
                           <option value="{{$item2->manufacture_id}}">{{$item2->manufacture_name}}</option>
                        <?php }  ?>
                     
                      </select>
                    </div>
                  </div>
                <div class="control-group hidden-phone">
                  <label class="control-label" for="textarea2">Product short Description : </label>
                  <div class="controls">
                    <textarea id="textarea2" rows="10" name="product_short_description" >{{$item->product_short_description}}</textarea>
                  </div>
                </div>
                <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Product long Description : </label>
                    <div class="controls">
                      <textarea id="textarea2" rows="10" name="product_long_description" >{{$item->product_long_description}}</textarea>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="typeahead">Product Price :</label>
                    <div class="controls">
                      <input type="text" class="span6 typeahead" id="typeahead" name="product_price" value="{{$item->product_price}}" >
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="fileInput">Product image :</label>
                    <div class="controls">
                      <input class="input-file uniform_on" name="product_image" id="fileInput" type="file"  >
                    <p><img src="{{url($item->product_image)}}" style="height:80px;width:80px" id="show"></p>
                    </div>
                  </div> 
                  <div class="control-group">
                    <label class="control-label" for="typeahead">Product Size :</label>
                    <div class="controls">
                      <input type="text" class="span6 typeahead" id="typeahead" name="product_size" value="{{$item->product_size}}" >
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="typeahead">Product Color :</label>
                    <div class="controls">
                      <input type="text" class="span6 typeahead" id="typeahead" name="product_color" value="{{$item->product_color}}"  >
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="typeahead">Product  quantite:</label>
                    <div class="controls">
                      <input type="text" class="span6 typeahead" id="typeahead" name="quantite" value="{{$item->quantite}}"  >
                    </div>
                  </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Publication Statut:</label>
                    <div class="controls">
                      <input type="checkbox" class="span6 typeahead"  id="typeahead" name="ps" value="1" >
                    </div>
                  </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Edit Product</button>
                </div>
                @endforeach
              </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->

@endsection