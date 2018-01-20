@foreach($catss as $cat)
  <li style="color:white">
    {{ $cat->name }}
        @if(count($cat->children) > 0)
           
          @include('partials/manageChildren',['childs' => $cat->children])
          <!-- {{ dd($cat->children) }} -->
        @endif
 </li>
@endforeach  




<!-- <ul class="treeview-menu"> -->
  @foreach($childs as $key => $child)	
		
	  <li style="color:white">	
	  	{{ $child->name }}

	  	@if( count($child->children) > 0 )
			<!-- {{ dd($child->children->count()) }} -->
			@include('partials/manageChildren',$child)
  		@endif
  		</li>

  @endforeach
<!-- </ul> -->

          
