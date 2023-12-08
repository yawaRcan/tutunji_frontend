@extends('admin.layouts.master')
<!-- title -->
@section('title')
    <title> Edit Website Member </title>
{{--    <style>--}}
{{--        input[type="file"] {--}}
{{--            display: none;--}}
{{--        }--}}
{{--    </style>--}}
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Website Member</h1>
                    </div>
                    {{--                    <div class="col-sm-6">--}}
                    {{--                        <ol class="breadcrumb float-sm-right">--}}
                    {{--                            <li class="breadcrumb-item"><a href=""></a>Properties</li>--}}
                    {{--                            <li class="breadcrumb-item"><a href="#">Pre-construct</a></li>--}}
                    {{--                        </ol>--}}
                    {{--                    </div>--}}
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header" style="background-color: #1ED65f">
                                <h3 class="card-title">Edit Website Member</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url('/admin/edit-website-member',$websiteMemberData[0]->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <!-- validation-error message -->
                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            <p><strong>Opps Something went wrong</strong></p>
                                            <ul id="error_list">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Upload Image</label><br>
{{--                                                <input id="btnFloor3D" type="file" class="upload" name="btnFloor3D">--}}
                                                <input type="file" id="profileImage" name="profileImage" onchange="document.getElementById('img-output').src = window.URL.createObjectURL(this.files[0])"/>
                                                @if($websiteMemberData[0]->image)
                                                    <img src="{{asset('frontend/assets/profile/'.$websiteMemberData[0]->image)}}" id="img-output" class="profile-img" height="150px" width="150px">
                                                @else
                                                    <img src="{{asset('default/blank-profile.png')}}" id="img-output" class="profile-img" height="150px" width="150px">
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Name<span style="color: red;">*</span></label>
                                                <input type="text" name="name" class="form-control" value="{{ (Input::old('name')) ? Input::old('name') : $websiteMemberData[0]->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Email<span style="color: red;">*</span></label>
                                                <input type="email" name="email" class="form-control" value="{{ (Input::old('email')) ? Input::old('email') : $websiteMemberData[0]->email }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Phone<span style="color: red;">*</span></label>
                                                <input type="text" name="phone" class="form-control" value="{{ (Input::old('phone')) ? Input::old('phone') : $websiteMemberData[0]->phone }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <input type="hidden" name="user_id" value="{{$websiteMemberData[0]->id}}">
                                    <button type="submit" class="btn btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;">Update</button>
                                    <a href="{{url('/admin/list-website-member')}}" class="btn btn-default" style="background-color: #949496;border-color: #949496;color: white">Back</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

