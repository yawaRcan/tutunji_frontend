<div class="bg-black">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-4">
                <a href="{{url('/')}}"><img src="{{asset('')}}frontend/assets/imgs/LogoTransparent.png" alt="" class="img-fluid w-110"></a>
            </div>
            <div class="col-lg-8 dn mt-26 text-center">
{{--                <form class="form-group" id="form2">--}}
{{--                    @csrf--}}
{{--                    <div class="input-group">--}}
{{--                        <input type="search" class="form-control br-3" name="query" id="query" placeholder="Search Properties, Location, Projects..." value="{{request('query')}}" aria-label="Recipient's username" aria-describedby="button-addon2">--}}
{{--                        <button class="btn btn-outline-secondary" type="button" id="searchBtn"><i class="fas fa-search" style="padding: 3px;"></i></button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--                <div class="input-group">--}}
{{--                    <input type=" text" class="form-control br-3" placeholder="Search Properties, Location, Projects..." aria-label="Recipient's username" aria-describedby="button-addon2">--}}
{{--                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>--}}
{{--                </div>--}}
            </div>
            <div class="col-lg-2 col-8 mt-26 mt-31 text-right p-0">
{{--                <ul class="list-unstyled list-inline d-flex justify-content-end">--}}
{{--                    <li type="button" class="list-inline-item text-green fs-20 dn1" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-search top-6"></i></li>--}}
{{--                    <li class="list-inline-item">--}}
{{--                        <img src="{{asset('')}}frontend/assets/imgs/Ellipse%2057-1.png" alt="" class="img-fluid w-40">--}}
{{--                    </li>--}}
{{--                    <li class="list-inline-item">--}}
{{--                                            @if(Auth::check() && Auth::user()->image)--}}
{{--                                                <img src="{{asset('frontend/assets/profile/'.Auth::user()->image)}}" class="user" width="40px">--}}
{{--                                            @else--}}
{{--                                                <img src="{{asset('default/blank-profile.png')}}" class="user" width="40px">--}}
{{--                                            @endif--}}
{{--                                        </li>--}}
{{--                    <li class="list-inline-item">--}}
{{--                        <div class="dropdown">--}}
{{--                            <a class="btn btn-secondary bg-transparent dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">--}}
{{--                            </a>--}}
{{--                            <div class="dropdown-menu r-0" aria-labelledby="dropdownMenuLink">--}}
{{--                                <img src="imgs/Ellipse%2057-1.png" alt="" class="img-fluid m-auto d-block">--}}
{{--                                <div class="text-center">--}}
{{--                                                                        @if(Auth::check() && Auth::user()->image)--}}
{{--                                                                            <img src="{{asset('frontend/assets/profile/'.Auth::user()->image)}}" height="60px" width="60px" style="border-radius: 30px;">--}}
{{--                                                                        @else--}}
{{--                                                                            <img src="{{asset('default/blank-profile.png')}}" height="60px" width="60px" style="border-radius: 30px;">--}}
{{--                                                                        @endif--}}
{{--                                                                    </div>--}}
{{--                                <h4 class="text-center mt-20"><a class="fs-16 fw-700 mt-10 text-black text-decoration-none" href="#">{{Auth::user()->name}}</a></h4>--}}
{{--                                <h4 class="text-center"><a class="text-grey fs-14 text-decoration-none" href="#">{{Auth::user()->email}}</a></h4>--}}
{{--                                <hr>--}}
{{--                                <a class="dropdown-item" href="{{url('/dashboard')}}">Dashboard</a>--}}
{{--                                                                <a class="dropdown-item" href="{{url('/my-properties')}}">My Properties</a>--}}
{{--                                                                <a class="dropdown-item" href="{{url('/my-favourite')}}">Favorites</a>--}}
{{--                                                                <a class="dropdown-item" href="{{url('/my-profile')}}">Profile</a>--}}
{{--                                <hr>--}}
{{--                                <a class="dropdown-item text-danger" href="{{url('/logout')}}">Logout</a>                            </div>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                </ul>--}}
            </div>
        </div>
    </div>
</div>
<!-- begin search-property js -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $(document).on('click','#searchBtn',function () {
            var search_data = $('#query').val();
            var inputOptions = new Promise(function(resolve) {
                resolve({
                    'pre-construct': 'Pre-Construction',
                    'sale': 'For Sale',
                });
            });
            Swal.fire({
                icon: 'info',
                title: 'Would you like to see Pre-Construction or For Sale properties for your search?',
                input: 'radio',
                inputOptions: inputOptions,
                inputPlaceholder: 'Select Type',
                showCancelButton: true,
                confirmButtonColor: '#1ED65F',
                cancelButtonColor: '#949496',
                confirmButtonText: 'Ok',
                inputValidator: (value) => {
                    if (!value) {
                        //console.log(value);
                        return 'You need to select Type!'
                    } else {
                        window.location.href='{{ url("search-property?query=") }}'+search_data+'&property_type='+value;
                    }
                }
            });
        });
    });
</script>
<!-- end search-property js -->
{{--<style>--}}
{{--    .dropdown-content {--}}
{{--        display: block;--}}
{{--        opacity: 0;--}}
{{--        visibility: hidden;--}}
{{--        transform: translateY(20%);--}}
{{--        transition: all .5s;--}}
{{--    }--}}
{{--    .dropdown:hover .dropdown-content{--}}
{{--        opacity: 1;--}}
{{--        visibility: visible;--}}
{{--        transform: translateY(0%);--}}
{{--    }--}}
{{--</style>--}}
