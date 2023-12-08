@extends('frontend.layout.master')
<!-- title -->
@section('title')
    <title>Tuntunji Realty | Home</title>
    <!-- image-display-for for-sale & new-pre-construct-property -->
    <style>
        .ag-timeline-card_item{
            margin-bottom: 40px;
        }
        .ag-timeline_item:last-child .ag-timeline-card_item {
            margin-bottom: 0;
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
        .owl-carousel.blog-carousel1 .item .card{
            height: auto;
        }
        .img-fluid1{
            height: 100%;
            width: 100%;
        }
        /*.navbar{*/
        /*    position: initial;*/
        /*}*/
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
        /*.gm-style .gm-style-iw-a{*/
        /*    width: 315px;*/
        /*}*/
        /*.gm-style .gm-style-iw-d{*/
        /*    overflow: scroll;*/
        /*}*/

        /*.gm-style .gm-style-iw-d{*/
        /*    overflow: hidden;*/
        /*}*/
        /*.gm-style-iw-d{*/
        /*    overflow: hidden;*/
        /*}*/


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
            background-color: #57b35c;
            color: white;
            padding: 5px;
        }
        /*--- END MAP SIDEBAR ---*/
        html{
            scroll-behavior: smooth;
        }

        #browse_cities{
            /*height : 100px;*/
            /*scroll-margin-top: 20vh;*/
            /*scroll-margin-bottom: 20vh;*/
            /*height: 50%;*/
            /*scroll-margin-top: 3rem;*/
        }
        /*#about{*/
        /*    scroll-margin-top: 3rem;*/
        /*}*/
        /*#featured_in{*/
        /*    scroll-margin-top: 2rem;*/
        /*}*/
        /*#our-team{*/
        /*    scroll-margin-top: 3rem;*/
        /*}*/
        /*#blogs{*/
        /*    scroll-margin-top: 15vh;*/
        /*}*/
        /*#contact{*/
        /*    scroll-margin-top: 20vh;*/
        /*}*/
        #swal2-title{
            font-size: 21px;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @include('frontend.include.navbar')
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div id="home-banner-carousel" class="carousel slide col-12 px-0" data-ride="carousel" data-interval="false">
  <div class="carousel-inner">
      
    <div class="carousel-item active" style="background-image: url({{asset('')}}frontend/assets/imgs/banner-slider1.jpg);">
      <div class="container">
      <div class="carousel-caption row">
        <div class="col-md-6 d-flex flex-column justify-content-between">
            <div class="top">
            <h1>Welcome to the <br> TuTunji Reality</h1>
        <a href="#" class="btn btn-primary">Get Start Now</a>
        <button class="carousel-control-prev" type="button" data-target="#home-banner-carousel" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#home-banner-carousel" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
        </div>
        <div class="bottom">
            <div class="d-flex align-items-center justify-content-center justify-content-md-start awards-image mb-5">
                <img src="{{asset('')}}frontend/assets/imgs/1over_10_years.svg" class="img-fluid" alt="1over_10_years">
                <img src="{{asset('')}}frontend/assets/imgs/pre-con_expert.svg" class="img-fluid" alt="pre-con_expert">
                <img src="{{asset('')}}frontend/assets/imgs/director.svg" class="img-fluid" alt="director">
                <img src="{{asset('')}}frontend/assets/imgs/chairman.svg" class="img-fluid" alt="chairman">
            </div>
            <div class="slider-right-image d-block d-md-none">
              <img src="{{asset('')}}frontend/assets/imgs/ed6ddd7963cbfe70301a73d90c47bdc7.png" alt="ed6ddd7963cbfe70301a73d90c47bdc7.png" class="img-fluid">
            </div>
            <div class="d-flex align-items-center social-part">
                <ul>
                    <li>Follow us:</li>
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fab fa-tiktok"></i></a></li>
                </ul>
                <a href="#contact" class="btn">Contact Us</a>
            </div>
        
        </div>
      </div>
      
      <div class="col-md-6 d-none d-md-block align-self-end">
          <div class="slider-right-image">
              <img src="{{asset('')}}frontend/assets/imgs/ed6ddd7963cbfe70301a73d90c47bdc7.png" alt="ed6ddd7963cbfe70301a73d90c47bdc7.png" class="img-fluid">
          </div>
      </div>
      </div>
      <div class="items-lines">
          <img src="{{asset('')}}frontend/assets/imgs/line_svg.svg" alt="line-svg" class="img-fluid">
      </div>
      </div>
      <div class="items-overlays"></div>
      
    </div>
    <div class="carousel-item" style="background-image: url({{asset('')}}frontend/assets/imgs/banner-slider1.jpg);">
      <div class="container">
      <div class="carousel-caption row">
        <div class="col-md-6 d-flex flex-column justify-content-between">
            <div class="top">
            <h1>Welcome to the <br> TuTunji Reality</h1>
        <a href="#" class="btn btn-primary">Get Start Now</a>
        <button class="carousel-control-prev" type="button" data-target="#home-banner-carousel" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#home-banner-carousel" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
        </div>
        <div class="bottom">
            
            <div class="d-flex align-items-center justify-content-center justify-content-md-start awards-image mb-5">
                <img src="{{asset('')}}frontend/assets/imgs/1over_10_years.svg" class="img-fluid" alt="1over_10_years">
                <img src="{{asset('')}}frontend/assets/imgs/pre-con_expert.svg" class="img-fluid" alt="pre-con_expert">
                <img src="{{asset('')}}frontend/assets/imgs/director.svg" class="img-fluid" alt="director">
                <img src="{{asset('')}}frontend/assets/imgs/chairman.svg" class="img-fluid" alt="chairman">
            </div>
            <div class="slider-right-image d-block d-md-none">
              <img src="{{asset('')}}frontend/assets/imgs/ed6ddd7963cbfe70301a73d90c47bdc7.png" alt="ed6ddd7963cbfe70301a73d90c47bdc7.png" class="img-fluid">
            </div>
            <div class="d-flex align-items-center social-part">
                <ul>
                    <li>Follow us:</li>
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fab fa-tiktok"></i></a></li>
                </ul>
                <a href="#contact" class="btn">Contact Us</a>
            </div>
        
        </div>
      </div>
      <div class="col-md-6 d-none d-md-block align-self-end">
          <div class="slider-right-image">
              <img src="{{asset('')}}frontend/assets/imgs/ed6ddd7963cbfe70301a73d90c47bdc7.png" alt="ed6ddd7963cbfe70301a73d90c47bdc7.png" class="img-fluid">
          </div>
      </div>
      </div>
      <div class="items-lines">
          <img src="{{asset('')}}frontend/assets/imgs/line_svg.svg" alt="line-svg" class="img-fluid">
      </div>
      </div>
      <div class="items-overlays"></div>
    </div>
    <div class="carousel-item" style="background-image: url({{asset('')}}frontend/assets/imgs/banner-slider1.jpg);">
      <div class="container">
      <div class="carousel-caption row">
        <div class="col-md-6 d-flex flex-column justify-content-between">
            <div class="top">
            <h1>Welcome to the <br> TuTunji Reality</h1>
        <a href="#" class="btn btn-primary">Get Start Now</a>
        
        <button class="carousel-control-prev" type="button" data-target="#home-banner-carousel" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#home-banner-carousel" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
        </div>
        <div class="bottom">
            <div class="d-flex align-items-center justify-content-center justify-content-md-start awards-image mb-5">
                <img src="{{asset('')}}frontend/assets/imgs/1over_10_years.svg" class="img-fluid" alt="1over_10_years">
                <img src="{{asset('')}}frontend/assets/imgs/pre-con_expert.svg" class="img-fluid" alt="pre-con_expert">
                <img src="{{asset('')}}frontend/assets/imgs/director.svg" class="img-fluid" alt="director">
                <img src="{{asset('')}}frontend/assets/imgs/chairman.svg" class="img-fluid" alt="chairman">
            </div>
            <div class="slider-right-image d-block d-md-none">
              <img src="{{asset('')}}frontend/assets/imgs/ed6ddd7963cbfe70301a73d90c47bdc7.png" alt="ed6ddd7963cbfe70301a73d90c47bdc7.png" class="img-fluid">
            </div>
            <div class="d-flex align-items-center social-part">
                <ul>
                    <li>Follow us:</li>
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fab fa-tiktok"></i></a></li>
                </ul>
                <a href="#contact" class="btn">Contact Us</a>
            </div>
        
        </div>
      </div>
      <div class="col-md-6 d-none d-md-block align-self-end">
          <div class="slider-right-image">
              <img src="{{asset('')}}frontend/assets/imgs/ed6ddd7963cbfe70301a73d90c47bdc7.png" alt="ed6ddd7963cbfe70301a73d90c47bdc7.png" class="img-fluid">
          </div>
      </div>
      </div>
      <div class="items-lines">
          <img src="{{asset('')}}frontend/assets/imgs/line_svg.svg" alt="line-svg" class="img-fluid">
      </div>
      </div>
      <div class="items-overlays"></div>

    </div>
  </div>
 
</div>
        </div>
    </div>
    <div class="container">
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
                                <option value="none">Select Type</option>
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
                                {{-- <option selected>none</option> --}}
                                <option value="none">Select Type</option>
                                <option value="pre-construct">Upcoming Pre-Construction Projects</option>
                                <option value="sale">New Construction For Sale/Lease</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="text-white fs-12">Province, Postal Code, City or Address</label>
                            <input type="search" class="form-control br-30 fs-12 property_filter_input_data" placeholder="Write Text Here" id="filter_postal_city_street" name="filter_postal_city_street" value="Ontario, Canada">
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
                                        <option value="none">Select Amount</option>
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
                                        <option value="none">Select Amount</option>
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
                                        <option value="none">Select size</option>
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
                        {{-- <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="sort_by" class="fs-12 text-white">Sort By</label>
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
                        </div> --}}
                        <p id="error_message_filter" style="color: red; margin-bottom: 5px; text-align: center; font-size: 12px;"></p>
                        <div class="row">
                            <div class="col-md-12" style="margin-bottom: -20px;">
                                <button type="button" class="btn btn-primary filter_btn" style="margin-left: auto;margin-right: auto;">Filter Map</button>
                            </div>
                        </div>
                        <!-- end of mob view-->
                    </form>

                </div>
            </div>
            <div class="col-lg-9 mt-41">
                <div id="map" style="height: 688px;" class="my_map"></div>
                <div id="overlay" style="display: none">
                    <div id="property_show_section"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="bg-dark mt-40" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <h1 class="fs-40 text-center bb-2" style="border-bottom: 2px dashed #fff;padding-bottom: 10px"><span class="fw-700" style="color: #fff;">About Us</span></h1>


                </div>
                <div class="col-lg-10 offset-lg-1 mt-5">
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/f3NWvUV8MD8?rel=0" allowfullscreen></iframe>
                    </div>
                </div>



            </div>
            <div class="row mt-40 text-center">
                <div class="col-lg-10 offset-lg-1">
                    <p class="lead">Tutunji Realty is dedicated to helping investors, buyers, and sellers succeed in the Ontario, Canada real estate market. We specialize in investing, buying, selling and leasing residential and commercial pre-construction and new construction real estate in Ontario, Canada.</p>


                </div>
                <div class="col-12">

                    <div class="text-center">
                        <a href="{{url('/')}}"><img src="https://tutunjirealty.com/demo/public/frontend/assets/imgs/Tutunji Realty White (Brokered By).svg" alt="" width="200px" height="200px"></a>
                    </div>
                    <div class="text-center">
                        <img src="{{asset('')}}frontend/assets/imgs/logo2_white.svg" alt="" class="img-fluid" width="200px">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="featured_in">
        <div class="row pt-120">
            <div class="col-lg-6 offset-lg-3">
                <h1 class="fs-40 text-center bb-2" style="border-bottom: 2px dashed #000000;padding-bottom: 10px"><span class="fw-700" style="color: #000000;">Featured In</span></h1>
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
    <!--Desktop View Only-->
    <div class="bg-grey mt-120 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center">
                    <div class="box h-100">
                        <img src="{{asset('')}}frontend/assets/imgs/icon__house.svg" alt="" class="img-fluid mt--82" style="max-width: 100px;">                        <h4 class="fs-20 mt-20">Buying</h4>
                        <p style="font-size: 18px;">Expert realtors guiding you through pre-constructions, assignments and new constructions acquisition for the perfect property and best deal.</p>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="box mt-71 h-100">
                        <img src="{{asset('')}}frontend/assets/imgs/icon__selling.svg" alt="" class="img-fluid mt--82" style="max-width: 100px;">                        <h4 class="fs-20 mt-20">Selling</h4>
                        <p style="font-size: 18px;">Personalized assistance to secure the best deal, from market analysis to selling process guidance.</p>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 8%;">
                <div class="col-lg-6 text-center">
                    <div class="box mt-71 h-100">
                        <img src="{{asset('')}}frontend/assets/imgs/icon__leasing.svg" alt="" class="img-fluid mt--82" style="max-width: 100px;">
                        <h4 class="fs-20 mt-20">Leasing</h4>
                        <p style="font-size: 18px;">Stress-free and enjoyable assistance in finding tenants for new construction rentals.</p>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="box mt-71 h-100">
                        <img src="{{asset('')}}frontend/assets/imgs/icon__investing.svg" alt="" class="img-fluid mt--82" style="max-width: 100px;">
                        <h4 class="fs-20 mt-20">Investing</h4>
                        <p style="font-size: 18px;">Expert guidance to identify investment opportunities and make informed decisions in pre-constructions, assignments and new constructions real estate.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Mobile View Only-->
    <div class="bg-grey mt-50 d-lg-none">
        <div class="container p-0">
            <div class="owl-carousel services-carousel owl-theme">
                <div class="item">
                    <div class="box text-center">
                        <img src="{{asset('')}}frontend/assets/imgs/icon__house.svg" alt="" class="img-fluid mt--82 mx-auto" style="max-width: 100px;">                        <h4 class="fs-20 mt-20">Buying</h4>
                        <p style="font-size: 18px;">Expert realtors guiding you through pre-constructions, assignments and new constructions acquisition for the perfect property and best deal.</p>
                    </div>
                </div>
                <div class="item">
                    <div class="box text-center">
                        <img src="{{asset('')}}frontend/assets/imgs/icon__selling.svg" alt="" class="img-fluid mt--82 mx-auto" style="max-width: 100px;">                        <h4 class="fs-20 mt-20">Selling</h4>
                        <p style="font-size: 18px;">Personalized assistance to secure the best deal, from market analysis to selling process guidance.</p>
                    </div>
                </div>
                <div class="item">
                    <div class="box text-center">
                        <img src="{{asset('')}}frontend/assets/imgs/icon__leasing.svg" alt="" class="img-fluid mt--82 mx-auto" style="max-width: 100px;">
                        <h4 class="fs-20 mt-20">Leasing</h4>
                        <p style="font-size: 18px;">Stress-free and enjoyable assistance in finding tenants for new construction rentals.</p>
                    </div>
                </div>
                <div class="item">
                    <div class="box text-center">
                        <img src="{{asset('')}}frontend/assets/imgs/icon__investing.svg" alt="" class="img-fluid mt--82 mx-auto" style="max-width: 100px;">
                        <h4 class="fs-20 mt-20">Investing</h4>
                        <p style="font-size: 18px;">Expert guidance to identify investment opportunities and make informed decisions in pre-constructions, assignments and new constructions real estate.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- web view for pre-construction -->
    <div class="container" id="pre_construction">
        <div class="row pt-120">
            <div class="col-lg-6 offset-lg-3">
                <h1 class="fs-40 text-center bb-2" style="color: #000000;border-bottom: 2px dashed #000000;padding-bottom: 10px"><span class="fw-700">Upcoming Pre-Construction Projects</span></h1>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-lg-8 offset-lg-2">
                <p class="text-center">Get VIP access to the latest pre-construction projects! Be the first to discover the hottest developments and take advantage of pre-construction pricing.</p>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-lg-12 text-center">
                <div class="strategy-box">
        <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
          <li class="nav-item bdr-1" role="presentation">
            
            <a class="nav-link active" id="pills-upcoming-pre-cons1-tab" data-toggle="pill" href="#pills-upcoming-pre-cons1" type="button" role="tab" aria-controls="pills-upcoming-pre-cons1" aria-selected="true">Available Now</a>
          </li>
          <li class="nav-item bdr-3" role="presentation">
            <a class="nav-link" id="pills-upcoming-pre-cons2-tab" data-toggle="pill" href="#pills-upcoming-pre-cons2" type="button" role="tab" aria-controls="pills-upcoming-pre-cons2" aria-selected="false">Coming Soon</a>
          </li>
        
        </ul>
        </div>
        </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-upcoming-pre-cons1" role="tabpanel" aria-labelledby="pills-upcoming-pre-cons1-tab" tabindex="0">
              <div class="row mt-40 dn">
            @if(empty($allPreConstructData))<p class="text-center" style="margin-left: auto;margin-right: auto">
                Whoops! No New Upcoming Pre-Construction Projects Property Found</p>
            @else
                @foreach($allPreConstructData as $pre_constructData)
                    <div class="col-lg-4 mb-4">
                        <a href="{{url('/pre-construct-property',$pre_constructData['id'])}}" class="text-black" style="text-decoration: none">
                            {{--                            <a href="{{url('/pre-construct-search')}}" class="text-black" style="text-decoration: none">--}}
                            <div class="box1 p-3">
                                <div class="row">
                                    <div class="col-12 preview-img">
                                        @if($pre_constructData['property_media'])
                                             <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$pre_constructData['property_media']['media_name'])}}" class="img-fluid">
                                         @else
                                             
                                              <img src="{{asset('default/404-not-found.jpg')}}" class="img-fluid">
                                             
                                        @endif
                                    </div>
                                    <div class="col-12 mt-20">
                                        <h6 class="fs-18 fw-700 text-black">
                                            @if($pre_constructData['before_price_label'] != null && $pre_constructData['after_price_label'] != null)
                                                {{$pre_constructData['before_price_label']}}
                                            @endif
                                            ${{$pre_constructData['price'] ? $pre_constructData['price'] : '-'}}
                                            @if($pre_constructData['after_price_label'] != null && $pre_constructData['before_price_label'] != null)
                                                {{$pre_constructData['after_price_label']}}
                                            @endif
                                        </h6>
                                        <ul class="list-unstyled fs-12 fw-700 text-black" style="min-height: 95px;display: flex;
    flex-direction: column;">
                                            {{--<li>{{\Illuminate\Support\Str::limit($pre_constructData['address'], 25) ? \Illuminate\Support\Str::limit($pre_constructData['address'],25) : '-'}}</li>--}}
                                            <li class="" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">{{$pre_constructData['address']}}</li>
                                            <li class="">{{$pre_constructData['city']}}, {{$pre_constructData['country_state']}} {{$pre_constructData['zip']}}</li>
{{--                                            <li class=""></li>--}}
                                            <li class="my-auto">
                                                <div class="row">
                                                    <div class="col-md-4 mt-3">
                                                        {{$pre_constructData['from_bedrooms']}}-{{$pre_constructData['to_bedrooms']}} <i class="fa fa-bed"></i></br>Bedrooms
                                                    </div>
                                                    <div class="col-md-4 mt-3">
                                                        {{$pre_constructData['from_bathrooms']}}-{{$pre_constructData['to_bathrooms']}} <i class="fa fa-bath"></i></br>Bathrooms
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <h6 class="fs-12 mt-26 text-grey" style="margin-top: 0;"><i class="fa fa-tag mr-1"></i>&nbsp;{{($pre_constructData['cat_details']) ? $pre_constructData['cat_details']['name'] : '-'}}</h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
          </div>
          <div class="tab-pane fade" id="pills-upcoming-pre-cons2" role="tabpanel" aria-labelledby="pills-upcoming-pre-cons2-tab" tabindex="0">
              <div class="row mt-40 dn">
            @if(empty($allPreConstructData))<p class="text-center" style="margin-left: auto;margin-right: auto">
                Whoops! No New Upcoming Pre-Construction Projects Property Found</p>
            @else
                @foreach($allPreConstructData as $pre_constructData)
                    <div class="col-lg-4 mb-4">
                        <a href="{{url('/pre-construct-property',$pre_constructData['id'])}}" class="text-black" style="text-decoration: none">
                            {{--                            <a href="{{url('/pre-construct-search')}}" class="text-black" style="text-decoration: none">--}}
                            <div class="box1 p-3">
                                <div class="row">
                                    <div class="col-12 preview-img">
                                        @if($pre_constructData['property_media'])
                                             <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$pre_constructData['property_media']['media_name'])}}" class="img-fluid">
                                         @else
                                             
                                              <img src="{{asset('default/404-not-found.jpg')}}" class="img-fluid">
                                             
                                        @endif
                                    </div>
                                    <div class="col-12 mt-20">
                                        <h6 class="fs-18 fw-700 text-black">
                                            @if($pre_constructData['before_price_label'] != null && $pre_constructData['after_price_label'] != null)
                                                {{$pre_constructData['before_price_label']}}
                                            @endif
                                            ${{$pre_constructData['price'] ? $pre_constructData['price'] : '-'}}
                                            @if($pre_constructData['after_price_label'] != null && $pre_constructData['before_price_label'] != null)
                                                {{$pre_constructData['after_price_label']}}
                                            @endif
                                        </h6>
                                        <ul class="list-unstyled fs-12 fw-700 text-black" style="min-height: 95px;display: flex;
    flex-direction: column;">
                                            {{--<li>{{\Illuminate\Support\Str::limit($pre_constructData['address'], 25) ? \Illuminate\Support\Str::limit($pre_constructData['address'],25) : '-'}}</li>--}}
                                            <li class="" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">{{$pre_constructData['address']}}</li>
                                            <li class="">{{$pre_constructData['city']}}, {{$pre_constructData['country_state']}} {{$pre_constructData['zip']}}</li>
{{--                                            <li class=""></li>--}}
                                            <li class="my-auto">
                                                <div class="row">
                                                    <div class="col-md-4 mt-3">
                                                        {{$pre_constructData['from_bedrooms']}}-{{$pre_constructData['to_bedrooms']}} <i class="fa fa-bed"></i></br>Bedrooms
                                                    </div>
                                                    <div class="col-md-4 mt-3">
                                                        {{$pre_constructData['from_bathrooms']}}-{{$pre_constructData['to_bathrooms']}} <i class="fa fa-bath"></i></br>Bathrooms
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <h6 class="fs-12 mt-26 text-grey" style="margin-top: 0;"><i class="fa fa-tag mr-1"></i>&nbsp;{{($pre_constructData['cat_details']) ? $pre_constructData['cat_details']['name'] : '-'}}</h6>
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
            <div class="col-lg-12 px-0">
                <div class="owl-carousel blog-carousel owl-theme hide-nav">
                    @if(empty($allPreConstructData))
                        <p class="text-center" style="margin-left: auto;margin-right: auto;color: #000000;border-bottom: 2px dashed #000000;">
                            Whoops! No New Upcoming Pre-Construction Projects Found
                        </p>
                    @else
                        @foreach($allPreConstructData as $pre_constructData)
                            <div class="item">
                                {{-- <a href="{{url('/pre-construct-search')}}" class="text-black" style="text-decoration: none">--}}
                                <a href="{{url('/pre-construct-property',$pre_constructData['id'])}}" class="text-black" style="text-decoration: none">
                                    <div class="box1">
                                        <div class="row">
                                            <div class="col-lg-6 col-6 preview-img"  @if($pre_constructData['property_media'])
                                                style="background-image: url('{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$pre_constructData['property_media']['media_name'])}}');background-clip: content-box;"
                                                 @else style="background-image: url('{{asset('default/404-not-found.jpg')}}');background-clip: content-box;" @endif>
                                            </div>
                                            <div class="col-lg-6 col-6 mt-20" style="padding-left: 0;">
                                                <h6 class="fs-18 fw-700 text-black" style="min-height: 45px;">
                                                    @if($pre_constructData['before_price_label'] != null && $pre_constructData['after_price_label'] != null)
                                                        {{$pre_constructData['before_price_label']}}
                                                    @endif
                                                    ${{$pre_constructData['price'] ? $pre_constructData['price'] : '-'}}
                                                    @if($pre_constructData['after_price_label'] != null && $pre_constructData['before_price_label'] != null)
                                                        {{$pre_constructData['after_price_label']}}
                                                    @endif
                                                </h6>
                                                <ul class="list-unstyled fs-12 fw-700 text-black" style="min-height: 122px;display: flex;
    flex-direction: column;">
                                                    <li class="" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">{{$pre_constructData['address']}}</li>
                                                    <li class="">{{$pre_constructData['city']}}, {{$pre_constructData['country_state']}} {{$pre_constructData['zip']}}</li>
                                                    
                                                    <li class="my-auto">
                                                        <div class="row">
                                                            <div class="col-md-4 mt-3">
                                                                {{$pre_constructData['from_bedrooms']}}-{{$pre_constructData['to_bedrooms']}} <i class="fa fa-bed"></i></br>Bedrooms
                                                            </div>
                                                            <div class="col-md-8 mt-3">
                                                                {{$pre_constructData['from_bathrooms']}}-{{$pre_constructData['to_bathrooms']}} <i class="fa fa-bath"></i></br>Bathrooms
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <h6 class="fs-12 mt-26 text-grey" style="margin-top: 0;"><i class="fa fa-tag mr-1"></i>&nbsp;{{($pre_constructData['cat_details']) ? $pre_constructData['cat_details']['name'] : '-'}}</h6>
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

    <!-- web view for for-sale/lease -->
    <div class="bg-grey pt-120 dn" id="for_sales">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <h1 class="fs-40 text-center bb-2" style="color: #000000;border-bottom: 2px dashed #000000;padding-bottom: 10px"><span class="fw-700">New Construction For Sale/Lease</span></h1>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-lg-8 offset-lg-2">
                    <p class="text-center">Explore the latest MLS listings for new construction homes and assignments! Get the chance to own or lease a brand new home before it's even built or lived in.</p>
                </div>
            </div>
            <div class="row mt-20">
            <div class="col-lg-12 text-center">
                <div class="strategy-box">
        <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
          <li class="nav-item bdr-1" role="presentation">
            
            <a class="nav-link active" id="pills-new-for-sales1-tab" data-toggle="pill" href="#pills-new-for-sales1" type="button" role="tab" aria-controls="pills-new-for-sales1" aria-selected="true">For Sale</a>
          </li>
          <li class="nav-item bdr-3" role="presentation">
            <a class="nav-link" id="pills-new-for-sales2-tab" data-toggle="pill" href="#pills-new-for-sales2" type="button" role="tab" aria-controls="pills-new-for-sales2" aria-selected="false">For Lease</a>
          </li>
        
        </ul>
        </div>
        </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-new-for-sales1" role="tabpanel" aria-labelledby="pills-new-for-sales1-tab">
      <div class="row mt-40">
                @if(empty($allSaleData))
                    <p class="text-center" style="margin-left: auto;margin-right: auto">
                        Whoops!  No New Construction For Sale/Lease Property Found
                    </p>
                @else
                    @foreach($allSaleData as $saleData)
                        <div class="col-lg-4 mb-4">
                            {{-- <a href="{{url('/sale-search')}}" class="text-black" style="text-decoration: none"> --}}
                            <a href="{{url('/sale-property',$saleData['id'])}}" class="text-black" style="text-decoration: none">
                                <div class="box1 p-3">
                                    <div class="row">
                                        @if(!empty($saleData['listed_in']))
                                            <span class="property_badge" style="margin-left: 4%;">
                                            {{$saleData['listed_in']}}
                                                {{-- <i class="fa fa-tags"></i>--}}
                                        </span>
                                        @endif
                                        {{--                                        <span style="position: absolute;z-index: 100;font-size: 20px;background-color: #E67A00;color: white;">Hello<i class="fa fa-tags"></i></span>--}}
                                        <div class="col-12 preview-img">
                                            
                                            @if(!empty($saleData['property_media']['media_name']))
                                                 @if($saleData['source'] == 'Frontend')
                                             <img src="{{asset('frontend/assets/property-images/media-file/'.$saleData['property_media']['media_name'])}}" class="img-fluid">
                                         @else
                                             
                                              <img src="{{asset('admin-panel/assets/property-images/media-file/sale/'.$saleData['property_media']['media_name'])}}" class="img-fluid">
                                              
                                              @endif
                                              
                                         @else
                                         <img src="{{asset('default/404-not-found.jpg')}}" class="img-fluid">
                                             
                                        @endif
                                        </div>
                                        <div class="col-12 mt-20">
                                            <h6 class="fs-16 fw-700 text-black">
                                              @if($saleData['before_price_label'] != null && $saleData['after_price_label'] != null)
                                                  {{$saleData['before_price_label']}}
                                                @endif
                                                ${{($saleData['price']) ? $saleData['price'] : '-'}}
                                                  @if($saleData['after_price_label'] != null && $saleData['before_price_label'] != null)
                                                      {{$saleData['after_price_label']}}
                                                  @endif
                                            </h6>
                                            <ul class="list-unstyled fs-12 fw-700 text-black" style="min-height: 95px;display: flex;
    flex-direction: column;">
                                                <li class="fw-700 text-black" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">{{$saleData['address']}}</li>
                                                <li class="">{{$saleData['city']}}, {{$saleData['country_state']}} {{$saleData['zip']}}</li>
                                                
                                                <li class="my-auto">
                                                    <div class="row">
                                                        <div class="col-md-4 mt-3">
                                                            {{$saleData['bedrooms'] ? $saleData['bedrooms'] : '-'}} <i class="fa fa-bed"></i></br>Bedrooms
                                                        </div>
                                                        <div class="col-md-4 mt-3">
                                                            {{$saleData['bathrooms'] ? $saleData['bathrooms'] : '-'}} <i class="fa fa-bath"></i></br>Bathrooms
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <h6 class="fs-12 mt-26 text-grey" style="margin-top: 0;"><i class="fa fa-tag mr-1"></i>&nbsp;{{($saleData['cat_details']) ? $saleData['cat_details']['name'] : '-'}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
  </div>
  <div class="tab-pane fade" id="pills-new-for-sales2" role="tabpanel" aria-labelledby="pills-new-for-sales2-tab">
      <div class="row mt-40">
                @if(empty($allSaleData))
                    <p class="text-center" style="margin-left: auto;margin-right: auto">
                        Whoops!  No New Construction For Sale/Lease Property Found
                    </p>
                @else
                    @foreach($allSaleData as $saleData)
                        <div class="col-lg-4 mb-4">
                            {{-- <a href="{{url('/sale-search')}}" class="text-black" style="text-decoration: none"> --}}
                            <a href="{{url('/sale-property',$saleData['id'])}}" class="text-black" style="text-decoration: none">
                                <div class="box1 p-3">
                                    <div class="row">
                                        @if(!empty($saleData['listed_in']))
                                            <span class="property_badge" style="margin-left: 4%;">
                                            {{$saleData['listed_in']}}
                                                {{-- <i class="fa fa-tags"></i>--}}
                                        </span>
                                        @endif
                                        {{--                                        <span style="position: absolute;z-index: 100;font-size: 20px;background-color: #E67A00;color: white;">Hello<i class="fa fa-tags"></i></span>--}}
                                        <div class="col-12 preview-img">
                                            
                                            @if(!empty($saleData['property_media']['media_name']))
                                                 @if($saleData['source'] == 'Frontend')
                                             <img src="{{asset('frontend/assets/property-images/media-file/'.$saleData['property_media']['media_name'])}}" class="img-fluid">
                                         @else
                                             
                                              <img src="{{asset('admin-panel/assets/property-images/media-file/sale/'.$saleData['property_media']['media_name'])}}" class="img-fluid">
                                              
                                              @endif
                                              
                                         @else
                                         <img src="{{asset('default/404-not-found.jpg')}}" class="img-fluid">
                                             
                                        @endif
                                        </div>
                                        <div class="col-12 mt-20">
                                            <h6 class="fs-16 fw-700 text-black">
                                              @if($saleData['before_price_label'] != null && $saleData['after_price_label'] != null)
                                                  {{$saleData['before_price_label']}}
                                                @endif
                                                ${{($saleData['price']) ? $saleData['price'] : '-'}}
                                                  @if($saleData['after_price_label'] != null && $saleData['before_price_label'] != null)
                                                      {{$saleData['after_price_label']}}
                                                  @endif
                                            </h6>
                                            <ul class="list-unstyled fs-12 fw-700 text-black" style="min-height: 95px;display: flex;
    flex-direction: column;">
                                                <li class="fw-700 text-black" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">{{$saleData['address']}}</li>
                                                <li class="">{{$saleData['city']}}, {{$saleData['country_state']}} {{$saleData['zip']}}</li>
                                                
                                                <li class="my-auto">
                                                    <div class="row">
                                                        <div class="col-md-4 mt-3">
                                                            {{$saleData['bedrooms'] ? $saleData['bedrooms'] : '-'}} <i class="fa fa-bed"></i></br>Bedrooms
                                                        </div>
                                                        <div class="col-md-4 mt-3">
                                                            {{$saleData['bathrooms'] ? $saleData['bathrooms'] : '-'}} <i class="fa fa-bath"></i></br>Bathrooms
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <h6 class="fs-12 mt-26 text-grey" style="margin-top: 0;"><i class="fa fa-tag mr-1"></i>&nbsp;{{($saleData['cat_details']) ? $saleData['cat_details']['name'] : '-'}}</h6>
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
            
            <div class="row mt-40 dn">
                <div class="col-lg-6 offset-lg-3">
                    {{--                    <button type="button" class="btn btn-info">View more properties</button>--}}
                    <a href="{{url('/sale-search')}}" class="btn btn-info">View All New Construction For Sale/Lease</a>
                </div>
            </div>
        </div>
    </div>
    <!--    mob view for sales / lease -->
    <div class="bg-grey mt-80 dn-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <h1 class="fs-40 text-center bb-2" style="color: #000000;border-bottom: 2px dashed #000000;padding-bottom: 10px">New Construction For Sale/Lease</h1>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-lg-8">
                    <p class="text-center">Explore the latest MLS listings for new construction homes and assignments! Get the chance to own or lease a brand new home before it's even built or lived in.</p>
                </div>
            </div>
            <div class="row mt-40">
                <div class="col-lg-12 px-0">
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
                                                    <span class="property_badge" style="margin-left: 5%;">
                                            {{$saleData['listed_in']}}
                                                        {{--                                            <i class="fa fa-tags"></i>--}}
                                        </span>
                                                @endif
                                                <div class="col-lg-6 col-6"  @if(!empty($saleData['property_media']['media_name']))
                                                    @if($saleData['source'] == 'Frontend')
                                                        style="height: auto;
                                                    background-image: url('{{asset('frontend/assets/property-images/media-file/'.$saleData['property_media']['media_name'])}}');background-clip: content-box;
                                                    background-size: cover;
                                                    background-repeat: no-repeat;
                                                    background-position: center;"
                                                     @else
                                                         style="height: auto;
                                                         background-image: url('{{asset('admin-panel/assets/property-images/media-file/sale/'.$saleData['property_media']['media_name'])}}');background-clip: content-box;
                                                         background-size: cover;
                                                         background-repeat: no-repeat;
                                                         background-position: center;" @endif
                                                     @else
                                                         style="height: auto;
                                                    background-image: url('{{asset('default/404-not-found.jpg')}}');background-clip: content-box;
                                                    background-size: cover;
                                                    background-repeat: no-repeat;
                                                    background-position: center;" @endif>
                                                </div>
                                                <div class="col-lg-6 col-6 mt-20" style="padding-left: 0;">
                                                    <h6 class="fs-18 fw-700 text-black" style="min-height: 45px;">
                                                        @if($saleData['before_price_label'] != null && $saleData['after_price_label'] != null)
                                                            {{$saleData['before_price_label']}}
                                                        @endif
                                                        ${{($saleData['price']) ? $saleData['price'] : '-'}}
                                                        @if($saleData['after_price_label'] != null && $saleData['before_price_label'] != null)
                                                            {{$saleData['after_price_label']}}
                                                        @endif
                                                    </h6>
                                                    <ul class="list-unstyled fs-12 fw-700 text-black" style="min-height: 122px;display: flex;
    flex-direction: column;">
                                                        <li class="" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">{{$saleData['address']}}</li>
                                                        <li class="">{{$saleData['city']}}, {{$saleData['country_state']}} {{$saleData['zip']}}</li>
                                                        
                                                        <li class="my-auto">
                                                            <div class="row">
                                                                <div class="col-md-4 mt-2">
                                                                    {{$saleData['bedrooms'] ? $saleData['bedrooms'] : '-'}}&nbsp; <i class="fa fa-bed"></i></br>Bedrooms
                                                                </div>
                                                                <div class="col-md-8 mt-2">
                                                                    {{$saleData['bathrooms'] ? $saleData['bathrooms'] : '-'}}&nbsp; <i class="fa fa-bath"></i></br>Bathrooms
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <h6 class="fs-12 mt-26 text-grey" style="margin-top: 0;"><i class="fa fa-tag mr-1"></i>&nbsp;{{($saleData['cat_details']) ? $saleData['cat_details']['name'] : '-'}}</h6>
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
    <div class="bg-green strategy-container" id="container-gsap">
        <div class="container g-timeline-header">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <h1 class="fs-40 text-center bb-2" id="container-gsap-title" style="border-bottom: 2px dashed #000000;color: #000000; padding-bottom: 10px">
                        Our Million Dollar Strategy
                    </h1>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-lg-8 offset-lg-2">
                    <p class="text-center">
                        Buy, invest, sell or lease with confidence. Check out our proven approach for Pre-Construction and New Construction Properties Below.                    </p>
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
{{--                                                                    <p>Understand the property spectrum we are working with for the client. This can vary from houses, apartments or condo pre-constructions.--}}
{{--                                                                    </p>--}}
                                                                    <p>Explore our diverse property spectrum: houses, apartments, and condo pre-constructions, assignments and new constructions for our clients.</p>
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
                                                                    <p>Secure the lowest interest rates with our extensive mortgage network, ensuring financial optimization for clients.</p>
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
                                                                    <p>Strategically identify the top 10 search areas based on clients' financial situations.</p>
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
                                                                    <p>Gain a competitive edge in pre-construction projects, guiding clients to secure desirable units in Ontario's dynamic market.</p>
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
                                                                    <p>Close hassle-free deals with peace of mind, as our professionals ensure the best property deal guaranteed.</p>
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
                                <section class="timeline-section" style="width: 100%;">
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
                                                                    <p> Sell assignments and new construction properties under 5 years old with precision and market expertise.</p>
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
                                                                    <p>Strategically assess client preferences and compare to real-time MLS pricing, ensuring accurate valuations.</p>
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
                                                                    <p>Optimize property presentation and listings for maximum exposure and tailored marketing to attract buyers.</p>
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
                                                                    <p>Navigate offers with finesse in Ontario's competitive market, ensuring client advantage and success.</p>
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
                                                                    <p>Close deals seamlessly and confidently with professional guidance, securing the best outcomes guaranteed.</p>
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
                                                                    <p>Explore the property spectrum and investment opportunities tailored to your goals.</p>
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
                                                                    <p>Secure low-interest rates through our vast mortgage network, maximizing your investment potential.</p>
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
                                                                    <p>Identify top investment search areas based on your financial situation and goals.</p>
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
                                                                    <p>Strategize to position you ahead in pre-construction projects, assignments and new construction, gaining a competitive edge in Ontario's market.</p>
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
                                                                    <p>Close deals hassle-free, ensuring the best investment outcomes professionally and efficiently.</p>
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
                    <h1 class="fs-40 text-center text-white bb-2" style="border-bottom: 2px dashed #fff;"><span class="fw-700">Testimonials</span></h1>
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
                    {{--                    <button type="button" class="btn btn-info">View More Testimonials</button>--}}
                    <a href="{{url('/testimonial')}}" class="btn btn-info">View More Testimonials</a>

                </div>
            </div>
        </div>
    </div>

    <div class="bg-grey" id="our-team">
        <div class="container dn">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <h1 class="fs-40 text-center bb-2" style="border-bottom: 2px dashed #000000;padding-bottom: 10px"><span class="fw-700" style="color: #000000;">Our Team</span></h1>
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
{{--                    @foreach($allAgent as $agentData)--}}
{{--                        <div class="col-lg-4">--}}
{{--                            --}}{{--                    <a href="{{url('/agent')}}" style="color: #262222;text-decoration: none;">--}}
{{--                            <div class="card" style="width: 100%;">--}}
{{--                                @if($agentData->image)--}}
{{--                                    <img src="{{asset('admin-panel/assets/agent/images/'.$agentData->image)}}" class="card-img-top" alt="agent img">--}}
{{--                                @else--}}
{{--                                    <img src="{{asset('default/blank-profile.png')}}" class="card-img-top" alt="agent img">--}}
{{--                                @endif--}}
{{--                                <img src="{{asset('default/blank-profile.png')}}" class="card-img-top" alt="...">--}}
{{--                                <div class="card-body">--}}
{{--                                    <h5 class="card-title">{{$agentData->fullName ? $agentData->fullName : '-'}}</h5>--}}
{{--                                    <ul class="list-unstyled fs-21">--}}
{{--                                        <li>-</li>--}}
{{--                                        <li>{{$agentData->email ? $agentData->email : '-'}}</li>--}}
{{--                                        <li>{{$agentData->phone ? $agentData->phone : '-'}}</li>--}}
{{--                                    </ul>--}}
{{--                                    <hr>--}}
{{--                                    <ul class="list-unstyled list-inline text-center mb-0">--}}
{{--                                        @php($url =  url('agent'))--}}
{{--                                        <li class="list-inline-item">--}}
{{--                                            <a href="https://www.instagram.com/?url={{$url}}" target="_blank"><img src="{{asset('')}}frontend/assets/imgs/instagram.png" alt="" class="img-fluid" height="34px" width="34px"></a>--}}
{{--                                        </li>--}}
{{--                                        <li class="list-inline-item">--}}
{{--                                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{$url}}" target="_blank"><img src="{{asset('')}}frontend/assets/imgs/linkedin.png" alt="" class="img-fluid"></a>--}}
{{--                                        </li>--}}
{{--                                        <li class="list-inline-item">--}}
{{--                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{$url}}" target="_blank"><img src="{{asset('')}}frontend/assets/imgs/Group 265.png" alt="" class="img-fluid"></a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
                    <div class="col-lg-6">
                        <div class="card" style="width: 100%;">
                            <img src="{{asset('frontend/assets/imgs/WaiilTutunji.jpg')}}" class="card-img-top" alt="..." style="object-position: 10% 0%;">
                            <div class="card-body">
                                <h5 class="card-title">Waiil Tutunji</h5>
                                <ul class="list-unstyled fs-21">
                                    <li>REALTOR ®</li>
                                    <li>waiil@tutunjirealty.com</li>
                                    <li>416-508-9065</li>
                                </ul>
                                <div class="signature-div"><img src="{{asset('')}}frontend/assets/imgs/logo3_black.svg" alt="" class="img-fluid"></div>
                                <hr>
                                <ul class="list-unstyled list-inline text-center mb-0">
                                    {{--                                    @php($url =  url('agent'))--}}
                                    <li class="list-inline-item">
                                        <a href="https://www.instagram.com/tutunjiwaiil"><img src="{{asset('')}}frontend/assets/imgs/instagram.png" alt="" class="img-fluid"></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://www.linkedin.com/in/waiil-tutunji-61096b236/" target="_blank"><img src="{{asset('')}}frontend/assets/imgs/linkedin.png" alt="" class="img-fluid"></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://www.facebook.com/wail.tutunji" target="_blank"><img src="{{asset('')}}frontend/assets/imgs/Group 265.png" alt="" class="img-fluid"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        {{--                    <a href="{{url('/agent')}}" style="color: #262222;text-decoration: none;">--}}
                        <div class="card" style="width: 100%;">
                            <img src="{{asset('frontend/assets/imgs/mayar85088.jpg')}}" class="card-img-top" alt="..." style="object-position: 10% -18%;">
                            <div class="card-body">
                                <h5 class="card-title">Mayar Tutunji</h5>
                                <ul class="list-unstyled fs-21">
                                    <li>REALTOR ®</li>
                                    <li>mayar@tutunjirealty.com </li>
                                    <li>647-280-7889 </li>
                                </ul>
                                <div class="signature-div"><img src="{{asset('')}}frontend/assets/imgs/logo1_black.svg" alt="" class="img-fluid"></div>
                                <hr>
                                <ul class="list-unstyled list-inline text-center mb-0">
{{--                                    @php($url =  url('agent'))--}}
                                    <li class="list-inline-item">
                                        <a href="https://www.instagram.com/mayar.tutunji/"><img src="{{asset('')}}frontend/assets/imgs/instagram.png" alt="" class="img-fluid"></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://www.linkedin.com/in/mayar-tutunji/" target="_blank"><img src="{{asset('')}}frontend/assets/imgs/linkedin.png" alt="" class="img-fluid"></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://www.facebook.com/mayartutunji/" target="_blank"><img src="{{asset('')}}frontend/assets/imgs/Group 265.png" alt="" class="img-fluid"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

{{--                    <div class="col-lg-4">--}}
{{--                        <div class="card" style="width: 100%;">--}}
{{--                            <img src="{{asset('default/blank-profile.png')}}" class="card-img-top" alt="...">--}}
{{--                            <div class="card-body">--}}
{{--                                <h5 class="card-title">Test Name</h5>--}}
{{--                                <ul class="list-unstyled fs-21">--}}
{{--                                    <li>-</li>--}}
{{--                                    <li>Test Email</li>--}}
{{--                                    <li>Test Phone</li>--}}
{{--                                </ul>--}}
{{--                                <hr>--}}
{{--                                <ul class="list-unstyled list-inline text-center mb-0">--}}
{{--                                    --}}{{--                                    @php($url =  url('agent'))--}}
{{--                                    <li class="list-inline-item">--}}
{{--                                        <a href="https://www.instagram.com/mayar.tutunji/"><img src="{{asset('')}}frontend/assets/imgs/instagram.png" alt="" class="img-fluid"></a>--}}
{{--                                    </li>--}}
{{--                                    <li class="list-inline-item">--}}
{{--                                        <a href="https://www.linkedin.com/in/mayar-tutunji/" target="_blank"><img src="{{asset('')}}frontend/assets/imgs/linkedin.png" alt="" class="img-fluid"></a>--}}
{{--                                    </li>--}}
{{--                                    <li class="list-inline-item">--}}
{{--                                        <a href="https://www.facebook.com/mayartutunji/" target="_blank"><img src="{{asset('')}}frontend/assets/imgs/Group 265.png" alt="" class="img-fluid"></a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                @endif
            </div>
        </div>
        <!-- mob view for agents -->
        <div class="container-fluid dn-1">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <h1 class="fs-40 text-center bb-2" style="border-bottom: 2px dashed #000000;padding-bottom: 10px"><span class="fw-700" style="color: #000000;">Our Team</span></h1>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-lg-8 offset-lg-2">
                    <p class="text-center">Meet The Tutunji Realty Team!</p>
                </div>
            </div>
            <div class="row mt-40">
                <div class="col-lg-12 px-0">
                    <div class="owl-carousel blog-carousel owl-theme hide-nav">
{{--                        @foreach($allAgent as $agentData)--}}
{{--                            <div class="item">--}}
{{--                                <div class="card" style="width: 100%;">--}}
{{--                                    <img src="{{asset('default/blank-profile.png')}}" class="card-img-top img-fluid" alt="...">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <h5 class="card-title">{{$agentData->fullName ? $agentData->fullName : '-'}}</h5>--}}
{{--                                        <ul class="list-unstyled fs-21">--}}
{{--                                            <li>-</li>--}}
{{--                                            <li>{{$agentData->email ? $agentData->email : '-'}}</li>--}}
{{--                                            <li>{{$agentData->phone ? $agentData->phone : '-'}}</li>--}}
{{--                                        </ul>--}}
{{--                                        <hr>--}}
{{--                                        <ul class="list-unstyled list-inline text-center mb-0">--}}
{{--                                            <li class="list-inline-item">--}}
{{--                                                <a href="#"><img src="{{asset('')}}frontend/assets/imgs/Group%20265.png" alt="" class="img-fluid"></a>--}}
{{--                                            </li>--}}
{{--                                            <li class="list-inline-item">--}}
{{--                                                <a href="#"><img src="{{asset('')}}frontend/assets/imgs/linkedin.png" alt="" class="img-fluid"></a>--}}
{{--                                            </li>--}}
{{--                                            <li class="list-inline-item">--}}
{{--                                                <a href="#"><img src="{{asset('')}}frontend/assets/imgs/Group%20268.png" alt="" class="img-fluid"></a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
                        <div class="item">
                            <div class="card" style="width: 100%;">
                                <img src="{{asset('frontend/assets/imgs/WaiilTutunji.jpg')}}" class="card-img-top img-fluid" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Waiil Tutunji</h5>
                                    <ul class="list-unstyled fs-21">
                                        <li>REALTOR ®</li>
                                        <li>waiil@tutunjirealty.com</li>
                                        <li>416-508-9065</li>
                                    </ul>
                                    <hr>
                                    <ul class="list-unstyled list-inline text-center mb-0">
                                        <li class="list-inline-item">
                                            <a href="https://www.instagram.com/tutunjiwaiil"><img src="{{asset('')}}frontend/assets/imgs/instagram.png" alt="" class="img-fluid"></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://www.linkedin.com/in/waiil-tutunji-61096b236/"><img src="{{asset('')}}frontend/assets/imgs/linkedin.png" alt="" class="img-fluid"></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://www.facebook.com/wail.tutunji"><img src="{{asset('')}}frontend/assets/imgs/Group 265.png" alt="" class="img-fluid"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card" style="width: 100%;">
                                <img src="{{asset('frontend/assets/imgs/mayar85088.jpg')}}" class="card-img-top img-fluid" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Mayar Tutunji</h5>
                                    <ul class="list-unstyled fs-21">
                                        <li>REALTOR ®</li>
                                        <li>mayar@tutunjirealty.com</li>
                                        <li>647-280-7889</li>
                                    </ul>
                                    <hr>
                                    <ul class="list-unstyled list-inline text-center mb-0">
                                        <li class="list-inline-item">
                                            <a href="https://www.instagram.com/mayar.tutunji/"><img src="{{asset('')}}frontend/assets/imgs/instagram.png" alt="" class="img-fluid"></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://www.linkedin.com/in/mayar-tutunji/"><img src="{{asset('')}}frontend/assets/imgs/linkedin.png" alt="" class="img-fluid"></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://www.facebook.com/mayartutunji/"><img src="{{asset('')}}frontend/assets/imgs/Group 265.png" alt="" class="img-fluid"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

{{--                        <div class="item">--}}
{{--                            <div class="card" style="width: 100%;">--}}
{{--                                <img src="{{asset('default/blank-profile.png')}}" class="card-img-top img-fluid" alt="...">--}}
{{--                                <div class="card-body">--}}
{{--                                    <h5 class="card-title">Test Name</h5>--}}
{{--                                    <ul class="list-unstyled fs-21">--}}
{{--                                        <li>-</li>--}}
{{--                                        <li>Test Email</li>--}}
{{--                                        <li>Test Phone</li>--}}
{{--                                    </ul>--}}
{{--                                    <hr>--}}
{{--                                    <ul class="list-unstyled list-inline text-center mb-0">--}}
{{--                                        <li class="list-inline-item">--}}
{{--                                            <a href="#"><img src="{{asset('')}}frontend/assets/imgs/instagram.png" alt="" class="img-fluid"></a>--}}
{{--                                        </li>--}}
{{--                                        <li class="list-inline-item">--}}
{{--                                            <a href="#"><img src="{{asset('')}}frontend/assets/imgs/linkedin.png" alt="" class="img-fluid"></a>--}}
{{--                                        </li>--}}
{{--                                        <li class="list-inline-item">--}}
{{--                                            <a href="#"><img src="{{asset('')}}frontend/assets/imgs/Group 265.png" alt="" class="img-fluid"></a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
        <!--   end of mob view for agents-->
    </div>

    <section id="browse_cities">
        <div class="container">
            <div class="row pt-120">
                <div class="col-lg-6 offset-lg-3 px-4 mx-3 px-md-3 mx-md-auto">
                    <h1 class="fs-40 text-center bb-2" style="border-bottom: 2px dashed #000000;padding-bottom: 10px"><span class="fw-700" style="color: #000000;">Browse Popular Areas</span></h1>
                </div>
            </div>
            {{--        <div class="row pt-120">--}}
            {{--            <div class="col-lg-4 offset-lg-4">--}}
            {{--                <h1 class="fs-40 text-center bb-2"><span class="fw-700">Browse Areas</span></h1>--}}
            {{--            </div>--}}
            {{--        </div>--}}
            <div class="row mt-20">
                <div class="col-lg-12 px-4 mx-3 px-md-3 mx-md-auto">
{{--                    <h6 class="fs-16 fw-700 text-center">Popular Areas</h6>--}}
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
                <div class="custom-col-2 text-center" id="browseCities" data-text="Vaughan">
                    <img src="{{asset('')}}frontend/assets/imgs/2e9b674993f88b55d2c18b31947de5a2.png" alt="" class="img-fluid mt-21">
                    <h6 class="fs-20 mt-10">Vaughan</h6>
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

    <div class="container-fluid blog" id="blogs">
        <div class="row pt-120" style="margin-bottom: 50px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 px-4 mx-3 px-md-3 mx-md-auto">
                        <h1 class="fs-40 text-center bb-2" style="border-bottom: 2px dashed #000000;padding-bottom: 10px"><span class="fw-700" style="color: #000000;">Blogs</span></h1>
                    </div>
                </div>
            </div>

{{--            <div class="col-lg-12">--}}
{{--                <h1 class="fs-40 text-center bb-2" style="border-bottom: 2px dashed #000000;padding-bottom: 10px"><span class="fw-700" style="color: #000000;">Blogs</span></h1>--}}
{{--            </div>--}}
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
                                        <span style="color: #164DF3;">Read more></span></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="bg-grey pt-120" style="background-color: #ffffff" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <h1 class="fs-40 text-center bb-2" style="border-bottom: 2px dashed #000000;padding-bottom: 10px"><span class="fw-700" style="color: #000000;">Contact Us</span></h1>
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
                                    <option class="clr-option form-control" value="">Select Service You Are Looking For</option>
                                    <option class="clr-option form-control" value="pre-construction">Upcoming Pre-Construction Projects</option>
                                    <option class="clr-option form-control" value="mortgage">Mortgage</option>
                                    <option class="clr-option form-control" value="selling">Selling</option>
                                    <option class="clr-option form-control" value="buying">Buying</option>
                                    <option class="clr-option form-control" value="leasing">Leasing</option>
                                    <option class="clr-option form-control" value="investing">Investing</option>
                                    <option class="clr-option form-control" value="advice">Advice</option>
                                    <option class="clr-option form-control" value="general inquiry">General Inquiry</option>
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
            <div class="contact-text-holder">
                
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/></svg>
                    885 Plymouth Dr UNIT 2,<br>Mississauga, ON L5V 0B5.
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16"><path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/></svg>
                    Sales Team: ontario@tutunjirealty.com <br>
                    Management Team: management@tutunjirealty.com
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/></svg>
                    (416)-508-9065<br>(647)-280-7889<br>(905)-241-2222
                </div>
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
@section('range-slider')
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
            // alert('min value change');
            $("#filter_min").val($(this).val());
        });

        $("#max_range").on('change', function () {
            // alert('max value change');
            $("#filter_max").val($(this).val());
        });

        $(document).ready(function() {
            $('.show-hide').click(function() {
                $(this).next().toggleClass('toggle');
            });
        });
    </script>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- begin subscribe for newsletter js -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function (){
        $(document).on("click","#subscribe_now", function(e){
            // alert('hello');
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
    });
</script>
<!-- end subscribe for newsletter js -->
<!-- begin browse city script -->
<script>
    $(document).ready(function (){
        {{--$(document).on('click', '.SwalBtn1', function() {--}}
        {{--    // var selectCity = $(this).attr('data-text');--}}
        {{--    //Some code 1--}}
        {{--    console.log('Button 1');--}}
        {{--    // console.log($(this).val());--}}
        {{--    // var btn1_val = $('.SwalBtn1').val();--}}
        {{--    // console.log(btn1);--}}
        {{--    --}}{{--window.location.href='{{ url('search-city') }}'+'?city='+selectCity+'&property_type='+btn1_val;--}}
        {{--    swal.clickConfirm();--}}
        {{--});--}}
        // $(document).on('click', '.SwalBtn2', function() {
        //     //Some code 2
        //     console.log('Button 2');
        //     console.log($(this).val());
        //     swal.clickConfirm();
        // });

        $(document).on('click', '#browseCities', function () {
            var selectCity = $(this).attr('data-text');
            console.log(selectCity);
            Swal.fire({
                title: 'Would you like to see Pre-Construction or  For Sale/Lease  properties in' +" "+ selectCity + '?',
                html:
                    '<button type="button" role="button" tabindex="0" class="SwalBtn1 customSwalBtn" name="pre-construct" value="pre-construct" style="color: #fff;font-size: 1em;display: inline-block;background-color: rgb(30, 214, 95);border: 0;border-radius: 0.25em;margin: 0.3125em;padding: 0.625em 1.1em;transition: box-shadow .1s;box-shadow: 0 0 0 3px rgba(0,0,0,0);font-weight: 500;">' + ' Pre-Construction ' + '</button>' +
                    '<button type="button" role="button" tabindex="0" class="SwalBtn2 customSwalBtn" name="sale" value="sale" style="color: #fff;font-size: 1em;display: inline-block;background-color: rgb(30, 214, 95);border: 0;border-radius: 0.25em;margin: 0.3125em;padding: 0.625em 1.1em;transition: box-shadow .1s;box-shadow: 0 0 0 3px rgba(0,0,0,0);font-weight: 500;">' + ' For Sale/Lease ' + '</button>',
                showCancelButton: false,
                showConfirmButton: false
            });
                //for pre-consruct
                $(document).on('click','.SwalBtn1', function (){
                console.log('Button 1');
                    var btn1_val = $('.SwalBtn1').val();
                // console.log(btn1_val);
                    swal.clickConfirm();
                window.location.href='{{ url('search-city') }}'+'?city='+selectCity+'&property_type='+btn1_val;
                });
                //for sale
                $(document).on('click', '.SwalBtn2', function() {
                //Some code 2
                console.log('Button 2');
                    var btn2_val = $('.SwalBtn2').val();
                // console.log($(this).val());
                swal.clickConfirm();
                    window.location.href='{{ url('search-city') }}'+'?city='+selectCity+'&property_type='+btn2_val;
            });
        });
    });
</script>
<!-- end browse city script -->

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
<!-- end contact form js -->

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
            // minWidth: 300
            maxWidth: 250
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
                sort_by                : $('#sort_by').val(),
            },
            success : function (res) {
                console.log(res);
                $("#overlay").hide();
                let _emf = $('#error_message_filter');
                _emf.empty();
                if(res.length === 0) {
                    _emf.text("No Properties Found With These Filters");
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

                                let category = '-';
                                let bedrooms = 0; let bathrooms = 0;
                                let from_bedrooms = 0; let to_bedrooms = 0;
                                let from_bathrooms = 0; let to_bathrooms = 0;
                                let before_price = ''; let after_price = '';

                                if(res[i].cat_details != null)
                                {
                                    category = res[i].cat_details.name;
                                }

                                if(res[i].before_price_label != null && res[i].after_price_label != null){
                                    before_price = res[i].before_price_label;
                                }
                                if(res[i].after_price_label != null && res[i].before_price_label != null){
                                    after_price = res[i].after_price_label;
                                }
                                if(res[i].from_bedrooms != null){ from_bedrooms = res[i].from_bedrooms}
                                if(res[i].to_bedrooms != null){ to_bedrooms = res[i].to_bedrooms}
                                if(res[i].from_bathrooms != null){ from_bathrooms = res[i].from_bathrooms}
                                if(res[i].to_bathrooms != null){ to_bathrooms = res[i].to_bathrooms}
                                // if(res[i].bedrooms) { bedrooms = res[i].bedrooms }
                                // if(res[i].bathrooms) { bathrooms = res[i].bathrooms }

                                if(res[i].property_type === 'sale' && res[i].source === 'Frontend'){
                                    url     = "{{asset('frontend/assets/property-images/media-file')}}" + "/" +res[i].property_media.media_name;
                                    url2    = "{{url('sale-property/')}}"+"/"+res[i].id; /*/sale-search*/
                                    p_badge = res[i].listed_in;
                                    bedrooms = res[i].bedrooms;
                                    bathrooms = res[i].bathrooms;
                                    //file    = "<img class='marker_img' src='"+url+"'>";

                                } else if(res[i].property_type === 'sale' && res[i].source === 'Admin') {
                                    url     = "{{asset('admin-panel/assets/property-images/media-file/sale')}}" + "/" +res[i].property_media.media_name;
                                    url2    = "{{url('sale-property/')}}"+"/"+res[i].id; /*/sale-search*/
                                    p_badge = res[i].listed_in;
                                    bedrooms = res[i].bedrooms;
                                    bathrooms = res[i].bathrooms;
                                    //file    = "<img class='marker_img' src='"+url+"'>";

                                } else if(res[i].property_type === 'pre-construct') {
                                    url     = "{{asset('admin-panel/assets/property-images/media-file/pre-construct')}}" + "/" +res[i].property_media.media_name;
                                    url2    = "{{url('pre-construct-property')}}"+"/"+res[i].id; /*/pre-construct-search'*/
                                    p_badge = 'Pre-Construction';
                                    bedrooms = from_bedrooms +"-"+ to_bedrooms;
                                    bathrooms = from_bathrooms +"-"+ to_bathrooms;
                                    //file    = "<img class='marker_img' src='"+url+"' >";

                                } else {
                                    url = "{{asset('default/404-not-found.jpg')}}" + "/" +res[i].property_media.media_name;
                                    //file = "<img class='marker_img' src='"+url+"'>";
                                }

                                info_window.setContent('<a href="'+url2+'" class="text-black" style="text-decoration: none;">' +
                                    '<div class="box1 p-1">\n' +
                                    '    <div class="row mt-10" style="margin-right: 0;">\n' +
                                    '        <div class="col-lg-12 col-md-12 col-sm-12">' +
                                    '<span class="property_badge" style="font-family: Crique Grotesk Display">'+p_badge+'</span>' +
                                    '<img class="img-responsive" style="width: 100%; height: 150px" src="'+url+'" alt="property image"></div>\n' +
                                    '        <div class="col-lg-12 col-md-12 col-sm-12 mt-20">\n' +
                                    '            <h6 class="fs-20 fw-700 text-black" style="font-family: Crique Grotesk Display">'+before_price+' $'+res[i].price+' '+after_price+'</h6>\n' +
                                    '            <div class="fs-12 fw-700 text-black">\n' +
                                    '                <div class="fw-700 text-black" style="font-family: Crique Grotesk Display;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">'+res[i].address+'</div>\n' +
                                    '                <div class="fw-700 text-black" style="font-family: Crique Grotesk Display">'+res[i].city+' , '+res[i].country_state+' '+res[i].zip+'</div>\n' +
                                    '                    <div class="row">\n' +
                                    '                        <div class="col-lg-6 col-md-6 col-sm-12 mt-2" style="font-family: Crique Grotesk Display">' +
                                    '                            '+bedrooms+' &nbsp;<i class="fa fa-bed"></i> Bedrooms' +
                                    '                        </div>\n' +
                                    '                        <div class="col-lg-6 col-md-6 col-sm-12 mt-2" style="font-family: Crique Grotesk Display">' +
                                    '                            '+bathrooms+' &nbsp;<i class="fa fa-bath"></i> Bathrooms\n' +
                                    '                        </div>\n' +
                                    '                        <div class="col-lg-12 col-md-12 col-sm-12 mt-2" style="font-family: Crique Grotesk Display">\n' +
                                    '                           <h6 class="fs-12 text-grey"><i class="fa fa-tag"></i> &nbsp;'+category+'</h6>\n' +
                                    '                        </div>\n' +
                                    '                    </div>\n' +
                                    '                </div>\n' +
                                    '            </div>\n' +
                                    '        </div>\n' +
                                    '    </div>\n' +
                                    '</div></a>');

                                info_window.open(map, marker);
                            }
                        })(marker, i));
                        clusterOptions.addMarker(marker);
                    }
                }
            },
        });

        //property preview slider on map
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
                        property_id : p_id,
                        sort_by: $('#sort_by').val()
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
                                if(res[i].property_media == null){
                                    url = "{{asset('default/404-not-found.jpg')}}";
                                }else{
                                    url     = "{{asset('admin-panel/assets/property-images/media-file/pre-construct')}}" + "/" +res[i].property_media.media_name;
                                    url2    = "{{url('pre-construct-property')}}"+"/"+res[i].id; /*/pre-construct-search'*/
                                    p_badge = 'Pre-Construction'

                                    // bedrooms = from_bedrooms +"-"+ to_bedrooms;
                                    // bathrooms = from_bathrooms +"-"+ to_bathrooms;
                                }

                            } else {
                                url = "{{asset('default/404-not-found.jpg')}}" + "/" +res[i].property_media.media_name;
                            }
                            let bedrooms = 0;
                            let bathrooms = 0;
                            let from_bedrooms = 0; let to_bedrooms = 0;
                            let from_bathrooms = 0; let to_bathrooms = 0;

                            let category    = '-';

                            let after_price = '';
                            let before_price = '';

                            if(res[i].before_price_label != null && res[i].after_price_label != null){
                                before_price = res[i].before_price_label;
                            }
                            if(res[i].after_price_label != null && res[i].before_price_label != null){
                                after_price = res[i].after_price_label;
                            }

                            if(res[i].cat_details != null)
                            {
                                category = res[i].cat_details.name;
                            }
                            if(res[i].from_bedrooms != null){ from_bedrooms = res[i].from_bedrooms}
                            if(res[i].to_bedrooms != null){ to_bedrooms = res[i].to_bedrooms}
                            if(res[i].from_bathrooms != null){ from_bathrooms = res[i].from_bathrooms}
                            if(res[i].to_bathrooms != null){ to_bathrooms = res[i].to_bathrooms}

                            if(res[i].bedrooms && res[i].property_type == 'sale')
                            {
                                bedrooms = res[i].bedrooms
                            }else{
                                bedrooms = from_bedrooms +"-"+ to_bedrooms;
                            }
                            if(res[i].bathrooms && res[i].property_type == 'sale') { bathrooms = res[i].bathrooms }else{ bathrooms = from_bathrooms +"-"+ to_bathrooms}

                            content += '<a href="'+url2+'" class="text-black" style="text-decoration: none;">' +
                                '<div class="box1 p-1">\n' +
                                '    <div class="row mt-10" style="margin-right: 0;">\n' +
                                '        <div class="col-lg-12 col-md-12 col-sm-12">' +
                                '<span class="property_badge">'+p_badge+'</span>' +
                                '<img class="" style="width: 100%; height: auto" src="'+url+'" alt=""></div>\n' +
                                '        <div class="col-lg-12 col-md-12 col-sm-12 mt-20">\n' +
                                '            <h6 class="fs-20 fw-700 text-black">'+before_price+' $'+res[i].price+' '+after_price+'</h6>\n' +
                                '            <div class="list-unstyled fs-12 fw-700 text-black">\n' +
                                '                <div class="fw-700 text-black" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">'+res[i].address+'</div>\n' +
                                '                <div class="fw-700 text-black">'+res[i].city+' , '+res[i].country_state+' '+res[i].zip+'</div>\n' +
                                '                    <div class="row">\n' +
                                '                        <div class="col-lg-6 col-md-6 col-sm-12 mt-2">\n' +
                                '                            '+bedrooms+' &nbsp;<i class="fa fa-bed"></i><br> Bedrooms\n' +
                                '                        </div>\n' +
                                '                        <div class="col-lg-6 col-md-6 col-sm-12 mt-2">\n' +
                                '                            '+bathrooms+' &nbsp;<i class="fa fa-bath"></i><br> Bathrooms\n' +
                                '                        </div>\n' +
                                '                        <div class="col-lg-12 col-md-12 col-sm-12 mt-2">\n' +
                                '                           <h6 class="fs-12 text-grey"><i class="fa fa-tag"></i> &nbsp;'+category+'</h6>\n' +
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
        // if we have anchor on the url (calling from other page)
        if(window.location.hash){
            $("html, body").animate({
                // scrollTop: $(window.location.hash).offset().top + 'px'
                scrollTop: $(window.location.hash).offset().top
            },'swing');
        }
    });
</script>



