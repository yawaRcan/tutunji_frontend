<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\Property;
use App\Models\PropertyMedia;
use Illuminate\Http\Request;
use Validator;
use DB;
use Auth;
use Illuminate\Support\Facades\Session;

class PropertyManageController extends Controller
{
    //ADD PROPERTY PAGE
    public function addProperty()
    {
        $checkBoxValue = Amenities::all();
        return view('admin.pages.add-property',compact('checkBoxValue'));
    }
    //PROPERTY-LIST PAGE
    public function showProperty(){
        Session::forget('media_name');
        $query = Property::query()->with('property_media')->get()->toArray();
        return view('admin.pages.list-property',compact('query'));
    }

    //STORE PROPERTY DATA
    public function storeProperty(Request $request)
    {
        //check validation
        $validation_rules = [
            'title' => 'required',
            'description' => 'required',
            'address' => 'required',
            'media' => 'required|mimes:jpg,jpeg,png,pdf',
        ];
        if($request->session()->has('media_name'))
            unset($validation_rules['media']);
        $validator = Validator::make($request->all(),$validation_rules);
        if ($validator->fails())
        {
            $messages = $validator->messages();
            //echo $messages->first('media');exit();
            if ($messages->has('media')) {
                return redirect('/admin/add-property')->withErrors($validator)->withInput();
            }
            return redirect('/admin/add-property')->withErrors($validator)->withInput();

        }else{
            $res= new Property;
            $checkBoxValue = $request->get('amenities');
            $checkArray = array();
            if($checkBoxValue) {
                foreach($checkBoxValue as $checkValue){
                    $checkArray[] = $checkValue;
                }
            }
            //$user_id = $request->session()->get('ADMIN_ID');
            //print_r($user_id);exit();
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
            $res->available_from=$request->input('available_from');
            $res->garage_size=$request->input('garage_size');
            $res->external_construction=$request->input('external_construction');
            $res->basement=$request->input('basement');
            $res->exterior_material=$request->input('exterior_material');
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
            $res->user_id = $request->session()->get('ADMIN_ID');
            $res->property_type = 'pre-construct';
            $res->internal_status = '0';
            $res->save();

            $property_id = $res->id;
            //update property_id only for session image stored
            foreach ($request->session()->get('media_name') as $image_obj) {
                PropertyMedia::query()->where('id', $image_obj['id'])->update([
                    'property_id' => $property_id
                ]);
            }
//            //get property_id
//            $property_id = $res->id;
//            DB::table('property_media')->where('property_id','=',0)->update(['property_id'=>$property_id]);

            //SESSION DESTROY
            if($request->session()->has('media_name')){
                $request->session()->remove('media_name');
            }
        }
        return redirect('/admin/list-property')->with('success','property added.');
    }
    //SAVE-MEDIA
    public function saveMediaFile(Request $request){
        $file = $request->file('file');
        //GET MIME TYPE
        $mediaType = $file->getMimeType();
        $validation_rule = ($mediaType == 'application/pdf') ? 'required|mimes:pdf|max:2048' : 'required|image|max:2048|mimes:jpg,jpeg,png|dimensions:min_width=500,min_height=500';
        $validator = Validator::make($request->all(), [
            'file' => $validation_rule,
        ]);
        if ($validator->passes())
        {
            //create object
            $propertyMedia = new PropertyMedia();
            $mediaName = time() . '.' . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('admin-panel/assets/property-media/'), $mediaName);

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

            //selected image preview after select image using session
            $session_image_id = $request->session()->get('media_name');

            //print_r($session_image_id);exit();
            $images_ids = ($session_image_id) ? $session_image_id : [];
            $images_ids[] = [
                'id'    => $propertyMedia->id,
                'name'  => $propertyMedia->media_name,
                'type'  => $propertyMedia->media_type
            ];
            //CREATE SESSION
            $request->session()->put('media_name',$images_ids);
            //GET MEDIA-ID
            $request->session()->put('media_id',$propertyMedia->id);
            //success-message

            /*--- GET LAST STORE SESSION INDEX ---*/
            $imageSession = $request->session()->get('media_name');
            $propertyMedia->session_key = array_search($propertyMedia->id,array_column($imageSession, 'id'));
            return ['code' => 200, 'message' => 'media uploaded', 'data' => $propertyMedia];
        }else{
            //error-message
            return ['code' => 500, 'message' => 'You select invalid file format'];
        }
    }
    //DELETE-MEDIA
    public function destroyMediaFile(Request $request) {
        $image_id       = $request->input('image_id');
        $propertyMedia  = PropertyMedia::find($image_id);
        $propertyType = Property::query()->find($propertyMedia->property_id);
        if(!empty($propertyMedia->media_name)) {
            if(!empty($propertyType['property_type'])){
                if ($propertyType['property_type'] == 'pre-construct') {
                    $path1 = public_path('admin-panel/assets/property-media/'.  $propertyMedia->media_name);
                    if(file_exists($path1)) unlink($path1);
                    //unlink(public_path('assets/admin/images/property-media/'.  $propertyMedia->media_name));
                } else {
                    $path2 = public_path('frontend/assets/property-media/'.  $propertyMedia->media_name);
                    if(file_exists($path2)) unlink($path2);
                    //unlink(public_path('assets/client/images/property-media/'.  $propertyMedia->media_name));
                }
            }

            $path = public_path('admin-panel/assets/property-media/'.  $propertyMedia->media_name);
            if(file_exists($path)) unlink($path);
//            if ($propertyType['property_type'] == 'pre-construct') {
//                unlink(public_path('admin-panel/assets/property-media/'.  $propertyMedia->media_name));
//            } else {
//                unlink(public_path('frontend/assets/property-media/'.  $propertyMedia->media_name));
//            }

            //unlink(public_path('admin-panel/assets/property-media/'.  $propertyMedia->media_name));

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
        return ['code' => 200, 'message' => 'media deleted'];
    }
    //EDIT PROPERTY PAGE
    public function editProperty($propertyId){
        Session::forget('media_name');
        //print_r($propertyId);exit();
        //GET PROPERTY DATA
        $propertyData = DB::table('properties')
            ->where('id','=',$propertyId)
            ->get();
        //GET MEDIA DATA
        $getMedia = DB::table('property_media')
            ->select('id','media_name','media_type')
            ->where('property_id',$propertyId)->get();
        //GET AMENITIES DATA
        $checkBoxValue = Amenities::all();
        return view('admin.pages.edit-property',compact('checkBoxValue','propertyData','getMedia'));
    }
    //UPDATE PROPERTY
    public function updateProperty(Request $request,$propertyId){
        //check validation
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
            return redirect('/admin/edit-property/'.$propertyId)->withErrors($validator)->withInput();
        }else {
            $checkBoxValue = $request->get('amenities');
            $checkArray = array();
            if ($checkBoxValue) {
                foreach ($checkBoxValue as $checkValue) {
                    $checkArray[] = $checkValue;
                }
            }
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
                    'available_from' => $request->get('available_from'),
                    'garage_size' => $request->get('garage_size'),
                    'external_construction' => $request->get('external_construction'),
                    'basement' => $request->get('basement'),
                    'exterior_material' => $request->get('exterior_material'),
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
        return redirect('/admin/list-property')->with('success','property updated');
    }
    //UPDATE MEDIA FILE DATA
    public function updateMediaFile(Request $request){
        $file = $request->file('file');
        //GET MIME TYPE
        $mediaType = $file->getMimeType();
        $validation_rule = ($mediaType == 'application/pdf') ? 'required|mimes:pdf|max:2048' : 'required|image|max:2048|mimes:jpg,jpeg,png|dimensions:min_width=500,min_height=500';
        $validator = Validator::make($request->all(), [
            'file' => $validation_rule,
        ]);
        if ($validator->passes())
        {
            $propertyID = $request->input('image_id');
            $propertyType = Property::query()->find($propertyID);
            //create object
            $propertyMedia = new PropertyMedia();
            $mediaName = time() . '.' . $request->file->getClientOriginalExtension();


            if ($propertyType['property_type'] == 'sale'){
                $request->file->move(public_path('frontend/assets/property-media/'), $mediaName);
            }else {
                $request->file->move(public_path('admin-panel/assets/property-media/'), $mediaName);
            }

            //$request->file->move(public_path('admin-panel/assets/property-media'), $mediaName);


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

            //selected image preview after select image using session
            $session_image_id = $request->session()->get('media_name');

            //print_r($session_image_id);exit();
            $images_ids = ($session_image_id) ? $session_image_id : [];
            $images_ids[] = [
                'id'    => $propertyMedia->id,
                'name'  => $propertyMedia->media_name,
                'type'  => $propertyMedia->media_type
            ];
            //CREATE SESSION
            $request->session()->put('media_name',$images_ids);
            //GET MEDIA-ID
            $request->session()->put('media_id',$propertyMedia->id);

            /*--- GET LAST STORE SESSION INDEX ---*/
            $imageSession = $request->session()->get('media_name');
            $propertyMedia->session_key = array_search($propertyMedia->id,array_column($imageSession, 'id'));
            //SESSION DESTROY
            if($request->session()->has('media_name')){
                $request->session()->remove('media_name');
            }
            $propertyMedia['property_type'] = $propertyType['property_type'];
            //success-message
            return ['code' => 200, 'message' => 'media uploaded', 'data' => $propertyMedia];
        }else{
            //error-message
            return ['code' => 500, 'message' => 'You select invalid file format'];
        }
    }
}
