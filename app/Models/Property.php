<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Property extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'properties';
    protected $primaryKey = 'id';
//    protected $table = 'properties';
//    protected $fillable = ['title','description','price','after_price_label','before_price_label','category','listed_in','address',
//                            'city','neighborhood','zip','country_state','country','latitude','longitude','enable_google_street_view',
//                            'google_street_view','size_in_ft2','lot_size_in_ft2','rooms','bedrooms','bathrooms','custom_id','year_built',
//                            'garages','available_from','garage_size','external_construction','basement','exterior_material','floor_plan','roofing',
//                            'floors_no','structure_type','owner_agent_note','property_status','amenities_feature','video_from','embed_video_id',
//                            'virtual_tour','subunits','user_id','property_type','reject_reason','internal_status'];

   //get single image
    public function property_media() {
        //property-media get multiple file
        //return $this->hasMany(PropertyMedia::class, 'property_id', 'id');
        //property-media get single file
        return $this->hasOne(PropertyMedia::class, 'property_id', 'id')->where('media_type','=','image');

    }
    //multiple Image
    public function multiple_media(){
        return $this->hasMany(PropertyMedia::class,'property_id','id')
            ->where('media_type','=','image');
    }

    //if admin add property than it will display admin side property image otherwise display front side image
    public function user_details() {
        return $this->hasOne(User::class, 'id', 'user_id')->select(['id', 'role']);
    }
    //An agent can have many properties
    public function agent_details()
    {
        return $this->belongsTo(Agent::class,'agent_id');
    }
    //for favourite property
    public function favourite(){
        $pid = Auth::user() != null ? Auth::user()->id : null;
        return $this->belongsTo(Favourite::class,'id','property_id')->where('property_id',$pid);
    }
    public function like(){
        return $this->favourite()->selectRaw('property_id,count(*) as count')->groupBy('property_id');
    }
    //relationship with favourite table to get data in pre-construct-search
    public function fav_data(){
        $uid = Auth::user() != null ? Auth::user()->id : null;
        return $this->belongsTo(Favourite::class,'id','property_id')->where('user_id','=',$uid);
    }
    //relationship with floor_plan_2d table
    public function floor_plan2_images(){
        return $this->hasMany(FloorPlan2::class);
    }
    //relationship with floor_plan_2d table
    public function floor_plan3_images(){
        return $this->hasMany(FloorPlan3::class);
    }
    //total property views count in my-property
    public function property_views()
    {
        return $this->hasOne(PropertyView::class,'property_id')->selectRaw("property_id,count(*) as total")
            ->groupBy('property_id');
    }
    //total property offers count in my-property
    public function property_offer()
    {
        return $this->hasOne(Offer::class,'property_id')->selectRaw("property_id,count(*) as total")
            ->groupBy('property_id');
    }
    //An Category can have many properties
    public function cat_details()
    {
        return $this->belongsTo(Category::class,'category','id','name');
    }
//    function getCategory(){
//        return $this->hasMany('App\Models\Property');
//    }
//    public function category()
//    {
//        return $this->belongsTo('App\Models\Category');
//    }
}

