<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
class Order_detail extends Model
{
    protected $table = 'order_detail';
    protected $fillable = ['order_id', 'product_id','quantity','subtotal'];
    protected function Order(){
    	return $this->belongsTo(Order::class);
    }
    protected function product(){
    	return $this->belongsTo(Product::class);
    }
}
