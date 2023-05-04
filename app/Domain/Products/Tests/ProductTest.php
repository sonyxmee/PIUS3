<?php

namespace App\Domain\products\Tests;

use Tests\TestCase;
use App\Domain\products\Models\Product;


class ProductTest extends TestCase
{
    public function testCreateProduct()
    {
        $data = [
            "name" => "New new new create Product10",
            "price" => 77,
            "stock" => 17,
            "category_id" => 7
        ];

        $response = $this->json('POST', '/api/v1/products', $data);

        $response->assertStatus(201);
    }

    public function testUpdatePutProduct()
    {
        $data = [
            "name" => "New PUT Product",
            "price" => 77,
            "stock" => 17,
            "category_id" => 7
        ];

        $product = Product::create($data);

        $data = [
            "name" => "New PUT Product1",
            "price" => 771,
            "stock" => 171,
            "category_id" => 1
        ];

        $response = $this->json('PUT', '/api/v1/products/' . $product->id, $data);

        $response->assertStatus(200);
                
        $product->delete($product->id);
    }

    public function testUpdatePatchProduct()
    {
        $data = [
            "name" => "New PATCH Product",
            "price" => 77,
            "stock" => 17,
            "category_id" => 7
        ];

        $product = Product::create($data);
        
        $data = [
            "name" => "New new Product",
            "price" => 77
        ];

        $response = $this->json('PATCH', '/api/v1/products/' . $product->id, $data);

        $response->assertStatus(200);

        $product->delete($product->id);
    }

    public function testDeleteProduct()
    {
        $data = [
            "name" => "New Delete Product",
            "price" => 77,
            "stock" => 17,
            "category_id" => 7
        ];

        $product = Product::create($data);

        $response = $this->json('DELETE', '/api/v1/products/' . $product->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('products', ['id' => $product->id]);

        $product->delete($product->id);
    }

    public function testGetByIdProduct()
    {
        $data = [
            "name" => "New GET by id Product",
            "price" => 77,
            "stock" => 17,
            "category_id" => 7
        ];

        $product = Product::create($data);

        $response = $this->json('GET', '/api/v1/products/' . $product->id);

        $response->assertStatus(200);

        $product->delete($product->id);
    }

    public function testGetProduct()
    {
        $data = [
            "name" => "New get all Product",
            "price" => 77,
            "stock" => 17,
            "category_id" => 7
        ];

        $product = Product::create($data);

        $response = $this->json('GET', '/api/v1/products/');

        $response->assertStatus(200);

        $product->delete($product->id);
    }
}