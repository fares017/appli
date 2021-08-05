@extends('layouts.mainpanel')

@section('content')

{{-- session messages --}}

	@if (session()->has('success'))
	<div class="alert alert-success">
		{{ session()->get('success') }}
	</div>
	@endif
	@if (session()->has('danger'))
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<strong>{{ session()->get('danger') }}</strong> 
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>
	@endif


{{-- // session messages --}}

<div class="card ">
    <div class="card-header">
      Voici la liste des produits que vous avez favoris!
    </div>
    <div class="card-body">

        	<!-- store products -->
			<div class="row">
				@php
				$counter = 1;
				$counter2 = 1;
			    @endphp
				@if (!is_null($wishlist))
				@foreach ($wishlist->products as $product)
						
				<!-- product -->
				<div class="col-md-3 col-xs-6">
					<div class="card" >
						<img class="card-img-top img-thumbnail" src="{{ asset('storage/'.$product->image)  }}" alt="Card image cap" height="50%" width="50%">
						<div class="card-body">
						  <h5 class="card-title">{{ $product->title }}</h5>
						  <a href="{{  route('product.show', ["slug" => $product->slug, "language" => app()->getLocale() ])}}" class="btn btn-success">J'achete</a>
						  <button onclick="document.getElementById('wishlist_form').submit();" class="btn btn-danger pull-right"><i class="fa fa-window-close" aria-hidden="true"></i></button>
						  <form id="wishlist_form" action="{{ route('wishlist.destroy', ['rowid' => $product->id, "language" => app()->getLocale()] ) }}" method="POST">
							<input type="hidden" name="wishlist_id" value="{{ $wishlist->id }}">
							@csrf
							@method('DELETE')

						 </form>
						</div>
					  </div>
				</div>
				<!-- /product -->

				@if ($counter == 4)
				<div class="clearfix visible-lg visible-md"></div>
							@php
							$counter = 0;
						   @endphp
				@endif
				@if ($counter2 == 2)
				<div class="clearfix visible-sm visible-xs"></div>
							@php
							$counter2 = 0;
							@endphp
				@endif
				@php
				$counter++;
				$counter2++;
			   @endphp
@endforeach
					
				@endif
				
		</div>
    </div>
  </div>

@endsection
