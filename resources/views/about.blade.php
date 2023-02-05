<x-home>
    @section('content')
    @section('header')
        <header class="header2">
            <section class="top-md-menu">
                <div class="container">
                    <div class="main-menu">
                        <!--  nav  -->
                        <nav class="navbar navbar-inverse navbar-default">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#"><img src="assets/images/01_homepage_v1/logo.png"
                                        alt="logo" /></a>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" data-hover="dropdown"
                                data-animations=" fadeInLeft fadeInUp fadeInRight">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown">
                                        <a href="/"><span>home </span> </a>

                                    </li>

                                    <li class="dropdown">
                                        <a href="{{ route('products') }}"><span>Products </span> </a>

                                    </li>

                                    @if (Auth::guard('families')->check())
                                        <li>
                                            <a href="/family/panel"><span>Dashboard</span></a>
                                        </li>
                                    @elseif(Auth::guard('web')->check())
                                        <li>
                                            <a href="/customer/panel"><span>Dashboard</span></a>
                                        </li>
                                    @elseif(Auth::guard('admins')->check())
                                        <li>
                                            <a href="/admin/panel"><span>Dashboard</span></a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="/login"><span>Login</span></a>
                                        </li>
                                    @endif



                                </ul>
                                <!-- /.navbar-collapse -->
                            </div>
                        </nav>
                        <!-- /nav end -->

                    </div>
                </div>
            </section>
        </header>
    @endsection

    <section class="about">
        <!-- .about -->
        <div class="breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ol>
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">About</li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <!-- /about-image -->
                    <!-- about-text -->
                    <div class="about-text">
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                            architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit
                            aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione
                            voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                            consectetur, adipisci velit.</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="col-sm-1">
                                    <i class="material-icons">beenhere</i>
                                </div>
                                <div class="col-sm-11">
                                    <h6>Best Service</h6>
                                    <p>Must explain to you how all this mistaken idea of denouncing pleasure and
                                        praising pain was born and I will give you a complete account of the system, and
                                        expound the actual teachings of the great explorer of the truth.</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="col-sm-1">
                                    <i class="material-icons">thumb_up</i>
                                </div>
                                <div class="col-sm-11">
                                    <h6>Best Service</h6>
                                    <p>Must explain to you how all this mistaken idea of denouncing pleasure and
                                        praising pain was born and I will give you a complete account of the system, and
                                        expound the actual teachings of the great explorer of the truth.</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="col-sm-1">
                                    <i class="material-icons">live_help</i>
                                </div>
                                <div class="col-sm-11">
                                    <h6>Best Service</h6>
                                    <p>Must explain to you how all this mistaken idea of denouncing pleasure and
                                        praising pain was born and I will give you a complete account of the system, and
                                        expound the actual teachings of the great explorer of the truth.</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="col-sm-1">
                                    <i class="material-icons">settings</i>
                                </div>
                                <div class="col-sm-11">
                                    <h6>Best Service</h6>
                                    <p>Must explain to you how all this mistaken idea of denouncing pleasure and
                                        praising pain was born and I will give you a complete account of the system, and
                                        expound the actual teachings of the great explorer of the truth.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- about-text -->
                </div>

            </div>

        </div>
        <!-- /.about -->
    </section>


@endsection
</x-home>
