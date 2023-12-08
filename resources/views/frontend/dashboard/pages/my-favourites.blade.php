@extends('frontend.layout.master')
@section('title')
    <title>Tuntunji Realty | My Favourite</title>
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
        /*.rotated{
            -webkit-transform:rotate(45deg);
            -moz-transform:rotate(45deg);
            -ms-transform:rotate(45deg);
            transform:rotate(45deg);
        }*/
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
        <div class="row mt-40">
            @include('frontend.dashboard.include.navigation_bar')

            <div class="col-lg-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="fs-30 fw-700">Favorities</h1>
                            </div>
                        </div>
                        <div class="row mt-40">
                            <div class="col-lg-12">
                                <!-- success message -->
                                @if( Session::has( 'success' ))
                                    <div class="alert alert-success" style="margin-top: 30px;">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Success! </strong>{{ Session::get( 'success' ) }}
                                    </div>
                                @endif
                                @if(empty($favourite))
                                    Whoops! No Records Found
                                @else
                                    @foreach($favourite as $fav_data)
                                        <input type="hidden" name="property_id" value="{{$fav_data['property_id']}}">

                                    @if($fav_data['properties']['property_type'] == "sale")
                                            @php($url =  url('sale-property').'/'.$fav_data['properties']['id'])
                                        @else
                                            @php($url =  url('pre-construct-property').'/'.$fav_data['properties']['id'])
                                        @endif
                                            <div class="appartment-box mt-20">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="owl-carousel owl-theme">
        {{--                                                @php($url = ($fav_data['user_details']['role']) == 'admin' ? 'admin-panel/assets/property-images/media-file/sale/' : 'frontend/assets/property-images/media-file/')--}}
        {{--                                                @if(!empty($fav_data['multiple_media']))--}}
                                                        @if($fav_data['properties']['multiple_media'])
                                                            @foreach($fav_data['properties']['multiple_media'] as $mediaFile)
                                                                <div class="item">
        {{--                                                                Database Image display--}}
                                                                    @if($fav_data['properties']['source'] == 'Admin' && $fav_data['properties']['property_type'] == 'pre-construct')
                                                                        <a href="{{$url}}"> <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$mediaFile['media_name'])}}" alt="" class="img-fluid" height="325px" width="319px"></a>
                                                                    @elseif($fav_data['properties']['source'] == 'Admin' && $fav_data['properties']['property_type'] == 'sale')
                                                                        <a href="{{$url}}"><img src="{{asset('admin-panel/assets/property-images/media-file/sale/'.$mediaFile['media_name'])}}" alt="" class="img-fluid" height="325px" width="319px"></a>
                                                                    @elseif($fav_data['properties']['source'] == 'Frontend' && $fav_data['properties']['property_type'] == 'sale')
                                                                        <a href="{{$url}}"><img src="{{asset('frontend/assets/property-images/media-file/'.$mediaFile['media_name'])}}" alt="" class="img-fluid" height="325px" width="319px"></a>
                                                                    @else
                                                                        <a href="{{$url}}"><img src="{{asset('default/404-not-found.jpg')}}" alt="" class="img-fluid" height="325px" width="319px"></a>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            <img src="{{asset('default/404-not-found.jpg')}}" alt="ll" class="img-fluid" height="325px" width="319px">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="p-20">
                                                        <a href="{{$url}}" class="text-black" style="text-decoration: none;">
                                                            <h4 class="fs-22 fw-700 mt-20">${{$fav_data['properties']['price']}} <br>
{{--                                                                <span class="fs-12 text-grey">{{$fav_data['properties']['address']}}</span>--}}
                                                            </h4>
                                                        </a>
                                                        <a href="{{$url}}" class="text-black" style="text-decoration: none;"><span class="fs-12 text-grey">
                                                            by @if($findagent[0]['agent_details'] == null)-@else {{($findagent[0]['agent_details']['fullName']) ? $findagent[0]['agent_details']['fullName'] : '-'}}@endif
                                                            </span></a>
                                                        <div class="blue-bar mt-20">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-3">
                                                                    <a href="{{$url}}" class="text-black" style="text-decoration: none;"><h6 class="fs-14 mb-0">${{($fav_data['properties']['price']) ? $fav_data['properties']['price'] : '-'}}</h6></a>
                                                                    <a href="{{$url}}" class="text-black" style="text-decoration: none;"><span class="fs-12 text-grey">
                                                                        8,002 / sq ft
                                                                        </span></a>
                                                                </div>
                                                                <div class="col-lg-3 col-3">
                                                                    <a href="{{$url}}" class="text-black" style="text-decoration: none;"> <h6 class="fs-14 mb-0">{{($fav_data['properties']['size_in_ft2']) ? $fav_data['properties']['size_in_ft2'] : '-'}}</h6></a>
                                                                    <a href="{{$url}}" class="text-black" style="text-decoration: none;"><span class="fs-12 text-grey">
                                                                        Area in sq ft
                                                                        </span></a>
                                                                </div>
                                                                <div class="col-lg-3 col-3">
                                                                    <a href="{{$url}}" class="text-black" style="text-decoration: none;">
                                                                        @if($fav_data['properties']['internal_status'] == '0')
                                                                            <h6 class="fs-14 mb-0">
                                                                                Pending
                                                                            </h6>
                                                                        @elseif($fav_data['properties']['internal_status'] == '1')
                                                                            <h6 class="fs-14 mb-0">
                                                                                Approved
                                                                            </h6>
                                                                        @else
                                                                            <h6 class="fs-14 mb-0">
                                                                                Rejected
                                                                            </h6>
                                                                        @endif
                                                                        <span class="fs-12 text-grey">
                                                                            Property Status
                                                                        </span>
                                                                    </a>
{{--                                                                    <a href="{{$url}}" class="text-black" style="text-decoration: none;"><span class="fs-12 text-grey">--}}
{{--                                                                        Property Status--}}
{{--                                                                        </span></a>--}}
                                                                </div>
                                                                <div class="col-lg-3 col-3">
                                                                    <a href="{{$url}}" class="text-black" style="text-decoration: none;">
                                                                        <h6 class="fs-14 mb-0">{{($fav_data['properties']['reject_reason']) ? $fav_data['properties']['reject_reason'] : '-'}}</h6>
                                                                    </a>
                                                                    <a href="{{$url}}" class="text-black" style="text-decoration: none;"><span class="fs-12 text-grey">
                                                                       Reason
                                                                        </span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-20">
                                                            <div class="col-lg-8">
                                                                <a href="{{$url}}" class="text-black" style="text-decoration: none;"><ul class="list-unstyled list-inline d-flex">
                                                                    <li class="list-inline-item"><i class="fas fa-map-marker-alt"></i></li>
                                                                    <li class="list-inline-item">{{($fav_data['properties']['address']) ? $fav_data['properties']['address'] : '-'}}</li>
                                                                    </ul></a>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <a href="{{$url}}" class="text-black" style="text-decoration: none;"><ul class="list-unstyled list-inline">
                                                                    <li class="list-inline-item"><i class="far fa-calendar-minus"></i></li>
                                                                    <li class="list-inline-item">Posted on {{date('Y-m-d', strtotime($fav_data['properties']['address'])) ? date('Y-m-d', strtotime($fav_data['properties']['address'])) : '-'}}</li>
                                                                    </ul></a>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-8">
                                                                @if($fav_data['properties']['property_type'] == "sale")
                                                                <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;" data-toggle="modal" data-target="#myAgentModal">Contact Seller</button>
                                                                @else
                                                                    <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;" data-toggle="modal" data-target="#myRegisterModal">Contact Seller</button>
                                                                @endif
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                </div>
                                    @endforeach
                                        <div class="row mt-70">
                                            <div class="col-lg-12">
                                                {{$favourite->links('frontend.pages.pagination.my-favourites-pagination')}}</div></div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- end of my favorites-->
                </div>
            </div>
        </div>
    </div>

    @include('frontend.include.news-letter-2')
    <!-- subscribe for newsletter -->
    <!-- contact listing agent-popup modal start here-->
    <div class="modal fade" id="myAgentModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                {{--                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>--}}
                <div class="contact-agent-box">
                    <button type="button" class="close close-popup" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="agent-topbox">
                        {{--<button type="button" data-dismiss="modal" aria-label="Close">&times;</button>--}}
                        <h6 class="fs-16">Contact Listing Agent</h6>
                        <p class="fs-12">Morbi accumsan ipsum velit nam nec tellus a odiose tincidunt auctor aerat consequat auctor</p>
                    </div>
                    <div class="modal-body">
                        {{-- <p>Some text in the modal.</p>--}}
                        <form id="form2">
                            <!-- sign-up-empty-field-error-message -->
                            <div id="signUpErrorMessage" style="color:red;"></div>
                            <!-- sign-up-success-message -->
                            <div id="signUpSuccessMessage" class="text-success"></div>
                            <div class="form-group mt-10">
                                <label for="exampleFormControlSelect1" class="fs-12">Agent’s Name:</label>
                                <input class="form-control br-30 fs-12" id="agent_fullName" name="agent_fullName" value="{{isset($findagent[0]['agent_details']['fullName']) ? ($findagent[0]['agent_details']['fullName']) : null}}" placeholder="Type your Full name" disabled>
{{--                                <!-- validation error message -->--}}
{{--                                @error('agent_fullName')--}}
{{--                                <p style="color: red;">{{$message}}</p>--}}
{{--                                @enderror--}}
                            </div>
                            <div class="form-group mt-10">
                                <label for="exampleFormControlSelect1" class="fs-12">Agent’s Phone Number:</label>
                                <input class="form-control br-30 fs-12" id="agent_phone" name="agent_phone" value="{{isset($findagent[0]['agent_details']['phone']) ? ($findagent[0]['agent_details']['phone']) : null}}" placeholder="Type your Phone Number" disabled>
                                <!-- validation error message -->
                                @error('agent_phone')
                                <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group mt-10">
                                <label for="exampleFormControlSelect1" class="fs-12">Agent’s Email:</label>
                                <input class="form-control br-30 fs-12" id="agent_email" name="agent_email" value="{{isset($findagent[0]['agent_details']['email']) ? ($findagent[0]['agent_details']['email']) : null}}" placeholder="Type your Email" disabled>
                                <!-- validation error message -->
                                @error('agent_email')
                                <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="agent-footer">
                                <div class="row">
                                    <div class="col-lg-6">
                                        {{--<a class="btn btn-info agent_info" style="font-size: 14px; padding: 10px 20px !important;">Email Now</a>--}}
                                        {{--https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=radha.tinnypixel@gmail.com&body=Hi--}}
                                        <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=radha.tinnypixel@gmail.com&body=name:{{isset($findagent[0]['agent_details']['fullName']) ? ($findagent[0]['agent_details']['fullName']) : null}},Phone:{{isset($findagent[0]['agent_details']['phone']) ? ($findagent[0]['agent_details']['phone']) : null}},Email:{{isset($findagent[0]['agent_details']['email']) ? ($findagent[0]['agent_details']['email']) : null}}" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Email now</a>
                                    </div>
                                    <div class="col-lg-6">
                                        {{--tel:123-456-7890--}}
                                        <a href="tel:+123-456-780" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Call now</a>
                                        {{--                                        <a href="tel:123-456-7890">CLICK TO CALL</a>--}}
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    {{--                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- contact listing agent-popup modal end here -->
    <!-- Register inquiry-popup modal start here -->
    <div class="modal fade" id="myRegisterModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                {{--                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>--}}
                <div class="contact-agent-box">
                    <button type="button" class="close close-popup" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="agent-topbox">
                        {{--                                            <button type="button" data-dismiss="modal" aria-label="Close">&times;</button>--}}
                        <h6 class="fs-16">Contact Listing Agent</h6>
                        <p class="fs-12">Morbi accumsan ipsum velit nam nec tellus a odiose tincidunt auctor aerat consequat auctor</p>
                    </div>
                    <div class="modal-body">
                        {{--                                            <p>Some text in the modal.</p>--}}
                        <form id="registerform">
                            <!-- sign-up-empty-field-error-message -->
                            <div id="inquiryErrorMessage" style="color:red;"></div>
                            <!-- sign-up-success-message -->
                            <div id="inquirySuccessMessage" class="text-success"></div>
                            <div class="form-group mt-10">
                                <label for="exampleFormControlSelect1" class="fs-12">Full Name:<span style="color: red">*</span></label>
                                <input class="form-control br-30 fs-12" id="inquiry_fullName" name="inquiry_fullName" value="{{old('inquiry_fullName')}}" placeholder="Type your Full Name">
                                <!-- validation error message -->
                                @error('inquiry_fullName')
                                <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group mt-10">
                                <label for="exampleFormControlSelect1" class="fs-12">Phone Number:<span style="color: red">*</span></label>
                                <input class="form-control br-30 fs-12" id="inquiry_phone" name="inquiry_phone" value="{{old('inquiry_phone')}}" placeholder="Type your Phone Number">
                                <!-- validation error message -->
                                @error('inquiry_phone')
                                <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group mt-10">
                                <label for="exampleFormControlSelect1" class="fs-12">Email Address:<span style="color: red">*</span></label>
                                <input class="form-control br-30 fs-12" id="inquiry_email" name="inquiry_email" value="{{old('inquiry_email')}}" placeholder="Type your Email">
                                <!-- validation error message -->
                                @error('inquiry_email')
                                <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                            {{--                            <p class="fs-12">Are you a brokerage or real estate agent<span style="color: red">*</span></p>--}}
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
                                    <div class="col-lg-12"><button type="button" class="btn btn-info" id="register_btn" style="font-size: 14px; padding: 10px 20px !important;">Register Now</button></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    {{--                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- Register inquiry-popup modal end here -->
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
    <!-- Begin my property slider -->
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
<!-- End my property slider -->
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
<!-- sale - agent-inquiry-popup-form script start here -->
<script>
    $(document).ready(function () {
        //Register Function
        // $('.form2').validate();
        $('.agent_btn').click(function () {
            //$("#signUpErrorMessage").empty();

            let full_name = $('#agent_fullName').val();
            let phone_number = $('#agent_phone').val();
            let email_address = $('#agent_email').val();
            let which_button = $(this).attr('data-button');

            if(full_name != "" && phone_number != "" && email_address != "") {

                $.ajax({
                    type    : 'post',
                    url     : '{{ url("/save-agent-inquiry") }}',
                    data    : {
                        _token          : '{{ @csrf_token() }}',
                        agent_fullName  : full_name,
                        agent_phone     : phone_number,
                        agent_email     : email_address
                    },
                    success : function(response){
                        console.log(response);
                        if(response.success === 1) {
                            if(which_button === 'email_button') {
                                let message = 'first name = '+full_name+' agent phone = '+phone_number+' agent email = '+email_address;
                                window.location.href='https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=radha.tinnypixel@gmail.com&body='+message;
                            } else {
                                window.location.href='tel:123-456-7890';
                            }
                        } else {
                            alert(response.message);
                        }
                    },
                    error  : function (response) {
                        alert(response.statusText);
                    }
                });

            } else {
                $("#signUpErrorMessage").append("Please fill required fields!");
            }
        });



        $('.agent_btn_old').click(function () {
            //alert('Register button clicked');
            $("#signUpErrorMessage").empty();
            //get text-field values by id
            var full_name = $('#agent_fullName').val();
            var phone_number = $('#agent_phone').val();
            var email_address = $('#agent_email').val();
            //alert(full_name + " " + phone_number + " " + email_address);
            let which_button = $(this).attr('data-button');
            //console.log(which_button);
            if(full_name != "" && phone_number != "" && email_address != "") {
                /*$.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });*/
                //if email button or contact button clicked first ask for validation
                // if(which_button === 'email_button') {
                //     alert('data validated!');
                //     let message = 'first name = '+full_name+' agent phone = '+phone_number+' agent email = '+email_address;
                //     window.location.href='https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=radha.tinnypixel@gmail.com&body='+message;
                // } else {
                //     window.location.href='tel:123-456-7890';
                // }

                $.ajax({
                    type    : 'post',
                    url     : '{{ url("/save-agent-popup") }}',
                    data    : {
                        _token          : '{{ @csrf_token() }}',
                        agent_fullName  : full_name,
                        agent_phone     : phone_number,
                        agent_email     : email_address
                    },
                    success : function(return_res){
                        console.log(return_res);
                        //var newRes = JSON.parse(JSON.stringify(return_res));
                        //if(which_button === 'email_button') {
                        // alert(newRes);
                        // if(newRes.success == "1"){
                        //     alert('agebt saved');
                        // }else{
                        //     alert('agent not saved');
                        // }
                        // let message = 'first name = '+full_name+' agent phone = '+phone_number+' agent email = '+email_address;
                        // window.location.href='https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=radha.tinnypixel@gmail.com&body='+message;
                        /*} else {
                            window.location.href='tel:123-456-7890';
                        }*/
                        // if(newRes.success == "1"){
                        //     //success-message
                        //     // //console.log(which_button)
                        //     // if(which_button === 'email_button') {
                        //     //     let message = 'first name = '+full_name+' agent phone = '+phone_number+' agent email = '+email_address;
                        //     //     //window.location.href='https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=radha.tinnypixel@gmail.com&body='+message;
                        //     //     let url = 'https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=radha.tinnypixel@gmail.com&body='+message;
                        //     //     window.open(url, '_blank');
                        //     // } else {
                        //     //
                        //     // }
                        //
                        //
                        //     $("#signUpSuccessMessage").empty().append(newRes.message);
                        //     setTimeout(function() {
                        //         $('#myModal').modal('hide');    //hide modal after successfully submit data
                        //         $('#signUpSuccessMessage').hide(); //hide success message after successfully submit data
                        //         $('#form2').trigger('reset') // reset form after successfully submit data after close modal
                        //     }, 4000);
                        // }else{
                        //     $("#signUpErrorMessage").append(newRes.message);
                        // }
                        //var newRes = JSON.parse(JSON.stringify(return_res));
                    }
                });
            }else{
                $("#signUpErrorMessage").append("Please fill required fields!");
            }
        });
    });
</script>
<!-- sale - agent-inquiry-popup-form script end here -->
<!-- pre-construct register now popup modal script start here -->
<!-- inquiry-popup-form script start here -->
<script>
    $(document).ready(function () {
        //Register Function
        $('#register_btn').click(function () {
            //alert('Register button clicked');
            $("#inquiryErrorMessage").empty();
            //get text-field values by id
            var customer_full_name = $('#inquiry_fullName').val();
            var customer_phone_number = $('#inquiry_phone').val();
            var customer_email_address = $('#inquiry_email').val();
            var isChecked = jQuery("input[name=selector]:checked").val();
            var customerId= $("input[name=user_id]").val();
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
            //alert(customer_full_name + " " + customer_phone_number + " " + customer_email_address + " " + isChecked);
            if(customer_full_name != "" && customer_phone_number != "" && customer_email_address != "" && isChecked != ""){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var id= $("input[name=property_id]").val();
                $.ajax({
                    url: '{{url("/register-inquiry")}}' + '/' + id,
                    type: 'post',
                    //dataType: 'json',
                    data: {
                        inquiry_fullName: customer_full_name,inquiry_phone: customer_phone_number,inquiry_email: customer_email_address,selector : isChecked,user_id:customerId},
                    success: function(return_res){
                        console.log(return_res);
                        var newRes = JSON.parse(JSON.stringify(return_res));
                        if(newRes.success == "1"){
                            //alert("register successful");
                            //success-message
                            $("#inquirySuccessMessage").empty().append(newRes.message);
                            setTimeout(function() {
                                $('#myRegisterModal').modal('hide');    //hide modal after successfully submit data
                                $('#inquirySuccessMessage').hide(); //hide success message after successfully submit data
                                $('#registerform').trigger('reset') // reset form after successfully submit data after close modal
                            }, 4000);
                        }else{
                            $("#inquiryErrorMessage").append(newRes.message);
                        }
                        //var newRes = JSON.parse(JSON.stringify(return_res));
                    }
                });
            }else{
                $("#inquiryErrorMessage").append("Please fill required fields!");
            }
        });
    });
</script>
<!-- pre-construct register now popup modal script end here -->

<!-- begin social-share-icon-script -->

@endsection
