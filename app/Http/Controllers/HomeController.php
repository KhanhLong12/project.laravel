<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Product;
use App\Models\Category;
use App\User;
use Illuminate\Support\Facades\Gate;
use App\Models\Order;
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
        $user = Auth::user();
        $demproducts = Product::count('id');
        $orders = Order::Where('status',1)->get();
        $demorder = 0;
        foreach ($orders as $order) {
            $demorder += (int)str_replace(',', '',$order->total);
        }
        $Order = Order::count('id');
        $demusers = User::Where('role' , '=' , 0)->count('id');
        $products = Product::OrderBy('created_at','DESC')->limit(5)->get();
        // if (Gate::allows('check-role', $user)) {
            return view('backend.dashboard_full')->with([
                'demproducts'   => $demproducts,
                'demusers'      => $demusers,
                'Order' => $Order,
                'demorder'      => $demorder,
                'products'      => $products
        ]);
        // }else{
        //     return view('fontend.index');
        // }
    }
}
