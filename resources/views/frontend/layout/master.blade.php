<!-- head -->
@include('frontend.include.head')
<!-- header -->
{{--@if(\Request::is('/'))--}}
{{--    @include('frontend.include.header-1')--}}
{{--@if(\Request::is('sign-in') || \Request::is('testimonial') || \Request::is('pre-construct-property') || \Request::is('blogs2'))
    @include('frontend.include.header-2')
@elseif(\Request::is('submit-property'))
    @include('frontend.include.header-3')
@elseif(\Request::is('dashboard') || (\Request::is('my-properties')) || (\Request::is('my-profile')) || (\Request::is('my-favourite')))
    @include('frontend.include.header-4')
@elseif(\Request::is('about') || (\Request::is('blogs')) || (\Request::is('agent')))
    @include('frontend.include.header-5')
@else
    @include('frontend.include.header-1')
@endif--}}

@if(Auth::check())
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
