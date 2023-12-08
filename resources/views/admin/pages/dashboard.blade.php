@extends('admin.layouts.master')
<!-- title -->
@section('title')
    <title>Dashboard</title>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
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
                                <i class="fa fa-home" style="color: #ffffff;font-size: 50px;"></i>
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
{{--                                <i class="ion ion-home"></i>--}}
                                <i class="fa fa-home" style="color: #ffffff;font-size: 50px;"></i>
                            </div>
                            <a href="{{url('/admin/list-pre-construct-property')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                                <i class="fa fa-users" style="color: #ffffff;font-size: 50px;"></i>
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
                                <i class="fa fa-calendar-alt" style="color: #ffffff;font-size: 50px;"></i>
                            </div>
                            <a href="{{url('/admin/today-newsletter')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- UNIQUE-VISITORS TODAY -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box text-white" style="background-color: #949496;">
                            <div class="inner">
                                <p><b>DAILY UNIQUE VISITORS</b></p>
                                <p><b>{{($uniqueVisitorsToday) ? $uniqueVisitorsToday : 0}}</b></p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user-clock" style="color: #ffffff;font-size: 50px;"></i>
                            </div>
                            <a href="{{url('/admin/all-visitors')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- TOTAL UNIQUE-VISITORS -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box text-white" style="background-color: #949496;">
                            <div class="inner">
                                <p><b>TOTAL UNIQUE VISITORS</b></p>
                                <p><b>{{($totalUniqueVisitors) ? $totalUniqueVisitors : 0}}</b></p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users" style="color: #ffffff;font-size: 50px;"></i>
                            </div>
                            <a href="{{url('/admin/total-unique-visitors')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- Today submission of pre-construct property -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box text-white" style="background-color: #949496;">
                            <div class="inner">
                                <p><b>Pre-construction Submission Today</b></p>
                                <p><b>{{($todaySubmissionPreConstruct) ? $todaySubmissionPreConstruct : '0'}}</b></p>
                            </div>
{{--                            <div class="icon">--}}
{{--                                <i class="ion ion-home"></i>--}}
{{--                            </div>--}}
                            <div class="icon">  <i class="fa fa-calendar-alt" style="color: #ffffff;font-size: 50px;"></i></div>
                            <a class="small-box-footer" style="padding: 14px;"></a>
{{--                            <a href="{{url('/admin/total-unique-visitors')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                        </div>
                    </div>
                    <!-- all active pre-construction submission -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box text-white" style="background-color: #949496;">
                            <div class="inner">
                                <p><b>All Active Pre-construction Submission</b></p>
                                <p><b>{{($allActivePreConstructionSubmission) ? $allActivePreConstructionSubmission : 0}}</b></p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-poll" style="color: #ffffff;font-size: 50px;"></i>
                            </div>
                            <a class="small-box-footer" style="padding: 14px;"></a>
                            {{--                            <a href="{{url('/admin/total-unique-visitors')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
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
                            <option value="1">Monthly Unique Visitors</option>
                            <option value="3">Monthly Newsletter Members</option>
                            <option value="4">Monthly Property Submissions</option>
                            <option value="5">Daily Unique Visitors</option>
                            <option value="6">Daily Pre-construction Submission</option>
                        </select>
                        <!-- container -->
                        <div id="container" style="margin-bottom: 10px;"></div>
                        <div id="container3" style="margin-bottom: 10px; display: none"></div>
                        <div id="container4" style="margin-bottom: 10px; display: none"></div>
                        <div id="container5" style="margin-bottom: 10px; display: none"></div>
                        <div id="container6" style="margin-bottom: 10px; display: none"></div>
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
            $("#container3").hide();
            $("#container4").hide();
            $("#container5").hide();
            $("#container6").hide();

            if(value === "1") {
                $("#container").show();
            } else if(value === "3") {
                $("#container3").show();
            } else if(value === "4") {
                $("#container4").show();
            } else if(value === "5"){
                $("#container5").show();
            } else if(value === "6"){
                $("#container6").show();
            }
        });

        var visitorsData = <?php echo json_encode($visitorsData)?>;
        var NewsletterMembersData = <?php echo json_encode($newsletterMembersData)?>;
        var TodaySalePropertyData = <?php echo json_encode($todaySalePropertyData)?>;
        var DailyUniqueVisitors = <?php echo json_encode($dailyUniqueVisitors)?>;
        var DailyPreConstructionSubmission = <?php echo json_encode($todaySubmission)?>;
        let time = <?php echo json_encode($time)?>;

        //console.log(DailyUniqueVisitors);
        let endDate     = new Date();
        let startDate   = new Date(new Date().setDate(endDate.getDate() - 29));
        const month     = ["January","February","March","April","May","June","July","August","September","October","November","December"];

        for(var arr=[],dt=new Date(endDate); dt>=startDate; dt.setDate(dt.getDate()-1)){
            var date = new Date(dt)
            arr.push(date.getDate()+'/'+month[date.getMonth()]);
        }
        // var starttime = new time();
        // console.log(starttime);
        let endTime = new Date();
        console.log(endTime);
        console.log(DailyUniqueVisitors);

        Highcharts.chart('container', {
            plotOptions: {
                series: {
                    color: '#1ED65F'
                }
            },
            title: {
                text: 'A chart For Monthly Unique Visitors'
            },

            xAxis: {
                categories: arr/*['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december']*/
            },
            yAxis :{
              title: {
                  text: "Number of Monthly Unique Visitors"
              }
            },
            series:[{
               name:"New Monthly Unique Visitors",
                data:visitorsData
            }],
        });
        var chart3 = new Highcharts.Chart('container3',{
            plotOptions: {
                series: {
                    color: '#1ED65F'
                },
            },
            title: {
                text: 'A chart For Monthly Newsletter Members'
            },

            xAxis: {
                categories: arr/*['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december']*/
            },
            yAxis :{
                title: {
                    text: "Number of Monthly Newsletter Members"
                }
            },
            series:[{
                name:"New Monthly Newsletter Members",
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
                text: 'A chart For Monthly Sale Property'
            },

            xAxis: {
                categories: arr/*['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december']*/
            },
            yAxis :{
                title: {
                    text: "Number of Monthly Sale Property"
                }
            },
            series:[{
                name:"New Monthly Sale Property",
                data:TodaySalePropertyData
            }],
        });
        var chart5 = new Highcharts.Chart('container5', {
            plotOptions: {
                series: {
                    color: '#1ED65F'
                }
            },
            title: {
                text: 'A chart For Daily Unique Visitors'
            },

            xAxis: {
                // categories: arr/*['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december']*/
                categories : time //['10:00','11:00','12:00','01:00','02:00','03:00','04:00','05:00','06:00','07:00','08:00','09:00','10:00','11:00']
            },
            yAxis :{
                title: {
                    text: "Number of Daily Unique Visitors"
                }
            },
            series:[{
                name:"New Daily Unique Visitors",
                data:DailyUniqueVisitors
            }],
        });
        var chart6 = new Highcharts.Chart('container6', {
            plotOptions: {
                series: {
                    color: '#1ED65F'
                }
            },
            title: {
                text: 'A chart For Daily Pre-construction Submission'
            },

            xAxis: {
                categories: arr/*['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december']*/
            },
            yAxis :{
                title: {
                    text: "Number of Daily Pre-construction Submission"
                }
            },
            series:[{
                name:"New Daily Pre-construction Submission",
                data:DailyPreConstructionSubmission
            }],
        });
    </script>
@endsection
