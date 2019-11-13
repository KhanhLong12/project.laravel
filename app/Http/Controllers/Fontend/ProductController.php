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
      Cache::put('view_count',1,60*60);
      //cache với array
      $put = Cache::put('name',['tên' => 'Long','họ' => 'Nguyễn'],50*2);
      $put = Cache::put('Đệm',['d' => 'Long','b' => '1'],50*2);
      //cache với String
      // $put = Cache::put('name','Long',15);
      // dd($put);
      // //cache với int
      // Cache::put('age',18,20);
      //1 đối tượng
      // $cate = Category::find(1);
      // Cache::put('cate', $cate, 15*5);
      // // dd($cate);
      //nhiều đối tượng
      // $categories = Category::get();
      // Cache::put('categories', $categories,50*5);
      //kiểm tra xem class đã có cache chưa
      // dd(Cache::add('class','At13i',30*2));

      // dd($categories);

      // $categories = Category::get();//lấy tất cả category
      $products7 = Product::get();//lấy tất cả products
      // $images = $products7->images;
      $products5 = Product::WHERE('sale_price','<',2000000)->limit(8)->get();//sản phảm có số lượng từ thấp->cao và có giá là nhỏ hơn 15000
      $products4 = Product::OrderBy('sale_price','ASC')->WHERE('sale_price','<',2000000)->limit(8)->get();//sản phảm có số lượng từ thấp->cao và có giá là nhỏ hơn 15000
      $products3 = Product::OrderBy('sale_price','ASC')->WHERE('sale_price','<',1000000)->limit(3)->get();//sản phảm có số lượng từ thấp->cao và có giá là nhỏ hơn 15000
      $products1 = Product::OrderBy('created_at','DESC')->limit(20)->get();//sản phẩm có ngày tạo mới nhất
      $products2 = Product::OrderBy('origin_price','DESC')->limit(10)->get();//sản phẩm có giá cao nhất
      $products = Product::OrderBy('view_count','DESC')->limit(8)->get();//sắp xếp sản phẩm từ view cao->thấp
      // foreach ($products as $key => $value) {
      //    dd($value->id);
      // }
   		return view('fontend.index')->with([
            'products' => $products,
            // 'categories' => $categories,
            'products1' => $products1,
            'products2' => $products2,
            'products3' => $products3,
            'products4' => $products4,
            'products5' => $products5,
            // 'images'    => $images,
      ]);
   }
   public function getcache(){
      $categories = Cache::remember('categories',5,function(){
         return $categories = Category::get();
      });
      // dd($categories);



      $view_count = Cache::get('view_count');
      echo $view_count;
      echo '<br>';
      Cache::increment('view_count');
      Cache::increment('view_count');
      Cache::decrement('view_count');
      $view_count = Cache::get('view_count');
      echo $view_count;
      echo '<br>';

      $name = Cache::get('name');
      $cate = Cache::get('cate');
      //kiểm tra xem categories tồn tại hay không
      if (Cache::has('categories')) {
         $categories = Cache::get('categories');
      }else{
         $categories = Category::get();
      }
      $dem = Cache::get('Đệm');
      $age = Cache::get('age','10');
      echo "age: " .$age;
      // dd($cate);
      // dd($categories);
   }
   public function cart(){

         // $categories = Category::get();//lấy tất cả category
            return view('fontend.product.cart')->with([
               // 'categories' => $categories
         ]);
   }
   public function shop(){
      $categories = Category::get();
      $products6 = Product::->paginate(15);
         return view('fontend.product.shop')->with([
            // 'categories' => $categories,
            'products6' => $products6,
            'categories' => $categories
      ]);
   }
   public function product($slug){
         $product = Product::where('slug', $slug)->first();
         $images = $product->images;
         return view('fontend.product.product')->with([
            'product' => $product,
            'images' => $images
      ]);
   }
   public function contact(){
           return view('fontend.product.contact');
   }
}
