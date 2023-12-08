<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyView extends Model
{
    use HasFactory;
    protected $fillable = ['ip_address','visited_date','visited_time','user_id','property_id'];

}
