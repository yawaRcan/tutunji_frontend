@extends('frontend.layout.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--               web view-->
                <div class="header-menu-list dn header-wrapper">
                    <div class="btn-expand">
                        <span class="line-1"></span>
                        <span class="line-2"></span>
                        <span class="line-3"></span>
                    </div>
                    <div class="collapsible">
                        <ul class="text-center">
                            <li class="nav-item pl-17">
                                <a class="nav-link" href="index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <div class="main">
                                    <input type="checkbox" id="drop-5" hidden>
                                    <label class="dropHeader dropHeader-5 label-1 dropdown-toggle" for="drop-5"> About
                                        Us</label>
                                    <div class="list list-5">
                                        <div class="item1"> <a class="" href="#about"
                                                               onclick="window.open('https://tutunjirealty.com/demo/public/about');">About
                                                Tutunji Realty</a></div>
                                        <div class="item1"><a class="" href="#featured_in">Featured In</a></div>
                                        <div class="item1"> <a class="" href="#agent"
                                                               onclick="window.open('https://tutunjirealty.com/demo/public/agent');">Our
                                                Agents</a></div>
                                        <div class="item1"><a class="" href="#blogs"
                                                              onclick="window.open('https://tutunjirealty.com/demo/public/blog-page');">Blogs</a>
                                        </div>
                                        <div class="item1"><a class="" href="#newsletter">Newsletter</a></div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="main">
                                    <input type="checkbox" id="drop-6" hidden>
                                    <label class="dropHeader dropHeader-5 label-1 dropdown-toggle" for="drop-6"> Browse
                                        Real Estate</label>
                                    <div class="list list-5">
                                        <div class="item1"> <a class=""
                                                               href="https://tutunjirealty.com/demo/public/pre-construct-search">Pre-Construction
                                                Properties</a></div>
                                        <div class="item1"><a class=""
                                                              href="https://tutunjirealty.com/demo/public/sale-search">For Sale/Lease
                                                Properties</a></div>
                                        <div class="item1"> <a class="" href="#browse_cities">Browse Areas</a></div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="testimonials.html">Testimonials</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Our Strategy</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact Us</a>
                            </li>

                            <!--                            <li class="pl-196"><button type="button" class="btn btn-success"><img src="imgs/Group%2014.png" alt="" class="img-fluid w-24">Sell My Property</button></li>-->
                        </ul>
                    </div>
                </div>
                <!--                end of web view-->
                <!--                mobile view-->
                <nav class="navbar navbar-light bg-light bg-toggler dn-1">
                    <button class="navbar-toggler btn-toogler border-0" type="button" data-toggle="collapse"
                            data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse n-collapse" id="navbarNav">
                        <ul class="navbar-nav text-center">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary btn-transparent dropdown-toggle" type="button"
                                                id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                            About Us
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <button class="dropdown-item" type="button" href="#about"
                                                    onclick="window.open('https://tutunjirealty.com/demo/public/about');">About
                                                Tutunji Realty</button>
                                            <button class="dropdown-item" type="button" href="#featured_in">Featured
                                                In</button>
                                            <button class="dropdown-item" type="button" href="#agent"
                                                    onclick="window.open('https://tutunjirealty.com/demo/public/agent');">Our
                                                Agents</button>
                                            <button class="dropdown-item" type="button" href="#blogs"
                                                    onclick="window.open('https://tutunjirealty.com/demo/public/blog-page');">Blogs</button>
                                            <button class="dropdown-item" type="button"
                                                    href="#newsletter">Newsletter</button>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary btn-transparent dropdown-toggle" type="button"
                                                id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                            Browse Real Estate
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <button class="dropdown-item" type="button"
                                                    href="https://tutunjirealty.com/demo/public/pre-construct-search">Pre-Construction
                                                Properties</button>
                                            <button class="dropdown-item" type="button"
                                                    href="https://tutunjirealty.com/demo/public/sale-search">For Sale/Lease
                                                Properties</button>
                                            <button class="dropdown-item" type="button" href="#browse_cities">Browse
                                                Areas</button>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="testimonials.html">Testimonials</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Our Strategy</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact Us</a>
                            </li>
                        </ul>
                        <!--
                        <button type="button" class="btn btn-success btn-sell">
                            <img src="imgs/Group%2014.png" alt="" class="img-fluid w-24 d-none" />Sell My Property
                        </button>
-->
                    </div>
                </nav>
                <!--                end of mobile view-->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pl-0">
                        <li class="breadcrumb-item">
                            <a href="index.html" class="text-darkgrey fw-700">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="pre-construction.html" class="text-darkgrey fw-700">New Pre-Construction</a>
                        </li>
                        <li class="breadcrumb-item active fw-700" aria-current="page">
                            3 BHK Apartment
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h4 class="fs-24 fw-700">
                    3 BHK Apartment
                    <span class="fs-18 text-grey fw-400">in Toronto, Canada</span>
                </h4>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-lg-6 center">
                <h1 class="fs-30 fw-700">$55,000</h1>
            </div>
            <div class="col-lg-6 mt-21">
                <ul class="list-unstyled list-inline d-flex justify-content-end align-items-center center">
                    <li class="list-inline-item">
                        <a href="" class="text-black"><i class="far fa-heart fs-20 fw-400 mr-10"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="" class="text-black"><i class="fas fa-share-alt fs-20 mr-10"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <button type="button" class="btn btn-info" id="registerButton"
                                style="font-size: 14px; padding: 10px 20px !important">
                            Register Now
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row mt-40">
            <div class="col-lg-8 col-8">
                <img src="imgs/Screen%20Shot%202022-01-04%20at%206.12.41%20PM.png" alt="" class="img-fluid w-100" />
            </div>
            <div class="col-lg-4 col-4">
                <img src="imgs/Screen%20Shot%202022-01-04%20at%206.12.41%20PM.png" alt="" class="img-fluid w-100" />
                <div class="container-img mt-10">
                    <img src="imgs/Screen%20Shot%202022-01-04%20at%206.12.41%20PM.png" alt="Avatar"
                         class="image img-fluid" />
                    <div class="overlay">
                        <div class="text">+2</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-lg-12">
                <div class="blue-bar">
                    <div class="row">
                        <div class="col-lg-2 col-4 text-center">
                            <h6 class="fs-14 mb-0">$123,000</h6>
                            <span class="fs-12 text-grey"> 8,002 / sq ft </span>
                        </div>
                        <div class="col-lg-2 col-4 text-center">
                            <h6 class="fs-14 mb-0">3589</h6>
                            <span class="fs-12 text-grey"> Area in sq ft </span>
                        </div>
                        <div class="col-lg-2 col-4 text-center">
                            <h6 class="fs-14 mb-0">Pre-Construction</h6>
                            <span class="fs-12 text-grey"> Property Status </span>
                        </div>
                        <div class="col-lg-2 col-4 mt-11 text-center">
                            <h6 class="fs-14 mb-0">3 BHK</h6>
                            <span class="fs-12 text-grey"> Configuration </span>
                        </div>
                        <div class="col-lg-2 col-4 mt-11 text-center">
                            <h6 class="fs-14 mb-0">Jul 2021</h6>
                            <span class="fs-12 text-grey"> Posted On </span>
                        </div>
                        <div class="col-lg-2 col-4 mt-11 text-center">
                            <h6 class="fs-14 mb-0">UnFurnished</h6>
                            <span class="fs-12 text-grey"> Furnishing </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-lg-8">
                <div class="bhk-box">
                    <h4 class="fs-20 text-deco">Overview</h4>
                    <table class="table mt-20 table-responsive-md">
                        <tbody>
                        <tr>
                            <td class="border-top-0">Overview 1</td>
                            <td class="border-top-0 fw-700">Overview 1 result</td>
                            <td class="border-top-0">Overview 3</td>
                            <td class="fw-700 border-top-0">Overview 3 result</td>
                        </tr>
                        <tr>
                            <td>Overview 2</td>
                            <td class="fw-700">Overview 2 result</td>
                            <td>Overview 3</td>
                            <td class="fw-700">Overview 3 result</td>
                        </tr>
                        <tr>
                            <td>Overview 3</td>
                            <td class="fw-700">Overview 3 result</td>
                            <td>Overview 3</td>
                            <td class="fw-700">Overview 3 result</td>
                        </tr>
                        <tr>
                            <td>Overview 4</td>
                            <td class="fw-700">Overview 4 result</td>
                            <td>Overview 3</td>
                            <td class="fw-700">Overview 3 result</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!--    pop up btn-->
                <button type="button" class="btn-success position-f dn1" id="agentButton" hidden data-toggle="modal"
                        data-target="#exampleModal1">
                    Contact Agent / Sign Up
                </button>
                <!--end of pop up btn-->
                <div class="bhk-box mt-20">
                    <h4 class="fs-20 text-deco">Description</h4>
                    <p class="mt-20 fs-16 fw-400">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam
                        cupiditate eaque fugit magni molestiae architecto. Possimus
                        consequatur explicabo nesciunt nostrum! Dignissimos non ipsum eum,
                        quisquam quia. M fw-400inima, placeat. Sunt, hic.
                    </p>
                    <p class="mt-20 fs-16 fw-400">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam
                        cupiditate eaque fugit magni molestiae architecto. Possimus
                        consequatur explicabo nesciunt nostrum! Dignissimos non ipsum eum,
                        quisquam quia. Minima, placeat. Sunt, hic.
                    </p>
                </div>
                <div class="bhk-box mt-20">
                    <h4 class="fs-20 text-deco">Amenities</h4>
                    <div class="row mt-20">
                        <div class="custom-col-2 px-10 text-center">
                            <div class="amenities-box">
                                <ul class="text-center list-unstyled">
                                    <li>
                                        <img src="imgs/photo.png" alt="" class="img-fluid mt-10" />
                                    </li>
                                    <li class="fs-12 fw-700 mt-10">Amenity 1</li>
                                </ul>
                            </div>
                        </div>
                        <div class="custom-col-2 px-10 text-center">
                            <div class="amenities-box">
                                <ul class="text-center list-unstyled">
                                    <li>
                                        <img src="imgs/photo.png" alt="" class="img-fluid mt-10" />
                                    </li>
                                    <li class="fs-12 fw-700 mt-10">Amenity 2</li>
                                </ul>
                            </div>
                        </div>
                        <div class="custom-col-2 px-10 mt-21 text-center">
                            <div class="amenities-box">
                                <ul class="text-center list-unstyled">
                                    <li>
                                        <img src="imgs/photo.png" alt="" class="img-fluid mt-10" />
                                    </li>
                                    <li class="fs-12 fw-700 mt-10">Amenity 3</li>
                                </ul>
                            </div>
                        </div>
                        <div class="custom-col-2 px-10 mt-21 text-center">
                            <div class="amenities-box">
                                <ul class="text-center list-unstyled">
                                    <li>
                                        <img src="imgs/photo.png" alt="" class="img-fluid mt-10" />
                                    </li>
                                    <li class="fs-12 fw-700 mt-10">Amenity 4</li>
                                </ul>
                            </div>
                        </div>
                        <div class="custom-col-2 px-10 mt-21 text-center">
                            <div class="amenities-box">
                                <ul class="text-center list-unstyled">
                                    <li>
                                        <img src="imgs/photo.png" alt="" class="img-fluid mt-10" />
                                    </li>
                                    <li class="fs-12 fw-700 mt-10">Amenity 5</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="custom-col-2 px-10 text-center">
                            <div class="amenities-box">
                                <ul class="text-center list-unstyled">
                                    <li>
                                        <img src="imgs/photo.png" alt="" class="img-fluid mt-10" />
                                    </li>
                                    <li class="fs-12 fw-700 mt-10">Amenity 6</li>
                                </ul>
                            </div>
                        </div>
                        <div class="custom-col-2 px-10 text-center">
                            <div class="amenities-box">
                                <ul class="text-center list-unstyled">
                                    <li>
                                        <img src="imgs/photo.png" alt="" class="img-fluid mt-10" />
                                    </li>
                                    <li class="fs-12 fw-700 mt-10">Amenity 7</li>
                                </ul>
                            </div>
                        </div>
                        <div class="custom-col-2 px-10 mt-21 text-center">
                            <div class="amenities-box">
                                <ul class="text-center list-unstyled">
                                    <li>
                                        <img src="imgs/photo.png" alt="" class="img-fluid mt-10" />
                                    </li>
                                    <li class="fs-12 fw-700 mt-10">Amenity 8</li>
                                </ul>
                            </div>
                        </div>
                        <div class="custom-col-2 px-10 mt-21 text-center">
                            <div class="amenities-box">
                                <ul class="text-center list-unstyled">
                                    <li>
                                        <img src="imgs/photo.png" alt="" class="img-fluid mt-10" />
                                    </li>
                                    <li class="fs-12 fw-700 mt-10">Amenity 9</li>
                                </ul>
                            </div>
                        </div>
                        <div class="custom-col-2 px-10 mt-21 text-center">
                            <div class="amenities-box">
                                <ul class="text-center list-unstyled">
                                    <li>
                                        <img src="imgs/photo.png" alt="" class="img-fluid mt-10" />
                                    </li>
                                    <li class="fs-12 fw-700 mt-10">Amenity 10</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bhk-box mt-20">
                    <div class="row">
                        <div class="col-lg-8 col-8">
                            <h4 class="fs-20 text-deco">Floor Plan</h4>
                            <h4 class="fs-16 fw-400 mt-20">3 BHK Apartment</h4>
                            <h4 class="fs-18 fw-700">$123,000</h4>
                        </div>
                        <div class="col-lg-4 col-4">
                            <div class="floorplan-box">
                                <ul class="nav nav-pills mb-3 justify-content-end" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                           href="#pills-home" role="tab" aria-controls="pills-home"
                                           aria-selected="true">2D</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                           href="#pills-profile" role="tab" aria-controls="pills-profile"
                                           aria-selected="false">3D</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-20">
                        <div class="col-lg-12 text-center">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                     aria-labelledby="pills-home-tab">
                                    <img src="imgs/map.png" alt="" class="img-fluid" />
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                     aria-labelledby="pills-profile-tab">
                                    ...
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-30">
                    <div class="col-lg-4 offset-lg-4 text-center">
                        <button type="button" class="btn btn-info"
                                style="font-size: 14px; padding: 10px 20px !important">
                            Contact Listing Agent
                        </button>
                    </div>
                </div>
                <div class="bhk-box mt-20">
                    <h4 class="fs-20 text-deco">Neighbourhood</h4>
                    <div class="row mt-20">
                        <div class="col-lg-12">
                            <input type="text" class="form-control h-10" style="border: 1px solid #d5d5d5 !important"
                                   placeholder="Type in place to get direction" />
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22997.172272146225!2d-80.0478016302069!3d43.90458695755299!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d4cb90d7c63ba5%3A0x323555502ab4c477!2sToronto%2C%20ON%2C%20Canada!5e0!3m2!1sen!2s!4v1635784562873!5m2!1sen!2s"
                                width="100%" height="520" style="border-radius: 25px; border: 0px; margin-top: 20px"
                                allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
                <div class="bhk-box mt-20">
                    <div class="row">
                        <div class="col-lg-8 col-8">
                            <h4 class="fs-20 text-deco">
                                Customers who viewed this property also liked
                            </h4>
                        </div>
                        <div class="col-lg-4 col-4 text-right">
                            <h4><a href="" class="text-green fs-20">View All</a></h4>
                        </div>
                    </div>
                    <div class="row mt-20">
                        <div class="col-lg-12 blog">
                            <div class="owl-carousel blog-carousel owl-theme">
                                <div class="item">
                                    <div class="card" style="width: 100%">
                                        <img src="imgs/slider.png" class="card-img-top img-fluid w-100" alt="..." />
                                        <div class="card-body">
                                            <h6 class="fs-16">Property Name #1</h6>
                                            <ul class="list-unstyled fs-12 text-grey">
                                                <li>By Agent Name #1</li>
                                                <li>3 BHK Apartment</li>
                                                <li>Location</li>
                                            </ul>
                                            <h6 class="fs-16 mt-26">$55,000</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card" style="width: 100%">
                                        <img src="imgs/slider.png" class="card-img-top img-fluid w-100" alt="..." />
                                        <div class="card-body">
                                            <h6 class="fs-16">Property Name #1</h6>
                                            <ul class="list-unstyled fs-12 text-grey">
                                                <li>By Agent Name #1</li>
                                                <li>3 BHK Apartment</li>
                                                <li>Location</li>
                                            </ul>
                                            <h6 class="fs-16 mt-26">$55,000</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card" style="width: 100%">
                                        <img src="imgs/slider.png" class="card-img-top img-fluid w-100" alt="..." />
                                        <div class="card-body">
                                            <h6 class="fs-16">Property Name #1</h6>
                                            <ul class="list-unstyled fs-12 text-grey">
                                                <li>By Agent Name #1</li>
                                                <li>3 BHK Apartment</li>
                                                <li>Location</li>
                                            </ul>
                                            <h6 class="fs-16 mt-26">$55,000</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bhk-box mt-20" style="background-color: #262222; border: 0px">
                    <div class="row mt-10">
                        <div class="col-lg-8 center">
                            <h4 class="fs-20 text-white fw-400">
                                List Your Property on TutunjiRealty.com
                            </h4>
                            <h5 class="fs-18 text-grey">
                                For Free. Without any brokerage.
                            </h5>
                        </div>
                        <div class="col-lg-4 text-right center mt-21">
                            <button type="button" class="btn btn-info"
                                    style="font-size: 14px; padding: 10px 20px !important">
                                <i class="fas fa-plus mr-1"></i> Submit Property
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-agent-box mt-21">
                    <div class="agent-topbox">
                        <h6 class="fs-16">Get Your Exclusive VIP Package Here</h6>
                        <p class="fs-12">
                            Morbi accumsan ipsum velit nam nec tellus a odiose tincidunt
                            auctor aerat consequat auctor
                        </p>
                    </div>
                    <div class="agent-body">
                        <form>
                            <div class="form-group mt-10">
                                <label for="exampleFormControlSelect1" class="fs-12">Full Name:</label>
                                <input class="form-control br-30 fs-12" id="exampleFormControlSelect1"
                                       placeholder="Type your Full name" />
                            </div>
                            <div class="form-group mt-10">
                                <label for="exampleFormControlSelect1" class="fs-12">Phone Number:</label>
                                <input class="form-control br-30 fs-12" id="exampleFormControlSelect1"
                                       placeholder="Type your Phone Number" />
                            </div>
                            <div class="form-group mt-10">
                                <label for="exampleFormControlSelect1" class="fs-12">Email Address:</label>
                                <input class="form-control br-30 fs-12" id="exampleFormControlSelect1"
                                       placeholder="Type your Email" />
                            </div>
                            <p class="fs-12">Are you a brokerage or real estate agent</p>
                            <div class="row mt-10">
                                <div class="col-lg-6 col-6">
                                    <div class="sub-box">
                                        <ul class="box-sell p-0 mb-0 list-unstyled">
                                            <li>
                                                <input type="radio" id="Pre-Construction" name="selector" />
                                                <label for="Pre-Construction" class="mb-0 pb-3 fs-12">Yes</label>
                                                <div class="check"></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-6">
                                    <div class="sub-box">
                                        <ul class="box-sell p-0 mb-0 list-unstyled">
                                            <li>
                                                <input type="radio" id="Status-2" name="selector" />
                                                <label for="Status-2" class="mb-0 pb-3 fs-12">No</label>
                                                <div class="check"></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="agent-footer">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" class="btn btn-info"
                                            style="font-size: 14px; padding: 10px 20px !important">
                                        Register Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h4 class="fs-20 text-deco mt-20 mt-41">Similar Properties</h4>
                <div class="box1 mt-20">
                    <div class="row">
                        <div class="col-lg-5 col-5">
                            <img src="imgs/Component%208%20%E2%80%93%201.png" alt="" class="img-fluid" />
                        </div>
                        <div class="col-lg-7 col-7 mt-20">
                            <h6 class="fs-16">Property Name #1</h6>
                            <ul class="list-unstyled fs-12 text-grey">
                                <li>By Agent Name #1</li>
                                <li>3 BHK Apartment</li>
                                <li>Location</li>
                            </ul>
                            <h6 class="fs-16 mt-26">$55,000</h6>
                        </div>
                    </div>
                </div>
                <div class="box1 mt-20">
                    <div class="row">
                        <div class="col-lg-5 col-5">
                            <img src="imgs/Component%208%20%E2%80%93%201.png" alt="" class="img-fluid" />
                        </div>
                        <div class="col-lg-7 col-7 mt-20">
                            <h6 class="fs-16">Property Name #1</h6>
                            <ul class="list-unstyled fs-12 text-grey">
                                <li>By Agent Name #1</li>
                                <li>3 BHK Apartment</li>
                                <li>Location</li>
                            </ul>
                            <h6 class="fs-16 mt-26">$55,000</h6>
                        </div>
                    </div>
                </div>
                <div class="box1 mt-20">
                    <div class="row">
                        <div class="col-lg-5 col-5">
                            <img src="imgs/Component%208%20%E2%80%93%201.png" alt="" class="img-fluid" />
                        </div>
                        <div class="col-lg-7 col-7 mt-20">
                            <h6 class="fs-16">Property Name #1</h6>
                            <ul class="list-unstyled fs-12 text-grey">
                                <li>By Agent Name #1</li>
                                <li>3 BHK Apartment</li>
                                <li>Location</li>
                            </ul>
                            <h6 class="fs-16 mt-26">$55,000</h6>
                        </div>
                    </div>
                </div>
                <div class="box1 mt-20">
                    <div class="row">
                        <div class="col-lg-5 col-5">
                            <img src="imgs/Component%208%20%E2%80%93%201.png" alt="" class="img-fluid" />
                        </div>
                        <div class="col-lg-7 col-7 mt-20">
                            <h6 class="fs-16">Property Name #1</h6>
                            <ul class="list-unstyled fs-12 text-grey">
                                <li>By Agent Name #1</li>
                                <li>3 BHK Apartment</li>
                                <li>Location</li>
                            </ul>
                            <h6 class="fs-16 mt-26">$55,000</h6>
                        </div>
                    </div>
                </div>
                <div class="box1 mt-20">
                    <div class="row">
                        <div class="col-lg-5 col-5">
                            <img src="imgs/Component%208%20%E2%80%93%201.png" alt="" class="img-fluid" />
                        </div>
                        <div class="col-lg-7 col-7 mt-20">
                            <h6 class="fs-16">Property Name #1</h6>
                            <ul class="list-unstyled fs-12 text-grey">
                                <li>By Agent Name #1</li>
                                <li>3 BHK Apartment</li>
                                <li>Location</li>
                            </ul>
                            <h6 class="fs-16 mt-26">$55,000</h6>
                        </div>
                    </div>
                </div>
                <div class="box1 mt-20">
                    <div class="row">
                        <div class="col-lg-5 col-5">
                            <img src="imgs/Component%208%20%E2%80%93%201.png" alt="" class="img-fluid" />
                        </div>
                        <div class="col-lg-7 col-7 mt-20">
                            <h6 class="fs-16">Property Name #1</h6>
                            <ul class="list-unstyled fs-12 text-grey">
                                <li>By Agent Name #1</li>
                                <li>3 BHK Apartment</li>
                                <li>Location</li>
                            </ul>
                            <h6 class="fs-16 mt-26">$55,000</h6>
                        </div>
                    </div>
                </div>
                <div class="box1 mt-20">
                    <div class="row">
                        <div class="col-lg-5 col-5">
                            <img src="imgs/Component%208%20%E2%80%93%201.png" alt="" class="img-fluid" />
                        </div>
                        <div class="col-lg-7 col-7 mt-20">
                            <h6 class="fs-16">Property Name #1</h6>
                            <ul class="list-unstyled fs-12 text-grey">
                                <li>By Agent Name #1</li>
                                <li>3 BHK Apartment</li>
                                <li>Location</li>
                            </ul>
                            <h6 class="fs-16 mt-26">$55,000</h6>
                        </div>
                    </div>
                </div>
                <div class="box1 mt-20">
                    <div class="row">
                        <div class="col-lg-5 col-5">
                            <img src="imgs/Component%208%20%E2%80%93%201.png" alt="" class="img-fluid" />
                        </div>
                        <div class="col-lg-7 col-7 mt-20">
                            <h6 class="fs-16">Property Name #1</h6>
                            <ul class="list-unstyled fs-12 text-grey">
                                <li>By Agent Name #1</li>
                                <li>3 BHK Apartment</li>
                                <li>Location</li>
                            </ul>
                            <h6 class="fs-16 mt-26">$55,000</h6>
                        </div>
                    </div>
                </div>
                <div class="box1 mt-20">
                    <div class="row">
                        <div class="col-lg-5 col-5">
                            <img src="imgs/Component%208%20%E2%80%93%201.png" alt="" class="img-fluid" />
                        </div>
                        <div class="col-lg-7 col-7 mt-20">
                            <h6 class="fs-16">Property Name #1</h6>
                            <ul class="list-unstyled fs-12 text-grey">
                                <li>By Agent Name #1</li>
                                <li>3 BHK Apartment</li>
                                <li>Location</li>
                            </ul>
                            <h6 class="fs-16 mt-26">$55,000</h6>
                        </div>
                    </div>
                </div>
                <div class="box1 mt-20">
                    <div class="row">
                        <div class="col-lg-5 col-5">
                            <img src="imgs/Component%208%20%E2%80%93%201.png" alt="" class="img-fluid" />
                        </div>
                        <div class="col-lg-7 col-7 mt-20">
                            <h6 class="fs-16">Property Name #1</h6>
                            <ul class="list-unstyled fs-12 text-grey">
                                <li>By Agent Name #1</li>
                                <li>3 BHK Apartment</li>
                                <li>Location</li>
                            </ul>
                            <h6 class="fs-16 mt-26">$55,000</h6>
                        </div>
                    </div>
                </div>
                <div class="box1 mt-20">
                    <div class="row">
                        <div class="col-lg-5 col-5">
                            <img src="imgs/Component%208%20%E2%80%93%201.png" alt="" class="img-fluid" />
                        </div>
                        <div class="col-lg-7 col-7 mt-20">
                            <h6 class="fs-16">Property Name #1</h6>
                            <ul class="list-unstyled fs-12 text-grey">
                                <li>By Agent Name #1</li>
                                <li>3 BHK Apartment</li>
                                <li>Location</li>
                            </ul>
                            <h6 class="fs-16 mt-26">$55,000</h6>
                        </div>
                    </div>
                </div>
                <div class="box1 mt-20">
                    <div class="row">
                        <div class="col-lg-5 col-5">
                            <img src="imgs/Component%208%20%E2%80%93%201.png" alt="" class="img-fluid" />
                        </div>
                        <div class="col-lg-7 col-7 mt-20">
                            <h6 class="fs-16">Property Name #1</h6>
                            <ul class="list-unstyled fs-12 text-grey">
                                <li>By Agent Name #1</li>
                                <li>3 BHK Apartment</li>
                                <li>Location</li>
                            </ul>
                            <h6 class="fs-16 mt-26">$55,000</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-grey mt-80" style="background-color: #eeeeee">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <h1 class="fs-40 text-center bb-2 fw-700">Contact Us</h1>
                </div>
            </div>
            <div class="row mt-40">
                <div class="col-lg-8 offset-lg-2">
                    <p class="fs-16 fw-700 text-center">
                        Morbi accumsan ipsum velit nam nec tellus a odiose tincidunt
                        auctor a ornare odio sed non mauris vitae erat consequat auctor
                    </p>
                </div>
            </div>
            <div class="bg-white mt-40">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="text-center fs-30 fw-700">Send Us a Message</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <form>
                            <div class="form-group">
                                <label>Your Full Name</label>
                                <input type="Name" class="form-control" id="name" placeholder="Robison Croso" />
                            </div>
                            <div class="form-group">
                                <label>Your Contact Number</label>
                                <input type="number" class="form-control" id="name" placeholder="+99 98789 99899" />
                            </div>
                            <div class="form-group">
                                <label>Your Email Address</label>
                                <input type="email" class="form-control" id="email" placeholder="example@box.com" />
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <form>
                            <div class="form-group">
                                <label>Service you Looking For</label>
                                <input type="text" class="form-control" id="text" />
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Write Your Message</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary">Send Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-parrotgreen">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 center">
                    <h1 class="fs-40 text-white">
                        Sign Up for our<span class="fw-700"> Newsletter</span>
                    </h1>
                    <p class="mt-10 text-white">
                        Morbi accumsan ipsum velit nam nec tellus a odiose tincidunt
                        auctor a ornare odio sed non mauris vitae erat consequat auctor
                    </p>
                </div>
                <div class="col-lg-6 center">
                    <h6 class="fs-21 fw-700 text-white">Stay Connected</h6>
                    <form>
                        <div class="row mt-21">
                            <div class="col-lg-8">
                                <input type="text" class="form-control h-10" placeholder="Enter Email Id" />
                            </div>
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-light mb-2">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-dark">
        <div class="container">
            <div class="row center">
                <div class="col-lg-4 col-6">
                    <h5 class="fs-22 text-white">Learn More</h5>
                    <ul class="list-unstyled mt-20">
                        <li class="mt-10">
                            <a href="testimonials.html" class="text-grey">Testimonials</a>
                        </li>
                        <li class="mt-10">
                            <a href="agents.html" class="text-grey">Our Agents</a>
                        </li>
                        <li class="mt-10">
                            <a href="blogs.html" class="text-grey">Blogs</a>
                        </li>
                    </ul>
                    <h5 class="fs-22 text-white">Already a Member?</h5>
                    <ul class="list-unstyled mt-20 list-inline">
                        <li class="list-inline-item text-green fs-20">
                            <i class="far fa-user"></i>
                        </li>
                        <li class="list-inline-item mt-10">
                            <a href="sign-in.html" class="text-grey">Member Login</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-6">
                    <h5 class="fs-22 text-white">Company</h5>
                    <ul class="list-unstyled mt-20">
                        <li class="mt-10">
                            <a href="" class="text-grey">Partnerships</a>
                        </li>
                        <li class="mt-10">
                            <a href="" class="text-grey">Tutunji Realty Ventures</a>
                        </li>
                        <li class="mt-10">
                            <a href="" class="text-grey">Acceptable Use Policy</a>
                        </li>
                        <li class="mt-10">
                            <a href="" class="text-grey">Cookie Policy</a>
                        </li>
                        <li class="mt-10">
                            <a href="" class="text-grey">DMCA Policy</a>
                        </li>
                        <li class="mt-10">
                            <a href="" class="text-grey">Privacy Policy</a>
                        </li>
                        <li class="mt-10">
                            <a href="" class="text-grey">Terms and Conditions</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5 class="fs-22 text-white">Contact</h5>
                    <ul class="list-unstyled mt-20">
                        <li class="mt-10 text-grey">
                            <img src="imgs/Icon%20ionic-ios-pin.png" alt="" class="img-fluid mr-2" />
                            123 contact address City, State, Country.
                        </li>
                        <li class="mt-10 text-grey">
                            <img src="imgs/Icon%20material-email.png" alt="" class="img-fluid mr-2" />
                            hello@tutunjirealty.com
                        </li>
                        <li class="mt-10 text-grey">
                            <img src="imgs/Icon%20material-phone.png" alt="" class="img-fluid mr-2" />
                            +1 6472807889
                        </li>
                    </ul>
                    <h5 class="fs-22 text-white mt-20">Follow Us</h5>
                    <ul class="list-unstyled list-inline mt-10">
                        <li class="list-inline-item">
                            <a href=""><img src="imgs/Group%20265.png" alt="" class="img-fluid" /></a>
                        </li>
                        <li class="list-inline-item">
                            <a href=""><img src="imgs/Group%20268.png" alt="" class="img-fluid" /></a>
                        </li>
                        <li class="list-inline-item">
                            <a href=""><img src="imgs/linkedin.png" alt="" class="img-fluid" /></a>
                        </li>
                        <li class="list-inline-item">
                            <a href=""><img src="imgs/Group%20271.png" alt="" class="img-fluid" /></a>
                        </li>
                    </ul>
                    <ul class="list-unstyled list-inline mt-10">
                        <li class="list-inline-item">
                            <img src="imgs/canada%20flag.png" alt="" class="img-fluid" />
                        </li>
                        <li class="list-inline-item">Proudly Canadian</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
