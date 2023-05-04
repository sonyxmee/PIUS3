<?php

namespace app\Domain\Categories\Actions;

use App\Domain\Categories\Models\Category;

class CategoryUpdateAction
{
    public function handle($id, $request)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
    }
}