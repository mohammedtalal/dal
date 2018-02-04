@extends('master')
@section('header')
	<h1>Branches</h1>
@endsection
@section('content')
	
	<div class="col-md-12">
		<a href="{{ route('branches.create') }}" class="btn btn-primary btn-flat">Add New Branch</a>	
	</div>

	<table class="table table-responsive" id="categories-table">
	    <thead>
	        <th>#</th>
	        <th>Address</th>
	        <th>Phone</th>
	        <th>Company Name</th>
	        <th>Latitude</th>
	        <th>Longtude</th>
	        <th class="wrapping">Action</th>
	    </thead>
	    <tbody>
	    
	   		@foreach($branches as $key => $branch)
	        <tr>
	            <td>{{ ++$key }}</td>
	            <td>{{ $branch->address }}</td>
	            <td>{{ $branch->phone }}</td>
	            <td>{{ $branch->companies->name }}</td>
	            <td>{{ $branch->lat }}</td>
	            <td>{{ $branch->long }}</td>

	            <td>
	                
	               <div class='btn btn-group wrapping-buttons'>
	                    
	                    <a href="{{ route('branches.edit',$branch->id) }}" class='btn  btn-info btn-xs'>edit</a>

	                    <form  method="post" action="{{ route('branches.destroy',$branch->id) }}">
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
	{{ $branches->links() }}
@endsection