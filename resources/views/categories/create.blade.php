@extends('master')

@section('header')
	<h1>Create Category</h1>
@endsection

@section('content')
	 <div class="row">
       <div class="col-md-12 ">
		<form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
			
			{{ csrf_field() }}
		  <div class="form-group ">
		    <label for="name">Name</label>
		    <input type="text" class="form-control" id="name" name="name" pattern=".*\S+.*" required>
		  </div>
		  
		  <div class="form-group">
		    <label for="description">Description</label>
		    <textarea class="form-control" name="description" name="description" id="description" rows="8" pattern=".*\S+.*" required></textarea>
		  </div>

		  <div class="form-group col-md-6">
	          <label for="category_image">Category Image</label>
	          <input class="form-control" type="file" id="category_image" name="category_image" accept="image/*" required>
	        </div>

	        <div class="form-group col-md-6">
	          <label for="parent_id">Parent ?</label>
	          <select name="parent_id" class="form-control">
	          	<option value="0">None</option>
	          	@foreach($categories as $category)
	          		<option value="{{ $category->id }}">{{ $category->name }}</option>
	          	@endforeach
	          </select>
       	  </div>
		  
		  <div class="form-groub">
		  	<button type="submit" class="btn btn-primary">Add Category</button>
		  </div>		  
		</form>

		

	</div>	
    </div>
@endsection