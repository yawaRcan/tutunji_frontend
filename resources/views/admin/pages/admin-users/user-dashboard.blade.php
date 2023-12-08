@extends('admin.layouts.master')
<!-- title -->
@section('title')
    <title>Admin | User Dashboard</title>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">User Dashboard</h1>
                    </div>
                    <!-- /.col -->
                    {{--                    <div class="col-sm-6">--}}
                    {{--                        <ol class="breadcrumb float-sm-right">--}}
                    {{--                            <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                    {{--                            <li class="breadcrumb-item active">Dashboard v1</li>--}}
                    {{--                        </ol>--}}
                    {{--                    </div><!-- /.col -->--}}
                </div><!-- /.row -->
                <!-- alert-message -->
                <div class="card">
                    @if(session()->has('message'))
                        <div class="card-body">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <!-- SALE-PROPERTY -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box text-white" style="background-color: #949496;">
                            <div class="inner">
                                <p><b>SALE PROPERTIES</b></p>
                                <p><b>{{($totalSaleProperty) ? $totalSaleProperty : 0}}</b></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-home"></i>
                            </div>
                            <a href="{{url('/admin/list-sale-property')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- PRE-CONSTRUCT PROPERTY -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box text-white" style="background-color: #949496;">
                            <div class="inner">
                                <p><b>PRE-CONSTRUCT PROPERTIES</b></p>
                                <p><b>{{($totalPreConstructProperty) ? $totalPreConstructProperty : 0}}</b></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-home"></i>
                            </div>
                            <a href="{{url('/admin/list-pre-construct-property')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- PENDING PROPERTY -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box text-white" style="background-color: #949496;">
                            <div class="inner">
                                <p><b>PENDING PROPERTIES</b></p>
                                <p><b>{{($totalPendingProperty) ? $totalPendingProperty : 0}}</b></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-home"></i>
                            </div>
                            <a href="{{url('/admin/list-pending-property')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- SUBMIT-PROPERTY TODAY -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box text-white" style="background-color: #949496;">
                            <div class="inner">
                                <p><b>SUBMIT PROPERTY TODAY</b></p>
                                <p><b>{{($totalSubmitPropertyToday) ? $totalSubmitPropertyToday : 0}}</b></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-home"></i>
                            </div>
                            <a href="{{url('/admin/list-sale-property')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- WEBSITE MEMBERS -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box text-white" style="background-color: #949496;">
                            <div class="inner">
                                <p><b>WEBSITE MEMBERS</b></p>
                                <p><b>{{($totalWebsiteMembers) ? $totalWebsiteMembers : 0}}</b></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="{{url('/admin/list-website-member')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- WEBSITE MEMBERS TODAY -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box text-white" style="background-color: #949496;">
                            <div class="inner">
                                <p><b>WEBSITE MEMBERS TODAY</b></p>
                                <p><b>{{($todayWebsiteMembers) ? $todayWebsiteMembers : 0}}</b></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-calendar"></i>
                            </div>
                        </div>
                    </div>
                    <!-- NEWSLETTER MEMBERS -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box text-white" style="background-color: #949496;">
                            <div class="inner">
                                <p><b>NEWSLETTER MEMBERS</b></p>
                                <p><b>{{($totalNewsletterMembers) ? $totalNewsletterMembers : 0}}</b></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="{{url('/admin/list-newsletter')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- NEWSLETTER MEMBERS TODAY -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box text-white" style="background-color: #949496;">
                            <div class="inner">
                                <p><b>NEWSLETTER MEMBERS TODAY</b></p>
                                <p><b>{{($todayNewsletterMembers) ? $todayNewsletterMembers : 0}}</b></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-calendar"></i>
                            </div>
                        </div>
                    </div>
                    <!-- UNIQUE-VISITORS TODAY -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box text-white" style="background-color: #949496;">
                            <div class="inner">
                                <p><b>UNIQUE VISITORS TODAY</b></p>
                                <p><b>{{($uniqueVisitorsToday) ? $uniqueVisitorsToday : 0}}</b></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="{{url('/admin/list-unique-visitors')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            {{--                <!-- Main row -->--}}
            {{--                <div class="row">--}}
            {{--                    <!-- Left col -->--}}
            {{--                    <section class="col-lg-7 connectedSortable">--}}
            {{--                    </section>--}}
            {{--                    <!-- /.Left col -->--}}
            {{--                    <!-- right col (We are only adding the ID to make the widgets sortable)-->--}}
            {{--                    <section class="col-lg-5 connectedSortable">--}}
            {{--                    </section>--}}
            {{--                    <!-- right col -->--}}
            {{--                </div>--}}
            {{--                <!-- /.row (main row) -->--}}

            <!-- highchart -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- dropdown-list -->
                        <select id="chart_option" name="list" class="form-control">
                            <option value="1">Website Visitors</option>
                            <option value="2">Website Members</option>
                            <option value="3">Newsletter Members</option>
                            <option value="4">Today Sale Properties</option>
                        </select>
                        <!-- container -->
                        <div id="container" style="margin-bottom: 10px;"></div>
                        <div id="container2" style="margin-bottom: 10px; display: none"></div>
                        <div id="container3" style="margin-bottom: 10px; display: none"></div>
                        <div id="container4" style="margin-bottom: 10px; display: none"></div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('line-chart-js')
    <!-- LINE-CHART JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        $("#chart_option").on('change', function () {

            let value = $(this).val();

            $("#container").hide();
            $("#container2").hide();
            $("#container3").hide();
            $("#container4").hide();

            if(value === "1") {
                $("#container").show();
            } else if(value === "2") {
                $("#container2").show();
            } else if(value === "3") {
                $("#container3").show();
            } else if(value === "4") {
                $("#container4").show();
            }

        });

        var visitorsData = <?php echo json_encode($visitorsData)?>;
        var websiteMembersData = <?php echo json_encode($websiteMembersData)?>;
        var NewsletterMembersData = <?php echo json_encode($newsletterMembersData)?>;
        var TodaySalePropertyData = <?php echo json_encode($todaySalePropertyData)?>;

        let endDate     = new Date();
        let startDate   = new Date(new Date().setDate(endDate.getDate() - 29));
        const month     = ["January","February","March","April","May","June","July","August","September","October","November","December"];

        for(var arr=[],dt=new Date(endDate); dt>=startDate; dt.setDate(dt.getDate()-1)){
            var date = new Date(dt)
            arr.push(date.getDate()+'/'+month[date.getMonth()]);
        }

        Highcharts.chart('container', {
            plotOptions: {
                series: {
                    color: '#1ED65F'
                }
            },
            title: {
                text: 'A chart For Unique Visitors'
            },

            xAxis: {
                categories: arr/*['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december']*/
            },
            yAxis :{
                title: {
                    text: "Number of Unique Visitors"
                }
            },
            series:[{
                name:"New Unique Visitors",
                data:visitorsData
            }],
        });
        var chart2 = new Highcharts.Chart('container2',{
            plotOptions: {
                series: {
                    color: '#1ED65F'
                },
            },
            title: {
                text: 'A chart For Website Members'
            },

            xAxis: {
                categories: arr/*['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december']*/
            },
            yAxis :{
                title: {
                    text: "Number of Website Members"
                }
            },
            series:[{
                name:"New Website Members",
                data:websiteMembersData
            }],
        });
        var chart3 = new Highcharts.Chart('container3',{
            plotOptions: {
                series: {
                    color: '#1ED65F'
                },
            },
            title: {
                text: 'A chart For Newsletter Members'
            },

            xAxis: {
                categories: arr/*['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december']*/
            },
            yAxis :{
                title: {
                    text: "Number of Newsletter Members"
                }
            },
            series:[{
                name:"New Newsletter Members",
                data:NewsletterMembersData
            }],
        });
        var chart4 = new Highcharts.Chart('container4',{
            plotOptions: {
                series: {
                    color: '#1ED65F'
                },
            },
            title: {
                text: 'A chart For Today Sale Property'
            },

            xAxis: {
                categories: arr/*['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december']*/
            },
            yAxis :{
                title: {
                    text: "Number of Today Sale Property"
                }
            },
            series:[{
                name:"New Newsletter Members",
                data:TodaySalePropertyData
            }],
        });
    </script>
@endsection
