<style>
    /* tablet size between 768px up and 992px down */
    @media (min-width: 768px) and (max-width: 992px) {
        .logo-header{
            padding: 20px 20px 60px 20px;
        }
        .header-logo-1{
            height: 100px;
        }
        .navbar{
            width: 100%;
        }
        .header-logo-2{
            height: 100px;
        }
    }
    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 600px) {
        .logo-header{
            padding: 20px 20px 60px 20px;
        }
        .header-logo-1{
            height: 70px;
        }
        .navbar{
            width: 100%;
        }
        .header-logo-2{
            height: 70px;
        }
        .ctscp-middle{
            margin-top: 20px;
        }
        .ctscp-middle p{
            font-size: 11px;
        }
    }
</style>
<body>
@if(\Request::is('pre-construct-property/*'))
    {{--    @if($banner = \App\Models\Property::query()->where())--}}
    <div class="bg-black p-100" data-toggle="modal" data-target="#myModal" style="background-image: url('{{asset("admin-panel/assets/property-images/sample_banner.jpg")}}');width: 100%;background-size: cover;cursor: pointer;
    background-position: center;height: auto;">
        {{--        @endif--}}
        <div class="container">
            <div class="col-md-4 col-sm-4 col-xs-4" style="margin-left: auto;margin-right: auto;padding-top: 40px;">
            </div>
        </div>
    </div>
@elseif(\Request::is('about-cityScape'))
    <div class="bg-black logo-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-4" id="web-logo">
                    <a href="{{url('/')}}"><img src="{{asset('')}}frontend/assets/imgs/Logo SVG (no brokered).svg" alt="" class="ctscp-logo-1"></a>
                </div>
                <div class="col-lg-8 col-4 mt-26 text-center ctscp-middle">
                    <p style="color: #ffba24">About Cityscape: Tutunji Realty’s Brokerage</p>
                </div>
                <div class="col-lg-2 col-4 text-right">
                    <a href="#"><img src="{{asset('')}}frontend/assets/imgs/Cityscape White.svg" alt="" class="ctscp-logo-2"></a>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="bg-black logo-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-4" id="web-logo">
                    <a href="{{url('/')}}"><img src="{{asset('')}}frontend/assets/imgs/Logo SVG (no brokered).svg" alt="" class="header-logo-1"></a>
                </div>
                <div class="col-lg-8 dn mt-26 text-center">
                </div>
                <div class="col-lg-2 col-8 text-right">
                    <a href="#"><img src="{{asset('')}}frontend/assets/imgs/Cityscape White.svg" alt="" class="header-logo-2"></a>
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
