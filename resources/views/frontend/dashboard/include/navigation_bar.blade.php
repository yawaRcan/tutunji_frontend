{{--<div class="col-lg-3">--}}
{{--    <div class="dashboard dn">--}}
{{--        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">--}}
{{--            <a class="nav-link {{ request()->is('dashboard') ? 'active' : ''}}  mt-0" --}}{{--id="v-pills-home-tab" data-toggle="pill"--}}{{-- href="{{ url('dashboard') }}" role="tab" aria-controls="v-pills-home" aria-selected="{{ request()->is('dashboard') ? 'true' : 'false'}}">Dashboard</a>--}}
{{--            --}}{{--            <a class="nav-link" href="{{url('/submit-property')}}">Add Property</a>--}}
{{--            <a class="nav-link {{ request()->is('my-properties') ? 'active' : ''}}" --}}{{--id="v-pills-profile-tab" data-toggle="pill"--}}{{-- href="{{ url('my-properties') }}" role="tab" aria-controls="v-pills-profile" aria-selected="{{ request()->is('my-properties') ? 'true' : 'false'}}">My Properties</a>--}}
{{--            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Favorities</a>--}}
{{--            <a class="nav-link {{request()->is('my-favourite') ? 'active' : ''}}" --}}{{-- id="v-pills-messages-tab" data-toggle="pill" --}}{{-- href="{{url('my-favourite')}}" role="tab" aria-controls="v-pills-messages" aria-selected="{{request()->is('my-favourite') ? 'true' : 'false'}}">Favorities</a>--}}
{{--            <a class="nav-link {{ request()->is('my-profile') ? 'active' : ''}}" --}}{{-- id="v-pills-settings-tab" data-toggle="pill" --}}{{-- href="{{ url('my-profile') }}" role="tab" aria-controls="v-pills-settings" aria-selected="{{ request()->is('my-profile') ? 'true' : 'false'}}">My Profile</a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!--            mob side bar-->--}}
{{--<!-- Pushy Menu -->--}}
{{--<button class="menu-btn dn-1"> <i class="fas fa-chevron-right"></i> </button>--}}
{{--<div class="site-overlay"></div>--}}
{{--<nav class="pushy pushy-left" data-focus="#first-link">--}}
{{--    <div class="pushy-content">--}}
{{--        <div class="dashboard mt-120">--}}
{{--            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">--}}
{{--                <a class="nav-link active mt-0" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</a>--}}
{{--                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">My Properties</a>--}}
{{--                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Favorities</a>--}}
{{--                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">My Profile</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}
<div class="col-lg-3">
    <div class="dashboard dn">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link {{ request()->is('dashboard') ? 'active' : ''}} mt-0" {{--id="v-pills-home-tab" data-toggle="pill"--}} style="padding-top: 10px;padding-left: 10px;padding-bottom: 10px;" href="{{ url('dashboard') }}" role="tab" aria-controls="v-pills-home" aria-selected="{{ request()->is('dashboard') ? 'true' : 'false'}}">Dashboard</a>
            <a class="nav-link {{ request()->is('my-properties') ? 'active' : ''}}" {{--id="v-pills-profile-tab" data-toggle="pill"--}} style="padding-top: 10px;padding-left: 10px;padding-bottom: 10px;" href="{{ url('my-properties') }}" role="tab" aria-controls="v-pills-profile" aria-selected="{{ request()->is('my-properties') ? 'true' : 'false'}}">My Properties</a>
            <a class="nav-link {{request()->is('my-favourite') ? 'active' : ''}}" {{-- id="v-pills-messages-tab" data-toggle="pill" --}} style="padding-top: 10px;padding-left: 10px;padding-bottom: 10px;" href="{{url('my-favourite')}}" role="tab" aria-controls="v-pills-messages" aria-selected="{{request()->is('my-favourite') ? 'true' : 'false'}}">Favorities</a>
            <a class="nav-link {{ request()->is('my-profile') ? 'active' : ''}}" {{-- id="v-pills-settings-tab" data-toggle="pill" --}} style="padding-top: 10px;padding-left: 10px;padding-bottom: 10px;" href="{{ url('my-profile') }}" role="tab" aria-controls="v-pills-settings" aria-selected="{{ request()->is('my-profile') ? 'true' : 'false'}}">My Profile</a>
        </div>
    </div>
</div>
<!-- mob side bar-->
<!-- Pushy Menu -->
<button class="menu-btn dn-1"> <i class="fas fa-chevron-right"></i> </button>
<div class="site-overlay"></div>
<nav class="pushy pushy-left" data-focus="#first-link">
    <div class="pushy-content">
        <div class="dashboard mt-120">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link {{ request()->is('dashboard') ? 'active' : ''}}  mt-0" {{--id="v-pills-home-tab" data-toggle="pill"--}} href="{{ url('dashboard') }}" role="tab" aria-controls="v-pills-home" aria-selected="{{ request()->is('dashboard') ? 'true' : 'false'}}">Dashboard</a>
                <a class="nav-link {{ request()->is('my-properties') ? 'active' : ''}}" {{--id="v-pills-profile-tab" data-toggle="pill"--}} href="{{ url('my-properties') }}" role="tab" aria-controls="v-pills-profile" aria-selected="{{ request()->is('my-properties') ? 'true' : 'false'}}">My Properties</a>
                <a class="nav-link {{request()->is('my-favourite') ? 'active' : ''}}" {{-- id="v-pills-messages-tab" data-toggle="pill" --}} href="{{url('my-favourite')}}" role="tab" aria-controls="v-pills-messages" aria-selected="{{request()->is('my-favourite') ? 'true' : 'false'}}">Favorities</a>
                <a class="nav-link {{ request()->is('my-profile') ? 'active' : ''}}" {{-- id="v-pills-settings-tab" data-toggle="pill" --}} href="{{ url('my-profile') }}" role="tab" aria-controls="v-pills-settings" aria-selected="{{ request()->is('my-profile') ? 'true' : 'false'}}">My Profile</a>
            </div>
        </div>
    </div>
</nav>
