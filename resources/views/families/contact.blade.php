<x-family>
    @section('content')
        <main id="content" role="main" class="main">
            <!-- Content -->
            <div class="content container-fluid">
                <div class="row justify-content-lg-center">
                    <div class="col-lg-10">
                        <!-- Tab Content -->
                        <div class="tab-content" id="profileTeamsTabContent">
                            <div class="tab-pane fade show active" id="grid" role="tabpanel" aria-labelledby="grid-tab">
                                <!-- Teams -->
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3">
                                    @foreach ($dbs as $db)
                                        <div class="col mb-3 mb-lg-5">
                                            <!-- Card -->
                                            <div class="card h-100">
                                                <!-- Body -->
                                                <div class="card-body pb-0">
                                                    <div class="row align-items-center mb-2">
                                                        <div class="col-9">
                                                            <h4 class="mb-1">
                                                                <a href="#">#{{ $db->title }}</a>
                                                            </h4>
                                                        </div>
                                                        <!-- End Col -->
                                                    </div>
                                                    <!-- End Row -->
                                                    <p>{!! $db->msg !!}</p>
                                                </div>
                                                <!-- End Body -->
                                                <!-- Footer -->
                                                <div class="card-footer border-0 pt-0">
                                                    <div class="list-group list-group-flush list-group-no-gutters">
                                                        <!-- List Item -->
                                                        <div class="list-group-item">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <span class="card-subtitle">Subject:</span>
                                                                </div>
                                                                <!-- End Col -->
                                                                <div class="col-auto">
                                                                    <a class="badge bg-soft-danger text-danger p-2"
                                                                        href="#">{{ $db->subject }}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End List Item -->
                                                        <!-- List Item -->
                                                        <div class="list-group-item">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <span class="card-subtitle">Details:</span>
                                                                </div>
                                                                <!-- End Col -->
                                                                <div class="col-auto">
                                                                    <a class="badge bg-soft-primary text-primary p-2"
                                                                        href="#">{{ $db->email }}</a>
                                                                    <br>
                                                                    <br>
                                                                    <a class="badge bg-soft-info text-info p-2"
                                                                        href="#">{{ $db->username }}</a>
                                                                    <a class="badge bg-soft-info text-info p-2"
                                                                        href="#">{{ $db->phone }}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End List Item -->
                                                        <form action="/family/msg/{{ $db->id }}/update"
                                                            method="post">
                                                            @csrf
                                                            @if ($db->status == 0)
                                                                <div class="col-md-9"
                                                                    style="    margin: 0 auto;
                                             ">
                                                                    <input type="text" class="form-control"
                                                                        name="replay" style="margin-top:8px"
                                                                        id="newPassword" placeholder="Enter new Replay"
                                                                        aria-label="Replay">
                                                                </div>
                                                                <div class="d-flex justify-content-end"
                                                                    style="margin-top:8px">
                                                                    <button
                                                                        style="    margin: 0 auto;
                                                "
                                                                        type="submit" class="btn btn-primary">Send</button>
                                                                </div>
                                                            @else
                                                                <!-- End Col -->
                                                                <div class="list-group-item">
                                                                    <div class="row align-items-center">
                                                                        <div class="col">
                                                                            <span class="card-subtitle">Replay:</span>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <a class="badge bg-soft-primary text-primary p-2"
                                                                                href="#">{{ $db->replay }}</a>
                                                                            <br>
                                                                            <br>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </form>
                                                        <!-- End Form -->
                                                        <!-- End List Item -->
                                                    </div>
                                                </div>
                                                <!-- End Footer -->
                                            </div>
                                            <!-- End Card -->
                                        </div>
                                    @endforeach
                                </div>
                                <!-- End Teams -->
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
</x-family>
