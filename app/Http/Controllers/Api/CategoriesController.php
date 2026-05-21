<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCategoriesRequest;
use App\Http\Resources\CategoriesResource;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoriesRequest;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return CategoriesResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoriesRequest $request)
    {
        $categories = Category::create($request->validated());
        return new CategoriesResource($categories); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories =  category::findOrFail($id);
        return new CategoriesResource($categories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoriesRequest $request, string $id)
    {
        $categories =  Category::findOrFail($id);
        $categories->update($request->validated());
        return new CategoriesResource($categories); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories =  Category::findOrFail($id);
        $categories->delete();
        return response()-> json(null, 204);
    }
}
