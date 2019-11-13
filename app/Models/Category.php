<?php

namespace App\Models;
use App\Models\Product;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    public function products(){
        return $this->hasMany(Product::class);
    }
    protected function user(){
    	return $this->belongsTo(User::class);
    }
}
