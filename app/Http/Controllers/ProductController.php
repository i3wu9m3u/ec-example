<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private const ITEM_PER_PAGE = 8;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'keyword'       => ['nullable', 'string', 'max:255'],
            'price'         => ['nullable', 'integer', 'min:0'],
        ]);
        $keyword = $request->input('keyword');
        $price = $request->input('price');

        $query = Product::orderBy('id', 'desc');
        if (isset($keyword)) {
            $query = Product::fuzzySearch($keyword, $query);
        }
        if (isset($price)) {
            $query = Product::priceFilter($price, $query);
        }
        $products = $query->paginate(self::ITEM_PER_PAGE);

        return view('products.index', compact('products'))
            ->with('keyword', $keyword)
            ->with('price', $price);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
