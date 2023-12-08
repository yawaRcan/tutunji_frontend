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
                        <li class="breadcrumb-item"><a href="index.html" class="text-darkgrey fw-700">Home</a></li>
                        <li class="breadcrumb-item active fw-700" aria-current="page"> New Pre-Construction</li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-6 col-6 mt-40">
                <h6 class="fs-16">Showing 1 - 20 of 561</h6>
                <span class="text-grey">Properties in Toronto, Canada</span>

            </div>
            <div class="col-lg-3 col-6 mt-40">
                <ul class="list-unstyled list-inline text-right">
                    <li class="list-inline-item text-grey fs-16 fw-400">
                        Sort by
                    </li>
                    <li class="list-inline-item"> <select id="inputState" class="form-control br-4" style="border-radius: 30px;">
                            <option selected>Relevence</option>
                            <option>...</option>
                        </select></li>
                </ul>

            </div>
        </div>
        <div class="row mt-20">
            <div class="col-lg-3 pr-0 pr-15">
                <div class="property-box" style="background-color: #F2F2F2;">
                    <h6 class="fs-16">Filters</h6>
                    <form>
                        <div class="form-group mt-10">
                            <label for="exampleFormControlSelect1" class="fs-12">Property Status</label>
                            <select class="form-control br-30 fs-12" id="exampleFormControlSelect1">
                                <option>Any</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="fs-12">Property Type</label>
                            <select class="form-control br-30 fs-12" id="exampleFormControlSelect1">
                                <option>Any</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="fs-12">Postal Code, City or Street Name</label>
                            <input type="text" class="form-control br-30 fs-12" placeholder="Toronto">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="fs-12">Property Status</label>
                            <div slider id="slider-distance">
                                <div>
                                    <div inverse-left style="width:70%;"></div>
                                    <div inverse-right style="width:70%;"></div>
                                    <div range style="left:30%;right:40%;"></div>
                                    <span thumb style="left:30%;"></span>
                                    <span thumb style="left:60%;"></span>
                                    <div sign style="left:30%;">
                                        <span id="value">100k</span>
                                    </div>
                                    <div sign style="left:60%;">
                                        <span id="value">200k</span>
                                    </div>
                                </div>
                                <input type="range" tabindex="0" value="30" max="100" min="0" step="1" oninput="
  this.value=Math.min(this.value,this.parentNode.childNodes[5].value-1);
  var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
  var children = this.parentNode.childNodes[1].childNodes;
  children[1].style.width=value+'%';
  children[5].style.left=value+'%';
  children[7].style.left=value+'%';children[11].style.left=value+'%';
  children[11].childNodes[1].innerHTML=this.value;" />

                                <input type="range" tabindex="0" value="60" max="100" min="0" step="1" oninput="
  this.value=Math.max(this.value,this.parentNode.childNodes[3].value-(-1));
  var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
  var children = this.parentNode.childNodes[1].childNodes;
  children[3].style.width=(100-value)+'%';
  children[5].style.right=(100-value)+'%';
  children[9].style.left=value+'%';children[13].style.left=value+'%';
  children[13].childNodes[1].innerHTML=this.value;" />
                            </div>
                        </div>
                    </form>
                    <div class="row mt-40">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" class="form-control br-30 fs-12" placeholder="Mini">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" class="form-control br-30 fs-12" placeholder="Max">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-20">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1" class="fs-12">Bed</label>
                                <select class="form-control br-30 fs-12" id="exampleFormControlSelect1">
                                    <option>Any</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1" class="fs-12">Baths</label>
                                <select class="form-control br-30 fs-12" id="exampleFormControlSelect1">
                                    <option>Any</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1" class="fs-12">Area</label>
                                <select class="form-control br-30 fs-12" id="exampleFormControlSelect1">
                                    <option>Any</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1" class="fs-12">Property Status</label>
                                <select class="form-control br-30 fs-12" id="exampleFormControlSelect1">
                                    <option>Any</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 mt-41">
                <div class="row">
                    <div class="col-lg-12">
                        @if(empty($allPreConstructData))
                            Whoops! No Records Found
                        @else
                            @foreach($property as $allData)
                                <div class="appartment-box mb-3">
                                    <div class="row">

                                        <div class="col-lg-5" onclick="location.href='{{url('/pre-construct-property',$allData['id'])}}';" style="cursor:pointer;">

                                            <div class="owl-carousel owl-theme">
                                                @foreach($allData['multiple_media'] as $mediaFile)
                                                    <div class="item">
                                                        <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$mediaFile['media_name'])}}" alt="" class="img-fluid" height="325px" width="319px">
                                                    </div>
                                                @endforeach
                                                {{--                                        <div class="item">--}}
                                                {{--                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">--}}
                                                {{--                                        </div>--}}
                                                {{--                                        <div class="item">--}}
                                                {{--                                            <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">--}}
                                                {{--                                        </div>--}}
                                            </div>

                                        </div>
                                        <div class="col-lg-7">
                                            <div class="p-20">
                                                <h6 class="fs-16 mt-20" onclick="location.href='{{url('/pre-construct-property',$allData['id'])}}';" style="cursor:pointer;">{{$allData['title']}} <span class="fs-12 text-grey">in Toronto, Canada</span></h6>
                                                <span class="fs-12 text-grey" onclick="location.href='{{url('/pre-construct-property',$allData['id'])}}';" style="cursor:pointer;">
                                            by {{$allData['agent_details'] ? $allData['agent_details']['fullName'] : '-'}}
                                        </span>
                                                <div class="blue-bar mt-20" onclick="location.href='{{url('/pre-construct-property',$allData['id'])}}';" style="cursor:pointer;">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-3">
                                                            <h6 class="fs-14 mb-0">${{$allData['price'] ? $allData['price'] : '-'}}</h6>
                                                            <span class="fs-12 text-grey">
                                                        8,002 / sq ft
                                                    </span>
                                                        </div>
                                                        <div class="col-lg-3 col-3">
                                                            <h6 class="fs-14 mb-0">{{$allData['size_in_ft2'] ? $allData['size_in_ft2'] : '-'}}</h6>
                                                            <span class="fs-12 text-grey">
                                                        Area in sq ft
                                                    </span>
                                                        </div>
                                                        <div class="col-lg-3 col-3">
                                                            <h6 class="fs-14 mb-0">{{$allData['property_status'] ? $allData['property_status'] : '-'}}</h6>
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
                                                <div class="row mt-20" onclick="location.href='{{url('/pre-construct-property',$allData['id'])}}';" style="cursor:pointer;">
                                                    <div class="col-lg-8">
                                                        <ul class="list-unstyled list-inline d-flex">
                                                            <li class="list-inline-item"><i class="fas fa-map-marker-alt"></i></li>
                                                            <li class="list-inline-item">{{$allData['address'] ? $allData['address'] : '-'}}</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <ul class="list-unstyled list-inline d-flex justify-content-end">
                                                            <li class="list-inline-item">
                                                                @if($allData['fav_data'] != null && Auth::check())
                                                                    <a href="{{url('/unlike',$allData['id'])}}" class="text-black"><i class="fa fa-heart" style="font-size:15px;color:red"></i></a>
                                                                @else
                                                                    <a href="{{url('/like',$allData['id'])}}" class="text-black"><i class="far fa-heart"></i></a>
                                                                @endif
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a class="icon add" data-id="{{ $allData['id'] }}">
                                                                    <i class="material-icons fas fa-share-alt text-black"></i>
                                                                </a>

                                                                @if($allData['property_type'] == "sale")
                                                                    @php($url =  url('sale-search').'/'.$allData['id'])
                                                                @else
                                                                    @php($url =  url('pre-construct-search').'/'.$allData['id'])
                                                                @endif

                                                                <div class="expgroup" style="display: none" id="share_button_{{ $allData['id'] }}">
                                                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{$url}}" target="_blank" class="text-white btn-icon icon facebook"><i class="fab fa-facebook-f"></i></a>

                                                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{$url}}" target="_blank" class="text-white btn-icon icon linkedin"><i class="fab fa-linkedin-in"></i></a>

                                                                    <a href="https://twitter.com/intent/tweet?text=Check+out+this+property+on+Tutunji+Realty%21&url={{$url}}" target="_blank" class="text-white btn-icon icon twitter"><i class="fab fa-twitter"></i></a>

                                                                    <a href="https://telegram.me/share/url?url={{$url}}&text=Check+out+this+property+on+Tutunji+Realty%21" target="_blank" class="text-white btn-icon icon telegram"><i class="fab fa-telegram-plane"></i></a>
                                                                    <a href="https://wa.me/?text={{$url}}" target="_blank" class="text-white btn-icon icon whatsapp" title=""><i class="fab fa-whatsapp"></i></a>
                                                                </div>
                                                                {{--                                                        <a href="#" class="text-black" id="btn-share"> <i class="fas fa-share-alt"></i></a>--}}
                                                                {{--                                                        <div id="toggle">--}}
                                                                {{--                                                            <i class="fab fa-facebook-f"></i>--}}
                                                                {{--                                                            <i class="fab fa-instagram"></i>--}}
                                                                {{--                                                            <i class="fab fa-twitter"></i>--}}
                                                                {{--                                                            <i class="fab fa-whatsapp"></i>--}}
                                                                {{--                                                        </div>--}}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row" onclick="location.href='{{url('/pre-construct-property',$allData['id'])}}';" style="cursor:pointer;">
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
                        @endif
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
                    <p class="fs-16 fw-700 text-center">Morbi accumsan ipsum velit nam nec tellus a odiose tincidunt auctor a ornare odio sed non mauris vitae erat consequat auctor</p>
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

    @include('frontend.include.news-letter-1')
    <!-- model -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                {{--                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>--}}
                <div class="contact-agent-box">
                    <button type="button" class="close close-popup" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="agent-topbox">
                        {{--                                                <button type="button" data-dismiss="modal" aria-label="Close">&times;</button>--}}
                        <h6 class="fs-16">Contact Listing Agent</h6>
                        <p class="fs-12">Morbi accumsan ipsum velit nam nec tellus a odiose tincidunt auctor aerat consequat auctor</p>
                    </div>
                    <div class="modal-body">
                        {{--                                                <p>Some text in the modal.</p>--}}
                        <form id="form2">
                            <!-- sign-up-empty-field-error-message -->
                            <div id="signUpErrorMessage" style="color:red;"></div>
                            <!-- sign-up-success-message -->
                            <div id="signUpSuccessMessage" class="text-success"></div>
                            <div class="form-group mt-10">
                                <label for="exampleFormControlSelect1" class="fs-12">Full Name:<span style="color: red">*</span></label>
                                <input class="form-control br-30 fs-12" id="agent_fullName" name="agent_fullName" value="{{old('agent_fullName')}}">
                                <!-- validation error message -->
                                @error('agent_fullName')
                                <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group mt-10">
                                <label for="exampleFormControlSelect1" class="fs-12">Phone Number:<span style="color: red">*</span></label>
                                <input class="form-control br-30 fs-12" id="agent_phone" name="agent_phone" value="{{old('agent_phone')}}">
                                <!-- validation error message -->
                                @error('agent_phone')
                                <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group mt-10">
                                <label for="exampleFormControlSelect1" class="fs-12">Email Address:<span style="color: red">*</span></label>
                                <input class="form-control br-30 fs-12" id="agent_email" name="agent_email" value="{{old('agent_email')}}">
                                <!-- validation error message -->
                                @error('agent_email')
                                <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                            <p class="fs-12">Are you a brokerage or real estate agent<span style="color: red">*</span></p>
                            <div class="row mt-10">
                                <div class="col-lg-6">
                                    <div class="sub-box">
                                        <ul class="box-sell p-0 mb-0 list-unstyled">
                                            <li>
                                                <input type="radio" id="brokerage_check" name="selector" value="brokerage" {{ old('selector') == 'brokerage' ? 'checked' : ''}}>
                                                <label for="brokerage_check" class="mb-0 pb-3 fs-12">Brokerage</label>
                                                <div class="check"></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="sub-box">
                                        <ul class="box-sell p-0 mb-0 list-unstyled">
                                            <li>
                                                <input type="radio" id="agent_check" name="selector" value="agent" {{ old('selector') == 'agent' ? 'checked' : ''}}>
                                                <label for="agent_check" class="mb-0 pb-3 fs-12">Agent</label>
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
{{--                            <input type="hidden" name="agent_id" value="{{$allData['id']}}">--}}

                            <div class="agent-footer">
                                <div class="row">
                                    <div class="col-lg-12"><button type="button" class="btn btn-info" id="agent_btn" style="font-size: 14px; padding: 10px 20px !important;">Register Now</button></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
@endsection
