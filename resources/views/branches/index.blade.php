@extends('master')
@section('header')
	<h1>Branches</h1>
@endsection
@section('content')
	
	<a href="{{ route('branches.create') }}" class="btn btn-primary">Add New Branch</a>

	<table class="table table-responsive" id="categories-table">
	    <thead>
	        <th>#</th>
	        <th>Address</th>
	        <th>Phone</th>
	        <th>Company Name</th>
	        <th>Latitude</th>
	        <th>Longtude</th>
	        <th colspan="3">Action</th>
	    </thead>
	    <tbody>
	    
	   		@foreach($branches as $key => $branch)
	        <tr>
	            <td>{{ ++$key }}</td>
	            <td>{{ $branch->address }}</td>
	            <td>{{ $branch->phone }}</td>
	            <td>{{ $branch->companies->name }}</td>
	            <td>{{ $branch->lat }}</td>
	            <td>{{ $branch->lang }}</td>

	            <td>
	                
	               <div class='btn btn-group'>
	                    <!-- <a href="" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
	                    <a href="{{ route('branches.edit',$branch->id) }}" class='btn btn-info btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

	                    <form  method="post" action="{{ route('branches.destroy',$branch->id) }}">
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
	{{ $branches->links() }}
@endsection