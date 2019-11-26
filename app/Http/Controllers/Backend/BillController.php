<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Order_detail;
use App\Http\Requests\StoreEditBillRequest;
class BillController extends Controller
{
    public function index(){

    	$bills = Order::paginate(5);
    	return view('backend.bill.bill')->with([
    		'bills' => $bills,
    	]);
    }
    public function detailbill($id){
        $bill = Order::find($id);
        $bill_details =  $bill->Order_detail;
        return view('backend.bill.detail')->with([
            'bill' => $bill,
            'bill_details' => $bill_details,
        ]);
    }
    public function edit($id){
        $bill = Order::find($id);
        // dd($bill);
        return view('backend.bill.edit')->with([
            'bill' => $bill
        ]);
    }
    public function update(StoreEditBillRequest $request, $id){
        $order = Order::find($id);
        $name = $request->get('name');
        $phone = $request->get('phone');
        $address = $request->get('address');
        $email = $request->get('email');
        $order->customer_name = $name;
        $order->customer_mobile = $phone;
        $order->customer_address = $address;
        $order->customer_email = $email;
        $save = $order->save();
        if ($save) {
            $request->session()->flash('success1','Cập nhật đơn hàng thành công');
        }else{
            $request->session()->flash('error1','Cập nhật đơn hàng không thành công');
        }
        return redirect()->route('backend.bill.index');
    }
    public function billupdate(Request $request, $id){
        $bill = Order::where('id',$id)->update(['status' => 0 ]);
        if ($bill == 1) {
            $request->session()->flash('success','Xác nhận giao hàng thành công');
        }
        return redirect()->route('backend.bill.index');
    }
    public function destroy(Request $request, $id){
        Order::destroy($id);
        if (Order::destroy($id) == 0) {
                $request->session()->flash('success2','Xóa đơn hàng thành công');
            }
        return redirect()->route('backend.bill.index');
    }
}
