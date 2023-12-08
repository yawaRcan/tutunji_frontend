@extends('frontend.layout.master')
@section('title')
    <title>Tuntunji Realty | Sale Property</title>
    <!-- begin social-media share icon style -->
    <style>
        /*.card-img{*/
        /*    width: 100%!important;*/
        /*    height: 200px!important;*/
        /*    object-fit: cover;*/
        /*}*/
        /*.banner-img{*/
        /*    height: auto;*/
        /*}*/
        .bg-image {
            /*margin-left: -10px;*/
            /*filter: blur(4px) grayscale(.1);*/
            align-content: center;
            /* add a opacity here for the background */
            opacity: 0.5;
        }
        .card-img-top{
            /*height: 20vh!important;*/
            height: 200px!important;
            width: 100%;
            object-fit: cover;
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
        /* Large devices (laptops/desktops, 992px and up) */
        @media only screen and (min-width: 992px) {
            .mobile-contact-form{
                display: none;
            }
            .desktop-contact-form{
                display: block;
            }
        }
        /* tablet size between 768px up and 992px down */
        @media (min-width: 768px) and (max-width: 992px) {
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
        /*.img_text{*/
        /*    filter: opacity(0.5);*/
        /*}*/
        /*.content h3{*/
        /*    position: absolute;*/
        /*    font-size: 25px;*/
        /*    color: #fff;*/
        /*}*/
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
        .img_blur{
            filter: opacity(0.5);
            /*margin-left:20px;*/
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
            <div class="col-lg-12">
                <h4 class="fs-24 fw-700" style="margin-top: 30px;">{{$saleData[0]->address}}</h4>
                <h4 class="fs-24 fw-700" style="margin-bottom: 0;">{{$saleData[0]->city}}, <span>{{$saleData[0]->country_state}}</span> <span>{{$saleData[0]->zip}}</span></h4><br>
                <span class="fs-18 text-grey fw-400"><i class="fa fa-tag mr-1" style="color: #bebebe;"></i>&nbsp;{{($saleData[0]['cat_details']) ? $saleData[0]['cat_details']['name'] : '-'}}</span>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-lg-6 center">
                <h1 class="fs-30 fw-700">
                    @if($saleData[0]->before_price_label != null && $saleData[0]->after_price_label != null)
                        {{$saleData[0]->before_price_label}}
                    @endif
                    ${{$saleData[0]->price ? $saleData[0]->price : '-'}}
                    @if($saleData[0]->after_price_label != null && $saleData[0]->before_price_label != null)
                        {{$saleData[0]->after_price_label}}
                    @endif
                </h1>
            </div>
            <div class="col-lg-6 mt-21">
                <ul class="list-unstyled list-inline d-flex justify-content-end align-items-center center">
                    <li class="list-inline-item"> <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;" data-toggle="modal" data-target="#myModal">Contact Listing Agent</button></li>
                </ul>
            </div>
        </div>
        <div class="row mt-40 align-items-center">
            @if($saleData[0]->embed_video_id == NULL && $totalPropertyMedia == '1')
                <div class="text-center" style="margin-left: auto;margin-right: auto;">
                        <?php $images = $saleData[0]['multiple_media']; ?>
                    @if($saleData[0]['property_type'] == 'sale' && $saleData[0]['source'] == 'Frontend')
                        @if(isset($images[0]))
                            <a href="{{url('/sale-slider-popup',$saleData[0]['id'])}}">
                                <img src="{{asset('frontend/assets/property-images/media-file/'.$images[0]['media_name'])}}" alt="" class="img-fluid w-100 img-mob-1" style="border: solid 1px #f3f3f3;">
                            </a>
                        @endif
                    @else
                        @if(isset($images[0]))
                            <a href="{{url('/sale-slider-popup',$saleData[0]['id'])}}">
                                <img src="{{asset('admin-panel/assets/property-images/media-file/sale/'.$images[0]['media_name'])}}" alt="" class="img-fluid w-100 img-mob-1" style="border: solid 1px #f3f3f3;">
                            </a>
                        @endif
                    @endif
                </div>
            @elseif($saleData[0]->embed_video_id != NULL && $totalPropertyMedia == '1')
                <div class="col-md-12">
                    @if($saleData[0]['video_from'] == 'vimeo')
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item video_url" style="padding: 0px;" src="{{url($saleData[0]->embed_video_id)}}" title="Real Estate Property Video Tour Example" allowfullscreen></iframe> {{-- https://www.youtube.com/embed/7Qivx2om0MM --}}
                    </div>

                    @elseif($saleData[0]['video_from'] == 'youtube')
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item video_url" src="{{url($saleData[0]->embed_video_id)}}" title="Real Estate Property Video Tour Example"></iframe> {{-- https://www.youtube.com/embed/7Qivx2om0MM --}}
                    </div>

                    @endif
                </div>
            @elseif($saleData[0]->embed_video_id != NULL && $totalPropertyMedia == '2')
                <div class="col-lg-8 col-8 video_display img_bigger pr-0">
                    @if($saleData[0]['video_from'] == 'vimeo')
                        <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item video_url" src="{{url($saleData[0]->embed_video_id)}}" title="Real Estate Property Video Tour Example"></iframe> {{-- https://www.youtube.com/embed/7Qivx2om0MM --}}
                        </div>
                    @elseif($saleData[0]['video_from'] == 'youtube')
                        <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item video_url" src="{{url($saleData[0]->embed_video_id)}}" title="Real Estate Property Video Tour Example"></iframe> {{-- https://www.youtube.com/embed/7Qivx2om0MM --}}
                        </div>
                    @endif
                </div>
                <div class="col-lg-4 col-4" style="display: flex;align-items: center">
                        <?php $images = $saleData[0]['multiple_media']; ?>
                    @if($saleData[0]['property_type'] == 'sale' && $saleData[0]['source'] == 'Frontend')
                        @if(isset($images[1]))
                            <a href="{{url('/sale-slider-popup',$saleData[0]['id'])}}">
                                <img src="{{asset('frontend/assets/property-images/media-file/'.$images[1]['media_name'])}}" alt="" class="img-fluid img-mob-2" style="border: solid 1px #f3f3f3;">
                            </a>
                        @endif
                    @else
                        @if(isset($images[1]))
                            <a href="{{url('/sale-slider-popup',$saleData[0]['id'])}}">
                                <img src="{{asset('admin-panel/assets/property-images/media-file/sale/'.$images[1]['media_name'])}}" alt="" class="img-fluid img-mob-2" style="border: solid 1px #f3f3f3;">
                            </a>
                        @endif
                    @endif
                </div>
            @elseif($saleData[0]->embed_video_id != NULL && $totalPropertyMedia > '2')
                <div class="col-lg-8 col-8 video_display img_bigger pr-0">
                    @if($saleData[0]['video_from'] == 'vimeo')
                        <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item video_url" src="{{url($saleData[0]->embed_video_id)}}" title="Real Estate Property Video Tour Example"></iframe> {{-- https://www.youtube.com/embed/7Qivx2om0MM --}}
                        </div>
                    @elseif($saleData[0]['video_from'] == 'youtube')
                        <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item video_url" src="{{url($saleData[0]->embed_video_id)}}" title="Real Estate Property Video Tour Example"></iframe> {{-- https://www.youtube.com/embed/7Qivx2om0MM --}}
                        </div>
                    @endif
                </div>

                <div class="col-lg-4 col-4">
                        <?php $images = $saleData[0]['multiple_media']; ?>
                    @if($saleData[0]['property_type'] == 'sale' && $saleData[0]['source'] == 'Frontend')
                        @if(isset($images[1]))
                            <a href="{{url('/sale-slider-popup',$saleData[0]['id'])}}">
                                <img src="{{asset('frontend/assets/property-images/media-file/'.$images[1]['media_name'])}}" alt="" class="img-fluid img-mob-2" style="border: solid 1px #f3f3f3;">
                            </a>
                        @endif
                    @else
                        @if(isset($images[1]))
                            <a href="{{url('/sale-slider-popup',$saleData[0]['id'])}}">
                                <img src="{{asset('admin-panel/assets/property-images/media-file/sale/'.$images[1]['media_name'])}}" alt="" class="img-fluid img-mob-2" style="border: solid 1px #f3f3f3;">
                            </a>
                        @endif
                    @endif
                    <div class="container-img mt-10 img_bottom">
                        @if($saleData[0]['multiple_media'] == NULL)
                            <img src="{{asset('default/404-not-found.jpg')}}" height="622px" width="910px">
                        @else
                                <?php $images = $saleData[0]['multiple_media']; ?>
                            @if($saleData[0]['property_type'] == 'sale' && $saleData[0]['source'] == 'Frontend')
                                @if(isset($images[2]))
                                    <a href="{{url('/sale-slider-popup',$saleData[0]['id'])}}">
                                        <img src="{{asset('frontend/assets/property-images/media-file/'.$images[2]['media_name'])}}" alt="" class="img-fluid img-mob-2 bg-image" style="border: solid 1px #f3f3f3;">
                                        <div class="centered mobile-opacity-text text-center"><a href="{{url('/sale-slider-popup',$saleData[0]['id'])}}" class="btn btn-warning btn-sm" style="background-color: #fff;border-color: #fff;color: #000000;font-weight: bold;border-radius: 24px;width: 100%;">View All Photos</a></div>
                                    </a>
                                @endif
                            @else
                                @if(isset($images[2]))
                                    <a href="{{url('/sale-slider-popup',$saleData[0]['id'])}}">
                                        <img src="{{asset('admin-panel/assets/property-images/media-file/sale/'.$images[2]['media_name'])}}" alt="" class="img-fluid img-mob-2 bg-image" style="border: solid 1px #f3f3f3;">
                                        <div class="centered mobile-opacity-text text-center"><a href="{{url('/sale-slider-popup',$saleData[0]['id'])}}" class="btn btn-warning btn-sm" style="background-color: #fff;border-color: #fff;color: #000000;font-weight: bold;border-radius: 24px;width: 100%;">View All Photos</a></div>
                                    </a>
                                @endif
                            @endif
                        @endif
                    </div>
                </div>
            @elseif($totalPropertyMedia == '2')
                <div class="col-lg-8 col-8 pr-0">
                    @if($saleData[0]['property_type'] == 'sale' && $saleData[0]['source'] == 'Frontend')
                            <?php $images = $saleData[0]['multiple_media']; ?>
                        @if(isset($images[0]))
                            <a href="{{url('/sale-slider-popup',$saleData[0]['id'])}}">
                                <img src="{{asset('frontend/assets/property-images/media-file/'.$images[0]['media_name'])}}" alt="" class="img-fluid w-100 img-mob-1" style="border: solid 1px #f3f3f3;">
                            </a>
                        @endif
                    @else
                            <?php $images = $saleData[0]['multiple_media']; ?>
                        @if(isset($images[0]))
                            <a href="{{url('/sale-slider-popup',$saleData[0]['id'])}}">
                                <img src="{{asset('admin-panel/assets/property-images/media-file/sale/'.$images[0]['media_name'])}}" alt="" class="img-fluid w-100 img-mob-1" style="border: solid 1px #f3f3f3;">
                            </a>
                        @endif
                    @endif
                </div>
                <div class="col-lg-4 col-4" style="display: flex;align-items: center">
                        <?php $images = $saleData[0]['multiple_media']; ?>
                    @if($saleData[0]['property_type'] == 'sale' && $saleData[0]['source'] == 'Frontend')
                        @if(isset($images[1]))
                            <a href="{{url('/sale-slider-popup',$saleData[0]['id'])}}">
                                <img src="{{asset('frontend/assets/property-images/media-file/'.$images[1]['media_name'])}}" alt="" class="img-fluid img-mob-2" style="border: solid 1px #f3f3f3;">
                            </a>
                        @endif
                    @else
                        @if(isset($images[1]))
                            <a href="{{url('/sale-slider-popup',$saleData[0]['id'])}}">
                                <img src="{{asset('admin-panel/assets/property-images/media-file/sale/'.$images[1]['media_name'])}}" alt="" class="img-fluid img-mob-2" style="border: solid 1px #f3f3f3;">
                            </a>
                        @endif
                    @endif
                </div>
            @else
                <div class="col-lg-8 col-8 pr-0">
                    @if($saleData[0]['property_type'] == 'sale' && $saleData[0]['source'] == 'Frontend')
                            <?php $images = $saleData[0]['multiple_media']; ?>
                        @if(isset($images[0]))
                            <a href="{{url('/sale-slider-popup',$saleData[0]['id'])}}">
                                <img src="{{asset('frontend/assets/property-images/media-file/'.$images[0]['media_name'])}}" alt="" class="img-fluid w-100 img-mob-1" style="border: solid 1px #f3f3f3;">
                            </a>
                        @endif
                    @else
                            <?php $images = $saleData[0]['multiple_media']; ?>
                        @if(isset($images[0]))
                            <a href="{{url('/sale-slider-popup',$saleData[0]['id'])}}">
                                <img src="{{asset('admin-panel/assets/property-images/media-file/sale/'.$images[0]['media_name'])}}" alt="" class="img-fluid w-100 img-mob-1" style="border: solid 1px #f3f3f3;">
                            </a>
                        @endif
                    @endif
                </div>
                <div class="col-lg-4 col-4">
                        <?php $images = $saleData[0]['multiple_media']; ?>
                    @if($saleData[0]['property_type'] == 'sale' && $saleData[0]['source'] == 'Frontend')
                        @if(isset($images[1]))
                            <a href="{{url('/sale-slider-popup',$saleData[0]['id'])}}">
                                <img src="{{asset('frontend/assets/property-images/media-file/'.$images[1]['media_name'])}}" alt="" class="img-fluid img-mob-2" style="border: solid 1px #f3f3f3;">
                            </a>
                        @endif
                    @else
                        @if(isset($images[1]))
                            <a href="{{url('/sale-slider-popup',$saleData[0]['id'])}}">
                                <img src="{{asset('admin-panel/assets/property-images/media-file/sale/'.$images[1]['media_name'])}}" alt="" class="img-fluid img-mob-2" style="border: solid 1px #f3f3f3;">
                            </a>
                        @endif
                    @endif
                    <div class="container-img mt-10 img_bottom">
                        @if($saleData[0]['multiple_media'] == NULL)
                            <img src="{{asset('default/404-not-found.jpg')}}" height="622px" width="910px">
                        @else
                                <?php $images = $saleData[0]['multiple_media']; ?>
                            @if($saleData[0]['property_type'] == 'sale' && $saleData[0]['source'] == 'Frontend')
                                @if(isset($images[2]))
                                    <a href="{{url('/sale-slider-popup',$saleData[0]['id'])}}">
                                        <img src="{{asset('frontend/assets/property-images/media-file/'.$images[2]['media_name'])}}" alt="" class="img-fluid img-mob-2 bg-image" style="border: solid 1px #f3f3f3;">
                                        <div class="centered mobile-opacity-text text-center"><a href="{{url('/sale-slider-popup',$saleData[0]['id'])}}" class="btn btn-warning btn-sm" style="background-color: #fff;border-color: #fff;color: #000000;font-weight: bold;border-radius: 24px;width: 100%;">View All Photos</a></div>
                                    </a>
                                @endif
                            @else
                                @if(isset($images[2]))
                                    <a href="{{url('/sale-slider-popup',$saleData[0]['id'])}}">
                                        <img src="{{asset('admin-panel/assets/property-images/media-file/sale/'.$images[2]['media_name'])}}" alt="" class="img-fluid img-mob-2 bg-image" style="border: solid 1px #f3f3f3;">
                                        <div class="centered mobile-opacity-text text-center"><a href="{{url('/sale-slider-popup',$saleData[0]['id'])}}" class="btn btn-warning btn-sm" style="background-color: #fff;border-color: #fff;color: #000000;font-weight: bold;border-radius: 24px;width: 100%;">View All Photos</a></div>
                                    </a>
                                @endif
                            @endif
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
                            <h6 class="fs-14 mb-0">{{$saleData[0]['size_in_ft2'] ? $saleData[0]['size_in_ft2'] : 0 }} SqFt</h6>
                            <span class="fs-12 text-grey">
                                Size in sq ft
                            </span>
                        </div>
                        <div class="col-6 col-lg-3 text-center mob_view_property_detail">
                            <h6 class="fs-14 mb-0">{{$saleData[0]['bedrooms'] ? $saleData[0]['bedrooms'] : 0}} <i class="fa fa-bed" style="color: #262222;"></i></h6>
                            <span class="fs-12 text-grey">
                               Bedrooms
                            </span>
                        </div>

                        <div class="col-6 col-lg-3 mt-11 text-center mob_view_property_detail">
                            <h6 class="fs-14 mb-0">
                                {{$saleData[0]['bathrooms'] ? $saleData[0]['bathrooms'] : 0}} <i class="fa fa-bath" style="color: #262222;"></i>
                            </h6>
                            <span class="fs-12 text-grey">
                                Bathrooms
                            </span>
                        </div>
                        <div class="col-6 col-lg-3 mt-11 text-center mob_view_property_detail">
                            <h6 class="fs-14 mb-0">{{$saleData[0]['year_built'] ? $saleData[0]['year_built'] : 0}}</h6>
                            <span class="fs-12 text-grey">
                                Year Built
                            </span>
                        </div>
{{--                        <div class="col-lg-3 col-4 mt-11 text-center mob_view_property_detail">--}}
{{--                            <h6 class="fs-14 mb-0">{{date('Y-m-d', strtotime($saleData[0]['created_at'])) ? date('Y-m-d', strtotime($saleData[0]['created_at'])) : '-' }}</h6>--}}
{{--                            <span class="fs-12 text-grey">--}}
{{--                                Posted On--}}
{{--                            </span>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-20">
            {{--            <div class="col-md-12">--}}
            {{--               --}}
            {{--            </div>--}}
            <div class="col-lg-8">
                <div class="bhk-box">
                    <h4 class="fs-20 text-deco">Overview</h4>
                    <table class="table mt-20 table-responsive-md">
                        <tbody>
                        <tr>
                            <td class="border-top-0">Rooms</td>
                            <td class="border-top-0 fw-700">{{$saleData[0]['rooms'] ? $saleData[0]['rooms'] : 0}}</td>
                            <td class="border-top-0">Exterior Material</td>
                            <td class="fw-700 border-top-0">{{$saleData[0]['exterior_material'] ? $saleData[0]['exterior_material'] : '-'}}</td>
                        </tr>
                        <tr>
                            <td>Lot Size in SqFt</td>
                            <td class="fw-700">{{$saleData[0]['lot_size_in_ft2'] ? $saleData[0]['lot_size_in_ft2'] : 0}}</td>
                            <td>Roof Material</td>
                            <td class="fw-700">{{$saleData[0]['roofing'] ? $saleData[0]['roofing'] : '-'}}</td>
                        </tr>
                        <tr>
                            <td>Parking Spots</td>
                            <td class="fw-700">{{$saleData[0]['garages'] ? $saleData[0]['garages'] : 0}}</td>
                            <td>Floors No.</td>
                            <td class="fw-700">{{$saleData[0]['floors_no'] ? $saleData[0]['floors_no'] : 0}}</td>
                        </tr>
                        <tr>
                            <td>Basement</td>
                            <td class="fw-700">{{$saleData[0]['basement'] ? $saleData[0]['basement'] : 0}}</td>
                            <td>Structure Type</td>
                            <td class="fw-700">{{$saleData[0]['structure_type'] ? $saleData[0]['structure_type'] : '-'}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!--    pop up btn-->
                <button type="button" class="btn-success position-f dn1" data-toggle="modal" data-target="#myModal" id="agentButton">
                    Contact Listing Agent
                </button>
                <!--end of pop up btn-->
                <div class="bhk-box mt-20">
                    <h4 class="fs-20 text-deco">Description</h4>
                    <p class="mt-20 fs-16 fw-400">{{$saleData[0]->description ? $saleData[0]->description : '-'}}</p>
                    {{--                    <p class="mt-20 fs-16 fw-400">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam cupiditate eaque fugit magni molestiae architecto. Possimus consequatur explicabo nesciunt nostrum! Dignissimos non ipsum eum, quisquam quia. Minima, placeat. Sunt, hic.</p>--}}
                </div>
                <div class="bhk-box mt-20">
                    <h4 class="fs-20 text-deco">Amenities</h4>
                    <div class="row mt-20">
                        @if($amenities)
                            @foreach($amenities as $amenities_row)
                                <div class="custom-col-2 px-10 text-center">
                                    <div class="amenities-box">
                                        <ul class="text-center list-unstyled">
                                            <li>
                                                @if(!empty($amenities_row['icon']))
                                                    <img src="{{asset('admin-panel/assets/property-images/amenities/icons/'.$amenities_row['icon'])}}" alt="" class="img-fluid mt-10" height="20px">
                                                @else
                                                    <img src="{{asset('')}}frontend/assets/imgs/photo.png" alt="" class="img-fluid mt-10">
                                                @endif

                                            </li>
                                            <li class="fs-12 fw-700 mt-10">{{$amenities_row['name']}}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                </div>
                @if($saleData[0]['floor_plan2_images']->count() > 0 || $saleData[0]['floor_plan3_images']->count() > 0)
                    <div class="bhk-box mt-20">
                        <div class="row">
                            <div class="col-lg-8 col-8">
                                <h4 class="fs-20 text-deco">Floor Plan</h4>
                            </div>
                            <div class="col-lg-4 col-4">
                                <div class="floorplan-box">
                                    <ul class="nav nav-pills mb-3 justify-content-end" id="pills-tab" role="tablist">
                                        @if($saleData[0]['floor_plan2_images']->count() == 0 && $saleData[0]['floor_plan3_images']->count() != 0)
                                            <li class="nav-item" role="presentation" style="display: none;">
                                                <a class="nav-link active" id="hide" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" style="padding: 0.5rem 1rem;">2D</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="show" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true" style="padding: 0.5rem 1rem;">3D</a>
                                            </li>
                                        @endif
                                        @if($saleData[0]['floor_plan3_images']->count() == 0 && $saleData[0]['floor_plan2_images']->count() != 0)
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="hide" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" style="padding: 0.5rem 1rem;">2D</a>
                                            </li>
                                            <li class="nav-item" role="presentation" style="display: none;">
                                                <a class="nav-link active" id="show" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true" style="padding: 0.5rem 1rem;">3D</a>
                                            </li>
                                        @endif
                                        @if($saleData[0]['floor_plan2_images']->count() != 0 && $saleData[0]['floor_plan3_images']->count() != 0)
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
                                    @if($saleData[0]['floor_plan2_images']->count() == 0 && $saleData[0]['floor_plan3_images']->count() != 0)
                                        <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <div class="owl-carousel blog-carousel owl-theme">
                                            @foreach($saleData[0]['floor_plan3_images'] as $img)
                                                @if($saleData[0]['source'] == 'Admin' && $saleData[0]['property_type'] == 'sale')
                                                <div class="item">
                                                    <h4 class="fs-16" style="text-align: left;">  No. of Bedrooms - {{$img['no_of_bedrooms']}}</h4>
                                                    <h4 class="fs-16" style="text-align: left;margin-top: 0;"> No. of Bathrooms - {{$img['no_of_bathrooms']}}</h4>
                                                    <h4 class="fs-16" style="text-align: left;margin-top: 0;"> {{$img['sqft']}} SqFt </h4>
{{--                                                    <h4 class="fs-16 mt-20" style="text-align: center;margin-top: 20;"> No. of Bedrooms - {{$img['no_of_bedrooms']}}, No. of Bathrooms - {{$img['no_of_bathrooms']}}, Sqft - {{$img['sqft']}}</h4> <h4 class="fs-16 mt-20" style="text-align: left;margin-top: 0;"></h4>--}}
                                                    <img src="{{asset('admin-panel/assets/property-images/floor-plan-3D/sale/'.$img['images'])}}" alt="your image" height="200px" width="200px">
                                                </div>
                                                @else
                                                <div class="item">
                                                    <h4 class="fs-16" style="text-align: left;">  No. of Bedrooms - {{$img['no_of_bedrooms']}}</h4>
                                                    <h4 class="fs-16" style="text-align: left;margin-top: 0;"> No. of Bathrooms - {{$img['no_of_bathrooms']}}</h4>
                                                    <h4 class="fs-16" style="text-align: left;margin-top: 0;"> {{$img['sqft']}} SqFt</h4>
{{--                                                    <h4 class="fs-16 mt-20" style="text-align: center;margin-top: 20;"> No. of Bedrooms - {{$img['no_of_bedrooms']}}, No. of Bathrooms - {{$img['no_of_bathrooms']}}, Sqft - {{$img['sqft']}}</h4>--}}
                                                    <h4 class="fs-16 mt-20" style="text-align: left;margin-top: 0;"></h4>
                                                    <img src="{{asset('frontend/assets/property-images/floor-plan-3D/'.$img['images'])}}" alt="your image" height="200px" width="200px">
                                                </div>
                                                @endif
                                            @endforeach
                                            </div>
                                        </div>
                                    @endif


                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <div class="owl-carousel blog-carousel owl-theme">
                                        @foreach($saleData[0]['floor_plan2_images'] as $img)
                                            @if($saleData[0]['source'] == 'Frontend' && $saleData[0]['property_type'] == 'sale')
                                            <div class="item">
                                                <h4 class="fs-16" style="text-align: left;">  No. of Bedrooms - {{$img['no_of_bedrooms']}}</h4>
                                                <h4 class="fs-16" style="text-align: left;margin-top: 0;"> No. of Bathrooms - {{$img['no_of_bathrooms']}}</h4>
                                                <h4 class="fs-16" style="text-align: left;margin-top: 0;"> {{$img['sqft']}} SqFt</h4>
{{--                                                <h4 class="fs-16 mt-20" style="text-align: center;margin-top: 20;"> No. of Bedrooms - {{$img['no_of_bedrooms']}}, No. of Bathrooms - {{$img['no_of_bathrooms']}}, Sqft - {{$img['sqft']}}</h4>--}}
{{--                                                <h4 class="fs-16 mt-20" style="text-align: left;margin-top: 0;">No. of Bathrooms - {{$saleData[0]['floor_plan2_images'][0]->no_of_bathrooms}}</h4>--}}
                                                <img src="{{asset('frontend/assets/property-images/floor-plan-2D/'.$img['images'])}}" alt="your image" height="200px" width="200px">
                                            </div>
                                            @else
                                            <div class="item">
                                                <h4 class="fs-16" style="text-align: left;">  No. of Bedrooms - {{$img['no_of_bedrooms']}}</h4>
                                                <h4 class="fs-16" style="text-align: left;margin-top: 0;"> No. of Bathrooms - {{$img['no_of_bathrooms']}}</h4>
                                                <h4 class="fs-16" style="text-align: left;margin-top: 0;"> {{$img['sqft']}} SqFt</h4>
{{--                                                <h4 class="fs-16 mt-20" style="text-align: center;margin-top: 20;"> No. of Bedrooms - {{$img['no_of_bedrooms']}}, No. of Bathrooms - {{$img['no_of_bathrooms']}}, Sqft - {{$img['sqft']}}</h4>--}}
{{--                                                <h4 class="fs-16 mt-20" style="text-align: left;margin-top: 0;">No. of Bathrooms - {{$saleData[0]['floor_plan2_images'][0]->no_of_bathrooms}}</h4>--}}
                                                <img src="{{asset('admin-panel/assets/property-images/floor-plan-2D/sale/'.$img['images'])}}" alt="your image" height="200px" width="200px">
                                            </div>
                                            @endif
                                        @endforeach
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <div class="owl-carousel blog-carousel owl-theme">
                                        @foreach($saleData[0]['floor_plan3_images'] as $img)
                                            @if($saleData[0]['source'] == 'Admin' && $saleData[0]['property_type'] == 'sale')
                                            <div class="item">
                                                <h4 class="fs-16" style="text-align: left;">  No. of Bedrooms - {{$img['no_of_bedrooms']}}</h4>
                                                <h4 class="fs-16" style="text-align: left;margin-top: 0;"> No. of Bathrooms - {{$img['no_of_bathrooms']}}</h4>
                                                <h4 class="fs-16" style="text-align: left;margin-top: 0;"> {{$img['sqft']}} SqFt</h4>
{{--                                                <h4 class="fs-16 mt-20" style="text-align: center;margin-top: 20;"> No. of Bedrooms - {{$img['no_of_bedrooms']}}, No. of Bathrooms - {{$img['no_of_bathrooms']}}, Sqft - {{$img['sqft']}}</h4>--}}
{{--                                                <h4 class="fs-16 mt-20" style="text-align: left;margin-top: 0;">No. of Bathrooms - {{$saleData[0]['floor_plan3_images'][0]->no_of_bathrooms}}</h4>--}}
                                                <img src="{{asset('admin-panel/assets/property-images/floor-plan-3D/sale/'.$img['images'])}}" alt="your image" height="200px" width="200px">
                                            </div>
                                            @else
                                            <div class="item">
                                                <h4 class="fs-16" style="text-align: left;">  No. of Bedrooms - {{$img['no_of_bedrooms']}}</h4>
                                                <h4 class="fs-16" style="text-align: left;margin-top: 0;"> No. of Bathrooms - {{$img['no_of_bathrooms']}}</h4>
                                                <h4 class="fs-16" style="text-align: left;margin-top: 0;"> {{$img['sqft']}} SqFt</h4>
{{--                                                <h4 class="fs-16 mt-20" style="text-align: center;margin-top: 20;"> No. of Bedrooms - {{$img['no_of_bedrooms']}}, No. of Bathrooms - {{$img['no_of_bathrooms']}}, Sqft - {{$img['sqft']}}</h4>--}}
{{--                                                <h4 class="fs-16 mt-20" style="text-align: left;margin-top: 0;">No. of Bathrooms - {{$saleData[0]['floor_plan3_images'][0]->no_of_bathrooms}}</h4>--}}
                                                <img src="{{asset('frontend/assets/property-images/floor-plan-3D/'.$img['images'])}}" alt="your image" height="200px" width="200px">
                                            </div>
                                            @endif
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-30">
                            <div class="col-lg-4 offset-lg-4 text-center">
                                {{--                            <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;" data-toggle="modal" data-target="#myModal">Contact Listing Agent</button>--}}
                            </div>
                        </div>
                    </div>
                @endif
                <div class="bhk-box mt-20">
                    <h4 class="fs-20 text-deco">Neighbourhood</h4>
                    <p class="fs-14">Check How Far Any Address Is From This Property</p>
                    <div class="row mt-20">
                        <input type="hidden" class="form-control h-10" id="txtSource" placeholder="Enter start address" value="{{$saleData[0]->address}}"/>
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
                <div class="mt-20" data-toggle="modal" data-target="#myModal" style="background-image: url('{{asset("admin-panel/assets/property-images/sample_banner_730x160.webp")}}');
                    padding-top: 22%;width: 100%;cursor: pointer;border: 0;background-size: contain;background-repeat: no-repeat;background-position: center;">{{--background-size: 100%;background-repeat: no-repeat;background-position-y: center;--}}
                    {{--                    <div class="col-md-4 col-sm-4 col-xs-4" style="margin-left: auto;margin-right: auto;padding-top: 55px;">--}}
                    {{--                        <a href="http://127.0.0.1:8000/sign-in" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;" data-toggle="modal" data-target="#myModal">Contact Listing Agent</a>--}}
                    {{--                    </div>--}}
                </div>
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
                        <div class="col-lg-12 blog ">
                            <div class="owl-carousel blog-carousel owl-theme">
                                @if(empty($randomSale))
                                    <p class="text-center">no property found</p>
                                @else
                                    @foreach($randomSale as $viewAll)
                                        <div class="item">
                                            <a href="{{url('sale-property',$viewAll['id'])}}" style="text-decoration: none;">
                                                <div class="card" style="width: 100%;">
                                                    @if($viewAll['source'] == 'Frontend')
                                                        @if($viewAll['property_media'])
                                                            <img src="{{asset('frontend/assets/property-images/media-file/'.$viewAll['property_media']['media_name'])}}" class="card-img-top" alt="...">
                                                        @else
                                                            <img src="{{asset('default/404-not-found.jpg')}}" class="card-img-top" alt="...">
                                                        @endif
                                                    @else
                                                        @if($viewAll['property_media'])
                                                            <img src="{{asset('admin-panel/assets/property-images/media-file/sale/'.$viewAll['property_media']['media_name'])}}" class="card-img-top" alt="...">
                                                        @else
                                                            <img src="{{asset('default/404-not-found.jpg')}}" class="card-img-top" alt="...">
                                                        @endif
                                                        {{--                                                    <img src="{{asset('admin-panel/assets/property-images/media-file/sale/'.$viewAll['property_media']['media_name'])}}" class="card-img-top img-fluid w-100" alt="..." height="170px">--}}
                                                    @endif
                                                    <div class="card-body">
                                                        <h6 class="fs-20 fw-700" style="margin-top: 20px;">

                                                            @if($viewAll['before_price_label'] != null && $viewAll['after_price_label'] != null)
                                                                {{$viewAll['before_price_label']}}
                                                            @endif
                                                            ${{$viewAll['price'] ? $viewAll['price'] : '-'}}
                                                            @if($viewAll['after_price_label'] != null && $viewAll['before_price_label'] != null)
                                                                {{$viewAll['after_price_label']}}
                                                            @endif
                                                        </h6>
                                                        <div class="list-unstyled fs-12 fw-700 text-black justify-content-between" style="min-height: 105px;display: flex;flex-direction: column;">
                                                            {{--                                                <li>By Agent Name #1</li>--}}
                                                            {{--                                                        <li>{{$viewAll['category'] ? $viewAll['category'] : '-'}}</li>--}}
                                                            {{--                                                        <li>{{\Illuminate\Support\Str::limit($viewAll['address'], 25) ? \Illuminate\Support\Str::limit($viewAll['address'],25) : '-'}}</li>--}}
                                                            <div class="text-left">
                                                            <div style="    overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">{{$viewAll['address'] ? $viewAll['address'] : '-'}}</div>
                                                            {{$viewAll['city'] ? $viewAll['city'] : '-'}}, {{$viewAll['country_state'] ? $viewAll['country_state'] : ''}} {{$viewAll['zip'] ? $viewAll['zip'] : ''}}
                                                            </div>
                                                            <div>
                                                                <div class="row">
                                                                    <div class="col-md-6 mt-2 col-6" style="text-align: center;">
                                                                        {{$viewAll['bedrooms'] ? $viewAll['bedrooms'] : '-'}} <i class="fa fa-bed" style="color:#000;"></i></br>Bedrooms
                                                                    </div>
                                                                    <div class="col-md-6 mt-2 col-6" style="text-align: center;">
                                                                        {{$viewAll['bathrooms'] ? $viewAll['bathrooms'] : '-'}} <i class="fa fa-bath" style="color:#000;"></i></br>Bathrooms
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <h6 class="fs-12 mt-10 text-grey"><i class="fa fa-tag text-grey mr-5"></i>&nbsp;{{($viewAll['cat_details']) ? $viewAll['cat_details']['name'] : '-'}}</h6>
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


                <div class="bhk-box mt-20" data-toggle="modal" data-target="#myModal" style="background-image: url('{{asset("admin-panel/assets/property-images/sample_banner_730x160.webp")}}');
                padding-top: 22%;padding-bottom: 0;width: 100%;cursor: pointer;background-position: center;border: 0;background-size: contain;background-repeat: no-repeat;">
                    {{--                    <div class="row mt-10">--}}
                    {{--                        <div class="col-lg-8 center">--}}
                    {{--                            <h4 class="fs-20 text-white fw-400">List Your Property on TutunjiRealty.com</h4>--}}
                    {{--                            <h5 class="fs-18 text-grey">Get listed for access to thousands of potential buyers.</h5>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="col-lg-4 text-right center mt-21">--}}
                    {{--                            <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;"><i class="fas fa-plus mr-1"></i> Submit Property</button>--}}


                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="desktop-contact-form contact-agent-box mt-21">
                    <div class="agent-topbox">
                        <h6 class="fs-16">Contact Listing Agent</h6>
                        <p class="fs-12">Get In Touch With The Listing Agent For More Information About This Property - Contact Us Below Today!</p>
                        @if( Session::has( 'success' ))
                            <div class="alert alert-success" style="margin-top: 30px;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Success! </strong>{{ Session::get( 'success' ) }}
                            </div>
                        @endif
                    </div>
                    <div class="agent-body">
                        {{--                        <form action="{{url('/save-sale-agent-form',$saleData[0]->id)}}" method="post">--}}
                        {{--                            @csrf--}}
                        <div class="form-group mt-10">
                            <label for="exampleFormControlSelect1" class="fs-14">Agent’s Name:</label>
                            <input class="form-control br-30 fs-14" id="a_name" name="a_name" placeholder="Type your Full name" value="{{isset($saleData[0]['agent_details']['fullName']) ? ($saleData[0]['agent_details']['fullName']) : null}}" disabled>
                            {{--                                <!-- validation error message -->--}}
                            {{--                                @error('a_name')--}}
                            {{--                                <p style="color: red;">{{$message}}</p>--}}
                            {{--                                @enderror--}}
                        </div>
                        <div class="form-group mt-10">
                            <label for="exampleFormControlSelect1" class="fs-14">Agent’s Phone Number:</label>
                            <input class="form-control br-30 fs-14" id="a_phone" name="a_phone" placeholder="Type your Phone Number" value="{{isset($saleData[0]['agent_details']['phone']) ? ($saleData[0]['agent_details']['phone']) : null}}" disabled>
                            {{--                                <!-- validation error message -->--}}
                            {{--                                @error('a_phone')--}}
                            {{--                                <p style="color: red;">{{$message}}</p>--}}
                            {{--                                @enderror--}}
                        </div>
                        <div class="form-group mt-10">
                            <label for="exampleFormControlSelect1" class="fs-14">Agent’s Email:</label>
                            <input class="form-control br-30 fs-14" id="a_email" name="a_email" placeholder="Type your Email" value="{{isset($saleData[0]['agent_details']['email']) ? ($saleData[0]['agent_details']['email']) : null}}" disabled>
                            {{--                                <!-- validation error message -->--}}
                            {{--                                @error('a_email')--}}
                            {{--                                <p style="color: red;">{{$message}}</p>--}}
                            {{--                                @enderror--}}
                        </div>
                        <div class="agent-footer">
                            <div class="row">
                                <div class="col-lg-6" style="margin-top: 5px;">
                                    <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=radha.tinnypixel@gmail.com&body=name:{{isset($saleData[0]['agent_details']['fullName']) ? ($saleData[0]['agent_details']['fullName']) : null}},Phone:{{isset($saleData[0]['agent_details']['phone']) ? ($saleData[0]['agent_details']['phone']) : null}},Email:{{isset($saleData[0]['agent_details']['email']) ? ($saleData[0]['agent_details']['email']) : null}}" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Email now</a>
                                    {{--                                        <button type="submit" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;"  value="email_now">Email now</button>--}}
                                </div>
                                <div class="col-lg-6" style="margin-top: 5px;">
                                    <a href="tel:+123-456-780" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Call now</a>
                                    {{--                                        <button type="submit" class="btn btn-info mt-21" style="font-size: 14px; padding: 10px 20px !important;" value="call_now">Call now</button>--}}
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="mobile-contact-form contact-agent-box mt-21" style="margin-bottom: 15px;">
                    <div class="agent-topbox">
                        <h6 class="fs-16">Contact Listing Agent</h6>
                        <p class="fs-12">Get In Touch With The Listing Agent For More Information About This Property - Contact Us Below Today!</p>
                        @if( Session::has( 'success' ))
                            <div class="alert alert-success" style="margin-top: 30px;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Success! </strong>{{ Session::get( 'success' ) }}
                            </div>
                        @endif
                    </div>
                    <div class="agent-body">
                        {{--                        <form action="{{url('/save-sale-agent-form',$saleData[0]->id)}}" method="post">--}}
                        {{--                            @csrf--}}
                        <div class="form-group mt-10">
                            <label for="exampleFormControlSelect1" class="fs-14">Agent’s Name:</label>
                            <input class="form-control br-30 fs-14" id="a_name" name="a_name" placeholder="Type your Full name" value="{{isset($saleData[0]['agent_details']['fullName']) ? ($saleData[0]['agent_details']['fullName']) : null}}" disabled>
                            {{--                                <!-- validation error message -->--}}
                            {{--                                @error('a_name')--}}
                            {{--                                <p style="color: red;">{{$message}}</p>--}}
                            {{--                                @enderror--}}
                        </div>
                        <div class="form-group mt-10">
                            <label for="exampleFormControlSelect1" class="fs-14">Agent’s Phone Number:</label>
                            <input class="form-control br-30 fs-14" id="a_phone" name="a_phone" placeholder="Type your Phone Number" value="{{isset($saleData[0]['agent_details']['phone']) ? ($saleData[0]['agent_details']['phone']) : null}}" disabled>
                            {{--                                <!-- validation error message -->--}}
                            {{--                                @error('a_phone')--}}
                            {{--                                <p style="color: red;">{{$message}}</p>--}}
                            {{--                                @enderror--}}
                        </div>
                        <div class="form-group mt-10">
                            <label for="exampleFormControlSelect1" class="fs-14">Agent’s Email:</label>
                            <input class="form-control br-30 fs-14" id="a_email" name="a_email" placeholder="Type your Email" value="{{isset($saleData[0]['agent_details']['email']) ? ($saleData[0]['agent_details']['email']) : null}}" disabled>
                            {{--                                <!-- validation error message -->--}}
                            {{--                                @error('a_email')--}}
                            {{--                                <p style="color: red;">{{$message}}</p>--}}
                            {{--                                @enderror--}}
                        </div>
                        <div class="agent-footer">
                            <div class="row">
                                <div class="col-lg-6" style="margin-top: 5px;">
                                    <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=radha.tinnypixel@gmail.com&body=name:{{isset($saleData[0]['agent_details']['fullName']) ? ($saleData[0]['agent_details']['fullName']) : null}},Phone:{{isset($saleData[0]['agent_details']['phone']) ? ($saleData[0]['agent_details']['phone']) : null}},Email:{{isset($saleData[0]['agent_details']['email']) ? ($saleData[0]['agent_details']['email']) : null}}" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Email now</a>
                                    {{--                                        <button type="submit" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;"  value="email_now">Email now</button>--}}
                                </div>
                                <div class="col-lg-6" style="margin-top: 5px;">
                                    <a href="tel:+123-456-780" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Call now</a>
                                    {{--                                        <button type="submit" class="btn btn-info mt-21" style="font-size: 14px; padding: 10px 20px !important;" value="call_now">Call now</button>--}}
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                {{--                <h4 class="fs-20 text-deco mt-20">Similar Properties</h4>--}}
                {{--                @if(empty($allSale))--}}
                {{--                    <p class="text-center">No Similar Properties Found</p>--}}
                {{--                @else--}}
                {{--                    @foreach($allSale as $allSaleProperty)--}}
                {{--                <div class="box1 mt-20">--}}
                {{--                    <div class="row">--}}
                {{--                        <div class="col-lg-5 col-5">--}}
                {{--                            @if($allSaleProperty['property_media'])--}}
                {{--                                @if($allSaleProperty['source'] == 'Frontend')--}}
                {{--                                    <img src="{{asset('frontend/assets/property-images/media-file/'.$allSaleProperty['property_media']['media_name'])}}" alt="" class="img-fluid" height="100%">--}}
                {{--                                @else--}}
                {{--                                    <img src="{{asset('admin-panel/assets/property-images/media-file/sale/'.$allSaleProperty['property_media']['media_name'])}}" alt="" class="img-fluid" height="100%">--}}
                {{--                                @endif--}}
                {{--                            @else--}}
                {{--                                <p>no image found</p>--}}
                {{--                            @endif--}}
                {{--                        </div>--}}
                {{--                        <div class="col-lg-7 col-7 mt-20">--}}
                {{--                            <h6 class="fs-20 fw-700">${{($allSaleProperty['price']) ? $allSaleProperty['price'] : '-'}}</h6>--}}
                {{--                            <ul class="list-unstyled fs-12 text-grey">--}}
                {{--                                <li>By Agent Name #1</li>--}}
                {{--                                <li>{{$allSaleProperty['category'] ? $allSaleProperty['category'] : '-'}}</li>--}}
                {{--                                <li>{{ \Illuminate\Support\Str::limit($allSaleProperty['address'], 50) ? \Illuminate\Support\Str::limit($allSaleProperty['address'],50) : '-'}}</li>--}}
                {{--                                <li>--}}
                {{--                                    <div class="row">--}}
                {{--                                        <div class="col-md-4 mt-2">--}}
                {{--                                            {{$allSaleProperty['bedrooms'] ? $allSaleProperty['bedrooms'] : '-'}}&nbsp;<i class="fa fa-bed" style="color: #BEBEBE;"></i></br>Bedrooms--}}
                {{--                                        </div>--}}
                {{--                                        <div class="col-md-8 mt-2">--}}
                {{--                                            {{$allSaleProperty['bathrooms'] ? $allSaleProperty['bathrooms'] : '-'}}&nbsp;<i class="fa fa-bath" style="color: #BEBEBE;"></i></br>Bathrooms--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}

                {{--                                </li>--}}
                {{--                            </ul>--}}
                {{--                            <h6 class="fs-16 mt-26">{{($allSaleProperty['cat_details']) ? $allSaleProperty['cat_details']['name'] : '-'}}</h6>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                    @endforeach--}}
                {{--               @endif--}}
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
    {{-- for desktop --}}
    <div class="sale-footer-banner-web">
        <div class="bhk-box backend-banner sale-footer-banner" data-toggle="modal" data-target="#myModal" style="border : 0;background-image: url('{{asset("admin-panel/assets/property-images/sample_banner_1680x322.webp")}}');
        width: 100%;    padding: 0;cursor: pointer;background-position: center;background-repeat: no-repeat;background-size: 100%;"></div>
    </div>

    {{-- for mobile --}}
    <div class="sale-footer-banner-mobile">
        <div class="bhk-box backend-banner sale-footer-banner" data-toggle="modal" data-target="#myModal" style="border : 0;background-image: url('{{asset("admin-panel/assets/property-images/mobile-banner-sale.webp")}}');
        width: 100%;    padding: 0;cursor: pointer;background-position: center;background-repeat: no-repeat;background-size: 100%;"></div>
    </div>
    @include('frontend.include.news-letter-1')
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" style="padding: 1rem;">
            <!-- Modal content-->
            <div class="modal-content">
                {{--                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>--}}
                <div class="contact-agent-box">
                    <button type="button" class="close close-popup desktop-modal-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="agent-topbox">
                        {{--<button type="button" data-dismiss="modal" aria-label="Close">&times;</button>--}}
                        <h6 class="fs-16">Contact Listing Agent</h6>
                        <p class="fs-12">Get in Touch with the Listing Agent for More Information About This Property - Contact Us Below Today!</p>
                    </div>
                    <div class="modal-body">
                        {{-- <p>Some text in the modal.</p>--}}
                        <form id="form2">
                            <!-- sign-up-empty-field-error-message -->
                            <div id="signUpErrorMessage" style="color:red;"></div>
                            <!-- sign-up-success-message -->
                            <div id="signUpSuccessMessage" class="text-success"></div>
                            <div class="form-group mt-10">
                                <label for="exampleFormControlSelect1" class="fs-14">Agent’s Name:</label>
                                <input class="form-control br-30 fs-14" id="agent_fullName" name="agent_fullName" value="{{isset($saleData[0]['agent_details']['fullName']) ? ($saleData[0]['agent_details']['fullName']) : null}}" placeholder="Type your Full name" disabled>
                                {{--                                <!-- validation error message -->--}}
                                {{--                                @error('agent_fullName')--}}
                                {{--                                <p style="color: red;">{{$message}}</p>--}}
                                {{--                                @enderror--}}
                            </div>
                            <div class="form-group mt-10">
                                <label for="exampleFormControlSelect1" class="fs-14">Agent’s Phone Number:</label>
                                <input class="form-control br-30 fs-14" id="agent_phone" name="agent_phone" value="{{isset($saleData[0]['agent_details']['phone']) ? ($saleData[0]['agent_details']['phone']) : null}}" placeholder="Type your Phone Number" disabled>
                                {{--                                <!-- validation error message -->--}}
                                {{--                                @error('agent_phone')--}}
                                {{--                                <p style="color: red;">{{$message}}</p>--}}
                                {{--                                @enderror--}}
                            </div>
                            <div class="form-group mt-10">
                                <label for="exampleFormControlSelect1" class="fs-14">Agent’s Email:</label>
                                <input class="form-control br-30 fs-14" id="agent_email" name="agent_email" value="{{isset($saleData[0]['agent_details']['email']) ? ($saleData[0]['agent_details']['email']) : null}}" placeholder="Type your Email" disabled>
                                {{--                                <!-- validation error message -->--}}
                                {{--                                @error('agent_email')--}}
                                {{--                                <p style="color: red;">{{$message}}</p>--}}
                                {{--                                @enderror--}}
                            </div>
                            <div class="agent-footer">
                                <div class="row">
                                    <div class="col-lg-6" style="margin-top: 5px;">
                                        <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=radha.tinnypixel@gmail.com&body=name:{{isset($saleData[0]['agent_details']['fullName']) ? ($saleData[0]['agent_details']['fullName']) : null}},Phone:{{isset($saleData[0]['agent_details']['phone']) ? ($saleData[0]['agent_details']['phone']) : null}},Email:{{isset($saleData[0]['agent_details']['email']) ? ($saleData[0]['agent_details']['email']) : null}}" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Email now</a>
                                        {{--https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=radha.tinnypixel@gmail.com&body=Hi--}}
                                        {{--                                        <a href="javascript:;" class="btn btn-info agent_btn" data-button="email_button" style="font-size: 14px; padding: 10px 20px !important;">Email Now</a>--}}
                                    </div>
                                    <div class="col-lg-6" style="margin-top: 5px;">
                                        {{--tel:123-456-7890--}}
                                        {{--                                        <a href="javascript:;" class="btn btn-info agent_btn" data-button="call_button" style="font-size: 14px; padding: 10px 20px !important;">Call Now</a>--}}
                                        <a href="tel:+123-456-780" class="btn btn-info mt-21" style="font-size: 14px; padding: 10px 20px !important;">Call now</a>
                                    </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#hide").click(function(){
                $("pills-home").hide();
            });
            $("#show").click(function(){
                $("pills-profile").show();
            });
        });
    </script>
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
            lat = <?php echo ($saleData[0]->latitude) ?? 43.653226; ?>;
            lng = <?php echo ($saleData[0]->longitude) ?? -79.3831843; ?>;
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
    {{--                    // if(which_button === 'email_button') {--}}
    {{--                    //     alert('data validated!');--}}
    {{--                    //     let message = 'first name = '+full_name+' agent phone = '+phone_number+' agent email = '+email_address;--}}
    {{--                    //     window.location.href='https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=radha.tinnypixel@gmail.com&body='+message;--}}
    {{--                    // } else {--}}
    {{--                    //     window.location.href='tel:123-456-7890';--}}
    {{--                    // }--}}

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
    {{--                            // alert(newRes);--}}
    {{--                            // if(newRes.success == "1"){--}}
    {{--                            //     alert('agebt saved');--}}
    {{--                            // }else{--}}
    {{--                            //     alert('agent not saved');--}}
    {{--                            // }--}}
    {{--                            // let message = 'first name = '+full_name+' agent phone = '+phone_number+' agent email = '+email_address;--}}
    {{--                            // window.location.href='https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=radha.tinnypixel@gmail.com&body='+message;--}}
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
    <!-- end social-share-icon-script -->
    <script>
        $(document).ready(function (){
            $('.img_bigger img').each(function (){
                var width = $(this).width();
                console.log(width);
                var height = $(this).height();
                console.log(height);
            });
        });
    </script>
    <script>
        $(document).ready(function (){
            var heights = [];

            $('.address_height').each(function (){
                heights.push($(this).height());
            });

            var maxHeight = Math.max.apply(null, heights);
            $('.address_height').height(maxHeight);

            // var img = document.getElementById('img_1');
            // // //or however you get a handle to the IMG
            // var width = img.clientWidth;
            // var height = img.clientHeight;
            // // var define_height = img.clientHeight /2;
            // console.log(height);
            // $('#img_second').css("height",define_height);


        });

    </script>
    <script>
$(window).on('resize', function() {
  var windowWidth = $(window).width();
  var newHeight = 322 * (windowWidth / 2500); // Adjust the factor (2500) as per your requirement
  $('.sale-footer-banner').css('height', newHeight + 'px');
}).trigger('resize');


    </script>
    
    <!-- google map -->
    {{--<script>--}}
    {{--    $(document).ready(function () {--}}
    {{--        $('#mapBtn').click(function () {--}}
    {{--            // alert('button clicked!');--}}
    {{--            let provided_longitude =  $('#propertyLongitude').val();--}}
    {{--            let provided_latitude = $('#propertyLatitude').val();--}}
    {{--            console.log(provided_longitude, provided_latitude);--}}
    {{--            // var src = "https://maps.google.com/maps?q="+lat+","+long+"&hl=es;z=14&amp;output=embed";--}}
    {{--            var src = "https://maps.google.com/maps?q="+provided_latitude+","+provided_longitude+"&t=&z=13&ie=UTF8&iwloc=&output=embed";--}}
    {{--            console.log(src);--}}
    {{--            document.getElementById('gmap_canvas').src = src;--}}
    {{--        });--}}
    {{--    });--}}
    {{--</script>--}}

@endsection
