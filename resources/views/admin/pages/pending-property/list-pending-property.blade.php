@extends('admin.layouts.master')
@section('title')
    <title> All Pending Properties </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.css" rel="stylesheet"/>
    <!-- -->
    <style>
        #swal2-title{
            margin-top: 25px;
        }
    </style>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
{{--        <div class="col-md-6">add button</div>--}}
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Pending Property</h1>
                    </div>
{{--                    <div class="col-sm-6">--}}
{{--                        <ol class="breadcrumb float-sm-right">--}}
{{--                            <li class="breadcrumb-item"><a href=""></a>Properties</li>--}}
{{--                            <li class="breadcrumb-item"><a href="#">Pending</a></li>--}}
{{--                        </ol>--}}
{{--                    </div>--}}
                </div>
{{--                <div class="text-right"><button type="button" class="btn btn-primary"></button></div>--}}
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">List of All Pending Property</h3>
                            <div class="text-right">
                                @can('view_only')
                                <a href="{{url('/admin/list-pending-property')}}" class="btn btn-sm btn-primary" style="background-color: #1ED65F;border-color: #1ED65f;">All</a>
                                <a href="{{url('/admin/rejected-property')}}" class="btn btn-sm btn-primary" style="background-color: #1ED65F;border-color: #1ED65f;">Rejected </a>
                                <a href="{{url('/admin/all-pending-property')}}" class="btn btn-sm btn-primary" style="background-color: #1ED65F;border-color: #1ED65f;">Pending</a>
                                @endcan
                                @if(Auth::guard('admin')->user()->role == 1)<i class="fa fa-minus" style="color: #949496;display: none;"></i>@else<i class="fa fa-minus" style="color: #949496"></i>@endif
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('flash-message')
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Media</th>
{{--                                    <th>Title</th>--}}
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>ListedIn</th>
                                    <th>City</th>
                                    <th>Neighborhood</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($no = 1)
                                @foreach($query as $propertyData)
                                    <tr>
                                        <td>{{ $no++ }}</td> {{--($propertyData['id']) ? $propertyData['id'] : '-'--}}
                                        <td>
                                            @if(!empty($propertyData['property_media']['media_name']))
                                                @if($propertyData['source'] == 'Frontend')
                                                    <img src="{{asset('frontend/assets/property-images/media-file/'.$propertyData['property_media']['media_name'])}}" height="100px" width="100px">
                                                @else
                                                    <img src="{{asset('admin-panel/assets/property-images/media-file/sale/'.$propertyData['property_media']['media_name'])}}" height="100px" width="100px">
                                                @endif
                                            @else
                                                <img src="{{asset('default/404-not-found.jpg')}}" height="100px" width="100px">
                                            @endif
                                            {{--                                            @foreach($saleData['property_media'] as $mediaFile)--}}
                                            {{--                                                <img src="{{asset('frontend/assets/property-media/'.$mediaFile['media_name'])}}" height="100px" width="100px">--}}
                                            {{--                                            @endforeach--}}
                                        </td>

{{--                                        <td>{{($propertyData['title']) ? $propertyData['title'] : '-'}}</td>--}}
                                        <td>${{($propertyData['price']) ? $propertyData['price'] : '-'}}</td>
{{--                                        <td>{{($propertyData['category']) ? $propertyData['category'] : '-'}}</td>--}}
                                        <td>{{($propertyData['cat_details']) ? $propertyData['cat_details']['name'] : '-'}}</td>
                                        <td>{{($propertyData['listed_in']) ? $propertyData['listed_in'] : '-'}}</td>
                                        <td>{{($propertyData['city']) ? $propertyData['city'] : '-'}}</td>
                                        <td>{{($propertyData['neighborhood']) ? $propertyData['neighborhood'] : '-'}}</td>
                                        <td>
                                            @if($propertyData['internal_status'] == 0 && $propertyData['property_type'] == 'sale')
                                                <span class="badge badge-warning">Pending</span>
                                            @elseif($propertyData['internal_status'] == 2)
                                                <span class="badge badge-danger">Rejected</span>
                                            @else
                                                <span class="badge badge-success">Approved</span>
                                            @endif
                                        </td>
                                        <td>
                                            @can('view_only')
                                            @if($propertyData['internal_status'] != 2)
                                                    <a href="{{url('/admin/view-pending-property',$propertyData['id'])}}" class="btn btn-sm btn-info" style="background-color: #949496;border-color: #949496;"><i class="fa fa-eye"></i></a>&nbsp;
{{--                                                    <a href="{{url('/admin/propertyStatus',$propertyData['id'])}}" class="btn btn-sm btn-success" style="background-color: #1ED65F;border-color: #1ED65f;"><i class="fa fa-check"></i></a>&nbsp;--}}
                                                    <a href="#" id="approvedBtn" class="btn btn-sm btn-success" data-a_id= "{{$propertyData['id']}}" style="background-color: #1ED65F;border-color: #1ED65f;"><i class="fa fa-check"></i></a>
                                                    <a href="#" id="rejectBtn" class="btn btn-sm btn-danger" data-p_id="{{ $propertyData['id'] }}"><i class="fa fa-times"></i></a>
                                            @else<i class="fa fa-minus" style="color: #949496"></i>@endif
                                            @endcan
                                            @if(Auth::guard('admin')->user()->role == 1)<p style="display: none">---</p>@else<p>---</p>@endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Media</th>
{{--                                    <th>Title</th>--}}
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>ListedIn</th>
                                    <th>City</th>
                                    <th>Neighborhood</th>
                                    <th>Status</th>
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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            $(document).on('click', '#rejectBtn', function () {
                //var email = $('#signInEmail').val();
                swal("Write Reject Reason Here:", {
                    content: "input",
                }).then(value => {
                    // var tagName = .trim();
                    if (value == false)
                    {
                        swal({
                            title: "write Reason Failed",
                            text: "Reason cannot be empty",
                            icon: "error",
                            button: "OK",
                        });
                        return;
                    }
                    else
                    {
                        $.ajax({
                            url     : '{{url("/admin/reject-property")}}',
                            type    : 'post',
                            data    : {
                                _token  : "{{ csrf_token() }}",
                                reason  : value,
                                p_id    : $(this).attr('data-p_id')
                            },
                            success : function(return_res){
                                console.log(return_res);
                                var newRes = JSON.parse(JSON.stringify(return_res));
                                if(newRes.success == "1"){
                                    //alert("Property Rejected");
                                    swal(
                                        "Good job!", "Property Rejected!", "success"
                                    ).then(function () {
                                        window.location = '{{url("/admin/list-pending-property")}}';
                                    });
                                    // toastr.success('Property rejected');
                                    // location.reload();
                                    {{--window.location = '{{url("/admin/list-pending-property")}}';--}}
                                }else{
                                    swal("Opps!", "Invalid Property ID!", "error")
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
    <!-- popup dropdown menu before approved -->
    <!-- for sweetalert2 swal.fire -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- old sweet alert cdn -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function () {
            $(document).on('click','#approvedBtn',function () {
                //before approve property and ajax call
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select agent first!',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Select agent!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Select Agent',
                            input: 'select',
                            inputOptions: <?php echo json_encode($data); ?>,
                            inputPlaceholder: 'Select Agent',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, approve it!',
                            cancelButtonText: 'No, cancel!',
                            confirmButtonColor: '#1ED65F',
                            cancelButtonColor: '#d33',
                            inputValidator: (value) => {
                                if (!value) {
                                    return 'You need to select Agent!'
                                } else {
                                    $.ajax({
                                        url: '{{url("/admin/propertyStatus")}}',
                                        type: 'post',
                                        data: {
                                            _token: "{{ csrf_token() }}",
                                            a_id: $(this).attr('data-a_id'),
                                            agent : value
                                        },
                                        success: function (return_res) {
                                            var newRes = JSON.parse(JSON.stringify(return_res));
                                            if (newRes.success == "1") {
                                                //alert("Property Rejected");
                                                // swal("Approved!", "Property Approved!", "success");
                                                // // toastr.success('Property approved');
                                                // location.reload();
                                                Swal.fire(
                                                    'Approved!',
                                                    'Your property has been approved.',
                                                    'success'
                                                ).then(function () {
                                                    window.location = '{{url("/admin/list-sale-property")}}';
                                                })
                                            } else {
                                                swal.fire(
                                                    'Opps!',
                                                    'Invalid Property ID!',
                                                    'error'
                                                )
                                            }
                                        }
                                    });
                                }
                            }
                        })
                    }
                })
            });
        });
        {{--$(document).ready(function () {--}}
        {{--    $(document).on('click','#approvedBtn',function () {--}}
        {{--        //before approve property and ajax call--}}
        {{--        Swal.fire({--}}
        {{--            icon: 'error',--}}
        {{--            title: 'Oops...',--}}
        {{--            text: 'Please select agent first!',--}}
        {{--            showCancelButton: true,--}}
        {{--            confirmButtonColor: '#3085d6',--}}
        {{--            cancelButtonColor: '#d33',--}}
        {{--            confirmButtonText: 'Select agent!'--}}
        {{--        }).then((result) => {--}}
        {{--            if (result.isConfirmed) {--}}
        {{--                console.log('open select agent drop down')--}}
        {{--                Swal.fire({--}}
        {{--                    title: 'Select Agent',--}}
        {{--                    input: 'select',--}}
        {{--                    inputOptions: <?php echo json_encode($data); ?>,--}}
        {{--                    inputPlaceholder: 'Select Agent',--}}
        {{--                    showCancelButton: true,--}}
        {{--                    confirmButtonText: 'Yes, approve it!',--}}
        {{--                    cancelButtonText: 'No, cancel!',--}}
        {{--                    confirmButtonColor: '#1ED65F',--}}
        {{--                    cancelButtonColor: '#d33',--}}
        {{--                    // inputValidator: (value) => {--}}
        {{--                    //     if(value.isConfirmed){--}}
        {{--                    //         console.log(value);--}}
        {{--                    //     }else if(value.isDismissed){--}}
        {{--                    //         console.log('close the window');--}}
        {{--                    //     }--}}

        {{--                    // inputValidator: function (inputValue) {--}}
        {{--                        // if(inputValue){--}}
        {{--                        //     console.log('approve property')--}}
        {{--                        // }else if(!inputValue){--}}
        {{--                        //     consol.log('please select agent value');--}}
        {{--                        // }else{--}}
        {{--                        //     consol.log('cancel button clicked!');--}}
        {{--                        // }--}}
        {{--                        --}}{{--if (!value) {--}}
        {{--                        --}}{{--    return 'You need to select Agent!'--}}
        {{--                        --}}{{--} else {--}}
        {{--                        --}}{{--    $.ajax({--}}
        {{--                        --}}{{--        url: '{{url("/admin/propertyStatus")}}',--}}
        {{--                        --}}{{--        type: 'post',--}}
        {{--                        --}}{{--        data: {--}}
        {{--                        --}}{{--            _token: "{{ csrf_token() }}",--}}
        {{--                        --}}{{--            a_id: $(this).attr('data-a_id'),--}}
        {{--                        --}}{{--            agent : value--}}
        {{--                        --}}{{--        },--}}
        {{--                        --}}{{--        success: function (return_res) {--}}
        {{--                        --}}{{--            var newRes = JSON.parse(JSON.stringify(return_res));--}}
        {{--                        --}}{{--            if (newRes.success == "1") {--}}
        {{--                        --}}{{--                //alert("Property Rejected");--}}
        {{--                        --}}{{--                // swal("Approved!", "Property Approved!", "success");--}}
        {{--                        --}}{{--                // // toastr.success('Property approved');--}}
        {{--                        --}}{{--                // location.reload();--}}
        {{--                        --}}{{--                Swal.fire(--}}
        {{--                        --}}{{--                    'Approved!',--}}
        {{--                        --}}{{--                    'Your property has been approved.',--}}
        {{--                        --}}{{--                    'success'--}}
        {{--                        --}}{{--                )--}}
        {{--                        --}}{{--            } else {--}}
        {{--                        --}}{{--                swal.fire(--}}
        {{--                        --}}{{--                    'Opps!',--}}
        {{--                        --}}{{--                    'Invalid Property ID!',--}}
        {{--                        --}}{{--                    'error'--}}
        {{--                        --}}{{--                )--}}
        {{--                        --}}{{--            }--}}
        {{--                        --}}{{--        }--}}
        {{--                        --}}{{--    });--}}
        {{--                        --}}{{--}--}}
        {{--                    // }--}}
        {{--                })--}}
        {{--            }else if(result.isDismissed){--}}
        {{--                console.log('press cancel button 1')--}}
        {{--            }--}}
        {{--        })--}}
        {{--    });--}}
        {{--});--}}
   </script>
@endsection

