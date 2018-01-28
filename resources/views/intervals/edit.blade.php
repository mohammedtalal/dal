@extends('master')

@section('header')
	<h1>Update Interval</h1>
	<br>
@endsection

@section('content')
	<div class="row">
	    <div class="col-md-12 ">
			<form method="POST" action="{{ route('intervals.update',$intervals->id) }}">
				{{ csrf_field() }}
				<div class="form-group col-md-12 center">
				    <label for="interval">Interval in hours</label>
				    <input type="number" class="form-control centre" id="interval" name="interval" value="{{ $intervals->interval }}" required>
				</div>  
				<div class="form-groub col-md-12">
				  	<button type="submit" class="btn btn-primary btn-flat">Update Interval</button>
				</div>
			</form>
		</div>	
 	</div>
@endsection