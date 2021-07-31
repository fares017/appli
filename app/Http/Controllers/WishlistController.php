<?php

namespace App\Http\Controllers;

use App\Wishlist;
use App\WishlistProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $wishlist = Wishlist::where('user_id', $user_id)->first();
       
        return view('adminpanel.wishlist')->with('wishlist',$wishlist);
        
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
 
       $user_id = Auth::user()->id;
       $wishlist = Wishlist::where('user_id', $user_id)->first();

        if(is_null($wishlist)){
            $wishlist = new Wishlist();
            $wishlist->user_id = $user_id;
            $wishlist->save();
        }
         
        $duplicata = WishlistProduct::where('wishlist_id',$wishlist->id)->where('product_id',request()->input('product_id'))->first();

            if(!is_null($duplicata)){
                return redirect()->back()->with('danger', 'le produits exist déja dans la liste');
            }
 
            $wishlistproduct = new WishlistProduct();
            $wishlistproduct->product_id = request()->input('product_id');            
            $wishlistproduct->wishlist_id = $wishlist->id;
            $wishlistproduct->save();
        
       return redirect()->back()->with('success','le produit a été ajouter avec success');
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
    public function destroy($rowId)
    {
        $wishlist = request()->input('wishlist_id');
        $wishlistproduct = wishlistproduct::where('product_id',$rowId)->where('wishlist_id', $wishlist )->delete();

        return redirect()->route('wishlist.index')->with('danger', 'le produit a été supprimer de la liste');
    }
}
