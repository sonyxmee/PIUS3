<?php

namespace app\Domain\Categories\Actions;

use App\Domain\Categories\Models\Category;

class CategoryDeleteAction
{
    public function handle(int $categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $category->delete($categoryId);
    }
}