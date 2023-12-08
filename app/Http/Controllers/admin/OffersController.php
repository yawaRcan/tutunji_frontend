<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use Validator;

class OffersController extends Controller
{
    //add-offers page
    public function add_offer($propertyId){
        return view('admin.pages.offers.add-offers',compact('propertyId'));
    }
    //store offers
    public function store_offer(Request $request,$propertyId){
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'phone_number' => 'required|numeric|digits:10',
            'email_address' => 'required|email:rfc,dns',
            'brokerage_name' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/'
//            'selector' => 'required|in:brokerage',
        ]);
        if ($validator->fails()) {
            return redirect('/admin/add-offers/'.$propertyId)->withErrors($validator)->withInput();
        }else{
            $offersData = new Offer(array(
                'full_name' => $request->get('full_name'),
                'property_id' => $propertyId,
                'user_id' => '0',
                'created_time' => date('H:i:s'),
                'created_date' => today(),
                'phone_number' => $request->get('phone_number'),
                'email_address' => $request->get('email_address'),
                'brokerage_name' => $request->get('brokerage_name')
            ));
            $offersData->save();
            return redirect('/admin/view-offers/'.$propertyId)->with('success','Success! Offers Added.');
        }
    }
    //view-offers
    public function show_offer($propertyId){
        $offerData =  Offer::query()->where('property_id','=',$propertyId)->orderBy('id','desc')->get();
        return view('admin.pages.offers.view-offers',compact('offerData','propertyId'));
    }
    //edit-offers
    public function edit_offer($offerId){
        $offer_data = Offer::query()->where('id','=',$offerId)->get();
//        $get_property_id$offer_data[0]['property_id'];
        return view('admin.pages.offers.edit-offers',compact('offer_data'));
    }
    //update-offers
    public function update_offer(Request $request,$offerId){
        //return $offerId;
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'phone_number' => 'required|numeric|digits:10',
            'email_address' => 'required|email:rfc,dns',
            'brokerage_name' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/'
//            'selector' => 'required|in:brokerage',
        ]);
        if ($validator->fails()) {
            return redirect('/admin/edit-offers/'.$offerId)->withErrors($validator)->withInput();
        }else {
            $offer_get = Offer::query()->where('id','=',$offerId)->get();
            $get_property_id = $offer_get[0]['property_id'];
            Offer::query()->where('id', $offerId)
                ->update(['full_name' => $request->get('full_name'),
                    'property_id' => $get_property_id,
                    'phone_number' => $request->get('phone_number'),
                    'email_address' => $request->get('email_address'),
                    'brokerage_name' => $request->get('brokerage_name')
                ]);
        }
//        if($property_id){
            //return $property_id;
            return redirect('admin/view-offers/'.$get_property_id)->with('success','Success! Offers Updated.');
//        }
    }
    //delete-offers
    public function destroy_offer($offerId){
        $offer_get = Offer::query()->where('id','=',$offerId)->get();
        $get_property_id = $offer_get[0]['property_id'];
        $offerData = Offer::findOrFail($offerId);
        $offerData->delete();
        return redirect('/admin/view-offers/'.$get_property_id)->with('success', 'Success! Offer Deleted.');
    }
}
