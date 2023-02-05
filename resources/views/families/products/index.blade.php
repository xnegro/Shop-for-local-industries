@if (Auth::guard('families')->check())
    <x-family>
        @section('content')
            <main id="content" role="main" class="main">
                <!-- Content -->
                <div class="content container-fluid">
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row align-items-center mb-3">
                            <div class="col-sm mb-2 mb-sm-0">
                                <h1 class="page-header-title">Products </h1>


                            </div>
                            <!-- End Col -->

                            <div class="col-sm-auto">
                                <a class="btn btn-primary" href="{{ route('family.products_new') }}">Add product</a>
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        <!-- Nav Scroller -->
                        <div class="js-nav-scroller hs-nav-scroller-horizontal">
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

                            <!-- Nav -->
                            <ul class="nav nav-tabs page-header-tabs" id="pageHeaderTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">All products</a>
                                </li>

                            </ul>


                            <!-- End Nav -->
                        </div>
                        <!-- End Nav Scroller -->
                    </div>
                    <!-- End Page Header -->


                </div>
                <!-- Card -->
                <div class="card">
                    <!-- Header -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- End Header -->

                    <!-- Table -->
                    <div class="table-responsive datatable-custom position-relative">
                        <table id="datatable"
                            class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                            data-hs-datatables-options='{
                 "columnDefs": [{
                    "targets": [0, 7],
                    "orderable": false
                  }],
                 "order": [],
                 "info": {
                   "totalQty": "#datatableWithPaginationInfoTotalQty"
                 },
                 "search": "#datatableSearch",
                 "entries": "#datatableEntries",
                 "pageLength": 15,
                 "isResponsive": false,
                 "isShowPaging": false,
                 "pagination": "datatablePagination"
               }'>
                            <thead class="thead-light">
                                <tr>
                                    <th class="table-column-pe-0">
                                    </th>
                                    <th class="table-column-ps-0">Name</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Amount</th>
                                    <th>Availability</th>
                                    <th>Status</th>

                                    <th>Control</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($products as $product)
                                    <tr>
                                        <td class="table-column-pe-0">
                                            <div class="form-check">
                                                <label class="form-check-label" for="datatableCheckAll1"></label>
                                            </div>
                                        </td>
                                        <td class="table-column-ps-0">
                                            <a class="d-flex align-items-center">
                                                <div class="avatar avatar-circle">
                                                    <img class="avatar-img" src="{{ asset($product->img) }}"
                                                        alt="Image Description">
                                                </div>
                                                <div class="ms-3">
                                                    <span class="d-block h5 text-inherit mb-0">{{ $product->title }} <i
                                                            class="bi-patch-check-fill text-primary"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Top endorsed"></i></span>
                                                </div>
                                            </a>
                                        </td>
                                        <td>
                                            <span class="d-block h5 mb-0">SAR {{ $product->price }}</span>
                                        </td>

                                        <td>
                                            <span class="legend-indicator bg-warning"></span>{{ $product->category }}
                                        </td>

                                        <td>
                                            <span class="legend-indicator bg-success"></span>{{ $product->amount }}
                                        </td>

                                        <td>
                                            @if ($product->in_stock == 'on')
                                                <span class="legend-indicator bg-success"></span>{{ $product->in_stock }}
                                            @else
                                                <span class="legend-indicator "></span>{{ $product->in_stock }}
                                            @endif
                                        </td>

                                        <td>
                                            @if ($product->status == 'draft')
                                                <span class="legend-indicator "></span>Not Active
                                            @else
                                                <span class="legend-indicator bg-success"></span>Active
                                            @endif
                                        </td>


                                        <td>
                                            <button type="button" class="btn btn-white btn-sm"
                                                onclick="location.href='/family/product/{{ $product->id }}/edit'">
                                                <i class="bi-pencil-fill me-1"></i> Edit
                                            </button>

                                            <button type="button" class="btn btn-danger btn-sm"
                                                onclick="location.href='/family/product/{{ $product->id }}/delete'">
                                                <i class="bi-pencil-fill me-1"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- End Table -->

                </div>
                <!-- End Card -->

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
                                        <option value="12">12</option>
                                        <option value="14" selected>14</option>
                                        <option value="16">16</option>
                                        <option value="18">18</option>
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

                <!-- Footer -->


                <!-- End Footer -->
            </main>
        @endsection
    </x-family>
@else
    <meta http-equiv="refresh" content="0; url=/family/login">
@endif
