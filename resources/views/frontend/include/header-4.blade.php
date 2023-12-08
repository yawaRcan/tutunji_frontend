<div class="bg-black">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-4">
                <a href="{{url('/')}}"><img src="{{asset('')}}frontend/assets/imgs/LogoTransparent.png" alt="" class="img-fluid w-110"></a>
            </div>
            <div class="col-lg-8 dn mt-26 text-center">
                <div class="input-group">
                    <input type="text" class="form-control br-3" placeholder="Search Properties, Location, Projects..." aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                </div>
            </div>
            <div class="col-lg-2 col-8 mt-26 mt-31 text-right p-0">
                <ul class="list-unstyled list-inline d-flex justify-content-end">
                    <li type="button" class="list-inline-item text-green fs-20 dn1" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-search top-6"></i></li>
{{--                    <li class="list-inline-item">--}}
{{--                        <img src="{{asset('')}}frontend/assets/imgs/Ellipse%2057-1.png" alt="" class="img-fluid w-40">--}}
{{--                    </li>--}}
                    <li class="list-inline-item">
{{--                        <input type="text" name="image" value="noimage.png">--}}
                        @if(Auth::check() && Auth::user()->image)
                            <img src="{{asset('frontend/assets/profile/'.Auth::user()->image)}}" class="user" width="40px">
                        @else
                            <img src="{{asset('default/blank-profile.png')}}" class="user" width="40px">
                        @endif
                    </li>
                    <li class="list-inline-item">
                        <div class="dropdown">
                            <a class="btn btn-secondary bg-transparent dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                            </a>
                            <div class="dropdown-menu r-0" aria-labelledby="dropdownMenuLink">

{{--                                <img src="{{asset('')}}frontend/assets/imgs/Ellipse%2057-1.png" alt="" class="img-fluid m-auto d-block">--}}
                                <div class="text-center">
                                    @if(Auth::check() && Auth::user()->image)
                                        <img src="{{asset('frontend/assets/profile/'.Auth::user()->image)}}" height="60px" width="60px" style="border-radius: 30px;">
                                    @else
                                        <img src="{{asset('default/blank-profile.png')}}" height="60px" width="60px" style="border-radius: 30px;">
                                    @endif
                                </div>

                                <h4 class="text-center mt-20"><a class="fs-16 fw-700 mt-10 text-black text-decoration-none" href="#">{{Auth::user()->name}}</a></h4>
                                <h4 class="text-center"><a class="text-grey fs-14 text-decoration-none" href="#">{{Auth::user()->email}}</a></h4>
                                <hr>
                                <a class="dropdown-item" href="{{url('/dashboard')}}">Dashboard</a>
                                <a class="dropdown-item" href="{{url('/my-properties')}}">My Properties</a>
                                <a class="dropdown-item" href="{{url('/my-favourite')}}">Favorites</a>
                                <a class="dropdown-item" href="{{url('/my-profile')}}">Profile</a>
                                <hr>
                                <a class="dropdown-item text-danger" href="{{url('/logout')}}">Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
