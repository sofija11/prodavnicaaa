<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model {

    use SoftDeletes;

    public $timestamps = true;
    
    protected $table = 'products';

    protected $fillable = [
        'name',
        'code',
        'description',
        'price',
        'category_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function photos() {
        return $this->hasMany(Photo::class);
    }
}
