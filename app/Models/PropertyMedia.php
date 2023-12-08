<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyMedia extends Model
{
    use HasFactory;
    protected $fillable = ['property_id','media_type','media_name'];

    public function property(){
        return $this->belongsTo(Property::class,'id');
    }

    public function property_details() {
        return $this->hasOne(Property::class, 'id', 'property_id')->select(['id', 'user_id']);
    }
    public function favourite(){
        return $this->belongsTo(Property::class,'id');
    }
}
