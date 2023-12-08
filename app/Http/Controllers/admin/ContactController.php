<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\contactMail;
use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    // submit contact form inquiry
    public function storeContactForm(Request $request){
        //return 'call now submit button is clicked!';
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required|digits:10|numeric',
            'subject' => 'required',
            'message' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/')->withErrors($validator)->withInput();
        }else{
            $contactUserData = new Contacts(array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'subject' => $request->get('subject'),
                'message' => $request->get('message'),
            ));
//            Mail::to($request->session()->get('email'))->send(new contactMail($contactUserData));
            $contactUserData->save();
        }


        //  Send mail to admin
//        \Mail::send('frontend.pages.contactMail', array(
//            'name' => $input['name'],
//            'email' => $input['email'],
//            'phone' => $input['phone'],
//            'subject' => $input['subject'],
//            'message' => $input['message'],
//        ), function($message) use ($request){
//            $message->from($request->email);
//            $message->to('radha.tinnypixel@gmail.com', 'Admin')->subject($request->get('subject'));
//        });


        //new code
//        $request->validate([
//            'name' => 'required',
//            'email' => 'required|email',
//            'phone' => 'required|digits:10|numeric',
//            'subject' => 'required',
//            'message' => 'required',
//        ]);
//
//        $input = $request->all();
//
//        Contacts::create($input);
//
//        //  Send mail to admin
//        \Mail::send('frontend.pages.contactMail', array(
//            'name' => $input['name'],
//            'email' => $input['email'],
//            'phone' => $input['phone'],
//            'subject' => $input['subject'],
//            'message' => $input['message'],
//        ), function($message) use ($request){
//            $message->from($request->email);
//            $message->to('radha.gohil108@gmail.com', 'Admin')->subject($request->get('subject'));
//        });

        return redirect()->back()->with(['success' => 'Contact Form Submit Successfully']);
    }
}
