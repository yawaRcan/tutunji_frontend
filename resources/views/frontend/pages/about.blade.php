@extends('frontend.layout.master')
<!-- title -->
@section('title')
    <title>Tuntunji Realty | About Us</title>
@endsection
@section('content')
{{--    @if(Auth::check())--}}
{{--        <div class="bg-black pt-0">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-1 col-3 mt-20">--}}
{{--                        <img src="{{asset('')}}frontend/assets/imgs/LogoTransparent.png" alt="" class="img-fluid w-110 w-80">--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-8 dn mt-26 text-center">--}}
{{--                        <div class="input-group">--}}
{{--                            <input type=" text" class="form-control br-3" placeholder="Search Properties, Location, Projects..." aria-label="Recipient's username" aria-describedby="button-addon2">--}}
{{--                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-3 col-9 mt-26 mt-31 text-right p-0">--}}
{{--                        <ul class="list-unstyled list-inline d-flex justify-content-end">--}}
{{--                            <li type="button" class="list-inline-item text-green fs-20 dn1" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-search top-6"></i></li>--}}
{{--                            <li class="list-inline-item text-green">--}}
{{--                                <a href="{{url('/submit-property')}}" class="btn btn-primary mt-00 pt-8 fs-12" style="font-size: 14px;">--}}
{{--                                    <i class="fa fa-plus mr-2"></i> Submit Property--}}
{{--                                </a>--}}
{{--                                --}}{{--                        <button type="submit" class="btn btn-primary mt-00 pt-8 fs-12" style="font-size: 14px;">--}}
{{--                                --}}{{--                            <i class="fas fa-plus mr-2"></i> Submit Property</button>--}}
{{--                            </li>--}}
{{--                            <li class="list-inline-item">--}}
{{--                                @if(Auth::check() && Auth::user()->image)--}}
{{--                                    <img src="{{asset('frontend/assets/profile/'.Auth::user()->image)}}" class="user" width="40px">--}}
{{--                                @else--}}
{{--                                    <img src="{{asset('default/blank-profile.png')}}" class="user" width="40px">--}}
{{--                                @endif--}}
{{--                            </li>--}}
{{--                            --}}{{--                    <li class="list-inline-item">--}}
{{--                            --}}{{--                        <img src="{{asset('')}}frontend/assets/imgs/Ellipse%2057-1.png" alt="" class="img-fluid w-40">--}}
{{--                            --}}{{--                    </li>--}}
{{--                            <li class="list-inline-item">--}}
{{--                                <div class="dropdown">--}}
{{--                                    <a class="btn btn-secondary bg-transparent dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">--}}
{{--                                    </a>--}}
{{--                                    <div class="dropdown-menu r-0" aria-labelledby="dropdownMenuLink">--}}

{{--                                        --}}{{--                                <img src="{{asset('')}}frontend/assets/imgs/Ellipse%2057-1.png" alt="" class="img-fluid m-auto d-block">--}}
{{--                                        <div class="text-center">--}}
{{--                                            @if(Auth::check() && Auth::user()->image)--}}
{{--                                                <img src="{{asset('frontend/assets/profile/'.Auth::user()->image)}}" height="60px" width="60px" style="border-radius: 30px;">--}}
{{--                                            @else--}}
{{--                                                <img src="{{asset('default/blank-profile.png')}}" height="60px" width="60px" style="border-radius: 30px;">--}}
{{--                                            @endif--}}
{{--                                        </div>--}}

{{--                                        <h4 class="text-center mt-20"><a class="fs-16 fw-700 mt-10 text-black text-decoration-none" href="#">{{Auth::user()->name}}</a></h4>--}}
{{--                                        <h4 class="text-center"><a class="text-grey fs-14 text-decoration-none" href="#">{{Auth::user()->email}}</a></h4>--}}

{{--                                        <hr>--}}
{{--                                        <a class="dropdown-item" href="{{url('/dashboard')}}">Dashboard</a>--}}
{{--                                        <a class="dropdown-item" href="{{url('/my-properties')}}">My Properties</a>--}}
{{--                                        <a class="dropdown-item" href="{{url('/my-favourite')}}">Favorites</a>--}}
{{--                                        <a class="dropdown-item" href="{{url('/my-profile')}}">Profile</a>--}}
{{--                                        <hr>--}}
{{--                                        <a class="dropdown-item text-danger" href="{{url('/logout')}}">Logout</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    @endif--}}

    <div class="container">
{{--        <nav aria-label="breadcrumb">--}}
{{--            <ol class="breadcrumb">--}}
{{--                <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-darkgrey fw-700">Home</a></li>--}}
{{--                <li class="breadcrumb-item active fw-700" aria-current="page">About Us</li>--}}
{{--            </ol>--}}
{{--        </nav>--}}
        <div class="row">
            <div class="col-lg-12">
                @include('frontend.include.navbar')
            </div>
        </div>
    </div>

    <div class="bg-silver">
        <h1 class="fs-40 fw-700">About Us</h1>
    </div>
    <div class="bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 center">
                    <h2 class="fs-40 fw-700">Heading</h2>
                    <h4 class="fs-20 fw-700">Sub Heading - Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do.</h4>
                    <p class="mt-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                </div>
                <div class="col-lg-7">
                    <iframe width="100%" height="450" src="https://www.youtube.com/embed/f3NWvUV8MD8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>

        </div>
    </div>
    <div class="bg-green">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <h1 class="fs-40 text-center bb-2" style="border-bottom: 2px dashed #000000;color: #000000;">Our Million Dollar Strategy</h1>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-lg-8 offset-lg-2">
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et doloribus nihil aut odit expedita quam, fugiat consequuntur id repudiandae quo</p>
                </div>
            </div>
            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="about-carousel1 owl-carousel owl-theme">
                        <div class="item">
                            <div class="about-card">
                                <img src="{{asset('')}}frontend/assets/imgs/Rectangle-25.png" class="card-img-top img-fluid" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title fs-19 text-center">Data/Numbers</h5>
                                    <ul class="list-unstyled fs-17 text-center">
                                        <li>Selling Agent</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="about-card">
                                <img src="{{asset('')}}frontend/assets/imgs/Rectangle-25.png" class="card-img-top img-fluid" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title fs-19 text-center">Data/Numbers</h5>
                                    <ul class="list-unstyled fs-17 text-center">
                                        <li>Selling Agent</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="about-card">
                                <img src="{{asset('')}}frontend/assets/imgs/Rectangle-25.png" class="card-img-top img-fluid" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title fs-19 text-center">Data/Numbers</h5>
                                    <ul class="list-unstyled fs-17 text-center">
                                        <li>Selling Agent</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="about-card">
                                <img src="{{asset('')}}frontend/assets/imgs/Rectangle-25.png" class="card-img-top img-fluid" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title fs-19 text-center">Data/Numbers</h5>
                                    <ul class="list-unstyled fs-17 text-center">
                                        <li>Selling Agent</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid blog mt-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <h1 class="fs-40 text-center bb-2" style="border-bottom: 2px dashed #000000;color: #000000;">Meet Our <span class="fw-700">Team</span></h1>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-lg-8 offset-lg-2">
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et doloribus nihil aut odit expedita quam, fugiat consequuntur id repudiandae quo</p>
                </div>
            </div>
        </div>
        <div class="row mt-40 mb-80">
            <div class="col-lg-10 offset-lg-2 pr-0">
                <div class="owl-carousel blog-carousel owl-theme inline-img">
                    <div class="item">
                        <div class="card" style="width: 100%;">
                            <img src="{{asset('')}}frontend/assets/imgs/Group%202095.png" class="card-img-top img-fluid" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Name</h5>
                                <p class="card-text">Role</p>
                                <hr>
                                <ul class="list-unstyled list-inline text-center mb-0">
                                    <li class="list-inline-item">
                                        <a href="#"><img src="{{asset('')}}frontend/assets/imgs/Group%20265.png" alt="" class="img-fluid"></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#"><img src="{{asset('')}}frontend/assets/imgs/linkedin.png" alt="" class="img-fluid"></a>
                                    </li>
                                    <li class="list-inline-item"><a href=""><img src="{{asset('')}}frontend/assets/imgs/Group%20268.png" alt="" class="img-fluid"></a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card" style="width: 100%;">
                            <img src="{{asset('')}}frontend/assets/imgs/Group%202095.png" class="card-img-top img-fluid" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Name</h5>
                                <p class="card-text">Role</p>
                                <hr>
                                <ul class="list-unstyled list-inline text-center mb-0">
                                    <li class="list-inline-item">
                                        <a href="#"><img src="{{asset('')}}frontend/assets/imgs/Group%20265.png" alt="" class="img-fluid"></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#"><img src="{{asset('')}}frontend/assets/imgs/linkedin.png" alt="" class="img-fluid"></a>
                                    </li>
                                    <li class="list-inline-item"><a href=""><img src="{{asset('')}}frontend/assets/imgs/Group%20268.png" alt="" class="img-fluid"></a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card" style="width: 100%;">
                            <img src="{{asset('')}}frontend/assets/imgs/Group%202095.png" class="card-img-top img-fluid" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Name</h5>
                                <p class="card-text">Role</p>
                                <hr>
                                <ul class="list-unstyled list-inline text-center mb-0">
                                    <li class="list-inline-item">
                                        <a href="#"><img src="{{asset('')}}frontend/assets/imgs/Group%20265.png" alt="" class="img-fluid"></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#"><img src="{{asset('')}}frontend/assets/imgs/linkedin.png" alt="" class="img-fluid"></a>
                                    </li>
                                    <li class="list-inline-item"><a href=""><img src="{{asset('')}}frontend/assets/imgs/Group%20268.png" alt="" class="img-fluid"></a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h1 class="fs-40" style="border-bottom: 2px dashed #fff;color: #fff;">What the People think <span class="fw-700">About Us</span></h1>
                        </div>
                    </div>
                    <div class="row mt-40">
                        <div class="col-lg-12">
                            <div class="about-carousel2 owl-carousel owl-theme">
                                <div class="item">
                                    <div class="quote"><i class="fas fa-quote-left"></i></div>
                                    <p class="text-center mt-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod obcaecati dignissimos ducimus, omnis fuga! Fugiat reprehenderit recusandae illum consectetur, at voluptatem veritatis beatae! Cumque laborum cupiditate assumenda molestiae accusamus maxime.</p>
                                    <h4 class="fs-18 mt-20 text-center">Customer Name</h4>
                                </div>
                                <div class="item">
                                    <div class="quote"><i class="fas fa-quote-left"></i></div>
                                    <p class="text-center mt-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod obcaecati dignissimos ducimus, omnis fuga! Fugiat reprehenderit recusandae illum consectetur, at voluptatem veritatis beatae! Cumque laborum cupiditate assumenda molestiae accusamus maxime.</p>
                                    <h4 class="fs-18 mt-20 text-center">Customer Name</h4>
                                </div>
                                <div class="item">
                                    <div class="quote"><i class="fas fa-quote-left"></i></div>
                                    <p class="text-center mt-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod obcaecati dignissimos ducimus, omnis fuga! Fugiat reprehenderit recusandae illum consectetur, at voluptatem veritatis beatae! Cumque laborum cupiditate assumenda molestiae accusamus maxime.</p>
                                    <h4 class="fs-18 mt-20 text-center">Customer Name</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-grey" style="background-color: #EEEEEE">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
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
   @include('frontend.include.news-letter-1')
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
@endsection
@section('about-scripts')
    <script src="{{asset('')}}frontend/assets/js/owl.carousel.js"></script>
    <script>
        $('.about-carousel1').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>
    <script>
        $('.about-carousel2').owlCarousel({
            loop: true,
            margin: 10,
            center: true,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
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
                    items: 3
                }
            }
        })
    </script>
@endsection
