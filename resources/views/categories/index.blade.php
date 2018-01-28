@extends('master')
@section('header')
	<h1 >Categories</h1>
@endsection

@section('content')
	
	<div class="col-md-12">
		<a href="{{ route('categories.create') }}"  class="btn btn-primary btn-flat">Add New Category</a>
		<!-- <input class="form-control" style="float:right; width: 35%" type="text" id="search" placeholder="Searching.."> -->
	</div>
	<table class=" table table-responsive table-bordered" id="categories-table" >
	    <thead>
	        <th>#</th>
	        <th>Name</th>
	        <th>Description</th>
	        <th>Image</th>
	        <!-- <th>Parent</th> -->
	        <th colspan="3">Action</th>
	    </thead>
	    <tbody>
	   @foreach($categories as $key => $category)
	        <tr>
	            <td>{{ ++$key }}</td>
	            <td>
	            	{{ $category->name }} <br>

	            	@foreach($category->children as $child)
	            		<a href="{{ route('categories.edit',$child->id) }}">
	            			<medium> <b> {{ $child->name }} |</b> </small>
	            		</a> 
					@endforeach
	            </td>
	            <td>
	            	{{ $category->description }} <br>
	            </td>
	            <td ><img style="width: 50px;height: 50px" src="{{ asset('images/categories/'.$category->category_image) }}" alt="category image"></td>
	            <!-- <td>{{ $category->parent_id }}</td> -->
	            <td>
	                <div class='btn btn-group'>
	                    <!-- <a href="" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
	                    <a href="{{ route('categories.edit',$category->id) }}" class='btn btn-info btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

	                    <form  method="post" action="{{ route('categories.destroy',$category->id) }}">
							{{ csrf_field() }}
	                    	<button type="submit" class='btn btn-danger btn-xs'>
	                    		<i class="glyphicon glyphicon-trash"></i>
	                    	</button >
	                    	<input type="hidden" name="_method" value="DELETE">
	                	</form>
	                </div>
	            </td>
	        </tr>
		@endforeach
		
	    </tbody>
	</table>
{{ $categories->links() }}
@endsection




