<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'guard_name','name'
    ];
    protected $table = 'roles';

    public $timestamps = false;
    /**
     **Medidas usuaros que tienen este role
     */
    public function users(){
        return $this->hasMany(User::class);
    }
}
