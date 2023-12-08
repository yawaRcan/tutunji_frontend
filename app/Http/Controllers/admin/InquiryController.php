<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Validator;

class InquiryController extends Controller
{
    //add-inquiry
    public function add_inquiry($propertyId){
        return view('admin.pages.inquiry.add-inquiry',compact('propertyId'));
    }
    //save-inquiry
    public function store_inquiry(Request $request,$propertyId){
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'phone_number' => 'required|numeric|digits:10',
            'email_address' => 'required|email:rfc,dns',
            'selector' => 'required|in:brokerage,agent',
        ]);
        if ($validator->fails()) {
            return redirect('/admin/add-inquiry/'.$propertyId)->withErrors($validator)->withInput();
        }else{
            $inquiryData = new Inquiry(array(
                'full_name' => $request->get('full_name'),
                'property_id' => $propertyId,
                'user_id' => '0',
                'phone_number' => $request->get('phone_number'),
                'email_address' => $request->get('email_address'),
                'broker_or_agent' => $request->get('selector')
            ));
            $inquiryData->save();
            return redirect('/admin/view-inquiry/'.$propertyId)->with('success','Success! Inquiry Added.');
        }
    }
    //view-inquiry
    public function show_inquiry($inquiryId){
       $inquiryData =  Inquiry::query()->where('property_id','=',$inquiryId)->orderBy('id','desc')->get();
       return view('admin.pages.inquiry.view-inquiry',compact('inquiryData','inquiryId'));
    }
    //edit-offers
    public function edit_inquiry($inquiryId){
        $inquiry_data = Inquiry::query()->where('id','=',$inquiryId)->get();
        return view('admin.pages.inquiry.edit-inquiry',compact('inquiry_data'));
    }
    //update-offers
    public function update_inquiry(Request $request,$inquiryId){
        //return $offerId;
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'phone_number' => 'required|numeric|digits:10',
            'email_address' => 'required|email:rfc,dns',
            'selector' => 'required|in:brokerage,agent',
        ]);
        if ($validator->fails()) {
            return redirect('/admin/edit-inquiry/'.$inquiryId)->withErrors($validator)->withInput();
        }else {
            $inquiry_get = Inquiry::query()->where('id','=',$inquiryId)->get();
            $get_property_id = $inquiry_get[0]['property_id'];
            Inquiry::query()->where('id', $inquiryId)
                ->update(['full_name' => $request->get('full_name'),
                    'property_id' => $get_property_id,
                    'user_id' => '0',
                    'phone_number' => $request->get('phone_number'),
                    'email_address' => $request->get('email_address'),
                    'broker_or_agent' => $request->get('selector')
                ]);
        }
//        if($property_id){
        //return $property_id;
        return redirect('admin/view-inquiry/'.$get_property_id)->with('success','Success! Inquiry Updated.');
//        }
    }
    //delete-offers
    public function destroy_inquiry($inquiryId){
        $inquiry_get = Inquiry::query()->where('id','=',$inquiryId)->get();
        $get_property_id = $inquiry_get[0]['property_id'];
        $inquiryData = Inquiry::findOrFail($inquiryId);
        $inquiryData->delete();
        return redirect('/admin/view-inquiry/'.$get_property_id)->with('success', 'Success! Inquiry Deleted.');
    }
}
