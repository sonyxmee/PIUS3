<?php

namespace App\Domain\Products\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'stock',
        'category_id'
    ];

    public function categories(){
        return $this->belongsTo(Category::class);
    }
}
