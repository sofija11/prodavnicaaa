<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model {

    use SoftDeletes;

    public $timestamps = true;
    
    protected $table = 'photos';

    protected $fillable = [
        'product_id',
        'image',
    ];
}
