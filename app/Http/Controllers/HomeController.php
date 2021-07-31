<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;
        $orders = Order::where('user_id',$id)->get();
        $orders_done = Order::where('user_id',$id)->where('etat', 'Termine')->get();
        $orders_undone = Order::where('user_id',$id)->where('etat','en attente')->get();

        return view('adminpanel.index', ['orders_done' => $orders_done, 'orders_undone' => $orders_undone, 'orders' => $orders ]);
    }
}
