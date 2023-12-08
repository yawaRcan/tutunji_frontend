<style>
    /* tablet size between 768px up and 992px down */
    @media (min-width: 768px) and (max-width: 992px) {
        .logo-header{
            padding: 15px 20px 35px 20px;
        }
        .header-logo-1{
            height: 100px;
        }
        .navbar{
            width: 100%;
        }

    }
    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 600px) {
        .logo-header{
            padding: 10px 20px 30px 20px;
        }
        .header-logo-1{
            height: 77px;
        }
        .navbar{
            width: 100%;
        }
        .header-logo-2{
            height: 64px;
        }
        .ctscp-middle{
            margin-top: 20px;
        }
        .ctscp-middle p{
            font-size: 11px;
        }
    }
    @media only screen and (device-width: 280px){
        .header-logo-1{
            height: 65px;
        }
        .header-logo-2{
            height: 56px;
        }
    }
</style>
<body>
@if(\Request::is('pre-construct-property/*'))
{{-- for desktop --}}
    <div class="pre-construct-header-web">
        @if($banner = \App\Models\Banner4::query()->where('property_id',request()->route('id'))->get('banner_4'))
            @if($banner->count() > 0)
                <div class="bg-black p-100 pre-construct-header" data-toggle="modal" data-target="#myModal" style="background-image: url('{{asset("admin-panel/assets/property-images/banner-4/".$banner[0]->banner_4)}}');width: 100%;cursor: pointer;
                    background-position: center;background-repeat: no-repeat;   padding: 0;background-size: 100%;">
                </div>

            @else
                <div class="bg-black p-100 pre-construct-header" data-toggle="modal" data-target="#myModal" style="background-image: url('{{asset("admin-panel/assets/property-images/2500x280.webp")}}');width: 100%;cursor: pointer;
                background-position: center;background-repeat: no-repeat;    padding: 0;background-size: 100%;">
                </div>
            @endif
        @endif
    </div>

    {{-- For mobile --}}
    <div class="pre-construct-header-mobile">
        @if($banner5 = \App\Models\Banner5::query()->where('property_id',request()->route('id'))->get('banner_5'))
            @if($banner->count() > 0)
                <div class="bg-black p-100 pre-construct-header" data-toggle="modal" data-target="#myModal" style="background-image: url('{{asset("admin-panel/assets/property-images/banner-5/".$banner5[0]->banner_5)}}');width: 100%;cursor: pointer;
                    background-position: center;background-repeat: no-repeat;    padding-bottom: 0;padding-top: 0;background-size: 100%;">
                </div>

            @else
                <!--<div class="bg-black p-100 pre-construct-header" data-toggle="modal" data-target="#myModal" style="background-image: url('{{asset("admin-panel/assets/property-images/mobile-banner-pre-con.webp")}}');width: 100%;cursor: pointer;-->
                <!--background-position: center;background-repeat: no-repeat;    padding-bottom: 0;padding-top: 0;background-size: 100%;">-->
                <!--</div>-->
                <div class="bg-black p-100 pre-construct-header" data-toggle="modal" data-target="#myModal" style="background-image: url('{{asset("admin-panel/assets/property-images/mobile-banner1.webp")}}');width: 100%;cursor: pointer;
                background-position: center;background-repeat: no-repeat;    padding-bottom: 0;padding-top: 0;background-size: 100%;">
                </div>
            @endif
        @endif
    </div>
@elseif(\Request::is('about-cityScape'))
    <div class="bg-black logo-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-4" id="web-logo">
                    <a href="{{url('/')}}"><img src="{{asset('')}}frontend/assets/imgs/Tutunji Realty White.svg" alt="" class="header-logo-1"></a>
                </div>
                <div class="col-lg-8 col-4 mt-26 text-center ctscp-middle">
                    <p style="color: #ffba24">About Cityscape: Tutunji Realty’s Brokerage</p>
                </div>
                <div class="col-lg-2 col-4 text-right">
                    <a href="{{url('/about-cityScape')}}"><img src="{{asset('')}}frontend/assets/imgs/Cityscape White.svg" alt="" class="header-logo-2"></a>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="bg-black logo-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-4" id="web-logo">
                    <a href="{{url('/')}}"><img src="{{asset('')}}frontend/assets/imgs/Tutunji Realty White.svg" alt="" class="header-logo-1"></a>
                </div>
                <div class="col-lg-8 dn mt-26 text-center">
                </div>
                <div class="col-lg-2 col-8 text-right">
                    <a href="{{url('/about-cityScape')}}"><img src="{{asset('')}}frontend/assets/imgs/Cityscape White.svg" alt="" class="header-logo-2"></a>
                </div>
            </div>
        </div>
    </div>
@endif
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
