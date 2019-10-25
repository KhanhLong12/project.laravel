<?php

namespace App\Http\Controllers\Fontend;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class ProductController extends Controller
{
    public function index(){
      $categories = Category::get();//lấy tất cả category
      $products5 = Product::WHERE('sale_price','<',20000)->limit(8)->get();//sản phảm có số lượng từ thấp->cao và có giá là nhỏ hơn 15000
      $products4 = Product::OrderBy('sale_price','ASC')->WHERE('sale_price','<',15000)->limit(8)->get();//sản phảm có số lượng từ thấp->cao và có giá là nhỏ hơn 15000
      $products3 = Product::OrderBy('sale_price','ASC')->WHERE('sale_price','<',15000)->limit(3)->get();//sản phảm có số lượng từ thấp->cao và có giá là nhỏ hơn 15000
      $products1 = Product::OrderBy('created_at','DESC')->limit(20)->get();//sản phẩm có ngày tạo mới nhất
      $products2 = Product::OrderBy('origin_price','DESC')->limit(10)->get();//sản phẩm có giá cao nhất
      $products = Product::OrderBy('view_count','DESC')->limit(8)->get();//sắp xếp sản phẩm từ view cao->thấp
   		return view('fontend.index')->with([
            'products' => $products,
            'categories' => $categories,
            'products1' => $products1,
            'products2' => $products2,
            'products3' => $products3,
            'products4' => $products4,
            'products5' => $products5,
      ]);
   }
   public function cart(){

         $categories = Category::get();//lấy tất cả category
            return view('fontend.product.cart')->with([
               'categories' => $categories
         ]);
   }
   public function shop(){
      $categories = Category::get();
      $products6 = Product::paginate(15);
         return view('fontend.product.shop')->with([
            'categories' => $categories,
            'products6' => $products6
      ]);
   }
   public function product($slug){
      $product = Product::where('slug', $slug)->first();
      $categories = Category::get();
         return view('fontend.product.product')->with([
            'categories' => $categories,
            'product' => $product
      ]);
   }
   public function contact(){
         $categories = Category::get();//lấy tất cả category
           return view('fontend.product.contact')->with([
               'categories' => $categories
         ]);
   }
}
