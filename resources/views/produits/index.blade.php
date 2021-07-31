@extends('layouts.master')

@section('content')

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
							@foreach (App\Category::all() as $category)
							<li class="{{ $category->slug == request()->categorie ?"active":"" }}"><a href="{{ route('acceuil', ['categorie' => $category->slug]) }}"  >{{ $category->name }}</a></li>
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
												{{ $category->name }}/
											@endforeach
										</p>
										<h3 class="product-name"><a href="{{  route('product.show', $product->slug ) }}">{{ $product->title }}</a></h3>
										<h4 class="product-price">{{ $product->getprice() }} <del class="product-old-price">{{ $product->getprice() }}</del></h4>
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

<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="hot-deal">
					<ul class="hot-deal-countdown">
						<li>
							<div>
								<h3>02</h3>
								<span>Days</span>
							</div>
						</li>
						<li>
							<div>
								<h3>10</h3>
								<span>Hours</span>
							</div>
						</li>
						<li>
							<div>
								<h3>34</h3>
								<span>Mins</span>
							</div>
						</li>
						<li>
							<div>
								<h3>60</h3>
								<span>Secs</span>
							</div>
						</li>
					</ul>
					<h2 class="text-uppercase">hot deal this week</h2>
					<p>New Collection Up to 50% OFF</p>
					<a class="primary-btn cta-btn" href="#">Shop now</a>
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /HOT DEAL SECTION -->

@endsection