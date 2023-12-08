@extends('frontend.layout.master')
@section('title')
    <title>Tutunji Realty | Dashboard</title>
    <style>
        input[type="file"] {
            display: none;
        }
    </style>

@endsection
@section('content')
    <div class="container">
        <div class="row mt-40">
            <div class="col-lg-3">
                <div class="dashboard dn">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link mt-0" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">Dashboard</a>
                        <a class="nav-link" href="{{url('/submit-property')}}">Add New Property</a>
                        <a class="nav-link active" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="true">My Profile</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">My Properties</a>
                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Favourities</a>

{{--                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="{{url('/logout')}}" role="tab" aria-controls="v-pills-settings" aria-selected="false">Logout</a>--}}
                        <a class="nav-link" href="{{url('/logout')}}">Logout</a>

                    </div>
                </div>
            </div>
            <!-- mob side bar -->
            <!-- Pushy Menu -->
            <button class="menu-btn dn-1"> <i class="fas fa-chevron-right"></i> </button>
            <div class="site-overlay"></div>
            <nav class="pushy pushy-left" data-focus="#first-link">
                <div class="pushy-content">
                    <div class="dashboard mt-120">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link mt-0" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">Dashboard</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">My Properties</a>
                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Favorities</a>
                            <a class="nav-link active" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="true">My Profile</a>
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="{{url('/logout')}}" role="tab" aria-controls="v-pills-settings" aria-selected="false">Logout</a>

                        </div>
                    </div>
                </div>
            </nav>

            <!-- end of mob side bar-->

            <div class="col-lg-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <!--  dashboard-->
                    <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="fs-30 fw-700">Dashboard</h1>
                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-lg-4">
                                <div class="dashboard-box">
                                    <div class="row">
                                        <div class="col-lg-4 col-4 center">
                                            <h1 class="fs-54 text-darkgreen fw-700">06</h1>
                                        </div>
                                        <div class="col-lg-8 col-8 mt-10">
                                            <h4 class="fs-18">Your Properties</h4>
                                            <h4 class="fs-18 text-grey">Today</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-21">
                                <div class="dashboard-box">
                                    <div class="row">
                                        <div class="col-lg-4 col-4 center">
                                            <h1 class="fs-54 text-blue fw-700">03</h1>
                                        </div>
                                        <div class="col-lg-8 col-8 mt-10">
                                            <h4 class="fs-18">Contacted</h4>
                                            <h4 class="fs-18 text-grey">Today</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-21">
                                <div class="dashboard-box">
                                    <div class="row">
                                        <div class="col-lg-4 col-4 center">
                                            <h1 class="fs-54 text-orange fw-700">04</h1>
                                        </div>
                                        <div class="col-lg-8 col-8 mt-10">
                                            <h4 class="fs-18">Viewed</h4>
                                            <h4 class="fs-18 text-grey">Today</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-lg-12">
                                <div class="bhk-box">
                                    <div class="row">
                                        <div class="col-lg-9 col-8">
                                            <h6 class="fs-12 fw-700">Listing Views</h6>
                                        </div>
                                        <div class="col-lg-3 col-4">
                                            <select id="inputState" class="form-control br-4" style="font-size: 12px;">
                                                <option selected="">Last 6 months</option>
                                                <option>...</option>
                                            </select>
                                        </div>
                                    </div>
                                    <img src="{{asset('')}}frontend/assets/imgs/graph.png" alt="" class="img-fluid mt-20 w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  end of dashboard-->

                    <!-- my properties-->
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="fs-30 fw-700">My Properties</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                @foreach($query as $queryDetail)
                                <div class="appartment-box mt-40">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="owl-carousel owl-theme">
{{--                                                @foreach($query as $queryDetail)--}}
                                                @foreach($queryDetail['property_media'] as $mediaFile)
                                                <div class="item">
                                                    <img src="{{asset('frontend/assets/property-media/'.$mediaFile['media_name'])}}" alt="" class="img-fluid">
                                                </div>
                                                @endforeach
{{--                                                @endforeach--}}
{{--                                                <div class="item">--}}
{{--                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">--}}
{{--                                                </div>--}}
{{--                                                <div class="item">--}}
{{--                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="p-20">
                                                <h6 class="fs-16 mt-20">{{$queryDetail['title']}} <span class="fs-12 text-grey">in Toronto, Canada</span></h6>
                                                <span class="fs-12 text-grey">
                                                    by Agent Name #1
                                                </span>
                                                <div class="blue-bar mt-20">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">${{$queryDetail['price']}}</h6>
                                                            <span class="fs-12 text-grey">
                                                                8,002 / sq ft
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">{{$queryDetail['size_in_ft2']}}</h6>
                                                            <span class="fs-12 text-grey">
                                                                Area in sq ft
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">{{$queryDetail['property_status']}}</h6>
                                                            <span class="fs-12 text-grey">
                                                                Property Status
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-20">
                                                    <div class="col-lg-8">
                                                        <ul class="list-unstyled list-inline d-flex">
                                                            <li class="list-inline-item"><i class="fas fa-map-marker-alt"></i></li>
                                                            <li class="list-inline-item">{{$queryDetail['address']}}</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <ul class="list-unstyled list-inline d-flex justify-content-end">
                                                            <li class="list-inline-item"><i class="far fa-heart"></i></li>
                                                            <li class="list-inline-item"><i class="fas fa-share-alt"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <ul class="list-unstyled list-inline">
                                                            <li class="list-inline-item"><i class="far fa-calendar-minus"></i></li>
                                                            <li class="list-inline-item">Posted on Jul 2021</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <a class="btn btn-primary" style="display: inline-block"><i class="fa fa-edit"></i></a>
                                                        <a class="btn btn-primary" style="display: inline-block"><i class="fa fa-trash-alt"></i></a>
{{--                                                        <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Contact Seller</button>--}}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- end of my properties-->

                    <!-- favorites-->
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="fs-30 fw-700">Favorities</h1>
                            </div>
                        </div>
                        <div class="row mt-40">
                            <div class="col-lg-12">
                                <div class="appartment-box">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="owl-carousel owl-theme">
                                                <div class="item">
                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                                </div>
                                                <div class="item">
                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                                </div>
                                                <div class="item">
                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="p-20">
                                                <h6 class="fs-16 mt-20">3 BHK Apartment <span class="fs-12 text-grey">in Toronto, Canada</span></h6>
                                                <span class="fs-12 text-grey">
                                                    by Agent Name #1
                                                </span>
                                                <div class="blue-bar mt-20">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">$123,000</h6>
                                                            <span class="fs-12 text-grey">
                                                                8,002 / sq ft
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">3589</h6>
                                                            <span class="fs-12 text-grey">
                                                                Area in sq ft
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">Pre-Construction</h6>
                                                            <span class="fs-12 text-grey">
                                                                Property Status
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-20">
                                                    <div class="col-lg-8">
                                                        <ul class="list-unstyled list-inline d-flex">
                                                            <li class="list-inline-item"><i class="fas fa-map-marker-alt"></i></li>
                                                            <li class="list-inline-item">1 Old Mill Dr, Toronto, Ontario M6S 0A1 Canada</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <ul class="list-unstyled list-inline d-flex justify-content-end">
                                                            <li class="list-inline-item"><i class="far fa-heart"></i></li>
                                                            <li class="list-inline-item"><i class="fas fa-share-alt"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <ul class="list-unstyled list-inline">
                                                            <li class="list-inline-item"><i class="far fa-calendar-minus"></i></li>
                                                            <li class="list-inline-item">Posted on Jul 2021</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Contact Seller</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="appartment-box mt-40">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="owl-carousel owl-theme">
                                                <div class="item">
                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                                </div>
                                                <div class="item">
                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                                </div>
                                                <div class="item">
                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="p-20">
                                                <h6 class="fs-16 mt-20">3 BHK Apartment <span class="fs-12 text-grey">in Toronto, Canada</span></h6>
                                                <span class="fs-12 text-grey">
                                                    by Agent Name #1
                                                </span>
                                                <div class="blue-bar mt-20">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">$123,000</h6>
                                                            <span class="fs-12 text-grey">
                                                                8,002 / sq ft
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">3589</h6>
                                                            <span class="fs-12 text-grey">
                                                                Area in sq ft
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">Pre-Construction</h6>
                                                            <span class="fs-12 text-grey">
                                                                Property Status
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-20">
                                                    <div class="col-lg-8">
                                                        <ul class="list-unstyled list-inline d-flex">
                                                            <li class="list-inline-item"><i class="fas fa-map-marker-alt"></i></li>
                                                            <li class="list-inline-item">1 Old Mill Dr, Toronto, Ontario M6S 0A1 Canada</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <ul class="list-unstyled list-inline d-flex justify-content-end">
                                                            <li class="list-inline-item"><i class="far fa-heart"></i></li>
                                                            <li class="list-inline-item"><i class="fas fa-share-alt"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <ul class="list-unstyled list-inline">
                                                            <li class="list-inline-item"><i class="far fa-calendar-minus"></i></li>
                                                            <li class="list-inline-item">Posted on Jul 2021</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Contact Seller</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="appartment-box mt-40">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="owl-carousel owl-theme">
                                                <div class="item">
                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                                </div>
                                                <div class="item">
                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                                </div>
                                                <div class="item">
                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="p-20">
                                                <h6 class="fs-16 mt-20">3 BHK Apartment <span class="fs-12 text-grey">in Toronto, Canada</span></h6>
                                                <span class="fs-12 text-grey">
                                                    by Agent Name #1
                                                </span>
                                                <div class="blue-bar mt-20">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">$123,000</h6>
                                                            <span class="fs-12 text-grey">
                                                                8,002 / sq ft
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">3589</h6>
                                                            <span class="fs-12 text-grey">
                                                                Area in sq ft
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">Pre-Construction</h6>
                                                            <span class="fs-12 text-grey">
                                                                Property Status
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-20">
                                                    <div class="col-lg-8">
                                                        <ul class="list-unstyled list-inline d-flex">
                                                            <li class="list-inline-item"><i class="fas fa-map-marker-alt"></i></li>
                                                            <li class="list-inline-item">1 Old Mill Dr, Toronto, Ontario M6S 0A1 Canada</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <ul class="list-unstyled list-inline d-flex justify-content-end">
                                                            <li class="list-inline-item"><i class="far fa-heart"></i></li>
                                                            <li class="list-inline-item"><i class="fas fa-share-alt"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <ul class="list-unstyled list-inline">
                                                            <li class="list-inline-item"><i class="far fa-calendar-minus"></i></li>
                                                            <li class="list-inline-item">Posted on Jul 2021</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Contact Seller</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="appartment-box mt-40">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="owl-carousel owl-theme">
                                                <div class="item">
                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                                </div>
                                                <div class="item">
                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                                </div>
                                                <div class="item">
                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="p-20">
                                                <h6 class="fs-16 mt-20">3 BHK Apartment <span class="fs-12 text-grey">in Toronto, Canada</span></h6>
                                                <span class="fs-12 text-grey">
                                                    by Agent Name #1
                                                </span>
                                                <div class="blue-bar mt-20">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">$123,000</h6>
                                                            <span class="fs-12 text-grey">
                                                                8,002 / sq ft
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">3589</h6>
                                                            <span class="fs-12 text-grey">
                                                                Area in sq ft
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">Pre-Construction</h6>
                                                            <span class="fs-12 text-grey">
                                                                Property Status
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-20">
                                                    <div class="col-lg-8">
                                                        <ul class="list-unstyled list-inline d-flex">
                                                            <li class="list-inline-item"><i class="fas fa-map-marker-alt"></i></li>
                                                            <li class="list-inline-item">1 Old Mill Dr, Toronto, Ontario M6S 0A1 Canada</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <ul class="list-unstyled list-inline d-flex justify-content-end">
                                                            <li class="list-inline-item"><i class="far fa-heart"></i></li>
                                                            <li class="list-inline-item"><i class="fas fa-share-alt"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <ul class="list-unstyled list-inline">
                                                            <li class="list-inline-item"><i class="far fa-calendar-minus"></i></li>
                                                            <li class="list-inline-item">Posted on Jul 2021</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Contact Seller</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="appartment-box mt-40">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="owl-carousel owl-theme">
                                                <div class="item">
                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                                </div>
                                                <div class="item">
                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                                </div>
                                                <div class="item">
                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="p-20">
                                                <h6 class="fs-16 mt-20">3 BHK Apartment <span class="fs-12 text-grey">in Toronto, Canada</span></h6>
                                                <span class="fs-12 text-grey">
                                                    by Agent Name #1
                                                </span>
                                                <div class="blue-bar mt-20">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">$123,000</h6>
                                                            <span class="fs-12 text-grey">
                                                                8,002 / sq ft
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">3589</h6>
                                                            <span class="fs-12 text-grey">
                                                                Area in sq ft
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">Pre-Construction</h6>
                                                            <span class="fs-12 text-grey">
                                                                Property Status
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-20">
                                                    <div class="col-lg-8">
                                                        <ul class="list-unstyled list-inline d-flex">
                                                            <li class="list-inline-item"><i class="fas fa-map-marker-alt"></i></li>
                                                            <li class="list-inline-item">1 Old Mill Dr, Toronto, Ontario M6S 0A1 Canada</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <ul class="list-unstyled list-inline d-flex justify-content-end">
                                                            <li class="list-inline-item"><i class="far fa-heart"></i></li>
                                                            <li class="list-inline-item"><i class="fas fa-share-alt"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <ul class="list-unstyled list-inline">
                                                            <li class="list-inline-item"><i class="far fa-calendar-minus"></i></li>
                                                            <li class="list-inline-item">Posted on Jul 2021</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Contact Seller</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="appartment-box mt-40">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="owl-carousel owl-theme">
                                                <div class="item">
                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                                </div>
                                                <div class="item">
                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                                </div>
                                                <div class="item">
                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="p-20">
                                                <h6 class="fs-16 mt-20">3 BHK Apartment <span class="fs-12 text-grey">in Toronto, Canada</span></h6>
                                                <span class="fs-12 text-grey">
                                                    by Agent Name #1
                                                </span>
                                                <div class="blue-bar mt-20">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">$123,000</h6>
                                                            <span class="fs-12 text-grey">
                                                                8,002 / sq ft
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">3589</h6>
                                                            <span class="fs-12 text-grey">
                                                                Area in sq ft
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">Pre-Construction</h6>
                                                            <span class="fs-12 text-grey">
                                                                Property Status
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-20">
                                                    <div class="col-lg-8">
                                                        <ul class="list-unstyled list-inline d-flex">
                                                            <li class="list-inline-item"><i class="fas fa-map-marker-alt"></i></li>
                                                            <li class="list-inline-item">1 Old Mill Dr, Toronto, Ontario M6S 0A1 Canada</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <ul class="list-unstyled list-inline d-flex justify-content-end">
                                                            <li class="list-inline-item"><i class="far fa-heart"></i></li>
                                                            <li class="list-inline-item"><i class="fas fa-share-alt"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <ul class="list-unstyled list-inline">
                                                            <li class="list-inline-item"><i class="far fa-calendar-minus"></i></li>
                                                            <li class="list-inline-item">Posted on Jul 2021</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Contact Seller</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="appartment-box mt-40">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="owl-carousel owl-theme">
                                                <div class="item">
                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                                </div>
                                                <div class="item">
                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                                </div>
                                                <div class="item">
                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="p-20">
                                                <h6 class="fs-16 mt-20">3 BHK Apartment <span class="fs-12 text-grey">in Toronto, Canada</span></h6>
                                                <span class="fs-12 text-grey">
                                                    by Agent Name #1
                                                </span>
                                                <div class="blue-bar mt-20">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">$123,000</h6>
                                                            <span class="fs-12 text-grey">
                                                                8,002 / sq ft
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">3589</h6>
                                                            <span class="fs-12 text-grey">
                                                                Area in sq ft
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">Pre-Construction</h6>
                                                            <span class="fs-12 text-grey">
                                                                Property Status
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-20">
                                                    <div class="col-lg-8">
                                                        <ul class="list-unstyled list-inline d-flex">
                                                            <li class="list-inline-item"><i class="fas fa-map-marker-alt"></i></li>
                                                            <li class="list-inline-item">1 Old Mill Dr, Toronto, Ontario M6S 0A1 Canada</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <ul class="list-unstyled list-inline d-flex justify-content-end">
                                                            <li class="list-inline-item"><i class="far fa-heart"></i></li>
                                                            <li class="list-inline-item"><i class="fas fa-share-alt"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <ul class="list-unstyled list-inline">
                                                            <li class="list-inline-item"><i class="far fa-calendar-minus"></i></li>
                                                            <li class="list-inline-item">Posted on Jul 2021</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Contact Seller</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="appartment-box mt-40">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="owl-carousel owl-theme">
                                                <div class="item">
                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                                </div>
                                                <div class="item">
                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                                </div>
                                                <div class="item">
                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="p-20">
                                                <h6 class="fs-16 mt-20">3 BHK Apartment <span class="fs-12 text-grey">in Toronto, Canada</span></h6>
                                                <span class="fs-12 text-grey">
                                                    by Agent Name #1
                                                </span>
                                                <div class="blue-bar mt-20">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">$123,000</h6>
                                                            <span class="fs-12 text-grey">
                                                                8,002 / sq ft
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">3589</h6>
                                                            <span class="fs-12 text-grey">
                                                                Area in sq ft
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">Pre-Construction</h6>
                                                            <span class="fs-12 text-grey">
                                                                Property Status
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-20">
                                                    <div class="col-lg-8">
                                                        <ul class="list-unstyled list-inline d-flex">
                                                            <li class="list-inline-item"><i class="fas fa-map-marker-alt"></i></li>
                                                            <li class="list-inline-item">1 Old Mill Dr, Toronto, Ontario M6S 0A1 Canada</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <ul class="list-unstyled list-inline d-flex justify-content-end">
                                                            <li class="list-inline-item"><i class="far fa-heart"></i></li>
                                                            <li class="list-inline-item"><i class="fas fa-share-alt"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <ul class="list-unstyled list-inline">
                                                            <li class="list-inline-item"><i class="far fa-calendar-minus"></i></li>
                                                            <li class="list-inline-item">Posted on Jul 2021</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Contact Seller</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="appartment-box mt-40">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="owl-carousel owl-theme">
                                                <div class="item">
                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                                </div>
                                                <div class="item">
                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                                </div>
                                                <div class="item">
                                                    <img src="{{asset('')}}frontend/assets/imgs/Rectangle%206.png" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="p-20">
                                                <h6 class="fs-16 mt-20">3 BHK Apartment <span class="fs-12 text-grey">in Toronto, Canada</span></h6>
                                                <span class="fs-12 text-grey">
                                                    by Agent Name #1
                                                </span>
                                                <div class="blue-bar mt-20">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">$123,000</h6>
                                                            <span class="fs-12 text-grey">
                                                                8,002 / sq ft
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">3589</h6>
                                                            <span class="fs-12 text-grey">
                                                                Area in sq ft
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-4 col-4">
                                                            <h6 class="fs-14 mb-0">Pre-Construction</h6>
                                                            <span class="fs-12 text-grey">
                                                                Property Status
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-20">
                                                    <div class="col-lg-8">
                                                        <ul class="list-unstyled list-inline d-flex">
                                                            <li class="list-inline-item"><i class="fas fa-map-marker-alt"></i></li>
                                                            <li class="list-inline-item">1 Old Mill Dr, Toronto, Ontario M6S 0A1 Canada</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <ul class="list-unstyled list-inline d-flex justify-content-end">
                                                            <li class="list-inline-item"><i class="far fa-heart"></i></li>
                                                            <li class="list-inline-item"><i class="fas fa-share-alt"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <ul class="list-unstyled list-inline">
                                                            <li class="list-inline-item"><i class="far fa-calendar-minus"></i></li>
                                                            <li class="list-inline-item">Posted on Jul 2021</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Contact Seller</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of my favorites-->

                    <!-- my profile-->
                    <div class="tab-pane fade show active" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="fs-30 fw-700">My Profile</h1>
                            </div>
                        </div>
                        <div class="row mt-40">
                            <div class="col-lg-12">
                                <div class="dashboard-profile">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Basic Details</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Change Password</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Change Email</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <!--basic details-->
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
{{--                                            <form action="{{url('/my-profile')}}" method="post" enctype="multipart/form-data">--}}
{{--                                                @csrf--}}
                                                <div class="bhk-box mt-20">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <h3 class="fs-18 fw-700">Photo</h3>
                                                            <p class="fs-16 fw-400 text-grey">Upload your profile photo.</p>
                                                        </div>
                                                    </div>
                                                    <!-- upload-media success message -->
                                                    <div id="file_upload_message" class="text-success" style="padding-left: 12px;"></div>
                                                    <!-- upload-media error message -->
                                                    <div id="file_upload_error" class="text-danger" style="padding-left: 12px;"></div>
                                                    <!-- upload-media error message -->
                                                    <div id="file_upload_delete" class="text-success" style="padding-left: 12px;"></div>
                                                    <!-- image preview before uploadFile -->
                                                    {{--                        <img id="output" height="100px"><br>--}}

                                                    <div class="row" id="image_preview" style="padding-left: 27px;">
                                                        @if(Auth::check())
                                                            <img src="{{asset('frontend/assets/profile/'.Auth::user()->image)}}" height="150px" width="150px">
                                                        @else
                                                            <img src="{{asset('frontend/assets/profile/circle-img.png')}}" height="150px" width="150px">
                                                        @endif
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
{{--                                                                <label for="exampleFormControlSelect1" class="fs-18">Upload Media</label>--}}
                                                                <label class="btn btn-primary mr-auto br-0" style="width: 20%"><input id="mediaUpload" type="file" class="upload" name="propertyMedia"/> Select Media</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="bhk-box mt-40">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <h3 class="fs-18 fw-700">User Details</h3>
                                                        <p class="fs-16 fw-400 text-grey">Add your contact information.</p>
                                                    </div>
                                                </div>
                                                <!-- validation-error message -->
                                                <div id="profileErrorMessage" style="color:red;"></div>
                                                <!-- success-message -->
                                                <div id="profileSuccessMessage" class="text-success"></div>
                                                <!-- error-message -->
                                                <div id="profileError" class="text-danger"></div>
                                                <div class="form-row mt-10">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="userFirstName" class="fs-18">First Name <span style="color: red">*</span></label>
                                                            <input type="text" class="form-control h-11" name="userFirstName" id="userFirstName" value="{{$first_name}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mt-21">
                                                        <div class="form-group">
                                                            <label for="userPhone" class="fs-18">Phone</label>
                                                            <input type="text" class="form-control h-11" name="userPhone" id="userPhone" value="{{$profile_data[0]->phone}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row mt-10">
                                                    <div class="col-lg-6 mt-21">
                                                        <div class="form-group">
                                                            <label for="userLastName" class="fs-18">Last Name <span style="color: red">*</span></label>
                                                            <input type="text" class="form-control h-11" name="userLastName" id="userLastName" value="{{$last_name}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mt-21">
                                                        <div class="form-group">
                                                            <label for="userMobile" class="fs-18">Mobile</label>
                                                            <input type="text" class="form-control h-11" name="userMobile" id="userMobile" value="{{$profile_data[0]->mobile}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="form-row mt-10">
                                                        <div class="col-lg-6 mt-21">
                                                            <div class="form-group">
                                                                <label for="userEmail" class="fs-18">Email</label>
                                                                <input type="text" class="form-control h-11" name="userEmail" id="userEmail" value="{{$profile_data[0]->email}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 mt-21">
                                                            <div class="form-group">
                                                                <label for="userSkype" class="fs-18">Skype</label>
                                                                <input type="text" class="form-control h-11" name="userSkype" id="userSkype" value="{{$profile_data[0]->skype}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="form-row mt-10">
                                                        <div class="col-lg-6 mt-21">
                                                            <div class="form-group">
                                                                <label for="userFaceBookUrl" class="fs-18">Facebook url</label>
                                                                <input type="text" class="form-control h-11" name="userFaceBookUrl" id="userFaceBookUrl" value="{{$profile_data[0]->facebook_url}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 mt-21">
                                                            <div class="form-group">
                                                                <label for="userInstagramUrl" class="fs-18">Instagram url</label>
                                                                <input type="text" class="form-control h-11" name="userInstagramUrl" id="userInstagramUrl" value="{{$profile_data[0]->instagram_url}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="form-row mt-10">
                                                        <div class="col-lg-6 mt-21">
                                                            <div class="form-group">
                                                                <label for="userTwitterUrl" class="fs-18">Twitter url</label>
                                                                <input type="text" class="form-control h-11" name="userTwitterUrl" id="userTwitterUrl" value="{{$profile_data[0]->twitter_url}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 mt-21">
                                                            <div class="form-group">
                                                                <label for="userPinterestUrl" class="fs-18">Pinterest url</label>
                                                                <input type="text" class="form-control h-11" name="userPinterestUrl" id="userPinterestUrl" value="{{$profile_data[0]->pinterest_url}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="form-row mt-10">
                                                        <div class="col-lg-6 mt-21">
                                                            <div class="form-group">
                                                                <label for="userLinkedInUrl" class="fs-18">LinkedIn Url</label>
                                                                <input type="text" class="form-control h-11" name="userLinkedInUrl" id="userLinkedInUrl" value="{{$profile_data[0]->linkedIn_url}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 mt-21">
                                                            <div class="form-group">
                                                                <label for="userWebUrl" class="fs-18">Website Url (without http)</label>
                                                                <input type="text" class="form-control h-11" name="userWebUrl" id="userWebUrl" value="{{$profile_data[0]->website_url}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="bhk-box mt-40">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <h3 class="fs-18 fw-700">User Details</h3>
                                                        <p class="fs-16 fw-400 text-grey">Add some information about yourself.</p>
                                                    </div>
                                                </div>
                                                    <div class="form-row mt-10">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="userTitle" class="fs-18">Title/Position</label>
                                                                <input type="text" class="form-control h-11" name="userTitle" id="userTitle"  value="{{$profile_data[0]->position}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row mt-10">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="userAboutMe" class="fs-18">About me</label>
                                                                <textarea class="form-control" name="userAboutMe" id="userAboutMe" rows="6" placeholder="About User…" style="box-shadow: none !important; border-color:#ced4da !important;">{{$profile_data[0]->about_user}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="form-row mt-10">
                                                {{--                                                <div class="col-lg-6">--}}
                                                <button type="submit" class="btn btn-info" id="updateProfileBtn" style="font-size: 14px; padding: 10px 20px !important;">Update Profile</button>
                                                {{--                                                </div>--}}
                                            </div>
{{--                                            </form>--}}
                                        </div>
                                        <!--end of basic details-->

                                        <!--change password-->
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <div class="row mt-40">
                                                <div class="col-lg-6">
                                                    <!-- validation-error message -->
                                                    <div id="passwordErrorMessage" style="color:red;"></div>
                                                    <!-- success-message -->
                                                    <div id="passwordSuccessMessage" class="text-success"></div>
                                                    <!-- error-message -->
                                                    <div id="passwordError" class="text-danger"></div>
                                                    <div class="form-group">
                                                        <label for="currentPassword" class="fs-18">Current Password</label>
                                                        <input type="password" class="form-control h-11" name="currentPassword" id="currentPassword" style="border-radius: 50px;">
                                                        <small class="fs-14 fw-400">Forgot your Password? <span><a href="#" class="text-green text-decoration-none fw-700">Reset it.</a></span></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="newPassword" class="fs-18">New Password</label>
                                                        <input type="password" class="form-control h-11" name="newPassword" id="newPassword" style="border-radius: 50px;">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="confirmPassword" class="fs-18">Confirm Password</label>
                                                        <input type="password" class="form-control h-11" name="confirmPassword" id="confirmPassword" style="border-radius: 50px;">
                                                    </div>
{{--                                                    <input type="text" name="user_id" id="user_id" value="">--}}
                                                    <button type="button" class="btn btn-info" id="reset_password" style="font-size: 14px; padding: 10px 20px !important;">Change my Password</button>
                                                </div>
                                                <div class="col-lg-6 mt-41">
                                                    <ul class="list-unstyled list-inline">
                                                        <li class="list-inline-item fs-18"><i class="fas fa-lock"></i></li>
                                                        <li class="list-inline-item fs-18">Your New Password conditions:</li>
                                                    </ul>
                                                    <ul class="fs-14 text-danger pl-20">
                                                        <li>Password must have 8 characters in length </li>
                                                        <li class="mt-10">Password cannot include spaces</li>
                                                        <li class="mt-10">Password must include at least one Upper case and Lower case character</li>
                                                        <li class="mt-10">Password must include at least one numeric character </li>
                                                        <li class="mt-10">Password must include at least one special character</li>
                                                        <li class="mt-10"> New Password cannot be same as Current Password</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end of change password -->

                                        <!-- change email -->
                                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                            <div class="row mt-40">
                                                <div class="col-lg-6">
                                                    <!-- validation-error message -->
                                                    <div id="emailErrorMessage" style="color:red;"></div>
                                                    <!-- success-message -->
                                                    <div id="emailSuccessMessage" class="text-success"></div>
                                                    <div class="form-group">
                                                        <label for="currentEmail" class="fs-18">Current Email</label>
                                                        <input type="email" class="form-control h-11" name="currentEmail" id="currentEmail" style="border-radius: 50px;" placeholder="john@gmail.com">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="newEmail" class="fs-18">New Email</label>
                                                        <input type="email" class="form-control h-11" name="newEmail" id="newEmail" style="border-radius: 50px;">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="confirm_password" class="fs-18">Confirm Password</label>
                                                        <input type="email" class="form-control h-11" name="confirm_password" id="confirm_password" style="border-radius: 50px;">
                                                    </div>
                                                    <button type="button" class="btn btn-info" id="change_email" style="font-size: 14px; padding: 10px 20px !important;">Change my Email</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end of change details -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end my profile-->
                </div>
            </div>
        </div>
    </div>
    <!-- SECTION-10 NEWS-LETTER BEGIN -->
    @include('frontend.include.news-letter-2')
    <!-- SECTION-10 NEWS-LETTER BEGIN END -->
@endsection
<!-- my-property slider -->
@section('my-property-slider')
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
<!-- profile-update-script -->
@section('profile-script')
    <!-- update-profile -->
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //UpdateProfile Function
            $('#updateProfileBtn').click(function () {
                //alert('update profile button clicked');
                $("#profileErrorMessage").empty();
                //get text-field values by id
                var firstName = $('#userFirstName').val();
                var phone = $('#userPhone').val();
                var lastName = $('#userLastName').val();
                var mobile = $('#userMobile').val();
                var email = $('#userEmail').val();
                var skype = $('#userSkype').val();
                var facebook = $('#userFaceBookUrl').val();
                var instagram = $('#userInstagramUrl').val();
                var twitter = $('#userTwitterUrl').val();
                var pinterest = $('#userPinterestUrl').val();
                var linkedIn = $('#userLinkedInUrl').val();
                var web = $('#userWebUrl').val();
                var title = $('#userTitle').val();
                var about = $('#userAboutMe').val();
                //alert(firstName + " " + phone + " " + lastName + " " + mobile + " " + email + " " + skype + " " + facebook + " " + instagram + " " + twitter + " " + pinterest + " " + linkedIn + " " + web + " " + title + " " + about);
                if(firstName != "" && lastName != ""){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/my-profile",
                        type: 'post',
                        //dataType: 'json',
                        data: {userFirstName: firstName, userPhone: phone, userLastName: lastName, userMobile: mobile, userEmail: email,userSkype: skype,userFaceBookUrl: facebook,userInstagramUrl: instagram,userTwitterUrl: twitter,userPinterestUrl: pinterest,userLinkedInUrl: linkedIn,userWebUrl: web,userTitle: title,userAboutMe: about},
                        success: function(return_res){
                            console.log(return_res);
                            var newRes = JSON.parse(JSON.stringify(return_res));
                            if(newRes.success == "1"){
                                //alert("register successful");
                                //success-message
                                $("#profileSuccessMessage").empty().append(newRes.message).show();
                                $("#profileErrorMessage").append("Please fill required fields!").hide();
                            }else{
                                alert('field is required');
                                // $("#profileErrorMessage").append(newRes.message);
                            }
                            //var newRes = JSON.parse(JSON.stringify(return_res));
                        }
                    });
                }else{
                    $("#profileErrorMessage").append("Please fill required fields!").show();
                    $("#profileSuccessMessage").hide();
                }
            });
            //add-profile image function
            $(document).on('change', '#mediaUpload',function(e) {
                let postData = new FormData();
                postData.append('file',this.files[0]);
                console.log(postData);
                $.ajax({
                    async:true,
                    type        :'post',
                    url         : "{{ url('/add-profile-image')}}",
                    data        : postData,
                    contentType : false,
                    processData : false,
                    success     : function(result) {
                        console.log(result);
                        if(result.code == 200) {
                            //success-message
                            //alert('image uploaded successfully');
                            let url;
                            let file;

                            //if user select pdf file than preview pdf-icon image, if not than preview imageFile
                            if(result.data.media_type === 'pdf') {
                                //pdfFile preview
                                url = "{{asset('/frontend/assets/icon-img/pdf-icon.png')}}";
                                file = "<img class='img-responsive' src='"+url+"' height='150px' width='150px'>";
                                $("#file_upload_message").empty().append(result.message).show();
                                $("#file_upload_error").empty().append(result.message).hide();

                            } else {
                                //imageFile preview
                                url = "{{asset('/frontend/assets/profile')}}" + "/" +result.data;
                                file = "<img class='img-responsive' src='"+url+"' height='150px' width='150px'>";
                                $("#file_upload_message").empty().append(result.message).show();
                                $("#file_upload_error").empty().append(result.message).hide();
                            }

                            $('#image_preview').empty().append(
                                "<div class='image' >" + file + "</div>"
                            );
                        } else {
                            //alert('you have select invalid file format');
                            $("#file_upload_error").empty().append(result.message).show();
                            $("#file_upload_message").empty().append(result.message).hide();

                        }
                    },
                    error   : function(data) { console.log(data); }
                });
            });
            //change-password function
            $('#reset_password').click(function () {
                $("#passwordErrorMessage").empty();
                //get text-field values by id
                var currentPassword = $('#currentPassword').val();
                var newPassword = $('#newPassword').val();
                var confirmPassword = $('#confirmPassword').val();
                //alert(oldPassword + " " + newPassword + " " + confirmPassword);
                if(currentPassword != "" && newPassword != "" && confirmPassword != ""){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/change-password",
                        type: 'post',
                        //dataType: 'json',
                        data: {currentPassword: currentPassword, newPassword: newPassword, confirmPassword: confirmPassword},
                        success: function(return_res){
                            console.log(return_res);
                            var newRes = JSON.parse(JSON.stringify(return_res));
                            if(newRes.success == "2"){
                                // alert("old password is incorrect");
                                //success-message
                                $("#passwordSuccessMessage").empty().append(newRes.message).show();
                                $("#passwordError").empty().append(newRes.message).hide();
                                //$("#registerErrorMessage").append(newRes.message);
                            }else if(newRes.success == "1"){
                                $("#passwordError").empty().append(newRes.message).show();
                                $("#passwordSuccessMessage").empty().append(newRes.message).hide();
                            }else{
                                $("#passwordError").empty().append(newRes.message).show();
                                $("#passwordSuccessMessage").empty().append(newRes.message).hide();
                            }
                            //var newRes = JSON.parse(JSON.stringify(return_res));
                        }
                    });
                }else{
                    $("#passwordErrorMessage").append("Please fill all fields!").show();
                    $("#passwordSuccessMessage").hide();
                }
            });
            //change-email function
            $('#change_email').click(function () {
                $("#emailErrorMessage").empty();
                //get text-field values by id
                var currentEmail = $('#currentEmail').val();
                var newEmail = $('#newEmail').val();
                var confirm_password = $('#confirm_password').val();
                //alert(oldPassword + " " + newPassword + " " + confirmPassword);
                if(currentEmail != "" && newEmail != "" && confirm_password != ""){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/change-email",
                        type: 'post',
                        //dataType: 'json',
                        data: {currentEmail: currentEmail, newEmail: newEmail, confirm_password: confirm_password},
                        success: function(return_res){
                            console.log(return_res);
                            var newRes = JSON.parse(JSON.stringify(return_res));
                            if(newRes.success == "2"){
                                // alert("old password is incorrect");
                                //success-message
                                $("#emailSuccessMessage").empty().append(newRes.message).show();
                                $("#emailErrorMessage").empty().append(newRes.message).hide();
                                //$("#registerErrorMessage").append(newRes.message);
                            }else if(newRes.success == "1"){
                                $("#emailErrorMessage").empty().append(newRes.message).show();
                                $("#emailSuccessMessage").empty().append(newRes.message).hide();
                            }else{
                                $("#passwordError").empty().append(newRes.message).show();
                                $("#emailSuccessMessage").empty().append(newRes.message).hide();
                            }
                        }
                    });
                }else{
                    $("#emailErrorMessage").append("Please fill all fields!").show();
                    $("#emailSuccessMessage").hide();
                }
            });
        });
    </script>
@endsection
