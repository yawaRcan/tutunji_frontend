@extends('admin.layouts.master')
<!-- title -->
@section('title')
    <title> Add Sale/Lease Property </title>
    <!-- image preview for floor-plan -->
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
                        <h1>Add Sale/Lease Property</h1>
                    </div>
{{--                    <div class="col-sm-6">--}}
{{--                        <ol class="breadcrumb float-sm-right">--}}
{{--                            <li class="breadcrumb-item"><a href=""></a>Properties</li>--}}
{{--                            <li class="breadcrumb-item"><a href="#">Sale</a></li>--}}
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
                                <h3 class="card-title">Add Sale/Lease Property</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url('/admin/add-sale-property')}}" method="post" enctype="multipart/form-data">
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
                                    <div class="row" style="margin-top: 15px">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Address<span style="color: red;">*</span></label>
                                                <input type="text" id="address" name="address" class="form-control" placeholder="Enter Address" value="{{old('address')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Country" class="bmd-label-floating">Country</label>
                                                <input type="text" id="country" name="country" class="form-control" placeholder="Enter country" value="{{old('country')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="state" class="bmd-label-floating">State/Province</label>
                                                <input type="text" id="state" name="state" class="form-control" placeholder="Enter state" value="{{old('country_state')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="neighborhood" class="bmd-label-floating">City</label>
                                                <input type="text" id="city" name="city" class="form-control" placeholder="Enter City" onkeydown="return /[a-z]/i.test(event.key)">
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
                                                {{--                                                <p style="color: grey;font-size: 20px;">Place Pin with Property Address</p>--}}
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
                                                        <input type="text" name="after_price_label" class="form-control" placeholder="Enter price">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Before Price Label (ex: "from ")</label>
                                                        <input type="text" name="before_price_label" class="form-control" placeholder="Enter price">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" for="category-dropdown">Category</label>
                                                <select class="form-control" name="category" id="category-dropdown">
{{--                                                    <option value="">Select Category</option>--}}
{{--                                                    <option value="residential">Residential</option>--}}
{{--                                                    <option value="commercial">Commercial</option>--}}
{{--                                                    <option value="industrial">Industrial</option>--}}
                                                    <option value="">Select Category</option>
                                                    @foreach($allCategory as $allCatData)
                                                        <option value="{{$allCatData->id}}">{{$allCatData->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" for="dropdown">Listed In </label>
                                                <select class="form-control" name="listed_in" id="dropdown">
                                                    <option value="">Select Listed In</option>
                                                    <option value="For Lease">For Lease</option>
                                                    <option value="For Sale">For Sale</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Photos<span style="color: red">*</span> </label>
                                        </div>
                                        <!-- loader -->
                                        <img src="{{asset('frontend/assets/imgs/loading.gif')}}" height="50px" id="media_upload_loader" style="display: none;">
                                        <div class="col-md-12" id="media_upload_btn_section">
                                            <!-- success-message -->
                                            <div id="file_upload_message" style="padding-left: 12px;color: #1ED65f;"></div>
                                            <!-- error-message -->
                                            <div id="file_upload_error" style="padding-left: 12px;color: red;"></div>
                                            <!-- delete-message -->
                                            <div id="file_upload_delete" style="padding-left: 12px;color: #1ED65f"></div>
                                            <div class="fileUpload btn btn-success" style="background-color: #1ED65F;border-color: #1ED65F;">
                                                <span>SELECT MEDIA</span>
                                                <input id="mediaBtn" name="media_name" type="file" class="upload">
                                            </div>
                                            <br>
                                            {{-- @foreach($propertyMedia->media_name as $name)--}}
                                            @if(Session::get('media_name'))
                                                <div class="row">
                                                    @foreach(Session::get('media_name') as $key => $image_rows)
                                                        <input type="hidden" id="session_key_{{ $image_rows['id'] }}" value="{{ $key }}">
                                                        <div id="img-remove_{{ $image_rows['id'] }}">
                                                            @if($image_rows['type'] == 'image')
                                                                @if(file_exists(public_path('admin-panel/assets/property-images/media-file/sale/'.$image_rows['name'])))
                                                                <img src="{{asset('admin-panel/assets/property-images/media-file/sale/'.$image_rows['name'])}}" height="100px" width="100px" style="margin-left: 27px;" id="del_img_{{ $image_rows['id'] }}">
                                                                @else
                                                                    <img src="{{asset('default/property-img-default.png')}}" height="100px" width="100px" style="margin-left: 27px;" id="del_img_{{ $image_rows['id'] }}">
                                                                @endif
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
                                                <p style="color: grey">* At least 1 image is required for a valid submission.</p>
                                                <p style="color: grey">** Only png, jpg and webp file types are allowed.</p>
                                                <p style="color: grey">*** Media file size should be less than or equal to 2 MB.</p>
{{--                                                    <p>Minimum size is 1000/1000px.</p>--}}
{{--                                                <p style="color: grey">** Double click on the image to select featured.</p>--}}
{{--                                                <p style="color: grey">*** Change images order with Drag & Drop.</p>--}}
{{--                                                <p style="color: grey">**** PDF files upload supported as well.</p>--}}
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
                                                <!-- loader -->
                                                <img src="{{asset('frontend/assets/imgs/loading.gif')}}" height="50px" id="floor_plan_2d_loader" style="display: none;">
                                                <div class="row"  id="floor_plan_2d_upload_section">
                                                    <div class="col-md-12">
                                                        {{--                                                        <label class="2d_file">Select Floor Plan</label>--}}
                                                        <div class="fileUpload btn btn-success" style="background-color: #1ED65F;border-color: #1ED65F;margin-top: 0;margin-bottom: 0;">
                                                            <span>SELECT PLAN</span>
                                                            <input type="file" class="upload" id="2d_file" name="2d_file">
                                                        </div>
                                                        <span class="text-danger" id="2d_file_error"></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="2d_bed">No. Of Bedroom</label>
                                                            <input type="text" name="2d_bed" id="2d_bed" class="form-control numbersOnly" placeholder="Enter no. of bedrooms">
                                                            <span class="text-danger float-left" id="2d_bed_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="2d_bath">No. Of Bathroom</label>
                                                            <input type="text" name="2d_bath" id="2d_bath" class="form-control numbersOnly" placeholder="Enter no. of bathrooms">
                                                            <span class="text-danger float-left" id="2d_bath_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="2d_sqft">Sqft</label>
                                                            <input type="text" name="2d_sqft" id="2d_sqft" class="form-control numbersOnly" placeholder="Enter sqft">
                                                            <span class="text-danger float-left" id="2d_sqft_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group" style="margin-top: 30px">
                                                            <button type="button" id="select_btn" name="select_btn" class="btn btn-primary" style="background-color: #1ed760;border-color: #1ed760"><i class="fa fa-plus-circle"></i>&nbsp;ADD PLAN</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- floor plan 2D alert messages -->
                                                <span class="text-success" id="floor-plan-2d-success-msg"></span>
                                                <span class="text-danger" id="floor-plan-2d-error-msg"></span>
                                                <div class="row" id="2d_file_preview">
                                                    @php($_2d_session = \Illuminate\Support\Facades\Session::get('session_data'))
                                                    @if($_2d_session)
                                                        <input type="hidden" name="_2d_image_id" id="_2d_image_id" value="{{ count($_2d_session) }}">
                                                        @foreach($_2d_session as $_2d_row)
                                                            <div class="col-md-3">
                                                                <div id="2d_child_section_{{ $_2d_row['input_image_id'] }}">
                                                                    <div>
                                                                        @php($url = asset('admin-panel/assets/property-images/floor-plan-2D/sale/'.$_2d_row['input_file']))
                                                                        <img class='img-responsive' src="{{ $url }}" height='150px' width='100%'>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label style="float: left">Bedroom <br> {{ $_2d_row['input_bedrooms'] }}</label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label style="float: right">Bathroom <br> {{ $_2d_row['input_bathrooms'] }}</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label style="text-align: center;">Sqft <br> {{ $_2d_row['input_sqft'] }}</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <button style="float:right;" data-id='{{ $_2d_row['input_image_id'] }}' type='button' class='btn btn-info btn-sm' id='edit_2d_btn' data-input_image_id='{{ $_2d_row['input_image_id'] }}' data-2d_image_url='{{ $url }}' data-bedroom='{{ $_2d_row['input_bedrooms'] }}' data-bathroom='{{ $_2d_row['input_bathrooms'] }}' data-sqft='{{ $_2d_row['input_sqft'] }}'><i class='fa fa-edit'></i></button>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <button style="float:left;" data-id='{{ $_2d_row['input_image_id'] }}' type='button' class='btn btn-danger btn-sm' id='delete_2d_btn' data-input_image_id='{{ $_2d_row['input_image_id'] }}'><i class='fa fa-trash'></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <input type="hidden" name="_2d_image_id" id="_2d_image_id" value="">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-center" style="border: 1px solid lightgrey;padding: 20px;" id="floor_3d_plan">
                                                <h2>3D</h2>
                                                <!-- loader -->
                                                <img src="{{asset('frontend/assets/imgs/loading.gif')}}" height="50px" id="floor_plan_3d_loader" style="display: none;">
                                                <div class="row" id="floor_plan_3d_upload_section">
                                                    <div class="col-md-12">
                                                        {{--                                                        <label class="3d_file">Select Floor Plan</label>--}}
                                                        <div class="fileUpload btn btn-success" style="background-color: #1ED65F;border-color: #1ED65F;margin-top: 0;margin-bottom: 0;">
                                                            <span>SELECT PLAN</span>
                                                            <input type="file" name="3d_file" class="upload" id="3d_file">
                                                        </div>
                                                        <span class="text-danger" id="3d_file_error"></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="f_3d_bed">No. Of Bedroom</label>
                                                            <input type="text" name="f_3d_bed" id="f_3d_bed" class="form-control numbersOnly" placeholder="Enter no. of bedrooms">
                                                            <span class="text-danger float-left" id="3d_bed_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="f_3d_bath">No. Of Bathroom</label>
                                                            <input type="text" name="f_3d_bath" id="f_3d_bath" class="form-control numbersOnly" placeholder="Enter no. of bathrooms">
                                                            <span class="text-danger float-left" id="3d_bath_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="f_3d_sqft">Sqft</label>
                                                            <input type="text" name="f_3d_sqft" id="f_3d_sqft" class="form-control numbersOnly" placeholder="Enter sqft">
                                                            <span class="text-danger float-left" id="3d_sqft_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group" style="margin-top: 30px">
                                                            <button type="button" id="select_f_3d_btn" name="select_f_3d_btn" class="btn btn-primary" style="background-color: #1ed760;border-color: #1ed760"><i class="fa fa-plus-circle"></i>&nbsp;ADD PLAN</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- floor plan 3D alert messages -->
                                                <span class="text-success" id="floor-plan-3d-success-msg"></span>
                                                <span class="text-danger" id="floor-plan-3d-error-msg"></span>
                                                <div class="row" id="3d_file_preview">
                                                    @php($_3d_session = \Illuminate\Support\Facades\Session::get('session_3d_data'))
                                                    @if($_3d_session)
                                                        <input type="hidden" name="_3d_image_id" id="_3d_image_id" value="{{ count($_3d_session) }}">
                                                        @foreach($_3d_session as $_3d_row)
                                                            <div class="col-md-3">
                                                                <div id="3d_child_section_{{ $_3d_row['input_image_id'] }}">
                                                                    <div>
                                                                        @php($url = asset('admin-panel/assets/property-images/floor-plan-3D/sale/'.$_3d_row['input_file']))
                                                                        <img class='img-responsive' src="{{ $url }}" height='150px' width='100%'>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label style="float: left">Bedroom <br> {{ $_3d_row['input_bedrooms'] }}</label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label style="float: right">Bathroom <br> {{ $_3d_row['input_bathrooms'] }}</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label style="text-align: center">Sqft <br> {{ $_3d_row['input_sqft'] }}</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <button style="float:right;" data-id='{{ $_3d_row['input_image_id'] }}' type='button' class='btn btn-info btn-sm' id='edit_3d_btn' data-input_image_id='{{ $_3d_row['input_image_id'] }}' data-3d_image_url='{{ $url }}' data-bedroom='{{ $_3d_row['input_bedrooms'] }}' data-bathroom='{{ $_3d_row['input_bathrooms'] }}' data-sqft='{{$_3d_row['input_sqft']}}'><i class='fa fa-edit'></i></button>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <button style="float:left;" data-id='{{ $_3d_row['input_image_id'] }}' type='button' class='btn btn-danger btn-sm' id='delete_3d_btn' data-input_image_id='{{ $_3d_row['input_image_id'] }}'><i class='fa fa-trash'></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <input type="hidden" name="_3d_image_id" id="_3d_image_id" value="">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Size in ft2 </label>
                                                <input type="text" name="size_in_ft2" class="form-control" placeholder="Enter size in square feet" maxlength="20">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Lot Size in ft2 </label>
                                                <input type="text" name="lot_size_in_ft2" class="form-control" placeholder="Enter lot size in square feet" maxlength="20">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Rooms </label>
                                                <input type="text" name="rooms" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Enter rooms">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Bedrooms </label>
                                                <input type="text" name="bedrooms" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Enter bedrooms">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Bathrooms </label>
                                                <input type="text" name="bathrooms" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Enter bathrooms">
                                            </div>
                                        </div>
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label class="bmd-label-floating">Custom ID (*text)</label>--}}
{{--                                                <input type="text" name="custom_id" class="form-control" onkeydown="return /[a-z]/i.test(event.key)" placeholder="Enter Custom ID">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Year Built </label>
                                                <input type="text" name="year_built" class="form-control" placeholder="Enter Year built">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Parking Spots</label>
                                                <input type="text" name="garages" class="form-control" placeholder="Enter parking spots">
                                            </div>
                                        </div>
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label class="bmd-label-floating">Available from (*date)</label>--}}
{{--                                                <input type="date" name="available_from" class="form-control">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label class="bmd-label-floating">Garage Size (*text)</label>--}}
{{--                                                <input type="text" name="garage_size" class="form-control" onkeydown="return /[a-z]/i.test(event.key)" placeholder="Enter garage size" maxlength="20">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label class="bmd-label-floating">External Construction (*text)</label>--}}
{{--                                                <input type="text" name="external_construction" class="form-control" onkeydown="return /[a-z]/i.test(event.key)" placeholder="Enter external construction" maxlength="20">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Basement</label>
{{--                                                <input type="text" name="basement" class="form-control" onkeydown="return /[a-z]/i.test(event.key)" placeholder="Enter basement" maxlength="20">--}}
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
                                                    <option value="">Select Floor No</option>
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
                                                <select name="structure_type" id="structure_type" class="form-control">
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
                                    <div class="row">
                                        {{--<div class="col-md-6">
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
                                        </div>--}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="agent" class="bmd-label-floating">Agent</label>
                                                {{--<input type="text" name="Construction" class="form-control">--}}
                                                <select name="agent" id="agent" class="form-control">
                                                    <option value="">Select Agent</option>
                                                    @foreach($agentData as $agentDetail)
                                                        <option value="{{$agentDetail->id}}">{{$agentDetail->fullName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
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
                                                    <option value="">Select Video From</option>
                                                    <option value="youtube">Youtube </option>
                                                    <option value="vimeo">Vimeo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Video">Embed Video id:</label>
                                                <input type="text" id="Video" name="embed_video_id" class="form-control" placeholder="Enter embed video id">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;">Save</button>
                                    <a href="{{url('/admin/list-sale-property')}}" class="btn btn-default" style="background-color: #949496;border-color: #949496;color: white">Back</a>
                                </div>
                            </form>
                            {{--Start Add Modal 2D--}}
                            <div class="modal fade" id="update_2d_floor_detail" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Update 2D Floor Plan Detail </h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="session_id_for_edit" id="session_id_for_edit" value="{{Session::get('input_image_id')}}">
                                            <label class="2d_file">Select File</label><br>
                                            <!-- loader -->
                                            <img src="{{asset('frontend/assets/imgs/loading.gif')}}" height="50px" id="update_floor_plan_2d_loader" style="display: none;">
                                            <div class="fileUpload btn btn-success" style="background-color: #1ED65F;border-color: #1ED65F;margin:0;" id="update_floor_plan_2d_btn">
                                                <span>SELECT PLAN</span>
                                                <input type="file" name="2d_file_update" id="2d_file_update" class="upload">
                                            </div>
                                            <!-- display error message -->
                                            <span class="text-danger" id="update-floor-plan-2d-error-msg"></span>
                                            <!-- update image 2d preview -->
                                            <div id="edit_2d_image_section" style="margin-top: 5px;"></div>
                                            {{--                                            <div class="form-group">--}}
                                            {{--                                                <label class="2d_file">Select File</label>--}}
                                            {{--                                                <input type="file" name="2d_file_update" class="form-control" id="2d_file_update">--}}
                                            {{--                                                <div id="edit_2d_image_section"></div>--}}
                                            {{--                                            </div>--}}
                                            <div class="form-group">
                                                <label class="2d_bed">No. Of Bedroom</label>
                                                <input type="text" name="2d_bed_update" id="2d_bed_update" class="form-control numbersOnly" value="{{Session::get('input_bedrooms')}}">
                                            </div>
                                            <div class="form-group">
                                                <label class="2d_bath">No. Of Bathroom</label>
                                                <input type="text" name="2d_bath_update" id="2d_bath_update" class="form-control numbersOnly" value="{{Session::get('input_bathrooms')}}">
                                            </div>

                                            <div class="form-group">
                                                <label class="2d_sqft">Sqft</label>
                                                <input type="text" name="2d_sqft_update" id="2d_sqft_update" class="form-control numbersOnly" value="{{Session::get('input_sqft')}}">
                                            </div>
                                            <hr>
                                            <div>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-success" value="Update" id="update_2d_floor_section" style="float: right;background: #1ED65F;border-color: #1ED65F;">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--End Add Modal--}}
                            {{--Start Add Modal 3D--}}
                            <div class="modal fade" id="update_3d_floor_detail" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add 3D Floor Plan Detail</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="session_id_for_edit_3d" id="session_id_for_edit_3d" value="{{Session::get('input_3d_image_id')}}">
                                            <label class="3d_file">Select File</label><br>
                                            <!-- loader -->
                                            <img src="{{asset('frontend/assets/imgs/loading.gif')}}" height="50px" id="update_floor_plan_3d_loader" style="display: none;">
                                            <div class="fileUpload btn btn-success" style="background-color: #1ED65F;border-color: #1ED65F;margin:0;" id="update_floor_plan_3d_btn">
                                                <span>SELECT PLAN</span>
                                                <input type="file" name="3d_file_update" class="upload" id="3d_file_update">
                                            </div>
                                            <!-- display floor plan 3d error message -->
                                            <span class="text-danger" id="update-floor-plan-3d-error-msg"></span>
                                            <!-- update 3d image preview -->
                                            <div id="edit_3d_image_section"></div>
                                            <div class="form-group">
                                                <label class="3d_bed_update">No. Of Bedroom</label>
                                                <input type="text" name="3d_bed_update" id="3d_bed_update" class="form-control numbersOnly" value="{{Session::get('input_3d_bedrooms')}}">
                                            </div>
                                            <div class="form-group">
                                                <label class="3d_bath_update">No. Of Bathroom</label>
                                                <input type="text" name="3d_bath_update" id="3d_bath_update" class="form-control numbersOnly" value="{{Session::get('input_3d_bathrooms')}}">
                                            </div>
                                            <div class="form-group">
                                                <label class="3d_sqft_update">sqft</label>
                                                <input type="text" name="3d_sqft_update" id="3d_sqft_update" class="form-control numbersOnly" value="{{Session::get('input_3d_sqft')}}">
                                            </div>
                                            <hr>
                                            <div>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-success" value="Update" id="update_3d_floor_section" style="float: right;background: #1ED65F;border-color: #1ED65F;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--End Add Modal--}}
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
<!-- begin script for add/del media-file -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            $('#media_upload_btn_section').hide();
            $('#media_upload_loader').show();
            $.ajax({
                async:true,
                type        :'post',
                url         : "{{ url('/admin/add-media-file')}}",
                data        : postData,
                cache       : false,
                contentType : false,
                processData : false,
                success     : function(result) {
                    $('#media_upload_btn_section').show();
                    $('#media_upload_loader').hide();
                    //console.log(result);
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
                            url = "{{asset('admin-panel/assets/property-images/media-file/sale')}}" + "/" +result.data.media_name;
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
                    if(result.code == 404){
                        $('#file_upload_error').empty().append(result.message);
                    }
                    console.log(result);
                }
            });
        });
        $(document).on("click","#delete_btn",function (e) {
            e.preventDefault();
            let image_id = $(this).attr('data-id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this media?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url : "{{url('/admin/delete-media-file')}}",
                        type : "post",
                        data : { "_token": "{{ csrf_token() }}",image_id : image_id,session_key: $("#session_key_"+image_id).val()},
                        success : function (data) {
                            //alert(image_id);
                            let url = "{{asset('admin-panel/assets/property-images/media-file/sale')}}" + "/" +data.media_name;
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
            })
        });
    </script>
@endsection
<!-- end script for add/del media-file -->
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
<!-- Begin floor-plan-2d & 3d image preview-del -->
<script>
    $(document).ready(function() {
        //for floor-plan-2d image
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
                            "<img class='imageThumb' src=' "+ e.target.result + "' title='" + file.name + "' height='100px' width='100px'>" +
                            "<br/><span class='remove'><i class='fa fa-trash-alt' style='color: red'></span>" +
                            "</span>").insertAfter("#floor_2d_plan");
                        $(".remove").click(function(){
                            $(this).parent(".pip").remove();
                        });
                    });
                    fileReader.readAsDataURL(f);
                }
                $('.floor_2d_detail').show();
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
                $('.floor_3d_detail').show();
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
        var input = document.getElementById('address');
        var autocomplete = new google.maps.places.Autocomplete(input);

        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            //var place = autocomplete.getPlace();
            const place = autocomplete.getPlace();
            //This will get only the address
            input.value = place.name;
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
                        var add= results[0].formatted_address ;
                        var  value=add.split(",");
                        console.log(value);
                        count=value.length;
                        city=value[count-3];
                        // alert("city name is: " + city);
                        //display only street names as address
                        // $('#address').val(place.address_components[0].long_name);
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


        });
        $('#placePin').click(function () {
           // alert('place pin buton is clicked');
            $('#change_address').show();
            $("#address").attr('readonly','readonly');
            $("#country").attr('readonly','readonly');
            $("#state").attr('readonly','readonly');
            $("#city").attr('readonly','readonly');
            $("#zip").attr('readonly','readonly');
            $('#placePin').hide();
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
            //alert('chnage button is clicked');
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
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <!-- add-floor-plan-2d-info -->
    <script>
        $('#select_btn').click(function (){
            var bedroom = $('#2d_bed').val();
            var bathroom = $('#2d_bath').val();
            var sqft = $('#2d_sqft').val();
            var imageFile = $('#2d_file').val();

            if(bathroom == '' && bedroom == '' && sqft == '') {
                $("#2d_bath_error").empty().append('Please enter bathrooms.');
                $("#2d_bed_error").empty().append('Please enter bedrooms.');
                $("#2d_file_error").empty().append('Please select floor plan.');
                $("#2d_sqft_error").empty().append('Please enter sqft.');
                $("#2d_file").val('');
                $('#floor-plan-2d-error-msg').empty();
                $('#floor-plan-2d-success-msg').empty();
            } else if(bathroom == '') {
                $("#2d_bath_error").empty().append('Please enter bathrooms.');
                $("#2d_file_error").empty().append('Please select floor plan.');
                $("#2d_bed_error").empty().append('Please enter bedrooms.');
                $("#2d_sqft_error").empty().append('Please enter sqft.');
                $("#2d_file").val('');
                $('#floor-plan-2d-error-msg').empty();
                $('#floor-plan-2d-success-msg').empty();
            }  else if(bedroom == '') {
                $("#2d_bath_error").empty().append('Please enter bathrooms.');
                $("#2d_bed_error").empty().append('Please enter bedrooms.');
                $("#2d_file_error").empty().append('Please select floor plan.');
                $("#2d_sqft_error").empty().append('Please enter sqft.');
                $("#2d_file").val('');
                $('#floor-plan-2d-error-msg').empty();
                $('#floor-plan-2d-success-msg').empty();
            } else if(imageFile == '' && bedroom != '' && bathroom != '' && sqft != ''){
                $("#2d_file_error").empty().append('Please select floor plan.');
                $('#floor-plan-2d-error-msg').empty();
                $('#floor-plan-2d-success-msg').empty();
            }
            else {
                $("#2d_bath_error").empty();
                $("#2d_bed_error").empty();
                $("#2d_file_error").empty();
                $("#2d_sqft_error").empty();

                let postData = new FormData();
                postData.append('_token', "{{ csrf_token() }}");
                postData.append('input_file', $("#2d_file")[0].files[0]);
                postData.append('input_bedrooms', $("#2d_bed").val());
                postData.append('input_bathrooms', $("#2d_bath").val());
                postData.append('input_sqft', $("#2d_sqft").val());
                //loader
                $('#floor_plan_2d_loader').show();
                $('#floor_plan_2d_upload_section').hide();

                let image_id_no = $('#_2d_image_id').val();
                image_id_no++;
                $('#_2d_image_id').val(image_id_no);
                postData.append('input_image_id',$('#_2d_image_id').val());

                $.ajax({
                    type    : 'post',
                    url     : '{{url('admin/update-2d-section-on-sale-session')}}',
                    cache       : false,
                    contentType : false,
                    processData : false,
                    data    : postData,
                    success : function (response){
                        $('#floor_plan_2d_loader').hide();
                        $('#floor_plan_2d_upload_section').show();
                        // console.log(response.data.images);
                        console.log(response);
                        if(response.status == 404){
                            $('#floor-plan-2d-error-msg').empty().append('Only png, jpg and webp file types are allowed.');
                            $('#floor-plan-2d-success-msg').empty();
                            $('#2d_file').val('');
                            $('#2d_bath').val('');
                            $('#2d_bed').val('');
                            $('#2d_sqft').val('');
                        }else if(response.code == 400){
                            $('#floor-plan-2d-error-msg').empty().append(response.message);
                            $('#floor-plan-2d-success-msg').empty();
                            $('#2d_file').val('');
                            $('#2d_bath').val('');
                            $('#2d_bed').val('');
                            $('#2d_sqft').val('');
                        }else if(response.code == 200){
                            $('#floor-plan-2d-error-msg').empty().append(response.message);
                            $('#floor-plan-2d-success-msg').empty();
                            $('#2d_file').val('');
                            $('#2d_bath').val('');
                            $('#2d_bed').val('');
                            $('#2d_sqft').val('');
                        }else{
                            $('#2d_file').val('');
                            $('#2d_bath').val('');
                            $('#2d_bed').val('');
                            $('#2d_sqft').val('');

                            $('#floor-plan-2d-success-msg').empty().append('Floor plan 2D saved!');
                            $('#floor-plan-2d-error-msg').empty();

                            let url = "{{asset('admin-panel/assets/property-images/floor-plan-2D/sale')}}" + "/" +response.data.input_file;
                            let file = "<img class='img-responsive' src='"+url+"' height='150px' width='100%' id='del_img_"+response.data.input_image_id+"'>";

                            $("#2d_file_preview").append('<div class="col-md-3">' +
                                '<div id="2d_child_section_'+image_id_no+'">' +
                                '<div>' + file +'</div>' +
                                '<div class="row">' +
                                '<div class="col-md-6">' +
                                '<label style="float: left">Bedroom <br> '+response.data.input_bedrooms+'</label>' +
                                '</div>' +
                                '<div class="col-md-6">' +
                                '<label style="float: right">Bathroom <br> '+response.data.input_bathrooms+'</label>' +
                                '</div>' +
                                '<div class="col-md-12">' +
                                '<label style="text-align: center">sqft <br> '+response.data.input_sqft+'</label>' +
                                '</div>' +
                                '</div>' +
                                '<div class="row">' +
                                '<div class="col-md-6">' +
                                '<button style="float:right;" data-id="'+response.data.input_image_id+'" type="button" class="btn btn-info btn-sm" id="edit_2d_btn" data-input_image_id="'+response.data.input_image_id+'" data-2d_image_url="'+url+'" data-bedroom="'+response.data.input_bedrooms+'" data-bathroom="'+response.data.input_bathrooms+'" data-sqft="'+response.data.input_sqft+'"><i class="fa fa-edit"></i></button>' +
                                '</div>' +
                                '<div class="col-md-6">' +
                                '<button style="float:left;" data-id="'+response.data.input_image_id+'" type="button" class="btn btn-danger btn-sm" id="delete_2d_btn" data-input_image_id=""><i class="fa fa-trash"></i></button>' +
                                '</div>' +
                                '</div>')
                        }

                        // $('#2d_file_preview').append('<div id="2d_child_section_'+image_id_no+'"> <div>' + file +'</div>'+ '<label>Bedroom</label>'+'<div>'+ response.data.input_bedrooms+'</div>'+'<label>Bathroom</label>'+'<div>'+ response.data.input_bathrooms+'</div>'+ "<br>" +
                        //     "<button data-id='"+response.data.input_image_id+"' type='button' class='btn btn-info btn-sm' id='edit_2d_btn' data-input_image_id='"+response.data.input_image_id+"' data-2d_image_url='"+url+"' data-bedroom='"+response.data.input_bedrooms+"' data-bathroom='"+response.data.input_bathrooms+"' ><i class='fa fa-edit'></i></button></div>"
                        // );
                    }
                });
            }
        });

        $(document).on('click', '#edit_2d_btn', function (){
            $("#2d_file_update").val('');
            $("#session_id_for_edit").val($(this).attr("data-input_image_id"));
            $("#2d_bed_update").val($(this).attr("data-bedroom"));
            $("#2d_bath_update").val($(this).attr("data-bathroom"));
            $("#2d_sqft_update").val($(this).attr("data-sqft"));
            $("#edit_2d_image_section").empty().append("<img class='img-responsive' src='"+$(this).attr("data-2d_image_url")+"' height='100px' width='100px' style='margin: 10px;'>")
            $("#update_2d_floor_detail").modal('show');
        });

        $(document).on("click","#update_2d_floor_section",function (e) {
            e.preventDefault();
            let image_id_no = $("#session_id_for_edit").val();
            let postData = new FormData();
            postData.append('_token', "{{ csrf_token() }}");
            postData.append('session_index_id', image_id_no);
            postData.append('input_file', $("#2d_file_update")[0].files[0]);
            postData.append('input_bedrooms', $("#2d_bed_update").val());
            postData.append('input_bathrooms', $("#2d_bath_update").val());
            postData.append('input_sqft', $("#2d_sqft_update").val());
            //display-loader
            $('#update_floor_plan_2d_loader').show();
            $('#update_floor_plan_2d_btn').hide();

            $.ajax({
                url         : "{{url('/admin/update-2d-floor-sale-image')}}",
                type        : "post",
                cache       : false,
                contentType : false,
                processData : false,
                data        : postData,
                success     : function (response) {
                    //hide-loader
                    $('#update_floor_plan_2d_loader').hide();
                    $('#update_floor_plan_2d_btn').show();
                    console.log(response);
                    if(response.code == 404){
                        $('#update-floor-plan-2d-error-msg').empty().append('Only png, jpg and webp file types are allowed.');
                    }else if(response.code == 400){
                        $('#update-floor-plan-2d-error-msg').empty().append(response.message);
                    } else {
                        $("#update_2d_floor_detail").modal('hide');
                        $('#floor-plan-2d-success-msg').empty().append('Floor plan 2D updated!');
                        $('#floor-plan-2d-error-msg').empty();

                        let url = "{{asset('admin-panel/assets/property-images/floor-plan-2D/sale')}}" + "/" + response.data.input_file;
                        let file = "<img class='img-responsive' src='" + url + "' height='150px' width='100%' id='del_img_" + response.data.input_image_id + "'>";
                        $('#2d_child_section_'+image_id_no).empty().append('<div>' + file +'</div>' +
                            '<div class="row">' +
                            '<div class="col-md-6">' +
                            '<label style="float: left">Bedroom <br> '+response.data.input_bedrooms+'</label>' +
                            '</div>' +
                            '<div class="col-md-6">' +
                            '<label style="float: right">Bathroom <br> '+response.data.input_bathrooms+'</label>' +
                            '</div>' +
                            '<div class="col-md-12">' +
                            '<label style="text-align: center;">Sqft <br> '+response.data.input_sqft+'</label>' +
                            '</div>' +
                            '</div>' +
                            '<div class="row">' +
                            '<div class="col-md-6">' +
                            '<button style="float:right;" data-id="'+response.data.input_image_id+'" type="button" class="btn btn-info btn-sm" id="edit_2d_btn" data-input_image_id="'+response.data.input_image_id+'" data-2d_image_url="'+url+'" data-bedroom="'+response.data.input_bedrooms+'" data-bathroom="'+response.data.input_bathrooms+'" data-sqft="'+response.data.input_sqft+'"><i class="fa fa-edit"></i></button>' +
                            '</div>' +
                            '<div class="col-md-6">' +
                            '<button style="float:left;" data-id="'+response.data.input_image_id+'" type="button" class="btn btn-danger btn-sm" id="delete_2d_btn" data-input_image_id=""><i class="fa fa-trash"></i></button>' +
                            '</div>' +
                            '</div>');
                    }
                    // $('#2d_child_section_'+image_id_no).empty().append('<div>' + file +'</div>'+ '<label>Bedroom</label>'+'<div>'+ response.data.input_bedrooms+'</div>'+'<label>Bathroom</label>'+'<div>'+ response.data.input_bathrooms+'</div>'+ "<br>" +
                    //     "<button data-id='"+response.data.input_image_id+"' type='button' class='btn btn-info btn-sm' id='edit_2d_btn' data-input_image_id='"+response.data.input_image_id+"' data-2d_image_url='"+url+"' data-bedroom='"+response.data.input_bedrooms+"' data-bathroom='"+response.data.input_bathrooms+"' ><i class='fa fa-edit'></i></button>"
                    // );
                }
            });
            // }
        });

        $(document).on('click', '#delete_2d_btn', function (){
            let deleted_id = $(this).attr('data-id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this floor plan 2D?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type    : 'post',
                        url     : '{{url('admin/delete-sale-2d-image')}}',
                        data    : {
                            _token : '{{ @csrf_token() }}',
                            deleted_id : deleted_id
                        },
                        success : function (response) {
                            if(response.code === 200) {

                                location.reload();
                                // $("#floor-plan-2d-success-msg").empty().append('Floor plan 2D deleted!');
                                Swal.fire('Good job!', 'Floor plan 2D has been deleted successfully!', 'success')
                                $('#floor-plan-2d-error-msg').empty();
                            }
                            console.log(response);
                        }
                    });
                }
            })
        });
    </script>
    <!-- add-floor-plan-3d-info -->
    <script>
        $('#select_f_3d_btn').click(function (){
            var bedroom = $('#f_3d_bed').val();
            var bathroom = $('#f_3d_bath').val();
            var sqft = $('#f_3d_sqft').val();
            var imageFile = $('#3d_file').val();

            if(bathroom == '' && bedroom == '' && sqft == '') {
                $("#3d_bath_error").empty().append('Please enter bathrooms.');
                $("#3d_bed_error").empty().append('Please enter bedrooms.');
                $("#3d_file_error").empty().append('Please select floor plan.');
                $("#3d_sqft_error").empty().append('Please enter sqft.');
                $("#3d_file").val('');
                $('#floor-plan-3d-error-msg').empty();
                $('#floor-plan-3d-success-msg').empty();
            } else if(bathroom == '') {
                $("#3d_bath_error").empty().append('Please enter bathrooms.');
                $("#3d_file_error").empty().append('Please select floor plan.');
                $("#3d_bed_error").empty().append('Please enter bedrooms.');
                $("#3d_sqft_error").empty().append('Please enter sqft.');
                $("#3d_file").val('');
                $('#floor-plan-3d-error-msg').empty();
                $('#floor-plan-3d-success-msg').empty();
            }  else if(bedroom == '') {
                $("#3d_bath_error").empty().append('Please enter bathrooms.');
                $("#3d_bed_error").empty().append('Please enter bedrooms.');
                $("#3d_file_error").empty().append('Please select floor plan.');
                $("#3d_sqft_error").empty().append('Please enter sqft.');
                $("#3d_file").val('');
                $('#floor-plan-3d-error-msg').empty();
                $('#floor-plan-3d-success-msg').empty();
            }
            else if(sqft == '') {
                $("#3d_bath_error").empty().append('Please enter bathrooms.');
                $("#3d_bed_error").empty().append('Please enter bedrooms.');
                $("#3d_file_error").empty().append('Please select floor plan.');
                $("#3d_sqft_error").empty().append('Please enter sqft.');
                $("#3d_file").val('');
                $('#floor-plan-3d-error-msg').empty();
                $('#floor-plan-3d-success-msg').empty();
            }else if(imageFile == '' && bedroom != '' && bathroom != '' && sqft != ''){
                $("#3d_file_error").empty().append('Please select floor plan.');
                $('#floor-plan-3d-error-msg').empty();
                $('#floor-plan-3d-success-msg').empty();
            }
            else {
                $("#3d_bath_error").empty();
                $("#3d_bed_error").empty();
                $("#3d_file_error").empty();
                $("#3d_sqft_error").empty();

                let postData = new FormData();
                postData.append('_token', "{{ csrf_token() }}");
                postData.append('input_file', $("#3d_file")[0].files[0]);
                postData.append('input_bedrooms', $("#f_3d_bed").val());
                postData.append('input_bathrooms', $("#f_3d_bath").val());
                postData.append('input_sqft', $("#f_3d_sqft").val());

                //display-loader
                $('#floor_plan_3d_loader').show();
                $('#floor_plan_3d_upload_section').hide();
                let image_id_no = $('#_3d_image_id').val();
                image_id_no++;
                $('#_3d_image_id').val(image_id_no);
                postData.append('input_image_id',$('#_3d_image_id').val());

                $.ajax({
                    type    : 'post',
                    url     : '{{url('/admin/update-3d-section-on-sale-session')}}',
                    cache       : false,
                    contentType : false,
                    processData : false,
                    data    : postData,
                    success : function (response){
                        //hide-loader
                        $('#floor_plan_3d_loader').hide();
                        $('#floor_plan_3d_upload_section').show();
                        // console.log(response.data.images);
                        console.log(response);
                        if(response.status == 404){
                            $('#floor-plan-3d-error-msg').empty().append(response.message);
                            $('#floor-plan-3d-success-msg').empty();
                            $('#3d_file').val('');
                            $('#f_3d_bath').val('');
                            $('#f_3d_bed').val('');
                            $('#f_3d_sqft').val('');
                        }else if(response.code == 400){
                            $('#floor-plan-3d-error-msg').empty().append(response.message);
                            $('#floor-plan-3d-success-msg').empty();
                            $('#3d_file').val('');
                            $('#f_3d_bath').val('');
                            $('#f_3d_bed').val('');
                            $('#f_3d_sqft').val('');
                        }else if(response.code == 200){
                            $('#floor-plan-3d-error-msg').empty().append(response.message);
                            $('#floor-plan-3d-success-msg').empty();
                            $('#3d_file').val('');
                            $('#f_3d_bath').val('');
                            $('#f_3d_bed').val('');
                            $('#f_3d_sqft').val('');
                        }
                        else {
                            $('#3d_file').val('');
                            $('#f_3d_bath').val('');
                            $('#f_3d_bed').val('');
                            $('#f_3d_sqft').val('');

                            $('#floor-plan-3d-success-msg').empty().append('Floor plan 3D saved!');
                            $('#floor-plan-3d-error-msg').empty();

                            let url;
                            let file;

                            url = "{{asset('admin-panel/assets/property-images/floor-plan-3D/sale')}}" + "/" + response.data.input_file;
                            file = "<img class='img-responsive' src='" + url + "' height='150px' width='100%' id='del_img_" + response.data.input_image_id + "'>";

                            $("#3d_file_preview").append('<div class="col-md-3">' +
                                '<div id="3d_child_section_' + image_id_no + '">' +
                                '<div>' + file + '</div>' +
                                '<div class="row">' +
                                '<div class="col-md-6">' +
                                '<label style="float: left">Bedroom <br> ' + response.data.input_bedrooms + '</label>' +
                                '</div>' +
                                '<div class="col-md-6">' +
                                '<label style="float: right">Bathroom <br> ' + response.data.input_bathrooms + '</label>' +
                                '</div>' +
                                '<div class="col-md-12">' +
                                '<label style="text-align: center">Sqft <br> ' + response.data.input_sqft + '</label>' +
                                '</div>' +
                                '</div>' +
                                '<div class="row">' +
                                '<div class="col-md-6">' +
                                '<button style="float:right;" data-id="' + response.data.input_image_id + '" type="button" class="btn btn-info btn-sm" id="edit_3d_btn" data-input_image_id="' + response.data.input_image_id + '" data-3d_image_url="' + url + '" data-bedroom="' + response.data.input_bedrooms + '" data-bathroom="' + response.data.input_bathrooms + '" data-sqft="'+response.data.input_sqft+'"><i class="fa fa-edit"></i></button>' +
                                '</div>' +
                                '<div class="col-md-6">' +
                                '<button style="float:left;" data-id="' + response.data.input_image_id + '" type="button" class="btn btn-danger btn-sm" id="delete_3d_btn" data-input_image_id=""><i class="fa fa-trash"></i></button>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>')
                        }
                        // $('#3d_file_preview').append('<div id="3d_child_section_'+image_id_no+'"> <div>' + file +'</div>'+ '<label>Bedroom</label>'+'<div>'+ response.data.input_bedrooms+'</div>'+'<label>Bathroom</label>'+'<div>'+ response.data.input_bathrooms+'</div>'+ "<br>" +
                        //     "<button data-id='"+response.data.input_image_id+"' type='button' class='btn btn-info btn-sm' id='edit_3d_btn' data-input_image_id='"+response.data.input_image_id+"' data-3d_image_url='"+url+"' data-bedroom='"+response.data.input_bedrooms+"' data-bathroom='"+response.data.input_bathrooms+"' ><i class='fa fa-edit'></i></button></div>"
                        // );
                    }
                });
            }
        });

        $(document).on('click', '#edit_3d_btn', function (){
            $("#3d_file_update").val('');
            $("#session_id_for_edit").val($(this).attr("data-input_image_id"));
            $("#3d_bed_update").val($(this).attr("data-bedroom"));
            $("#3d_bath_update").val($(this).attr("data-bathroom"));
            $("#3d_sqft_update").val($(this).attr("data-sqft"));
            $("#edit_3d_image_section").empty().append("<img class='img-responsive' src='"+$(this).attr("data-3d_image_url")+"' height='100px' width='100px' style='margin: 10px;'>")
            $("#update_3d_floor_detail").modal('show');
        });

        $(document).on("click","#update_3d_floor_section",function (e) {
            e.preventDefault();
            let image_id_no = $("#session_id_for_edit").val();
            let postData = new FormData();
            postData.append('_token', "{{ csrf_token() }}");
            postData.append('session_index_id', image_id_no);
            postData.append('input_file', $("#3d_file_update")[0].files[0]);
            postData.append('input_bedrooms', $("#3d_bed_update").val());
            postData.append('input_bathrooms', $("#3d_bath_update").val());
            postData.append('input_sqft', $("#3d_sqft_update").val());
            //display-loader
            $('#update_floor_plan_3d_loader').show();
            $('#update_floor_plan_3d_btn').hide();

            $.ajax({
                url         : "{{url('admin/update-3d-floor-sale-image')}}",
                type        : "post",
                cache       : false,
                contentType : false,
                processData : false,
                data        : postData,
                success     : function (response) {
                    //display-loader
                    $('#update_floor_plan_3d_loader').hide();
                    $('#update_floor_plan_3d_btn').show();
                    if(response.code == 404){
                        $('#update-floor-plan-3d-error-msg').empty().append('Only png, jpg and webp file types are allowed.');
                    }else if(response.code == 400){
                        $('#update-floor-plan-3d-error-msg').empty().append(response.message);
                    } else {
                        $("#update_3d_floor_detail").modal('hide');
                        $('#floor-plan-3d-success-msg').empty().append('Floor plan 3D updated!');
                        $('#floor-plan-3d-error-msg').empty();

                        let url = "{{asset('admin-panel/assets/property-images/floor-plan-3D/sale')}}" + "/" + response.data.input_file;
                        let file = "<img class='img-responsive' src='" + url + "' height='150px' width='100%' id='del_img_" + response.data.input_image_id + "'>";
                        $('#3d_child_section_' + image_id_no).empty().append('<div>' + file + '</div>' +
                            '<div class="row">' +
                            '<div class="col-md-6">' +
                            '<label style="float: left">Bedroom <br> ' + response.data.input_bedrooms + '</label>' +
                            '</div>' +
                            '<div class="col-md-6">' +
                            '<label style="float: right">Bathroom <br> ' + response.data.input_bathrooms + '</label>' +
                            '</div>' +
                            '<div class="col-md-12">' +
                            '<label style="text-align: center;">Sqft <br> ' + response.data.input_sqft + '</label>' +
                            '</div>' +
                            '</div>' +
                            '<div class="row">' +
                            '<div class="col-md-6">' +
                            '<button style="float:right;" data-id="' + response.data.input_image_id + '" type="button" class="btn btn-info btn-sm" id="edit_3d_btn" data-input_image_id="' + response.data.input_image_id + '" data-3d_image_url="' + url + '" data-bedroom="' + response.data.input_bedrooms + '" data-bathroom="' + response.data.input_bathrooms + '" data-sqft="'+response.data.input_sqft+'"><i class="fa fa-edit"></i></button>' +
                            '</div>' +
                            '<div class="col-md-6">' +
                            '<button style="float:left;" data-id="' + response.data.input_image_id + '" type="button" class="btn btn-danger btn-sm" id="delete_3d_btn" data-input_image_id=""><i class="fa fa-trash"></i></button>' +
                            '</div>' +
                            '</div>');
                    }
                    // $('#3d_child_section_'+image_id_no).empty().append('<div>' + file +'</div>'+ '<label>Bedroom</label>'+'<div>'+ response.data.input_bedrooms+'</div>'+'<label>Bathroom</label>'+'<div>'+ response.data.input_bathrooms+'</div>'+ "<br>" +
                    //     "<button data-id='"+response.data.input_image_id+"' type='button' class='btn btn-info btn-sm' id='edit_3d_btn' data-input_image_id='"+response.data.input_image_id+"' data-3d_image_url='"+url+"' data-bedroom='"+response.data.input_bedrooms+"' data-bathroom='"+response.data.input_bathrooms+"' ><i class='fa fa-edit'></i></button>"
                    // );
                }
            });
            // }
        });

        $(document).on('click', '#delete_3d_btn', function (){

            let deleted_id = $(this).attr('data-id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this floor plan 3D?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'post',
                        url: '{{url('admin/delete-sale-3d-image')}}',
                        data: {
                            _token: '{{ @csrf_token() }}',
                            deleted_id: deleted_id
                        },
                        success: function (response) {
                            if (response.code === 200) {

                                location.reload();
                                // $("#floor-plan-3d-success-msg").empty().append('Floor plan 3D deleted!');
                                Swal.fire('Good job!', 'Floor plan 3D has been deleted successfully!', 'success')
                                $('#floor-plan-3d-error-msg').empty();
                            }
                            console.log(response);
                        }
                    });
                }
            })
        });
    </script>
    <script>jQuery('.numbersOnly').keyup(function () {
            this.value = this.value.replace(/[^0-9\.]/g,'');
        });</script>
@endsection

