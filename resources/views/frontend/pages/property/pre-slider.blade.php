@include('frontend.include.head')
    <title>Tuntunji Realty | Pop Up Pre-construction</title>
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
        .backend-banner{
            height: auto;
            width: 100%;
            background-size: cover;
            cursor: pointer;
            background-position: center;
        }
        .desktop-modal-close {
    display: none;
}
    </style>
    <!-- end social-media share icon style -->
<body class="bg-greyishblue">
<div class="container">
    <div class="row mt-40">
        <div class="col-lg-12">
            <h4 class="fs-24 fw-700 text-white">{{$sliderData[0]['title']}} <span class="fs-18 text-grey fw-400">in {{$sliderData[0]['address']}}, {{$sliderData[0]['country']}}</span></h4>
        </div>
    </div>
    <div class="row mt-20">
        <div class="col-lg-6 center">
            <h1 class="fs-30 fw-700 text-white">
                @if($sliderData[0]['before_price_label'] != null && $sliderData[0]['after_price_label'] != null)
                    {{$sliderData[0]['before_price_label']}}
                @endif
                ${{$sliderData[0]['price'] ? $sliderData[0]['price'] : '-' }}
                @if($sliderData[0]['after_price_label'] != null && $sliderData[0]['before_price_label'] != null)
                    {{$sliderData[0]['after_price_label']}}
                @endif
            </h1>
        </div>
        <div class="col-lg-6 mt-21">
            <ul class="list-unstyled list-inline d-flex justify-content-end align-items-center center">
                <li class="list-inline-item">
                    <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;" data-toggle="modal" data-target="#myModal">Register Now</button>
{{--                    <a href="{{url('/sign-in')}}" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;" data-toggle="modal" data-target="#myModal">Register Now</a>--}}
                </li>
                <li class="list-inline-item">
                    {{--                    <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Back</button>--}}
                    <a href="{{url('/pre-construct-property',$sliderData[0]['id'])}}" class="btn btn-info" style="font-size: 14px; padding: 10px 47px !important;">Back</a>
                </li>
            </ul>
        </div>
    </div>
{{--    <div class="row">--}}
{{--        <div class="col-lg-6 center">--}}
{{--        <h1 class="fs-30 fw-700 text-white">${{$sliderData[0]['before_price_label']}}&nbsp;<span class="fs-18 text-grey fw-400">Before Price</span></h1>--}}
{{--        </div>--}}
{{--        <div class="col-lg-6 center">--}}
{{--            <h1 class="fs-30 fw-700 text-white">${{$sliderData[0]['after_price_label']}}&nbsp;<span class="fs-18 text-grey fw-400">After Price</span></h1></div>--}}
{{--    </div>--}}
    <hr>
</div>
<div class="container-fluid blog mt-40 position-relative">
    <div class="row">
        <div class="col-lg-12 pr-0 pl-0">
            <?php $imageSlider =  $sliderData[0]['multiple_media'];?>
                @if($totalImageAvailable > 1)
                    <div class="owl-carousel blog-carousel top-250 owl-theme">
                        @foreach($sliderData[0]['multiple_media'] as $mediaFile)
                            <div class="item">
                                <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$mediaFile['media_name'])}}" alt="" class="img-fluid w-100" style="border: solid 1px #f3f3f3;background: #fff;">
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center col-12">
                        <img src="{{asset('admin-panel/assets/property-images/media-file/pre-construct/'.$imageSlider[0]['media_name'])}}" alt="" class="img-fluid" style="border: solid 1px #f3f3f3;background: #fff;">  {{--style="height: 400px; width: 900px"--}}
                    </div>
                @endif
            </div>
        </div>
    </div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            {{--                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>--}}
            <div class="contact-agent-box">
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
                        <!-- sign-up-empty-field-error-message -->
                        <div id="signUpErrorMessage" style="color:red;"></div>
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
                            <div class="col-lg-6">
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
                            <div class="col-lg-6">
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
                        <input type="hidden" name="agent_id" id="agent_id" value="{{$sliderData[0]['id']}}">
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
<!-- banner Begin -->
{{-- for desktop --}}
<div class="pre-slider-banner-web">
    @if($getBanner_4->count() > 0)
        <div class="bhk-box mt-20 backend-banner pre-slider-banner-footer" data-toggle="modal" data-target="#myModal" style="background-image: url('{{asset("admin-panel/assets/property-images/banner-2/".$getBanner_4[0]->banner_2)}}');width: 100%;padding: 0;background-size: 100%;cursor: pointer;background-position: bottom center;border: 0; background-repeat: no-repeat;"></div>
    @else
        <div class="bhk-box mt-20 backend-banner pre-slider-banner-footer" data-toggle="modal" data-target="#myModal" style="background-image: url('{{asset("admin-panel/assets/property-images/2500x342.webp")}}');width: 100%;padding: 0;background-size: 100%;cursor: pointer;background-position: bottom center;border: 0; background-repeat: no-repeat;"></div>
    @endif
</div>

{{-- for mobile --}}
<div class="pre-slider-banner-mobile">
    @if($getBanner_6->count() > 0)
        <div class="bhk-box mt-20 backend-banner pre-slider-banner-footer" data-toggle="modal" data-target="#myModal" style="background-image: url('{{asset("admin-panel/assets/property-images/banner-6/".$getBanner_6[0]->banner_6)}}');width: 100%;padding: 0;background-size: 100%;cursor: pointer;background-position: bottom center;border: 0; background-repeat: no-repeat;"></div>
    @else
        <div class="bhk-box mt-20 backend-banner pre-slider-banner-footer" data-toggle="modal" data-target="#myModal" style="background-image: url('{{asset("admin-panel/assets/property-images/mobile-banner1.webp")}}');width: 100%;padding: 0;background-size: 100%;cursor: pointer;background-position: bottom center;border: 0; background-repeat: no-repeat;"></div>
    @endif
</div>
<!-- banner End -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="{{asset('')}}frontend/assets/js/jquery.js"></script>
<script src="{{asset('')}}frontend/assets/js/bootstrap.js"></script>
<script src="{{asset('')}}frontend/assets/js/bootstrap.bundle.js"></script>
<script src="{{asset('')}}frontend/assets/js/owl.carousel.js"></script>
<script>
    $('.blog-carousel').owlCarousel({
        loop: true,
        nav: true,
        stagePadding: 100,
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
                items: 2
            }
        }
    })

</script>

<!-- inquiry-popup-form script start here -->
<script>
    $(document).ready(function () {
        //Register Function
        $('#agent_btn').click(function () {
            //alert('Register button clicked');
            $("#signUpErrorMessage").empty();
            //get text-field values by id
            var full_name = $('#agent_fullName').val();
            var phone_number = $('#agent_phone').val();
            var email_address = $('#agent_email').val();
            var isChecked = jQuery("input[name=selector]:checked").val();
            var property_id = $('#agent_id').val();
            // var userId= $("input[name=user_id]").val();
            // console.log(userId);
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
                    data: {agent_fullName: full_name, agent_phone: phone_number, agent_email: email_address,selector : isChecked,property_id: property_id},
                    success : function(response){
                        var newRes = JSON.parse(JSON.stringify(response));
                        if(newRes.success == '3'){
                            $("#signUpErrorMessage").append(response.message);
                        }else if(newRes.success == '1'){
                            $('#save_errorList').html("");
                            $('#save_errorList').addClass('d-done');
                            $("#signUpSuccessMessage").empty().append(newRes.message);
                            setTimeout(function() {
                                // location.reload();
                                $('.close-popup').trigger('click');
                                $("#form2")[0].reset();
                                $('#signUpSuccessMessage').remove();
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
            }else{
                $("#signUpErrorMessage").append("Please fill required fields!");
            }
        });
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
                    $("#floor-plan-blur").css("filter", "blur(0px)");
                    $('.btn-floor').css("display","none");
                }
            }
        });
    }
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

<script>
$(window).on('resize', function() {
  var windowWidth = $(window).width();
  var newHeight = 342 * (windowWidth / 2500); // Adjust the factor (2500) as per your requirement
  $('.pre-slider-banner-footer').css('height', newHeight + 'px');
}).trigger('resize');


    </script>
<!-- end social-share-icon-script -->

</body>

</html>
