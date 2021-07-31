<!DOCTYPE html>
<html lang="en">
	<head>
		
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
		@yield('extra-meta')
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>StarKing-Technology:Montage et Vente de Micro-Ordinateur</title>

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
									<a href="{{ route('wishlist.index') }}">
										<i class="fa fa-heart-o"></i>
										<span>Listes d'envies</span>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Panier</span>
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
														<form action="{{ route('cart.destroy', $product->rowId) }}" method="POST">
															@csrf
															@method('DELETE')
															<button type="submit" class="delete"><i class="fa fa-close"></i></button>
														</form>										
													</div>
												@endforeach			
											@else
											  <p>Votre panier est vide !</p>											
											@endif
										</div>
										<div class="cart-summary">
											<small><span>{{ Cart::count() }}</span> Produits sélectiooner</small>
											<h5>Soustotal: {{ Getprice(Cart::subtotal()) }} </h5>
										</div>
										<div class="cart-btns">
											<a href="{{ route('cart.index') }}">Voir panier</a>
											@if (Cart::content()->isNotEmpty())
											<a href="{{ route('order.index') }}">Commander  <i class="fa fa-arrow-circle-right"></i></a>
											@else
											<a href=" {{ route('acceuil') }}">Commander  <i class="fa fa-arrow-circle-right"></i></a>
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

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href=" {{ route('acceuil') }}">Home</a></li>
						<li><a href="#">Hot Deals</a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Laptops</a></li>
						<li><a href="#">Smartphones</a></li>
						<li><a href="#">Cameras</a></li>
						<li><a href="#">Accessories</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

	
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
									<li><a href="{{ route('cart.index')}}">Voir panier</a></li>
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
