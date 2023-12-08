@extends('frontend.layout.master')
@section('title')
<title>Blog detail</title>
<style>
    .card{
        height: 100%;
    }
</style>
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
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-darkgrey fw-700">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('/blog-page')}}" class="text-darkgrey fw-700">Blogs</a></li>
                <li class="breadcrumb-item active fw-700" aria-current="page">{{$blogDetail[0]->title}}</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="row mt-20">
            <div class="col-lg-12">
                <h1 class="fs-30 fw-700">{{$blogDetail[0]->title}}</h1>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-lg-12">
                <ul class="list-unstyled list-inline text-greyishblack">
                    <li class="list-inline-item">Posted : 10 Mins ago</li>
                    <li class="list-inline-item">|</li>
                    <li class="list-inline-item">Share </li>
                    <li class="list-inline-item"><i class="fas fa-share"></i></li>
                    <li class="list-inline-item"><a href="https://www.facebook.com/sharer/sharer.php?u=https://www.tutunjirealty.com/demo/public" target="_blank"><img src="{{asset('')}}frontend/assets/imgs/Group%20265.png" alt="" class="img-fluid"></a></li>
                    <li class="list-inline-item"><a href="https://twitter.com/intent/tweet?text=Check+out+this+Real+Estate+blog%21&url=https://www.tutunjirealty.com/demo/public" target="_blank"><img src="{{asset('')}}frontend/assets/imgs/Group%20268.png" alt="" class="img-fluid"></a></li>
                    <li class="list-inline-item"><a href="#"><img src="{{asset('')}}frontend/assets/imgs/instagram.png" alt="" class="img-fluid"></a></li>
                    <li class="list-inline-item"><a href="#"><img src="{{asset('')}}frontend/assets/imgs/Group%20271.png" alt="" class="img-fluid"></a></li>
                    <li class="list-inline-item"><a href="https://www.linkedin.com/sharing/share-offsite?mini=true&url=https://www.tutunjirealty.com/demo/public&title=Check+out+this+Real+Estate+blog%21&summary=" target="_blank"><img src="{{asset('')}}frontend/assets/imgs/linkedin.png" alt="" class="img-fluid"></a></li>
                    <li class="list-inline-item"><a href="#"><img src="{{asset('')}}frontend/assets/imgs/tiktok.svg" alt="" class="img-fluid"></a></li>

                </ul>
            </div>
        </div>
        <div class="row mt-40">
            <div class="col-lg-12">
                <img src="{{asset('admin-panel/assets/blog-image/'.$blogDetail[0]->image)}}" alt="" class="img-fluid w-100 img-mob-blog" height="605px">
                <p class="mt-20 fs-18 text-para">{{$blogDetail[0]->body}}</p>
{{--                <p class="mt-20 fs-18 text-para">{{$blogDetail[0]->description}}</p>--}}
{{--                <p class="mt-20 fs-18 text-para">{{$blogDetail[0]->description}}</p>--}}

            </div>
        </div>
        <div class="row mt-40">
            <div class="col-lg-12">
                <div class="bg-blog">
                    <p class="fs-24 mb-0 fw-700"> {{$blogDetail[0]->middleBanner}}</p>
                </div>
            </div>
        </div>
        <div class="row mt-40">
            <div class="col-lg-12">
                <p class="fs-18 text-para">{{$blogDetail[0]->body}}</p>
                <p class="mt-40 fs-18 text-para">{{$blogDetail[0]->body}}</p>
{{--                <p class="mt-40 fs-18 text-para">{{$blogDetail[0]->description}}</p>--}}
                <ul class="list-unstyled list-inline text-greyishblack mt-40">
                    <li class="list-inline-item">Share </li>
                    <li class="list-inline-item"><i class="fas fa-share"></i></li>
                    <li class="list-inline-item"><a href="https://www.facebook.com/sharer/sharer.php?u=https://www.tutunjirealty.com/demo/public" target="_blank"><img src="{{asset('')}}frontend/assets/imgs/Group%20265.png" alt="" class="img-fluid"></a></li>
                    <li class="list-inline-item"><a href="https://twitter.com/intent/tweet?text=Check+out+this+Real+Estate+blog%21&url=https://www.tutunjirealty.com/demo/public" target="_blank"><img src="{{asset('')}}frontend/assets/imgs/Group%20268.png" alt="" class="img-fluid"></a></li>
                    <li class="list-inline-item"><a href="#"><img src="{{asset('')}}frontend/assets/imgs/instagram.png" alt="" class="img-fluid"></a></li>
                    <li class="list-inline-item"><a href="#"><img src="{{asset('')}}frontend/assets/imgs/Group%20271.png" alt="" class="img-fluid"></a></li>
                    <li class="list-inline-item"><a href="https://www.linkedin.com/sharing/share-offsite?mini=true&url=https://www.tutunjirealty.com/demo/public&title=Check+out+this+Real+Estate+blog%21&summary=" target="_blank"><img src="{{asset('')}}frontend/assets/imgs/linkedin.png" alt="" class="img-fluid"></a></li>
                    <li class="list-inline-item"><a href="#"><img src="{{asset('')}}frontend/assets/imgs/tiktok.svg" alt="" class="img-fluid"></a></li>

                </ul>
            </div>
        </div>
        <hr class="hr-blog">
        <div class="row mt-40">
            <div class="col-lg-12">
                <h4 class="fs-20 fw-700 text-deco">Similar Blogs</h4>
            </div>
        </div>
    </div>
    <div class="container-fluid blog mt-40">
        <div class="row">
            <div class="col-lg-12 pr-0 pl-0">
                <div class="owl-carousel blog-carousel1 owl-theme">
                    @foreach($similarBlogs as $similarData)
                    <div class="item">
                        <div class="card" style="width: 100%;">
                            @if($similarData->image)
                                <img src="{{asset('admin-panel/assets/blog-image/'.$similarData->image)}}" class="card-img-top img-fluid" alt="..." height="295px">
                            @else
                                <img src="{{asset('default/404-not-found.jpg')}}" class="card-img-top img-fluid" alt="...">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{$similarData->title ? $similarData->title : '-'}}</h5>
                                <p class="card-text">{{\Illuminate\Support\Str::limit($similarData->body ? $similarData->body : '-', 170)}}</p>
                                <a href="{{url('blog-detail',$similarData->id)}}" style="color: #164DF3; text-decoration: none;">Read more ></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="bg-parrotgreen mt-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 center">
                    <h1 class="fs-40 text-white">Sign Up for our<span class="fw-700"> Newsletter</span></h1>
                    <p class="mt-10 text-white">CJoin Our Inner Circle: Get Exclusive Real Estate Insights, News, Deals & Updates On The Ever So Changing Ontario, Canada Real Estate Market!</p>
                </div>
                <div class="col-lg-6 center">
                    {{--                    <h6 class="fs-21 fw-700 text-white">Stay Connected</h6>--}}
                    <form>
                        <div class="row mt-21" style="margin-top: 8px;">
                            <div class="col-lg-8">
                                <input type="email" class="form-control h-10" name="subscriber_email" id="subscriber_email" placeholder="Enter Email Address">
                                <div id="status"></div>
                                <div id="content"></div>
                                {{-- <input type="text" class="form-control h-10" placeholder="Enter Email Id">--}}
                            </div>
                            <div class="col-lg-4">
                                <button type="button" class="btn btn-light mb-2" name="subscribe_now" id="subscribe_now">Submit</button>
                                {{-- <button type="button" name="subscribe_now" id="subscribe_now"><i class="fa fa-send"></i></button>--}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- subscribe fornewsletter -->
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
@endsection
