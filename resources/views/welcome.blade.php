<x-home>
    @section('header')
        <header class="index5-header">
            <div class="main-menu">
                <!--  nav  -->
                <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
                    <div class="container menu5">
                        <div class="row">
                            <div class="col-lg-3">
                                <a href="/" class="navbar-brand2" style="font-size: 19px;">Productive Families Platform</a>
                            </div>
                            <div class="col-lg-9 text-center">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                        data-target="#bs-example-navbar-collapse-1">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="collapse navbar-collapse click-colse" id="bs-example-navbar-collapse-1"
                                    data-hover="dropdown" data-animations=" fadeInLeft fadeInUp fadeInRight">
                                    <ul class="nav navbar-nav">
                                        <li class="dropdown">
                                            <a href="/"><span>home </span> </a>

                                        </li>

                                        <li class="dropdown">
                                            <a href="{{ route('products') }}"><span>Products </span> </a>

                                        </li>
                                    </ul>

                                    <ul class="nav navbar-nav navbar-right">
                                        @if (Auth::guard('families')->check())
                                            <li>
                                                <a href="/family/panel"><span>Dashboard</span></a>
                                            </li>
                                        @elseif(Auth::guard('web')->check())
                                            <li>
                                                <a href="/customer/panel"><span>Dashboard</span></a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="/login"><span>Login</span></a>
                                            </li>
                                        @endif


                                    </ul>
                                    <!-- /.navbar-collapse -->
                                </div>
                            </div>
                        </div>

                    </div>
                </nav>
                <!-- /nav end -->

            </div>


            <!-- header-outer -->
            <section class="header-outer header-outer2">
                <!-- header-slider -->
                <div class="header-slider header-slider3">
                    <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
                        <!-- .home-slider -->
                        <div class="carousel-inner">
                            <div class="item active"
                                style="background-image: url(/public/bg.png);  background-repeat: no-repeat; background-position: top; background-size: cover;">
                                <div class="container">
                                    <div class="caption">
                                        <div class="caption-outer">
                                            <div class="col-lg-6 text-center">
                                            </div>
                                            <div class="col-lg-6 text-center">
                                                <h3></h3>
                                                <h4></h4>
                                                <h2 class="animated wow slideInUp" data-wow-delay="0ms"
                                                    data-wow-duration="1500ms"style="font-size: 38px;">Our website for every family that has a skill, craft or product</h2>
                                                <a data-scroll class="btn shop-now animated fadeInUp" data-wow-delay="0ms"
                                                    data-wow-duration="1500ms" href="{{ route('products') }}">Browse our
                                                    products</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <!-- /.home-slider -->
                    </div>
                </div>
                <!-- /header-slider end -->
            </section>
            <!-- /header-outer -->
        </header>
    @endsection

    @section('content')
        <!-- payent process -->
        <!--<section>-->
        <!--    <div class="container">-->
        <!--        <div class="row">-->
        <!--            <div class="col-lg-12">-->
        <!--                <div class="payment-process">-->
        <!--                    <ul>-->
        <!--                        <li>-->
        <!--                            <i class="material-icons">flight</i>-->
        <!--                            <div class="payemnt-process-text">-->
        <!--                                <strong>free shipping</strong>-->
        <!--                                <p>On order over $200</p>-->
        <!--                            </div>-->
        <!--                        </li>-->
        <!--                        <li>-->
        <!--                            <i class="material-icons">call_to_action</i>-->
        <!--                            <div class="payemnt-process-text">-->
        <!--                                <strong>Easy payment</strong>-->
        <!--                                <p>Optimal for payment</p>-->
        <!--                            </div>-->
        <!--                        </li>-->
        <!--                        <li>-->
        <!--                            <i class="material-icons">access_time</i>-->
        <!--                            <div class="payemnt-process-text">-->
        <!--                                <strong>30 days return</strong>-->
        <!--                                <p>Money back guarantee</p>-->
        <!--                            </div>-->
        <!--                        </li>-->
        <!--                        <li>-->
        <!--                            <i class="material-icons">card_giftcard</i>-->
        <!--                            <div class="payemnt-process-text">-->
        <!--                                <strong>special gift card</strong>-->
        <!--                                <p>On order over $800</p>-->
        <!--                            </div>-->
        <!--                        </li>-->
        <!--                    </ul>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</section>-->
        <!-- /payment process -->


        <!-- deal-outer -->
        <section class="deal-section grid-shop grid-shop4">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- new-arrivals -->
                        <div class="new-arrivals">
                            <div class="title text-center">
                                <h2>
                                    Browse our collection
                                </h2>
                                <ul class="nav nav-tabs etabs">
                                    <li class="active"><a data-toggle="tab" href="#home">All </a></li>
                                </ul>
                            </div>

                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                    <div class="row">
                                        @foreach ($products as $product)
                                            <div class="col-sm-4 col-lg-3">
                                                <!-- .pro-text -->
                                                <div class="pro-text home2-pro-text">
                                                    <!-- .pro-img -->
                                                    <div class="pro-img">
                                                        <img src="{{ $product->img }}" alt="2" />

                                                        <!-- add-cart-click -->
                                                        <div class="add-cart-click2">
                                                            <a href="/product/{{ $product->id }}/view" class="shopping-btn"
                                                                style=" width: 100%; margin: 0 auto; text-align: center; "><i
                                                                    class="material-icons"></i> View </a>
                                                        </div>
                                                        <!-- add-cart-click -->

                                                    </div>
                                                    <!-- /.pro-img -->
                                                    <div class="pro-text-outer text-center">

                                                        <a href="/product/{{ $product->id }}/view">
                                                            <h4>{{ $product->title }} </h4>
                                                        </a>
                                                        <div class="wk-price">SAR {{ $product->price }}</div>

                                                    </div>
                                                </div>
                                                <!-- /.pro-text -->
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /new-arrivals -->

                </div>
            </div>
        </section>
        <!-- /deal-outer -->
    @endsection
</x-home>
