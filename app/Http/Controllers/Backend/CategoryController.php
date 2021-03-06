<?php

namespace App\Http\Controllers\Backend;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreCategoryUpdateRequest;
use Auth;
use Auth\User;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::paginate(4);
        return view('backend.category.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $categories = Category::get();
        $user->can('create', Category::class);
        if ($user->can('create', Category::class)) {
            return view('backend.category.create')->with([
                'categories' => $categories
            ]);
        }else{
            // dd($user);
            return redirect()->route('backend.error',$user);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        // dd($request);
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $name = $file->getClientOriginalName();
            $thumbnail = $file->move('categories', $name);
            // dd($thumbnail);
        }else{
            echo "không";
        }
        $category = new Category();
        $category->name = $request->get('name'); 
        $category->slug = \Illuminate\Support\Str::slug($request->get('name'));
        $category->parent_id = $request->get('parent_id');
        $category->user_id = Auth::user()->id;
        $category->depth = 0;
        $category->description = $request->get('description');
        $category->thumbnail = $thumbnail;
        $save = $category->save();
        if ($save) {
            $request->session()->flash('success','Tạo danh mục thành công');
        }else{
            $request->session()->flash('error','Tạo danh mục không thành công');
        }
        return redirect()->route('backend.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Category::find($id)->products()->where('status',2)->get();//tìm sản phẩm có trạng thái là 2 thuộc cái id category cha
        foreach ($products as $product) {
            echo $product->name . "\n";
        }
        dd($products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $item = Category::find($id);
        $categories = Category::get();
        if ($user->can('update', $item)) {
            return view('backend.category.edit')->with([
                'categories' => $categories,
                'item' => $item
            ]);
        }else{
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
    public function update(StoreCategoryUpdateRequest $request, $id)
    {
        $category = Category::find($id);
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $name = $file->getClientOriginalName();
            $thumbnail = $file->move('categories', $name);
            $category->thumbnail = $thumbnail;
            // dd($thumbnail);
        }else{
            echo "không";
        }
        $category->name = $request->get('name');
        $category->slug = \Illuminate\Support\Str::slug($request->get('name'));
        $category->parent_id = $request->get('parent_id');
        $category->description = $request->get('description');
        $save = $category->save();
        if ($save) {
            $request->session()->flash('success1','Cập nhật category thành công');
        }else{
            $request->session()->flash('error1','Cập nhật category không thành công');
        }
        return redirect()->route('backend.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        if ($user->can('delete',Category::find($id))) {
            Category::destroy($id);
            if (Category::destroy($id) == 0) {
                $request->session()->flash('success2','Cập nhật category thành công');
            }else{
                $request->session()->flash('error2','Cập nhật category không thành công');
            }
            return redirect()->route('backend.category.index');   
        }else{
            return redirect()->route('backend.error',$user);
        }
    }
}
