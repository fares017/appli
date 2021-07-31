@extends('layouts.mainpanel')

@section('content')

  {{-- session messages --}}

  <div class="row">
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    @if (session()->has('danger'))
    <div class="alert alert-danger">
        {{ session()->get('danger') }}
    </div>
    @endif
</div>

{{-- // session messages --}}

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Tableau de bord</a>
        </li>
        <li class="breadcrumb-item active"></li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5">26 Notifications!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Voir détail</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              @if (Auth::user()->wishlist()->first())
              <div class="mr-5"> {{ Auth::user()->wishlist()->first()->products()->count()  }} Produits favoris!</div>
              @else
              <div class="mr-5"> aucun Produits favoris!</div>
              @endif
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Voir détail</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">{{ $orders_done->count() }} Ordres effectués</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#"></a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5">{{ $orders_undone->count() }} Ordres en attente!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#"></a>
          </div>
        </div>
      </div>
     
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> LISTE DES ORDRES RECEMMENT EFFECTUEE</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Date</th>
                  <th>Lieu</th>
                  <th>Propriétaire</th>
                  <th>Produits</th>
                  <th>Prix</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Date</th>
                  <th>Lieu</th>
                  <th>Propriétaire</th>
                  <th>Produits</th>
                  <th>Prix</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($orders as $order)
                <tr>
                  <td>{{ $order->id }}</td>
                  <td>{{ $order->created_at }}</td>
                  <td>{{ $order->address }}</td>
                  <td>{{ $order->nom }} {{ $order->prenom }}</td>
                  <td>
                    @foreach ($order->products as $product)
                    {{ $product->title }}/
                    @endforeach
                  </td>
                  <td>{{ Getprice($order->price) }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted"></div>
      </div>
    </div>
    @endsection