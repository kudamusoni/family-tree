<!doctype html>
<html>

<head>
    @include('includes.head')
</head>

<body class="h-full w-full">
    <div class="">
        <header class="">
            @include('includes.header')
        </header>
        <div id="main" class="">
            <div id="app" class="">
                @yield('content')
            </div>
        </div>
        <footer class="">
            {{-- @include('includes.footer') --}}
        </footer>
    </div>
</body>

</html>
