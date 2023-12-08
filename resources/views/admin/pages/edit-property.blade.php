@extends('admin.layouts.master')
<!-- title -->
@section('title')
    <title> Admin | Edit Property </title>
@endsection
<!-- media-button-style -->
@section('media-button-style')
    <style>
        .fileUpload {
            position: relative;
            overflow: hidden;
            margin: 10px;
        }
        .fileUpload input.upload {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }
    </style>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Property Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Property</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Property</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url('/admin/edit-property',$propertyData[0]->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <!-- validation-error message -->
                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            <p><strong>Opps Something went wrong</strong></p>
                                            <ul id="error_list">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Title<span style="color: red;">*</span></label>
                                                <input type="text" name="title" class="form-control" value="{{ ($errors->all([0])) ? old('title') : $propertyData[0]->title }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="">Description<span style="color: red;">*</span></label>
                                                {{--<input type="text" name="t_description" class="form-control">--}}
                                                <textarea name="description" id="description" class="form-control">{{($errors->all([1])) ? old('description') : $propertyData[0]->description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Price in $ (only numbers)</label>
                                                <input type="text" name="price" class="form-control" value="{{$propertyData[0]->price}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">After Price Label (ex: "/month ")</label>
                                                        <input type="text" name="after_price_label" class="form-control" value="{{$propertyData[0]->after_price_label}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Before Price Label (ex: "from ")</label>
                                                        <input type="text" name="before_price_label" class="form-control" value="{{$propertyData[0]->before_price_label}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" for="category-dropdown">Category</label>
                                                <select class="form-control" name="category" id="category-dropdown">
                                                    <option value="">None</option>
                                                    <option value="apartment" @if($propertyData[0]->category == 'apartment') ? selected : null @endif>Apartment</option>
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" for="dropdown">Listed In </label>
                                                <select class="form-control" name="listed_in" id="listed_in">
                                                    <option value="">None</option>
                                                    <option value="rentals" @if($propertyData[0]->listed_in == 'rentals') ? selected : null @endif>Rentals</option>
                                                    <option value="sales" @if($propertyData[0]->listed_in == 'sales') ? selected : null @endif>Sales</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- success-message -->
                                            <div id="file_upload_message" class="text-success" style="padding-left: 12px;"></div>
                                            <!-- error-message -->
                                            <div id="file_upload_error" class="text-danger" style="padding-left: 12px;"></div>
                                            <!-- delete-message -->
                                            <div id="file_upload_delete" class="text-success" style="padding-left: 12px;"></div>
                                            <div class="fileUpload btn btn-success">
                                                <span>SELECT MEDIA</span>
                                                <input id="mediaBtn" name="media_name" type="file" class="upload">
                                            </div>
                                        </div>
                                        <!-- image-preview -->
                                        <div class="row" id="image_preview" style="padding-left: 27px;">
                                            @foreach($getMedia as $key =>$m)
                                                {{--                            <input type="hidden" id="session_key_{{ $m->id }}" value="{{ $key }}">--}}
                                                <div class="image" id="img-remove_{{$m->id}}">
                                                    @if($m->media_type == 'image')
                                                        @if($propertyData[0]->property_type == 'sale')
                                                            <img src="{{asset('frontend/assets/property-media/'.$m->media_name)}}" height="100px" width="100px" id="del_img_{{$m->id}}" style="margin-left: 27px;">
                                                        @else
                                                            <img src="{{asset('admin-panel/assets/property-media/'.$m->media_name)}}" height="100px" width="100px" id="del_img_{{$m->id}}" style="margin-left: 27px;">
                                                        @endif
                                                        {{--<img src="{{asset('/assets/admin/images/property-media/'.$m->media_name)}}" height="100px" width="100px" id="del_img_{{$m->id}}" style="margin-left: 27px;">--}}
                                                    @else
                                                        <img src="{{asset('admin-panel/assets/icon-img/pdf-logo.png')}}" height="100px" width="100px" id="del_img_{{$m->id}}" style="margin-left: 27px;">
                                                    @endif
                                                    <br>
                                                    <button type="button" class="btn btn-danger btn-sm" id="delete_btn" data-id="{{$m->id}}" style="margin-top: 10px;margin-left: 60px;"><i class="fa fa-trash"></i></button>
                                                </div>
                                            @endforeach
                                        </div>
                                        {{--<img id="imagePreview" width="100" height="100" />--}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <p style="color: grey"><span style="color: red">*</span> At least 1 image is required for a valid submission.Minimum size is 500/500px.</p>
                                                <p style="color: grey">** Double click on the image to select featured.</p>
                                                <p style="color: grey">*** Change images order with Drag & Drop.</p>
                                                <p style="color: grey">**** PDF files upload supported as well.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Address<span style="color: red;">*</span></label>
                                                <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{($errors->all([3])) ? old('address') : $propertyData[0]->address}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="city-dropdown" class="bmd-label-floating">City</label>
                                                <select class="form-control" name="city" id="city">
                                                    <option value="none" @if($propertyData[0]->city == 'none') ? selected : null @endif>None</option>
                                                    <option value="oakland" @if($propertyData[0]->city == 'oakland') ? selected : null @endif>Oakland</option>
                                                    <option value="sanFrancisco" @if($propertyData[0]->city == 'sanFrancisco') ? selected : null @endif>San Francisco</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="neighborhood" class="bmd-label-floating">Neighborhood</label>
                                                <select class="form-control" name="neighborhood" id="neighborhood">
                                                    <option value="none" @if($propertyData[0]->neighborhood == 'none') ? selected : null @endif>None</option>
                                                    <option value="allArea" @if($propertyData[0]->neighborhood == 'allArea') ? selected : null @endif>All Areas</option>
                                                    <option value="all" @if($propertyData[0]->neighborhood == 'all') ? selected : null @endif>All</option>
                                                    <option value="embarcadero" @if($propertyData[0]->neighborhood == 'embarcadero') ? selected : null @endif>Embarcadero</option>
                                                    <option value="huntersPoint" @if($propertyData[0]->neighborhood == 'huntersPoint') ? selected : null @endif>Hunters Point</option>
                                                    <option value="marina" @if($propertyData[0]->neighborhood == 'marina') ? selected : null @endif>Marina</option>
                                                    <option value="montclair" @if($propertyData[0]->neighborhood == 'montclair') ? selected : null @endif>Montclair</option>
                                                    <option value="piedmont" @if($propertyData[0]->neighborhood == 'piedmont') ? selected : null @endif>Piedmont</option>
                                                    <option value="trestleGlen" @if($propertyData[0]->neighborhood == 'trestleGlen') ? selected : null @endif>Trestle Glen</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="neighborhood" class="bmd-label-floating">Zip</label>
                                                <input type="text" name="zip" class="form-control" value="{{$propertyData[0]->zip}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="state" class="bmd-label-floating">Country / State</label>
                                                <select class="form-control" name="country_state" id="state-dropdown">
                                                    <option value="none" @if($propertyData[0]->country_state == 'none') ? selected : null @endif>None</option>
                                                    <option value="alameda" @if($propertyData[0]->country_state == 'alameda') ? selected : null @endif>Alameda</option>
                                                    <option value="sanFrancisco" @if($propertyData[0]->country_state == 'sanFrancisco') ? selected : null @endif>San Francisco</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Country" class="bmd-label-floating">Country</label>
                                                <select class="form-control" name="country" id="country">
                                                    <option value="none" @if($propertyData[0]->country == 'none') ? selected : null @endif>None</option>
                                                    <option value="india" @if($propertyData[0]->country == 'india') ? selected : null @endif>India</option>
                                                    <option value="canada" @if($propertyData[0]->country == 'canada') ? selected : null @endif>Canada</option>
                                                    <option value="australia" @if($propertyData[0]->country == 'australia') ? selected : null @endif>Australia</option>
                                                    <option value="UAE" @if($propertyData[0]->country == 'UAE') ? selected : null @endif>United Arab Emirates</option>
                                                    <option value="UK" @if($propertyData[0]->country == 'UK') ? selected : null @endif>United Kingdom</option>
                                                    <option value="USA" @if($propertyData[0]->country == 'USA') ? selected : null @endif>United States</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="button" class="btn btn-success" name="" value="PLACE PIN WITH PROPERTY ADDRESS">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3705.158405754491!2d72.14178991489655!3d21.77412948559929!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395f5078deacd7f7%3A0x549332d9c6ee7b65!2sTinnyPixel!5e0!3m2!1sen!2sin!4v1633528068886!5m2!1sen!2sin" width="600" allowfullscreen="" loading="lazy" class="form-control" style="border:0; height: calc(25rem + 2px);"></iframe>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Latitude (for Google Maps)</label>
                                                <input type="text" name="latitude" class="form-control" value="{{$propertyData[0]->latitude}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Longitude (for Google Maps)</label>
                                                <input type="text" name="longitude" class="form-control" value="{{$propertyData[0]->longitude}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="checkbox" id="StreetView" name="enable_google_street_view" value="1">
                                                <label for="StreetView" class="bmd-label-floating">Enable Google Street View</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Google Street View - Camera Angle (value from 0 to 360)</label>
                                                <input type="text" name="google_street_view" class="form-control" value="{{$propertyData[0]->google_street_view}}">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Size in ft2 (*only numbers)</label>
                                                <input type="text" name="size_in_ft2" class="form-control" value="{{$propertyData[0]->size_in_ft2}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Lot Size in ft2 (*only numbers)</label>
                                                <input type="text" name="lot_size_in_ft2" class="form-control" value="{{$propertyData[0]->lot_size_in_ft2}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Rooms (*only numbers)</label>
                                                <input type="text" name="rooms" class="form-control" value="{{$propertyData[0]->rooms}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Bedrooms (*only numbers)</label>
                                                <input type="text" name="bedrooms" class="form-control" value="{{$propertyData[0]->bedrooms}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Bathrooms (*only numbers)</label>
                                                <input type="text" name="bathrooms" class="form-control" value="{{$propertyData[0]->bathrooms}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Custom ID (*text)</label>
                                                <input type="text" name="custom_id" class="form-control" value="{{$propertyData[0]->custom_id}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Year Built (*numeric)</label>
                                                <input type="text" name="year_built" class="form-control" value="{{$propertyData[0]->year_built}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Garages (*text)</label>
                                                <input type="text" name="garages" class="form-control" value="{{$propertyData[0]->garages}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Available from (*date)</label>
                                                <input type="date" name="available_from" class="form-control" value="{{$propertyData[0]->available_from}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Garage Size (*text)</label>
                                                <input type="text" name="garage_size" class="form-control" value="{{$propertyData[0]->garage_size}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">External Construction (*text)</label>
                                                <input type="text" name="external_construction" class="form-control" value="{{$propertyData[0]->external_construction}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Basement (*text)</label>
                                                <input type="text" name="basement" class="form-control" value="{{$propertyData[0]->basement}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Exterior Material (*text)</label>
                                                <input type="text" name="exterior_material" class="form-control" value="{{$propertyData[0]->exterior_material}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Roofing (*text)</label>
                                                <input type="text" name="roofing" class="form-control" value="{{$propertyData[0]->roofing}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="floors" class="bmd-label-floating">Floors No</label>
                                                {{--<input type="text" name="Construction" class="form-control">--}}
                                                <select name="floors_no" id="floors_no" class="form-control">
                                                    <option value="1" @if($propertyData[0]->floors_no == '1') ? selected : null @endif>1</option>
                                                    <option value="2" @if($propertyData[0]->floors_no == '2') ? selected : null @endif>2</option>
                                                    <option value="3" @if($propertyData[0]->floors_no == '3') ? selected : null @endif>3</option>
                                                    <option value="4" @if($propertyData[0]->floors_no == '4') ? selected : null @endif>4</option>
                                                    <option value="5" @if($propertyData[0]->floors_no == '5') ? selected : null @endif>5</option>
                                                    <option value="6" @if($propertyData[0]->floors_no == '6') ? selected : null @endif>6</option>
                                                    <option value="7" @if($propertyData[0]->floors_no == '7') ? selected : null @endif>7</option>
                                                    <option value="8" @if($propertyData[0]->floors_no == '8') ? selected : null @endif>8</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Structure" class="bmd-label-floating">Structure Type</label>
                                                {{--<input type="text" name="Construction" class="form-control">--}}
                                                <select name="structure_type" id="structure_type" class="form-control">
                                                    <option value="steel" @if($propertyData[0]->structure_type == 'steel') ? selected : null @endif>steel</option>
                                                    <option value="brick" @if($propertyData[0]->structure_type == 'brick') ? selected : null @endif>brick</option>
                                                    <option value="vinyl" @if($propertyData[0]->structure_type == 'vinyl') ? selected : null @endif>vinyl</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" for="notes">Owner/Agent notes (*not visible on front end)</label>
                                                {{--<input type="text" name="t_description" class="form-control">--}}
                                                <textarea name="owner_agent_note" id="notes" cols="96" rows="2" class="form-control">{{$propertyData[0]->owner_agent_note}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Structure" class="bmd-label-floating">Property Status</label>
                                                {{--<input type="text" name="Construction" class="form-control">--}}
                                                <select name="property_status" id="property_status" class="form-control">
                                                    <option value="normal" @if($propertyData[0]->property_status == 'normal') ? selected : null @endif>normal</option>
                                                    <option value="openHouse" @if($propertyData[0]->property_status == 'openHouse') ? selected : null @endif>open house</option>
                                                    <option value="sold" @if($propertyData[0]->property_status == 'sold') ? selected : null @endif>sold</option>
                                                    <option value="newOffer" @if($propertyData[0]->property_status == 'newOffer') ? selected : null @endif>new Offer</option>
                                                    <option value="hotOffer" @if($propertyData[0]->property_status == 'hotOffer') ? selected : null @endif>hot Offer</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Amenities</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <div class="row">
                                                    @foreach($checkBoxValue as $dataValue)
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <input type="checkbox" name="amenities[]" {{ (in_array($dataValue->id, explode(',', $propertyData[0]->amenities_feature))) ? 'checked' : '' }} value="{{$dataValue->id}}">&nbsp;{{$dataValue->name}}
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
{{--                                    <div class="row">--}}
{{--                                        @foreach($checkBoxValue as $data)--}}
{{--                                            <div class="col-md-4">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <input type="checkbox" name="amenities[]" {{ (in_array($data->id, explode(',', $propertyData[0]->amenities_feature))) ? 'checked' : '' }} value="{{$data->id}}">&nbsp;{{$data->name}}--}}

{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        @endforeach--}}
{{--                                    </div>--}}
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Video">Video from </label>
                                                <select name="video_from" id="video_from" class="form-control">
                                                    <option value="vimeo" @if($propertyData[0]->video_from == 'vimeo') ? selected : null @endif>vimeo</option>
                                                    <option value="youtube" @if($propertyData[0]->video_from  == 'youtube') ? selected : null @endif>youtube</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Video">Embed Video id:</label>
                                                <input type="text" id="embed_video_id" name="embed_video_id" class="form-control" value="{{$propertyData[0]->embed_video_id}}">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="virtual_tour">Virtual Tour:</label>
                                                <textarea name="virtual_tour" cols="96" rows="3" class="form-control" id="virtual_tour">{{$propertyData[0]->virtual_tour}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Video">Select Subunits From the list:</label>
                                                <select name="subunits" id="subunits" class="form-control" style="height: 350px" multiple >

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <input type="hidden" name="image_id" id="image_id" value="{{$propertyData[0]->id}}">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@section('script')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- add/delete-media using ajax with preview -->
    <script>
        /*$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });*/
        $(document).on('change', '#mediaBtn',function(e) {

            let postData = new FormData();
            postData.append('file',this.files[0]);
            //console.log(image_id);
            postData.append('_token', "{{ csrf_token() }}");
            var image_id = $('#image_id').val();
            postData.append('image_id', image_id);
            //console.log(postData);
            $.ajax({
                async:true,
                type        :'post',
                url         : "{{ url('/admin/update-media')}}",
                data        : postData,
                cache       : false,
                contentType : false,
                processData : false,
                success     : function(result) {
                    console.log(result);
                    if(result.code == 200) {
                        let url;
                        let file;

                        //if user select pdf file than preview pdf-icon image, if not than preview imageFile
                        if(result.data.media_type === 'pdf') {
                            //pdfFile preview
                            url = "{{asset('admin-panel/assets/icon-img/pdf-logo.png')}}";
                            file = "<img class='img-responsive' src='"+url+"' height='100px' width='100px' id='del_img_"+result.data.id+"'>";
                            //success-message
                            $("#file_upload_message").empty().append(result.message).show();
                            $("#file_upload_delete").empty().append(result.message).hide();
                            $("#file_upload_error").empty().append(result.message).hide();

                        } else {
                            if (result.data.property_type === 'sale'){
                                //imageFile preview
                                url = "{{asset('frontend/assets/property-media')}}" + "/" +result.data.media_name;
                                file = "<img class='img-responsive' src='"+url+"' height='100px' width='100px' id='del_img_"+result.data.id+"'>";
                            } else {
                                url = "{{asset('admin-panel/assets/property-media')}}" + "/" +result.data.media_name;
                                file = "<img class='img-responsive' src='"+url+"' height='100px' width='100px' id='del_img_"+result.data.id+"'>";
                            }
                            //success-message
                            $("#file_upload_message").empty().append(result.message).show();
                            $("#file_upload_delete").empty().append(result.message).hide();
                            $("#file_upload_error").empty().append(result.message).hide();
                        }

                        $('#image_preview').append(
                            "<div class='image' id='img-remove_"+result.data.id+"'>" +
                            file +
                            "<br>" +
                            "<button data-id='"+result.data.id+"' type='button' class='btn btn-danger btn-sm' id='delete_btn' style='margin-top:10px; margin-left: 30px;'><i class='fa fa-trash'></i></button>" +
                            "</div>"
                        );
                    } else {
                        $("#file_upload_error").empty().append(result.message).show();
                        $("#file_upload_message").empty().append(result.message).hide();
                        $('#file_upload_delete').empty().append(result.message).hide();
                    }
                },
                error   : function(result) {
                    //alert(result.statusText);
                    console.log(result);
                }
            });
        });
        $(document).on("click","#delete_btn",function (e) {
            e.preventDefault();
            if(confirm("Are you sure you want to remove this image?")){
                let image_id = $(this).attr('data-id');
                // let file = "<img class='img-responsive' src='"+url+"' height='100px' width='100px'>";
                //console.log(image_id);
                $.ajax({
                    url : "{{url('/admin/destroy-media')}}",
                    type : "post",
                    data : { "_token": "{{ csrf_token() }}",image_id : image_id},
                    success : function (data) {
                        //alert(image_id);
                        let url = "{{asset('/admin-panel/property-media')}}" + "/" +data.media_name;
                        let file = "<img class='img-responsive' src='"+url+"' height='100px' width='100px'>";
                        if(data.code == 200){
                            $('#img-remove_' + image_id).hide();
                            $('#file_upload_delete').empty().append(data.message).show();
                            $("#file_upload_message").empty().append(data.message).hide();
                            $("#file_upload_error").empty().append(result.message).show();
                        }
                    }
                });
            }
        });
    </script>
@endsection
@endsection

