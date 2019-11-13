<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Auth\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // dd($user);
        // dd($user);
        if($user->role == 1 || $user->role == 2) {
            $products = Product::OrderBY('created_at','DESC')->paginate(5);
        }else{
            $products = Product::OrderBY('created_at','DESC')->Where('user_id', $user->id)->paginate(5);//lấy sản phẩm do chính user đó tạo
        }
        // session()->keep(['success']);
        session()->forget(['success']);
        // session()->reflash();
        // if ($user->can('view', $products)) {
            return view('backend.product.index')->with([
                'products'    => $products
            ]);
        // }else{
        //     return view(abort(404));
        // }
        // $products = Product::with('category')->get();
        // foreach ($products as $product) {
        //     echo $product->category->name;
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Storage::disk('local')->put('file.txt','content');
        // $contents = Storage::disk('local')->get('file.txt');
        // $exists = Storage::disk('local')->exists('file.txt');
        // dd($exists);
        // $url = Storage::url('file.txt');//lấy cái url
        // Storage::disk('local')->copy('file.txt', 'file1.txt');
        // Storage::disk('avatar')->move('file.txt', 'file1.txt');

        // dd(1);
        // return Storage::disk('local')->download('file.txt','long.txt');//dowload file
        $categories = Category::get();
        $user = Auth::user();
        // if (Gate::forUser($user)->allows('update-product', $product)) {
        //     // User này có thể cập nhật sản phẩm
        // }
        if ($user->can('create', Product::class)) {
            return view('backend.product.create')->with(['categories' => $categories]);
        }
        // if (Gate::allows('check-role', $user)) {
        //     return view('backend.product.create')->with(['categories' => $categories]);
        // }
        else{
            return redirect()->route('backend.error',$user);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //ảnh
        $info_images = [];
        if ($request->hasFile('images')) {

            $images = $request->file('images');
            foreach ($images as $key => $image) {
                $namefile = $image->getClientOriginalName();//lấy tên gốc của ảnh
                $url = 'storage/products/' . $namefile;
                Storage::disk('public')->putFileAs('products', $image , $namefile);//chuyeern tuwf thu muc nguon sang thu muc dich
                $info_images[] = [
                    'url' => $url,
                    'name' => $namefile
                ];
            }
        }
        else{
            echo "không";
        }
        $product = new Product();
        $product->name = $request->get('name');
        $product->slug = \Illuminate\Support\Str::slug($request->get('name'));
        $product->category_id = $request->get('category_id');
        $product->sale_price = $request->get('sale_price');
        $product->origin_price = $request->get('origin_price');
        $product->content = $request->get('content');
        $product->status = $request->get('status');
        $product->user_id = Auth::user()->id;
        $save = $product->save();

        foreach ($info_images as $img) {
            $image = new Image();
            $image->name = $img['name'];
            $image->path = $img['url'];
            $image->product_id= $product->id;
            $image->save();
        }
        if ($save) {
            $request->session()->flash('success4','Tạo sản phẩm thành công');
        }else{
            $request->session()->flash('error4','Tạo sản phẩm không thành công');
        }
        return redirect()->route('backend.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function images($id){
        $item = Product::find($id);
        $images = $item->images;
        return view('backend.product.images')->with([
            'images' => $images,
            'item' => $item
        ]);
    }
    // public function error(){
    //     return view('backend.product.error');
    // }
    public function show($id)
    {
        $user = Auth::user();
        $product = Product::find($id);
        $images = $product->images;
        // dd($images);
        // dd($product);
        $category = $product->category;
        if ($user->can('view',$product)) {
        return view('backend.product.detail')->with([
            'product' => $product,
            'category' => $category,
            'images' => $images
        ]);   
        }
        else{
             return redirect()->route('backend.error',$user);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Product::find($id);
        $user = Auth::user();
        
        if ($user->can('update', $item)) {
            $categories = Category::get();
            $images = $item->images;
            return view('backend.product.edit')->with([
            'categories' => $categories,
            'item' => $item,
            'images' => $images
        ]);
        }
        else{
             return redirect()->route('backend.error',$user);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $info_images = [];
        if ($request->hasFile('images')) {

            $images = $request->file('images');
            foreach ($images as $key => $image) {
                $namefile = $image->getClientOriginalName();//lấy tên gốc của ảnh
                $url = 'storage/products/' . $namefile;
                Storage::disk('public')->putFileAs('products', $image , $namefile);//chuyeern tuwf thu muc nguon sang thu muc dich
                $info_images[] = [
                    'url' => $url,
                    'name' => $namefile
                ];
            }

        }
        else{
            echo "không";
        }
        $product = Product::find($id);
        $product->name = $request->get('name');
        $product->slug = \Illuminate\Support\Str::slug($request->get('name'));
        $product->category_id = $request->get('category_id');
        $product->sale_price = $request->get('sale_price');
        $product->origin_price = $request->get('origin_price');
        $product->content = $request->get('content');
        $product->status = $request->get('status');
        // $product->user_id = Auth::user()->id;
        $save = $product->save();
        
        foreach ($info_images as $img) {
            $image = new Image();
            $image->name = $img['name'];
            $image->path = $img['url'];
            $image->product_id= $product->id;
            $image->save();
        }
        // dd($save);
        if ($save) {
            $request->session()->flash('success1','Cập nhật sản phẩm thành công');
        }else{
            $request->session()->flash('error1','Cập nhật sản phẩm không thành công');
        }
        return redirect()->route('backend.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $user = Auth::user();
        if ($user->can('delete', Product::find($id))) {
            Product::destroy($id);
        if (Product::destroy($id) == 0) {
            $request->session()->flash('success5','Xóa sản phẩm thành công');
        }else{
            $request->session()->flash('error5','Xóa sản phẩm không thành công');
        }
            return redirect()->route('backend.product.index');
        }else{
            return redirect()->route('backend.error',$user);
        }
    }
}
