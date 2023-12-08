@extends('admin.layouts.master')
@section('title')
    <title> View Pending Property </title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>View Pending Property</h1>
                    </div>
{{--                    <div class="col-sm-6">--}}
{{--                        <ol class="breadcrumb float-sm-right">--}}
{{--                            <li class="breadcrumb-item"><a href=""></a>Properties</li>--}}
{{--                            <li class="breadcrumb-item"><a href="#">Pending</a></li>--}}
{{--                        </ol>--}}
{{--                    </div>--}}
                </div>
                {{--                <div class="text-right"><a href="{{url('/admin/add-property')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Property</a></div>--}}
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">View Pending Property</h3>
                                <div class="text-right"><a href="{{url('/admin/list-pending-property')}}" class="btn btn-primary" style="background-color: #1ED65f;border-color: #1ED65f;"><i class="fa fa-arrow-circle-left"></i>&nbsp;Back</a></div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
{{--                                    <tr>--}}
{{--                                        <th width="30%">Title</th>--}}
{{--                                        <th>Description</th>--}}
{{--                                    </tr>--}}
                                    </thead>
                                    <tbody>
{{--                                    <tr>--}}
{{--                                        <td>Property Title</td>--}}
{{--                                        <td>{{($propertyDetail[0]->title) ? $propertyDetail[0]->title : '-'}}</td>--}}
{{--                                    </tr>--}}
                                    <tr>
                                        <td>Property Description</td>
                                        <td>{{($propertyDetail[0]->description) ? $propertyDetail[0]->description : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Price</td>
                                        <td>${{($propertyDetail[0]->price) ? $propertyDetail[0]->price : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property After Price Label</td>
                                        <td>{{($propertyDetail[0]->after_price_label) ? $propertyDetail[0]->after_price_label : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Before Price Label</td>
                                        <td>{{($propertyDetail[0]->before_price_label) ? $propertyDetail[0]->before_price_label : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Category</td>
                                        <td>{{($propertyDetail[0]->category) ? $propertyDetail[0]->category : '-'}}</td>
{{--                                        <td>{{($propertyDetail[0]['cat_details']) ? $propertyDetail[0]['cat_details']['name'] : '-'}}</td>--}}
                                    </tr>
                                    <tr>
                                        <td>Property Media</td>
                                        <td>
                                            @if($getMedia[0]->media_name)
                                                @foreach($getMedia as $key =>$m)
                                                    {{--                            <input type="hidden" id="session_key_{{ $m->id }}" value="{{ $key }}">--}}
                                                    <div class="image" id="img-remove_{{$m->id}}" style="float: left;padding: 2px;">
                                                        @if($m->media_type == 'image')
                                                            <img src="{{asset('frontend/assets/property-images/media-file/'.$m->media_name)}}" height="100px" width="100px" id="del_img_{{$m->id}}">
                                                        @else
                                                            <img src="{{asset('pdf-icon/pdf-logo.png')}}" height="100px" width="100px" id="del_img_{{$m->id}}">
                                                        @endif
{{--                                                        <br>--}}
{{--                                                        <button type="button" class="btn btn-danger btn-sm" id="delete_btn" data-id="{{$m->id}}" style="margin-top: 10px;margin-left: 34px;"><i class="fa fa-trash"></i></button>--}}
                                                    </div>
                                                @endforeach
                                            @else
                                                <img src="{{asset('default/404-not-found.jpg')}}" height="100px" width="100px">
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Property ListedIn</td>
                                        <td>{{($propertyDetail[0]->listed_in) ? $propertyDetail[0]->listed_in : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Address</td>
                                        <td>{{($propertyDetail[0]->address) ? $propertyDetail[0]->address : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property City</td>
                                        <td>{{($propertyDetail[0]->city) ? $propertyDetail[0]->city : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Neighborhood</td>
                                        <td>{{($propertyDetail[0]->neighborhood) ? $propertyDetail[0]->neighborhood : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property zip</td>
                                        <td>{{($propertyDetail[0]->zip) ? $propertyDetail[0]->zip : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Country_state</td>
                                        <td>{{($propertyDetail[0]->country_state) ? $propertyDetail[0]->country_state : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Country</td>
                                        <td>{{($propertyDetail[0]->country) ? $propertyDetail[0]->country : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Latitude</td>
                                        <td>{{($propertyDetail[0]->latitude) ? $propertyDetail[0]->latitude : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Longitude</td>
                                        <td>{{($propertyDetail[0]->longitude) ? $propertyDetail[0]->longitude : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Enable Google Street View</td>
                                        <td>{{($propertyDetail[0]->enable_google_street_view) ? $propertyDetail[0]->enable_google_street_view : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Size In Ft2</td>
                                        <td>{{($propertyDetail[0]->size_in_ft2) ? $propertyDetail[0]->size_in_ft2 : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Lot Size In Ft2</td>
                                        <td>{{($propertyDetail[0]->lot_size_in_ft2) ? $propertyDetail[0]->lot_size_in_ft2 : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Rooms</td>
                                        <td>{{($propertyDetail[0]->rooms) ? $propertyDetail[0]->rooms : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Bedrooms</td>
                                        <td>{{($propertyDetail[0]->bedrooms) ? $propertyDetail[0]->bedrooms : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Bathrooms</td>
                                        <td>{{($propertyDetail[0]->bathrooms) ? $propertyDetail[0]->bathrooms : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Custom_id</td>
                                        <td>{{($propertyDetail[0]->custom_id) ? $propertyDetail[0]->custom_id : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Year Built</td>
                                        <td>{{($propertyDetail[0]->year_built) ? $propertyDetail[0]->year_built : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Garages</td>
                                        <td>{{($propertyDetail[0]->garages) ? $propertyDetail[0]->garages : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Available Form</td>
                                        <td>{{($propertyDetail[0]->available_from) ? $propertyDetail[0]->available_from : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Garage Size</td>
                                        <td>{{($propertyDetail[0]->garage_size) ? $propertyDetail[0]->garage_size : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property External Construction</td>
                                        <td>{{($propertyDetail[0]->external_construction) ? $propertyDetail[0]->external_construction : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Basement</td>
                                        <td>{{($propertyDetail[0]->basement) ? $propertyDetail[0]->basement : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Exterior Material</td>
                                        <td>{{($propertyDetail[0]->exterior_material) ? $propertyDetail[0]->exterior_material : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Roofing</td>
                                        <td>{{($propertyDetail[0]->roofing) ? $propertyDetail[0]->roofing : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Floors No.</td>
                                        <td>{{($propertyDetail[0]->floors_no) ? $propertyDetail[0]->floors_no : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Structure Type</td>
                                        <td>{{($propertyDetail[0]->structure_type) ? $propertyDetail[0]->structure_type : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Owner Agent Note</td>
                                        <td>{{($propertyDetail[0]->owner_agent_note) ? $propertyDetail[0]->owner_agent_note : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Property status</td>
                                        <td>{{($propertyDetail[0]->property_status) ? $propertyDetail[0]->property_status : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Amenities Feature</td>
                                        <td>{{($propertyDetail[0]->amenities_feature) ? $propertyDetail[0]->amenities_feature : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Video From</td>
                                        <td>{{($propertyDetail[0]->video_from) ? $propertyDetail[0]->video_from : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Embed Video Id</td>
                                        <td>{{($propertyDetail[0]->embed_video_id) ? $propertyDetail[0]->embed_video_id : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Virtual Tour</td>
                                        <td>{{($propertyDetail[0]->virtual_tour) ? $propertyDetail[0]->virtual_tour : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Subunits</td>
                                        <td>{{($propertyDetail[0]->subunits) ? $propertyDetail[0]->subunits : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>User Id</td>
                                        <td>{{($propertyDetail[0]->user_id) ? $propertyDetail[0]->user_id : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Type</td>
                                        <td>{{($propertyDetail[0]->property_type) ? $propertyDetail[0]->property_type : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Rejected Reason</td>
                                        <td>{{($propertyDetail[0]->reject_reason) ? $propertyDetail[0]->reject_reason : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Internal Status</td>
                                        <td>{{($propertyDetail[0]->internal_status) ? $propertyDetail[0]->internal_status : '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Source</td>
                                        <td>{{($propertyDetail[0]->source) ? $propertyDetail[0]->source : '-'}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

