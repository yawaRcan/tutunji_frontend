<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FloorPlan2 extends Model
{
    use HasFactory;
    protected $fillable = ['property_id','images','no_of_bedrooms','no_of_bathrooms'];
    //relationship with property to add floor-plan-2d-images
    public function property(){
        return $this->belongsTo(Property::class,'id');
    }
}
