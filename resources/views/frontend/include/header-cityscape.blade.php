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
    }

</style>
<body>
    <div class="bg-black logo-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-4" id="web-logo">
                    <a href="{{url('/')}}"><img src="{{asset('')}}frontend/assets/imgs/Logo SVG (no brokered).svg" alt="" class="header-logo-1"></a>
                </div>
                <div class="col-lg-8 dn mt-26 text-center">
                    <p>About Cityscape: Tutunji Realty’s Brokerage  </p>
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
