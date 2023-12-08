@extends('admin.layouts.master')
@section('title')
    <title> Add Inquiry For Sale</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Inquiry</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href=""></a>Dashboard</li>
                            <li class="breadcrumb-item"><a href="#">Property</a></li>
                        </ol>
                    </div>
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
                            <div class="card-header" style="background-color: #1ED65F;">
                                <h3 class="card-title">Add Inquiry For Sale</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url('/admin/add-inquiry-sale',$propertyId)}}" method="post">
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
                                                <label class="bmd-label-floating">Full Name<span style="color: red;">*</span></label>
                                                <input type="text" name="full_name" class="form-control" value="{{old('full_name')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Phone Number<span style="color: red;">*</span></label>
                                                <input type="text" name="phone_number" class="form-control" value="{{old('phone_number')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Email Address<span style="color: red;">*</span></label>
                                                <input type="email" name="email_address" class="form-control" value="{{old('email_address')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Are you a brokerage or real estate agent<span style="color: red;">*</span></label><br>
                                                <input type="radio" id="selector" name="selector" value="brokerage" {{ old('selector') == 'brokerage' ? 'checked' : ''}}>
                                                <label for="selector" style="font-weight: normal">Brokerage</label><br>
                                                <input type="radio" id="selector" name="selector" value="agent" {{ old('selector') == 'agent' ? 'checked' : ''}}>
                                                <label for="selector" style="font-weight: normal">Agent</label><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;">Add Inquiry</button>
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
