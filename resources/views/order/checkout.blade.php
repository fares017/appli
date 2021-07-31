@extends('layouts.master')

@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">Checkout</h3>
				<ul class="breadcrumb-tree">
					<li><a href="#">Home</a></li>
					<li class="active">Checkout</li>
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

			<div class="col-md-7">
				<!-- Billing Details -->
				<div class="billing-details">
					<div class="section-title">
						<h3 class="title">Adresse de livraison</h3>
					</div>

					<form id="myform" action="{{ route('order.store') }}" method="post">
						@csrf
						<div class="form-group">
							<input class="input" type="text" name="name" placeholder="Nom">
							@error('name')<small id="passwordHelp" class="text-danger" >{{ $errors->first('name') }}</small> @enderror
						</div>
						<div class="form-group">
							<input class="input" type="text" name="lname" placeholder="Prénom">
							@error('lname')<small id="passwordHelp" class="text-danger" >{{ $errors->first('lname') }}</small> @enderror
						</div>
						<div class="form-group">
							<input class="input" type="email" name="email" placeholder="Email">
							@error('email')<small id="passwordHelp" class="text-danger" >{{ $errors->first('email') }}</small> @enderror
						</div>
						<div class="form-group">
							<input class="input" type="text" name="wilaya" placeholder="Wilaya">
							@error('wilaya')<small id="passwordHelp" class="text-danger" >{{ $errors->first('wilaya') }}</small> @enderror
						</div>
						<div class="form-group">
							<input class="input" type="text" name="address" placeholder="Address">
							@error('address')<small id="passwordHelp" class="text-danger" >{{ $errors->first('address') }}</small> @enderror
						</div>
						<div class="form-group">
							<input class="input" type="text" name="codep" placeholder="Code postal">
							@error('codep')<small id="passwordHelp" class="text-danger" >{{ $errors->first('codep') }}</small> @enderror
						</div>
						<div class="form-group">
							<input class="input" type="tel" name="tel" placeholder="Téléphone">
							@error('tel')<small id="passwordHelp" class="text-danger" >{{ $errors->first('tel') }}</small> @enderror
						</div>
					</form>
				</div>
			</div>

			<!-- Order Details -->
			<div class="col-md-5 order-details">
				<div class="section-title text-center">
					<h3 class="title">Votre commande</h3>
				</div>
				<div class="order-summary">
					<div class="order-col">
						<div><strong>Produit</strong></div>
						<div><strong>TOTAL</strong></div>
					</div>
					<div class="order-products">
						@foreach (Cart::content() as $product)
						<div class="order-col">
							<div>{{ $product->qty }}x {{ $product->model->title }}</div>
							{{-- <div>{{ $product->model->getprice() }}</div> --}}
							<div>{{ getprice($product->subtotal()) }}</div>
						</div>
						@endforeach

					</div>
					<div class="order-col">
						<div>Livraison</div>
						<div><strong>Gratuite</strong></div>
					</div>
					<div class="order-col">
						<div><strong>TOTAL</strong></div>
						<div><strong class="order-total">{{ Getprice(Cart::subtotal()) }}</strong></div>
					</div>
				</div>
				<div class="payment-method">
					<div class="input-radio">
						<input type="radio" name="payment" id="payment-1">
						<label for="payment-1">
							<span></span>
							Paimment à la livraison
						</label>
						<div class="caption">
							<p>Pour des raisons de fiabilité et de crédilité nous avons opté pour le paimment à la livraison.</p>
						</div>
					</div>					
				</div>
				<div class="input-checkbox">
					<input type="checkbox" id="terms">
					<label for="terms">
						<span></span>
						J'ai lu et j'accepte les <a href="#">terms & conditions</a>
					</label>
				</div>
				{{-- <a  class="primary-btn order-submit"> <button type="submit" form="myform">Valider la commande</button></a> --}}
				<button class="primary-btn order-submit" type="submit" form="myform" ><a class="checkout_btn"> Valider la commande</a></button>
				
			</div>
			<!-- /Order Details -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

@endsection