@extends('master')

@section('header')
	<h1>Create Interval</h1>
	<br>
@endsection

@section('content')
	<div class="row">
	    <div class="col-md-12 ">
			<form method="POST" action="{{ route('intervals.store') }}">
				{{ csrf_field() }}
				<div class="form-group col-md-12 center">
				    <label for="interval">Interval in hours</label>
				    <input type="number" class="form-control centre" id="interval" name="interval" required>
				</div>  
				<div class="form-groub col-md-12">
				  	<button type="submit" class="btn btn-primary btn-flat">Add Interval</button>
				</div>
			</form>
		</div>	
 	</div>
@endsection