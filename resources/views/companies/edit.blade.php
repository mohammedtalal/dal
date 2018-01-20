@extends('master')

@section('header')
	<h1>Edit Company</h1>
@endsection

@section('content')
	 <div class="row">
       <div class="col-md-12 ">

		<form method="POST" action="{{ route('companies.update',$company->id) }}">
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
			    <input type="tel" class="form-control" id="phone" name="phone" value="{{ $company->phone }}" required>
			</div>
			
			<div class="form-group col-md-6">
			    <label for="category_id">Select company category</label>
			    <select name="category_id" id="category_id" class="form-control">
			    	@foreach($categories as $cat)
			    		<option value="{{ $cat->id }}" require> {{ $cat->name }}</option>
			    	@endforeach
			    </select>
			</div>
			<div class="form-group col-md-6">
			    <label for="company_image">Company Image</label>
			    <input type="file" class="form-control" id="company_image" name="company_image" accept="image/*" required>
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