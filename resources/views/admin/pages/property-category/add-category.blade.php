@extends('admin.layouts.master')
<!-- title -->
@section('title')
    <title> Add category </title>
@endsection
<!-- media-button-style -->
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Category</h1>
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
                                <h3 class="card-title">Add Category</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url('/admin/add-category')}}" method="post">
                                @csrf
                                <div class="card-body">
                                    {{--                                @include('flash-message')--}}
                                    {{--                                <!-- validation-error message -->--}}
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
                                            <div class="form-group">
                                                <label class="name">Name<span style="color: red;">*</span></label>
                                                <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter name">
                                                <!-- validation error message -->
                                                @error('name')<p style="color: red;">{{$message}}</p>@enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;">Add</button>
                                    <a href="{{url('/admin/view-category')}}" class="btn btn-default" style="background-color: #949496;border-color: #949496;color: white">Back</a>
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

