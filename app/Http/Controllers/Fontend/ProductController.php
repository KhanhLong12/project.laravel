<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
   		return view('fontend.index');
   }
   public function cart(){
   		return view('fontend.product.cart');
   }
   public function shop(){
   		return view('fontend.product.shop');
   }
   public function product(){
   		return view('fontend.product.product');
   }
   public function contact(){
   		return view('fontend.product.contact');
   }
}
