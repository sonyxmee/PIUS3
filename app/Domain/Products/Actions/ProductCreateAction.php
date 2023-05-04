<?php

namespace app\Domain\Products\Actions;

use App\Domain\Products\Models\Product;

class ProductCreateAction
{
    public function handle($request)
    {
        $product = Product::create($request->all());

        return $product;
    }
}