<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Order_detail;
class BillController extends Controller
{
    public function index(){

    	$bills = Order::paginate(5);
    	return view('backend.bill.bill')->with([
    		'bills' => $bills,
    	]);
    }
    public function billupdate($id){
        $bill = Order::where('id',$id)->update(['status' => 0 ]);
        return redirect()->route('backend.bill.index');
    }
    public function destroy($id){
        Order::destroy($id);
        return redirect()->route('backend.bill.index');
    }
}
