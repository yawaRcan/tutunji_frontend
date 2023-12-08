@extends('frontend.layout.master')
@section('title')
    <title>Tuntunji Realty | Sign In</title>
@endsection
@section('fb-button-style')
    <style>
        .fb {
            background-color: #3B5998;
            color: white;
            border-radius: 40px;
            padding: 8px 22px;
            font-weight: 600;
            font-size: 18px;
        }
        .fb:hover {
            color: white;
        }
    </style>
    <!-- fb-icon css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        /*.navbar{*/
        /*    position: initial;*/
        /*}*/
    </style>
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
{{--                @include('frontend.include.navbar')--}}
            </div>
        </div>
    </div>
    <div class="container-fluid" style="margin-top: -35px;">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="bg-illustration dn" style="margin-top: 35px;">
                </div>
            </div>
            <div class="col-lg-6">
                <!-- SIGN-IN FORM -->
                <div class="login-box" id="signIn">
                    <h1 class="fs-30 text-grey" style="font-weight: 500;">Sell or Rent your Property For Free</h1>
                    <h2 class="mt-80 fs-24 fw-700">Sign In</h2>
                    <div class="row mt-40">
                        <div class="col-lg-7">
                            <form>
                                @if( Session::has( 'error' ))
                                    <div class="alert alert-danger" style="margin-top: 30px;">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Error! </strong>{{ Session::get( 'error' ) }}
                                    </div>
                                @endif
                            <!-- signIn-success-message -->
                                <div id="signInSuccessMessage" class="text-success"></div>
                                <!-- signIn-error-message -->
                                <div id="signInErrorMessage" style="color:red;"></div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="fs-18 fw-700">Email Address</label>
                                    <input type="email" class="form-control h-12" id="signInEmail" name="signInEmail" aria-describedby="emailHelp" placeholder="john@gmail.com">
                                </div>
                                <div class="form-group position-relative">
                                    <label for="exampleInputPassword1" class="fs-18 fw-700">Password</label>
                                    <input type="password" class="form-control h-12" id="signInPassword" name="signInPassword" placeholder="****************">
                                    <i class="fas fa-eye-slash"></i>
                                </div>
                                <button type="button" class="btn btn-primary w-100 mt-40" id="loginButton">Sign In</button>
                                <a href="#" class="fs-18 text-green mt-20 d-block text-center">Forgot Password?</a>
                                {{--                                <a href="#" class="fs-18 text-green mt-20 d-block text-center">Forgot Password?</a>--}}
                                <p class="mt-20 text-center">New to Tuntunji Realty? <a href="#" class="text-green" id="signUpLink">Create an Account</a></p>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-30">
                        <div class="col-lg-3 pr-0 dn">
                            <hr>
                        </div>
                        <div class="col-lg-1 p-0 text-center">
                            <h6 class="text-muted">or</h6>
                        </div>
                        <div class="col-lg-3 pl-0 dn">
                            <hr>
                        </div>
                    </div>
                    <div class="row mt-30">
                        <div class="col-lg-7">
                            <a href="{{ url('login/google') }}" class="btn btn-google w-100 fw-700"><img src="{{asset('')}}frontend/assets/imgs/google.svg" class="img-fluid w-20 mr-4" alt="">Sign in with Google</a>
                            {{--                            <button type="submit" class="btn btn-google w-100 fw-700"><img src="{{asset('')}}frontend/assets/imgs/google.svg" class="img-fluid w-20 mr-4" alt="">Sign in with Google</button>--}}
                            <a href="{{ url('login/facebook') }}" class="fb btn btn-block" style="margin-top: 15px;"><i class="fa fa-facebook fa-fw fw-700"></i> Sign in with Facebook</a>
                            {{--                            <button type="submit" class="btn btn-google w-100 fw-700"><img src="{{asset('')}}frontend/assets/imgs/google.svg" class="img-fluid w-20 mr-4" alt="">Sign in with Google</button>--}}
                        </div>
                    </div>
                </div>
                <!-- SIGN-UP FORM -->
                <div class="login-box" id="signUp" style="display: none">
                    <h1 class="fs-30 text-grey" style="font-weight: 500;">Sell or Rent your Property For Free</h1>
                    <h2 class="mt-80 fs-24 fw-700">Sign Up</h2>
                    <!-- SIGN-UP FORM -->
                    <div class="row mt-40">
                        <div class="col-lg-7">
                            <form>
                                <!-- sign-up-empty-field-error-message -->
                                <div id="signUpErrorMessage" style="color:red;"></div>
                                <!-- sign-up-success-message -->
                                <div id="signUpSuccessMessage" class="text-success"></div>
                                <div class="form-group">
                                    <label for="exampleInputUsername" class="fs-18 fw-700">Username</label>
                                    <input type="text" class="form-control h-12" id="signUpUsername" name="signUpUsername" aria-describedby="emailHelp" placeholder="John Doe">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="fs-18 fw-700">Email Address</label>
                                    <input type="email" class="form-control h-12" id="signUpEmail" name="signUpEmail" aria-describedby="emailHelp" placeholder="john@gmail.com">
                                </div>
                                <div class="form-group position-relative">
                                    <label for="exampleInputPassword1" class="fs-18 fw-700">Password</label>
                                    <input type="password" class="form-control h-12" id="signUpPassword" name="signUpPassword" placeholder="****************">
                                    <i class="fas fa-eye-slash"></i>
                                </div>
                                <div class="form-group position-relative">
                                    <label for="exampleInputReTypePassword1" class="fs-18 fw-700">Retype Password</label>
                                    <input type="password" class="form-control h-12" id="signUpReTypePassword" name="signUpReTypePassword" placeholder="****************">
                                    <i class="fas fa-eye-slash"></i>
                                </div>
                                <div class="form-group position-relative">
                                    <div class="row">
                                        <div class="col-md-2"><input type="checkbox" id="signUpTerms" name="signUpTerms"></div>
                                        <div class="col-md-10">I AGREE WITH TERMS AND CONDITIONS</div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary w-100 mt-40" id="registerButton">Sign Up</button>
                                {{--                                <a href="#" class="fs-18 text-green mt-20 d-block text-center">Forgot Password?</a>--}}
                                <p class="mt-20 text-center">Already have an account?<a href="#" class="text-green" id="signInLink">Sign In</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.include.news-letter-1')
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
@endsection
@section('sign-in-up-scripts')
    <!-- sign-in sign-up using ajax -->
    <script>
        $(document).ready(function () {
            //Register Function
            $('#registerButton').click(function () {
                //alert('Register button clicked');
                $("#signUpErrorMessage").empty();
                //get text-field values by id
                var name = $('#signUpUsername').val();
                var email = $('#signUpEmail').val();
                var password = $('#signUpPassword').val();
                var reTypePassword = $('#signUpReTypePassword').val();
                //alert(name + " " + email + " " + password + " " + reTypePassword);
                let check;
                if($("#signUpTerms").prop('checked') == true){
                    check = 1;
                }
                if(name != "" && email != "" && password != "" && reTypePassword != ""){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{url("/sign-up")}}',
                        type: 'post',
                        //dataType: 'json',
                        data: {signUpUsername: name, signUpEmail: email, signUpPassword: password, signUpReTypePassword: reTypePassword, signUpTerms: check},
                        success: function(return_res){
                            console.log(return_res);
                            var newRes = JSON.parse(JSON.stringify(return_res));
                            if(newRes.success == "1"){
                                //alert("register successful");
                                //success-message
                                $("#signUpSuccessMessage").empty().append(newRes.message);
                            }else{
                                $("#signUpErrorMessage").append(newRes.message);
                            }
                            //var newRes = JSON.parse(JSON.stringify(return_res));
                        }
                    });
                }else{
                    $("#signUpErrorMessage").append("Please fill required fields!");
                }
            });
            //Login Function
            $("#loginButton").click(function(){
                //alert("login button clicked");
                //DO NOT REPEAT ERROR MESSAGE WHEN FIELD IS EMPTY
                $("#signInErrorMessage").empty();
                //GET VALUES BY ID
                var email = $('#signInEmail').val();
                var password = $('#signInPassword').val();
                //alert(email + " " + password + " ");
                if(email != "" && password != ""){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{url("/sign-in")}}',
                        type: 'post',
                        //dataType: 'json',
                        data: {signInEmail: email, signInPassword: password},
                        success: function(return_res){
                            console.log(return_res);
                            var newRes = JSON.parse(JSON.stringify(return_res));
                            if(newRes.success == "1"){
                                // alert("Login success");
                                //success-message
                                $("#signInSuccessMessage").empty().append(newRes.message).show();
                                $('#signInErrorMessage').empty().append(newRes.message).hide();
                                //Redirect to my-profile page
                                window.location.href = '{{url('/dashboard')}}';
                            }else{
                                // alert(newRes.message);
                                $('#signInErrorMessage').empty().append(newRes.message);
                            }
                            //var newRes = JSON.parse(JSON.stringify(return_res));
                        }
                    });
                }else{
                    $("#signInErrorMessage").append("Please fill required fields!");
                }
            });
        });
    </script>
    <!-- hide/show sign-up & sign-in form-->
    <script>
        $(document).ready(function () {
            $('#signInLink').click(function () {
                // alert('login btn clicked!');
                $('#signUp').hide();
                $('#signIn').show();
            });
            $('#signUpLink').click(function () {
                // alert('login btn clicked!');
                $('#signUp').show();
                $('#signIn').hide();
            });
        });
    </script>

@endsection

