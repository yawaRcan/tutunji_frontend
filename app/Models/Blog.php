<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];
    //An agent can have many properties
    public function category_details()
    {
        return $this->belongsTo(BlogCategory::class,'category');
    }
}
