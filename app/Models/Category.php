<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','status'];

//    function getproperty(){
//        return $this->hasOne('App\Models\Property');
//    }
//    public function cat_details()
//    {
//        return $this->HasMany(Category::class);
//    }
    public function property()
    {
        return $this->hasMany('App\Models\Property');
    }
}
