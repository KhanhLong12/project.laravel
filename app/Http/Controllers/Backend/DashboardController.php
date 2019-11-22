<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\User;
use Illuminate\Support\Facades\Gate;
use Auth;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index(){
    	$user = Auth::user();
        $demproducts = Product::count('id');
        $orders = Order::Where('status',1)->get();
        $demorder = 0;
        foreach ($orders as $order) {
            $demorder += (int)str_replace(',', '',$order->total);
        }
        $Order = Order::count('id');
        // dd($Order);
        $demusers = User::Where('role' , '=' , 0)->count('id');
        $products = Product::OrderBy('created_at','DESC')->limit(5)->get();
    	// dd($user);
    	// if (Gate::allows('check-role', $user)) {
    		return view('backend.dashboard_full')->with([
                'demproducts'   => $demproducts,
                'demusers'      => $demusers,
                'Order' => $Order,
                'products'      => $products,
                'demorder'      => $demorder,
        ]);
    	// }else{
    	// 	dd('không phải admin');
    	// }
    	// return view('backend.dashboard_full');
    }
    public function error(){
        return view('backend.error.error');
    }
}
