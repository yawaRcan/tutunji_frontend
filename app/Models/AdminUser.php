<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AdminUser extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','role','password'];
    //display rome name
    public function role_detail(){
        return $this->hasOne(Role::class, 'id', 'role');
    }

}
