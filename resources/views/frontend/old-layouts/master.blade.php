<!-- head -->
@include('frontend.include.head')
<!-- header -->
@if(\Request::is('about') || \Request::is('testimonial') || \Request::is('agent') || \Request::is('sign-in'))
    @include('frontend.include.header-2')
@elseif(\Request::is('submit-property') || \Request::is('dashboard') || \Request::is('dashboard-new') ||
 \Request::is('my-properties') || \Request::is('my-profile'))
    @include('frontend.include.header-3')
@else
    @include('frontend.include.header-1')
@endif
<!-- main-content -->
@yield('content')
<!-- footer -->
@include('frontend.include.footer')
<!-- foot -->
@include('frontend.include.foot')
