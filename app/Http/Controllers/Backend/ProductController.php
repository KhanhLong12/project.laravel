<?php

namespace App\Http\Controllers\Backend;
// use App\Models\category;
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

        $products = Product::latest()->paginate(5);
        // session()->keep(['success']);
        session()->forget(['success']);
        // session()->reflash();
        if (Gate::allows('check-role', $user)) {
            return view('backend.product.index')->with(['products' => $products]);
        }else{
            return view(abort(404));
        }
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
        if (Gate::allows('check-role', $user)) {
            return view('backend.product.create')->with(['categories' => $categories]);
        }else{
            return view(abort(404));
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
        // if ($request->hasFile('images')) {
        //     $images = $request->file('images');
        //     // foreach ($images as $image) {
        //     //     $image->store('images_11');
        //     foreach ($images as $image) {
        //         $name = $image->getClientOriginalName();
        //         $image->move('images_11', $name);
        //     }
        // }else{
        //     dd(5);
        // }
        // dd(4);
        // if ($request->hasFile('image')) {
        //     // $file = $request->file('image');
        //     // $path = $file->store('images_5');
        //     $file = $request->file('image');
        //     $name = $file->getClientOriginalName();
        //     $file->move('images_10', $name);
        //     //path = url/images_10/.$name
        // }else{
        //     echo "không";
        // }
        // dd(1);
        // $validatedData = $request->validate([
        //     'name'         => 'required|min:10|max:255',
        //     'content'      => 'required|min:10|max:500',
        //     'status'       => 'required',
        //     'origin_price' => 'required|numeric',
        //     'sale_price'   => 'required|numeric',
        // ]);
        // $validator = Validator::make($request->all(),
        //     [
        //         'name'         => 'required|min:10|max:255',
        //         'origin_price' => 'required|numeric',
        //         'sale_price'   => 'required|numeric',
        //         'content'      => 'required|min:10|max:500'
        //     ],
        //     [
        //         'required' => ':attribute Không được để trống',
        //         'min' => ':attribute Không được nhỏ hơn :min',
        //         'max' => ':attribute Không được lớn hơn :max'
        //     ],
        //     [
        //         'name' => 'Tên sản phẩm',
        //         'origin_price' => 'Giá gốc',
        //         'sale_price' => 'Giá bán',
        //         'content' => 'nội dung'
        //     ]
        // );
        // if ($validator->errors()){
        //     return back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

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
            // if ($url) {
            //     $request->session()->flash('picture','thêm ảnh thành công');
            // }else{
            //     $request->session()->flash('picture','thêm ảnh không thành công');
            //     // $image->store('images_11');
            // }
            // foreach ($images as $image) {
            //     $name = $image->getClientOriginalName();
            //     $image->move('images_11', $name);
            // }
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
            $request->session()->flash('success','Tạo sản phẩm thành công');
        }else{
            $request->session()->flash('error','Tạo sản phẩm không thành công');
        }
        return redirect()->route('backend.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        // dd($product);
        $category = $product->category;
        dd($category);
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
        $categories = Category::get();
        $user = Auth::user();
        $images = $item->images;
        // if ($user->can('update', $item)) {
        //     return view('backend.product.edit')->with([
        //         'categories' => $categories,
        //         'item' => $item
        //     ]);
        // }else{
        //     dd('aaaabc');
        // }
        
        // return view('backend.product.edit')->with([
        //     'categories' => $categories,
        //     'item' => $item
        // ]);
        if (Gate::allows('update-product', $item)){//nếu cho up date thì return về ..
            // dd('có quyền');
            return view('backend.product.edit')->with([
            'categories' => $categories,
            'item' => $item,
            'images' => $images
        ]);
        }else{
            return view(abort(404));
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
        $product->user_id = Auth::user()->id;
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
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('backend.product.index');
    }
}
