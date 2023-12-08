@extends('frontend.layout.master')
@section('title')
    <title>Tuntunji Realty | Pre-construct Property</title>
    <!-- begin social-media share icon style -->
    <style>
        /*.h-item{*/
        /*    line-height: 30px;*/
        /*}*/
        #floor-plan-blur{
            position: relative;
            width: 100%;
            background-color: #FCFCFC;
            border: 1px solid #E5E5E5;
            padding: 20px;
            filter: blur(5px);
        }
        .bg-image {
            /*margin-left: -10px;*/
            /*filter: blur(4px) grayscale(.1);*/
            align-content: center;
            /* add a opacity here for the background */
            opacity: 0.5;
        }
        /*@media (min-width: 414px) and (max-width : 375px){*/
        /*    .floor-plan-overlay-btn{*/
        /*        position: absolute;*/
        /*        z-index: 1;*/
        /*        margin-top: -10%;*/
        /*        left: 50%;*/
        /*        transform: translate(-50%, -50%);*/
        /*        -ms-transform: translate(-50%, -50%);*/
        /*    }*/
        /*    .floor-plan-overlay-text{*/
        /*        position: absolute;*/
        /*        z-index: 1;*/
        /*        margin-top: -20%;*/
        /*    }*/
        /*}*/
        /*.floor-plan-container{*/
        /*    position:relative;*/
        /*}*/
        /*.floor-plan_blur{*/
        /*    filter: opacity(0.5);*/
        /*}*/
        /*.centered-text-floor-plan {*/
        /*    color: black;*/
        /*    position: absolute;*/
        /*    top: 50%;*/
        /*    left: 50%;*/
        /*    !*transform: translate(-50%, -50%);*!*/
        /*}*/
        .backend-banner{
            height: auto;
            width: 100%;
            background-size: cover;
            cursor: pointer;
            background-position: center;
        }
        /* begin blog card image and nav pre next button set height  */
        .card-img-top{
            /*height: 20vh!important;*/
            height: 200px!important;
            width: 100%;
            object-fit: cover;
        }
        /*.btn-close{*/
        /*    top: 20%;*/
        /*}*/
        /* end blog card image and nav pre next button set height  */
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
            display:contents;
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
        /* navbar blur when model is popup */
        .navbar{
            position: relative;
        }
        @media only screen and (max-width: 991px) {
            .mobile-contact-form{
                display: block;
            }
            .desktop-contact-form{
                display: none;
            }
            .desktop-modal-footer{
                display: block;
            }
            .desktop-modal-close{
                display: none;
            }

            .blog-carousel .owl-item .item {
                box-shadow: none;
            }
        }
        /* Large devices (laptops/desktops, 992px and up) */
        @media only screen and (min-width: 992px) {
            .mobile-contact-form{
                display: none;
            }
            .desktop-contact-form{
                display: block;
            }
            .desktop-modal-footer{
                display: block;
            }
            .desktop-modal-close{
                display: none;
            }
        }
        /* tablet size between 768px up and 992px down */
        @media (min-width: 768px) and (max-width: 992px) {
            .floor-text{
                position: absolute;
                color: #57b35c !important;
                top: 29%;
                left: 50%;
                font-size: 15px;
                font-weight: 700;
                transform: translate(-50%, -50%);
            }
            .btn-floor{
                position: absolute;
                top: 31%;
                left: 50%;
                transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                background-color:#57b35c !important;
                border-color: #57b35c !important;
                color: white;
                font-size: 14px;
                padding: 10px 20px !important;
                cursor: pointer;
                border-radius: 40px;
                text-align: center;
                font-weight: 700;
            }
            .card-img-top{
                height: 400px!important;
                width: 100%;
                object-fit: cover;
            }
        }
        /* Extra small devices (phones, 600px and down) */
        @media only screen and (max-width: 600px) {
            .card-img-top {
                height: 175px!important;
                width: 100%;
                object-fit: cover;
            }

        }
        .img_blur{
            filter: opacity(0.5);
            /*margin-left:20px;*/
        }
        .floor_plan_blur{
            filter: opacity(0.5);
        }
        /*.floor-plan-img{*/
        /*    position: relative;*/
        /*}*/
        .btn-floor:hover{
            color: #fff;
        }
        /* floor-plan style end */
        .centered {
            position: absolute;
            color: #000000;
            top: 50%;
            left: 50%;
            font-size: 15px;
            font-weight: 600;
            transform: translate(-50%, -50%);
            /*padding: 10px;*/
        }
        .centered-floor-plan-btn{
            position: absolute;
            color: #000000;
            top: 50%;
            left: 50%;
            font-size: 15px;
            font-weight: 600;
            transform: translate(-50%, -50%);
        }
    </style>
    <!-- end social-media share icon style -->
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                {{--                @include('frontend.include.navbar')--}}
                <!-- web view -->
                <div class="header-menu-list dn header-wrapper">
                    <div class="btn-expand">
                        <span class="line-1"></span>
                        <span class="line-2"></span>
                        <span class="line-3"></span>
                    </div>
                    <div class="collapsible">
                        <ul class="text-center">
                            <li class="nav-item pl-17">
                                <a class="nav-link" href="{{url('/')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <div class="main">
                                    <input type="checkbox" id="drop-5" hidden>
                                    <label class="dropHeader dropHeader-5 label-1 dropdown-toggle" for="drop-5"> About Us</label>
                                    <div class="list list-5">
                                        <div class="item1"> <a class="fw-700 about_us_web" href="{{url('#about')}}">About Tutunji Realty</a></div>
                                        <div class="item1"><a class="fw-700 featured_in_web" href="{{url('#featured_in')}}">Featured In</a></div>
                                        <div class="item1"> <a class="fw-700 our_team_web" href="{{url('#our-team')}}">Our Team</a></div>
                                        <div class="item1"><a class="fw-700 blogs_web" href="{{url('#blogs')}}">Blogs</a></div>
                                        <div class="item1"><a class="fw-700 newsletter_web" href="{{url('#newsletter')}}">Newsletter</a></div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="main">
                                    <input type="checkbox" id="drop-6" hidden>
                                    <label class="dropHeader dropHeader-5 label-1 dropdown-toggle" for="drop-6"> Browse Real Estate</label>
                                    <div class="list list-5">
                                        <div class="item1" style="width: 268px;"> <a class="fw-700" href="{{url('/pre-construct-search')}}">Upcoming Pre-Construction Projects</a></div>
                                        <div class="item1" style="width: 268px;"><a class="fw-700" href="{{url('/sale-search')}}">New Construction For Sale/Lease</a></div>
                                        <div class="item1" style="width: 268px;"> <a class="fw-700 browse_cities_web" href="{{url('#browse_cities')}}">Browse Popular Areas</a></div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link testimonial_web" href="{{url('/#testimonial')}}">Testimonials</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link our_strategy_web" href="{{url('/#container-gsap')}}">Our Strategy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link contact_us_web" href="{{url('/#contact')}}">Contact Us</a>
                            </li>
                            <!--                            <li class="pl-196"><button type="button" class="btn btn-success"><img src="imgs/Group%2014.png" alt="" class="img-fluid w-24">Sell My Property</button></li>-->
                        </ul>
                    </div>
                </div>
                <!-- end of web view-->
                <!-- mobile view-->
                <nav class="navbar navbar-light bg-light bg-toggler dn-1">
                    <button class="navbar-toggler btn-toogler border-0" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse n-collapse" id="navbarNav">
                        <ul class="navbar-nav text-center">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <div class="nav-link">
                                    <div class="filter-dropdown">
                                        <button type="button" class="btn btn-secondary btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> About Us</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item about_us_mob" href="{{url('#about')}}">About Tutunji Realty</a>
                                            <a class="dropdown-item featured_in_mob" href="{{url('#featured_in')}}">Featured In</a>
                                            <a class="dropdown-item our_team_mob" href="{{url('#our-team')}}">Our Team</a>
                                            <a class="dropdown-item blogs_mob" href="{{url('#blogs')}}">Blogs</a>
                                            <a class="dropdown-item newsletter_mob" href="{{url('#newsletter')}}">Newsletter</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="nav-link">
                                    <div class="filter-dropdown">
                                        <button type="button" class="btn btn-secondary btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Browse Real Estate</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{url('/pre-construct-search')}}">Upcoming Pre-Construction Projects</a>
                                            <a class="dropdown-item" href="{{url('/sale-search')}}">New Construction For Sale/Lease</a>
                                            <a class="dropdown-item browse_cities_mob" href="{{url('#browse_cities')}}">Browse Popular Areas</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link testimonial_mob" href="{{url('/#testimonial')}}">Testimonials</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link our_strategy_mob" href="{{url('/#our-strategy')}}">Our Strategy</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link contact_us_mob" href="{{url('/#contact')}}">Contact Us</a>
                            </li>
                        </ul>
                        <!--
                        <button type="button" class="btn btn-success btn-sell">
                            <img src="imgs/Group%2014.png" alt="" class="img-fluid w-24 d-none" />Sell My Property
                        </button>
-->
                    </div>
                </nav>
                <!-- end of mobile view-->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pl-0">
                        {{--                        <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-darkgrey fw-700">Home</a></li>--}}
                        <li class="breadcrumb-item"><a href="{{url('/pre-construct-search')}}" class="text-darkgrey fw-700"><i class="fa fa-arrow-left text-darkgrey mr-1" aria-hidden="true"></i>&nbsp;Go To All Upcoming Pre-Construction Projects
                            </a></li>
                        {{--                       <li class="breadcrumb-item active fw-700" aria-current="page">{{$pre_constructData[0]['address']}}</li>--}}
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h4 class="fs-24 fw-700">{{$pre_constructData[0]['address']}}</h4>
                <h4 class="fs-24 fw-700" style="margin-bottom: 0;">{{$pre_constructData[0]['city']}}, <span>{{$pre_constructData[0]['country_state']}}</span> <span>{{$pre_constructData[0]['zip']}}</span></h4><br>
                <span class="fs-18 text-grey fw-400"> <i class="fa fa-tag mr-1" style="color: #bebebe;"></i>&nbsp;{{($pre_constructData[0]['cat_details']) ? $pre_constructData[0]['cat_details']['name'] : '-'}}</span>
            </div>
        </div>

        <div class="row mt-20">
            <div class="col-lg-6 center">
                <h1 class="fs-30 fw-700">
                    @if($pre_constructData[0]['before_price_label'] != null && $pre_constructData[0]['after_price_label'] != null)
                        {{$pre_constructData[0]['before_price_label']}}
                    @endif
                    ${{$pre_constructData[0]['price']}}
                    @if($pre_constructData[0]['after_price_label'] != null && $pre_constructData[0]['before_price_label'] != null)
                        {{$pre_constructData[0]['after_price_label']}}
                    @endif
                </h1>
            </div>
            <div class="col-lg-6 mt-21">
                <ul class="list-unstyled list-inline d-flex justify-content-end align-items-center center">

                    {{--                    @if(!Auth::check())--}}
                    @if(Auth::check())
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    @endif
{{--                    @if($pre_constructData[0]['id']->count() > 0)--}}
{{--                        --}}
{{--                    @endif--}}
                    <li class="list-inline-item">
                        {{--                        <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Register Now</button>--}}
                        <a href="{{url('/sign-in')}}" class="btn btn-info" style="font-size: 20px; padding: 10px 20px !important;" data-toggle="modal" data-target="#myModal" id="modalBtn_1">Register Now</a>
                    </li>
                    {{--                    @endif--}}
                </ul>
            </div>
        </div>

        <div class="row align-items-center mt-40">
            @if($pre_constructData[0]['embed_video_id'] == NULL && $totalPropertyMediaImages == '1')
                <div class="text-center" style="margin-left: auto;margin-right: auto;">
                        <?php $images = $pre_constructData[0]['multiple_media']; ?>
                    @if($pre_constructData[0]['multiple_media'] && $pre_constructData[0]['property_type'] == 'pre-construct')
                        @if(isset($images[0]))
                            <a href="{{url('/pre-construct-slider-popup',$pre_constructData[0]['id'])}}">
                                <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$images[0]['media_name'])}}" alt="" class="img-fluid w-100 img-mob-1" style="border: solid 1px #f3f3f3;">
                            </a>
                        @endif
                    @endif
                </div>
            @elseif($pre_constructData[0]['embed_video_id'] != NULL && $totalPropertyMediaImages == '1')
                <div class="col-md-12">
                    @if($pre_constructData[0]['video_from'] == 'vimeo')
                        <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item video_url" src="{{url($pre_constructData[0]['embed_video_id'])}}" title="Real Estate Property Video Tour Example"></iframe> {{-- https://www.youtube.com/embed/7Qivx2om0MM --}}
                        </div>
                    @elseif($pre_constructData[0]['video_from'] == 'youtube')
                        <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item video_url" src="{{url($pre_constructData[0]['embed_video_id'])}}" title="Real Estate Property Video Tour Example"></iframe> {{-- https://www.youtube.com/embed/7Qivx2om0MM --}}
                        </div>
                    @endif
                </div>
            @elseif($pre_constructData[0]['embed_video_id'] != NULL && $totalPropertyMediaImages == '2')
                <div class="col-lg-8 col-8 pr-0">
                    @if($pre_constructData[0]['video_from'] == 'vimeo')
                        <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item video_url" src="{{url($pre_constructData[0]['embed_video_id'])}}" title="Real Estate Property Video Tour Example"></iframe> {{-- https://www.youtube.com/embed/7Qivx2om0MM --}}
                        </div>
                    @elseif($pre_constructData[0]['video_from'] == 'youtube')
                        <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item video_url" src="{{url($pre_constructData[0]['embed_video_id'])}}" title="Real Estate Property Video Tour Example"></iframe> {{-- https://www.youtube.com/embed/7Qivx2om0MM --}}
                        </div>
                    @endif
                </div>
                <div class="col-lg-4 col-4" style="display: flex;align-items: center">
                    @if($pre_constructData[0]['multiple_media'] && $pre_constructData[0]['property_type'] == 'pre-construct')
                            <?php $images = $pre_constructData[0]['multiple_media']; ?>
                        <a href="{{url('/pre-construct-slider-popup',$pre_constructData[0]['id'])}}">
                            @if(isset($images[1]))
                                <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$images[1]['media_name'])}}" alt="" class="img-fluid w-100 img-mob-1" style="border: solid 1px #f3f3f3;">
                            @endif
                        </a>
                    @endif
                </div>
            @elseif($pre_constructData[0]['embed_video_id'] != NULL && $totalPropertyMediaImages > '2')
                <div class="col-lg-8 col-8 pr-0">
                    @if($pre_constructData[0]['video_from'] == 'vimeo')
                        <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item video_url" src="{{url($pre_constructData[0]['embed_video_id'])}}" title="Real Estate Property Video Tour Example"></iframe> {{-- https://www.youtube.com/embed/7Qivx2om0MM --}}
                        </div>
                    @elseif($pre_constructData[0]['video_from'] == 'youtube')
                        <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item video_url" src="{{url($pre_constructData[0]['embed_video_id'])}}" title="Real Estate Property Video Tour Example"></iframe> {{-- https://www.youtube.com/embed/7Qivx2om0MM --}}
                        </div>
                    @endif
                </div>
                <div class="col-lg-4 col-4">
                    @if($pre_constructData[0]['multiple_media'] && $pre_constructData[0]['property_type'] == 'pre-construct')
                            <?php $images = $pre_constructData[0]['multiple_media']; ?>
                        <a href="{{url('/pre-construct-slider-popup',$pre_constructData[0]['id'])}}">
                            @if(isset($images[1]))
                                <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$images[1]['media_name'])}}" alt="" class="img-fluid w-100 img-mob-1" style="border: solid 1px #f3f3f3;">
                            @endif
                        </a>
                    @endif
                    <div class="container-img mt-10">
                        @if($pre_constructData[0]['multiple_media'] && $pre_constructData[0]['property_type'] == 'pre-construct')
                                <?php $images = $pre_constructData[0]['multiple_media']; ?>
                            <a href="{{url('/pre-construct-slider-popup',$pre_constructData[0]['id'])}}">
                                @if(isset($images[2]))
                                    <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$images[2]['media_name'])}}" alt="" class="image img-fluid bg-image" style="border: solid 1px #f3f3f3;">
                                    <div class="centered mobile-opacity-text text-center"><a href="{{url('/pre-construct-slider-popup',$pre_constructData[0]['id'])}}" class="btn btn-warning btn-sm" style="background-color: #fff;border-color: #fff;color: #000000;font-weight: bold;border-radius: 24px;width: 100%;">View All Photos</a></div>
                                @endif
                            </a>
                        @endif
                    </div>
                </div>
            @elseif($totalPropertyMediaImages == '2')
                <div class="col-lg-8 col-8 pr-0">
                        <?php $images = $pre_constructData[0]['multiple_media']; ?>
                    @if($pre_constructData[0]['multiple_media'] && $pre_constructData[0]['property_type'] == 'pre-construct')
                        @if(isset($images[0]))
                            <a href="{{url('/pre-construct-slider-popup',$pre_constructData[0]['id'])}}">
                                <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$images[0]['media_name'])}}" alt="" class="img-fluid w-100 img-mob-1" style="border: solid 1px #f3f3f3;">
                            </a>
                        @endif
                    @endif
                </div>
                <div class="col-lg-4 col-4" style="display: flex;align-items: center">
                    @if($pre_constructData[0]['multiple_media'] && $pre_constructData[0]['property_type'] == 'pre-construct')
                            <?php $images = $pre_constructData[0]['multiple_media']; ?>
                        <a href="{{url('/pre-construct-slider-popup',$pre_constructData[0]['id'])}}">
                            @if(isset($images[1]))
                                <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$images[1]['media_name'])}}" alt="" class="img-fluid w-100 img-mob-1" style="border: solid 1px #f3f3f3;">
                            @endif
                        </a>
                    @endif
                </div>
            @else
                <div class="col-lg-8 col-8 pr-0">
                        <?php $images = $pre_constructData[0]['multiple_media']; ?>
                    @if($pre_constructData[0]['multiple_media'] && $pre_constructData[0]['property_type'] == 'pre-construct')
                        @if(isset($images[0]))
                            <a href="{{url('/pre-construct-slider-popup',$pre_constructData[0]['id'])}}">
                                <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$images[0]['media_name'])}}" alt="" class="img-fluid w-100 img-mob-1" style="border: solid 1px #f3f3f3;">
                            </a>
                        @endif
                    @endif
                </div>
                <div class="col-lg-4 col-4">
                    @if($pre_constructData[0]['multiple_media'] && $pre_constructData[0]['property_type'] == 'pre-construct')
                            <?php $images = $pre_constructData[0]['multiple_media']; ?>
                        <a href="{{url('/pre-construct-slider-popup',$pre_constructData[0]['id'])}}">
                            @if(isset($images[1]))
                                <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$images[1]['media_name'])}}" alt="" class="img-fluid w-100 img-mob-1" style="border: solid 1px #f3f3f3;">
                            @endif
                        </a>
                    @endif
                    <div class="container-img mt-10">
                        @if($pre_constructData[0]['multiple_media'] && $pre_constructData[0]['property_type'] == 'pre-construct')
                                <?php $images = $pre_constructData[0]['multiple_media']; ?>
                            <a href="{{url('/pre-construct-slider-popup',$pre_constructData[0]['id'])}}">
                                @if(isset($images[2]))
                                    <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$images[2]['media_name'])}}" alt="" class="image img-fluid bg-image" style="border: solid 1px #f3f3f3;">
                                    <div class="centered mobile-opacity-text text-center"><a href="{{url('/pre-construct-slider-popup',$pre_constructData[0]['id'])}}" class="btn btn-warning btn-sm" style="background-color: #fff;border-color: #fff;color: #000000;font-weight: bold;border-radius: 24px;width: 100%;">View All Photos</a></div>
                                @endif
                            </a>
                        @endif
                    </div>
                </div>
            @endif
        </div>
        <div class="row mt-20" id="key-features">
            <div class="col-lg-12">
                <h4 class="fs-20 text-deco">Key Features</h4>
                <div class="blue-bar">
                    <div class="row">
                        <div class="col-6 col-lg-3 text-center mob_view_property_detail">
                            <h6 class="fs-14 mb-0">{{$pre_constructData[0]['from_size_in_sqft'] ? $pre_constructData[0]['from_size_in_sqft'] : 0}} - {{$pre_constructData[0]['to_size_in_sqft'] ? $pre_constructData[0]['to_size_in_sqft'] : 0}} SqFt</h6>
                            <span class="fs-12 text-grey">Size in sq ft</span>
                        </div>
{{--                        <div class="col-6 col-lg-2 col-4 text-center mob_view_property_detail">--}}
{{--                            @if($pre_constructData[0]['internal_status'] == '1' && $pre_constructData[0]['property_type'] == 'pre-construct')--}}
{{--                                <h6 class="fs-14 mb-0">--}}
{{--                                    Active--}}
{{--                                </h6>--}}
{{--                            @endif--}}
{{--                                                        <h6 class="fs-14 mb-0">Pre-Construction</h6>--}}
{{--                            <span class="fs-12 text-grey"> Property Status </span>--}}
{{--                        </div>--}}
                        <div class="col-6 col-lg-3 text-center mob_view_property_detail">
                            <h6 class="fs-14 mb-0">{{$pre_constructData[0]['from_bedrooms'] ? $pre_constructData[0]['from_bedrooms'] : 0}} - {{$pre_constructData[0]['to_bedrooms'] ? $pre_constructData[0]['to_bedrooms'] : 0}} <i class="fa fa-bed" style="color: #262222;"></i></h6>
                            <span class="fs-12 text-grey">Bedrooms</span>
                        </div>

                        <div class="col-6 col-lg-3 mt-11 text-center mob_view_property_detail">
                            <h6 class="fs-14 mb-0">
                                {{$pre_constructData[0]['from_bathrooms'] ? $pre_constructData[0]['from_bathrooms'] : '-'}} - {{$pre_constructData[0]['to_bathrooms'] ? $pre_constructData[0]['to_bathrooms'] : '-'}} <i class="fa fa-bath" style="color: #262222;"></i>
                            </h6>
                            <span class="fs-12 text-grey">Bathrooms</span>
                        </div>
                        <div class="col-6 col-lg-3 mt-11 text-center mob_view_property_detail">
                            <h6 class="fs-14 mb-0">{{$pre_constructData[0]['year_built'] ? $pre_constructData[0]['year_built'] : '-'}}</h6>
                            <span class="fs-12 text-grey">Completion Date</span>
                        </div>
{{--                        <div class="col-lg-2 col-4 mt-11 text-center mob_view_property_detail">--}}
{{--                            <h6 class="fs-14 mb-0">{{date('Y-m-d', strtotime($pre_constructData[0]['created_at'])) ? date('Y-m-d', strtotime($pre_constructData[0]['created_at'])) : '-'}}</h6>--}}
{{--                            <span class="fs-12 text-grey">Posted On</span>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-lg-8">
                <div class="bhk-box">
                    <h4 class="fs-20 text-deco">Overview</h4>
                    <table class="table mt-20 table-responsive-md">
                        <tbody>
                        <tr>
                            <td class="border-top-0">Rooms</td>
                            <td class="border-top-0 fw-700">{{$pre_constructData[0]['from_rooms'] ? $pre_constructData[0]['from_rooms'] : 0}} - {{$pre_constructData[0]['to_rooms'] ? $pre_constructData[0]['to_rooms'] : 0}}</td>
                            <td class="border-top-0">Exterior Material</td>
                            <td class="fw-700 border-top-0">{{$pre_constructData[0]['exterior_material'] ? $pre_constructData[0]['exterior_material'] : '-'}}</td>
                        </tr>
                        <tr>
                            <td>Lot Size in SqFt</td>
                            <td class="fw-700">{{$pre_constructData[0]['lot_size_in_ft2'] ? $pre_constructData[0]['lot_size_in_ft2'] : '-'}}</td>
                            <td>Roof Material</td>
                            <td class="fw-700">{{$pre_constructData[0]['roofing'] ? $pre_constructData[0]['roofing'] : '-'}}</td>
                        </tr>
                        <tr>
                            <td>Parking Spots</td>
                            <td class="fw-700">{{$pre_constructData[0]['from_parking_spots'] ? $pre_constructData[0]['from_parking_spots'] : 0}} - {{$pre_constructData[0]['to_parking_spots'] ? $pre_constructData[0]['to_parking_spots'] : 0}}</td>
                            <td>Floors No.</td>
                            <td class="fw-700">{{$pre_constructData[0]['floors_no'] ? $pre_constructData[0]['floors_no'] : '-'}}</td>
                        </tr>
                        <tr>
                            <td>Basement</td>
                            <td class="fw-700">{{$pre_constructData[0]['basement'] ? $pre_constructData[0]['basement'] : '-'}}</td>
                            <td>Structure Type</td>
                            <td class="fw-700">{{$pre_constructData[0]['structure_type'] ? $pre_constructData[0]['structure_type'] : '-'}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!--    pop up btn-->
                <button type="button" class="btn-success position-f dn1" id="agentButton" data-toggle="modal" data-target="#myModal">
                    Register Now
                </button>
                <!--end of pop up btn-->
                <div class="bhk-box mt-20">
                    <h4 class="fs-20 text-deco">Description</h4>
                    <p class="mt-20 fs-16 fw-400">{{$pre_constructData[0]['description']}}</p>
                    {{--                    <p class="mt-20 fs-16 fw-400">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam cupiditate eaque fugit magni molestiae architecto. Possimus consequatur explicabo nesciunt nostrum! Dignissimos non ipsum eum, quisquam quia. Minima, placeat. Sunt, hic.</p>--}}
                </div>
                <div class="bhk-box mt-20">
                    <h4 class="fs-20 text-deco">Amenities</h4>
                    <div class="row mt-20">
                        @if($amenities)
                            @foreach($amenities as $a_row)
                                <div class="custom-col-2 px-10 text-center">
                                    <div class="amenities-box">
                                        <ul class="text-center list-unstyled">
                                            <li>
                                                @if(!empty($a_row['icon']))
                                                    <img src="{{asset('admin-panel/assets/property-images/amenities/icons/'.$a_row['icon'])}}" alt="" class="img-fluid mt-10" height="20px">
                                                @else
                                                    <img src="{{asset('')}}frontend/assets/imgs/photo.png" alt="" class="img-fluid mt-10">
                                                @endif

                                            </li>
                                            <li class="fs-12 fw-700 mt-10">{{$a_row['name']}}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                @if($pre_constructData[0]['floor_plan2_images']->count() > 0 || $pre_constructData[0]['floor_plan3_images']->count() > 0)
                    <div class="position-relative">
                        <div class="bhk-box mt-20" id="floor-plan-blur">
                            <div class="row">
                                <div class="col-lg-8 col-8">
                                    <h4 class="fs-20 text-deco">Floor Plan</h4>
                                </div>
                                <div class="col-lg-4 col-4">
                                    <div class="floorplan-box">
                                        <ul class="nav nav-pills mb-3 justify-content-end" id="pills-tab" role="tablist">
                                            @if($pre_constructData[0]['floor_plan2_images']->count() == 0 && $pre_constructData[0]['floor_plan3_images']->count() != 0)
                                                <li class="nav-item" role="presentation" style="display: none;">
                                                    <a class="nav-link active" id="hide" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" style="padding: 0.5rem 1rem;">2D</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active" id="show" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true" style="padding: 0.5rem 1rem;">3D</a>
                                                </li>
                                            @endif
                                            @if($pre_constructData[0]['floor_plan3_images']->count() == 0 && $pre_constructData[0]['floor_plan2_images']->count() != 0)
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active" id="hide" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" style="padding: 0.5rem 1rem;">2D</a>
                                                </li>
                                                <li class="nav-item" role="presentation" style="display: none;">
                                                    <a class="nav-link active" id="show" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true" style="padding: 0.5rem 1rem;">3D</a>
                                                </li>
                                            @endif
                                            @if($pre_constructData[0]['floor_plan2_images']->count() != 0 && $pre_constructData[0]['floor_plan3_images']->count() != 0)
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active" id="show" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-profile" aria-selected="true" style="padding: 0.5rem 1rem;">2D</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link" id="show" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" style="padding: 0.5rem 1rem;">3D</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-lg-12 text-center">
                                    <div class="tab-content" id="pills-tabContent">
                                        @if($pre_constructData[0]['floor_plan2_images']->count() == 0 && $pre_constructData[0]['floor_plan3_images']->count() != 0)
                                            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                <div class="owl-carousel blog-carousel owl-theme">
                                                @foreach($pre_constructData[0]['floor_plan3_images'] as $img)
                                                <div class="item">
                                                    <h4 class="fs-16" style="text-align: left;">  No. of Bedrooms - {{$img['no_of_bedrooms']}}</h4>
                                                    <h4 class="fs-16" style="text-align: left;margin-top: 0;"> No. of Bathrooms - {{$img['no_of_bathrooms']}}</h4>
                                                    <h4 class="fs-16" style="text-align: left;margin-top: 0;"> {{$img['sqft']}} SqFt</h4>


                                                    <img src="{{asset('admin-panel/assets/property-images/floor-plan-3D/pre-construct/'.$img['images'])}}" alt="your image" height="200px" width="200px">

                                                    {{--                                                    <div class="centered mobile-opacity-text text-center"><a href="{{url('/pre-construct-slider-popup',$pre_constructData[0]['id'])}}" class="btn btn-warning btn-sm" style="background-color: #fff;border-color: #fff;color: #000000;font-weight: bold;border-radius: 24px;width: 100%;">View All Photos</a></div>--}}
                                                </div>
                                                @endforeach
                                                </div>
                                            </div>
                                        @endif
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

{{--                                                <h4 class="fs-16 mt-20" style="text-align: left;margin-top: 0;"> No. of Bedrooms - {{$pre_constructData[0]->floor_plan2_images[0]['no_of_bedrooms']}}</h4> <h4 class="fs-16 mt-20" style="text-align: left;margin-top: 0;">No. of Bathrooms - {{$pre_constructData[0]->floor_plan2_images[0]['no_of_bathrooms']}}</h4>--}}
                                        <div class="owl-carousel blog-carousel owl-theme">
                                            @foreach($pre_constructData[0]['floor_plan2_images'] as $img)
                                            <div class="item">
                                                @if($pre_constructData[0]['floor_plan2_images']->count() > 0)
                                                    <h4 class="fs-16" style="text-align: left;">  No. of Bedrooms - {{$img['no_of_bedrooms']}}</h4>
                                                    <h4 class="fs-16" style="text-align: left;margin-top: 0;"> No. of Bathrooms - {{$img['no_of_bathrooms']}}</h4>
                                                    <h4 class="fs-16" style="text-align: left;margin-top: 0;"> {{$img['sqft']}} SqFt </h4>
                                                @endif
                                                <img src="{{asset('admin-panel/assets/property-images/floor-plan-2D/pre-construct/'.$img['images'])}}" alt="your image" height="200px" width="200px">
                                                </div>

                                                {{--                                                    <div class="centered mobile-opacity-text text-center"><a href="{{url('/pre-construct-slider-popup',$pre_constructData[0]['id'])}}" class="btn btn-warning btn-sm" style="background-color: #fff;border-color: #fff;color: #000000;font-weight: bold;border-radius: 24px;width: 100%;">View All Photos</a></div>--}}
                                            @endforeach
                                        </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <div class="owl-carousel blog-carousel owl-theme">
                                            @foreach($pre_constructData[0]['floor_plan3_images'] as $img)
                                            <div class="item">
                                                @if($pre_constructData[0]['floor_plan3_images']->count() > 0)
                                                    <h4 class="fs-16" style="text-align: left;">  No. of Bedrooms - {{$img['no_of_bedrooms']}}</h4>
                                                    <h4 class="fs-16" style="text-align: left;margin-top: 0;"> No. of Bathrooms - {{$img['no_of_bathrooms']}}</h4>
                                                    <h4 class="fs-16" style="text-align: left;margin-top: 0;"> {{$img['sqft']}} SqFt</h4>

                                                @endif
                                                <img src="{{asset('admin-panel/assets/property-images/floor-plan-3D/pre-construct/'.$img['images'])}}" alt="your image" height="200px" width="200px">
                                                </div>

                                                {{--                                                    <div class="centered mobile-opacity-text text-center"><a href="{{url('/pre-construct-slider-popup',$pre_constructData[0]['id'])}}" class="btn btn-warning btn-sm" style="background-color: #fff;border-color: #fff;color: #000000;font-weight: bold;border-radius: 24px;width: 100%;">View All Photos</a></div>--}}
                                            @endforeach
                                         </div>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--                        <div class="centered mobile-opacity-text text-center"><a href="{{url('/pre-construct-slider-popup',$pre_constructData[0]['id'])}}" class="btn btn-warning btn-sm" style="background-color: #fff;border-color: #fff;color: #000000;font-weight: bold;border-radius: 24px;width: 100%;">View All Photos</a></div>--}}

                        <div class="col-md-12 btn-floor" style="position: absolute;vertical-align: middle;top: 50%;left: 50%;transform: translate(-50%, -50%);z-index: 2;width: 80%;padding: 20px;text-align: center;">
                            <button type="submit" class="btn btn-primary btn-floor" style="margin-left: auto;margin-right: auto;font-size: 14px;font-weight: 700;" data-toggle="modal" data-target="#myModal"><i class="fa fa-lock"></i>&nbsp;Register Now To Unlock The Project's Floor Plan</button>
                        </div>
                        {{--                        <div>--}}
                        {{--                            <a href="#" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);font-size: 40px;color:#2c3e50;border: 6px dotted #2c3e50;padding:10px;">Hello</a>--}}
                        {{--                        </div>--}}
                        {{--                    <div class="row mt-30">--}}
                        {{--                        <div class="col-lg-4 offset-lg-4 text-center">--}}
                        {{--                            <button type="button" class="btn btn-info"--}}
                        {{--                                    style="font-size: 14px; padding: 10px 20px !important;">--}}
                        {{--                                Contact Listing Agent--}}
                        {{--                            </button>--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}
                    </div>
                @endif
                <div class="bhk-box mt-20">
                    <h4 class="fs-20 text-deco">Neighbourhood</h4>
                    <p class="fs-14">Check How Far Any Address Is From This Project</p>
                    <div class="row mt-20">
                        <input type="hidden" class="form-control h-10" id="txtSource" placeholder="Enter start address" value="{{$pre_constructData[0]['address']}}"/>
                        <div class="col-lg-8" style="padding-bottom: 6px;">
                            <input type="text" class="form-control h-10" id="txtDestination" placeholder="Enter destination address"  style="border: 1px solid #D5D5D5 !important;"/>
                        </div>
                        <div class="col-lg-4">
                            <input type="button" value="View Distance" onclick="GetRoute()" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;"/>
                        </div>
                    </div>
                    <div id="map" style="height: 500px;margin-top: 10px;border-radius: 25px;"></div>
                    {{--                    <div id="output"></div>--}}
                    <div class="row mt-20">
                        <div class="col-lg-12">
                            <div id="dvDistance">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- banner Begin -->
                @if($getBanner_1->count() > 0)
                    <div class="mt-20 backend-banner" data-toggle="modal" data-target="#myModal" style="background-image: url('{{asset("admin-panel/assets/property-images/banner-1/".$getBanner_1[0]->banner_1)}}'); padding-top: 22%;width: 100%;cursor: pointer;background-size: 100%;background-repeat: no-repeat;background-position: center;"></div>
                @else
                    <div class="mt-20 backend-banner" data-toggle="modal" data-target="#myModal" style="background-image: url('{{asset("admin-panel/assets/property-images/730x160.webp")}}'); padding-top: 22%;width: 100%;cursor: pointer;background-size: 100%;background-repeat: no-repeat;background-position: center;"></div>
                @endif
                <!-- banner End -->
                <div class="bhk-box mt-20">
                    <div class="row">
                        <div class="col-lg-8 col-8">
                            <h4 class="fs-20 text-deco">Clients who viewed this property also liked</h4>
                        </div>
                        <div class="col-lg-4 col-4 text-right">
                            {{--                            <h4><a href="" class="text-green fs-20">View All</a></h4>--}}
                        </div>
                    </div>
                    <div class="row mt-20">
                        <div class="col-lg-12 blog">
                            <div class="owl-carousel blog-carousel owl-theme">
                                @if(empty($randomPreConstruct))
                                    <p class="text-center">no property found</p>
                                @else
                                    @foreach($randomPreConstruct as $all)
                                        <div class="item">
                                            <a href="{{url('pre-construct-property',$all['id'])}}" style="text-decoration: none;">
                                                <div class="card" style="width: 100%;">
                                                    <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$all['property_media']['media_name'])}}" class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h6 class="fs-20 fw-700" style="margin-top: 20px;">

                                                            @if($all['before_price_label'] != null && $all['after_price_label'] != null)
                                                                {{$all['before_price_label']}}
                                                            @endif
                                                            ${{($all['price']) ? $all['price'] : '-'}}
                                                            @if($all['after_price_label'] != null && $all['before_price_label'] != null)
                                                                {{$all['after_price_label']}}
                                                            @endif
                                                        </h6>
                                                        <div class="list-unstyled fs-12 fw-700 text-black justify-content-between" style="min-height: 105px;display: flex;flex-direction: column;">
                                                            <!-- {{--                                                <li>By Agent Name #1</li>--}}
                                                            {{--                                                <li>{{$all['category'] ? $all['category'] : '-'}}</li>--}}
                                                            {{--                                                <li>{{\Illuminate\Support\Str::limit($all['address'], 25) ? \Illuminate\Support\Str::limit($all['address'],25) : '-'}}</li>--}} -->
                                                            <div class="text-left">
                                                            <div style="    overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">
                                                                {{$all['address'] ? $all['address'] : '-'}}
                                                            </div>
                                                            {{$all['city'] ? $all['city'] : '-'}}, {{$all['country_state'] ? $all['country_state'] : ''}} {{$all['zip'] ? $all['zip'] : ''}}
                                                            </div>
                                                            <div>
                                                                <div class="row">
                                                                    <div class="col-md-6 mt-2 col-6" style="text-align: center;">
                                                                        {{$all['from_bedrooms'] ? $all['from_bedrooms'] : 0}} - {{$all['to_bedrooms'] ? $all['to_bedrooms'] : 0}} <i class="fa fa-bed" style="color:#000;"></i></br>Bedrooms
                                                                    </div>
                                                                    <div class="col-md-6 mt-2 col-6" style="text-align: center;">
                                                                        {{$all['from_bathrooms'] ? $all['from_bathrooms'] : 0}} - {{$all['to_bathrooms'] ? $all['to_bathrooms'] : 0}} <i class="fa fa-bath" style="color:#000;"></i></br>Bathrooms
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h6 class="fs-12 mt-10 text-grey"><i class="fa fa-tag text-grey mr-5"></i>&nbsp;{{($all['cat_details']) ? $all['cat_details']['name'] : '-'}}</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- banner Begin -->
                @if($getBanner_1->count() > 0)
                    <div class="mt-20 backend-banner" data-toggle="modal" data-target="#myModal" style="background-image: url('{{asset("admin-panel/assets/property-images/banner-1/".$getBanner_1[0]->banner_1)}}');padding-top: 22%;width: 100%;cursor: pointer;background-size: 100%;background-repeat: no-repeat;background-position: center;"></div>
                @else
                    <div class="mt-20 backend-banner" data-toggle="modal" data-target="#myModal" style="background-image: url('{{asset("admin-panel/assets/property-images/730x160.webp")}}');padding-top: 22%;width: 100%;cursor: pointer;background-size: 100%;background-repeat: no-repeat;background-position: center;"></div>
                @endif
                <!-- banner End -->
            </div>
            <!-- desktop-contact -->
            <div class="col-lg-4">
                <div class="desktop-contact-form contact-agent-box mt-21" style="position: sticky;">
                    <div class="agent-topbox">
                        <h6 class="fs-16">Get Exclusive VIP Access To This Project Here</h6>
                        <p class="fs-12">Register Below Now To Claim An Exclusive VIP Access Spot To This Pre-Construction Project And Get The Information Package With Perks Before The General Public</p>
                        {{--                        @if( Session::has( 'success' ))--}}
                        {{--                            <div class="alert alert-success" style="margin-top: 30px;">--}}
                        {{--                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>--}}
                        {{--                                <strong>Success! </strong>{{ Session::get( 'success' ) }}--}}
                        {{--                            </div>--}}
                        {{--                        @endif--}}
                        {{--                        @if( Session::has('error'))--}}
                        {{--                            <div class="alert alert-danger" style="margin-top: 30px;">--}}
                        {{--                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>--}}
                        {{--                                <strong>Opps! </strong>{{ Session::get( 'error' ) }}--}}
                        {{--                            </div>--}}
                        {{--                        @endif--}}
                    </div>
                    <div class="agent-body">
                        <div id="alert-message-danger" class="text-danger"></div>
                        <div id="alert-message-success" class="text-green"></div>
                        <img src="{{asset('frontend/assets/imgs/loading.gif')}}" height="50px" id="inquiry_form_loader" style="display: none;">
                        <form id="form">
                            {{--                            <ul class="alert alert-danger dn" id="display_errorList"></ul>--}}
                            @csrf
                            <div class="form-group mt-10">
                                <label for="fullNameBox" class="fs-14">Full Name:<span style="color: red">*</span></label>
                                <input class="form-control br-30 fs-14" id="fullNameBox" name="fullNameBox" value="{{old('fullNameBox')}}" placeholder="Type your Full name">
                                <!-- validation error message -->
                                @error('fullNameBox')
                                <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group mt-10">
                                <label for="phoneBox" class="fs-14">Phone Number:<span style="color: red">*</span></label>
                                <input class="form-control br-30 fs-14" id="phoneBox" name="phoneBox" value="{{old('phoneBox')}}" placeholder="Type your Phone Number">
                                <!-- validation error message -->
                                @error('phoneBox')
                                <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group mt-10">
                                <label for="emailBox" class="fs-14">Email Address:<span style="color: red">*</span></label>
                                <input class="form-control br-30 fs-14" id="emailBox" name="emailBox" value="{{old('emailBox')}}" placeholder="Type your Email">
                                <!-- validation error message -->
                                @error('emailBox')
                                <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                            <p class="fs-14">Are you a brokerage or real estate agent<span style="color: red">*</span></p>
                            <div class="row mt-10">
                                <div class="col-lg-6 col-6">
                                    <div class="sub-box">
                                        <ul class="box-sell p-0 mb-0 list-unstyled">
                                            <li>
                                                <input type="radio" id="Pre-Constructions" name="selectorBox" value="yes" {{old('selectorBox') == 'yes' ? 'checked' : ''}}>
                                                <label for="Pre-Constructions" class="mb-0 pb-3 fs-14">Yes</label>
                                                <div class="check"></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-6">
                                    <div class="sub-box">
                                        <ul class="box-sell p-0 mb-0 list-unstyled">
                                            <li>
                                                <input type="radio" id="Status-2s" name="selectorBox" value="no" {{ old('selectorBox') == 'no' ? 'checked' : ''}}>
                                                <label for="Status-2s" class="mb-0 pb-3 fs-14">No</label>
                                                <div class="check"></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-10">
                                <input type="checkbox" name="consent_box_sticky_form" id="consent_box_sticky_form" checked>
                                <label class="fs-12" style="display: contents;">I consent to receiving communication of all future pre-construction offerings and the Tutunji Realty newsletter to the contact information provided above</label>
                            </div>
                            <!-- validation error message -->
                            @error('selectorBox')
                            <p style="color: red;">{{$message}}</p>
                            @enderror
                            <div class="agent-footer">
                                <div class="row">
                                    <div class="col-lg-12"><button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;" id="formBtn">Register Now</button></div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{--                <h4 class="fs-20 text-deco mt-20">Similar Properties</h4>--}}
                {{--                @if(empty($allPreConstruct))--}}
                {{--                    <p class="text-center">No Similar Properties Found</p>--}}
                {{--                @else--}}
                {{--                    @foreach($allPreConstruct as $allPre)--}}
                {{--                <div class="box1 mt-20">--}}
                {{--                    <div class="row">--}}
                {{--                        <div class="col-lg-5 col-5">--}}
                {{--                            @if($allPre['property_media'])--}}
                {{--                                <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$allPre['property_media']['media_name'])}}" alt="" class="img-fluid">--}}
                {{--                            @endif--}}
                {{--                            <img src="{{asset('admin-panel/assets/property-images/pre-construct/'.$allPre[0]['property_media']['media_name'])}}" alt="" class="img-fluid">--}}
                {{--                        </div>--}}
                {{--                        <div class="col-lg-7 col-7 mt-20">--}}
                {{--                            <h6 class="fs-20 fw-700">${{($allPre['price']) ? $allPre['price'] : '-'}}</h6>--}}
                {{--                            <ul class="list-unstyled fs-12 text-grey">--}}
                {{--                                <li>-</li>--}}
                {{--                                <li>{{($allPre['category']) ? $allPre['category'] : '-'}}</li>--}}
                {{--                                <li>{{\Illuminate\Support\Str::limit($allPre['address'], 25) ? \Illuminate\Support\Str::limit($allPre['address'],25) : '-'}}</li>--}}
                {{--                                <li>--}}
                {{--                                    <div class="row">--}}
                {{--                                        <div class="col-md-4 mt-2 col-6">--}}
                {{--                                            {{$allPre['bedrooms'] ? $allPre['bedrooms'] : '-'}}&nbsp;<i class="fa fa-bed" style="color: #BEBEBE"></i></br>Bedrooms--}}
                {{--                                        </div>--}}
                {{--                                        <div class="col-md-8 mt-2 col-6">--}}
                {{--                                            {{$allPre['bathrooms'] ? $allPre['bathrooms'] : '-'}}&nbsp;<i class="fa fa-bath" style="color: #BEBEBE"></i></br>Bathrooms--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}

                {{--                                </li>--}}
                {{--                            </ul>--}}
                {{--                            <h6 class="fs-16 mt-26">{{($allPre['cat_details']) ? $allPre['cat_details']['name'] : '-'}}</h6>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                    @endforeach--}}
                {{--                @endif--}}
            </div>
            <!-- mobile-contact -->
            <div class="col-lg-4">
                <div class="mobile-contact-form contact-agent-box mt-21" style="margin-bottom: 15px;">
                    <div class="agent-topbox">
                        <h6 class="fs-16">Get Exclusive VIP Access To This Project Here</h6>
                        <p class="fs-12">Register Below Now To Claim An Exclusive VIP Access Spot To This Pre-Construction Project And Get The Information Package With Perks Before The General Public</p>
                        @if( Session::has( 'success' ))
                            <div class="alert alert-success" style="margin-top: 30px;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Success! </strong>{{ Session::get( 'success' ) }}
                            </div>
                        @endif
                    </div>
                    <div class="agent-body">
                        <div id="alert-message-danger" class="text-danger"></div>
                        <div id="alert-message-success" class="text-green"></div>
                        <form id="formABC">
                            @csrf
                            <div class="form-group mt-10">
                                <label for="fullNameBox" class="fs-14">Full Name:<span style="color: red">*</span></label>
                                <input class="form-control br-30 fs-14" id="fullNameBox" name="fullNameBox" value="{{old('fullNameBox')}}" placeholder="Type your Full name">
                                <!-- validation error message -->
                                @error('fullNameBox')
                                <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group mt-10">
                                <label for="phoneBox" class="fs-14">Phone Number:<span style="color: red">*</span></label>
                                <input class="form-control br-30 fs-14" id="phoneBox" name="phoneBox" value="{{old('phoneBox')}}" placeholder="Type your Phone Number">
                                <!-- validation error message -->
                                @error('phoneBox')
                                <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group mt-10">
                                <label for="emailBox" class="fs-14">Email Address:<span style="color: red">*</span></label>
                                <input class="form-control br-30 fs-14" id="emailBox" name="emailBox" value="{{old('emailBox')}}" placeholder="Type your Email">
                                <!-- validation error message -->
                                @error('emailBox')
                                <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                            <p class="fs-14">Are you a brokerage or real estate agent<span style="color: red">*</span></p>
                            <div class="row mt-10">
                                <div class="col-lg-6 col-6" style="margin-top: 5px;">
                                    <div class="sub-box">
                                        <ul class="box-sell p-0 mb-0 list-unstyled">
                                            <li>
                                                <input type="radio" id="Pre-Construction" name="selectorBox" value="yes" {{ old('selectorBox') == 'yes' ? 'checked' : ''}}>
                                                <label for="Pre-Construction" class="mb-0 pb-3 fs-14">Yes</label>
                                                <div class="check"></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-6" style="margin-top: 5px;">
                                    <div class="sub-box">
                                        <ul class="box-sell p-0 mb-0 list-unstyled">
                                            <li>
                                                <input type="radio" id="Status-2" name="selectorBox" value="no" {{ old('selectorBox') == 'no' ? 'checked' : ''}}>
                                                <label for="Status-2" class="mb-0 pb-3 fs-14">No</label>
                                                <div class="check"></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- validation error message -->
                            @error('selectorBox')
                            <p style="color: red;">{{$message}}</p>
                            @enderror
                            <div class="agent-footer">
                                <div class="row">
                                    <div class="col-lg-12"><button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;" id="formBtn">Register Now</button></div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-grey pt-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <h1 class="fs-40 text-center bb-2 fw-700" style="border-bottom: 2px dashed #000000;color: #000000;">Contact Us</h1>
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
        </div>
    </div>
    <!-- banner Begin -->
    {{-- for desktop --}}
    <div class="pre-construct-footer-web">
        @if($getBanner_3->count() > 0)
            <div class="bhk-box backend-banner pre-construct-footer" data-toggle="modal" data-target="#myModal" style="background-image: url('{{asset("admin-panel/assets/property-images/banner-3/".$getBanner_3[0]->banner_3)}}');    padding-top: 0;background-size: 100%;cursor: pointer;background-position: center; background-repeat: no-repeat;"></div>
        @else
            <div class="bhk-box backend-banner pre-construct-footer" data-toggle="modal" data-target="#myModal" style="background-image: url('{{asset("admin-panel/assets/property-images/2500x322.webp")}}');    padding-top: 0;background-size: 100%;cursor: pointer;background-position: center; background-repeat: no-repeat;"></div>
        @endif
    </div>

    {{-- For Mobile --}}
    <div class="pre-construct-footer-mobile">
        @if($getBanner_7->count() > 0)
            <div class="bhk-box backend-banner pre-construct-footer" data-toggle="modal" data-target="#myModal" style="background-image: url('{{asset("admin-panel/assets/property-images/banner-7/".$getBanner_7[0]->banner_7)}}');    padding-top: 0;background-size: 100%;cursor: pointer;background-position: center; background-repeat: no-repeat;"></div>
        @else
            <div class="bhk-box backend-banner pre-construct-footer" data-toggle="modal" data-target="#myModal" style="background-image: url('{{asset("admin-panel/assets/property-images/mobile-banner1.webp")}}');    padding-top: 0;background-size: 100%;cursor: pointer;background-position: center; background-repeat: no-repeat;"></div>
        @endif
    </div>
    <!-- banner End -->
    @include('frontend.include.news-letter-1')
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" style="padding: 1rem;"><!-- style="padding: 1rem;" -->
            <!-- Modal content-->
            <div class="modal-content">
                <div class="contact-agent-box" style="position: unset;">
                    <button type="button" class="close close-popup desktop-modal-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="agent-topbox">
                        {{--                                            <button type="button" data-dismiss="modal" aria-label="Close">&times;</button>--}}
                        <h6 class="fs-16">Get Exclusive VIP Access To This Project Here</h6>
                        <p class="fs-12">Register Below Now To Claim An Exclusive VIP Access Spot To This Pre-Construction Project And Get The Information Package With Perks Before The General Public</p>
                    </div>
                    <div class="modal-body">
                        {{--                                            <p>Some text in the modal.</p>--}}
                        <form id="form2">
                            <ul class="alert alert-danger d-none" id="save_errorList"></ul>
                            <!-- sign-up-empty-field-error-message -->
                            <div id="signUpErrorMessage" style="color:red;"></div>
                            <!-- loader -->
                            <img src="{{asset('frontend/assets/imgs/loading.gif')}}" height="50px" id="inquiry_popup_loader" style="display: none;">
                            {{--                                    <div id="NotFoundError" style="color: red;"></div>--}}
                            <!-- sign-up-success-message -->
                            <div id="signUpSuccessMessage" class="text-success"></div>
                            <div class="form-group mt-10">
                                <label for="exampleFormControlSelect1" class="fs-14">Full Name:<span style="color: red">*</span></label>
                                <input class="form-control br-30 fs-14" id="agent_fullName" name="agent_fullName" value="{{old('agent_fullName')}}" placeholder="Type your Full Name">
                                <!-- validation error message -->
                                @error('agent_fullName')
                                <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group mt-10">
                                <label for="exampleFormControlSelect1" class="fs-14">Phone Number:<span style="color: red">*</span></label>
                                <input class="form-control br-30 fs-14" id="agent_phone" name="agent_phone" value="{{old('agent_phone')}}" placeholder="Type your Phone Number">
                                <!-- validation error message -->
                                @error('agent_phone')
                                <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group mt-10">
                                <label for="exampleFormControlSelect1" class="fs-14">Email Address:<span style="color: red">*</span></label>
                                <input class="form-control br-30 fs-14" id="agent_email" name="agent_email" value="{{old('agent_email')}}" placeholder="Type your Email">
                                <!-- validation error message -->
                                @error('agent_email')
                                <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                            <p class="fs-14">Are you a brokerage or real estate agent<span style="color: red">*</span></p>
                            <div class="row mt-10">
                                <div class="col-lg-6 col-6">
                                    <div class="sub-box">
                                        <ul class="box-sell p-0 mb-0 list-unstyled">
                                            <li>
                                                <input type="radio" id="brokerage_check" name="selector" value="yes" {{ old('selector') == 'yes' ? 'checked' : ''}}>
                                                <label for="brokerage_check" class="mb-0 pb-3 fs-14">Yes</label>
                                                <div class="check"></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-6">
                                    <div class="sub-box">
                                        <ul class="box-sell p-0 mb-0 list-unstyled">
                                            <li>
                                                <input type="radio" id="agent_check" name="selector" value="no" {{ old('selector') == 'no' ? 'checked' : ''}}>
                                                <label for="agent_check" class="mb-0 pb-3 fs-14">No</label>
                                                <div class="check"></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-10">
                                <input type="checkbox" name="consent_box" id="consent_box" checked>
                                <label class="fs-12" style="display: contents">I consent to receiving communication of all future pre-construction offerings and the Tutunji Realty newsletter to the contact information provided above</label>
                            </div>
                            <!-- validation error message -->
                            @error('selector')
                            <p style="color: red;">{{$message}}</p>
                            @enderror
                            <input type="hidden" name="agent_id" id="agent_p_id" value="{{$pre_constructData[0]['id']}}">
                            <input type="hidden" value="{{url('/')}}" id="url" name="url">
                            <div class="agent-footer">
                                <div class="row">
                                    <div class="col-lg-12"><button type="button" class="btn btn-info" id="agent_btn" style="font-size: 14px; padding: 10px 20px !important;">Register Now</button></div>
                                </div>
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
    @section('pre-construct-blog-css')
        <script src="{{asset('')}}frontend/assets/js/owl.carousel.js"></script>
        <script>
            $(".blog-carousel").owlCarousel({

                nav: true,
                loop: false,
                rewind: true,
                margin: 20,
                dots: false,
                responsive: {
                    0: {
                        items: 1,
                        stagePadding: 40,

                    },
                    600: {
                        items: 1,
                    },
                    768: {
                        items: 2,

                    },
                    
                },
            });
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
    <!-- google map -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBi6dX1tFAnm__rELtIR8agR0F3jkHDYhY"></script>

    <script type="text/javascript">
        function initialize() {
            lat = <?php echo ($pre_constructData[0]['latitude']) ?? 43.653226; ?>;
            lng = <?php echo ($pre_constructData[0]['longitude']) ?? -79.3831843; ?>;
            //default map
            const myLatLng = { lat: lat, lng: lng };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 13,
                center: myLatLng,
            });
            new google.maps.Marker({
                position: myLatLng,
                map,
                // title: "Hello Toronto!",
            });

        }
        google.maps.event.addDomListener(window, 'load', initialize);
        var source, destination;
        var directionsDisplay;
        var directionsService = new google.maps.DirectionsService();


        google.maps.event.addDomListener(window, 'load', function () {
            new google.maps.places.SearchBox(document.getElementById('txtSource'));
            new google.maps.places.SearchBox(document.getElementById('txtDestination'));
            directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });
        });

        function GetRoute() {

            var mumbai = new google.maps.LatLng(43.653226, -79.3831843);
            var mapOptions = {
                zoom: 15,
                center: mumbai
            };
            map = new google.maps.Map(document.getElementById('map'), mapOptions);
            directionsDisplay.setMap(map);
            // directionsDisplay.setPanel(document.getElementById('dvPanel'));

            //*********DIRECTIONS AND ROUTE**********************//
            source = document.getElementById("txtSource").value;
            destination = document.getElementById("txtDestination").value;

            var request = {
                origin: source,
                destination: destination,
                travelMode: google.maps.TravelMode.DRIVING
            };
            directionsService.route(request, function (response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                }
            });

            //*********DISTANCE AND DURATION**********************//
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix({
                origins: [source],
                destinations: [destination],
                travelMode: google.maps.TravelMode.DRIVING,
                unitSystem: google.maps.UnitSystem.METRIC,
                avoidHighways: false,
                avoidTolls: false
            }, function (response, status) {
                if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
                    var distance = response.rows[0].elements[0].distance.text;
                    var duration = response.rows[0].elements[0].duration.text;
                    var dvDistance = document.getElementById("dvDistance");
                    dvDistance.innerHTML = "";
                    // dvDistance.innerHTML += "Distance: " + distance + "<br />";
                    // dvDistance.innerHTML += "Duration:" + duration;
                    dvDistance.innerHTML += "<div class='row justify-content-center text-center'><div class='col-md-6'><label style='font-weight: 700;font-size: 17px;'>Distance : "+distance+" </label></div><div class='col-md-6'><label style='font-weight: 700;font-size: 17px;'>Duration : "+duration+" </label></div></div>";

                } else {
                    Swal.fire({icon: 'error', title: 'Oops...', text: 'Unable to find the distance via road!'});
                    //alert("Unable to find the distance via road.");
                }
            });
        }
    </script>

    <!-- inquiry-popup-form script start here -->
    <script>
        $(document).ready(function () {
            $('#agent_btn').click(function () {

                $("#signUpErrorMessage").empty();

                var full_name       = $('#agent_fullName').val();
                var phone_number    = $('#agent_phone').val();
                var email_address   = $('#agent_email').val();
                var isChecked       = jQuery("input[name=selector]:checked").val();
                var userId          = $("input[name=user_id]").val();
                var property_id = $('#agent_p_id').val();
                // console.log(property_id);
                // $('#media_upload_btn_section').hide();


                if(full_name != "" && phone_number != "" && email_address != "" && isChecked != ""){
                    $('#inquiry_popup_loader').show();

                    let id= $("input[name=agent_id]").val();
                    $.ajax({
                        url     : '{{url("/info-inquiry")}}' + '/' + id,
                        type    : 'post',
                        data    : {
                            _token          : '{{ csrf_token() }}',
                            agent_fullName  : full_name,
                            agent_phone     : phone_number,
                            agent_email     : email_address,
                            selector        : isChecked,
                            user_id         : userId,
                            property_id     : property_id
                        },
                        success : function(response){
                            var newRes = JSON.parse(JSON.stringify(response));
                            // $('#media_upload_btn_section').show();
                            // $('#mediaBtn').show();
                            $('#inquiry_popup_loader').hide();
                            if(newRes.success == '3'){
                                $("#signUpErrorMessage").append(response.message);
                            }else if(newRes.success == '1'){
                                $('#save_errorList').html("");
                                $('#save_errorList').addClass('d-done');
                                $("#signUpSuccessMessage").empty().append(newRes.message);
                                setTimeout(function() {
                                    $('.close-popup').trigger('click');
                                    $("#form2")[0].reset();
                                    $('#signUpSuccessMessage').remove();
                                    // location.reload();
                                    check_inquiry();
                                }, 1500);
                            //}
                            // if(newRes.success == "1"){
                            //     $('#save_errorList').html("");
                            //     $('#save_errorList').addClass('d-done');
                            //     $("#signUpSuccessMessage").empty().append(newRes.message);
                            //     setTimeout(function() {
                            //         location.reload();
                            //     }, 1500);
                            }else if(response.success = '0'){
                                // console.log(response.message);
                                $("#signUpErrorMessage").append(response.message);
                            }else if(response.success = '2'){
                                $("#signUpErrorMessage").append(response.message);
                            }else if(response.success = '4'){
                                $("#signUpErrorMessage").append(response.message);
                            }
                            else {
                                $("#signUpErrorMessage").append(newRes.message);
                            }
                        }
                    });
                } else {
                    $("#signUpErrorMessage").append("Required fields missing");
                }
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
    <!-- address height-script -->
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
    <!-- floor-plan-blur-unblur-script -->
    <script>
        $(document).ready(function (){
            check_inquiry();
        });

        function check_inquiry() {
            let p_id = $("#agent_p_id").val();
            console.log(p_id);
            $.ajax({
                type    : 'post',
                url     : '{{url("/check-inquiry")}}',
                data    : {
                    _token : '{{ csrf_token() }}',
                    p_id  : p_id,
                },
                success : function(response){
                    console.log(response);
                    let result = JSON.parse(JSON.stringify(response));
                    if(result.success == 3 || result.success == 1){
                        console.log(result.success);
                        $("#floor-plan-blur").css({
                          "filter": "blur(0px)",
                          "pointer-events": "inherit" 
                        });
                        $('.btn-floor').css("display","none");
                    }
                }
            });
        }
    </script>
    <!-- one-page menu link -->
    <script>
        $(document).ready(function (){
            $('.about_us_web').click(function (){
                location.href = '{{url("/#about")}}'
            });
            $('.featured_in_web').click(function (){
                location.href = '{{url("/#featured_in")}}'
            });
            $('.our_team_web').click(function (){
                location.href = '{{url("/#our-team")}}'
            });
            $('.blogs_web').click(function (){
                location.href = '{{url("/#blogs")}}'
            });
            $('.newsletter_web').click(function (){
                location.href = '{{url("/#newsletter")}}'
            });
            $('.browse_cities_web').click(function (){
                location.href = '{{url("/#browse_cities")}}'
            });
            $('.testimonial_web').click(function (){
                location.href = '{{url("/#testimonial")}}'
            });
            $('.our_strategy_web').click(function (){
                location.href = '{{url("/#container-gsap")}}'
            });
            $('.contact_us_web').click(function (){
                location.href = '{{url("/#contact")}}'
            });
            //for mobile view
            $('.about_us_mob').click(function (){
                location.href = '{{url('/#about')}}'
            });
            $('.featured_in_mob').click(function (){
                location.href = '{{url("/#featured_in")}}'
            });
            $('.our_team_mob').click(function (){
                location.href = '{{url("/#our-team")}}'
            });
            $('.blogs_mob').click(function (){
                location.href = '{{url("/#blogs")}}'
            });
            $('.newsletter_mob').click(function (){
                location.href = '{{url("/#newsletter")}}'
            });
            $('.browse_cities_mob').click(function (){
                location.href = '{{url("/#browse_cities")}}'
            });
            $('.testimonial_mob').click(function (){
                location.href = '{{url("/#testimonial")}}'
            });
            $('.our_strategy_mob').click(function (){
                location.href = '{{url("/#container-gsap")}}'
            });
            $('.contact_us_mob').click(function (){
                location.href = '{{url("/#contact")}}'
            });
        });
    </script>
    <!-- dropdown menu -->
    <script>
        $(".filter-dropdown").on("click", ".dropdown-toggle", function(e) {
            e.preventDefault();
            $(this).parent().addClass("show");
            $(this).attr("aria-expanded", "true");
            $(this).next().addClass("show");
        });
    </script>

        <script>
$(window).on('resize', function() {
  var windowWidth = $(window).width();
  var newHeight = 280 * (windowWidth / 2500); // Adjust the factor (2500) as per your requirement
  $('.pre-construct-header').css('height', newHeight + 'px');
}).trigger('resize');


    </script>
    <script>
$(window).on('resize', function() {
  var windowWidth = $(window).width();
  var newHeight = 322 * (windowWidth / 2500); // Adjust the factor (2500) as per your requirement
  $('.pre-construct-footer').css('height', newHeight + 'px');
}).trigger('resize');


    </script>
    <!-- inquiry form display message without page refresh -->
    <script>
        $(document).ready(function (){
            $('#formBtn').click(function (){
                $("#alert-message-danger").empty();
                var fullNameBox       = $('#fullNameBox').val();
                var phoneBox          = $('#phoneBox').val();
                var emailBox          = $('#emailBox').val();
                var isCheckedBox      = jQuery("input[name=selectorBox]:checked").val();
                var userIdBox         = $("input[name=user_id]").val();
                var property_idBox    = $('#agent_p_id').val();

                $('#inquiry_form_loader').show();
                // if(fullNameBox != "" && phoneBox != "" && emailBox != "" && isCheckedBox != ""){
                    let id = $("input[name=agent_id]").val();
                    $.ajax({
                        url     : '{{url("/save-inquiry")}}' + '/' + id,
                        type    : 'post',
                        data    : {
                            _token          : '{{ csrf_token() }}',
                            fullNameBox     : fullNameBox,
                            phoneBox        : phoneBox,
                            emailBox        : emailBox,
                            selectorBox     : isCheckedBox,
                            userIdBox       : userIdBox,
                            property_idBox  : property_idBox

                        },
                        success : function(response){
                             var newRes = JSON.parse(JSON.stringify(response));
                            $('#inquiry_form_loader').hide();

                            //console.log(newRes.session_property_id);
                            if(newRes.code == 404){
                                $("#alert-message-danger").empty().append(newRes.message);
                            }
                            else if(newRes.code == 200){
                                $("#alert-message-success").empty().append(newRes.message);
                                setTimeout(function(){
                                        // $('.close-popup').trigger('click');
                                        $("#form")[0].reset();
                                        $("#formABC")[0].reset();
                                        $('#alert-message-success').remove();
                                        check_inquiry();
                                    },
                                    // location.reload();
                                    1500);
                                // location.reload();
                            }else if(newRes.code == 400){
                                $("#alert-message-danger").append(newRes.message);
                            }
                            else if(newRes.code == 404){
                                $("#alert-message-danger").append(newRes.message);
                            }
                            else {
                                $("#alert-message-danger").append(newRes.message);
                            }
                        },error: function (response){
                            var newRes = JSON.parse(JSON.stringify(response));
                            $.each(newRes.responseJSON.errors,function(field_name,error){
                                $(document).find('[name='+field_name+']').after('<span class="text-strong textdanger">' +error+ '</span>')
                            })
                        }
                    });
                // }
                // else{
                //     $('#alert-message-danger').append('Please fill required fields!');
                // }
            });
        });
    </script>

@endsection



