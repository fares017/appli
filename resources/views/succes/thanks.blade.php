@extends('layouts.master')

@section('content')

<div class="container">
      <div class="jumbotron text-xs-center">
      <h1 class="display-3">Commande faite avec succés</h1>
      <p class="lead"><strong>Veuillez vérifier votre E-mail </strong> Pour tous les détails de cette commande.</p>
      <hr>
      <p>
        Vous avez un problème? <a href="">Contactez-Nous</a>
      </p>
      <p class="lead">
        <a class="btn btn-primary btn-sm" href="{{ route("acceuil", app()->getLocale()) }}" role="button">Revenir à la boutique </a>
      </p>
    </div>
  
</div>
@endsection


