<x-app-layout>
    @section('content')
        <main id="content" role="main" class="main">
            <!-- Content -->
            <div class="content container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-sm mb-2 mb-sm-0">


                            <h1 class="page-header-title">Orders</h1>
                        </div>
                        <!-- End Col -->


                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Page Header -->
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
                                <div class="input-group input-group-merge input-group-flush">
                                    <div class="input-group-prepend input-group-text">
                                        <i class="bi-search"></i>
                                    </div>
                                    <input id="datatableSearch" type="search" class="form-control"
                                        placeholder="Search Orders" aria-label="Search users">
                                </div>
                                <!-- End Search -->
                            </form>
                        </div>

                    </div>
                    <!-- End Header -->

                    <!-- Table -->
                    <div class="table-responsive datatable-custom position-relative">
                        <table id="datatable"
                            class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                            data-hs-datatables-options='{
                   "columnDefs": [{
                      "targets": [0, 6],
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
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="datatableCheckAll">
                                            <label class="form-check-label" for="datatableCheckAll"></label>
                                        </div>
                                    </th>
                                    <th class="table-column-ps-0">Name</th>
                                    <th>Family</th>
                                    <th>Amount</th>

                                    <th>Price</th>
                                    <th>Status</th>

                                    <th>Control</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="table-column-pe-0">
                                        </td>
                                        <td class="table-column-ps-0">
                                            <a class="d-flex align-items-center">
                                                <div class="avatar avatar-circle">
                                                    @foreach ($products as $product)
                                                        <img class="avatar-img"
                                                            src="@if ($product->id == $order->product_id) {{ asset($product->img) }} @endif"
                                                            alt="Image Description">
                                                    @endforeach
                                                </div>
                                                <div class="ms-3">
                                                    <span class="d-block h5 text-inherit mb-0"><i
                                                            class="bi-patch-check-fill text-primary"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Top endorsed"></i>
                                                        @foreach ($products as $product)
                                                            @if ($product->id == $order->product_id)
                                                                {{ $product->title }}
                                                            @endif
                                                        @endforeach

                                                    </span>
                                                    <span class="d-block fs-5 text-body"></span>
                                                </div>
                                            </a>
                                        </td>
                                        <td>
                                            <span class="d-block h5 mb-0">
                                                @foreach ($families as $family)
                                                    @if ($family->id == $order->family_id)
                                                        {{ $family->name }}
                                                    @endif
                                                @endforeach
                                            </span>
                                        </td>
                                        <td>{{ $order->amount }}</td>
                                        <td>
                                            SAR {{ number_format($order->price) }}
                                        </td>

                                        <td>
                                            {{ $order->status }}
                                        </td>

                                        <td>

                                            <button type="button" class="btn btn-danger btn-sm"
                                                onclick="location.href='/customer/order/{{ $order->id }}/delete';">
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
                                            <option value="10">10</option>
                                            <option value="15" selected>15</option>
                                            <option value="20">20</option>
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
</x-app-layout>
