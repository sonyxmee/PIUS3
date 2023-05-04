<?php

namespace app\Domain\Products\Actions;

use App\Domain\Products\Models\Product;

class ProductGetAction
{
    public function handle($id)
    {
        $product = Product::findOrFail($id);

        return $product;
    }
}