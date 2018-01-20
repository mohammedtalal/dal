@extends('master')

@section('header')
	<h1>Edit Category</h1>
@endsection

@section('content')
	 <div class="row">
       <div class="col-md-12 ">
		<form method="POST" action="{{ route('categories.update',$category->id) }}" enctype="multipart/form-data">
			{{ csrf_field() }}

		  <div class="form-group ">
		    <label for="name">Name</label>
		    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
		  </div>
		  
		  <div class="form-group">
		    <label for="description">Description</label>
		    <textarea class="form-control" name="description" name="description" id="description" rows="8" required>{{ $category->description }}</textarea>
		  </div>

		  <div class="form-group">
		  	@if("images/categories/'.$category->image")
	           	<img style="width: 50px;height: 50px" src="{{ asset('images/categories/'.$category->image) }}" alt="">
	        @else
            	<td>No image found</td>
            @endif
	          <label for="category_image">Category Image</label>
	          <input class="form-control" type="file" id="category_image" name="category_image">
	       </div>
		  
		  <div class="form-groub">
		  	<button type="submit" class="btn btn-primary">Update Category</button>
		  </div>		  
		</form>

		

	</div>	
    </div>
@endsection