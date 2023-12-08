@extends('admin.layouts.master')
@section('title')
    <title> Admin | List Property </title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Property List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Property</li>
                        </ol>
                    </div>
                </div>
                <div class="text-right"><a href="{{url('/admin/add-property')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Property</a></div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Property List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('flash-message')
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>ListedIn</th>
                                    <th>City</th>
                                    <th>Property Type</th>
                                    <th>Property Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($no = 1)
                                @foreach($query as $queryDetail)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$queryDetail['title']}}</td>
                                    <td>{{$queryDetail['price']}}</td>
                                    <td>{{$queryDetail['category']}}</td>
                                    <td>{{$queryDetail['listed_in']}}</td>
                                    <td>{{$queryDetail['city']}}</td>
                                    <td>{{$queryDetail['property_status']}}</td>
                                    <td>{{$queryDetail['property_type']}}</td>
                                    <td><a href="{{url('/admin/edit-property',$queryDetail['id'])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a></td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>ListedIn</th>
                                    <th>City</th>
                                    <th>Property Type</th>
                                    <th>Property Status</th>
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
