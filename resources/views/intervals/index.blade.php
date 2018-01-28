@extends('master')
@section('header')
	<h1>Interval</h1>
@endsection
@section('content')
    @if(empty($numberOfIntervals))
      <a href="{{ route('intervals.create') }}" class="btn btn-primary btn-flat">Add Interval</a>
    @elseif(!empty($numberOfIntervals))
      <a href="{{ route('intervals.edit',$firstInterval->id) }}" class="btn btn-primary btn-flat">Update Interval</a>
    @endif

<table class="table table-striped table-inverse">
  <thead>
    <tr>
      <th>#</th>
      <th>Interval in hour</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

    @foreach($intervals as $key => $interval)
    <tr>
      <th scope="row">{{ ++$key }}</th>
      <td>{{ $interval->interval }}</td>
      <td>
      	<div class='btn btn-group'>
            <form  method="post" action="{{ route('intervals.destroy',$interval->id) }}">
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
@endsection