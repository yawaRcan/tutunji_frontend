@extends('admin.layouts.master')
@section('title')
    <title> Add Admin user</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Admin User</h1>
                    </div>
{{--                    <div class="col-sm-6">--}}
{{--                        <ol class="breadcrumb float-sm-right">--}}
{{--                            <li class="breadcrumb-item"><a href=""></a>Dashboard</li>--}}
{{--                            <li class="breadcrumb-item"><a href="#">Register User</a></li>--}}
{{--                        </ol>--}}
{{--                    </div>--}}
                </div>
                {{--                <div class="text-right"><a href="{{url('/admin/add-property')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Property</a></div>--}}
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
                                <h3 class="card-title">Add Admin User</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url('/register')}}" method="post">
                                @csrf
                                <div class="card-body">
                                    @if(Session::has('success'))<div class="alert alert-success">{{Session::get('success')}}</div>@endif
                                    @if(Session::has('fail'))<div class="alert alert-danger">{{Session::get('error')}}</div>@endif
                                    <!-- validation-error message -->
{{--                                    @if($errors->any())--}}
{{--                                        <div class="alert alert-danger">--}}
{{--                                            <p><strong>Opps Something went wrong</strong></p>--}}
{{--                                            <ul id="error_list">--}}
{{--                                                @foreach ($errors->all() as $error)--}}
{{--                                                    <li>{{ $error }}</li>--}}
{{--                                                @endforeach--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" style="margin-bottom: 0;">
                                                <label class="bmd-label-floating">Name<span style="color: red;">*</span></label>
                                                <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter name">
                                            </div>
                                            <span class="text-danger">@error('name'){{$message}}@enderror</span>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group" style="margin-bottom: 0;">
                                                <label class="bmd-label-floating">Email<span style="color: red;">*</span></label>
                                                <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Enter email">
                                            </div>
                                            <span class="text-danger">@error('email'){{$message}}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" style="margin-bottom: 0;">
                                                <label class="bmd-label-floating" for="role-dropdown">Role<span style="color: red;">*</span></label>
                                                <select class="form-control" name="role" id="role">
                                                    <option value="">Select Role</option>
                                                    @foreach($rolesData as $roleDetails)
                                                        <option value="{{$roleDetails->id}}">{{$roleDetails->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <span class="text-danger">@error('role'){{$message}}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" style="margin-bottom: 0;">
                                                <label class="bmd-label-floating">Password<span style="color: red;">*</span></label>
                                                <input type="password" name="password" class="form-control" value="{{old('password')}}" placeholder="Enter password">
                                            </div>
                                            <span class="text-danger">@error('password'){{$message}}@enderror</span>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group" style="margin-bottom: 0;">
                                                <label class="bmd-label-floating">Confirm Password<span style="color: red;">*</span></label>
                                                <input type="password" name="confirm_password" class="form-control" value="{{old('confirm_password')}}" placeholder="Enter confirm password">
                                            </div>
                                            <span class="text-danger">@error('confirm_password'){{$message}}@enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
{{--                                    <input type="text" name="user_id" value="{{$request->id}}">--}}
                                    <button type="submit" class="btn btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;">Save</button>
                                    <a href="{{url('/admin/list-admin-users')}}" class="btn btn-default" style="background-color: #949496;border-color: #949496;color: white">Back</a>
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
