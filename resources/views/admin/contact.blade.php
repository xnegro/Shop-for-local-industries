<x-admin>
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
                                                    <p>{{ $db->msg }}</p>
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
                                                                    <span class="card-subtitle">Sender:</span>
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

                                                        <!-- List Item -->
                                                        <div class="list-group-item">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <span class="card-subtitle">Receiver:</span>
                                                                </div>
                                                                <!-- End Col -->
                                                                @foreach ($families as $item)
                                                                    <div class="col-auto">
                                                                        <a class="badge bg-soft-primary text-primary p-2"
                                                                            href="#">
                                                                            @if ($item->id == $db->family_id)
                                                                                {{ $item->email }}
                                                                            @endif
                                                                        </a>
                                                                        <br>
                                                                        <br>
                                                                        <a class="badge bg-soft-info text-info p-2"
                                                                            href="#">
                                                                            @if ($item->id == $db->family_id)
                                                                                {{ $item->name }}
                                                                            @endif
                                                                        </a>
                                                                        <a class="badge bg-soft-info text-info p-2"
                                                                            href="#">
                                                                            @if ($item->id == $db->family_id)
                                                                                {{ $item->phone }}
                                                                            @endif
                                                                        </a>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <!-- End List Item -->

                                                        <!-- List Item -->
                                                        <div class="list-group-item">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <span class="card-subtitle">Replay:</span>
                                                                </div>
                                                                <!-- End Col -->
                                                                <div class="col-auto">
                                                                    <a class="badge bg-soft-info text-info p-2"
                                                                        href="#">{{ $db->replay }}</a>

                                                                </div>
                                                            </div>
                                                            <!-- End List Item -->
                                                            <!-- End Form -->
                                                            <!-- End List Item -->
                                                        </div>
                                                    </div>
                                                    <!-- End Footer -->
                                                </div>
                                                <!-- End Card -->
                                            </div>
                                        </div>
                                    @endforeach
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
</x-admin>
