<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateCategoriesRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Http\Resources\ProductsResource;
use Illuminate\Http\Request;
use App\Models\Product;
use illiminate\auth\events\validated;



class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return ProductsResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductsRequest $request)
    {
        $product = product::create($request->validated());
        return new ProductsResource($product);  
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $product =  product::findOrFail($id);
        return new ProductsResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductsRequest $request, string $id)
    {
        $product =  product::findOrFail($id);
        $product->update($request->validated());
        return new ProductsResource($product); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product =  product::findOrFail($id);
        $product->delete();
        return response()-> json(null, 204);
    }
}
