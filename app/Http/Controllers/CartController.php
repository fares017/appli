<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\Environment\Console;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('cart.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {

       
        $duplicata = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id == $request->product_id;
        });
   
        if ($duplicata->isNotEmpty()) {

            return redirect()->route('acceuil', app()->getLocale());
        }
  
        $product = Product::find($request->product_id);
     

        Cart::add($product->id, $product->title, 1, $product->price)
        ->associate('App\Product');

        return redirect()->route('acceuil',  app()->getLocale());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowid)
    {

          
        $data = request()->json()->all();

        $validates = Validator::make($request->all(), [
            'qty' => 'numeric|required|between:1,30'
        ]);

        if ($validates->fails()){
            session()->flash('danger', 'La quantité doit est comprise entre 1 et 30');
            return response()->json(['error' => 'Cart Quantity has not been updated']);
        }

        if($data['stock'] < $data['qty']){
             
            session()->flash('danger', "La quantité de ce produit n'est pas disponible");
            return response()->json(['error' => 'Cart Quantity has not been updated']);
        }


         Cart::update($rowid, $request->qty);  
         session()->flash('success', 'la quantité a bien été a jour');
         return response()->json(['success' => 'Cart Quantity Has Been Updated']);      
         
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($language, $rowId)
    {
        Cart::remove($rowId);
        return back();
    }
}
