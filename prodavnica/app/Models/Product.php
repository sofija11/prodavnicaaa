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
        //kako bi se prikazali svi proizvodi i nakon obrisane kategorije, da se ne bi kaskadno obrisali,
        //mogle je i tako u migraciji da se doda kaskadno brisanje
        return $this->belongsTo(Category::class)->withTrashed();
    }

    public function photos() {
        return $this->hasMany(Photo::class);
    }
}
