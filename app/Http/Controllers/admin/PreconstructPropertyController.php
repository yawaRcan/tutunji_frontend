<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Amenities;
use App\Models\Banner1;
use App\Models\Banner2;
use App\Models\Banner3;
use App\Models\Banner4;
use App\Models\Banner5;
use App\Models\Banner6;
use App\Models\Banner7;
use App\Models\BlogCategory;
use App\Models\Category;
use App\Models\Country;
use App\Models\FloorPlan2;
use App\Models\FloorPlan3;
use App\Models\Inquiry;
use App\Models\Property;
use App\Models\PropertyMedia;
use App\Models\State;
use App\Models\Subscriber;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use SendGrid\Mail\Personalization;
use function PHPUnit\Framework\returnArgument;
use SendGrid\Mail\To;

class PreconstructPropertyController extends Controller
{
    //LIST PRE-CONSTRUCT PROPERTY PAGE
    public function list_pre_construct_property(){
        if(Session::has('media_name')){
            Session::remove('media_name');
        }
        if(Session::has('session_data')) {
            Session::remove('session_data');
        }
        if(Session::has('session_3d_data')) {
            Session::remove('session_3d_data');
        }
        if(Session::has('session_data_banner_1')){
            Session::remove('session_data_banner_1');
        }
        if(Session::has('session_data_banner_2')){
            Session::remove('session_data_banner_2');
        }
        if(Session::has('session_data_banner_3')){
            Session::remove('session_data_banner_3');
        }
        if(Session::has('session_data_banner_4')){
            Session::remove('session_data_banner_4');
        }

        // new banners
        if(Session::has('session_data_banner_5')){
            Session::remove('session_data_banner_5');
        }
        if(Session::has('session_data_banner_6')){
            Session::remove('session_data_banner_6');
        }
        if(Session::has('session_data_banner_7')){
            Session::remove('session_data_banner_7');
        }

        $pre_construct_property = Property::query()->where('property_type','=','pre-construct')->orderBy('id', 'desc')
            ->with('property_media','cat_details')->get()->toArray();
        return view('admin.pages.pre-construct-property.list-pre-construct-property',compact('pre_construct_property'));
    }
    //ADD PRE-CONSTRUCT PROPERTY DATA
    public function add_pre_construct_property()
    {
//        if(Session::has('media_name')){
//            Session::remove('media_name');
//        }
//        if(Session::has('session_data')) {
//            Session::remove('session_data');
//        }
//        if(Session::has('session_3d_data')) {
//            Session::remove('session_3d_data');
//        }
//        if(Session::has('session_data_banner_1')){
//            Session::remove('session_data_banner_1');
//        }
        $checkBoxValue = Amenities::all();
        $countries = Country::all();
        $agentData = Agent::all();
        $allCategory = Category::all();
        return view('admin.pages.pre-construct-property.add-pre-construct-property',compact('checkBoxValue','countries','agentData','allCategory'));
    }
    //get states
    public function getState(Request $request)
    {
        $data['states'] = State::query()->where("country_id",$request->country_id)
            ->get(["name","id"]);
        return response()->json($data);
    }
    //STORE PRE-CONSTRUCT PROPERTY DATA
    public function store_pre_construct_property(Request $request)
    {
        //return $request;
        //check validation
        $validation_rules = [
            'description'  => 'required',
            'address'      => 'required',
            'media_name'   => 'required|image|mimes:jpg,webp,png|max:2048',
            'banner1_img'  => 'image|mimes:webp|dimensions:width=730,height=160',
            'banner2_img'  => 'image|mimes:webp|dimensions:width=2500,height=342',
            'banner3_img'  => 'image|mimes:webp|dimensions:width=2500,height=322',
            'banner4_img'  => 'image|mimes:webp|dimensions:width=2500,height=280',
            'banner5_img'  => 'image|mimes:webp|dimensions:width=1404,height=445',
            'banner6_img'  => 'image|mimes:webp|dimensions:width=1404,height=445',
            'banner7_img'  => 'image|mimes:webp|dimensions:width=1404,height=445',
            'signUp_file' => 'required',
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
                return redirect('/admin/add-pre-construct-property')->withErrors($validator)->withInput();
            }
            return redirect('/admin/add-pre-construct-property')->withErrors($validator)->withInput();
        }else {
            //PERFORM DATABASE OPERATION

            //For Signup
            //return $request->hasFile('signUp_file');
            if ($request->hasFile('signUp_file')) {
                //return 'true';
                $file = $request->file('signUp_file');
                if ($file->getClientOriginalExtension() == 'html') {
                    
                    $mediaType = $file->getMimeType();
                    //return $mediaType;exit();
//                    if($mediaType == 'text/plain') {
//                        $signUpFileName = 'signup_file'.time() . '.' . $file->getClientOriginalExtension();
//                        $file->move(public_path('admin-panel/assets/attachments/signup/'), $signUpFileName);
//                    }
                    if($mediaType == 'text/html') {
                        $signUpFileName = 'signup_file'.time() . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('admin-panel/assets/attachments/signup/'), $signUpFileName);
                    }
                }
            }

            //For Newsletter
            if ($request->hasFile('newsletter_file')) {
                //return 'true';
                $file = $request->file('newsletter_file');
                $mediaType = $file->getMimeType();
                if($mediaType == 'text/html') {
                    $newsletterFileName = 'newsletter_file' . time() . '.' . $file->extension();
                    $file->move(public_path('admin-panel/assets/attachments/newsletter/'), $newsletterFileName);
                }
            }else{
                $newsletterFileName = null;
            }

            $res = new Property;
            $checkBoxValue = $request->get('amenities');
            $checkArray = array();
            if ($checkBoxValue) {
                foreach ($checkBoxValue as $checkValue) {
                    $checkArray[] = $checkValue;
                }
            }
            //embed video id
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

            $res->description = $request->get('description');
            $res->price = number_format((int)$request->get('price'), 2, '.', ',');
            $res->after_price_label = $request->get('after_price_label');
            $res->before_price_label = $request->get('before_price_label');
            $res->category = $request->get('category');
            $res->attachments = $signUpFileName;
            $res->newsletter_attachments = $newsletterFileName;
            $res->listed_in = $request->get('listed_in');
            $res->address = $request->get('address');
            $res->city = $request->get('city');
            $res->neighborhood = $request->get('neighborhood');
            $res->zip = $request->get('zip');
            $res->country_state = $request->get('state');
            $res->country = $request->get('country');
            $res->latitude = $request->get('latitude');
            $res->longitude = $request->get('longitude');
            $res->enable_google_street_view = $request->get('enable_google_street_view');
            $res->google_street_view = $request->get('google_street_view');
            $res->size_in_ft2 = $request->get('size_in_ft2');
            $res->lot_size_in_ft2 = $request->get('lot_size_in_ft2');
            $res->from_size_in_sqft = $request->get('from_size_in_ft');
            $res->to_size_in_sqft = $request->get('to_size_in_ft');
            $res->from_rooms = $request->get('from_rooms');
            $res->to_rooms = $request->get('to_rooms');
            $res->from_bedrooms = $request->get('from_bedrooms');
            $res->to_bedrooms = $request->get('to_bedrooms');
            $res->from_bathrooms = $request->get('from_bathrooms');
            $res->to_bathrooms = $request->get('to_bathrooms');
            $res->custom_id = $request->get('custom_id');
            $res->year_built = $request->get('year_built');
            $res->from_parking_spots = $request->get('from_parking_spots');
            $res->to_parking_spots = $request->get('to_parking_spots');
            $res->available_from = ($request->get('available_from')) ? date('Y-m-d', strtotime($request->get('available_from'))) : null;
            $res->garage_size = $request->get('garage_size');
            $res->external_construction = $request->get('external_construction');
            $res->basement = $request->get('basement');
            $res->exterior_material = $request->get('exterior_material');
            $res->floor_plan_2D = 0;
            $res->floor_plan_3D = 0;
            $res->roofing = $request->get('roofing');
            $res->floors_no = $request->get('floors_no');
            $res->structure_type = $request->get('structure_type');
            $res->owner_agent_note = $request->get('owner_agent_note');
            $res->property_status = $request->get('property_status');
            $res->agent_id = $request->get('agent');
            $res->amenities_feature = ($checkArray) ? implode(',', $checkArray) : 0;
            $res->video_from = $request->get('video_from');
//            $res->embed_video_id = $convertedURL;
            $res->virtual_tour = $request->get('virtual_tour');
            $res->subunits = 'test';
            $res->user_id = Auth::guard('admin')->user()->id;
            $res->created_time = date('H:i:s');
            $res->property_type = 'pre-construct';
            $res->internal_status = '1';
            $res->most_recent_upload = '1';
            $res->created_date = today();
            $res->save();
            $property_id = $res->id;


            //UPDATE PROPERTY ID ONLY FOR SESSION MEDIA STORED
            foreach ($request->session()->get('media_name') as $image_obj) {
                PropertyMedia::query()->where('id', $image_obj['id'])->update([
                    'property_id' => $property_id
                ]);
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

            //Upload banner image 1
            if ($request->hasFile('banner1_img')) {
                $file_1 = $request->file('banner1_img');
                $imageName_1 = time() . '.' . $file_1->extension();
                $file_1->move(public_path('admin-panel/assets/property-images/banner-1/'), $imageName_1);

                $banner_1_data = new Banner1();
                $banner_1_data->property_id = $property_id;
                $banner_1_data->banner_1 = $imageName_1;
                $banner_1_data->save();

            } else {
                $imageName_1 = null;
            }

            //Upload banner image 2
            if ($request->hasFile('banner2_img')) {
                $file_2 = $request->file('banner2_img');
                $imageName_2 = time() . '.' . $file_2->extension();
                $file_2->move(public_path('admin-panel/assets/property-images/banner-2/'), $imageName_2);

                $banner_2_data = new Banner2();
                $banner_2_data->property_id = $property_id;
                $banner_2_data->banner_2 = $imageName_2;
                $banner_2_data->save();
            } else {
                $imageName_2 = null;
            }

            //Upload banner image 3
            if ($request->hasFile('banner3_img')) {
                $file_3 = $request->file('banner3_img');
                $imageName_3 = time() . '.' . $file_3->extension();
                $file_3->move(public_path('admin-panel/assets/property-images/banner-3/'), $imageName_3);

                $banner_3_data = new Banner3();
                $banner_3_data->property_id = $property_id;
                $banner_3_data->banner_3 = $imageName_3;
                $banner_3_data->save();
            } else {
                $imageName_3 = null;
            }

            //Upload banner image 4
            if ($request->hasFile('banner4_img')) {
                $file_4 = $request->file('banner4_img');
                $imageName_4 = time() . '.' . $file_4->extension();
                $file_4->move(public_path('admin-panel/assets/property-images/banner-4/'), $imageName_4);

                $banner_4_data = new Banner4();
                $banner_4_data->property_id = $property_id;
                $banner_4_data->banner_4 = $imageName_4;
                $banner_4_data->save();

            } else {
                $imageName_4 = null;
            }

            // Upload banner image 5
            if ($request->hasFile('banner5_img')) {
                $file_5 = $request->file('banner5_img');
                $imageName_5 = time() . '.' . $file_5->extension();
                $file_5->move(public_path('admin-panel/assets/property-images/banner-5/'), $imageName_5);

                $banner_5_data = new Banner5();
                $banner_5_data->property_id = $property_id;
                $banner_5_data->banner_5 = $imageName_5;
                $banner_5_data->save();

            } else {
                $imageName_5 = null;
            }

            // Upload banner image 6
            if ($request->hasFile('banner6_img')) {
                $file_6 = $request->file('banner6_img');
                $imageName_6 = time() . '.' . $file_6->extension();
                $file_6->move(public_path('admin-panel/assets/property-images/banner-6/'), $imageName_6);

                $banner_6_data = new Banner6();
                $banner_6_data->property_id = $property_id;
                $banner_6_data->banner_6 = $imageName_6;
                $banner_6_data->save();

            } else {
                $imageName_6 = null;
            }

            // Upload banner image 7
            if ($request->hasFile('banner7_img')) {
                $file_7 = $request->file('banner7_img');
                $imageName_7 = time() . '.' . $file_7->extension();
                $file_7->move(public_path('admin-panel/assets/property-images/banner-7/'), $imageName_7);

                $banner_7_data = new Banner7();
                $banner_7_data->property_id = $property_id;
                $banner_7_data->banner_7 = $imageName_7;
                $banner_7_data->save();

            } else {
                $imageName_7 = null;
            }

            //SEND NEWSLETTER ATTACHMENT
            $getNewsletterAttachment = Property::query()->where('id',$property_id)->pluck('newsletter_attachments')->first();

            //return $getNewsletterAttachment;exit();
            if($getNewsletterAttachment != null){
                //return 'file exists';
                $content = File::get(public_path('admin-panel/assets/attachments/newsletter/'.$getNewsletterAttachment));
                // return $content;exit();
//            if($getNewsletterAttachment){
//                if($getNewsletterAttachment != null){
                    $email = new \SendGrid\Mail\Mail();
                    $email->setFrom("ontario@tutunjirealty.com", "tutunjirealty");
                    //$tos = array();
                    $userResults = Subscriber::query()->select( "email")->get();
                    foreach($userResults as $user){
                        //$tos[$user['email']] = 'Subscribers';
                        $personalization = new Personalization();
                        $personalization->addTo(new To(json_decode($user)->email));
                        $email->addPersonalization($personalization);

                    }
                    //return $tos;exit();
                    // $email->addTos($tos);

                    $email->setSubject("Sending Mail Using Sendgrid Api");
                    $email->addContent("text/plain", "Hello Subscribers, TutunjiRealty is sending you attachment.");

                    $email->addContent(
                        "text/html", $content
                    );

                    $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
                    try {
                        $response = $sendgrid->send($email);
                        return redirect('/admin/list-pre-construct-property')->with('success','Property has been added successfully!');

                    } catch (Exception $e) {
                        echo 'Caught exception: '.  $e->getMessage(). "\n";
                    }
//                }
            }


//            }

//            return $request->session()->has('media_name');exit();
//            //MEDIA SESSION DESTROY
            if($request->session()->has('media_name')){
                $request->session()->remove('media_name');
            }
        }
        return redirect('/admin/list-pre-construct-property')->with('success','Property has been added successfully!');
    }
    //new code for 2d file
    public function update_2d_section_on_session(Request $request)
    {
        //CHECK VALIDATION
        $validation_rule = 'required|image|mimes:jpg,webp,png';
        $validator = Validator::make($request->all(), [
            'input_file' => $validation_rule,
        ]);

        if ($validator->passes()){

            $inputted_file_value = $request->file('input_file');

            $getsize = $inputted_file_value->getSize();
            if($getsize >= 2097152){
                return response(['code' => 400, 'message' => 'Floor plan 2D file size exceeds.']);

            }else{
                $floorPlan2DName = time() . '.' . $inputted_file_value->getClientOriginalExtension();
                $inputted_file_value->move(public_path('admin-panel/assets/property-images/floor-plan-2D/pre-construct/'), $floorPlan2DName);

                $_2d_section_session = Session::get('session_data');
                $create_array = [
                    'input_image_id'    => $request->get('input_image_id'),
                    'input_file'        => $floorPlan2DName,
                    'input_bedrooms'    => $request->get('input_bedrooms'),
                    'input_bathrooms'   => $request->get('input_bathrooms'),
                    'input_sqft'   => $request->get('input_sqft'),
                ];

                //for multiple
                $array = [];
                if($_2d_section_session) {
                    foreach ($_2d_section_session as $row) {
                        $array[] = $row;
                    }
//                    return count($array);exit();
//                    $count_array = count($array);
//                    if($count_array <= 1){
////                        return 'you can not upload more than one image';
//                        return response(['code' => 200, 'message' => 'Error! You can not upload more than one floor plan.']);
//                    }
//                    else{
//                        return 'you can upload image';
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
    public function edit_2d_image(Request $request){
        $params = $request->input();
        $allData = Session::get('session_data');
        $index = array_search($params['session_index_id'], array_column($allData, 'input_image_id'));
        $particularData = $allData[$index];

        $inputted_file_value = $request->file('input_file');
        if ($inputted_file_value) {

            //CHECK VALIDATION
            $validation_rule = 'required|image|mimes:jpg,webp,png';
            $validator = Validator::make($request->all(), [
                'input_file' => $validation_rule,
            ]);
            if ($validator->passes()) {
                $getSize = $inputted_file_value->getSize();
                if($getSize >=  2097152){
                    return response(['code' => 400, 'message' => 'Floor plan 2D file size exceeds.']);
                }else{
                    /*--- UNLINK IMAGE ---*/
                    $old_image = $particularData['input_file'];
                    $path = public_path('admin-panel/assets/property-images/floor-plan-2D/pre-construct/' . $old_image);
                    if (file_exists($path))
                        unlink($path);

                    $floorPlan2DName = time() . '.' . $inputted_file_value->getClientOriginalExtension();
                    $inputted_file_value->move(public_path('admin-panel/assets/property-images/floor-plan-2D/pre-construct/'), $floorPlan2DName);
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
    public function destroy_2d_floor_plan(Request  $request) {
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
    public function update_3d_section_on_session(Request $request){
        //CHECK VALIDATION
        $validation_rule = 'required|image|mimes:jpg,webp,png';
        $validator = Validator::make($request->all(), [
            'input_file' => $validation_rule,
        ]);
        if ($validator->passes()) {
            $inputted_file_value = $request->file('input_file');
            $getsize = $inputted_file_value->getSize();
            if($getsize >= 2097152){
                return response(['code' => 400, 'message' => 'Floor plan 3D file size exceeds.']);

            }else{
                $inputted_file_value = $request->file('input_file');
                $floorPlan3DName = time() . '.' . $inputted_file_value->getClientOriginalExtension();
                $inputted_file_value->move(public_path('admin-panel/assets/property-images/floor-plan-3D/pre-construct/'), $floorPlan3DName);

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
    public function edit_3d_image(Request $request){
        $params = $request->input();
        $allData = Session::get('session_3d_data');
        $index = array_search($params['session_index_id'], array_column($allData, 'input_image_id'));
        $particularData = $allData[$index];

        $inputted_file_value = $request->file('input_file');
        if ($inputted_file_value) {
            //CHECK VALIDATION
            $validation_rule = 'required|image|mimes:jpg,webp,png';
            $validator = Validator::make($request->all(), [
                'input_file' => $validation_rule,
            ]);
            if ($validator->passes()) {
                $getSize = $inputted_file_value->getSize();
                if($getSize >=  2097152){
                    return response(['code' => 400, 'message' => 'Floor plan 3D file size exceeds.']);
                }else{
                    /*--- UNLINK IMAGE ---*/
                    $old_image = $particularData['input_file'];
                    $path = public_path('admin-panel/assets/property-images/floor-plan-3D/pre-construct/' . $old_image);
                    if (file_exists($path))
                        unlink($path);

                    $floorPlan2DName = time() . '.' . $inputted_file_value->getClientOriginalExtension();
                    $inputted_file_value->move(public_path('admin-panel/assets/property-images/floor-plan-3D/pre-construct/'), $floorPlan2DName);
                }
            }else{
                return response(['code' => 404,'message' => 'Only png, jpg and webp file types are allowed.']);
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

        Session::remove('session_3d_data');
        Session::put('session_3d_data', $allData);

        return response(['message' => 'floor plan 3d edit data store in session','data'=> $allData[$index]]);
    }
    public function destroy_3d_floor_plan(Request  $request) {
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
    public function save_pre_construct_media_file(Request $request){
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
//        $validation_rule = ($mediaType == 'application/pdf') ? 'required|mimes:pdf' : 'required|image|mimes:jpg,webp,png';
        $validation_rule = 'required|image|mimes:jpg,webp,png';
        $validator = Validator::make($request->all(), [
            'file' => $validation_rule,
        ]);
        if ($validator->passes())
        {
            //PERFORM DATABASE OPERATION
            $propertyMedia = new PropertyMedia();
            $mediaName = time() . '.' . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('admin-panel/assets/property-images/media-file/pre-construct/'), $mediaName);
//            $size = File::size(public_path('admin-panel/assets/property-images/media-file/pre-construct/'. $mediaName));
//
//            return $size;
            $width = 910; $height = 622;
            $canvas = Image::canvas($width, $height);
            $image = Image::make(public_path('admin-panel/assets/property-images/media-file/pre-construct/'.$mediaName))->resize($width, $height,
                function ($constraint) {
                    $constraint->aspectRatio();
                });
            $canvas->insert($image, 'center');
            $canvas->save(public_path('admin-panel/assets/property-images/media-file/pre-construct/'.$mediaName));

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
    //DELETE FLOOR PLAN 2D WITH PROPERTY ID
    //DELETE FLOOR PLAN 2D WITH PROPERTY ID
    public function del_f_2d_plan_p_id(Request $request){

        /*$image_id = $request->get('image_id');
        $property_id = $request->get('property_id');
        $getAllSelectedPlan = FloorPlan2::query()->where('property_id','=',$property_id)->get();*/

//        return $getAllSelectedPlan;
//        $check_f_2d_id_with_type = Property::query()->where('id','=',$getAllSelectedPlan[0]->property_id)->get();
//        if(!empty($check_f_2d_id_with_type[0]->property_type)){
//            if($check_f_2d_id_with_type[0]->property_type == 'pre-construct'){

        /*$path1 = public_path('admin-panel/assets/property-images/floor-plan-2D/pre-construct/'. $getAllSelectedPlan[0]->images);
        if(file_exists($path1))
            unlink($path1);*/
//            }
//        }

        //DB::table('floor_plan2s')->where('id', '=', $image_id)->delete();



        $image_id = $request->get('image_id');
        $imageData = FloorPlan2::query()->where('id', $image_id)->first();
        if($imageData) {
            $file = public_path('admin-panel/assets/property-images/floor-plan-2D/pre-construct/'. $imageData->images);
            if(file_exists($file))
                unlink($file);
        }

        FloorPlan2::query()->where('id', $image_id)->delete();
        return response(['code' => 200, 'message' => 'Floor plan 2D has been deleted successfully!']);

//      return redirect('/admin/edit-pre-construct-property/'.$property_id)->with('success','Floor plan 2D has been deleted successfully!');
    }
    public function del_f_3d_plan_with_p_id(Request $request){
        $image_p_id = $request->get('image_p_id');
        $image3D_data = FloorPlan3::query()->where('id',$image_p_id)->first();
        if($image3D_data) {
            $file = public_path('admin-panel/assets/property-images/floor-plan-3D/pre-construct/'. $image3D_data->images);
            if(file_exists($file))
                unlink($file);
        }
        FloorPlan3::query()->where('id', $image_p_id)->delete();
        return response(['code' => 200, 'message' => 'Floor plan 3D has been deleted successfully!']);
//        return redirect('/admin/edit-pre-construct-property/'.$property_id)->with('success','Floor plan 3D has been deleted successfully!');
    }
    //UPDATE FLOOR PLAN WITH PROPERTY ID
    public function edit_f_2d_plan_with_p_id(Request $request){
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
//                $if_exists = FloorPlan2::query()->where('property_id',$request->get('input_property_id'))->get();
//
//                if($if_exists->count() == 0){
                $inputted_file_value = $request->file('input_file');
                $floorPlan2DName = time() . '.' . $inputted_file_value->getClientOriginalExtension();
                $inputted_file_value->move(public_path('admin-panel/assets/property-images/floor-plan-2D/pre-construct/'), $floorPlan2DName);

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
    public function edit_f_3d_plan_with_p_id(Request $request){
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
//                $if_exists = FloorPlan3::query()->where('property_id',$request->get('input_property_id'))->get();
//
//                if($if_exists->count() == 0){
//                    return 'upload new image';
                $inputted_file_value = $request->file('input_file');
                $floorPlan2DName = time() . '.' . $inputted_file_value->getClientOriginalExtension();
                $inputted_file_value->move(public_path('admin-panel/assets/property-images/floor-plan-3D/pre-construct/'), $floorPlan2DName);

                $_3d_section_session = Session::get('session_3d_data');
                $create_array = [
                    'input_image_id' => $request->get('input_image_id'),
                    'input_file' => $floorPlan2DName,
                    'input_bedrooms' => $request->get('input_bedrooms'),
                    'input_bathrooms' => $request->get('input_bathrooms'),
                    'input_sqft' => $request->get('input_sqft'),
                    'input_property_id' => $request->get('input_property_id'),
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
////                    return 'image is already exists in database';
//                    return response(['code' => 200, 'message' => 'Error! Floor plan already exists!']);
//                }
            }
        }else{
            return response(['code' => 404 ,'message' => 'Only png, jpg and webp file types are allowed.']);
        }
        return response(['message' => 'floor plan 3d data store in session','data'=> $create_array]);
    }
    //EDIT PRE-CONSTRUCT PROPERTY PAGE
    public function edit_pre_construct_property($propertyId){
        Session::forget('media_name');
//        if(Session::has('session_data')) {
//            Session::remove('session_data');
//        }
//        if(Session::has('session_3d_data')) {
//            Session::remove('session_3d_data');
//        }
        //GET PROPERTY DATA
        $pre_construct_data = DB::table('properties')
            ->where('id','=',$propertyId)->get();
        //GET MEDIA DATA
        $getMedia = DB::table('property_media')
            ->select('id','media_name','media_type')->where('property_id',$propertyId)->get();
        $f_plan_2d = DB::table('floor_plan2s')->where('property_id','=',$propertyId)->get();
        $f_plan_3d = DB::table('floor_plan3s')->where('property_id','=',$propertyId)->get();
        $getBanner_1 = Banner1::query()->where('property_id',$propertyId)->get();
        $getBanner_2 = Banner2::query()->where('property_id',$propertyId)->get();
        $getBanner_3 = Banner3::query()->where('property_id',$propertyId)->get();
        $getBanner_4 = Banner4::query()->where('property_id',$propertyId)->get();
        $getBanner_5 = Banner5::query()->where('property_id',$propertyId)->get();
        $getBanner_6 = Banner6::query()->where('property_id',$propertyId)->get();
        $getBanner_7 = Banner7::query()->where('property_id',$propertyId)->get();


        //GET AMENITIES DATA
        $checkBoxValue = Amenities::all();
        //get all country data
        $countries = Country::all();
        //get all state data
        $stateData = State::all();
        $agentData = Agent::all();
        $allCategory = Category::all();
//        echo '<pre>';
//        print_r($pre_construct_data);exit();
        return view('admin.pages.pre-construct-property.edit-pre-construct-property',compact('pre_construct_data','getMedia','checkBoxValue','countries','stateData','agentData'
        ,'f_plan_2d','f_plan_3d','allCategory','getBanner_1','getBanner_2','getBanner_3','getBanner_4', 'getBanner_5', 'getBanner_6', 'getBanner_7'));
    }
    //UPDATE PRE-CONSTRUCT PROPERTY
    public function update_pre_construct_property(Request $request,$propertyId){

        //CHECK VALIDATION
        $rules = [
            'description' => 'required',
            'address' => 'required',
            'banner1_img'  => 'image|mimes:webp|dimensions:width=730,height=160',
            'banner2_img'  => 'image|mimes:webp|dimensions:width=2500,height=342',
            'banner3_img'  => 'image|mimes:webp|dimensions:width=2500,height=322',
            'banner4_img'  => 'image|mimes:webp|dimensions:width=2500,height=280',
            'banner5_img'  => 'image|mimes:webp|dimensions:width=1404,height=445',
            'banner6_img'  => 'image|mimes:webp|dimensions:width=1404,height=445',
            'banner7_img'  => 'image|mimes:webp|dimensions:width=1404,height=445',
        ];
        $getMedia = PropertyMedia::query()->select('id')->where('property_id',$propertyId)->get()->toArray();
        if(!$getMedia) {
            $rules = array_merge($rules, ['media_name' => 'required|image|mimes:jpg,webp,png|max:2048']);
        }
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails())
        {
            return redirect('/admin/edit-pre-construct-property/'.$propertyId)->withErrors($validator)->withInput();
        }else {

            //PERFORM DATABASE OPERATION

            if ($request->hasFile('signUp_file')) {
                $getOldImage = Property::query()->where('id', $propertyId)->where('property_type','pre-construct')->first();
                //return $getOldImage->attachments;exit();
                if (File::exists(public_path('admin-panel/assets/attachments/signup/' . $getOldImage->attachments))) {
                    File::delete(public_path('admin-panel/assets/attachments/signup/' . $getOldImage->attachments));
                    $file = $request->file('signUp_file');
                    $mediaType = $file->getMimeType();
                    //return $mediaType;exit();
                    if($mediaType == 'text/html'){
                        $signUpFileName = 'signup_file'.time() . '.' . $file->extension();
                        $file->move(public_path('admin-panel/assets/attachments/signup/'), $signUpFileName);
                        Property::query()->where('id',$propertyId)->update(['attachments' => $signUpFileName]);
                    }
                }
            }

            if ($request->hasFile('newsletter_file')) {
                $getOldImage = Property::query()->where('id', $propertyId)->where('property_type','pre-construct')->first();
                //return $getOldImage->attachments;exit();
                if (File::exists(public_path('admin-panel/assets/attachments/newsletter/' . $getOldImage->newsletter_attachments))) {
                    File::delete(public_path('admin-panel/assets/attachments/newsletter/' . $getOldImage->newsletter_attachments));
                    $file = $request->file('newsletter_file');
                    $mediaType = $file->getMimeType();
                    if($mediaType == 'text/html'){
                        $newletterFileName = 'newsletter_file'.time() . '.' . $file->extension();
                        $file->move(public_path('admin-panel/assets/attachments/newsletter/'), $newletterFileName);
                        Property::query()->where('id',$propertyId)->update(['newsletter_attachments' => $newletterFileName]);
                    }
                }
            }
            //STORE MULTIPLE AMENITIES VALUES
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
                ->update(array(
//                    'title' => $request->get('title'),
                    'description' => $request->get('description'),
                    'price'                        => number_format((int) $request->get('price'),2,'.',','),
//                    'banner_1' => $imageName_1,
//                    'banner_2' => $imageName_2,
//                    'banner_3' => $imageName_3,
//                    'banner_4' => $imageName_4,
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
                    'from_size_in_sqft' => $request->get('from_size_in_ft'),
                    'to_size_in_sqft' => $request->get('to_size_in_ft'),
                    'from_rooms' => $request->get('from_rooms'),
                    'to_rooms' => $request->get('to_rooms'),
                    'from_bedrooms' => $request->get('from_bedrooms'),
                    'to_bedrooms' => $request->get('to_bedrooms'),
                    'from_bathrooms' => $request->get('from_bathrooms'),
                    'to_bathrooms' => $request->get('to_bathrooms'),
                    'from_parking_spots' => $request->get('from_parking_spots'),
                    'to_parking_spots' => $request->get('to_parking_spots'),
                    'rooms' => $request->get('rooms'),
                    'bedrooms' => $request->get('bedrooms'),
                    'bathrooms' => $request->get('bathrooms'),
                    'custom_id' => $request->get('custom_id'),
                    'year_built' => $request->get('year_built'),
                    'garages' => $request->get('garages'),
                    'available_from' => ($request->get('available_from')) ? date('Y-m-d',strtotime($request->get('available_from'))) : null,
                    'garage_size' => $request->get('garage_size'),
                    'external_construction' => $request->get('external_construction'),
                    'basement' => $request->get('basement'),
                    'exterior_material' => $request->get('exterior_material'),
                    'floor_plan_2D' => 0,
                    'floor_plan_3D' => 0,
                    'roofing' => $request->get('roofing'),
                    'floors_no' => $request->get('floors_no'),
                    'structure_type' => $request->get('structure_type'),
                    'owner_agent_note' => $request->get('owner_agent_note'),
                    'property_status' => $request->get('property_status'),
                    'agent_id' => $request->get('agent'),
                    'amenities_feature' => ($checkArray) ? implode(',', $checkArray) : 0,
                    'video_from' => $request->get('video_from'),
                    'virtual_tour' => $request->get('virtual_tour'),
                    'most_recent_upload' => '1',
//                    'attachments' => $signUpFileName. ',' .$newletterFileName,
                ));
            $request->session()->put('property_id',$propertyId);
            //update floor plan 2d
            if(Session::has('session_data')){
                $_2d_floor_section_session = Session::get('session_data');
                $_2d_insert_array = [];
                foreach($_2d_floor_section_session as $_2d_row) {
                    $_2d_insert_array[] = [
                        'property_id'    => $_2d_row['input_property_id'],
                        'images'         => $_2d_row['input_file'],
                        'no_of_bedrooms' => $_2d_row['input_bedrooms'],
                        'no_of_bathrooms'=> $_2d_row['input_bathrooms'],
                        'sqft'=> $_2d_row['input_sqft'],
                    ];
                }
                if($_2d_insert_array) {
                    FloorPlan2::query()->insert($_2d_insert_array);
                    Session::remove('session_data');
                }
            }

            //update floor plan 3d
            if(Session::has('session_3d_data')){
                $_3d_floor_section_session = Session::get('session_3d_data');
                $_3d_insert_array = [];
                foreach($_3d_floor_section_session as $_3d_row) {
                    $_3d_insert_array[] = [
                        'property_id'    => $_3d_row['input_property_id'],
                        'images'         => $_3d_row['input_file'],
                        'no_of_bedrooms' => $_3d_row['input_bedrooms'],
                        'no_of_bathrooms'=> $_3d_row['input_bathrooms'],
                        'sqft'=> $_3d_row['input_sqft'],
                    ];
                }
                if($_3d_insert_array) {
                    FloorPlan3::query()->insert($_3d_insert_array);
                    Session::remove('session_3d_data');
                }
            }

            //Upload banner image 1
            if ($request->hasFile('banner1_img')) {
                $file_1 = $request->file('banner1_img');
                $imageName_1 = time() . '.' . $file_1->extension();
                $file_1->move(public_path('admin-panel/assets/property-images/banner-1/'), $imageName_1);

                $banner_1_data = new Banner1();
                $banner_1_data->property_id = $propertyId;
                $banner_1_data->banner_1 = $imageName_1;
                $banner_1_data->save();

            } else {
                $imageName_1 = null;
            }

            //Upload banner image 2
            if ($request->hasFile('banner2_img')) {
                $file_2 = $request->file('banner2_img');
                $imageName_2 = time() . '.' . $file_2->extension();
                $file_2->move(public_path('admin-panel/assets/property-images/banner-2/'), $imageName_2);

                $banner_2_data = new Banner2();
                $banner_2_data->property_id = $propertyId;
                $banner_2_data->banner_2 = $imageName_2;
                $banner_2_data->save();
            } else {
                $imageName_2 = null;
            }

            //Upload banner image 3
            if ($request->hasFile('banner3_img')) {
                $file_3 = $request->file('banner3_img');
                $imageName_3 = time() . '.' . $file_3->extension();
                $file_3->move(public_path('admin-panel/assets/property-images/banner-3/'), $imageName_3);

                $banner_3_data = new Banner3();
                $banner_3_data->property_id = $propertyId;
                $banner_3_data->banner_3 = $imageName_3;
                $banner_3_data->save();
            } else {
                $imageName_3 = null;
            }

            //Upload banner image 4
            if ($request->hasFile('banner4_img')) {
                $file_4 = $request->file('banner4_img');
                $imageName_4 = time() . '.' . $file_4->extension();
                $file_4->move(public_path('admin-panel/assets/property-images/banner-4/'), $imageName_4);

                $banner_4_data = new Banner4();
                $banner_4_data->property_id = $propertyId;
                $banner_4_data->banner_4 = $imageName_4;
                $banner_4_data->save();

            } else {
                $imageName_4 = null;
            }

            //Upload banner image 5
            if ($request->hasFile('banner5_img')) {
                $file_5 = $request->file('banner5_img');
                $imageName_5 = time() . '.' . $file_5->extension();
                $file_5->move(public_path('admin-panel/assets/property-images/banner-5/'), $imageName_5);

                $banner_5_data = new Banner5();
                $banner_5_data->property_id = $propertyId;
                $banner_5_data->banner_5 = $imageName_5;
                $banner_5_data->save();

            } else {
                $imageName_5 = null;
            }

            //Upload banner image 6
            if ($request->hasFile('banner6_img')) {
                $file_6 = $request->file('banner6_img');
                $imageName_6 = time() . '.' . $file_6->extension();
                $file_6->move(public_path('admin-panel/assets/property-images/banner-6/'), $imageName_6);

                $banner_6_data = new Banner6();
                $banner_6_data->property_id = $propertyId;
                $banner_6_data->banner_6 = $imageName_6;
                $banner_6_data->save();

            } else {
                $imageName_6 = null;
            }

            //Upload banner image 7
            if ($request->hasFile('banner7_img')) {
                $file_7 = $request->file('banner7_img');
                $imageName_7 = time() . '.' . $file_7->extension();
                $file_7->move(public_path('admin-panel/assets/property-images/banner-7/'), $imageName_7);

                $banner_7_data = new Banner7();
                $banner_7_data->property_id = $propertyId;
                $banner_7_data->banner_7 = $imageName_7;
                $banner_7_data->save();

            } else {
                $imageName_7 = null;
            }
        }
        return redirect('/admin/list-pre-construct-property')->with('success','Property has been updated successfully!');
    }
    //UPDATE MEDIA-FILE USING AJAX
    public function update_pre_construct_media_file(Request $request){
        $file = $request->file('file');
        //GET MIME TYPE
        $mediaType = $file->getMimeType();
        //GET SIZE
        $getMediaSize = $file->getSize();
        if($getMediaSize >= 2097152){
            //ERROR MESSAGE
            return ['code' => 404, 'message' => 'Error! Media file size exceeds.'];
        }
        //CHECK-VALIDATION
//        $validation_rule = ($mediaType == 'application/pdf') ? 'required|mimes:pdf' : 'required|image|mimes:jpg,webp,png';
        $validation_rule = 'required|image|mimes:jpg,webp,png';
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
                $width = 910; $height = 622;
                $canvas = Image::canvas($width, $height);
                $image = Image::make(public_path('admin-panel/assets/property-images/media-file/pre-construct/'.$mediaName))->resize($width, $height,
                    function ($constraint) {
                        $constraint->aspectRatio();
                    });
                $canvas->insert($image, 'center');
                $canvas->save(public_path('admin-panel/assets/property-images/media-file/pre-construct/'.$mediaName));
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
            return ['code' => 500, 'message' => 'Error! only png, jpg and webp file types are allowed.'];
        }
    }
    //delete pre-construct page
    public function deletePreConstructProperty($propertyId){
        if(Session::has('media_name')){
            Session::remove('media_name');
        }
        $preConstructionPropertyData = Property::findOrFail($propertyId);
        $preConstructionPropertyData->delete();
        return redirect('/admin/list-pre-construct-property')->with('success', 'Property has been deleted successfully!');
    }
    //UPDATE PENDING PROPERTY STATUS
    public function propertyStatus($statusId)
    {
        $propertyStatus = Property::where('id',$statusId)->pluck('internal_status');
        if($propertyStatus[0] == 1)
        {
            $update = array('internal_status' => 0);
            DB::table('properties')->where('id', $statusId)->update($update);
            return redirect('/admin/list-pre-construct-property')->with('success','Success! Property has been deleted successfully!');
        }else{
            $update = array('internal_status' => 0);
            DB::table('properties')->where('id', $statusId)->update($update);
            return redirect('/admin/list-pre-construct-property')->with('success','Success! Property has been approved successfully!');
        }
        return redirect()->back();
    }
    //ALL PRE-CONSTRUCT-PROPERTY
    public function all_property(){
        $all_pre_construct_property = Property::query()->where('property_type','=','pre-construct')->orderBy('id','desc')->with('cat_details')->get();
        return view('admin.pages.pre-construct-property.all-pre-construct-property',compact('all_pre_construct_property'));
    }
    //ALL Active PRE-CONSTRUCT-PROPERTY
    public function all_active_property(){
        $active_pre_construct_property = Property::query()->where('property_type','=','pre-construct')->where('internal_status','=','1')->orderBy('id','desc')->with('cat_details')->get();
        return view('admin.pages.pre-construct-property.active-pre-construct-property',compact('active_pre_construct_property'));
    }
    //ALL Deleted PRE-CONSTRUCT-PROPERTY
    public function all_deleted_property(){
        $deleted_pre_construct_property = Property::query()->where('property_type','=','pre-construct')->where('internal_status','=','0')->orderBy('id','desc')->with('cat_details')->get();
        return view('admin.pages.pre-construct-property.deleted-pre-construct-property',compact('deleted_pre_construct_property'));
    }
    //saved del plan-2d-images edit form
    public function destroy_pre_construct_plan_2d_image(Request $request){
        $image_id       = $request->input('image_id');
        $floor_plan_2d_image  = FloorPlan2::find($image_id);
        if(!empty($floor_plan_2d_image->images)) {
            $path = public_path('admin-panel/assets/property-images/floor-plan-2D/pre-construct/'.  $floor_plan_2d_image->images);
            if(file_exists($path)) unlink($path);
        }
        DB::table('floor_plan2s')->where('id', '=', $image_id)->delete();
        return ['code' => 200, 'message' => 'floor 2d plan image Deleted'];
    }
    //saved del plan-3d-images edit form
    public function destroy_pre_construct_plan_3d_image(Request $request){
        $image_id       = $request->input('image_id');
        $floor_plan_3d_image  = FloorPlan3::find($image_id);
        if(!empty($floor_plan_3d_image->images)) {

            $path = public_path('admin-panel/assets/property-images/floor-plan-3D/pre-construct/'.  $floor_plan_3d_image->images);
            if(file_exists($path)) unlink($path);
        }
        DB::table('floor_plan3s')->where('id', '=', $image_id)->delete();
        return ['code' => 200, 'message' => 'floor 3d plan image Deleted'];
    }
    //add pre-construct category
    public function addCategory(){
        if(Session::has('media_name')){
            Session::remove('media_name');
        }
        if(Session::has('session_data')) {
            Session::remove('session_data');
        }
        if(Session::has('session_3d_data')) {
            Session::remove('session_3d_data');
        }
        return view('admin.pages.property-category.add-category');
    }
    public function storeCategory(Request $request){
        if(Session::has('media_name')){
            Session::remove('media_name');
        }
        if(Session::has('session_data')) {
            Session::remove('session_data');
        }
        if(Session::has('session_3d_data')) {
            Session::remove('session_3d_data');
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name',
        ]);
        if ($validator->fails()) {
            return redirect('/admin/add-category')->withErrors($validator)->withInput();
        }else{
            $catData = new Category(array(
                'name' => $request->get('name'),
                'status' => '0'
            ));
            $catData->save();
            return redirect('/admin/view-category')->with('success','Success category created!');
        }
    }
    //view-category
    public function showCategory(){
        $allCategory = Category::query()->orderBy('id', 'desc')->get();
        return view('admin.pages.property-category.view-category',compact('allCategory'));
    }
    //edit-category
    public function EditCategory($catId){
        if(Session::has('media_name')){
            Session::remove('media_name');
        }
        if(Session::has('session_data')) {
            Session::remove('session_data');
        }
        if(Session::has('session_3d_data')) {
            Session::remove('session_3d_data');
        }
        //return $catId;exit();
        $cat_data = Category::query()
            ->where('id','=',$catId)->get();
        return view('admin.pages.property-category.edit-category',compact('cat_data'));
    }
    //update-category
    public function UpdateCategory(Request $request,$catId){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
        ]);
        if ($validator->fails()) {
            return redirect('/admin/add-category')->withErrors($validator)->withInput();
        }else{
            Category::query()->where('id','=',$catId)
                ->update(['name' => $request->get('name')]);
        }
        return redirect('/admin/view-category')->with('success','Success! Category Updated.');
    }
    //delete Category
    public function DeleteCategory($catId){
        $cat_data = Category::findOrFail($catId);
        $cat_data->delete();
        return redirect('/admin/view-category')->with('success','Success! Category Deleted.');
    }
    public function cat_status($statusId)
    {
        $categoryStatus = Category::query()->where('id',$statusId)->pluck('status');

        if($categoryStatus[0] == 0)
        {
            $update = array('status' => 1);
            DB::table('categories')->where('id', $statusId)->update($update);
            return redirect('/admin/view-category')->with('success','Success! Category now approved.');
        }else{
            $update = array('status' => 0);
            DB::table('categories')->where('id', $statusId)->update($update);
            return redirect('/admin/view-category')->with('success','Success! Category Deactive.');
        }
        return redirect()->back();
    }

    public function testingImage()
    {
        $destination_image = public_path('admin-panel/assets/property-images/media-file/pre-construct/1675756408.jpg');
        return $this->resize($destination_image, $destination_image, 910, 622);
    }
    public function destroy_b_1(Request $request){
        $get_b1_id = $request->get('b_1_id');
        if($get_b1_id){
            $getImage = Banner1::query()->where('property_id',$get_b1_id)->get();
            $path = public_path('admin-panel/assets/property-images/banner-1/'.$getImage[0]->banner_1);
            if(File::exists($path)){
                File::delete($path);
            }
            Banner1::query()->where('property_id',$get_b1_id)->delete();
            return ['code' => '200', 'message' => 'Banner 1 deleted successfully.'];
        }
        return ['code' => '404', 'message' => 'Banner 1 id not found!'];
    }
    //delete banner 2
    public function destroy_b_2(Request $request){
        $get_b2_id = $request->get('b_2_id');
        if($get_b2_id){
            $getImage = Banner2::query()->where('property_id',$get_b2_id)->get();
            $path = public_path('admin-panel/assets/property-images/banner-2/'.$getImage[0]->banner_2);
            if(File::exists($path)){
                File::delete($path);
            }
            Banner2::query()->where('property_id',$get_b2_id)->delete();
            return ['code' => '200', 'message' => 'Banner 2 deleted successfully.'];
        }
        return ['code' => '404', 'message' => 'Banner 2 id not found!'];
    }
    //delete banner 3
    public function destroy_b_3(Request $request){
        $get_b3_id = $request->get('b_3_id');
        if($get_b3_id){
            $getImage = Banner3::query()->where('property_id',$get_b3_id)->get();
            $path = public_path('admin-panel/assets/property-images/banner-3/'.$getImage[0]->banner_3);
            if(File::exists($path)){
                File::delete($path);
            }
            Banner3::query()->where('property_id',$get_b3_id)->delete();
            return ['code' => '200', 'message' => 'Banner 3 deleted successfully.'];
        }
        return ['code' => '404', 'message' => 'Banner 3 id not found!'];
    }
    //delete banner 4
    public function destroy_b_4(Request $request){
        $get_b4_id = $request->get('b_4_id');
        if($get_b4_id){
            $getImage = Banner4::query()->where('property_id',$get_b4_id)->get();
            $path = public_path('admin-panel/assets/property-images/banner-4/'.$getImage[0]->banner_4);
            if(File::exists($path)){
                File::delete($path);
            }
            Banner4::query()->where('property_id',$get_b4_id)->delete();
            return ['code' => '200', 'message' => 'Banner 4 deleted successfully.'];
        }
        return ['code' => '404', 'message' => 'Banner 4 id not found!'];
    }

    // 5
    public function destroy_b_5(Request $request){
        $get_b5_id = $request->get('b_5_id');
        if($get_b5_id){
            $getImage = Banner5::query()->where('property_id',$get_b5_id)->get();
            $path = public_path('admin-panel/assets/property-images/banner-5/'.$getImage[0]->banner_5);
            if(File::exists($path)){
                File::delete($path);
            }
            Banner5::query()->where('property_id',$get_b5_id)->delete();
            return ['code' => '200', 'message' => 'Banner 5 deleted successfully.'];
        }
        return ['code' => '404', 'message' => 'Banner 5 id not found!'];
    }

    // 6
    public function destroy_b_6(Request $request){
        $get_b6_id = $request->get('b_6_id');
        if($get_b6_id){
            $getImage = Banner6::query()->where('property_id',$get_b6_id)->get();
            $path = public_path('admin-panel/assets/property-images/banner-6/'.$getImage[0]->banner_6);
            if(File::exists($path)){
                File::delete($path);
            }
            Banner6::query()->where('property_id',$get_b6_id)->delete();
            return ['code' => '200', 'message' => 'Banner 6 deleted successfully.'];
        }
        return ['code' => '404', 'message' => 'Banner 6 id not found!'];
    }

    // 7
    public function destroy_b_7(Request $request){
        $get_b7_id = $request->get('b_7_id');
        if($get_b7_id){
            $getImage = Banner7::query()->where('property_id',$get_b7_id)->get();
            $path = public_path('admin-panel/assets/property-images/banner-7/'.$getImage[0]->banner_7);
            if(File::exists($path)){
                File::delete($path);
            }
            Banner7::query()->where('property_id',$get_b7_id)->delete();
            return ['code' => '200', 'message' => 'Banner 7 deleted successfully.'];
        }
        return ['code' => '404', 'message' => 'Banner 7 id not found!'];
    }

    // add banner using ajax
    public function add_banner_1(Request $request){
        //CHECK VALIDATION
        $validation_rule = 'required|image|mimes:webp';
        $validator = Validator::make($request->all(), [
            'banner_1_file' => $validation_rule,
        ]);

        if ($validator->passes()){

            $inputted_file_value = $request->file('banner_1_file');
            $data = getimagesize($inputted_file_value);
            $width = $data[0];
            $height = $data[1];

            if($width == 730 && $height == 160){
                $bannerName1 = time() . '.' . $inputted_file_value->getClientOriginalExtension();
                $inputted_file_value->move(public_path('admin-panel/assets/property-images/banner-1/'), $bannerName1);

                Session::get('session_data_banner_1');

                    $create_array_1 = [
                        'banner_1_id'    => $request->get('banner_1_id'),
                        'banner_1_file'  => $bannerName1,
                    ];

                Session::remove('session_data_banner_1');
                Session::put('session_data_banner_1',$create_array_1);

            }else{
                return response(['code' => 400, 'message' => 'Height and Width must not exceed to 730 X 160 dimensions!']);
            }
        }else{
            return response(['code' => 404,'message' => 'Only image extension webp is allowed!']);
        }
        return response(['code' => 500,'message' => 'Banner 1 has been added successfully','data'=> $create_array_1]);
    }
    // delete banner 1
    public function del_banner_1(Request $request){
       $getSession = Session::get('session_data_banner_1');

       if(Session::has('session_data_banner_1') && $getSession != ''){
           Session::remove('session_data_banner_1');
       }
        return ['code' => 200, 'message' => 'Banner 1 has been deleted successfully'];
    }
    // add banner using ajax
    public function add_banner_2(Request $request){
        //CHECK VALIDATION
        $validation_rule = 'required|image|mimes:webp';
        $validator = Validator::make($request->all(), [
            'banner_2_file' => $validation_rule,
        ]);

        if ($validator->passes()){

            $inputted_file_value = $request->file('banner_2_file');
            $data = getimagesize($inputted_file_value);
            $width = $data[0];
            $height = $data[1];

            if($width == 2500 && $height == 342){
                $bannerName2 = time() . '.' . $inputted_file_value->getClientOriginalExtension();
                $inputted_file_value->move(public_path('admin-panel/assets/property-images/banner-2/'), $bannerName2);

                Session::get('session_data_banner_2');

                $create_array_2 = [
                    'banner_2_id'    => $request->get('banner_2_id'),
                    'banner_2_file'  => $bannerName2,
                ];

                Session::remove('session_data_banner_2');
                Session::put('session_data_banner_2',$create_array_2);

            }else{
                return response(['code' => 400, 'message' => 'Height and Width must not exceed to 2500 X 342 dimensions!']);
            }
        }else{
            return response(['code' => 404,'message' => 'Only image extension webp is allowed!']);
        }
        return response(['code' => 500,'message' => 'Banner 2 has been added successfully','data'=> $create_array_2]);
    }
    //delete banner 1
    public function del_banner_2(Request $request){
        $getSession = Session::get('session_data_banner_2');

        if(Session::has('session_data_banner_2') && $getSession != ''){
            Session::remove('session_data_banner_2');
        }
        return ['code' => 200, 'message' => 'Banner 2 has been deleted successfully'];
    }
    // add banner using ajax
    public function add_banner_3(Request $request){
        //CHECK VALIDATION
        $validation_rule = 'required|image|mimes:webp';
        $validator = Validator::make($request->all(), [
            'banner_3_file' => $validation_rule,
        ]);

        if ($validator->passes()){

            $inputted_file_value = $request->file('banner_3_file');
            $data = getimagesize($inputted_file_value);
            $width = $data[0];
            $height = $data[1];

            if($width == 2500 && $height == 322){
                $bannerName3 = time() . '.' . $inputted_file_value->getClientOriginalExtension();
                $inputted_file_value->move(public_path('admin-panel/assets/property-images/banner-3/'), $bannerName3);

                Session::get('session_data_banner_3');

                $create_array_3 = [
                    'banner_3_id'    => $request->get('banner_3_id'),
                    'banner_3_file'  => $bannerName3,
                ];

                Session::remove('session_data_banner_3');
                Session::put('session_data_banner_3',$create_array_3);

            }else{
                return response(['code' => 400, 'message' => 'Height and Width must not exceed to 2500 X 322 dimensions!']);
            }
        }else{
            return response(['code' => 404,'message' => 'Only image extension webp is allowed!']);
        }
        return response(['code' => 500,'message' => 'Banner 3 has been added successfully','data'=> $create_array_3]);
    }
    // delete banner 3
    public function del_banner_3(Request $request){
        $getSession = Session::get('session_data_banner_3');

        if(Session::has('session_data_banner_3') && $getSession != ''){
            Session::remove('session_data_banner_3');
        }
        return ['code' => 200, 'message' => 'Banner 3 has been deleted successfully'];
    }
    // add banner using ajax
    public function add_banner_4(Request $request){
        //CHECK VALIDATION
        $validation_rule = 'required|image|mimes:webp';
        $validator = Validator::make($request->all(), [
            'banner_4_file' => $validation_rule,
        ]);

        if ($validator->passes()){

            $inputted_file_value = $request->file('banner_4_file');
            $data = getimagesize($inputted_file_value);
            $width = $data[0];
            $height = $data[1];

            if($width == 2500 && $height == 280){
                $bannerName4 = time() . '.' . $inputted_file_value->getClientOriginalExtension();
                $inputted_file_value->move(public_path('admin-panel/assets/property-images/banner-4/'), $bannerName4);

                Session::get('session_data_banner_4');

                $create_array_4 = [
                    'banner_4_id'    => $request->get('banner_4_id'),
                    'banner_4_file'  => $bannerName4,
                ];

                Session::remove('session_data_banner_4');
                Session::put('session_data_banner_4',$create_array_4);

            }else{
                return response(['code' => 400, 'message' => 'Height and Width must not exceed to 2500 X 280 dimensions!']);
            }
        }else{
            return response(['code' => 404,'message' => 'Only image extension webp is allowed!']);
        }
        return response(['code' => 500,'message' => 'Banner 4 has been added successfully','data'=> $create_array_4]);
    }
    //delete banner 4
    public function del_banner_4(Request $request){
        $getSession = Session::get('session_data_banner_4');

        if(Session::has('session_data_banner_4') && $getSession != ''){
            Session::remove('session_data_banner_4');
        }
        return ['code' => 200, 'message' => 'Banner 4 has been deleted successfully'];
    }

    // new banners
    public function add_banner_5(Request $request){
        //CHECK VALIDATION
        $validation_rule = 'required|image|mimes:webp';
        $validator = Validator::make($request->all(), [
            'banner_5_file' => $validation_rule,
        ]);

        if ($validator->passes()){

            $inputted_file_value = $request->file('banner_5_file');
            $data = getimagesize($inputted_file_value);
            $width = $data[0];
            $height = $data[1];

            if($width == 1404 && $height == 445){
                $bannerName4 = time() . '.' . $inputted_file_value->getClientOriginalExtension();
                $inputted_file_value->move(public_path('admin-panel/assets/property-images/banner-5/'), $bannerName4);

                Session::get('session_data_banner_5');

                $create_array_5 = [
                    'banner_5_id'    => $request->get('banner_5_id'),
                    'banner_5_file'  => $bannerName4,
                ];

                Session::remove('session_data_banner_5');
                Session::put('session_data_banner_5',$create_array_5);

            }else{
                return response(['code' => 400, 'message' => 'Height and Width must not exceed to 1404 X 445 dimensions!']);
            }
        }else{
            return response(['code' => 404,'message' => 'Only image extension webp is allowed!']);
        }
        return response(['code' => 500,'message' => 'Banner 5 has been added successfully','data'=> $create_array_5]);
    }
    //delete banner 4
    public function del_banner_5(Request $request){
        $getSession = Session::get('session_data_banner_5');

        if(Session::has('session_data_banner_5') && $getSession != ''){
            Session::remove('session_data_banner_5');
        }
        return ['code' => 200, 'message' => 'Banner 5 has been deleted successfully'];
    }

    // 6
    public function add_banner_6(Request $request){
        //CHECK VALIDATION
        $validation_rule = 'required|image|mimes:webp';
        $validator = Validator::make($request->all(), [
            'banner_6_file' => $validation_rule,
        ]);

        if ($validator->passes()){

            $inputted_file_value = $request->file('banner_6_file');
            $data = getimagesize($inputted_file_value);
            $width = $data[0];
            $height = $data[1];

            if($width == 1404 && $height == 445){
                $bannerName4 = time() . '.' . $inputted_file_value->getClientOriginalExtension();
                $inputted_file_value->move(public_path('admin-panel/assets/property-images/banner-6/'), $bannerName4);

                Session::get('session_data_banner_6');

                $create_array_6 = [
                    'banner_6_id'    => $request->get('banner_6_id'),
                    'banner_6_file'  => $bannerName4,
                ];

                Session::remove('session_data_banner_6');
                Session::put('session_data_banner_6',$create_array_6);

            }else{
                return response(['code' => 400, 'message' => 'Height and Width must not exceed to 1404 X 445 dimensions!']);
            }
        }else{
            return response(['code' => 404,'message' => 'Only image extension webp is allowed!']);
        }
        return response(['code' => 500,'message' => 'Banner 6 has been added successfully','data'=> $create_array_6]);
    }
    //delete banner 4
    public function del_banner_6(Request $request){
        $getSession = Session::get('session_data_banner_6');

        if(Session::has('session_data_banner_6') && $getSession != ''){
            Session::remove('session_data_banner_6');
        }
        return ['code' => 200, 'message' => 'Banner 6 has been deleted successfully'];
    }

    // 7
    public function add_banner_7(Request $request){
        //CHECK VALIDATION
        $validation_rule = 'required|image|mimes:webp';
        $validator = Validator::make($request->all(), [
            'banner_7_file' => $validation_rule,
        ]);

        if ($validator->passes()){

            $inputted_file_value = $request->file('banner_7_file');
            $data = getimagesize($inputted_file_value);
            $width = $data[0];
            $height = $data[1];

            if($width == 1404 && $height == 445){
                $bannerName4 = time() . '.' . $inputted_file_value->getClientOriginalExtension();
                $inputted_file_value->move(public_path('admin-panel/assets/property-images/banner-7/'), $bannerName4);

                Session::get('session_data_banner_7');

                $create_array_7 = [
                    'banner_7_id'    => $request->get('banner_7_id'),
                    'banner_7_file'  => $bannerName4,
                ];

                Session::remove('session_data_banner_7');
                Session::put('session_data_banner_7',$create_array_7);

            }else{
                return response(['code' => 400, 'message' => 'Height and Width must not exceed to 1404 X 445 dimensions!']);
            }
        }else{
            return response(['code' => 404,'message' => 'Only image extension webp is allowed!']);
        }
        return response(['code' => 500,'message' => 'Banner 7 has been added successfully','data'=> $create_array_7]);
    }
    //delete banner 4
    public function del_banner_7(Request $request){
        $getSession = Session::get('session_data_banner_7');

        if(Session::has('session_data_banner_7') && $getSession != ''){
            Session::remove('session_data_banner_7');
        }
        return ['code' => 200, 'message' => 'Banner 7 has been deleted successfully'];
    }
}
