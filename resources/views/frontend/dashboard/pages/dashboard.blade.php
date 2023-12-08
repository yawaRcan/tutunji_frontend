@extends('frontend.layout.master')
@section('title')
    <title>Tuntunji Realty | Dashboard</title>
    <style>
        .navbar{
            position: initial;
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
    <div class="container">
        <div class="row mt-40">
            @include('frontend.dashboard.include.navigation_bar')
            <div class="col-lg-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <!-- dashboard -->
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="row">
                            <div class="col-lg-3 col-8">
                                <h1 class="fs-30 fw-700">Dashboard</h1>
                            </div>
                            <div class="col-lg-6 col-12 dn">
                                <div class="green-square">
                                    All statistics shown of your properties listed with us, are taken from the Toronto MLS, Tutunji Realty, Realtor.com and BrokerBay traffic sources via an API. This allows for complete and accurate tracking.
                                </div>
                            </div>
                            <div class="col-lg-3 col-4">
                                <h1 class="fs-30 fw-700">
                                    <select class="form-control br-4 change_chart_option" style="font-size: 12px; background-color: #fff !important;" id="select_time">
                                        <option selected="">Time Period</option>
                                        <option value="1" selected>Last 1 Hour</option>
                                        <option value="2">Last 6 Hour</option>
                                        <option value="3">Last 1 Day</option>
                                        <option value="4">Last 1 Week</option>
                                        <option value="5">Last 1 Month</option>
                                    </select>
                                </h1>
                            </div>
                            <!-- mob view-->
                            <div class="col-12 dn-1">
                                <div class="green-square">
                                    All statistics shown of your properties listed with us, are taken from the Toronto MLS, Tutunji Realty, Realtor.com and BrokerBay traffic sources via an API. This allows for complete and accurate tracking.
                                </div>
                            </div>
                            <!--end of mob view-->
                        </div>
                        <div class="row mt-20">
                            <div class="col-lg-4">
                                <div class="dashboard-box">
                                    <div class="row">
                                        <div class="col-lg-4 col-4 center">
                                            <h1 class="fs-54 text-darkgreen fw-700 total_count">{{$totalActivePropertyLastOneHour}}</h1>
                                        </div>
                                        <div class="col-lg-8 col-8 mt-10">
                                            <h4 class="fs-14">Total Listings Active</h4>
                                            <h4 class="fs-18 text-grey">1 hour</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-21">
                                <div class="dashboard-box">
                                    <div class="row">
                                        <div class="col-lg-4 col-4 center">
                                            <h1 class="fs-54 text-blue fw-700 total_views">{{ $totalPropertyViewLastOneHour}}</h1>
                                        </div>
                                        <div class="col-lg-8 col-8 mt-10">
                                            <h4 class="fs-14">Total Views</h4>
                                            <h4 class="fs-18 text-grey">1 hour</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-21">
                                <div class="dashboard-box">
                                    <div class="row">
                                        <div class="col-lg-4 col-4 center">
                                            <h1 class="fs-54 text-orange fw-700 offers_count">0</h1>
                                        </div>
                                        <div class="col-lg-8 col-8 mt-10">
                                            <h4 class="fs-14">Total Offers</h4>
                                            <h4 class="fs-18 text-grey">1 hour</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-lg-12">
                                <div class="bhk-box">
{{--                                    <div class="row">--}}
{{--                                        <div class="col-lg-9">--}}
{{--                                            <h6 class="fs-12 fw-700">Listing Views</h6>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <img src="{{asset('')}}frontend/assets/imgs/graph.png" alt="" class="img-fluid mt-20 w-100">--}}
                                <!-- highchart -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- dropdown-list -->
                                            <select id="chart_option2" name="list2" class="form-control chart_change">
                                                <option value="1_1">Total Listings Active</option>
                                                <option value="1_2">Total Property Views</option>
                                                <option value="1_3">Total Offers</option>
                                            </select>
                                            <!-- container -->
                                            <div id="container" style="margin-bottom: 10px;"></div>
                                            <div id="container2" style="margin-bottom: 10px; display: none"></div>
                                            <div id="container3" style="margin-bottom: 10px; display: none"></div>
                                            <div id="container4" style="margin-bottom: 10px; display: none"></div>
                                            <div id="container5" style="margin-bottom: 10px; display: none"></div>
                                            <div id="container6" style="margin-bottom: 10px; display: none"></div>
                                            <div id="container7" style="margin-bottom: 10px; display: none"></div>
                                            <div id="container8" style="margin-bottom: 10px; display: none"></div>
                                            <div id="container9" style="margin-bottom: 10px; display: none"></div>
                                            <div id="container10" style="margin-bottom: 10px; display: none"></div>
                                            <div id="container11" style="margin-bottom: 10px; display: none"></div>
                                            <div id="container12" style="margin-bottom: 10px; display: none"></div>
                                            <div id="container13" style="margin-bottom: 10px; display: none"></div>
                                            <div id="container14" style="margin-bottom: 10px; display: none"></div>
                                            <div id="container15" style="margin-bottom: 10px; display: none"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of dashboard-->
                    <!-- my profile -->
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
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
                                        <!--                                       basic details-->
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                            <div class="bhk-box mt-40">
                                                <form>
                                                    <div class="form-row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1" class="fs-18">First Name *</label>
                                                                <input type="text" class="form-control h-11" id="exampleFormControlInput1" placeholder="John">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mt-21">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1" class="fs-18">Middle Name</label>
                                                                <input type="text" class="form-control h-11" id="exampleFormControlInput1" placeholder="Marshel">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mt-21">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1" class="fs-18">Last Name *</label>
                                                                <input type="text" class="form-control h-11" id="exampleFormControlInput1" placeholder="Doe">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row mt-10">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1" class="fs-18">Email</label>
                                                                <input type="email" class="form-control h-11" id="exampleFormControlInput1" placeholder="John@gmail.com">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mt-21">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1" class="fs-18">Phone</label>
                                                                <input type="text" class="form-control h-11" id="exampleFormControlInput1" placeholder="555505251">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mt-21">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1" class="fs-18">Cell Phone</label>
                                                                <input type="text" class="form-control h-11" id="exampleFormControlInput1" placeholder="111-111-111">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="bhk-box mt-20">
                                                <form>
                                                    <div class="form-row">
                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1" class="fs-18">Address *</label>
                                                                <input type="text" class="form-control h-11" id="exampleFormControlInput1" placeholder="123 W. ABC Street">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mt-21">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1" class="fs-18">City</label>
                                                                <input type="text" class="form-control h-11" id="exampleFormControlInput1" placeholder="City">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row mt-10">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1" class="fs-18">State</label>
                                                                <select type="text" class="form-control h-11" id="exampleFormControlInput1" placeholder="123 W. ABC Street">
                                                                    <option selected="">ABCD</option>
                                                                    <option>ABCD</option>
                                                                    <option>ABCD</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mt-21">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1" class="fs-18">Zip</label>
                                                                <input type="text" class="form-control h-11" id="exampleFormControlInput1" placeholder="City">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="bhk-box mt-20">
                                                <form>
                                                    <div class="form-row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1" class="fs-18">User Note</label>
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" placeholder="Notes…" style="box-shadow: none !important; border-color:#ced4da !important;"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- end of basic details-->

                                        <!-- change password -->
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <div class="row mt-40">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1" class="fs-18">Current Password</label>
                                                        <input type="password" class="form-control h-11" id="exampleFormControlInput1" style="border-radius: 50px;">
                                                        <small class="fs-14 fw-400">Forgot your Password? <span><a href="#" class="text-green text-decoration-none fw-700">Reset it.</a></span></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1" class="fs-18">New Password</label>
                                                        <input type="password" class="form-control h-11" id="exampleFormControlInput1" style="border-radius: 50px;">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1" class="fs-18">Confirm Password</label>
                                                        <input type="password" class="form-control h-11" id="exampleFormControlInput1" style="border-radius: 50px;">
                                                    </div>
                                                    <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Change my Password</button>
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
                                        <!-- end of change password-->
                                        <!-- change email  -->
                                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                            <div class="row mt-40">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1" class="fs-18">Current Email</label>
                                                        <input type="email" class="form-control h-11" id="exampleFormControlInput1" style="border-radius: 50px;" placeholder="john@gmail.com">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1" class="fs-18">New Email</label>
                                                        <input type="email" class="form-control h-11" id="exampleFormControlInput1" style="border-radius: 50px;">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1" class="fs-18">Confirm Password</label>
                                                        <input type="email" class="form-control h-11" id="exampleFormControlInput1" style="border-radius: 50px;">
                                                    </div>
                                                    <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Change my Email</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end of change details -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end my profile -->
                </div>
            </div>
        </div>
    </div>
    @include('frontend.include.news-letter-2')
    <!-- side menu -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <!-- subscribe for newsletter -->
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
                    var data = JSON.parse(JSON.stringify(response));
                    if(data.success == true){
                        $('#status').empty().html(data.message).addClass('text-success');
                        $('#status').removeClass('text-danger')
                    }else {
                        $('#status').show();
                        $('#status').empty().html(data.message).addClass('text-danger');
                        $('#status').removeClass('text-success')
                    }
                },
            });
        });
    </script>
    @section('line-chart-js')
    <!-- LINE-CHART JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>

        let oneHour             = <?php echo json_encode($totalActivePropertyLastOneHour)?>;
        let sixHour             = <?php echo json_encode($totalActivePropertyLastSixHour)?>;
        let daily               = <?php echo json_encode($totalActivePropertyLast24Hour)?>;
        let oneWeek             = <?php echo json_encode($totalActivePropertyLastOneWeek)?>;
        let oneMonth            = <?php echo json_encode($totalActivePropertyLastOneMonth)?>;
        let oneHourViews        = <?php echo json_encode($totalPropertyViewLastOneHour)?>;
        let sixHourViews        = <?php echo json_encode($totalPropertyViewsLastSixHours)?>;
        let dailyViews          = <?php echo json_encode($totalPropertyViewsLast24Hour)?>;
        let weekViews           = <?php echo json_encode($totalPropertyViewsLastOneWeek)?>;
        let monthViews          = <?php echo json_encode($totalPropertyViewsLastOneMonth)?>;
        let offersOnehourBoxView    = <?php echo json_encode($totalOffersOneHourBoxView)?>;
        let offersSixHoursBoxView   = <?php echo json_encode($totalOffersSixHoursBoxView)?>;
        let offersOneDayBoxView     = <?php echo json_encode($totalOffersOneDayBoxView)?>;
        let offersOneWeekBoxView    = <?php echo json_encode($totalOffersOneWeekBoxView)?>;
        let offersOneMonthBoxView   = <?php echo json_encode($totalOffersOneMonthBoxView)?>;

        $(".change_chart_option").on('change', function () {

            let value       = $("#select_time").val();
            let second_box  = $("#chart_option2").val();

            if(value === "1") {
                $('h4.fs-18').text('Last 1 Hour');
                if(second_box === "1_1") {
                    $('h1.total_count').text(oneHour);
                } else if(second_box === "1_2") {
                    $('h4.fs-18').text('Last 1 Hour');
                    $('h1.total_views').text(oneHourViews);
                } else if(second_box === "1_3") {
                    $('h4.fs-18').text('Last 1 Hour');
                    $('h1.offers_count').text(offersOnehourBoxView);
                }
            } else if(value === "2") {
                $('h4.fs-18').text('Last 6 Hours');
                if(second_box === "1_1") {
                    $('h1.total_count').text(sixHour);
                } else if(second_box === "1_2") {
                    $('h4.fs-18').text('Last 6 Hour');
                    $('h1.total_views').text(sixHourViews);
                } else if(second_box === "1_3") {
                    $('h4.total_offer').text('Last 6 Hour');
                    $('h1.offers_count').text(offersSixHoursBoxView);
                }
            } else if(value === "3") {
                if(second_box === "1_1") {
                    $('h4.fs-18').text('Last 1 Day');
                    $('h1.total_count').text(daily);
                } else if(second_box === "1_2") {
                    $('h4.fs-18').text('Last 1 Day');
                    $('h1.total_views').text(dailyViews);
                } else if(second_box === "1_3") {
                    $('h4.fs-18').text('Last 1 Day');
                    $('h1.offers_count').text(offersOneDayBoxView);
                }
            } else if(value === "4") {
                if(second_box === "1_1") {
                    $('h4.fs-18').text('Last 1 Week');
                    $('h1.total_count').text(oneWeek);
                } else if(second_box === "1_2") {
                    $('h4.fs-18').text('Last 1 Week');
                    $('h1.total_views').text(weekViews);
                } else if(second_box === "1_3") {
                    $('h4.fs-18').text('Last 1 Week');
                    $('h1.offers_count').text(offersOneWeekBoxView);
                }
            } else if(value === "5") {
                if(second_box === "1_1") {
                    $('h4.fs-18').text('Last 1 Month');
                    $('h1.total_count').text(oneMonth);
                } else if(second_box === "1_2") {
                    $('h4.fs-18').text('Last 1 Month');
                    $('h1.total_views').text(monthViews);
                } else if(second_box === "1_3") {
                    $('h4.fs-18').text('Last 1 Month');
                    $('h1.offers_count').text(offersOneMonthBoxView);
                }
            }
        })

        $(".chart_change").on('change', function () {
            //for box-view
            /*var oneHour             = <?php echo json_encode($totalActivePropertyLastOneHour)?>;
            var sixHour             = <?php echo json_encode($totalActivePropertyLastSixHour)?>;
            var daily               = <?php echo json_encode($totalActivePropertyLast24Hour)?>;
            var oneWeek             = <?php echo json_encode($totalActivePropertyLastOneWeek)?>;
            var oneMonth            = <?php echo json_encode($totalActivePropertyLastOneMonth)?>;
            var oneHourViews        = <?php echo json_encode($totalPropertyViewLastOneHour)?>;
            var sixHourViews        = <?php echo json_encode($totalPropertyViewsLastSixHours)?>;
            var dailyViews          = <?php echo json_encode($totalPropertyViewsLast24Hour)?>;
            var weekViews           = <?php echo json_encode($totalPropertyViewsLastOneWeek)?>;
            var monthViews          = <?php echo json_encode($totalPropertyViewsLastOneMonth)?>;
            var offersOnehourBoxView    = <?php echo json_encode($totalOffersOneHourBoxView)?>;
            var offersSixHoursBoxView   = <?php echo json_encode($totalOffersSixHoursBoxView)?>;
            var offersOneDayBoxView     = <?php echo json_encode($totalOffersOneDayBoxView)?>;
            var offersOneWeekBoxView    = <?php echo json_encode($totalOffersOneWeekBoxView)?>;
            var offersOneMonthBoxView   = <?php echo json_encode($totalOffersOneMonthBoxView)?>;*/
            //time-period-value
            let value       = $("#select_time").val();
            //chart-box-dropdown-value
            let second_box  = $("#chart_option2").val();
            //chart-container
            $("#container").hide();
            $("#container2").hide();
            $("#container3").hide();
            $("#container4").hide();
            $("#container5").hide();
            $("#container6").hide();
            $("#container7").hide();
            $("#container8").hide();
            $("#container9").hide();
            $("#container10").hide();
            $("#container11").hide();
            $("#container12").hide();
            $("#container13").hide();
            $("#container14").hide();
            $("#container15").hide();
            //hide/show chart-box-container & box-view
            if(value === "1") {
                if(second_box === "1_1") {
                    $('h4.fs-18').text('Last 1 Hour');
                    $('h1.total_count').text(oneHour);
                    $("#container").show();
                } else if(second_box === "1_2") {
                    $('h4.fs-18').text('Last 1 Hour');
                    $('h1.total_views').text(oneHourViews);
                    $("#container6").show();
                } else if(second_box === "1_3") {
                    $('h4.fs-18').text('Last 1 Hour');
                    $('h1.offers_count').text(offersOnehourBoxView);
                    $("#container11").show();
                }
            } else if(value === "2") {
                if(second_box === "1_1") {
                    $('h4.fs-18').text('Last 6 Hours');
                    $('h1.total_count').text(sixHour);
                    $("#container2").show();
                } else if(second_box === "1_2") {
                    $('h4.fs-18').text('Last 6 Hour');
                    $('h1.total_views').text(sixHourViews);
                    $("#container7").show();
                } else if(second_box === "1_3") {
                    $('h4.total_offer').text('Last 6 Hour');
                    $('h1.offers_count').text(offersSixHoursBoxView);
                    $("#container12").show();
                }
            } else if(value === "3") {
                if(second_box === "1_1") {
                    $('h4.fs-18').text('Last 1 Day');
                    $('h1.total_count').text(daily);
                    $("#container3").show();
                } else if(second_box === "1_2") {
                    $('h4.fs-18').text('Last 1 Day');
                    $('h1.total_views').text(dailyViews);
                    $("#container8").show();
                } else if(second_box === "1_3") {
                    $('h4.fs-18').text('Last 1 Day');
                    $('h1.offers_count').text(offersOneDayBoxView);
                    $("#container13").show();
                }
            } else if(value === "4") {
                if(second_box === "1_1") {
                    $('h4.fs-18').text('Last 1 Week');
                    $('h1.total_count').text(oneWeek);
                    $("#container4").show();
                } else if(second_box === "1_2") {
                    $('h4.fs-18').text('Last 1 Week');
                    $('h1.total_views').text(weekViews);
                    $("#container9").show();
                } else if(second_box === "1_3") {
                    $('h4.fs-18').text('Last 1 Week');
                    $('h1.offers_count').text(offersOneWeekBoxView);
                    $("#container14").show();
                }
            } else if(value === "5") {
                if(second_box === "1_1") {
                    $('h4.fs-18').text('Last 1 Month');
                    $('h1.total_count').text(oneMonth);
                    $("#container5").show();
                } else if(second_box === "1_2") {
                    $('h4.fs-18').text('Last 1 Month');
                    $('h1.total_views').text(monthViews);
                    $("#container10").show();
                } else if(second_box === "1_3") {
                    $('h4.fs-18').text('Last 1 Month');
                    $('h1.offers_count').text(offersOneMonthBoxView);
                    $("#container15").show();
                }
            }
        });

        var totalListingActiveOneHour = <?php echo json_encode($totalListingActiveOneHour)?>;
        var totalListingActiveSixHour = <?php echo json_encode($totalListingActiveSixHour)?>;
        var totalListingActiveDaily = <?php echo json_encode($totalListingActiveDaily)?>;
        var totalListingActiveOneWeek = <?php echo json_encode($totalListingActiveOneWeek)?>;
        var totalListingActiveMonth = <?php echo json_encode($totalListingActiveMonth)?>;
        var totalPropertyViewOneHour = <?php echo json_encode($property_views_one_hour)?>;
        var totalPropertyViewSixHour = <?php echo json_encode($property_views_six_hours)?>;
        var totalPropertyView24Hour = <?php echo json_encode($property_views_24_hours)?>;
        var totalPropertyView1Week = <?php echo json_encode($property_views_week)?>;
        var totalPropertyViewMonth = <?php echo json_encode($property_views_month)?>;
        var totalOffersOneHourChartView = <?php echo json_encode($totalOffersOneHourChartView)?>;
        var totalOffersSixHoursChartView = <?php echo json_encode($totalOffersSixHoursChartView)?>;
        var totalOffersOneDayChartView = <?php echo json_encode($totalOffersOneDayChartView)?>;
        var totalOffersOneWeekChartView = <?php echo json_encode($totalOffersOneWeekChartView)?>;
        var totalOffersOneMonthChartView = <?php echo json_encode($totalOffersOneMonthChartView)?>;

        let time1 = <?php echo json_encode($time1)?>;
        let time2 = <?php echo json_encode($time2)?>;
        let time21 = <?php echo json_encode($time21)?>;
        let time22 = <?php echo json_encode($time22)?>;
        let time31 = <?php echo json_encode($time31)?>;
        let time32 = <?php echo json_encode($time32)?>;


        let endDate     = new Date();
        let startDate   = new Date(new Date().setDate(endDate.getDate() - 29));
        const month     = ["January","February","March","April","May","June","July","August","September","October","November","December"];
        const days     = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
        // const Hours    = ["01:00","02:00","03:00","04:00","05:00","06:00","07:00","08:00","09:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00","23:00",]
        for(var arr=[],dt=new Date(endDate); dt>=startDate; dt.setDate(dt.getDate()-1)){
            var date = new Date(dt)
            arr.push(date.getDate()+'/'+month[date.getMonth()]);
        }

        Highcharts.chart('container', {
            plotOptions: {
                series: {
                    color: '#1ED65F'
                }
            },
            title: {
                text: 'A chart For Total Listings Active in Last 1 Hour'
            },
            xAxis: {
                categories: time1
            },
            yAxis :{
                title: {
                    text: "Number of Total Listings Active in Last 1 Hour"
                }
            },
            series:[{
                name:"New Total Listings Active in Last 1 Hour",
                data:totalListingActiveOneHour
            }],
        });
        var chart2 = new Highcharts.Chart('container2',{
            plotOptions: {
                series: {
                    color: '#1ED65F'
                },
            },
            title: {
                text: 'A chart For Total Listings Active in Last 6 Hour'
            },
            xAxis: {
                categories: time2
            },
            yAxis :{
                title: {
                    text: "Number of Total Listings Active in Last 6 Hour"
                }
            },
            series:[{
                name:"New Total Listings Active in Last 6 Hour",
                data:totalListingActiveSixHour
            }],
        });
        var chart3 = new Highcharts.Chart('container3',{
            plotOptions: {
                series: {
                    color: '#1ED65F'
                },
            },
            title: {
                text: 'A chart For Total Listings Active in Last 1 Day'
            },
            xAxis: {
                categories: arr
            },
            yAxis :{
                title: {
                    text: "Number of Total Listings Active in Last 1 Day"
                }
            },
            series:[{
                name:"New Total Listings Active in Last 1 Day",
                data:totalListingActiveDaily
            }],
        });
        var chart4 = new Highcharts.Chart('container4',{
            plotOptions: {
                series: {
                    color: '#1ED65F'
                },
            },
            title: {
                text: 'A chart For Total Listings Active in Last 1 Week'
            },
            xAxis: {
                categories: arr
            },
            yAxis :{
                title: {
                    text: "Number of Total Listings Active in Last 1 Week"
                }
            },
            series:[{
                name:"New Total Listings Active in Last 1 Week",
                data:totalListingActiveOneWeek
            }],
        });
        var chart5 = new Highcharts.Chart('container5', {
            plotOptions: {
                series: {
                    color: '#1ED65F'
                }
            },
            title: {
                text: 'A chart For Total Listings Active in Last 1 Month'
            },

            xAxis: {
                categories : month
            },
            yAxis :{
                title: {
                    text: "Number of Total Listings Active in Last 1 Month"
                }
            },
            series:[{
                name:"New Total Listings Active in Last 1 Month",
                data:totalListingActiveMonth
            }],
        });
        var chart6 = new Highcharts.Chart('container6', {
            plotOptions: {
                series: {
                    color: '#1ED65F'
                }
            },
            title: {
                text: 'A chart For Total Property Views in Last 1 Hour'
            },
            xAxis: {
                categories : time21
            },
            yAxis :{
                title: {
                    text: "Number of Total Property Views in Last 1 Hour"
                }
            },
            series:[{
                name:"New Total Property Views in Last 1 Hour",
                data:totalPropertyViewOneHour
            }],
        });
        var chart7 = new Highcharts.Chart('container7', {
            plotOptions: {
                series: {
                    color: '#1ED65F'
                }
            },
            title: {
                text: 'A chart For Total Property Views in Last 6 Hour'
            },
            xAxis: {
                categories : time22
            },
            yAxis :{
                title: {
                    text: "Number of Total Property Views in Last 6 Hour"
                }
            },
            series:[{
                name:"New Total Property Views in Last 6 Hour",
                data:totalPropertyViewSixHour
            }],
        });
        var chart8 = new Highcharts.Chart('container8', {
            plotOptions: {
                series: {
                    color: '#1ED65F'
                }
            },
            title: {
                text: 'A chart For Total Property Views in Last 1 Day'
            },
            xAxis: {
                categories : arr
            },
            yAxis :{
                title: {
                    text: "Number of Total Property Views in Last 1 Day"
                }
            },
            series:[{
                name:"New Total Property Views in Last 1 Day",
                data:totalPropertyView24Hour
            }],
        });
        var chart9 = new Highcharts.Chart('container9', {
            plotOptions: {
                series: {
                    color: '#1ED65F'
                }
            },
            title: {
                text: 'A chart For Total Property Views in Last 1 Week'
            },
            xAxis: {
                categories : arr
            },
            yAxis :{
                title: {
                    text: "Number of Total Property Views in Last 1 Week"
                }
            },
            series:[{
                name:"New Total Property Views in Last 1 Week",
                data:totalPropertyView1Week
            }],
        });
        var chart10 = new Highcharts.Chart('container10', {
            plotOptions: {
                series: {
                    color: '#1ED65F'
                }
            },
            title: {
                text: 'A chart For Total Property Views in Last 1 Month'
            },
            xAxis: {
                categories : month
            },
            yAxis :{
                title: {
                    text: "Number of Total Property Views in Last 1 Month"
                }
            },
            series:[{
                name:"New Total Property Views in Last 1 Month",
                data:totalPropertyViewMonth
            }],
        });
        var chart11 = new Highcharts.Chart('container11', {
            plotOptions: {
                series: {
                    color: '#1ED65F'
                }
            },
            title: {
                text: 'A chart For Total Offers in Last 1 Hour'
            },
            xAxis: {
                categories : time31
            },
            yAxis :{
                title: {
                    text: "Number of Total Offers in Last 1 Hour"
                }
            },
            series:[{
                name:"New Total Offers in Last 1 Hour",
                data:totalOffersOneHourChartView
            }],
        });
        var chart12 = new Highcharts.Chart('container12', {
            plotOptions: {
                series: {
                    color: '#1ED65F'
                }
            },
            title: {
                text: 'A chart For Total Offers in Last 6 Hour'
            },

            xAxis: {
                categories : time32
            },
            yAxis :{
                title: {
                    text: "Number of Total Offers in Last 6 Hour"
                }
            },
            series:[{
                name:"New Total Offers in Last 6 Hour",
                data:totalOffersSixHoursChartView
            }],
        });
        var chart13 = new Highcharts.Chart('container13', {
            plotOptions: {
                series: {
                    color: '#1ED65F'
                }
            },
            title: {
                text: 'A chart For Total Offers in Last 1 Day'
            },
            xAxis: {
                categories : arr
            },
            yAxis :{
                title: {
                    text: "Number of Total Offers in Last 1 Day"
                }
            },
            series:[{
                name:"New Total Offers in Last 1 Day",
                data:totalOffersOneDayChartView
            }],
        });
        var chart14 = new Highcharts.Chart('container14', {
            plotOptions: {
                series: {
                    color: '#1ED65F'
                }
            },
            title: {
                text: 'A chart For Total Offers in Last 1 Week'
            },
            xAxis: {
                categories : arr
            },
            yAxis :{
                title: {
                    text: "Number of Total Offers in Last 1 Week"
                }
            },
            series:[{
                name:"New Total Offers in Last 1 Week",
                data:totalOffersOneWeekChartView
            }],
        });
        var chart15 = new Highcharts.Chart('container15', {
            plotOptions: {
                series: {
                    color: '#1ED65F'
                }
            },
            title: {
                text: 'A chart For Total Offers in Last 1 Month'
            },
            xAxis: {
                categories : month
            },
            yAxis :{
                title: {
                    text: "Number of Total Offers in Last 1 Month"
                }
            },
            series:[{
                name:"New Total Offers in Last 1 Month",
                data:totalOffersOneMonthChartView
            }],
        });
    </script>
    @endsection
@endsection
