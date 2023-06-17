<!doctype html>
<html lang="tr" data-bs-theme="auto">
@include('admin.dashboard.layouts.head')
<body>
@include('admin.dashboard.layouts.header')
<div class="container-fluid">
    <div class="row">
        @include('admin.dashboard.layouts.sidebar')
        @yield('content')
    </div>
</div>
@include('admin.dashboard.layouts.script')
</body>
</html>
