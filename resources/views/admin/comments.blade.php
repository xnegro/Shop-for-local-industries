<x-admin>
    @section('content')
        <main id="content" role="main" class="main">
            <!-- Content -->
            <div class="content container-fluid">
                <!-- Page Header -->
                @if (Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif


                <!-- Card -->
                <div class="card">
                    <!-- Header -->
                    <div class="card-header card-header-content-md-between">
                        <div class="mb-2 mb-md-0">
                            <form>
                                <!-- Search -->
                                <div class="input-group input-group-merge input-group-borderless">
                                    <div class="input-group-prepend input-group-text">
                                        <i class="bi-search"></i>
                                    </div>
                                    <input id="datatableSearch" type="search" class="form-control"
                                        placeholder="Search Comments" aria-label="Search users">
                                </div>
                                <!-- End Search -->
                            </form>
                        </div>
                        <!-- End Col -->

                    </div>
                    <!-- End Header -->


                    <!-- Table -->
                    <div class="table-responsive datatable-custom">
                        <table id="datatable" class="table table-borderless table-thead-bordered card-table"
                            data-hs-datatables-options='{
                   "autoWidth": false,
                   "columnDefs": [{
                      "targets": [0, 4],
                      "orderable": false
                    }],
                   "columns": [
                      null,
                      null,
                      { "width": "35%" },
                      null,
                      null,
                      null,
                      null
                    ],
                   "order": [],
                   "info": {
                     "totalQty": "#datatableWithPaginationInfoTotalQty"
                   },
                   "search": "#datatableSearch",
                   "entries": "#datatableEntries",
                   "pageLength": 8,
                   "isResponsive": false,
                   "isShowPaging": false,
                   "pagination": "datatablePagination"
                 }'>
                            <thead class="thead-light">
                                <tr>
                                    <th></th>
                                    <th scope="col" class="table-column-ps-0">Product</th>
                                    <th scope="col" style="min-width: 20rem;">Description</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $comment)
                                    <tr>
                                        <td class="table-column-pe-0">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="teamDataCheck1">
                                                <label class="form-check-label" for="teamDataCheck1"></label>
                                            </div>
                                        </td>
                                        <td class="table-column-ps-0"># @foreach ($products as $product)
                                                @if ($product->id == $comment->product_id)
                                                    <a href="/product/{{ $product->id }}/view "> {{ $product->title }} </a>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ \Illuminate\Support\Str::limit($comment->msg, 150, $end = '...') }}</td>
                                        <td>
                                            {{ $comment->username }}
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm"
                                                onclick="location.href='/admin/comment/{{ $comment->id }}/delete';">
                                                <i class="bi-trash me-1"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table -->

                    <!-- Footer -->
                    <div class="card-footer">
                        <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                            <div class="col-sm mb-2 mb-sm-0">
                                <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                                    <span class="me-2">Showing:</span>

                                    <!-- Select -->
                                    <div class="tom-select-custom">
                                        <select id="datatableEntries"
                                            class="js-select form-select form-select-borderless w-auto" autocomplete="off"
                                            data-hs-tom-select-options='{
                            "searchInDropdown": false,
                            "hideSearch": true
                          }'>
                                            <option value="4">4</option>
                                            <option value="6">6</option>
                                            <option value="8" selected>8</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                    <!-- End Select -->

                                    <span class="text-secondary me-2">of</span>

                                    <!-- Pagination Quantity -->
                                    <span id="datatableWithPaginationInfoTotalQty"></span>
                                </div>
                            </div>
                            <!-- End Col -->

                            <div class="col-sm-auto">
                                <div class="d-flex justify-content-center justify-content-sm-end">
                                    <!-- Pagination -->
                                    <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                                </div>
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Footer -->
                </div>
                <!-- End Card -->
            </div>
            <!-- End Content -->


        </main>
        <!-- ========== END MAIN CONTENT ========== -->
    @endsection
</x-admin>
