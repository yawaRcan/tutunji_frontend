@extends('admin.layouts.master')
@section('title')
    <title> All Admin Users </title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Admin Users</h1>
                    </div>
{{--                    <div class="col-sm-6">--}}
{{--                        <ol class="breadcrumb float-sm-right">--}}
{{--                            <li class="breadcrumb-item"><a href=""></a>Users</li>--}}
{{--                            <li class="breadcrumb-item"><a href="#">Sale</a></li>--}}
{{--                        </ol>--}}
{{--                    </div>--}}
                </div>

{{--                <div class="text-right">--}}
{{--                    @can('view_only')<a href="{{url('/register')}}" class="btn btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;"><i class="fa fa-plus"></i> Add Users</a>@endcan--}}
{{--                    @if(Auth::guard('admin')->user()->role == 1)<i class="fa fa-minus" style="color: #949496;display: none;"></i>@else<i class="fa fa-minus" style="color: #949496"></i>@endif--}}
{{--                </div>--}}
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">List of Admin Users</h3>
                            <div class="text-right">
                                @can('view_only')<a href="{{url('/register')}}" class="btn btn-sm btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;"><i class="fa fa-plus-circle"></i> Add user</a>@endcan
                                @if(Auth::guard('admin')->user()->role == 1)<i class="fa fa-minus" style="color: #949496;display: none;"></i>@else<i class="fa fa-minus" style="color: #949496"></i>@endif
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('flash-message')
{{--                            @if(Session::has('success'))<div class="alert alert-success">{{Session::get('success')}}</div>@endif--}}
{{--                            @if(Session::has('error'))<div class="alert alert-danger">{{Session::get('error')}}</div>@endif--}}
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($usersData as $usersDetail)
                                    <tr>
                                        <td>{{$usersDetail->name}}</td>
                                        <td>{{$usersDetail->email}}</td>
                                        <td>{{($usersDetail->role_detail['name']) ? $usersDetail->role_detail['name'] : '-'}}</td>

{{--                                        <td>{{$usersDetail->role['name']}}</td>--}}
                                        <td>---</td>
                                    </tr>

                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
