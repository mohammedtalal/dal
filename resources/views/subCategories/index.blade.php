@extends('master')
@section('header')
	<h1 >Sub Categories</h1>	
@endsection

@section('content')
	<a href="{{ route('categories.create') }}" class="btn btn-primary">Add New Sub-Category</a>
	
	<table class="table table-responsive" id="categories-table" >
	    <thead>
	        <th>#</th>
	        <th>Name</th>
	        <th>Description</th>
	        <th>Image</th>
	        <th>Parent</th>
	        <th colspan="3">Action</th>
	    </thead>
	    <tbody>
	   @foreach($subCategories as $key => $cat)
	        <tr>
	            <td>{{ ++$key }}</td>
	            <td>{{ $cat->name }}</td>
	            <td>{{ $cat->description }}</td>
	            <td ><img style="width: 50px;height: 50px" src="{{ asset('images/categories/'.$cat->category_image) }}" alt=""></td>
				<td>{{ $cat->parent_category->name }}</td>
	            <td>
	                <div class='btn btn-group'>
	                    <!-- <a href="" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
	                    <a href="{{ route('categories.edit',$cat->id) }}" class='btn btn-info btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

	                    <form  method="post" action="{{ route('categories.destroy',$cat->id) }}">
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
	{{ $subCategories->links() }}
@endsection