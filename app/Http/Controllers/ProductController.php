<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Notifications\ProductCreateNotification;
use Illuminate\Support\Facades\Notification;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::available()->paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validated());
        Notification::send($product, new ProductCreateNotification($product));
        return redirect(route('product.index'))->with('message', 'Продукт создан');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('product.index'))->with('message', 'Удалено!');
    }

    /**
     * Restore the product deleted by soft delete.
     *
     * @param $product
     * @return \Illuminate\Http\Response
     */
    public function restore($product)
    {
        $product = Product::withTrashed()->find($product);
        $product->restore();
        return redirect(route('product.index'))->with('message', 'Восстановлено!');
    }


    /**
     * Display a listing of unavailable Products.
     *
     * @return \Illuminate\Http\Response
     */
    public function listUnavailable()
    {
        $products = Product::unavailable()->paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Display a listing of deleted Products.
     *
     * @return \Illuminate\Http\Response
     */
    public function listDeleted()
    {
        $products = Product::onlyTrashed()->paginate(10);
        return view('products.index', compact('products'));
    }
}
