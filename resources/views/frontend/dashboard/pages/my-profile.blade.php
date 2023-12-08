@extends('frontend.layout.master')
@section('title')
    <title>Tuntunji Realty | My-profile</title>
    <style>
        input[type="file"] {
            display: none;
        }
    </style>
    <style>
        .navbar{
            position: initial;
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
        <div class="row mt-40">
            @include('frontend.dashboard.include.navigation_bar')

            <div class="col-lg-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="fs-30 fw-700">My Profile</h1>
                            </div>
                        </div>
                        <div class="row mt-40">
                            <div class="col-lg-12">
                                <div class="dashboard-profile">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Basic Details</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Change Password</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Change Email</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <!--basic details-->
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                            {{--                                            <form action="{{url('/my-profile')}}" method="post" enctype="multipart/form-data">--}}
                                            {{--                                                @csrf--}}
                                            <div class="bhk-box mt-20">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <h3 class="fs-18 fw-700">Photo</h3>
                                                        <p class="fs-16 fw-400 text-grey">Upload your profile photo.</p>
                                                    </div>
                                                </div>
                                                <!-- upload-media success message -->
                                                <div id="file_upload_message" class="text-success" style="padding-left: 12px;"></div>
                                                <!-- upload-media error message -->
                                                <div id="file_upload_error" class="text-danger" style="padding-left: 12px;"></div>
                                                <!-- upload-media error message -->
                                                <div id="file_upload_delete" class="text-success" style="padding-left: 12px;"></div>
                                                <!-- image preview before uploadFile -->
                                                {{--                        <img id="output" height="100px"><br>--}}

                                                <div class="row">
                                                    <div class="col-md-4"></div>
                                                    <div class="col-md-4 text-center">
                                                        @if(Auth::check() && Auth::user()->image)
                                                            <img src="{{asset('frontend/assets/profile/'.Auth::user()->image)}}" class="profile-img" height="150px" width="150px">
                                                        @else
                                                            <img src="{{asset('default/blank-profile.png')}}" class="profile-img" height="150px" width="150px">
                                                        @endif
                                                        <div id="image_preview"></div>
                                                    </div>
                                                    <div class="col-md-4"></div>

                                                    {{--                                                    <div class="col-md-3 col-sm-3" id="image_preview" style="padding-left: 27px;">--}}

                                                    {{--                                                        @if(Auth::check())--}}
                                                    {{--                                                            <img src="{{asset('frontend/assets/profile/'.Auth::user()->image)}}" height="150px" width="150px">--}}
                                                    {{--                                                        @else--}}
                                                    {{--                                                            <img src="{{asset('frontend/assets/profile/circle-img.png')}}" height="150px" width="150px">--}}
                                                    {{--                                                        @endif--}}
                                                    {{--                                                    </div>--}}
                                                </div>
                                                <div class="form-row mt-10">
                                                    {{--                                                <div class="col-lg-6">--}}
                                                    {{--                                                    <button type="submit" class="btn btn-info" id="updateProfileBtn" style="font-size: 14px; padding: 10px 20px !important;">Update Profile</button>--}}
                                                    {{--                                                </div>--}}
                                                    <div class="col-md-4"></div>
                                                    <div class="col-md-4">
                                                        <label class="btn btn-primary mr-auto br-0"><input id="mediaUpload" type="file" class="upload" name="propertyMedia" onchange="document.getElementById('image_preview').src = window.URL.createObjectURL(this.files[0])"/> Select Media</label>
                                                    </div>
                                                    <div class="col-md-4"></div>
                                                </div>
                                                {{--                                                <div class="form-row">--}}
                                                {{--                                                    <div class="col-lg-12">--}}
                                                {{--                                                        <div class="form-group">--}}
                                                {{--                                                            --}}{{--                                                                <label for="exampleFormControlSelect1" class="fs-18">Upload Media</label>--}}
                                                {{--                                                            <label class="btn btn-primary mr-auto br-0" style="width: 30%"><input id="mediaUpload" type="file" class="upload" name="propertyMedia"/> Upload Profile Image</label>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                </div>--}}
                                            </div>
                                            <div class="bhk-box mt-40">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <h3 class="fs-18 fw-700">User Details</h3>
                                                        <p class="fs-16 fw-400 text-grey">Add your contact information.</p>
                                                    </div>
                                                </div>
                                                <!-- validation-error message -->
                                                <div id="profileErrorMessage" style="color:red;"></div>
                                                <!-- success-message -->
                                                <div id="profileSuccessMessage" class="text-success"></div>
                                                <!-- error-message -->
                                                <div id="profileError" class="text-danger"></div>
                                                <div class="form-row mt-10">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="userFirstName" class="fs-18">First Name <span style="color: red">*</span></label>
                                                            <input type="text" class="form-control h-11" name="userFirstName" id="userFirstName" value="{{$first_name}}" placeholder="John">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mt-21">
                                                        <div class="form-group">
                                                            <label for="userPhone" class="fs-18">Phone</label>
                                                            <input type="text" class="form-control h-11" name="userPhone" id="userPhone" value="{{$profile_data[0]->phone}}" placeholder="555505251">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row mt-10">
                                                    <div class="col-lg-6 mt-21">
                                                        <div class="form-group">
                                                            <label for="userLastName" class="fs-18">Last Name <span style="color: red">*</span></label>
                                                            <input type="text" class="form-control h-11" name="userLastName" id="userLastName" value="{{$last_name}}" placeholder="Doe">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mt-21">
                                                        <div class="form-group">
                                                            <label for="userMobile" class="fs-18">Mobile</label>
                                                            <input type="text" class="form-control h-11" name="userMobile" id="userMobile" value="{{$profile_data[0]->mobile}}" placeholder="111-111-111">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row mt-10">
                                                    <div class="col-lg-6 mt-21">
                                                        <div class="form-group">
                                                            <label for="userEmail" class="fs-18">Email</label>
                                                            <input type="text" class="form-control h-11" name="userEmail" id="userEmail" value="{{$profile_data[0]->email}}" disabled placeholder="John@gmail.com">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mt-21">
                                                        <div class="form-group">
                                                            <label for="userSkype" class="fs-18">Skype</label>
                                                            <input type="text" class="form-control h-11" name="userSkype" id="userSkype" value="{{$profile_data[0]->skype}}" placeholder="Type URL here..">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row mt-10">
                                                    <div class="col-lg-6 mt-21">
                                                        <div class="form-group">
                                                            <label for="userFaceBookUrl" class="fs-18">Facebook url</label>
                                                            <input type="text" class="form-control h-11" name="userFaceBookUrl" id="userFaceBookUrl" value="{{$profile_data[0]->facebook_url}}" placeholder="Type URL here..">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mt-21">
                                                        <div class="form-group">
                                                            <label for="userInstagramUrl" class="fs-18">Instagram url</label>
                                                            <input type="text" class="form-control h-11" name="userInstagramUrl" id="userInstagramUrl" value="{{$profile_data[0]->instagram_url}}" placeholder="Type URL here..">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row mt-10">
                                                    <div class="col-lg-6 mt-21">
                                                        <div class="form-group">
                                                            <label for="userTwitterUrl" class="fs-18">Twitter url</label>
                                                            <input type="text" class="form-control h-11" name="userTwitterUrl" id="userTwitterUrl" value="{{$profile_data[0]->twitter_url}}" placeholder="Type URL here..">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mt-21">
                                                        <div class="form-group">
                                                            <label for="userPinterestUrl" class="fs-18">Pinterest url</label>
                                                            <input type="text" class="form-control h-11" name="userPinterestUrl" id="userPinterestUrl" value="{{$profile_data[0]->pinterest_url}}" placeholder="Type URL here..">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row mt-10">
                                                    <div class="col-lg-6 mt-21">
                                                        <div class="form-group">
                                                            <label for="userLinkedInUrl" class="fs-18">LinkedIn Url</label>
                                                            <input type="text" class="form-control h-11" name="userLinkedInUrl" id="userLinkedInUrl" value="{{$profile_data[0]->linkedIn_url}}" placeholder="Type URL here..">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mt-21">
                                                        <div class="form-group">
                                                            <label for="userWebUrl" class="fs-18">Website Url (without http)</label>
                                                            <input type="text" class="form-control h-11" name="userWebUrl" id="userWebUrl" value="{{$profile_data[0]->website_url}}" placeholder="Type URL here..">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bhk-box mt-40">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <h3 class="fs-18 fw-700">User Details</h3>
                                                        <p class="fs-16 fw-400 text-grey">Add some information about yourself.</p>
                                                    </div>
                                                </div>
                                                <div class="form-row mt-10">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="userTitle" class="fs-18">Title/Position</label>
                                                            <input type="text" class="form-control h-11" name="userTitle" id="userTitle"  value="{{$profile_data[0]->position}}" placeholder="Enter title">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row mt-10">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="userAboutMe" class="fs-18">About me</label>
                                                            <textarea class="form-control" name="userAboutMe" id="userAboutMe" rows="6" placeholder="About User…" style="box-shadow: none !important; border-color:#ced4da !important;">{{$profile_data[0]->about_user}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row mt-10">
                                                {{--                                                <div class="col-lg-6">--}}
                                                <button type="submit" class="btn btn-info" id="updateProfileBtn" style="font-size: 14px; padding: 10px 20px !important;">Update Profile</button>
                                                {{--                                                </div>--}}
                                            </div>
                                            {{--                                            </form>--}}
                                        </div>
                                        <!--end of basic details-->

                                        <!--change password-->
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <div class="row mt-40">
                                                <div class="col-lg-6">
                                                    <!-- validation-error message -->
                                                    <div id="passwordErrorMessage" style="color:red;"></div>
                                                    <!-- success-message -->
                                                    <div id="passwordSuccessMessage" class="text-success"></div>
                                                    <!-- error-message -->
                                                    <div id="passwordError" class="text-danger"></div>
                                                    <div class="form-group">
                                                        <label for="currentPassword" class="fs-18">Current Password</label>
                                                        <input type="password" class="form-control h-11" name="currentPassword" id="currentPassword" style="border-radius: 50px;">
                                                        <small class="fs-14 fw-400">Forgot your Password? <span><a href="#" class="text-green text-decoration-none fw-700">Reset it.</a></span></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="newPassword" class="fs-18">New Password</label>
                                                        <input type="password" class="form-control h-11" name="newPassword" id="newPassword" style="border-radius: 50px;">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="confirmPassword" class="fs-18">Confirm Password</label>
                                                        <input type="password" class="form-control h-11" name="confirmPassword" id="confirmPassword" style="border-radius: 50px;">
                                                    </div>
                                                    {{--                                                    <input type="text" name="user_id" id="user_id" value="">--}}
                                                    <button type="button" class="btn btn-info" id="reset_password" style="font-size: 14px; padding: 10px 20px !important;">Change my Password</button>
                                                </div>
                                                <div class="col-lg-6 mt-41">
                                                    <ul class="list-unstyled list-inline">
                                                        <li class="list-inline-item fs-18"><i class="fas fa-lock"></i></li>
                                                        <li class="list-inline-item fs-18">Your New Password conditions:</li>
                                                    </ul>
                                                    <ul class="fs-14 text-danger pl-20">
                                                        <li>Password must have 8 characters in length </li>
                                                        <li class="mt-10">Password cannot include spaces</li>
                                                        <li class="mt-10">Password must include at least one Upper case and Lower case character</li>
                                                        <li class="mt-10">Password must include at least one numeric character </li>
                                                        <li class="mt-10">Password must include at least one special character</li>
                                                        <li class="mt-10"> New Password cannot be same as Current Password</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end of change password -->

                                        <!-- change email -->
                                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                            <div class="row mt-40">
                                                <div class="col-lg-6">
                                                    <!-- validation-error message -->
                                                    <div id="emailErrorMessage" style="color:red;"></div>
                                                    <!-- success-message -->
                                                    <div id="emailSuccessMessage" class="text-success"></div>
                                                    <div class="form-group">
                                                        <label for="currentEmail" class="fs-18">Current Email</label>
                                                        <input type="email" class="form-control h-11" name="currentEmail" id="currentEmail" style="border-radius: 50px;" value="{{$profile_data[0]->email}}" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="newEmail" class="fs-18">New Email</label>
                                                        <input type="email" class="form-control h-11" name="newEmail" id="newEmail" style="border-radius: 50px;">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="confirm_password" class="fs-18">Confirm Password</label>
                                                        <input type="email" class="form-control h-11" name="confirm_password" id="confirm_password" style="border-radius: 50px;">
                                                    </div>
                                                    <button type="button" class="btn btn-info" id="change_email" style="font-size: 14px; padding: 10px 20px !important;">Change my Email</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end of change details -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
@endsection
<!-- profile-update-script -->
@section('profile-script')
    <!-- update-profile -->
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //UpdateProfile Function
            $('#updateProfileBtn').click(function () {
                //alert('update profile button clicked');
                $("#profileErrorMessage").empty();
                //get text-field values by id
                var firstName = $('#userFirstName').val();
                var phone = $('#userPhone').val();
                var lastName = $('#userLastName').val();
                var mobile = $('#userMobile').val();
                var email = $('#userEmail').val();
                var skype = $('#userSkype').val();
                var facebook = $('#userFaceBookUrl').val();
                var instagram = $('#userInstagramUrl').val();
                var twitter = $('#userTwitterUrl').val();
                var pinterest = $('#userPinterestUrl').val();
                var linkedIn = $('#userLinkedInUrl').val();
                var web = $('#userWebUrl').val();
                var title = $('#userTitle').val();
                var about = $('#userAboutMe').val();
                //alert(firstName + " " + phone + " " + lastName + " " + mobile + " " + email + " " + skype + " " + facebook + " " + instagram + " " + twitter + " " + pinterest + " " + linkedIn + " " + web + " " + title + " " + about);
                if(firstName != "" && lastName != ""){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{url("/my-profile")}}',
                        type: 'post',
                        //dataType: 'json',
                        data: {userFirstName: firstName, userPhone: phone, userLastName: lastName, userMobile: mobile, userEmail: email,userSkype: skype,userFaceBookUrl: facebook,userInstagramUrl: instagram,userTwitterUrl: twitter,userPinterestUrl: pinterest,userLinkedInUrl: linkedIn,userWebUrl: web,userTitle: title,userAboutMe: about},
                        success: function(return_res){
                            console.log(return_res);
                            var newRes = JSON.parse(JSON.stringify(return_res));
                            if(newRes.success == "1"){
                                //alert("register successful");
                                //success-message
                                $("#profileSuccessMessage").empty().append(newRes.message).show();
                                $("#profileErrorMessage").append("Please fill required fields!").hide();
                            }else{
                                //alert('field is required');
                                $("#profileErrorMessage").append(newRes.message);
                            }
                            //var newRes = JSON.parse(JSON.stringify(return_res));
                        }
                    });
                }else{
                    $("#profileErrorMessage").append("Please fill required fields!").show();
                    $("#profileSuccessMessage").hide();
                }
            });
            //add-profile image function
            $(document).on('change', '#mediaUpload',function(e) {
                let postData = new FormData();
                postData.append('file',this.files[0]);
                console.log(postData);
                $.ajax({
                    async:true,
                    type        :'post',
                    url         : "{{ url('/add-profile-image')}}",
                    data        : postData,
                    contentType : false,
                    processData : false,
                    success     : function(result) {
                        console.log(result);
                        if(result.code == 200) {
                            //success-message
                            //alert('image uploaded successfully');
                            let url;
                            let file;

                            //if user select pdf file than preview pdf-icon image, if not than preview imageFile
                            if(result.data.media_type === 'pdf') {
                                //pdfFile preview
                                url = "{{asset('/frontend/assets/icon-img/pdf-icon.png')}}";
                                file = "<img class='img-responsive' src='"+url+"' height='150px' width='150px'>";
                                $("#file_upload_message").empty().append(result.message).show();
                                $("#file_upload_error").empty().append(result.message).hide();

                            } else {
                                //imageFile preview
                                url = "{{asset('/frontend/assets/profile')}}" + "/" +result.data;
                                file = "<img class='img-responsive' src='"+url+"' height='150px' width='150px'>";
                                $("#file_upload_message").empty().append(result.message).show();
                                $("#file_upload_error").empty().append(result.message).hide();
                            }

                            $('#image_preview').empty().append(
                                "<div class='image' >" + file + "</div>"
                            );
                        } else {
                            //alert('you have select invalid file format');
                            $("#file_upload_error").empty().append(result.message).show();
                            $("#file_upload_message").empty().append(result.message).hide();

                        }
                    },
                    error   : function(data) { console.log(data); }
                });
            });
            //change-password function
            $('#reset_password').click(function () {
                $("#passwordErrorMessage").empty();
                //get text-field values by id
                var currentPassword = $('#currentPassword').val();
                var newPassword = $('#newPassword').val();
                var confirmPassword = $('#confirmPassword').val();
                //alert(oldPassword + " " + newPassword + " " + confirmPassword);
                if(currentPassword != "" && newPassword != "" && confirmPassword != ""){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{url( "/change-password")}}',
                        type: 'post',
                        //dataType: 'json',
                        data: {currentPassword: currentPassword, newPassword: newPassword, confirmPassword: confirmPassword},
                        success: function(return_res){
                            console.log(return_res);
                            var newRes = JSON.parse(JSON.stringify(return_res));
                            if(newRes.success == "2"){
                                // alert("old password is incorrect");
                                //success-message
                                $("#passwordSuccessMessage").empty().append(newRes.message).show();
                                $("#passwordError").empty().append(newRes.message).hide();
                                //$("#registerErrorMessage").append(newRes.message);
                            }else if(newRes.success == "1"){
                                $("#passwordError").empty().append(newRes.message).show();
                                $("#passwordSuccessMessage").empty().append(newRes.message).hide();
                            }else{
                                $("#passwordError").empty().append(newRes.message).show();
                                $("#passwordSuccessMessage").empty().append(newRes.message).hide();
                            }
                            //var newRes = JSON.parse(JSON.stringify(return_res));
                        }
                    });
                }else{
                    $("#passwordErrorMessage").append("Please fill all fields!").show();
                    $("#passwordSuccessMessage").hide();
                }
            });
            //change-email function
            $('#change_email').click(function () {
                $("#emailErrorMessage").empty();
                //get text-field values by id
                var currentEmail = $('#currentEmail').val();
                var newEmail = $('#newEmail').val();
                var confirm_password = $('#confirm_password').val();
                //alert(oldPassword + " " + newPassword + " " + confirmPassword);
                if(currentEmail != "" && newEmail != "" && confirm_password != ""){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{url("/change-email")}}',
                        type: 'post',
                        //dataType: 'json',
                        data: {currentEmail: currentEmail, newEmail: newEmail, confirm_password: confirm_password},
                        success: function(return_res){
                            console.log(return_res);
                            var newRes = JSON.parse(JSON.stringify(return_res));
                            if(newRes.success == "2"){
                                // alert("old password is incorrect");
                                //success-message
                                $("#emailSuccessMessage").empty().append(newRes.message).show();
                                $("#emailErrorMessage").empty().append(newRes.message).hide();
                                //$("#registerErrorMessage").append(newRes.message);
                            }else if(newRes.success == "1"){
                                $("#emailErrorMessage").empty().append(newRes.message).show();
                                $("#emailSuccessMessage").empty().append(newRes.message).hide();
                            }else{
                                $("#passwordError").empty().append(newRes.message).show();
                                $("#emailSuccessMessage").empty().append(newRes.message).hide();
                            }
                        }
                    });
                }else{
                    $("#emailErrorMessage").append("Please fill all fields!").show();
                    $("#emailSuccessMessage").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#mediaUpload').click(function () {
                $('.profile-img').hide();
                $('#image_preview').show();
            });
        });
    </script>
@endsection
