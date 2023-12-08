{{--<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-small">--}}
{{--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--        <span class="navbar-toggler-icon"></span>--}}
{{--    </button>--}}
{{--    <div class="collapse navbar-collapse" id="navbarNav" style="padding: 15px;">--}}
{{--        <ul class="navbar-nav text-center">--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link mobile-menu" href="{{url('/')}}" style="padding-top: 7px;">Home</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="#about" style="padding-top: 7px;">--}}
{{--                    About Us--}}
{{--                </a>--}}
{{--                <div class="dropdown">--}}
{{--                    <a class="btn btn-secondary bg-transparent dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false" style="font-weight: 700;color: #262222">--}}
{{--                        About Us--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-menu dropdown-content text-center" aria-labelledby="dropdownMenuLink">--}}
{{--                        <a class="dropdown-item" href="#about" onclick="window.open('{{url('/about')}}');">About Tutunji Realty</a>--}}
{{--                        <a class="dropdown-item" href="#featured_in">Featured In</a>--}}
{{--                        <a class="dropdown-item" href="#agent" onclick="window.open('{{url('/agent')}}');">Our Team</a>--}}
{{--                        <a class="dropdown-item" href="#blogs" onclick="window.open('{{url('/blog-page')}}');">Blogs</a>--}}
{{--                        <a class="dropdown-item" href="#newsletter">Newsletter</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="#">--}}
{{--                    <div class="dropdown">--}}
{{--                        <button class="btn btn-secondary btn-transparent dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            Browse Real Estate--}}
{{--                        </button>--}}
{{--                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                            <a class="dropdown-item" href="{{url('/pre-construct-search')}}">Pre-construct Property</a>--}}
{{--                            <button class="dropdown-item" type="button">Another action</button>--}}
{{--                            <button class="dropdown-item" type="button">Something else here</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="dropdown">--}}
{{--                        <a class="btn btn-secondary bg-transparent dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false" style="font-weight: 700;color: #262222">--}}
{{--                            Browse Real Estate--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-menu dropdown-content text-center" aria-labelledby="dropdownMenuLink">--}}
{{--                            <a class="dropdown-item" href="{{url('/pre-construct-search')}}">Pre-Construction Properties</a>--}}
{{--                            <a class="dropdown-item" href="{{url('/sale-search')}}">For Sale/Lease Properties</a>--}}
{{--                            <a class="dropdown-item" href="#browse_cities">Browse Areas</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link mobile-menu" href="#testimonial" style="padding-top: 7px;">Testimonials</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="#container-gsap" style="padding-top: 7px;">Our Strategy</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="#contact" style="padding-top: 7px;">Contact Us</a>--}}
{{--            </li>--}}
{{--        </ul>--}}

{{--        <button type="button" class="btn btn-success"><img src="{{asset('')}}frontend/assets/imgs/Group%2014.png" alt="" class="img-fluid w-24">Sell My Property</button>--}}

{{--    </div>--}}
{{--</nav>--}}
<!-- new navbar -->

<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-small">
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
{{--                    <div class="filter-dropdown">--}}
{{--                        <button class="btn btn-secondary btn-transparent dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            Browse Real Estate--}}
{{--                        </button>--}}
{{--                        <div class="dropdown-menu" style="top: 44px;">--}}
{{--                            <a class="dropdown-item" href="{{url('/pre-construct-search')}}">Upcoming Pre-Construction Projects</a>--}}
{{--                            <a class="dropdown-item" href="{{url('/sale-search')}}">New Construction For Sale/Lease </a>--}}
{{--                            <a class="dropdown-item browse_cities" href="{{url('/#browse_cities')}}">Browse Popular Areas</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="filter-dropdown">
                        <button class="btn btn-secondary btn-transparent dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Browse Real Estate
                        </button>
                        <div class="dropdown-menu" style="top: 44px;">
                            <a class="dropdown-item" href="{{url('/pre-construct-search')}}">Upcoming Pre-Construction Projects</a>
                            <a class="dropdown-item" href="{{url('/sale-search')}}">New Construction For Sale/Lease</a>
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
<style>
    html{
        scroll-behavior: smooth;
    }
    .navbar-expand-lg .navbar-nav .nav-link {
        padding-right: 20px;
        padding-left: 20px;
    }
</style>

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

