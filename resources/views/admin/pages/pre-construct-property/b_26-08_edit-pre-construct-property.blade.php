@extends('admin.layouts.master')
<!-- title -->
@section('title')
    <title> Edit Pre-Consrtuction Property </title>
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
                        <h1>Update Pre-Consrtuction Property</h1>
                    </div>
                    {{--                    <div class="col-sm-6">--}}
                    {{--                        <ol class="breadcrumb float-sm-right">--}}
                    {{--                            <li class="breadcrumb-item active">Properties</li>--}}
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
                                <h3 class="card-title">Update Pre-Consrtuction Property</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url('/admin/edit-pre-construct-property',$pre_construct_data[0]->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    @include('flash-message')
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
                                                <input type="text" id="address" name="address" class="form-control" placeholder="Enter Address" value="{{($errors->all([3])) ? old('address') : $pre_construct_data[0]->address}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Country" class="bmd-label-floating">Country</label>
                                                <input type="text" id="country" name="country" class="form-control" placeholder="Enter Country" value="{{$pre_construct_data[0]->country}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="state" class="bmd-label-floating">State/Province</label>
                                                <input type="text" id="state" name="state" class="form-control" placeholder="Enter state" value="{{$pre_construct_data[0]->country_state}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="neighborhood" class="bmd-label-floating">City</label>
                                                <input type="text" name="city" id="city" class="form-control" value="{{$pre_construct_data[0]->city}}" placeholder="Enter City">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="neighborhood" class="bmd-label-floating">Zip/Postal Code</label>
                                                <input type="text" id="zip" name="zip" class="form-control" value="{{$pre_construct_data[0]->zip}}" pattern="\d{5}(?:-\d{4})?|^([ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ])\ {0,1}(\d[ABCEGHJKLMNPRSTVWXYZ]\d)$" placeholder="Enter Zip/Postal code">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="hidden" id="latitude" name="latitude" class="form-control" value="{{old('latitude', $pre_construct_data[0]->latitude)}}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="hidden" id="longitude" name="longitude" class="form-control" value="{{old('longitude', $pre_construct_data[0]->longitude)}}" readonly>
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
                                        {{--                                                <input type="text" name="title" class="form-control" value="{{ ($errors->all([0])) ? old('title') : $pre_construct_data[0]->title }}" autofocus>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="">Description<span style="color: red;">*</span></label>
                                                {{--<input type="text" name="t_description" class="form-control">--}}
                                                <textarea name="description" id="description" class="form-control" placeholder="Enter description">{{($errors->all([1])) ? old('description') : $pre_construct_data[0]->description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Price in $</label>
                                                <input type="text" name="price" class="form-control" value="{{$pre_construct_data[0]->price}}" placeholder="Enter price">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">After Price Label (ex: "/month ")</label>
                                                        <input type="text" name="after_price_label" class="form-control" value="{{$pre_construct_data[0]->after_price_label}}" placeholder="Enter after price">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Before Price Label (ex: "from ")</label>
                                                        <input type="text" name="before_price_label" class="form-control" value="{{$pre_construct_data[0]->before_price_label}}" placeholder="Enter before price">
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
                                                    @foreach($allCategory as $catData)
                                                        <option value="{{$catData->id}}" @if($pre_construct_data[0]->category == $catData->id) ? selected : null @endif>{{$catData->name}}</option>
                                                    @endforeach
                                                    {{--                                                    <option value="">Select Category</option>--}}
                                                    {{--                                                    <option value="residential" @if($pre_construct_data[0]->category == 'residential') ? selected : null @endif>Residential</option>--}}
                                                    {{--                                                    <option value="commercial" @if($pre_construct_data[0]->category == 'commercial') ? selected : null @endif>Commercial</option>--}}
                                                    {{--                                                    <option value="industrial" @if($pre_construct_data[0]->category == 'industrial') ? selected : null @endif>Industrial</option>--}}
                                                </select>
                                            </div>
                                        </div>
                                        {{--                                        <div class="col-md-6">--}}
                                        {{--                                            <div class="form-group">--}}
                                        {{--                                                <label class="bmd-label-floating" for="dropdown">Listed In </label>--}}
                                        {{--                                                <select class="form-control" name="listed_in" id="listed_in">--}}
                                        {{--                                                    <option>Select Listed In</option>--}}
                                        {{--                                                    <option value="">None</option>--}}
                                        {{--                                                    <option value="rentals" @if($pre_construct_data[0]->listed_in == 'rentals') ? selected : null @endif>Rentals</option>--}}
                                        {{--                                                    <option value="sales" @if($pre_construct_data[0]->listed_in == 'sales') ? selected : null @endif>Sales</option>--}}
                                        {{--                                                </select>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
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
                                        </div>
                                        <!-- image-preview -->
                                        <div class="row" id="image_preview" style="padding-left: 27px;">
                                            @foreach($getMedia as $key =>$m)
                                                {{--                            <input type="hidden" id="session_key_{{ $m->id }}" value="{{ $key }}">--}}
                                                <div class="image" id="img-remove_{{$m->id}}">
                                                    @if($m->media_type == 'image')
                                                        @if(file_exists(public_path('admin-panel/assets/property-images/media-file/pre-construct/'.$m->media_name)))
                                                            <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$m->media_name)}}" height="100px" width="100px" id="del_img_{{$m->id}}">
                                                        @else
                                                            <img src="{{asset('default/property-img-default.png')}}" height="100px" width="100px">
                                                        @endif
                                                        {{--                                                        <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$m->media_name)}}" height="100px" width="100px" id="del_img_{{$m->id}}">--}}
                                                    @else
                                                        <img src="{{asset('pdf-icon/pdf-logo.png')}}" height="100px" width="100px" id="del_img_{{$m->id}}">
                                                    @endif
                                                    <br>
                                                    <button type="button" class="btn btn-danger btn-sm" id="delete_btn" data-id="{{$m->id}}" style="margin-top: 10px;margin-left: 34px;"><i class="fa fa-trash"></i></button>
                                                </div>
                                            @endforeach
                                        </div>
                                        {{--<img id="imagePreview" width="100" height="100" />--}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <p style="color: grey">* At least 1 image is required for a valid submission.</p>
                                                <p style="color: grey">** Only png, jpg and webp file types are allowed.</p>
                                                <p style="color: grey">*** Media file size should be less than or equal to 2 MB.</p>
                                                {{--                                                <p>Minimum size is 1000/1000px.</p>--}}
                                                {{--                                                <p style="color: grey">** Double click on the image to select featured.</p>--}}
                                                {{--                                                <p style="color: grey">*** Change images order with Drag & Drop.</p>--}}
                                                {{--                                                <p style="color: grey">**** PDF files upload supported as well.</p>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Select Banners</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="text-center">
                                                <label> Banner 1 (Dimension 730 X 160)</label><br>
                                                <img src="{{asset('frontend/assets/imgs/loading.gif')}}" height="50px" id="banner1_upload_loader" style="display: none;">
                                                <div class="fileUpload btn btn-success" style="background-color: #1ED65F;border-color: #1ED65F;" id="banner1_upload_btn">
                                                    <span>SELECT BANNER 1</span>
                                                    <input type="file" class="upload" id="banner1_img" name="banner1_img">
                                                </div>
                                                @if($getBanner_1->count() > 0)
                                                    <div class="db-banner-img-1">
                                                        <img src="{{asset('admin-panel/assets/property-images/banner-1/'.$getBanner_1[0]->banner_1)}}" width="100%" alt="Banner Image 1" />
                                                        <button type="button" id="deleting-banner-1-btn" class="btn btn-danger btn-sm" style="margin-top: 5px;" data-banner1-id="{{$pre_construct_data[0]->id}}"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                    <span id="success-msg-banner-1" class="text-success"></span>
                                                @else
                                                    <span id="error-msg-banner-1" class="text-danger"></span>
                                                    <span id="success-msg-banner-1" class="text-success"></span>
                                                    <!-- banner-1 preview ajax -->
                                                    <div id="banner_1_preview">
                                                        @php($banner_1_session = \Illuminate\Support\Facades\Session::get('session_data_banner_1'))
                                                        <input type="hidden" name="banner_1_id" id="banner_1_id" value="1">
                                                        @if($banner_1_session)
                                                            <div class="banner_1_section_{{$banner_1_session['banner_1_id']}}">
                                                                @php($url = asset('admin-panel/assets/property-images/banner-1/'.$banner_1_session['banner_1_file']))
                                                                <img class='img-fluid' src="{{ $url }}" width='100%' alt="banner 1 img" />
                                                                <div class="col-md-12 text-center">
                                                                    <button data-id='{{ $banner_1_session['banner_1_id'] }}' type='button' class='btn btn-danger btn-sm' id='delete_b1_btn' data-banner_1_id='{{ $banner_1_session['banner_1_id'] }}'><i class='fa fa-trash'></i></button>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <input type="hidden" name="banner_1_id" id="banner_1_id" value="">
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-center">
                                                <label>Banner 2 Dimension (2500 X 342)</label><br>
                                                <!-- loader -->
                                                <img src="{{asset('frontend/assets/imgs/loading.gif')}}" height="50px" id="banner2_upload_loader" style="display: none;">
                                                <div class="fileUpload btn btn-success" style="background-color: #1ED65F;border-color: #1ED65F;" id="banner2_upload_btn">
                                                    <span>SELECT BANNER 2</span>
                                                    <input type="file" class="upload" id="banner2_img" name="banner2_img">
                                                </div>
                                                @if($getBanner_2->count() > 0)
                                                    <div class="db-banner-img-2">
                                                        <img src="{{asset('admin-panel/assets/property-images/banner-2/'.$getBanner_2[0]->banner_2)}}" width="100%" alt="Banner Image 2" />
                                                        <button type="button" id="deleting-banner-2-btn" class="btn btn-danger btn-sm" style="margin-top: 5px;" data-banner2-id="{{$pre_construct_data[0]->id}}"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                    <span id="success-msg-banner-2" class="text-success"></span>
                                                @else
                                                    <span id="error-msg-banner-2" class="text-danger"></span>
                                                    <span id="success-msg-banner-2" class="text-success"></span>
                                                    <!-- banner-2 preview ajax -->
                                                    <div id="banner_2_preview">
                                                        @php($banner_2_session = \Illuminate\Support\Facades\Session::get('session_data_banner_2'))
                                                        <input type="hidden" name="banner_2_id" id="banner_2_id" value="1">
                                                        @if($banner_2_session)
                                                            <div class="banner_2_section_{{$banner_2_session['banner_2_id']}}">
                                                                @php($url = asset('admin-panel/assets/property-images/banner-2/'.$banner_2_session['banner_2_file']))
                                                                <img class='img-fluid' src="{{ $url }}" width='100%' alt="banner 2 img" />
                                                                <div class="col-md-12 text-center">
                                                                    <button data-id='{{ $banner_2_session['banner_2_id'] }}' type='button' class='btn btn-danger btn-sm' id='delete_b2_btn' data-banner_2_id='{{ $banner_2_session['banner_2_id'] }}'><i class='fa fa-trash'></i></button>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <input type="hidden" name="banner_2_id" id="banner_2_id" value="">
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="text-center">
                                                <label>Banner 3 Dimension (2500 X 322)</label><br>
                                                <!-- loader -->
                                                <img src="{{asset('frontend/assets/imgs/loading.gif')}}" height="50px" id="banner3_upload_loader" style="display: none;">
                                                <div class="fileUpload btn btn-success" style="background-color: #1ED65F;border-color: #1ED65F;" id="banner3_upload_btn">
                                                    <span>SELECT BANNER 3</span>
                                                    <input type="file" class="upload" id="banner3_img" name="banner3_img">
                                                </div>
                                                @if($getBanner_3->count() > 0)
                                                    <div class="db-banner-img-3">
                                                        <img src="{{asset('admin-panel/assets/property-images/banner-3/'.$getBanner_3[0]->banner_3)}}" width="100%" alt="Banner Image 3" />
                                                        <button type="button" id="deleting-banner-3-btn" class="btn btn-danger btn-sm" style="margin-top: 5px;" data-banner3-id="{{$pre_construct_data[0]->id}}"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                    <span id="success-msg-banner-3" class="text-success"></span>
                                                @else
                                                    <span id="error-msg-banner-3" class="text-danger"></span>
                                                    <span id="success-msg-banner-3" class="text-success"></span>
                                                    <!-- banner-3 preview ajax -->
                                                    <div id="banner_3_preview">
                                                        @php($banner_3_session = \Illuminate\Support\Facades\Session::get('session_data_banner_3'))
                                                        <input type="hidden" name="banner_3_id" id="banner_3_id" value="1">
                                                        @if($banner_3_session)
                                                            <div class="banner_3_section_{{$banner_3_session['banner_3_id']}}">
                                                                @php($url = asset('admin-panel/assets/property-images/banner-3/'.$banner_3_session['banner_3_file']))
                                                                <img class='img-fluid' src="{{ $url }}" width='100%' alt="banner 3 img" />
                                                                <div class="col-md-12 text-center">
                                                                    <button data-id='{{ $banner_3_session['banner_3_id'] }}' type='button' class='btn btn-danger btn-sm' id='delete_b3_btn' data-banner_3_id='{{ $banner_3_session['banner_3_id'] }}'><i class='fa fa-trash'></i></button>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <input type="hidden" name="banner_3_id" id="banner_3_id" value="">
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-center">
                                                <label>Banner 4 Dimension (2500 X 280)</label><br>
                                                <!-- loader -->
                                                <img src="{{asset('frontend/assets/imgs/loading.gif')}}" height="50px" id="banner4_upload_loader" style="display: none;">
                                                <div class="fileUpload btn btn-success" style="background-color: #1ED65F;border-color: #1ED65F;" id="banner4_upload_btn">
                                                    <span>SELECT BANNER 4</span>
                                                    <input type="file" class="upload" id="banner4_img" name="banner4_img">
                                                </div>
                                                @if($getBanner_4->count() > 0)
                                                    <div class="db-banner-img-4">
                                                        <img src="{{asset('admin-panel/assets/property-images/banner-4/'.$getBanner_4[0]->banner_4)}}" width="100%" alt="Banner Image 4" />
                                                        <button type="button" id="deleting-banner-4-btn" class="btn btn-danger btn-sm" style="margin-top: 5px;" data-banner4-id="{{$pre_construct_data[0]->id}}"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                    <span id="success-msg-banner-4" class="text-success"></span>
                                                @else
                                                    <span id="error-msg-banner-4" class="text-danger"></span>
                                                    <span id="success-msg-banner-4" class="text-success"></span>
                                                    <!-- banner-4 preview ajax -->
                                                    <div id="banner_4_preview">
                                                        @php($banner_4_session = \Illuminate\Support\Facades\Session::get('session_data_banner_4'))
                                                        <input type="hidden" name="banner_4_id" id="banner_4_id" value="1">
                                                        @if($banner_4_session)
                                                            <div class="banner_4_section_{{$banner_4_session['banner_4_id']}}">
                                                                @php($url = asset('admin-panel/assets/property-images/banner-4/'.$banner_4_session['banner_4_file']))
                                                                <img class='img-fluid' src="{{ $url }}" width='100%' alt="banner 4 img" />
                                                                <div class="col-md-12 text-center">
                                                                    <button data-id='{{ $banner_4_session['banner_4_id'] }}' type='button' class='btn btn-danger btn-sm' id='delete_b4_btn' data-banner_4_id='{{ $banner_4_session['banner_4_id'] }}'><i class='fa fa-trash'></i></button>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <input type="hidden" name="banner_4_id" id="banner_4_id" value="">
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    {{-- new 3 banners --}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="text-center">
                                                <label>Banner 5 Dimension (369 X 117)</label><br>
                                                <!-- loader -->
                                                <img src="{{asset('frontend/assets/imgs/loading.gif')}}" height="50px" id="banner5_upload_loader" style="display: none;">
                                                <div class="fileUpload btn btn-success" style="background-color: #1ED65F;border-color: #1ED65F;" id="banner5_upload_btn">
                                                    <span>SELECT BANNER 5</span>
                                                    <input type="file" class="upload" id="banner5_img" name="banner5_img">
                                                </div>
                                                @if($getBanner_5->count() > 0)
                                                    <div class="db-banner-img-5">
                                                        <img src="{{asset('admin-panel/assets/property-images/banner-5/'.$getBanner_5[0]->banner_5)}}" width="100%" alt="Banner Image 5" />
                                                        <button type="button" id="deleting-banner-5-btn" class="btn btn-danger btn-sm" style="margin-top: 5px;" data-banner5-id="{{$pre_construct_data[0]->id}}"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                    <span id="success-msg-banner-5" class="text-success"></span>
                                                @else
                                                    <span id="error-msg-banner-5" class="text-danger"></span>
                                                    <span id="success-msg-banner-5" class="text-success"></span>
                                                    <!-- banner-5 preview ajax -->
                                                    <div id="banner_5_preview">
                                                        @php($banner_5_session = \Illuminate\Support\Facades\Session::get('session_data_banner_5'))
                                                        <input type="hidden" name="banner_5_id" id="banner_5_id" value="1">
                                                        @if($banner_5_session)
                                                            <div class="banner_5_section_{{$banner_5_session['banner_5_id']}}">
                                                                @php($url = asset('admin-panel/assets/property-images/banner-5/'.$banner_5_session['banner_5_file']))
                                                                <img class='img-fluid' src="{{ $url }}" width='100%' alt="banner 5 img" />
                                                                <div class="col-md-12 text-center">
                                                                    <button data-id='{{ $banner_5_session['banner_5_id'] }}' type='button' class='btn btn-danger btn-sm' id='delete_b5_btn' data-banner_5_id='{{ $banner_5_session['banner_5_id'] }}'><i class='fa fa-trash'></i></button>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <input type="hidden" name="banner_5_id" id="banner_5_id" value="">
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-center">
                                                <label>Banner 6 Dimension (369 X 117)</label><br>
                                                <!-- loader -->
                                                <img src="{{asset('frontend/assets/imgs/loading.gif')}}" height="50px" id="banner6_upload_loader" style="display: none;">
                                                <div class="fileUpload btn btn-success" style="background-color: #1ED65F;border-color: #1ED65F;" id="banner6_upload_btn">
                                                    <span>SELECT BANNER 6</span>
                                                    <input type="file" class="upload" id="banner6_img" name="banner6_img">
                                                </div>
                                                @if($getBanner_6->count() > 0)
                                                    <div class="db-banner-img-6">
                                                        <img src="{{asset('admin-panel/assets/property-images/banner-6/'.$getBanner_6[0]->banner_6)}}" width="100%" alt="Banner Image 6" />
                                                        <button type="button" id="deleting-banner-6-btn" class="btn btn-danger btn-sm" style="margin-top: 5px;" data-banner6-id="{{$pre_construct_data[0]->id}}"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                    <span id="success-msg-banner-6" class="text-success"></span>
                                                @else
                                                    <span id="error-msg-banner-6" class="text-danger"></span>
                                                    <span id="success-msg-banner-6" class="text-success"></span>
                                                    <!-- banner-6 preview ajax -->
                                                    <div id="banner_6_preview">
                                                        @php($banner_6_session = \Illuminate\Support\Facades\Session::get('session_data_banner_6'))
                                                        <input type="hidden" name="banner_6_id" id="banner_6_id" value="1">
                                                        @if($banner_6_session)
                                                            <div class="banner_6_section_{{$banner_6_session['banner_6_id']}}">
                                                                @php($url = asset('admin-panel/assets/property-images/banner-6/'.$banner_6_session['banner_6_file']))
                                                                <img class='img-fluid' src="{{ $url }}" width='100%' alt="banner 6 img" />
                                                                <div class="col-md-12 text-center">
                                                                    <button data-id='{{ $banner_6_session['banner_6_id'] }}' type='button' class='btn btn-danger btn-sm' id='delete_b6_btn' data-banner_6_id='{{ $banner_6_session['banner_6_id'] }}'><i class='fa fa-trash'></i></button>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <input type="hidden" name="banner_6_id" id="banner_6_id" value="">
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="text-center">
                                                <label>Banner 7 Dimension (369 X 117)</label><br>
                                                <!-- loader -->
                                                <img src="{{asset('frontend/assets/imgs/loading.gif')}}" height="50px" id="banner7_upload_loader" style="display: none;">
                                                <div class="fileUpload btn btn-success" style="background-color: #1ED65F;border-color: #1ED65F;" id="banner7_upload_btn">
                                                    <span>SELECT BANNER 7</span>
                                                    <input type="file" class="upload" id="banner7_img" name="banner7_img">
                                                </div>
                                                @if($getBanner_7->count() > 0)
                                                    <div class="db-banner-img-7">
                                                        <img src="{{asset('admin-panel/assets/property-images/banner-7/'.$getBanner_7[0]->banner_7)}}" width="100%" alt="Banner Image 7" />
                                                        <button type="button" id="deleting-banner-7-btn" class="btn btn-danger btn-sm" style="margin-top: 5px;" data-banner7-id="{{$pre_construct_data[0]->id}}"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                    <span id="success-msg-banner-7" class="text-success"></span>
                                                @else
                                                    <span id="error-msg-banner-7" class="text-danger"></span>
                                                    <span id="success-msg-banner-7" class="text-success"></span>
                                                    <!-- banner-7 preview ajax -->
                                                    <div id="banner_7_preview">
                                                        @php($banner_7_session = \Illuminate\Support\Facades\Session::get('session_data_banner_7'))
                                                        <input type="hidden" name="banner_7_id" id="banner_7_id" value="1">
                                                        @if($banner_7_session)
                                                            <div class="banner_7_section_{{$banner_7_session['banner_7_id']}}">
                                                                @php($url = asset('admin-panel/assets/property-images/banner-7/'.$banner_7_session['banner_7_file']))
                                                                <img class='img-fluid' src="{{ $url }}" width='100%' alt="banner 7 img" />
                                                                <div class="col-md-12 text-center">
                                                                    <button data-id='{{ $banner_7_session['banner_7_id'] }}' type='button' class='btn btn-danger btn-sm' id='delete_b7_btn' data-banner_7_id='{{ $banner_7_session['banner_7_id'] }}'><i class='fa fa-trash'></i></button>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <input type="hidden" name="banner_7_id" id="banner_7_id" value="">
                                                        @endif
                                                    </div>
                                                @endif
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
                                                <div class="row" id="floor_plan_2d_upload_section">
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
                                                            <input type="text" name="2d_sqft" id="2d_sqft" class="form-control numbersOnly" placeholder="Enter Sqft">
                                                            <span class="text-danger float-left" id="2d_sqft_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group" style="margin-top: 30px">
                                                            <button type="button" id="select_btn" name="select_btn" class="btn btn-primary" style="background-color: #1ed760;border-color: #1ed760"><i class="fa fa-plus-circle"></i>&nbsp;ADD PLAN</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- floor plan 2D alert message -->
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
                                                                        @php($url = asset('admin-panel/assets/property-images/floor-plan-2D/pre-construct/'.$_2d_row['input_file']))
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
                                                                            <label style="text-align: center">Sqft <br> {{ $_2d_row['input_sqft'] }}</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        {{--                                                                        <div class="col-md-6">--}}
                                                                        {{--                                                                            <button style="float:right;" data-id='{{ $_2d_row['input_image_id'] }}' type='button' class='btn btn-info btn-sm' id='edit_2d_btn' data-input_image_id='{{ $_2d_row['input_image_id'] }}' data-2d_image_url='{{ $url }}' data-bedroom='{{ $_2d_row['input_bedrooms'] }}' data-bathroom='{{ $_2d_row['input_bathrooms'] }}' ><i class='fa fa-edit'></i></button>--}}
                                                                        {{--                                                                        </div>--}}
                                                                        <div class="col-md-12">
                                                                            <button data-id='{{ $_2d_row['input_image_id'] }}' type='button' class='btn btn-danger btn-sm' id='delete_2d_btn' data-input_image_id='{{ $_2d_row['input_image_id'] }}'><i class='fa fa-trash'></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <input type="hidden" name="_2d_image_id" id="_2d_image_id" value="">
                                                        <!-- saved floor plan 2d preview -->
                                                        @if($f_plan_2d)
                                                            @foreach($f_plan_2d as $f_2d)
                                                                <div class="col-md-3">
                                                                    <div id="2d_child_section_{{ $f_2d->id }}">
                                                                        <input type="hidden" name="floor_plan_id" value="{{$f_2d->id}}">
                                                                        <div>
                                                                            @php($url = asset('admin-panel/assets/property-images/floor-plan-2D/pre-construct/'.$f_2d->images))
                                                                            <img class='img-responsive' src="{{ $url }}" height='150px' width='100%'>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <label style="float: left">Bedroom <br> {{ $f_2d->no_of_bedrooms }}</label>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label style="float: right">Bathroom <br> {{ $f_2d->no_of_bathrooms }}</label>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <label style="text-align: center">Sqft <br> {{ $f_2d->sqft }}</label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            {{--                                                                            <div class="col-md-6">--}}
                                                                            {{--                                                                                <button style="float:right;" data-id='{{ $f_plan_2d['input_image_id'] }}' type='button' class='btn btn-info btn-sm' id='edit_2d_btn' data-input_image_id='{{ $_2d_row['input_image_id'] }}' data-2d_image_url='{{ $url }}' data-bedroom='{{ $_2d_row['input_bedrooms'] }}' data-bathroom='{{ $_2d_row['input_bathrooms'] }}' ><i class='fa fa-edit'></i></button>--}}
                                                                            {{--                                                                            </div>--}}
                                                                            <div class="col-md-12">
                                                                                {{--                                                                                <a href="{{url('/admin/delete-f-2d-plan-p-id',$f_2d->property_id)}}" data-id="{{$f_2d->id}}" class='btn btn-danger btn-sm' onclick="return confirm('Are you sure you want to delete this floor plan 2D?');"><i class='fa fa-trash'></i></a>--}}
                                                                                <button data-p-id='{{$f_2d->property_id}}' data-id='{{ $f_2d->id }}' type='button' class='btn btn-danger btn-sm' id='saved_del_2d_btn'><i class='fa fa-trash'></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
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
                                                            <input type="file" class="upload" id="3d_file" name="3d_file">
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
                                                            <input type="text" name="f_3d_sqft" id="f_3d_sqft" class="form-control numbersOnly" placeholder="Sqft">
                                                            <span class="text-danger float-left" id="3d_sqft_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group" style="margin-top: 30px">
                                                            <button type="button" id="select_f_3d_btn" name="select_f_3d_btn" class="btn btn-primary" style="background-color: #1ed760;border-color: #1ed760"><i class="fa fa-plus-circle"></i> &nbsp;ADD PLAN</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- floor plan 3D alert message -->
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
                                                                        @php($url = asset('admin-panel/assets/property-images/floor-plan-3D/pre-construct/'.$_3d_row['input_file']))
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
                                                                        {{--                                                                        <div class="col-md-6">--}}
                                                                        {{--                                                                            <button style="float:right;" data-id='{{ $_3d_row['input_image_id'] }}' type='button' class='btn btn-info btn-sm' id='edit_3d_btn' data-input_image_id='{{ $_3d_row['input_image_id'] }}' data-3d_image_url='{{ $url }}' data-bedroom='{{ $_3d_row['input_bedrooms'] }}' data-bathroom='{{ $_3d_row['input_bathrooms'] }}' ><i class='fa fa-edit'></i></button>--}}
                                                                        {{--                                                                        </div>--}}
                                                                        <div class="col-md-12">
                                                                            <button data-id='{{ $_3d_row['input_image_id'] }}' type='button' class='btn btn-danger btn-sm' id='delete_3d_btn' data-input_image_id='{{ $_3d_row['input_image_id'] }}'><i class='fa fa-trash'></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <input type="hidden" name="_3d_image_id" id="_3d_image_id" value="">
                                                        <!-- saved floor plan 2d preview -->
                                                        @if($f_plan_3d)
                                                            @foreach($f_plan_3d as $f_3d)
                                                                <div class="col-md-3">
                                                                    <div id="3d_child_section_{{ $f_3d->id }}">
                                                                        {{--                                                                        <input type="text" name="floor-plan-id" value="{{$f_3d->id}}">--}}
                                                                        <div>
                                                                            @php($url = asset('admin-panel/assets/property-images/floor-plan-3D/pre-construct/'.$f_3d->images))
                                                                            <img class='img-responsive' src="{{ $url }}" height='150px' width='100%'>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <label style="float: left">Bedroom <br> {{ $f_3d->no_of_bedrooms }}</label>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label style="float: right">Bathroom <br> {{ $f_3d->no_of_bathrooms }}</label>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <label style="text-align: center">Sqft <br> {{ $f_3d->sqft }}</label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            {{--                                                                            <div class="col-md-6">--}}
                                                                            {{--                                                                                <button style="float:right;" data-id='{{ $f_plan_2d['input_image_id'] }}' type='button' class='btn btn-info btn-sm' id='edit_2d_btn' data-input_image_id='{{ $_2d_row['input_image_id'] }}' data-2d_image_url='{{ $url }}' data-bedroom='{{ $_2d_row['input_bedrooms'] }}' data-bathroom='{{ $_2d_row['input_bathrooms'] }}' ><i class='fa fa-edit'></i></button>--}}
                                                                            {{--                                                                            </div>--}}
                                                                            <div class="col-md-12">
                                                                                {{--                                                                                <a href="{{url('/admin/delete-f-3d-plan-p-id',$f_3d->property_id)}}" class='btn btn-danger btn-sm' onclick="return confirm('Are you sure you want to delete this floor plan 3D?');"><i class='fa fa-trash'></i></a>--}}
                                                                                <button data-id='{{ $f_3d->id }}' type='button' class='btn btn-danger btn-sm' id='saved_del_3d_btn'><i class='fa fa-trash'></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" >
                                        <div class="col-md-12">
                                            <label style="margin-top: 10px">Select Attachment<span style="color: red">*</span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="fileUpload btn btn-success" style="background-color: #1ED65F;border-color: #1ED65F;">
                                                <span>FOR SIGNUP</span>
                                                <input type="file" class="upload" id="signUp_file" name="signUp_file">
                                            </div>
                                            @if($pre_construct_data[0]->attachments)
{{--                                                <img src="{{asset('html-icon/html_logo.png')}}" height="50px" width="50px">--}}
                                                <span>{{$pre_construct_data[0]->attachments}}</span>
                                            @endif
                                            <span id="doc1_type_error_msg" class="text-danger"></span>
                                            <p style="color: grey;">* Upload html files only.</p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="fileUpload btn btn-success" style="background-color: #1ED65F;border-color: #1ED65F;">
                                                <span>FOR NEWSLETTER</span>
                                                <input type="file" class="upload" id="newsletter_file" name="newsletter_file">
                                            </div>
                                            @if($pre_construct_data[0]->attachments)
{{--                                                <img src="{{asset('html-icon/html_logo.png')}}" height="50px" width="50px">--}}
                                                <span>{{$pre_construct_data[0]->newsletter_attachments}}</span>
                                            @endif
                                            <span id="doc2_type_error_msg" class="text-danger"></span>
                                            <p style="color: grey;">* Upload html files only.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Size in ft2 </label>
                                                <input type="text" name="size_in_ft2" class="form-control" value="{{$pre_construct_data[0]->size_in_ft2}}"  placeholder="Enter size in square feet">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Lot Size in ft2 </label>
                                                <input type="text" name="lot_size_in_ft2" class="form-control" value="{{$pre_construct_data[0]->lot_size_in_ft2}}" placeholder="Enter lot size in square feet">
                                            </div>
                                        </div>
                                        <!-- new field added -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">From Size In SqFt</label>
                                                <input type="text" name="from_size_in_ft" class="form-control" value="{{$pre_construct_data[0]->from_size_in_sqft}}" placeholder="Enter from size in sqft">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">To Size In SqFt</label>
                                                <input type="text" name="to_size_in_ft" class="form-control" value="{{$pre_construct_data[0]->to_size_in_sqft}}" placeholder="Enter to size in sqft">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">From Rooms</label>
                                                <input type="text" name="from_rooms" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="{{$pre_construct_data[0]->from_rooms}}" placeholder="Enter from rooms">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">To Rooms</label>
                                                <input type="text" name="to_rooms" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="{{$pre_construct_data[0]->to_rooms}}" placeholder="Enter to rooms">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">From Bedrooms</label>
                                                <input type="text" name="from_bedrooms" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="{{$pre_construct_data[0]->from_bedrooms}}" placeholder="Enter from bedrooms">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">To Bedrooms</label>
                                                <input type="text" name="to_bedrooms" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="{{$pre_construct_data[0]->to_bedrooms}}" placeholder="Enter to bedrooms">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">From Bathrooms</label>
                                                <input type="text" name="from_bathrooms" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="{{$pre_construct_data[0]->from_bathrooms}}" placeholder="Enter from bathrooms">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">To Bathrooms</label>
                                                <input type="text" name="to_bathrooms" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="{{$pre_construct_data[0]->to_bathrooms}}" placeholder="Enter to bathrooms">
                                            </div>
                                        </div>
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label class="bmd-label-floating">Rooms </label>--}}
{{--                                                <input type="text" name="rooms" class="form-control" value="{{$pre_construct_data[0]->rooms}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Enter rooms">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label class="bmd-label-floating">Bedrooms </label>--}}
{{--                                                <input type="text" name="bedrooms" class="form-control" value="{{$pre_construct_data[0]->bedrooms}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Enter bedrooms">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label class="bmd-label-floating">Bathrooms </label>--}}
{{--                                                <input type="text" name="bathrooms" class="form-control" value="{{$pre_construct_data[0]->bathrooms}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Enter bathrooms">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        {{--                                        <div class="col-md-6">--}}
                                        {{--                                            <div class="form-group">--}}
                                        {{--                                                <label class="bmd-label-floating">Custom ID (*text)</label>--}}
                                        {{--                                                <input type="text" name="custom_id" class="form-control" value="{{$pre_construct_data[0]->custom_id}}" onkeydown="return /[a-z]/i.test(event.key)" placeholder="Enter Custom ID">--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">From Parking Spots</label>
                                                <input type="text" name="from_parking_spots" class="form-control" value="{{$pre_construct_data[0]->from_parking_spots}}"placeholder="Enter from parking spots">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">To Parking Spots</label>
                                                <input type="text" name="to_parking_spots" class="form-control" value="{{$pre_construct_data[0]->to_parking_spots}}" placeholder="Enter to parking spots">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Approximate Completion Date </label>
                                                <input type="date" name="year_built" class="form-control" value="{{$pre_construct_data[0]->year_built}}" placeholder="Enter Approximate Completion Date" pattern="[0-9\s\$@%~#^&*-]+">
                                            </div>
                                        </div>

                                        {{--                                        <div class="col-md-6">--}}
                                        {{--                                            <div class="form-group">--}}
                                        {{--                                                <label class="bmd-label-floating">Available from (*date)</label>--}}
                                        {{--                                                <input type="date" name="available_from" class="form-control" value="{{$pre_construct_data[0]->available_from}}">--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        {{--                                        <div class="col-md-6">--}}
                                        {{--                                            <div class="form-group">--}}
                                        {{--                                                <label class="bmd-label-floating">Garage Size (*text)</label>--}}
                                        {{--                                                <input type="text" name="garage_size" class="form-control" value="{{$pre_construct_data[0]->garage_size}}" onkeydown="return /[a-z]/i.test(event.key)" placeholder="Enter garage size">--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        {{--                                        <div class="col-md-6">--}}
                                        {{--                                            <div class="form-group">--}}
                                        {{--                                                <label class="bmd-label-floating">External Construction (*text)</label>--}}
                                        {{--                                                <input type="text" name="external_construction" class="form-control" value="{{$pre_construct_data[0]->external_construction}}" onkeydown="return /[a-z]/i.test(event.key)" placeholder="Enter External construction">--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Basement</label>
                                                {{--                                                <input type="text" name="basement" class="form-control" value="{{$pre_construct_data[0]->basement}}" onkeydown="return /[a-z]/i.test(event.key)" placeholder="Enter basement">--}}
                                                <select name="basement" id="basement" class="form-control">
                                                    <option value="finished" @if($pre_construct_data[0]->basement == 'finished') ? selected : null @endif>Finished</option>
                                                    <option value="unfinished" @if($pre_construct_data[0]->basement == 'unfinished') ? selected : null @endif>Unfinished</option>
                                                    <option value="partially finished" @if($pre_construct_data[0]->basement == 'partially finished') ? selected : null @endif>Partially Finished</option>
                                                    <option value="no basement" @if($pre_construct_data[0]->basement == 'no basement') ? selected : null @endif>No Basement</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Exterior Material</label>
                                                <input type="text" name="exterior_material" class="form-control" value="{{$pre_construct_data[0]->exterior_material}}" placeholder="Enter exterior material">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Roof Material</label>
                                                {{--                                                <input type="text" name="roofing" class="form-control" value="{{$pre_construct_data[0]->roofing}}" onkeydown="return /[a-z]/i.test(event.key)" placeholder="Enter roofing">--}}
                                                <select name="roofing" id="roofing" class="form-control">
                                                    <option value="standard" @if($pre_construct_data[0]->roofing == 'standard') ? selected : null @endif>Standard</option>
                                                    <option value="metal" @if($pre_construct_data[0]->roofing == 'metal') ? selected : null @endif>Metal</option>
                                                    <option value="no roof" @if($pre_construct_data[0]->roofing == 'no roof') ? selected : null @endif>No Roof</option>
                                                    <option value="other type" @if($pre_construct_data[0]->roofing == 'other type') ? selected : null @endif>Other Type</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="floors" class="bmd-label-floating">Floors No</label>
                                                {{--<input type="text" name="Construction" class="form-control">--}}
                                                <select name="floors_no" id="floors_no" class="form-control">
                                                    <option value="1" @if($pre_construct_data[0]->floors_no == '1') ? selected : null @endif>1</option>
                                                    <option value="2" @if($pre_construct_data[0]->floors_no == '2') ? selected : null @endif>2</option>
                                                    <option value="3" @if($pre_construct_data[0]->floors_no == '3') ? selected : null @endif>3</option>
                                                    <option value="4" @if($pre_construct_data[0]->floors_no == '4') ? selected : null @endif>4</option>
                                                    <option value="5" @if($pre_construct_data[0]->floors_no == '5') ? selected : null @endif>5</option>
                                                    <option value="6" @if($pre_construct_data[0]->floors_no == '6') ? selected : null @endif>6</option>
                                                    <option value="7" @if($pre_construct_data[0]->floors_no == '7') ? selected : null @endif>7</option>
                                                    <option value="8" @if($pre_construct_data[0]->floors_no == '8') ? selected : null @endif>8</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Structure" class="bmd-label-floating">Structure Type</label>
                                                {{--<input type="text" name="Construction" class="form-control">--}}
                                                <select name="structure_type" id="structure_type" class="form-control">
                                                    <option value="apartment" @if($pre_construct_data[0]->structure_type == 'apartment') ? selected : null @endif>Apartment</option>
                                                    <option value="condos" @if($pre_construct_data[0]->structure_type == 'condos') ? selected : null @endif>Condos</option>
                                                    <option value="multi-unit" @if($pre_construct_data[0]->structure_type == 'multi-unit') ? selected : null @endif>Multi-Unit</option>
                                                    <option value="houses" @if($pre_construct_data[0]->structure_type == 'houses') ? selected : null @endif>Houses</option>
                                                    <option value="land" @if($pre_construct_data[0]->structure_type == 'land') ? selected : null @endif>Land</option>
                                                    <option value="offices" @if($pre_construct_data[0]->structure_type == 'offices') ? selected : null @endif>Offices</option>
                                                    <option value="rental" @if($pre_construct_data[0]->structure_type == 'rental') ? selected : null @endif>Retail</option>
                                                    <option value="villas" @if($pre_construct_data[0]->structure_type == 'villas') ? selected : null @endif>Villas</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" for="notes">Owner/Agent notes (*not visible on front end)</label>
                                                {{--<input type="text" name="t_description" class="form-control">--}}
                                                <textarea name="owner_agent_note" id="notes" cols="96" rows="2" class="form-control" placeholder="Enter notes">{{$pre_construct_data[0]->owner_agent_note}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    {{--<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Structure" class="bmd-label-floating">Property Status</label>
                                                <select name="property_status" id="property_status" class="form-control">
                                                    <option value="normal" @if($pre_construct_data[0]->property_status == 'normal') ? selected : null @endif>normal</option>
                                                    <option value="openHouse" @if($pre_construct_data[0]->property_status == 'openHouse') ? selected : null @endif>open house</option>
                                                    <option value="sold" @if($pre_construct_data[0]->property_status == 'sold') ? selected : null @endif>sold</option>
                                                    <option value="newOffer" @if($pre_construct_data[0]->property_status == 'newOffer') ? selected : null @endif>new Offer</option>
                                                    <option value="hotOffer" @if($pre_construct_data[0]->property_status == 'hotOffer') ? selected : null @endif>hot Offer</option>
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
                                                                <input type="checkbox" name="amenities[]" {{ (in_array($dataValue->id, explode(',', $pre_construct_data[0]->amenities_feature))) ? 'checked' : '' }} value="{{$dataValue->id}}">&nbsp;{{$dataValue->name}}
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
                                                <select name="video_from" id="video_from" class="form-control">
                                                    <option value="">Select Vieo from</option>
                                                    <option value="youtube" @if($pre_construct_data[0]->video_from  == 'youtube') ? selected : null @endif>youtube</option>
                                                    <option value="vimeo" @if($pre_construct_data[0]->video_from == 'vimeo') ? selected : null @endif>vimeo</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Video">Embed Video id:</label>
                                                <input type="text" id="embed_video_id" name="embed_video_id" class="form-control" value="{{$pre_construct_data[0]->embed_video_id}}" placeholder="Enter embed video id">
                                                <span class="embed_video_error text-danger"></span>
                                                <span class="embed_video_success text-success"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <input type="hidden" name="image_id" id="image_id" value="{{$pre_construct_data[0]->id}}">
                                    <button type="submit" class="btn btn-primary" style="background-color: #1ED65f;border-color: #1ED65f;">Update</button>
                                    <a href="{{url('/admin/list-pre-construct-property')}}" class="btn btn-default" style="background-color: #949496;border-color: #949496;color: white">Back</a>
                                </div>
                            </form>
                            {{--Start Add Modal 2D--}}
                            <div class="modal fade" id="update_2d_floor_detail" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add 2D Floor Plan Detail </h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="session_id_for_edit" id="session_id_for_edit" value="{{Session::get('input_image_id')}}">
                                            <div class="fileUpload btn btn-success" style="background-color: #1ED65F;border-color: #1ED65F;margin-bottom: 0;margin-left: 0;">
                                                <span>SELECT PLAN</span>
                                                <input type="file" name="2d_file_update" id="2d_file_update" class="upload">
                                            </div>
                                            <!-- display update floor plan 2d alert message -->
                                            <span class="text-danger" id="update-floor-plan-2d-error-msg"></span>
                                            <div id="edit_2d_image_section" style="margin-top: 5px;"></div>
                                            <div class="form-group">
                                                <label class="2d_bed">No. Of Bedroom</label>
                                                <input type="text" name="2d_bed_update" id="2d_bed_update" class="form-control numbersOnly" value="{{Session::get('input_bedrooms')}}">
                                            </div>
                                            <div class="form-group">
                                                <label class="2d_bath">No. Of Bathroom</label>
                                                <input type="text" name="2d_bath_update" id="2d_bath_update" class="form-control numbersOnly" value="{{Session::get('input_bathrooms')}}">
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
                                            <div class="fileUpload btn btn-success" style="background-color: #1ED65F;border-color: #1ED65F;margin-bottom: 0;margin-left: 0;">
                                                <span>SELECT PLAN</span>
                                                <input type="file" name="3d_file_update" class="upload" id="3d_file_update">
                                            </div>
                                            <!-- display update floor plan 3d alert message -->
                                            <span class="text-danger" id="update-floor-plan-3d-error-msg"></span>
                                            <div id="edit_3d_image_section"></div>
                                            <div class="form-group">
                                                <label class="3d_bed_update">No. Of Bedroom</label>
                                                <input type="text" name="3d_bed_update" id="3d_bed_update" class="form-control numbersOnly" value="{{Session::get('input_3d_bedrooms')}}">
                                            </div>
                                            <div class="form-group">
                                                <label class="3d_bath_update">No. Of Bathroom</label>
                                                <input type="text" name="3d_bath_update" id="3d_bath_update" class="form-control numbersOnly" value="{{Session::get('input_3d_bathrooms')}}">
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
    @section('script')
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <!-- add/deletemedia using ajax with preview -->
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
                $('#media_upload_btn_section').hide();
                $('#media_upload_loader').show();
                $.ajax({
                    async:true,
                    type        :'post',
                    url         : "{{ url('/admin/update-pre-construct-media')}}",
                    data        : postData,
                    cache       : false,
                    contentType : false,
                    processData : false,
                    success     : function(result) {
                        $('#media_upload_btn_section').show();
                        $('#media_upload_loader').hide();
                        console.log(result);
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
                                if (result.data.property_type == 'pre-construct'){
                                    //imageFile preview
                                    url = "{{asset('admin-panel/assets/property-images/media-file/pre-construct')}}" + "/" +result.data.media_name;
                                    file = "<img class='img-responsive' src='"+url+"' height='100px' width='100px' id='del_img_"+result.data.id+"'>";
                                }
                                {{--else {--}}
                                {{--    url = "{{asset('admin-panel/assets/property-media')}}" + "/" +result.data.media_name;--}}
                                {{--    file = "<img class='img-responsive' src='"+url+"' height='100px' width='100px' id='del_img_"+result.data.id+"'>";--}}
                                {{--}--}}
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
                        if(result.code = 404){
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
                            url : "{{url('/admin/destroy-pre-construct-media')}}",
                            type : "post",
                            data : { "_token": "{{ csrf_token() }}",image_id : image_id},
                            success : function (data) {

                                //alert(image_id);
                                let url = "{{asset('admin-panel/assets/property-images/media-file/pre-construct')}}" + "/" +data.media_name;
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
                })
            });
        </script>
    @endsection
    <!-- floor-plan 2d & 3D images preview -->
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <!-- begin dynamic dependent dropdown country-state -->
    {{--<script>--}}
    {{--    $(document).ready(function() {--}}
    {{--        $('#country-dropdown').on('change', function() {--}}
    {{--            var country_id = this.value;--}}
    {{--            //console.log(country_id);--}}
    {{--            $("#state_dropdown").html('');--}}
    {{--            $.ajax({--}}
    {{--                url:"{{url('get-states-by-country')}}",--}}
    {{--                type: "POST",--}}
    {{--                data: {--}}
    {{--                    country_id: country_id,--}}
    {{--                    _token: '{{csrf_token()}}'--}}
    {{--                },--}}
    {{--                dataType : 'json',--}}
    {{--                success: function(result){--}}
    {{--                    // $('#state_dropdown').html('<option value="">Select State</option>');--}}
    {{--                    $.each(result.states,function(key,value){--}}
    {{--                        $("#state_dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');--}}
    {{--                    });--}}
    {{--                    // $('#city-dropdown').html('<option value="">Select State First</option>');--}}
    {{--                }--}}
    {{--            });--}}
    {{--        });--}}
    {{--    });--}}
    {{--</script>--}}
    <!-- end dynamic dependent dropdown country-state -->
    <!-- Begin edited-image-del-floor-plan-2d & 3d -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{--    <script>--}}
{{--        //delete updated floor plan 2D image--}}
{{--        $(document).on("click","#del_plan_2d_btn",function (e) {--}}
{{--            e.preventDefault();--}}
{{--            swal({--}}
{{--                title: "Are you sure?",--}}
{{--                text: "You want to delete this floor plan 2D image?",--}}
{{--                icon: "warning",--}}
{{--                buttons: true,--}}
{{--                dangerMode: true,--}}
{{--            }).then((willDelete) => {--}}
{{--                if (willDelete) {--}}
{{--                    let image_plan_2d_id = $(this).attr('data-id');--}}
{{--                    $.ajax({--}}
{{--                        url : "{{url('/delete-pre-construct-floor-2d-image')}}",--}}
{{--                        type : "post",--}}
{{--                        data : { "_token": "{{ csrf_token() }}",image_id : image_plan_2d_id},--}}
{{--                        success : function (data) {--}}
{{--                            if(data.code == 200) {--}}
{{--                                $('#remove_2d_' + image_plan_2d_id).hide();--}}
{{--                                swal("Your floor plan 2D image has been deleted!", {icon: "success",});--}}
{{--                            }--}}
{{--                        }--}}
{{--                    });--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--        //delete updated floor plan 3D image--}}
{{--        $(document).on("click","#del_plan_3d_btn",function (e) {--}}
{{--            e.preventDefault();--}}
{{--            swal({--}}
{{--                title: "Are you sure?",--}}
{{--                text: "You want to delete this floor plan 3D image?",--}}
{{--                icon: "warning",--}}
{{--                buttons: true,--}}
{{--                dangerMode: true,--}}
{{--            }).then((willDelete) => {--}}
{{--                if (willDelete) {--}}
{{--                    let image_plan_3d_id = $(this).attr('data-id');--}}
{{--                    $.ajax({--}}
{{--                        url : "{{url('/delete-pre-construct-floor-3d-image')}}",--}}
{{--                        type : "post",--}}
{{--                        data : { "_token": "{{ csrf_token() }}",image_id : image_plan_3d_id},--}}
{{--                        success : function (data) {--}}
{{--                            console.log(data);--}}
{{--                            if(data.code == 200) {--}}
{{--                                $('#remove_floor_plan_3d_image_' + image_plan_3d_id).hide();--}}
{{--                                swal("Your floor plan 3D image has been deleted!", {icon: "success",});--}}
{{--                            }--}}
{{--                        }--}}
{{--                    });--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
    <!-- map api key & js -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBi6dX1tFAnm__rELtIR8agR0F3jkHDYhY"></script>
    <script>
        function initialize() {
            {{--var getlat = <?php echo ($pre_construct_data[0]->latitude) ?>;--}}
            {{--var getlan = <?php echo ($pre_construct_data[0]->longitude) ?>;--}}

            // if(getlat){
            //     lat = getlat;
            // }else{
            //     lat = 43.653226;
            // }
            //
            // if(getlan){
            //     lng = getlan;
            // }else{
            //     lng = -79.3831843;
            // }
            //default map
            lat = <?php echo ($pre_construct_data[0]->latitude) ?? 43.653226; ?>;
            lng = <?php echo ($pre_construct_data[0]->longitude) ?? -79.3831843; ?>;


            {{--lat = <?php echo ($pre_construct_data[0]->latitude)?>;--}}
            {{--lng = <?php echo ($pre_construct_data[0]->longitude)?>;--}}



            const myLatLng = { lat: lat, lng: lng };
            console.log(myLatLng);
            {{--const myLatLng = { lat: '{{ ($pre_construct_data[0]->latitude) ?? 43.653226 }}', lng: ' {{ ($pre_construct_data[0]->longitude) ?? -79.3831843 }}' };--}}
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 13,
                center: myLatLng,
            });
            new google.maps.Marker({
                position: myLatLng,
                map,
                // title: "Hello Toronto!",
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
                //alert('hello button is clicked');
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
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <!-- add-floor-plan-2d-info -->
    <script>
        $('#select_btn').click(function (){
            var bedroom = $('#2d_bed').val();
            var bathroom = $('#2d_bath').val();
            var imageFile = $('#2d_file').val();
            var sqft = $('#2d_sqft').val();
            console.log(imageFile);
            if(bathroom == '' && bedroom == '' && sqft == '') {
                $("#2d_bath_error").empty().append('Please enter bathrooms.');
                $("#2d_bed_error").empty().append('Please enter bedrooms.');
                $("#2d_sqft_error").empty().append('Please enter sqft.');
                $("#2d_file_error").empty().append('Please select floor plan.');
                $("#2d_file").val('');
                $("#floor-plan-2d-error-msg").empty();
                $("#floor-plan-2d-success-msg").empty();
            } else if(bathroom == '') {
                $("#2d_bath_error").empty().append('Please enter bathrooms.');
                $("#2d_file_error").empty().append('Please select floor plan.');
                $("#2d_sqft_error").empty().append('Please enter sqft.');
                $("#2d_bed_error").empty().append('Please enter bedrooms.');
                $("#2d_file").val('');
                $("#floor-plan-2d-error-msg").empty();
                $("#floor-plan-2d-success-msg").empty();
            }  else if(bedroom == '') {
                $("#2d_bath_error").empty().append('Please enter bathrooms.');
                $("#2d_bed_error").empty().append('Please enter bedrooms.');
                $("#2d_sqft_error").empty().append('Please enter sqft.');
                $("#2d_file_error").empty().append('Please select floor plan.');
                $("#2d_file").val('');
                $("#floor-plan-2d-error-msg").empty();
                $("#floor-plan-2d-success-msg").empty();
            }
            else if(sqft == '') {
                $("#2d_bath_error").empty().append('Please enter bathrooms.');
                $("#2d_bed_error").empty().append('Please enter bedrooms.');
                $("#2d_sqft_error").empty().append('Please enter sqft.');
                $("#2d_file_error").empty().append('Please select floor plan.');
                $("#2d_file").val('');
                $("#floor-plan-2d-error-msg").empty();
                $("#floor-plan-2d-success-msg").empty();
            }else if(imageFile == '' && bedroom != '' && bathroom != '' && sqft != ''){
                $("#2d_file_error").empty().append('Please select floor plan.');
                $("#floor-plan-2d-error-msg").empty();
                $("#floor-plan-2d-success-msg").empty();
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
                postData.append('input_property_id',$("#image_id").val());
                let image_id_no = $('#_2d_image_id').val();
                image_id_no++;
                $('#_2d_image_id').val(image_id_no);
                postData.append('input_image_id',$('#_2d_image_id').val());

                //display-loader
                $('#floor_plan_2d_loader').show();
                $('#floor_plan_2d_upload_section').hide();

                $.ajax({
                    type    : 'post',
                    url     : '{{url('/admin/edit-f-2d-plan-with-p-id')}}',
                    cache       : false,
                    contentType : false,
                    processData : false,
                    data    : postData,
                    success : function (response){
                        //display-loader
                        $('#floor_plan_2d_loader').hide();
                        $('#floor_plan_2d_upload_section').show();

                        console.log(response);
                        if(response.code == 404){
                            $('#floor-plan-2d-error-msg').empty().append(response.message);
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
                        }else if(response.code == 201){
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

                            let url = "{{asset('admin-panel/assets/property-images/floor-plan-2D/pre-construct')}}" + "/" +response.data.input_file;
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
                                '<label style="text-align : center">Sqft <br> '+response.data.input_sqft+'</label>' +
                                '</div>' +
                                '</div>' +
                                '<div class="row">' +
                                // '<div class="col-md-6">' +
                                // '<button style="float:right;" data-id="'+response.data.input_image_id+'" type="button" class="btn btn-info btn-sm" id="edit_2d_btn" data-input_image_id="'+response.data.input_image_id+'" data-2d_image_url="'+url+'" data-bedroom="'+response.data.input_bedrooms+'" data-bathroom="'+response.data.input_bathrooms+'" ><i class="fa fa-edit"></i></button>' +
                                // '</div>' +
                                '<div class="col-md-12">' +
                                '<button data-id="'+response.data.input_image_id+'" type="button" class="btn btn-danger btn-sm" id="delete_2d_btn" data-input_image_id="'+response.data.input_image_id+'"><i class="fa fa-trash"></i></button>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>')
                        }


                        /*$('#2d_file_preview').append('<div id="2d_child_section_'+image_id_no+'"> <div>' + file +'</div>'+ '<label>Bedroom</label>'+'<div>'+ response.data.input_bedrooms+'</div>'+'<label>Bathroom</label>'+'<div>'+ response.data.input_bathrooms+'</div>'+ "<br>" +
                            "<button data-id='"+response.data.input_image_id+"' type='button' class='btn btn-info btn-sm' id='edit_2d_btn' data-input_image_id='"+response.data.input_image_id+"' data-2d_image_url='"+url+"' data-bedroom='"+response.data.input_bedrooms+"' data-bathroom='"+response.data.input_bathrooms+"' ><i class='fa fa-edit'></i></button></div>"
                            );*/
                    }
                });
            }
        });

        $(document).on('click', '#edit_2d_btn', function (){
            $("#2d_file_update").val('');
            $("#session_id_for_edit").val($(this).attr("data-input_image_id"));
            $("#2d_bed_update").val($(this).attr("data-bedroom"));
            $("#2d_bath_update").val($(this).attr("data-bathroom"));
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

            $.ajax({
                url         : "{{url('/admin/update-2d-floor-image')}}",
                type        : "post",
                cache       : false,
                contentType : false,
                processData : false,
                data        : postData,
                success     : function (response) {
                    $("#update_2d_floor_detail").modal('hide');
                    $('#floor-plan-2d-alert-msg').empty().append('Floor plan data updated!');

                    let url = "{{asset('admin-panel/assets/property-images/floor-plan-2D/pre-construct')}}" + "/" +response.data.input_file;
                    let file = "<img class='img-responsive' src='"+url+"' height='150px' width='100%' id='del_img_"+response.data.input_image_id+"'>";

                    $('#2d_child_section_'+image_id_no).empty().append('<div>' + file +'</div>' +
                        '<div class="row">' +
                        '<div class="col-md-6">' +
                        '<label style="float: left">Bedroom <br> '+response.data.input_bedrooms+'</label>' +
                        '</div>' +
                        '<div class="col-md-6">' +
                        '<label style="float: right">Bathroom <br> '+response.data.input_bathrooms+'</label>' +
                        '</div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-md-6">' +
                        '<button style="float:right;" data-id="'+response.data.input_image_id+'" type="button" class="btn btn-info btn-sm" id="edit_2d_btn" data-input_image_id="'+response.data.input_image_id+'" data-2d_image_url="'+url+'" data-bedroom="'+response.data.input_bedrooms+'" data-bathroom="'+response.data.input_bathrooms+'" ><i class="fa fa-edit"></i></button>' +
                        '</div>' +
                        '<div class="col-md-6">' +
                        '<button style="float:left;" data-id="'+response.data.input_image_id+'" type="button" class="btn btn-danger btn-sm" id="delete_2d_btn" data-input_image_id=""><i class="fa fa-trash"></i></button>' +
                        '</div>' +
                        '</div>');
                    /*$('#2d_child_section_'+image_id_no).empty().append('<div>' + file +'</div>'+ '<label>Bedroom</label>'+'<div>'+ response.data.input_bedrooms+'</div>'+'<label>Bathroom</label>'+'<div>'+ response.data.input_bathrooms+'</div>'+ "<br>" +
                        "<button data-id='"+response.data.input_image_id+"' type='button' class='btn btn-info btn-sm' id='edit_2d_btn' data-input_image_id='"+response.data.input_image_id+"' data-2d_image_url='"+url+"' data-bedroom='"+response.data.input_bedrooms+"' data-bathroom='"+response.data.input_bathrooms+"' ><i class='fa fa-edit'></i></button>"
                    );*/
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
                        type: 'post',
                        url: '{{url('admin/delete-2d-image')}}',
                        data: {
                            _token: '{{ @csrf_token() }}',
                            deleted_id: deleted_id
                        },
                        success: function (response) {
                            if (response.code === 200) {
                                // $("#floor-plan-2d-success-msg").empty().append('Floor plan 2D deleted!');
                                Swal.fire('Good job!', 'Floor plan 2D has been deleted successfully!', 'success')
                                $("#floor-plan-2d-error-msg").empty();
                                location.reload();
                            }
                            console.log(response);
                        }
                    });
                }
            })
        })
    </script>
    <!-- add-floor-plan-3d-info -->
    <script>
        $('#select_f_3d_btn').click(function (){
            var bedroom = $('#f_3d_bed').val();
            var bathroom = $('#f_3d_bath').val();
            var imageFile = $('#3d_file').val();
            var sqft = $('#3d_sqft').val();

            if(bathroom == '' && bedroom == '' && sqft == '') {
                $("#3d_bath_error").empty().append('Please enter bathrooms.');
                $("#3d_bed_error").empty().append('Please enter bedrooms.');
                $("#3d_file_error").empty().append('Please select floor plan.');
                $("#3d_sqft_error").empty().append('Please select floor plan.');
                $("#3d_file").val('');
                $("#floor-plan-3d-success-msg").empty();
                $("#floor-plan-3d-error-msg").empty();
            } else if(bathroom == '') {
                $("#3d_bath_error").empty().append('Please enter bathrooms.');
                $("#3d_file_error").empty().append('Please select floor plan.');
                $("#3d_sqft_error").empty().append('Please select floor plan.');
                $("#3d_bed_error").empty().append('Please enter bedrooms.');
                $("#3d_file").val('');
                $("#floor-plan-3d-success-msg").empty();
                $("#floor-plan-3d-error-msg").empty();
            }  else if(bedroom == '') {
                $("#3d_bath_error").empty().append('Please enter bathrooms.');
                $("#3d_bed_error").empty().append('Please enter bedrooms.');
                $("#3d_sqft_error").empty().append('Please select floor plan.');
                $("#3d_file_error").empty().append('Please select floor plan.');
                $("#3d_file").val('');
                $("#floor-plan-3d-success-msg").empty();
                $("#floor-plan-3d-error-msg").empty();
            } else if(imageFile == '' && bedroom != '' && bathroom != '' && sqft != ''){
                $("#3d_file_error").empty().append('Please select floor plan.');
                $("#floor-plan-3d-success-msg").empty();
                $("#floor-plan-3d-error-msg").empty();
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
                postData.append('input_property_id',$("#image_id").val());

                let image_id_no = $('#_3d_image_id').val();
                image_id_no++;
                $('#_3d_image_id').val(image_id_no);
                postData.append('input_image_id',$('#_3d_image_id').val());

                //display-loader
                $('#floor_plan_3d_loader').show();
                $('#floor_plan_3d_upload_section').hide();

                $.ajax({
                    type    : 'post',
                    url     : '{{url('/admin/edit-f-3d-plan-with-p-id')}}',
                    cache       : false,
                    contentType : false,
                    processData : false,
                    data    : postData,
                    success : function (response){
                        //display-loader
                        $('#floor_plan_3d_loader').hide();
                        $('#floor_plan_3d_upload_section').show();

                        // console.log(response.data.images);
                        if (response.code == 404){
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
                        }else if(response.code == 201){
                            $('#floor-plan-3d-error-msg').empty().append(response.message);
                            $('#floor-plan-3d-success-msg').empty();
                            $('#3d_file').val('');
                            $('#f_3d_bath').val('');
                            $('#f_3d_bed').val('');
                            $('#f_3d_sqft').val('');
                        }else{
                            console.log(response);
                            $('#3d_file').val('');
                            $('#f_3d_bath').val('');
                            $('#f_3d_bed').val('');
                            $('#f_3d_sqft').val('');

                            $('#floor-plan-3d-success-msg').empty().append('Floor plan 3D saved!');
                            $('#floor-plan-3d-error-msg').empty();
                            let url;
                            let file;

                            url = "{{asset('admin-panel/assets/property-images/floor-plan-3D/pre-construct')}}" + "/" +response.data.input_file;
                            file = "<img class='img-responsive' src='"+url+"' height='150px' width='100%' id='del_img_"+response.data.input_image_id+"'>";

                            $("#3d_file_preview").append('<div class="col-md-3">' +
                                '<div id="3d_child_section_'+image_id_no+'">' +
                                '<div>' + file +'</div>' +
                                '<div class="row">' +
                                '<div class="col-md-6">' +
                                '<label style="float: left">Bedroom <br> '+response.data.input_bedrooms+'</label>' +
                                '</div>' +
                                '<div class="col-md-6">' +
                                '<label style="float: right">Bathroom <br> '+response.data.input_bathrooms+'</label>' +
                                '</div>' +
                                '<div class="col-md-12">' +
                                '<label style="text-align: center">Sqft <br> '+response.data.input_sqft+'</label>' +
                                '</div>' +
                                '</div>' +
                                '<div class="row">' +
                                // '<div class="col-md-6">' +
                                // '<button style="float:right;" data-id="'+response.data.input_image_id+'" type="button" class="btn btn-info btn-sm" id="edit_3d_btn" data-input_image_id="'+response.data.input_image_id+'" data-3d_image_url="'+url+'" data-bedroom="'+response.data.input_bedrooms+'" data-bathroom="'+response.data.input_bathrooms+'" ><i class="fa fa-edit"></i></button>' +
                                // '</div>' +
                                '<div class="col-md-12">' +
                                '<button data-id="'+response.data.input_image_id+'" type="button" class="btn btn-danger btn-sm" id="delete_3d_btn" data-input_image_id=""><i class="fa fa-trash"></i></button>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>')
                        }

                        /*$('#3d_file_preview').append('<div id="3d_child_section_'+image_id_no+'"> <div>' + file +'</div>'+ '<label>Bedroom</label>'+'<div>'+ response.data.input_bedrooms+'</div>'+'<label>Bathroom</label>'+'<div>'+ response.data.input_bathrooms+'</div>'+ "<br>" +
                            "<button data-id='"+response.data.input_image_id+"' type='button' class='btn btn-info btn-sm' id='edit_3d_btn' data-input_image_id='"+response.data.input_image_id+"' data-3d_image_url='"+url+"' data-bedroom='"+response.data.input_bedrooms+"' data-bathroom='"+response.data.input_bathrooms+"' ><i class='fa fa-edit'></i></button></div>"
                        );*/
                    }
                });
            }
        });

        $(document).on('click', '#edit_3d_btn', function (){
            $("#3d_file_update").val('');
            $("#session_id_for_edit").val($(this).attr("data-input_image_id"));
            $("#3d_bed_update").val($(this).attr("data-bedroom"));
            $("#3d_bath_update").val($(this).attr("data-bathroom"));
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

            $.ajax({
                url         : "{{url('/admin/update-3d-floor-image')}}",
                type        : "post",
                cache       : false,
                contentType : false,
                processData : false,
                data        : postData,
                success     : function (response) {
                    $("#update_3d_floor_detail").modal('hide');
                    $('#floor-plan-3d-success-msg').empty().append('Floor plan 3D updated!');
                    $("#floor-plan-3d-error-msg").empty();

                    let url = "{{asset('admin-panel/assets/property-images/floor-plan-3D/pre-construct')}}" + "/" +response.data.input_file;
                    let file = "<img class='img-responsive' src='"+url+"' height='150px' width='100%' id='del_img_"+response.data.input_image_id+"'>";

                    $('#3d_child_section_'+image_id_no).empty().append('<div>' + file +'</div>' +
                        '<div class="row">' +
                        '<div class="col-md-6">' +
                        '<label style="float: left">Bedroom <br> '+response.data.input_bedrooms+'</label>' +
                        '</div>' +
                        '<div class="col-md-6">' +
                        '<label style="float: right">Bathroom <br> '+response.data.input_bathrooms+'</label>' +
                        '</div>' +
                        '</div>' +
                        '<div class="row">' +
                        // '<div class="col-md-6">' +
                        // '<button style="float:right;" data-id="'+response.data.input_image_id+'" type="button" class="btn btn-info btn-sm" id="edit_3d_btn" data-input_image_id="'+response.data.input_image_id+'" data-3d_image_url="'+url+'" data-bedroom="'+response.data.input_bedrooms+'" data-bathroom="'+response.data.input_bathrooms+'" ><i class="fa fa-edit"></i></button>' +
                        // '</div>' +
                        '<div class="col-md-12">' +
                        '<button data-id="'+response.data.input_image_id+'" type="button" class="btn btn-danger btn-sm" id="delete_3d_btn" data-input_image_id=""><i class="fa fa-trash"></i></button>' +
                        '</div>' +
                        '</div>');

                    /*$('#3d_child_section_'+image_id_no).empty().append('<div>' + file +'</div>'+ '<label>Bedroom</label>'+'<div>'+ response.data.input_bedrooms+'</div>'+'<label>Bathroom</label>'+'<div>'+ response.data.input_bathrooms+'</div>'+ "<br>" +
                        "<button data-id='"+response.data.input_image_id+"' type='button' class='btn btn-info btn-sm' id='edit_3d_btn' data-input_image_id='"+response.data.input_image_id+"' data-3d_image_url='"+url+"' data-bedroom='"+response.data.input_bedrooms+"' data-bathroom='"+response.data.input_bathrooms+"' ><i class='fa fa-edit'></i></button>"
                    );*/
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
                        url: '{{url('admin/delete-3d-image')}}',
                        data: {
                            _token: '{{ @csrf_token() }}',
                            deleted_id: deleted_id
                        },
                        success: function (response) {
                            if (response.code === 200) {
                                // $("#floor-plan-3d-success-msg").empty().append('Floor plan 3D deleted!');
                                Swal.fire('Good job!', 'Floor plan 3D has been deleted successfully!', 'success')
                                $("#floor-plan-3d-error-msg").empty();
                                location.reload();
                            }
                            console.log(response);
                        }
                    });
                }
            })
        })
    </script>
    <script>jQuery('.numbersOnly').keyup(function () {
            this.value = this.value.replace(/[^0-9\.]/g,'');
        });</script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- del saved banner-1-img -->
    <script>
        $(document).ready(function (){
            $('#deleting-banner-1-btn') .click(function (){
                var b_1_id = $(this).attr('data-banner1-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this banner 1?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: 'get',
                            url: '{{url('admin/delete-banner-1')}}',
                            data: {
                                _token: '{{ @csrf_token() }}',
                                b_1_id: b_1_id
                            },
                            success: function (response) {
                                if (response.code == 200) {
                                    // $("#success-msg-banner-1").empty().append(response.message);
                                    Swal.fire('Good job!', 'Banner 1 has been deleted successfully!', 'success')
                                    $(".db-banner-img-1").hide();
                                    location.reload();
                                }
                            }
                        });
                    }
                })
            });
        });
    </script>
    <!-- del saved banner-2-img -->
    <script>
        $(document).ready(function (){
            $('#deleting-banner-2-btn') .click(function (){
                var b_2_id = $(this).attr('data-banner2-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this banner 2?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'get',
                            url: '{{url('admin/delete-banner-2')}}',
                            data: {
                                _token: '{{ @csrf_token() }}',
                                b_2_id: b_2_id
                            },
                            success: function (response) {
                                if (response.code == 200) {
                                    // $("#success-msg-banner-2").empty().append(response.message);
                                    Swal.fire('Good job!', 'Banner 2 has been deleted successfully!', 'success')
                                    $(".db-banner-img-2").hide();
                                    location.reload();
                                }
                                //console.log(response);
                            }
                        });
                    }
                })
            });
        });
    </script>
    <!-- del saved banner-3-img -->
    <script>
        $(document).ready(function (){
            $('#deleting-banner-3-btn') .click(function (){
                var b_3_id = $(this).attr('data-banner3-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this banner 3?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'get',
                            url: '{{url('admin/delete-banner-3')}}',
                            data: {
                                _token: '{{ @csrf_token() }}',
                                b_3_id: b_3_id
                            },
                            success: function (response) {
                                if (response.code == 200) {
                                    // $("#success-msg-banner-3").empty().append(response.message);
                                    Swal.fire('Good job!', 'Banner 3 has been deleted successfully!', 'success')
                                    $(".db-banner-img-3").hide();
                                    location.reload();
                                }
                            }
                        });
                    }
                })
            });
        });
    </script>
    <!-- del saved banner-4-img -->
    <script>
        $(document).ready(function (){
            $('#deleting-banner-4-btn') .click(function (){
                var b_4_id = $(this).attr('data-banner4-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this banner 4?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'get',
                            url: '{{url('admin/delete-banner-4')}}',
                            data: {
                                _token: '{{ @csrf_token() }}',
                                b_4_id: b_4_id
                            },
                            success: function (response) {
                                if (response.code == 200) {
                                    // $("#success-msg-banner-4").empty().append(response.message);
                                    Swal.fire('Good job!', 'Banner 4 has been deleted successfully!', 'success')
                                    $(".db-banner-img-4").hide();
                                    location.reload();
                                }else{

                                }
                            }
                        });
                    }
                })
            });
        });
    </script>

    // 5
    <script>
        $(document).ready(function (){
            $('#deleting-banner-5-btn') .click(function (){
                var b_5_id = $(this).attr('data-banner5-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this banner 5?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'get',
                            url: '{{url('admin/delete-banner-5')}}',
                            data: {
                                _token: '{{ @csrf_token() }}',
                                b_5_id: b_5_id
                            },
                            success: function (response) {
                                if (response.code == 200) {
                                    // $("#success-msg-banner-5").empty().append(response.message);
                                    Swal.fire('Good job!', 'Banner 5 has been deleted successfully!', 'success')
                                    $(".db-banner-img-5").hide();
                                    location.reload();
                                }else{

                                }
                            }
                        });
                    }
                })
            });
        });
    </script>

    // 6
    <script>
        $(document).ready(function (){
            $('#deleting-banner-6-btn') .click(function (){
                var b_6_id = $(this).attr('data-banner6-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this banner 6?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'get',
                            url: '{{url('admin/delete-banner-6')}}',
                            data: {
                                _token: '{{ @csrf_token() }}',
                                b_6_id: b_6_id
                            },
                            success: function (response) {
                                if (response.code == 200) {
                                    // $("#success-msg-banner-6").empty().append(response.message);
                                    Swal.fire('Good job!', 'Banner 6 has been deleted successfully!', 'success')
                                    $(".db-banner-img-6").hide();
                                    location.reload();
                                }else{

                                }
                            }
                        });
                    }
                })
            });
        });
    </script>

    // 7
    <script>
        $(document).ready(function (){
            $('#deleting-banner-7-btn') .click(function (){
                var b_7_id = $(this).attr('data-banner7-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this banner 7?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'get',
                            url: '{{url('admin/delete-banner-7')}}',
                            data: {
                                _token: '{{ @csrf_token() }}',
                                b_7_id: b_7_id
                            },
                            success: function (response) {
                                if (response.code == 200) {
                                    // $("#success-msg-banner-7").empty().append(response.message);
                                    Swal.fire('Good job!', 'Banner 7 has been deleted successfully!', 'success')
                                    $(".db-banner-img-7").hide();
                                    location.reload();
                                }else{

                                }
                            }
                        });
                    }
                })
            });
        });
    </script>

    <!-- add banner-1, banner-2, banner-3, banner-4 with session using ajax -->
    <!-- add banner-1 -->
    <script>
        //add banner-1
        $('#banner1_img').change(function (){
            // alert('banner 1 btn clicked');
            let postData = new FormData();
            postData.append('_token', "{{ csrf_token() }}");
            postData.append('banner_1_file', $("#banner1_img")[0].files[0]);
            let banner_1_id_no = $('#banner_1_id').val();
            console.log(banner_1_id_no);
            postData.append('banner_1_id',$('#banner_1_id').val());
            //display loader
            // $('#banner1_upload_loader').show();
            // $('#banner1_upload_btn').hide();

            $.ajax({
                type    : 'post',
                url     : '{{url('admin/add-banner-1')}}',
                cache       : false,
                contentType : false,
                processData : false,
                data    : postData,
                success : function (response){
                    console.log(response);
                    if(response.code == 404){
                        $('#error-msg-banner-1').empty().append(response.message);
                        $('#success-msg-banner-1').empty();
                    }else if(response.code == 400){
                        $('#error-msg-banner-1').empty().append(response.message);
                        $('#success-msg-banner-1').empty();
                    }else{
                        //hide loader
                        // $('#banner1_upload_loader').hide();
                        // $('#banner1_upload_btn').show();

                        let url = "{{asset('admin-panel/assets/property-images/banner-1')}}" + "/" +response.data.banner_1_file;
                        let file = "<img class='img-fluid' src='"+url+"' width='100%' id='del_b1_img_"+response.data.banner_1_id+"'>";

                        $('#success-msg-banner-1').empty().append(response.message);
                        $('#error-msg-banner-1').empty();

                        $("#banner_1_preview").append(
                            '<div class="banner_1_section_'+banner_1_id_no+'">' + file  +
                            '<div class="col-md-12 text-center">' +
                            '<button data-id="'+response.data.banner_1_id+'" type="button" class="btn btn-danger btn-sm" id="delete_b1_btn"><i class="fa fa-trash"></i></button>' +
                            '</div>' +
                            '</div>')
                    }
                }
            })
        });
        //delete banner-1
        $(document).on('click', '#delete_b1_btn', function (){
            let deleted_id = $(this).attr('data-id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this banner 1?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'post',
                        url: '{{url('admin/delete-banner-1')}}',
                        data: {
                            _token: '{{ @csrf_token() }}',
                            deleted_id: deleted_id
                        },
                        success: function (response) {
                            if (response.code === 200) {
                                $('#banner_1_preview').remove();
                                Swal.fire('Good job!', 'Banner 1 has been deleted successfully!', 'success')
                                location.reload();
                            }
                            console.log(response);
                        }
                    });
                }
            })
        })

        //add banner-2
        $('#banner2_img').change(function (){
            let postData = new FormData();
            postData.append('_token', "{{ csrf_token() }}");
            postData.append('banner_2_file', $("#banner2_img")[0].files[0]);
            let banner_2_id_no = $('#banner_2_id').val();
            console.log(banner_2_id_no);
            postData.append('banner_2_id',$('#banner_2_id').val());
            //display loader
            // $('#banner2_upload_loader').show();
            // $('#banner2_upload_btn').hide();

            $.ajax({
                type    : 'post',
                url     : '{{url('admin/add-banner-2')}}',
                cache       : false,
                contentType : false,
                processData : false,
                data    : postData,
                success : function (response){
                    console.log(response);
                    if(response.code == 404){
                        $('#error-msg-banner-2').empty().append(response.message);
                        $('#success-msg-banner-2').empty();
                    }else if(response.code == 400){
                        $('#error-msg-banner-2').empty().append(response.message);
                        $('#success-msg-banner-2').empty();
                    }else{
                        //hide loader
                        // $('#banner2_upload_loader').hide();
                        // $('#banner2_upload_btn').show();

                        let url = "{{asset('admin-panel/assets/property-images/banner-2')}}" + "/" +response.data.banner_2_file;
                        let file = "<img class='img-fluid' src='"+url+"' width='100%' id='del_b2_img_"+response.data.banner_2_id+"'>";

                        $('#success-msg-banner-2').empty().append(response.message);
                        $('#error-msg-banner-2').empty();

                        $("#banner_2_preview").append(
                            '<div class="banner_2_section_'+banner_2_id_no+'">' + file  +
                            '<div class="col-md-12 text-center">' +
                            '<button data-id="'+response.data.banner_2_id+'" type="button" class="btn btn-danger btn-sm" id="delete_b2_btn"><i class="fa fa-trash"></i></button>' +
                            '</div>' +
                            '</div>')
                    }
                }
            })
        });
        //delete banner-2
        $(document).on('click', '#delete_b2_btn', function (){
            let deleted_id = $(this).attr('data-id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this banner 2?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'post',
                        url: '{{url('admin/delete-banner-2')}}',
                        data: {
                            _token: '{{ @csrf_token() }}',
                            deleted_id: deleted_id
                        },
                        success: function (response) {
                            if (response.code === 200) {
                                $('#banner_2_preview').remove();
                                Swal.fire('Good job!', 'Banner 2 has been deleted successfully!', 'success')
                                location.reload();
                            }
                            console.log(response);
                        }
                    });
                }
            })
        })

        //add banner-3
        $('#banner3_img').change(function (){
            let postData = new FormData();
            postData.append('_token', "{{ csrf_token() }}");
            postData.append('banner_3_file', $("#banner3_img")[0].files[0]);
            let banner_3_id_no = $('#banner_3_id').val();
            postData.append('banner_3_id',$('#banner_3_id').val());
            //display loader
            // $('#banner3_upload_loader').show();
            // $('#banner3_upload_btn').hide();

            $.ajax({
                type    : 'post',
                url     : '{{url('admin/add-banner-3')}}',
                cache       : false,
                contentType : false,
                processData : false,
                data    : postData,
                success : function (response){
                    console.log(response);
                    if(response.code == 404){
                        $('#error-msg-banner-3').empty().append(response.message);
                        $('#success-msg-banner-3').empty();
                    }else if(response.code == 400){
                        $('#error-msg-banner-3').empty().append(response.message);
                        $('#success-msg-banner-3').empty();
                    }else{
                        //hide loader
                        // $('#banner3_upload_loader').hide();
                        // $('#banner3_upload_btn').show();

                        let url = "{{asset('admin-panel/assets/property-images/banner-3')}}" + "/" +response.data.banner_3_file;
                        let file = "<img class='img-fluid' src='"+url+"' width='100%' id='del_b3_img_"+response.data.banner_3_id+"'>";

                        $('#success-msg-banner-3').empty().append(response.message);
                        $('#error-msg-banner-3').empty();

                        $("#banner_3_preview").append(
                            '<div class="banner_3_section_'+banner_3_id_no+'">' + file  +
                            '<div class="col-md-12 text-center">' +
                            '<button data-id="'+response.data.banner_3_id+'" type="button" class="btn btn-danger btn-sm" id="delete_b3_btn"><i class="fa fa-trash"></i></button>' +
                            '</div>' +
                            '</div>')
                    }
                }
            })
        });
        //delete banner-3
        $(document).on('click', '#delete_b3_btn', function (){
            let deleted_id = $(this).attr('data-id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this banner 3?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'post',
                        url: '{{url('admin/delete-banner-3')}}',
                        data: {
                            _token: '{{ @csrf_token() }}',
                            deleted_id: deleted_id
                        },
                        success: function (response) {
                            if (response.code === 200) {
                                $('#banner_3_preview').remove();
                                Swal.fire('Good job!', 'Banner 3 has been deleted successfully!', 'success')
                                location.reload();
                            }
                            console.log(response);
                        }
                    });
                }
            })
        })

        //add banner-4
        $('#banner4_img').change(function (){
            let postData = new FormData();
            postData.append('_token', "{{ csrf_token() }}");
            postData.append('banner_4_file', $("#banner4_img")[0].files[0]);
            let banner_4_id_no = $('#banner_4_id').val();
            postData.append('banner_4_id',$('#banner_4_id').val());
            //display loader
            // $('#banner4_upload_loader').show();
            // $('#banner4_upload_btn').hide();

            $.ajax({
                type    : 'post',
                url     : '{{url('admin/add-banner-4')}}',
                cache       : false,
                contentType : false,
                processData : false,
                data    : postData,
                success : function (response){
                    console.log(response);
                    if(response.code == 404){
                        $('#error-msg-banner-4').empty().append(response.message);
                        $('#success-msg-banner-4').empty();
                    }else if(response.code == 400){
                        $('#error-msg-banner-4').empty().append(response.message);
                        $('#success-msg-banner-4').empty();
                    }else{
                        //hide loader
                        // $('#banner4_upload_loader').hide();
                        // $('#banner4_upload_btn').show();

                        let url = "{{asset('admin-panel/assets/property-images/banner-4')}}" + "/" +response.data.banner_4_file;
                        let file = "<img class='img-fluid' src='"+url+"' width='100%' id='del_b4_img_"+response.data.banner_4_id+"'>";

                        $('#success-msg-banner-4').empty().append(response.message);
                        $('#error-msg-banner-4').empty();

                        $("#banner_4_preview").append(
                            '<div class="banner_4_section_'+banner_4_id_no+'">' + file  +
                            '<div class="col-md-12 text-center">' +
                            '<button data-id="'+response.data.banner_4_id+'" type="button" class="btn btn-danger btn-sm" id="delete_b4_btn"><i class="fa fa-trash"></i></button>' +
                            '</div>' +
                            '</div>')
                    }
                }
            })
        });
        //delete banner-4
        $(document).on('click', '#delete_b4_btn', function (){
            let deleted_id = $(this).attr('data-id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this banner 4?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'post',
                        url: '{{url('admin/delete-banner-4')}}',
                        data: {
                            _token: '{{ @csrf_token() }}',
                            deleted_id: deleted_id
                        },
                        success: function (response) {
                            if (response.code === 200) {
                                $('#banner_3_preview').remove();
                                Swal.fire('Good job!', 'Banner 4 has been deleted successfully!', 'success')
                                location.reload();
                            }
                            console.log(response);
                        }
                    });
                }
            })
        })

        // 5
        //add banner-5
        $('#banner5_img').change(function (){
            let postData = new FormData();
            postData.append('_token', "{{ csrf_token() }}");
            postData.append('banner_5_file', $("#banner5_img")[0].files[0]);
            let banner_5_id_no = $('#banner_5_id').val();
            console.log(banner_5_id_no);
            postData.append('banner_5_id',$('#banner_5_id').val());
            //display loader
            // $('#banner5_upload_loader').show();
            // $('#banner5_upload_btn').hide();

            $.ajax({
                type    : 'post',
                url     : '{{url('admin/add-banner-5')}}',
                cache       : false,
                contentType : false,
                processData : false,
                data    : postData,
                success : function (response){
                    console.log(response);
                    if(response.code == 404){
                        $('#error-msg-banner-5').empty().append(response.message);
                        $('#success-msg-banner-5').empty();
                    }else if(response.code == 400){
                        $('#error-msg-banner-5').empty().append(response.message);
                        $('#success-msg-banner-5').empty();
                    }else{
                        //hide loader
                        // $('#banner5_upload_loader').hide();
                        // $('#banner5_upload_btn').show();

                        let url = "{{asset('admin-panel/assets/property-images/banner-5')}}" + "/" +response.data.banner_5_file;
                        let file = "<img class='img-fluid' src='"+url+"' width='100%' id='del_b5_img_"+response.data.banner_5_id+"'>";

                        $('#success-msg-banner-5').empty().append(response.message);
                        $('#error-msg-banner-5').empty();

                        $("#banner_5_preview").append(
                            '<div class="banner_5_section_'+banner_5_id_no+'">' + file  +
                            '<div class="col-md-12 text-center">' +
                            '<button data-id="'+response.data.banner_5_id+'" type="button" class="btn btn-danger btn-sm" id="delete_b5_btn"><i class="fa fa-trash"></i></button>' +
                            '</div>' +
                            '</div>')
                    }
                }
            })
        });
        //delete banner-5
        $(document).on('click', '#delete_b5_btn', function (){
            let deleted_id = $(this).attr('data-id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this banner 5?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'post',
                        url: '{{url('admin/delete-banner-5')}}',
                        data: {
                            _token: '{{ @csrf_token() }}',
                            deleted_id: deleted_id
                        },
                        success: function (response) {
                            if (response.code === 200) {
                                $('#banner_5_preview').remove();
                                Swal.fire('Good job!', 'Banner 5 has been deleted successfully!', 'success')
                                location.reload();
                            }
                            console.log(response);
                        }
                    });
                }
            })
        })

        // 6
        //add banner-6
        $('#banner6_img').change(function (){
            let postData = new FormData();
            postData.append('_token', "{{ csrf_token() }}");
            postData.append('banner_6_file', $("#banner6_img")[0].files[0]);
            let banner_6_id_no = $('#banner_6_id').val();
            console.log(banner_6_id_no);
            postData.append('banner_6_id',$('#banner_6_id').val());
            //display loader
            // $('#banner6_upload_loader').show();
            // $('#banner6_upload_btn').hide();

            $.ajax({
                type    : 'post',
                url     : '{{url('admin/add-banner-6')}}',
                cache       : false,
                contentType : false,
                processData : false,
                data    : postData,
                success : function (response){
                    console.log(response);
                    if(response.code == 404){
                        $('#error-msg-banner-6').empty().append(response.message);
                        $('#success-msg-banner-6').empty();
                    }else if(response.code == 400){
                        $('#error-msg-banner-6').empty().append(response.message);
                        $('#success-msg-banner-6').empty();
                    }else{
                        //hide loader
                        // $('#banner6_upload_loader').hide();
                        // $('#banner6_upload_btn').show();

                        let url = "{{asset('admin-panel/assets/property-images/banner-6')}}" + "/" +response.data.banner_6_file;
                        let file = "<img class='img-fluid' src='"+url+"' width='100%' id='del_b6_img_"+response.data.banner_6_id+"'>";

                        $('#success-msg-banner-6').empty().append(response.message);
                        $('#error-msg-banner-6').empty();

                        $("#banner_6_preview").append(
                            '<div class="banner_6_section_'+banner_6_id_no+'">' + file  +
                            '<div class="col-md-12 text-center">' +
                            '<button data-id="'+response.data.banner_6_id+'" type="button" class="btn btn-danger btn-sm" id="delete_b6_btn"><i class="fa fa-trash"></i></button>' +
                            '</div>' +
                            '</div>')
                    }
                }
            })
        });
        //delete banner-6
        $(document).on('click', '#delete_b6_btn', function (){
            let deleted_id = $(this).attr('data-id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this banner 6?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'post',
                        url: '{{url('admin/delete-banner-6')}}',
                        data: {
                            _token: '{{ @csrf_token() }}',
                            deleted_id: deleted_id
                        },
                        success: function (response) {
                            if (response.code === 200) {
                                $('#banner_6_preview').remove();
                                Swal.fire('Good job!', 'Banner 6 has been deleted successfully!', 'success')
                                location.reload();
                            }
                            console.log(response);
                        }
                    });
                }
            })
        })

        // 7
        //add banner-7
        $('#banner7_img').change(function (){
            let postData = new FormData();
            postData.append('_token', "{{ csrf_token() }}");
            postData.append('banner_7_file', $("#banner7_img")[0].files[0]);
            let banner_7_id_no = $('#banner_7_id').val();
            console.log(banner_7_id_no);
            postData.append('banner_7_id',$('#banner_7_id').val());
            //display loader
            // $('#banner7_upload_loader').show();
            // $('#banner7_upload_btn').hide();

            $.ajax({
                type    : 'post',
                url     : '{{url('admin/add-banner-7')}}',
                cache       : false,
                contentType : false,
                processData : false,
                data    : postData,
                success : function (response){
                    console.log(response);
                    if(response.code == 404){
                        $('#error-msg-banner-7').empty().append(response.message);
                        $('#success-msg-banner-7').empty();
                    }else if(response.code == 400){
                        $('#error-msg-banner-7').empty().append(response.message);
                        $('#success-msg-banner-7').empty();
                    }else{
                        //hide loader
                        // $('#banner7_upload_loader').hide();
                        // $('#banner7_upload_btn').show();

                        let url = "{{asset('admin-panel/assets/property-images/banner-7')}}" + "/" +response.data.banner_7_file;
                        let file = "<img class='img-fluid' src='"+url+"' width='100%' id='del_b7_img_"+response.data.banner_7_id+"'>";

                        $('#success-msg-banner-7').empty().append(response.message);
                        $('#error-msg-banner-7').empty();

                        $("#banner_7_preview").append(
                            '<div class="banner_7_section_'+banner_7_id_no+'">' + file  +
                            '<div class="col-md-12 text-center">' +
                            '<button data-id="'+response.data.banner_7_id+'" type="button" class="btn btn-danger btn-sm" id="delete_b7_btn"><i class="fa fa-trash"></i></button>' +
                            '</div>' +
                            '</div>')
                    }
                }
            })
        });
        //delete banner-7
        $(document).on('click', '#delete_b7_btn', function (){
            let deleted_id = $(this).attr('data-id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this banner 7?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'post',
                        url: '{{url('admin/delete-banner-7')}}',
                        data: {
                            _token: '{{ @csrf_token() }}',
                            deleted_id: deleted_id
                        },
                        success: function (response) {
                            if (response.code === 200) {
                                $('#banner_7_preview').remove();
                                Swal.fire('Good job!', 'Banner 7 has been deleted successfully!', 'success')
                                location.reload();
                            }
                            console.log(response);
                        }
                    });
                }
            })
        })

    </script>
    <!-- del saved floor plan 2d -->
    <script>
        $(document).ready(function (){
            $(document).on('click','#saved_del_2d_btn',function (){
                let image_id = $(this).attr('data-id');
                // let property_id = $(this).attr('data-p-id');
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
                            type: 'get',
                            url: '{{url('/admin/delete-f-2d-plan-p-id')}}',
                            data: {
                                _token: '{{ @csrf_token() }}',
                                image_id: image_id,
                                // property_id : property_id
                            },
                            success: function (response) {
                                if (response.code === 200) {
                                    // $("#floor-plan-2d-success-msg").empty().append('Floor plan 2D deleted!');
                                    Swal.fire('Good job!', 'Floor plan 2D has been deleted successfully!', 'success')
                                    $("#floor-plan-2d-error-msg").empty();
                                    location.reload();
                                }
                                //console.log(response);
                            }
                        });
                    }
                })
            });
        });
    </script>
    <!-- del saved floor plan 3d -->
    <script>
        $(document).ready(function (){
            $(document).on('click','#saved_del_3d_btn',function (){
                let image_p_id = $(this).attr('data-id');
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
                            type: 'get',
                            url: '{{url('/admin/delete-f-3d-plan-p-id')}}',
                            data: {
                                _token: '{{ @csrf_token() }}',
                                image_p_id: image_p_id
                            },
                            success: function (response) {
                                if (response.code === 200) {
                                    // $("#floor-plan-2d-success-msg").empty().append('Floor plan 2D deleted!');
                                    Swal.fire('Good job!', 'Floor plan 3D has been deleted successfully!', 'success')
                                    $("#floor-plan-3d-error-msg").empty();
                                    location.reload();
                                }
                                //console.log(response);
                            }
                        });
                    }
                })
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $(document).on('change','#signUp_file',function(){
                var files = $("#signUp_file")[0].files[0];
                var type = files.type;
                if(type != 'text/html'){
                    $('#doc1_type_error_msg').empty().append('Only html files are allowed!');
                }else{
                    $('#doc1_type_error_msg').empty();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $(document).on('change','#newsletter_file',function(){
                var files = $("#newsletter_file")[0].files[0];
                var type = files.type;
                if(type != 'text/html'){
                    $('#doc2_type_error_msg').empty().append('Only html files are allowed!');
                }else{
                    $('#doc2_type_error_msg').empty();
                }
            });
        });
    </script>
@endsection

