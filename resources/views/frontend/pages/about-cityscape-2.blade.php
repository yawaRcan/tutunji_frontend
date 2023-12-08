<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{--    <meta property="og:title" content="Check out this property on Tutunji Realty!">--}}
    {{--    <meta property="og:image" content="LogoTransparent.png">--}}

    <link rel="stylesheet" href="{{asset('')}}frontend/assets/css/bootstrap-grid.css">
    <link rel="stylesheet" href="{{asset('')}}frontend/assets/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('')}}frontend/assets/css/fontawesome-all.css">
    <link rel="stylesheet" href="{{asset('')}}frontend/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('')}}frontend/assets/css/owl.theme.default.css">
    <link rel="stylesheet" href="{{asset('')}}frontend/assets/css/about-cityscape.css">
    <link rel="stylesheet" href="{{asset('')}}frontend/assets/css/custom.css">
    <!-- begin dashboard-page-sidebar-menu-css -->
    <link rel="stylesheet" href="{{asset('')}}frontend/assets/css/pushy.css">
    <!-- end dashboard-page-sidebar-menu-css -->
    <!-- date-picker css -->
    @yield('date-picker-css')
    <!-- date-picker end -->
    <!-- fb-button-css -->
    @yield('fb-button-style')
    <link href="{{asset('')}}frontend/assets/css/style.css" type="text/css" rel="stylesheet">
    {{-- marker cluster js --}}
    <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
    <!-- title -->
    <title>CityScape | About</title>
    <!-- header-display-circle-img-style -->
    <style>
        .user {
            display: inline-block;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
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
        .banner {
            height: 850px;
            background: url("{{asset('frontend/assets/imgs/about-banner.jpg')}}");
            background-attachment: fixed;
            position: relative;
            background-position: center;
        }
        .banner-heading {
            position: absolute;
            top: 35%;
            left: 50%;
            -webkit-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            transform: translateX(-50%);
            text-align: right;
            color: #fff;
        }
        .svg-col {
            padding-left: 50px;
            max-width: 400px;
        }
        .banner h1 {
            margin-bottom: 0px !important;
        }
        .banner-heading h1 {
            font-size: 40px;
            letter-spacing: 0.05em;
            color: #fff;
            padding-right: 60px;
            font-weight: bold;
            text-shadow: #ffffff 2px 2px 8px;
            text-align: center;
        }
        .banner-heading .svg-col h3 {
            color: #fff;
            text-shadow: rgb(0 0 0 / 40%) 0px 4px 5px;
        }
        .svg-col h3 {
            font-size: 20px;
            margin-bottom: 5px;
            color: #282828;
            letter-spacing: 0.1em;
        }
        .banner-heading .non-hoverable {
            -webkit-transform: rotate(262.929deg);
            -ms-transform: rotate(262.929deg);
            transform: rotate(262.929deg);
            bottom: -210px;
            left: 90px;
            margin-top: -227px;
        }
        .aor-bg{
            background: url("{{asset('frontend/assets/imgs/about-bg1.png')}}");
        }
        .timeline{
            position: relative;
            height: 800px;
            background: url("{{asset('frontend/assets/imgs/timeline.jpg')}}");
            background-attachment: fixed;
            background-size: cover;
        }
        .lr-1{
            background: url("{{asset('frontend/assets/imgs/lrimg1.jpg')}}");
        }
        .lr-2{
            background: url("{{asset('frontend/assets/imgs/lrimg2.jpg')}}");
        }
        .lr-3{
            background: url("{{asset('frontend/assets/imgs/lrimg3.jpg')}}");
            background-size: 170%;
        }
        .lr-4{
            background: url("{{asset('frontend/assets/imgs/lrimg4.png')}}");
        }
        .lr-5{
            background: url("{{asset('frontend/assets/imgs/lrimg5.png')}}");
        }
        .lr-6{
            background: url("{{asset('frontend/assets/imgs/lrimg6.png')}}");
        }
        .lr-7{
            background: url("{{asset('frontend/assets/imgs/lrimg7.png')}}");
        }
        .lr-8{
            background: url("{{asset('frontend/assets/imgs/lrimg8.png')}}");
        }
        .lr-9{
            background: url("{{asset('frontend/assets/imgs/lrimg9.jpg')}}");
        }
        .lr-final{
            background: url("{{asset('frontend/assets/imgs/lrimgfinal.png')}}");
            height: 900px;
        }
        .btn{
            text-transform: none;
            font-size: 14px;
        }
        .navbar{
            margin-top: -240px;
        }
        .navbar-nav .nav-link{
            text-transform: none;
        }
        .navbar-nav .nav-link{
            font-size: 14px;
        }
        .navbar-nav .dropdown-toggle::after{
            color: #262222;
        }
        html{
            scroll-behavior: smooth;
        }
        .navbar-expand-lg .navbar-nav .nav-link {
            padding-right: 20px;
            padding-left: 20px;
        }
    </style>
</head>

<body>
<div class="bg-black logo-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-4" id="web-logo">
                <a href="{{url('/')}}"><img src="{{asset('')}}frontend/assets/imgs/Logo SVG (no brokered).svg" alt="" class="header-logo-1"></a>
            </div>
            <div class="col-lg-8 dn mt-26 text-center">
                {{--                                    <form class="form-group" id="form2">--}}
                {{--                                        @csrf--}}
                {{--                                        <div class="input-group">--}}
                {{--                                            <input type="search" class="form-control br-3" name="query" id="query" placeholder="Search Properties, Location, Projects..." value="{{request('query')}}" aria-label="Recipient's username" aria-describedby="button-addon2">--}}
                {{--                                            <button class="btn btn-outline-secondary" type="button" id="searchBtn"><i class="fas fa-search" style="padding: 3px;"></i></button>--}}
                {{--                                        </div>--}}
                {{--                                    </form>--}}
            </div>
            <div class="col-lg-2 col-8 text-right">
                <a href="{{url('/')}}"><img src="{{asset('')}}frontend/assets/imgs/Cityscape White.svg" alt="" class="header-logo-2"></a>
                {{--                                    <ul class="list-unstyled list-inline">--}}
                {{--                                        <li type="button" class="list-inline-item text-green fs-20 dn1" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-search"></i></li>--}}
                {{--                                        <li class="list-inline-item text-green fs-20"><i class="far fa-user"></i></li>--}}
                {{--                                        <li class="list-inline-item fs-20 fw-500"><a href="{{url('/coming-soon')}}" class="text-green">LogIn</a></li>--}}
                {{--                                    </ul>--}}
            </div>
        </div>
    </div>
</div>
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" style="border-color: #1ED65F;" type="button" data-toggle="collapse" data-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav text-center">
                            <li class="nav-item">
                                <div class="nav-link" href="#">
                                    <div class="filter-dropdown">
                                        <button class="btn btn-secondary btn-transparent dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            About Us
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item about_us" href="{{url('/#about')}}">About Tutunji Realty</a>
                                            <a class="dropdown-item featured_in" href="{{url('/#featured_in')}}">Featured In</a>
                                            <a class="dropdown-item our_team" href="{{url('/#our-team')}}">Our Team</a>
                                            <a class="dropdown-item blogs" href="{{url('/#blogs')}}">Blogs</a>
                                            <a class="dropdown-item newsletter" href="{{url('/#newsletter')}}">Newsletter</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="nav-link" href="#">
                                    <div class="filter-dropdown">
                                        <button class="btn btn-secondary btn-transparent dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Browse Real Estate
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{url('/pre-construct-search')}}">Pre-Construction Properties</a>
                                            <a class="dropdown-item" href="{{url('/sale-search')}}">For Sale/Lease Properties </a>
                                            <a class="dropdown-item browse_cities" href="{{url('/#browse_cities')}}">Browse Areas</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link testimonial" href="{{url('/#testimonial')}}">Testimonials</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link our-strategy" href="{{url('/#container-gsap')}}">Our Strategy</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link contact" href="{{url('/#contact')}}">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="banner-heading">
        <div class="svg-col">
            <h1>OUR STORY</h1>
            <h3>STARTS HERE</h3>
            <div class="non-hoverable">
                <svg data-aos="fade-in-left" preserveAspectRatio="none" data-bbox="20 90.291 159.997 20.709" xmlns="https://www.w3.org/2000/svg" width="147" height="527" viewBox="20 90.291 159.997 20.709" data-type="shape" role="img">
                    <path clip-path="url(#clip-path)" fill-rule="evenodd" clip-rule="evenodd" d="M165.881 90.685l13.898 18.563a1.096 1.096 0 01-.877 1.752H21s-1 0-1-1 1-1 1-1l155.298-.005a.39.39 0 00.312-.625L164.091 92c-.484-.831.241-1.484.241-1.484s.92-.605 1.549.169z" fill="#DEA428"></path>
                </svg>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid aor">
    <div class="row">
        <div class="col-xl-7 px-0">
            <img src="{{asset('frontend/assets/imgs/About_art1.png')}}" alt="art of realty" class="w-100">
        </div>
        <div class="col-xl-5 aor-bg center-content" data-paroller-factor="0.7" data-paroller-type="background">
            <div class="aor-text">
                <h2>art of realty</h2>
                <p>We are a premier full-service brokerage based out of Canada providing top-tier services in residential and commercial real estate. We use timeless sales techniques and groundbreaking digital marketing to elevate the home buying and selling experience.</p>
                <p>Our commitment to expanding a global marketing network lifts the visibility of our clients' homes. By reaching qualified buyers locally, nationally and internationally ensures the maximum return on the homes we represent. Through exemplary service Cityscape has quickly achieved over two billion dollars in sales. An unprecedented level of success reflecting outstanding client experiences fostered through a culture of partnership and trust.</p>
                <p>Real estate professionals are drawn to Cityscape as we do much more as a brokerage which has enabled us to stand out from our competitors as a pretty incredible place to work. We are invested in the success of our representatives and offer expert coaching from industry leaders, training, education, and technology platform exclusive to our agents.</p>
            </div>
        </div>
    </div>
</div>
<section class="timeline">
    <h2>timeline</h2>
</section>
<section class="about-lr container-fluid">
    <!-- lr-1 -->
    <div class="row">
        <div class="col-xl-6 lr-text-left center-content">
            <div class="svg-col">
                <h4>A Vision Becomes Realty</h4>
                <p>Cityscape launches in the wake of the global financial crisis. The founders persevere in their vision to
                    create a modern real estate company.</p>
                <div class="non-hoverable">
                    <svg preserveAspectRatio="none" data-bbox="20 90.291 159.997 20.709" xmlns="https://www.w3.org/2000/svg" width="108" height="456" viewBox="20 90.291 159.997 20.709" data-type="shape" role="img">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M165.881 90.685l13.898 18.563a1.096 1.096 0 01-.877 1.752H21s-1 0-1-1 1-1 1-1l155.298-.005a.39.39 0 00.312-.625L164.091 92c-.484-.831.241-1.484.241-1.484s.92-.605 1.549.169z" fill="#FFBA24"></path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="col-xl-6 lr-img lr-1 center-content">
            <h3>2009</h3>
        </div>
    </div>
    <!-- lr-2 -->
    <div class="row">
        <div class="col-xl-6 lr-img lr-2 center-content">
            <h3>2010</h3>
        </div>
        <div class="col-xl-6 lr-text-right center-content">
            <div class="svg-col">
                <h4>Agent Awareness Spreads</h4>
                <p>A successful campaign to recruit agents is initiated. Cityscape begins to attract real estate professionals from diverse backgrounds and expands its reach into new communities.</p>
                <div class="non-hoverable">
                    <svg preserveAspectRatio="none" data-bbox="20 90.291 159.997 20.709" xmlns="https://www.w3.org/2000/svg" width="108" height="456" viewBox="20 90.291 159.997 20.709" data-type="shape" role="img">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M165.881 90.685l13.898 18.563a1.096 1.096 0 01-.877 1.752H21s-1 0-1-1 1-1 1-1l155.298-.005a.39.39 0 00.312-.625L164.091 92c-.484-.831.241-1.484.241-1.484s.92-.605 1.549.169z" fill="#FFBA24"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <!-- lr-3 -->
    <div class="row">
        <div class="col-xl-6 lr-text-left center-content">
            <div class="svg-col">
                <h4>A Two-Pronged Growth Strategy</h4>
                <p>Cityscape sets its sights abroad, embarking on a successful roadshow in the Middle East promoting the luxury Shangri-La condominium development in Toronto.<br><br>The rapid growth in urban high-rise developments spurs the opening of Cityscape's second office in downtown Toronto. The office's strategic location in the middle of one of the highest concentrations of condominium towers in the world serves as a catalyst for growth in the urban markets.</p>
                <div class="non-hoverable">
                    <svg preserveAspectRatio="none" data-bbox="20 90.291 159.997 20.709" xmlns="https://www.w3.org/2000/svg" width="108" height="456" viewBox="20 90.291 159.997 20.709" data-type="shape" role="img">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M165.881 90.685l13.898 18.563a1.096 1.096 0 01-.877 1.752H21s-1 0-1-1 1-1 1-1l155.298-.005a.39.39 0 00.312-.625L164.091 92c-.484-.831.241-1.484.241-1.484s.92-.605 1.549.169z" fill="#FFBA24"></path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="col-xl-6 lr-img lr-3 center-content">
            <h3>2011</h3>
        </div>
    </div>
    <!-- lr-4 -->
    <div class="row">
        <div class="col-xl-6 lr-img lr-4 center-content">
            <h3>2013</h3>
        </div>
        <div class="col-xl-6 lr-text-right center-content">
            <div class="svg-col">
                <h4>Growth in the Middle East and Greater Toronto Area</h4>
                <p>At the Four Seasons in Cairo Cityscape holds another investment seminar, further solidifying Cityscape's presence in Egypt.<br><br>Cityscape joins the Oakville Real Estate Board, opening new doors of opportunity in the luxury home market.</p>
                <div class="non-hoverable">
                    <svg preserveAspectRatio="none" data-bbox="20 90.291 159.997 20.709" xmlns="https://www.w3.org/2000/svg" width="108" height="456" viewBox="20 90.291 159.997 20.709" data-type="shape" role="img">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M165.881 90.685l13.898 18.563a1.096 1.096 0 01-.877 1.752H21s-1 0-1-1 1-1 1-1l155.298-.005a.39.39 0 00.312-.625L164.091 92c-.484-.831.241-1.484.241-1.484s.92-.605 1.549.169z" fill="#FFBA24"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <!-- lr-5 -->
    <div class="row">
        <div class="col-xl-6 lr-text-left center-content">
            <div class="svg-col">
                <h4>Positive Media Exposure</h4>
                <p>Cityscape starts to get more media exposure and brand recognition, and is featured in the magazine Toronto Life.<br><br>Cityscape celebrates its first 5 years, and 150 real estate professionals.</p>
                <div class="non-hoverable">
                    <svg preserveAspectRatio="none" data-bbox="20 90.291 159.997 20.709" xmlns="https://www.w3.org/2000/svg" width="108" height="456" viewBox="20 90.291 159.997 20.709" data-type="shape" role="img">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M165.881 90.685l13.898 18.563a1.096 1.096 0 01-.877 1.752H21s-1 0-1-1 1-1 1-1l155.298-.005a.39.39 0 00.312-.625L164.091 92c-.484-.831.241-1.484.241-1.484s.92-.605 1.549.169z" fill="#FFBA24"></path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="col-xl-6 lr-img lr-5 center-content">
            <h3>2014</h3>
        </div>
    </div>
    <!-- lr-6 -->
    <div class="row">
        <div class="col-xl-6 lr-img lr-6 center-content">
            <h3>2015</h3>
        </div>
        <div class="col-xl-6 lr-text-right center-content">
            <div class="svg-col">
                <h4>Important New Sales Milestone Reached</h4>
                <p>Cityscape surpasses cumulative sales volume of $1 billion.<br><br>As Cityscape continues to build on its success in the urban real estate market, its third location opens in the commercial portion of Toronto's tallest residential tower. The new location helps to service a rapidly growing workforce now comprised of 200 real estate professionals.</p>
                <div class="non-hoverable">
                    <svg preserveAspectRatio="none" data-bbox="20 90.291 159.997 20.709" xmlns="https://www.w3.org/2000/svg" width="108" height="456" viewBox="20 90.291 159.997 20.709" data-type="shape" role="img">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M165.881 90.685l13.898 18.563a1.096 1.096 0 01-.877 1.752H21s-1 0-1-1 1-1 1-1l155.298-.005a.39.39 0 00.312-.625L164.091 92c-.484-.831.241-1.484.241-1.484s.92-.605 1.549.169z" fill="#FFBA24"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <!-- lr-7 -->
    <div class="row">
        <div class="col-xl-6 lr-text-left center-content">
            <div class="svg-col">
                <h4>Growth through Development</h4>
                <p>In May Cityscape ramps up its development activity with a draft plan approved subdivision and starts the process of developing 91 detached homes, 116 townhomes and a Commercial Plaza.<br><br>By the second half of the year Cityscape is growing by leaps and bounds, with the company's ranks swelling to over 300 real estate professionals.</p>
                <div class="non-hoverable">
                    <svg preserveAspectRatio="none" data-bbox="20 90.291 159.997 20.709" xmlns="https://www.w3.org/2000/svg" width="108" height="456" viewBox="20 90.291 159.997 20.709" data-type="shape" role="img">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M165.881 90.685l13.898 18.563a1.096 1.096 0 01-.877 1.752H21s-1 0-1-1 1-1 1-1l155.298-.005a.39.39 0 00.312-.625L164.091 92c-.484-.831.241-1.484.241-1.484s.92-.605 1.549.169z" fill="#FFBA24"></path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="col-xl-6 lr-img lr-7 center-content">
            <h3>2016</h3>
        </div>
    </div>
    <!-- lr-8 -->
    <div class="row">
        <div class="col-xl-6 lr-img lr-8 center-content">
            <h3>2018</h3>
        </div>
        <div class="col-xl-6 lr-text-right center-content">
            <div class="svg-col">
                <h4>Annual Sales Volume Reaches 10 Figures</h4>
                <p>By now Cityscape numbers an astounding 400 real estate professionals, representing a 100 fold increase from where the company started.<br><br>The company breaks ground on the land development portion of townhomes for a site in Burlington, Ontario.<br><br>Cityscape's media exposure continues to improve brand recognition internationally as it helps to organize a television awards show viewed by millions worldwide.<br><br>Yet another important milestone is reached as Cityscape now generates  sales volume of $1 billion annually. </p>
                <div class="non-hoverable">
                    <svg preserveAspectRatio="none" data-bbox="20 90.291 159.997 20.709" xmlns="https://www.w3.org/2000/svg" width="108" height="456" viewBox="20 90.291 159.997 20.709" data-type="shape" role="img">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M165.881 90.685l13.898 18.563a1.096 1.096 0 01-.877 1.752H21s-1 0-1-1 1-1 1-1l155.298-.005a.39.39 0 00.312-.625L164.091 92c-.484-.831.241-1.484.241-1.484s.92-.605 1.549.169z" fill="#FFBA24"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <!-- lr-9 -->
    <div class="row">
        <div class="col-xl-6 lr-text-left center-content">
            <div class="svg-col svg-2019">
                <h4>2019 Unparalleled Growth</h4>
                <p>This year Cityscape has turned its focus to enhancing its in-house marketing efforts, with emphasis on digital marketing initiatives, all while continuing to invest in the company's greatest resource, its people.<br><br>Today Cityscape boasts over 600 highly skilled real estate professionals. That number continues to grow rapidly thanks to a comprehensive support system, training, access to business opportunities and the latest tools. This enables the company to provide unparalleled service to homeowners, investors and developers.<br><br>Cityscape is taking its winning formula across Canada and increasingly to international markets, and is now working with development projects in Toronto, the GTA, Vancouver, Seattle and Tokyo.<br><br>As Cityscape has grown, the company has accumulated a vast wealth of knowledge, talent and expertise, making it the preeminent real estate company it is today, and setting the stage for continuing success.</p>
                <div class="non-hoverable">
                    <svg preserveAspectRatio="none" data-bbox="20 90.291 159.997 20.709" xmlns="https://www.w3.org/2000/svg" width="108" height="456" viewBox="20 90.291 159.997 20.709" data-type="shape" role="img">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M165.881 90.685l13.898 18.563a1.096 1.096 0 01-.877 1.752H21s-1 0-1-1 1-1 1-1l155.298-.005a.39.39 0 00.312-.625L164.091 92c-.484-.831.241-1.484.241-1.484s.92-.605 1.549.169z" fill="#FFBA24"></path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="col-xl-6 lr-img lr-9 center-content">
            <h3>2019</h3>
        </div>
    </div>
</section>
<section class="container-fluid">
    <div class="row">
        <div class="col-xl-12 lr-img lr-final center-content">
            <h3>2020</h3>
            <img src="{{asset('frontend/assets/imgs/lrimgfinal.png')}}" alt="about" class="mob-2020" style="max-width: 100%;">
        </div>
    </div>
</section>
<div class="container">
    <div class="row mt-120">
        <div class="col-lg-2 offset-lg-5">
            <h1 class="fs-40 text-center bb-2 fw-700">Blogs</h1>
        </div>
    </div>
</div>
<div class="container-fluid blog mt-40" id="blogs">
    <div class="row">
        <div class="col-lg-12 pr-0 pl-0">
            <div class="owl-carousel blog-carousel1 owl-theme">
                @foreach($allBlog as $blogData)
                    <div class="item">
                        <a href="{{url('/blog-detail',$blogData->id)}}" style="text-decoration: none;color: #262222;">
                            <div class="card blog-style" style="width: 100%;height: 466px;background-image: url('{{asset('admin-panel/assets/blog-image/'.$blogData->image)}}');background: none;">
                                {{--                            <div style=""></div>--}}
                                <img src="{{asset('admin-panel/assets/blog-image/'.$blogData->image)}}" class="img-fluid" alt="..." height="292px">
                                <div class="card-body">
                                    <h5 class="card-title">{{$blogData->title ? $blogData->title : '-'}}</h5>
                                    <p class="card-text">{{\Illuminate\Support\Str::limit($blogData->body ? $blogData->body : '-', 170)}}
                                    </p>
                                    <a href="{{url('/blog-detail',$blogData->id)}}" style="color: #164DF3; text-decoration: none;">Read more></a>
                                </div>
                            </div></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="bg-dark">
    <div class="container">
        <div class="row center">
            <div class="col-lg-4 col-6 desktop-display-logo">
                <img src="{{asset('')}}frontend/assets/imgs/Logo SVG (Brokered By).svg" alt="" height="200px" width="200px">

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
                    <li class="mt-10"><a href="{{url('/about-cityScape')}}" class="text-grey">About Cityscape</a></li>
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
            <div class="col-lg-4">
                <h5 class="fs-22 text-white">Contact</h5>
                <ul class="list-unstyled mt-20">
                    <li class="mt-10 text-grey"><img src="{{asset('')}}frontend/assets/imgs/Icon%20ionic-ios-pin.png" alt="" class="img-fluid mr-2"> 123 contact address City, State, Country.</li>
                    <li class="mt-10 text-grey"><img src="{{asset('')}}frontend/assets/imgs/Icon%20material-email.png" alt="" class="img-fluid mr-2"> hello@tutunjirealty.com</li>
                    <li class="mt-10 text-grey"><img src="{{asset('')}}frontend/assets/imgs/Icon%20material-phone.png" alt="" class="img-fluid mr-2"> +1 6472807889</li>
                </ul>
                <h5 class="fs-22 text-white mt-60">Follow Us</h5>
                <ul class="list-unstyled list-inline mt-10">
                    <li class="list-inline-item"><a href=""><img src="{{asset('')}}frontend/assets/imgs/Group%20265.png" alt="" class="img-fluid"></a></li>
                    <li class="list-inline-item"><a href=""><img src="{{asset('')}}frontend/assets/imgs/Group%20268.png" alt="" class="img-fluid"></a></li>
                    <li class="list-inline-item"><a href=""><img src="{{asset('')}}frontend/assets/imgs/linkedin.png" alt="" class="img-fluid"></a></li>
                    <li class="list-inline-item"><a href=""><img src="{{asset('')}}frontend/assets/imgs/Group%20271.png" alt="" class="img-fluid"></a></li>
                </ul>
                <div class="col-lg-4 col-6 mobile-display-logo">
                    <img src="{{asset('')}}frontend/assets/imgs/Logo SVG (Brokered By).svg" alt="">
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

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-grey center">
                © 2021-<?php echo date('Y'); ?> Tutunji Realty Inc. | ALL RIGHTS RESERVED
            </div>
            <div class="col-lg-6 text-grey text-right center mt-21">
                Designed & Managed By <span><a href="" class="text-green">OmnisGO</a></span>
            </div>
        </div>
    </div>
</footer>

<!--    pop up-->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="input-group">
                    <input type=" text" class="form-control br-3" placeholder="Search Properties, Location, Projects..." aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end of pop up-->
<!-- dropdown-popup -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>--}}

{{--<script src="{{asset('')}}frontend/assets/js/jquery.js"></script>--}}
{{--<script src="{{asset('')}}frontend/assets/js/bootstrap.js"></script>--}}
{{--<script src="{{asset('')}}frontend/assets/js/bootstrap.bundle.js"></script>--}}


<script src="{{asset('')}}frontend/assets/js/constructionAnimation.js"></script>
<script src="{{asset('')}}frontend/assets/js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="{{asset('')}}frontend/assets/js/bootstrap.js"></script>
<script src="{{asset('')}}frontend/assets/js/bootstrap.bundle.js"></script>
<!-- begin-pushy-js-dashboard-slider-menu-js -->
<script src="{{asset('')}}frontend/assets/js/pushy.js"></script>
<!-- end-pushy-js-dashboard-slider-menu-js -->
<!-- date-picker script -->
@yield('date-picker-script')
<!-- end date-picker -->
<!-- about-start -->
@yield('about-scripts')
<!-- submit-property-form all scripts start -->
@yield('property-all-scripts')

<!-- pre-construct-property-blog-css start -->
@yield('pre-construct-blog-css')
<!-- pre-construct-property-blog-css end -->
<!-- pre-construct-property-search -->
@yield('pre-construct-search-css')
<!-- pre-construct-property-search end -->

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
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script type="text/javascript" language="javascript">
    $(document).ready(function (e) {
        $(".header-menu-list .btn-expand").click(function (e) {
            $(".collapsible").toggle(
                "slide", {
                    direction: "left",
                },
                800
            );
        });
    });

</script>
{{--<script>--}}
{{--    $('.btn-expand').on('click', function () {--}}
{{--        // $('.header-menu-list').css({"width": "100%"});--}}
{{--        $('.header-menu-list').toggleClass('show');--}}
{{--    })--}}
{{--</script>--}}
<script src="{{asset('')}}frontend/assets/js/index.js"></script>
<script>
    $(document).ready(function () {
        var contentSection = $('.content-section');
        var navigation = $('.timeline');

        //when a nav link is clicked, smooth scroll to the section
        navigation.on('click', 'a', function (event) {
            event.preventDefault(); //prevents previous event
            smoothScroll($(this.hash));
        });

        //update navigation on scroll...
        $(window).on('scroll', function () {
            updateNavigation();
        })
        //...and when the page starts
        updateNavigation();

        /////FUNCTIONS
        function updateNavigation() {
            contentSection.each(function () {
                var sectionName = $(this).attr('id');
                var navigationMatch = $('nav a[href="#' + sectionName + '"]');
                if (($(this).offset().top - $(window).height() / 2 < $(window).scrollTop()) &&
                    ($(this).offset().top + $(this).height() - $(window).height() / 2 > $(window).scrollTop())) {
                    navigationMatch.addClass('active-section');
                } else {
                    navigationMatch.removeClass('active-section');
                }
            });
        }

        function smoothScroll(target) {
            $('body,html').animate({
                scrollTop: target.offset().top
            }, 800);
        }
    });

</script>
<script>
    function getVals() {
        // Get slider values
        let dollarIndianLocale = Intl.NumberFormat('en-US');

        let parent = this.parentNode;
        let slides = parent.getElementsByTagName("input");
        let slide1 = parseFloat(slides[0].value);
        let slide2 = parseFloat(slides[1].value);
        // Neither slider will clip the other, so make sure we determine which is larger
        if (slide1 > slide2) {
            let tmp = slide2;
            slide2 = slide1;
            slide1 = tmp;
        }

        let displayElement = parent.getElementsByClassName("rangeValues")[0];
        displayElement.innerHTML = "$" +  dollarIndianLocale.format(slide1) + " - $" +  dollarIndianLocale.format(slide2);
    }

    window.onload = function() {
        // Initialize Sliders
        let sliderSections = document.getElementsByClassName("range-slider");
        for (let x = 0; x < sliderSections.length; x++) {
            let sliders = sliderSections[x].getElementsByTagName("input");
            for (let y = 0; y < sliders.length; y++) {
                if (sliders[y].type === "range") {
                    sliders[y].oninput = getVals;
                    // Manually trigger event first time to display values
                    sliders[y].oninput();
                }
            }
        }
    }
</script>
<script>
    let base_url = "https://tutunjirealty.com/demo/public"; /*https://tutunjirealty.com/demo/public*/
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.2/gsap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.2/ScrollTrigger.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/ScrollToPlugin.min.js'></script>
<!-- home-page-script-gsap-->
@yield('script-gsap')
<!-- add/delete-media using ajax with preview script start -->
@yield('media-scripts')
<!-- add/delete-media using ajax with preview script end -->
<!-- sign In/Up form -->
@yield('sign-in-up-scripts')
<!-- profile-update using ajax -->
@yield('profile-script')
<!-- my-favourite-slider start -->
@yield('my-property-slider')
<!-- my-favourite-slider end -->
@yield('line-chart-js')
<script>
    $(document).ready(function (){
        $('.about_us').click(function (){
            location.href = '{{url("/#about")}}'
        });
        $('.featured_in').click(function (){
            location.href = '{{url("/#featured_in")}}'
        });
        $('.our_team').click(function (){
            location.href = '{{url("/#our-team")}}'
        });
        $('.blogs').click(function (){
            location.href = '{{url("/#blogs")}}'
        });
        $('.newsletter').click(function (){
            location.href = '{{url("/#newsletter")}}'
        });
        $('.browse_cities').click(function (){
            location.href = '{{url("/#browse_cities")}}'
        });
        $('.testimonial').click(function (){
            location.href = '{{url("/#testimonial")}}'
        });
        $('.our_strategy').click(function (){
            location.href = '{{url("/#container-gsap")}}'
        });
        $('.contact').click(function (){
            location.href = '{{url("/#contact")}}'
        });
    });
</script>
<!-- dropdown menu -->
<script>
    $(".filter-dropdown").on("click", ".dropdown-toggle", function(e) {
        e.preventDefault();
        $(this).parent().addClass("show");
        $(this).attr("aria-expanded", "true");
        $(this).next().addClass("show");
    });
</script>
</body>

</html>
