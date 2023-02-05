@if (Auth::guard('families')->check())
    <x-family>

        @section('content')
            <main id="content" role="main" class="main">
                <!-- Content -->
                <div class="content container-fluid">
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row align-items-end">
                            <div class="col-sm mb-2 mb-sm-0">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb breadcrumb-no-gutter">
                                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Pages</a>
                                        </li>
                                        <li class="breadcrumb-item"><a class="breadcrumb-link"
                                                href="javascript:;">Account</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                    </ol>
                                </nav>

                                <h1 class="page-header-title">Settings</h1>
                            </div>
                            <!-- End Col -->

                        
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Page Header -->

                    <div class="row">
                        <div class="col-lg-3">
                            <!-- Navbar -->
                            <div class="navbar-expand-lg navbar-vertical mb-3 mb-lg-5">
                                <!-- Navbar Toggle -->
                                <!-- Navbar Toggle -->
                                <div class="d-grid">
                                    <button type="button" class="navbar-toggler btn btn-white mb-3"
                                        data-bs-toggle="collapse" data-bs-target="#navbarVerticalNavMenu"
                                        aria-label="Toggle navigation" aria-expanded="false"
                                        aria-controls="navbarVerticalNavMenu">
                                        <span class="d-flex justify-content-between align-items-center">
                                            <span class="text-dark">Menu</span>

                                            <span class="navbar-toggler-default">
                                                <i class="bi-list"></i>
                                            </span>

                                            <span class="navbar-toggler-toggled">
                                                <i class="bi-x"></i>
                                            </span>
                                        </span>
                                    </button>
                                </div>
                                <!-- End Navbar Toggle -->
                                <!-- End Navbar Toggle -->

                                <!-- Navbar Collapse -->
                                <div id="navbarVerticalNavMenu" class="collapse navbar-collapse">
                                    <ul id="navbarSettings"
                                        class="js-sticky-block js-scrollspy card card-navbar-nav nav nav-tabs nav-lg nav-vertical"
                                        data-hs-sticky-block-options='{
                         "parentSelector": "#navbarVerticalNavMenu",
                         "targetSelector": "#header",
                         "breakpoint": "lg",
                         "startPoint": "#navbarVerticalNavMenu",
                         "endPoint": "#stickyBlockEndPoint",
                         "stickyOffsetTop": 20
                       }'>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#content">
                                                <i class="bi-person nav-icon"></i> Basic information
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#passwordSection">
                                                <i class="bi-key nav-icon"></i> Password
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                                <!-- End Navbar Collapse -->
                            </div>
                            <!-- End Navbar -->
                        </div>

                        <div class="col-lg-9">
                            <div class="d-grid gap-3 gap-lg-5">
                                <!-- Card -->
                                <div class="card">
                                    <!-- Profile Cover -->
                                    @if (Session::has('message'))
                                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                                            {{ Session::get('message') }}</p>
                                    @endif

                                    <div class="profile-cover">
                                        <div class="profile-cover-img-wrapper">
                                            <img id="profileCoverImg" class="profile-cover-img"
                                                src="{{ asset('dashboard/img/1920x400/img2.jpg') }}"
                                                alt="Image Description">

                                            <!-- Custom File Cover -->
                                            <div class="profile-cover-content profile-cover-uploader p-3">

                                                </label>
                                            </div>
                                            <!-- End Custom File Cover -->
                                        </div>
                                    </div>
                                    <!-- End Profile Cover -->
                                    <form action="{{ route('family.settings_info_update') }}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                        <!-- Avatar -->
                                        <label class="avatar avatar-xxl avatar-circle avatar-uploader profile-cover-avatar"
                                            for="editAvatarUploaderModal">
                                            <img id="editAvatarImgModal" class="avatar-img"
                                                src="{{ auth()->guard('families')->user()->photo }}" alt="Image Description">

                                            <input type="file" name="image"
                                                class="js-file-attach avatar-uploader-input" id="editAvatarUploaderModal"
                                                data-hs-file-attach-options='{
                                "textTarget": "#editAvatarImgModal",
                                "mode": "image",
                                "targetAttr": "src",
                                "allowTypes": [".png", ".jpeg", ".jpg"]
                             }'>

                                            <span class="avatar-uploader-trigger">
                                                <i class="bi-pencil-fill avatar-uploader-icon shadow-sm"></i>
                                            </span>
                                        </label>
                                        <!-- End Avatar -->

                                        <!-- Body -->

                                        <!-- End Col -->
                                </div>
                                <!-- End Row -->
                            </div>
                            <!-- End Body -->
                        </div>
                        <!-- End Card -->

                        <!-- Card -->
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title h4">Basic information</h2>
                            </div>

                            <!-- Body -->
                            <div class="card-body">
                                <!-- Form -->
                                <!-- Form -->
                                <div class="row mb-4">
                                    <label for="name" class="col-sm-3 col-form-label form-label">Full name</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Fullname" aria-label="name"
                                            value="{{ auth()->guard('families')->user()->name }}">
                                    </div>
                                </div>
                                <!-- End Form -->

                                <!-- Form -->
                                <div class="row mb-4">
                                    <label for="emailLabel" class="col-sm-3 col-form-label form-label">Email</label>

                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email" id="emailLabel"
                                            placeholder="Email" aria-label="Email"
                                            value="{{ auth()->guard('families')->user()->email }}" >
                                    </div>
                                </div>
                                <!-- End Form -->

                                <!-- Form -->
                                <div class="row mb-4">
                                    <label for="phoneLabel" class="col-sm-3 col-form-label form-label">Phone
                                        <span class="form-label-secondary"></span></label>

                                    <div class="col-sm-9">
                                        <input type="text" class="js-input-mask form-control" name="phone"
                                            id="phoneLabel" placeholder="+x(xxx)xxx-xx-xx" aria-label="+x(xxx)xxx-xx-xx"
                                            value="{{ auth()->guard('families')->user()->phone }}"
                                            data-hs-mask-options='{
                                   "mask": "+0(000)000-00-00"
                                 }'>
                                    </div>
                                </div>
                                <!-- End Form -->


                                <link rel="stylesheet" href="{{ asset('vendor/tom-select/dist/css/tom-select.bootstrap5.css') }}">
                                <!-- Select -->
                                <div class="row mb-4">
                                    <label for="phoneLabel" class="col-sm-3 col-form-label form-label">City
                                        <span class="form-label-secondary"></span></label>
                                        <div class="col-sm-9">
                                <div class="tom-select-custom">
                                    <select class="js-select form-select" name="city" autocomplete="off"
                                        data-hs-tom-select-options='{
            "searchInDropdown": false,
            "hidePlaceholderOnSearch": true,
            "placeholder": "Select a city..."
          }'>
                                        <option value="">Select a city...</option>
                                        @foreach($cities as $city)
                                                                             <option value="{{$city->title}}" @if($city->title ==Auth::guard('families')->user()->city) selected @endif>{{$city->title}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End Select -->



                        <!-- Select -->
                        <div class="row mb-4">
                            <label for="phoneLabel" class="col-sm-3 col-form-label form-label">Category
                                <span class="form-label-secondary"></span></label>
                                <div class="col-sm-9">
                        <div class="tom-select-custom">
                            <select class="js-select form-select" autocomplete="off" name="category"
                                data-hs-tom-select-options='{
    "searchInDropdown": false,
    "hidePlaceholderOnSearch": true,
    "placeholder": "Select a person..."
  }'>
                                @foreach($categories as $category)
                                                                             <option value="{{$category->title}}" @if($category->title ==Auth::guard('families')->user()->category) selected @endif>{{$category->title}}</option>

                                        @endforeach
                              
                            </select>
                        </div>
                    </div>
                </div>
                <!-- End Select -->





                        <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                <!-- End Form -->
                            </div>
                            <!-- End Body -->
                        </div>


                        </form>


                        <!-- Card -->
                        <div id="passwordSection" class="card">
                            <div class="card-header">
                                <h4 class="card-title">Change your password</h4>
                            </div>

                            <!-- Body -->
                            <div class="card-body">
                                <!-- Form -->
                                <form id="changePasswordForm" action="{{ route('family.settings_pass_update') }}" method="POST">
                                    @csrf

                                    <!-- Form -->
                                    <div class="row mb-4">
                                        <label for="newPassword" class="col-sm-3 col-form-label form-label">New
                                            password</label>

                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="password"
                                                id="newPassword" placeholder="Enter new password"
                                                aria-label="Enter new password">
                                        </div>
                                    </div>
                                    <!-- End Form -->


                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                                <!-- End Form -->
                            </div>
                            <!-- End Body -->
                        </div>
                        <!-- End Card -->

                    </div>

                    <!-- Sticky Block End Point -->
                    <div id="stickyBlockEndPoint"></div>
                </div>
                </div>
                <!-- End Row -->
                </div>
                <!-- End Content -->


            </main>
        @endsection
    </x-family>
@else
    <meta http-equiv="refresh" content="0; url=/family/login">
@endif
