<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $guarded = [];
    //get role name in
    public function users(){
        return $this->hasMany(User::class, 'role');
    }
    //relationship with role_permissions table
    public function permission_details(){
        return $this->belongsToMany(Permission::class,'roles_permissions', 'role_id', 'permission_id');
    }
}
