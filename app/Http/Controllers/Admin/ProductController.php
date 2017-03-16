<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('name', 'id');
        return view('admin.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ProductRequest $request)
    {
        $input = $request->all();
        if ($request->image) {
            $path = $request->file('image')->store('public');
            $tmp = explode('/', $path);
            $input['image'] = end($tmp);
        }
        $product = $this->product->create($input);
        if ($product) {
            return redirect()->action('Admin\ProductController@index')
                ->with('notification', trans('admin.notification.addsuccess'));
        }
        return redirect()->action('Admin\ProductController@index')
            ->with('notification', trans('admin.notification.fail'));
    }

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function show($id)
    {
        //
    }

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function edit($id)
    {
        try {
            $category = Category::pluck('name', 'id');
            $product = Product::find($id);
            return view('admin.product.edit', compact('product', 'category'));
        } catch (\Exception $e) {
            return redirect()->action('Admin\ProductController@index')
                ->with('notification', trans('admin.notification.failchoose'));
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
        $product = $this->product->find($id);
        if ($request->image) {
            //up ảnh mới
            $tenanhCu = $product->image;

            $path = $request->file('image')->store('public');
            $tmp = explode('/', $path);
            $tenanhmoi = end($tmp);
            $product->image = $tenanhmoi;
            //xóa ảnh cũ
            $pathOldPic = storage_path('app/public/' . $tenanhCu);
            if (file_exists($pathOldPic) && ('' != $tenanhCu)) {
                Storage::delete('public/' . $tenanhCu);
            }
        }
        $input = $request->all();
        $product->update($input);
        if ($product) {
            return redirect()->action('Admin\ProductController@index')
                ->with('notification', trans('admin.notification.editsuccess'));
        }

        return redirect()->action('Admin\ProductController@index')
            ->with('notification', trans('admin.notification.fail'));
    }

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function destroy($id)
    {
        try {
            Product::findOrFail($id)->delete();
            return redirect()->action('Admin\ProductController@index')
                ->with('notification', trans('admin.notification.productDelete'));
        } catch (\Exception $e) {
            return redirect()->action('Admin\ProductController@index')
                ->with('notification', trans('admin.notification.fail'));
        }
    }
}
