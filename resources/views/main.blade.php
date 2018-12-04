
<!doctype html>
<html lang="en">
@include('partials._head')
@yield('style')

<body>

    @include('partials._nav')
    @yield('banner')
    @yield('breadcrumb')
<div class="content offset-lg-1">
    @include('partials._messages')
        @yield('content')
    @include('partials._footer')
</div>

    @include('partials._javascript')
</body>
</html>