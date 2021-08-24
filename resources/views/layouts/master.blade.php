<!DOCTYPE html>
<html lang="en">
	<head>
		
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
		@yield('extra-meta')
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>StarKing-Technology: {{ __('titre') }}</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}" />

		<!-- Slick -->
		<link type="text/css" rel="stylesheet"   href="{{ url('css/slick.css') }}" />
		<link type="text/css" rel="stylesheet"  href="{{ url('css/slick-theme.css') }}" />

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet"  href="{{ url('css/nouislider.min.css') }}" />

		<!-- Font Awesome Icon -->
		<link rel="stylesheet"  href="{{ url('css/font-awesome.min.css') }}" >

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet"  href="{{ url('css/style.css') }}"  />

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i>023 71 38 85</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i>starkingtech@outlook.fr</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> Lot 177 Hai Mohamed Saidoun Ben Omar Kouba -Alger-</a></li>
					</ul>
					@include('sections.connexion')
					
				
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						@include('sections.search')
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="{{ route('wishlist.index', app()->getLocale()) }}">
										<i class="fa fa-heart-o"></i>
										{{-- <span>{{  __('master.wishlist') }}</span> --}}
										<span>Liste d'envies</span>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										{{-- <span>{{ __('cart') }}</span> --}}
										<span>Cart</span>
										<div class="qty">{{  Cart::count() }}</div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											
											@if (Cart::count())
												@foreach ( Cart::content() as $product )
													<div class="product-widget">
														<div class="product-img">
															<img src="{{ asset('storage/'.$product->model->image)  }}" alt="">
														</div>
														<div class="product-body">
															<h3 class="product-name"><a href="#">{{ $product->model->title }}</a></h3>
															<h4 class="product-price"><span class="qty">{{ $product->qty }}x</span>{{ $product->model->getprice() }}</h4>
														</div>
														<form action="{{ route('cart.destroy', ['rowid' => $product->rowId , 'language' => app()->getLocale()] ) }}" method="POST">
															@csrf
															@method('DELETE')
															<button type="submit" class="delete"><i class="fa fa-close"></i></button>
														</form>										
													</div>
												@endforeach			
											@else
											  <p>{{ _('master.empty_cart') }}</p>											
											@endif
										</div>
										<div class="cart-summary">
											<small><span>{{ Cart::count() }}</span> Produits sélectiooner</small>
											<h5>Soustotal: {{ Getprice(Cart::subtotal()) }} </h5>
										</div>
										<div class="cart-btns">
											<a href="{{ route('cart.index', app()->getLocale()) }}">Voir panier</a>
											@if (Cart::content()->isNotEmpty())
											<a href="{{ route('order.index', app()->getLocale()) }}">Commander  <i class="fa fa-arrow-circle-right"></i></a>
											@else
											<a href=" {{ route('acceuil', app()->getLocale() ) }}">Commander  <i class="fa fa-arrow-circle-right"></i></a> 
											
											@endif
											
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->


		<!-- menu -->
		<nav class="navbar navbar-default">
			<div class="container-fluid">
			  <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				  <span class="sr-only">Toggle navigation</span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Brand</a>
			  </div>
		  
			  <!-- Collect the nav links, forms, and other content for toggling -->
			  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
				  <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
				  <li><a href="#">Link</a></li>
				  <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
					<ul class="dropdown-menu">
					  <li><a href="#">Action</a></li>
					  <li><a href="#">Another action</a></li>
					  <li><a href="#">Something else here</a></li>
					  <li role="separator" class="divider"></li>
					  <li><a href="#">Separated link</a></li>
					  <li role="separator" class="divider"></li>
					  <li><a href="#">One more separated link</a></li>
					</ul>
				  </li>
				</ul>
				<form class="navbar-form navbar-left">
				  <div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				  </div>
				  <button type="submit" class="btn btn-default">Submit</button>
				</form>
				<ul class="nav navbar-nav navbar-right">
				  <li><a href="#">Link</a></li>
				  <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
					<ul class="dropdown-menu">
					  <li><a href="#">Action</a></li>
					  <li><a href="#">Another action</a></li>
					  <li><a href="#">Something else here</a></li>
					  <li role="separator" class="divider"></li>
					  <li><a href="#">Separated link</a></li>
					</ul>
				  </li>
				</ul>
			  </div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		  </nav>

   {{-- <!-- Fixed navbar -->
					<nav class="navbar navbar-default ">
						<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="#">Project name</a>
						</div>
						<div id="navbar" class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
							<li class="active"><a  href=" {{ route('acceuil' , app()->getLocale()) }}">Home</a></li>
							<li><a href="#">About</a></li>
							<li><a href="#">Contact</a></li>
							
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ _('language')  }}<span class="caret"></span></a>
									<ul class="dropdown-menu">
									<li><a href="{{ route(Route::currentRouteName(), array_merge(['fr'], array_slice(($rp = Route::current()->parameters()), 1, count($rp)))) }}">{{ _('Francais') }}</a></li>
									<li role="separator" class="divider"></li>
									<li><a  href="{{ route(Route::currentRouteName(), array_merge(['en'], array_slice(($rp = Route::current()->parameters()), 1, count($rp)))) }}">{{ _('anglais')  }}</a></li>  
									
									</ul>
								</li>
							</ul> 
						</div><!--/.nav-collapse -->
						</div>
					</nav> --}}

	   <!-- /menu -->

		

	
	  @yield('content')


		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Inscrivez-vous pour la <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Votre Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> S'ABONNER</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Sur-Nous</h3>
								<p>Starking-techonlogy: Imporatation,Montage et Vente de Micro-Ordinateur et Accesoirs||Cartes mères - Cartes graphiques, Boitires...</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>Lot 177 Hai Mohamed Saidoun Ben Omar Kouba -Alger-</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>023 71 38 85</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>starkingtech@outlook.fr</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="#">Hot deals</a></li>
									<li><a href="#">Laptops</a></li>
									<li><a href="#">Smartphones</a></li>
									<li><a href="#">Cameras</a></li>
									<li><a href="#">Accessories</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="#">Sur-Nous</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Confidentiality</a></li>
									<li><a href="#">Demande et retour</a></li>
									<li><a href="#">Terms & Conditions</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<ul class="footer-links">
									<li><a href="#">My Account</a></li>
									<li><a href=" ">Voir panier</a></li>
									<li><a href="#">Wishlist</a></li>
									<li><a href="#">Track My Order</a></li>
									<li><a href="#">Help</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							{{-- <ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul> --}}
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								{{-- Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> --}}
								Copyright © 2021 Starking-Technology
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/slick.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/nouislider.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/jquery.zoom.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
		

        @yield('extra-js')
	</body>
</html>
