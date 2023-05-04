<?php

namespace app\Domain\Products\Actions;

use App\Domain\Products\Models\Product;

class ProductUpdateAction
{
    public function handle($id, $request)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
    }
}