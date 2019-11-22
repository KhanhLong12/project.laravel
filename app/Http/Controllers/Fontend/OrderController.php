<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Order_detail;
use App\Http\Requests\StoreOrderRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Mail;

class OrderController extends Controller
{
    public function index(){
    	return view('fontend.product.order');
    }
    public function orderstore(StoreOrderRequest $request){
    	// dd(Cart::total());
    	$bill = new Order();
    	$bill->code = rand(0,10000);
    	$bill->customer_name = $request->get('name');
    	$bill->customer_email = $request->get('email');
        $bill->customer_address = $request->get('address');
        $bill->customer_cityaddress = $request->get('city');
    	$bill->customer_districtaddress = $request->get('district');
    	$bill->customer_mobile = $request->get('phone');
    	$bill->total = Cart::total();
    	$bill->status = 1;
    	$bill->created_at = date("Y-m-d H:i:s");
    	$bill->updated_at = date("Y-m-d H:i:s");
    	$save = $bill->save();

        $carts = Cart::content();
    	foreach ($carts as $cart) {
            $bill_detail = new Order_detail();
    		$bill_detail->order_id = $bill->id;
    		$bill_detail->product_id = $cart->id;
    		$bill_detail->quantity = $cart->qty;
    		$bill_detail->subtotal = $cart->subtotal;
    		$bill_detail->created_at = $bill->created_at;
    		$bill_detail->updated_at = $bill->updated_at;
            $bill_detail->save();
    	}
    	
    	Cart::destroy();
        $total = $bill->total;
        $name = $bill->customer_name;
        $email = $bill->customer_email;

        Mail::send('fontend.emails.add2cart', ['email' => $email,'name' => $name,'total' => $total, 'bill' => $bill,'carts' => $carts], function($mail) use ($email) {
            $mail->to($email)->subject('Thông báo từ Mystock!');
        });
    	if ($save) {
            $request->session()->flash('success','Đặt hàng thành công');
        }else{
            $request->session()->flash('error','Đặt hàng không thành công');
        }
    	return redirect()->route('fontend.indexcart');
    }
}
