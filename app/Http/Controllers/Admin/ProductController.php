<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private const ITEM_PER_PAGE = 10;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(self::ITEM_PER_PAGE);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'description'   => ['required', 'string', 'max:65535'],
            'price'         => ['required', 'integer', 'min:0'],
            'image'         => ['required', 'image', 'mimes:jpeg,png,bmp'],
        ]);
        $file = $request->file('image');

        // DB登録
        $product = new Product;
        $product->fill($request->all());
        $product->image_extension = $file->getClientOriginalExtension();
        $product->save();

        // ファイル保存
        $product->storeImage($file);

        return redirect()->route('admin.products.show', compact('product'))
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'description'   => ['required', 'string', 'max:65535'],
            'price'         => ['required', 'integer', 'min:0'],
            'image'         => ['nullable', 'image', 'mimes:jpeg,png,bmp'],
        ]);
        $file = $request->file('image');

        // DB更新
        $product->fill($request->all());
        if ($file) {
            $product->image_extension = $file->getClientOriginalExtension();
        }
        $product->save();

        // 画像保存
        $product->storeImage($file);

        return redirect()->route('admin.products.edit', compact('product'))
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
