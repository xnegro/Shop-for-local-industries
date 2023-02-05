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
    <!-- grid-shop -->
    <section class="grid-shop">
        <!-- .grid-shop -->

        <!-- .shop-deails-bg -->
        <div class="shop-deails-bg">
            <div class="container">
                <div class="row">
                    <!-- left side -->
                    <div class="col-sm-5 col-md-5">
                        @if (Session::has('message'))
                            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                                {{ Session::get('message') }}</p>
                        @endif

                        <!-- product gallery -->
                        <div class="connected-carousels">
                            <div class="stage">
                                <div class="carousel carousel-stage">
                                    <ul>
                                        <li><img width="200" height="200" class="zoom_01" src="{{ $id->img }}"
                                                data-zoom-image="{{ $id->img }}" alt="qoute-icon" /> </li>

                                    </ul>
                                </div>


                            </div>

                        </div>

                        <!-- / product gallery -->
                    </div>
                    <!-- left side -->
                    <!-- right side -->
                    <div class="col-sm-7 col-md-7">
                        <!-- .pro-text -->
                        <div class="pro-text product-detail">
                            <!-- /.pro-img -->
                            <a href="#">
                                <h4>{{ $id->title }}</h4>
                            </a>
                            <p><strong>SAR {{ number_format($id->price) }} </strong></p>
                            <div class="instock">
                                <ul>
                                    <li class="black-text"><i class="material-icons green">check_circle</i> In stock
                                    </li>
                                    <li><i class="material-icons">card_giftcard</i> {{ $id->category }}</li>
                                    <li><i class="material-icons">person</i>
                                        @foreach ($families as $family)
                                            @if ($family->id == $id->family_id)
                                                {{ $family->name }}
                                            @endif
                                        @endforeach
                                    </li>
                                </ul>
                            </div>

                            <p>{!! $id->description !!}</p>

                            @if (Auth::guard('web')->check())
                                <form action="/order/store" method="POST">
                                    @csrf
                                    <div class="numbers-row">
                                        <input type="text" name="amount" id="french-hens" value="1">
                                    </div>

                                    <input name="user_id" type="text" value="{{ auth()->user()->id }}" hidden>
                                    <input name="product_id" type="text" value="{{ $id->id }}" hidden>
                                    <input name="family_id" type="text" value="{{ $id->family_id }}" hidden>
                                    <input name="username" type="text" value="{{ auth()->user()->name }}" hidden>
                                    <input name="phone" type="text" value="{{ auth()->user()->phone }}" hidden>
                                    <input name="price" type="text" value="{{ $id->price }}" hidden>


                                    <button type="submit" class="addtocart2"><span
                                            class="material-icons">shopping_cart</span>
                                        Make an order</button>
                                </form>
                            @else
                                <mark><a href="/login">Login</a></mark> first to make order
                            @endif


                            <hr>



                        </div>
                        <div class="tab-content">
                            <div id="home" class="tab-pane fade">


                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                    anunknown printer took a galley of type and scrambled it to make a type specimen
                                    book. It has survived not only five centuries, but also the leap into electronic
                                    typesetting, remaining essentially unchanged. It was popularised in the 1960s with
                                    the release of Letraset sheets containing Lorem Ipsum passages..</p>
                                <ul>
                                    <li>Claritas est etiam processus dynamicus.</li>
                                    <li>Qui sequitur mutationem consuetudium lectorum. </li>
                                    <li>Claritas est etiam processus dynamicus.</li>
                                    <li>Qui sequitur mutationem consuetudium lectorum. </li>
                                    <li>Claritas est etiam processus dynamicus.</li>
                                    <li>Qui sequitur mutationem consuetudium lectorum. </li>
                                </ul>
                                <p>It has survived not only five centuries, but also the leap into electronic
                                    typesetting, remaining essentially unchanged. It was popularised in the 1960s with
                                    the release.</p>
                            </div>
                            <div id="menu2" class="tab-pane fade in active">
                                <div class="comment-tab2">

                                    <div class="comment-text-outer">
                                        <div class="row">
                                            @foreach ($commets as $commet)
                                                @if ($commet->product_id == $id->id)
                                                    <div class="col-lg-10">

                                                        <div class="star2">
                                                            <ul>

                                                            </ul>

                                                        </div>
                                                        <br>
                                                        <p>
                                                        <p> {{ Carbon\Carbon::parse($commet->created_at)->diffForHumans() }}
                                                        </p>
                                                        <strong>{{ $commet->username }}</strong>
                                                        : {{ $commet->msg }}
                                                        </p>
                                                        <div class="handup-rating">


                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="review-comment">
                            <div class="title text-center">
                                <h2>write a review</h2>
                            </div>
                            @if (Auth::guard('web')->check())
                                <div class="contact-form">
                                    <form action="/comment/store" method="post" id="commentform" class="comment-form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="comment-form-author"><input id="author" name="author"
                                                        value="{{ auth()->user()->name }}" size="30"
                                                        placeholder="Name" type="text">
                                                </p>
                                            </div>
                                            <input type="text" value="{{ $id->id }}" name="product_id"
                                                hidden>
                                            <div class="col-md-12">
                                                <p class="comment-form-comment">
                                                    <textarea id="comment" name="comment" cols="45" rows="8" placeholder="Comment" aria-required="true"></textarea>
                                                </p>
                                            </div>
                                            <div class="col-md-12">
                                                <p class="form-submit"><input name="submit" id="submit"
                                                        class="btn btn-secondary" value="Send message"
                                                        type="submit">
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <mark><a href="/login">Login</a></mark>
                            @endif
                        </div>
                        <!-- /.pro-text -->
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /grid-shop -->


@endsection
</x-home>
