<x-admin>
    @section('content')
        <main id="content" role="main" class="main">
            <!-- Content -->
            <div class="content container-fluid">
                <div class="row justify-content-lg-center">
                    <div class="col-lg-10">

                        <!-- Nav -->
                        <div class="js-nav-scroller hs-nav-scroller-horizontal mb-5">
                            <span class="hs-nav-scroller-arrow-prev" style="display: none;">
                                <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                                    <i class="bi-chevron-left"></i>
                                </a>
                            </span>

                            <span class="hs-nav-scroller-arrow-next" style="display: none;">
                                <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                                    <i class="bi-chevron-right"></i>
                                </a>
                            </span>

                            <ul class="nav nav-tabs align-items-center">


                                <li class="nav-item ms-auto">
                                    <div class="d-flex gap-2">
                                        <!-- Form Check -->
                                        <div class="form-check form-check-switch">
                                            <button type="submit" class="btn btn-primary"
                                                onclick="location.href='/admin/category/new';">New Category</button>
                                        </div>
                                        <!-- End Form Check -->


                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- End Nav -->

                        <!-- Filter -->
                        <div class="row align-items-center mb-5">
                            <div class="col">
                                <h3 class="mb-0">Categories</h3>
                            </div>
                            <!-- End Col -->

                            <!-- End Col -->
                        </div>
                        <!-- End Filter -->

                        <!-- Tab Content -->
                        <div class="tab-content" id="connectionsTabContent">
                            <div class="tab-pane fade show active" id="grid" role="tabpanel"
                                aria-labelledby="grid-tab">
                                <!-- Connections -->
                                @if (Session::has('message'))
                                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                                        {{ Session::get('message') }}</p>
                                @endif

                                <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3">
                                    @foreach ($categories as $db)
                                        <div class="col mb-3 mb-lg-5">
                                            <!-- Card -->
                                            <div class="card h-100">


                                                <!-- Body -->
                                                <div class="card-body text-center">


                                                    <h3 class="mb-1">
                                                        <a class="text-dark" href="#">{{ $db->title }}</a>
                                                    </h3>


                                                </div>
                                                <!-- End Body -->

                                                <!-- Footer -->
                                                <div class="card-footer">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto py-1">
                                                            <button type="submit"
                                                                onclick="location.href='/admin/category/{{ $db->id }}/delete'"
                                                                class="btn btn-danger">Delete</button>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- End Footer -->
                                            </div>
                                            <!-- End Card -->
                                        </div>
                                    @endforeach
                                    <!-- End Col -->
                                </div>
                            </div>
                            <!-- End Connections -->
                        </div>

                    </div>
                    <!-- End Tab Content -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
            </div>
            <!-- End Content -->

            <!-- Footer -->


            <!-- End Footer -->
        </main>
    @endsection
</x-admin>
