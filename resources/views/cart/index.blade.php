@extends('layouts.master')

@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
      
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

        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">All Categories</a></li>
                    <li><a href="#">Accessories</a></li>
                    <li><a href="#">Headphones</a></li>
                    <li class="active">page</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                       <thead>
                        <tr>
                            <th  scope="col"> image </th>
                            <th scope="col">Product</th>
                            <th scope="col">Available</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th  scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Cart::content() as $product)
                        <tr>
                            <td >
                               <div class="product-widget">
                                    <div class="product-img">
                                         <img id="image-table" src="{{ asset('storage/'.$product->model->image) }}" alt=""> 
                                   </div>      
                               </div>
                            </td>
                           
                            <td style="">{{ $product->model->title }}</td>
                            <td>In stock</td>
                            <td>
                                <select name="qty" id="qty" class="custom-select" data-id="{{ $product->rowId }}"
                                         data-stock="{{ $product->model->stock }}" >
                                    @for($i = 1; $i <= $product->model->stock; $i++)
                                    <option {{ $product->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            <td class="text-right">{{ $product->model->getprice() }}</td>
                            <td class="text-right">
                                <form action="{{ route('cart.destroy', $product->rowId) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i> </button>     
                                </form>
                            </td>
                        </tr>
                        @endforeach
                       
                   
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sous-Total</td>
                            <td class="text-right">{{ Getprice(Cart::subtotal()) }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Livraison</td>
                            <td class="text-right">Gratuite</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>{{  Getprice(Cart::subtotal()) }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <button class="btn btn-lg  btn-block btn-light" ><a href="{{ route('acceuil') }}">Continuer vos achats</a></button>
                </div>
                @if (Cart::content()->isNotEmpty())
                <div class="col-sm-12 col-md-6 text-right">
                    <a href="{{ route("order.index") }}"><button class="btn btn-lg btn-block btn-danger text-uppercase">Passer à la caisse</button></a>                  
                </div>
                @else
                <div class="col-sm-12 col-md-6 text-right">
                    <a href="{{ route("acceuil") }}"><button class="btn btn-lg btn-block btn-danger text-uppercase">Passer à la caisse</button></a>
                </div> 
                @endif
                
            </div>
        </div>
    </div>

</div>
@endsection
@section('extra-js')
<script>
    var qty  = document.querySelectorAll('#qty');
    Array.from(qty).forEach((element) => {
        element.addEventListener('change', function () {
            const rowid = element.getAttribute('data-id');
            var stock = element.getAttribute('data-stock');
            axios.patch(`/panier/${rowid}`, {
                qty: this.value,
                stock: stock
                })
                .then(function (response) {
                    window.location.href = '{{ route('cart.index') }}'
                })
                .catch(function (error) {
                    console.log(error.response.data);
                });
        });
    });
   


 

</script>
 
@endsection