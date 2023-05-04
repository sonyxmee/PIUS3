<?php

namespace App\Http\Api\V1\Modules\Categories\Controllers;

use App\Domain\Categories\Models\Category;
use App\Http\Controller;
use App\Http\Api\V1\Modules\Categories\Resources\CategoryResource;
use App\Http\Api\V1\Modules\Categories\Resources\EmptyResource;
use App\Http\Api\V1\Modules\Categories\Resources\CategoryCollection;
use App\Http\Api\V1\Modules\Categories\Requests\StoreCategoryRequest;
use App\Http\Api\V1\Modules\Categories\Requests\UpdateCategoryRequest;
use App\Domain\Categories\Actions\CategoryDeleteAction;
use App\Domain\Categories\Actions\CategoryGetAction;
use App\Domain\Categories\Actions\CategoryCreateAction;
use App\Domain\Categories\Actions\CategoryUpdateAction;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CategoryCollection(Category::paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request, CategoryCreateAction $action)
    {
        return new CategoryResource($action->handle($request));
    }

    /**
     * Display the specified resource.
     */
    public function show(int $categoryId, CategoryGetAction $action)
    {
        return new CategoryResource($action->handle($categoryId));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $categoryId, UpdateCategoryRequest $request, CategoryUpdateAction $action)
    {
        $action->handle($categoryId, $request);

        return response()->json(new EmptyResource(), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $categoryId, CategoryDeleteAction $action)
    {
        // app()->make(CategoryDeleteAction::class)->handle($category);

        $action->handle($categoryId);

        return response()->json(new EmptyResource(), 204);

    }
}
