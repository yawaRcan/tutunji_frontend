@extends('admin.layouts.master')
@section('title')
    <title> All Unique Visitors</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Unique Visitors</h1>
                    </div>
                    {{--                    <div class="col-sm-6">--}}
                    {{--                        <ol class="breadcrumb float-sm-right">--}}
                    {{--                            <li class="breadcrumb-item"><a href=""></a>Dashboard</li>--}}
                    {{--                            <li class="breadcrumb-item"><a href="#">Unique Visitors</a></li>--}}
                    {{--                        </ol>--}}
                    {{--                    </div>--}}
                </div>
                {{--                <div class="text-right"><a href="{{url('/admin/add-property')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Property</a></div>--}}
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">List of Unique Visitors</h3>
                            <div class="text-right">
                                @can('view_only')
                                <button type="button" id="dailyBtn" class="btn btn-sm btn-primary" style="background-color: #1ED65f;border-color: #1ED65f;">Daily</button>
                                <button type="button" id="monthlyBtn" class="btn btn-sm btn-primary" style="background-color: #1ED65f;border-color: #1ED65f;">Monthly</button>
                                <button type="button" id="allTimeBtn" class="btn btn-sm btn-primary" style="background-color: #1ED65f;border-color: #1ED65f;">All Time</button>
                                @endcan
                                @if(Auth::guard('admin')->user()->role == 1)<i class="fa fa-minus" style="color: #949496;display: none;"></i>@else<i class="fa fa-minus" style="color: #949496"></i>@endif
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- card-body1 start -->
                        <div class="card-body" id="daily_data">
                            @include('flash-message')
                            <table id="datatable" class="table table-bordered table-striped daily_data">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>IP Address</th>
                                        <th>Visited Date</th>
{{--                                        <th>Action</th>--}}
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>IP Address</th>
                                        <th>Visited Date</th>
{{--                                        <th>Action</th>--}}
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body1 end -->

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
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script>
        let table
        let type = 'daily';
        $(document).ready(function() {
            table = $('#datatable').DataTable({
                "processing"    : true,
                "serverSide"    : false,
                "ajax"          : {
                    "url"   : '{{ url('admin/total-unique-visitors') }}',
                    "type"  : "POST",
                    "data"  : function (d) {
                        d._token  = "{{ csrf_token() }}";
                        d.type = type;
                    }

                },
                "columns": [
                    {"data": "No", "sClass": "text-center", "width": "5%"},
                    {"data": "ip_address"},
                    {"data": "visited_date", "sClass": "text-center", "width": "10%"},
                    // {"data": "action", "sClass": "text-center", "width": "10%"}
                ]
            });
        } );

        $("#dailyBtn").on('click', function () {
            type = 'daily';
            table.ajax.reload();
        });

        $("#monthlyBtn").on('click', function () {
            type = 'monthly';
            table.ajax.reload();
        });

        $("#allTimeBtn").on('click', function () {
            type = 'all_records';
            table.ajax.reload();
        });
        /*$(document).ready(function () {
            $('#monthly_data').hide();
            // $('.all_time_data').hide();
            $('#dailyBtn').click(function () {
                $('#daily_data').show();
                $('#monthly_data').hide();
            });
            $('#monthlyBtn').click(function () {
                $('#monthly_data').show();
                $('#daily_data').hide();
            })
        });*/
    </script>
@endsection
