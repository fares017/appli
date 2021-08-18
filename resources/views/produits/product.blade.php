@extends('layouts.master')

@section('content')

	<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li><a href="#">All Categories</a></li>
							<li><a href="#">Accessories</a></li>
							<li><a href="#">Headphones</a></li>
							<li class="active">{{ $product->title }}</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="{{ asset('storage/'.$product->image )  }}"  alt="">
							</div>
						    @foreach (json_decode($product->images, true) as $image)
							<div class="product-preview">
								<img src="{{ asset('storage/'.$image )  }}"  alt="">
							</div>
							@endforeach
							
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							
						@foreach (json_decode($product->images, true) as $image)
						<div class="product-preview">
							<img src="{{ asset('storage/'.$image)  }}"  alt="">
						</div>
						@endforeach
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">{{  $product->title }}</h2>
							
							<div>
								<h3 class="product-price">{{  $product->getprice() }} <del class="product-old-price">{{  $product->getprice() }} </del></h3>
						        	@if ($product->stock == 0)
									<span class="product-available">Rupture de stock</span>
									@else	
									<span class="product-available">Disponible</span>
									@endif
							</div>
							<p>{!! $product->description !!} </p>

							
						@if ($product->stock != 0)
							<div class="add-to-cart d-flex justify-content-center">
								<div class="qty-label">
									Qty
									<div class="input-number">
										<input type="number">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
								</div>
									
									<span class="cart-form">
										<form action="{{ route('cart.store', app()->getLocale()) }}" method="POST" >
											@csrf
											<input type="hidden" name="product_id" value="{{ $product->id }}">
											<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Ajouter au panier</button>
										</form>
									</span>
							</div>
						@else
						<div id="non-disponible" class="add-to-cart d-flex justify-content-center" >
							<div class="qty-label disabled">
								Qty
								<div class="input-number">
									<input type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>	
								<span class="cart-form">		
								 <button class="add-to-cart-btn disabled"><i class="fa fa-shopping-cart" disabled></i>Ajouter au panier</button>
						        </span>
						</div>
										
						@endif
							   
							

							<ul class="product-btns">
								<li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
							</ul>

							<ul class="product-links">
								<li>Category:</li>
								<li><a href="#">Headphones</a></li>
								<li><a href="#">Accessories</a></li>
							</ul>

							<ul class="product-links">
								<li>Share:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
								<li><a data-toggle="tab" href="#tab2">Details</a></li>
								
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p>{!! $product->description !!} </p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-12">
											<p>{!! $product->description !!} </p>
										</div>
									</div>
								</div>
								<!-- /tab2  -->

							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->


@endsection