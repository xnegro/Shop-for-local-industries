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
                                                            <a href="/" class="navbar-brand">Productive Families Platform</a>

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


    <!-- newsletter -->
    <section class="grid-shop">
        <!-- .grid-shop -->
        <div class="breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <ol>
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div>
                    <div class="col-md-4 text-right">
                        <h2>Products</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="grid-banner"> </div>
                    <div class="grid-spr">

                    </div>

                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-lg-3">
                                <!-- .pro-text -->
                                <div class="pro-text">
                                    <!-- .pro-img -->
                                    <div class="pro-img">
                                        <img src="{{ $product->img }}" alt="2" height="200" />
                                        <a href="#" class="favorite"><i class="material-icons">&#xE87D;</i></a>
                                    </div>
                                    <!-- /.pro-img -->
                                    <div class="pro-text-outer">
                                        <span>{{ $product->category }}</span>
                                        <a href="/product/{{ $product->id }}/view">
                                            <h4>{{ $product->title }} </h4>
                                        </a>
                                        <div class="wk-price">SAR {{ number_format($product->price) }}
                                            <div class="in-stock"><i class="material-icons">&#xE5CA;</i> In stock</div>
                                        </div>

                                        <a href="/product/{{ $product->id }}/view" class="add-btn"><i
                                                class="material-icons">&#xE417;</i>
                                            View Product</a>

                                    </div>
                                </div>
                                <!-- /.pro-text -->
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- /.grid-shop -->
    </section>

@endsection
</x-home>
