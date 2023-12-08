<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Amenities;
use App\Models\Category;
use App\Models\Country;
use App\Models\FloorPlan2;
use App\Models\FloorPlan3;
use App\Models\Inquiry;
use App\Models\Property;
use App\Models\PropertyMedia;
use App\Models\State;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
use Illuminate\Support\Facades\Validator;
use File;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class SalePropertyController extends Controller
{
    //ADD SALE PROPERTY PAGE
    public function addSaleProperty(){
//        if(Session::has('media_name')){
//            Session::remove('media_name');
//        }
//        if(Session::has('session_data')) {
//            Session::remove('session_data');
//        }
//        if(Session::has('session_3d_data')) {
//            Session::remove('session_3d_data');
//        }
        $checkBoxValue = Amenities::all();
        $agentData = Agent::all();
        $countries = Country::all();
        $allCategory = Category::all();
        return view('admin.pages.sale-property.add-sale-property',compact('checkBoxValue','agentData','countries','allCategory'));
    }
    //get states
    public function getState(Request $request)
    {
        $data['states'] = State::query()->where("country_id",$request->country_id)
            ->get(["name","id"]);
        return response()->json($data);
    }
    //SAVE SALE PROPERTY
    public function storeSaleProperty(Request $request){
        //check validation
        $validation_rules = [
//            'title' => 'required',
            'description' => 'required',
            'address' => 'required',
            'media_name'   => 'required|image|mimes:jpg,webp,png|max:2048',
        ];
        //UNSET MEDIA VALIDATION USING SESSION
        if($request->session()->has('media_name'))
            unset($validation_rules['media_name']);
        $validator = Validator::make($request->all(),$validation_rules);
        if ($validator->fails())
        {
            $messages = $validator->messages();
            //echo $messages->first('media');exit();
            if ($messages->has('media_name')) {
                return redirect('/admin/add-sale-property')->withErrors($validator)->withInput();
            }
            return redirect('/admin/add-sale-property')->withErrors($validator)->withInput();
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
            // embed video url
//            $videoURL = $request->input('embed_video_id');
//            $convertedURL = str_replace("watch?v=","embed/",$videoURL);
            //embed video id
//            $videoType = $request->input('video_from');
//            if($videoType == 'vimeo'){
//                $videoURL = $request->input('embed_video_id');
//                $convertedURL = str_replace("vimeo.com","player.vimeo.com/video",$videoURL);
//
//            }else{
//                $videoURL = $request->input('embed_video_id');
//                $convertedURL = str_replace("watch?v=","embed/",$videoURL);
//            }
            $videoType = $request->input('video_from');
            $videoId = $request->input('embed_video_id');
            if($videoId){
                if($videoType == 'vimeo'){
                    $link_1 = parse_url(url($videoId));
                    if($link_1['host'] == 'player.vimeo.com'){
                        $res->embed_video_id = $videoId;
                    }else{
                        $videoURL = $request->input('embed_video_id');
                        $convertedURL = str_replace("vimeo.com", "player.vimeo.com/video", $videoURL);
                        $res->embed_video_id = $convertedURL;
                    }
                }else{
                    $link_2 = parse_url(url($videoId));
                    if($link_2['path'] == '/watch'){
                        $videoURL = $request->input('embed_video_id');
                        $convertedURL = str_replace("watch?v=","embed/",$videoURL);
                        $res->embed_video_id = $convertedURL;
                    } else{
                        $res->embed_video_id = $videoId;
                    }
                }
            }

            $res->title=$request->input('title');
            $res->description=$request->input('description');
            $res->price                        = number_format((int) $request->get('price'),2,'.',',');
            $res->after_price_label            = $request->get('after_price_label');
            $res->before_price_label           = $request->get('before_price_label');
            $res->category=$request->input('category');
            $res->listed_in=$request->input('listed_in');
            $res->address=$request->input('address');
            $res->city=$request->input('city');
            $res->neighborhood=$request->input('neighborhood');
            $res->zip=$request->input('zip');
            $res->country_state=$request->input('state');
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
            $res->floor_plan_2D = 0;
            $res->floor_plan_3D = 0;
            $res->roofing=$request->input('roofing');
            $res->floors_no=$request->input('floors_no');
            $res->structure_type=$request->input('structure_type');
            $res->owner_agent_note=$request->input('owner_agent_note');
            $res->property_status=$request->input('property_status');
            $res->agent_id=$request->input('agent');
            $res->amenities_feature = ($checkArray) ? implode(',', $checkArray) : 0;
            $res->video_from=$request->input('video_from');
//            $res->embed_video_id=$convertedURL;
            $res->virtual_tour	=$request->input('virtual_tour');
            $res->subunits = 'test';
            $res->user_id =  Auth::guard('admin')->user()->id;
            $res->created_time = date('H:i:s');
            $res->property_type = 'sale';
            $res->internal_status = '1';
            $res->source    = 'Admin';
            $res->created_date = today();
            $res->most_recent_upload = '1';
            $res->save();
            $property_id = $res->id;

            //UPDATE PROPERTY ID ONLY FOR SESSION MEDIA STORED
            if(Session::has('media_name')){
                foreach ($request->session()->get('media_name') as $image_obj) {
                    PropertyMedia::query()->where('id', $image_obj['id'])->update([
                        'property_id' => $property_id
                    ]);
                }
            }


            if(Session::has('session_data')) {
                $_2d_floor_section_session = Session::get('session_data');
                $_2d_insert_array = [];
                foreach ($_2d_floor_section_session as $_2d_row) {
                    $_2d_insert_array[] = [
                        'property_id' => $property_id,
                        'images' => $_2d_row['input_file'],
                        'no_of_bedrooms' => $_2d_row['input_bedrooms'],
                        'no_of_bathrooms' => $_2d_row['input_bathrooms'],
                        'sqft' => $_2d_row['input_sqft'],
                    ];
                }
                if ($_2d_insert_array) {
                    FloorPlan2::query()->insert($_2d_insert_array);
                    Session::remove('session_data');
                }
            }
            if(Session::has('session_3d_data')) {
                $_3d_floor_section_session = Session::get('session_3d_data');
                $_3d_insert_array = [];
                foreach ($_3d_floor_section_session as $_3d_row) {
                    $_3d_insert_array[] = [
                        'property_id' => $property_id,
                        'images' => $_3d_row['input_file'],
                        'no_of_bedrooms' => $_3d_row['input_bedrooms'],
                        'no_of_bathrooms' => $_3d_row['input_bathrooms'],
                        'sqft' => $_3d_row['input_sqft'],
                    ];
                }
                if ($_3d_insert_array) {
                    FloorPlan3::query()->insert($_3d_insert_array);
                    Session::remove('session_3d_data');
                }
            }

            //MEDIA SESSION DESTROY
            if($request->session()->has('media_name')){
                $request->session()->remove('media_name');
            }
        }
        return redirect('/admin/list-sale-property')->with('success','Success! Property added.');
    }
    //new code for 2d file
    public function update_2d_section_on_sale_session(Request $request)
    {
        //CHECK VALIDATION
        $validation_rule = 'required|image|mimes:jpg,webp,png';
        $validator = Validator::make($request->all(), [
            'input_file' => $validation_rule,
        ]);
        if ($validator->passes()) {

            $inputted_file_value = $request->file('input_file');

            $getsize = $inputted_file_value->getSize();
            if($getsize >= 2097152) {
                return response(['code' => 400, 'message' => 'Floor plan 2D file size exceeds.']);
            }else{
                $floorPlan2DName = time() . '.' . $inputted_file_value->getClientOriginalExtension();
                $inputted_file_value->move(public_path('admin-panel/assets/property-images/floor-plan-2D/sale/'), $floorPlan2DName);

                $_2d_section_session = Session::get('session_data');
                $create_array = [
                    'input_image_id' => $request->get('input_image_id'),
                    'input_file' => $floorPlan2DName,
                    'input_bedrooms' => $request->get('input_bedrooms'),
                    'input_bathrooms' => $request->get('input_bathrooms'),
                    'input_sqft' => $request->get('input_sqft'),
                ];

                $array = [];
                if ($_2d_section_session) {
                    foreach ($_2d_section_session as $row) {
                        $array[] = $row;
                    }
//                    $count_array = count($array);
//                    if($count_array <= 1){
//                        return response(['code' => 200, 'message' => 'Error! You can not upload more than one floor plan.']);
//                    }
                }
                $array[] = $create_array;


                Session::remove('session_data');
                Session::put('session_data', $array);
            }

        }else{
            return response(['status' => 404,'message' => 'Only png, jpg and webp file types are allowed.']);
        }
        return response(['message' => 'floor plan 2d data store in session','data'=> $create_array]);
    }
    public function edit_2d_sale_image(Request $request){
        $params = $request->input();
        $allData = Session::get('session_data');
        $index = array_search($params['session_index_id'], array_column($allData, 'input_image_id'));
        $particularData = $allData[$index];
        $inputted_file_value = $request->file('input_file');
        if ($inputted_file_value) {
            $validation_rule = 'required|image|mimes:jpg,webp,png';
            $validator = Validator::make($request->all(),[
                'input_file' => $validation_rule,
            ]);
            if($validator->passes()){
                $getsize = $inputted_file_value->getSize();
                if($getsize >= 2097152){
                    return response(['code' => 400, 'message' => 'Floor plan 2D file size exceeds.']);
                }else{
                    /*--- UNLINK IMAGE ---*/
                    $old_image = $particularData['input_file'];
                    $path = public_path('admin-panel/assets/property-images/floor-plan-2D/sale/' . $old_image);
                    if (file_exists($path))
                        unlink($path);

                    $floorPlan2DName = time() . '.' . $inputted_file_value->getClientOriginalExtension();
                    $inputted_file_value->move(public_path('admin-panel/assets/property-images/floor-plan-2D/sale/'), $floorPlan2DName);
                }
            }else{
                return response(['code' => 404, 'message' => 'Only png, jpg and webp file types are allowed.']);
            }

        } else {
            $floorPlan2DName = $particularData['input_file'];
        }

        $allData[$index] = [
            'input_image_id' => $params['session_index_id'],
            'input_file' => $floorPlan2DName,
            'input_bedrooms' => $params['input_bedrooms'],
            'input_bathrooms' => $params['input_bathrooms'],
            'input_sqft' => $params['input_sqft'],
        ];

        Session::remove('session_data');
        Session::put('session_data', $allData);

        return response(['message' => 'floor plan 2d edit data store in session','data'=> $allData[$index]]);
    }
    public function destroy_2d_sale_floor_plan(Request  $request){
        $sessionData = Session::get('session_data');
        $id = $request->input('deleted_id');
        unset($sessionData[array_search($id, array_column($sessionData, 'input_image_id'))]);

        $sessionData = array_values($sessionData);
        $array = [];
        if($sessionData){
            foreach ($sessionData as $key => $row) {
                $row['input_image_id'] = $key+1;
                $array[] = $row;
            }
        }

        Session::remove('session_data');
        Session::put('session_data', $array);
        return ['code' => 200, 'message' => 'Item successfully removed.'];
    }
    //new code for 3d file
    public function update_3d_section_on_sale_session(Request $request){
        //CHECK VALIDATION
        $validation_rule = 'required|image|mimes:jpg,webp,png';
        $validator = Validator::make($request->all(), [
            'input_file' => $validation_rule,
        ]);
        if ($validator->passes()) {
            $inputted_file_value = $request->file('input_file');

            $getsize = $inputted_file_value->getSize();
            if($getsize >= 2097152) {
                return response(['code' => 400, 'message' => 'Floor plan 3D file size exceeds.']);
            }else{
                $inputted_file_value = $request->file('input_file');
                $floorPlan3DName = time() . '.' . $inputted_file_value->getClientOriginalExtension();
                $inputted_file_value->move(public_path('admin-panel/assets/property-images/floor-plan-3D/sale/'), $floorPlan3DName);

                $_3d_section_session = Session::get('session_3d_data');
                $create_array = [
                    'input_image_id' => $request->get('input_image_id'),
                    'input_file' => $floorPlan3DName,
                    'input_bedrooms' => $request->get('input_bedrooms'),
                    'input_bathrooms' => $request->get('input_bathrooms'),
                    'input_sqft' => $request->get('input_sqft'),
                ];

                $array = [];
                if ($_3d_section_session) {
                    foreach ($_3d_section_session as $row) {
                        $array[] = $row;
                    }
//                    $count_array = count($array);
//                    if($count_array <= 1){
//                        return response(['code' => 200, 'message' => 'Error! You can not upload more than one floor plan.']);
//                    }
                }
                $array[] = $create_array;

                Session::remove('session_3d_data');
                Session::put('session_3d_data', $array);
            }
        }else{
            return response(['status' => 404,'message' => 'Only png, jpg and webp file types are allowed.']);
        }
        return response(['message' => 'floor plan 3d data store in session','data'=> $create_array]);
    }
    public function edit_3d_sale_image(Request $request){
        $params = $request->input();
        $allData = Session::get('session_3d_data');
        $index = array_search($params['session_index_id'], array_column($allData, 'input_image_id'));
        $particularData = $allData[$index];

        $inputted_file_value = $request->file('input_file');
        if ($inputted_file_value) {
            $validation_rule = 'required|image|mimes:jpg,webp,png';
            $validator = Validator::make($request->all(),[
                'input_file' => $validation_rule,
            ]);
            if($validator->passes()){
                $getsize = $inputted_file_value->getSize();
                if($getsize >= 2097152){
                    return response(['code' => 400, 'message' => 'Floor plan 3D file size exceeds.']);
                }else{
                    /*--- UNLINK IMAGE ---*/
                    $old_image = $particularData['input_file'];
                    $path = public_path('admin-panel/assets/property-images/floor-plan-3D/sale/' . $old_image);
                    if (file_exists($path))
                        unlink($path);

                    $floorPlan3DName = time() . '.' . $inputted_file_value->getClientOriginalExtension();
                    $inputted_file_value->move(public_path('admin-panel/assets/property-images/floor-plan-3D/sale/'), $floorPlan3DName);
                }
            }else{
                return response(['code' => 404, 'message' => 'Only png, jpg and webp file types are allowed.']);
            }

        } else {
            $floorPlan3DName = $particularData['input_file'];
        }
        $allData[$index] = [
            'input_image_id' => $params['session_index_id'],
            'input_file' => $floorPlan3DName,
            'input_bedrooms' => $params['input_bedrooms'],
            'input_bathrooms' => $params['input_bathrooms'],
            'input_sqft' => $params['input_sqft'],
        ];

        Session::remove('session_3d_data');
        Session::put('session_3d_data', $allData);

        return response(['message' => 'floor plan 3d edit data store in session','data'=> $allData[$index]]);
    }
    public function destroy_3d_sale_floor_plan(Request $request){
        $sessionData = Session::get('session_3d_data');
        $id = $request->input('deleted_id');
        unset($sessionData[array_search($id, array_column($sessionData, 'input_image_id'))]);

        $sessionData = array_values($sessionData);
        $array = [];
        if($sessionData){
            foreach ($sessionData as $key => $row) {
                $row['input_image_id'] = $key+1;
                $array[] = $row;
            }
        }

        Session::remove('session_3d_data');
        Session::put('session_3d_data', $array);
        return ['code' => 200, 'message' => 'Item successfully removed.'];
    }
    //UPLOAD MEDIA-FILE USING AJAX
    public function save_media_file(Request $request){
        $file = $request->file('file');
        //GET MIME TYPE
        $mediaType = $file->getMimeType();
        //GET SIZE
        $getMediaSize = $file->getSize();
        if($getMediaSize >= 2097152){
            //ERROR MESSAGE
            return ['code' => 404, 'message' => 'Error! Media file size exceeds.'];
        }
        //CHECK VALIDATION
//        $validation_rule = ($mediaType == 'application/pdf') ? 'required|mimes:pdf' : 'required|image|mimes:jpg,webp,png|max:2048';
        $validation_rule = 'required|image|mimes:jpg,webp,png';
        $validator = Validator::make($request->all(), [
            'file' => $validation_rule,
        ]);
        if ($validator->passes())
        {
            //PERFORM DATABASE OPERATION
            $propertyMedia = new PropertyMedia();
            $mediaName = time() . '.' . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('admin-panel/assets/property-images/media-file/sale/'), $mediaName);
            $width = 910; $height = 622;
            $canvas = Image::canvas($width, $height);
            $image = Image::make(public_path('admin-panel/assets/property-images/media-file/sale/'.$mediaName))->resize($width, $height,
                function ($constraint) {
                    $constraint->aspectRatio();
                });
            $canvas->insert($image, 'center');
            $canvas->save(public_path('admin-panel/assets/property-images/media-file/sale/'.$mediaName));

            $propertyMedia->property_id = '0';
            $propertyMedia->media_name = $mediaName;
            //CHECK MIME-TYPE
            if($mediaType == 'image/png' || $mediaType == 'image/jpeg' || $mediaType == 'image/webp'){
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
            return ['code' => 500, 'message' => 'Error! only png, jpg and webp file types are allowed.'];
        }
    }
    //DELETE MEDIA-FILE USING AJAX
    public function delete_media_file(Request $request) {
        $image_id       = $request->input('image_id');
        $propertyMedia  = PropertyMedia::find($image_id);
        $propertyType = Property::query()->find($propertyMedia->property_id);
        if(!empty($propertyMedia->media_name)) {
            if(!empty($propertyType['property_type'])){
                if ($propertyType['property_type'] == 'sale') {
                    $path1 = public_path('admin-panel/assets/property-images/media-file/sale/'.  $propertyMedia->media_name);
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
    //LIST SALE PROPERTY PAGE
    public function listSaleProperty(){
        if(Session::has('media_name')){
            Session::remove('media_name');
        }
        if(Session::has('session_data')) {
            Session::remove('session_data');
        }
        if(Session::has('session_3d_data')) {
            Session::remove('session_3d_data');
        }
        $sale_property = Property::query()->where('property_type','=','sale')->where('internal_status','=','1')->orderBy('id','desc')
            ->with(['property_media', 'agent_details','cat_details'])->get()->toArray();
        return view('admin.pages.sale-property.list-sale-property',compact('sale_property'));
    }
    //EDIT SALE PROPERTY DATA
    public function editSaleProperty($propertyId){
        Session::forget('media_name');

        $salePropertyData = Property::query()->where('id','=',$propertyId)->get();
        //$salePropertyData[0]['property_media'];
        //GET MEDIA DATA
        if(!empty($propertyId))
            $getMedia = DB::table('property_media')
                ->select('id', 'media_name', 'media_type', 'property_id')->where('property_id', $propertyId)->get();
        //$getMedia[0]->property_id;
        //plan 2d images
        $f_plan_2d = DB::table('floor_plan2s')->where('property_id','=',$propertyId)->get();
        $f_plan_3d = DB::table('floor_plan3s')->where('property_id','=',$propertyId)->get();
        //GET AMENITIES DATA
        $checkBoxValue = Amenities::all();
        //GET AGENT DATA
        $agentData = Agent::all();
        //get all country data
        $countries = Country::all();
        //get all state data
        $stateData = State::all();
        $allCategory = Category::all();
        return view('admin.pages.sale-property.edit-sale-property',compact('salePropertyData','getMedia','checkBoxValue','agentData','countries','stateData',
            'f_plan_2d','f_plan_3d','allCategory'));
    }
    //UPDATE SALE-PROPERTY DATA
    public function updateSaleProperty(Request $request,$propertyId){
        //check validation
        $rules = [
//            'title' => 'required',
            'description' => 'required',
            'address' => 'required',
        ];
        $getMedia = PropertyMedia::query()->select('id')->where('property_id',$propertyId)->get()->toArray();
        if(!$getMedia) {
            $rules = array_merge($rules, ['media_name'   => 'required|image|mimes:jpg,webp,png|max:2048',]);
        }
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails())
        {
            return redirect('/admin/edit-sale-property/'.$propertyId)->withErrors($validator)->withInput();
        }else {
            //STORE MULTIPLE AMENITIES DATA
            $checkBoxValue = $request->get('amenities');
            $checkArray = array();
            if ($checkBoxValue) {
                foreach ($checkBoxValue as $checkValue) {
                    $checkArray[] = $checkValue;
                }
            }

            //embed video id
            if($request->input('embed_video_id')){
                $videoType = $request->input('video_from');
                $videoId = $request->input('embed_video_id');
                if($videoId){
                    if($videoType == 'vimeo'){
                        $link_1 = parse_url(url($videoId));
                        if($link_1['host'] == 'player.vimeo.com'){
                            Property::query()->where('id', $propertyId)->update(array('embed_video_id' => $videoId));
                        }else{
                            $convertedURL = str_replace("vimeo.com", "player.vimeo.com/video", $videoId);
                            Property::query()->where('id', $propertyId)->update(array('embed_video_id' => $convertedURL));
                        }

                    }else{
                        $link_2 = parse_url(url($videoId));
                        if($link_2['path'] == '/watch'){
                            $convertedURL = str_replace("watch?v=","embed/",$videoId);
                            Property::query()->where('id',$propertyId)->update(array('embed_video_id' => $convertedURL));
                        } else{
                            Property::query()->where('id',$propertyId)->update(array('embed_video_id' => $videoId));
                        }
                    }
                }
            }
            //PERFORM DATABASE OPERATION
            DB::table('properties')
                ->where('id', $propertyId)
                ->update(array('title' => $request->get('title'),
                    'description' => $request->get('description'),
                    'price'                        => number_format((int) $request->get('price'),2,'.',','),
                    'after_price_label'            => $request->get('after_price_label'),
                    'before_price_label'           => $request->get('before_price_label'),
                    'category' => $request->get('category'),
                    'listed_in' => $request->get('listed_in'),
                    'address' => $request->get('address'),
                    'city' => $request->get('city'),
                    'neighborhood' => $request->get('neighborhood'),
                    'zip' => $request->get('zip'),
                    'country_state' => $request->get('state'),
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
                    'roofing' => $request->get('roofing'),
                    'floors_no' => $request->get('floors_no'),
                    'structure_type' => $request->get('structure_type'),
                    'owner_agent_note' => $request->get('owner_agent_note'),
                    'property_status' => $request->get('property_status'),
                    'agent_id' => $request->get('agent'),
                    'amenities_feature' => ($checkArray) ? implode(',', $checkArray) : 0,
                    'video_from' => $request->get('video_from'),
                    'virtual_tour' => $request->get('virtual_tour'),
                    'most_recent_upload' => '1'
                ));
            $request->session()->put('property_id',$propertyId);
            //update new floor-plan-2d image
            if(Session::has('session_data')){
                $_2d_floor_section_session = Session::get('session_data');
                $_2d_insert_array = [];
                foreach($_2d_floor_section_session as $_2d_row) {
                    $_2d_insert_array[] = [
                        'property_id'    => $_2d_row['input_property_id'],
                        'images'         => $_2d_row['input_file'],
                        'no_of_bedrooms' => $_2d_row['input_bedrooms'],
                        'no_of_bathrooms'=> $_2d_row['input_bathrooms'],
                        'sqft'           => $_2d_row['input_sqft'],
                    ];
                }
                if($_2d_insert_array) {
                    FloorPlan2::query()->insert($_2d_insert_array);
                    Session::remove('session_data');
                }
            }
            //update new floor-plan-3d image
            if(Session::has('session_3d_data')){
                $_3d_floor_section_session = Session::get('session_3d_data');
                $_3d_insert_array = [];
                foreach($_3d_floor_section_session as $_3d_row) {
                    $_3d_insert_array[] = [
                        'property_id'    => $_3d_row['input_property_id'],
                        'images'         => $_3d_row['input_file'],
                        'no_of_bedrooms' => $_3d_row['input_bedrooms'],
                        'no_of_bathrooms'=> $_3d_row['input_bathrooms'],
                        'sqft'           => $_3d_row['input_sqft'],
                    ];
                }
                if($_3d_insert_array) {
                    FloorPlan3::query()->insert($_3d_insert_array);
                    Session::remove('session_3d_data');
                }
            }
        }
        return redirect('/admin/list-sale-property')->with('success','Success! Property updated.');
    }
    //UPLOAD SALE MEDIA-FILE USING AJAX
    public function updateSaleMediaFile(Request $request){
        $file = $request->file('file');
        //GET MIME TYPE
        $mediaType = $file->getMimeType();
        //GET SIZE
        $getMediaSize = $file->getSize();
        if($getMediaSize >= 2097152){
            //ERROR MESSAGE
            return ['code' => 404, 'message' => 'Error! Media file size exceeds.'];
        }
        //CHECK VALIDATION
//        $validation_rule = ($mediaType == 'application/pdf') ? 'required|mimes:pdf|max:2048' : 'required|image|mimes:jpg,webp,png|max:2048';
        $validation_rule = 'required|image|mimes:jpg,webp,png';
        $validator = Validator::make($request->all(), [
            'file' => $validation_rule,
        ]);
        if ($validator->passes()) {
            //PERFORM DATABASE OPERATION
            $propertyID = $request->input('image_id');
            $propertySource = Property::query()->find($propertyID);
            $propertyMediaData = PropertyMedia::query()->where('property_id', '=', $propertyID)->first();
            if (empty($propertyMediaData)) {
                $propertyMedia = new PropertyMedia();
                $mediaName = time() . '.' . $request->file->getClientOriginalExtension();
                if($propertySource['source'] == 'Admin'){
                    $request->file->move(public_path('admin-panel/assets/property-images/media-file/sale/'), $mediaName);
                    $width = 910; $height = 622;
                    $canvas = Image::canvas($width, $height);
                    $image = Image::make(public_path('admin-panel/assets/property-images/media-file/sale/'.$mediaName))->resize($width, $height,
                        function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    $canvas->insert($image, 'center');
                    $canvas->save(public_path('admin-panel/assets/property-images/media-file/sale/'.$mediaName));
                } else {
                    $mediaName = time() . '.' . $request->file->getClientOriginalExtension();
                    $request->file->move(public_path('frontend/assets/property-images/media-file/sale/'), $mediaName);
                    $width = 910; $height = 622;
                    $canvas = Image::canvas($width, $height);
                    $image = Image::make(public_path('frontend/assets/property-images/media-file/sale/'.$mediaName))->resize($width, $height,
                        function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    $canvas->insert($image, 'center');
                    $canvas->save(public_path('frontend/assets/property-images/media-file/sale/'.$mediaName));
                }
                $propertyMedia->property_id = $propertyID;
                $propertyMedia->media_name = $mediaName;
                //CHECK MIME-TYPE
                if ($mediaType == 'image/png' || $mediaType == 'image/jpeg' || $mediaType == 'image/webp') {
                    //for image file
                    $propertyMedia->media_type = 'image';
                }
                if ($mediaType == 'application/pdf') {
                    //for pdf file
                    $propertyMedia->media_type = 'pdf';
                }
                $propertyMedia->save();

                //SELECTED MEDIA PREVIEW AFTER SELECT MEDIA USING AJAX
                $session_image_id = $request->session()->get('media_name');
                $images_ids = ($session_image_id) ? $session_image_id : [];
                $images_ids[] = [
                    'id' => $propertyMedia->id,
                    'name' => $propertyMedia->media_name,
                    'type' => $propertyMedia->media_type
                ];
                //CREATE MEDIA SESSION
                $request->session()->put('media_name', $images_ids);
                //GET MEDIA-ID
                $request->session()->put('media_id', $propertyMedia->id);
                /*--- GET LAST STORE SESSION INDEX ---*/
                $imageSession = $request->session()->get('media_name');
                $propertyMedia->session_key = array_search($propertyMedia->id, array_column($imageSession, 'id'));
                //MEDIA SESSION DESTROY
                if ($request->session()->has('media_name')) {
                    $request->session()->remove('media_name');
                }
                //pass user id to ajax
//                $propertyMedia['user_id'] = $propertyData[0]->user_id;
                $propertyMedia['source'] = $propertySource['source'];
            }else{
                //return 'property id is available in media table';
                //$propertyMediaData = PropertyMedia::query()->where('property_id', '=', $propertyID)->first();
                $propertySource =  Property::query()->find($propertyID);
                $propertyMedia = new PropertyMedia();
                $mediaName = time() . '.' . $request->file->getClientOriginalExtension();
                if($propertySource['source'] == 'Admin'){
                    $request->file->move(public_path('admin-panel/assets/property-images/media-file/sale/'), $mediaName);
                    $width = 910; $height = 622;
                    $canvas = Image::canvas($width, $height);
                    $image = Image::make(public_path('admin-panel/assets/property-images/media-file/sale/'.$mediaName))->resize($width, $height,
                        function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    $canvas->insert($image, 'center');
                    $canvas->save(public_path('admin-panel/assets/property-images/media-file/sale/'.$mediaName));
                }else{
                    $request->file->move(public_path('frontend/assets/property-images/media-file/'), $mediaName);
                    $width = 910; $height = 622;
                    $canvas = Image::canvas($width, $height);
                    $image = Image::make(public_path('frontend/assets/property-images/media-file/sale/'.$mediaName))->resize($width, $height,
                        function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    $canvas->insert($image, 'center');
                    $canvas->save(public_path('frontend/assets/property-images/media-file/sale/'.$mediaName));
                }
                $propertyMedia->property_id = $propertyID;
                $propertyMedia->media_name = $mediaName;
                //CHECK MIME-TYPE
                if($mediaType == 'image/png' || $mediaType == 'image/jpeg' || $mediaType == 'image/webp'){
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
                $propertyMedia['source'] = $propertySource['source'];
            }
            //SUCCESS MESSAGE
            return ['code' => 200, 'message' => 'Success! Media uploaded.', 'data' => $propertyMedia];
        }else{
            //ERROR MESSAGE
            return ['code' => 500, 'message' => 'Error! only png, jpg and webp file types are allowed.'];
        }
    }
    //DELETE MEDIA-FILE USING AJAX
    public function destroySaleMediaFile(Request $request) {
        $image_id = $request->input('image_id');

        $propertyData   = PropertyMedia::query()->where('id','=',$image_id)->with('property_details')->first();
        $user_id        = $propertyData['property_details']['user_id'];

        if(Auth::guard('admin')->user()->id == $user_id) {
            unlink(public_path('admin-panel/assets/property-images/media-file/sale/'.$propertyData->media_name));
        } else {
            unlink(public_path('frontend/assets/property-images/media-file/'.$propertyData->media_name));
        }

        PropertyMedia::query()->where('id', '=', $image_id)->delete();
        return ['code' => 200, 'message' => 'Success! Media deleted.'];
    }
    //delete sale property
    public function destroySaleProperty($propertyId){
        $salePropertyData = Property::findOrFail($propertyId);
        $salePropertyData->delete();
        return redirect('/admin/list-sale-property')->with('success', 'Success! Property Deleted.');
    }
    //update sale property
    public function salepropertyStatus($statusId)
    {
        $propertyStatus = Property::where('id',$statusId)->pluck('internal_status');
        if($propertyStatus[0] == 1)
        {
            $update = array('internal_status' => 2);
            DB::table('properties')->where('id', $statusId)->update($update);
            return redirect('/admin/list-sale-property')->with('success','Success! Property Deleted.');
        }else{
            $update = array('internal_status' => 1);
            DB::table('properties')->where('id', $statusId)->update($update);
            return redirect('/admin/list-sale-property')->with('success','Success! Property now approved.');
        }
        return redirect()->back();
    }
    //ALL SALE PROPERTY
    public function all_sale(){
        $all_sale_property = Property::query()->where('property_type','=','sale')->where('internal_status','!=','0')->orderBy('id','desc')->with('cat_details')->get();
        return view('admin.pages.sale-property.all-sale-property',compact('all_sale_property'));
    }
    //ALL Approve SALE PROPERTY
    public function all_approve_sale(){
        $approve_sale_property = Property::query()->where('property_type','=','sale')->where('internal_status','=','1')->orderBy('id','desc')->with('cat_details')->get();
        return view('admin.pages.sale-property.approve-sale-property',compact('approve_sale_property'));
    }
    //ALL Deleted SALE PROPERTY
    public function all_deleted_sale(){
        $deleted_sale_property = Property::query()->where('property_type','=','sale')->where('internal_status','=','2')->orderBy('id', 'desc')->with('cat_details')->get();
        return view('admin.pages.sale-property.deleted-sale-property',compact('deleted_sale_property'));
    }
    //del plan-2d-images edit form
    public function destroy_sale_plan_2d_image(Request $request){
        $image_id = $request->get('image_id');
        //return $image_id;exit();
        $imageData = FloorPlan2::query()->where('id', $image_id)->first();
        if($imageData) {
            $file = public_path('admin-panel/assets/property-images/floor-plan-2D/sale/'. $imageData->images);
            if(file_exists($file))
                unlink($file);
        }
        FloorPlan2::query()->where('id', $image_id)->delete();
        return ['code' => 200, 'message' => 'floor 2d plan image Deleted'];
    }
    //del plan-3d-images edit form
    public function destroy_sale_plan_3d_image(Request $request){
        $image_p_id = $request->get('image_p_id');
        $image3D_data = FloorPlan3::query()->where('id',$image_p_id)->first();
        if($image3D_data) {
            $file = public_path('admin-panel/assets/property-images/floor-plan-3D/sale/'. $image3D_data->images);
            if(file_exists($file))
                unlink($file);
        }
        FloorPlan3::query()->where('id', $image_p_id)->delete();
        return ['code' => 200, 'message' => 'floor 3d plan image Deleted'];
    }
    //DELETE FLOOR PLAN 2D WITH PROPERTY ID
    public function del_f_2d_sale_plan_p_id($property_id){
        $getAllSelectedPlan = FloorPlan2::query()->where('property_id','=',$property_id)->get();
        $check_f_2d_id_with_type = Property::query()->where('id','=',$getAllSelectedPlan[0]->property_id)->get();
        if(!empty($check_f_2d_id_with_type[0]->property_type)){
            if($check_f_2d_id_with_type[0]->property_type == 'sale'){
                $path1 = public_path('admin-panel/assets/property-images/floor-plan-2D/sale/'. $getAllSelectedPlan[0]->images);
                if(file_exists($path1)) unlink($path1);
            }
        }
        DB::table('floor_plan2s')->where('id', '=', $getAllSelectedPlan[0]->id)->delete();
        return redirect('/admin/edit-sale-property/'.$property_id)->with('success','Success! Floor Plan 2d deleted.');
    }
    public function del_f_3d_sale_plan_with_p_id($property_id){
        $getAllSelectedPlan = FloorPlan3::query()->where('property_id','=',$property_id)->get();
        $check_f_3d_id_with_type = Property::query()->where('id','=',$getAllSelectedPlan[0]->property_id)->get();
        if(!empty($check_f_3d_id_with_type[0]->property_type)){
            if($check_f_3d_id_with_type[0]->property_type == 'sale'){
                $path1 = public_path('admin-panel/assets/property-images/floor-plan-3D/sale/'. $getAllSelectedPlan[0]->images);
                if(file_exists($path1)) unlink($path1);
            }
        }
        DB::table('floor_plan3s')->where('id', '=', $getAllSelectedPlan[0]->id)->delete();
        return redirect('/admin/edit-sale-property/'.$property_id)->with('success','Success! Floor Plan 3d deleted.');
    }

    //UPDATE FLOO PLAN WITH PROPERTY ID
    public function edit_f_2d_sale_plan_with_p_id(Request $request){
        //CHECK VALIDATION
        $validation_rule = 'required|image|mimes:jpg,webp,png';
        $validator = Validator::make($request->all(), [
            'input_file' => $validation_rule,
        ]);
        if ($validator->passes()) {
            $inputted_file_value = $request->file('input_file');
            $getsize = $inputted_file_value->getSize();
            if($getsize > 2097152) {
                return response(['code' => 400, 'message' => 'Floor plan 2D file size exceeds.']);
            }else{
//                $if_exists = FloorPlan2::query()->where('property_id',$request->get('input_property_id'))->get();
//                if($if_exists->count() == 0){
                $inputted_file_value = $request->file('input_file');
                $floorPlan2DName = time() . '.' . $inputted_file_value->getClientOriginalExtension();
                $inputted_file_value->move(public_path('admin-panel/assets/property-images/floor-plan-2D/sale/'), $floorPlan2DName);

                $_2d_section_session = Session::get('session_data');
                $create_array = [
                    'input_image_id' => $request->get('input_image_id'),
                    'input_file' => $floorPlan2DName,
                    'input_bedrooms' => $request->get('input_bedrooms'),
                    'input_bathrooms' => $request->get('input_bathrooms'),
                    'input_sqft' => $request->get('input_sqft'),
                    'input_property_id' => $request->get('input_property_id'),
                ];

                $array = [];
                if ($_2d_section_session) {
                    foreach ($_2d_section_session as $row) {
                        $array[] = $row;
                    }
//                        $count_array = count($array);
//                        if($count_array <= 1){
//                            return response(['code' => 201, 'message' => 'Error! You can not upload more than one floor plan.']);
//                        }
                }
                $array[] = $create_array;

                Session::remove('session_data');
                Session::put('session_data', $array);
//                }else{
//                    return response(['code' => 200, 'message' => 'Error! Floor plan already exists!']);
//                }

            }
        }else{
            return response(['code' => 404 ,'message' => 'Only png, jpg and webp file types are allowed.']);
        }
        return response(['message' => 'floor plan 2d data store in session','data'=> $create_array]);

    }
    public function edit_f_3d_sale_plan_with_p_id(Request $request){
        //CHECK VALIDATION
        $validation_rule = 'required|image|mimes:jpg,webp,png';
        $validator = Validator::make($request->all(), [
            'input_file' => $validation_rule,
        ]);
        if ($validator->passes()) {
            $inputted_file_value = $request->file('input_file');
            $getsize = $inputted_file_value->getSize();
            if($getsize > 2097152) {
                return response(['code' => 400, 'message' => 'Floor plan 3D file size exceeds.']);
            }else{
//                $if_exists = FloorPlan3::query()->where('property_id',$request->get('input_property_id'))->get();
//
//                if($if_exists->count() == 0){
                $inputted_file_value = $request->file('input_file');
                $floorPlan2DName = time() . '.' . $inputted_file_value->getClientOriginalExtension();
                $inputted_file_value->move(public_path('admin-panel/assets/property-images/floor-plan-3D/sale/'), $floorPlan2DName);

                $_3d_section_session = Session::get('session_3d_data');
                $create_array = [
                    'input_image_id' => $request->get('input_image_id'),
                    'input_file' => $floorPlan2DName,
                    'input_bedrooms' => $request->get('input_bedrooms'),
                    'input_bathrooms' => $request->get('input_bathrooms'),
                    'input_property_id' => $request->get('input_property_id'),
                    'input_sqft' => $request->get('input_sqft'),
                ];

                $array = [];
                if ($_3d_section_session) {
                    foreach ($_3d_section_session as $row) {
                        $array[] = $row;
                    }
//                        $count_array = count($array);
//                        if($count_array <= 1){
//                            return response(['code' => 201, 'message' => 'Error! You can not upload more than one floor plan.']);
//                        }
                }
                $array[] = $create_array;

                Session::remove('session_3d_data');
                Session::put('session_3d_data', $array);
//                }else{
//                    return response(['code' => 200, 'message' => 'Error! Floor plan already exists!']);
//                }
            }
        }else{
            return response(['code' => 404 ,'message' => 'Only png, jpg and webp file types are allowed.']);
        }
        return response(['message' => 'floor plan 3d data store in session','data'=> $create_array]);
    }
}
