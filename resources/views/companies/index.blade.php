@extends('master')
@section('header')
	<h1>Companies</h1>
@endsection
@section('content')
	
	<div class="col-md-12">
		<a href="{{ route('companies.create') }}" class="btn btn-primary btn-flat">Add New Company</a>
		<!-- <input class="form-control" style="float:right; width: 35%" type="text" id="search" placeholder="Searching.."> -->
	</div>

	<table class="table table-responsive" id="categories-table">
	    <thead>
	        <th>#</th>
	        <th>Name</th>
	        <th>Address</th>
	        <th>Phone</th>
	        <th >Description</th>
	        <th>Cat.name</th>
	        <th>Latitude</th>
	        <th>Langtude</th>
	        <th>Image</th>
	        <th class="wrapping">Action</th>
	    </thead>
	    <tbody>
	   		@foreach($companies as $key => $company)
		        <tr>
		            <td>{{ ++$key }}</td>
		            <td>{{ $company->name }}</td>
		            <td>{{ $company->address }}</td>
		            <td>{{ $company->phone }}</td>
		            <td>{{ $company->description }}</td>
		            <td>{{ $company->categories->name }}</td>
		            <td>{{ $company->lat }}</td>
		            <td>{{ $company->long }}</td>
		            <td><img style="width: 50px;height: 50px" src="{{ asset('images/'.$company->company_image) }}" alt="company image"></td>
		            
		            <td>
	                	<div class='btn btn-group wrapping-buttons'>
		                  
		                    <a href="{{ route('companies.edit',$company->id) }}" class='btn  btn-info btn-xs'>edit</a>
											
		                    <form  method="post" action="{{ route('companies.destroy',$company->id) }}">
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
{{ $companies->links() }}
@endsection