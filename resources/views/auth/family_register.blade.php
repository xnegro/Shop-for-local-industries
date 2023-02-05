<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Register</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('font/flaticon.css') }}">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>


<body>
    <div id="preloader" class="preloader">
        <div class='inner'>
            <div class='line1'></div>
            <div class='line2'></div>
            <div class='line3'></div>
        </div>
    </div>
    <section class="fxt-template-animation fxt-template-layout15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-12 order-md-2 fxt-bg-img"
                    data-bg-image="https://www.egy-press.com/wp-content/uploads/2021/05/%D8%B4%D8%B1%D9%88%D8%B7-%D9%81%D8%AA%D8%AD-%D9%85%D8%AD%D9%84-%D9%84%D8%A8%D9%8A%D8%B9-%D9%85%D9%86%D8%AA%D8%AC%D8%A7%D8%AA-%D8%A7%D9%84%D8%A3%D8%B3%D8%B1-%D8%A7%D9%84%D9%85%D9%86%D8%AA%D8%AC%D8%A9.jpeg">
                    <div class="fxt-intro">
                        <h1>Welcome </h1>
                        <div class="fxt-page-switcher">
                            <a href="{{ route('family.login') }}" class="switcher-text1">Log In</a>
                            <a href="{{ route('family.register') }}" class="switcher-text1 active">Register</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12 order-md-1 fxt-bg-color">
                    <div class="fxt-content">
                        <div class="fxt-header">
                            {{--  <a href="login-15.html" class="fxt-logo"><img src="img/logo-15.png" alt="Logo"></a>  --}}
                        </div>
                        <div class="fxt-form">
                            <h2>Register</h2>
                            <p>Create an account free and enjoy it</p>
                            <x-jet-validation-errors class="alert alert-danger" />

                            @if (session('status'))
                                <div class="alert alert-danger font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('family.register.save') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <input type="text" class="form-control" name="name" placeholder="Name"
                                            required="required">
                                        <i class="flaticon-user"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Email Address" required="required">
                                        <i class="flaticon-envelope"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <input type="phone" class="form-control" name="phone" placeholder="Phone"
                                            required="required">
                                        <i class="fi fi-rr-phone-call"></i>
                                    </div>
                                </div>
                                <link rel='stylesheet'
                                    href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <select class="form-control" name="city">
                                            <option disabled selected>Select Your City</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->title }}">{{ $city->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <select class="form-control" name="category">
                                            <option disabled selected>Select Your Category</option>
                                            @foreach ($cates as $cate)
                                                <option value="{{ $cate->title }}">{{ $cate->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-2">
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Password" required="required">
                                        <i class="flaticon-padlock"></i>
                                    </div>
                                </div>






                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-3">
                                        <button type="submit" class="fxt-btn-fill">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- jquery-->
    <script src="{{ asset('js/jquery-3.5.0.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Imagesloaded js -->
    <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- Validator js -->
    <script src="{{ asset('js/validator.min.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
