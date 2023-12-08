@extends('frontend.layout.master')
<link rel="stylesheet" href="{{asset('')}}frontend/assets/css/about-cityscape.css">
<link rel="stylesheet" href="{{asset('')}}frontend/assets/css/custom.css">
@section('title')
    <title>CityScape | About</title>
@endsection
<style>
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
        /*padding-right: 60px;*/
        font-weight: bold;
        text-shadow: #ffffff 2px 2px 8px;
        /*text-align: center;*/
    }
    /*.banner-heading .svg-col h3 {*/
    /*    text-align: center;*/
    /*    color: #fff;*/
    /*    text-shadow: rgb(0 0 0 / 40%) 0px 4px 5px;*/
    /*}*/
    .svg-col h3 {
        font-size: 20px;
        margin-bottom: 5px;
        color: #282828;
        letter-spacing: 0.1em;
    }
    /*.banner-heading .non-hoverable {*/
    /*    -webkit-transform: rotate(262.929deg);*/
    /*    -ms-transform: rotate(262.929deg);*/
    /*    transform: rotate(262.929deg);*/
    /*    bottom: -210px;*/
    /*    left: 90px;*/
    /*    margin-top: -227px;*/
    /*}*/
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

    @media only screen and (max-width: 280px){
        .ctscp-logo-2{
            width: 55px;
            height: 30px;
        }
    }
    @media (min-width: 768px) and (max-width: 992px) {
        .ctscp-logo-1{
            height: 90px;
        }
        .ctscp-logo-2{
            height: 90px;
        }
    }
    /*@media screen and(min-width: 600px){*/
    /*    .banner-heading .svg-col h3 {*/
    /*        text-align: center;*/
    /*        !*color: #fff;*!*/
    /*        !*text-shadow: rgb(0 0 0 / 40%) 0px 4px 5px;*!*/
    /*    }*/
    /*    .banner-heading .svg-col h1 {*/
    /*        text-align: center;*/
    /*        !*color: #fff;*!*/
    /*        !*text-shadow: rgb(0 0 0 / 40%) 0px 4px 5px;*!*/
    /*    }*/
    /*}*/
</style>
@section('content')

    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-top: -240px">
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
                                            <div class="dropdown-menu" style="top: 44px;">
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
                                            <div class="dropdown-menu" style="top: 44px;">
                                                <a class="dropdown-item" href="{{url('/pre-construct-search')}}">Upcoming Pre-Construction Projects</a>
                                                <a class="dropdown-item" href="{{url('/sale-search')}}">New Construction For Sale/Lease </a>
                                                <a class="dropdown-item browse_cities" href="{{url('/#browse_cities')}}">Browse Popular Areas</a>
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
                <h1 style="border-bottom: 2px solid #ffba24;">OUR STORY</h1>
                <h3>STARTS HERE</h3>
{{--                <div class="non-hoverable">--}}
{{--                    <svg data-aos="fade-in-left" preserveAspectRatio="none" data-bbox="20 90.291 159.997 20.709" xmlns="https://www.w3.org/2000/svg" width="147" height="527" viewBox="20 90.291 159.997 20.709" data-type="shape" role="img">--}}
{{--                        <path clip-path="url(#clip-path)" fill-rule="evenodd" clip-rule="evenodd" d="M165.881 90.685l13.898 18.563a1.096 1.096 0 01-.877 1.752H21s-1 0-1-1 1-1 1-1l155.298-.005a.39.39 0 00.312-.625L164.091 92c-.484-.831.241-1.484.241-1.484s.92-.605 1.549.169z" fill="#DEA428"></path>--}}
{{--                    </svg>--}}
{{--                </div>--}}
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
{{--                    <div class="non-hoverable">--}}
{{--                        <svg preserveAspectRatio="none" data-bbox="20 90.291 159.997 20.709" xmlns="https://www.w3.org/2000/svg" width="108" height="456" viewBox="20 90.291 159.997 20.709" data-type="shape" role="img">--}}
{{--                            <path fill-rule="evenodd" clip-rule="evenodd" d="M165.881 90.685l13.898 18.563a1.096 1.096 0 01-.877 1.752H21s-1 0-1-1 1-1 1-1l155.298-.005a.39.39 0 00.312-.625L164.091 92c-.484-.831.241-1.484.241-1.484s.92-.605 1.549.169z" fill="#FFBA24"></path>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
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
{{--                    <div class="non-hoverable">--}}
{{--                        <svg preserveAspectRatio="none" data-bbox="20 90.291 159.997 20.709" xmlns="https://www.w3.org/2000/svg" width="108" height="456" viewBox="20 90.291 159.997 20.709" data-type="shape" role="img">--}}
{{--                            <path fill-rule="evenodd" clip-rule="evenodd" d="M165.881 90.685l13.898 18.563a1.096 1.096 0 01-.877 1.752H21s-1 0-1-1 1-1 1-1l155.298-.005a.39.39 0 00.312-.625L164.091 92c-.484-.831.241-1.484.241-1.484s.92-.605 1.549.169z" fill="#FFBA24"></path>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
        <!-- lr-3 -->
        <div class="row">
            <div class="col-xl-6 lr-text-left center-content">
                <div class="svg-col">
                    <h4>A Two-Pronged Growth Strategy</h4>
                    <p>Cityscape sets its sights abroad, embarking on a successful roadshow in the Middle East promoting the luxury Shangri-La condominium development in Toronto.<br><br>The rapid growth in urban high-rise developments spurs the opening of Cityscape's second office in downtown Toronto. The office's strategic location in the middle of one of the highest concentrations of condominium towers in the world serves as a catalyst for growth in the urban markets.</p>
{{--                    <div class="non-hoverable">--}}
{{--                        <svg preserveAspectRatio="none" data-bbox="20 90.291 159.997 20.709" xmlns="https://www.w3.org/2000/svg" width="108" height="456" viewBox="20 90.291 159.997 20.709" data-type="shape" role="img">--}}
{{--                            <path fill-rule="evenodd" clip-rule="evenodd" d="M165.881 90.685l13.898 18.563a1.096 1.096 0 01-.877 1.752H21s-1 0-1-1 1-1 1-1l155.298-.005a.39.39 0 00.312-.625L164.091 92c-.484-.831.241-1.484.241-1.484s.92-.605 1.549.169z" fill="#FFBA24"></path>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
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
{{--                    <div class="non-hoverable">--}}
{{--                        <svg preserveAspectRatio="none" data-bbox="20 90.291 159.997 20.709" xmlns="https://www.w3.org/2000/svg" width="108" height="456" viewBox="20 90.291 159.997 20.709" data-type="shape" role="img">--}}
{{--                            <path fill-rule="evenodd" clip-rule="evenodd" d="M165.881 90.685l13.898 18.563a1.096 1.096 0 01-.877 1.752H21s-1 0-1-1 1-1 1-1l155.298-.005a.39.39 0 00.312-.625L164.091 92c-.484-.831.241-1.484.241-1.484s.92-.605 1.549.169z" fill="#FFBA24"></path>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
        <!-- lr-5 -->
        <div class="row">
            <div class="col-xl-6 lr-text-left center-content">
                <div class="svg-col">
                    <h4>Positive Media Exposure</h4>
                    <p>Cityscape starts to get more media exposure and brand recognition, and is featured in the magazine Toronto Life.<br><br>Cityscape celebrates its first 5 years, and 150 real estate professionals.</p>
{{--                    <div class="non-hoverable">--}}
{{--                        <svg preserveAspectRatio="none" data-bbox="20 90.291 159.997 20.709" xmlns="https://www.w3.org/2000/svg" width="108" height="456" viewBox="20 90.291 159.997 20.709" data-type="shape" role="img">--}}
{{--                            <path fill-rule="evenodd" clip-rule="evenodd" d="M165.881 90.685l13.898 18.563a1.096 1.096 0 01-.877 1.752H21s-1 0-1-1 1-1 1-1l155.298-.005a.39.39 0 00.312-.625L164.091 92c-.484-.831.241-1.484.241-1.484s.92-.605 1.549.169z" fill="#FFBA24"></path>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
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
{{--                    <div class="non-hoverable">--}}
{{--                        <svg preserveAspectRatio="none" data-bbox="20 90.291 159.997 20.709" xmlns="https://www.w3.org/2000/svg" width="108" height="456" viewBox="20 90.291 159.997 20.709" data-type="shape" role="img">--}}
{{--                            <path fill-rule="evenodd" clip-rule="evenodd" d="M165.881 90.685l13.898 18.563a1.096 1.096 0 01-.877 1.752H21s-1 0-1-1 1-1 1-1l155.298-.005a.39.39 0 00.312-.625L164.091 92c-.484-.831.241-1.484.241-1.484s.92-.605 1.549.169z" fill="#FFBA24"></path>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
        <!-- lr-7 -->
        <div class="row">
            <div class="col-xl-6 lr-text-left center-content">
                <div class="svg-col">
                    <h4>Growth through Development</h4>
                    <p>In May Cityscape ramps up its development activity with a draft plan approved subdivision and starts the process of developing 91 detached homes, 116 townhomes and a Commercial Plaza.<br><br>By the second half of the year Cityscape is growing by leaps and bounds, with the company's ranks swelling to over 300 real estate professionals.</p>
{{--                    <div class="non-hoverable">--}}
{{--                        <svg preserveAspectRatio="none" data-bbox="20 90.291 159.997 20.709" xmlns="https://www.w3.org/2000/svg" width="108" height="456" viewBox="20 90.291 159.997 20.709" data-type="shape" role="img">--}}
{{--                            <path fill-rule="evenodd" clip-rule="evenodd" d="M165.881 90.685l13.898 18.563a1.096 1.096 0 01-.877 1.752H21s-1 0-1-1 1-1 1-1l155.298-.005a.39.39 0 00.312-.625L164.091 92c-.484-.831.241-1.484.241-1.484s.92-.605 1.549.169z" fill="#FFBA24"></path>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
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
{{--                    <div class="non-hoverable">--}}
{{--                        <svg preserveAspectRatio="none" data-bbox="20 90.291 159.997 20.709" xmlns="https://www.w3.org/2000/svg" width="108" height="456" viewBox="20 90.291 159.997 20.709" data-type="shape" role="img">--}}
{{--                            <path fill-rule="evenodd" clip-rule="evenodd" d="M165.881 90.685l13.898 18.563a1.096 1.096 0 01-.877 1.752H21s-1 0-1-1 1-1 1-1l155.298-.005a.39.39 0 00.312-.625L164.091 92c-.484-.831.241-1.484.241-1.484s.92-.605 1.549.169z" fill="#FFBA24"></path>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
        <!-- lr-9 -->
        <div class="row">
            <div class="col-xl-6 lr-text-left center-content">
                <div class="svg-col svg-2019">
                    <h4>2019 Unparalleled Growth</h4>
                    <p>This year Cityscape has turned its focus to enhancing its in-house marketing efforts, with emphasis on digital marketing initiatives, all while continuing to invest in the company's greatest resource, its people.<br><br>Today Cityscape boasts over 600 highly skilled real estate professionals. That number continues to grow rapidly thanks to a comprehensive support system, training, access to business opportunities and the latest tools. This enables the company to provide unparalleled service to homeowners, investors and developers.<br><br>Cityscape is taking its winning formula across Canada and increasingly to international markets, and is now working with development projects in Toronto, the GTA, Vancouver, Seattle and Tokyo.<br><br>As Cityscape has grown, the company has accumulated a vast wealth of knowledge, talent and expertise, making it the preeminent real estate company it is today, and setting the stage for continuing success.</p>
{{--                    <div class="non-hoverable">--}}
{{--                        <svg preserveAspectRatio="none" data-bbox="20 90.291 159.997 20.709" xmlns="https://www.w3.org/2000/svg" width="108" height="456" viewBox="20 90.291 159.997 20.709" data-type="shape" role="img">--}}
{{--                            <path fill-rule="evenodd" clip-rule="evenodd" d="M165.881 90.685l13.898 18.563a1.096 1.096 0 01-.877 1.752H21s-1 0-1-1 1-1 1-1l155.298-.005a.39.39 0 00.312-.625L164.091 92c-.484-.831.241-1.484.241-1.484s.92-.605 1.549.169z" fill="#FFBA24"></path>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
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
{{--            <div class="col-lg-2 offset-lg-5">--}}
{{--                <h1 class="fs-40 text-center bb-2 fw-700">Blogs</h1>--}}
{{--            </div>--}}
            <div class="col-lg-6 offset-lg-3">
                <h1 class="fs-40 text-center bb-2" style="border-bottom: 2px dashed #000000;"><span class="fw-700" style="color: #000000;">Blogs</span></h1>
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
@endsection
