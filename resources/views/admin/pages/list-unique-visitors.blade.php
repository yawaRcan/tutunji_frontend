@extends('admin.layouts.master')
@section('title')
    <title> Admin | List Unique Visitors</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>List Unique Visitors</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href=""></a>Dashboard</li>
                            <li class="breadcrumb-item"><a href="#">Unique Visitors</a></li>
                        </ol>
                    </div>
                </div>
                {{--                <div class="text-right"><a href="{{url('/admin/add-property')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Property</a></div>--}}
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List Unique Visitors</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('flash-message')
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>IP Address</th>
                                    <th>Visited Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($no = 1)
                                @foreach($uniqueVisitors as $visitorsData)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{($visitorsData->ip_address) ? $visitorsData->ip_address : '-'}}</td>
                                        <td>{{date('Y-m-d', strtotime($visitorsData->visited_date)) ? date('Y-m-d', strtotime($visitorsData->visited_date)) : '-'}}</td>
                                        <td>-</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>IP Address</th>
                                    <th>Visited Date</th>
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
