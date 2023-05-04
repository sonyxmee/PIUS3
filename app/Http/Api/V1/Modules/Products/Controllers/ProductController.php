<?php

namespace App\Http\Api\V1\Modules\Products\Controllers;

use App\Domain\Products\Models\Product;
use App\Http\Controller;
use App\Http\Api\V1\Modules\Products\Resources\ProductResource;
use App\Http\Api\V1\Modules\Products\Resources\ProductCollection;
use App\Http\Api\V1\Modules\Products\Resources\EmptyResource;
use App\Http\Api\V1\Modules\Products\Requests\StoreProductRequest;
use App\Http\Api\V1\Modules\Products\Requests\UpdateProductRequest;
use App\Domain\Products\Actions\ProductDeleteAction;
use App\Domain\Products\Actions\ProductCreateAction;
use App\Domain\Products\Actions\ProductGetAction;
use App\Domain\Products\Actions\ProductUpdateAction;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ProductCollection(Product::paginate());
    }


    /**
     * Store a newly created resource in storage.
     */
    
    public function store(StoreProductRequest $request, ProductCreateAction $action)
    {
        return new ProductResource($action->handle($request));
    }

    /**
     * Display the specified resource.
     */
    // public function show(Product $product)
    // {
    //     return new ProductResource($product);
    // }

    /**
     * Display the specified resource.
     */
    public function show(int $productId, ProductGetAction $action)
    {
        return new ProductResource($action->handle($productId));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $productId, UpdateProductRequest $request, ProductUpdateAction $action)
    {
        $action->handle($productId, $request);

        return response()->json(new EmptyResource(), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $productId, ProductDeleteAction $action)
    {
        // app()->make(ProductDeleteAction::class)->handle($Product);

        $action->handle($productId);

        return response()->json(new EmptyResource(), 204);

    }
    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(UpdateProductRequest $request, Product $product)
    // {
    //     $product->update($request->all());
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Product $product)
    // {
    //     app()->make(ProductDeleteAction::class)->handle($product);

    //     return response()->json(['success' => true]);
    // }
}
