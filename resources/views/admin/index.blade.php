<x-admin>

    @section('content')
        <main id="content" role="main" class="main">
            <!-- Content -->
            <div class="content container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h1 class="page-header-title">Dashboard</h1>
                        </div>

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
                                <h6 class="card-subtitle">Total Products</h6>

                                <div class="row align-items-center gx-2 mb-1">
                                    <div class="col-6">
                                        <h2 class="card-title text-inherit js-counter">{{ $products_count }}</h2>
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
                                <h6 class="card-subtitle">Total Orders</h6>

                                <div class="row align-items-center gx-2 mb-1">
                                    <div class="col-6">
                                        <h2 class="card-title text-inherit js-counter">{{ $requests_count }}</h2>
                                    </div>

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
                                <h6 class="card-subtitle">Total Customers</h6>

                                <div class="row align-items-center gx-2 mb-1">
                                    <div class="col-6">
                                        <h2 class="card-title text-inherit js-counter">{{ $customers_count }}</h2>
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
                                <h6 class="card-subtitle">Total Families</h6>

                                <div class="row align-items-center gx-2 mb-1">
                                    <div class="col-6">
                                        <h2 class="card-title text-inherit js-counter">{{ $families_count }}</h2>
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
                @if (Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif


                <!-- Card -->
                <div class="card mb-3 mb-lg-5">
                    <!-- Header -->
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center flex-grow-1">
                            <div class="col-md">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="card-header-title">Orders</h4>

                                </div>
                            </div>
                            <!-- End Col -->

                            <div class="col-auto">
                                <!-- Filter -->
                                <div class="row align-items-sm-center">
                                    <div class="col-sm-auto">
                                        <div class="row align-items-center gx-0">
                                            <div class="col">
                                                <span class="text-secondary me-2">Status:</span>
                                            </div>
                                            <!-- End Col -->

                                            <div class="col-auto">
                                                <!-- Select -->
                                                <div class="tom-select-custom tom-select-custom-end">
                                                    <select
                                                        class="js-select js-datatable-filter form-select form-select-sm form-select-borderless"
                                                        data-target-column-index="2" data-target-table="datatable"
                                                        autocomplete="off"
                                                        data-hs-tom-select-options='{
                                      "searchInDropdown": false,
                                      "hideSearch": true,
                                      "dropdownWidth": "10rem"
                                    }'>
                                                        <option value="null" selected>All</option>

                                                        <option value="successful">Successful</option>
                                                        <option value="pending">Pending</option>
                                                        <option value="canceled">Canceled</option>
                                                    </select>
                                                </div>
                                                <!-- End Select -->
                                            </div>
                                            <!-- End Col -->
                                        </div>
                                        <!-- End Row -->
                                    </div>


                                    <div class="col-md">
                                        <form>
                                            <!-- Search -->
                                            <div class="input-group input-group-merge input-group-flush">
                                                <div class="input-group-prepend input-group-text">
                                                    <i class="bi-search"></i>
                                                </div>
                                                <input id="datatableSearch" type="search" class="form-control"
                                                    placeholder="Search users" aria-label="Search users">
                                            </div>
                                            <!-- End Search -->
                                        </form>
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Filter -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Header -->

                    <!-- Table -->
                    <div class="table-responsive datatable-custom">
                        <table id="datatable"
                            class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                            data-hs-datatables-options='{
                       "columnDefs": [{
                          "targets": [0, 1, 4],
                          "orderable": false
                        }],
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
                                    <th scope="col" class="table-column-pe-0">
                                        <div class="form-check">
                                            {{--  <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll">  --}}
                                            {{--  <label class="form-check-label" for="datatableCheckAll"></label>  --}}
                                        </div>
                                    </th>
                                    <th class="table-column-ps-0">Full name</th>
                                    <th>Status</th>
                                    <th>Phone</th>
                                    <th>Amount</th>
                                    <th>Price</th>
                                    <th>Created at</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($requests as $item)
                                    <tr>
                                        <td class="table-column-pe-0">
                                        </td>
                                        <td class="table-column-ps-0">
                                            <a class="d-flex align-items-center"
                                                href="/admin/request/{{ $item->id }}/details">
                                                <div class="flex-shrink-0">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h5 class="text-inherit mb-0">{{ $item->username }}
                                                        @if ($item->status == 'successful')
                                                            <i class="bi-patch-check-fill text-primary"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Top endorsed"></i>
                                                    </h5>
                                @endif
                    </div>
                    </a>
                    </td>
                    <td>
                        @if ($item->status == 'pending')
                            <span class="legend-indicator bg-warning"></span>{{ $item->status }}
                        @elseif ($item->status == 'successful')
                            <span class="legend-indicator bg-success"></span>{{ $item->status }}
                        @else
                            <span class="legend-indicator bg-danger"></span>{{ $item->status }}
                        @endif
                    </td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ number_format($item->amount) }}</td>
                    <td> {{ number_format($item->price) }}</td>
                    <td>
                        {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}

                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
                <!-- End Table -->

                <!-- Footer -->
                <div class="card-footer">
                    <!-- Pagination -->
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
                    <!-- End Pagination -->
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
