@extends('master')

@section('header')
	<h1>Edit Company</h1>
@endsection

@section('content')
	 <div class="row">
       <div class="col-md-12 ">

		<form method="POST" action="{{ route('companies.update',$company->id) }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group col-md-6">
			    <label for="name">Name</label>
			    <input type="text" class="form-control" id="name" name="name" value="{{ $company->name }} " required>
			</div>

			<div class="form-group col-md-6">
			    <label for="address">address</label>
			    <input type="text" class="form-control" id="address" name="address" value="{{ $company->address }}" required>
			</div>
			
			<div class="form-group col-md-6">
			    <label for="description">Description</label>
			    <textarea type="text" class="form-control" id="description" name="description" rows="8"  required>{{ $company->description }}</textarea>
			</div>

			<div class="form-group col-md-6">
			    <label for="phone">Phone</label>
			    <input type="tel" class="form-control" id="phone" name="phone" minlength="10" maxlength="11" value="{{ $company->phone }}" required>
			</div>
			
			<div class="form-group col-md-6">
			    <label for="category_id">Select company category</label>
			    <select name="category_id" id="category_id" class="form-control">
			    	@foreach($categories as $category)
			    		<option value="{{ $category->id }}" require> {{ $category->name }}</option>
			    	@endforeach
			    </select>
			</div>
			<div class="form-group col-md-6">
				@if("images/companies/'.$company->company_image")
		           	<img style="width: 50px;height: 50px" src="{{ asset('images/companies/'.$company->company_image) }}" alt="company image">
		        @else
	            	<td>No image found</td>
	            @endif
			    <label for="company_image">Company Image</label> 
			    <input type="file" class="form-control" id="company_image" name="company_image"  accept="image/*" required>
			</div>
			<div class="form-group col-md-6">
			    <label for="lat">Latitude</label>
			    <input type="number" class="form-control" id="lat" name="lat" value="{{ $company->lat }}" required>
			</div>
			<div class="form-group col-md-6">
			    <label for="lang">Langtude</label>
			    <input type="number" class="form-control" id="lang" name="lang" value="{{ $company->lang }}" required>
			</div>

		  <div class="form-groub col-md-6">
		  	<button type="submit" class="btn btn-primary">Save Updates</button>
		  </div>		  

		</form>

		

	</div>	
    </div>
@endsection