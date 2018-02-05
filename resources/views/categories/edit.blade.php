@extends('master')

@section('header')
	<h1>Edit Category</h1>
@endsection

@section('content')
	 <div class="row">
       <div class="col-md-12">
		<form method="POST" action="{{ route('categories.update',$category->id) }}" enctype="multipart/form-data">
			{{ csrf_field() }}

		  <div class="form-group ">
		    <label for="name">Name</label>
		    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
		  </div>
		  
		  <div class="form-group ">
		    <label for="description">Description</label>
		    <textarea class="form-control" name="description" name="description" id="description" rows="8" required>{{ $category->description }}</textarea>
		  </div>

		  <div class="form-group col-md-6">
		  	@if("images/categories/'.$category->category_image")
	           	<img style="width: 50px;height: 50px" src="{{ asset('images/categories/'.$category->category_image) }}" alt="category image">
	        @else
            	<td>No image found</td>
            @endif
	          <label for="category_image">Category Image</label>
	          <input class="form-control" type="file" id="category_image" name="category_image" accept="image/*" required>
	       </div>

	       <div class="form-group col-md-6" style="margin-top: 24px;">
	          <label for="parent_id">Parent ?</label>
	          <select name="parent_id" class="form-control">
	          	@if($category->parent_category)
	          		<option value="{{ $category->parent_category->id }}">{{ $category->parent_category->name }}</option>
	          	@elseif(! $category->parent_category)
	          	<option value="0">None</option>
	          	@endif
	          	@foreach($categories as $category)
	          		<option value="{{ $category->id }}">{{ $category->name }}</option>
	          	@endforeach
	          </select>
       	  	</div>
		  
		  <div class="form-groub col-md-12">
		  	<button type="submit" class="btn btn-primary">Update Category</button>
		  </div>		  
		</form>

		

	</div>	
    </div>
@endsection