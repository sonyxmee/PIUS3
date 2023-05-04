<?php

namespace Database\Seeders;

// use App\Domain\Products\Models\Product;
use App\Models\Product;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()
            ->count(25)
            ->hasCategories(10)
            ->create();
    }
}
