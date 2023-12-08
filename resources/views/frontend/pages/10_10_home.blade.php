@extends('frontend.layout.master')
<!-- title -->
@section('title')
    <title>Tuntunji Realty | Home</title>
    <!-- image-display-for for-sale & new-pre-construct-property -->
    <style>
        /*.bb-2 ::before{*/
        /*    content: '';*/
        /*    position: absolute;*/
        /*    bottom: 0;*/
        /*    !*left: 0;*!*/
        /*    border-bottom: 2px dashed;*/
        /*    width: 20%;*/
        /*}*/
        .img-fluid1{
            height: 100%;
            width: 100%;
        }
        .navbar{
            position: initial;
        }
        .content_section{
            width: 50%;
            display: block;
            float: left;
            padding-left: 5%;
        }
        .img_section{
            width: 49%;
            display: block;
            float: left;
        }
        .marker_img{
            width: 100%;
        }
        .gm-style .gm-style-iw-a{
            width: 315px;
        }
        .gm-style .gm-style-iw-d{
            height: 150px;
        }
        .blog-style{
            height: auto;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        /*--- BEGIN MAP SIDEBAR ---*/
        #overlay {
            position:absolute;
            width:30%;
            height:100%;
            overflow: scroll;
            /*overflow-x: hidden;*/
            top:0;
            background-color:rgba(255, 255, 255, 0.8);
        }
        @media (min-width: 300px) and (max-width: 922px) {
            #overlay {
                width:50%;
            }
        }
        /*--- END MAP SIDEBAR ---*/
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @include('frontend.include.navbar')
            </div>
        </div>
        <div class="row mt-40">
            <div class="col-lg-3 pr-0 pr-15">
                <div class="property-box">
                    <div class="show-hide text-center">
                        <i class="fa fa-search" style="color: white"></i>
                    </div>

                    <form class="information" id="filter_property_form">
                        <!-- mob view-->
                        {{--<div class="row dn-2">
                            <div class="col-lg-6 col-6">
                                <div class="form-group">
                                    <label for="property_status" class="text-white fs-12">Property Status</label>
                                    <select class="form-control br-30 fs-12" id="property_status" name="property_status">
                                        <option selected>none</option>
                                        <option value="normal">Normal</option>
                                        <option value="open house">Open House</option>
                                        <option value="sold">Sold</option>
                                        <option value="new offer">New Offer</option>
                                        <option value="hot offer">Hot Offer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="form-group">
                                    <label for="property_type" class="text-white fs-12">Property Type</label>
                                    <select class="form-control br-30 fs-12" id="property_type" name="property_type">
                                        <option selected>none</option>
                                        <option value="pre-construct">Pre-Construction</option>
                                        <option value="sale">For Sale</option>
                                    </select>
                                </div>
                            </div>
                        </div>--}}

                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="text-white fs-12">Property Type</label>
                            <select class="form-control br-30 fs-12 property_filter_data" id="filter_property_type" name="filter_property_type">
                                <option>Select Category</option>
                                @foreach($allCat as $categories)
                                <option value="{{$categories->id}}">{{$categories->name}}</option>
                                @endforeach
{{--                                <option value="2">Residential</option>--}}
{{--                                <option value="3">Industrial</option>--}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="property_type" class="text-white fs-12">Transaction Type</label>
                            <select class="form-control br-30 fs-12 property_filter_data" id="filter_transaction_type" name="filter_transaction_type">
                                <option selected>none</option>
                                <option value="pre-construct">Pre-Construction</option>
                                <option value="sale">For Sale</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="text-white fs-12">Postal Code, City or Street
                                Name</label>
                            <input type="search" class="form-control br-30 fs-12 property_filter_input_data" placeholder="none" id="filter_postal_city_street" name="filter_postal_city_street">
                            <div id="res"></div>
                        </div>
                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="exampleFormControlSelect1" class="text-white fs-12">Min</label>--}}
                        {{--                            <input type="text" class="form-control br-30 fs-12 property_filter_input_data" placeholder="Min" value="0" id="filter_min" name="filter_min">--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="exampleFormControlSelect1" class="text-white fs-12">Max</label>--}}
                        {{--                            <input type="text" class="form-control br-30 fs-12 property_filter_input_data" placeholder="Max" value="20000000" id="filter_max" name="filter_max">--}}
                        {{--                        </div>--}}
                        <div class="row">
                            <div class="col-lg-6 col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" class="text-white fs-12">Min</label>
                                    <input type="text" class="form-control br-30 fs-12 property_filter_input_data" placeholder="Min" value="0" id="filter_min" name="filter_min">
                                </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" class="text-white fs-12">Max</label>
                                    <input type="text" class="form-control br-30 fs-12 property_filter_input_data" placeholder="Max" value="20000000" id="filter_max" name="filter_max">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="text-white fs-12">Price</label>
                            <div class="range-slider" id="rangeSlider">
                                <input value="0" min="0" max="20000000" step="500" type="range" id="min_range" class="property_filter_data">
                                <input value="20000000" min="0" max="20000000" step="500" type="range" id="max_range" class="property_filter_data">
                                <span class="rangeValues"></span>
                            </div>
                        </div>
                        <div class="row mt-40">
                            <div class="col-lg-6 col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" class="text-white fs-12">Bedrooms</label>
                                    <select class="form-control br-30 fs-12 property_filter_data" id="filter_bed" name="filter_bed">
                                        <option selected>none</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5+">5+</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" class="text-white fs-12">Bathrooms</label>
                                    <select class="form-control br-30 fs-12 property_filter_data" id="filter_bath" name="filter_bath">
                                        <option selected>none</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5+">5+</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" class="text-white fs-12">Size</label>
                                    <select class="form-control br-30 fs-12 property_filter_data" id="filter_size" name="filter_size">
                                        <option selected>none</option>
                                        <option value="0 - 2,000 SqFt">0 – 2,000 SqFt</option>
                                        <option value="2,001 - 3,000 SqFt">2,001 - 3,000 SqFt</option>
                                        <option value="3,001 - 4,000 SqFt">3,001 - 4,000 SqFt</option>
                                        <option value="4,001 - 5,000 SqFt">4,001 - 5,000 SqFt</option>
                                        <option value="5001 - 7,000 SqFt">5001 - 7,000 SqFt</option>
                                        <option value="7,001 - 10,000 SqFt">7,001 - 10,000 SqFt</option>
                                        <option value="10,000+">10,000+</option>
                                    </select>
                                </div>
                            </div>
                            {{--                            <div class="col-lg-6 col-6">--}}
                            {{--                                <div class="form-group">--}}
                            {{--                                    <label for="exampleFormControlSelect1" class="text-white fs-12">Property Status</label>--}}
                            {{--                                    <select class="form-control br-30 fs-12" id="exampleFormControlSelect1">--}}
                            {{--                                        <option selected>none</option>--}}
                            {{--                                        <option>Any</option>--}}
                            {{--                                        <option>2</option>--}}
                            {{--                                        <option>3</option>--}}
                            {{--                                        <option>4</option>--}}
                            {{--                                        <option>5</option>--}}
                            {{--                                    </select>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                        <p id="error_message_filter" style="color: red; margin-bottom: 5px; text-align: center; font-size: 12px;"></p>
                        <div class="row">
                            <div class="col-md-12" style="margin-bottom: -20px;">
                                <button type="button" class="btn btn-primary filter_btn" style="margin-left: auto;margin-right: auto;">Filter</button>
                            </div>
                        </div>
                        <!-- end of mob view-->
                    </form>

                </div>
            </div>
            <div class="col-lg-9 mt-41">
                <div id="map" style="height: 642px;" class="my_map"></div>
                <div id="overlay" style="display: none">
                    <div id="property_show_section"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-dark mt-40" id="about">
        <div class="container">
            <div class="row">
{{--                <div class="col-lg-12">--}}
{{--                    <h1 class="fs-40 fw-700 text-center">About Us</h1>--}}
{{--                </div>--}}
                <div class="col-lg-6 offset-lg-3">
                    <h1 class="fs-40 text-center text-white bb-2"><span class="fw-700">About Us</span></h1>
                </div>
            </div>
            <div class="row mt-40">
                <div class="col-lg-5 center">
                    <h2 class="fs-34 fw-700">Heading</h2>
                    <p class="fs-20 fw-700">Sub Heading - Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                        do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                </div>
                <div class="col-lg-7">
                    <iframe width="100%" height="450" id="youtubeVideoPlayer" src="https://www.youtube.com/embed/f3NWvUV8MD8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="featured_in">
        <div class="row mt-120">
            <div class="col-lg-6 offset-lg-3">
                <h1 class="fs-40 text-center bb-2"><span class="fw-700">Featured In</span></h1>
            </div>
            {{--            <div class="col-lg-12">--}}
            {{--                <h1 class="fs-40 text-center fw-700 bb-2">Featured In</h1>--}}
            {{--            </div>--}}
        </div>
        <div class="green-dots">
            <div class="row mt-70">
                <div class="owl-carousel feature-carousel owl-theme">
                    <div class="item"><img src="{{asset('')}}frontend/assets/imgs/1.png" alt="" class="img-fluid w-102"></div>
                    <div class="item"><img src="{{asset('')}}frontend/assets/imgs/2.png" alt="" class="img-fluid w-102"></div>
                    <div class="item"><img src="{{asset('')}}frontend/assets/imgs/3.png" alt="" class="img-fluid w-102"></div>
                    <div class="item"><img src="{{asset('')}}frontend/assets/imgs/4.png" alt="" class="img-fluid w-72"></div>
                    <div class="item"><img src="{{asset('')}}frontend/assets/imgs/5.png" alt="" class="img-fluid w-102"></div>
                    <div class="item"><img src="{{asset('')}}frontend/assets/imgs/CBS_logo.png" alt="" class="img-fluid w-102"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-grey mt-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 text-center">
                    <div class="box">
                        <img src="{{asset('')}}frontend/assets/imgs/Group%2031.png" alt="" class="img-fluid mt--82">
                        <h4 class="fs-20 mt-20">Buying</h4>
                        <p>Morbi accumsan ipsum velit Nam nec tellus a odio tincidunt auctor a ornare odio sedlon
                            maurisvitae erat consequat auctor</p>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="box mt-71">
                        <img src="{{asset('')}}frontend/assets/imgs/Group%2033.png" alt="" class="img-fluid mt--82">
                        <h4 class="fs-20 mt-20">Selling</h4>
                        <p>Morbi accumsan ipsum velit Nam nec tellus a odio tincidunt auctor a ornare odio sedlon
                            maurisvitae erat consequat auctor</p>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="box mt-71">
                        <img src="{{asset('')}}frontend/assets/imgs/Group%2032.png" alt="" class="img-fluid mt--82">
                        <h4 class="fs-20 mt-20">Investing</h4>
                        <p>Morbi accumsan ipsum velit Nam nec tellus a odio tincidunt auctor a ornare odio sedlon
                            maurisvitae erat consequat auctor</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="pre_construction">
        <div class="row mt-120">
            <div class="col-lg-6 offset-lg-3">
                <h1 class="fs-40 text-center bb-2"><span class="fw-700">Pre-Construction</span></h1>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-lg-8 offset-lg-2">
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et doloribus nihil aut
                    odit expedita quam, fugiat consequuntur id repudiandae quo</p>
            </div>
        </div>
        <div class="row mt-40 dn">
            @if(empty($allPreConstructData))
                <p class="text-center" style="margin-left: auto;margin-right: auto">
                    Whoops! No New Pre-Construction Property Found
                </p>
            @else
                @foreach($allPreConstructData as $pre_constructData)
                    <div class="col-lg-4">
                        <a href="{{url('/pre-construct-property',$pre_constructData['id'])}}" class="text-black" style="text-decoration: none">
                            <div class="box1">
                                <div class="row mt-20">
                                    <div class="col-lg-6 col-6"
                                         @if($pre_constructData['property_media'])
                                         style="height: auto;
                                             background-image: url('{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$pre_constructData['property_media']['media_name'])}}');
                                             background-size: cover;
                                             background-repeat: no-repeat;
                                             background-position: center;"
                                         @else
                                         style="height: auto;
                                             background-image: url('{{asset('default/404-not-found.jpg')}}');
                                             background-size: cover;
                                             background-repeat: no-repeat;
                                             background-position: center;" @endif
                                    >
                                        {{--                                    @if($pre_constructData['property_media'])--}}
                                        {{--                                        <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$pre_constructData['property_media']['media_name'])}}" alt=""  width="160px" height="197px">--}}
                                        {{--                                    @endif--}}
                                    </div>
                                    <div class="col-lg-6 col-6 mt-20">
                                        <h6 class="fs-20 fw-700 text-black">${{$pre_constructData['price'] ? $pre_constructData['price'] : '-'}}</h6>
                                        <ul class="list-unstyled fs-12 fw-700 text-black">
                                            {{--                                <li>By {{$pre_constructData['agent_details'] ? $pre_constructData['agent_details']['fullName'] : '-'}}</li>--}}
                                            {{--                                        <li>{{$pre_constructData['category'] ? $pre_constructData['category'] : '-'}}</li>--}}
                                            {{--                                        <li>{{\Illuminate\Support\Str::limit($pre_constructData['address'], 25) ? \Illuminate\Support\Str::limit($pre_constructData['address'],25) : '-'}}</li>--}}
                                            <li>{{$pre_constructData['address']}}</li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-4 mt-2">
                                                        {{$pre_constructData['bedrooms'] ? $pre_constructData['bedrooms'] : '-'}}&nbsp;<i class="fa fa-bed"></i></br>Bedrooms
                                                    </div>
                                                    <div class="col-md-8 mt-2">
                                                        {{$pre_constructData['bathrooms'] ? $pre_constructData['bathrooms'] : '-'}}&nbsp;<i class="fa fa-bath"></i></br>Bathrooms
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <h6 class="fs-12 mt-26 text-grey">{{($pre_constructData['cat_details']) ? $pre_constructData['cat_details']['name'] : '-'}}</h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="row mt-40 dn">
            <div class="col-lg-4 offset-lg-4">
                {{--                <button type="button" class="btn btn-info">View more properties</button>--}}
                <a href="{{url('/pre-construct-search')}}" class="btn btn-info">View more properties</a>
            </div>
        </div>
    </div>
    <!--   mob view for new pre construction -->
    <div class="container-fluid dn-1">
        <div class="row mt-40">
            <div class="col-lg-12 pr-0">
                <div class="owl-carousel blog-carousel owl-theme hide-nav">
                    @if(empty($allPreConstructData))
                        <p class="text-center" style="margin-left: auto;margin-right: auto">
                            Whoops! No New Pre-Construction Property Found
                        </p>
                    @else
                        @foreach($allPreConstructData as $pre_constructData)
                            <div class="item">
                                <a href="{{url('/pre-construct-property',$pre_constructData['id'])}}" class="text-black" style="text-decoration: none">
                                    <div class="box1">
                                        <div class="row">
                                            <div class="col-lg-6 col-6"  @if($pre_constructData['property_media'])
                                            style="height: auto;
                                                background-image: url('{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$pre_constructData['property_media']['media_name'])}}');
                                                background-size: cover;
                                                background-repeat: no-repeat;
                                                background-position: center;"
                                                 @else
                                                 style="height: auto;
                                                     background-image: url('{{asset('default/404-not-found.jpg')}}');
                                                     background-size: cover;
                                                     background-repeat: no-repeat;
                                                     background-position: center;" @endif>
                                                {{--                                            @if($pre_constructData['property_media'])--}}
                                                {{--                                                <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$pre_constructData['property_media']['media_name'])}}" alt="">--}}
                                                {{--                                            @endif--}}
                                            </div>
                                            <div class="col-lg-6 col-6 mt-20">
                                                <h6 class="fs-20 fw-700 text-black">${{($pre_constructData['price']) ? $pre_constructData['price'] : '-'}}</h6>
                                                <ul class="list-unstyled fs-12 fw-700 text-black">
                                                    {{--                                            <li>{{$pre_constructData['title']}}</li>--}}
                                                    {{--                                                <li>{{($pre_constructData['category']) ? $pre_constructData['category'] : '-'}}</li>--}}
                                                    {{--                                                <li>{{\Illuminate\Support\Str::limit($pre_constructData['address'], 10) ? \Illuminate\Support\Str::limit($pre_constructData['address'],10) : '-'}}</li>--}}
                                                    <li>{{$pre_constructData['address']}}</li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-md-4 mt-2">
                                                                {{$pre_constructData['bedrooms'] ? $pre_constructData['bedrooms'] : '-'}}&nbsp;<i class="fa fa-bed"></i></br>Bedrooms
                                                            </div>
                                                            <div class="col-md-8 mt-2">
                                                                {{$pre_constructData['bathrooms'] ? $pre_constructData['bathrooms'] : '-'}}&nbsp;<i class="fa fa-bath"></i></br>Bathrooms
                                                            </div>
                                                        </div>

                                                    </li>
                                                </ul>
                                                <h6 class="fs-12 mt-26 text-grey">{{($pre_constructData['cat_details']) ? $pre_constructData['cat_details']['name'] : '-'}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="row mt-40 dn-1">
            <div class="col-lg-4 offset-lg-4">
                {{--                <button type="button" class="btn btn-info">View more properties</button>--}}
                <a href="{{url('/pre-construct-search')}}" class="btn btn-info">View more properties</a>
            </div>
        </div>
    </div>
    <!--  end of mob view -->
    <div class="bg-grey mt-80 dn" id="for_sales">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <h1 class="fs-40 text-center bb-2"><span class="fw-700">For Sales</span></h1>
                    {{--                    <h1 class="fs-40 text-center bb-2">For Sales</h1>--}}
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-lg-8 offset-lg-2">
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et doloribus nihil
                        aut odit expedita quam, fugiat consequuntur id repudiandae quo</p>
                </div>
            </div>
            <div class="row mt-40">
                @if(empty($allSaleData))
                    <p class="text-center" style="margin-left: auto;margin-right: auto">
                        Whoops!  No New For Sales Property Found
                    </p>
                @else
                    @foreach($allSaleData as $saleData)
                        <div class="col-lg-4">
                            <a href="{{url('/sale-property',$saleData['id'])}}" class="text-black" style="text-decoration: none">
                                <div class="box1">
                                    <div class="row mt-20">
                                        <div class="col-lg-6 col-6"
                                             @if(!empty($saleData['property_media']['media_name']))
                                             @if($saleData['source'] == 'Frontend')
                                             style="height: auto;
                                                 background-image: url('{{asset('frontend/assets/property-images/media-file/'.$saleData['property_media']['media_name'])}}');
                                                 background-size: cover;
                                                 background-repeat: no-repeat;
                                                 background-position: center;"
                                             @else
                                             style="height: auto;
                                                 background-image: url('{{asset('admin-panel/assets/property-images/media-file/sale/'.$saleData['property_media']['media_name'])}}');
                                                 background-size: cover;
                                                 background-repeat: no-repeat;
                                                 background-position: center;" @endif
                                             @else
                                             style="height: auto;
                                            background-image: url('{{asset('default/404-not-found.jpg')}}');
                                            background-size: cover;
                                            background-repeat: no-repeat;
                                            background-position: center;" @endif>
                                            {{--                                    @if(!empty($saleData['property_media']['media_name']))--}}
                                            {{--                                        @if($saleData['source'] == 'Frontend')--}}
                                            {{--                                            <img src="{{asset('frontend/assets/property-images/media-file/'.$saleData['property_media']['media_name'])}}" alt="" width="160px" height="197px">--}}
                                            {{--                                        @else--}}
                                            {{--                                            <img src="{{asset('admin-panel/assets/property-images/media-file/sale/'.$saleData['property_media']['media_name'])}}" alt="" width="160px" height="197px">--}}
                                            {{--                                        @endif--}}
                                            {{--                                    @else--}}
                                            {{--                                        <img src="{{asset('default/404-not-found.jpg')}}" alt="" class="img-fluid1">--}}
                                            {{--                                    @endif--}}
                                        </div>
                                        <div class="col-lg-6 col-6 mt-20">
                                            <h6 class="fs-20 fw-700 text-black">${{($saleData['price']) ? $saleData['price'] : '-'}}</h6>
                                            <ul class="list-unstyled fs-12 fw-700 text-black">
                                                {{--                                        <li>By {{($saleData['agent_details']) ? $saleData['agent_details']['fullName'] : '-'}}</li>--}}
                                                {{--                                        <li>{{($saleData['category']) ? $saleData['category'] : '-'}}</li>--}}
                                                {{--                                        <li>{{\Illuminate\Support\Str::limit($saleData['address'], 25) ? \Illuminate\Support\Str::limit($saleData['address'],25) : '-'}}</li>--}}
                                                <li class="fw-700 text-black">{{$saleData['address']}}</li>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-4 mt-2">
                                                            {{$saleData['bedrooms'] ? $saleData['bedrooms'] : '-'}}&nbsp;<i class="fa fa-bed"></i></br>Bedrooms
                                                        </div>
                                                        <div class="col-md-8 mt-2">
                                                            {{$saleData['bathrooms'] ? $saleData['bathrooms'] : '-'}}&nbsp;<i class="fa fa-bath"></i></br>Bathrooms
                                                        </div>
                                                    </div>

                                                </li>
                                            </ul>
                                            <h6 class="fs-12 mt-26 text-grey">{{($saleData['cat_details']) ? $saleData['cat_details']['name'] : '-'}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="row mt-40 dn">
                <div class="col-lg-4 offset-lg-4">
                    {{--                    <button type="button" class="btn btn-info">View more properties</button>--}}
                    <a href="{{url('/sale-search')}}" class="btn btn-info">View more properties</a>
                </div>
            </div>
        </div>
    </div>
    <!--    mob view for sales-->
    <div class="bg-grey mt-80 dn-1 pr-0 pl-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <h1 class="fs-40 text-center bb-2">For Sales</h1>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-lg-8">
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et doloribus nihil
                        aut odit expedita quam, fugiat consequuntur id repudiandae quo</p>
                </div>
            </div>
            <div class="row mt-40">
                <div class="col-lg-12 pr-0">
                    <div class="owl-carousel blog-carousel owl-theme hide-nav">
                        @if(empty($allSaleData))
                            <p class="text-center" style="margin-left: auto;margin-right: auto">
                                Whoops! No New For Sales Property Found
                            </p>
                        @else
                            @foreach($allSaleData as $saleData)
                                <div class="item">
                                    <a href="{{url('/sale-property',$saleData['id'])}}" class="text-black" style="text-decoration: none;">
                                        <div class="box1">
                                            <div class="row">
                                                <div class="col-lg-6 col-6"  @if(!empty($saleData['property_media']['media_name']))
                                                @if($saleData['source'] == 'Frontend')
                                                style="height: auto;
                                                    background-image: url('{{asset('frontend/assets/property-images/media-file/'.$saleData['property_media']['media_name'])}}');
                                                    background-size: cover;
                                                    background-repeat: no-repeat;
                                                    background-position: center;"
                                                     @else
                                                     style="height: auto;
                                                         background-image: url('{{asset('admin-panel/assets/property-images/media-file/sale/'.$saleData['property_media']['media_name'])}}');
                                                         background-size: cover;
                                                         background-repeat: no-repeat;
                                                         background-position: center;" @endif
                                                     @else
                                                     style="height: auto;
                                                    background-image: url('{{asset('default/404-not-found.jpg')}}');
                                                    background-size: cover;
                                                    background-repeat: no-repeat;
                                                    background-position: center;" @endif>
                                                    {{--                                        @if(!empty($saleData['property_media']['media_name']))--}}
                                                    {{--                                            @if($saleData['source'] == 'Frontend')--}}
                                                    {{--                                                <img src="{{asset('frontend/assets/property-images/media-file/'.$saleData['property_media']['media_name'])}}" alt="">--}}
                                                    {{--                                            @else--}}
                                                    {{--                                                <img src="{{asset('admin-panel/assets/property-images/media-file/sale/'.$saleData['property_media']['media_name'])}}" alt="">--}}
                                                    {{--                                            @endif--}}
                                                    {{--                                        @else--}}
                                                    {{--                                            <img src="{{asset('default/404-not-found.jpg')}}" alt="" class="img-fluid1">--}}
                                                    {{--                                        @endif--}}
                                                </div>
                                                <div class="col-lg-6 col-6 mt-20">
                                                    <h6 class="fs-20 fw-700 text-black">${{$saleData['price'] ? $saleData['price'] : '-'}}</h6>
                                                    <ul class="list-unstyled fs-12 fw-700 text-black">
                                                        {{--                                            <li>{{($saleData['agent_details']) ? $saleData['agent_details']['fullName'] : '-'}}</li>--}}
                                                        {{--                                            <li>{{($saleData['category']) ? $saleData['category'] : '-'}}</li>--}}
                                                        {{--                                            <li>{{\Illuminate\Support\Str::limit($saleData['address'], 10) ? \Illuminate\Support\Str::limit($saleData['address'],10) : '-'}}</li>--}}
                                                        <li>{{$saleData['address']}}</li>
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-md-4 mt-2">
                                                                    {{$saleData['bedrooms'] ? $saleData['bedrooms'] : '-'}}&nbsp;<i class="fa fa-bed"></i></br>Bedrooms
                                                                </div>
                                                                <div class="col-md-8 mt-2">
                                                                    {{$saleData['bathrooms'] ? $saleData['bathrooms'] : '-'}}&nbsp;<i class="fa fa-bath"></i></br>Bathrooms
                                                                </div>
                                                            </div>

                                                        </li>
                                                    </ul>
                                                    <h6 class="fs-12 mt-26 text-grey">{{($saleData['cat_details']) ? $saleData['cat_details']['name'] : '-'}}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="row mt-40 dn-1">
                <div class="col-lg-4 offset-lg-4">
                    {{--                    <button type="button" class="btn btn-info">View more properties</button>--}}
                    <a href="{{url('/sale-search')}}" class="btn btn-info">View more properties</a>
                </div>
            </div>
        </div>
    </div>
    <!--   end of mob view-->
    <div class="bg-green container-gsap" id="container-gsap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 ">
                    {{--                    <h1 class="fs-40 text-center bb-2"></h1>--}}
                    <h1 class="fs-40 text-center bb-2" id="container-gsap-title"><span class="fw-700">Our Million Dollar Strategy</span></h1>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-lg-8 offset-lg-2">
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et doloribus nihil
                        aut odit expedita quam, fugiat consequuntur id repudiandae quo</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="strategy-box">
                        <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                            <li class="nav-item bdr-1" role="presentation">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Buying</a>
                            </li>
                            <li class="nav-item bdr-2" role="presentation">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Selling</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="row">
                                <div class="col-lg-12 mt-10">
                                    <h1 class="fs-30 text-center">ARE YOU BUYING?</h1>
                                </div>
                            </div>
                            <div class="row mt-40">
                                <div class="scrollable">
                                    <div class="col-lg-12">
                                        <section id="section11" class="content-section scrollItem point">
                                            <div class="card mt-41 sc-01">
                                                <div class="info">
                                                    <h5 class="title">Step 01</h5>
                                                    <img src="{{asset('')}}frontend/assets/imgs/001-home.png" alt="" class="img-fluid w-52">
                                                    <hr>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                                        do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                        Ut
                                                        enim ad minim veniam, quis nostrud exercitation ullamco
                                                        laboris
                                                        nisi ut aliquip ex ea commodo consequat. </p>
                                                </div>
                                            </div>
                                        </section>
                                        <section id="section12" class="content-section scrollItem point">
                                            <div class="card mt-41 sc-02">
                                                <div class="info">
                                                    <h3 class="title">Step 02</h3>
                                                    <img src="{{asset('')}}frontend/assets/imgs/002-save-money.png" alt="" class="img-fluid w-52">
                                                    <hr>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                                        do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                        Ut
                                                        enim ad minim veniam, quis nostrud exercitation ullamco
                                                        laboris
                                                        nisi ut aliquip ex ea commodo consequat. </p>
                                                </div>
                                            </div>
                                        </section>
                                        <section id="section13" class="content-section scrollItem point">
                                            <div class="card mt-41 sc-03">
                                                <div class="info">
                                                    <h3 class="title">Step 03</h3>
                                                    <img src="{{asset('')}}frontend/assets/imgs/003-buildings.png" alt="" class="img-fluid w-52">
                                                    <hr>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                                        do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                        Ut
                                                        enim ad minim veniam, quis nostrud exercitation ullamco
                                                        laboris
                                                        nisi ut aliquip ex ea commodo consequat. </p>
                                                </div>
                                            </div>
                                        </section>
                                        <section id="section14" class="content-section scrollItem point">
                                            <div class="card mt-41 sc-04">
                                                <div class="info">
                                                    <h3 class="title">Step 04</h3>
                                                    <img src="{{asset('')}}frontend/assets/imgs/Outline.png" alt="" class="img-fluid w-52">
                                                    <hr>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                                        do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                        Ut
                                                        enim ad minim veniam, quis nostrud exercitation ullamco
                                                        laboris
                                                        nisi ut aliquip ex ea commodo consequat. </p>
                                                </div>
                                            </div>
                                        </section>
                                        <section id="section15" class="content-section scrollItem point">
                                            <div class="card mt-41 sc-05">
                                                <div class="info">
                                                    <h3 class="title">Step 05</h3>
                                                    <img src="{{asset('')}}frontend/assets/imgs/005-guarantee.png" alt="" class="img-fluid w-52">
                                                    <hr>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                                        do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                        Ut
                                                        enim ad minim veniam, quis nostrud exercitation ullamco
                                                        laboris
                                                        nisi ut aliquip ex ea commodo consequat. </p>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                                <div class="animation dn">
                                    <div class="line"></div>
                                    <nav class="timeline">
                                        <ul>
                                            <li>
                                                <span class="rect"></span>
                                                <span class="circle mt-0"></span>
                                            </li>
                                            <li>
                                                <span class="rect"></span>
                                                <span class="circle"></span>
                                            </li>
                                            <li>
                                                <span class="rect"></span>
                                                <span class="circle"></span>
                                            </li>
                                            <li>
                                                <span class="rect"></span>
                                                <span class="circle"></span>
                                            </li>
                                            <li>
                                                <span class="rect"></span>
                                                <span class="circle"></span>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="row">
                                <div class="col-lg-12 mt-10">
                                    <h1 class="fs-30 text-center">ARE YOU SELLING?</h1>
                                </div>
                            </div>
                            <div class="row mt-40">
                                <div class="scrollable">
                                    <div class="col-lg-12">
                                        <section id="section1" class="content-section scrollItem pointsell">
                                            <div class="card mt-41 sc-01">
                                                <div class="info">
                                                    <h5 class="title">Step 01</h5>
                                                    <img src="{{asset('')}}frontend/assets/imgs/001-home.png" alt="" class="img-fluid w-52">
                                                    <hr>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                                        do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                        Ut
                                                        enim ad minim veniam, quis nostrud exercitation ullamco
                                                        laboris
                                                        nisi ut aliquip ex ea commodo consequat. </p>
                                                </div>
                                            </div>
                                        </section>
                                        <section id="section2" class="content-section scrollItem pointsell">
                                            <div class="card mt-41 sc-02">
                                                <div class="info">
                                                    <h3 class="title">Step 02</h3>
                                                    <img src="{{asset('')}}frontend/assets/imgs/002-save-money.png" alt="" class="img-fluid w-52">
                                                    <hr>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                                        do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                        Ut
                                                        enim ad minim veniam, quis nostrud exercitation ullamco
                                                        laboris
                                                        nisi ut aliquip ex ea commodo consequat. </p>
                                                </div>
                                            </div>
                                        </section>
                                        <section id="section3" class="content-section scrollItem pointsell">
                                            <div class="card mt-41 sc-03">
                                                <div class="info">
                                                    <h3 class="title">Step 03</h3>
                                                    <img src="{{asset('')}}frontend/assets/imgs/003-buildings.png" alt="" class="img-fluid w-52">
                                                    <hr>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                                        do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                        Ut
                                                        enim ad minim veniam, quis nostrud exercitation ullamco
                                                        laboris
                                                        nisi ut aliquip ex ea commodo consequat. </p>
                                                </div>
                                            </div>
                                        </section>
                                        <section id="section4" class="content-section scrollItem pointsell">
                                            <div class="card mt-41 sc-04">
                                                <div class="info">
                                                    <h3 class="title">Step 04</h3>
                                                    <img src="{{asset('')}}frontend/assets/imgs/Outline.png" alt="" class="img-fluid w-52">
                                                    <hr>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                                        do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                        Ut
                                                        enim ad minim veniam, quis nostrud exercitation ullamco
                                                        laboris
                                                        nisi ut aliquip ex ea commodo consequat. </p>
                                                </div>
                                            </div>
                                        </section>
                                        <section id="section5" class="content-section scrollItem pointsell">
                                            <div class="card mt-41 sc-05">
                                                <div class="info">
                                                    <h3 class="title">Step 05</h3>
                                                    <img src="{{asset('')}}frontend/assets/imgs/005-guarantee.png" alt="" class="img-fluid w-52">
                                                    <hr>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                                        do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                        Ut
                                                        enim ad minim veniam, quis nostrud exercitation ullamco
                                                        laboris
                                                        nisi ut aliquip ex ea commodo consequat. </p>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                                <div class="animation dn">
                                    <div class="line"></div>
                                    <nav class="timeline">
                                        <ul>
                                            <li>
                                                <span class="rect"></span>
                                                <span class="circle mt-0 circleItem"></span>
                                            </li>
                                            <li>
                                                <span class="rect"></span>
                                                <span class="circle circleItem"></span>
                                            </li>
                                            <li>
                                                <span class="rect"></span>
                                                <span class="circle circleItem"></span>
                                            </li>
                                            <li>
                                                <span class="rect"></span>
                                                <span class="circle circleItem"></span>
                                            </li>
                                            <li>
                                                <span class="rect"></span>
                                                <span class="circle circleItem"></span>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-dark" id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <h1 class="fs-40 text-center text-white bb-2"><span class="fw-700">Testimonials</span></h1>
                </div>
                {{--                <div class="col-lg-12">--}}
                {{--                    <h1 class="fs-40 text-center text-white"><span class="fw-700">Testimonials</span></h1>--}}
                {{--                </div>--}}
            </div>
            <div class="owl-carousel testimonial-carousel owl-theme">
                <div class="item">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <img src="{{asset('')}}frontend/assets/imgs/Ellipse%2099.png" alt="" class="img-fluid w-110 ml-auto mr-auto mt-70">
                        </div>
                    </div>
                    <div class="row mt-30">
                        <div class="col-lg-8 offset-lg-2 text-center">
                            <p class="fs-16 fw-400" style="font-family: 'raleway";>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam,
                                accusantium, non. Nisi minus deserunt vero impedit unde ullam incidunt, qui, quo
                                delectus eos maiores earum sunt voluptatum asperiores pariatur eaque?</p>
                            <img src="{{asset('')}}frontend/assets/imgs/Group%20492.png" alt="" class="img-fluid w-initial ml-auto mr-auto  mt-30">
                            <img src="{{asset('')}}frontend/assets/imgs/Group%202096.png" alt="" class="img-fluid w-initial ml-auto mr-auto  mt-30">
                            <ul class="list-unstyled mt-20">
                                <li>Customer Name</li>
                                <li>Organistion name</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <img src="{{asset('')}}frontend/assets/imgs/Ellipse%2099.png" alt="" class="img-fluid w-110 ml-auto mr-auto mt-70">
                        </div>
                    </div>
                    <div class="row mt-30">
                        <div class="col-lg-8 offset-lg-2 text-center">
                            <p class="fs-16 fw-400" style="font-family: 'raleway";>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam,
                                accusantium, non. Nisi minus deserunt vero impedit unde ullam incidunt, qui, quo
                                delectus eos maiores earum sunt voluptatum asperiores pariatur eaque?</p>
                            <img src="{{asset('')}}frontend/assets/imgs/Group%20492.png" alt="" class="img-fluid w-initial ml-auto mr-auto  mt-30">
                            <img src="{{asset('')}}frontend/assets/imgs/Group%202096.png" alt="" class="img-fluid w-initial ml-auto mr-auto  mt-30">
                            <ul class="list-unstyled mt-20">
                                <li>Customer Name</li>
                                <li>Organistion name</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <img src="{{asset('')}}frontend/assets/imgs/Ellipse%2099.png" alt="" class="img-fluid w-110 ml-auto mr-auto mt-70">
                        </div>
                    </div>
                    <div class="row mt-30">
                        <div class="col-lg-8 offset-lg-2 text-center">
                            <p class="fs-16 fw-400" style="font-family: 'raleway";>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam,
                                accusantium, non. Nisi minus deserunt vero impedit unde ullam incidunt, qui, quo
                                delectus eos maiores earum sunt voluptatum asperiores pariatur eaque?</p>
                            <img src="{{asset('')}}frontend/assets/imgs/Group%20492.png" alt="" class="img-fluid w-initial ml-auto mr-auto  mt-30">
                            <img src="{{asset('')}}frontend/assets/imgs/Group%202096.png" alt="" class="img-fluid w-initial ml-auto mr-auto  mt-30">
                            <ul class="list-unstyled mt-20">
                                <li>Customer Name</li>
                                <li>Organistion name</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-30">
                <div class="col-lg-4 offset-lg-4 text-center">
                    {{--                    <button type="button" class="btn btn-info">View more Testimonials</button>--}}
                    <a href="{{url('/testimonial')}}" class="btn btn-info">View more Testimonials</a>

                </div>
            </div>
        </div>
    </div>
    <div class="bg-grey dn" id="agent">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <h1 class="fs-40 text-center bb-2"><span class="fw-700">Our Agents</span></h1>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-lg-8 offset-lg-2">
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et doloribus
                        nihil
                        aut odit expedita quam, fugiat consequuntur id repudiandae quo</p>
                </div>
            </div>
            <div class="row mt-40">
                @if(empty($allAgent))
                    <p class="text-center">No Agent Found</p>
                @else
                    @foreach($allAgent as $agentData)
                        <div class="col-lg-4">
                            {{--                    <a href="{{url('/agent')}}" style="color: #262222;text-decoration: none;">--}}
                            <div class="card" style="width: 100%;">
                                <img src="{{asset('default/blank-profile.png')}}" class="card-img-top img-fluid" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$agentData->fullName ? $agentData->fullName : '-'}}</h5>
                                    <ul class="list-unstyled fs-21">
                                        <li>-</li>
                                        <li>{{$agentData->email ? $agentData->email : '-'}}</li>
                                        <li>{{$agentData->phone ? $agentData->phone : '-'}}</li>
                                    </ul>
                                    <hr>
                                    <ul class="list-unstyled list-inline text-center">
                                        <li class="list-inline-item">
                                            <a href="#"><img src="{{asset('')}}frontend/assets/imgs/instagram.png" alt="" class="img-fluid" height="34px" width="34px"></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#"><img src="{{asset('')}}frontend/assets/imgs/linkedin.png" alt="" class="img-fluid"></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#"><img src="{{asset('')}}frontend/assets/imgs/Group%20268.png" alt="" class="img-fluid"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!--  mob view for agents  -->
    <div class="bg-grey dn-1 pr-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <h1 class="fs-40 text-center bb-2"><span class="fw-700">Our Agents</span></h1>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-lg-8 offset-lg-2">
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et doloribus
                        nihil
                        aut odit expedita quam, fugiat consequuntur id repudiandae quo</p>
                </div>
            </div>
            <div class="row mt-40">
                <div class="col-lg-12 pr-0">
                    <div class="owl-carousel blog-carousel owl-theme hide-nav agents-carousel">
                        @foreach($allAgent as $agentData)
                            <div class="item">
                                <div class="card" style="width: 100%;">
                                    <img src="{{asset('default/blank-profile.png')}}" class="card-img-top img-fluid" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$agentData->fullName ? $agentData->fullName : '-'}}</h5>
                                        <ul class="list-unstyled fs-21">
                                            <li>-</li>
                                            <li>{{$agentData->email ? $agentData->email : '-'}}</li>
                                            <li>{{$agentData->phone ? $agentData->phone : '-'}}</li>
                                        </ul>
                                        <hr>
                                        <ul class="list-unstyled list-inline text-center">
                                            <li class="list-inline-item">
                                                <a href="#"><img src="{{asset('')}}frontend/assets/imgs/Group%20265.png" alt="" class="img-fluid"></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#"><img src="{{asset('')}}frontend/assets/imgs/linkedin.png" alt="" class="img-fluid"></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#"><img src="{{asset('')}}frontend/assets/imgs/Group%20268.png" alt="" class="img-fluid"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--   end of mob view for agents-->
    <div class="container" id="browse_cities">
        <div class="row mt-120">
            <div class="col-lg-4 offset-lg-4">
                <h1 class="fs-40 text-center bb-2"><span class="fw-700">Browse Cities</span></h1>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-lg-12">
                <h6 class="fs-16 fw-700 text-center">Popular Cities</h6>
            </div>
        </div>
        <div class="row mt-50">
            <div class="custom-col-2 text-center" id="browseCities" data-text="Toronto">
                <img src="{{asset('')}}frontend/assets/imgs/Mask%20Group%2012.png" alt="" class="img-fluid">
                <h6 class="fs-20 mt-10">Toronto</h6>
            </div>
            <div class="custom-col-2 text-center" id="browseCities" data-text="Mississauga">
                <img src="{{asset('')}}frontend/assets/imgs/41b0b3a435ce3163b5937819ea2f284e.png" alt="" class="img-fluid">
                <h6 class="fs-20 mt-10">Mississauga</h6>
            </div>
            <div class="custom-col-2 text-center" id="browseCities" data-text="Brampton">
                <img src="{{asset('')}}frontend/assets/imgs/43d45154250449b992fda53734734f4e.png" alt="" class="img-fluid mt-21">
                <h6 class="fs-20 mt-10">Brampton</h6>
            </div>
            <div class="custom-col-2 text-center" id="browseCities" data-text="Hamilton">
                <img src="{{asset('')}}frontend/assets/imgs/e3a82ce21e2ed372890d57e6aee1c143.png" alt="" class="img-fluid mt-21">
                <h6 class="fs-20 mt-10">Hamilton</h6>
            </div>
            <div class="custom-col-2 text-center dn" id="browseCities" data-text="Oakville">
                <img src="{{asset('')}}frontend/assets/imgs/2945a0720b79c2d39254f3753fe61379.png" alt="" class="img-fluid">
                <h6 class="fs-20 mt-10">Oakville</h6>
            </div>
        </div>
        <div class="row mt-50">
            <div class="custom-col-2 text-center" id="browseCities" data-text="Etobicoke">
                <img src="{{asset('')}}frontend/assets/imgs/1984b2d13488b5be2a85c85a074d8503.png" alt="" class="img-fluid">
                <h6 class="fs-20 mt-10">Etobicoke</h6>
            </div>
            <div class="custom-col-2 text-center" id="browseCities" data-text="Burlington">
                <img src="{{asset('')}}frontend/assets/imgs/605e0db7bc1ab01df89beb38a97177bc.png" alt="" class="img-fluid">
                <h6 class="fs-20 mt-10">Burlington</h6>
            </div>
            <div class="custom-col-2 text-center" id="browseCities" data-text="Milton">
                <img src="{{asset('')}}frontend/assets/imgs/7c225ff8654ec3049cc85cf3a70996e3.png" alt="" class="img-fluid mt-21">
                <h6 class="fs-20 mt-10">Milton</h6>
            </div>
            <div class="custom-col-2 text-center" id="browseCities" data-text="Vaughn">
                <img src="{{asset('')}}frontend/assets/imgs/2e9b674993f88b55d2c18b31947de5a2.png" alt="" class="img-fluid mt-21">
                <h6 class="fs-20 mt-10">Vaughn</h6>
            </div>
            <div class="custom-col-2 text-center" id="browseCities" data-text="Markham">
                <img src="{{asset('')}}frontend/assets/imgs/14e785877b74ae2f9d38344f8129babb.png" alt="" class="img-fluid mt-21">
                <h6 class="fs-20 mt-10">Markham</h6>
            </div>
            <div class="custom-col-2 text-center dn-1" id="browseCities" data-text="Oakville">
                <img src="{{asset('')}}frontend/assets/imgs/2945a0720b79c2d39254f3753fe61379.png" alt="" class="img-fluid mt-21">
                <h6 class="fs-20 mt-10">Oakville</h6>
            </div>
        </div>
        <div class="row mt-120">
            <div class="col-lg-2 offset-lg-5">
                <h1 class="fs-40 text-center bb-2 fw-700">Blogs</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid blog mt-40" id="blogs">
        <div class="row">
            <div class="col-lg-12 pr-0 pl-0">
                <div class="owl-carousel blog-carousel1 owl-theme">
                    @foreach($allBlog as $blogData)
                        <div class="item">
                            <a href="{{url('/blog-detail',$blogData->id)}}" style="text-decoration: none;color: #262222;">
                                <div class="card blog-style" style="width: 100%;height: 466px;background-image: url('{{asset('admin-panel/assets/blog-image/'.$blogData->image)}}');background: none;">
                                    {{--                            <div style=""></div>--}}
                                    <img src="{{asset('admin-panel/assets/blog-image/'.$blogData->image)}}" class="img-fluid" alt="..." height="292px">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$blogData->title ? $blogData->title : '-'}}</h5>
                                        <p class="card-text">{{\Illuminate\Support\Str::limit($blogData->body ? $blogData->body : '-', 170)}}
                                        </p>
                                        <a href="{{url('/blog-detail',$blogData->id)}}" style="color: #164DF3; text-decoration: none;">Read more></a>
                                    </div>
                                </div></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="bg-grey mt-80" style="background-color: #EEEEEE" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <h1 class="fs-40 text-center bb-2 fw-700">Contact Us</h1>
                </div>
            </div>
            <div class="row mt-40">
                <div class="col-lg-8 offset-lg-2">
                    <p class="fs-16 fw-700 text-center">Morbi accumsan ipsum velit nam nec tellus a odiose tincidunt
                        auctor a ornare odio sed non mauris vitae erat consequat auctor</p>
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
                                    <option value="pre-construction">Pre-Construction</option>
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
                                <textarea class="form-control" id="message" name="message" rows="6" placeholder="message">{{old('message')}}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary" id="contact_btn">Send Now</button>
                        </div>
                    </div>
                </form>
                <!-- contact form end -->
            </div>
        </div>
    </div>
    <div class="bg-parrotgreen" id="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 center">
                    <h1 class="fs-40 text-white">Sign Up for our<span class="fw-700"> Newsletter</span></h1>
                    <p class="mt-10 text-white">Consistent updates on the ever so changing Canadian Real Estate market!</p>
                </div>
                <div class="col-lg-6 center">
                    {{--                    <h6 class="fs-21 fw-700 text-white">Stay Connected</h6>--}}
                    <form>
                        <div class="row mt-21" style="margin-top: 8px;">
                            <div class="col-lg-8">
                                <input type="email" class="form-control h-10" name="subscriber_email" id="subscriber_email" placeholder="Enter Email Address">
                                <div id="status"></div>
                                <div id="content"></div>
                                {{-- <input type="text" class="form-control h-10" placeholder="Enter Email Id">--}}
                            </div>
                            <div class="col-lg-4">
                                <button type="button" class="btn btn-light mb-2" name="subscribe_now" id="subscribe_now">Submit</button>
                                {{-- <button type="button" name="subscribe_now" id="subscribe_now"><i class="fa fa-send"></i></button>--}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- begin subscribe for newsletter js -->
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
    <!-- end subscribe for newsletter js -->

    <!-- begin browse city js -->
    <script>
        $(document).ready(function () {
            $(document).on('click', '#browseCities', function () {
                // $(this).css('cursor','pointer');
                //alert($(this).attr('data-text'));
                var selectCity = $(this).attr('data-text');
                var inputOptions = new Promise(function(resolve) {
                    resolve({
                        'pre-construct': 'Pre-Construction',
                        'sale': 'For Sale',
                        // '#0000ff': 'Blue'
                    });
                });
                Swal.fire({
                    icon: 'info',
                    title: 'Would you like to see Pre-Construction or For Sale properties in' +" "+ selectCity + '?',
                    // text: 'Please select property type first!',
                    showCancelButton: true,
                    confirmButtonColor: '#1ED65F',
                    cancelButtonColor: '#949496',
                    confirmButtonText: 'Select Type!',
                    input: 'radio',
                    inputOptions: inputOptions,
                    inputPlaceholder: 'Select Type',
                    cancelButtonText: 'No, cancel!',
                    inputValidator: (value) => {
                        console.log(value);
                        if (!value) {
                            return 'You need to select Type!'
                        } else {
                            window.location.href='{{ url('search-city') }}'+'?city='+selectCity+'&property_type='+value;
                        }
                    }
                })
            }).css('cursor','pointer');
        });
    </script>
    <!-- end browse city js-->

    <!-- begin contact form js -->
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
        $("#min_range").on('change', function () {
            $("#filter_min").val($(this).val());
        });

        $("#max_range").on('change', function () {
            $("#filter_max").val($(this).val());
        });

        $(document).ready(function() {
            $('.show-hide').click(function() {
                $(this).next().toggleClass('toggle');
            });
        });
    </script>
    <!-- end filter price change js -->
@endsection
<!-- script-gsap -->
@section('script-gsap')
    <script src="{{asset('')}}frontend/assets/js/scriptgsap.js"></script>
@endsection
<!-- map script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBi6dX1tFAnm__rELtIR8agR0F3jkHDYhY"></script>

<script>
    /*--- BEGIN MAP LOADING ---*/
    function initialize() {
        let cluster = [];
        let marker, i;

        let map = new google.maps.Map(document.getElementById('map'), {
            zoom    : 4,
            center  : new google.maps.LatLng(54.2925715, -89.3642582),
            fullscreenControl: false
        });
        let info_window = new google.maps.InfoWindow({
            minWidth: 400
        })
        let labels          = ""; //ABCDEFGHIJKLMNOPQRSTUVWXYZ
        let clusterOptions  = new MarkerClusterer(map, [], {
            zoomOnClick : false,
            imagePath   : 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
        });
        //markerCluster = new MarkerClusterer(map, marker, clusterOptions);

        $.ajax({
            type    : 'get',
            url     : '{{ url('/map-data') }}',
            data    : {
                _token      : "{{ csrf_token() }}",
                property_id : null,
            },
            success : function (res) {
                console.log(res)
                let url, url2, file;

                for (i = 0; i < res.length; i++) {

                    if(res[i].property_type === 'sale') {
                        marker = new google.maps.Marker({
                            position : new google.maps.LatLng(res[i].latitude, res[i].longitude),
                            map      : map,
                            icon     : 'http://maps.google.com/mapfiles/ms/icons/red-dot.png',
                            property_id : res[i].id,
                        });

                    } else if(res[i].property_type === 'pre-construct') {
                        marker = new google.maps.Marker({
                            position    : new google.maps.LatLng(res[i].latitude, res[i].longitude),
                            map         : map,
                            icon        : 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
                            property_id : res[i].id,
                        });

                    } else {
                        marker = new google.maps.Marker({
                            position    : new google.maps.LatLng(res[i].latitude, res[i].longitude),
                            map         : map,
                            icon        : 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
                            property_id : res[i].id,
                        });
                    }

                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                            //info_window.setContent(res[i].address);

                            let category = '-'; let bedrooms = '-'; let bathrooms = '-';
                            if(res[i].category) { category = res[i].category }
                            if(res[i].bedrooms) { bedrooms = res[i].bedrooms }
                            if(res[i].bathrooms) { bathrooms = res[i].bathrooms }

                            if(res[i].property_type === 'sale' && res[i].source === 'Frontend'){
                                url     = "{{asset('frontend/assets/property-images/media-file')}}" + "/" +res[i].property_media.media_name;
                                url2    = "{{url('/sale-search')}}";
                                //file    = "<img class='marker_img' src='"+url+"'>";

                            } else if(res[i].property_type === 'sale' && res[i].source === 'Admin') {
                                url     = "{{asset('admin-panel/assets/property-images/media-file/sale')}}" + "/" +res[i].property_media.media_name;
                                url2    = "{{url('/sale-search')}}";
                                //file    = "<img class='marker_img' src='"+url+"'>";

                            } else if(res[i].property_type === 'pre-construct') {
                                url     = "{{asset('admin-panel/assets/property-images/media-file/pre-construct')}}" + "/" +res[i].property_media.media_name;
                                url2    = "{{url('/pre-construct-search')}}";
                                //file    = "<img class='marker_img' src='"+url+"' >";

                            } else {
                                url = "{{asset('default/404-not-found.jpg')}}" + "/" +res[i].property_media.media_name;
                                //file = "<img class='marker_img' src='"+url+"'>";
                            }

                            /*info_window.setContent("<a href='"+url2+"' class='text-black' style='text-decoration: none;'>" +
                                "<div class='img_section'></div>" +
                                "<div class='content_section'>" +
                                "<h5>$ "+ res[i].price + "</h5>" +
                                "<p style='font-size: 14px;'>"+ res[i].address+"</p>" +
                                "<p><i class='fa fa-bath'></i>"+" " + res[i].bathrooms +" <i class='fa fa-bed'></i>"+" " + res[i].bedrooms +"</p>"+
                                "<h6><i class='fa fa-home' style='color: black'></i>"+ " " + res[i].category  +"</h6>" +
                                "</div></a>");*/

                            info_window.setContent('<a href="'+url2+'" class="text-black" style="text-decoration: none;"><div>\n' +
                                '    <div class="row mt-10" style="margin-right: 0">\n' +
                                '        <div class="col-lg-6 col-md-6 col-sm-6 col-6"><img src="'+url+'" style="width: 100%; height: auto;" alt=""></div>\n' +
                                '        <div class="col-lg-6 col-md-6 col-sm-6 col-6">\n' +
                                '            <h6 class="fs-20 fw-700 text-black">$'+res[i].price+'</h6>\n' +
                                '            <div class="fs-12 fw-700 text-black">\n' +
                                '                <div class="fw-700 text-black">'+res[i].address+'</div>\n' +
                                '                <div>\n' +
                                '                    <div class="row">\n' +
                                '                        <div class="col-6 mt-2">\n' +
                                '                            '+bedrooms+' &nbsp;<i class="fa fa-bed"></i><br>Bedrooms\n' +
                                '                        </div>\n' +
                                '                        <div class="col-6 mt-2">\n' +
                                '                            '+bathrooms+' &nbsp;<i class="fa fa-bath"></i><br>Bathrooms\n' +
                                '                        </div>\n' +
                                '                    </div>\n' +
                                '                </div>\n' +
                                '            </div>\n' +
                                '            <h6 class="fs-12 mt-2 text-grey">'+category+'</h6>\n' +
                                '        </div>\n' +
                                '    </div>\n' +
                                '</div><a>');

                            info_window.open(map, marker);
                        }
                    })(marker, i));
                    clusterOptions.addMarker(marker);
                }
            },
        });

        google.maps.event.addListener(clusterOptions, 'clusterclick', function(cluster) {
            if (map.getZoom() < map.maxZoom ){
                map.setCenter(cluster.center_);
                map.setZoom(map.getZoom() + 2);
            } else {

                //let content = '';
                let p_id    = [];

                let info = new google.maps.MVCObject;
                info.set('position', cluster.center_);

                let marks_in_cluster = cluster.getMarkers();

                for (let z = 0; z < marks_in_cluster.length; z++) {
                    p_id[z] = marks_in_cluster[z].property_id;
                }

                $.ajax({
                    type    : 'get',
                    url     : '{{ url('/map-data') }}',
                    data    : {
                        _token      : "{{ csrf_token() }}",
                        property_id : p_id
                    },
                    success : function (res) {
                        let url, url2;
                        let content = '';

                        for (i = 0; i < res.length; i++) {

                            if(res[i].property_type === 'sale' && res[i].source === 'Frontend'){
                                url     = "{{asset('frontend/assets/property-images/media-file')}}" + "/" +res[i].property_media.media_name;
                                url2    = "{{url('/sale-search')}}";

                            } else if(res[i].property_type === 'sale' && res[i].source === 'Admin') {
                                url     = "{{asset('admin-panel/assets/property-images/media-file/sale')}}" + "/" +res[i].property_media.media_name;
                                url2    = "{{url('/sale-search')}}";

                            } else if(res[i].property_type === 'pre-construct') {
                                url     = "{{asset('admin-panel/assets/property-images/media-file/pre-construct')}}" + "/" +res[i].property_media.media_name;
                                url2    = "{{url('/pre-construct-search')}}";

                            } else {
                                url = "{{asset('default/404-not-found.jpg')}}" + "/" +res[i].property_media.media_name;
                            }

                            /*content += "<div class='row' style='padding-top: 10px; padding-bottom: 10px; border-bottom: 1px solid #333'><div class='col-md-12'><a href='"+url2+"' class='text-black' style='text-decoration: none;'>" +
                                "<div class='img_section' style='background-image:url("+url+");\n" +
                                "background-size: cover;\n" +
                                "    background-position: center;\n" +
                                "    display: block;\n" +
                                "    height: 150px;\n" +
                                "    background-repeat: no-repeat;'>" +
                                "</div><div class='content_section'>" +
                                "<h5>$ "+ res[i].price + "</h5>" +
                                "<p style='font-size: 14px;'>"+ res[i].address+"</p>" +
                                "<p><i class='fa fa-bath'></i>"+" " + res[i].bathrooms +" <i class='fa fa-bed'></i>"+" " + res[i].bedrooms +"</p>"+
                                "<h6><i class='fa fa-home' style='color: black'></i>"+ " " + res[i].category  +"</h6>" +
                                "</div></a></div></div>";*/

                            let category = '-'; let bedrooms = '-'; let bathrooms = '-';
                            if(res[i].category) { category = res[i].category }
                            if(res[i].bedrooms) { bedrooms = res[i].bedrooms }
                            if(res[i].bathrooms) { bathrooms = res[i].bathrooms }

                            content += '<a href="'+url2+'" class="text-black" style="text-decoration: none;">' +
                                '<div class="box1 p-1">\n' +
                                '    <div class="row mt-10" style="margin-right: 0;">\n' +
                                '        <div class="col-lg-12 col-md-12 col-sm-12"><img class="" style="width: 100%; height: auto" src="'+url+'" alt=""></div>\n' +
                                '        <div class="col-lg-12 col-md-12 col-sm-12 mt-20">\n' +
                                '            <h6 class="fs-20 fw-700 text-black">$'+res[i].price+'</h6>\n' +
                                '            <div class="list-unstyled fs-12 fw-700 text-black">\n' +
                                '                <div class="fw-700 text-black">'+res[i].address+'</div>\n' +
                                '                <div>\n' +
                                '                    <div class="row">\n' +
                                '                        <div class="col-lg-6 col-md-6 col-sm-12 mt-2">\n' +
                                '                            '+bedrooms+' &nbsp;<i class="fa fa-bed"></i> Bedrooms\n' +
                                '                        </div>\n' +
                                '                        <div class="col-lg-6 col-md-6 col-sm-12 mt-2">\n' +
                                '                            '+bathrooms+' &nbsp;<i class="fa fa-bath"></i> Bathrooms\n' +
                                '                        </div>\n' +
                                '                        <div class="col-lg-12 col-md-12 col-sm-12 mt-2">\n' +
                                '                           <h6 class="fs-12 text-grey">'+category+'</h6>\n' +
                                '                        </div>\n' +
                                '                    </div>\n' +
                                '                </div>\n' +
                                '            </div>\n' +
                                '        </div>\n' +
                                '    </div>\n' +
                                '</div></a>'
                        }

                        $("#property_show_section").empty().append(content);
                        $('#overlay').show();
                        /*info_window.close();
                        info_window.setContent(content);
                        info_window.open(map, info);
                        google.maps.event.addListener(map, 'zoom_changed', function() {
                            info_window.close()
                        });*/

                    },
                });
            }
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    /*--- END    MAP LOADING ---*/

    /*$(document).on('click', '.filter_btn', function() {
        filterFormSubmit();
        google.maps.event.addDomListener(window, 'load', filterFormSubmit);
    });*/

    $(document).on('click', '#map', function () {

        $("#overlay").hide();
    });

    /*--- BEGIN FILTER ---*/
    $(document).on('click', '.filter_btn', function () {
        new_property_filter()
        google.maps.event.addDomListener(window, 'load', new_property_filter);
    })

    function new_property_filter() {
        $('#error_message_filter').text('');
        let map = new google.maps.Map(document.getElementById('map'), {
            zoom    : 4,
            center  : new google.maps.LatLng(54.2925715, -89.3642582),
        });

        let marker, i;
        let infoWindow  = new google.maps.InfoWindow()
        let bounds      = new google.maps.LatLngBounds();

        $.ajax({
            type        : 'post',
            url         : '{{ url('filter-property') }}',
            data        : {
                _token              : '{{ csrf_token() }}',
                property_type       : $('#filter_property_type').val(),
                transaction_type    : $('#filter_transaction_type').val(),
                postal_city_street  : $('#filter_postal_city_street').val(),
                min_price           : $('#filter_min').val(),
                max_price           : $('#filter_max').val(),
                bed                 : $('#filter_bed').val(),
                bath                : $('#filter_bath').val(),
                size                : $('#filter_size').val(),
            },
            success : function (response) {
                console.log(response);
                if(response.length === 0) {
                    $('#error_message_filter').text("NO data available");
                } else {
                    $('#res').hide();
                    let position;
                    for (i = 0; i < response.length; i++) {
                        position = new google.maps.LatLng(response[i].latitude, response[i].longitude);
                        map.setCenter(position);
                        marker = new google.maps.Marker({
                            position : position,
                            map      : map,

                        });
                        bounds.extend(marker.position);
                        google.maps.event.addListener(marker, 'click', (function (marker, i) {
                            return function () {
                                infoWindow.setContent(response[i].address);
                                infoWindow.open(map, marker);
                            }
                        })(marker, i));
                    }

                    let listener = google.maps.event.addListener(map, "idle", function () {
                        map.setZoom(8);
                        google.maps.event.removeListener(listener);
                    });
                }
            },
            error   : function (res_filter) {
                alert(res_filter.statusText);
            }

        })
    }
    /*--- END FILTER ---*/


    // //for input field
    // $(document).on('blur','.property_filter_input_data',function () {
    //     setTimeout(function(){
    //         //alert("No filter found!");
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'Oops...',
    //             text: 'No Properties Found With These Filters. Please Change Your Inputs!',
    //             // footer: '<a href="">Why do I have this issue?</a>'
    //         });
    //     }, 2000);//wait 2 seconds
    // });
    //for drop-down-list
    // $(document).on('blur','.property_filter_data',function () {
    //     setTimeout(function(){
    //         //alert("No filter found!");
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'Oops...',
    //             text: 'No Properties Found With These Filters. Please Change Your Inputs!',
    //             // footer: '<a href="">Why do I have this issue?</a>'
    //         });
    //     }, 2000);//wait 2 seconds
    // });
    //for filter box input

    /*$(document).on('click', '.filter_btn', function() {
        /!*filterFormSubmit();
        google.maps.event.addDomListener(window, 'load', filterFormSubmit);*!/
    });*/

    //search filter load map
    function  filterFormSubmit() {
        $('#error_message_filter').text('');
        let map = new google.maps.Map(document.getElementById('map'), {
            zoom    : 4,
            center  : new google.maps.LatLng(54.2925715, -89.3642582),
        });

        let infoWindow      = new google.maps.InfoWindow()
        let marker, i;
        let bounds = new google.maps.LatLngBounds();

        $.ajax({
            type    : 'get',
            url     : '{{ url('property-data') }}'+'?property_type='+$('#filter_property_type').val()+'&transaction_type='+$('#filter_transaction_type').val()+'&postal_city_street='+$('#filter_postal_city_street').val()
                +'&min_price='+$('#filter_min').val()+'&max_price='+$('#filter_max').val()+'&bed='+$('#filter_bed').val() +'&bath='+$('#filter_bath').val()+'&size='+$('#filter_size').val(),
            success : function (res_filter) {
                console.log(res_filter);
                // if(res_filter) {
                //     console.log("NO data available");
                //     $('#res').html('<div class="text-danger text-center">' + 'No filter found' + '</div>').show();
                //
                //     Swal.fire({
                //         icon: 'error',
                //         title: 'Oops...',
                //         text: 'No Properties Found With These Filters. Please Change Your Inputs!',
                //         timer: 2000,
                //         // footer: '<a href="">Why do I have this issue?</a>'
                //     });
                //     // setTimeout(function(){
                //     //     location.reload()
                //     // }, 10);
                //
                // }
                // if(!res_filter){
                //     alert('no ciy found');
                // }
                if(res_filter.length === 0) {
                    console.log("NO data available");
                    $('#error_message_filter').text("NO data available");



                    // $('#res').html('<div class="text-danger text-center">' + 'No filter found' + '</div>').show();


                    // setTimeout(function(){
                    //     location.reload()
                    // }, 10);

                }
                else {
                    $('#res').hide();
                    for (i = 0; i < res_filter.length; i++) {
                        position = new google.maps.LatLng(res_filter[i].latitude, res_filter[i].longitude);
                        map.setCenter(position);
                        marker = new google.maps.Marker({
                            position: position,
                            map: map,

                        });
                        // bounds.extend(position);
                        bounds.extend(marker.position);
                        google.maps.event.addListener(marker, 'click', (function (marker, i) {
                            return function () {
                                infoWindow.setContent(res_filter[i].address);
                                infoWindow.open(map, marker);
                            }
                        })(marker, i));


                    }


                    // Automatically center the map fitting all markers on the screen
                    // map.fitBounds(bounds);
                    // map.panToBounds(bounds);

                    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
                    // var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
                    //     this.setZoom(8);
                    //     google.maps.event.removeListener(boundsListener);
                    // });
                    var listener = google.maps.event.addListener(map, "idle", function () {
                        map.setZoom(8);
                        google.maps.event.removeListener(listener);
                    });
                }
            },
            error : function (res_filter) {
                alert('no filter found');
                // console.log('no data foundlll');
            }

        })
    }
</script>


