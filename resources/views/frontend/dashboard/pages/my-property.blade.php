@extends('frontend.layout.master')
@section('title')
    <title>Tuntunji Realty | My-property</title>
    <!-- begin social-media share icon style -->
    <style>
        .btn-icon{
            border:0;
            outline:0;
            height:40px;
            width:40px;
            border-radius:40px;
            background-color:#ccc;
            text-align: center;
            padding-top: 10px;
        }
        .expgroup{
            width:300px;
            height:40px;
            position:absolute;
            display:inline-block;
        }
        .icon{
            display:inline-block;
            position:relative;
            vertical-align:middle;
        }
        .material-icons{
            color:#ccc;
            /*font-size:32px;*/
        }
        .material-icons:hover{
            cursor:pointer;
            color:#a9a9a9;
        }
        .fa{
            color:#fff;
            /*font-size:26px;*/
        }
        .facebook:hover{
            background-color:#3b5998;
            cursor:pointer;
        }
        .linkedin:hover{
            background-color:#0077b5;
            cursor:pointer;
        }
        .twitter:hover{
            background-color: #3fc3ee;
            cursor: pointer;
        }
        .telegram:hover{
            background-color: #2f96b4;
            cursor: pointer;
        }
        .whatsapp:hover{
            background-color: #1ED65F;
            cursor: pointer;
        }
        /*.rotated{*/
        /*    -webkit-transform:rotate(45deg);*/
        /*    -moz-transform:rotate(45deg);*/
        /*    -ms-transform:rotate(45deg);*/
        /*    transform:rotate(45deg);*/
        /*}*/
    </style>
    <style>
        .navbar{
            position: initial;
        }
    </style>
    <!-- end social-media share icon style -->
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @include('frontend.include.navbar')
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-40">
            @include('frontend.dashboard.include.navigation_bar')

            <div class="col-lg-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <!-- my properties-->
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="fs-30 fw-700">My Properties</h1>
                            </div>
                        </div>
                        <!-- success message -->
                        @if( Session::has( 'success' ))
                            <div class="alert alert-success" style="margin-top: 30px;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Success! </strong>{{ Session::get( 'success' ) }}
                            </div>
                        @endif
                        <div class="row mt-20">
                            <div class="col-lg-12">

                                @if(empty($query))
                                    Whoops! No Records Found
                                @else
                                @foreach($query as $queryDetail)
                                <div class="appartment-box mt-20">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <a href="{{url('/sale-property',$queryDetail['id'])}}" class="text-black" style="text-decoration: none;">
                                            @php($url = ($queryDetail['user_details']['role']) == 'admin' ? 'admin-panel/assets/property-images/media-file/sale/' : 'frontend/assets/property-images/media-file/')
                                            <div class="bg-propertise"
                                                 @if($queryDetail['property_media'])
                                                 style="background-image: url('{{asset($url.$queryDetail['property_media']['media_name'])}}')"
                                                 @else
                                                 style="background-image: url('{{asset('default/404-not-found.jpg')}}')"
                                                @endif
                                            >
{{--                                                <img src="{{asset('frontend/assets/property-media/'.$queryDetail['property_media']['media_name'])}}">--}}
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="total-view">
                                                            <div class="row">
                                                                <div class="col-lg-4 col-4 center">
                                                                    @if(!empty($queryDetail['property_views']))
                                                                    <h1 class="fs-30 text-blue fw-700">{{$queryDetail['property_views']['total'] ? $queryDetail['property_views']['total'] : 0 }}</h1>
                                                                    @else
                                                                        <h1 class="fs-30 text-blue fw-700">0</h1>
                                                                    @endif
                                                                    {{--                                                                    <h1 class="fs-30 text-blue fw-700">{{$query[0]['property_views']}}</h1>--}}
                                                                </div>
                                                                <div class="col-lg-8 col-8 mt-10">
                                                                    <h4 class="fs-10">Total Views</h4>
                                                                    <h4 class="fs-10 text-grey">Today</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mt-21">
                                                        <div class="total-view">
                                                            <div class="row">
                                                                <div class="col-lg-4 col-4 center">
                                                                    @if($queryDetail['property_offer'])
                                                                        <h1 class="fs-30 text-orange fw-700">{{$queryDetail['property_offer']['total'] ? $queryDetail['property_offer']['total'] : 0 }}</h1>
                                                                    @else
                                                                        <h1 class="fs-30 text-orange fw-700">0</h1>
                                                                    @endif
                                                                </div>
                                                                <div class="col-lg-8 col-8 mt-10">
                                                                    <h4 class="fs-10">Total</h4>
                                                                    <h4 class="fs-10 text-grey">Offers</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                </a>
                                        </div>
{{--                                        @if($fav_data['property_data']['property_type'] == "sale")--}}
{{--                                            @php($url =  url('sale-property').'/'.$fav_data['property_data']['id'])--}}
{{--                                        @else--}}
{{--                                            @php($url =  url('pre-construct-property').'/'.$fav_data['property_data']['id'])--}}
{{--                                        @endif--}}
                                        <div class="col-lg-7">
                                            <a href="{{url('/sale-property',$queryDetail['id'])}}" class="text-black" style="text-decoration: none;">
                                            <div class="p-20">
                                               <a href="{{url('/sale-property',$queryDetail['id'])}}" class="text-black" style="text-decoration: none;">
                                                   <h4 class="fs-22 fw-700 mt-20">${{$queryDetail['price']}} <br>
{{--                                                       <span class="fs-12 text-grey">{{$queryDetail['address']}}</span>--}}
                                                   </h4>
                                               </a>
                                                <a href="{{url('/sale-property',$queryDetail['id'])}}" class="text-black" style="text-decoration: none;"><span class="fs-12 text-grey">
                                                    by {{($queryDetail['agent_details']) ? $queryDetail['agent_details']['fullName'] : '-'}}
                                                </span></a>
                                                <div class="blue-bar mt-20" onclick="location.href='{{url('/sale-property',$queryDetail['id'])}}';" style="cursor:pointer;">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-3">
                                                            <a href="{{url('/sale-property',$queryDetail['id'])}}" class="text-black" style="text-decoration: none;"><h6 class="fs-14 mb-0">${{($queryDetail['price']) ? $queryDetail['price'] : '-'}}</h6></a>
                                                            <a href="{{url('/sale-property',$queryDetail['id'])}}" class="text-black" style="text-decoration: none;"><span class="fs-12 text-grey">
                                                                8,002 / sq ft
                                                                </span></a>
                                                        </div>
                                                        <div class="col-lg-3 col-3">
                                                            <a href="{{url('/sale-property',$queryDetail['id'])}}" class="text-black" style="text-decoration: none;"><h6 class="fs-14 mb-0">{{($queryDetail['size_in_ft2']) ? $queryDetail['size_in_ft2'] : '-'}}</h6></a>
                                                            <a href="{{url('/sale-property',$queryDetail['id'])}}" class="text-black" style="text-decoration: none;"><span class="fs-12 text-grey">
                                                                Size in sq ft
                                                                </span></a>
                                                        </div>
{{--                                                        <div class="col-lg-4 col-4">--}}
{{--                                                            <h6 class="fs-14 mb-0">Pre-Construction</h6>--}}
{{--                                                            <span class="fs-12 text-grey">--}}
{{--                                                                Property Status--}}
{{--                                                            </span>--}}
{{--                                                        </div>--}}
                                                        <div class="col-lg-3 col-3">
                                                            <a href="{{url('/sale-property',$queryDetail['id'])}}" class="text-black" style="text-decoration: none;">
                                                            @if($queryDetail['internal_status'] == '0')
                                                                <h6 class="fs-14 mb-0">
                                                                    Pending
                                                                </h6>
                                                            @elseif($queryDetail['internal_status'] == '1')
                                                                <h6 class="fs-14 mb-0">
                                                                    Approved
                                                                </h6>
                                                            @else
                                                                <h6 class="fs-14 mb-0">
                                                                    Rejected
                                                                </h6>
                                                            @endif
                                                            <span class="fs-12 text-grey">
                                                                            Property Status
                                                            </span></a>
                                                        </div>
                                                        <div class="col-lg-3 col-3">
                                                            <a href="{{url('/sale-property',$queryDetail['id'])}}" class="text-black" style="text-decoration: none;">
                                                                <h6 class="fs-14 mb-0">{{($queryDetail['reject_reason']) ? $queryDetail['reject_reason'] : '-'}}</h6>
                                                            </a>
                                                            <a href="{{url('/sale-property',$queryDetail['id'])}}" class="text-black" style="text-decoration: none;"><span class="fs-12 text-grey">
                                                                            Reject Reason
                                                                </span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-20">
                                                    <div class="col-lg-8">
                                                        <a href="{{url('/sale-property',$queryDetail['id'])}}" class="text-black" style="text-decoration: none;">
                                                        <ul class="list-unstyled list-inline d-flex">
                                                            <li class="list-inline-item"><i class="fas fa-map-marker-alt"></i></li>
                                                            <li class="list-inline-item">{{$queryDetail['address']}}</li>
                                                        </ul></a>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <a href="{{url('/sale-property',$queryDetail['id'])}}" class="text-black" style="text-decoration: none;"> <ul class="list-unstyled list-inline">
                                                            <li class="list-inline-item"><i class="far fa-calendar-minus"></i></li>
                                                            <li class="list-inline-item">Posted on {{date('Y-m-d', strtotime($queryDetail['created_at']))}}</li>
                                                            </ul></a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <a href="{{url('/edit-property',$queryDetail['id'])}}" style="display: inline-block;width: 30%;color: #1ED65f"><i class="fa fa-edit" style="font-size: 18px;color: #1ED65F"></i></a>
{{--                                                        <a class="btn btn-primary" style="display: inline-block;width: 30%;"><i class="fa fa-trash-alt"></i></a>--}}
{{--                                                        <input type="text" name="user_id" value="{{$queryDetail['user_id']}}">--}}
{{--                                                        <button type="button" class="btn btn-info" style="font-size: 14px; padding: 10px 20px !important;">Contact Seller</button>--}}
                                                    </div>
                                                </div>

                                            </div></a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                    <div class="row mt-70">
                                        <div class="col-lg-12">
                                    {{$query->links('frontend.pages.pagination.my-properties-pagination')}}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- end of my propertise-->
                </div>
            </div>
        </div>
    </div>
    @include('frontend.include.news-letter-2')
    <!-- subscribe for newsletter -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#subscribe_now").click(function(e){
            e.preventDefault();
            //first load
            $("#status").empty().html('Please wait........').addClass('text-danger');
            var subscriber_email = $("#subscriber_email").val();
            $.ajax({
                url:"{{url('/subscribe-email')}}",
                method:'POST',
                data:{
                    _token: "{{ csrf_token() }}",email:subscriber_email
                },
                success:function(response){
                    //var data = JSON.parse(response);
                    var data = JSON.parse(JSON.stringify(response));
                    if(data.success == true){
                        // $('#subscribe_now').hide();
                        $('#status').empty().html(data.message).addClass('text-success');
                        $('#status').removeClass('text-danger')
                        // alert('subscribe successfully');
                    }else {
                        $('#status').show();
                        // $('#subscribe_now').hide();
                        $('#status').empty().html(data.message).addClass('text-danger');
                        $('#status').removeClass('text-success')
                    }
                },
            });
        });
    </script>
    <!-- Begin my property slider -->
    @section('my-property-slider')
        <script>
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 5,
                nav: false,
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
    @endsection
<!-- End my property slider -->
<!-- begin social-share-icon-script -->
<script>
    $(document).ready(function(){
        //$(".expgroup").hide();
        $(".add").click(function(){
            $("#share_button_"+$(this).attr('data-id')).animate({width:'toggle'}, function(){
                $(".add").toggleClass('rotated')
            });
        });
    });
</script>
<!-- end social-share-icon-script -->
@endsection
