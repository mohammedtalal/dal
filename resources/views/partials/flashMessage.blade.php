
@if ($message = Session::get('success'))
<br>
<div class="alert alert-success alert-block" id="alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<br>
<div class="alert alert-danger alert-block" id="alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('warning'))
<br>
<div class="alert alert-warning alert-block" id="alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button> 
  <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('info'))
<br>
<div class="alert alert-info alert-block" id="alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button> 
  <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('danger'))
<div class="alert alert-danger" >
  <button type="button" class="close" data-dismiss="alert">×</button> 
  <strong>{{ $message }}</strong>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger" >
  <button type="button" class="close" data-dismiss="alert">×</button> 
  Please check the form below for errors
</div>
@endif