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
    	Cart::add(['id' => $product->id ,'name' => $product->name , 'qty' => 1 , 'price' => $product->origin_price ,'weight' => 0 , 'options' => [ 'image' => $product->images[0]->path]]);
    	return redirect()->route('fontend.indexcart');
    }
    public function update($id){
        $product = Product::find($id);
        $rowID = $product->id;
        // dd($rowID);
        Cart::update($rowID,2);
    }
    public function delete(Request $request){
        Cart::destroy();
        if (Cart::destroy() == 0) {
            $request->session()->flash('success','Xóa giỏ hàng thành công');
        }else{
            $request->session()->flash('error','Xóa giỏ hàng không thành công');
        }
        return redirect()->route('fontend.indexcart');
    }
}
