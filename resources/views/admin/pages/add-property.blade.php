@extends('admin.layouts.master')
<!-- title -->
@section('title')
    <title> Admin | Add Property </title>
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
                        <h1>Add Property Form</h1>
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
                                <h3 class="card-title">Add Property</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url('/admin/add-property')}}" method="post">
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
                                                <input type="text" name="title" class="form-control" value="{{old('title')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="">Description<span style="color: red;">*</span></label>
                                                {{--<input type="text" name="t_description" class="form-control">--}}
                                                <textarea name="description" id="description" class="form-control">{{old('description')}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Price in $ (only numbers)</label>
                                                <input type="text" name="price" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">After Price Label (ex: "/month ")</label>
                                                        <input type="text" name="after_price_label" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Before Price Label (ex: "from ")</label>
                                                        <input type="text" name="before_price_label" class="form-control">
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
                                                    <option value="apartment">Apartment</option>
                                                    <option value="condos">Condos</option>
                                                    <option value="duplexes">Duplexes</option>
                                                    <option value="houses">Houses</option>
                                                    <option value="industrial">Industrial</option>
                                                    <option value="land">Land</option>
                                                    <option value="officer">Officer</option>
                                                    <option value="retails">Retails</option>
                                                    <option value="villas">Villas</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" for="dropdown">Listed In </label>
                                                <select class="form-control" name="listed_in" id="dropdown">
                                                    <option value="">None</option>
                                                    <option value="rentals">Rentals</option>
                                                    <option value="sales">sales</option>
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

                                            <br>
                                            {{-- @foreach($propertyMedia->media_name as $name)--}}
                                            @if(Session::get('media_name'))
                                                <div class="row">
                                                    @foreach(Session::get('media_name') as $key => $image_rows)
                                                        <input type="hidden" id="session_key_{{ $image_rows['id'] }}" value="{{ $key }}">
                                                        <div id="img-remove_{{ $image_rows['id'] }}">
                                                            @if($image_rows['type'] == 'image')
                                                                <img src="{{asset('admin-panel/assets/property-media/'.$image_rows['name'])}}" height="100px" width="100px" style="margin-left: 27px;" id="del_img_{{ $image_rows['id'] }}">
                                                            @else
                                                                <img src="{{asset('admin-panel/assets/icon-img/pdf-logo.png')}}" height="100px" width="100px" style="margin-left: 27px;" id="del_img_{{ $image_rows['id'] }}">
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
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Address<span style="color: red;">*</span></label>
                                                <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{old('address')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="city-dropdown" class="bmd-label-floating">City</label>
                                                <select class="form-control" name="city" id="city-dropdown">
                                                    <option value="">None</option>
                                                    <option value="oakland">Oakland</option>
                                                    <option value="san francisco">San Francisco</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="neighborhood" class="bmd-label-floating">Neighborhood</label>
                                                <select class="form-control" name="neighborhood" id="neighborhood-dropdown">
                                                    <option value="">None</option>
                                                    <option value="all areas">All Areas</option>
                                                    <option value="all">All</option>
                                                    <option value="embarcadero">Embarcadero</option>
                                                    <option value="hunters point">Hunters Point</option>
                                                    <option value="marina">Marina</option>
                                                    <option value="montclair">Montclair</option>
                                                    <option value="piedmont">Piedmont</option>
                                                    <option value="trestle glen">Trestle Glen</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="neighborhood" class="bmd-label-floating">Zip</label>
                                                <input type="text" name="zip" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="state" class="bmd-label-floating">Country / State</label>
                                                <select class="form-control" name="country_state" id="state-dropdown">
                                                    <option value="">None</option>
                                                    <option value="alameda">Alameda</option>
                                                    <option value="san francisco">San Francisco</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Country" class="bmd-label-floating">Country</label>
                                                <select class="form-control" name="country" id="Country-dropdown">
                                                    <option value="">None</option>
                                                    <option value="afghanistan">Afghanistan</option>
                                                    <option value="india">India</option>
                                                    <option value="indonesia">Indonesia</option>
                                                    <option value="united arab emirates">United Arab Emirates</option>
                                                    <option value="united kingdom">United Kingdom</option>
                                                    <option value="united states">United States</option>
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
                                                <input type="text" name="latitude" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Longitude (for Google Maps)</label>
                                                <input type="text" name="longitude" class="form-control">
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
                                                <input type="text" name="google_street_view" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Size in ft2 (*only numbers)</label>
                                                <input type="text" name="size_in_ft2" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Lot Size in ft2 (*only numbers)</label>
                                                <input type="text" name="lot_size_in_ft2" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Rooms (*only numbers)</label>
                                                <input type="text" name="rooms" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Bedrooms (*only numbers)</label>
                                                <input type="text" name="bedrooms" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Bathrooms (*only numbers)</label>
                                                <input type="text" name="bathrooms" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Custom ID (*text)</label>
                                                <input type="text" name="custom_id" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Year Built (*numeric)</label>
                                                <input type="text" name="year_built" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Garages (*text)</label>
                                                <input type="text" name="garages" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Available from (*date)</label>
                                                <input type="date" name="available_from" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Garage Size (*text)</label>
                                                <input type="text" name="garage_size" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">External Construction (*text)</label>
                                                <input type="text" name="external_construction" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Basement (*text)</label>
                                                <input type="text" name="basement" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Exterior Material (*text)</label>
                                                <input type="text" name="exterior_material" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Roofing (*text)</label>
                                                <input type="text" name="roofing" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="floors" class="bmd-label-floating">Floors No</label>
                                                {{--<input type="text" name="Construction" class="form-control">--}}
                                                <select name="floors_no" id="floors_no" class="form-control">
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
                                                    <option value="steel">steel</option>
                                                    <option value="brick">brick</option>
                                                    <option value="vinyl">vinyl</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" for="notes">Owner/Agent notes (*not visible on front end)</label>
                                                {{--<input type="text" name="t_description" class="form-control">--}}
                                                <textarea name="owner_agent_note" id="notes" cols="96" rows="2" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Structure" class="bmd-label-floating">Property Status</label>
                                                {{--<input type="text" name="Construction" class="form-control">--}}
                                                <select name="property_status" id="Structure" class="form-control">
                                                    <option value="normal">normal</option>
                                                    <option value="open house">open house</option>
                                                    <option value="sold">sold</option>
                                                    <option value="new offer">new offer</option>
                                                    <option value="hot offer">hot offer</option>
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
                                                                    <input type="checkbox" name="amenities[]" value="{{$dataValue->id}}">&nbsp;{{$dataValue->name}}
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Video">Video from </label>
                                                <select name="video_from" id="Video" class="form-control">
                                                    <option value="vimeo">Vimeo</option>
                                                    <option value="youtube">Youtube </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Video">Embed Video id:</label>
                                                <input type="text" id="Video" name="embed_video_id" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Virtual Tour:</label>
                                                <textarea name="virtual_tour" cols="96" rows="3" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Video">Select Subunits From the list:</label>
                                                <select name="subunits" id="Video" class="form-control" style="height: 350px" multiple>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Add Property</button>
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
                $.ajax({
                    async:true,
                    type        :'post',
                    url         : "{{ url('/admin/add-media')}}",
                    data        : postData,
                    cache       : false,
                    contentType : false,
                    processData : false,
                    success     : function(result) {
                        //console.log(result);
                        if(result.code == 200) {
                            let url;
                            let file;

                            //if user select pdf file than preview pdf-icon image, if not than preview imageFile
                            if(result.data.media_type === 'pdf') {
                                //pdfFile preview
                                url = "{{asset('/admin-panel/assets/icon-img/pdf-logo.png')}}";
                                file = "<img class='img-responsive' src='"+url+"' height='100px' width='100px' id='del_img_"+result.data.id+"'>";
                                //success-message
                                $("#file_upload_message").empty().append(result.message).show();
                                $("#file_upload_delete").empty().append(result.message).hide();
                                $("#file_upload_error").empty().append(result.message).hide();

                            } else {
                                //imageFile preview
                                url = "{{asset('/admin-panel/assets/property-media')}}" + "/" +result.data.media_name;
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
                        url : "{{url('/admin/destroy-media')}}",
                        type : "post",
                        data : { "_token": "{{ csrf_token() }}",image_id : image_id,session_key: $("#session_key_"+image_id).val()},
                        success : function (data) {
                            //alert(image_id);
                            let url = "{{asset('/admin-panel/property-media')}}" + "/" +data.media_name;
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
    @endsection
@endsection

