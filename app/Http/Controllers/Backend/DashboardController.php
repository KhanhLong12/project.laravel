<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\User;
use Illuminate\Support\Facades\Gate;
use Auth;

class DashboardController extends Controller
{
    public function index(){
    	$user = Auth::user();
        $demproducts = Product::count('id');
        $demcategories = Category::count('id');
        $demusers = User::Where('role' , '=' , 0)->count('id');
        $products = Product::OrderBy('created_at','DESC')->limit(5)->get();
    	// dd($user);
    	// if (Gate::allows('check-role', $user)) {
    		return view('backend.dashboard_full')->with([
                'demproducts'   => $demproducts,
                'demusers'      => $demusers,
                'demcategories' => $demcategories,
                'products'      => $products
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
