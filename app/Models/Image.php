<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Image extends Model
{
    protected $table = 'images';
    protected function product(){
    	return $this->belongsTo(Product::class);
    } 
}
