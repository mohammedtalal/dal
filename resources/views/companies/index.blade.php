@extends('master')
@section('header')
	<h1>Companies</h1>
@endsection
@section('content')

	<a href="{{ route('companies.create') }}" class="btn btn-primary">Add New Company</a>

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
	        <th colspan="3">Action</th>
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
		            <td>{{ $company->lang }}</td>
		            <td><img style="width: 50px;height: 50px" src="{{ asset('images/companies/'.$company->company_image) }}" alt="company image"></td>
		            
		            <td>
	                	<div class='btn btn-group'>
		                  
		                    <a href="{{ route('companies.edit',$company->id) }}" class='btn btn-info btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
											
		                    <form  method="post" action="{{ route('companies.destroy',$company->id) }}">
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
{{ $companies->links() }}
@endsection