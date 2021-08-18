@extends('layouts.master')

@section('content')
 <div class="container">
     <div class="row">
		<div class="col-md-3">
			<div class="list-group category_panel">
				<a href="#" class="list-group-item active " id="panel_tabel">
				  NOS PRODUITS
				</a>
				@foreach ($categories as $category)
					<a href="#" class="list-group-item">{{ $category->getTranslatedAttribute('name', app()->getLocale(), 'en')  }}</a>
				@endforeach
			  </div>
		</div>
		 <div class="col-md-9">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
				  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				  <li data-target="#myCarousel" data-slide-to="1"></li>
				</ol>
			  
				<!-- Wrapper for slides -->
				<div class="carousel-inner">
				  <div class="item active">
					<img src="./img/img01.jpg" alt="Los Angeles">
				  </div>
			  
				  <div class="item">
					<img src="./img/img02.jpg" alt="Chicago">
				  </div>
			  
				</div>
			  
				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				  <span class="glyphicon glyphicon-chevron-left"></span>
				  <span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control " href="#myCarousel" data-slide="next">
				  <span class="glyphicon glyphicon-chevron-right"></span>
				  <span class="sr-only">Next</span>
				</a>
			</div>
			   <div class="row top-buffer">
				   @for ($i = 2; $i < 16; $i++)
					<div class="col-xs-6 col-md-3">
						<a href="#" class="thumbnail">
						<img src="../img/logo{{ $i }}.jpg" alt="...">
						</a>
					</div>
				   @endfor
			  </div>
			  <div class="row">
				<H5 class="text-center"> <a href=""><div class="btn-group" role="group" aria-label="...">
					<button type="button" class="btn btn-default btn-danger">VOIR TOUS NOS MARQUES DISPONIBLE</button>
				  </div></a> </H5>
			  </div>
			
		 </div>
	 </div>
 </div>



<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">Nos Produits</h3>
					<div class="section-nav">
						<ul class="section-tab-nav tab-nav">
							{{-- <li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li> --}}
							@foreach ( App\Category::with('translations')->get() as $category)
							<li class="{{ $category->slug == request()->categorie ?"active":"" }}"><a href="{{ route('acceuil', ['categorie' => $category->slug, 'language' => app()->getLocale()]) }}"  >{{  $category->getTranslatedAttribute('name', app()->getLocale(), 'en')  }}</a></li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			<!-- /section title -->

			<!-- Products tab & slick -->
			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab1" class="tab-pane active">
							<div class="products-slick" data-nav="#slick-nav-1">
								<!-- product -->
								@foreach ($products as $product)
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
												{{ $category->getTranslatedAttribute('name', app()->getLocale(), 'en') }}/
											@endforeach
										</p>
									    <h3 class="product-name"><a href="{{  route('product.show', ['slug' => $product->slug, 'language' => app()->getLocale() ]) }}">{{ $product->getTranslatedAttribute('title', app()->getLocale(), 'en') }}</a></h3>
										<h4 class="product-price">{{ $product->getprice() }} <del class="product-old-price">{{ $product->getprice() }}</del></h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="product-btns">
											<form id="wishlist_form{{ $loop->index+1 }}" action="{{ route('wishlist.store',  app()->getLocale() ) }}" method="POST">
												@csrf
												<input type="hidden" name="product_id" value="{{ $product->id }}">
											</form>
											<button onclick="document.getElementById('wishlist_form{{ $loop->index+1 }}').submit();" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Ajouter à la liste d'envie</span></button>
											<button class="quick-view" onclick="window.location.href='{{ route('product.show', ['slug' => $product->slug, 'language' => app()->getLocale()]) }}'"><i class="fa fa-eye"></i><span class="tooltipp">Voir le produit</span></button>
											

										</div>
									</div>
									@if ($product->stock != 0)
										<div class="add-to-cart">
											<form action="{{ route('cart.store', app()->getLocale()) }}" method="POST" >
												@csrf
												<input type="hidden" name="product_id" value="{{ $product->id }}">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Ajouter au panier</button>
											</form>
											
										</div>
									@endif
								</div>
									
								@endforeach
								
								<!-- /product -->										
								<!-- /product -->
							</div>
							<div id="slick-nav-1" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
			<!-- Products tab & slick -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->


<!-- SECTION 2-->
<div class="section">
	
	<!-- container -->
	<div class="container">
			<!-- store products -->
			<h5 class="text-center">Bienvenue chez Starking-Technology</h5>
			<h1 class="text-center">Produit de la semaine</h1>
			<h4 class="text-center">Nous vous recommandons de considérer ces produits lors de votre prochaine achat</h4>
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
												<h3 class="product-name"><a href="{{  route('product.show', [ 'language' => app()->getLocale() ,'slug' => $product->slug] ) }}">{{ $product->title }}</a></h3>
												<h4 class="product-price">{{ $product->price }}</h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<form id="wishlist_form{{ $loop->index+1 }}" action="{{ route('wishlist.store', app()->getLocale()) }}" method="POST">
														@csrf
														<input type="hidden" name="product_id" value="{{ $product->id }}">
													</form>
													<button onclick="document.getElementById('wishlist_form{{ $loop->index+1 }}').submit();" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Ajouter à la liste d'envie</span></button>
													<button class="quick-view" onclick="window.location.href='{{ route('product.show', [ 'language' => app()->getLocale() ,'slug' => $product->slug]) }}'"><i class="fa fa-eye"></i><span class="tooltipp">Voir le produit</span></button>
													
		
												</div>
											</div>
											@if ($product->stock != 0)
												<div class="add-to-cart">
													<form action="{{ route('cart.store', app()->getLocale()) }}" method="POST" >
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
		<!-- /STORE -->				
	</div>
	<!-- /container -->
</div>
<!-- /SECTION 2 -->


@endsection