<?php

namespace app\Domain\Categories\Actions;

use App\Domain\Categories\Models\Category;

class CategoryGetAction
{
    public function handle($id)
    {
        $category = Category::findOrFail($id);

        return $category;
    }
}