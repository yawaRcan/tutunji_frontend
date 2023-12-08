<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\Inquiry;
use App\Models\Property;
use App\Models\PropertyMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DB;
use Validator;
use File;

class PreconstructPropertyController extends Controller
{
    //LIST PRE-CONSTRUCT PROPERTY PAGE
    public function list_pre_construct_property(){
        $pre_construct_property = Property::query()->where('property_type','=','pre-construct')
            ->with('property_media')->get()->toArray();
        return view('admin.pages.pre-construct-property.list-pre-construct-property',compact('pre_construct_property'));
    }
    //ADD PRE-CONSTRUCT PROPERTY DATA
    public function add_pre_construct_property()
    {
        $checkBoxValue = Amenities::all();
        return view('admin.pages.pre-construct-property.add-pre-construct-property',compact('checkBoxValue'));
    }
    //STORE PRE-CONSTRUCT PROPERTY DATA
    public function store_pre_construct_property(Request $request)
    {
        //check validation
        $validation_rules = [
            'title' => 'required',
            'description' => 'required',
            'address' => 'required',
            'media' => 'required|mimes:jpg,jpeg,png,pdf',
        ];
        //UNSET MEDIA VALIDATION USING SESSION
        if($request->session()->has('media_name'))
            unset($validation_rules['media']);
        $validator = Validator::make($request->all(),$validation_rules);
        if ($validator->fails())
        {
            $messages = $validator->messages();
            //echo $messages->first('media');exit();
            if ($messages->has('media')) {
                return redirect('/admin/add-pre-construct-property')->withErrors($validator)->withInput();
            }
            return redirect('/admin/add-pre-construct-property')->withErrors($validator)->withInput();
        }else{
            //PERFORM DATABASE OPERATION
            $res= new Property;
            $checkBoxValue = $request->get('amenities');
            $checkArray = array();
            if($checkBoxValue) {
                foreach($checkBoxValue as $checkValue){
                    $checkArray[] = $checkValue;
                }
            }
            //FLOOR PLAN 2D IMAGE UPLOAD CODE
            $image1 = $request->hasFile('btnFloor2D');
            if ($image1)
            {
                $imageName1 = 'fp-2D'.'-'.time().'.'.$request->btnFloor2D->extension();
                $request->btnFloor2D->move(public_path('admin-panel/assets/property-images/floor-plan-2D/pre-construct/'), $imageName1);
            }
            else
            {
                $imageName1 = null;
            }
            //FLOOR PLAN 3D IMAGE UPLOAD CODE
            $image2 = $request->hasFile('btnFloor3D');
            if ($image2)
            {
                $imageName2 = 'fp-3D'.'-'.time().'.'.$request->btnFloor3D->extension();
                $request->btnFloor3D->move(public_path('admin-panel/assets/property-images/floor-plan-3D/pre-construct/'), $imageName2);
            }
            else
            {
                $imageName2 = null;
            }
            $res->title=$request->input('title');
            $res->description=$request->input('description');
            $res->price=$request->input('price');
            $res->after_price_label=$request->input('after_price_label');
            $res->before_price_label=$request->input('before_price_label');
            $res->category=$request->input('category');
            $res->listed_in=$request->input('listed_in');
            $res->address=$request->input('address');
            $res->city=$request->input('city');
            $res->neighborhood=$request->input('neighborhood');
            $res->zip=$request->input('zip');
            $res->country_state=$request->input('country_state');
            $res->country=$request->input('country');
            $res->latitude=$request->input('latitude');
            $res->longitude=$request->input('longitude');
            $res->enable_google_street_view=$request->input('enable_google_street_view');
            $res->google_street_view=$request->input('google_street_view');
            $res->size_in_ft2=$request->input('size_in_ft2');
            $res->lot_size_in_ft2=$request->input('lot_size_in_ft2');
            $res->rooms=$request->input('rooms');
            $res->bedrooms=$request->input('bedrooms');
            $res->bathrooms=$request->input('bathrooms');
            $res->custom_id=$request->input('custom_id');
            $res->year_built=$request->input('year_built');
            $res->garages=$request->input('garages');
            $res->available_from=($request->input('available_from')) ? date('Y-m-d',strtotime($request->input('available_from'))) : null;
            $res->garage_size=$request->input('garage_size');
            $res->external_construction=$request->input('external_construction');
            $res->basement=$request->input('basement');
            $res->exterior_material=$request->input('exterior_material');
            $res->floor_plan_2D = $imageName1;
            $res->floor_plan_3D = $imageName2;
            $res->roofing=$request->input('roofing');
            $res->floors_no=$request->input('floors_no');
            $res->structure_type=$request->input('structure_type');
            $res->owner_agent_note=$request->input('owner_agent_note');
            $res->property_status=$request->input('property_status');
            $res->amenities_feature = ($checkArray) ? implode(',', $checkArray) : 0;
            $res->video_from=$request->input('video_from');
            $res->embed_video_id=$request->input('embed_video_id');
            $res->virtual_tour	=$request->input('virtual_tour');
            $res->subunits = 'test';
            $res->user_id = Auth::guard('admin')->user()->id;
            $res->property_type = 'pre-construct';
            $res->internal_status = '1';
            $res->most_recent_upload = '1';
            $res->save();

            $property_id = $res->id;
            //UPDATE PROPERTY ID ONLY FOR SESSION MEDIA STORED
            foreach ($request->session()->get('media_name') as $image_obj) {
                PropertyMedia::query()->where('id', $image_obj['id'])->update([
                    'property_id' => $property_id
                ]);
            }
            //MEDIA SESSION DESTROY
            if($request->session()->has('media_name')){
                $request->session()->remove('media_name');
            }
        }
        return redirect('/admin/list-pre-construct-property')->with('success','Success! Property added.');
    }
    //UPLOAD MEDIA-FILE USING AJAX
    public function save_pre_construct_media_file(Request $request){
        $file = $request->file('file');
        //GET MIME TYPE
        $mediaType = $file->getMimeType();
        //CHECK VALIDATION
        $validation_rule = ($mediaType == 'application/pdf') ? 'required|mimes:pdf|max:2048' : 'required|image|max:2048|mimes:jpg,jpeg,png|dimensions:min_width=500,min_height=500';
        $validator = Validator::make($request->all(), [
            'file' => $validation_rule,
        ]);
        if ($validator->passes())
        {
            //PERFORM DATABASE OPERATION
            $propertyMedia = new PropertyMedia();
            $mediaName = time() . '.' . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('admin-panel/assets/property-images/media-file/pre-construct/'), $mediaName);

            $propertyMedia->property_id = '0';
            $propertyMedia->media_name = $mediaName;
            //CHECK MIME-TYPE
            if($mediaType == 'image/png' || $mediaType == 'image/jpeg'){
                //for image file
                $propertyMedia->media_type = 'image';
            }
            if($mediaType == 'application/pdf'){
                //for pdf file
                $propertyMedia->media_type = 'pdf';
            }
            $propertyMedia->save();
            //SELECTED MEDIA PREVIEW AFTER SELECT MEDIA USING SESSION
            $session_image_id = $request->session()->get('media_name');
            $images_ids = ($session_image_id) ? $session_image_id : [];
            $images_ids[] = [
                'id'    => $propertyMedia->id,
                'name'  => $propertyMedia->media_name,
                'type'  => $propertyMedia->media_type
            ];
            //CREATE MEDIA SESSION
            $request->session()->put('media_name',$images_ids);
            //GET MEDIA-ID
            $request->session()->put('media_id',$propertyMedia->id);
            /*--- GET LAST STORE SESSION INDEX ---*/
            $imageSession = $request->session()->get('media_name');
            $propertyMedia->session_key = array_search($propertyMedia->id,array_column($imageSession, 'id'));
            //SUCCESS MESSAGE
            return ['code' => 200, 'message' => 'Success! Media uploaded.', 'data' => $propertyMedia];
        }else{
            //ERROR MESSAGE
            return ['code' => 500, 'message' => 'Error! You have selected invalid media file'];
        }
    }
    //DELETE MEDIA-FILE USING AJAX
    public function destroy_pre_construct_media_file(Request $request) {
        $image_id       = $request->input('image_id');
        $propertyMedia  = PropertyMedia::find($image_id);
        $propertyType = Property::query()->find($propertyMedia->property_id);
        if(!empty($propertyMedia->media_name)) {
            if(!empty($propertyType['property_type'])){
                if ($propertyType['property_type'] == 'pre-construct') {
                    $path1 = public_path('admin-panel/assets/property-images/media-file/pre-construct/'.  $propertyMedia->media_name);
                    if(file_exists($path1)) unlink($path1);
                    //unlink(public_path('assets/admin/images/property-media/'.  $propertyMedia->media_name));
                }
            }
            /*=== BEGIN SESSION ===*/
            $image_session_array = $request->session()->get('media_name');
            if($request->has('session_key')) {
                unset($image_session_array[$request->input('session_key')]);
            }
            //array_values($image_session_array);
            is_array($image_session_array)? array_values($image_session_array): array();
            $request->session()->put('media_name', $image_session_array);
            /*=== END SESSION ===*/
        }
        DB::table('property_media')->where('id', '=', $image_id)->delete();
        return ['code' => 200, 'message' => 'Success! Media deleted.'];
    }
    //EDIT PRE-CONSTRUCT PROPERTY PAGE
    public function edit_pre_construct_property($propertyId){
        Session::forget('media_name');
        //GET PROPERTY DATA
        $pre_construct_data = DB::table('properties')
            ->where('id','=',$propertyId)->get();
        //GET MEDIA DATA
        $getMedia = DB::table('property_media')
            ->select('id','media_name','media_type')->where('property_id',$propertyId)->get();
        //GET AMENITIES DATA
        $checkBoxValue = Amenities::all();
//        echo '<pre>';
//        print_r($pre_construct_data);exit();
        return view('admin.pages.pre-construct-property.edit-pre-construct-property',compact('pre_construct_data','getMedia','checkBoxValue'));
    }
    //UPDATE PRE-CONSTRUCT PROPERTY
    public function update_pre_construct_property(Request $request,$propertyId){
        //CHECK VALIDATION
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'address' => 'required',
        ];
        $getMedia = PropertyMedia::query()->select('id')->where('property_id',$propertyId)->get()->toArray();
        if(!$getMedia) {
            $rules = array_merge($rules, ['media' => 'required|mimes:jpg,jpeg,png,pdf']);
        }
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails())
        {
            return redirect('/admin/edit-pre-construct-property/'.$propertyId)->withErrors($validator)->withInput();
        }else {
            //STORE MULTIPLE AMENITIES VALUES
            $checkBoxValue = $request->get('amenities');
            $checkArray = array();
            if ($checkBoxValue) {
                foreach ($checkBoxValue as $checkValue) {
                    $checkArray[] = $checkValue;
                }
            }
            //FLOOR PLAN 2D IMAGE UPLOAD CODE
            $image1 = $request->hasFile('btnFloor2D');
            if ($image1)
            {
                $floor2dPrevImage = DB::table('properties')->where('id','=',$propertyId)->get();
                $oldImage = $floor2dPrevImage[0]->floor_plan_2D;
                if(File::exists(public_path('admin-panel/assets/property-images/floor-plan-2D/pre-construct/'.$oldImage))){
                    File::delete(public_path('admin-panel/assets/property-images/floor-plan-2D/pre-construct/'.$oldImage));

                    $imageName1 = 'fp-2D'.'-'.time().'.'.$request->btnFloor2D->extension();
                    $request->btnFloor2D->move(public_path('admin-panel/assets/property-images/floor-plan-2D/pre-construct/'), $imageName1);

                    DB::table('properties')->where('id',$propertyId)
                        ->update(['floor_plan_2D' => $imageName1]);
                }
            }
            else
            {
                $imageName1 = null;
            }
            //FLOOR PLAN 3D IMAGE UPLOAD CODE
            $image2 = $request->hasFile('btnFloor3D');
            if ($image2)
            {
                $floor3dPrevImage = DB::table('properties')->where('id','=',$propertyId)->get();
                $oldImage = $floor3dPrevImage[0]->floor_plan_3D;
                $url = 'admin-panel/assets/property-images/floor-plan-3D/pre-construct/';
                if(File::exists(public_path($url.$oldImage))){
                    File::delete(public_path($url.$oldImage));

                    $imageName2 = 'fp-3D'.'-'.time().'.'.$request->btnFloor3D->extension();
                    $request->btnFloor3D->move(public_path($url), $imageName2);

                    DB::table('properties')->where('id',$propertyId)
                        ->update(['floor_plan_3D' => $imageName2]);
                }
            }
            else
            {
                $imageName2 = null;
            }
            //PERFORM DATABASE OPERATION
            DB::table('properties')
                ->where('id', $propertyId)
                ->update(array('title' => $request->get('title'),
                    'description' => $request->get('description'),
                    'price' => $request->get('price'),
                    'after_price_label' => $request->get('after_price_label'),
                    'before_price_label' => $request->get('before_price_label'),
                    'category' => $request->get('category'),
                    'listed_in' => $request->get('listed_in'),
                    'address' => $request->get('address'),
                    'city' => $request->get('city'),
                    'neighborhood' => $request->get('neighborhood'),
                    'zip' => $request->get('zip'),
                    'country_state' => $request->get('country_state'),
                    'country' => $request->get('country'),
                    'latitude' => $request->get('latitude'),
                    'longitude' => $request->get('longitude'),
                    'enable_google_street_view' => $request->get('enable_google_street_view'),
                    'google_street_view' => $request->get('google_street_view'),
                    'size_in_ft2' => $request->get('size_in_ft2'),
                    'lot_size_in_ft2' => $request->get('lot_size_in_ft2'),
                    'rooms' => $request->get('rooms'),
                    'bedrooms' => $request->get('bedrooms'),
                    'bathrooms' => $request->get('bathrooms'),
                    'custom_id' => $request->get('custom_id'),
                    'year_built' => $request->get('year_built'),
                    'garages' => $request->get('garages'),
                    'available_from' => ($request->input('available_from')) ? date('Y-m-d',strtotime($request->input('available_from'))) : null,
                    'garage_size' => $request->get('garage_size'),
                    'external_construction' => $request->get('external_construction'),
                    'basement' => $request->get('basement'),
                    'exterior_material' => $request->get('exterior_material'),
                    'floor_plan_2D' => $imageName1,
                    'floor_plan_3D' => $imageName2,
                    'roofing' => $request->get('roofing'),
                    'floors_no' => $request->get('floors_no'),
                    'structure_type' => $request->get('structure_type'),
                    'owner_agent_note' => $request->get('owner_agent_note'),
                    'property_status' => $request->get('property_status'),
                    'amenities_feature' => ($checkArray) ? implode(',', $checkArray) : 0,
                    'video_from' => $request->get('video_from'),
                    'embed_video_id' => $request->get('embed_video_id'),
                    'virtual_tour' => $request->get('virtual_tour'),
                ));
            $request->session()->put('property_id',$propertyId);
        }
        return redirect('/admin/list-pre-construct-property')->with('success','Success! Property updated.')->with('image',$imageName1);
    }
    //UPDATE MEDIA-FILE USING AJAX
    public function update_pre_construct_media_file(Request $request){
        $file = $request->file('file');
        //GET MIME TYPE
        $mediaType = $file->getMimeType();
        //CHECK-VALIDATION
        $validation_rule = ($mediaType == 'application/pdf') ? 'required|mimes:pdf|max:2048' : 'required|image|max:2048|mimes:jpg,jpeg,png|dimensions:min_width=500,min_height=500';
        $validator = Validator::make($request->all(), [
            'file' => $validation_rule,
        ]);
        if ($validator->passes())
        {
            //PERFORM DATABASE OPERATION
            $propertyID = $request->input('image_id');
            $propertyType = Property::query()->find($propertyID);
            //create object
            $propertyMedia = new PropertyMedia();
            $mediaName = time() . '.' . $request->file->getClientOriginalExtension();
            if ($propertyType['property_type'] == 'pre-construct') {
                $request->file->move(public_path('admin-panel/assets/property-images/media-file/pre-construct/'), $mediaName);
            }
            $propertyMedia->property_id = $propertyID;
            $propertyMedia->media_name = $mediaName;
            //CHECK MIME-TYPE
            if($mediaType == 'image/png' || $mediaType == 'image/jpeg'){
                //for image file
                $propertyMedia->media_type = 'image';
            }
            if($mediaType == 'application/pdf'){
                //for pdf file
                $propertyMedia->media_type = 'pdf';
            }
            $propertyMedia->save();
            //SELECTED MEDIA PREVIEW AFTER SELECT MEDIA USING AJAX
            $session_image_id = $request->session()->get('media_name');
            $images_ids = ($session_image_id) ? $session_image_id : [];
            $images_ids[] = [
                'id'    => $propertyMedia->id,
                'name'  => $propertyMedia->media_name,
                'type'  => $propertyMedia->media_type
            ];
            //CREATE MEDIA SESSION
            $request->session()->put('media_name',$images_ids);
            //GET MEDIA-ID
            $request->session()->put('media_id',$propertyMedia->id);
            /*--- GET LAST STORE SESSION INDEX ---*/
            $imageSession = $request->session()->get('media_name');
            $propertyMedia->session_key = array_search($propertyMedia->id,array_column($imageSession, 'id'));
            //MEDIA SESSION DESTROY
            if($request->session()->has('media_name')){
                $request->session()->remove('media_name');
            }
            $propertyMedia['property_type'] = $propertyType['property_type'];
            //SUCCESS MESSAGE
            return ['code' => 200, 'message' => 'Success! Media uploaded.', 'data' => $propertyMedia];
        }else{
            //ERROR MESSAGE
            return ['code' => 500, 'message' => 'Error! You have selected invalid media file.'];
        }
    }
    //delete pre-construct page
    public function deletePreConstructProperty($propertyId){
        $preConstructionPropertyData = Property::findOrFail($propertyId);
        $preConstructionPropertyData->delete();
        return redirect('/admin/list-pre-construct-property')->with('success', 'Success! Property Deleted.');
    }
    //UPDATE PENDING PROPERTY STATUS
    public function propertyStatus($statusId)
    {
        $propertyStatus = Property::where('id',$statusId)->pluck('internal_status');
        if($propertyStatus[0] == 1)
        {
            $update = array('internal_status' => 0);
            DB::table('properties')->where('id', $statusId)->update($update);
            return redirect('/admin/list-pre-construct-property')->with('success','Success! Property Deleted.');
        }else{
            $update = array('internal_status' => 0);
            DB::table('properties')->where('id', $statusId)->update($update);
            return redirect('/admin/list-pre-construct-property')->with('success','Success! Property now approved.');
        }
        return redirect()->back();
    }
    //ALL PRE-CONSTRUCT-PROPERTY
    public function all_property(){
        $all_pre_construct_property = Property::query()->where('property_type','=','pre-construct')->get();
        return view('admin.pages.pre-construct-property.all-pre-construct-property',compact('all_pre_construct_property'));
    }
    //ALL Active PRE-CONSTRUCT-PROPERTY
    public function all_active_property(){
        $active_pre_construct_property = Property::query()->where('property_type','=','pre-construct')->where('internal_status','=','1')->get();
        return view('admin.pages.pre-construct-property.active-pre-construct-property',compact('active_pre_construct_property'));
    }
    //ALL Deleted PRE-CONSTRUCT-PROPERTY
    public function all_deleted_property(){
        $deleted_pre_construct_property = Property::query()->where('property_type','=','pre-construct')->where('internal_status','=','0')->get();
        return view('admin.pages.pre-construct-property.deleted-pre-construct-property',compact('deleted_pre_construct_property'));
    }
    //view-inquiry
    public function show_inquiry($inquiryId){
       $inquiryData =  Inquiry::query()->where('property_id','=',$inquiryId)->get();
       return view('admin.pages.inquiry.view-inquiry',compact('inquiryData'));
    }
}
