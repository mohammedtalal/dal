@extends('master')

@section('header')
	<h1>Branches</h1>
@endsection

@section('content')
	 <div class="row">
       <div class="col-md-12 ">
		<form method="POST" action="{{ route('branches.store') }}">
			{{ csrf_field() }}
		<div class="form-group col-md-6">
		    <label for="address">Address</label>
		    <input type="text" class="form-control" id="address" name="address" required>
		</div>
		  
		<div class="form-group col-md-6">
		    <label for="phone">Phone</label>
		    <input 	type="tel" class="form-control" name="phone" id="phone" rows="8" required>
		</div>

        <div class="form-group col-md-6">
		    <label for="lat">Latitude</label>
		    <input type="number" class="form-control" id="lat" name="lat" required>
		</div>
		<div class="form-group col-md-6">
		    <label for="lang">Langtude</label>
		    <input type="number" class="form-control" id="lang" name="lang" required>
		</div>
		
		<div class="form-group col-md-12">
		    <label for="company_id">Select company of branch</label>
		    <select name="company_id" id="company_id" class="form-control">
		    	@foreach($companies as $company)
	    			<option value="{{ $company->id }}" require>{{ $company->name }}</option>
	    		@endforeach
		    </select>
		</div>
		  
		  <div class="form-group col-md-6">
		  	<button type="submit" class="btn btn-primary">Add Branch</button>
		  </div>		  

		</form>

		

	</div>	
    </div>
@endsection