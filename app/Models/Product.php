<?php

namespace App\Models;
use App\Models\Category;
use App\Models\Image;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    
    protected function category(){
    	return $this->belongsTo(Category::class);
    }
    protected function user(){
    	return $this->belongsTo(User::class);
    }
    protected function images(){
    	return $this->hasMany(Image::class, 'product_id');
    }
}
