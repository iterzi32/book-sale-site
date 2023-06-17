<!doctype html>
<html lang="en">
@include('front.dashboard.layouts.head')
<body>
@include('front.dashboard.layouts.header')
<div class="container">
    <div class="row">
        @include('front.dashboard.layouts.sidebar')
        @yield('content')
    </div>
</div>
@include('front.dashboard.layouts.footer')
@include('front.dashboard.layouts.script')
</body>
</html>


