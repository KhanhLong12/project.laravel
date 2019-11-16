<?php

namespace App\Http\Controllers\Fontend;

use Illuminate\Support\Facades\Cache;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Category;
class ProductController extends Controller
{
    public function index(){
      $products7 = Product::get();//lấy tất cả products
      // $images = $products7->images;
      $products5 = Product::WHERE('sale_price','<',2000000)->limit(8)->get();//sản phảm có số lượng từ thấp->cao và có giá là nhỏ hơn 15000
      $products4 = Product::OrderBy('sale_price','ASC')->WHERE('sale_price','<',2000000)->limit(8)->get();//sản phảm có số lượng từ thấp->cao và có giá là nhỏ hơn 15000
      $products3 = Product::OrderBy('sale_price','ASC')->WHERE('sale_price','<',1000000)->limit(3)->get();//sản phảm có số lượng từ thấp->cao và có giá là nhỏ hơn 15000
      $products1 = Product::OrderBy('created_at','DESC')->limit(20)->get();//sản phẩm có ngày tạo mới nhất
      $productshight = Product::OrderBy('origin_price','DESC')->first();//sản phẩm có Giá cao nhất
      $products2 = Product::OrderBy('origin_price','DESC')->limit(10)->get();//sản phẩm có giá cao nhất
      $products = Product::OrderBy('view_count','DESC')->limit(8)->get();//sắp xếp sản phẩm từ view cao->thấp
      $category = Category::Where('id', 2)->first();
      $categoryall = Category::first();
      $categorywacth = Category::Where('id', 23)->first();
      $productlaptop = Product::where('category_id',$category->id)->get();
      $productwatchs = Product::where('category_id',$categorywacth->id)->get();
   		return view('fontend.index')->with([
            'products' => $products,
            'products1' => $products1,
            'products2' => $products2,
            'products3' => $products3,
            'products4' => $products4,
            'products5' => $products5,
            'productshight' => $productshight,
            'productlaptop' => $productlaptop,
            'productwatchs' => $productwatchs,
      ]);
   }
   public function getcache(){
      $categories = Cache::remember('categories',5,function(){
         return $categories = Category::get();
      });
      // dd($categories);
      if (Cache::has('categories')) {
         $categories = Cache::get('categories');
      }else{
         $categories = Category::get();
      }
      dd($categories);
   }
   public function cart(){
         return view('fontend.product.cart')->with([
         ]);
   }
   public function shop($slug){
      $category = Category::Where('slug',$slug)->first();
      // $category_con = Category::Where('parent_id',$category->id)->get();
      $products6 = Product::Where('category_id',$category->id)->paginate(15);
         return view('fontend.product.shop')->with([
            'products6' => $products6,
      ]);
   }
   public function product($slug){
         $product = Product::where('slug', $slug)->first();

         $producttogether = Product::where('category_id',$product->category_id)->get();

         $product1 = Product::where('slug', $slug)->update(['view_count'=> $product->view_count + 1 ]);
         $images = $product->images;
         return view('fontend.product.product')->with([
            'product' => $product,
            'product1' => $product1,
            'images' => $images,
            'producttogether' => $producttogether,
      ]);
   }
   public function contact(){
           return view('fontend.product.contact');
   }
}
