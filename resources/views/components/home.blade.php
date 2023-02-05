<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Productive Families Platform </title>
    <!-- Standard -->
    <link rel="shortcut icon" href="assets/images/ficon.png">
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
    <!-- Dropdownhover CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-dropdownhover.min.css') }}" type="text/css">
    <!-- latest fonts awesome -->
    <link rel="stylesheet" href="{{ asset('assets/font/css/font-awesome.min.css') }}" type="text/css">
    <!-- simple line fonts awesome -->
    <link rel="stylesheet" href="{{ asset('assets/simple-line-icon/css/simple-line-icons.css') }}" type="text/css">
    <!-- stroke-gap-icons -->
    <link rel="stylesheet" href="{{ asset('assets/stroke-gap-icons/stroke-gap-icons.css') }}" type="text/css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}" type="text/css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <!--  baguetteBox -->
    <link rel="stylesheet" href="{{ asset('assets/css/baguetteBox.css') }}">

</head>


<body>
    <!--  Preloader  -->
    <div id="preloader">
        <div id="loading">
        </div>
    </div>
    @yield('header')
    <!-- payent process -->

    @yield('content')


    <footer class="footer-6">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-lg-4">
                    <!-- f-weghit -->
                    <div class="f-weghit">
                        <img src="https://family.trophycleaning.com/images/LOGO.png" alt="logo" style="height: 140px; margin-bottom: -36px;">
                        <p><strong>Productive Families Platform</strong> </p>
                   
                    </div>
                    <!-- /f-weghit -->
                </div>
                <div class="col-sm-2 col-lg-2">
                    <!-- f-weghit2 -->
                    <div class="f-weghit2">
                        <h4>information</h4>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="/products">Products</a></li>
                            <li><a href="/login">Login</a></li>
                            <li><a href="/family/login">Family</a></li>
                            <li><a href="/about">About</a></li>
                        </ul>
                    </div>
                    <!-- /f-weghit2 -->
                </div>

            </div>
        </div>

    </footer>
    <p id="back-top" style="display: block;">
        <a href="#top"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
    </p>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-dropdownhover.min.js') }}"></script>
    <!-- Plugin JavaScript -->
    <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <!-- owl carousel -->
    <script src="assets/owl-carousel/owl.carousel2.js"></script>
    <!--  Custom Theme JavaScript  -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/incrementing.js') }}"></script>

    <!--  jcarousel Theme JavaScript  -->
    <script type="text/javascript" src="{{ asset('assets/js/jquery.jcarousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jcarousel.connected-carousels.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.elevatezoom.js') }}"></script>
    <script>
        $('.zoom_01').elevateZoom({
            zoomType: "inner",
            cursor: "crosshair",
            zoomWindowFadeIn: 500,
            zoomWindowFadeOut: 750
        });
    </script>

</body>
