@extends('frontend.layout.master')
<!-- title -->
@section('title')
    <title>Tuntunji Realty | Blogs</title>
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
{{--        <nav aria-label="breadcrumb">--}}
{{--            <ol class="breadcrumb">--}}
{{--                <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-darkgrey fw-700">Home</a></li>--}}
{{--                <li class="breadcrumb-item active fw-700" aria-current="page">Blogs</li>--}}
{{--            </ol>--}}
{{--        </nav>--}}
    </div>
    <div class="bg-silver">
        <h1 class="fs-40 fw-700">Blogs</h1>
    </div>
    <div class="bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-8">
                    <h6 class="fs-24 fw-700">Blogs (36)</h6>
                </div>
                <div class="col-lg-2 col-4">
                    <select id="inputState" class="form-control br-4">
                        <option selected>New to Old</option>
                        <option>...</option>
                    </select>
                </div>
            </div>
            <div class="row mt-70">
                @foreach($allBlogData as $blogDetail)
                <div class="col-lg-4 mt-30">
                    <a href="{{url('blog-detail',$blogDetail->id)}}" style="color: #164DF3; text-decoration: none; font-size: 14px;">
                    <div class="card" style="width: 100%;">
                        <img src="{{asset('admin-panel/assets/blog-image/'.$blogDetail->image ? 'admin-panel/assets/blog-image/'.$blogDetail->image : 'default/blank-profile.png')}}" class="card-img-top img-fluid" alt="..." height="181px;">
                        <div class="card-body">
                            <h5 class="card-title fs-19">{{$blogDetail->title ? $blogDetail->title : '-'}}</h5>
                            <p class="card-text">{{\Illuminate\Support\Str::limit($blogDetail->body ? $blogDetail->body : '-', 200)}}</p>
                            <span style="color: #164DF3; font-size: 14px;">Read more > </span>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach

            </div>

            <div class="row mt-70">
                <div class="col-lg-12">
                    {{$allBlogData->onEachSide(0)->links('frontend.pages.pagination.blog-pagination')}}
{{--                    <nav aria-label="Page navigation example">--}}
{{--                        <ul class="pagination justify-content-center">--}}
{{--                            <li class="page-item mr-5">--}}
{{--                                <a class="page-link" href="#" aria-label="Previous">--}}
{{--                                    <span aria-hidden="true">&laquo;</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="page-item mr-5 active"><a class="page-link" href="#">1</a></li>--}}
{{--                            <li class="page-item mr-5"><a class="page-link" href="#">2</a></li>--}}
{{--                            <li class="page-item mr-5"><a class="page-link" href="#">3</a></li>--}}
{{--                            <li class="page-item mr-5">--}}
{{--                                <a class="page-link" href="#" aria-label="Next">--}}
{{--                                    <span aria-hidden="true">&raquo;</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </nav>--}}
                </div>

            </div>
        </div>
    </div>
    <div class="bg-parrotgreen">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 center">
                    <h1 class="fs-40 text-white">Sign Up for our<span class="fw-700"> Newsletter</span></h1>
                    <p class="mt-10 text-white">Join Our Inner Circle: Get Exclusive Real Estate Insights, News, Deals & Updates On The Ever So Changing Ontario, Canada Real Estate Market!</p>
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
