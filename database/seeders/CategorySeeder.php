<?php

namespace Database\Seeders;

// use App\Domain\Categories\Models\Category;
use App\Models\Category;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()
            ->count(25)
            ->hasProducts(10)
            ->create();
    }
}
