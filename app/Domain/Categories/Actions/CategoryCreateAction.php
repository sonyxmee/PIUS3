<?php

namespace app\Domain\Categories\Actions;

use App\Domain\Categories\Models\Category;

class CategoryCreateAction
{
    public function handle($request)
    {
        $category = Category::create($request->all());

        return $category;
    }
}