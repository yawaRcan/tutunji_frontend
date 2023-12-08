@extends('admin.layouts.master')
<!-- title -->
@section('title')
    <title> Add Blog </title>
@endsection
<!-- editor-style -->
@section('editor-style')
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('')}}admin-panel/assets/plugins/summernote/summernote-bs4.css">
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
                        <h1>Add Blog</h1>
                    </div>
                    <div class="col-sm-6">
{{--                        <ol class="breadcrumb float-sm-right">--}}
{{--                            <li class="breadcrumb-item"><a href=""></a>Dashboard</li>--}}
{{--                            <li class="breadcrumb-item"><a href="#">Property</a></li>--}}
{{--                        </ol>--}}
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
                                <h3 class="card-title">Add Blog</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url('/admin/add-blog')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    @if( Session::has( 'success' ))
                                        <div class="alert alert-success" style="margin-top: 30px;">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Success! </strong>{{ Session::get( 'success' ) }}
                                        </div>
                                    @endif
{{--                                    <!-- validation-error message -->--}}
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
                                                <label class="title">Title<span style="color: red;">*</span></label>
                                                <input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="Enter title">
                                                <!-- validation-error-message -->
                                                @error('title')<p style="color: red;">{{$message}}</p>@enderror
                                            </div>
                                        </div>
{{--                                        <div class="col-md-12">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label class="category">Category<span style="color: red;">*</span></label>--}}
{{--                                                <select class="form-control" name="category" id="category">--}}
{{--                                                    <option value="">Select Category</option>--}}
{{--                                                    @foreach($getCategory as $catData)--}}
{{--                                                    <option value="{{$catData->id}}">{{$catData->name}}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}
{{--                                                <!-- validation-error-message -->--}}
{{--                                                @error('category')<p style="color: red;">{{$message}}</p>@enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="image">Image<span style="color: red;">*</span></label><br>
                                                <input type="file" name="image" id="image">
                                                <!-- validation-error-message -->
                                                @error('image')<p style="color: red;">{{$message}}</p>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="description">Body<span style="color: red;">*</span></label>
                                                <div class="mb-3">
                                                    <textarea class="textarea" name="body" id="description" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('body')}}</textarea>
                                                    <!-- validation-error-message -->
                                                    @error('body')<p style="color: red;">{{$message}}</p>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="middleBanner">Middle Banner<span style="color: red;">*</span></label>
                                                <input type="text" name="middleBanner" class="form-control" value="{{old('middleBanner')}}" placeholder="Enter middle banner">
                                                <!-- validation-error-message -->
                                                @error('middleBanner')<p style="color: red;">{{$message}}</p>@enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;">Add</button>
                                    <a href="{{url('/admin/view-blog')}}" class="btn btn-primary" style="background-color: #949496;border-color: #949496;color: white">Back</a>
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
    @section('editor-js')
        <!-- Summernote -->
        <script src="{{asset('')}}admin-panel/assets/plugins/summernote/summernote-bs4.min.js"></script>
        <script>
            $(function () {
                // Summernote
                $('.textarea').summernote({
                    height : 300,
                });
            })
        </script>
    @endsection
@endsection

