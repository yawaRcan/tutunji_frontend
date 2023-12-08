<div class="bg-black">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-4">
                <a href="{{url('/')}}"><img src="{{asset('')}}frontend/assets/imgs/LogoTransparent.png" alt="" class="img-fluid w-110"></a>
            </div>
            <div class="col-lg-8 dn mt-26 text-center">
                <div class="input-group">
                    <input type=" text" class="form-control br-3" placeholder="Search Properties, Location, Projects..." aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                </div>
            </div>
            <div class="col-lg-2 col-8 mt-35 text-right">
                <ul class="list-unstyled list-inline">
                    <li type="button" class="list-inline-item text-green fs-20 dn1" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-search"></i></li>
                    <li class="list-inline-item text-green fs-20"><i class="far fa-user"></i></li>
                    <li class="list-inline-item fs-20"><a href="{{url('/sign-in')}}" class="text-green">LogIn</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
