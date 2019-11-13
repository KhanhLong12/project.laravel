<?php

namespace App\Http\Controllers\Fontend;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index(){
    	$item = Cart::content();
    	// dd($item);
    	return view('fontend.product.cart')->with([
    		'item' => $item,

    	]);
    }
    public function add($id){
    	$product = Product::find($id);
    	Cart::add(['id' => $product->id ,'name' => $product->name , 'qty' => 1 , 'price' => $product->sale_price ,'weight' => 0 , 'options' => [ 'image' => $product->images[0]->path]]);
    	return redirect()->route('fontend.indexcart');
    }
}
