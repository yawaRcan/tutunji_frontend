 @include('frontend.include.head')
 <!-- begin social-media share icon style -->
 <title>Tuntunji Realty | Pop Up Sale</title>
 <style>
     /*.list-inline-item:not(:last-child){*/
     /*    margin-right: 0;*/
     /*}*/
     .btn-icon{
         border:0;
         outline:0;
         height:40px;
         width:40px;
         border-radius:40px;
         background-color:#ccc;
         text-align: center;
         padding-top: 10px;
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
     
     .desktop-modal-close {
    display: none;
}
 </style>
 <!-- end social-media share icon style -->
<body class="bg-greyishblue">
<div class="container">
    <div class="row mt-40">
        <div class="col-lg-12">
            <h4 class="fs-24 fw-700 text-white">{{$sliderData[0]['title']}} <span class="fs-18 text-grey fw-400">in {{$sliderData[0]['city']}}, {{$sliderData[0]['country']}}</span></h4>
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
                <li class="list-inline-item"> <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 14px !important;" data-toggle="modal" data-target="#myModal">Contact Listing Agent</button></li>
                <li class="list-inline-item">
{{--                    <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Back</button>--}}
                    <a href="{{url('sale-property',$sliderData[0]['id'])}}" class="btn btn-info" style="font-size: 14px; padding: 10px 62px !important;">Back</a>
                </li>
            </ul>
        </div>
    </div>
    <hr>
</div>
<div class="container-fluid blog mt-40 position-relative">
    <div class="row">
        <div class="col-lg-12 pr-0 pl-0">
           <?php $imageSlider =  $sliderData[0]['multiple_media'];?>
{{--               @if(count($imageSlider) > 1)--}}
                @if($totalImageAvailable > 1)
                   <div class="owl-carousel blog-carousel top-250 owl-theme">
                       @foreach($sliderData[0]['multiple_media'] as $mediaFile)
                           <div class="item">
                               @if($sliderData[0]['source'] == 'Frontend')
                                   <img src="{{asset('frontend/assets/property-images/media-file/'.$mediaFile['media_name'])}}" alt="slider img" class="img-fluid slider-img-mob" style="border: solid 1px #f3f3f3;background: #fff;"> {{--style="height: 400px; width: 900px"--}}
                               @else
                                   <img src="{{asset('admin-panel/assets/property-images/media-file/sale/'.$mediaFile['media_name'])}}" alt="slider img" class="img-fluid slider-img-mob" style="border: solid 1px #f3f3f3;background: #fff;">
                               @endif
                           </div>
                       @endforeach
                   </div>
               @else
                <div class="text-center col-12">
                    @if($sliderData[0]['source'] == 'Frontend')
                        <img src="{{asset('frontend/assets/property-images/media-file/'.$imageSlider[0]['media_name'])}}" alt="slider img" class="img-fluid slider-img-mob" style="border: solid 1px #f3f3f3;background: #fff;">
                    @else
                        <img src="{{asset('admin-panel/assets/property-images/media-file/sale/'.$imageSlider[0]['media_name'])}}" alt="slider img" class="img-fluid slider-img-mob" style="border: solid 1px #f3f3f3;background: #fff;">
                    @endif
                </div>
               @endif
        </div>


    </div>

</div>
        {{-- for desktop --}}
        <div class="sale-slider-banner-web">
            <div class="bhk-box mt-20 sale-slider-banner" data-toggle="modal" data-target="#myModal" style="border : 0;background-image: url('{{asset("admin-panel/assets/property-images/sale_2500x342.webp")}}');
            width: 100%;padding: 0;background-size: 100% ;cursor: pointer;background-position: center; background-repeat: no-repeat;">
            </div>
        </div>

        {{-- for mobile --}}
        <div class="sale-slider-banner-mobile">
            <div class="bhk-box mt-20 sale-slider-banner" data-toggle="modal" data-target="#myModal" style="border : 0;background-image: url('{{asset("admin-panel/assets/property-images/mobile-banner-sale.webp")}}');
            width: 100%;padding: 0;background-size: 100%;cursor: pointer;background-position: center; background-repeat: no-repeat;">
            </div>
        </div>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            {{--                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>--}}
            <div class="contact-agent-box">
                <button type="button" class="close close-popup desktop-modal-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="agent-topbox">
                    {{--                                                <button type="button" data-dismiss="modal" aria-label="Close">&times;</button>--}}
                    <h6 class="fs-16">Contact Listing Agent</h6>
                    <p class="fs-12">Get in Touch with the Listing Agent for More Information About This Property - Contact Us Below Today!</p>
                </div>
                <div class="modal-body">
                    {{--                                                <p>Some text in the modal.</p>--}}
                    <form id="form2">
                        <!-- sign-up-empty-field-error-message -->
                        <div id="signUpErrorMessage" style="color:red;"></div>
                        <!-- sign-up-success-message -->
                        <div id="signUpSuccessMessage" class="text-success"></div>
                        <div class="form-group mt-10">
                            <label for="exampleFormControlSelect1" class="fs-14">Agent’s Name:</label>
                            <input class="form-control br-30 fs-14" id="agent_fullName" name="agent_fullName" value="{{isset($sliderData[0]['agent_details']['fullName']) ? ($sliderData[0]['agent_details']['fullName']) : null}}" placeholder="Type your Full name" disabled>
{{--                            <!-- validation error message -->--}}
{{--                            @error('agent_fullName')--}}
{{--                            <p style="color: red;">{{$message}}</p>--}}
{{--                            @enderror--}}
                        </div>
                        <div class="form-group mt-10">
                            <label for="exampleFormControlSelect1" class="fs-14">Agent’s Phone Number:</label>
                            <input class="form-control br-30 fs-14" id="agent_phone" name="agent_phone" value="{{isset($sliderData[0]['agent_details']['phone']) ? ($sliderData[0]['agent_details']['phone']) : null}}" placeholder="Type your Phone Number" disabled>
                            <!-- validation error message -->
                            @error('agent_phone')
                            <p style="color: red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group mt-10">
                            <label for="exampleFormControlSelect1" class="fs-14">Agent’s Email:</label>
                            <input class="form-control br-30 fs-14" id="agent_email" name="agent_email" value="{{isset($sliderData[0]['agent_details']['email']) ? ($sliderData[0]['agent_details']['email']) : null}}" placeholder="Type your Email" disabled>
                            <!-- validation error message -->
                            @error('agent_email')
                            <p style="color: red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="agent-footer">
                            <div class="row">
                                <div class="col-lg-6" style="margin-top: 5px;">
                                    {{--<a class="btn btn-info agent_info" style="font-size: 14px; padding: 10px 20px !important;">Email Now</a>--}}
                                    {{--https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=radha.tinnypixel@gmail.com&body=Hi--}}
                                    <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=radha.tinnypixel@gmail.com&body=name:{{isset($sliderData[0]['agent_details']['fullName']) ? ($sliderData[0]['agent_details']['fullName']) : null}},Phone:{{isset($sliderData[0]['agent_details']['phone']) ? ($sliderData[0]['agent_details']['phone']) : null}},Email:{{isset($sliderData[0]['agent_details']['email']) ? ($sliderData[0]['agent_details']['email']) : null}}" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Email now</a>
                                </div>
                                <div class="col-lg-6" style="margin-top: 5px;">
                                    {{--tel:123-456-7890--}}
                                    <a href="tel:+123-456-780" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Call now</a>
                                    {{--                                        <a href="tel:123-456-7890">CLICK TO CALL</a>--}}
                                </div>
                            </div>
                            {{--                                <div class="row">--}}
                            {{--                                    <div class="col-lg-12"><button type="button" class="btn btn-info" id="agent_btn" style="font-size: 14px; padding: 10px 20px !important;">Register Now</button></div>--}}
                            {{--                                </div>--}}
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
{{--<div data-toggle="modal" data-target="#myModal" style="background-image: url('{{asset("frontend/assets/imgs/static-banner-img.png")}}');height: 200px;width: 100%;--}}
{{--background-size: cover;cursor: pointer">--}}
{{--    <div class="col-md-2 col-sm-2 col-xs-2" style="margin-left: auto;margin-right: auto;padding-top: 80px;">--}}
{{--        <a href="http://127.0.0.1:8000/sign-in" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;" data-toggle="modal" data-target="#myModal">Contact Listing Agent</a>--}}
{{--    </div>--}}
</div>
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
{{--                // if(which_button === 'email_button') {--}}
{{--                //     alert('data validated!');--}}
{{--                //     let message = 'first name = '+full_name+' agent phone = '+phone_number+' agent email = '+email_address;--}}
{{--                //     window.location.href='https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=radha.tinnypixel@gmail.com&body='+message;--}}
{{--                // } else {--}}
{{--                //     window.location.href='tel:123-456-7890';--}}
{{--                // }--}}

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
{{--                        // alert(newRes);--}}
{{--                        // if(newRes.success == "1"){--}}
{{--                        //     alert('agebt saved');--}}
{{--                        // }else{--}}
{{--                        //     alert('agent not saved');--}}
{{--                        // }--}}
{{--                        // let message = 'first name = '+full_name+' agent phone = '+phone_number+' agent email = '+email_address;--}}
{{--                        // window.location.href='https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=radha.tinnypixel@gmail.com&body='+message;--}}
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
<!-- end social-share-icon-script -->

    <script>
$(window).on('resize', function() {
  var windowWidth = $(window).width();
  var newHeight = 342 * (windowWidth / 2500); // Adjust the factor (2500) as per your requirement
  $('.sale-slider-banner').css('height', newHeight + 'px');
}).trigger('resize');


    </script>

</body>

</html>
