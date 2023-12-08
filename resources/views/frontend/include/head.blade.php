
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
{{--    <meta property="og:title" content="Check out this property on Tutunji Realty!">--}}
{{--    <meta property="og:image" content="LogoTransparent.png">--}}

    <link rel="stylesheet" href="{{asset('')}}frontend/assets/css/bootstrap-grid.css">
    <link rel="stylesheet" href="{{asset('')}}frontend/assets/css/bootstrap.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('')}}frontend/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('')}}frontend/assets/css/owl.theme.default.css">

{{--    <!-- begin dashboard-page-sidebar-menu-css -->--}}
{{--    <link rel="stylesheet" href="{{asset('')}}frontend/assets/css/pushy.css">--}}
{{--    <!-- end dashboard-page-sidebar-menu-css -->--}}
    <!-- date-picker css -->
    @yield('date-picker-css')
    <!-- date-picker end -->
    <!-- fb-button-css -->
    @yield('fb-button-style')
    <link href="{{asset('')}}frontend/assets/css/style.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('')}}frontend/assets/css/js-timeline.css" type="text/css">
    {{-- marker cluster js --}}
    <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
    <!-- title -->
    @yield('title')
    <!-- header-display-circle-img-style -->
    <style>
        .user {
            display: inline-block;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        /*#swal2-title{*/
        /*    font-size: 17px;*/
        /*}*/
        /*.swal2-icon.swal2-info {*/
        /*    !*border-color: #1ED65F;*!*/
        /*    !*color: green;*!*/
        /*}*/
        /*.gm-style-iw-d{*/
        /*    overflow: hidden;*/
        /*}*/
    </style>

</head>
