<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductController extends Controller
{

    //Fonction pour afficher les produits dans la page d'accueille
    public function index(){
        
        if (request()->categorie) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->categorie);
            })->get();
        } else {
            $products = Product::with('categories')->paginate(6);
        }

        return view('produits.index')->with('products', $products);
      }


      //Fonction pour afficher un produit selectionné
      public function show($slug){
          $product = Product::where('slug', $slug)->firstOrfail();

         return view('produits.product')->with('product', $product);
      }

      //Fonction de la barre de recheche

      public function search(){

        request()->validate([
            'search_input' => 'required|min:1'
        ]);

          $name = request()->input('search_input');
          $products  = Product::where('title','like', "%$name%")->paginate(6);
          //dd($products);
          return view('produits.search')->with('products',$products );
      }


}
