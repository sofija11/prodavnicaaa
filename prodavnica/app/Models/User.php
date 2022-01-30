<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model {

    use SoftDeletes;

    public $timestamps = true;
    
    protected $table = 'users';

    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'password',
        'role_id',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }
}
