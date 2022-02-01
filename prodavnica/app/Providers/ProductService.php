<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;


class ProductService {            
        
    /**
     * getAllProducts
     *
     * @return Collection
     */
    public static function getAllProducts(): Collection{
       $products = Product::with(['category', 'photos'])->get();
       return $products;
    }
}