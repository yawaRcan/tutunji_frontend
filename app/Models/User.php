<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use App\Models\Permission;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password', 'avatar', 'provider_id', 'role','provider','image',
        'access_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo(Role::class,'id');
    }
//    public function roles()
//    {
//        return $this->belongsToMany(Role::class,'user_roles');
//    }
//
//    public function permissions()
//    {
//        return $this->belongsToMany(Permission::class,'user_permissions');
//    }

//    public function hasRole(...$roles)
//    {
//        // dd($roles);
//
//        foreach($roles as $role)
//        {
//            if($this->roles->contains('name',$role))
//            {
//                return true;
//            }
//        }
//        return false;
//    }
//
//    public function hasPermission($permission)
//    {
//        return  (bool) $this->permissions->where('name',$permission->name)->count();
//    }
}
