@extends('frontend.layout.master')
@section('title')
    <title>Tuntunji Realty | Submit Property</title>
{{--    <title>Submit Property </title>--}}
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
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
    <style type="text/css">
        #map {
            height: 400px;
        }
    </style>
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
            color: white;
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
        <form action="{{url('/submit-property')}}" method="post" enctype="multipart/form-data">
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
            {{--            <div class="alert alert-success">--}}
            {{--                <strong>{{ Session::get( 'success' ) }}</strong>--}}
            {{--            </div>--}}
        @elseif( Session::has( 'warning' ))
            {{ Session::get( 'warning' ) }}
            <!-- here to 'withWarning()' -->
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
                            {{--                                <input type="text" id="txtPlaces" style="width: 250px" placeholder="Enter a location" />--}}

                            <input type="text" class="form-control h-11" name="propertyAddress" id="propertyAddress" value="{{old('propertyAddress')}}" placeholder="Enter address">
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
                                            <option value="{{$country->id}}">
                                                {{$country->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="propertyCountryState" class="fs-18">State/Province</label>
                                    <select class="form-control h-11" name="propertyCountryState" id="state_dropdown">
                                        <option value="">Select State/Province</option>
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
                                    <input type="text" class="form-control h-11" name="propertyCity" id="propertyCity" placeholder="Enter City" onkeydown="return /[a-z]/i.test(event.key)" maxlength="25"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="propertyZip" class="fs-18">Zip/Postal Code</label>
                                    <input type="text" class="form-control h-11" name="propertyZip" id="propertyZip" placeholder="Enter Zip/Postal Code" pattern="\d{5}(?:-\d{4})?|^([ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ])\ {0,1}(\d[ABCEGHJKLMNPRSTVWXYZ]\d)$"/>
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
                                    <input type="hidden" class="form-control h-11" id="latitude" name="latitude" readonly/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{--                                        <label for="propertyZip" class="fs-18">Longitude</label>--}}
                                    <input type="hidden" class="form-control h-11" id="longitude" name="longitude" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-lg-12">
                        <h3 class="fs-18 mt-20">Place pin with property address</h3>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div id="map"></div>
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
{{--                <div class="row mt-20">--}}
{{--                    <div class="col-lg-12">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="propertyTitle" class="fs-18">Property Title</label>--}}
{{--                            <input type="text" class="form-control h-11" name="propertyTitle" id="propertyTitle" value="{{old('propertyTitle')}}" placeholder="Enter property title" maxlength="30">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="row mt-20">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="propertyDescription" class="fs-18">Property Description</label>
                            <textarea class="form-control h-11" rows="8" name="propertyDescription" id="propertyDescription" rows="3" placeholder="Enter property description">{{old('propertyDescription')}}</textarea>
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
                            <input type="text" class="form-control h-11" name="propertyPriceIn" id="propertyPriceIn" placeholder="Enter property price">
                        </div>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-lg-12">
                        <div class="form-row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="propertyAfterPrice" class="fs-18">After Price Label (ex: "/month")</label>
                                    <input type="text" class="form-control h-11" name="propertyAfterPrice" id="propertyAfterPrice" placeholder="Enter after price"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="propertyBeforePrice" class="fs-18">Before Price Label (ex: "from ")</label>
                                    <input type="text" class="form-control h-11" name="propertyBeforePrice" id="propertyBeforePrice" placeholder="Enter before price"/>
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
                                        <option value="">Select Category</option>
{{--                                        <option value="none">none</option>--}}
                                        <option value="residential">Residential</option>
                                        <option value="commercial">Commercial</option>
                                        <option value="industrial">Industrial</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="propertyListedIn" class="fs-18">Listed In</label>
                                    <select class="form-control h-11" name="propertyListedIn" id="propertyListedIn">
                                        <option value="">Select Listed In</option>
                                        <option value="none">None</option>
                                        <option value="rentals">Rentals</option>
                                        <option value="sales">Sales</option>
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
                                @if(Session::get('media_name'))
                                    @foreach(Session::get('media_name') as $key => $image_rows)
                                        <div class="col-md-2" style="margin-top: 15px; margin-left: 23px" id="img-remove_{{ $image_rows['id'] }}">
                                            <div class="img-responsive text-center">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="hidden" id="session_key_{{ $image_rows['id'] }}" value="{{ $key }}">
                                                        @if($image_rows['type'] == 'image')
                                                            <img src="{{asset('frontend/assets/property-images/media-file/'.$image_rows['name'])}}" style="width: 183px; height: 183px;" id="del_img_{{ $image_rows['id'] }}"> {{--style="margin-top: 10px; margin-left: 27px;"--}}
                                                        @else
                                                            <img src="{{asset('pdf-icon/pdf-logo.png')}}" style="width: 183px; height: 183px;" id="del_img_{{ $image_rows['id'] }}"> {{--style="margin-top: 10px; margin-left: 27px;"--}}
                                                        @endif
                                                    </div>
                                                    <div class="col-md-12" style="margin-top: 5px">
                                                        <button class="btn" id="delete_btn" data-id="{{ $image_rows['id'] }}" style="background-color: red !important; border-color: red !important; border-radius: 25px; font-size: 19px; color: white; text-align: center;margin-left: 40px;"><i class="fa fa-trash"></i></button> {{--margin-top: 4px;margin-left: 90px; --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
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
                                <div class="floor text-center" id="floor_2d_plan">
                                    <h1 class="fs-46">2D</h1>
{{--                                    <button class="btn btn-primary mr-auto br-0">Choose File</button>--}}
                                        <label class="btn btn-primary mr-auto br-0" style="width: 33%;">
                                        <input id="btnFloor2D" type="file" class="upload" name="btnFloor2D[]" multiple/> Choose File</label>
                                    <h6 class="text-uploadpic fs-16 fw-400 mt-20">or Drag and Drop here</h6>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="floor text-center" id="floor_3d_plan">
                                    <h1 class="fs-46">3D</h1>
{{--                                    <button class="btn btn-primary mr-auto br-0">Choose File</button>--}}
                                        <label class="btn btn-primary mr-auto br-0" style="width: 33%;">
                                        <input id="btnFloor3D" type="file" class="upload" name="btnFloor3D[]" multiple/> Choose File</label>
                                    <h6 class="text-uploadpic fs-16 fw-400 mt-20">or Drag and Drop here</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- new-form box-4 property-media end here -->

{{--                <!-- new-form box-5 property-location start here -->--}}
{{--                <div class="box-white mt-60">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-12">--}}
{{--                            <h3 class="fs-18 fw-700">Listing Location</h3>--}}
{{--                            <p class="fs-16 fw-400 text-grey">Use the button to save your property location on the map as well.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row mt-20">--}}
{{--                        <div class="col-lg-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="propertyAddress" class="fs-18">Address</label>--}}
{{--                                <input type="text" id="txtPlaces" style="width: 250px" placeholder="Enter a location" />--}}

{{--                                <input type="text" class="form-control h-11" name="propertyAddress" id="propertyAddress" value="{{old('propertyAddress')}}" placeholder="Enter address">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row mt-20">--}}
{{--                        <div class="col-lg-12">--}}
{{--                            <div class="form-row">--}}
{{--                                <div class="col-lg-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="propertyCountry" class="fs-18">Country</label>--}}
{{--                                        <select class="form-control h-11" name="propertyCountry" id="propertyCountry">--}}
{{--                                            <option value="">Select Country</option>--}}
{{--                                            @foreach ($countries as $country)--}}
{{--                                                <option value="{{$country->id}}">--}}
{{--                                                    {{$country->name}}--}}
{{--                                                </option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="propertyCountryState" class="fs-18">State/Province</label>--}}
{{--                                        <select class="form-control h-11" name="propertyCountryState" id="state_dropdown">--}}
{{--                                            <option value="">Select State/Province</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row mt-20">--}}
{{--                        <div class="col-lg-12">--}}
{{--                            <div class="form-row">--}}
{{--                                <div class="col-lg-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="propertyCity" class="fs-18">City</label>--}}
{{--                                        <input type="text" class="form-control h-11" name="propertyCity" id="propertyCity" placeholder="Enter City" onkeydown="return /[a-z]/i.test(event.key)" maxlength="25"/>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="propertyZip" class="fs-18">Zip/Postal Code</label>--}}
{{--                                        <input type="text" class="form-control h-11" name="propertyZip" id="propertyZip" placeholder="Enter Zip/Postal Code" pattern="\d{5}(?:-\d{4})?|^([ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ])\ {0,1}(\d[ABCEGHJKLMNPRSTVWXYZ]\d)$"/>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row mt-20">--}}
{{--                        <div class="col-lg-12">--}}
{{--                            <div class="form-row">--}}
{{--                                <div class="col-lg-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="propertyCity" class="fs-18">Latitiude</label>--}}
{{--                                        <input type="hidden" class="form-control h-11" id="latitude" name="latitude" readonly/>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="propertyZip" class="fs-18">Longitude</label>--}}
{{--                                        <input type="hidden" class="form-control h-11" id="longitude" name="longitude" readonly/>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row mt-20">--}}
{{--                        <div class="col-lg-12">--}}
{{--                            <h3 class="fs-18 mt-20">Place pin with property address</h3>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <div id="map"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                <!-- new-form box-5 property-location end here -->--}}

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
                                        <input type="text" class="form-control h-11" name="propertySizeInFt2" id="propertySizeInFt2" placeholder="Enter size in ft2">
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-21">
                                    <div class="form-group">
                                        <label for="propertyLotSizeInFt2" class="fs-18">Lot Size in ft2 (*only numbers)</label>
                                        <input type="text" class="form-control h-11" name="propertyLotSizeInFt2" id="propertyLotSizeInFt2" placeholder="Enter lot size in ft2">
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
                                            <li class="page-item border-green active" value="1"><a class="page-link room_link" data-value="1" href="javascript:;">1</a></li>
                                            <li class="page-item border-green" value="2"><a class="page-link room_link" data-value="2" href="javascript:;">2</a></li>
                                            <li class="page-item border-green" value="3"><a class="page-link room_link" data-value="3" href="javascript:;">3</a></li>
                                            <li class="page-item border-green" value="4"><a class="page-link room_link" data-value="4" href="javascript:;">4</a></li>
                                            <li class="page-item border-green" value="5"><a class="page-link room_link" data-value="5" href="javascript:;">5</a></li>
                                            <li class="page-item border-green" value="6"><a class="page-link room_link" data-value="6" href="javascript:;">6</a></li>
                                            <li class="page-item border-green" value="7"><a class="page-link room_link" data-value="7" href="javascript:;">7</a></li>
                                            <li class="page-item border-green" value="8"><a class="page-link room_link" data-value="8" href="javascript:;">8</a></li>
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
                                            <li class="page-item border-green active" value="1"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item border-green" value="2"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item border-green" value="3"><a class="page-link" href="#">3</a></li>
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
                                            <li class="page-item border-green active" value="1"><a class="page-link bedroom_link" data-value="1" href="javascript:;">1</a></li>
                                            <li class="page-item border-green" value="2"><a class="page-link bedroom_link" data-value="2" href="javascript:;">2</a></li>
                                            <li class="page-item border-green" value="3"><a class="page-link bedroom_link" data-value="3" href="javascript:;">3</a></li>
                                            <li class="page-item border-green" value="4"><a class="page-link bedroom_link" data-value="4" href="javascript:;">4</a></li>
                                            <li class="page-item border-green" value="5"><a class="page-link bedroom_link" data-value="5" href="javascript:;">5</a></li>
                                            <li class="page-item border-green" value="6"><a class="page-link bedroom_link" data-value="6" href="javascript:;">6</a></li>
                                            <li class="page-item border-green" value="7"><a class="page-link bedroom_link" data-value="7" href="javascript:;">7</a></li>
                                            <li class="page-item border-green" value="8"><a class="page-link bedroom_link" data-value="8" href="javascript:;">8</a></li>
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
                                            <li class="page-item border-green active" value="1"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item border-green" value="2"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item border-green" value="3"><a class="page-link" href="#">3</a></li>
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
                                            <li class="page-item border-green active room" value="1"><a class="page-link bathroom_link" data-value="1" href="javascript:;">1</a></li>
                                            <li class="page-item border-green" value="2"><a class="page-link bathroom_link" data-value="2" href="javascript:;">2</a></li>
                                            <li class="page-item border-green" value="3"><a class="page-link bathroom_link" data-value="3" href="javascript:;">3</a></li>
                                            <li class="page-item border-green" value="4"><a class="page-link bathroom_link" data-value="4" href="javascript:;">4</a></li>
                                            <li class="page-item border-green" value="5"><a class="page-link bathroom_link" data-value="5" href="javascript:;">5</a></li>
                                            <li class="page-item border-green" value="6"><a class="page-link bathroom_link" data-value="6" href="javascript:;">6</a></li>
                                            <li class="page-item border-green" value="7"><a class="page-link bathroom_link" data-value="7" href="javascript:;">7</a></li>
                                            <li class="page-item border-green" value="8"><a class="page-link bathroom_link" data-value="8" href="javascript:;">8</a></li>
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
                                            <li class="page-item border-green active" value="1"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item border-green" value="2"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item border-green" value="3"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item border-green ml-2">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">»</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <!-- end of mob view-->
                                </div>
{{--                                <div class="col-lg-6 mt-21">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="propertyCustomId" class="fs-18">Custom ID (*text)</label>--}}
{{--                                        <input type="text" class="form-control h-11" name="propertyCustomId" id="propertyCustomId" placeholder="Enter custom id" onkeydown="return /[a-z]/i.test(event.key)" maxlength="10">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-20">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="propertyYearBuilt" class="fs-18">Year Built (*only numbers)</label>
                                        <input type="text" class="form-control h-11" name="propertyYearBuilt" id="propertyYearBuilt" placeholder="Enter year built" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="4">
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-21">
                                    <div class="form-group">
                                        <label for="propertyGarages" class="fs-18">Garages</label>
                                        <input type="text" class="form-control h-11" name="propertyGarages" id="propertyGarages" placeholder="Enter garages">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-20">
                        <div class="col-lg-12">
                            <div class="form-row">
{{--                                <div class="col-lg-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="propertyAvailableFromDate" class="fs-18">Available from (*date)</label>--}}
{{--                                        <input type="text" class="form-control h-11" name="propertyAvailableFromDate" id = "propertyAvailableFromDate" placeholder="Enter available from date">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-6 mt-21">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="propertyGarageSize" class="fs-18">Garage Size (*text)</label>--}}
{{--                                        <input type="text" class="form-control h-11" name="propertyGarageSize" id="propertyGarageSize" placeholder="Enter garage size" onkeydown="return /[a-z]/i.test(event.key)" maxlength="10">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-20">
                        <div class="col-lg-12">
                            <div class="form-row">
{{--                                <div class="col-lg-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="propertyExternalConstruction" class="fs-18">External Construction (*text)</label>--}}
{{--                                        <input type="text" class="form-control h-11" name="propertyExternalConstruction" id="propertyExternalConstruction" placeholder="Enter external construction" onkeydown="return /[a-z]/i.test(event.key)" maxlength="10">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="col-lg-12 mt-21">
                                    <div class="form-group">
                                        <label for="propertyBasement" class="fs-18">Basement</label>
{{--                                        <input type="text" class="form-control h-11" name="propertyBasement" id="propertyBasement" placeholder="Enter basement" onkeydown="return /[a-z]/i.test(event.key)" maxlength="10">--}}
                                        <select class="form-control h-11" name="propertyBasement" id="propertyBasement">
                                            <option value="">Select Basement</option>
                                            <option value="finished">Finished</option>
                                            <option value="unfinished">Unfinished</option>
                                            <option value="partially finished">Partially Finished</option>
                                            <option value="no basement">No Basement</option>
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
                                        <input type="text" class="form-control h-11" name="propertyExteriorMaterial" id="propertyExteriorMaterial" placeholder="Enter material">
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-21">
                                    <div class="form-group">
                                        <label for="propertyRoofing" class="fs-18">Roof Material</label>
{{--                                        <input type="text" class="form-control h-11" name="propertyRoofing" id="propertyRoofing" placeholder="Enter roofing" onkeydown="return /[a-z]/i.test(event.key)" maxlength="10">--}}
                                        <select class="form-control h-11" name="propertyRoofing" id="propertyRoofing">
                                            <option value="">Select Roof Material</option>
                                            <option value="standard">Standard</option>
                                            <option value="metal">Metal</option>
                                            <option value="no roof">No Roof</option>
                                            <option value="other type">Other Type</option>
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

                                            <li class="page-item border-green active" value="lowerBasement"><a href="javascript:;" class="page-link floor_link" data-value="lowerBasement">Lower Basement</a></li>
                                            <li class="page-item border-green" value="upperBasement"><a href="javascript:;" class="page-link floor_link" data-value="upperBasement">Upper Basement</a></li>
                                            <li class="page-item border-green" value="ground"><a href="javascript:;" class="page-link floor_link" data-value="ground">Ground</a></li>

                                            {{--<li class="page-item border-green" aria-current="page" value="0">
                                                <span class="page-link">0</span>
                                            </li>--}}

                                            <li class="page-item border-green" value="0"><a class="page-link floor_link" data-value="0" href="javascript:;">0</a></li>
                                            <li class="page-item border-green" value="1"><a class="page-link floor_link" data-value="1" href="javascript:;">1</a></li>
                                            <li class="page-item border-green" value="2"><a class="page-link floor_link" data-value="2" href="javascript:;">2</a></li>
                                            <li class="page-item border-green" value="3"><a class="page-link floor_link" data-value="3" href="javascript:;">3</a></li>
                                            <li class="page-item border-green" value="4"><a class="page-link floor_link" data-value="4" href="javascript:;">4</a></li>
                                            <li class="page-item border-green" value="5"><a class="page-link floor_link" data-value="5" href="javascript:;">5</a></li>
                                            <li class="page-item border-green" value="6"><a class="page-link floor_link" data-value="6" href="javascript:;">6</a></li>
                                            <li class="page-item border-green" value="7"><a class="page-link floor_link" data-value="7" href="javascript:;">7</a></li>
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
                                        <li class="page-item border-green" value="0"><a class="page-link" href="#">0</a></li>
                                        <li class="page-item border-green active" value="1"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item border-green" value="2"><a class="page-link" href="#">2</a></li>
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
                                    <option value="">Select Structure Type</option>
{{--                                    <option value="steel">Steel</option>--}}
{{--                                    <option value="brick">Brick</option>--}}
{{--                                    <option value="vinyl">Vinyl</option>--}}
{{--                                    <option value="none">None</option>--}}
                                    <option value="apartments">Apartments</option>
                                    <option value="condos">Condos</option>
                                    <option value="multi-unit">Multi-Unit</option>
                                    <option value="houses">Houses</option>
{{--                                    <option value="industrial">Industrial</option>--}}
                                    <option value="land">Land</option>
                                    <option value="offices">Offices</option>
                                    <option value="retail">Retail</option>
                                    <option value="villas">Villas</option>
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
                                <textarea class="form-control h-11" name="propertyOwnerAgentNotes" rows="8" id="propertyOwnerAgentNotes" rows="3" placeholder="Enter owner/agent notes"></textarea>
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
                                    <option value="">Select Property Status</option>
                                    <option value="normal">Normal</option>
                                    <option value="open house">Open House</option>
                                    <option value="sold">Sold</option>
                                    <option value="new offer">New Offer</option>
                                    <option value="hot offer">Hot Offer</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- new-form box-7 property-listing-detail end here -->
                <!-- new-form box-7 property-listing-detail start here -->
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
                                    <option value="">Select Agent</option>
                                    @foreach($agentData as $agentDetail)
                                    <option value="{{$agentDetail->id}}">{{$agentDetail->fullName}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- new-form box-7 property-listing-detail end here -->
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
                                        <input type="checkbox" class="form-check-input ml-0 top-8 myinput" name="propertyAmenities[]" value="{{$checkValue->id}}" id="propertyAmenities_{{$checkValue->id}}">
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
                                            <option value="youtube">Youtube</option>
                                            <option value="vimeo">Vimeo</option>
{{--                                            <option value="4">4</option>--}}
{{--                                            <option value="5">5</option>--}}
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
                                                <input type="text" class="form-control h-11" name="propertyEmbedVideoId" id="propertyEmbedVideoId" placeholder="Enter embed Video ID...">
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
                        <button type="submit" class="btn btn-primary mr-auto fw-700">Add Property</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @include('frontend.include.news-letter-2')
    @include('frontend.include.footer')

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
            $('#media_upload_btn_section').hide();
            $('#media_upload_loader').show();
            $.ajax({
                async:true,
                type        :'post',
                url         : "{{ url('/add-property-media')}}",
                data        : postData,
                contentType : false,
                processData : false,
                success     : function(result) {
                    console.log(result);
                    $('#media_upload_btn_section').show();
                    $('#media_upload_loader').hide();
                    if(result.code == 200) {
                        let url;
                        let file;

                        //if user select pdf file than preview pdf-icon image, if not than preview imageFile
                        if(result.data.media_type === 'pdf') {
                            //pdfFile preview
                            url = "{{asset('pdf-icon/pdf-logo.png')}}";
                            file = "<img src='"+url+"' height='183px' width='183px' id='del_img_"+result.data.id+"'>";
                            Swal.fire('Success!', 'Your media file has been uploaded.','success');
                            // $("#file_upload_message").empty().append(result.message).show();
                            // $("#file_upload_error").empty().append(result.message).hide();
                            // $("#file_upload_delete").empty().append(result.message).hide();
                        } else {
                            //imageFile preview
                            url = "{{asset('frontend/assets/property-images/media-file')}}" + "/" +result.data.media_name;
                            file = "<img src='"+url+"' height='183px' width='183px' id='del_img_"+result.data.id+"'>";
                            Swal.fire('Success!', 'Your media file has been uploaded.','success');
                            // $("#file_upload_message").empty().append(result.message).show();
                            // $("#file_upload_error").empty().append(result.message).hide();
                            // $("#file_upload_delete").empty().append(result.message).hide();
                        }

                        let preview = '<div class="col-md-2" style="margin-top: 15px; margin-left: 23px;" id="img-remove_'+result.data.id+'">' +
                            '<div class="img-responsive text-center">' +
                            '<div class="row">' +
                            '<div class="col-md-12">' +
                            '<input type="hidden" id="session_key_'+result.data.id+'" value="'+result.data.session_key+'">' +
                            ' '+ file +
                            '</div>' +
                            '<div class="col-md-12" style="margin-top: 5px">' +
                            '<button class="btn" id="delete_btn" data-id="'+result.data.id+'" style="background-color: red !important; border-color: red !important; border-radius: 25px; font-size: 19px; color: white; text-align: center"><i class="fa fa-trash"></i></button>\n' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                        $('#image_preview').append(preview);
                    } else {
                        Swal.fire({icon: 'error', title: 'Oops...', text: 'You have selected invalid file format!'})
                    }
                },
                error   : function(data) { console.log(data); }
            });
        });
        $(document).on("click","#delete_btn",function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this Media file?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let image_id = $(this).attr('data-id');
                    $.ajax({
                        url : "{{url('/destroy-property-media')}}",
                        type : "post",
                        data : {image_id : image_id, session_key: $("#session_key_"+image_id).val()},
                        success : function (data) {
                            if(data.code == 200) {
                                //remove selected-img
                                $('#img-remove_' + image_id).hide();
                                Swal.fire('Deleted!', 'Your media file has been deleted.', 'success')
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
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
<!-- begin dynamic dependent dropdown country-state -->
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
                    $("#state_dropdown").empty();
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
<!-- Begin floor-plan-2d & 3d image preview-del -->
<script>
    $(document).ready(function() {

            if (window.File && window.FileList && window.FileReader) {
                $("#btnFloor2D").on("change", function(e) {
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
                                "</span>").insertAfter("#floor_2d_plan");
                            $(".remove").click(function(){
                                $(this).parent(".pip").remove();
                            });

                            // // Old code here
                            // $("<img></img>", {
                            //   class: "imageThumb",
                            //   src: e.target.result,
                            //   title: file.name + " | Click to remove"
                            // }).insertAfter("#floor_2d_plan").click(function(){$(this).remove();});

                        });
                        fileReader.readAsDataURL(f);
                    }
                    console.log(files);
                });
            } else {
                alert("Your browser doesn't support to File API")
            }

        //for floor-plan-3d image
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
                            "</span>").insertAfter("#floor_3d_plan");
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
<!-- End floor-plan-2d & 3d image preview-del -->
<!-- map api key & js -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBi6dX1tFAnm__rELtIR8agR0F3jkHDYhY"></script>
<script>
    function initialize() {
        //default map
        const myLatLng = { lat: 43.653226, lng: -79.3831843 };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 13,
            center: myLatLng,
        });
        new google.maps.Marker({
            position: myLatLng,
            map,
            title: "Hello Toronto!",
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
            const map = new google.maps.Map(document.getElementById("map"), {
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
