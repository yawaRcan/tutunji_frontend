<style>
    #footer-border{
        border-bottom: 1px solid white;
        width: 170px;
        padding-top: 10px;
    }
    @media only screen and (max-width: 600px) {
        .mobile-display-logo{
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .desktop-display-logo{
            display: none;
        }
        .mobile-display-company{
            display: block;
        }
        .desktop-display-company{
            display: none;
        }
    }
    @media only screen and (min-width: 600px) {
        .mobile-display-logo{
            display: none;
        }
        .desktop-display-logo{
            display: block;
        }
        .mobile-display-company{
            display: none;
        }
        .desktop-display-company{
            display: block;
        }
    }
</style>
<div class="bg-dark">
    <div class="container">
        <div class="row center">
            <div class="col-lg-4 col-6 desktop-display-logo">
                <a href="{{url('/')}}"><img src="{{asset('')}}frontend/assets/imgs/Tutunji Realty White (Brokered By).svg" alt="" height="200px" width="200px"></a><br>
                <img src="{{asset('')}}frontend/assets/imgs/logo2_white.svg" alt="" class="img-fluid" width="200px">

{{--                <div class="col-lg-2 col-4">--}}
{{--                    <a href="{{url('/')}}"><img src="{{asset('')}}frontend/assets/imgs/Logo SVG (Brokered By).svg" alt="" height="110px" width="160px"></a>--}}
{{--                    <img src="{{asset('')}}frontend/assets/imgs/MicrosoftTeams-image.png" height="106px" width="131px">--}}
{{--                    <div id="footer-border"></div>--}}
{{--                    <img src="{{asset('')}}frontend/assets/imgs/Cityscape White.svg" alt="" height="120px" width="160px">--}}
{{--                </div>--}}
{{--                <h5 class="fs-22 text-white">Learn More</h5>--}}

{{--                <ul class="list-unstyled mt-20">--}}
{{--                    <li class="mt-10"><a href="#about" class="text-grey" onclick="window.open('{{url('/about')}}');">About Tutunji Realty</a></li>--}}
{{--                    <li class="mt-10"><a href="#for_sales" class="text-grey" onclick="window.open('{{url('/sale-search')}}');">For Sale Properties</a></li>--}}
{{--                    <li class="mt-10"><a href="#pre_construction" class="text-grey" onclick="window.open('{{url('/pre-construct-search')}}');">Pre-Construction Properties</a></li>--}}
{{--                    <li class="mt-10"><a href="#browse_cities" class="text-grey">Browse Cities</a></li>--}}
{{--                    <li class="mt-10"><a href="#featured_in" class="text-grey">Featured In</a></li>--}}
{{--                    <li class="mt-10"><a href="#container-gsap" class="text-grey">Our Million Dollar Strategy</a></li>--}}
{{--                    <li class="mt-10"><a href="#testimonial" class="text-grey" onclick="window.open('{{url('/testimonial')}}');">Testimonials</a></li>--}}
{{--                    <li class="mt-10"><a href="#agent" class="text-grey" onclick="window.open('{{url('/agent')}}');">Our Agents</a></li>--}}
{{--                    <li class="mt-10"><a href="#blogs" class="text-grey" onclick="window.open('{{url('/blog-page')}}');">Blogs</a></li>--}}

{{--                    <li class="mt-10"><a href="{{url('/testimonial')}}" class="text-grey">Testimonials</a></li>--}}
{{--                    <li class="mt-10"><a href="{{url('/agent')}}" class="text-grey">Our Agents</a></li>--}}
{{--                    <li class="mt-10"><a href="{{url('/blog-page')}}" class="text-grey">Blogs</a></li>--}}
{{--                </ul>--}}
{{--                <h5 class="fs-22 text-white">Already a Member?</h5>--}}
{{--                <ul class="list-unstyled mt-20 list-inline">--}}
{{--                    <li class="list-inline-item text-green fs-20"><i class="far fa-user"></i></li>--}}
{{--                    <li class="list-inline-item mt-10"><a href="{{url('/coming-soon')}}" class="text-grey">Member Login</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
            </div>
            <div class="col-lg-4 col-6 desktop-display-company">
                <h5 class="fs-22 text-white">Company</h5>
                <ul class="list-unstyled mt-20">
                    <li class="mt-10"><a href="" class="text-grey">Partnerships</a></li>
                    <li class="mt-10"><a href="" class="text-grey">Tutunji Realty Ventures</a></li>
                    <li class="mt-10"><a href="{{url('/blog-page')}}" class="text-grey">Blogs</a></li>
                    <li class="mt-10"><a href="" class="text-grey">Acceptable Use Policy</a></li>
                    <li class="mt-10"><a href="" class="text-grey">Cookie Policy</a></li>
                    <li class="mt-10"><a href="" class="text-grey">DMCA Policy</a></li>
                    <li class="mt-10"><a href="" class="text-grey">Privacy Policy</a></li>
                    <li class="mt-10"><a href="" class="text-grey">Terms and Conditions</a></li>
                    <li class="mt-10"><a href="{{url('/about-cityScape')}}" class="text-grey" target="_blank">About Cityscape</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-6 mobile-display-company">
                <h5 class="fs-22 text-white">Company</h5>
                <ul class="list-unstyled mt-20">

                    <li class="mt-10"><a href="" class="text-grey">Partnerships</a></li>
                    <li class="mt-10"><a href="" class="text-grey">Tutunji Realty Ventures</a></li>
                    <li class="mt-10"><a href="{{url('/blog-page')}}" class="text-grey">Blogs</a></li>
                    <li class="mt-10"><a href="" class="text-grey">Acceptable Use Policy</a></li>
                    <li class="mt-10"><a href="" class="text-grey">Cookie Policy</a></li>
                    <li class="mt-10"><a href="" class="text-grey">DMCA Policy</a></li>
                    <li class="mt-10"><a href="" class="text-grey">Privacy Policy</a></li>
                    <li class="mt-10"><a href="" class="text-grey">Terms and Conditions</a></li>
                    <li class="mt-10"><a href="{{url('/about-cityScape')}}" class="text-grey">About Cityscape</a></li>
                </ul>
            </div>
            <div class="col-lg-4 footer-contact-holder">
                <h5 class="fs-22 text-white">Contact</h5>
                <ul class="list-unstyled mt-20">
                    <li class="mt-10 text-grey"><img src="{{asset('')}}frontend/assets/imgs/Icon%20ionic-ios-pin.png" alt="" class="img-fluid mr-2"> 885 Plymouth Dr UNIT 2, </br>&nbsp;&nbsp;&nbsp;&nbsp;Mississauga, ON L5V 0B5.</li>
                    <li class="mt-10 text-grey"><img src="{{asset('')}}frontend/assets/imgs/Icon%20material-email.png" alt="" class="img-fluid mr-2">Sales Team: <br> ontario@tutunjirealty.com</li>
                    <li class="mt-10 text-grey"><img src="{{asset('')}}frontend/assets/imgs/Icon%20material-email.png" alt="" class="img-fluid mr-2">Management Team: <br> management@tutunjirealty.com</li>
                    <li class="mt-10 text-grey"><img src="{{asset('')}}frontend/assets/imgs/Icon%20material-phone.png" alt="" class="img-fluid mr-2"> (416)-508-9065</li>
                    <li class="mt-10 text-grey"><img src="{{asset('')}}frontend/assets/imgs/Icon%20material-phone.png" alt="" class="img-fluid mr-2"> (647)-280-7889</li>
                    <li class="mt-10 text-grey"><img src="{{asset('')}}frontend/assets/imgs/office-buildings.svg" alt="" class="img-fluid mr-2"> (905)-241-2222</li>
                </ul>
                <h5 class="fs-22 text-white mt-60">Follow Us</h5>
                <ul class="list-unstyled list-inline mt-10 social-footer">
                    <li class="list-inline-item"><a href="https://www.facebook.com/profile.php?id=100083147635761"><i class="fab fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="https://twitter.com/tutunjirealty"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.linkedin.com/company/tutunji­realty"><i class="fab fa-linkedin"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.youtube.com/channel/UCIcmQYJ­a640KE6gcgXB5KIw"><i class="fab fa-youtube"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.instagram.com/tutunjirealty/"><i class="fab fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.tiktok.com/@tutunjirealty"><i class="fab fa-tiktok"></i></a></li>


                </ul>
                <div class="col-lg-4 col-6 mobile-display-logo">
                    <a href="{{url('/')}}"><img src="{{asset('')}}frontend/assets/imgs/Tutunji Realty White (Brokered By).svg" alt=""></a><br>
                    <img src="{{asset('')}}frontend/assets/imgs/logo2_white.svg" alt="" class="img-fluid" width="200px">
                </div>
                <ul class="list-unstyled list-inline mt-10">
                    <li class="list-inline-item"><img src="{{asset('')}}frontend/assets/imgs/canada%20flag.png" alt="" class="img-fluid">
                    </li>
                    <li class="list-inline-item">Proudly Canadian</li>
                </ul>
            </div>
        </div>
    </div>
</div>
