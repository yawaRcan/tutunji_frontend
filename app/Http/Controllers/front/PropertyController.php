<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\admin\NewsletterController;
use App\Http\Controllers\Controller;
use App\Mail\adminMail;
use App\Mail\AgentMail;
use App\Mail\sendMail;
use App\Models\Agent;
use App\Models\Amenities;
use App\Models\Banner1;
use App\Models\Banner2;
use App\Models\Banner3;
use App\Models\Banner4;
use App\Models\Banner6;
use App\Models\Banner7;
use App\Models\Category;
use App\Models\Country;
use App\Models\Favourite;
use App\Models\FloorPlan2;
use App\Models\FloorPlan3;
use App\Models\Inquiry;
use App\Models\Property;
use App\Models\PropertyMedia;
use App\Models\State;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\In;
use Intervention\Image\Facades\Image;

class PropertyController extends Controller
{
    //SUBMIT-PROPERTY PAGE
    public function addPropertyData(){
        if(Auth::check()){
            $amenitiesData = Amenities::all();
            $agentData = Agent::all();
            $countries = Country::all();
            return view('frontend.pages.property.submit-property',compact('amenitiesData','agentData','countries'));
        }else{
            return redirect('/coming-soon');
        }
    }
    //STORE SUBMIT-PROPERTY DATA
    public function storePropertyData(Request $request)
    {
        ini_set('max_execution_time', 3600);
        if(Auth::check()){
            $details = [
                'username'  =>Auth::user()->name,
                "body"  => "Test mail"
            ];
            //check validation
            $validation_rules = [
//                'propertyTitle' => 'required',
                'propertyDescription' => 'required',
                'propertyAddress' => 'required',
                'propertyMedia' => 'required|mimes:jpg,jpeg,png,pdf',
            ];

            if($request->session()->has('media_name'))
                unset($validation_rules['propertyMedia']);

            $validator = Validator::make($request->all(),$validation_rules);
            if ($validator->fails())
            {
                $messages = $validator->messages();
                //this validation message show when file uploaded
                if ($messages->has('propertyMedia')) {
                    return redirect('/submit-property')->withErrors($validator)->withInput();
                    //$request->session()->destroy('media_name');
                }
                return redirect('/submit-property')->withErrors($validator)->withInput();

            }else{

                //add-property without checked checkbox
                $checkBoxValue = $request->get('propertyAmenities');
                $checkArray = array();
                if($checkBoxValue) {
                    foreach($checkBoxValue as $checkValue){
                        $checkArray[] = $checkValue;
                    }
                }

                //embed video id
                $videoType = $request->get('propertyVideoFrom');
                if($videoType == 'vimeo'){
                    $videoURL = $request->get('propertyEmbedVideoId');
                    $convertedURL = str_replace("vimeo.com","player.vimeo.com/video",$videoURL);

                }else{
                    $videoURL = $request->get('propertyEmbedVideoId');
                    $convertedURL = str_replace("watch?v=","embed/",$videoURL);
                }

//                $amount = $request->get('price');
//                setlocale(LC_MONETARY, 'en_CA');
//                $amount = number_format('%!i', $amount,'.');
//                $currencies['CAD'] = array(2,'.',',');
//                echo $amount;

                //Get current loggedIn userId
                $user_id = Auth::user()->id;
                $propertyDetail = new Property(array(
                    'title' => $request->get('propertyTitle'),
                    'description' => $request->get('propertyDescription'),
                    'price' => number_format((int) $request->get('propertyPriceIn'),2,'.',','),
                    'after_price_label' => number_format((int) $request->get('propertyAfterPrice'),2,'.',','),
                    'before_price_label' => number_format((int) $request->get('propertyBeforePrice'),2,'.',','),
                    'category' => $request->get('propertyCategory'),
                    'listed_in' => $request->get('propertyListedIn'),
                    'address' => $request->get('propertyAddress'),
                    'city' => $request->get('propertyCity'),
                    'neighborhood' => $request->get('propertyNeighborhood'),
                    'zip' => $request->get('propertyZip'),
                    'country_state' => $request->get('propertyCountryState'),
                    'country' => $request->get('propertyCountry'),
                    'latitude' => $request->get('latitude'),
                    'longitude' => $request->get('longitude'),
                    'enable_google_street_view' => $request->get('enableGoogleStreetView'),
                    'google_street_view' => $request->get('propertyGoogleStreetView'),
                    'size_in_ft2' => $request->get('propertySizeInFt2'),
                    'lot_size_in_ft2' => $request->get('propertyLotSizeInFt2'),
                    'rooms' => $request->get('propertyRooms'),
                    'bedrooms' => $request->get('propertyBedrooms'),
                    'bathrooms' => $request->get('propertyBathrooms'),
                    'custom_id' => $request->get('propertyCustomId'),
                    'year_built' => $request->get('propertyYearBuilt'),
                    'garages' => $request->get('propertyGarages'),
                    'available_from' => ($request->get('propertyAvailableFromDate')) ?  date('Y-m-d', strtotime($request->get('propertyAvailableFromDate'))) : null,
                    'garage_size' => $request->get('propertyGarageSize'),
                    'external_construction' => $request->get('propertyExternalConstruction'),
                    'basement' => $request->get('propertyBasement'),
                    'exterior_material' => $request->get('propertyExteriorMaterial'),
                    'floor_plan_2D' =>0,
                    'floor_plan_3D' => 0,
                    'roofing' => $request->get('propertyRoofing'),
                    'floors_no' => $request->get('propertyFloorNo'),
                    'structure_type' => $request->get('propertyStructureType'),
                    'owner_agent_note' => $request->get('propertyOwnerAgentNotes'),
                    'property_status' => $request->get('propertyStatus'),
                    'agent_id' => $request->get('agent'),
                    'amenities_feature' => ($checkArray) ? implode(',', $checkArray) : 0,
                    'video_from' => $request->get('propertyVideoFrom'),
                    'embed_video_id' => $convertedURL,
                    'virtual_tour' => $request->get('propertyVirtualTour'),
                    'subunits' => 'test',
                    'user_id' => $user_id,
                    'created_time' =>date('H:i:s'),
                    'property_type' => 'sale',
                    'internal_status' => '0',
                    'source'    => 'Frontend',
                    'created_date' => today(),
                    'most_recent_upload' => '1'
                ));
                //for client
                Mail::to($request->session()->get('email'))->send(new SendMail($details));
                //for admin
                Mail::to('test.a0775@gmail.com')->send(new adminMail($propertyDetail));
                $propertyDetail->save();
                $property_id = $propertyDetail->id;

                //add floor plan 2d image
                if($request->hasfile('btnFloor2D'))
                {
                    $files = $request->file('btnFloor2D');
                    foreach( $files as $image2d)
                    {

                        $imageName2d='fp-2D'.'-'.time().$image2d->getClientOriginalName();
                        $request['property_id'] = $property_id;
                        $request['images'] = $imageName2d;
                        $image2d->move(public_path('frontend/assets/property-images/floor-plan-2D'), $imageName2d);
                        FloorPlan2::create($request->all());
                    }
                }
                //add floor plan 3d image
                if($request->hasfile('btnFloor3D'))
                {
                    $files = $request->file('btnFloor3D');
                    foreach( $files as $image3d)
                    {
                        $imageName3d='fp-3D'.'-'.time().$image3d->getClientOriginalName();
                        $request['property_id'] = $property_id;
                        $request['images'] = $imageName3d;
                        //return public_path('frontend/assets/property-images/floor-plan-3D/');
                        $image3d->move(public_path('frontend/assets/property-images/floor-plan-3D/'), $imageName3d);
                        FloorPlan3::create($request->all());
                    }
                }
                //update property_id only for session image stored
                foreach ($request->session()->get('media_name') as $image_obj) {
                    PropertyMedia::query()->where('id', $image_obj['id'])->update([
                        'property_id' => $property_id
                    ]);
                }
                //SESSION DESTROY
                if($request->session()->has('media_name')){
                    $request->session()->remove('media_name');
                }
                $request->session()->put('property_id',$propertyDetail->id);
            }
            return redirect('/my-properties')->with('success','Property Submitted.');
        }else{
            return redirect('/coming-soon');
        }
    }
    //UPLOAD MEDIA-FILE USING AJAX
    public function savePropertyMediaFile(Request $request){
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
            $img = Image::make($file->getRealPath())->heighten(622);
            $img->save(public_path('frontend/assets/property-images/media-file/'.$mediaName));

//            $destinationPath = public_path('/frontend/assets/property-images/media-file/');
//            $resize_image = Image::make($file->getRealPath());
//            $resize_image->resize(910, 622)->save($destinationPath . '/' . $mediaName);


//            $request->file->move(public_path('frontend/assets/property-images/media-file/'), $mediaName);

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
            return ['code' => 200, 'message' => 'Media Uploaded.', 'data' => $propertyMedia];
        }else{
            //error-message
            return ['code' => 500, 'message' => 'You select Invalid File Format.'];
        }
    }
    //DELETE MEDIA-FILE USING AJAX
    public function destroyPropertyMedia(Request $request) {
        $image_id       = $request->input('image_id');
        $propertyMedia  = PropertyMedia::find($image_id);
        if(!empty($propertyMedia->media_name)) {

            $path = public_path('frontend/assets/property-images/media-file/'.  $propertyMedia->media_name);
            if(file_exists($path)) unlink($path);

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
        return ['code' => 200, 'message' => 'Media Deleted'];
    }
    //EDIT PROPERTY PAGE
    public function edit_property($propertyId){
        //return $propertyId;
        //GET PROPERTY DATA
        $propertyData = DB::table('properties')
            ->where('id','=',$propertyId)
            ->get();

        //$plan_2d = $propertyData[0]->floor_plan_2D;
//        $plan_3d = $propertyData[0]->floor_plan_3D;
//        return $getAllImages = collect($plan_2d)->implode(',');
        //GET MEDIA DATA
        $getMedia = DB::table('property_media')
            ->select('id','media_name','media_type')
            ->where('property_id',$propertyId)->get();
        //plan 2d images
        $get2d_images = DB::table('floor_plan2s')->select('id','images')->where('property_id',$propertyId)->get();
        //plan 3d images
        $get3d_images = DB::table('floor_plan3s')->select('id','images')->where('property_id',$propertyId)->get();
        //$get_floor_plan_2d_image[0]->images;
        //GET AMENITIES DATA
        $amenitiesData = Amenities::all();
        //get all country data
        $countries = Country::all();
        //get all state data
        $stateData = State::all();
        $agentData = Agent::all();
        return view('frontend.pages.property.edit-property',compact('propertyData','getMedia','amenitiesData','countries','stateData','agentData','get2d_images','get3d_images'));
    }
    //UPDATE PROPERTY
    public function update_property(Request $request,$propertyId){
        //CHECK VALIDATION
        $rules = [
//            'propertyTitle' => 'required',
            'propertyDescription' => 'required',
            'propertyAddress' => 'required',
        ];
        $getMedia = PropertyMedia::query()->select('id')->where('property_id',$propertyId)->get()->toArray();
        if(!$getMedia) {
            $rules = array_merge($rules, ['propertyMedia' => 'required|mimes:jpg,jpeg,png,pdf']);
        }
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails())
        {
            return redirect('/edit-property/'.$propertyId)->withErrors($validator)->withInput();
        }else {
            //STORE MULTIPLE AMENITIES VALUES
            $checkBoxValue = $request->get('propertyAmenities');
            $checkArray = array();
            if ($checkBoxValue) {
                foreach ($checkBoxValue as $checkValue) {
                    $checkArray[] = $checkValue;
                }
            }
            //embed video id
            $videoType = $request->get('propertyVideoFrom');
            if($videoType == 'vimeo'){
                $videoURL = $request->get('propertyEmbedVideoId');
                $convertedURL = str_replace("vimeo.com","player.vimeo.com/video",$videoURL);

            }else{
                $videoURL = $request->get('propertyEmbedVideoId');
                $convertedURL = str_replace("watch?v=","embed/",$videoURL);
            }
            //embed video id
            if($request->get('embed_video_id')){
                $videoType = $request->get('propertyVideoFrom');
                $videoURL = $request->get('propertyEmbedVideoId');
                if($videoType == 'vimeo'){
                    $embededURL = url('https://vimeo.com');
                    if($videoURL == $embededURL){
                        //return 'embed this url';
                        $convertedURL = str_replace("vimeo.com/", "player.vimeo.com/video/", $videoURL);
                        Property::query()->where('id', $propertyId)->update(array('embed_video_id' => $convertedURL));
                    }else{
//                       return 'do not embed this url';
                        Property::query()->where('id', $propertyId)->update(array('embed_video_id' => $videoURL));
                    }
                } else{
                    $convertedURL = str_replace("watch?v=","embed/",$videoURL);
                    Property::query()->where('id',$propertyId)->update(array('embed_video_id' => $convertedURL));
                }
            }

            //PERFORM DATABASE OPERATION
            DB::table('properties')
                ->where('id', $propertyId)
                ->update(array(
                    'title' => $request->get('propertyTitle'),
                    'description' => $request->get('propertyDescription'),
                    'price' => number_format((int) $request->get('propertyPriceIn'),2,'.',','),
                    'after_price_label' => number_format((int) $request->get('propertyAfterPrice'),2,'.',','),
                    'before_price_label' => number_format((int) $request->get('propertyBeforePrice'),2,'.',','),
                    'category' => $request->get('propertyCategory'),
                    'listed_in' => $request->get('propertyListedIn'),
                    'address' => $request->get('propertyAddress'),
                    'city' => $request->get('propertyCity'),
                    'neighborhood' => $request->get('propertyNeighborhood'),
                    'zip' => $request->get('propertyZip'),
                    'country_state' => $request->get('propertyCountryState'),
                    'country' => $request->get('propertyCountry'),
                    'latitude' => $request->get('latitude'),
                    'longitude' => $request->get('longitude'),
                    'enable_google_street_view' => $request->get('enableGoogleStreetView'),
                    'google_street_view' => $request->get('propertyGoogleStreetView'),
                    'size_in_ft2' => $request->get('propertySizeInFt2'),
                    'lot_size_in_ft2' => $request->get('propertyLotSizeInFt2'),
                    'rooms' => $request->get('propertyRooms'),
                    'bedrooms' => $request->get('propertyBedrooms'),
                    'bathrooms' => $request->get('propertyBathrooms'),
                    'custom_id' => $request->get('propertyCustomId'),
                    'year_built' => $request->get('propertyYearBuilt'),
                    'garages' => $request->get('propertyGarages'),
                    'available_from' => date('Y-m-d', strtotime($request->get('propertyAvailableFromDate'))),
                    'garage_size' => $request->get('propertyGarageSize'),
                    'external_construction' => $request->get('propertyExternalConstruction'),
                    'basement' => $request->get('propertyBasement'),
                    'exterior_material' => $request->get('propertyExteriorMaterial'),
                    'roofing' => $request->get('propertyRoofing'),
                    'floors_no' => $request->get('propertyFloorNo'),
                    'structure_type' => $request->get('propertyStructureType'),
                    'owner_agent_note' => $request->get('propertyOwnerAgentNotes'),
                    'property_status' => $request->get('propertyStatus'),
                    'agent_id' => $request->get('agent'),
                    'amenities_feature' => ($checkArray) ? implode(',', $checkArray) : 0,
                    'video_from' => $request->get('propertyVideoFrom'),
                    'virtual_tour' => $request->get('propertyVirtualTour'),
                ));
            $request->session()->put('property_id',$propertyId);
            //update new floor-plan-2d image
            if($request->hasFile('btnFloor2D')){
                $files = $request->file('btnFloor2D');
                foreach( $files as $image2d)
                {
                    $imageName2d='fp-2D'.'-'.time().$image2d->getClientOriginalName();
                    $request['property_id'] = $propertyId;
                    $request['images'] = $imageName2d;
                    $image2d->move(public_path('frontend/assets/property-images/floor-plan-2D'), $imageName2d);
                    FloorPlan2::create($request->all());
                }
            }
            //update new floor-plan-3d image
            if($request->hasFile('btnFloor3D')){
                $files = $request->file('btnFloor3D');
                foreach( $files as $image3d)
                {
                    $imageName3d='fp-3D'.'-'.time().$image3d->getClientOriginalName();
                    $request['property_id'] = $propertyId;
                    $request['images'] = $imageName3d;
                    $image3d->move(public_path('frontend/assets/property-images/floor-plan-3D'), $imageName3d);
                    FloorPlan3::create($request->all());
//                        $data2d[] = $imageName2d;
                }
            }
        }
        return redirect('/my-properties')->with('success','Property Updated.');
    }
    //UPDATE MEDIA-FILE USING AJAX
    public function updateMediaFile(Request $request){
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
            //print_r($propertyID);exit();
            $propertyType = Property::query()->find($propertyID);
            //create object
            $propertyMedia = new PropertyMedia();
            $mediaName = time() . '.' . $request->file->getClientOriginalExtension();
            $img = Image::make($file->getRealPath())->heighten(622);
            $img->save(public_path('frontend/assets/property-images/media-file/'.$mediaName));
//            $request->file->move(public_path('frontend/assets/property-images/media-file/'), $mediaName);
//            $destinationPath = public_path('frontend/assets/property-images/media-file/');
//            $resize_image = Image::make($file->getRealPath());
//            $resize_image->resize(910, 622)->save($destinationPath . '/' . $mediaName);
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
            return ['code' => 200, 'message' => 'Media Uploaded.', 'data' => $propertyMedia];
        }else{
            //ERROR MESSAGE
            return ['code' => 500, 'message' => 'You have Select Invalid File Format.'];
        }
    }
    //get states
    public function getState(Request $request)
    {
        $data['states'] = State::query()->where("country_id",$request->country_id)
            ->get(["name","id"]);
        return response()->json($data);
    }

    //pre-construction-property page
    public function pre_construct_single($property_id){
      $pre_constructData = Property::query()
          ->where('internal_status','1')
          ->where('id','=',$property_id)->with('multiple_media','fav_data','floor_plan2_images','floor_plan3_images','cat_details')->get();
//      echo '<pre>';
//      print_r($pre_constructData);
//      echo '</pre>';exit();
//        $images = $pre_constructData[0]['multiple_media'];
//        if(isset($images)){
//            return $images[0]['media_name'];
//        }
//        exit();
        //return $pre_constructData;exit();
        $totalPropertyMediaImages = PropertyMedia::query()->where('property_id', $property_id)->count();
        $getBanner_2 = Banner2::query()->where('property_id',$property_id)->get();
        $getBanner_3 = Banner3::query()->where('property_id',$property_id)->get();
        $getBanner_1 = Banner1::query()->where('property_id',$property_id)->get();
        $getBanner_7 = Banner7::query()->where('property_id',$property_id)->get();
        $currentprice = $pre_constructData[0]['price'];
        $twentypercentAmount = $currentprice[0] * 20 / 100;
        $startprice = $currentprice[0] - $twentypercentAmount;
        $endprice = $currentprice[0] + $twentypercentAmount;
        $amenities_feature = explode(',', $pre_constructData[0]['amenities_feature']);
        $amenities = Amenities::query()->select(['id', 'name','icon'])->whereIn('id', $amenities_feature)->get();
        $allPreConstruct = Property::query()->where('property_type','=','pre-construct')->where('internal_status','1')->with('property_media','cat_details')->whereBetween('price', [$startprice, $endprice])->get()->toArray();
        $randomPreConstruct = Property::query()->where('property_type','=','pre-construct')->where('internal_status','1')->where('most_recent_upload','=','1')->take(5)->orderBy('id','DESC')->with('cat_details')->get();
        //return $allPreConstruct[0]['property_media']['media_name'];
        return view('frontend.pages.property.pre-construction-property',compact('pre_constructData', 'amenities','allPreConstruct','randomPreConstruct','totalPropertyMediaImages','getBanner_2','getBanner_3', 'getBanner_1', 'getBanner_7'));
    }
    //pre-construction-property form
    //pre-construction-property form
    public function save_inquiry_form(Request $request,$propertyId){
        //return $propertyId;

//        $validator = Validator::make($request->all(), [
//            'fullNameBox' => 'required|string|max:50',
//            'phoneBox' => 'required|numeric|digits:10',
//            'emailBox' => 'required|email',
//            'selectorBox' => 'required|in:yes,no',
//        ]);
        $rules = array(
            'fullNameBox' => 'required|string|max:50',
            'phoneBox' => 'required|numeric|digits:10',
            'emailBox' => 'required|email:rfc,dns',
            'selectorBox' => 'required|in:yes,no',
        );
        $messages = array(
            'phoneBox.digits' => 'The phone number must be 10 digits long',
            'emailBox.email' => 'Input a valid email address',
        );
        $validator = Validator::make( $request->all(), $rules, $messages );

        if($validator->fails()){
            $validation_error = "";
            foreach ($validator->errors()->getMessages() as $key => $value) {
                $validation_error .= $value[0]."<br>";
            }
            return response()->json(['code' => 400, 'message' => $validation_error]);
        }else{
            $inquiryExist = Inquiry::query()->where('email_address',$request->emailBox)->first();
            if(!$inquiryExist) {
                //return "1";
                /*--- Begin Set session ---*/
                $to_see_floor_plan_property_ids = ($request->session()->has('to_see_floor_plan_property_ids')) ? Session::get('to_see_floor_plan_property_ids') : [];
                $to_see_floor_plan_property_ids = array_merge($to_see_floor_plan_property_ids, [$propertyId]);
                $request->session()->put('to_see_floor_plan_property_ids', $to_see_floor_plan_property_ids);
                /*--- Begin Set session ---*/

                $inquiry = new Inquiry(array(
                    'full_name' => $request->get('fullNameBox'),
                    'property_id' => $propertyId,
                    'user_id' => 0,
                    'phone_number' => $request->get('phoneBox'),
                    'email_address' => $request->get('emailBox'),
                    'broker_or_agent' => $request->get('selectorBox'),
                ));
                $inquiry->save();

                Subscriber::query()->create([
                    'email' => $request->emailBox
                ]);
                return response()->json(['code' => 200, 'message' => 'Registered Successfully', 'session_property_id' => $propertyId]);
            } else if ($inquiryExist['property_id'] == $request->property_idBox) {
                return response()->json(['code' => 404, 'message' => 'Signed Up To project']);
            } else {
                //return "3";
                $checkSecond = Inquiry::query()->where('property_id',$request->property_idBox)
                                                ->where('email_address',$request->emailBox)
                                                ->where('phone_number',$request->phoneBox)
//                                                ->where('full_name',$request->fullNameBox)
                                                ->first();
                if($checkSecond) {
                    return response()->json(['code' => 401, 'message' => 'You have already signed up to this project']);
                } else {
                    /*--- Begin Set session ---*/
                    $to_see_floor_plan_property_ids = ($request->session()->has('to_see_floor_plan_property_ids')) ? Session::get('to_see_floor_plan_property_ids') : [];
                    $to_see_floor_plan_property_ids = array_merge($to_see_floor_plan_property_ids, [$propertyId]);
                    $request->session()->put('to_see_floor_plan_property_ids', $to_see_floor_plan_property_ids);
                    /*--- Begin Set session ---*/
                    $inquiry = new Inquiry(array(
                        'full_name' => $request->get('fullNameBox'),
                        'property_id' => $propertyId,
                        'user_id' => 0,
                        'phone_number' => $request->get('phoneBox'),
                        'email_address' => $request->get('emailBox'),
                        'broker_or_agent' => $request->get('selectorBox'),
                    ));
                    $inquiry->save();
                    return response()->json(['code' => 200, 'message' => 'Registered Successfully','session_property_id' => $propertyId]);
                }
            }

               /* $inquiryExist = Inquiry::query()->where('property_id',$request->property_idBox)->first();
                $savedInquiry = Inquiry::query()->where('email_address',$request->emailBox)
                ->orwhere('phone_number',$request->phoneBox)
                ->orwhere('full_name',$request->full_name)
                ->get();

                if(!$inquiryExist) {
                    $inquiry = new Inquiry(array(
                        'full_name' => $request->get('fullNameBox'),
                        'property_id' => $propertyId,
                        'user_id' => 0,
                        'phone_number' => $request->get('phoneBox'),
                        'email_address' => $request->get('emailBox'),
                        'broker_or_agent' => $request->get('selectorBox'),
                    ));
                    $inquiry->save();

                    Subscriber::query()->create([
                        'email' => $request->emailBox
                    ]);
                }else if($savedInquiry->count() > 0 && $savedInquiry[0]->property_id == $request->property_idBox){
                    return response()->json(['code' => 401, 'message' => 'This information has already been signed up to project, we will get in contact with you shortly']);
                }else{
                    return response()->json(['code' => 404, 'message' => 'Signed Up To project']);
                }
               return response()->json(['code' => 200, 'message' => 'Registered Successfully','session_property_id' => $propertyId]);*/
        }
    }
    //sale-property page
    public function sale_single($property_id){
       $saleData = Property::query()->where('internal_status','1')
           ->where('id','=',$property_id)->with('multiple_media','agent_details','fav_data','floor_plan2_images','floor_plan3_images','cat_details')->get();
       //       return $saleData[0]['floor_plan2_images'][0]->no_of_bedrooms;exit();
        $totalPropertyMedia = PropertyMedia::query()->where('property_id', $property_id)->count();
        $currentprice = $saleData[0]['price'];
        $twentypercentAmount = $currentprice[0] * 20 / 100;
        $startprice = $currentprice[0] - $twentypercentAmount;
        $endprice = $currentprice[0] + $twentypercentAmount;
        $amenities_feature = explode(',', $saleData[0]['amenities_feature']);
        $amenities = Amenities::query()->select(['id', 'name','icon'])->whereIn('id', $amenities_feature)->get();
        $allSale = Property::query()->where('internal_status','1')->where('property_type','=','sale')->with('property_media','cat_details')->whereBetween('price', [$startprice, $endprice])->get()->toArray();
        $randomSale = Property::query()->where('property_type','=','sale')->where('internal_status','1')->where('most_recent_upload','=','1')->take(5)->orderBy('id','DESC')->with('cat_details')->get();
        return view('frontend.pages.property.sale-property',compact('saleData','amenities','allSale','randomSale','property_id','totalPropertyMedia'));
    }
    //inquiry pop-up for pre-construction-search(Register Now Button)
    public function inquiry_popup(Request $request,$inquiryId) {
        //return $inquiryId;
        //APPLY VALIDATION RULES
        $validator = Validator::make($request->all(),[
            'agent_fullName' => 'required|string|max:50',
            'agent_phone' => 'required|numeric|digits:10',
            'agent_email' => 'required|email:rfc,dns',
            'selector' => 'required|in:yes,no'
        ],
            [
                'agent_phone.digits' => 'The phone number must be 10 digits long',
                'agent_email.email' => 'Input a valid email address',
//                'agent_email.email:rfc,dns' => 'Input valid email formate'
        ]);
//        $messages = array(
//            'phoneBox.digits' => 'The phone number must be 10 digits long',
//            'emailBox.email' => 'Input a valid email address',
//        );
//        $validator = Validator::make( $request->all(), $rules, $messages );
        if ($validator->fails())
        {
            $validation_error = "";
            foreach ($validator->errors()->getMessages() as $key => $value) {
                $validation_error .= $value[0]."<br>";
            }
            $response = array('success' => '0', 'message' => $validation_error);

        } else {
            $inquiryExist = Inquiry::query()->where('email_address',$request->agent_email)->first();
            if(!$inquiryExist) {
                $getAttachmentFiles = Property::query()->where('id',$inquiryId)->get('attachments');
                //return $getAttachmentFiles[0]->attachments;
                if($getAttachmentFiles[0]->attachments != null){
                $content = File::get(public_path('admin-panel/assets/attachments/signup/'.$getAttachmentFiles[0]->attachments));


                    /*--- Begin Set session ---*/
                    $to_see_floor_plan_property_ids = ($request->session()->has('to_see_floor_plan_property_ids')) ? Session::get('to_see_floor_plan_property_ids') : [];
                    $to_see_floor_plan_property_ids = array_merge($to_see_floor_plan_property_ids, [$request->get('property_id')]);
                    $request->session()->put('to_see_floor_plan_property_ids', $to_see_floor_plan_property_ids);
                    /*--- Begin Set session ---*/
                    //Session::get('to_see_floor_plan_property_ids');

                    //return $files;exit();
                    Inquiry::query()->create([
                        'full_name'     => $request->get('agent_fullName'),
                        'property_id'   => $request->get('property_id'),
                        'user_id'       => 0,
                        'phone_number'  => $request->get('agent_phone'),
                        'email_address' => $request->get('agent_email'),
                        'broker_or_agent' => $request->get('selector'),
                    ]);

                    Subscriber::query()->create([
                        'email' => $request->agent_email
                    ]);

                    $request->session()->put('inquiry_email', $request->get('agent_email'));
                    $reciverEmail = $request->agent_email;
                    $reciverName = $request->agent_fullName;

                    $email = new \SendGrid\Mail\Mail();
//                $email->setFrom("toronto@tutunjirealty.com", "tutunjirealty");
                    $email->setFrom("ontario@tutunjirealty.com", "tutunjirealty");
                    $email->setSubject("Test Mail From TutunjiRealty");
                    $email->addTo($reciverEmail, $reciverName);
                    $email->addContent("text/plain", "Hello User, TutunjiRealty is sending you attachment");
                    $email->addContent(
                        "text/html", $content
                    );
//                $file_encoded = base64_encode(file_get_contents($files));
//                    $email->addAttachment(
//                        $file_encoded,
//                        "application/html",
//                        $files,
//                        "attachment"
//                    );
                    $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
                    //$sendgrid = getenv('SENDGRID_API_KEY');
                    try {
                        $response = $sendgrid->send($email);
                        $response = array('success' => '1', 'message' => 'Registered Successfully','session_email' => Session::get('inquiry_email'));
                    } catch (Exception $e) {
                        echo 'Caught exception: '. $e->getMessage() ."\n";
                    }
                }else{
//                    return 'please upload attachments first!';
                    return response()->json(['success' => '4', 'message' => 'Please upload attachment first!']);
                }

            }
            else if ($inquiryExist['property_id'] == $request->property_idBox) {
//                return "2";
                return response()->json(['success' => '2', 'message' => 'Signed Up To project']);

            }
            else {
                $checkSecond = Inquiry::query()->where('property_id',$request->property_id)
                    ->where('email_address',$request->agent_email)
                    ->where('phone_number',$request->agent_phone)
//                    ->where('full_name',$request->agent_fullName)
                    ->first();
                if($checkSecond) {
//                    return '4';
                    return response()->json(['success' => '3', 'message' => 'You have already signed up to this project']);
                } else {
//                    return '5';
                    $getAttachmentFiles = Property::query()->where('id',$inquiryId)->get('attachments');
                    if($getAttachmentFiles[0]->attachments != null){
                        $content = File::get(public_path('admin-panel/assets/attachments/signup/'.$getAttachmentFiles[0]->attachments));

                        /*--- Begin Set session ---*/
                        $to_see_floor_plan_property_ids = ($request->session()->has('to_see_floor_plan_property_ids')) ? Session::get('to_see_floor_plan_property_ids') : [];
                        $to_see_floor_plan_property_ids = array_merge($to_see_floor_plan_property_ids, [$request->get('property_id')]);
                        $request->session()->put('to_see_floor_plan_property_ids', $to_see_floor_plan_property_ids);
                        /*--- Begin Set session ---*/

                        Inquiry::query()->create([
                            'full_name'     => $request->get('agent_fullName'),
//                        'property_id'   => $inquiryId,
                            'property_id'   => $request->get('property_id'),
                            'user_id'       => 0,
                            'phone_number'  => $request->get('agent_phone'),
                            'email_address' => $request->get('agent_email'),
                            'broker_or_agent' => $request->get('selector'),
                        ]);

                        Subscriber::query()->create([
                            'email' => $request->agent_email
                        ]);

                        $request->session()->put('inquiry_email', $request->get('agent_email'));
                        $reciverEmail = $request->agent_email;
                        $reciverName = $request->agent_fullName;

                        $email = new \SendGrid\Mail\Mail();
                        $email->setFrom("ontario@tutunjirealty.com", "tutunjirealty");
                        $email->setSubject("Sending with Twilio SendGrid is Fun");
                        $email->addTo($reciverEmail, $reciverName);
                        $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
                        $email->addContent(
                            "text/html", $content
                        );
//                     $file_encoded = base64_encode(file_get_contents($attachment_files));
//                        $email->addAttachment($file_encoded, "application/html", $attachment_files, "attachment");

                        $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
                        //$sendgrid = getenv('SENDGRID_API_KEY');
                        try {
                            $response = $sendgrid->send($email);
                            $response = array('success' => '1', 'message' => 'Registered Successfully','session_email' => Session::get('inquiry_email'));
                        } catch (Exception $e) {
                            echo 'Caught exception: '. $e->getMessage() ."\n";
                        }
                    }else{
//                        return 'please upload attachment first!';
                        return response()->json(['success' => '4', 'message' => 'Please upload attachment first!']);
                    }

                }
            }
        }
        return response()->json($response);
    }
    public function check_inquiry(Request  $request) {
        //Session::remove('to_see_floor_plan_property_ids');
        $property_id = $request->input('p_id');
        $to_see_floor_plan_property_ids = ($request->session()->has('to_see_floor_plan_property_ids')) ? Session::get('to_see_floor_plan_property_ids') : [];

        return ((in_array($property_id, $to_see_floor_plan_property_ids)))
                ? response()->json(array('success' => '1', 'message' => 'Property Ids found.'))
                : response()->json(array('success' => '0', 'message' => 'Property Ids not found.'));

        /*$inquiry = Inquiry::query()->where('property_id', $request->input('p_id'))->where('email_address', Session::get('inquiry_email'))->first();
        $pre_constructData = Property::query()->where('internal_status','=','1')->where('id','=',$request->input('p_id'))->with('floor_plan2_images','floor_plan3_images')->get();
        if($pre_constructData[0]['floor_plan2_images']->count() == 0 && $pre_constructData[0]['floor_plan3_images']->count() == 0){
            return response()->json(array('success' => '2', 'message' => 'Floor Plan not found'));
        }
        $inquiryExist = Inquiry::query()->where('property_id', $request->input('p_id'))->get();
        if($inquiryExist->count() > 0){
            return response()->json(array('success' => '3', 'message' => 'Inquiry already exists'));
        }
        if(!$inquiry)
            return response()->json(array('success' => '0', 'message' => 'Inquiry not found'));
        return response()->json(array('success' => '1', 'message' => 'Inquiry Found'));*/
    }
    //sale property save inquiry
    public function store_agent_form(Request $request,$propertyId){

        if($request->action == 'email_now'){
            $validator = Validator::make($request->all(), [
                'a_name' => 'required|string|max:50',
                'a_phone' => 'required|numeric|digits:10',
                'a_email' => 'required|email:rfc,dns',
//            'selector' => 'required|in:brokerage,agent',
            ],[
                'a_phone.digits' => 'The phone number must be 10 digits long',
                'a_email.email' => 'Input a valid email address',
            ]);
                if ($validator->fails()) {
                    return redirect('/sale-property/'.$propertyId)->withErrors($validator)->withInput();
                }else{
                    $agentData = new Agent(array(
                        'fullName' => $request->get('a_name'),
                        'email' => $request->get('a_email'),
                        'phone' => $request->get('a_phone'),
                    ));
                    $agentData->save();

                    return redirect('https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=radha.tinnypixel@gmail.com&body='.$agentData);
                    //mail code here
                    //return redirect()->url('')
                    //Mail::to('radha.tinnypixel@gmail.com')->send(new AgentMail($agentData));
                }
                //return 'email now submit button clicked!';

        }
        if($request->action == 'call_now'){
            //return 'call now submit button is clicked!';
            $validator = Validator::make($request->all(), [
                'a_name' => 'required|string|max:50',
                'a_phone' => 'required|numeric|digits:10',
                'a_email' => 'required|email',
//            'selector' => 'required|in:brokerage,agent',
            ]);
            if ($validator->fails()) {
                return redirect('/sale-property/'.$propertyId)->withErrors($validator)->withInput();
            }else{
                $agentData = new Agent(array(
                    'fullName' => $request->get('a_name'),
                    'email' => $request->get('a_email'),
                    'phone' => $request->get('a_phone'),
                ));
                $agentData->save();

                return redirect('tel:123-456-7890');
                //mail code here
                //return redirect()->url('')
                //Mail::to('radha.tinnypixel@gmail.com')->send(new AgentMail($agentData));
            }
            //return 'email now submit button clicked!';


        }
        return redirect()->back()->with('success','Agent Added');

    }
    //inquiry-popup-model-for-sale-property
    public function saveAgentInquiry(Request $request) {
        //APPLY VALIDATION RULES
        $validator = Validator::make($request->all(),[
            'agent_fullName' => 'required|string|max:50',
            'agent_phone'    => 'required|numeric|digits:10',
            'agent_email'    => 'required|email:rfc,dns',
        ],[
            'agent_phone.digits' => 'The phone number must be 10 digits long',
            'agent_email.email' => 'Input a valid email address',
        ]);

        if ($validator->fails()) {
            $validation_error = "";
            foreach ($validator->errors()->getMessages() as $key => $value)
                $validation_error .= $value[0]."<br>";

            return ['success' => 0, 'message' => $validation_error];
        } else {
            $agentData = new Agent(array(
                'fullName'  => $request->get('agent_fullName'),
                'phone'     => $request->get('agent_phone'),
                'email'     => $request->get('agent_email'),
            ));
            $agentData->save();
            return ['success' => 1, 'message' => 'Agent Saved.'];
        }
    }
    //get slider
    public function get_sale_slider($pid){
        $sliderData = Property::query()->where('id','=',$pid)->where('internal_status','=','1')->with('multiple_media')->with(['fav_data','agent_details'])->get()->toArray();
        $totalImageAvailable = PropertyMedia::query()->where('property_id', $pid)->count();
        return view('frontend.pages.property.slider',compact('sliderData','totalImageAvailable'));
    }
    public function get_pre_slider($pid){
        $sliderData = Property::query()->where('id','=',$pid)->where('internal_status','=','1')->with('multiple_media')->with(['fav_data'])->get()->toArray();
        $totalImageAvailable = PropertyMedia::query()->where('property_id', $pid)->count();
        $getBanner_4 = Banner2::query()->where('property_id',$pid)->get();
        $getBanner_6 = Banner6::query()->where('property_id',$pid)->get();
        return view('frontend.pages.property.pre-slider',compact('sliderData','totalImageAvailable','getBanner_4', 'getBanner_6'));
    }
    public function search_data(Request $request)
    {
        $searchData = $request->input('query');
        $getType = $request->input('property_type');
        $allSaleData = Property::query()->where('title', 'like', '%' . $searchData . '%')
            ->where('property_type', $getType)
            ->where('internal_status','=','1')
            ->with(['multiple_media', 'agent_details', 'fav_data'])
            ->orderBy('id', 'DESC')
            ->paginate(2);
        $count = count($allSaleData);
        if ($getType == 'pre-construct')
            return view('frontend.pages.property.pre-construction-search', compact('allSaleData','searchData','getType','count'));

        return view('frontend.pages.property.sale-search', compact('allSaleData','count'));

    }
    public function search_city(Request $request){
        $allCategory = Category::all();
        $browseCity = $request->input('city');
        $getType = $request->input('property_type');

        $allSaleData = Property::query()
            ->where('property_type', $getType)->where('city', $browseCity)
            ->where('internal_status','=','1')
            ->with(['multiple_media', 'agent_details', 'fav_data'])
            ->orderBy('id', 'DESC')
            ->paginate(4);
        $count = count($allSaleData);

        if ($getType == 'pre-construct')
            return view('frontend.pages.property.pre-construction-search', compact('allSaleData','browseCity','count','allCategory'));

        return view('frontend.pages.property.sale-search', compact('allSaleData','browseCity','count','allCategory','getType'));
    }
    //del plan-2d-images edit form
    public function destroy_plan_2d_image(Request $request){
        $image_id       = $request->input('image_id');
        $floor_plan_2d_image  = FloorPlan2::find($image_id);
        if(!empty($floor_plan_2d_image->images)) {
            $path = public_path('frontend/assets/property-images/floor-plan-2D/'.  $floor_plan_2d_image->images);
            if(file_exists($path)) unlink($path);
        }
        DB::table('floor_plan2s')->where('id', '=', $image_id)->delete();
        return ['code' => 200, 'message' => 'floor 2d plan image Deleted'];
    }
    //del plan-2d-images edit form
    public function destroy_plan_3d_image(Request $request){
        $image_id       = $request->input('image_id');
        $floor_plan_3d_image  = FloorPlan3::find($image_id);
        if(!empty($floor_plan_3d_image->images)) {

            $path = public_path('frontend/assets/property-images/floor-plan-3D/'.  $floor_plan_3d_image->images);
            if(file_exists($path)) unlink($path);
        }
        DB::table('floor_plan3s')->where('id', '=', $image_id)->delete();
        return ['code' => 200, 'message' => 'floor 3d plan image Deleted'];
    }

    public function pre_construct_search(){

        $data = null;

        if (!is_null($data) ) {
            $allSaleData = $data['allSaleData'];
            $params = $data['params'];
        }else{
            $filter = "Ontario, Canada";
            $allSaleData = Property::query()->where('property_type','=','pre-construct')

            ->where(function ($query) {
             // $filter = request('filter_postal_code');
             $filter = "Ontario, Canada";
             $query->where('city', 'LIKE', '%' . $filter . '%')
                 ->orWhere('zip', 'LIKE', '%' . $filter . '%')
                 ->orWhere('country_state', 'LIKE', '%' . $filter . '%')
                 ->orWhere('address', 'LIKE', '%' . $filter . '%')
                 ->orWhere(DB::raw("CONCAT_WS(', ', city, zip, country)"), 'LIKE', '%' . $filter . '%')
                 ->orWhere(DB::raw("CONCAT_WS(', ', city, country)"), 'LIKE', '%' . $filter . '%')
                 ->orWhere(DB::raw("CONCAT_WS(', ', country_state, country)"), 'LIKE', '%' . $filter . '%')
                 ->orWhere(DB::raw("CONCAT_WS(', ', zip, country)"), 'LIKE', '%' . $filter . '%')
                 ->orWhere(DB::raw("CONCAT_WS(', ', zip, city)"), 'LIKE', '%' . $filter . '%');
             })

                ->where('internal_status','=','1')
                                             ->orderBy('id','DESC')
                                             ->with('property_media')
                                             ->with(['agent_details','fav_data'])
                                             ->paginate(5);//per page 5
            $params = [];

        }
        $allCategory = Category::all();

        $count = count($allSaleData);
        //return $allSaleData;

        return view('frontend.pages.property.pre-construction-search',compact('allSaleData','params', 'count','allCategory'));
    }

    //filter search pre-construction search
    public function filter_data(Request $request){

        $allCategory = Category::all();

        $data = session('data');

        if (!is_null($data) ) {
            $allSaleData = $data['allSaleData'];
            $params = $data['params'];
        }else{
            $allSaleData = Property::query()
                ->where('internal_status','=','1')

                ->when(request('filter_property_type') != 'none', function ($q) {
                    $cat = $q->where('category', request('filter_property_type'));
                    return $cat;
                })

                ->when(request('filter_transaction_type') != 'none', function ($q) {
                    return $q->where('property_type', request('filter_transaction_type'));
                })
                ->when(request('filter_min') != null, function ($q) {
                    return $q->where('price', '>=', (int)request('filter_min'));
                })
                ->when(request('filter_max') != null, function ($q) {
                    return $q->where('price', '<=', (int)request('filter_max'));
                })
            //                ->when(request('filter_postal_code') != null, function ($q) {
            //                    return $q->where('city', request('filter_postal_code'));
            //                })


        ->when(request('filter_postal_code') != null, function ($q) {
            return $q->where(function ($query) {
                $filter = request('filter_postal_code');
                $query->where('city', 'LIKE', '%' . $filter . '%')
                    ->orWhere('zip', 'LIKE', '%' . $filter . '%')
                    ->orWhere('country_state', 'LIKE', '%' . $filter . '%')
                    ->orWhere('address', 'LIKE', '%' . $filter . '%')
                    ->orWhere(DB::raw("CONCAT_WS(', ', city, zip, country)"), 'LIKE', '%' . $filter . '%')
                    ->orWhere(DB::raw("CONCAT_WS(', ', city, country)"), 'LIKE', '%' . $filter . '%')
                    ->orWhere(DB::raw("CONCAT_WS(', ', country_state, country)"), 'LIKE', '%' . $filter . '%')
                    ->orWhere(DB::raw("CONCAT_WS(', ', zip, country)"), 'LIKE', '%' . $filter . '%')
                    ->orWhere(DB::raw("CONCAT_WS(', ', zip, city)"), 'LIKE', '%' . $filter . '%');
            });
        })

                // ->when(request('filter_postal_code') != null, function ($q) {
                //     return $q->where('city', 'LIKE', '%'.request('filter_postal_code').'%')
                //         ->orWhere('zip', 'LIKE', '%'.request('filter_postal_code').'%')
                //         ->orWhere('country_state', 'LIKE', '%'.request('filter_postal_code').'%')
                //         ->orWhere('address', 'LIKE', '%'.request('filter_postal_code').'%')
                //         ->orWhere(DB::raw("CONCAT_WS(', ', city, zip, country)"), 'LIKE', '%' . request('filter_postal_code') . '%')
                //         ->orWhere(DB::raw("CONCAT_WS(', ', city, country)"), 'LIKE', '%' . request('filter_postal_code') . '%')
                //         ->orWhere(DB::raw("CONCAT_WS(', ', country_state, country)"), 'LIKE', '%' . request('filter_postal_code') . '%')
                //         ->orWhere(DB::raw("CONCAT_WS(', ', zip, country)"), 'LIKE', '%' . request('filter_postal_code') . '%')
                //         ->orWhere(DB::raw("CONCAT_WS(', ', zip, city)"), 'LIKE', '%' . request('filter_postal_code') . '%');

                //         // dd($ok->get());
                //         // return $ok;
                // })
                ->when(request('filter_bed') != 'none', function ($q) {
                    return $q->where('to_bedrooms','>=',request('filter_bed'))
                    ->where('from_bedrooms','<=',request('filter_bed'));
                    //                    ->orwhere('to_bedrooms','like','%'.request('filter_bed').'%');
                })
                ->when(request('filter_bath') != 'none', function ($q) {
                    return $q->where('to_bathrooms','>=', request('filter_bath'))
                    ->where('from_bathrooms','<=',request('filter_bath'));
                    //                        ->orwhere('to_bathrooms','like','%'.request('filter_bath').'%');
                })
                ->when(request('filter_size') != 'none', function ($q) {
                    $size = explode('-', request('filter_size'));
                    //dd($size);
                    if(!empty($size[1])){
                        if(($size[0] >= 0 && $size[1] <= 2000)){
                            return $q->where('to_size_in_sqft','>=',0)->where('from_size_in_sqft','<=',2000);
                        }
                        if(($size[0] >= 2001 && $size[1] <= 3000)){
                            return $q->where('to_size_in_sqft','>=',2001)->where('from_size_in_sqft','<=',3000);
                        }
                        if(($size[0] >= 3001 && $size[1] <= 4000)){
                            return $q->where('to_size_in_sqft','>=',3001)->where('from_size_in_sqft','<=',4000);
                        }
                        if(($size[0] >= 4001 && $size[1] <= 5000)){
                            return $q->where('to_size_in_sqft','>=',4001)->where('from_size_in_sqft','<=',5000);
                        }
                        if(($size[0] >= 5001 && $size[1] <= 7000)){
                            return $q->where('to_size_in_sqft','>=',5001)->where('from_size_in_sqft','<=',7000);
                        }
                        if(($size[0] >= 7001 && $size[1] <= 10000)){
                            return $q->where('to_size_in_sqft','>=',7001)->where('from_size_in_sqft','<=',10000);
                        }
                    }
                    if($size[0] >= 10000){
                        return $q->where('to_size_in_sqft','>=',10000)->where('from_size_in_sqft','>=',10000);
                    }
                    //                    else{
                    //                        return (request('filter_size') != '10000') ? $q->where('to_size_in_sqft', '>=', $size[0])->where('from_size_in_sqft', '<=', $size[1]) : $q->where('to_size_in_sqft', '>=', request('filter_size'));
                    //                    }

                    //dd($size[1]);
                    //dd($q->where('size_in_ft2', request('filter_size')));

                })

                    //                ->when(request('filter_size') != 'none', function ($q) {
                    //                    $size = explode('-', request('size'));
                    //                    return (request('filter_size') != '10000') ? $q->where('size_in_ft2', '>=', $size[0])->where('size_in_ft2', '<=', $size[1]) : $q->where('size_in_ft2', '>=', request('filter_size'));
                    //
                    //                })
                ->when(request('sort_by') != null, function ($q) {
                    // dd(request('sort_by'));

                    switch (request('sort_by')) {
                        case "none":
                            $q->orderBy('created_at', 'desc');
                            break;

                        case "newest":
                            $q->orderBy('created_at', 'desc');
                            break;

                        case "oldest":

                            $q->orderBy('created_at', 'asc');
                            break;
                        case "price_low_high":

                            $q->orderByRaw("CAST(REPLACE(price, ',', '') AS DECIMAL) asc");
                            break;
                        case "price_high_low":

                            $q->orderByRaw("CAST(REPLACE(price, ',', '') AS DECIMAL) desc");
                            break;
                        case "sqft_low_high":

                            $q->orderByRaw("LEAST(from_size_in_sqft, to_size_in_sqft)")
                                ->orderByRaw("GREATEST(from_size_in_sqft, to_size_in_sqft)");
                            break;
                        case "sqft_high_low":

                            $q->orderByRaw("GREATEST(from_size_in_sqft, to_size_in_sqft) DESC")
                                ->orderByRaw("LEAST(from_size_in_sqft, to_size_in_sqft) DESC");
                            break;
                        case "bedroom_low_high":

                            $q->orderByRaw("LEAST(from_bedrooms, to_bedrooms)")
                                ->orderByRaw("GREATEST(from_bedrooms, to_bedrooms)");
                            break;
                        case "bedroom_high_low":

                            $q->orderByRaw("GREATEST(from_bedrooms, to_bedrooms) DESC")
                                ->orderByRaw("LEAST(from_bedrooms, to_bedrooms) DESC");
                            break;
                        case "bathroom_low_high":

                            $q->orderByRaw("LEAST(from_bathrooms, to_bathrooms)")
                                ->orderByRaw("GREATEST(from_bathrooms, to_bathrooms)");
                            break;
                        case "bathroom_high_low":

                            $q->orderByRaw("GREATEST(from_bathrooms, to_bathrooms) DESC")
                                ->orderByRaw("LEAST(from_bathrooms, to_bathrooms) DESC");
                            break;
                        case "commercial_residential":
                            $q->orderByRaw("CASE WHEN properties.category = '4' THEN 1 WHEN properties.category = '5' THEN 2 ELSE 3 END");
                            break;
                        case "residential_commercial":
                            $q->orderByRaw("CASE WHEN properties.category = '5' THEN 1 WHEN properties.category = '4' THEN 2 ELSE 3 END");
                            break;
                    }
                })
                ->with(['multiple_media', 'agent_details', 'fav_data'])
                ->orderBy('id', 'desc')
                ->paginate(4);

                $params = $request->input();

        }

        // dd(request('filter_bed'));
        // echo 'test';exit();
        // $params = $request->input();
        // dd($params);

                // dd($allSaleData);

                $city_name = "";
                $city = request('filter_postal_code');
                if ($city == null) {
                    $city = "Canada";
                    $city_name = "";
                }

            $count = count($allSaleData);
            //return $allSaleData;

            if (request('filter_transaction_type') == 'pre-construct') {
                $data = [
                    'allSaleData' => $allSaleData,
                    'params' => $params,
                    'is_preconstruct' => true
                ];

                return redirect()->route('property-search-filter')->with('data', $data);
            }

            if (request('filter_transaction_type') == 'sale') {
                $data = [
                    'allSaleData' => $allSaleData,
                    'params' => $params,
                    'is_preconstruct' => true
                ];

                return redirect()->route('property-sale-search-filter')->with('data', $data);
            }

            return view('frontend.pages.property.pre-construction-search', compact('allSaleData', 'params', 'count','allCategory', 'city', 'city_name'));
    }
    //sale-property search page
    public function sale_search(){
        $allCategory = Category::all();
        $filter = "Ontario, Canada";
        $allSaleData = Property::query()->where('property_type','=','sale')->where('internal_status','=','1')

        ->where(function ($query) {
            // $filter = request('filter_postal_code');
            $filter = "Ontario, Canada";
            $query->where('city', 'LIKE', '%' . $filter . '%')
                ->orWhere('zip', 'LIKE', '%' . $filter . '%')
                ->orWhere('country_state', 'LIKE', '%' . $filter . '%')
                ->orWhere('address', 'LIKE', '%' . $filter . '%')
                ->orWhere(DB::raw("CONCAT_WS(', ', city, zip, country)"), 'LIKE', '%' . $filter . '%')
                ->orWhere(DB::raw("CONCAT_WS(', ', city, country)"), 'LIKE', '%' . $filter . '%')
                ->orWhere(DB::raw("CONCAT_WS(', ', country_state, country)"), 'LIKE', '%' . $filter . '%')
                ->orWhere(DB::raw("CONCAT_WS(', ', zip, country)"), 'LIKE', '%' . $filter . '%')
                ->orWhere(DB::raw("CONCAT_WS(', ', zip, city)"), 'LIKE', '%' . $filter . '%');
        })

        // ->where('city', 'LIKE', '%' . $filter . '%')
        // ->orWhere('zip', 'LIKE', '%' . $filter . '%')
        // ->orWhere('country_state', 'LIKE', '%' . $filter . '%')
        // ->orWhere('address', 'LIKE', '%' . $filter . '%')
        // ->orWhere(DB::raw("CONCAT_WS(', ', city, zip, country)"), 'LIKE', '%' . $filter . '%')
        // ->orWhere(DB::raw("CONCAT_WS(', ', city, country)"), 'LIKE', '%' . $filter . '%')
        // ->orWhere(DB::raw("CONCAT_WS(', ', country_state, country)"), 'LIKE', '%' . $filter . '%')
        // ->orWhere(DB::raw("CONCAT_WS(', ', zip, country)"), 'LIKE', '%' . $filter . '%')
        // ->orWhere(DB::raw("CONCAT_WS(', ', zip, city)"), 'LIKE', '%' . $filter . '%')

        ->orderBy('id','DESC')
            ->with('multiple_media')->with(['agent_details','fav_data','cat_details'])->paginate(4);

        $count = count($allSaleData);
        $params = [];
        return view('frontend.pages.property.sale-search',compact('allSaleData','params','count','allCategory'));
    }
    //filter sale search
    public function filter_sale_data(Request $request)
    {
        $data = session('data');
        $allCategory = Category::all();

        if (!is_null($data) ) {
            $allSaleData = $data['allSaleData'];
            $params = $data['params'];
        }else{
            $params = $request->input();

            $to_search = request('filter_transaction_type') == 'pre-construct' ? 'pre-construct' : 'sale';
       $allSaleData = Property::join('categories', 'categories.id', '=', 'properties.category')//query()
        //    ->where('internal_status','=','1')->where('property_type','=','sale')
           ->where('internal_status','=','1')->where('property_type','=', $to_search)
            ->when(request('filter_property_type') != 'none', function ($q) { return $q->where('category',  request('filter_property_type')); })
            ->when(request('filter_transaction_type') != 'none', function ($q) { return $q->where('property_type', request('filter_transaction_type')); })
            ->when(request('filter_min') != null, function ($q) { return $q->where('price', '>=', (int)request('filter_min')); })
            ->when(request('filter_max') != null, function ($q) { return $q->where('price', '<=', (int)request('filter_max')); })
//            ->when(request('filter_postal_code') != null, function ($q) { return $q->where('city',request('filter_postal_code')); })
            // ->when(request('filter_postal_code') != null, function ($q) {
            //         $ok = $q->where('city', 'like', '%'.request('filter_postal_code').'%')
            //         ->orWhere('zip', 'like', '%'.request('filter_postal_code').'%')
            //         ->orWhere('country_state', 'like', '%'.request('filter_postal_code').'%')
            //         ->orWhere('address', 'like', '%'.request('filter_postal_code').'%')
            //         ->orWhere(DB::raw("CONCAT_WS(', ', city, zip, country)"), 'LIKE', '%' . request('filter_postal_code') . '%')
            //         ->orWhere(DB::raw("CONCAT_WS(', ', city, country)"), 'LIKE', '%' . request('filter_postal_code') . '%')
            //         ->orWhere(DB::raw("CONCAT_WS(', ', country_state, country)"), 'LIKE', '%' . request('filter_postal_code') . '%')
            //         ->orWhere(DB::raw("CONCAT_WS(', ', zip, country)"), 'LIKE', '%' . request('filter_postal_code') . '%')
            //         ->orWhere(DB::raw("CONCAT_WS(', ', zip, city)"), 'LIKE', '%' . request('filter_postal_code') . '%');
            //         // dd($ok->get());
            //         return $ok;
            //     })

                ->when(request('filter_postal_code') != null, function ($q) {
                    return $q->where(function ($query) {
                        $filter = request('filter_postal_code');
                        $query->where('city', 'LIKE', '%' . $filter . '%')
                            ->orWhere('zip', 'LIKE', '%' . $filter . '%')
                            ->orWhere('country_state', 'LIKE', '%' . $filter . '%')
                            ->orWhere('address', 'LIKE', '%' . $filter . '%')
                            ->orWhere(DB::raw("CONCAT_WS(', ', city, zip, country)"), 'LIKE', '%' . $filter . '%')
                            ->orWhere(DB::raw("CONCAT_WS(', ', city, country)"), 'LIKE', '%' . $filter . '%')
                            ->orWhere(DB::raw("CONCAT_WS(', ', country_state, country)"), 'LIKE', '%' . $filter . '%')
                            ->orWhere(DB::raw("CONCAT_WS(', ', zip, country)"), 'LIKE', '%' . $filter . '%')
                            ->orWhere(DB::raw("CONCAT_WS(', ', zip, city)"), 'LIKE', '%' . $filter . '%');
                    });
                })
            ->when(request('filter_bed') != 'none', function ($q) {
                $bed_val = request('filter_bed');
                if($bed_val == 5){
                    return $q->where('bedrooms','>=',$bed_val);
                }
                return $q->where('bedrooms', request('filter_bed'));
            })
            ->when(request('filter_bath') != 'none', function ($q) {
                $bath_val = request('filter_bath');
                if($bath_val == 5){
                    return $q->where('bathrooms','>=',$bath_val);
                }
                return $q->where('bathrooms', request('filter_bath'));
            })
            ->when(request('filter_size') != 'none', function ($q) {
               $size = explode('-', request('filter_size'));
               //dd($size);
                if(!empty($size[1])){
                    if(($size[0] >= 0 && $size[1] <= 2000)){
                        return $q->where('lot_size_in_ft2','>=',0)->where('size_in_ft2','<=',2000);
                    }
                    if(($size[0] >= 2001 && $size[1] <= 3000)){
                        return $q->where('lot_size_in_ft2','>=',2001)->where('size_in_ft2','<=',3000);
                    }
                    if(($size[0] >= 3001 && $size[1] <= 4000)){
                        return $q->where('lot_size_in_ft2','>=',3001)->where('size_in_ft2','<=',4000);
                    }
                    if(($size[0] >= 4001 && $size[1] <= 5000)){
                        return $q->where('lot_size_in_ft2','>=',4001)->where('size_in_ft2','<=',5000);
                    }
                    if(($size[0] >= 5001 && $size[1] <= 7000)){
                        return $q->where('lot_size_in_ft2','>=',5001)->where('size_in_ft2','<=',7000);
                    }
                    if(($size[0] >= 7001 && $size[1] <= 10000)){
                        return $q->where('lot_size_in_ft2','>=',7001)->where('size_in_ft2','<=',10000);
                    }
                }
                if($size[0] >= 10000){
                    return $q->where('lot_size_in_ft2','>=',10000)->where('size_in_ft2','>=',10000);
                }
               //return (request('filter_size') != '10000') ? $q->where('size_in_ft2', '>=', $size[0])->where('size_in_ft2', '<=', $size[1]) : $q->where('size_in_ft2', '>=', request('filter_size'));

            })
           ->when(request('sort_by') != null, function ($q) {

               switch (request('sort_by')) {
                    case "none":
                        $q->orderBy('created_at', 'desc');
                        break;

                   case "newest":
                       $q->orderBy('created_at', 'desc');
                       break;
                   case "oldest":

                       $q->orderBy('created_at', 'asc');
                       break;
                   case "price_low_high":

                       $q->orderByRaw("CAST(REPLACE(price, ',', '') AS DECIMAL) asc");
                       break;
                   case "price_high_low":

                       $q->orderByRaw("CAST(REPLACE(price, ',', '') AS DECIMAL) desc");
                       break;
                   case "sqft_low_high":

                       $q->orderByRaw("LEAST(from_size_in_sqft, to_size_in_sqft)")
                           ->orderByRaw("GREATEST(from_size_in_sqft, to_size_in_sqft)");
                       break;
                   case "sqft_high_low":

                       $q->orderByRaw("GREATEST(from_size_in_sqft, to_size_in_sqft) DESC")
                           ->orderByRaw("LEAST(from_size_in_sqft, to_size_in_sqft) DESC");
                       break;
                   case "bedroom_low_high":

                       $q->orderByRaw("LEAST(from_bedrooms, to_bedrooms)")
                           ->orderByRaw("GREATEST(from_bedrooms, to_bedrooms)");
                       break;
                   case "bedroom_high_low":

                       $q->orderByRaw("GREATEST(from_bedrooms, to_bedrooms) DESC")
                           ->orderByRaw("LEAST(from_bedrooms, to_bedrooms) DESC");
                       break;
                   case "bathroom_low_high":

                       $q->orderByRaw("LEAST(from_bathrooms, to_bathrooms)")
                           ->orderByRaw("GREATEST(from_bathrooms, to_bathrooms)");
                       break;
                   case "bathroom_high_low":

                       $q->orderByRaw("GREATEST(from_bathrooms, to_bathrooms) DESC")
                           ->orderByRaw("LEAST(from_bathrooms, to_bathrooms) DESC");
                       break;
                   case "commercial_residential":

                    //    $q->orderBy(function ($query) {
                    //        $query->select('name')
                    //            ->from('categories')
                    //            ->whereColumn('categories.id', 'properties.category')
                       $q->orderByRaw("CASE WHEN categories.name = 'Commercial' THEN 1 WHEN categories.name = 'Residential' THEN 2 ELSE 3 END");
                    //    });
                       break;
                   case "residential_commercial":

                    //    $q->orderBy(function ($query) {
                    //        $query->select('name')
                    //            ->from('categories')
                    //            ->whereColumn('categories.id', 'properties.category')
                       $q->orderByRaw("CASE WHEN categories.name = 'Residential' THEN 1 WHEN categories.name = 'Commercial' THEN 2 ELSE 3 END");
                    //    });
                       break;
               }
           })
            ->with(['multiple_media', 'agent_details', 'fav_data'])
           ->select('properties.*')
//            ->orderBy('id', 'desc')
            ->paginate(4);
        }


        $count = count($allSaleData);

        $city_name = "";
        $city = request('filter_postal_code');
        if ($city == null) {
            $city = "Canada";
            $city_name = "";
        }

        if (request('filter_transaction_type') == 'pre-construct') {
            $data = [
                'allSaleData' => $allSaleData,
                'params' => $params,
                'is_preconstruct' => true
            ];

            return redirect()->route('property-search-filter')->with('data', $data);
        }

        if (request('filter_transaction_type') == 'sale') {
            $data = [
                'allSaleData' => $allSaleData,
                'params' => $params,
                'is_preconstruct' => true
            ];

            return redirect()->route('property-sale-search-filter')->with('data', $data);
        }

        return view('frontend.pages.property.sale-search',compact('allSaleData','params','count','allCategory', 'city', 'city_name'));
    }
    //new pre-construct property
    public function new_pre_construct($property_id){
        $pre_constructData = Property::query()
            ->where('internal_status','1')
            ->where('id','=',$property_id)->with('multiple_media','fav_data','floor_plan2_images','floor_plan3_images','cat_details')->get();
//        echo '<pre>';
//        print_r($pre_constructData);
//        echo '</pre>';exit();
        $totalPropertyMediaImages = PropertyMedia::query()->where('property_id', $property_id)->count();
//        $getBanner_2 = Banner2::query()->where('property_id',$property_id)->get();
//        $getBanner_3 = Banner3::query()->where('property_id',$property_id)->get();
//        $currentprice = $pre_constructData[0]['price'];
//        $twentypercentAmount = $currentprice[0] * 20 / 100;
//        $startprice = $currentprice[0] - $twentypercentAmount;
//        $endprice = $currentprice[0] + $twentypercentAmount;
//        $amenities_feature = explode(',', $pre_constructData[0]['amenities_feature']);
//        $amenities = Amenities::query()->select(['id', 'name'])->whereIn('id', $amenities_feature)->get();
//        $allPreConstruct = Property::query()->where('property_type','=','pre-construct')->where('internal_status','1')->with('property_media','cat_details')->whereBetween('price', [$startprice, $endprice])->get()->toArray();
//        $randomPreConstruct = Property::query()->where('property_type','=','pre-construct')->where('internal_status','1')->with('cat_details')->take(5)->get();
        //return $allPreConstruct[0]['property_media']['media_name'];
//        return view('frontend.pages.property.pre-construction-property',compact('pre_constructData', 'amenities','allPreConstruct','randomPreConstruct','totalPropertyMediaImages','getBanner_2','getBanner_3'));
        return view('frontend.pages.property.new-pre-construct-property',compact('pre_constructData','totalPropertyMediaImages'));
    }
}
