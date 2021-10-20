@include('auth.layouts.head')
<body>
        <div class="wrapper">
            <div id="pre-loader">
                <img src="images/pre-loader/loader-01.svg" alt="">
            </div>
            @yield('content')
        </div>
@include('auth.layouts.footer')
    </body>
</html>
