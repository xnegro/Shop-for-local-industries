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

                                </li>
                            </ul>
                        </div>
                        <!-- End Nav -->
                        <form action="/admin/city/store" method="post">
                            @csrf

                            <div class="row">
                                <label class="col-sm-3 col-form-label">City</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="title" placeholder="City Name">
                                </div>

                            </div>
                            <br>
                            <div class="d-flex gap-2">
                                <!-- Form Check -->
                                <div class="form-check form-check-switch">
                                    <button type="submit" class="btn btn-primary"
                                        onclick="location.href='/admin/city/new';">Submit</button>
                                </div>
                                <!-- End Form Check -->


                            </div>
                        </form>
                    </div>

                    <!-- End Tab Content -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
            </div>
            <!-- End Content -->


        </main>
    @endsection
</x-admin>
