<?php

namespace app\Domain\Products\Actions;

use App\Domain\Products\Models\Product;

class ProductDeleteAction
{
    public function handle(int $productId)
    {
        $product = Product::findOrFail($productId);
        $product->delete($productId);
    }
}