<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Cart::content()->isNotEmpty()){
            return view('order.checkout');
        }else{
            return redirect()->route('acceuil', app()->getLocale());
        }
        
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

        $validated = $request->validate([
            'name' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'wilaya' => 'required',
            'address' => 'required',
            'codep' => 'required|Numeric',
            'tel' => 'required|Numeric|min:11',
        ]);

         // Verifier si la quantité chercher par le client existe
         if ($this->findustock()) {
            return redirect()->route('cart.index', app()->getLocale())->with('danger', "Un des produits que vous avez selectionner n'est pas disponible");
        }


        $order = new Order();
        $order->nom = $request->name;
        $order->prenom = $request->lname;
        $order->email = $request->email;
        $order->wilaya = $request->wilaya;
        $order->address = $request->address;
        $order->code = $request->codep;
        $order->tel = $request->tel;
        $order->price = floatval(Cart::subtotal());
        $order->user_id = Auth::user()->id;
        $order->etat = 'en attente';

        $order->save();
        
        $orderproduct = new OrderProduct();
        foreach(Cart::content() as $item ){
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
            ]);
        }
        
        $this->updatestock();
        Cart::destroy();

        return redirect()->route('success', app()->getLocale())->with("message", "Commande réussi");

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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    private function updatestock(){

        foreach(Cart::content() as $item){
            $product = Product::find($item->model->id);
            $product->update(['stock' => $product->stock - $item->qty]);
        }

    } 

    private function findustock(){
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            if ($product->stock < $item->qty) {
                return true;
            }
        }

        return false;
    }

}
