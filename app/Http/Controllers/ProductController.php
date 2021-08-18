<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
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
            // $products = Product::with('categories')->paginate(8);
            $products = Product::paginate(8);
            $products->load('translations');
            $categories = Category::all();
            $categories->load('translations');
          //  dd($categories);

        }
          
        // return view('produits.index')->with('products', $products);
           return view('produits.index')->with(['products' => $products, 'categories' => $categories]);

           
      }


      //Fonction pour afficher un produit selectionné
      public function show($language , $slug){
          
        //dd(Route::currentRouteName(), Route::current()->parameters() );
          $product = Product::where('slug', $slug)->firstOrfail();
         return view('produits.product', ['product' => $product])->with('language', $language);
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
