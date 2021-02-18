<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-head/>
<body data-topbar="white" data-layout="horizontal">
<x-header/>
@yield('content')
<x-footer/>
<x-script/>
</body>
</html>
