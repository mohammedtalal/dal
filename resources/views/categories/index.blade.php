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
	        <th class="wrapping">Action</th>
	    </thead>
	    <tbody>
	   @foreach($categories as $key => $category)
	        <tr>
	            <td>{{ ++$key }}</td>
	            <td>
	            	{{ $category->name }} <br>
					
	            	@foreach($category->children->slice(0,3) as $child)
	            	<ul>
	            		<a href="{{ route('categories.edit',$child->id) }}">
	            			<li>
	            				<small> <b> {{ $child->name }}</b> </small>
	            			</li>
	            		</a>	            		
	            	</ul>
					@endforeach
					@if($category->children->count())
						<a href="{{ route('subCategories.index') }}"> <small class="pull-right"><b>view all</b></small> </a>
					@endif
					
	            </td>
	            <td>
	            	{{ $category->description }} <br>
	            </td>
	            <td ><img style="width: 50px;height: 50px" src="{{ asset('images/categories/'.$category->category_image) }}" alt="category image"></td>
	            <td>
	                <div class='btn btn-group wrapping-buttons'>
	                 
	                    <a href="{{ route('categories.edit',$category->id) }}" class='btn  btn-info btn-xs'>edit</a>

	                    <form  method="post" action="{{ route('categories.destroy',$category->id) }}">
							{{ csrf_field() }}
	                    	<button class='btn btn-danger btn-xs' type="submit">Delete</button>

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




