@extends('frontend.layout.master')
@section('title')
    <title>Sale Search | tutunjirealty</title>
    <!-- begin social-media share icon style -->
    <style>
        input[type="range"]::-webkit-slider-runnable-track {
            background: #5E6068;
        }
        input[type="range"]::-webkit-slider-thumb {
            background-color: #323746;
        }
        input[type="range"]:focus::-webkit-slider-runnable-track {
            background: #5E6068;
        }
        .btn-icon{
            border:0;
            outline:0;
            height:40px;
            width:40px;
            border-radius:40px;
            background-color:#ccc;
            text-align: center;
            padding-top: 10px;
        }
        .expgroup{
            width:300px;
            height:40px;
            position:absolute;
            display:inline-block;
        }
        .icon{
            display:inline-block;
            position:relative;
            vertical-align:middle;
        }
        .material-icons{
            color:#ccc;
            /*font-size:32px;*/
        }
        .material-icons:hover{
            cursor:pointer;
            color:#a9a9a9;
        }
        .fa{
            color:#fff;
            /*font-size:26px;*/
        }
        .facebook:hover{
            background-color:#3b5998;
            cursor:pointer;
        }
        .linkedin:hover{
            background-color:#0077b5;
            cursor:pointer;
        }
        .twitter:hover{
            background-color: #3fc3ee;
            cursor: pointer;
        }
        .telegram:hover{
            background-color: #2f96b4;
            cursor: pointer;
        }
        .whatsapp:hover{
            background-color: #1ED65F;
            cursor: pointer;
        }
        /*.rotated{*/
        /*    -webkit-transform:rotate(45deg);*/
        /*    -moz-transform:rotate(45deg);*/
        /*    -ms-transform:rotate(45deg);*/
        /*    transform:rotate(45deg);*/
        /*}*/
        #swal2-title{
            font-size: 15px;
        }
        .navbar{
            position: relative;
        }
        /*#bg-img{*/
        /*    background-size: cover;*/
        /*}*/
        .desktop-modal-close {
        display: none;
        }
    </style>
    <!-- end social-media share icon style -->
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @include('frontend.include.navbar')
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
{{--                <nav aria-label="breadcrumb">--}}
{{--                    <ol class="breadcrumb pl-0">--}}
{{--                        <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-darkgrey fw-700">Home</a></li>--}}
{{--                        <li class="breadcrumb-item active fw-700" aria-current="page"> <a href="{{url('/')}}" style="color: #262222;text-decoration: none;">Go Back To Search Results</a></li>--}}
{{--                    </ol>--}}
{{--                </nav>--}}
            </div>
            <div class="col-lg-6 col-6 mt-40">
{{--                <h6 class="fs-16">Showing 1 - 20 of 561</h6>--}}
                <span>Properties in
                     @if(isset($params['filter_postal_code']) && $params['filter_postal_code'] != '')
                        {{($params['filter_postal_code']) ? $params['filter_postal_code'] : ''}}
                    @elseif(isset($browseCity))
                        {{isset($browseCity) ? $browseCity : ''}}
                    @else
                        {{$city ?? "Ontario, Canada"}}
                    @endif
                </span>
            </div>
            <div class="col-lg-3 col-6 mt-40">
                <ul class="list-unstyled list-inline text-right">
                    <li class="list-inline-item fs-16 fw-400">
                        Sort by
                    </li>
                    <li class="list-inline-item">
                        <select id="inputState" class="form-control br-4" style="border-radius: 30px;">
                            {{-- <option selected>Relevence</option> --}}
                            <option value="none" {{ (isset($params['sort_by']) && $params['sort_by'] == 'none') ? 'selected' : '' }}>Relevence</option>-->
                            <option value="newest" {{ (isset($params['sort_by']) && $params['sort_by'] == 'newest') ? 'selected' : '' }}>Newest</option>
                            <option value="oldest" {{ (isset($params['sort_by']) && $params['sort_by'] == 'oldest') ? 'selected' : '' }}>Oldest</option>
                            <option value="price_low_high" {{ (isset($params['sort_by']) && $params['sort_by'] == 'price_low_high') ? 'selected' : '' }}>Price Low To High</option>
                            <option value="price_high_low" {{ (isset($params['sort_by']) && $params['sort_by'] == 'price_high_low') ? 'selected' : '' }}>Price High To Low</option>
                            <option value="sqft_low_high" {{ (isset($params['sort_by']) && $params['sort_by'] == 'sqft_low_high') ? 'selected' : '' }}>Sqft Low To High</option>
                            <option value="sqft_high_low" {{ (isset($params['sort_by']) && $params['sort_by'] == 'sqft_high_low') ? 'selected' : '' }}>Sqft High To Low</option>
                            <option value="bedroom_low_high" {{ (isset($params['sort_by']) && $params['sort_by'] == 'bedroom_low_high') ? 'selected' : '' }}>Bedrooms Low To High</option>
                            <option value="bedroom_high_low" {{ (isset($params['sort_by']) && $params['sort_by'] == 'bedroom_high_low') ? 'selected' : '' }}>Bedrooms High To Low</option>
                            <option value="bathroom_low_high" {{ (isset($params['sort_by']) && $params['sort_by'] == 'bathroom_low_high') ? 'selected' : '' }}>Bathrooms Low To High</option>
                            <option value="bathroom_high_low" {{ (isset($params['sort_by']) && $params['sort_by'] == 'bathroom_high_low') ? 'selected' : '' }}>Bathrooms High To Low</option>
                            <option value="commercial_residential" {{ (isset($params['sort_by']) && $params['sort_by'] == 'commercial_residential') ? 'selected' : '' }}>Commercial To Residential</option>
                            <option value="residential_commercial" {{ (isset($params['sort_by']) && $params['sort_by'] == 'residential_commercial') ? 'selected' : '' }}>Residential To Commercial</option>
                        </select>
                    </li>
                </ul>

            </div>
        </div>
        <div class="row mt-20">
            <div class="col-lg-3 pr-0 pr-15">
                <div class="property-box" style="background-color: #F2F2F2;">
                    <div class="show-hide text-center">
                        <i class="fa fa-search" style="color: black"></i>
                    </div>

                    <form class="information" id="filter_box_form" method="get" action="{{url('/property-sale-search-filter')}}">
                        @csrf
                        <h6 class="fs-16">Filters</h6>
                        <div class="form-group mt-10">
                            <label for="exampleFormControlSelect1" class="fs-12">Property Type</label>
                            <select class="form-control br-30 fs-12 property_filter_data" id="filter_property_type" name="filter_property_type">
                                <option value="none">Select Type</option>
                                @foreach($allCategory as $categories)
                                    <option value="{{$categories->id}}" {{ (isset($params['filter_property_type']) && $params['filter_property_type'] == $categories->id) ? 'selected' : '' }}>{{$categories->name}}</option>
                                @endforeach
{{--                                <option value="residential" {{ (isset($params['filter_property_type']) && $params['filter_property_type'] == 'residential') ? 'selected' : '' }}>Residential</option>--}}
{{--                                <option value="commercial" {{ (isset($params['filter_property_type']) && $params['filter_property_type'] == 'commercial') ? 'selected' : '' }}>Commercial</option>--}}
{{--                                <option value="industrial" {{ (isset($params['filter_property_type']) && $params['filter_property_type'] == 'industrial') ? 'selected' : '' }}>Industrial</option>--}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="fs-12">Transaction Type</label>
                            <select class="form-control br-30 fs-12 property_filter_data" id="filter_transaction_type" name="filter_transaction_type">
                                <option value="none">Select Type</option>
                                @if(empty($getType))
                                    <option value="pre-construct" {{ (isset($params['filter_transaction_type']) && $params['filter_transaction_type'] == 'pre-construct') ? 'selected' : '' }}>Upcoming Pre-Construction Projects</option>
                                    <option value="sale" {{ (isset($params['filter_transaction_type']) && $params['filter_transaction_type'] == 'sale') ? 'selected' : '' }}>New Construction For Sale/Lease</option>
                                @else
                                    <option value="{{$getType}}" {{ (isset($getType) == 'pre-construct') ? 'selected' : '' }}>Upcoming Pre-Construction Projects</option>
                                    <option value="{{$getType}}" {{ (isset($getType) == 'sale') ? 'selected' : '' }}>New Construction For Sale/Lease</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="fs-12">Province, Postal Code, City or Address</label>
                            @if(empty($browseCity))
                                {{-- <input type="search" class="form-control br-30 fs-12 property_filter_input_data" placeholder="Enter Text Here" name="filter_postal_code" id="filter_postal_code" value="{{(isset($params['filter_postal_code'])) ? $params['filter_postal_code'] : 'Ontario, Canada'}}"> --}}
                                @php
                                    $city_name = '';
                                    if(isset($params['filter_postal_code'])){
                                        $city_name = $params['filter_postal_code'];
                                    }
                                @endphp
                                <input type="search" class="form-control br-30 fs-12 property_filter_input_data" placeholder="Enter Text Here" name="filter_postal_code" id="filter_postal_code" value="{{(isset($city)) ? $city_name : 'Ontario, Canada'}}">
                            @else
                                <input type="search" class="form-control br-30 fs-12 property_filter_input_data" placeholder="Enter Text Here" value="{{$browseCity}}" name="filter_postal_code" id="filter_postal_code">
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label class="fs-12">Price</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-6">
                                <div class="form-group">
                                    <input type="text" class="form-control br-30 fs-12 property_filter_input_data" placeholder="Min" id="filter_min" name="filter_min" value="{{(isset($params['filter_min'])) ? $params['filter_min'] : '0'}}">
                                    <label for="exampleFormControlSelect1" class="fs-12">Min</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="form-group">
                                    <input type="text" class="form-control br-30 fs-12 property_filter_input_data" placeholder="Max" id="filter_max" name="filter_max" value="{{(isset($params['filter_max'])) ? $params['filter_max'] : '20000000'}}">
                                    <label for="exampleFormControlSelect1" class="fs-12">Max</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {{-- <label for="exampleFormControlSelect1" class="fs-12">Price</label> --}}
                            <div class="range-slider" id="rangeSlider">
                                <input value="0" min="0" max="20000000" step="500" type="range" id="min_range" name="min_range" class="my-range property_filter_data">
                                <input value="20000000" min="0" max="20000000" step="500" type="range" id="max_range" name="max_range" class="property_filter_data">
                                <span class="rangeValues" style="color: #262222;"></span>
                            </div>
                        </div>
                        <div class="row mt-40">
                            <div class="col-lg-6 col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" class="fs-12">Bedrooms</label>
                                    <select class="form-control br-30 fs-12 property_filter_data" id="filter_bed" name="filter_bed">
                                        <option value="none" {{ (isset($params['filter_bed']) && $params['filter_bed'] == 'none') ? 'selected' : '' }}>Select Amount</option>
                                        <option value="1" {{ (isset($params['filter_bed']) && $params['filter_bed'] == '1') ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ (isset($params['filter_bed']) && $params['filter_bed'] == '2') ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ (isset($params['filter_bed']) && $params['filter_bed'] == '3') ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ (isset($params['filter_bed']) && $params['filter_bed'] == '4') ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ (isset($params['filter_bed']) && $params['filter_bed'] == '5') ? 'selected' : '' }}>5+</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" class="fs-12">Bathrooms</label>
                                    <select class="form-control br-30 fs-12 property_filter_data" id="filter_bath" name="filter_bath">
                                        <option value="none" {{ (isset($params['filter_bath']) && $params['filter_bath'] == 'none') ? 'selected' : '' }}>Select Amount</option>
                                        <option value="1" {{ (isset($params['filter_bath']) && $params['filter_bath'] == '1') ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ (isset($params['filter_bath']) && $params['filter_bath'] == '2') ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ (isset($params['filter_bath']) && $params['filter_bath'] == '3') ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ (isset($params['filter_bath']) && $params['filter_bath'] == '4') ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ (isset($params['filter_bath']) && $params['filter_bath'] == '5') ? 'selected' : '' }}>5+</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" class="fs-12">Size</label>
                                    <select class="form-control br-30 fs-12 property_filter_data" id="filter_size" name="filter_size">
                                        <option value="none" {{ (isset($params['filter_size']) && $params['filter_size'] == 'none') ? 'selected' : '' }}>Select size</option>
                                        <option value="0-2000" {{ (isset($params['filter_size']) && $params['filter_size'] == '0-2000') ? 'selected' : '' }}>0 – 2,000 SqFt</option>
                                        <option value="2001-3000" {{ (isset($params['filter_size']) && $params['filter_size'] == '2001-3000') ? 'selected' : '' }}>2,001 - 3,000 SqFt</option>
                                        <option value="3001-4000" {{ (isset($params['filter_size']) && $params['filter_size'] == '3001-4000') ? 'selected' : '' }}>3,001 - 4,000 SqFt</option>
                                        <option value="4001-5000" {{ (isset($params['filter_size']) && $params['filter_size'] == '4001-5000') ? 'selected' : '' }}>4,001 - 5,000 SqFt</option>
                                        <option value="5001-7000" {{ (isset($params['filter_size']) && $params['filter_size'] == '5001-7000') ? 'selected' : '' }}>5001 - 7,000 SqFt</option>
                                        <option value="7001-10000" {{ (isset($params['filter_size']) && $params['filter_size'] == '7001-10000') ? 'selected' : '' }}>7,001 - 10,000 SqFt</option>
                                        <option value="10000" {{ (isset($params['filter_size']) && $params['filter_size'] == '10000') ? 'selected' : '' }}>10,000+</option>
{{--                                        <option value="none" {{ (isset($params['filter_size']) && $params['filter_size'] == 'none') ? 'selected' : '' }}>none</option>--}}
{{--                                        <option value="0 – 2,000 SqFt" {{ (isset($params['filter_size']) && $params['filter_size'] == '0 – 2,000 SqFt') ? 'selected' : '' }}>0 – 2,000 SqFt</option>--}}
{{--                                        <option value="2,001 – 3,000 SqFt" {{ (isset($params['filter_size']) && $params['filter_size'] == '2,001 – 3,000 SqFt') ? 'selected' : '' }}>2,001 – 3,000 SqFt</option>--}}
{{--                                        <option value="3,001 – 4,000 SqFt" {{ (isset($params['filter_size']) && $params['filter_size'] == '3,001 – 4,000 SqFt') ? 'selected' : '' }}>3,001 – 4,000 SqFt</option>--}}
{{--                                        <option value="4,001 – 5,000 SqFt" {{ (isset($params['filter_size']) && $params['filter_size'] == '4,001 – 5,000 SqFt') ? 'selected' : '' }}>4,001 – 5,000 SqFt</option>--}}
{{--                                        <option value="5,001 – 7,000 SqFt" {{ (isset($params['filter_size']) && $params['filter_size'] == '5,001 – 7,000 SqFt') ? 'selected' : '' }}>5,001 – 7,000 SqFt</option>--}}
{{--                                        <option value="7,001 – 10,000 SqFt" {{ (isset($params['filter_size']) && $params['filter_size'] == '7,001 – 10,000 SqFt') ? 'selected' : '' }}>7,001 – 10,000 SqFt</option>--}}
{{--                                        <option value="10,000+" {{ (isset($params['filter_size']) && $params['filter_size'] == '10,000+') ? 'selected' : '' }}>10,000+</option>--}}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row d-none">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="sort_by" class="fs-12">Sort By</label>
                                    <select name="sort_by" id="sort_by" class="form-control br-30 fs-12">
                                        <option value="none" {{ (isset($params['sort_by']) && $params['sort_by'] == 'none') ? 'selected' : '' }}>None</option>
                                        <option value="newest" {{ (isset($params['sort_by']) && $params['sort_by'] == 'newest') ? 'selected' : '' }}>Newest</option>
                                        <option value="oldest" {{ (isset($params['sort_by']) && $params['sort_by'] == 'oldest') ? 'selected' : '' }}>Oldest</option>
                                        <option value="price_low_high" {{ (isset($params['sort_by']) && $params['sort_by'] == 'price_low_high') ? 'selected' : '' }}>Price Low To High</option>
                                        <option value="price_high_low" {{ (isset($params['sort_by']) && $params['sort_by'] == 'price_high_low') ? 'selected' : '' }}>Price High To Low</option>
                                        <option value="sqft_low_high" {{ (isset($params['sort_by']) && $params['sort_by'] == 'sqft_low_high') ? 'selected' : '' }}>Sqft Low To High</option>
                                        <option value="sqft_high_low" {{ (isset($params['sort_by']) && $params['sort_by'] == 'sqft_high_low') ? 'selected' : '' }}>Sqft High To Low</option>
                                        <option value="bedroom_low_high" {{ (isset($params['sort_by']) && $params['sort_by'] == 'bedroom_low_high') ? 'selected' : '' }}>Bedrooms Low To High</option>
                                        <option value="bedroom_high_low" {{ (isset($params['sort_by']) && $params['sort_by'] == 'bedroom_high_low') ? 'selected' : '' }}>Bedrooms High To Low</option>
                                        <option value="bathroom_low_high" {{ (isset($params['sort_by']) && $params['sort_by'] == 'bathroom_low_high') ? 'selected' : '' }}>Bathrooms Low To High</option>
                                        <option value="bathroom_high_low" {{ (isset($params['sort_by']) && $params['sort_by'] == 'bathroom_high_low') ? 'selected' : '' }}>Bathrooms High To Low</option>
                                        <option value="commercial_residential" {{ (isset($params['sort_by']) && $params['sort_by'] == 'commercial_residential') ? 'selected' : '' }}>Commercial To Residential</option>
                                        <option value="residential_commercial" {{ (isset($params['sort_by']) && $params['sort_by'] == 'residential_commercial') ? 'selected' : '' }}>Residential To Commercial</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-left: auto;margin-right: auto;">Filter Results</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-9 mt-41">
                <div class="row">
                    <div class="col-lg-12">
                        @if($count == 0)
                            <p>No Properties found with these filters.</p>
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'No Properties Found With These Filters. Please Change Your Inputs!',
                                    // footer: '<a href="">Why do I have this issue?</a>'
                                })
                            </script>

                        @else
{{--                        @if(empty($allSaleData))--}}
{{--                            Whoops! No Records Found--}}
{{--                        @else--}}
                            @foreach($allSaleData as $allData)
                                <input type="hidden" name="agent_id" value="{{$allData['id']}}">
                            <div class="appartment-box mb-3">
                                <div class="row">
                                    <div class="col-lg-5 mobile-listing-image" id="bg-img"
                                         @if(!empty($allData['property_media']))
                                            @if($allData['source'] == 'Frontend')
                                                style="background: url('{{asset('frontend/assets/property-images/media-file/'.$allData['property_media']['media_name'])}}');background-clip: content-box;background-size: cover;"
                                            @else
                                                style="background: url('{{asset('admin-panel/assets/property-images/media-file/sale/'.$allData['property_media']['media_name'])}}');background-clip: content-box;background-size: cover;"
                                            @endif
                                        @else
                                            style="background: url('{{asset('default/404-not-found.jpg')}}');background-clip: content-box;background-size: cover;"
                                        @endif
                                    >
                                    <a href="{{url('/sale-property',$allData['id'])}}" style="text-decoration: none;color: #262222;position: absolute;width: 100%;height:100%;left:0;top:0;"></a>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="p-20">
                                            <a href="{{url('/sale-property',$allData['id'])}}" style="text-decoration: none;color: #262222;">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    
                                                        <h4 class="fs-22 fw-700 mt-20">
                                                            @if($allData['before_price_label'] != null && $allData['after_price_label'] != null)
                                                               {{$allData['before_price_label']}}
                                                            @endif
                                                            ${{$allData['price'] ? $allData['price'] : '-'}}
                                                                @if($allData['after_price_label'] != null && $allData['before_price_label'] != null)
                                                            {{$allData['after_price_label']}}
                                                                @endif
                                                        </h4>
                                                    
                                                </div>
                                            </div>
                                            <div class="row">
<!-- {{--                                                <div class="col-md-12">--}}
{{--                                                    <span class="fs-12 text-grey">by {{$allData['agent_details'] ? $allData['agent_details']['fullName'] : '-'}}</span>--}}
{{--                                                </div>--}} -->
                                                <div class="col-md-12">
                                                    <p style="font-size: 14px;margin-bottom: 0;"><i class="fa fa-map-marker-alt mr-1" style="color: #262222"></i>&nbsp;{{$allData['address'] ? $allData['address'] : '-'}}
                                                    </p>
                                                    <p style="font-size: 14px;margin-bottom: 0;padding-left: 3%;">{{$allData['city'] ? $allData['city'] : '-'}}, {{$allData['country_state'] ? $allData['country_state'] : '-'}} {{$allData['zip'] ? $allData['zip'] : '-'}}</p>
                                                </div>
                                            </div>
                                            <div class="blue-bar mt-20" style="text-align: center;">
                                                <div class="row">
                                                    <div class="col-lg-4 col-4">
                                                        <h6 class="fs-14 mb-0">&nbsp;{{$allData['size_in_ft2'] ? $allData['size_in_ft2'] : '-'}}</h6>
                                                        <span class="fs-12 text-grey">Size in sq ft</span>
                                                    </div>
                                                    <div class="col-lg-4 col-4">
                                                        <h6 class="fs-14 mb-0">{{$allData['bedrooms'] ? $allData['bedrooms'] : '-'}} <i class="fa fa-bed" style="color: currentColor;"></i></h6>
                                                        <span class="fs-12 text-grey">Bedrooms</span>
                                                    </div>
                                                    <div class="col-lg-4 col-4">
                                                        <h6 class="fs-14 mb-0">{{$allData['bathrooms'] ? $allData['bathrooms'] : '-'}} <i class="fa fa-bath" style="color: currentColor;"></i></h6>
                                                        <span class="fs-12 text-grey">Bathrooms</span>
                                                    </div>
{{--                                                    <div class="col-lg-3 col-3">--}}
{{--                                                        <h6 class="fs-14 mb-0">{{date('Y-m-d',strtotime($allData['created_at'])) ? date('Y-m-d',strtotime($allData['created_at'])) : '-'}}</h6>--}}
{{--                                                        <span class="fs-12 text-grey">Posted on</span>--}}
{{--                                                    </div>--}}
                                                </div>
                                            </div>
                                            <div class="row mt-20">
                                                <div class="col-lg-8">
                                                    <ul class="list-unstyled list-inline d-flex text-grey">
                                                        <li class="list-inline-item"><i class="fa fa-tag text-grey"></i></li>
                                                        <li class="list-inline-item">{{$allData['cat_details'] ? $allData['cat_details']['name'] : '-'}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            </a>
<!-- {{--                                            <div class="row">--}}
{{--                                                <div class="col-lg-12">--}}
{{--                                                    <ul class="list-unstyled list-inline">--}}
{{--                                                        <li class="list-inline-item"><i class="far fa-calendar-minus"></i></li>--}}
{{--                                                        <li class="list-inline-item">Posted on {{date('Y-m-d', strtotime($allData['created_at']))}}</li>--}}
{{--                                                        <input type="hidden" name="property_id" value="{{$allData['id']}}">--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                            </div>--}} -->
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    {{--                                                @if(!Auth::check())--}}
                                                    @if(Auth::check())
                                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                    @endif
                                                    <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;" data-toggle="modal" data-target="#myModal">Contact Listing Agent</button>                                                    {{--                                                @endif--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                                <div class="row mt-70">
                                    <div class="col-lg-12">
                                       {{--- @php($u_sale = url('sale-search'))
                                            @if(isset($_GET['query']))
                                                {{$allSaleData->onEachSide(0)->links('frontend.pages.pagination.sale-search-pagination')}}
                                            @elseif(isset($_GET['filter_property_type']))
                                                {{$allSaleData->onEachSide(0)->links('frontend.pages.pagination.sale-filter-pagination')}}
                                        @elseif(isset($_GET['property_type']))
                                            @php($url = url('/search-city'))
                                            {{$allSaleData->onEachSide(0)->links('frontend.pages.pagination.sale-search-city-pagination')}}
                                            @else
                                                {{$allSaleData->onEachSide(0)->links('frontend.pages.pagination.sale-property-pagination')}}
                                           @endif


                                           <?php
                                                // Assuming the current page is in a variable called $currentPage
                                                $currentPage = $allSaleData->currentPage();

                                                // Define the number of links to show before and after the current page
                                                $linksBefore = 1;
                                                $linksAfter = 1;

                                                // Calculate the start and end page numbers to display
                                                $startPage = max($currentPage - $linksBefore, 1);
                                                $endPage = min($currentPage + $linksAfter, $allSaleData->lastPage());

                                                // Manually create a custom paginator instance with limited links
                                                $paginator = new Illuminate\Pagination\LengthAwarePaginator([], $allSaleData->total(), $allSaleData->perPage(), $currentPage);
                                                $paginator->withPath(Route::currentRouteName());

                                                // Manually set the page range for the paginator
                                                $paginator->setPageName('page');
                                                $paginator->getUrlRange($startPage, $endPage);
                                                $paginator->appends(request()->query());
                                            ?>

                                           {{ $paginator->links('frontend.pages.pagination.pre-construct-pagination') }}
                                    --}}

                                    {{ $allSaleData->links('frontend.pagination.modern') }}
                                    </div>
                                </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="bg-grey mt-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <h1 class="fs-40 text-center bb-2 fw-700" style="border-bottom: 2px dashed #000000;color: #000000; padding-bottom: 10px;">Contact Us</h1>
                </div>
            </div>
            <div class="row mt-40">
                <div class="col-lg-8 offset-lg-2">
                    <p class="fs-16 fw-700 text-center">Contact Our Team Now to Make Your Real Estate Dreams a Reality!</p>
                </div>
            </div>
            <div class="bg-white mt-40">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="text-center fs-30 fw-700">Send Us a Message</h1>
                        <div id="res"></div>
                    </div>
                </div>
                <!-- contact form begin -->
                <form id="contact-form">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Your Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Robison Croso" value="{{old('name')}}">
                            </div>
                            <div class="form-group">
                                <label>Your Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="+416 123 4567" value="{{old('phone')}}">
                            </div>
                            <div class="form-group">
                                <label>Your Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="example@box.com" value="{{old('email')}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Service You Are Looking For</label>
                                {{--                            <input type="text" class="form-control" id="subject" name="subject" placeholder="write your service here" value="{{old('subject')}}">--}}
                                <select class="form-control" id="subject" name="subject">
                                    <option value="">Select Service You Are Looking For</option>
                                    <option value="pre-construction">Upcoming Pre-Construction Projects</option>
                                    <option value="mortgage">Mortgage</option>
                                    <option value="selling">Selling</option>
                                    <option value="buying">Buying</option>
                                    <option value="leasing">Leasing</option>
                                    <option value="investing">Investing</option>
                                    <option value="advice">Advice</option>
                                    <option value="general inquiry">General Inquiry</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="6">{{old('message')}}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary" id="contact_btn">Send Now</button>
                        </div>
                    </div>
                </form>
                <!-- contact form end -->
            </div>
        </div>    </div>

    @include('frontend.include.news-letter-1')
    <!-- contact-listing-agent -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                {{--                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>--}}
                <div class="contact-agent-box">
                    <button type="button" class="close close-popup desktop-modal-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="agent-topbox">
                        <h6 class="fs-16">Contact Listing Agent</h6>
                        <p class="fs-12">Get In Touch With The Listing Agent For More Information About This Property - Contact Us Below Today!</p>
                    </div>
                    <div class="modal-body">
                        <form id="form2">
                            <!-- sign-up-empty-field-error-message -->
                            <div id="signUpErrorMessage" style="color:red;"></div>
                            <!-- sign-up-success-message -->
                            <div id="signUpSuccessMessage" class="text-success"></div>
                            <div class="form-group mt-10">
                                <label for="exampleFormControlSelect1" class="fs-14">Agent’s Name:</label>
                                <input class="form-control br-30 fs-14" id="agent_fullName" name="agent_fullName" value="{{isset($allSaleData[0]['agent_details']['fullName']) ? ($allSaleData[0]['agent_details']['fullName']) : null}}" placeholder="Type your Full name" disabled>
                                <!-- validation error message -->
                                @error('agent_fullName')
                                <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group mt-10">
                                <label for="exampleFormControlSelect1" class="fs-14">Agent’s Phone Number:</label>
                                <input class="form-control br-30 fs-14" id="agent_phone" name="agent_phone" value="{{isset($allSaleData[0]['agent_details']['phone']) ? ($allSaleData[0]['agent_details']['phone']) : null}}" placeholder="Type your Phone Number" disabled>
                                <!-- validation error message -->
                                @error('agent_phone')
                                <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group mt-10">
                                <label for="exampleFormControlSelect1" class="fs-14">Agent’s Email:</label>
                                <input class="form-control br-30 fs-14" id="agent_email" name="agent_email" value="{{isset($allSaleData[0]['agent_details']['email']) ? ($allSaleData[0]['agent_details']['email']) : null}}" placeholder="Type your Email" disabled>
                                <!-- validation error message -->
                                @error('agent_email')
                                <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="agent-footer">
                                <div class="row">
                                    <div class="col-lg-6" style="margin-top: 5px;">
                                        {{--<a class="btn btn-info agent_info" style="font-size: 14px; padding: 10px 20px !important;">Email Now</a>--}}
                                        {{--https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=radha.tinnypixel@gmail.com&body=Hi--}}
                                        <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=radha.tinnypixel@gmail.com&body=name:{{isset($allSaleData[0]['agent_details']['fullName']) ? ($allSaleData[0]['agent_details']['fullName']) : null}},Phone:{{isset($allSaleData[0]['agent_details']['phone']) ? ($allSaleData[0]['agent_details']['phone']) : null}},Email:{{isset($allSaleData[0]['agent_details']['email']) ? ($allSaleData[0]['agent_details']['email']) : null}}" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Email now</a>
                                    </div>
                                    <div class="col-lg-6" style="margin-top: 5px;">
                                        {{--tel:123-456-7890--}}
                                        <a href="tel:+123-456-780" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Call now</a>
{{--                                        <a href="tel:123-456-7890">CLICK TO CALL</a>--}}
                                    </div>
                                </div>
{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-12"><button type="button" class="btn btn-info" id="agent_btn" style="font-size: 14px; padding: 10px 20px !important;">Register Now</button></div>--}}
{{--                                </div>--}}
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer desktop-modal-footer">
                   <button type="button" class="btn btn-danger btn-close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

@section('pre-construct-search-css')
    <script src="{{asset('')}}frontend/assets/js/owl.carousel.js"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 5,
            nav: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
    </script>
@endsection
<!-- subscribe fornewsletter -->
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
<!-- begin social-share-icon-script -->
<script>
    $(document).ready(function(){
        //$(".expgroup").hide();
        $(".add").click(function(){
            $("#share_button_"+$(this).attr('data-id')).animate({width:'toggle'}, function(){
                $(".add").toggleClass('rotated')
            });
        });
    });
</script>
<!-- end social-share-icon-script -->
<!-- agent-inquiry-popup-form script start here -->
{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        //Register Function--}}
{{--        // $('.form2').validate();--}}
{{--        $('.agent_btn').click(function () {--}}
{{--            //$("#signUpErrorMessage").empty();--}}

{{--            let full_name = $('#agent_fullName').val();--}}
{{--            let phone_number = $('#agent_phone').val();--}}
{{--            let email_address = $('#agent_email').val();--}}
{{--            let which_button = $(this).attr('data-button');--}}

{{--            if(full_name != "" && phone_number != "" && email_address != "") {--}}

{{--                $.ajax({--}}
{{--                    type    : 'post',--}}
{{--                    url     : '{{ url("/save-agent-inquiry") }}',--}}
{{--                    data    : {--}}
{{--                        _token          : '{{ @csrf_token() }}',--}}
{{--                        agent_fullName  : full_name,--}}
{{--                        agent_phone     : phone_number,--}}
{{--                        agent_email     : email_address--}}
{{--                    },--}}
{{--                    success : function(response){--}}
{{--                        console.log(response);--}}
{{--                        if(response.success === 1) {--}}
{{--                            if(which_button === 'email_button') {--}}
{{--                                let message = 'first name = '+full_name+' agent phone = '+phone_number+' agent email = '+email_address;--}}
{{--                                window.location.href='https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=radha.tinnypixel@gmail.com&body='+message;--}}
{{--                            } else {--}}
{{--                                window.location.href='tel:123-456-7890';--}}
{{--                            }--}}
{{--                        } else {--}}
{{--                            alert(response.message);--}}
{{--                        }--}}
{{--                    },--}}
{{--                    error  : function (response) {--}}
{{--                        alert(response.statusText);--}}
{{--                    }--}}
{{--                });--}}

{{--            } else {--}}
{{--                $("#signUpErrorMessage").append("Please fill required fields!");--}}
{{--            }--}}
{{--        });--}}



{{--        $('.agent_btn_old').click(function () {--}}
{{--            //alert('Register button clicked');--}}
{{--            $("#signUpErrorMessage").empty();--}}
{{--            //get text-field values by id--}}
{{--            var full_name = $('#agent_fullName').val();--}}
{{--            var phone_number = $('#agent_phone').val();--}}
{{--            var email_address = $('#agent_email').val();--}}
{{--            //alert(full_name + " " + phone_number + " " + email_address);--}}
{{--            let which_button = $(this).attr('data-button');--}}
{{--            //console.log(which_button);--}}
{{--            if(full_name != "" && phone_number != "" && email_address != "") {--}}
{{--                /*$.ajaxSetup({--}}
{{--                    headers: {--}}
{{--                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                    }--}}
{{--                });*/--}}
{{--                //if email button or contact button clicked first ask for validation--}}
{{--                // if(which_button === 'email_button') {--}}
{{--                //     alert('data validated!');--}}
{{--                //     let message = 'first name = '+full_name+' agent phone = '+phone_number+' agent email = '+email_address;--}}
{{--                //     window.location.href='https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=radha.tinnypixel@gmail.com&body='+message;--}}
{{--                // } else {--}}
{{--                //     window.location.href='tel:123-456-7890';--}}
{{--                // }--}}

{{--                $.ajax({--}}
{{--                    type    : 'post',--}}
{{--                    url     : '{{ url("/save-agent-popup") }}',--}}
{{--                    data    : {--}}
{{--                        _token          : '{{ @csrf_token() }}',--}}
{{--                        agent_fullName  : full_name,--}}
{{--                        agent_phone     : phone_number,--}}
{{--                        agent_email     : email_address--}}
{{--                    },--}}
{{--                    success : function(return_res){--}}
{{--                        console.log(return_res);--}}
{{--                        //var newRes = JSON.parse(JSON.stringify(return_res));--}}
{{--                        //if(which_button === 'email_button') {--}}
{{--                        // alert(newRes);--}}
{{--                        // if(newRes.success == "1"){--}}
{{--                        //     alert('agebt saved');--}}
{{--                        // }else{--}}
{{--                        //     alert('agent not saved');--}}
{{--                        // }--}}
{{--                        // let message = 'first name = '+full_name+' agent phone = '+phone_number+' agent email = '+email_address;--}}
{{--                        // window.location.href='https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=radha.tinnypixel@gmail.com&body='+message;--}}
{{--                        /*} else {--}}
{{--                            window.location.href='tel:123-456-7890';--}}
{{--                        }*/--}}
{{--                        // if(newRes.success == "1"){--}}
{{--                        //     //success-message--}}
{{--                        //     // //console.log(which_button)--}}
{{--                        //     // if(which_button === 'email_button') {--}}
{{--                        //     //     let message = 'first name = '+full_name+' agent phone = '+phone_number+' agent email = '+email_address;--}}
{{--                        //     //     //window.location.href='https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=radha.tinnypixel@gmail.com&body='+message;--}}
{{--                        //     //     let url = 'https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=radha.tinnypixel@gmail.com&body='+message;--}}
{{--                        //     //     window.open(url, '_blank');--}}
{{--                        //     // } else {--}}
{{--                        //     //--}}
{{--                        //     // }--}}
{{--                        //--}}
{{--                        //--}}
{{--                        //     $("#signUpSuccessMessage").empty().append(newRes.message);--}}
{{--                        //     setTimeout(function() {--}}
{{--                        //         $('#myModal').modal('hide');    //hide modal after successfully submit data--}}
{{--                        //         $('#signUpSuccessMessage').hide(); //hide success message after successfully submit data--}}
{{--                        //         $('#form2').trigger('reset') // reset form after successfully submit data after close modal--}}
{{--                        //     }, 4000);--}}
{{--                        // }else{--}}
{{--                        //     $("#signUpErrorMessage").append(newRes.message);--}}
{{--                        // }--}}
{{--                        //var newRes = JSON.parse(JSON.stringify(return_res));--}}
{{--                    }--}}
{{--                });--}}
{{--            }else{--}}
{{--                $("#signUpErrorMessage").append("Please fill required fields!");--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
<!-- agent-inquiry-popup-form script end here -->
<!-- contact-form -->
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#contact-form').submit(function (e) {
            e.preventDefault();
            let name = $('#name').val();
            let email = $('#email').val();
            let phone = $('#phone').val();
            let subject = $('#subject').val();
            let message = $('#message').val();

            $.ajax({
                url: "{{url('/save-contact-form')}}",
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    name: name,
                    email: email,
                    phone: phone,
                    subject: subject,
                    message: message
                }, success: function (response) {
                    if (response.code == 400) {
                        $('#contact_btn').attr('disabled', false);
                        let error = '<div class="text-danger">' + response.msg + '</div>';
                        $("#res").html(error);
                    } else if (response.code == 200) {
                        console.log(response.msg)
                        let success = '<div class="text-success">' + response.msg + '</div>';
                        $("#res").html(success);
                    }
                }
            });
        });
    });
</script>
<script>
    $("#filter_min").on('input', function () {
        let dollarIndianLocale = Intl.NumberFormat('en-US');
        let value = $(this).val();
        let min_val = 0;

        if(value === '') {
            $("#min_range").val(0);
            $("#filter_min").val(0)
        } else {
            $("#min_range").val(value);
            min_val = value;
        }

        $(".rangeValues").empty().append("$" +  dollarIndianLocale.format(min_val) + " - $" +  dollarIndianLocale.format($("#max_range").val()));
    });

    $("#filter_max").on('input', function () {
        let dollarIndianLocale = Intl.NumberFormat('en-US');
        let value = $(this).val();
        let max_val = 20000000;

        if(value === '') {
            $("#max_range").val(20000000);
            $("#filter_max").val(0);
        } else {
            $("#max_range").val(value);
            max_val = value;
        }

        $(".rangeValues").empty().append("$" +  dollarIndianLocale.format($("#min_range").val()) + " - $" + dollarIndianLocale.format(max_val));
    });
    $("#min_range").on('change', function () {
        $("#filter_min").val($(this).val());
    });

    $("#max_range").on('change', function () {
        $("#filter_max").val($(this).val());
    });
</script>
<!-- begin filter mobile view js -->
<script>
    $(document).ready(function() {
        $('.show-hide').click(function() {
            $(this).next().toggleClass('toggle');
        });
    });
</script>
<!-- end filter mobile view js -->
    <!-- navigation one page menu link -->
    <script>
        // var currentPageUrl = $(location).attr('href');
        // console.log(currentPageUrl);
        $(document).ready(function (){
            //about us
            $('.about_us').click(function () {
                location.href = "{{url('/#about')}}";
            });
            //featured in
            $('.featured_in').click(function () {
                location.href = "{{url('/#featured_in')}}";
            });
            //our team
            $('.our_team').click(function () {
                location.href = "{{url('/#our-team')}}";
            });
            //blogs
            $('.blogs').click(function () {
                location.href = "{{url('/#blogs')}}";
            });
            //newsletter
            $('.newsletter').click(function () {
                location.href = "{{url('/#newsletter')}}";
            });

            $('#inputState').on('change', function () {

               const value = $(this).val();
               $('#sort_by option[value="'+value+'"]').attr('selected', 'selected');
               $('#sort_by').trigger('changed');
               $('.information button[type="submit"]').trigger('click');
            });
        });
    </script>
@endsection
