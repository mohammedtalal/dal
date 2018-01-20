@extends('master')

@section('header')
	<h1>Create Category</h1>
@endsection

@section('content')
	 <div class="row">
       <div class="col-md-12 ">
		<form method="POST" action="{{ route('subCategories.store') }}" enctype="multipart/form-data">
			
			{{ csrf_field() }}
		  <div class="form-group ">
		    <label for="name">Name</label>
		    <input type="text" class="form-control" id="name" name="name" required>
		  </div>
		  
		  <div class="form-group">
		    <label for="description">Description</label>
		    <textarea class="form-control" name="description" name="description" id="description" rows="8" required></textarea>
		  </div>

		  <div class="form-group col-md-6">
	          <label for="featured_image_id">Category Image</label>
	          <input class="form-control" type="file" id="featured_image_id" name="featured_image_id">
       	  </div>

       	  <div class="form-group col-md-6">
	          <label for="featured_image_id">Parent ?</label>
	          <select name="sub_category" class="form-control">
	          	<option sub_category  value=""></option>
	          </select>
       	  </div>
		  
		  <div class="form-groub">
		  	<button type="submit" class="btn btn-primary">Add Category</button>
		  </div>		  
		</form>

		

	</div>	
    </div>
@endsection