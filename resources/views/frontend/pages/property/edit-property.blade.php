@extends('frontend.layout.master')
@section('title')
    <title>Tuntunji Realty | Edit Property</title>
    {{--    <title>Submit Property </title>--}}
    <style>
        input[type="file"] {
            display: none;
        }
        .img-container {
            float: left;
            /*width: 33.33%;*/
            padding: 5px;
        }

        /*.clearfix::after {*/
        /*    content: "";*/
        /*    clear: both;*/
        /*    display: table;*/
        /*}*/
        div.imagecls img {
            padding:5px; /* adjust this based on your need */
        }
    </style>
    <!-- image preview for floor-plan -->
    <style>

        .imageThumb {
            max-height: 75px;
            /*border: 2px solid;*/
            padding: 1px;
            cursor: pointer;
        }
        .pip {
            display: inline-block;
            margin: 10px 10px 0 0;
        }
        .remove {
            display: block;
            /*background: #444;*/
            /*border: 1px solid black;*/
            /*color: white;*/
            text-align: center;
            cursor: pointer;
        }
        .remove:hover {
            background: white;
            color: black;
        }
    </style>
@endsection
@section('date-picker-css')
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
          rel = "stylesheet">
    <style>
        .ui-widget-header{
            background: #1ED65F;
            border-color:#1ED65F;
            font-weight: normal;
        }
        .ui-state-default, .ui-widget-content .ui-state-default{
            color: #909090;
            font-weight: normal;
        }
        .ui-widget-content{
            color: #666;
            font-weight: normal;
        }
        .ui-state-highlight, .ui-widget-content .ui-state-highlight{
            background: #1ED65F;
            border-color:#1ED65F;
            color: darkslategrey;
        }
        .ui-state-active, .ui-widget-content .ui-state-active{
            border: 1px solid #1ED65F;
            background: white;
        }
        .ui-state-hover, .ui-widget-content .ui-state-hover{
            border: 1px solid #1ED65F;
            background: #99d6bb;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @include('frontend.include.navbar')
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-color:#EFEFEF; margin-top: -35px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box-silver" style="padding-top: 60px; padding-bottom: 20px;">
                        <a href="{{url('/my-properties')}}" class="text-dark"><i class="fas fa-arrow-left top-22" style="top: 60px;"></i></a>
                        <h3 class="fs-18 text-center fw-700">Property Details (0 %)</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="{{url('/edit-property',$propertyData[0]->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <!-- validation-error message -->
            @if($errors->any())
                <div class="alert alert-danger" style="margin-top: 30px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <p><strong>Opps Something went wrong</strong></p>
                    <ul id="error_list">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if( Session::has( 'success' ))
                <div class="alert alert-success" style="margin-top: 30px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success! </strong>{{ Session::get( 'success' ) }}
                </div>
            @endif
                <!-- new-form box-5 property-location start here -->
                <div class="box-white mt-60">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="fs-18 fw-700">Listing Location</h3>
                        <p class="fs-16 fw-400 text-grey">Use the button to save your property location on the map as well.</p>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="propertyAddress" class="fs-18">Address</label>
                            <input type="text" class="form-control h-11" name="propertyAddress" id="propertyAddress" value="{{$propertyData[0]->address}}">
                        </div>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-lg-12">
                        <div class="form-row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="propertyCountry" class="fs-18">Country</label>
                                    <select class="form-control h-11" name="propertyCountry" id="propertyCountry">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country->id}}" @if($country->id == $propertyData[0]->country) selected @endif>
                                                {{$country->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{--                                    <div class="col-lg-6">--}}
                            {{--                                        <div class="form-group">--}}
                            {{--                                            <label for="propertyCity" class="fs-18">City</label>--}}
                            {{--                                            <select class="form-control h-11" name="propertyCity" id=propertyCity">--}}
                            {{--                                                <option value="none" @if($propertyData[0]->city == 'none') ? selected : null @endif>None</option>--}}
                            {{--                                                <option value="oakland" @if($propertyData[0]->city == 'oakland') ? selected : null @endif>Oakland</option>--}}
                            {{--                                                <option value="san francisco" @if($propertyData[0]->city == 'san francisco') ? selected : null @endif>San Francisco</option>--}}
                            {{--                                            </select>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="propertyCountryState" class="fs-18">State/Province</label>
                                    <select class="form-control h-11" name="propertyCountryState" id="state_dropdown">
                                        <option value="">Select State/Province</option>
                                        @foreach($stateData as $states)
                                            <option value="{{$states->id}}" @if($states->id == $propertyData[0]->country_state) selected @endif>{{$states->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-lg-12">
                        <div class="form-row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="propertyCity" class="fs-18">City</label>
                                    <input type="text" class="form-control h-11" name="propertyCity" id="propertyCity" value="{{$propertyData[0]->city}}" onkeydown="return /[a-z]/i.test(event.key)" maxlength="25"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="propertyZip" class="fs-18">Zip/Postal Code</label>
                                    <input type="text" class="form-control h-11" name="propertyZip" id="propertyZip" value="{{$propertyData[0]->zip}}" pattern="\d{5}(?:-\d{4})?|^([ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ])\ {0,1}(\d[ABCEGHJKLMNPRSTVWXYZ]\d)$" placeholder="Enter Zip/Postal code"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-lg-12">
                        <div class="form-row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{--                                        <label for="propertyCity" class="fs-18">Latitiude</label>--}}
                                    <input type="hidden" class="form-control h-11" id="latitude" name="latitude" readonly value="{{$propertyData[0]->latitude}}"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{--                                        <label for="propertyZip" class="fs-18">Longitude</label>--}}
                                    <input type="hidden" class="form-control h-11" id="longitude" name="longitude" readonly value="{{$propertyData[0]->longitude}}"/>
                                </div>
                            </div>
                            {{--                                    <div class="col-lg-6">--}}
                            {{--                                        <div class="form-group">--}}
                            {{--                                            <label for="propertyCountry" class="fs-18">Country</label>--}}
                            {{--                                            <select class="form-control h-11" name="propertyCountry" id="propertyCountry">--}}
                            {{--                                                <option value="india" @if($propertyData[0]->country == 'india') ? selected : null @endif>India</option>--}}
                            {{--                                                <option value="united states" @if($propertyData[0]->country == 'united states') ? selected : null @endif>United States</option>--}}
                            {{--                                                <option value="canada"  @if($propertyData[0]->country == 'canada') ? selected : null @endif>Canada</option>--}}
                            {{--                                            </select>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                        </div>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-lg-12">
                        <h3 class="fs-18 mt-20">Place pin with property address</h3>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div id="map_12" style="height:500px;"></div>
                            {{--                                        <label for="propertyLongitude" class="fs-18">Longitude (for Google Maps)</label>--}}
                            {{--                                        <input type="text" class="form-control h-11" name="propertyLongitude" id="propertyLongitude" placeholder="Enter longitude"/>--}}
                            {{--                                    <button type="button" id="mapBtn" name="mapBtn" class="btn btn-primary">Add Location</button>--}}
                        </div>
                    </div>
                </div>

            </div>
                <!-- new-form box-5 property-location end here -->
                <!-- new-form box-1 property-description start -->
                <div class="box-white mt-60">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="fs-18 fw-700">Property Description</h3>
                            <p class="fs-16 fw-400 text-grey">This description will appear first in page. Keeping it as a brief overview makes it easier to read.</p>
                        </div>
                    </div>
{{--                    <div class="row mt-20">--}}
{{--                        <div class="col-lg-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="propertyTitle" class="fs-18">Property Title</label>--}}
{{--                                <input type="text" class="form-control h-11" name="propertyTitle" id="propertyTitle" value="{{$propertyData[0]->title}}"  maxlength="20">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="row mt-20">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="propertyDescription" class="fs-18">Property Description</label>
                                <textarea class="form-control h-11" rows="8" name="propertyDescription" id="propertyDescription" rows="3" placeholder="Enter property description">{{$propertyData[0]->description}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- new-form box-1 property-description end -->
                <!-- new-form box-2 property-price start -->
                <div class="box-white mt-60">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="fs-18 fw-700">Property Price</h3>
                            <p class="fs-16 fw-400 text-grey">Adding a price will make it easier for users to find your property in search results.</p>

                        </div>
                    </div>
                    <div class="row mt-20">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="propertyPriceIn" class="fs-18">Price in $(only numbers)</label>
                                <input type="text" class="form-control h-11" name="propertyPriceIn" id="propertyPriceIn" value="{{$propertyData[0]->price}}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-20">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="propertyAfterPrice" class="fs-18">After Price Label (ex: "/month")</label>
                                        <input type="text" class="form-control h-11" name="propertyAfterPrice" id="propertyAfterPrice" value="{{$propertyData[0]->after_price_label}}"/>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="propertyBeforePrice" class="fs-18">Before Price Label (ex: "from ")</label>
                                        <input type="text" class="form-control h-11" name="propertyBeforePrice" id="propertyBeforePrice" value="{{$propertyData[0]->before_price_label}}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- new-form box-2 property-price end -->
                <!-- new-form box-3 select-category start -->
                <div class="box-white mt-60">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="fs-18 fw-700">Select Categories</h3>
                            <p class="fs-16 fw-400 text-grey">Selecting a category will make it easier for users to find you property in search results.</p>
                        </div>
                    </div>
                    <div class="row mt-20">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="propertyCategory" class="fs-18">Category</label>
                                        <select class="form-control h-11" name="propertyCategory" id="propertyCategory">
                                            <option value="residential" @if($propertyData[0]->category == 'residential') ? selected : null @endif>Residential</option>
                                            <option value="commercial" @if($propertyData[0]->category == 'commercial') ? selected : null @endif>Commercial</option>
                                            <option value="industrial" @if($propertyData[0]->category == 'industrial') ? selected : null @endif>Industrial</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="propertyListedIn" class="fs-18">Listed In</label>
                                        <select class="form-control h-11" name="propertyListedIn" id="propertyListedIn">
                                            <option value="none" @if($propertyData[0]->listed_in == 'none') ? selected : null @endif>None</option>
                                            <option value="rentals" @if($propertyData[0]->listed_in == 'rentals') ? selected : null @endif>Rentals</option>
                                            <option value="sales" @if($propertyData[0]->listed_in == 'sales') ? selected : null @endif>Sales</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- new-form box-3 select-category end here -->
                <!-- new-form box-4 property-media start here -->
                <div class="box-white mt-60">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="fs-18 fw-700">Listing Media</h3>
                            <p class="fs-16 fw-400 text-grey">You can select multiple images to upload at one time.</p>
                        </div>
                    </div>
                    <div class="row mt-20">
                        <div class="col-lg-12">
                            <div class="bg-upload">
                                <div class="bg-uploadpic text-center">

                                    <!-- upload-media success message -->
                                    <div id="file_upload_message" class="text-success" style="padding-left: 12px;"></div>

                                    <!-- upload-media error message -->
                                    <div id="file_upload_error" class="text-danger" style="padding-left: 12px;"></div>

                                    <!-- upload-media error message -->
                                    <div id="file_upload_delete" class="text-success" style="padding-left: 12px;"></div>
                                    {{--style="width: 20%"--}}
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <img src="{{asset('frontend/assets/imgs/loading.gif')}}" height="50px" id="media_upload_loader" style="display: none;">
                                            <label id="media_upload_btn_section" class="btn btn-primary mr-auto br-0"><input id="mediaUpload" type="file" class="upload" name="propertyMedia"/> Select Media</label>
                                            <div id="mediaLoader"></div>
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                    {{--<input type="file" class="btn btn-primary mr-auto br-0" name="propertyMedia" id="propertyMedia">--}}
                                    {{--<button type="button" class="btn btn-primary mr-auto br-0" name="propertyMedia" id="propertyMedia">Choose Photos</button>--}}
                                    <h6 class="text-uploadpic fs-16 fw-400 mt-20">or Drag and Drop here</h6>
                                </div>
                                <br>
                            </div>

                            <div class="bg-upload">

                                <div class="row" id="image_preview">
{{--                                    @if(Session::get('media_name'))--}}
                                        @foreach($getMedia as $key =>$m)
                                            <div class="col-md-2" style="margin-top: 15px; margin-left: 23px" id="img-remove_{{$m->id}}">
                                                <div class="img-responsive text-center">
                                                    <div class="row">
                                                        <div class="col-md-12">
{{--                                                            <input type="hidden" id="session_key_{{ $image_rows['id'] }}" value="{{ $key }}">--}}
                                                            @if($m->media_type == 'image')
                                                                <img src="{{asset('frontend/assets/property-images/media-file/'.$m->media_name)}}" style="width: 183px; height: 183px;" id="del_img_{{$m->id}}"> {{--style="margin-top: 10px; margin-left: 27px;"--}}
                                                            @else
                                                                <img src="{{asset('pdf-icon/pdf-logo.png')}}" style="width: 183px; height: 183px;" id="del_img_{{$m->id}}"> {{--style="margin-top: 10px; margin-left: 27px;"--}}
                                                            @endif
                                                        </div>
                                                        <div class="col-md-12" style="margin-top: 5px">
                                                            <button class="btn" id="delete_btn" data-id="{{$m->id}}" style="background-color: red !important; border-color: red !important; border-radius: 25px; font-size: 19px; color: white; text-align: center;margin-left: 40px;"><i class="fa fa-trash"></i></button> {{--margin-top: 4px;margin-left: 90px; --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
{{--                                    @endif--}}
                                    {{--<div id="image_preview" class="text-center"></div>--}}
                                </div>
                            </div>
                            <hr class="hr-video">
                            <div class="row mt-20">
                                <div class="col-lg-12">
                                    <h3 class="fs-18 mt-20 fw-700">Floor Plan</h3>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-lg-6">
                                    <div class="floor text-center" id="image_2d_preview">
                                        <h1 class="fs-46">2D</h1>
                                        {{--                                    <button class="btn btn-primary mr-auto br-0">Choose File</button>--}}
                                        <label class="btn btn-primary mr-auto br-0" style="width: 33%;">
                                            <input id="btnFloor2D" type="file" class="upload" name="btnFloor2D[]" multiple onchange="showPreview(event);"/> Choose File</label>
{{--                                        <h6 class="text-uploadpic fs-16 fw-400 mt-20">or Drag and Drop here</h6>--}}
                                    </div>
                                    <!-- begin image-preview-for-floor-plan-2d -->
                                    <div id="floor_plan_2d_preview">
                                        <div class="col-md-12">
{{--                                            <div class="row">--}}
                                                @foreach($get2d_images as $img)
                                                    {{--                                                        <div class="col-md-3">--}}
                                                    <span id="remove_floor_plan_2d_image_{{$img->id}}" class="text-center pip">
                                                                <img src="{{asset('frontend/assets/property-images/floor-plan-2D/'.$img->images)}}" alt="your image" height="100px" width="100px" id="del_plan_2d_img_{{$img->id}}" class="imageThumb"><br>
                                                                <span class="remove">
                                                                     <button class="btn" id="del_plan_2d_btn" data-id="{{$img->id}}"><i class="fa fa-trash-alt" style="color: red;"></i></button>
                                                                </span>
                                                            </span>
                                                @endforeach
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                    <!-- end image-preview-for-floor-plan-2d -->
                                </div>
                                <div class="col-lg-6">
                                    <div class="floor text-center">
                                        <h1 class="fs-46">3D</h1>
                                        {{--                                    <button class="btn btn-primary mr-auto br-0">Choose File</button>--}}
                                        <label class="btn btn-primary mr-auto br-0" style="width: 33%;">
                                            <input id="btnFloor3D" type="file" class="upload" name="btnFloor3D[]" multiple/> Choose File</label>
{{--                                        <h6 class="text-uploadpic fs-16 fw-400 mt-20">or Drag and Drop here</h6>--}}
                                    </div>
                                    <div id="floor_plan_3d_image_preview">
                                        <div class="col-md-12">
                                            <div class="row">
                                                @foreach($get3d_images as $img)
                                                    <span id="remove_floor_plan_3d_image_{{$img->id}}" class="text-center pip">
                                                                <img src="{{asset('frontend/assets/property-images/floor-plan-3D/'.$img->images)}}" alt="your image" height="100px" width="100px" id="del_plan_3d_img_{{$img->id}}" class="imageThumb"><br>
                                                                <span class="remove">
                                                                    <button class="btn" id="del_plan_3d_btn" data-id="{{$img->id}}"><i class="fa fa-trash-alt" style="color: red;"></i></button>
                                                                </span>
                                                            </span>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- new-form box-4 property-media end here -->
                    <!-- new-form box-6 property-listing-detail start here -->
                    <div class="box-white mt-60">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="fs-18 fw-700">Listing Details</h3>
                                <p class="fs-16 fw-400 text-grey">Add a little more info about your property.</p>
                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="propertySizeInFt2" class="fs-18">Size in ft2 (*only numbers)</label>
                                            <input type="text" class="form-control h-11" name="propertySizeInFt2" id="propertySizeInFt2" value="{{$propertyData[0]->size_in_ft2}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-21">
                                        <div class="form-group">
                                            <label for="propertyLotSizeInFt2" class="fs-18">Lot Size in ft2 (*only numbers)</label>
                                            <input type="text" class="form-control h-11" name="propertyLotSizeInFt2" id="propertyLotSizeInFt2" value="{{$propertyData[0]->lot_size_in_ft2}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <div class="col-lg-6">
                                        <h3 class="fs-18">Rooms</h3>
                                        <input type="hidden" name="propertyRooms" id="propertyRooms" value="1">
                                        <nav aria-label="..." class="dn">
                                            <ul class="pagination pagination-lg" id="room_pagination_link">
                                                {{--<li class="page-item border-green active" aria-current="page" value="1">
                                                    <span class="page-link room_link" data-value="1">1</span>
                                                </li>--}}
                                                <li class="page-item border-green @if($propertyData[0]->rooms == '1') ? active : null @endif" value="1"><a class="page-link room_link" data-value="1" href="javascript:;">1</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->rooms == '2') ? active : null @endif" value="2"><a class="page-link room_link" data-value="2" href="javascript:;">2</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->rooms == '3') ? active : null @endif" value="3"><a class="page-link room_link" data-value="3" href="javascript:;">3</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->rooms == '4') ? active : null @endif" value="4"><a class="page-link room_link" data-value="4" href="javascript:;">4</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->rooms == '5') ? active : null @endif" value="5"><a class="page-link room_link" data-value="5" href="javascript:;">5</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->rooms == '6') ? active : null @endif" value="6"><a class="page-link room_link" data-value="6" href="javascript:;">6</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->rooms == '7') ? active : null @endif" value="7"><a class="page-link room_link" data-value="7" href="javascript:;">7</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->rooms == '8') ? active : null @endif" value="8"><a class="page-link room_link" data-value="8" href="javascript:;">8</a></li>
                                            </ul>
                                        </nav>
                                        <!-- mob view-->
                                        <nav aria-label="Page navigation example" class="dn-1">
                                            <ul class="pagination justify-content-center">
                                                <li class="page-item mr-2 border-green">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <span aria-hidden="true">«</span>
                                                    </a>
                                                </li>
                                                <li class="page-item border-green @if($propertyData[0]->rooms == '1') ? active : null @endif" value="1"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->rooms == '2') ? active : null @endif" value="2"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->rooms == '3') ? active : null @endif" value="3"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item border-green ml-2">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                        <span aria-hidden="true">»</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                        <!-- end of mob view-->
                                    </div>
                                    <div class="col-lg-6 mt-21">
                                        <h3 class="fs-18">Bedrooms</h3>
                                        <input type="hidden" name="propertyBedrooms" id="propertyBedrooms" value="1">
                                        <nav aria-label="..." class="dn">
                                            <ul class="pagination pagination-lg p-10 nav-list" id="bedroom_pagination_link">
                                                {{--                                        <li class="page-item border-green active" aria-current="page" value="1">--}}
                                                {{--                                            <span class="page-link">1</span>--}}
                                                {{--                                        </li>--}}
                                                <li class="page-item border-green @if($propertyData[0]->bedrooms == '1') ? active : null @endif" value="1"><a class="page-link bedroom_link" data-value="1" href="javascript:;">1</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->bedrooms == '2') ? active : null @endif" value="2"><a class="page-link bedroom_link" data-value="2" href="javascript:;">2</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->bedrooms == '3') ? active : null @endif" value="3"><a class="page-link bedroom_link" data-value="3" href="javascript:;">3</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->bedrooms == '4') ? active : null @endif" value="4"><a class="page-link bedroom_link" data-value="4" href="javascript:;">4</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->bedrooms == '5') ? active : null @endif" value="5"><a class="page-link bedroom_link" data-value="5" href="javascript:;">5</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->bedrooms == '6') ? active : null @endif" value="6"><a class="page-link bedroom_link" data-value="6" href="javascript:;">6</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->bedrooms == '7') ? active : null @endif" value="7"><a class="page-link bedroom_link" data-value="7" href="javascript:;">7</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->bedrooms == '8') ? active : null @endif" value="8"><a class="page-link bedroom_link" data-value="8" href="javascript:;">8</a></li>
                                            </ul>
                                        </nav>
                                        <!-- mob view -->
                                        <nav aria-label="Page navigation example" class="dn-1">
                                            <ul class="pagination justify-content-center">
                                                <li class="page-item mr-2 border-green">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <span aria-hidden="true">«</span>
                                                    </a>
                                                </li>
                                                <li class="page-item border-green @if($propertyData[0]->bedrooms == '1') ? active : null @endif" value="1"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->bedrooms == '2') ? active : null @endif" value="2"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->bedrooms == '3') ? active : null @endif" value="3"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item border-green ml-2">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                        <span aria-hidden="true">»</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                        <!-- end of mob view -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <div class="col-lg-6">
                                        <h3 class="fs-18">Bathrooms</h3>
                                        <input type="hidden" name="propertyBathrooms" id="propertyBathrooms" value="1">
                                        <nav aria-label="..." class="dn">
                                            <ul class="pagination pagination-lg" id="bathroom_pagination_link">
                                                {{--                                        <li class="page-item border-green active" aria-current="page" value="1">--}}
                                                {{--                                            <span class="page-link">1</span>--}}
                                                {{--                                        </li>--}}
                                                <li class="page-item border-green @if($propertyData[0]->bathrooms == '1') ? active : null @endif" value="1"><a class="page-link bathroom_link" data-value="1" href="javascript:;">1</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->bathrooms == '2') ? active : null @endif" value="2"><a class="page-link bathroom_link" data-value="2" href="javascript:;">2</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->bathrooms == '3') ? active : null @endif" value="3"><a class="page-link bathroom_link" data-value="3" href="javascript:;">3</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->bathrooms == '4') ? active : null @endif" value="4"><a class="page-link bathroom_link" data-value="4" href="javascript:;">4</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->bathrooms == '5') ? active : null @endif" value="5"><a class="page-link bathroom_link" data-value="5" href="javascript:;">5</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->bathrooms == '6') ? active : null @endif" value="6"><a class="page-link bathroom_link" data-value="6" href="javascript:;">6</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->bathrooms == '7') ? active : null @endif" value="7"><a class="page-link bathroom_link" data-value="7" href="javascript:;">7</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->bathrooms == '8') ? active : null @endif" value="8"><a class="page-link bathroom_link" data-value="8" href="javascript:;">8</a></li>
                                            </ul>
                                        </nav>
                                        <!-- mob view-->
                                        <nav aria-label="Page navigation example" class="dn-1">
                                            <ul class="pagination justify-content-center">
                                                <li class="page-item mr-2 border-green">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <span aria-hidden="true">«</span>
                                                    </a>
                                                </li>
                                                <li class="page-item border-green @if($propertyData[0]->bathrooms == '1') ? active : null @endif" value="1"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->bathrooms == '2') ? active : null @endif" value="2"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->bathrooms == '3') ? active : null @endif" value="3"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item border-green ml-2">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                        <span aria-hidden="true">»</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                        <!-- end of mob view-->
                                    </div>
{{--                                    <div class="col-lg-6 mt-21">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="propertyCustomId" class="fs-18">Custom ID (*text)</label>--}}
{{--                                            <input type="text" class="form-control h-11" name="propertyCustomId" id="propertyCustomId" placeholder="Enter custom id" value="{{$propertyData[0]->custom_id}}" onkeydown="return /[a-z]/i.test(event.key)" maxlength="10">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="propertyYearBuilt" class="fs-18">Year Built (*only numbers)</label>
                                            <input type="text" class="form-control h-11" name="propertyYearBuilt" id="propertyYearBuilt" placeholder="Enter year built" value="{{$propertyData[0]->year_built}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="4">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-21">
                                        <div class="form-group">
                                            <label for="propertyGarages" class="fs-18">Garages</label>
                                            <input type="text" class="form-control h-11" name="propertyGarages" id="propertyGarages" placeholder="Enter garages" value="{{$propertyData[0]->garages}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-lg-12">
                                <div class="form-row">
{{--                                    <div class="col-lg-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="propertyAvailableFromDate" class="fs-18">Available from (*date)</label>--}}
{{--                                            <input type="text" class="form-control h-11" name="propertyAvailableFromDate" id = "propertyAvailableFromDate" placeholder="Enter available from date" value="{{$propertyData[0]->available_from}}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-6 mt-21">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="propertyGarageSize" class="fs-18">Garage Size (*text)</label>--}}
{{--                                            <input type="text" class="form-control h-11" name="propertyGarageSize" id="propertyGarageSize" placeholder="Enter garage size" value="{{$propertyData[0]->garage_size}}" onkeydown="return /[a-z]/i.test(event.key)" maxlength="10">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-lg-12">
                                <div class="form-row">
{{--                                    <div class="col-lg-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="propertyExternalConstruction" class="fs-18">External Construction (*text)</label>--}}
{{--                                            <input type="text" class="form-control h-11" name="propertyExternalConstruction" id="propertyExternalConstruction" placeholder="Enter external construction" value="{{$propertyData[0]->external_construction}}" onkeydown="return /[a-z]/i.test(event.key)" maxlength="10">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="col-lg-12 mt-21">
                                        <div class="form-group">
                                            <label for="propertyBasement" class="fs-18">Basement (*text)</label>
{{--                                            <input type="text" class="form-control h-11" name="propertyBasement" id="propertyBasement" placeholder="Enter basement" value="{{$propertyData[0]->basement}}" onkeydown="return /[a-z]/i.test(event.key)" maxlength="10">--}}
                                            <select name="propertyBasement" id="propertyBasement" class="form-control h-11">
                                                <option value="finished" @if($propertyData[0]->basement == 'finished') ? selected : null @endif>Finished</option>
                                                <option value="unfinished" @if($propertyData[0]->basement == 'unfinished') ? selected : null @endif>Unfinished</option>
                                                <option value="partially finished" @if($propertyData[0]->basement == 'partially finished') ? selected : null @endif>Partially Finished</option>
                                                <option value="no basement" @if($propertyData[0]->basement == 'no basement') ? selected : null @endif>No Basement</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="propertyExteriorMaterial" class="fs-18">Exterior Material</label>
                                            <input type="text" class="form-control h-11" name="propertyExteriorMaterial" id="propertyExteriorMaterial" placeholder="Enter material" value="{{$propertyData[0]->exterior_material}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-21">
                                        <div class="form-group">
                                            <label for="propertyRoofing" class="fs-18">Roof Material</label>
{{--                                            <input type="text" class="form-control h-11" name="propertyRoofing" id="propertyRoofing" placeholder="Enter roofing" value="{{$propertyData[0]->roofing}}" onkeydown="return /[a-z]/i.test(event.key)" maxlength="10">--}}
                                            <select name="propertyRoofing" id="propertyRoofing" class="form-control h-11">
                                                <option value="standard" @if($propertyData[0]->roofing == 'standard') ? selected : null @endif>Standard</option>
                                                <option value="metal" @if($propertyData[0]->roofing == 'metal') ? selected : null @endif>Metal</option>
                                                <option value="no roof" @if($propertyData[0]->roofing == 'no roof') ? selected : null @endif>No Roof</option>
                                                <option value="other type" @if($propertyData[0]->roofing == 'other type') ? selected : null @endif>Other Type</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-lg-12">
                                <h3 class="fs-18">Floor No.</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="input-group justify-center">
                                        {{--<div class="input-group-prepend">
                                            <span class="input-group-text px-50"><a href="" class="text-floor">Lower Basement</a></span>
                                            <span class="input-group-text px-50"><a href="" class="text-floor">Upper Basement</a></span>
                                            <span class="input-group-text px-50"><a href="" class="text-floor">Ground</a></span>

                                        </div>--}}
                                        <input type="hidden" name="propertyFloorNo" id="propertyFloorNo" value="lowerBasement">
                                        <nav aria-label="..." class="dn">
                                            <ul class="pagination pagination-lg p-10 mb-0" id="floor_pagination_link">

                                                <li class="page-item border-green @if($propertyData[0]->floors_no == 'lowerBasement') ? active : null @endif" value="lowerBasement"><a href="javascript:;" class="page-link floor_link" data-value="lowerBasement">Lower Basement</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->floors_no == 'upperBasement') ? active : null @endif" value="upperBasement"><a href="javascript:;" class="page-link floor_link" data-value="upperBasement">Upper Basement</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->floors_no == 'ground') ? active : null @endif" value="ground"><a href="javascript:;" class="page-link floor_link" data-value="ground">Ground</a></li>

                                                {{--<li class="page-item border-green" aria-current="page" value="0">
                                                    <span class="page-link">0</span>
                                                </li>--}}

                                                <li class="page-item border-green @if($propertyData[0]->floors_no == '0') ? active : null @endif" value="0"><a class="page-link floor_link" data-value="0" href="javascript:;">0</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->floors_no == '1') ? active : null @endif" value="1"><a class="page-link floor_link" data-value="1" href="javascript:;">1</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->floors_no == '2') ? active : null @endif" value="2"><a class="page-link floor_link" data-value="2" href="javascript:;">2</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->floors_no == '3') ? active : null @endif" value="3"><a class="page-link floor_link" data-value="3" href="javascript:;">3</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->floors_no == '4') ? active : null @endif" value="4"><a class="page-link floor_link" data-value="4" href="javascript:;">4</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->floors_no == '5') ? active : null @endif" value="5"><a class="page-link floor_link" data-value="5" href="javascript:;">5</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->floors_no == '6') ? active : null @endif" value="6"><a class="page-link floor_link" data-value="6" href="javascript:;">6</a></li>
                                                <li class="page-item border-green @if($propertyData[0]->floors_no == '7') ? active : null @endif" value="7"><a class="page-link floor_link" data-value="7" href="javascript:;">7</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <!-- mob view -->
                                    <nav aria-label="Page navigation example" class="dn-1 mt-21">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item mr-2 border-green">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <li class="page-item border-green  @if($propertyData[0]->floors_no == '0') ? active : null @endif" value="0"><a class="page-link" href="#">0</a></li>
                                            <li class="page-item border-green  @if($propertyData[0]->floors_no == '1') ? active : null @endif" value="1"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item border-green  @if($propertyData[0]->floors_no == '2') ? active : null @endif" value="2"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item border-green ml-2">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <!-- end of mob view -->
                                </div>
                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="propertyStructureType" class="fs-18">Structure Type</label>
                                    <select class="form-control h-11" name="propertyStructureType" id="propertyStructureType">
                                        <option value="apartment" @if($propertyData[0]->structure_type == 'apartment') ? selected : null @endif>Apartment</option>
                                        <option value="condos" @if($propertyData[0]->structure_type == 'condos') ? selected : null @endif>Condos</option>
                                        <option value="multi-unit" @if($propertyData[0]->structure_type == 'multi-unit') ? selected : null @endif>Multi-Unit</option>
                                        <option value="houses" @if($propertyData[0]->structure_type == 'houses') ? selected : null @endif>Houses</option>
                                        <option value="land" @if($propertyData[0]->structure_type == 'land') ? selected : null @endif>Land</option>
                                        <option value="offices" @if($propertyData[0]->structure_type == 'offices') ? selected : null @endif>Offices</option>
                                        <option value="rental" @if($propertyData[0]->structure_type == 'rental') ? selected : null @endif>Retail</option>
                                        <option value="villas" @if($propertyData[0]->structure_type == 'villas') ? selected : null @endif>Villas</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-lg-12">
                                <h3 class="fs-18 mt-20">Owner/Agent notes (*not visible on front end)</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control h-11" name="propertyOwnerAgentNotes" rows="8" id="propertyOwnerAgentNotes" rows="3" placeholder="Enter owner/agent notes">{{$propertyData[0]->owner_agent_note}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- new-form box-6 property-listing-detail end here -->

                    <!-- new-form box-7 property-listing-detail start here -->
                    <div class="box-white mt-60">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="fs-18 fw-700">Select Property Status</h3>
                                <p class="fs-16 fw-400 text-grey">Highlight your property.</p>
                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="propertyStatus" class="fs-18">Property Status</label>
                                    <select class="form-control h-11" name="propertyStatus" id="propertyStatus">
                                        <option value="normal" @if($propertyData[0]->property_status == 'normal') ? selected : null @endif>Normal</option>
                                        <option value="open house" @if($propertyData[0]->property_status == 'open house') ? selected : null @endif>Open House</option>
                                        <option value="sold" @if($propertyData[0]->property_status == 'sold') ? selected : null @endif>Sold</option>
                                        <option value="new offer" @if($propertyData[0]->property_status == 'new offer') ? selected : null @endif>New Offer</option>
                                        <option value="hot offer" @if($propertyData[0]->property_status == 'hot offer') ? selected : null @endif>Hot Offer</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- new-form box-7 property-listing-detail end here -->
                    <div class="box-white mt-60">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="fs-18 fw-700">Select Agent</h3>
                                <p class="fs-16 fw-400 text-grey">Choose your agent.</p>
                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="agent" class="fs-18">Select Agent</label>
                                    <select class="form-control h-11" name="agent" id="agent">
                                        @foreach($agentData as $agentDetail)
                                            <option value="{{$agentDetail->id}}" @if($agentDetail->id == $propertyData[0]->agent_id) selected @endif>{{$agentDetail->fullName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- new-form box-8 property-listing-detail start here -->
                    <div class="box-white mt-60">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="fs-18 fw-700">Amenities and Features</h3>
                                <p class="fs-16 fw-400 text-grey">Select what features and amenities apply for your property.</p>
                            </div>
                        </div>
                        <div class="row mt-20">
                            @foreach($amenitiesData as $checkValue)
                                <div class="col-lg-3">
                                    <div class="sub-box">
                                        <div class="form-group form-check pl-0">
                                            <input type="checkbox" class="form-check-input ml-0 top-8 myinput" name="propertyAmenities[]" {{ (in_array($checkValue->id, explode(',', $propertyData[0]->amenities_feature))) ? 'checked' : '' }} value="{{$checkValue->id}}" id="propertyAmenities_{{$checkValue->id}}">
                                            <label class="form-check-label check-label" for="propertyAmenities_{{$checkValue->id}}">{{$checkValue->name}}</label>
                                            <div class="check-box"></div>
                                        </div>
                                    </div>
                                    {{--<div class="sub-box">
                                        <div class="form-group form-check">
                                            <input type="checkbox" name="propertyAmenities[]" value="{{$checkValue->id}}">&nbsp;{{$checkValue->name}}
                                        </div>
                                    </div>--}}
                                </div>
                            @endforeach
{{--                            @foreach($checkBoxValue as $checkValue)--}}
{{--                                <div class="col-lg-3">--}}
{{--                                    <div class="sub-box">--}}
{{--                                        <div class="form-group form-check pl-0">--}}
{{--                                            <input type="checkbox" class="form-check-input ml-0 top-8 myinput" name="propertyAmenities[]" value="{{$checkValue->id}}" id="propertyAmenities_{{$checkValue->id}}">--}}
{{--                                            <label class="form-check-label check-label" for="propertyAmenities_{{$checkValue->id}}">{{$checkValue->name}}</label>--}}
{{--                                            <input type="checkbox" class="form-check-input ml-0 top-8 myinput" name="propertyAmenities[]" {{ (in_array($checkValue->id, explode(',', $propertyData[0]->amenities_feature))) ? 'checked' : '' }} value="{{$checkValue->id}}" id="propertyAmenities_{{$checkValue->id}}">&nbsp;--}}

{{--                                            <div class="check-box"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    --}}{{--<div class="sub-box">--}}
{{--                                        <div class="form-group form-check">--}}
{{--                                            <input type="checkbox" name="propertyAmenities[]" value="{{$checkValue->id}}">&nbsp;{{$checkValue->name}}--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
                        </div>
                    </div>
                    <!-- new-form box-8 property-listing-detail end here -->
                    <!-- new-form box-9 property-listing-detail start here -->
                    <div class="box-white mt-60">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="fs-18 fw-700">Video Option</h3>
                                <p class="fs-16 fw-400 text-grey">Add just the video ID from the vimeo or youtube url.</p>
                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="propertyVideoFrom" class="fs-18">Video From</label>
                                            <select class="form-control h-11" name="propertyVideoFrom" id="propertyVideoFrom">
                                                <option>Type/Select Video from here...</option>
                                                <option value="youtube" @if($propertyData[0]->video_from  == 'youtube') ? selected : null @endif>youtube</option>
                                                <option value="vimeo" @if($propertyData[0]->video_from == 'vimeo') ? selected : null @endif>vimeo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-lg-12">
                                <div class="mt-20">
                                    <div class="form-row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="propertyEmbedVideoId" class="fs-18">Embed Video ID</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control h-11" name="propertyEmbedVideoId" id="propertyEmbedVideoId" value="{{$propertyData[0]->embed_video_id}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- new-form box-9 property-listing-detail end here -->
                    <div class="row">
                        <div class="col-lg-12 mt-60">
                            {{--                <button type="button" class="btn btn-primary mr-auto fw-700" >Post properties</button>--}}
                            {{--                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>--}}
                            {{--                <input type="submit" name="submit" value="submit">--}}
                            <input type="hidden" name="image_id" id="image_id" value="{{$propertyData[0]->id}}">
                            <button type="submit" class="btn btn-primary mr-auto fw-700">Update Property</button>
                        </div>
                    </div>
                </div>
            </form>
    </div>
    @include('frontend.include.news-letter-2')
    <!-- property room,bedroom,bathroom,floor-no script start -->
@section('property-all-scripts')
    <!-- room input field script start -->
    <script>
        $(".room_link").on('click', function () {
            //$('ul li').removeClass('active');

            $('#room_pagination_link').children('li').removeClass('active');
            $(this).parent('li').addClass('active');
            $("#propertyRooms").val($(this).attr('data-value'));
        });
    </script>
    <!-- room input field script end -->
    <!-- bedroom input field script start -->
    <script>
        $(".bedroom_link").on('click', function () {
            //$('ul li').removeClass('active');

            $('#bedroom_pagination_link').children('li').removeClass('active');
            $(this).parent('li').addClass('active');
            $("#propertyBedrooms").val($(this).attr('data-value'));
        });
    </script>
    <!-- bedroom input field script end -->
    <!-- bathroom input field script start -->
    <script>
        $(".bathroom_link").on('click', function () {
            //$('ul li').removeClass('active');

            $('#bathroom_pagination_link').children('li').removeClass('active');
            $(this).parent('li').addClass('active');
            $("#propertyBathrooms").val($(this).attr('data-value'));
        });
    </script>
    <!-- bathroom input field script end -->
    <!-- floor-link input field script start -->
    <script>
        $(".floor_link").on('click', function () {
            //$('ul li').removeClass('active');
            $('#floor_pagination_link').children('li').removeClass('active');
            $(this).parent('li').addClass('active');
            $("#propertyFloorNo").val($(this).attr('data-value'));
        });
    </script>
    <!-- floor-link input field script end -->
@endsection
<!-- property room,bedroom,bathroom,floor-no script end -->
<!-- date-picker start -->
@section('date-picker-script')

    <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#propertyAvailableFromDate" ).datepicker();
        });
    </script>
@endsection
<!-- date-picker end -->
<!-- add/del media script start -->
@section('media-scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('change', '#mediaUpload',function(e) {
            let postData = new FormData();
            postData.append('file',this.files[0]);
            var image_id = $('#image_id').val();
            postData.append('image_id', image_id);
            $('#media_upload_btn_section').hide();
            $('#media_upload_loader').show();
            //console.log(postData);
            $.ajax({
                async:true,
                type        :'post',
                url         : "{{ url('/update-property-media')}}",
                data        : postData,
                contentType : false,
                processData : false,
                success     : function(result) {
                    console.log(result);
                    $('#media_upload_btn_section').show();
                    $('#media_upload_loader').hide();
                    if(result.code == 200) {
                        //success-message
                        //alert('image uploaded successfully');
                        let url;
                        let file;

                        //if user select pdf file than preview pdf-icon image, if not than preview imageFile
                        if(result.data.media_type === 'pdf') {
                            //pdfFile preview
                            url = "{{asset('pdf-icon/pdf-logo.png')}}";
                            file = "<img src='"+url+"' height='183px' width='183px' id='del_img_"+result.data.id+"'>";
                            $("#file_upload_message").empty().append(result.message).show();
                            $("#file_upload_error").empty().append(result.message).hide();
                            $("#file_upload_delete").empty().append(result.message).hide();
                        } else {
                            //imageFile preview
                            url = "{{asset('frontend/assets/property-images/media-file')}}" + "/" +result.data.media_name;
                            file = "<img src='"+url+"' height='183px' width='183px' id='del_img_"+result.data.id+"'>";
                            $("#file_upload_message").empty().append(result.message).show();
                            $("#file_upload_error").empty().append(result.message).hide();
                            $("#file_upload_delete").empty().append(result.message).hide();
                        }

                        let preview = '<div class="col-md-2" style="margin-top: 15px; margin-left: 23px;" id="img-remove_'+result.data.id+'">\n' +
                            '                                            <div class="img-responsive text-center">\n' +
                            '                                                <div class="row">\n' +
                            '                                                    <div class="col-md-12">\n' +
                            '                                                        <input type="hidden" id="session_key_'+result.data.id+'" value="'+result.data.session_key+'">\n' +
                            '                                                        '+ file +
                            '                                                    </div>\n' +
                            '                                                    <div class="col-md-12" style="margin-top: 5px">\n' +
                            '                                                        <button class="btn" id="delete_btn" data-id="'+result.data.id+'" style="background-color: red !important; border-color: red !important; border-radius: 25px; font-size: 19px; color: white; text-align: center"><i class="fa fa-trash"></i></button>\n' +
                            '                                                    </div>\n' +
                            '                                                </div>\n' +
                            '                                            </div>\n' +
                            '                                        </div>'

                        $('#image_preview').append(
                            preview
                        );
                    } else {
                        //alert('you have select invalid file format');
                        $("#file_upload_error").empty().append(result.message).show();
                        $("#file_upload_message").empty().append(result.message).hide();
                        $("#file_upload_delete").empty().append(result.message).hide();
                    }
                },
                error   : function(data) { console.log(data); }
            });
        });
        $(document).on("click","#delete_btn",function (e) {
            e.preventDefault();
            if(confirm("Are you sure you want to remove this image?")){
                // get the id of the delete-button
                let image_id = $(this).attr('data-id');
                // var img = $('#del_img_'+image_id).attr("src");
                // alert(img);
                // let file = "<img class='img-responsive' src='"+url+"' height='100px' width='100px'>";
                //console.log(image_id);
                $.ajax({
                    url : "{{url('/destroy-property-media')}}",
                    type : "post",
                    data : {image_id : image_id, session_key: $("#session_key_"+image_id).val()},
                    success : function (data) {
                        if(data.code == 200) {
                            //remove selected-img
                            $('#img-remove_' + image_id).hide();
                            $('#file_upload_delete').empty().append(data.message).show();
                            $("#file_upload_error").empty().append(data.message).hide();
                            $("#file_upload_message").empty().append(data.message).hide();
                            //alert('image deleted successfully');
                        }
                    }
                });
            }
        });
    </script>
@endsection
<!-- subscribe for newsletter -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#subscribe_now").click(function(e){
        e.preventDefault();
        //first load
        $("#status").empty().html('Please wait........').addClass('text-danger');
        var subscriber_email = $("#subscriber_email").val();
        $.ajax({
            url:"{{url('/subscribe-email')}}",
            method:'POST',
            data:{
                _token: "{{ csrf_token() }}",email:subscriber_email
            },
            success:function(response){
                //var data = JSON.parse(response);
                var data = JSON.parse(JSON.stringify(response));
                if(data.success == true){
                    // $('#subscribe_now').hide();
                    $('#status').empty().html(data.message).addClass('text-success');
                    $('#status').removeClass('text-danger')
                    // alert('subscribe successfully');
                }else {
                    $('#status').show();
                    // $('#subscribe_now').hide();
                    $('#status').empty().html(data.message).addClass('text-danger');
                    $('#status').removeClass('text-success')
                }
            },
        });
    });
</script>
<!-- google map -->

<!-- begin dynamic dependent dropdown country-state -->
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#propertyCountry').on('change', function() {
            var country_id = this.value;
            //console.log(country_id);
            $("#state_dropdown").html('');
            $.ajax({
                url:"{{url('get-states-by-country')}}",
                type: "POST",
                data: {
                    country_id: country_id,
                    _token: '{{csrf_token()}}'
                },
                dataType : 'json',
                success: function(result){
                    $('#state_dropdown').empty();
                    // $('#state_dropdown').html('<option value="">Select State</option>');
                    $.each(result.states,function(key,value){
                        $("#state_dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                    // $('#city-dropdown').html('<option value="">Select State First</option>');
                }
            });
        });
    });
</script>
<!-- end dynamic dependent dropdown country-state -->
<!-- edit-image-del-2d-plan-image -->
<script>

</script>
<script>
    //delete updated floor plan 2D image
    $(document).on("click","#del_plan_2d_btn",function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this Floor Plan image!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let image_plan_2d_id = $(this).attr('data-id');
                $.ajax({
                    url : "{{url('/delete_floor_2d_image')}}",
                    type : "post",
                    data : {image_id : image_plan_2d_id},
                    success : function (data) {
                        console.log(data);
                        if(data.code == 200) {
                            $('#remove_floor_plan_2d_image_' + image_plan_2d_id).hide();
                            Swal.fire(
                                'Deleted!',
                                'Your floor plan 2D image has been deleted.',
                                'success'
                            )
                        }
                    }
                });
            }
        })
    });
    //delete updated floor plan 3D image
    $(document).on("click","#del_plan_3d_btn",function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this floor plan image!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let image_plan_3d_id = $(this).attr('data-id');
                $.ajax({
                    url : "{{url('/delete_floor_3d_image')}}",
                    type : "post",
                    data : {image_id : image_plan_3d_id},
                    success : function (data) {
                        console.log(data);
                        if(data.code == 200) {
                            $('#remove_floor_plan_3d_image_' + image_plan_3d_id).hide();
                            Swal.fire(
                                'Deleted!',
                                'Your floor plan 3D image has been deleted.',
                                'success'
                            )
                        }
                    }
                });
            }
        })
    });
    $(document).ready(function() {
        //for floor plan 2D
        if (window.File && window.FileList && window.FileReader) {
            $("#btnFloor2D").on("change", function(e) {
                // let image_plan_2d_id = $(this).attr('data-id');
                // console.log(image_plan_2d_id);
                var files = e.target.files,
                    filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $("<span class='pip'>" +
                            "<img class='imageThumb' src=' "+ e.target.result +"' title=' " + file.name + " ' height='100px' width='100px'/>" +
                            "<br/><span class='remove'><button class='btn'><i class='fa fa-trash-alt' style='color: red;'></i></button></span>" +
                            "</span>").insertAfter("#floor_plan_2d_preview");
                        $(".remove").click(function(){
                            $(this).parent(".pip").remove();
                        });
                    });
                    fileReader.readAsDataURL(f);
                }
                console.log(files);
            });
        } else {
            alert("Your browser doesn't support to File API")
        }
        //for floor plan 3D
        if (window.File && window.FileList && window.FileReader) {
            $("#btnFloor3D").on("change", function(e) {
                // let image_plan_2d_id = $(this).attr('data-id');
                // console.log(image_plan_2d_id);
                var files = e.target.files,
                    filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $("<span class='pip'>" +
                            "<img class='imageThumb' src=' "+ e.target.result +"' title=' " + file.name + " ' height='100px' width='100px'/>" +
                            "<br/><span class='remove'><button class='btn'><i class='fa fa-trash-alt' style='color: red;'></i></button></span>" +
                            "</span>").insertAfter("#floor_plan_3d_image_preview");
                        $(".remove").click(function(){
                            $(this).parent(".pip").remove();
                        });
                    });
                    fileReader.readAsDataURL(f);
                }
                console.log(files);
            });
        } else {
            alert("Your browser doesn't support to File API")
        }
    });
</script>
<!-- End floor-plan-2d image preview-del -->
<!-- map api key & js -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBi6dX1tFAnm__rELtIR8agR0F3jkHDYhY"></script>
<!-- map js -->
<script>
    function initialize() {
        //default map
        lat = <?php echo ($propertyData[0]->latitude) ?? 43.653226; ?>;
        lng = <?php echo ($propertyData[0]->longitude) ?? -79.3831843; ?>;
        const myLatLng = { lat: lat, lng: lng };
       // const myLatLng = { lat: <?php echo $propertyData[0]->latitude?>, lng: <?php echo $propertyData[0]->longitude?> };
        const map = new google.maps.Map(document.getElementById("map_12"), {
            zoom: 13,
            center: myLatLng,
        });
        new google.maps.Marker({
            position: myLatLng,
            map,
            // title: "Hello Toronto!",
        });
        var input = document.getElementById('propertyAddress');
        var autocomplete = new google.maps.places.Autocomplete(input);

        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            //var place = autocomplete.getPlace();
            const place = autocomplete.getPlace();
            //This will get only the address
            input.value = place.name;
            // document.getElementById("propertyCity").value = place.name;
            // get lat/long using place.geometry.location
            $lat = document.getElementById('latitude').value = place.geometry.location.lat();
            $lnt = document.getElementById('longitude').value = place.geometry.location.lng();

            //get zip code
            var latlng = new google.maps.LatLng($lat, $lnt);
            var geocoder = geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        // //display only street names as address
                        // $('#propertyAddress').val(place.address_components[0].long_name);
                        var pin = results[0].address_components[results[0].address_components.length - 1].long_name;
                        document.getElementById('propertyZip').value = pin;
                    }
                }
            });
            var myLatLng = new google.maps.LatLng($lat,$lnt)
            const map = new google.maps.Map(document.getElementById("map_12"), {
                zoom: 13,
                center: myLatLng,
            });
            new google.maps.Marker({
                position: myLatLng,
                map,
                title: "Hello!",
            });
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
@endsection
