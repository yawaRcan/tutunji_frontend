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
            position: initial;
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
                display: none;
            }
            .desktop-modal-close{
                display: block;
            }
        }
        /* tablet size between 768px up and 992px down */
        @media (min-width: 768px) and (max-width: 992px) {
            .floor-text{
                position: absolute;
                color: #1ed760 !important;
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
                background-color: #1ed760 !important;
                border-color: #1ed760 !important;
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
                height: 160px!important;
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
                <!--               web view-->
                <div class="header-menu-list dn header-wrapper">
                    <div class="btn-expand">
                        <span class="line-1"></span>
                        <span class="line-2"></span>
                        <span class="line-3"></span>
                    </div>
                    <div class="collapsible">
                        <ul class="text-center">
                            <li class="nav-item pl-17">
                                <a class="nav-link" href="index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <div class="main">
                                    <input type="checkbox" id="drop-5" hidden>
                                    <label class="dropHeader dropHeader-5 label-1 dropdown-toggle" for="drop-5"> About
                                        Us</label>
                                    <div class="list list-5">
                                        <div class="item1"> <a class="" href="#about"
                                                               onclick="window.open('https://tutunjirealty.com/demo/public/about');">About
                                                Tutunji Realty</a></div>
                                        <div class="item1"><a class="" href="#featured_in">Featured In</a></div>
                                        <div class="item1"> <a class="" href="#agent"
                                                               onclick="window.open('https://tutunjirealty.com/demo/public/agent');">Our
                                                Agents</a></div>
                                        <div class="item1"><a class="" href="#blogs"
                                                              onclick="window.open('https://tutunjirealty.com/demo/public/blog-page');">Blogs</a>
                                        </div>
                                        <div class="item1"><a class="" href="#newsletter">Newsletter</a></div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="main">
                                    <input type="checkbox" id="drop-6" hidden>
                                    <label class="dropHeader dropHeader-5 label-1 dropdown-toggle" for="drop-6"> Browse
                                        Real Estate</label>
                                    <div class="list list-5">
                                        <div class="item1"> <a class=""
                                                               href="https://tutunjirealty.com/demo/public/pre-construct-search">Pre-Construction
                                                Properties</a></div>
                                        <div class="item1"><a class=""
                                                              href="https://tutunjirealty.com/demo/public/sale-search">For Sale/Lease
                                                Properties</a></div>
                                        <div class="item1"> <a class="" href="#browse_cities">Browse Areas</a></div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="testimonials.html">Testimonials</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Our Strategy</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact Us</a>
                            </li>

                            <!--                            <li class="pl-196"><button type="button" class="btn btn-success"><img src="imgs/Group%2014.png" alt="" class="img-fluid w-24">Sell My Property</button></li>-->
                        </ul>
                    </div>
                </div>
                <!--                end of web view-->
                <!--                mobile view-->
                <nav class="navbar navbar-light bg-light bg-toggler dn-1">
                    <button class="navbar-toggler btn-toogler border-0" type="button" data-toggle="collapse"
                            data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse n-collapse" id="navbarNav">
                        <ul class="navbar-nav text-center">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary btn-transparent dropdown-toggle" type="button"
                                                id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                            About Us
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <button class="dropdown-item" type="button" href="#about"
                                                    onclick="window.open('https://tutunjirealty.com/demo/public/about');">About
                                                Tutunji Realty</button>
                                            <button class="dropdown-item" type="button" href="#featured_in">Featured
                                                In</button>
                                            <button class="dropdown-item" type="button" href="#agent"
                                                    onclick="window.open('https://tutunjirealty.com/demo/public/agent');">Our
                                                Agents</button>
                                            <button class="dropdown-item" type="button" href="#blogs"
                                                    onclick="window.open('https://tutunjirealty.com/demo/public/blog-page');">Blogs</button>
                                            <button class="dropdown-item" type="button"
                                                    href="#newsletter">Newsletter</button>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary btn-transparent dropdown-toggle" type="button"
                                                id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                            Browse Real Estate
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <button class="dropdown-item" type="button"
                                                    href="https://tutunjirealty.com/demo/public/pre-construct-search">Pre-Construction
                                                Properties</button>
                                            <button class="dropdown-item" type="button"
                                                    href="https://tutunjirealty.com/demo/public/sale-search">For Sale/Lease
                                                Properties</button>
                                            <button class="dropdown-item" type="button" href="#browse_cities">Browse
                                                Areas</button>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="testimonials.html">Testimonials</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Our Strategy</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact Us</a>
                            </li>
                        </ul>
                        <!--
                        <button type="button" class="btn btn-success btn-sell">
                            <img src="imgs/Group%2014.png" alt="" class="img-fluid w-24 d-none" />Sell My Property
                        </button>
-->
                    </div>
                </nav>
                <!--                end of mobile view-->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pl-0">
                        <li class="breadcrumb-item">
                            <a href="index.html" class="text-darkgrey fw-700">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="pre-construction.html" class="text-darkgrey fw-700">New Pre-Construction</a>
                        </li>
                        <li class="breadcrumb-item active fw-700" aria-current="page">
                            3 BHK Apartment
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h4 class="fs-24 fw-700">
                    3 BHK Apartment
                    <span class="fs-18 text-grey fw-400">in Toronto, Canada</span>
                </h4>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-lg-6 center">
                <h1 class="fs-30 fw-700">$55,000</h1>
            </div>
            <div class="col-lg-6 mt-21">
                <ul class="list-unstyled list-inline d-flex justify-content-end align-items-center center">
                    <li class="list-inline-item">
                        <a href="" class="text-black"><i class="far fa-heart fs-20 fw-400 mr-10"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="" class="text-black"><i class="fas fa-share-alt fs-20 mr-10"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <button type="button" class="btn btn-info" id="registerButton"
                                style="font-size: 14px; padding: 10px 20px !important">
                            Register Now
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row mt-40">
            @if($pre_constructData[0]['embed_video_id'] == NULL && $totalPropertyMediaImages == '1')
                <p>if video is empty put first image in center</p>
{{--                <div class="text-center" style="margin-left: auto;margin-right: auto;">--}}
{{--                        <?php $images = $pre_constructData[0]['multiple_media']; ?>--}}
{{--                    @if($pre_constructData[0]['multiple_media'] && $pre_constructData[0]['property_type'] == 'pre-construct')--}}
{{--                        @if(isset($images[0]))--}}
{{--                            <a href="{{url('/pre-construct-slider-popup',$pre_constructData[0]['id'])}}">--}}
{{--                                @php($image_path = public_path('admin-panel/assets/property-images/media-file/pre-construct/'.$images[0]['media_name']))--}}
{{--                                @php(\App\Helper\ImageConverterHelper::resize($image_path, $image_path, 910, 622))--}}
{{--                                <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$images[0]['media_name'])}}" alt="" class="img-fluid w-100" style="border: solid 1px #f3f3f3;">--}}
{{--                            </a>--}}
{{--                        @endif--}}
{{--                    @endif--}}
{{--                </div>--}}
            @elseif($pre_constructData[0]['embed_video_id'] != NULL && $totalPropertyMediaImages == '1')
                <p>put video in center</p>
{{--                <div class="text-center" style="margin-left: auto;margin-right: auto;">--}}
{{--                    @if($pre_constructData[0]['video_from'] == 'vimeo')--}}
{{--                        <iframe class="video_url" src="{{url($pre_constructData[0]['embed_video_id'])}}" title="Real Estate Property Video Tour Example" style="width: 100%;height: 100%;border: solid 1px #f3f3f3;padding: 0px;"></iframe> --}}{{-- https://www.youtube.com/embed/7Qivx2om0MM --}}
{{--                    @elseif($pre_constructData[0]['video_from'] == 'youtube')--}}
{{--                        <iframe class="video_url" width="100%" height="100%" src="{{url($pre_constructData[0]['embed_video_id'])}}" title="Real Estate Property Video Tour Example" style="border: solid 1px #f3f3f3;"></iframe> --}}{{-- https://www.youtube.com/embed/7Qivx2om0MM --}}
{{--                    @endif--}}
{{--                </div>--}}
            @elseif($pre_constructData[0]['embed_video_id'] != NULL && $totalPropertyMediaImages == '2')
                <div class="col-lg-8 col-8">
                    <p>put video here</p>
{{--                    @if($pre_constructData[0]['video_from'] == 'vimeo')--}}
{{--                        <iframe class="video_url" src="{{url($pre_constructData[0]['embed_video_id'])}}" title="Real Estate Property Video Tour Example" style="width: 100%;height: 100%;border: solid 1px #f3f3f3;padding: 0px;"></iframe>   https://www.youtube.com/embed/7Qivx2om0MM --}}
{{--                    @elseif($pre_constructData[0]['video_from'] == 'youtube')--}}
{{--                        <iframe class="video_url" width="100%" height="450" src="{{url($pre_constructData[0]['embed_video_id'])}}" title="Real Estate Property Video Tour Example" style="border: solid 1px #f3f3f3;"></iframe>  https://www.youtube.com/embed/7Qivx2om0MM --}}
{{--                    @endif--}}
                </div>
                <div class="col-lg-4 col-4" style="display: flex;align-items: center">
                    <p>display second image in middle of the first image</p>
{{--                    @if($pre_constructData[0]['multiple_media'] && $pre_constructData[0]['property_type'] == 'pre-construct')--}}
{{--                            <?php $images = $pre_constructData[0]['multiple_media']; ?>--}}
{{--                        <a href="{{url('/pre-construct-slider-popup',$pre_constructData[0]['id'])}}">--}}
{{--                            @if(isset($images[1]))--}}
{{--                                @php($image_path = public_path('admin-panel/assets/property-images/media-file/pre-construct/'.$images[1]['media_name']))--}}
{{--                                @php(\App\Helper\ImageConverterHelper::resize($image_path, $image_path, 910, 622))--}}
{{--                                <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$images[1]['media_name'])}}" alt="" class="img-fluid w-100" style="border: solid 1px #f3f3f3;">--}}
{{--                            @endif--}}
{{--                        </a>--}}
{{--                    @endif--}}
                </div>
            @elseif($pre_constructData[0]['embed_video_id'] == NULL && $totalPropertyMediaImages == '2')
                <div class="col-lg-8 col-8">
                    <p>put first image here</p>

                </div>
                <div class="col-lg-4 col-4" style="display: flex;align-items: center">
                    <p>put second image in middle of the section</p>
                </div>
            @elseif($pre_constructData[0]['embed_video_id'] != NULL && $totalPropertyMediaImages > '2')
                <div class="col-lg-8 col-8">
                    @if($pre_constructData[0]['video_from'] == 'vimeo')
                        <iframe class="video_url" src="{{url($pre_constructData[0]['embed_video_id'])}}" title="Real Estate Property Video Tour Example" style="width: 100%;height: 100%;border: solid 1px #f3f3f3;padding: 0px;"></iframe>  {{-- https://www.youtube.com/embed/7Qivx2om0MM --}}
                    @elseif($pre_constructData[0]['video_from'] == 'youtube')
                        <iframe class="video_url" width="100%" height="450" src="{{url($pre_constructData[0]['embed_video_id'])}}" title="Real Estate Property Video Tour Example" style="border: solid 1px #f3f3f3;"></iframe>  {{--https://www.youtube.com/embed/7Qivx2om0MM --}}
                    @endif
                </div>
                <div class="col-lg-4 col-4">
                    @if($pre_constructData[0]['multiple_media'] && $pre_constructData[0]['property_type'] == 'pre-construct')
                            <?php $images = $pre_constructData[0]['multiple_media']; ?>
                        <a href="{{url('/pre-construct-slider-popup',$pre_constructData[0]['id'])}}">
                            @if(isset($images[1]))
                                @php($image_path = public_path('admin-panel/assets/property-images/media-file/pre-construct/'.$images[1]['media_name']))
                                @php(\App\Helper\ImageConverterHelper::resize($image_path, $image_path, 910, 622))
                                <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$images[1]['media_name'])}}" alt="" class="img-fluid w-100" style="border: solid 1px #f3f3f3;">
                            @endif
                        </a>
                    @endif
                    <div class="container-img mt-10">
                        @if($pre_constructData[0]['multiple_media'] && $pre_constructData[0]['property_type'] == 'pre-construct')
                                <?php $images = $pre_constructData[0]['multiple_media']; ?>
                            <a href="{{url('/pre-construct-slider-popup',$pre_constructData[0]['id'])}}">
                                @if(isset($images[2]))
                                    @php($image_path = public_path('admin-panel/assets/property-images/media-file/pre-construct/'.$images[2]['media_name']))
                                    @php(\App\Helper\ImageConverterHelper::resize($image_path, $image_path, 910, 622))
                                    <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$images[2]['media_name'])}}" alt="" class="image img-fluid bg-image" style="border: solid 1px #f3f3f3;">
                                    <div class="centered mobile-opacity-text text-center"><a href="{{url('/pre-construct-slider-popup',$pre_constructData[0]['id'])}}" class="btn btn-warning btn-sm" style="background-color: #fff;border-color: #fff;color: #000000;font-weight: bold;border-radius: 24px;width: 100%;">View All Photos</a></div>
                                @endif
                            </a>
                        @endif
                    </div>
                </div>
            @elseif($totalPropertyMediaImages == '2')
                <div class="col-lg-8 col-8">
                        <?php $images = $pre_constructData[0]['multiple_media']; ?>
                    @if($pre_constructData[0]['multiple_media'] && $pre_constructData[0]['property_type'] == 'pre-construct')
                        @if(isset($images[0]))
                            <a href="{{url('/pre-construct-slider-popup',$pre_constructData[0]['id'])}}">
                                @php($image_path = public_path('admin-panel/assets/property-images/media-file/pre-construct/'.$images[0]['media_name']))
                                @php(\App\Helper\ImageConverterHelper::resize($image_path, $image_path, 910, 622))
                                <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$images[0]['media_name'])}}" alt="" class="img-fluid w-100" style="border: solid 1px #f3f3f3;">
                            </a>
                        @endif
                    @endif
                </div>
                <div class="col-lg-4 col-4" style="display: flex;align-items: center">
                    @if($pre_constructData[0]['multiple_media'] && $pre_constructData[0]['property_type'] == 'pre-construct')
                            <?php $images = $pre_constructData[0]['multiple_media']; ?>
                        <a href="{{url('/pre-construct-slider-popup',$pre_constructData[0]['id'])}}">
                            @if(isset($images[1]))
                                @php($image_path = public_path('admin-panel/assets/property-images/media-file/pre-construct/'.$images[1]['media_name']))
                                @php(\App\Helper\ImageConverterHelper::resize($image_path, $image_path, 910, 622))
                                <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$images[1]['media_name'])}}" alt="" class="img-fluid w-100" style="border: solid 1px #f3f3f3;">
                            @endif
                        </a>
                    @endif
                </div>
            @elseif($pre_constructData[0]['embed_video_id'] == NULL && $totalPropertyMediaImages == '2')
                <p>2 image available </p>
            @else
                <div class="col-lg-8 col-8">
                        <?php $images = $pre_constructData[0]['multiple_media']; ?>
                    @if($pre_constructData[0]['multiple_media'] && $pre_constructData[0]['property_type'] == 'pre-construct')
                        @if(isset($images[0]))
                            <a href="{{url('/pre-construct-slider-popup',$pre_constructData[0]['id'])}}">
                                @php($image_path = public_path('admin-panel/assets/property-images/media-file/pre-construct/'.$images[0]['media_name']))
                                @php(\App\Helper\ImageConverterHelper::resize($image_path, $image_path, 910, 622))
                                <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$images[0]['media_name'])}}" alt="" class="img-fluid w-100" style="border: solid 1px #f3f3f3;">
                            </a>
                        @endif
                    @endif
                </div>
                <div class="col-lg-4 col-4">
                    @if($pre_constructData[0]['multiple_media'] && $pre_constructData[0]['property_type'] == 'pre-construct')
                            <?php $images = $pre_constructData[0]['multiple_media']; ?>
                        <a href="{{url('/pre-construct-slider-popup',$pre_constructData[0]['id'])}}">
                            @if(isset($images[1]))
                                @php($image_path = public_path('admin-panel/assets/property-images/media-file/pre-construct/'.$images[1]['media_name']))
                                @php(\App\Helper\ImageConverterHelper::resize($image_path, $image_path, 910, 622))
                                <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$images[1]['media_name'])}}" alt="" class="img-fluid w-100" style="border: solid 1px #f3f3f3;">
                            @endif
                        </a>
                    @endif
                    <div class="container-img mt-10">
                        @if($pre_constructData[0]['multiple_media'] && $pre_constructData[0]['property_type'] == 'pre-construct')
                                <?php $images = $pre_constructData[0]['multiple_media']; ?>
                            <a href="{{url('/pre-construct-slider-popup',$pre_constructData[0]['id'])}}">
                                @if(isset($images[2]))
                                    @php($image_path = public_path('admin-panel/assets/property-images/media-file/pre-construct/'.$images[2]['media_name']))
                                    @php(\App\Helper\ImageConverterHelper::resize($image_path, $image_path, 910, 622))
                                    <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$images[2]['media_name'])}}" alt="" class="image img-fluid bg-image" style="border: solid 1px #f3f3f3;">
                                    <div class="centered mobile-opacity-text text-center"><a href="{{url('/pre-construct-slider-popup',$pre_constructData[0]['id'])}}" class="btn btn-warning btn-sm" style="background-color: #fff;border-color: #fff;color: #000000;font-weight: bold;border-radius: 24px;width: 100%;">View All Photos</a></div>
                                @endif
                            </a>
                        @endif
                    </div>
                </div>
            @endif
        </div>
        <div class="row mt-20">
            <div class="col-lg-12">
                <div class="blue-bar">
                    <div class="row">
                        <div class="col-lg-2 col-4 text-center">
                            <h6 class="fs-14 mb-0">$123,000</h6>
                            <span class="fs-12 text-grey"> 8,002 / sq ft </span>
                        </div>
                        <div class="col-lg-2 col-4 text-center">
                            <h6 class="fs-14 mb-0">3589</h6>
                            <span class="fs-12 text-grey"> Area in sq ft </span>
                        </div>
                        <div class="col-lg-2 col-4 text-center">
                            <h6 class="fs-14 mb-0">Pre-Construction</h6>
                            <span class="fs-12 text-grey"> Property Status </span>
                        </div>
                        <div class="col-lg-2 col-4 mt-11 text-center">
                            <h6 class="fs-14 mb-0">3 BHK</h6>
                            <span class="fs-12 text-grey"> Configuration </span>
                        </div>
                        <div class="col-lg-2 col-4 mt-11 text-center">
                            <h6 class="fs-14 mb-0">Jul 2021</h6>
                            <span class="fs-12 text-grey"> Posted On </span>
                        </div>
                        <div class="col-lg-2 col-4 mt-11 text-center">
                            <h6 class="fs-14 mb-0">UnFurnished</h6>
                            <span class="fs-12 text-grey"> Furnishing </span>
                        </div>
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
                            <td class="border-top-0">Overview 1</td>
                            <td class="border-top-0 fw-700">Overview 1 result</td>
                            <td class="border-top-0">Overview 3</td>
                            <td class="fw-700 border-top-0">Overview 3 result</td>
                        </tr>
                        <tr>
                            <td>Overview 2</td>
                            <td class="fw-700">Overview 2 result</td>
                            <td>Overview 3</td>
                            <td class="fw-700">Overview 3 result</td>
                        </tr>
                        <tr>
                            <td>Overview 3</td>
                            <td class="fw-700">Overview 3 result</td>
                            <td>Overview 3</td>
                            <td class="fw-700">Overview 3 result</td>
                        </tr>
                        <tr>
                            <td>Overview 4</td>
                            <td class="fw-700">Overview 4 result</td>
                            <td>Overview 3</td>
                            <td class="fw-700">Overview 3 result</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!--    pop up btn-->
                <button type="button" class="btn-success position-f dn1" id="agentButton" hidden data-toggle="modal"
                        data-target="#exampleModal1">
                    Contact Agent / Sign Up
                </button>
                <!--end of pop up btn-->
                <div class="bhk-box mt-20">
                    <h4 class="fs-20 text-deco">Description</h4>
                    <p class="mt-20 fs-16 fw-400">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam
                        cupiditate eaque fugit magni molestiae architecto. Possimus
                        consequatur explicabo nesciunt nostrum! Dignissimos non ipsum eum,
                        quisquam quia. M fw-400inima, placeat. Sunt, hic.
                    </p>
                    <p class="mt-20 fs-16 fw-400">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam
                        cupiditate eaque fugit magni molestiae architecto. Possimus
                        consequatur explicabo nesciunt nostrum! Dignissimos non ipsum eum,
                        quisquam quia. Minima, placeat. Sunt, hic.
                    </p>
                </div>
                <div class="bhk-box mt-20">
                    <h4 class="fs-20 text-deco">Amenities</h4>
                    <div class="row mt-20">
                        <div class="custom-col-2 px-10 text-center">
                            <div class="amenities-box">
                                <ul class="text-center list-unstyled">
                                    <li>
                                        <img src="imgs/photo.png" alt="" class="img-fluid mt-10" />
                                    </li>
                                    <li class="fs-12 fw-700 mt-10">Amenity 1</li>
                                </ul>
                            </div>
                        </div>
                        <div class="custom-col-2 px-10 text-center">
                            <div class="amenities-box">
                                <ul class="text-center list-unstyled">
                                    <li>
                                        <img src="imgs/photo.png" alt="" class="img-fluid mt-10" />
                                    </li>
                                    <li class="fs-12 fw-700 mt-10">Amenity 2</li>
                                </ul>
                            </div>
                        </div>
                        <div class="custom-col-2 px-10 mt-21 text-center">
                            <div class="amenities-box">
                                <ul class="text-center list-unstyled">
                                    <li>
                                        <img src="imgs/photo.png" alt="" class="img-fluid mt-10" />
                                    </li>
                                    <li class="fs-12 fw-700 mt-10">Amenity 3</li>
                                </ul>
                            </div>
                        </div>
                        <div class="custom-col-2 px-10 mt-21 text-center">
                            <div class="amenities-box">
                                <ul class="text-center list-unstyled">
                                    <li>
                                        <img src="imgs/photo.png" alt="" class="img-fluid mt-10" />
                                    </li>
                                    <li class="fs-12 fw-700 mt-10">Amenity 4</li>
                                </ul>
                            </div>
                        </div>
                        <div class="custom-col-2 px-10 mt-21 text-center">
                            <div class="amenities-box">
                                <ul class="text-center list-unstyled">
                                    <li>
                                        <img src="imgs/photo.png" alt="" class="img-fluid mt-10" />
                                    </li>
                                    <li class="fs-12 fw-700 mt-10">Amenity 5</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="custom-col-2 px-10 text-center">
                            <div class="amenities-box">
                                <ul class="text-center list-unstyled">
                                    <li>
                                        <img src="imgs/photo.png" alt="" class="img-fluid mt-10" />
                                    </li>
                                    <li class="fs-12 fw-700 mt-10">Amenity 6</li>
                                </ul>
                            </div>
                        </div>
                        <div class="custom-col-2 px-10 text-center">
                            <div class="amenities-box">
                                <ul class="text-center list-unstyled">
                                    <li>
                                        <img src="imgs/photo.png" alt="" class="img-fluid mt-10" />
                                    </li>
                                    <li class="fs-12 fw-700 mt-10">Amenity 7</li>
                                </ul>
                            </div>
                        </div>
                        <div class="custom-col-2 px-10 mt-21 text-center">
                            <div class="amenities-box">
                                <ul class="text-center list-unstyled">
                                    <li>
                                        <img src="imgs/photo.png" alt="" class="img-fluid mt-10" />
                                    </li>
                                    <li class="fs-12 fw-700 mt-10">Amenity 8</li>
                                </ul>
                            </div>
                        </div>
                        <div class="custom-col-2 px-10 mt-21 text-center">
                            <div class="amenities-box">
                                <ul class="text-center list-unstyled">
                                    <li>
                                        <img src="imgs/photo.png" alt="" class="img-fluid mt-10" />
                                    </li>
                                    <li class="fs-12 fw-700 mt-10">Amenity 9</li>
                                </ul>
                            </div>
                        </div>
                        <div class="custom-col-2 px-10 mt-21 text-center">
                            <div class="amenities-box">
                                <ul class="text-center list-unstyled">
                                    <li>
                                        <img src="imgs/photo.png" alt="" class="img-fluid mt-10" />
                                    </li>
                                    <li class="fs-12 fw-700 mt-10">Amenity 10</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bhk-box mt-20">
                    <div class="row">
                        <div class="col-lg-8 col-8">
                            <h4 class="fs-20 text-deco">Floor Plan</h4>
                            <h4 class="fs-16 fw-400 mt-20">3 BHK Apartment</h4>
                            <h4 class="fs-18 fw-700">$123,000</h4>
                        </div>
                        <div class="col-lg-4 col-4">
                            <div class="floorplan-box">
                                <ul class="nav nav-pills mb-3 justify-content-end" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                           href="#pills-home" role="tab" aria-controls="pills-home"
                                           aria-selected="true">2D</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                           href="#pills-profile" role="tab" aria-controls="pills-profile"
                                           aria-selected="false">3D</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-20">
                        <div class="col-lg-12 text-center">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                     aria-labelledby="pills-home-tab">
                                    <img src="imgs/map.png" alt="" class="img-fluid" />
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                     aria-labelledby="pills-profile-tab">
                                    ...
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-30">
                        <div class="col-lg-4 offset-lg-4 text-center">
                            <button type="button" class="btn btn-info"
                                    style="font-size: 14px; padding: 10px 20px !important">
                                Contact Listing Agent
                            </button>
                        </div>
                    </div>
                </div>
                <div class="bhk-box mt-20">
                    <h4 class="fs-20 text-deco">Neighbourhood</h4>
                    <div class="row mt-20">
                        <div class="col-lg-12">
                            <input type="text" class="form-control h-10" style="border: 1px solid #d5d5d5 !important"
                                   placeholder="Type in place to get direction" />
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22997.172272146225!2d-80.0478016302069!3d43.90458695755299!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d4cb90d7c63ba5%3A0x323555502ab4c477!2sToronto%2C%20ON%2C%20Canada!5e0!3m2!1sen!2s!4v1635784562873!5m2!1sen!2s"
                                width="100%" height="520" style="border-radius: 25px; border: 0px; margin-top: 20px"
                                allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
                <div class="bhk-box mt-20">
                    <div class="row">
                        <div class="col-lg-8 col-8">
                            <h4 class="fs-20 text-deco">
                                Customers who viewed this property also liked
                            </h4>
                        </div>
                        <div class="col-lg-4 col-4 text-right">
                            <h4><a href="" class="text-green fs-20">View All</a></h4>
                        </div>
                    </div>
                    <div class="row mt-20">
                        <div class="col-lg-12 blog">
                            <div class="owl-carousel blog-carousel owl-theme">
                                <div class="item">
                                    <div class="card" style="width: 100%">
                                        <img src="imgs/slider.png" class="card-img-top img-fluid w-100" alt="..." />
                                        <div class="card-body">
                                            <h6 class="fs-16">Property Name #1</h6>
                                            <ul class="list-unstyled fs-12 text-grey">
                                                <li>By Agent Name #1</li>
                                                <li>3 BHK Apartment</li>
                                                <li>Location</li>
                                            </ul>
                                            <h6 class="fs-16 mt-26">$55,000</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card" style="width: 100%">
                                        <img src="imgs/slider.png" class="card-img-top img-fluid w-100" alt="..." />
                                        <div class="card-body">
                                            <h6 class="fs-16">Property Name #1</h6>
                                            <ul class="list-unstyled fs-12 text-grey">
                                                <li>By Agent Name #1</li>
                                                <li>3 BHK Apartment</li>
                                                <li>Location</li>
                                            </ul>
                                            <h6 class="fs-16 mt-26">$55,000</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card" style="width: 100%">
                                        <img src="imgs/slider.png" class="card-img-top img-fluid w-100" alt="..." />
                                        <div class="card-body">
                                            <h6 class="fs-16">Property Name #1</h6>
                                            <ul class="list-unstyled fs-12 text-grey">
                                                <li>By Agent Name #1</li>
                                                <li>3 BHK Apartment</li>
                                                <li>Location</li>
                                            </ul>
                                            <h6 class="fs-16 mt-26">$55,000</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bhk-box mt-20" style="background-color: #262222; border: 0px">
                    <div class="row mt-10">
                        <div class="col-lg-8 center">
                            <h4 class="fs-20 text-white fw-400">
                                List Your Property on TutunjiRealty.com
                            </h4>
                            <h5 class="fs-18 text-grey">
                                For Free. Without any brokerage.
                            </h5>
                        </div>
                        <div class="col-lg-4 text-right center mt-21">
                            <button type="button" class="btn btn-info"
                                    style="font-size: 14px; padding: 10px 20px !important">
                                <i class="fas fa-plus mr-1"></i> Submit Property
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-agent-box mt-21">
                    <div class="agent-topbox">
                        <h6 class="fs-16">Get Your Exclusive VIP Package Here</h6>
                        <p class="fs-12">
                            Morbi accumsan ipsum velit nam nec tellus a odiose tincidunt
                            auctor aerat consequat auctor
                        </p>
                    </div>
                    <div class="agent-body">
                        <form>
                            <div class="form-group mt-10">
                                <label for="exampleFormControlSelect1" class="fs-12">Full Name:</label>
                                <input class="form-control br-30 fs-12" id="exampleFormControlSelect1"
                                       placeholder="Type your Full name" />
                            </div>
                            <div class="form-group mt-10">
                                <label for="exampleFormControlSelect1" class="fs-12">Phone Number:</label>
                                <input class="form-control br-30 fs-12" id="exampleFormControlSelect1"
                                       placeholder="Type your Phone Number" />
                            </div>
                            <div class="form-group mt-10">
                                <label for="exampleFormControlSelect1" class="fs-12">Email Address:</label>
                                <input class="form-control br-30 fs-12" id="exampleFormControlSelect1"
                                       placeholder="Type your Email" />
                            </div>
                            <p class="fs-12">Are you a brokerage or real estate agent</p>
                            <div class="row mt-10">
                                <div class="col-lg-6 col-6">
                                    <div class="sub-box">
                                        <ul class="box-sell p-0 mb-0 list-unstyled">
                                            <li>
                                                <input type="radio" id="Pre-Construction" name="selector" />
                                                <label for="Pre-Construction" class="mb-0 pb-3 fs-12">Yes</label>
                                                <div class="check"></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-6">
                                    <div class="sub-box">
                                        <ul class="box-sell p-0 mb-0 list-unstyled">
                                            <li>
                                                <input type="radio" id="Status-2" name="selector" />
                                                <label for="Status-2" class="mb-0 pb-3 fs-12">No</label>
                                                <div class="check"></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="agent-footer">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" class="btn btn-info"
                                            style="font-size: 14px; padding: 10px 20px !important">
                                        Register Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h4 class="fs-20 text-deco mt-20 mt-41">Similar Properties</h4>
                <div class="box1 mt-20">
                    <div class="row">
                        <div class="col-lg-5 col-5">
                            <img src="imgs/Component%208%20%E2%80%93%201.png" alt="" class="img-fluid" />
                        </div>
                        <div class="col-lg-7 col-7 mt-20">
                            <h6 class="fs-16">Property Name #1</h6>
                            <ul class="list-unstyled fs-12 text-grey">
                                <li>By Agent Name #1</li>
                                <li>3 BHK Apartment</li>
                                <li>Location</li>
                            </ul>
                            <h6 class="fs-16 mt-26">$55,000</h6>
                        </div>
                    </div>
                </div>
                <div class="box1 mt-20">
                    <div class="row">
                        <div class="col-lg-5 col-5">
                            <img src="imgs/Component%208%20%E2%80%93%201.png" alt="" class="img-fluid" />
                        </div>
                        <div class="col-lg-7 col-7 mt-20">
                            <h6 class="fs-16">Property Name #1</h6>
                            <ul class="list-unstyled fs-12 text-grey">
                                <li>By Agent Name #1</li>
                                <li>3 BHK Apartment</li>
                                <li>Location</li>
                            </ul>
                            <h6 class="fs-16 mt-26">$55,000</h6>
                        </div>
                    </div>
                </div>
                <div class="box1 mt-20">
                    <div class="row">
                        <div class="col-lg-5 col-5">
                            <img src="imgs/Component%208%20%E2%80%93%201.png" alt="" class="img-fluid" />
                        </div>
                        <div class="col-lg-7 col-7 mt-20">
                            <h6 class="fs-16">Property Name #1</h6>
                            <ul class="list-unstyled fs-12 text-grey">
                                <li>By Agent Name #1</li>
                                <li>3 BHK Apartment</li>
                                <li>Location</li>
                            </ul>
                            <h6 class="fs-16 mt-26">$55,000</h6>
                        </div>
                    </div>
                </div>
                <div class="box1 mt-20">
                    <div class="row">
                        <div class="col-lg-5 col-5">
                            <img src="imgs/Component%208%20%E2%80%93%201.png" alt="" class="img-fluid" />
                        </div>
                        <div class="col-lg-7 col-7 mt-20">
                            <h6 class="fs-16">Property Name #1</h6>
                            <ul class="list-unstyled fs-12 text-grey">
                                <li>By Agent Name #1</li>
                                <li>3 BHK Apartment</li>
                                <li>Location</li>
                            </ul>
                            <h6 class="fs-16 mt-26">$55,000</h6>
                        </div>
                    </div>
                </div>
                <div class="box1 mt-20">
                    <div class="row">
                        <div class="col-lg-5 col-5">
                            <img src="imgs/Component%208%20%E2%80%93%201.png" alt="" class="img-fluid" />
                        </div>
                        <div class="col-lg-7 col-7 mt-20">
                            <h6 class="fs-16">Property Name #1</h6>
                            <ul class="list-unstyled fs-12 text-grey">
                                <li>By Agent Name #1</li>
                                <li>3 BHK Apartment</li>
                                <li>Location</li>
                            </ul>
                            <h6 class="fs-16 mt-26">$55,000</h6>
                        </div>
                    </div>
                </div>
                <div class="box1 mt-20">
                    <div class="row">
                        <div class="col-lg-5 col-5">
                            <img src="imgs/Component%208%20%E2%80%93%201.png" alt="" class="img-fluid" />
                        </div>
                        <div class="col-lg-7 col-7 mt-20">
                            <h6 class="fs-16">Property Name #1</h6>
                            <ul class="list-unstyled fs-12 text-grey">
                                <li>By Agent Name #1</li>
                                <li>3 BHK Apartment</li>
                                <li>Location</li>
                            </ul>
                            <h6 class="fs-16 mt-26">$55,000</h6>
                        </div>
                    </div>
                </div>
                <div class="box1 mt-20">
                    <div class="row">
                        <div class="col-lg-5 col-5">
                            <img src="imgs/Component%208%20%E2%80%93%201.png" alt="" class="img-fluid" />
                        </div>
                        <div class="col-lg-7 col-7 mt-20">
                            <h6 class="fs-16">Property Name #1</h6>
                            <ul class="list-unstyled fs-12 text-grey">
                                <li>By Agent Name #1</li>
                                <li>3 BHK Apartment</li>
                                <li>Location</li>
                            </ul>
                            <h6 class="fs-16 mt-26">$55,000</h6>
                        </div>
                    </div>
                </div>
                <div class="box1 mt-20">
                    <div class="row">
                        <div class="col-lg-5 col-5">
                            <img src="imgs/Component%208%20%E2%80%93%201.png" alt="" class="img-fluid" />
                        </div>
                        <div class="col-lg-7 col-7 mt-20">
                            <h6 class="fs-16">Property Name #1</h6>
                            <ul class="list-unstyled fs-12 text-grey">
                                <li>By Agent Name #1</li>
                                <li>3 BHK Apartment</li>
                                <li>Location</li>
                            </ul>
                            <h6 class="fs-16 mt-26">$55,000</h6>
                        </div>
                    </div>
                </div>
                <div class="box1 mt-20">
                    <div class="row">
                        <div class="col-lg-5 col-5">
                            <img src="imgs/Component%208%20%E2%80%93%201.png" alt="" class="img-fluid" />
                        </div>
                        <div class="col-lg-7 col-7 mt-20">
                            <h6 class="fs-16">Property Name #1</h6>
                            <ul class="list-unstyled fs-12 text-grey">
                                <li>By Agent Name #1</li>
                                <li>3 BHK Apartment</li>
                                <li>Location</li>
                            </ul>
                            <h6 class="fs-16 mt-26">$55,000</h6>
                        </div>
                    </div>
                </div>
                <div class="box1 mt-20">
                    <div class="row">
                        <div class="col-lg-5 col-5">
                            <img src="imgs/Component%208%20%E2%80%93%201.png" alt="" class="img-fluid" />
                        </div>
                        <div class="col-lg-7 col-7 mt-20">
                            <h6 class="fs-16">Property Name #1</h6>
                            <ul class="list-unstyled fs-12 text-grey">
                                <li>By Agent Name #1</li>
                                <li>3 BHK Apartment</li>
                                <li>Location</li>
                            </ul>
                            <h6 class="fs-16 mt-26">$55,000</h6>
                        </div>
                    </div>
                </div>
                <div class="box1 mt-20">
                    <div class="row">
                        <div class="col-lg-5 col-5">
                            <img src="imgs/Component%208%20%E2%80%93%201.png" alt="" class="img-fluid" />
                        </div>
                        <div class="col-lg-7 col-7 mt-20">
                            <h6 class="fs-16">Property Name #1</h6>
                            <ul class="list-unstyled fs-12 text-grey">
                                <li>By Agent Name #1</li>
                                <li>3 BHK Apartment</li>
                                <li>Location</li>
                            </ul>
                            <h6 class="fs-16 mt-26">$55,000</h6>
                        </div>
                    </div>
                </div>
                <div class="box1 mt-20">
                    <div class="row">
                        <div class="col-lg-5 col-5">
                            <img src="imgs/Component%208%20%E2%80%93%201.png" alt="" class="img-fluid" />
                        </div>
                        <div class="col-lg-7 col-7 mt-20">
                            <h6 class="fs-16">Property Name #1</h6>
                            <ul class="list-unstyled fs-12 text-grey">
                                <li>By Agent Name #1</li>
                                <li>3 BHK Apartment</li>
                                <li>Location</li>
                            </ul>
                            <h6 class="fs-16 mt-26">$55,000</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-grey mt-80" style="background-color: #eeeeee">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <h1 class="fs-40 text-center bb-2 fw-700">Contact Us</h1>
                </div>
            </div>
            <div class="row mt-40">
                <div class="col-lg-8 offset-lg-2">
                    <p class="fs-16 fw-700 text-center">
                        Morbi accumsan ipsum velit nam nec tellus a odiose tincidunt
                        auctor a ornare odio sed non mauris vitae erat consequat auctor
                    </p>
                </div>
            </div>
            <div class="bg-white mt-40">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="text-center fs-30 fw-700">Send Us a Message</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <form>
                            <div class="form-group">
                                <label>Your Full Name</label>
                                <input type="Name" class="form-control" id="name" placeholder="Robison Croso" />
                            </div>
                            <div class="form-group">
                                <label>Your Contact Number</label>
                                <input type="number" class="form-control" id="name" placeholder="+99 98789 99899" />
                            </div>
                            <div class="form-group">
                                <label>Your Email Address</label>
                                <input type="email" class="form-control" id="email" placeholder="example@box.com" />
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <form>
                            <div class="form-group">
                                <label>Service you Looking For</label>
                                <input type="text" class="form-control" id="text" />
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Write Your Message</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary">Send Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.include.news-letter-1')
    @section('pre-construct-blog-css')
        <script src="{{asset('')}}frontend/assets/js/owl.carousel.js"></script>
        <script>
            $(".blog-carousel").owlCarousel({
                loop: true,
                nav: true,
                stagePadding: 30,
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
                    1000: {
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
                    dvDistance.innerHTML += "<div class='row'><div class='col-md-6'><label style='float: right;font-weight: 700;font-size: 17px;'>Distance : "+distance+" </label></div><div class='col-md-6'><label style='float: left;font-weight: 700;font-size: 17px;'>Duration : "+duration+" </label></div></div>";

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
                console.log(property_id);

                if(full_name != "" && phone_number != "" && email_address != "" && isChecked != ""){

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
                            if(newRes.success == "1"){
                                $('#save_errorList').html("");
                                $('#save_errorList').addClass('d-done');
                                $("#signUpSuccessMessage").empty().append(newRes.message);
                                setTimeout(function() {
                                    location.reload();
                                }, 1500);
                            }else if(response.status = '404'){
                                // console.log(response.message);
                                $("#signUpErrorMessage").append(response.message);
                            }else if(response.status = '400'){
                                $("#signUpErrorMessage").append(response.message);
                            }
                            else {
                                $("#signUpErrorMessage").append(newRes.message);
                            }
                        }
                    });
                } else {
                    $("#signUpErrorMessage").append("Please fill required fields!");
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
                        $("#floor-plan-blur").css("filter", "blur(0px)");
                        $('.btn-floor').css("display","none");
                    }
                    // if(result.success == 1) {
                    //     console.log(result.success);
                    //     $("#floor-plan-blur").css("filter", "blur(0px)");
                    //     $('.btn-floor').css("display","none");
                    //
                    //
                    //     // location.reload();
                    // }
                    // }
                    // else{
                    //     $("#floor-plan-blur").css("filter", "blur(5px)");
                    //     $('.btn-floor').css('display', 'block');
                    //     console.log('no floor plan is available');
                    // }
                }
            });
        });
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
@endsection
