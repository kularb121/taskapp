<!DOCTYPE html>
<html>

<head>
    <title>App Name - @yield('title')</title>
    @yield('styles')
    <style>
        .success-message {
            color: green;
        }
    </style>
</head>

<body>
    <h1>@yield('title')</h1>
    @if (session()->has('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif
    <div>
        @yield('content')
    </div>
</body>

</html>
