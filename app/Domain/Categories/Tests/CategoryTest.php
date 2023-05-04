<?php

namespace App\Domain\Categories\Tests;

use Tests\TestCase;
use App\Domain\Categories\Models\Category;


class CategoryTest extends TestCase
{
    public function testCreateCategory()
    {
        $data = [
            'title' => 'Create new new Test Category1',
            'description' => 'Create Test Category Description'
        ];

        $response = $this->json('POST', '/api/v1/categories', $data);

        $response->assertStatus(201);
    }

    public function testUpdatePutCategory()
    {
        $data = [
            'title' => 'Update PUT Test Category',
            'description' => 'Update PUT Test Category Description'
        ];

        $category = Category::create($data);

        $data = [
            'title' => 'Update PUT Test Category EDIT',
            'description' => 'Update PUT Test Category Description EDIT'
        ];

        $response = $this->json('PUT', '/api/v1/categories/' . $category->id, $data);

        $response->assertStatus(200);
                
        $category->delete($category->id);
    }

    public function testUpdatePatchCategory()
    {
        $data = [
            'title' => 'Update Patch Test Category',
            'description' => 'Update Test Category Description'
        ];

        $category = Category::create($data);

        $data = [
            'title' => 'Update Patch Test Category EDIT'
        ];

        $response = $this->json('PATCH', '/api/v1/categories/' . $category->id, $data);

        $response->assertStatus(200);

        $category->delete($category->id);
    }

    public function testDeleteCategory()
    {
        $data = [
            'title' => 'Delete Test Category',
            'description' => 'Delete Test Category Description'
        ];

        $category = Category::create($data);

        $response = $this->json('DELETE', '/api/v1/categories/' . $category->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);

        $category->delete($category->id);
    }

    public function testGetByIdCategory()
    {
        $data = [
            'title' => 'Get Test Category',
            'description' => 'Get Test Category Description'
        ];

        $category = Category::create($data);

        $response = $this->json('GET', '/api/v1/categories/' . $category->id);

        $response->assertStatus(200);

        $category->delete($category->id);
    }

    public function testGetCategory()
    {
        $data = [
            'title' => 'Get all Test Category',
            'description' => 'Get all Test Category Description'
        ];

        $category = Category::create($data);

        $response = $this->json('GET', '/api/v1/categories/');

        $response->assertStatus(200);

        $category->delete($category->id);
    }
}