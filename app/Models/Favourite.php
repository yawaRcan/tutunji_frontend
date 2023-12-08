<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;
    protected $fillable = ['property_id','user_id','is_fav'];
    protected $primaryKey = 'id';
    //for favourite property
    public function property_data(){
//        return $this->belongsTo(Property::class);
        return $this->hasOne(Property::class, 'id', 'property_id');

    }
    //multiple Image
    public function multiple_media(){
//        return $this->hasMany(PropertyMedia::class, 'property_id', 'id')->where('media_type','=','image')->select(['property_id']);
        return $this->hasOne(PropertyMedia::class, 'property_id', 'id')->where('media_type','=','image');
    }
    //display multiple media for favourite
    public function properties() {
        return $this->hasOne(Property::class, 'id', 'property_id')->with('multiple_media');
    }

    //if admin add property than it will display admin side property image otherwise display front side image
    public function user_details() {
        return $this->hasOne(User::class, 'id', 'user_id')->select(['id', 'role']);
    }
    //An agent can have many properties
    public function agent_fav()
    {
        return $this->belongsTo(Agent::class,'agent_id');
    }
}
