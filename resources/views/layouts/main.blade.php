<!DOCTYPE html>

@yield('html')

<head>
    <meta charset="utf-8" />
    <title>@yield('title') BISJHINTUS - Lets Succeed Together</title>

    <meta content="BISJHINTUS - Lets Succeed Together" name="description" />
    <meta content="BISJHINTUS - Lets Succeed Together" property="og:title" />
    <meta
        content="BISJHINTUS is a creative e-learning platform. We are the Indian regional language learning experience platform enabled with recorded and live classes, a quiz, community chat, blog writing, and many more. Bisjhintus promote a healthy peer learning environment. And enhance the student's interactions with parents. One platform with multiple features. Join the growing Bisjhintus learning community."
        property="og:description" />
    <meta
        content="BISJHINTUS is a creative e-learning platform. We are the Indian regional language learning experience platform enabled with recorded and live classes, a quiz, community chat, blog writing, and many more. Bisjhintus promote a healthy peer learning environment. And enhance the student's interactions with parents. One platform with multiple features. Join the growing Bisjhintus learning community."
        name="description" />
    <meta content="https://bisjhintus.web.app/assets/images/og-image.png" property="og:image" />
    <meta content="" property="twitter:title" />
    <meta content="" property="twitter:description" />
    <meta content="https://BISJHINTUS.web.app/assets/logo-full.png" property="twitter:image" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta property="og:type" content="website" />
    <meta content="summary_large_image" name="twitter:card" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Webflow" name="generator" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-201269226-1"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('assets/images/logo-s.png') }}" rel="shortcut icon" type="image/x-icon" />
    <link href="{{ asset('assets/images/logo-s.png') }}" rel="apple-touch-icon" />

    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">

    @yield('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/custom-styles.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/card_styles.css') }}" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        ! function(o, c) {
            var n = c.documentElement,
                t = " w-mod-";
            n.className += t + "js",
                ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
        }(window, document);
    </script>
    @yield('head-assets')
    <base target="_blank">
</head>

<body>

    @yield('top-content')
    <div class="page-wrapper" style="background-color: #fff;">

        @include('layouts.header')

        @yield('content')
        @include('layouts.footer')



    </div>


    {{-- Page Scripts --}}

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <!-- Your custom scripts -->
    <script src="{{ asset('assets/js/main.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/custom.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/script.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap5.min.js') }}" type="text/javascript"></script>
    <!-- Bootstrap JS (including Popper.js) -->

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> --}}
    @yield('bottom-scripts')
</body>

</html>
