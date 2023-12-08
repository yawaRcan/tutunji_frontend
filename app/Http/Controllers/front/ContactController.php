<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\contactMail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    //contact form submit
    public function storeContactForm(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required|digits:10|numeric',
            'email' => 'required|email:rfc,dns',
            'subject' => 'required',
            'message' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['code' => 400, 'msg' => $validator->errors()->first()]);
        }
//        $contactData = new Contacts(array(
//
//        ))

        Mail::to('radha.tinnypixel@gmail.com')->send(new contactMail());
        if (Mail::failures()) {
            return response()->json(['code' => 400, 'msg' => 'Sorry! Please try again latter']);
        }else{
            return response()->json(['code' =>200, 'msg' => 'Great! Successfully send in your mail']);
        }

        /*Mail::send('frontend.pages.email.contact-mail', array(
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'subject' => $request['subject'],
            'message' => $request['message'],), function($message){
            $message->from('radha.tinnypixel@gmail.com');
            $message->to('vasim.tinnypixel@gmail.com')->subject('for send message');
        }
        );*/
                //return response()->json(['code' => 200, 'msg' => 'Thanks for contacting us, we will get back to you soon.']);



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


    }
}
