@extends('admin.layouts.master')
<!-- title -->
@section('title')
    <title> Add Pre-construct Property </title>
    {{--    <style>--}}
    {{--        input[type="file"] {--}}
    {{--            display: none;--}}
    {{--        }--}}
    {{--    </style>--}}
    <!-- image preview del -->
    <style>
        input[type="file"] {
            display: block;
        }
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
                        <h1>Add Pre-construct Property</h1>
                    </div>
                    {{--                    <div class="col-sm-6">--}}
                    {{--                        <ol class="breadcrumb float-sm-right">--}}
                    {{--                            <li class="breadcrumb-item"><a href=""></a>Properties</li>--}}
                    {{--                            <li class="breadcrumb-item"><a href="#">Pre-construct</a></li>--}}
                    {{--                        </ol>--}}
                    {{--                    </div>--}}
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
                            <div class="card-header" style="background-color: #1ED65f">
                                <h3 class="card-title">Add Pre-construct Property</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url('/admin/add-pre-construct-property')}}" method="post" enctype="multipart/form-data">
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
                                    <div class="row" style="margin-top: 10px">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Address<span style="color: red;">*</span></label>
                                                <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address" value="{{old('address')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Country" class="bmd-label-floating">Country</label>
                                                <input type="text" name="country" id="country" class="form-control" placeholder="Enter Country" value="{{old('country')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="state" class="bmd-label-floating">State/Province</label>
                                                <input type="text" name="state" id="state" class="form-control" placeholder="Enter State" value="{{old('state')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="neighborhood" class="bmd-label-floating">City</label>
                                                <input type="text" name="city" id="city" class="form-control" placeholder="Enter City">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="neighborhood" class="bmd-label-floating">Zip/Postal Code</label>
                                                <input type="text" id="zip" name="zip" class="form-control" placeholder="Enter Zip/Postal code" pattern="\d{5}(?:-\d{4})?|^([ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ])\ {0,1}(\d[ABCEGHJKLMNPRSTVWXYZ]\d)$">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="hidden" id="latitude" name="latitude" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="hidden" id="longitude" name="longitude" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {{--                                              <p style="color: grey;font-size: 20px;">Place Pin with Property Address</p>--}}
                                                <input type="button" value="Place pin with property address" id="placePin" class="btn btn-info" style="background-color: #1ED65F;border-color: #1ED65F;"/>
                                                <input type="button" value="Change Address" id="change_address" style="display: none;background-color: #1ED65F;border-color: #1ED65F;" class="btn btn-info"/>
                                            </div>
                                        </div>
                                        <!-- place map with address -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div id="map" style="height: 500px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        {{--                                        <div class="col-md-12">--}}
                                        {{--                                            <div class="form-group">--}}
                                        {{--                                                <label class="bmd-label-floating">Title<span style="color: red;">*</span></label>--}}
                                        {{--                                                <input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="Enter title" autofocus>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="">Description<span style="color: red;">*</span></label>
                                                {{--<input type="text" name="t_description" class="form-control">--}}
                                                <textarea name="description" id="description" class="form-control" placeholder="Enter description">{{old('description')}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Price in $</label>
                                                <input type="text" name="price" class="form-control" placeholder="Enter price">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">After Price Label (ex: "/month ")</label>
                                                        <input type="text" name="after_price_label" class="form-control" placeholder="Enter after price label">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Before Price Label (ex: "from ")</label>
                                                        <input type="text" name="before_price_label" class="form-control" placeholder="Enter before price label">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" for="category-dropdown">Category</label>
                                                <select class="form-control" name="category" id="category-dropdown">
                                                    <option value="">Select Category</option>
                                                    @foreach($allCategory as $allCatData)
                                                        <option value="{{$allCatData->id}}">{{$allCatData->name}}</option>
                                                    @endforeach
{{--                                                    <option value="residential">Residential</option>--}}
{{--                                                    <option value="commercial">Commercial</option>--}}
{{--                                                    <option value="industrial">Industrial</option>--}}
                                                </select>
                                            </div>
                                        </div>
                                        {{--                                        <div class="col-md-6">--}}
                                        {{--                                            <div class="form-group">--}}
                                        {{--                                                <label class="bmd-label-floating" for="dropdown">Listed In </label>--}}
                                        {{--                                                <select class="form-control" name="listed_in" id="dropdown">--}}
                                        {{--                                                    <option>Select Listed In</option>--}}
                                        {{--                                                    <option value="">None</option>--}}
                                        {{--                                                    <option value="rentals">Rentals</option>--}}
                                        {{--                                                    <option value="sales">sales</option>--}}
                                        {{--                                                </select>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Photos</label>
                                        </div>
                                        <div class="col-md-12">
                                        {{--                                            <img src="{{asset('frontend/assets/imgs/loading.gif')}}" height="50px" id="media_upload_loader" style="display: none;">--}}
                                        <!-- success-message -->
                                            <div id="file_upload_message" style="padding-left: 12px;color: #1ED65f;"></div>
                                            <!-- error-message -->
                                            <div id="file_upload_error" style="padding-left: 12px;color: red;"></div>
                                            <!-- delete-message -->
                                            <div id="file_upload_delete" style="padding-left: 12px;color: #1ED65f;"></div>

                                            <div class="fileUpload btn btn-success" style="background-color: #1ED65F;border-color: #1ED65F;">
                                                <span>SELECT MEDIA</span>
                                                <input id="mediaBtn" name="media_name" type="file" class="upload">
                                                {{--                                                <label>SELECT MEDIA<input id="mediaBtn" name="media_name" type="file" class="upload"></label>--}}
                                            </div>
                                            {{--                                            <div id="mediaLoader"></div>--}}
                                            {{--                                            <img src="{{asset('frontend/assets/imgs/loading.gif')}}" height="50px" id="media_upload_loader" style="display: none;">--}}
                                            {{--                                            <label id="media_upload_btn_section" class="btn btn-primary mr-auto br-0" style="background-color: #1ED65F;border-color: #1ED65F"><input id="mediaBtn" type="file" class="upload" name="media_name"/> Select Media</label>--}}
                                            {{--                                            <div id="mediaLoader"></div>--}}

                                            <br>
                                            {{-- @foreach($propertyMedia->media_name as $name)--}}
                                            @if(Session::get('media_name'))
                                                <div class="row">
                                                    @foreach(Session::get('media_name') as $key => $image_rows)
                                                        <input type="hidden" id="session_key_{{ $image_rows['id'] }}" value="{{ $key }}">
                                                        <div id="img-remove_{{ $image_rows['id'] }}">
                                                            @if($image_rows['type'] == 'image')
                                                                <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$image_rows['name'])}}" height="100px" width="100px" style="margin-left: 27px;" id="del_img_{{ $image_rows['id'] }}">
                                                            @else
                                                                <img src="{{asset('pdf-icon/pdf-logo.png')}}" height="100px" width="100px" style="margin-left: 27px;" id="del_img_{{ $image_rows['id'] }}">
                                                            @endif
                                                            <br>
                                                            <button class="btn btn-danger btn-sm" id="delete_btn" data-id="{{ $image_rows['id'] }}" style="margin-top: 10px;margin-left: 57px;"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                        <!-- image-preview -->
                                        <div class="row" id="image_preview" style="padding-left: 27px;"></div>
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Banner</label>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="fileUpload btn btn-success" style="background-color: #1ED65F;border-color: #1ED65F;">
                                                <span>SELECT BANNER</span>
                                                <input type="file" class="upload" id="banner_img" name="banner_img">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Floor Plan</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-center" style="border: 1px solid lightgrey;padding: 20px;" id="floor_2d_plan">
                                                <h2>2D</h2>
{{--                                                <div class="fileUpload btn btn-success plan_2D" style="background-color: #1ED65F;border-color: #1ED65F;">--}}
{{--                                                    <span>CHOOSE FILE</span>--}}
{{--                                                    <input multiple id="btnFloor2D" type="file" class="upload" name="btnFloor2D[]">--}}

{{--                                                </div>--}}
                                                <button type="button" id="2d_btn" class="btn btn-primary">Floor Plan 2D</button>
                                                <div class="row mt-3" id="2d_floor_section">
                                                    @php($_2d_session = \Illuminate\Support\Facades\Session::get('_2d_section_session'))
                                                    @if($_2d_session)
                                                        <input type="text" name="2d_section_number" id="2d_section_number" value="{{ count($_2d_session) }}">
                                                        @php($no = 1)
                                                        @foreach($_2d_session as $_2d_row)
                                                            <div class="col-md-12">
                                                                <div class="row" style="border: 1px solid grey">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <input type="file" name="file_2d_{{ $no }}" id="file_2d_{{ $no }}" onchange="check2dInputValidation({{ $no }})" class="form-control">
                                                                        </div>
                                                                        <div id="img-remove">
                                                                                <img src="{{asset('admin-panel/assets/property-images/floor-plan-2D/pre-construct/'.$_2d_row['section_file'])}}" height="100px" width="100px" style="margin-left: 27px;" id="del_img }}">
                                                                            <br>
                                                                            <button class="btn btn-danger btn-sm" id="delete_btn" style="margin-top: 10px;margin-left: 57px;"><i class="fa fa-trash"></i></button>
                                                                        </div>
                                                                        <div class="row" id="2d_image_preview" style="padding-left: 27px;"></div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <input type="text" name="2d_bath_{{ $no }}" id="2d_bath_{{ $no }}" class="form-control" placeholder="Enter bathrooms" value="{{ $_2d_row['section_bathrooms'] }}">
                                                                            <span class="text-danger float-left" id="2d_bath_error_{{ $no }}"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <input type="text" name="2d_bed_{{ $no }}" id="2d_bed_{{ $no }}" class="form-control" placeholder="Enter bedbrooms" value="{{ $_2d_row['section_bedrooms'] }}">
                                                                            <span class="text-danger float-left" id="2d_bed_error_{{ $no }}"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @php($no++)
                                                        @endforeach
                                                    @else
                                                        <input type="text" name="2d_section_number" id="2d_section_number" value="1">
                                                        <div class="col-md-12">
                                                            <div class="row" style="border: 1px solid grey">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <input type="file" name="file_2d_1" id="file_2d_1" onchange="check2dInputValidation(1)" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <input type="text" name="2d_bath_1" id="2d_bath_1" class="form-control" placeholder="Enter bathrooms" value="">
                                                                        <span class="text-danger float-left" id="2d_bath_error_1"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <input type="text" name="2d_bed_1" id="2d_bed_1" class="form-control" placeholder="Enter bedbrooms" value="">
                                                                        <span class="text-danger float-left" id="2d_bed_error_1"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
{{--                                                <div class="floor_2d_detail" style="display: none">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label class="no_of_2d_bedroom">No. Of Bedroom</label>--}}
{{--                                                        <input type="text" name="fp_2d_bedroom" class="form-control" placeholder="Enter floor plan 2D bedroom">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label class="no_of_2d_bathroom">No. Of Bathroom</label>--}}
{{--                                                        <input type="text" name="fp_2d_bathroom" class="form-control" placeholder="Enter floor plan 2D bathroom">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-center" style="border: 1px solid lightgrey;padding: 20px;" id="floor_3d_plan">
                                                <h2>3D</h2>
                                                <div class="fileUpload btn btn-success" style="background-color: #1ED65F;border-color: #1ED65F;">
                                                    <span>CHOOSE FILE</span>
                                                    <input multiple id="btnFloor3D" type="file" class="upload" name="btnFloor3D[]">
                                                </div>
                                                <div class="floor_3d_detail" style="display: none">
                                                    <div class="form-group">
                                                        <label class="no_of_3d_bedroom">No. Of Bedroom</label>
                                                        <input type="text" name="fp_3d_bedroom" class="form-control" placeholder="Enter floor plan 3D bedroom">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="no_of_3d_bathroom">No. Of Bathroom</label>
                                                        <input type="text" name="fp_3d_bathroom" class="form-control" placeholder="Enter floor plan 3D bathroom">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <label>Upload floor plan 2D</label>--}}
{{--                                                <button type="button" id="2d_btn" class="btn btn-primary">Floor Plan 2D</button>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label>3D</label>--}}
{{--                                                <input type="file" name="f_3d_file" class="form-control" placeholder="Enter floor plan 3D">--}}
{{--                                            </div>--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-md-12">--}}
{{--                                                    <label>3d Floor Plan</label>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-md-12">--}}
{{--                                                    --}}{{----}}{{--                                            <img src="{{asset('frontend/assets/imgs/loading.gif')}}" height="50px" id="media_upload_loader" style="display: none;">--}}
{{--                                                    <!-- success-message -->--}}
{{--                                                    <div id="3d_file_upload_message" style="padding-left: 12px;color: #1ED65f;"></div>--}}
{{--                                                    <!-- error-message -->--}}
{{--                                                    <div id="3d_file_upload_error" style="padding-left: 12px;color: red;"></div>--}}
{{--                                                    <!-- delete-message -->--}}
{{--                                                    <div id="3d_file_upload_delete" style="padding-left: 12px;color: #1ED65f;"></div>--}}

{{--                                                    <div class="fileUpload btn btn-success" style="background-color: #1ED65F;border-color: #1ED65F;">--}}
{{--                                                        <span>SELECT 3D FLOOR PLAN</span>--}}
{{--                                                        <input id="f_3d_file" name="f_3d_file" type="file" class="upload">--}}
{{--                                                        --}}{{----}}{{--                                                <label>SELECT MEDIA<input id="mediaBtn" name="media_name" type="file" class="upload"></label>--}}
{{--                                                    </div>--}}
{{--                                                    --}}{{----}}{{--                                            <div id="mediaLoader"></div>--}}
{{--                                                    --}}{{----}}{{--                                            <img src="{{asset('frontend/assets/imgs/loading.gif')}}" height="50px" id="media_upload_loader" style="display: none;">--}}
{{--                                                    --}}{{----}}{{--                                            <label id="media_upload_btn_section" class="btn btn-primary mr-auto br-0" style="background-color: #1ED65F;border-color: #1ED65F"><input id="mediaBtn" type="file" class="upload" name="media_name"/> Select Media</label>--}}
{{--                                                    --}}{{----}}{{--                                            <div id="mediaLoader"></div>--}}

{{--                                                    <br>--}}
{{--                                                    --}}{{----}}{{-- @foreach($propertyMedia->media_name as $name)--}}
{{--                                                    @if(Session::get('f_3d_file'))--}}
{{--                                                        <div class="row">--}}
{{--                                                            @foreach(Session::get('f_3d_file') as $key => $image_rows)--}}
{{--                                                                <input type="hidden" id="session_key_{{ $image_rows['id'] }}" value="{{ $key }}">--}}
{{--                                                                <div id="img-remove_{{ $image_rows['id'] }}">--}}
{{--                                                                    @if($image_rows['type'] == 'image')--}}
{{--                                                                        <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$image_rows['name'])}}" height="100px" width="100px" style="margin-left: 27px;" id="del_img_{{ $image_rows['id'] }}">--}}
{{--                                                                    @else--}}
{{--                                                                        <img src="{{asset('pdf-icon/pdf-logo.png')}}" height="100px" width="100px" style="margin-left: 27px;" id="del_img_{{ $image_rows['id'] }}">--}}
{{--                                                                    @endif--}}
{{--                                                                    <br>--}}
{{--                                                                    <button class="btn btn-danger btn-sm" id="delete_btn" data-id="{{ $image_rows['id'] }}" style="margin-top: 10px;margin-left: 57px;"><i class="fa fa-trash"></i></button>--}}
{{--                                                                </div>--}}
{{--                                                            @endforeach--}}
{{--                                                        </div>--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                                <!-- image-preview -->--}}
{{--                                                <div class="row" id="3d_image_preview" style="padding-left: 27px;"></div>--}}
{{--                                                <div class="col-md-12">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <p style="color: grey"><span style="color: red">*</span> At least 1 image is required for a valid submission.Minimum size is 500/500px.</p>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-md-6">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label>3D bedroom</label>--}}
{{--                                                        <input type="text" name="f_3d_bed" class="form-control" placeholder="Enter floor plan 3D bedroom">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-md-6">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label>3D bathroom</label>--}}
{{--                                                        <input type="text" name="f_3d_detail" class="form-control" placeholder="Enter floor plan 3D bathroom">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <div class="row"></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Size in ft2 (*only numbers)</label>
                                                <input type="text" name="size_in_ft2" class="form-control" placeholder="Enter size in square feet">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Lot Size in ft2 (*only numbers)</label>
                                                <input type="text" name="lot_size_in_ft2" class="form-control" placeholder="Enter lot size in square feet">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Rooms (*only numbers)</label>
                                                <input type="text" name="rooms" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Enter rooms">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Bedrooms (*only numbers)</label>
                                                <input type="text" name="bedrooms" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Enter bedrooms">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Bathrooms (*only numbers)</label>
                                                <input type="text" name="bathrooms" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Enter bathrooms">
                                            </div>
                                        </div>
                                        {{--                                        <div class="col-md-6">--}}
                                        {{--                                            <div class="form-group">--}}
                                        {{--                                                <label class="bmd-label-floating">Custom ID (*text)</label>--}}
                                        {{--                                                <input type="text" name="custom_id" class="form-control" onkeydown="return /[a-z]/i.test(event.key)" placeholder="Enter CustomId">--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Approximate Completion Date (*only numbers)</label>
                                                <input type="text" name="year_built" class="form-control"  placeholder="Enter Approximate Completion Date" pattern="[0-9\s\$@%~#^&*-]+" value="{{old('year_built')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Garages</label>
                                                <input type="text" name="garages" class="form-control" placeholder="Enter garage">
                                            </div>
                                        </div>
                                        {{--                                        <div class="col-md-6">--}}
                                        {{--                                            <div class="form-group">--}}
                                        {{--                                                <label class="bmd-label-floating">Available from (*date)</label>--}}
                                        {{--                                                <input type="date" name="available_from" class="form-control" placeholder="Enter available date from">--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        {{--                                        <div class="col-md-6">--}}
                                        {{--                                            <div class="form-group">--}}
                                        {{--                                                <label class="bmd-label-floating">Garage Size (*text)</label>--}}
                                        {{--                                                <input type="text" name="garage_size" class="form-control" onkeydown="return /[a-z]/i.test(event.key)" placeholder="Enter garage size" maxlength="10">--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        {{--                                        <div class="col-md-6">--}}
                                        {{--                                            <div class="form-group">--}}
                                        {{--                                                <label class="bmd-label-floating">External Construction (*text)</label>--}}
                                        {{--                                                <input type="text" name="external_construction" class="form-control" onkeydown="return /[a-z]/i.test(event.key)" placeholder="Enter external construction" maxlength="10">--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Basement</label>
                                                {{--                                                <input type="text" name="basement" class="form-control" onkeydown="return /[a-z]/i.test(event.key)" placeholder="Enter basement" maxlength="10">--}}
                                                <select name="basement" id="basement" class="form-control">
                                                    <option value="">Select Basement</option>
                                                    <option value="finished">Finished</option>
                                                    <option value="unfinished">Unfinished</option>
                                                    <option value="partially finished">Partially Finished</option>
                                                    <option value="no basement">No Basement</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Exterior Material</label>
                                                <input type="text" name="exterior_material" class="form-control" placeholder="Enter exterior material">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Roof Material</label>
                                                {{--                                                <input type="text" name="roofing" class="form-control" onkeydown="return /[a-z]/i.test(event.key)" maxlength="10" placeholder="Enter roofing">--}}
                                                <select name="roofing" id="roofing" class="form-control">
                                                    <option value="">Select Roof Material</option>
                                                    <option value="standard">Standard</option>
                                                    <option value="metal">Metal</option>
                                                    <option value="no roof">No Roof</option>
                                                    <option value="other type">Other Type</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="floors" class="bmd-label-floating">Floors No</label>
                                                {{--<input type="text" name="Construction" class="form-control">--}}
                                                <select name="floors_no" id="floors_no" class="form-control">
                                                    <option value="">Select Floors No</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Structure" class="bmd-label-floating">Structure Type</label>
                                                {{--<input type="text" name="Construction" class="form-control">--}}
                                                <select name="structure_type" id="Structure" class="form-control">
                                                    <option value="">Select Structure Type</option>
                                                    <option value="apartment">Apartment</option>
                                                    <option value="condos">Condos</option>
                                                    <option value="multi-unit">Multi-Unit</option>
                                                    <option value="houses">Houses</option>
                                                    <option value="land">Land</option>
                                                    <option value="offices">Offices</option>
                                                    <option value="retails">Retails</option>
                                                    <option value="villas">Villas</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" for="notes">Owner/Agent notes (*not visible on front end)</label>
                                                {{--<input type="text" name="t_description" class="form-control">--}}
                                                <textarea name="owner_agent_note" id="notes" cols="96" rows="2" class="form-control" placeholder="Enter notes"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    {{--<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Structure" class="bmd-label-floating">Property Status</label>
                                                <select name="property_status" id="Structure" class="form-control">
                                                    <option value="">Select Property Status</option>
                                                    <option value="normal">normal</option>
                                                    <option value="open house">open house</option>
                                                    <option value="sold">sold</option>
                                                    <option value="new offer">new offer</option>
                                                    <option value="hot offer">hot offer</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="agent" class="bmd-label-floating">Agent</label>
                                                <input type="text" name="Construction" class="form-control">
                                                <select name="agent" id="agent" class="form-control">
                                                    <option value="">Select Agent</option>
                                                    @foreach($agentData as $agentDetail)
                                                    <option value="{{$agentDetail->id}}">{{$agentDetail->fullName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div> --}}
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
                                                                <input type="checkbox" name="amenities[]" value="{{$dataValue->id}}">&nbsp;{{$dataValue->name}}
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Video">Video from </label>
                                                <select name="video_from" id="Video" class="form-control">
                                                    <option value="">Select Video</option>
                                                    <option value="youtube">Youtube </option>
                                                    <option value="vimeo">Vimeo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Video">Embed Video id:</label>
                                                <input type="text" id="Video" name="embed_video_id" class="form-control" placeholder="Enter video id">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;">Save</button>
                                    <a href="{{url('/admin/list-pre-construct-property')}}" class="btn btn-default" style="background-color: #949496;border-color: #949496;color: white">Back</a>
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
            postData.append('_token', "{{ csrf_token() }}");
            //console.log(postData);
            $('#media_upload_btn_section').hide();
            // $('#mediaBtn').hide();
            $('#media_upload_loader').show();
            $.ajax({
                async:true,
                type        :'post',
                url         : "{{ url('/admin/add-pre-construct-media')}}",
                data        : postData,
                cache       : false,
                contentType : false,
                processData : false,
                success     : function(result) {
                    //console.log(result);
                    $('#media_upload_btn_section').show();
                    // $('#mediaBtn').show();
                    $('#media_upload_loader').hide();
                    if(result.code == 200) {
                        let url;
                        let file;

                        //if user select pdf file than preview pdf-icon image, if not than preview imageFile
                        if(result.data.media_type === 'pdf') {
                            //pdfFile preview
                            url = "{{asset('pdf-icon/pdf-logo.png')}}";
                            file = "<img class='img-responsive' src='"+url+"' height='100px' width='100px' id='del_img_"+result.data.id+"'>";
                            //success-message
                            $("#file_upload_message").empty().append(result.message).show();
                            $("#file_upload_delete").empty().append(result.message).hide();
                            $("#file_upload_error").empty().append(result.message).hide();

                        } else {
                            //imageFile preview
                            url = "{{asset('admin-panel/assets/property-images/media-file/pre-construct')}}" + "/" +result.data.media_name;
                            file = "<img class='img-responsive' src='"+url+"' height='100px' width='100px' id='del_img_"+result.data.id+"'>";
                            //success-message
                            $("#file_upload_message").empty().append(result.message).show();
                            $("#file_upload_delete").empty().append(result.message).hide();
                            $("#file_upload_error").empty().append(result.message).hide();
                        }

                        $('#image_preview').append(
                            "<input type='hidden' id='session_key_"+result.data.id+"' value='"+result.data.session_key+"'>"+
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
                    url : "{{url('/admin/destroy-pre-construct-media')}}",
                    type : "post",
                    data : { "_token": "{{ csrf_token() }}",image_id : image_id,session_key: $("#session_key_"+image_id).val()},
                    success : function (data) {
                        //alert(image_id);
                        let url = "{{asset('admin-panel/assets/property-images/media-file/pre-construct')}}" + "/" +data.media_name;
                        let file = "<img class='img-responsive' src='"+url+"' height='100px' width='100px'>";
                        if(data.code == 200){
                            $('#img-remove_' + image_id).hide();
                            $('#file_upload_delete').empty().append(data.message).show();
                            $("#file_upload_message").empty().append(data.message).hide();
                            $("#file_upload_error").empty().append(data.message).hide();
                        }
                    }
                });
            }
        });
    </script>
    <!-- add/del/edit 2d floor plan using ajax with preview -->
    <script>
        $(document).on('click', '#2d_btn',function(e) {
            $.ajax({
                type    : 'post',
                url     : '{{url('/admin/add-2d-file')}}',
                data    : {
                    "_token"    : "{{ csrf_token() }}",
                    _2d_section : $("#2d_section_number").val()
                },
                success : function (response){
                    console.log(response);


                    $("#2d_section_number").val(response.section_upgrade_count)
                    $("#2d_floor_section").append(response.section);
                    // $("#2d_image_preview").append(
                    //     "<div class='image'>" +
                    //     file +
                    //     "<br>" +
                    //     "<button data-id='"+result.data.id+"' type='button' class='btn btn-danger btn-sm' id='delete_btn' style='margin-top:10px; margin-left: 30px;'><i class='fa fa-trash'></i></button>" +
                    //     "</div>"
                    // );
                }
            });
        });

        function check2dInputValidation(sec) {
            let _2d_bathrooms = $("#2d_bath_"+sec).val();
            let _2d_bedrooms = $("#2d_bed_"+sec).val();
            let _2d_image = $("#2d_file_"+sec).val();
            // console.log(_2d_image);
            let url;
            let file;
            if(_2d_bathrooms == '' && _2d_bedrooms == '') {
                $("#2d_bath_error_"+sec).empty().append('Please enter bathrooms.');
                $("#2d_bed_error_"+sec).empty().append('Please enter bedrooms.');
                $("#file_2d_"+sec).val('');
            } else if(_2d_bathrooms == '') {
                $("#2d_bath_error_"+sec).empty().append('Please enter bathrooms.');
                $("#file_2d_"+sec).val('');
            }  else if(_2d_bedrooms == '') {
                $("#2d_bed_error_"+sec).empty().append('Please enter bedrooms.');
                $("#file_2d_"+sec).val('');
            } else {
                $("#2d_bath_error_"+sec).empty();
                $("#2d_bed_error_"+sec).empty();

                let postData = new FormData();
                postData.append('_token', "{{ csrf_token() }}");
                postData.append('section_file', $("#file_2d_"+sec)[0].files[0]);
                postData.append('section_bedrooms', $("#2d_bed_"+sec).val());
                postData.append('section_bathrooms', $("#2d_bath_"+sec).val());

                $.ajax({
                    type    : 'post',
                    url     : '{{url('admin/update-2d-section-on-session')}}',
                    cache       : false,
                    contentType : false,
                    processData : false,
                    data    : postData,
                    success : function (response){
                        console.log(response);
                    }
                });
            }
        }

        /*$(document).on('change', '#file_2d',function() {
            $.ajax({url: "/admin/add-pre-construct-property", success: function(result) {
                 console.log(JSON.stringify(result));
                $("#div1").html(JSON.stringify(result.code));
            }});
        });*/
    </script>
@endsection

<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>

<!-- begin dynamic dependent dropdown country-state -->
<script>
    $(document).ready(function() {
        $('#country-dropdown').on('change', function() {
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
<!-- end dynamic dependent dropdown country-state -->
<!-- for sweetalert2 swal.fire -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- old sweet alert cdn -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{--<script>--}}
{{--    $(document).ready(function() {--}}
{{--        //for floor-plan-2d image--}}
{{--        if (window.File && window.FileList && window.FileReader) {--}}
{{--            $("#btnFloor2D").on("change", function(e) {--}}
{{--                var files = e.target.files,--}}
{{--                    filesLength = files.length;--}}
{{--                for (var i = 0; i < filesLength; i++) {--}}
{{--                    var f = files[i]--}}
{{--                    var fileReader = new FileReader();--}}
{{--                    fileReader.onload = (function(e) {--}}
{{--                        var file = e.target;--}}
{{--                        $("<span class='pip'>" +--}}
{{--                            "<img class='imageThumb' src=' "+ e.target.result + "' title='" + file.name + "' height='100px' width='100px'>" +--}}
{{--                            "<br/><span class='remove'><i class='fa fa-trash-alt' style='color: red'></span>" +--}}
{{--                            "</span>").insertAfter("#floor_2d_plan");--}}
{{--                        $(".remove").click(function(){--}}
{{--                            $(this).parent(".pip").remove();--}}
{{--                        });--}}
{{--                    });--}}
{{--                    fileReader.readAsDataURL(f);--}}
{{--                }--}}
{{--                $('.floor_2d_detail').show();--}}
{{--                console.log(files);--}}
{{--            });--}}
{{--        } else {--}}
{{--            alert("Your browser doesn't support to File API")--}}
{{--        }--}}
{{--        //for floor-plan-3d image--}}
{{--        if (window.File && window.FileList && window.FileReader) {--}}
{{--            $("#btnFloor3D").on("change", function(e) {--}}
{{--                // let image_plan_2d_id = $(this).attr('data-id');--}}
{{--                // console.log(image_plan_2d_id);--}}
{{--                var files = e.target.files,--}}
{{--                    filesLength = files.length;--}}
{{--                for (var i = 0; i < filesLength; i++) {--}}
{{--                    var f = files[i]--}}
{{--                    var fileReader = new FileReader();--}}
{{--                    fileReader.onload = (function(e) {--}}
{{--                        var file = e.target;--}}
{{--                        $("<span class='pip'>" +--}}
{{--                            "<img class='imageThumb' src=' "+ e.target.result +"' title=' " + file.name + " ' height='100px' width='100px'/>" +--}}
{{--                            "<br/><span class='remove'><button class='btn'><i class='fa fa-trash-alt' style='color: red;'></i></button></span>" +--}}
{{--                            "</span>").insertAfter("#floor_3d_plan");--}}
{{--                        $(".remove").click(function(){--}}
{{--                            $(this).parent(".pip").remove();--}}
{{--                        });--}}
{{--                    });--}}
{{--                    fileReader.readAsDataURL(f);--}}
{{--                }--}}
{{--                $('.floor_3d_detail').show();--}}
{{--                console.log(files);--}}
{{--            });--}}
{{--        } else {--}}
{{--            alert("Your browser doesn't support to File API")--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}
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
        var input = document.getElementById('address');
        var autocomplete = new google.maps.places.Autocomplete(input);


        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            //var place = autocomplete.getPlace();
            const place = autocomplete.getPlace();
            //This will get only the address
            input.value = place.name;
           // alert(address);
            // document.getElementById("city").value = place.name;

            // get lat/long using place.geometry.location
            $lat = document.getElementById('latitude').value = place.geometry.location.lat();
            $lnt = document.getElementById('longitude').value = place.geometry.location.lng();

            //get zip code
            var latlng = new google.maps.LatLng($lat, $lnt);
            var geocoder = geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        // var add = results[0].formatted_address;
                        // console.log(add);
                        var address= results[0].formatted_address ;
                        console.log(address);
                        var  value=address.split(",");
                        console.log(value);
                        count=value.length;
                        console.log(count);
                        city=value[count-3];
                        //display only street names as address
                        // $('#address').val(place.address_components[0].long_name);
                        // alert("city name is: " + city);
                        document.getElementById('city').value = city;
                        var pin = results[0].address_components[results[0].address_components.length - 1].long_name;
                        document.getElementById('zip').value = pin;
                        var country = results[0].address_components[results[0].address_components.length - 2].long_name;
                        document.getElementById('country').value = country;
                        var state = results[0].address_components[results[0].address_components.length - 3].long_name;
                        document.getElementById('state').value = state;

                    }
                }
            });
            $('#placePin').click(function () {
                $('#change_address').show();
                $('#placePin').hide();
                // $('#address').attr("disabled", "disabled");
                $("#address").attr('readonly','readonly');
                $("#country").attr('readonly','readonly');
                $("#state").attr('readonly','readonly');
                $("#city").attr('readonly','readonly');
                $("#zip").attr('readonly','readonly');
                // alert('hello');
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
            $('#change_address').click(function () {
                // console.log('change address buton clicked');
                $("#address").removeAttr('readonly');
                $("#country").removeAttr('readonly');
                $("#state").removeAttr('readonly');
                $("#city").removeAttr('readonly');
                $("#zip").removeAttr('readonly');
                $('#address').val('');
                $('#country').val('');
                $('#state').val('');
                $('#city').val('');
                $('#zip').val('');
                $('#placePin').show();
                $('#change_address').hide();
            });


        });

    }
    // $(function () {
    //     $('#placePin').click(initialize)
    // });
    google.maps.event.addDomListener(window, 'load', initialize);
    // $('#placePin').click(function () {
    //     alert('hello');
    // })
</script>
<!-- popup script -->
<!-- add-floor-plan-2d-info -->
<script>

</script>
@endsection


