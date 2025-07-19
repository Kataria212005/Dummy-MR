<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muskurate Raho - @yield('title')</title>
    <link href="{{ config('app.bootstrap_cdn') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ config('app.fontawesome_cdn') }}">
    <style>
        @yield('styles')
    </style>
    
</head>
<body>
    @yield('content')
    
    <script src="{{ config('app.bootstrap_cdn') }}"></script>
    <script src="{{ config('app.bootstrap_js_cdn') }}"></script>
    <script src="{{ config('app.chart_js_cdn') }}"></script>
    @stack('scripts')
</body>
</html>
