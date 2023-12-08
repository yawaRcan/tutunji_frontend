<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jorenvh\Share\Share;

class SocialShareController extends Controller
{
    //
    public function index(){
        $shareData = (new \Jorenvh\Share\Share)->page('https://www.tutunjirealty.com/demo/public','Check out this Real Estate blog!')
            ->facebook()
            ->linkedin()
            ->twitter()
            ->telegram()
            ->whatsapp()
            ->getRawLinks();
        dd($shareData);
        return view('frontend.pages.social-share',compact('shareData'));
    }
}
