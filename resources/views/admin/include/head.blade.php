<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- title -->
    @yield('title')
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- modal-popup -->
    @yield('modal-popup-script')
    <!-- sweet alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">--}}
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('')}}admin-panel/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('')}}admin-panel/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('')}}admin-panel/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('')}}admin-panel/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('')}}admin-panel/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('')}}admin-panel/assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('')}}admin-panel/assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('')}}admin-panel/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('')}}admin-panel/assets/plugins/daterangepicker/daterangepicker.css">
    <!-- editor -->
    @yield('editor-style')
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- media-button-style -->
    @yield('media-button-style')
    <style>
        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active{
            background-color:#1ED65F;
            color: #fff;
        }
        .page-item.active .page-link{
            background-color:#1ED65F;
            border-color: #1ED65F;
        }
        a{
            color: #1ED65F;
        }
        .page-link{
            color: #1ED65F;
        }
        .info-box .info-box-icon{
            height: 60px;
            width: 60px;
        }
        .card-primary.card-outline{
            border-top: 3px solid #1ED65f;
        }
        .swal2-icon.swal2-warning.swal2-icon-show {
            /*border-color: #facea8;*/
            /*color: #f8bb86;*/
            /*border-color: #1ed760;*/
            font-size: 1rem;
        }
        /*.swal2-icon.swal2-warning.swal2-icon-show{*/
        /*   color:#19B852;*/
        /*}*/
    </style>
</head>
