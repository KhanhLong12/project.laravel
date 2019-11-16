<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order_detail;
use App\Models\Product;
class Order extends Model
{
    protected $table = 'orders';
    protected $filable = ['customer_name', 'customer_email','customer_address','customer_cityaddress','customer_districtaddress','customer_mobile','total','status'];
    protected function Order_detail(){
    	return $this->hasMany(Order_detail::class);
    }
    protected function products(){
    	return $this->hasMany(Product::class);
    }
}
