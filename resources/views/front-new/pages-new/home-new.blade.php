@extends('front-new.layout-new.master-new')
<style>
    .ag-timeline-card_item{
        margin-bottom: 40px;
    }
    .preview-img{
        height: auto;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
    .card-img-top{
        height: 300px!important;
        width: 100%;
        object-fit: cover;
    }
    .owl-carousel .item .card{
        height: 100%;
    }
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
    .testimonial-carousel .owl-nav button.owl-prev {
        font-size: 40px;
        background: #fff !important;
        color: #262222 !important;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        position: absolute;
        top: -300px;
        left: 114px;
        box-shadow: 0px 3px 6px 2px #00000029;
    }
    .testimonial-carousel .owl-nav button.owl-next {
        font-size: 40px;
        background: #fff !important;
        color: #262222 !important;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        position: absolute;
        top: -300px;
        right: 114px;
        box-shadow: 0px 3px 6px 2px #00000029;
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
    .property_badge{
        position: absolute;
        z-index: 100;
        font-size: 15px;
        font-weight:500;
        background-color: #1ed760;
        color: white;
        padding: 5px;
    }

    /* Extra small devices (phones, 540 and down) */
    /*@media only screen and (max-width: 600px) {*/
    /*    .strategy-box .nav-pills .nav-link{*/
    /*        background-color: #fff;*/
    /*    }*/
    /*    .bdr-1{*/
    /*        border-color: #D3D4D5;*/
    /*        border-right: 1px solid #D3D4D5;*/
    /*        border-top-right-radius: 40px;*/
    /*        border-bottom-right-radius: 40px;*/
    /*    }*/
    /*    .bdr-2{*/
    /*        border-color: #D3D4D5;*/
    /*        border-left: 1px solid #D3D4D5;*/
    /*        border-top-left-radius: 40px;*/
    /*        border-bottom-left-radius: 40px;*/
    /*    }*/
    /*    .bdr-3{*/
    /*        border-color: #D3D4D5;*/
    /*        border-left: 1px solid #D3D4D5;*/
    /*        border-right: 1px solid #D3D4D5;*/
    /*        border-top-left-radius: 40px;*/
    /*        border-bottom-left-radius: 40px;*/
    /*        border-top-right-radius: 40px;*/
    /*        border-bottom-right-radius: 40px;*/
    /*    }*/
    /*    .card-img-top{*/
    /*        height: 200px!important;*/
    /*        width: 100%;*/
    /*        object-fit: cover;*/
    /*    }*/
    /*}*/
    /*--- END MAP SIDEBAR ---*/
    html{
        scroll-behavior: smooth;
    }
</style>
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
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="text-white fs-12">Property Type</label>
                            <select class="form-control br-30 fs-12 property_filter_data" id="filter_property_type" name="filter_property_type">
                                <option value="none">Select Category</option>
                                @foreach($allCategory as $categories)
                                    <option value="{{$categories->id}}" {{ (isset($params['filter_property_type']) && $params['filter_property_type'] == $categories->id) ? 'selected' : '' }}>{{$categories->name}}</option>
                                @endforeach
                                {{--                                <option value="residential">Residential</option>--}}
                                {{--                                <option value="commercial">Commercial</option>--}}
                                {{--                                <option value="industrial">Industrial</option>--}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="property_type" class="text-white fs-12">Transaction Type</label>
                            <select class="form-control br-30 fs-12 property_filter_data" id="filter_transaction_type" name="filter_transaction_type">
                                <option selected>none</option>
                                <option value="pre-construct">Upcoming Pre-Construction Projects</option>
                                <option value="sale">New Construction For Sale/Lease</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="text-white fs-12">Postal Code, City or Street
                                Name</label>
                            <input type="search" class="form-control br-30 fs-12 property_filter_input_data" placeholder="none" id="filter_postal_city_street" name="filter_postal_city_street">
                            <div id="res"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="text-white fs-12">Price</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-6">
                                <div class="form-group">
                                    <input type="text" class="form-control br-30 fs-12 property_filter_input_data" placeholder="Min" value="0" id="filter_min" name="filter_min">
                                    <label for="exampleFormControlSelect1" class="text-white fs-12" style="margin-top: 7px;">Min</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="form-group">
                                    <input type="text" class="form-control br-30 fs-12 property_filter_input_data" placeholder="Max" value="20000000" id="filter_max" name="filter_max">
                                    <label for="exampleFormControlSelect1" class="text-white fs-12" style="margin-top: 7px;">Max</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
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
                                        <option value="5">5+</option>
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
                                        <option value="5">5+</option>
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
                                        <option value="0-2000">0 – 2,000 SqFt</option>
                                        <option value="2001-3000">2,001 - 3,000 SqFt</option>
                                        <option value="3001-4000">3,001 - 4,000 SqFt</option>
                                        <option value="4001-5000">4,001 - 5,000 SqFt</option>
                                        <option value="5001-7000">5001 - 7,000 SqFt</option>
                                        <option value="7001-10000">7,001 - 10,000 SqFt</option>
                                        <option value="10000">10,000+</option>
                                        {{--<option value="0 - 2,000 SqFt">0 – 2,000 SqFt</option>
                                        <option value="2,001 - 3,000 SqFt">2,001 - 3,000 SqFt</option>
                                        <option value="3,001 - 4,000 SqFt">3,001 - 4,000 SqFt</option>
                                        <option value="4,001 - 5,000 SqFt">4,001 - 5,000 SqFt</option>
                                        <option value="5001 - 7,000 SqFt">5001 - 7,000 SqFt</option>
                                        <option value="7,001 - 10,000 SqFt">7,001 - 10,000 SqFt</option>
                                        <option value="10,000+">10,000+</option>--}}
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
                <div class="col-lg-6 offset-lg-3">
                    <h1 class="fs-40 text-center bb-2"><span class="fw-700">About Us</span></h1>
                </div>
                {{--                <div class="col-lg-12">--}}
                {{--                    <h1 class="fs-40 fw-700 text-center">About Us</h1>--}}
                {{--                </div>--}}
            </div>
            <div class="row mt-40">
                <div class="col-lg-5 center">
                    {{--                    <h2 class="fs-34 fw-700">Heading</h2>--}}
                    <p>Tutunji Realty aims to help investors, buyers and sellers locally and abroad have a professional and simple grasp on the ever so changing market of Canadian real estate. We aim to achieve this with our
                        sophisticated digital systems, vast realtor & developer network and platform of thousands of market participants to find, market, and match our clients dream homes or investments with their goals.</p>
                    <p>We specialize to investing, buying, selling and leasing residential and commercial pre-construction and new construction real estate in Ontario, Canada.</p>
                    <div class="text-center">
                        <img src="{{asset('')}}frontend/assets/imgs/Logo SVG (Brokered By).svg" alt="" width="200px" height="200px">
                    </div>
                    {{--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut--}}
                    {{--                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco--}}
                    {{--                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in--}}
                    {{--                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat--}}
                    {{--                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>--}}
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
                <div class="col-lg-3 text-center">
                    <div class="box h-100">
                        <img src="{{asset('')}}frontend/assets/imgs/Group%2031.png" alt="" class="img-fluid mt--82">
                        <h4 class="fs-20 mt-20">Buying</h4>
                        <p>Our team of expert realtors guides you through the exciting journey of buying pre-construction real estate. From finding the perfect project & property to securing the best deal, we'll be with you every step of the way.</p>
                    </div>
                </div>
                <div class="col-lg-3 text-center">
                    <div class="box mt-71">
                        <img src="{{asset('')}}frontend/assets/imgs/Group%2033.png" alt="" class="img-fluid mt--82">
                        <h4 class="fs-20 mt-20">Selling</h4>
                        <p>Ready to sell your pre-construction? Our team of expert realtors offers personalized assistance to help you secure the best possible deal. We'll conduct a thorough market analysis, create a customized marketing plan, and guide you through every stage of the selling process.</p>
                    </div>
                </div>
                <div class="col-lg-3 text-center">
                    <div class="box mt-71">
                        <img src="{{asset('')}}frontend/assets/imgs/Group%2031.png" alt="" class="img-fluid mt--82">
                        <h4 class="fs-20 mt-20">Leasing</h4>
                        <p>Looking to lease or find a tenant for your new pre-construction? Let our expert realtors help you! We offer personalized assistance to help you find the perfect rental or tenant for your property in new construction. Our comprehensive services make the leasing experience stress-free and enjoyable.</p>
                    </div>
                </div>
                <div class="col-lg-3 text-center">
                    <div class="box mt-71 h-100">
                        <img src="{{asset('')}}frontend/assets/imgs/Group%2032.png" alt="" class="img-fluid mt--82">
                        <h4 class="fs-20 mt-20">Investing</h4>
                        <p>Ready to invest in pre-construction real estate? Let our expert realtors guide you to success. We offer personalized assistance to help you identify potential investment properties and make informed decisions.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="pre_construction">
        <div class="row mt-120">
            <div class="col-lg-6 offset-lg-3">
                <h1 class="fs-40 text-center bb-2"><span class="fw-700">Upcoming Pre-Construction Projects</span></h1>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-lg-8 offset-lg-2">
                <p class="text-center">Get VIP access to the latest pre-construction projects! Be the first to discover the hottest developments and take advantage of pre-construction pricing.</p>
            </div>
        </div>
        <div class="row mt-40 dn">
            @if(empty($allPreConstructData))<p class="text-center" style="margin-left: auto;margin-right: auto">
                Whoops! No New Upcoming Pre-Construction Projects Property Found</p>
            @else
                @foreach($allPreConstructData as $pre_constructData)
                    <div class="col-lg-4">
                        <a href="{{url('/pre-construct-property',$pre_constructData['id'])}}" class="text-black" style="text-decoration: none">
                            {{--                            <a href="{{url('/pre-construct-search')}}" class="text-black" style="text-decoration: none">--}}
                            <div class="box1">
                                <div class="row mt-20">
                                    <div class="col-lg-6 col-6 preview-img"
                                         @if($pre_constructData['property_media'])
                                             style="background-image: url('{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$pre_constructData['property_media']['media_name'])}}');"
                                         @else
                                             style="background-image: url('{{asset('default/404-not-found.jpg')}}');" @endif>
                                    </div>
                                    <div class="col-lg-6 col-6 mt-20">
                                        <h6 class="fs-18 fw-700 text-black">From ${{$pre_constructData['price'] ? $pre_constructData['price'] : '-'}} /month</h6>
                                        <ul class="list-unstyled fs-12 fw-700 text-black">
                                            {{--<li>{{\Illuminate\Support\Str::limit($pre_constructData['address'], 25) ? \Illuminate\Support\Str::limit($pre_constructData['address'],25) : '-'}}</li>--}}
                                            <li class="address_height">{{$pre_constructData['address']}}</li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-4 mt-3">
                                                        {{$pre_constructData['bedrooms'] ? $pre_constructData['bedrooms'] : '-'}}&nbsp;<i class="fa fa-bed"></i></br>Bedrooms
                                                    </div>
                                                    <div class="col-md-8 mt-3">
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
            <div class="col-lg-6 offset-lg-3">
                {{--                <button type="button" class="btn btn-info">View more properties</button>--}}
                <a href="{{url('/pre-construct-search')}}" class="btn btn-info">View All Upcoming Pre-Construction Projects</a>
            </div>
        </div>
    </div>
    <!--   mob view for new pre-construction -->
    <div class="container-fluid dn-1">
        <div class="row mt-40">
            <div class="col-lg-12 pr-0">
                <div class="owl-carousel blog-carousel owl-theme hide-nav">
                    @if(empty($allPreConstructData))
                        <p class="text-center" style="margin-left: auto;margin-right: auto">
                            Whoops! No New Upcoming Pre-Construction Projects Found
                        </p>
                    @else
                        @foreach($allPreConstructData as $pre_constructData)
                            <div class="item">
                                {{--                                <a href="{{url('/pre-construct-search')}}" class="text-black" style="text-decoration: none">--}}
                                <a href="{{url('/pre-construct-property',$pre_constructData['id'])}}" class="text-black" style="text-decoration: none">
                                    <div class="box1">
                                        <div class="row">
                                            <div class="col-lg-6 col-6 preview-img"  @if($pre_constructData['property_media'])
                                                style="background-image: url('{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$pre_constructData['property_media']['media_name'])}}');"
                                                 @else style="background-image: url('{{asset('default/404-not-found.jpg')}}');" @endif>
                                            </div>
                                            <div class="col-lg-6 col-6 mt-20">
                                                <h6 class="fs-18 fw-700 text-black">From ${{($pre_constructData['price']) ? $pre_constructData['price'] : '-'}} /month</h6>
                                                <ul class="list-unstyled fs-12 fw-700 text-black">
                                                    <li class="address_height">{{$pre_constructData['address']}}</li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-md-4 mt-3">
                                                                {{$pre_constructData['bedrooms'] ? $pre_constructData['bedrooms'] : '-'}}</br>Bedrooms
                                                            </div>
                                                            <div class="col-md-8 mt-3">
                                                                {{$pre_constructData['bathrooms'] ? $pre_constructData['bathrooms'] : '-'}}</br>Bathrooms
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
        <div class="row mt-40">
            <div class="col-lg-6 offset-lg-3">
                {{--                <button type="button" class="btn btn-info">View more properties</button>--}}
                <a href="{{url('/pre-construct-search')}}" class="btn btn-info">View All Upcoming Pre-Construction Projects</a>
            </div>
        </div>
    </div>
    <!--  end of mob view -->
    <div class="bg-grey mt-80 dn" id="for_sales">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <h1 class="fs-40 text-center bb-2"><span class="fw-700">New Construction For Sale/Lease</span></h1>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-lg-8 offset-lg-2">
                    <p class="text-center">Explore the latest MLS listings for new construction homes and assignments! Get the chance to own or lease a brand new home before it's even built or lived in.</p>
                </div>
            </div>
            <div class="row mt-40">
                @if(empty($allSaleData))
                    <p class="text-center" style="margin-left: auto;margin-right: auto">
                        Whoops!  No New Construction For Sale/Lease Property Found
                    </p>
                @else
                    @foreach($allSaleData as $saleData)
                        <div class="col-lg-4">
                            {{-- <a href="{{url('/sale-search')}}" class="text-black" style="text-decoration: none"> --}}
                            <a href="{{url('/sale-property',$saleData['id'])}}" class="text-black" style="text-decoration: none">
                                <div class="box1">
                                    <div class="row mt-20">
                                        @if(!empty($saleData['listed_in']))
                                            <span class="property_badge">
                                            {{$saleData['listed_in']}}
                                                {{-- <i class="fa fa-tags"></i>--}}
                                        </span>
                                        @endif
                                        {{--                                        <span style="position: absolute;z-index: 100;font-size: 20px;background-color: #E67A00;color: white;">Hello<i class="fa fa-tags"></i></span>--}}
                                        <div class="col-lg-6 col-6 preview-img"
                                             @if(!empty($saleData['property_media']['media_name']))
                                                 @if($saleData['source'] == 'Frontend')
                                                     style="background-image: url('{{asset('frontend/assets/property-images/media-file/'.$saleData['property_media']['media_name'])}}');"
                                             @else
                                                 style="height: auto;
                                                    background-image: url('{{asset('admin-panel/assets/property-images/media-file/sale/'.$saleData['property_media']['media_name'])}}');
                                                    background-size: cover;
                                                    background-repeat: no-repeat;
                                                    background-position: center;" @endif
                                             @else style="height: auto;
                                                 background-image: url('{{asset('default/404-not-found.jpg')}}');
                                                background-size: cover;
                                                background-repeat: no-repeat;
                                                background-position: center;" @endif>
                                        </div>
                                        <div class="col-lg-6 col-6 mt-20">
                                            <h6 class="fs-18 fw-700 text-black">From ${{($saleData['price']) ? $saleData['price'] : '-'}} /month</h6>
                                            <ul class="list-unstyled fs-12 fw-700 text-black">
                                                <li class="fw-700 text-black address_height">{{$saleData['address']}}</li>
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
                <div class="col-lg-6 offset-lg-3">
                    {{--                    <button type="button" class="btn btn-info">View more properties</button>--}}
                    <a href="{{url('/sale-search')}}" class="btn btn-info">View All New Construction For Sale/Lease</a>
                </div>
            </div>
        </div>
    </div>
    <!--    mob view for sales-->
    <div class="bg-grey mt-80 dn-1 pr-0 pl-0">
        <div class="container-fluid">
            <div class="row mt-120">
                <div class="col-lg-4">
                    <h1 class="fs-40 text-center bb-2">New Construction For Sale/Lease</h1>
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
                                Whoops! No New Construction For Sale/Lease Found
                            </p>
                        @else
                            @foreach($allSaleData as $saleData)
                                <div class="item">
                                    {{--                                    <a href="{{url('/sale-search')}}" class="text-black" style="text-decoration: none">--}}
                                    <a href="{{url('/sale-property',$saleData['id'])}}" class="text-black" style="text-decoration: none;">
                                        <div class="box1">
                                            <div class="row">
                                                @if(!empty($saleData['listed_in']))
                                                    <span class="property_badge">
                                            {{$saleData['listed_in']}}
                                                        {{--                                            <i class="fa fa-tags"></i>--}}
                                        </span>
                                                @endif
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
                                                </div>
                                                <div class="col-lg-6 col-6 mt-20">
                                                    <h6 class="fs-18 fw-700 text-black">From ${{$saleData['price'] ? $saleData['price'] : '-'}} /month</h6>
                                                    <ul class="list-unstyled fs-12 fw-700 text-black">
                                                        <li class="address_height">{{$saleData['address']}}</li>
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
                <div class="col-lg-6 offset-lg-3">
                    {{--                    <button type="button" class="btn btn-info">View more properties</button>--}}
                    <a href="{{url('/sale-search')}}" class="btn btn-info">View All New Construction For Sale/Lease</a>
                </div>
            </div>
        </div>
    </div>
    <!--   end of mob view-->
    <div class="bg-green strategy-container" id="container-gsap">
        <div class="container g-timeline-header">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <h1 class="fs-40 text-center bb-2" id="container-gsap-title">
                        Our Million Dollar Strategy
                    </h1>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-lg-8 offset-lg-2">
                    <p class="text-center">
                        Maximize Your Real Estate Returns with Our Million Dollar Strategy! Buy, invest, sell or lease with confidence. Check out our proven approach for Pre-Construction and New Construction Properties Below.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="strategy-box">
                        <ul
                            class="nav nav-pills mb-3 justify-content-center"
                            id="pills-tab"
                            role="tablist"
                        >
                            <li class="nav-item bdr-1" role="presentation">
                                <a
                                    class="nav-link active"
                                    id="pills-buyer-home-tab"
                                    data-toggle="pill"
                                    href="#pills-buyer-home"
                                    role="tab"
                                    aria-controls="pills-buyer-home"
                                    aria-selected="true"
                                    onclick="scrollToSectionTop()"
                                >Buying</a
                                >
                            </li>
                            <li class="nav-item bdr-2" role="presentation">
                                <a
                                    class="nav-link"
                                    id="pills-seller-profile-tab"
                                    data-toggle="pill"
                                    href="#pills-seller-profile"
                                    role="tab"
                                    aria-controls="pills-seller-profile"
                                    aria-selected="false"
                                    onclick="scrollToSectionTop(); sellerTimelineStart();"
                                >Selling/Leasing</a
                                >
                            </li>
                            <li class="nav-item bdr-3" role="presentation">
                                <a
                                    class="nav-link"
                                    id="pills-investing-profile-tab"
                                    data-toggle="pill"
                                    href="#pills-investing-profile"
                                    role="tab"
                                    aria-controls="pills-investing-profile"
                                    aria-selected="false"
                                    onclick="scrollToSectionTop(); investorTimelineStart();"
                                >Investing</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container g-timeline-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content" id="pills-tabContent">
                        <div
                            class="tab-pane fade show active"
                            id="pills-buyer-home"
                            role="tabpanel"
                            aria-labelledby="pills-buyer-home-tab"
                        >
                            <div class="row">
                                <div class="col-lg-12 mt-10" style="margin-bottom: 40px;">
                                    <h1 class="fs-30 text-center">ARE YOU BUYING PRE-CONSTRUCTION?</h1>
                                </div>
                            </div>
                            <div class="row mt-40">
                                <section class="timeline-section">
                                    <div class="timeline-container">
                                        <div class="buyer-timeline ag-timeline">
                                            <!-- Progress Bar Line Code-->
                                            <div class="buyer-timeline_line ag-timeline_line">
                                                <div
                                                    class="buyer-timeline_line-progress ag-timeline_line-progress"
                                                ></div>
                                            </div>

                                            <div class="ag-timeline_list" id="timeline_lists">
                                                <!-- Box 1 -->
                                                <div class="buyer-timeline_item ag-timeline_item">
                                                    <div class="ag-timeline-card_box">
                                                        <div
                                                            class="buyer-timeline-card_point-box ag-timeline-card_point-box"
                                                        >
                                                            <div
                                                                class="ag-timeline-card_point"
                                                                id="timeline-cirlce"
                                                            ></div>
                                                        </div>
                                                    </div>

                                                    <!-- Box Code-->
                                                    <div class="ag-timeline-card_item">
                                                        <div class="ag-timeline-card_inner">
                                                            <div class="timeline-card">
                                                                <div class="info">
                                                                    <h5 class="title">Step 01</h5>
                                                                    <img src="{{asset('')}}frontend/assets/imgs/001-home.png" alt="" class="img-fluid w-52"/>
                                                                    <hr />
                                                                    <p>Understand the property spectrum we are working with for the client. This can vary from houses, apartments or condo pre-constructions.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Box 2 -->
                                                <div class="buyer-timeline_item ag-timeline_item">
                                                    <div class="ag-timeline-card_box">
                                                        <div class="buyer-timeline-card_point-box ag-timeline-card_point-box">
                                                            <div class="ag-timeline-card_point" id="timeline-cirlce"></div>
                                                        </div>
                                                    </div>

                                                    <!-- Box Code-->
                                                    <div class="ag-timeline-card_item">
                                                        <div class="ag-timeline-card_inner">
                                                            <div class="timeline-card">
                                                                <div class="info">
                                                                    <h5 class="title">Step 02</h5>
                                                                    <img src="{{asset('')}}frontend/assets/imgs/002-save-money.png" alt="" class="img-fluid w-52"/>
                                                                    <hr />
                                                                    <p> Get clientele financial situation together and forward it to the appropriate mortgage broker, from our massive Canadian mortgage agent & bank mortgaging network. This ensures all our clients get the lowest interest rates for their situation. Clients are also free to work with their preferred mortgage provider.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Box 3 -->
                                                <div class="buyer-timeline_item ag-timeline_item">
                                                    <div class="ag-timeline-card_box">
                                                        <div class="buyer-timeline-card_point-box ag-timeline-card_point-box">
                                                            <div class="ag-timeline-card_point" id="timeline-cirlce"></div>
                                                        </div>
                                                    </div>

                                                    <!-- Box Code-->
                                                    <div class="ag-timeline-card_item">
                                                        <div class="ag-timeline-card_inner">
                                                            <div class="timeline-card">
                                                                <div class="info">
                                                                    <h5 class="title">Step 03</h5>
                                                                    <img src="{{asset('')}}frontend/assets/imgs/003-buildings.png" alt="" class="img-fluid w-52"/>
                                                                    <hr />
                                                                    <p>Develop the top 10 search areas revolving around the financial situation.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Box 4 -->
                                                <div class="buyer-timeline_item ag-timeline_item">
                                                    <div class="ag-timeline-card_box">
                                                        <div class="buyer-timeline-card_point-box ag-timeline-card_point-box">
                                                            <div class="ag-timeline-card_point" id="timeline-cirlce"></div>
                                                        </div>
                                                    </div>

                                                    <!-- Box Code-->
                                                    <div class="ag-timeline-card_item">
                                                        <div class="ag-timeline-card_inner">
                                                            <div class="timeline-card">
                                                                <div class="info">
                                                                    <h5 class="title">Step 04</h5>
                                                                    <img src="{{asset('')}}frontend/assets/imgs/Outline.png" alt="" class="img-fluid w-52"/>
                                                                    <hr />
                                                                    <p>Put together strategies to best approach new pre-construction projects, to make sure our clients are put on top in the eyes of builders & selection of their units. No matter what happens, we are ready to have your back in Ontario’s consistently heated market to ensure our clients always have the most efficient and competitive upper hand. </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Box 5 -->
                                                <div class="buyer-timeline_item ag-timeline_item">
                                                    <div class="ag-timeline-card_box">
                                                        <div class="buyer-timeline-card_point-box ag-timeline-card_point-box">
                                                            <div class="ag-timeline-card_point" id="timeline-cirlce"></div>
                                                        </div>
                                                    </div>

                                                    <!-- Box Code-->
                                                    <div class="ag-timeline-card_item">
                                                        <div class="ag-timeline-card_inner">
                                                            <div class="timeline-card">
                                                                <div class="info">
                                                                    <h5 class="title">Step 05</h5>
                                                                    <img src="{{asset('')}}frontend/assets/imgs/005-guarantee.png" alt="" class="img-fluid w-52"/>
                                                                    <hr />
                                                                    <p>
                                                                        Close pre-construction deals hassle-free and with a peace of mind, knowing you’re in the hands of professionals that will make sure you get the best deal, professionally and efficiently, on the property you are chasing after, guaranteed
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>

                        <div
                            class="tab-pane fade"
                            id="pills-seller-profile"
                            role="tabpanel"
                            aria-labelledby="pills-seller-profile-tab"
                        >
                            <div class="row">
                                <div class="col-lg-12 mt-10" style="margin-bottom: 40px;">
                                    <h1 class="fs-30 text-center">ARE YOU SELLING/LEASING YOUR PRE-CONSTRUCTION?</h1>
                                </div>
                            </div>
                            <div class="row mt-40">
                                <section class="timeline-section">
                                    <div class="timeline-container">
                                        <div class="seller-timeline ag-timeline">
                                            <!-- Progress Bar Line Code-->
                                            <div class="seller-timeline_line ag-timeline_line">
                                                <div class="seller-timeline_line-progress ag-timeline_line-progress"></div>
                                            </div>

                                            <div class="ag-timeline_list">
                                                <!-- Box 1 -->
                                                <div class="seller-timeline_item ag-timeline_item">
                                                    <div class="ag-timeline-card_box">
                                                        <div class="seller-timeline-card_point-box ag-timeline-card_point-box">
                                                            <div
                                                                class="ag-timeline-card_point"
                                                                id="timeline-cirlce"
                                                            ></div>
                                                        </div>
                                                    </div>

                                                    <!-- Box Code-->
                                                    <div class="ag-timeline-card_item">
                                                        <div class="ag-timeline-card_inner">
                                                            <div class="timeline-card">
                                                                <div class="info">
                                                                    <h5 class="title">Step 01</h5>
                                                                    <img
                                                                        src="{{asset('')}}frontend/assets/imgs/001-home.png"
                                                                        alt=""
                                                                        class="img-fluid w-52"
                                                                    />
                                                                    <hr />
                                                                    <p> This must be an assignment or pre-construction owned for less than 5 years.
                                                                        To sell these properties, we either visit and analyze the property or research the assignment property spectrum we are working with for the client. This can vary from houses, apartments or condos to sell or lease the property.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Box 2 -->
                                                <div class="seller-timeline_item ag-timeline_item">
                                                    <div class="ag-timeline-card_box">
                                                        <div
                                                            class="seller-timeline-card_point-box ag-timeline-card_point-box"
                                                        >
                                                            <div
                                                                class="ag-timeline-card_point"
                                                                id="timeline-cirlce"
                                                            ></div>
                                                        </div>
                                                    </div>

                                                    <!-- Box Code-->
                                                    <div class="ag-timeline-card_item">
                                                        <div class="ag-timeline-card_inner">
                                                            <div class="timeline-card">
                                                                <div class="info">
                                                                    <h5 class="title">Step 02</h5>
                                                                    <img
                                                                        src="{{asset('')}}frontend/assets/imgs/002-save-money.png"
                                                                        alt=""
                                                                        class="img-fluid w-52"
                                                                    />
                                                                    <hr />
                                                                    <p> Figure out what client is looking for in their property and strategically compare it to the real-time MLS pricing or assignments/properties of the same project for accurate comparison and outcome of pricing, in the similar area. This will provide us with equity estimates, future mortgaging power, and appraisal estimates for our clients to have a good understanding of what their next steps are.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Box 3 -->
                                                <div class="seller-timeline_item ag-timeline_item">
                                                    <div class="ag-timeline-card_box">
                                                        <div
                                                            class="seller-timeline-card_point-box ag-timeline-card_point-box"
                                                        >
                                                            <div
                                                                class="ag-timeline-card_point"
                                                                id="timeline-cirlce"
                                                            ></div>
                                                        </div>
                                                    </div>

                                                    <!-- Box Code-->
                                                    <div class="ag-timeline-card_item">
                                                        <div class="ag-timeline-card_inner">
                                                            <div class="timeline-card">
                                                                <div class="info">
                                                                    <h5 class="title">Step 03</h5>
                                                                    <img
                                                                        src="{{asset('')}}frontend/assets/imgs/003-buildings.png"
                                                                        alt=""
                                                                        class="img-fluid w-52"
                                                                    />
                                                                    <hr />
                                                                    <p>
                                                                        Stage the property, capture all media and content needed for marketing purposes, and develop a strategically put together MLS listing for optimal selling results, tailored around our clientele needs. Your property will be listed on the MLS, Realtor.ca and the Tutunji Realty Website.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Box 4 -->
                                                <div class="seller-timeline_item ag-timeline_item">
                                                    <div class="ag-timeline-card_box">
                                                        <div
                                                            class="seller-timeline-card_point-box ag-timeline-card_point-box"
                                                        >
                                                            <div
                                                                class="ag-timeline-card_point"
                                                                id="timeline-cirlce"
                                                            ></div>
                                                        </div>
                                                    </div>

                                                    <!-- Box Code-->
                                                    <div class="ag-timeline-card_item">
                                                        <div class="ag-timeline-card_inner">
                                                            <div class="timeline-card">
                                                                <div class="info">
                                                                    <h5 class="title">Step 04</h5>
                                                                    <img
                                                                        src="{{asset('')}}frontend/assets/imgs/Outline.png"
                                                                        alt=""
                                                                        class="img-fluid w-52"
                                                                    />
                                                                    <hr />
                                                                    <p>
                                                                        Start accepting offers, either through fixed offers or a bid war, depending on our clientele situation. No matter what happens, we are ready to have your back in Ontario’s consistently heated market to ensure our clients always have the most efficient and competitive upper hand.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Box 5 -->
                                                <div class="seller-timeline_item ag-timeline_item">
                                                    <div class="ag-timeline-card_box">
                                                        <div
                                                            class="seller-timeline-card_point-box ag-timeline-card_point-box"
                                                        >
                                                            <div
                                                                class="ag-timeline-card_point"
                                                                id="timeline-cirlce"
                                                            ></div>
                                                        </div>
                                                    </div>

                                                    <!-- Box Code-->
                                                    <div class="ag-timeline-card_item">
                                                        <div class="ag-timeline-card_inner">
                                                            <div class="timeline-card">
                                                                <div class="info">
                                                                    <h5 class="title">Step 05</h5>
                                                                    <img
                                                                        src="{{asset('')}}frontend/assets/imgs/005-guarantee.png"
                                                                        alt=""
                                                                        class="img-fluid w-52"
                                                                    />
                                                                    <hr />
                                                                    <p>
                                                                        Close offers hassle-free and with a peace of mind, knowing you’re in the hands of professionals that will make sure you get the best deal, professionally and efficiently, guaranteed.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>

                        <div
                            class="tab-pane fade"
                            id="pills-investing-profile"
                            role="tabpanel"
                            aria-labelledby="pills-investing-profile-tab"
                        >
                            <div class="row">
                                <div class="col-lg-12 mt-10" style="margin-bottom: 40px;">
                                    <h1 class="fs-30 text-center">ARE YOU INVESTING IN PRE-CONSTRUCTION?</h1>
                                </div>
                            </div>
                            <div class="row mt-40">
                                <section class="timeline-section">
                                    <div class="timeline-container">
                                        <div class="investor-timeline ag-timeline">
                                            <!-- Progress Bar Line Code-->
                                            <div class="investor-timeline_line ag-timeline_line">
                                                <div
                                                    class="investor-timeline_line-progress ag-timeline_line-progress"
                                                ></div>
                                            </div>

                                            <div class="ag-timeline_list">
                                                <!-- Box 1 -->
                                                <div
                                                    class="investor-timeline_item ag-timeline_item"
                                                    id="timeline-cirlce"
                                                >
                                                    <div class="ag-timeline-card_box">
                                                        <div
                                                            class="investor-timeline-card_point-box ag-timeline-card_point-box"
                                                        >
                                                            <div
                                                                class="ag-timeline-card_point"
                                                                id="timeline-cirlce"
                                                            ></div>
                                                        </div>
                                                    </div>

                                                    <!-- Box Code-->
                                                    <div class="ag-timeline-card_item">
                                                        <div class="ag-timeline-card_inner">
                                                            <div class="timeline-card">
                                                                <div class="info">
                                                                    <h5 class="title">Step 01</h5>
                                                                    <img
                                                                        src="{{asset('')}}frontend/assets/imgs/001-home.png"
                                                                        alt=""
                                                                        class="img-fluid w-52"
                                                                    />
                                                                    <hr />
                                                                    <p> Understand the property spectrum and investment we are working with for the client. This can vary from houses, apartments or condo pre-construction.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Box 2 -->
                                                <div
                                                    class="investor-timeline_item ag-timeline_item"
                                                    id="timeline-cirlce"
                                                >
                                                    <div class="ag-timeline-card_box">
                                                        <div
                                                            class="investor-timeline-card_point-box ag-timeline-card_point-box"
                                                        >
                                                            <div
                                                                class="ag-timeline-card_point"
                                                                id="timeline-cirlce"
                                                            ></div>
                                                        </div>
                                                    </div>

                                                    <!-- Box Code-->
                                                    <div class="ag-timeline-card_item">
                                                        <div class="ag-timeline-card_inner">
                                                            <div class="timeline-card">
                                                                <div class="info">
                                                                    <h5 class="title">Step 02</h5>
                                                                    <img
                                                                        src="{{asset('')}}frontend/assets/imgs/002-save-money.png"
                                                                        alt=""
                                                                        class="img-fluid w-52"
                                                                    />
                                                                    <hr />
                                                                    <p>Get clientele financial situation together and forward it to the appropriate mortgage broker, from our massive Canadian mortgage agent & bank mortgaging network. This ensures all our clients get the lowest interest rates for their investments. Clients are also free to work with their preferred mortgage provider.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Box 3 -->
                                                <div
                                                    class="investor-timeline_item ag-timeline_item"
                                                    id="timeline-cirlce"
                                                >
                                                    <div class="ag-timeline-card_box">
                                                        <div
                                                            class="investor-timeline-card_point-box ag-timeline-card_point-box"
                                                        >
                                                            <div
                                                                class="ag-timeline-card_point"
                                                                id="timeline-cirlce"
                                                            ></div>
                                                        </div>
                                                    </div>

                                                    <!-- Box Code-->
                                                    <div class="ag-timeline-card_item">
                                                        <div class="ag-timeline-card_inner">
                                                            <div class="timeline-card">
                                                                <div class="info">
                                                                    <h5 class="title">Step 03</h5>
                                                                    <img
                                                                        src="{{asset('')}}frontend/assets/imgs/003-buildings.png"
                                                                        alt=""
                                                                        class="img-fluid w-52"
                                                                    />
                                                                    <hr />
                                                                    <p>Develop the top 10 search areas revolving around the financial situation and investment goals.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Box 4 -->
                                                <div
                                                    class="investor-timeline_item ag-timeline_item"
                                                    id="timeline-cirlce"
                                                >
                                                    <div class="ag-timeline-card_box">
                                                        <div
                                                            class="investor-timeline-card_point-box ag-timeline-card_point-box"
                                                        >
                                                            <div
                                                                class="ag-timeline-card_point"
                                                                id="timeline-cirlce"
                                                            ></div>
                                                        </div>
                                                    </div>

                                                    <!-- Box Code-->
                                                    <div class="ag-timeline-card_item">
                                                        <div class="ag-timeline-card_inner">
                                                            <div class="timeline-card">
                                                                <div class="info">
                                                                    <h5 class="title">Step 04</h5>
                                                                    <img
                                                                        src="{{asset('')}}frontend/assets/imgs/Outline.png"
                                                                        alt=""
                                                                        class="img-fluid w-52"
                                                                    />
                                                                    <hr />
                                                                    <p> Put together strategies to best approach new pre-construction projects, to make sure our clients are put on top in the eyes of builders & selection of their units. No matter what happens, we are ready to have your back in Ontario’s consistently heated market to ensure our clients always have the most efficient and competitive upper hand when investing in real estate.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Box 5 -->
                                                <div
                                                    class="investor-timeline_item ag-timeline_item"
                                                    id="timeline-cirlce"
                                                >
                                                    <div class="ag-timeline-card_box">
                                                        <div
                                                            class="investor-timeline-card_point-box ag-timeline-card_point-box"
                                                        >
                                                            <div
                                                                class="ag-timeline-card_point"
                                                                id="timeline-cirlce"
                                                            ></div>
                                                        </div>
                                                    </div>

                                                    <!-- Box Code-->
                                                    <div class="ag-timeline-card_item">
                                                        <div class="ag-timeline-card_inner">
                                                            <div class="timeline-card">
                                                                <div class="info">
                                                                    <h5 class="title">Step 05</h5>
                                                                    <img src="{{asset('')}}frontend/assets/imgs/005-guarantee.png" alt="" class="img-fluid w-52"/>
                                                                    <hr />
                                                                    <p> Close pre-construction deals hassle-free and with a peace of mind, knowing you’re in the hands of professionals that will make sure you get the best deal, professionally and efficiently, on the property you are chasing after, guaranteed. We make sure our clients are positioned to take their next investment step, carefully thought out and executed, even if that is to lease, sell or refinance a property, all according to their investment goals.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
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

    <div class="bg-grey" id="our-team">
        <div class="container dn">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <h1 class="fs-40 text-center bb-2"><span class="fw-700">Our Team</span></h1>
                </div>
            </div>
            {{--            <div class="row">--}}
            {{--                <div class="col-lg-4 offset-lg-4">--}}
            {{--                    <h1 class="fs-40 text-center bb-2"><span class="fw-700">Our Team</span></h1>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <div class="row mt-20">
                <div class="col-lg-8 offset-lg-2">
                    <p class="text-center">Meet The Tutunji Realty Team!</p>
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
                                <img src="{{asset('default/blank-profile.png')}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$agentData->fullName ? $agentData->fullName : '-'}}</h5>
                                    <ul class="list-unstyled fs-21">
                                        <li>-</li>
                                        <li>{{$agentData->email ? $agentData->email : '-'}}</li>
                                        <li>{{$agentData->phone ? $agentData->phone : '-'}}</li>
                                    </ul>
                                    <hr>
                                    <ul class="list-unstyled list-inline text-center">
                                        @php($url =  url('agent'))
                                        <li class="list-inline-item">
                                            <a href="https://www.instagram.com/?url={{$url}}" target="_blank"><img src="{{asset('')}}frontend/assets/imgs/instagram.png" alt="" class="img-fluid" height="34px" width="34px"></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{$url}}" target="_blank"><img src="{{asset('')}}frontend/assets/imgs/linkedin.png" alt="" class="img-fluid"></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{$url}}" target="_blank"><img src="{{asset('')}}frontend/assets/imgs/Group 265.png" alt="" class="img-fluid"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <!-- mob view for agents -->
        <div class="container-fluid dn-1">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <h1 class="fs-40 text-center bb-2"><span class="fw-700">Our Team</span></h1>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-lg-8 offset-lg-2">
                    <p class="text-center">Meet The Tutunji Realty Team!</p>
                </div>
            </div>
            <div class="row mt-40">
                <div class="col-lg-12 pr-0">
                    <div class="owl-carousel blog-carousel owl-theme hide-nav">
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
        <!--   end of mob view for agents-->
    </div>

    <section id="browse_cities">
        <div class="container">
            <div class="row mt-120">
                <div class="col-lg-6 offset-lg-3">
                    <h1 class="fs-40 text-center bb-2"><span class="fw-700">Browse Areas</span></h1>
                </div>
            </div>
            {{--        <div class="row mt-120">--}}
            {{--            <div class="col-lg-4 offset-lg-4">--}}
            {{--                <h1 class="fs-40 text-center bb-2"><span class="fw-700">Browse Areas</span></h1>--}}
            {{--            </div>--}}
            {{--        </div>--}}
            <div class="row mt-20">
                <div class="col-lg-12">
                    <h6 class="fs-16 fw-700 text-center">Popular Areas</h6>
                    <p class="text-center">Find pre-construction & new construction real estate in popular areas, directly.</p>
                </div>
            </div>
            <div class="row mt-50">
                <div class="custom-col-2 text-center" id="browseCities" data-text="Toronto">
                    <img src="{{asset('')}}frontend/assets/imgs/Mask%20Group%2012.png" alt="" class="img-fluid">
                    <h6 class="fs-20 mt-10">Toronto</h6>
                </div>
                <div class="custom-col-2 text-center" id="browseCities" data-text="Mississauga">
                    <img src="{{asset('')}}frontend/assets/imgs/mississauga.png" alt="" class="img-fluid">
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

            {{--        <div class="row mt-120">--}}
            {{--            <div class="col-lg-2 offset-lg-5">--}}
            {{--                <h1 class="fs-40 text-center bb-2 fw-700">Blogs</h1>--}}
            {{--            </div>--}}
            {{--        </div>--}}

        </div>
    </section>

    <div class="container-fluid blog mt-40" id="blogs">
        <div class="row mt-120" style="margin-bottom: 50px;">
            <div class="col-lg-6 offset-lg-3">
                <h1 class="fs-40 text-center bb-2"><span class="fw-700">Blogs</span></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 pr-0 pl-0">
                <div class="owl-carousel blog-carousel1 owl-theme">
                    @foreach($allBlog as $blogData)
                        <div class="item">
                            <a href="{{url('/blog-detail',$blogData->id)}}" style="text-decoration: none;color: #262222;">
                                <div class="card">
                                    <img src="{{asset('admin-panel/assets/blog-image/'.$blogData->image)}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$blogData->title ? $blogData->title : '-'}}</h5>
                                        <p class="card-text">{{\Illuminate\Support\Str::limit($blogData->body ? $blogData->body : '-', 170)}}
                                        </p>
                                        <a href="{{url('/blog-detail',$blogData->id)}}" style="color: #164DF3; text-decoration: none;">Read more></a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="bg-grey mt-80" style="background-color: #EEEEEE" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <h1 class="fs-40 text-center bb-2"><span class="fw-700">Contact Us</span></h1>
                </div>
            </div>
            {{--            <div class="row">--}}
            {{--                <div class="col-lg-4 offset-lg-4">--}}
            {{--                    <h1 class="fs-40 text-center bb-2 fw-700">Contact Us</h1>--}}
            {{--                </div>--}}
            {{--            </div>--}}
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
        </div>
    </div>
    <div class="bg-parrotgreen" id="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 center">
                    <h1 class="fs-40 text-white">Sign Up for our<span class="fw-700"> Newsletter</span></h1>
                    {{--                    <p class="mt-10 text-white">Consistent updates on the ever so changing Canadian Real Estate market!</p>--}}
                    <p class="mt-10 text-white">Join Our Inner Circle: Get Exclusive Real Estate Insights, News, Deals & Updates On The Ever So Changing Ontario, Canada Real Estate Market!</p>
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
@endsection
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
            var selectCity = $(this).attr('data-text');
            var inputOptions = new Promise(function(resolve) {
                resolve({
                    'pre-construct': 'Pre-Construction',
                    'sale': 'For Sale',
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
<!-- add comma sign to range slider -->
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

    $(document).ready(function() {
        $('.show-hide').click(function() {
            $(this).next().toggleClass('toggle');
        });
    });
</script>
<!-- end filter price change js -->
<script src="{{asset('')}}frontend/assets/js/owl.carousel.js"></script>
<script>
    $('.testimonial-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
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
<script>
    $('.feature-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        autoplay: true,
        autoplayTimeout: 2000,
        dots: false,
        responsive: {
            0: {
                items: 1,
                dots: true,
            },
            600: {
                items: 3,
                dots: true,
            },
            1000: {
                items: 5
            }
        }
    })

</script>
<script>
    $('.blog-carousel1').owlCarousel({
        loop: true,
        nav: true,
        stagePadding: 150,
        margin: 20,
        dots: false,
        responsive: {
            0: {
                items: 1,
                stagePadding: 40,
            },
            600: {
                items: 1

            },
            1000: {
                items: 3
            }
        }
    })

</script>
<script>
    $('.blog-carousel').owlCarousel({
        loop: true,
        nav: true,
        stagePadding: 150,
        margin: 20,
        dots: false,
        responsive: {
            0: {
                items: 1,
                stagePadding: 40,
            },
            600: {
                items: 1

            },
            1000: {
                items: 3
            }
        }
    })
</script>
<script>
    $(document).ready(function () {
        var contentSection = $(".content-section");
        var navigation = $(".timeline");

        //when a nav link is clicked, smooth scroll to the section
        navigation.on("click", "a", function (event) {
            event.preventDefault(); //prevents previous event
            smoothScroll($(this.hash));
        });

        //update navigation on scroll...
        $(window).on("scroll", function () {
            updateNavigation();
        });
        //...and when the page starts
        updateNavigation();

        /////FUNCTIONS
        function updateNavigation() {
            contentSection.each(function () {
                var sectionName = $(this).attr("id");
                var navigationMatch = $('nav a[href="#' + sectionName + '"]');
                if (
                    $(this).offset().top - $(window).height() / 2 <
                    $(window).scrollTop() &&
                    $(this).offset().top + $(this).height() - $(window).height() / 2 >
                    $(window).scrollTop()
                ) {
                    navigationMatch.addClass("active-section");
                } else {
                    navigationMatch.removeClass("active-section");
                }
            });
        }

        function smoothScroll(target) {
            $("body,html").animate(
                {
                    scrollTop: target.offset().top,
                },
                800
            );
        }
    });
</script>

<script>
    function getVals() {
        // Get slider values
        let parent = this.parentNode;
        let slides = parent.getElementsByTagName("input");
        let slide1 = parseFloat(slides[0].value);
        let slide2 = parseFloat(slides[1].value);
        // Neither slider will clip the other, so make sure we determine which is larger
        if (slide1 > slide2) {
            let tmp = slide2;
            slide2 = slide1;
            slide1 = tmp;
        }

        let displayElement = parent.getElementsByClassName("rangeValues")[0];
        displayElement.innerHTML = "$" + slide1 + " - $" + slide2;
    }

    window.onload = function () {
        // Initialize Sliders
        let sliderSections = document.getElementsByClassName("range-slider");
        for (let x = 0; x < sliderSections.length; x++) {
            let sliders = sliderSections[x].getElementsByTagName("input");
            for (let y = 0; y < sliders.length; y++) {
                if (sliders[y].type === "range") {
                    sliders[y].oninput = getVals;
                    // Manually trigger event first time to display values
                    sliders[y].oninput();
                }
            }
        }
    };
</script>
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
            minWidth: 300
        })
        let labels          = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        let clusterOptions  = new MarkerClusterer(map, [], {
            zoomOnClick : false,
            //imagePath   : 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m',
            styles:[{
                url: "{{ asset('frontend/assets/imgs/gray_circle.png') }}",
                width: 32,
                height: 33,
            }]
        });

        $.ajax({
            type    : 'post',
            url     : '{{ url('/filter-property') }}',
            data    : {
                _token      : "{{ csrf_token() }}",
                property_type       : $('#filter_property_type').val(),
                transaction_type    : $('#filter_transaction_type').val(),
                postal_city_street  : $('#filter_postal_city_street').val(),
                min_price           : $('#filter_min').val(),
                max_price           : $('#filter_max').val(),
                bed                 : $('#filter_bed').val(),
                bath                : $('#filter_bath').val(),
                size                : $('#filter_size').val(),
            },
            success : function (res) {
                $("#overlay").hide();
                let _emf = $('#error_message_filter');
                _emf.empty();
                if(res.length === 0) {
                    _emf.text("NO data available");
                } else {
                    let url, url2, file ,p_badge;

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

                                let category = '-'; let bedrooms = '-'; let bathrooms = '-';
                                if(res[i].category) { category = res[i].category }
                                if(res[i].bedrooms) { bedrooms = res[i].bedrooms }
                                if(res[i].bathrooms) { bathrooms = res[i].bathrooms }

                                if(res[i].property_type === 'sale' && res[i].source === 'Frontend'){
                                    url     = "{{asset('frontend/assets/property-images/media-file')}}" + "/" +res[i].property_media.media_name;
                                    url2    = "{{url('sale-property/')}}"+"/"+res[i].id; /*/sale-search*/
                                    p_badge = res[i].listed_in;
                                    //file    = "<img class='marker_img' src='"+url+"'>";

                                } else if(res[i].property_type === 'sale' && res[i].source === 'Admin') {
                                    url     = "{{asset('admin-panel/assets/property-images/media-file/sale')}}" + "/" +res[i].property_media.media_name;
                                    url2    = "{{url('sale-property/')}}"+"/"+res[i].id; /*/sale-search*/
                                    p_badge = res[i].listed_in;
                                    //file    = "<img class='marker_img' src='"+url+"'>";

                                } else if(res[i].property_type === 'pre-construct') {
                                    url     = "{{asset('admin-panel/assets/property-images/media-file/pre-construct')}}" + "/" +res[i].property_media.media_name;
                                    url2    = "{{url('pre-construct-property')}}"+"/"+res[i].id; /*/pre-construct-search'*/
                                    p_badge = 'Pre-Construction'
                                    //file    = "<img class='marker_img' src='"+url+"' >";

                                } else {
                                    url = "{{asset('default/404-not-found.jpg')}}" + "/" +res[i].property_media.media_name;
                                    //file = "<img class='marker_img' src='"+url+"'>";
                                }

                                info_window.setContent('<a href="'+url2+'" class="text-black" style="text-decoration: none;"><div>\n' +
                                    '    <div class="row" style="margin-right: 0">\n' +
                                    '        <div class="col-lg-6 col-md-6 col-sm-6 col-6">' + '<span class="property_badge">'+p_badge+'</span>' +
                                    '<img src="'+url+'" style="width: 100%; height: auto;" alt=""></div>\n' +
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
                }
            },
        });

        google.maps.event.addListener(clusterOptions, 'clusterclick', function(cluster) {
            if (map.getZoom() < map.maxZoom ){
                map.setCenter(cluster.center_);
                map.setZoom(map.getZoom() + 2);
            } else {

                let p_id = [];
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
                        console.log(res);
                        let url, url2,p_badge;
                        let content = '';

                        for (i = 0; i < res.length; i++) {

                            if(res[i].property_type === 'sale' && res[i].source === 'Frontend'){
                                url     = "{{asset('frontend/assets/property-images/media-file')}}" + "/" +res[i].property_media.media_name;
                                url2    = "{{url('sale-property/')}}"+"/"+res[i].id; /*/sale-search*/
                                p_badge = res[i].listed_in;

                            } else if(res[i].property_type === 'sale' && res[i].source === 'Admin') {
                                url     = "{{asset('admin-panel/assets/property-images/media-file/sale')}}" + "/" +res[i].property_media.media_name;
                                url2    = "{{url('sale-property/')}}"+"/"+res[i].id; /*/sale-search*/
                                p_badge = res[i].listed_in;

                            } else if(res[i].property_type === 'pre-construct') {
                                url     = "{{asset('admin-panel/assets/property-images/media-file/pre-construct')}}" + "/" +res[i].property_media.media_name;
                                url2    = "{{url('pre-construct-property')}}"+"/"+res[i].id; /*/pre-construct-search'*/
                                p_badge = 'Pre-Construction'

                            } else {
                                url = "{{asset('default/404-not-found.jpg')}}" + "/" +res[i].property_media.media_name;
                            }

                            let category    = '-';
                            let bedrooms    = '-';
                            let bathrooms   = '-';

                            if(res[i].category) { category = res[i].category }
                            if(res[i].bedrooms) { bedrooms = res[i].bedrooms }
                            if(res[i].bathrooms) { bathrooms = res[i].bathrooms }

                            content += '<a href="'+url2+'" class="text-black" style="text-decoration: none;">' +
                                '<div class="box1 p-1">\n' +
                                '    <div class="row mt-10" style="margin-right: 0;">\n' +
                                '        <div class="col-lg-12 col-md-12 col-sm-12">' +
                                '<span class="property_badge">'+p_badge+'</span>' +
                                '<img class="" style="width: 100%; height: auto" src="'+url+'" alt=""></div>\n' +
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
                    },
                });
            }
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    /*--- END    MAP LOADING ---*/

    $(document).on('click', '#map', function () {
        $("#overlay").hide();
    });

    /*--- BEGIN FILTER ---*/
    $(document).on('click', '.filter_btn', function () {
        //new_property_filter()
        initialize();
        google.maps.event.addDomListener(window, 'load', initialize);
    })

    /*function new_property_filter() {
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
    }*/
    /*--- END FILTER ---*/
</script>
<!-- make all property-preview box size same -->
<script>
    $(document).ready(function (){
        var heights = [];

        $('.address_height').each(function (){
            heights.push($(this).height());
        });

        var maxHeight = Math.max.apply(null, heights);
        $('.address_height').height(maxHeight);

    });
</script>
<!-- one page menu link jump from the other page script -->
<script>
    $(document).ready(function (){
        if(window.location.hash){
            scroll(0,0);
            setTimeout(function (){
                scroll(0,0);
            });
        }
        // if we have anchor on the url (calling from other page)
        if(window.location.hash){
            $("html, body").animate({
                scrollTop: $(window.location.hash).offset().top + 'px'
            },1000,'swing');
        }
    });
</script>
