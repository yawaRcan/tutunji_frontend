@extends('frontend.layouts.master')
@section('title')
    <title>Edit Property </title>
    <style>
        input[type="file"] {
            display: none;
        }
        .img-container {
            float: left;
            /*width: 33.33%;*/
            padding: 5px;
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
    <div class="container-fluid" style="background-color:#EFEFEF">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box-silver">
                        <a href="" class="text-dark"><i class="fas fa-arrow-left top-22"></i></a>
                        <h3 class="fs-18 text-center fw-700">Property Details (0 %)</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="{{url('/edit-property',[$propertyData[0]->id])}}" method="post" enctype="multipart/form-data">
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
        <!-- new-form box-1 property-description start -->
            <div class="box-white mt-60">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="fs-18 fw-700">Property Description</h3>
                        <p class="fs-16 fw-400 text-grey">This description will appear first in page. Keeping it as a brief overview makes it easier to read.</p>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="propertyTitle" class="fs-18">Property Title</label>
                            <input type="text" class="form-control h-11" name="propertyTitle" id="propertyTitle" value="{{($errors->all([0])) ? old('title') : $propertyData[0]->title}}" placeholder="Enter property title">
                        </div>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="propertyDescription" class="fs-18">Property Description</label>
                            <textarea class="form-control h-11" rows="8" name="propertyDescription" id="propertyDescription" rows="3" placeholder="Enter property description">{{($errors->all([1])) ? old('description') : $propertyData[0]->description}}</textarea>
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
                                        <option value="none" @if($propertyData[0]->category == 'none') ? selected : null @endif>None</option>
                                        <option value="apartments" @if($propertyData[0]->category == 'apartments') ? selected : null @endif>Apartments</option>
                                        <option value="condos" @if($propertyData[0]->category == 'condos') ? selected : null @endif>Condos</option>
                                        <option value="duplexes" @if($propertyData[0]->category == 'duplexes') ? selected : null @endif>Duplexes</option>
                                        <option value="houses" @if($propertyData[0]->category == 'houses') ? selected : null @endif>Houses</option>
                                        <option value="industrial" @if($propertyData[0]->category == 'industrial') ? selected : null @endif>Industrial</option>
                                        <option value="land" @if($propertyData[0]->category == 'land') ? selected : null @endif>Land</option>
                                        <option value="offices" @if($propertyData[0]->category == 'offices') ? selected : null @endif>Offices</option>
                                        <option value="rental" @if($propertyData[0]->category == 'rental') ? selected : null @endif>Retail</option>
                                        <option value="villas" @if($propertyData[0]->category == 'villas') ? selected : null @endif>Villas</option>
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
                                <label class="btn btn-primary mr-auto br-0" style="width: 20%"><input id="mediaUpload" type="file" class="upload" name="propertyMedia" value="{{($errors->all([2])) ? old('media') : 0}}"/> Select Media</label>
                                {{--<input type="file" class="btn btn-primary mr-auto br-0" name="propertyMedia" id="propertyMedia">--}}
                                {{--<button type="button" class="btn btn-primary mr-auto br-0" name="propertyMedia" id="propertyMedia">Choose Photos</button>--}}

                                <h6 class="text-uploadpic fs-16 fw-400 mt-20">or Drag and Drop here</h6>
                            </div>
                            <br>
                        </div>
                        <div class="row" id="image_preview" style="margin-bottom: 22px;margin-top: 10px;">
                            @foreach($getMedia as $key =>$m)
                                {{--                            <input type="hidden" id="session_key_{{ $m->id }}" value="{{ $key }}">--}}
                                <div id="img-remove_{{$m->id}}">
                                    @if($m->media_type == 'image')
                                        <img src="{{asset('frontend/assets/property-media/'.$m->media_name)}}" height="183px" width="183px" id="del_img_{{$m->id}}" style="margin-left: 10px;">
                                    @else
                                        <img src="{{asset('frontend/assets/icon-img/pdf-icon.png')}}" height="183px" width="183px" id="del_img_{{$m->id}}" style="margin-left: 10px;">
                                    @endif
                                    <br>
                                    <button type="button" class="btn btn-danger" id="delete_btn" data-id="{{$m->id}}" style="margin-top: 10px;margin-left: 60px;background-color: red !important; border-color: red !important;"><i class="fa fa-trash"></i></button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- new-form box-4 property-media end here -->

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
                            <input type="text" class="form-control h-11" name="propertyAddress" id="propertyAddress" value="{{($errors->all([3])) ? old('address') : $propertyData[0]->address}}">
                        </div>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-lg-12">
                        <div class="form-row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="propertyCity" class="fs-18">City</label>
                                    <select class="form-control h-11" name="propertyCity" id=propertyCity">
                                        <option value="none" @if($propertyData[0]->city == 'none') ? selected : null @endif>None</option>
                                        <option value="oakland" @if($propertyData[0]->city == 'oakland') ? selected : null @endif>Oakland</option>
                                        <option value="san francisco" @if($propertyData[0]->city == 'san francisco') ? selected : null @endif>San Francisco</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="propertyNeighborhood" class="fs-18">Neighborhood</label>
                                    <select class="form-control h-11" name="propertyNeighborhood" id="propertyNeighborhood">
                                        <option value="None" @if($propertyData[0]->city == 'none') ? selected : null @endif>None</option>
                                        <option value="all" @if($propertyData[0]->city == 'all') ? selected : null @endif>All Areas</option>
                                        <option value="embarcadero" @if($propertyData[0]->city == 'embarcadero') ? selected : null @endif>Embarcadero</option>
                                        <option value="hunters point" @if($propertyData[0]->city == 'hunters point') ? selected : null @endif>Hunters Point</option>
                                        <option value="marina" @if($propertyData[0]->city == 'marina') ? selected : null @endif>Marina</option>
                                        <option value="montclair" @if($propertyData[0]->city == 'montclair') ? selected : null @endif>Montclair</option>
                                        <option value="piedmont" @if($propertyData[0]->city == 'piedmont') ? selected : null @endif>Piedmont</option>
                                        <option value="trestle glen" @if($propertyData[0]->city == 'trestle glen') ? selected : null @endif>Trestle Glen</option>
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
                                    <label for="propertyZip" class="fs-18">Zip</label>
                                    <input type="text" class="form-control h-11" name="propertyZip" id="propertyZip" value="{{$propertyData[0]->zip}}"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="propertyCountryState" class="fs-18">Country / State</label>
                                    <select class="form-control h-11" name="propertyCountryState" id="propertyCountryState">
                                        <option value="None" @if($propertyData[0]->country_state == 'None') ? selected : null @endif>None</option>
                                        <option value="alameda" @if($propertyData[0]->country_state == 'alameda') ? selected : null @endif>Alameda</option>
                                        <option value="san francisco" @if($propertyData[0]->country_state == 'san francisco') ? selected : null @endif>San Francisco</option>
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
                                    <label for="propertyCountry" class="fs-18">Country</label>
                                    <select class="form-control h-11" name="propertyCountry" id="propertyCountry">
                                        <option value="india" @if($propertyData[0]->country == 'india') ? selected : null @endif>India</option>
                                        <option value="united states" @if($propertyData[0]->country == 'united states') ? selected : null @endif>United States</option>
                                        <option value="canada" @if($propertyData[0]->country == 'canada') ? selected : null @endif>Canada</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-lg-12">
                        <h3 class="fs-18 mt-20">Place pin with property address</h3>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-lg-12">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22997.172272146225!2d-80.0478016302069!3d43.90458695755299!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d4cb90d7c63ba5%3A0x323555502ab4c477!2sToronto%2C%20ON%2C%20Canada!5e0!3m2!1sen!2s!4v1635784562873!5m2!1sen!2s" width="100%" height="410" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-lg-12">
                        <div class="form-row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="propertyLatitude" class="fs-18">Latitude (for Google Maps)</label>
                                    <input type="text" class="form-control h-11" name="propertyLatitude" id="propertyLatitude" value="{{$propertyData[0]->latitude}}"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="propertyLongitude" class="fs-18">Longitude (for Google Maps)</label>
                                    <input type="text" class="form-control h-11" name="propertyLongitude" id="propertyLongitude" value="{{$propertyData[0]->longitude}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-lg-12">
                        <div class="form-row">
                            <div class="col-lg-6">
                                <label for="exampleFormControlSelect1" class="fs-18">Enable Google Street View</label>
                                <div class="sub-box">
                                    <div class="form-group form-check pl-0">
                                        <input type="checkbox" class="form-check-input ml-0 top-8 myinput" name="enableGoogleStreetView" id="enableGoogleStreetView" value="1">
                                        <label class="form-check-label check-label" for="enableGoogleStreetView">Enable Google Street View</label>
                                        <div class="check-box"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="propertyGoogleStreetView" class="fs-18">Google Street View - Camera Angle (value from 0 to 360)</label>
                                    <input type="text" class="form-control h-11" name="propertyGoogleStreetView" id="propertyGoogleStreetView" value="{{$propertyData[0]->google_street_view}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- new-form box-5 property-location end here -->

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
                                <input type="hidden" name="propertyRooms" id="propertyRooms">
                                <nav aria-label="..." class="dn">
                                    <ul class="pagination pagination-lg" id="room_pagination_link">
                                        {{--<li class="page-item border-green active" aria-current="page" value="1">
                                            <span class="page-link room_link" data-value="1">1</span>
                                        </li>--}}
                                        <li class="page-item border-green {{ ($propertyData[0]->rooms == '1') ? 'active' : '' }}" value="1"><a class="page-link room_link" data-value="1" href="javascript:;">1</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->rooms == '2') ? 'active' : '' }} " value="2"><a class="page-link room_link" data-value="2" href="javascript:;">2</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->rooms == '3') ? 'active' : '' }} " value="3"><a class="page-link room_link" data-value="3" href="javascript:;">3</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->rooms == '4') ? 'active' : '' }} " value="4"><a class="page-link room_link" data-value="4" href="javascript:;">4</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->rooms == '5') ? 'active' : '' }} " value="5"><a class="page-link room_link" data-value="5" href="javascript:;">5</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->rooms == '6') ? 'active' : '' }} " value="6"><a class="page-link room_link" data-value="6" href="javascript:;">6</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->rooms == '7') ? 'active' : '' }} " value="7"><a class="page-link room_link" data-value="7" href="javascript:;">7</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->rooms == '8') ? 'active' : '' }} " value="8"><a class="page-link room_link" data-value="8" href="javascript:;">8</a></li>
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
                                        <li class="page-item border-green {{ ($propertyData[0]->rooms == '1') ? 'active' : '' }}" value="1"><a class="page-link room_link" data-value="1" href="javascript:;">1</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->rooms == '2') ? 'active' : '' }}" value="2"><a class="page-link room_link" data-value="2" href="javascript:;">2</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->rooms == '3') ? 'active' : '' }}" value="3"><a class="page-link room_link" data-value="3" href="javascript:;">3</a></li>
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
                                <input type="hidden" name="propertyBedrooms" id="propertyBedrooms">
                                <nav aria-label="..." class="dn">
                                    <ul class="pagination pagination-lg p-10 nav-list" id="bedroom_pagination_link">
                                        {{--                                        <li class="page-item border-green active" aria-current="page" value="1">--}}
                                        {{--                                            <span class="page-link">1</span>--}}
                                        {{--                                        </li>--}}
                                        <li class="page-item border-green {{ ($propertyData[0]->bedrooms == '1') ? 'active' : '' }}" value="1"><a class="page-link bedroom_link" data-value="1" href="javascript:;">1</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->bedrooms == '2') ? 'active' : '' }}" value="2"><a class="page-link bedroom_link" data-value="2" href="javascript:;">2</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->bedrooms == '3') ? 'active' : '' }}" value="3"><a class="page-link bedroom_link" data-value="3" href="javascript:;">3</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->bedrooms == '4') ? 'active' : '' }}" value="4"><a class="page-link bedroom_link" data-value="4" href="javascript:;">4</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->bedrooms == '5') ? 'active' : '' }}" value="5"><a class="page-link bedroom_link" data-value="5" href="javascript:;">5</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->bedrooms == '6') ? 'active' : '' }}" value="6"><a class="page-link bedroom_link" data-value="6" href="javascript:;">6</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->bedrooms == '7') ? 'active' : '' }}" value="7"><a class="page-link bedroom_link" data-value="7" href="javascript:;">7</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->bedrooms == '8') ? 'active' : '' }}" value="8"><a class="page-link bedroom_link" data-value="8" href="javascript:;">8</a></li>
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
                                <input type="hidden" name="propertyBathrooms" id="propertyBathrooms">
                                <nav aria-label="..." class="dn">
                                    <ul class="pagination pagination-lg" id="bathroom_pagination_link">
                                        {{--                                        <li class="page-item border-green active" aria-current="page" value="1">--}}
                                        {{--                                            <span class="page-link">1</span>--}}
                                        {{--                                        </li>--}}
                                        <li class="page-item border-green {{ ($propertyData[0]->bathrooms == '1') ? 'active' : '' }}" value="1"><a class="page-link bathroom_link" data-value="1" href="javascript:;">1</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->bathrooms == '2') ? 'active' : '' }}" value="2"><a class="page-link bathroom_link" data-value="2" href="javascript:;">2</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->bathrooms == '3') ? 'active' : '' }}" value="3"><a class="page-link bathroom_link" data-value="3" href="javascript:;">3</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->bathrooms == '4') ? 'active' : '' }}" value="4"><a class="page-link bathroom_link" data-value="4" href="javascript:;">4</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->bathrooms == '5') ? 'active' : '' }}" value="5"><a class="page-link bathroom_link" data-value="5" href="javascript:;">5</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->bathrooms == '6') ? 'active' : '' }}" value="6"><a class="page-link bathroom_link" data-value="6" href="javascript:;">6</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->bathrooms == '7') ? 'active' : '' }}" value="7"><a class="page-link bathroom_link" data-value="7" href="javascript:;">7</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->bathrooms == '8') ? 'active' : '' }}" value="8"><a class="page-link bathroom_link" data-value="8" href="javascript:;">8</a></li>
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
                                <div class="form-group">
                                    <label for="propertyCustomId" class="fs-18">Custom ID (*text)</label>
                                    <input type="text" class="form-control h-11" name="propertyCustomId" id="propertyCustomId" value="{{$propertyData[0]->custom_id}}">
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
                                    <label for="propertyYearBuilt" class="fs-18">Year Built (*numeric)</label>
                                    <input type="text" class="form-control h-11" name="propertyYearBuilt" id="propertyYearBuilt" value="{{$propertyData[0]->year_built}}">
                                </div>
                            </div>
                            <div class="col-lg-6 mt-21">
                                <div class="form-group">
                                    <label for="propertyGarages" class="fs-18">Garages (*text)</label>
                                    <input type="text" class="form-control h-11" name="propertyGarages" id="propertyGarages" value="{{$propertyData[0]->garages}}">
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
                                    <label for="propertyAvailableFromDate" class="fs-18">Available from (*date)</label>
                                    <input type="text" class="form-control h-11" name="propertyAvailableFromDate" id = "propertyAvailableFromDate" value="{{$propertyData[0]->available_from}}">
                                </div>
                            </div>
                            <div class="col-lg-6 mt-21">
                                <div class="form-group">
                                    <label for="propertyGarageSize" class="fs-18">Garage Size (*text)</label>
                                    <input type="text" class="form-control h-11" name="propertyGarageSize" id="propertyGarageSize" value="{{$propertyData[0]->garage_size}}">
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
                                    <label for="propertyExternalConstruction" class="fs-18">External Construction (*text)</label>
                                    <input type="text" class="form-control h-11" name="propertyExternalConstruction" id="propertyExternalConstruction" value="{{$propertyData[0]->external_construction}}">
                                </div>
                            </div>
                            <div class="col-lg-6 mt-21">
                                <div class="form-group">
                                    <label for="propertyBasement" class="fs-18">Basement (*text)</label>
                                    <input type="text" class="form-control h-11" name="propertyBasement" id="propertyBasement" value="{{$propertyData[0]->basement}}">
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
                                    <label for="propertyExteriorMaterial" class="fs-18">Exterior Material (*text)</label>
                                    <input type="text" class="form-control h-11" name="propertyExteriorMaterial" id="propertyExteriorMaterial" value="{{$propertyData[0]->exterior_material}}">
                                </div>
                            </div>
                            <div class="col-lg-6 mt-21">
                                <div class="form-group">
                                    <label for="propertyRoofing" class="fs-18">Roofing (*text)</label>
                                    <input type="text" class="form-control h-11" name="propertyRoofing" id="propertyRoofing" value="{{$propertyData[0]->roofing}}">
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
                                <input type="hidden" name="propertyFloorNo" id="propertyFloorNo">
                                <nav aria-label="..." class="dn">
                                    <ul class="pagination pagination-lg p-10 mb-0" id="floor_pagination_link">

                                        <li class="page-item border-green {{ ($propertyData[0]->floors_no == 'lowerBasement') ? 'active' : '' }}" value="lowerBasement"><a href="javascript:;" class="page-link floor_link" data-value="lowerBasement">Lower Basement</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->floors_no == 'upperBasement') ? 'active' : '' }}" value="upperBasement"><a href="javascript:;" class="page-link floor_link" data-value="upperBasement">Upper Basement</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->floors_no == 'ground') ? 'active' : '' }}" value="ground"><a href="javascript:;" class="page-link floor_link" data-value="ground">Ground</a></li>

                                        {{--<li class="page-item border-green" aria-current="page" value="0">
                                            <span class="page-link">0</span>
                                        </li>--}}

                                        <li class="page-item border-green {{ ($propertyData[0]->floors_no == '0') ? 'active' : '' }}" value="0"><a class="page-link floor_link" data-value="0" href="javascript:;">0</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->floors_no == '1') ? 'active' : '' }}" value="1"><a class="page-link floor_link" data-value="1" href="javascript:;">1</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->floors_no == '2') ? 'active' : '' }}" value="2"><a class="page-link floor_link" data-value="2" href="javascript:;">2</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->floors_no == '3') ? 'active' : '' }}" value="3"><a class="page-link floor_link" data-value="3" href="javascript:;">3</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->floors_no == '4') ? 'active' : '' }}" value="4"><a class="page-link floor_link" data-value="4" href="javascript:;">4</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->floors_no == '5') ? 'active' : '' }}" value="5"><a class="page-link floor_link" data-value="5" href="javascript:;">5</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->floors_no == '6') ? 'active' : '' }}" value="6"><a class="page-link floor_link" data-value="6" href="javascript:;">6</a></li>
                                        <li class="page-item border-green {{ ($propertyData[0]->floors_no == '7') ? 'active' : '' }}" value="7"><a class="page-link floor_link" data-value="7" href="javascript:;">7</a></li>
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
                                <option value="steel" @if($propertyData[0]->structure_type == 'steel') ? selected : null @endif>Steel</option>
                                <option value="brick" @if($propertyData[0]->structure_type == 'brick') ? selected : null @endif>Brick</option>
                                <option value="vinyl" @if($propertyData[0]->structure_type == 'vinyl') ? selected : null @endif>Vinyl</option>
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
                            <textarea class="form-control h-11" name="propertyOwnerAgentNotes" rows="8" id="propertyOwnerAgentNotes" rows="3">{{$propertyData[0]->owner_agent_note}}</textarea>
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
            <!-- new-form box-8 property-listing-detail start here -->
            <div class="box-white mt-60">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="fs-18 fw-700">Amenities and Features</h3>
                        <p class="fs-16 fw-400 text-grey">Select what features and amenities apply for your property.</p>
                    </div>
                </div>
                <div class="row mt-20">
                    @foreach($checkBoxValue as $amenitiesData)
                        <div class="col-lg-3">
                            <div class="sub-box">
                                <div class="form-group form-check pl-0">
                                    <input type="checkbox" class="form-check-input ml-0 top-8 myinput" name="propertyAmenities[]" {{ (in_array($amenitiesData->id, explode(',', $propertyData[0]->amenities_feature))) ? 'checked' : '' }} value="{{$amenitiesData->id}}" id="propertyAmenities_{{$amenitiesData->id}}">
                                    <label class="form-check-label check-label" for="propertyAmenities_{{$amenitiesData->id}}">{{$amenitiesData->name}}</label>
                                    <div class="check-box"></div>
                                </div>
                            </div>
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
                                        <option value="2" @if($propertyData[0]->video_from == '2') ? selected : null @endif>2</option>
                                        <option value="3" @if($propertyData[0]->video_from == '3') ? selected : null @endif>3</option>
                                        <option value="4" @if($propertyData[0]->video_from == '4') ? selected : null @endif>4</option>
                                        <option value="5" @if($propertyData[0]->video_from == '5') ? selected : null @endif>5</option>
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
            <!-- box-10 start -->
            <div class="box-white mt-60">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="fs-18 fw-700">Virtual Tour</h3>
                        <p class="fs-16 fw-400 text-grey">Copy/Paste the iframe code of your property video tour</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                        <div class="form-row mt-20">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="propertyVirtualTour" class="fs-18">Virtual Tour</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control h-11" name="propertyVirtualTour" id="propertyVirtualTour" value="{{$propertyData[0]->virtual_tour}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- box-10 end -->
            <!-- box-11 start -->
            <div class="box-white mt-60">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="fs-18 fw-700">Subunits</h3>
                        <p class="fs-16 fw-400 text-grey">Select what properties you wish to show as subunits from those published.</p>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-lg-12">
                        <div class="form-row">
                            <div class="col-lg-3">
                                <label for="enableSubunits" class="fs-18">Enable</label>
                                <div class="sub-box">
                                    <div class="form-group form-check pl-0">
                                        <input type="checkbox" class="form-check-input ml-0 top-8 myinput" name="enableSubunits" id="enableSubunits">
                                        <label class="form-check-label check-label" for="enableSubunits">Enable</label>
                                        <div class="check-box"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <label for="propertySubunits" class="fs-18">Select Subunits From the list</label>
                                    <select class="form-control h-11" name="propertySubunits" id="propertySubunits" style="height: 250px;" multiple>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- box-11 end -->
            <div class="row">
                <div class="col-lg-12 mt-60">
                    {{--                <button type="button" class="btn btn-primary mr-auto fw-700" >Post properties</button>--}}
                    {{--                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>--}}
                    {{--                <input type="submit" name="submit" value="submit">--}}
                    <input type="hidden" name="image_id" id="image_id" value="{{$propertyData[0]->id}}">
                    <button type="submit" class="btn btn-primary mr-auto fw-700">Update Property</button>
                </div>
            </div>
        </form>
    </div>
    <!-- news-letter section begin -->
    @include('frontend.include.news-letter-2')
    <!-- news-letter section end -->
@endsection
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
                    if(result.code == 200) {
                        //success-message
                        //alert('image uploaded successfully');
                        let url;
                        let file;

                        //if user select pdf file than preview pdf-icon image, if not than preview imageFile
                        if(result.data.media_type === 'pdf') {
                            //pdfFile preview
                            url = "{{asset('/frontend/assets/icon-img/pdf-icon.png')}}";
                            file = "<img class='img-responsive' src='"+url+"' height='183px' width='183px' id='del_img_"+result.data.id+"' style='margin-left: 10px'>";
                            $("#file_upload_message").empty().append(result.message).show();
                            $("#file_upload_error").empty().append(result.message).hide();
                            $("#file_upload_delete").empty().append(result.message).hide();
                        } else {
                            //imageFile preview
                            url = "{{asset('/frontend/assets/property-media')}}" + "/" +result.data.media_name;
                            file = "<img class='img-responsive' src='"+url+"' height='183px' width='183px' id='del_img_"+result.data.id+"'>";
                            $("#file_upload_message").empty().append(result.message).show();
                            $("#file_upload_error").empty().append(result.message).hide();
                            $("#file_upload_delete").empty().append(result.message).hide();
                        }
                        $('#image_preview').append(
                            "<input type='hidden' id='session_key_"+result.data.id+"' value='"+result.data.session_key+"'>"+
                            "<div class='img-container' id='img-remove_"+result.data.id+"'>" +
                            file +
                            "<br>" +
                            "<button data-id='"+result.data.id+"' type='button' class='btn btn-danger' id='delete_btn' style='margin-top:10px; margin-left: 10px; background-color: red !important; border-color: red !important;'><i class='fa fa-trash'></i></button>" +
                            "</div>"
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
<!-- add/del media script end -->
