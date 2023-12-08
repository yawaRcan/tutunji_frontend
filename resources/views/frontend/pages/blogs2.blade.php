@extends('frontend.layout.master')
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
                <li class="breadcrumb-item"><a href="blogs.html" class="text-darkgrey fw-700">Blogs</a></li>
                <li class="breadcrumb-item active fw-700" aria-current="page">Lorem ipsum dolor sit...</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="row mt-20">
            <div class="col-lg-12">
                <h1 class="fs-30 fw-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h1>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-lg-12">
                <ul class="list-unstyled list-inline text-greyishblack">
                    <li class="list-inline-item">Posted : 10 Mins ago</li>
                    <li class="list-inline-item">|</li>
                    <li class="list-inline-item">Share </li>
                    <li class="list-inline-item"><i class="fas fa-share"></i></li>
                    <li class="list-inline-item"><a href=""><img src="{{asset('')}}frontend/assets/imgs/Group%20265.png" alt="" class="img-fluid"></a></li>
                    <li class="list-inline-item"><a href=""><img src="{{asset('')}}frontend/assets/imgs/Group%20268.png" alt="" class="img-fluid"></a></li>
                    <li class="list-inline-item"><a href=""><img src="{{asset('')}}frontend/assets/imgs/instagram.png" alt="" class="img-fluid"></a></li>
                    <li class="list-inline-item"><a href=""><img src="{{asset('')}}frontend/assets/imgs/Group%20271.png" alt="" class="img-fluid"></a></li>
                </ul>
            </div>
        </div>
        <div class="row mt-40">
            <div class="col-lg-12">
                <img src="{{asset('')}}frontend/assets/imgs/Screen%20Shot%202020-08-21%20at%201.55.54%20PM.png" alt="" class="img-fluid w-100">
                <p class="mt-20 fs-18 text-para"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus unde delectus a vitae quos eaque, ratione, debitis, vel iure consequuntur accusantium, nihil impedit. Autem eos voluptas laboriosam asperiores, architecto eveniet. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam pariatur suscipit unde voluptates laudantium repellendus id a quasi quae cupiditate quam culpa dicta eaque natus minima exercitationem ex cum, veniam!</p>
                <p class="mt-40 fs-18 text-para"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus unde delectus a vitae quos eaque, ratione, debitis, vel iure consequuntur accusantium, nihil impedit. Autem eos voluptas laboriosam asperiores, architecto eveniet. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam pariatur suscipit unde voluptates laudantium repellendus id a quasi quae cupiditate quam culpa dicta eaque natus minima exercitationem ex cum, veniam!</p>
                <p class="mt-40 fs-18 text-para"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus unde delectus a vitae quos eaque, ratione, debitis, vel iure consequuntur accusantium, nihil impedit. Autem eos voluptas laboriosam asperiores, architecto eveniet. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam pariatur suscipit unde voluptates laudantium repellendus id a quasi quae cupiditate quam culpa dicta eaque natus minima exercitationem ex cum, veniam! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat laborum enim quidem maxime beatae illum eligendi, itaque assumenda neque pariatur ipsam, odit architecto recusandae distinctio excepturi error nobis perspiciatis facere! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo ratione impedit ipsam amet ullam eaque beatae iste voluptatibus dolor numquam laboriosam in delectus alias debitis vitae aliquid non, omnis tempore!</p>
            </div>
        </div>
        <div class="row mt-40">
            <div class="col-lg-12">
                <div class="bg-blog">
                    <p class="fs-24 mb-0 fw-700"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus unde delectus a vitae quos eaque, ratione, debitis, vel iure consequuntur accusantium, nihil impedit.</p>
                </div>
            </div>
        </div>
        <div class="row mt-40">
            <div class="col-lg-12">
                <p class="fs-18 text-para"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus unde delectus a vitae quos eaque, ratione, debitis, vel iure consequuntur accusantium, nihil impedit. Autem eos voluptas laboriosam asperiores, architecto eveniet. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam pariatur suscipit unde voluptates laudantium repellendus id a quasi quae cupiditate quam culpa dicta eaque natus minima exercitationem ex cum, veniam!</p>
                <p class="mt-40 fs-18 text-para"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus unde delectus a vitae quos eaque, ratione, debitis, vel iure consequuntur accusantium, nihil impedit. Autem eos voluptas laboriosam asperiores, architecto eveniet. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam pariatur suscipit unde voluptates laudantium repellendus id a quasi quae cupiditate quam culpa dicta eaque natus minima exercitationem ex cum, veniam!</p>
                <p class="mt-40 fs-18 text-para"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus unde delectus a vitae quos eaque, ratione, debitis, vel iure consequuntur accusantium, nihil impedit. Autem eos voluptas laboriosam asperiores, architecto eveniet. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam pariatur suscipit unde voluptates laudantium repellendus id a quasi quae cupiditate quam culpa dicta eaque natus minima exercitationem ex cum, veniam! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat laborum enim quidem maxime beatae illum eligendi, itaque assumenda neque pariatur ipsam, odit architecto recusandae distinctio excepturi error nobis perspiciatis facere! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo ratione impedit ipsam amet ullam eaque beatae iste voluptatibus dolor numquam laboriosam in delectus alias debitis vitae aliquid non, omnis tempore!</p>
                <ul class="list-unstyled list-inline text-greyishblack mt-40">
                    <li class="list-inline-item">Share </li>
                    <li class="list-inline-item"><i class="fas fa-share"></i></li>
                    <li class="list-inline-item"><a href=""><img src="{{asset('')}}frontend/assets/imgs/Group%20265.png" alt="" class="img-fluid"></a></li>
                    <li class="list-inline-item"><a href=""><img src="{{asset('')}}frontend/assets/imgs/Group%20268.png" alt="" class="img-fluid"></a></li>
                    <li class="list-inline-item"><a href=""><img src="{{asset('')}}frontend/assets/imgs/instagram.png" alt="" class="img-fluid"></a></li>
                    <li class="list-inline-item"><a href=""><img src="{{asset('')}}frontend/assets/imgs/Group%20271.png" alt="" class="img-fluid"></a></li>
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
                    <div class="item">
                        <div class="card" style="width: 100%;">
                            <img src="{{asset('')}}frontend/assets/imgs/Component%209%20%E2%80%93%201.png" class="card-img-top img-fluid" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Blog Heading</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste voluptates dolorum iure recusandae ex molestiae aut sint aliquam quibusdam. Dolore voluptates hic, aspernatur quae ut blanditiis accusantium tempora sequi sunt!</p>
                                <a href="#" style="color: #164DF3; text-decoration: none;">Read more ></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card" style="width: 100%;">
                            <img src="{{asset('')}}frontend/assets/imgs/Component%209%20%E2%80%93%201.png" class="card-img-top img-fluid" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Blog Heading</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste voluptates dolorum iure recusandae ex molestiae aut sint aliquam quibusdam. Dolore voluptates hic, aspernatur quae ut blanditiis accusantium tempora sequi sunt!</p>
                                <a href="#" style="color: #164DF3; text-decoration: none;">Read more ></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card" style="width: 100%;">
                            <img src="{{asset('')}}frontend/assets/imgs/Component%209%20%E2%80%93%201.png" class="card-img-top img-fluid" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Blog Heading</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste voluptates dolorum iure recusandae ex molestiae aut sint aliquam quibusdam. Dolore voluptates hic, aspernatur quae ut blanditiis accusantium tempora sequi sunt!</p>
                                <a href="#" style="color: #164DF3; text-decoration: none;">Read more ></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-parrotgreen mt-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 center">
                    <h1 class="fs-40 text-white">Sign Up for our<span class="fw-700"> Newsletter</span></h1>
                    <p class="mt-10 text-white">Morbi accumsan ipsum velit nam nec tellus a odiose tincidunt auctor a ornare odio sed non mauris vitae erat consequat auctor</p>
                </div>
                <div class="col-lg-6 center">
                    <h6 class="fs-21 fw-700 text-white">Stay Connected</h6>
                    <form>
                        <div class="row mt-21">
                            <div class="col-lg-8">
                                <input type="email" class="form-control h-10" name="subscriber_email" id="subscriber_email" placeholder="Enter Email Id">
                                <div id="status"></div>
                                <div id="content"></div>
                                {{--                                <input type="text" class="form-control h-10" placeholder="Enter Email Id">--}}
                            </div>
                            <div class="col-lg-4">
                                <button type="button" class="btn btn-light mb-2" name="subscribe_now" id="subscribe_now">Submit</button>
                                {{--                            <button type="button" name="subscribe_now" id="subscribe_now"><i class="fa fa-send"></i></button>--}}
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
