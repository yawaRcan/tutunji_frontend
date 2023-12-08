<?php

namespace App\Models;

use App\Mail\contactMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Contacts extends Model
{
    use HasFactory;
    public $fillable = ['name', 'email', 'phone', 'subject', 'message'];
//    public static function boot() {
//
//        parent::boot();
//
//        static::created(function ($item) {
//
//            $adminEmail = "radha.tinnypixel@gmail.com";
//            Mail::to($adminEmail)->send(new ContactMail($item));
//        });
//    }
}
