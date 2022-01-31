<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;


class CategoryService {            
    
    /**
     * getAllCategories
     *
     * @return Collection
     */
    public static function getAllCategories(): Collection {
        $categories = Category::all();
        return $categories;
    }
    
    /**
     * makeNewCategory
     *
     * @param  string $name
     * @return void
     */
    public static function makeNewCategory(string $name) {
        $category = new Category();
        $category->name = $name;
        $category->save();
    }
}