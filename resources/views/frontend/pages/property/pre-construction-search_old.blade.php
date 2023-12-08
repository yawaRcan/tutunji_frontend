@extends('frontend.layout.master')
@section('title')
    <title> Pre-construct Search</title>
    <!-- begin social-media share icon style -->
    <style>
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
        /*.btn-my-style{*/
        /*    color: #fff;*/
        /*    border-color: #1ED65F !important;*/
        /*    background-color: #1ED65F !important;*/
        /*    box-shadow: none !important;*/
        /*    outline: none !important;*/
        /*    position: absolute;*/
        /*    right: 0px;*/
        /*    padding: 10px 20px;*/
        /*    border-radius: 40px;*/
        /*    z-index: 1000;*/
        /*}*/
        #swal2-title{
            font-size: 15px;
        }
        /* navbar blur when model is popup */
        .navbar{
            position: initial;
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
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pl-0">
                        <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-darkgrey fw-700">Home</a></li>
                        <li class="breadcrumb-item active fw-700" aria-current="page"> <a href="{{url('/')}}" style="color:#262222;text-decoration: none;">Go Back To Search Results</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-6 col-6 mt-40">
{{--                <h6 class="fs-16">Showing 1 - 20 of 561</h6>--}}
                <span class="text-grey">Properties in
                    @if(isset($params['filter_postal_code']))
                        {{($params['filter_postal_code']) ? $params['filter_postal_code'] : ''}}
                    @elseif(isset($browseCity))
                        {{isset($browseCity) ? $browseCity : ''}}
                    @else
                        Canada
                    @endif
                </span>

            </div>
            <div class="col-lg-3 col-6 mt-40">
                <ul class="list-unstyled list-inline text-right">
                    <li class="list-inline-item text-grey fs-16 fw-400">
                        Sort by
                    </li>
                    <li class="list-inline-item">
                        <form action="">
                            <select name="" id="inputState" class="form-control br-4" style="border-radius: 30px;">
                                <option selected>Relevence</option>
{{--                                <option value="">Select Option</option>--}}
{{--                                <option value="a-z">A-Z(Ascending Order)</option>--}}
{{--                                <option value="z-a">Z-A(Descending Order)</option>--}}
                            </select>
                        </form>
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

                    <form class="information" id="filter_box_form" method="get" action="{{url('/property-search-filter')}}">
                        @csrf
                        <h6 class="fs-16">Filters</h6>
                        <div class="form-group mt-10">
                            <label for="exampleFormControlSelect1" class="fs-12">Property Type</label>
                            <select class="form-control br-30 fs-12 property_filter_data" id="filter_property_type" name="filter_property_type">
                                <option>Select Category</option>
                                @foreach($allCategory as $categories)
                                    <option value="{{$categories->id}}" {{ (isset($params['filter_property_type']) && $params['filter_property_type'] == $categories->id) ? 'selected' : '' }}>{{$categories->name}}</option>
                                @endforeach
{{--                                <option value="residential" {{ (isset($params['filter_property_type']) && $params['filter_property_type'] == 'residential') ? 'selected' : '' }}>Residential</option>--}}
{{--                                <option value="commercial" {{ (isset($params['filter_property_type']) && $params['filter_property_type'] == 'commercial') ? 'selected' : '' }}>Commercial</option>--}}
{{--                                <option value="industrial" {{ (isset($params['filter_property_type']) && $params['filter_property_type'] == 'industrial') ? 'selected' : '' }}>Industrial</option>--}}
{{--                                <option value="none" {{ (isset($params['filter_property_type']) && $params['filter_property_type'] == 'none') ? 'selected' : '' }} >None</option>--}}
{{--                                <option value="apartments" {{ (isset($params['filter_property_type']) && $params['filter_property_type'] == 'apartments') ? 'selected' : '' }}>Apartments</option>--}}
{{--                                <option value="condos" {{ (isset($params['filter_property_type']) && $params['filter_property_type'] == 'condos') ? 'selected' : '' }}>Condos</option>--}}
{{--                                <option value="duplexes" {{ (isset($params['filter_property_type']) && $params['filter_property_type'] == 'duplexes') ? 'selected' : '' }}>Duplexes</option>--}}
{{--                                <option value="houses" {{ (isset($params['filter_property_type']) && $params['filter_property_type'] == 'houses') ? 'selected' : '' }}>Houses</option>--}}
{{--                                <option value="industrial" {{ (isset($params['filter_property_type']) && $params['filter_property_type'] == 'industrial') ? 'selected' : '' }}>Industrial</option>--}}
{{--                                <option value="land" {{ (isset($params['filter_property_type']) && $params['filter_property_type'] == 'land') ? 'selected' : '' }}>Land</option>--}}
{{--                                <option value="offices" {{ (isset($params['filter_property_type']) && $params['filter_property_type'] == 'offices') ? 'selected' : '' }}>Offices</option>--}}
{{--                                <option value="retail" {{ (isset($params['filter_property_type']) && $params['filter_property_type'] == 'retail') ? 'selected' : '' }}>Retail</option>--}}
{{--                                <option value="villas" {{ (isset($params['filter_property_type']) && $params['filter_property_type'] == 'villas') ? 'selected' : '' }}>Villas</option>--}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="fs-12">Transaction Type</label>
                            <select class="form-control br-30 fs-12 property_filter_data" id="filter_transaction_type" name="filter_transaction_type">
{{--                                <option value="none" >none</option>--}}
                                <option value="pre-construct" {{ (isset($params['filter_transaction_type']) && $params['filter_transaction_type'] == 'pre-construct') ? 'selected' : '' }}>Pre-Construction</option>
                                <option value="sale" {{ (isset($params['filter_transaction_type']) && $params['filter_transaction_type'] == 'sale') ? 'selected' : '' }}>For Sale/Lease</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="fs-12">Postal Code, City or Street Name</label>
                            @if(empty($browseCity))
                                <input type="text" class="form-control br-30 fs-12 property_filter_input_data" placeholder="none" name="filter_postal_code" id="filter_postal_code" value="{{(isset($params['filter_postal_code'])) ? $params['filter_postal_code'] : ''}}">
                            @else
                                <input type="text" class="form-control br-30 fs-12 property_filter_input_data" placeholder="none" value="{{$browseCity}}" name="filter_postal_code" id="filter_postal_code">
                            @endif
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label for="exampleFormControlSelect1" class="fs-12">Min</label>--}}
{{--                            <input type="text" class="form-control br-30 fs-12 property_filter_input_data" placeholder="Min" id="min" value="{{(isset($params['filter_min'])) ? $params['filter_min'] : '0'}}">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="exampleFormControlSelect1" class="fs-12">Max</label>--}}
{{--                            <input type="text" class="form-control br-30 fs-12 property_filter_input_data" placeholder="Max" id="max" value="{{(isset($params['filter_max'])) ? $params['filter_max'] : '20000000'}}">--}}
{{--                        </div>--}}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" class="fs-12">Min</label>
                                    <input type="text" class="form-control br-30 fs-12 property_filter_input_data" placeholder="Min" id="filter_min" name="filter_min" value="{{(isset($params['filter_min'])) ? $params['filter_min'] : '0'}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" class="fs-12">Max</label>
                                    <input type="text" class="form-control br-30 fs-12 property_filter_input_data" placeholder="Max" id="filter_max" name="filter_max" value="{{(isset($params['filter_max'])) ? $params['filter_max'] : '20000000'}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="fs-12">Price</label>
{{--                            <div slider id="slider-distance">--}}
{{--                                <div>--}}
{{--                                    <div inverse-left style="width:70%;"></div>--}}
{{--                                    <div inverse-right style="width:70%;"></div>--}}
{{--                                    <div range style="left:30%;right:40%;"></div>--}}
{{--                                    <span thumb style="left:30%;"></span>--}}
{{--                                    <span thumb style="left:60%;"></span>--}}
{{--                                    <div sign style="left:30%;">--}}
{{--                                        <span id="value">0</span>--}}
{{--                                    </div>--}}
{{--                                    <div sign style="left:60%;">--}}
{{--                                        <span id="value">20,000,000</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <input type="range" tabindex="0" value="0" id="min_range" min="0" max="20000000" step="500" oninput="--}}
{{--  this.value=Math.min(this.value,this.parentNode.childNodes[5].value-1);--}}
{{--  var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);--}}
{{--  var children = this.parentNode.childNodes[1].childNodes;--}}
{{--  children[1].style.width=value+'%';--}}
{{--  children[5].style.left=value+'%';--}}
{{--  children[7].style.left=value+'%';children[11].style.left=value+'%';--}}
{{--  children[11].childNodes[1].innerHTML=this.value;" />--}}

{{--                                <input type="range" tabindex="0" value="20000000" max="20000000" id="max_range" min="0" step="500" oninput="--}}
{{--  this.value=Math.max(this.value,this.parentNode.childNodes[3].value-(-1));--}}
{{--  var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);--}}
{{--  var children = this.parentNode.childNodes[1].childNodes;--}}
{{--  children[3].style.width=(100-value)+'%';--}}
{{--  children[5].style.right=(100-value)+'%';--}}
{{--  children[9].style.left=value+'%';children[13].style.left=value+'%';--}}
{{--  children[13].childNodes[1].innerHTML=this.value;" />--}}
{{--                            </div>--}}
                            <div class="range-slider" id="rangeSlider">
                                <input value="0" min="0" max="20000000" step="500" type="range" id="min_range" name="min_range" class="property_filter_data">
                                <input value="20000000" min="0" max="20000000" step="500" type="range" id="max_range" name="max_range" class="property_filter_data">
                                <span class="rangeValues"></span>
                            </div>
                        </div>
                        <div class="row mt-40">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" class="fs-12">Bedrooms</label>
                                    <select class="form-control br-30 fs-12 property_filter_data" id="filter_bed" name="filter_bed">
                                        <option value="none" {{ (isset($params['filter_bed']) && $params['filter_bed'] == 'none') ? 'selected' : '' }}>none</option>
                                        <option value="1" {{ (isset($params['filter_bed']) && $params['filter_bed'] == '1') ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ (isset($params['filter_bed']) && $params['filter_bed'] == '2') ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ (isset($params['filter_bed']) && $params['filter_bed'] == '3') ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ (isset($params['filter_bed']) && $params['filter_bed'] == '4') ? 'selected' : '' }}>4</option>
                                        <option value="5+" {{ (isset($params['filter_bed']) && $params['filter_bed'] == '5') ? 'selected' : '' }}>5+</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" class="fs-12">Bathrooms</label>
                                    <select class="form-control br-30 fs-12 property_filter_data" id="filter_bath" name="filter_bath">
                                        <option value="none" {{ (isset($params['filter_bath']) && $params['filter_bath'] == 'none') ? 'selected' : '' }}>none</option>
                                        <option value="1 {{ (isset($params['filter_bath']) && $params['filter_bath'] == '1') ? 'selected' : '' }}">1</option>
                                        <option value="2" {{ (isset($params['filter_bath']) && $params['filter_bath'] == '2') ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ (isset($params['filter_bath']) && $params['filter_bath'] == '3') ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ (isset($params['filter_bath']) && $params['filter_bath'] == '4') ? 'selected' : '' }}>4</option>
                                        <option value="5+" {{ (isset($params['filter_bath']) && $params['filter_bath'] == '5+') ? 'selected' : '' }}>5+</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" class="fs-12">Size</label>
                                    <select class="form-control br-30 fs-12 property_filter_data" id="filter_size" name="filter_size">
                                        <option value="none" {{ (isset($params['filter_size']) && $params['filter_size'] == 'none') ? 'selected' : '' }}>none</option>
                                        <option value="0 – 2,000 SqFt" {{ (isset($params['filter_size']) && $params['filter_size'] == '0 – 2,000 SqFt') ? 'selected' : '' }}>0 – 2,000 SqFt</option>
                                        <option value="2,001 – 3,000 SqFt" {{ (isset($params['filter_size']) && $params['filter_size'] == '2,001 – 3,000 SqFt') ? 'selected' : '' }}>2,001 – 3,000 SqFt</option>
                                        <option value="3,001 – 4,000 SqFt" {{ (isset($params['filter_size']) && $params['filter_size'] == '3,001 – 4,000 SqFt') ? 'selected' : '' }}>3,001 – 4,000 SqFt</option>
                                        <option value="4,001 – 5,000 SqFt" {{ (isset($params['filter_size']) && $params['filter_size'] == '4,001 – 5,000 SqFt') ? 'selected' : '' }}>4,001 – 5,000 SqFt</option>
                                        <option value="5,001 – 7,000 SqFt" {{ (isset($params['filter_size']) && $params['filter_size'] == '5,001 – 7,000 SqFt') ? 'selected' : '' }}>5,001 – 7,000 SqFt</option>
                                        <option value="7,001 – 10,000 SqFt" {{ (isset($params['filter_size']) && $params['filter_size'] == '7,001 – 10,000 SqFt') ? 'selected' : '' }}>7,001 – 10,000 SqFt</option>
                                        <option value="10,000+" {{ (isset($params['filter_size']) && $params['filter_size'] == '10,000+') ? 'selected' : '' }}>10,000+</option>
                                    </select>
                                </div>
                            </div>
                        </div>
{{--                        <div>--}}
                            <button type="submit" class="btn btn-primary" style="margin-left: auto;margin-right: auto;">Filter</button>
{{--                        </div>--}}
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
                            @foreach($allSaleData as $allData)
                                <div class="appartment-box mb-3" id="filter_result">
                            <input type="hidden" name="agent_id" value="{{$allData['id']}}">
                            <div class="row">
{{--                                onclick="location.href='{{url('/pre-construct-property',$allData['id'])}}';"--}}
                                <div class="col-lg-5 mobile-listing-image"  @if($allData['property_media'])
                                style="background-image: url('{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$allData['property_media']['media_name'])}}');background-size: cover;background-position:inherit;"
                                     @else
                                     style="background-image: url('{{asset('default/404-not-found.jpg')}}');background-size: cover;background-position: inherit;"
                                    @endif>
{{--                                    <div  @if($allData['property_media'])--}}
{{--                                          style="background-image: url('{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$allData['property_media']['media_name'])}}');background-size: cover;background-position:inherit;"--}}
{{--                                          @else--}}
{{--                                          style="background-image: url('{{asset('default/404-not-found.jpg')}}');background-size: cover;background-position: inherit;"--}}
{{--                                        @endif></div>--}}
{{--                                    <div class="bg-propertise"--}}
{{--                                         @if($queryDetail['property_media'])--}}
{{--                                         style="background-image: url('{{asset($url.$queryDetail['property_media']['media_name'])}}')"--}}
{{--                                         @else--}}
{{--                                         style="background-image: url('{{asset('default/404-not-found.jpg')}}')"--}}
{{--                                        @endif--}}
{{--                                    >--}}
{{--                                    <div class="owl-carousel owl-theme">--}}
{{--                                        @foreach($allData['multiple_media'] as $mediaFile)--}}
{{--                                        <div class="item">--}}
{{--                                            @if(file_exists(public_path('admin-panel/assets/property-images/media-file/pre-construct/'.$mediaFile['media_name'])))--}}
{{--                                                <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$mediaFile['media_name'])}}" alt="" class="img-fluid" height="325px" width="319px">--}}
{{--                                            @else--}}
{{--                                                <img src="{{asset('default/404-not-found.jpg')}}" alt="" class="img-fluid" height="325px" width="319px">--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                        @endforeach--}}
{{--                                    </div>--}}
                                </div>
                                <div class="col-lg-7">
                                    <div class="p-20">
                                        <a href="{{url('/pre-construct-property',$allData['id'])}}" style="text-decoration: none;color: #262222;">
                                            <h4 class="fs-22 fw-700 mt-20">${{$allData['price']}} <br>
{{--                                                <span class="fs-12 text-grey">{{$allData['address']}}</span>--}}
                                            </h4>
                                        </a>
                                        <span class="fs-12 text-grey">
                                            by {{$allData['agent_details'] ? $allData['agent_details']['fullName'] : '-'}}
                                        </span>
                                        <div class="blue-bar mt-20">
                                            <div class="row">
                                                <div class="col-lg-3 col-3">
                                                    <h6 class="fs-14 mb-0">{{$allData['price'] ? $allData['price'] : '-'}}</h6>
                                                    <span class="fs-12 text-grey">
                                                       8,002 / sq ft
                                                    </span>
                                                </div>
                                                <div class="col-lg-3 col-3">
                                                    <h6 class="fs-14 mb-0">&nbsp;{{$allData['size_in_ft2'] ? $allData['size_in_ft2'] : '-'}}</h6>
                                                    <span class="fs-12 text-grey">
                                                       Size in sq ft
                                                    </span>
                                                </div>
                                                <div class="col-lg-3 col-3">
                                                    @if($allData['internal_status'] == '1' && $allData['property_type'] == 'pre-construct')
                                                        <h6 class="fs-14 mb-0">
                                                            Active
                                                        </h6>
                                                    @elseif($allData['internal_status'] == '0' && $allData['property_type'] == 'pre-construct')
                                                        <h6 class="fs-14 mb-0">
                                                            Deleted
                                                        </h6>
                                                    @else
                                                        <h6 class="fs-14 mb-0">
                                                            Deleted
                                                        </h6>
                                                    @endif
                                                    <span class="fs-12 text-grey">
                                                        Property Status
                                                    </span>
                                                </div>
                                                <div class="col-lg-3 col-3">
                                                    <h6 class="fs-14 mb-0">{{$allData['property_type'] ? $allData['property_type'] : '-'}}</h6>
                                                    <span class="fs-12 text-grey">
                                                        Property Type
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-20">
                                            <div class="col-lg-8">
                                                <ul class="list-unstyled list-inline d-flex">
                                                    <li class="list-inline-item"><i class="fa fa-map-marker-alt" style="color: #262222"></i></li>
                                                    <li class="list-inline-item">{{$allData['address'] ? $allData['address'] : '-'}}</li>
                                                </ul>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="list-unstyled list-inline">
                                                    <li class="list-inline-item"><i class="far fa-calendar-minus"></i></li>
                                                    <li class="list-inline-item">Posted on {{date('Y-m-d', strtotime($allData['created_at']))}}</li>
                                                    <input type="hidden" name="property_id" value="{{$allData['id']}}">
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8">
{{--                                                @if(!Auth::check())--}}
                                                @if(Auth::check())
                                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                @endif
                                                    <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;" data-toggle="modal" data-target="#myModal">Register Now</button>
{{--                                                @endif--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                            @endforeach

{{--                        {{ url('pre-construct-search') }}--}}
                            <div class="row mt-70">
                                <div class="col-lg-12">
{{--                        @php($u_pre = url('property-search-filter'))--}}
{{--                                    @if($pre_constructData[0]['property_type'] == "sale")--}}
{{--                                        @php($url =  url('sale-property').'/'.$pre_constructData[0]['id'])--}}
{{--                                    @else--}}
                                        @php($url =  url('/property-search-filter'))
{{--                                    @endif--}}
                            @if(isset($_GET['query']))
                                    {{$allSaleData->links('frontend.pages.pagination.pre-construct-search-pagination')}}
                                @elseif(isset($_GET['filter_property_type']))
{{--                                <p>filter pagination</p>--}}
                                        {{$allSaleData->links('frontend.pages.pagination.pre-construct-filter-pagination')}}
                            @else
                                {{$allSaleData->links('frontend.pages.pagination.pre-construct-pagination')}}
                            @endif
                        @endif
                                </div></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="bg-grey mt-80" style="background-color: #EEEEEE">
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

    @include('frontend.include.news-letter-1')
    <!-- model -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="contact-agent-box">
                        <button type="button" class="close close-popup" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="agent-topbox">
                            <h6 class="fs-16">Contact Listing Agent</h6>
                            <p class="fs-12">Morbi accumsan ipsum velit nam nec tellus a odiose tincidunt auctor aerat consequat auctor</p>
                        </div>
                        <div class="modal-body">
                            <form id="form2">
                                <!-- sign-up-empty-field-error-message -->
                                <div id="signUpErrorMessage" style="color:red;"></div>
                                <!-- sign-up-success-message -->
                                <div id="signUpSuccessMessage" class="text-success"></div>
                                <div class="form-group mt-10">
                                    <label for="exampleFormControlSelect1" class="fs-12">Full Name:<span style="color: red">*</span></label>
                                    <input class="form-control br-30 fs-12" id="agent_fullName" name="agent_fullName" value="{{old('agent_fullName')}}" placeholder="Type your Full name">
                                    <!-- validation error message -->
                                    @error('agent_fullName')
                                    <p style="color: red;">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group mt-10">
                                    <label for="exampleFormControlSelect1" class="fs-12">Phone Number:<span style="color: red">*</span></label>
                                    <input class="form-control br-30 fs-12" id="agent_phone" name="agent_phone" value="{{old('agent_phone')}}" placeholder="Type your Phone Number">
                                    <!-- validation error message -->
                                    @error('agent_phone')
                                    <p style="color: red;">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group mt-10">
                                    <label for="exampleFormControlSelect1" class="fs-12">Email Address:<span style="color: red">*</span></label>
                                    <input class="form-control br-30 fs-12" id="agent_email" name="agent_email" value="{{old('agent_email')}}" placeholder="Type Your Email">
                                    <!-- validation error message -->
                                    @error('agent_email')
                                    <p style="color: red;">{{$message}}</p>
                                    @enderror
                                </div>
{{--                                <p class="fs-12">Are you a brokerage or real estate agent<span style="color: red">*</span></p>--}}
                                <div class="row mt-10">
                                    <div class="col-lg-6">
                                        <div class="sub-box">
                                            <ul class="box-sell p-0 mb-0 list-unstyled">
                                                <li>
                                                    <input type="radio" id="brokerage_check" name="selector" value="yes" {{ old('selector') == 'yes' ? 'checked' : ''}}>
                                                    <label for="brokerage_check" class="mb-0 pb-3 fs-12">Yes</label>
                                                    <div class="check"></div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="sub-box">
                                            <ul class="box-sell p-0 mb-0 list-unstyled">
                                                <li>
                                                    <input type="radio" id="agent_check" name="selector" value="no" {{ old('selector') == 'no' ? 'checked' : ''}}>
                                                    <label for="agent_check" class="mb-0 pb-3 fs-12">No</label>
                                                    <div class="check"></div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- validation error message -->
                                @error('selector')
                                <p style="color: red;">{{$message}}</p>
                                @enderror


                                <div class="agent-footer">
                                    <div class="row">
                                        <div class="col-lg-12"><button type="button" class="btn btn-info" id="agent_btn" style="font-size: 14px; padding: 10px 20px !important;">Register Now</button></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
{{--                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
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
<!-- inquiry-popup-form script start here -->
<script>
    $(document).ready(function () {
        //Register Function
        $('#agent_btn').click(function () {
            // alert('Register button clicked');
            // $('#myModal').show();
            $("#signUpErrorMessage").empty();
            //get text-field values by id
            var full_name = $('#agent_fullName').val();
            var phone_number = $('#agent_phone').val();
            var email_address = $('#agent_email').val();
            var isChecked = jQuery("input[name=selector]:checked").val();
            // var userId= $("input[name=user_id]").val();
            // alert(isChecked);
            // var selector = $('#selector').val();
            //alert(full_name + " " + phone_number + " " + email_address + " ");
            // let isChecked = document.querySelector('input[name="selector"]:checked');
            // if (isChecked !== null) {
            //     console.log(isChecked.value);
            // }else{
            //     alert('atleast check one radio button');
            // }
            // if($("#signUpTerms").prop('checked') == true){
            //     check = 1;
            // }
            //alert(full_name + " " + phone_number + " " + email_address + " " + isChecked);
            if(full_name != "" && phone_number != "" && email_address != "" && isChecked != ""){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var id= $("input[name=agent_id]").val();
                $.ajax({
                    url: '{{url("/info-inquiry")}}' + '/' + id,
                    type: 'post',
                    //dataType: 'json',
                    data: {agent_fullName: full_name, agent_phone: phone_number, agent_email: email_address,selector : isChecked},
                    success: function(return_res){
                        console.log(return_res);
                        var newRes = JSON.parse(JSON.stringify(return_res));
                        if(newRes.success == "1"){
                            //alert("register successful");
                            //success-message
                            $("#signUpSuccessMessage").empty().append(newRes.message);
                            setTimeout(function() {
                                $('#myModal').modal('hide');    //hide modal after successfully submit data
                                $('#signUpSuccessMessage').hide(); //hide success message after successfully submit data
                                $('#form2').trigger('reset') // reset form after successfully submit data after close modal
                            }, 4000);
                        }else{
                            $("#signUpErrorMessage").append(newRes.message);
                        }
                        //var newRes = JSON.parse(JSON.stringify(return_res));
                    }
                });
            }else{
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
    $("#filter_min").on('change', function () {
        $("#min").val($(this).val());
    });

    $("#filter_max").on('change', function () {
        $("#max").val($(this).val());
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
<!-- Begin search filter-box js -->
{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        $('.property_filter_data').on('change',function () {--}}
{{--            //alert('hello filter');--}}
{{--            //let property_type = $('#filter_property_type').val();--}}
{{--            // let transaction_type = $('#filter_transaction_type').val();--}}
{{--            window.location.href='{{ url('property-search-filter') }}'+'?property_type='+$('#filter_property_type').val()+'&transaction_type='+$('#filter_transaction_type').val()--}}
{{--            +'&bedrooms='+$('#filter_bed').val()+'&bathrooms='+$('#filter_bath').val()+'&size='+$('#filter_size').val()+'&min_price='+$('#filter_min').val()+'&max_price='+$('#filter_max').val();--}}
{{--            //console.log(property_status);--}}
{{--            --}}{{--$.ajax({--}}
{{--            --}}{{--    type    : 'get',--}}
{{--            --}}{{--    url     : '{{url('property-search-filter')}}'+'?property_type='+property_type,--}}
{{--            --}}{{--    success : function (res) {--}}
{{--            --}}{{--        console.log(res)--}}
{{--            --}}{{--        window.location.href='{{ url('property-search-filter') }}'+'?property_type='+property_type;--}}
{{--            --}}{{--    }--}}
{{--            --}}{{--})--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
<!-- End search filter-box js -->
<script>
    /*$('#filter_box_form').on('submit',function(e){
    e.preventDefault();

        let property_type = $('#filter_property_type').val();
        // console.log(property_type);
        let transaction_type = $('#filter_transaction_type').val();
        let postal_city_street_name = $('#filter_postal_code_city_street_name').val();
        let min_price = $('#filter_min').val();
        let max_price = $('#filter_max').val();
        let bed = $('#filter_bed').val();
        let bath = $('#filter_bath').val();
        let size = $('#filter_size').val();

        $.ajax({
            url: "{{url('/property-search-filter')}}",
            type:"POST",
            data:{"_token": "{{ csrf_token() }}",property_type:property_type, transaction_type:transaction_type, postal_city_street_name:postal_city_street_name, min_price:min_price, max_price:max_price,
                bed:bed,bath:bath,size:size
            },
            success:function(res){
                console.log(res);
            },
            error: function(response) {
            $('#name-error').text(response.responseJSON.errors.name);}
        });
    });*/
</script>
{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        $(document).on('change','.property_filter_data',function () {--}}
{{--            //alert('hello filter');--}}
{{--            let property_type = $('#filter_property_type').val();--}}

{{--            $.ajax({--}}
{{--                url : '{{url('/filter-search-result')}}',--}}
{{--                type : 'get',--}}
{{--                data : {property_type : property_type},--}}
{{--                success : function (res) {--}}
{{--                     console.log(res);--}}
{{--                     $('#filter_result').html(res);--}}
{{--                }--}}
{{--            })--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
@endsection
