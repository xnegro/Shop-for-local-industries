<x-app-layout>
    @section('content')

        <!-- End Navbar Vertical -->
        @if (auth()->user()->city == null)
            <div id="exampleModalTopCover" class="modal fade show" tabindex="-1" role="dialog" aria-modal="true"
                style="display: block;">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <!-- Header -->
                        <div class="modal-top-cover bg-dark text-center">
                            <figure class="position-absolute end-0 bottom-0 start-0">
                                <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px"
                                    y="0px" viewBox="0 0 1920 100.1">
                                    <path fill="#fff" d="M0,0c0,0,934.4,93.4,1920,0v100.1H0L0,0z"></path>
                                </svg>
                            </figure>



                        </div>
                        <!-- End Header -->

                        <div class="modal-top-cover-icon">
                            <span class="icon icon-lg icon-light icon-circle icon-centered shadow-sm">
                                <i class="bi-receipt fs-2"></i>
                            </span>
                        </div>

                        <div class="modal-body">
                            <p>Now the last stage is choosing the city.</p>

                            <form action="/user/update" method="post">
                                @csrf

                                <!-- Select -->
                                <div class="tom-select-custom">
                                    <select name="city" class="js-select form-select" autocomplete="off"
                                        data-hs-tom-select-options='{
            "placeholder": "Select city..."
          }'>
                                        <option value="">Select a city...</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->title }}">{{ $city->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- End Select -->

                                <br>
                                <button type="submit" class="btn btn-primary">Update</button>


                            </form>

                        </div>


                    </div>
                </div>
            </div>
        @else
            <main id="content" role="main" class="main">
                <!-- Content -->
                <div class="content container-fluid">
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h1 class="page-header-title">Dashboard</h1>
                            </div>
                            @if (Session::has('message'))
                                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                                    {{ Session::get('message') }}</p>
                            @endif

                            <!-- End Col -->
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Page Header -->

                    <!-- Stats -->
                    <div class="row">
                        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                            <!-- Card -->
                            <a class="card card-hover-shadow h-100" href="#">
                                <div class="card-body">
                                    <h6 class="card-subtitle">Total Orders</h6>
                                    <script src="{{ asset('dashboard/vendor/appear/dist/appear.min.js') }}"></script>
                                    <script src="{{ asset('dashboard/vendor/hs-counter/dist/hs-counter.min.js') }}"></script>

                                    <div class="row align-items-center gx-2 mb-1">
                                        <div class="col-6">
                                            <h2 class="card-title text-inherit js-counter ">{{ $requests }}</h2>
                                        </div>
                                        <!-- End Col -->

                                        <div class="col-6">
                                        </div>
                                        <!-- End Col -->
                                    </div>
                                    <!-- End Row -->

                                </div>
                            </a>
                            <!-- End Card -->
                        </div>

                        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                            <!-- Card -->
                            <a class="card card-hover-shadow h-100" href="#">
                                <div class="card-body">
                                    <h6 class="card-subtitle">Total Contacts</h6>

                                    <div class="row align-items-center gx-2 mb-1">
                                        <div class="col-6">
                                            <h2 class="card-title text-inherit  js-counter">{{ $contacts }}</h2>
                                        </div>
                                        <!-- End Col -->

                                        <div class="col-6">
                                        </div>
                                        <!-- End Col -->
                                    </div>
                                    <!-- End Row -->

                                </div>
                            </a>
                            <!-- End Card -->
                        </div>

                    </div>
                    <!-- End Stats -->



                </div>
                <!-- End Content -->


            </main>
            <!-- ========== END MAIN CONTENT ========== -->
        @endif
    @endsection

</x-app-layout>
