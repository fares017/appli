@extends('layouts.master')

@section('content')
<!-- SECTION -->
<div class="section">
	
	<!-- container -->
	<div class="container">
		

			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					@if (request()->input('search_input'))
					<h3 class="title">"{{ $products->total() }}" Résultat pour "{{ request()->input('search_input') }}":</h3>
					@endif		
				</div>
			</div>
			<!-- /section title -->
			<!-- store products -->
			<div class="row">
				@php
				$counter = 1;
				$counter2 = 1;
			    @endphp
				@foreach ($products as $product)
						
									<!-- product -->
									<div class="col-md-3 col-xs-6">
										<div class="product">
											<div class="product-img">
												<img src="{{ asset('storage/'.$product->image) }}" alt="">
												<div class="product-label">
													@if ($product->stock == 0)
													  <span class="sale">Pas disponible</span>
													@else	
													 <span class="new">Disponible</span>
													@endif
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">
													@foreach ($product->categories as $category)
															{{ $category->name }}/
													@endforeach
												</p>
												<h3 class="product-name"><a href="{{  route('product.show', $product->slug ) }}">{{ $product->title }}</a></h3>
												<h4 class="product-price">{{ $product->price }}</h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<form id="wishlist_form{{ $loop->index+1 }}" action="{{ route('wishlist.store') }}" method="POST">
														@csrf
														<input type="hidden" name="product_id" value="{{ $product->id }}">
													</form>
													<button onclick="document.getElementById('wishlist_form{{ $loop->index+1 }}').submit();" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Ajouter à la liste d'envie</span></button>
													<button class="quick-view" onclick="window.location.href='{{ route('product.show', $product->slug ) }}'"><i class="fa fa-eye"></i><span class="tooltipp">Voir le produit</span></button>
													
		
												</div>
											</div>
											@if ($product->stock != 0)
												<div class="add-to-cart">
													<form action="{{ route('cart.store') }}" method="POST" >
														@csrf
														<input type="hidden" name="product_id" value="{{ $product->id }}">
														<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Ajouter au panier</button>
													</form>
												</div>
											@endif
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
		</div>
		<!-- /store products -->
			<!-- store bottom filter -->

			<div>{{ $products->links('pagination::bootstrap-4') }}</div>
	
			{{-- <div class="store-filter clearfix">
				<div class="store-filter clearfix">
					<span class="store-qty">Affichage de 4-{{ $products->total() }} produits</span>
					<ul class="store-pagination">
						<li class="active">1</li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
					</ul>
				</div>
			<!-- /store bottom filter -->
			</div> --}}

          

		<!-- /STORE -->
	</div>
	<!-- /row -->

			
				
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->


@endsection