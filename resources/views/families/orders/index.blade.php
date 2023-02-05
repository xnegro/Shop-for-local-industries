<x-family>
    @section('content')
        <main id="content" role="main" class="main">
            <!-- Content -->
            <div class="content container-fluid">
                <!-- Page Header -->
                <div class="page-header d-print-none">
                    <div class="row align-items-center">
                        <div class="col-sm mb-2 mb-sm-0">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-no-gutter">
                                    <li class="breadcrumb-item active" aria-current="page">Order details</li>
                                </ol>
                            </nav>

                            <div class="d-sm-flex align-items-sm-center">
                                <h1 class="page-header-title">Order #{{ $id->id }}</h1>

                            </div>

                            <div class="mt-2">
                                <div class="d-flex gap-2">

                                    <!-- Dropdown -->
                                    <div class="dropdown">
                                        <a class="text-body" href="javascript:;" id="moreOptionsDropdown"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            More options <i class="bi-chevron-down"></i>
                                        </a>

                                        <div class="dropdown-menu mt-1" aria-labelledby="moreOptionsDropdown">

                                            @if ($id->status == 'pending')
                                                <a class="dropdown-item" href="/family/request/{{ $id->id }}/cancel">
                                                    <i class="bi-x dropdown-item-icon"></i> Cancel order
                                                </a>
                                                <a class="dropdown-item"
                                                    href="/family/request/{{ $id->id }}/completed">
                                                    <i class="bi-check dropdown-item-icon"></i> Completed order
                                                </a>
                                            @endif
                                            <a class="dropdown-item" href="/family/request/{{ $id->id }}/delete">
                                                <i class="bi-trash dropdown-item-icon"></i> Delete order
                                            </a>


                                        </div>
                                    </div>
                                    <!-- End Dropdown -->
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Page Header -->

                <div class="row">
                    <div class="col-lg-8 mb-3 mb-lg-0">
                        <!-- Card -->
                        <div class="card mb-3 mb-lg-5">
                            <!-- Header -->
                            <div class="card-header card-header-content-between">
                                <h4 class="card-header-title">Order details </h4>
                            </div>
                            <!-- End Header -->

                            <!-- Body -->
                            <div class="card-body">
                                <!-- Media -->
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-xl">
                                            @foreach ($products as $product)
                                                @if ($product->id == $id->product_id)
                                                    <img class="img-fluid" src="{{ $product->img }}"
                                                        alt="Image Description">
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    @foreach ($products as $product)
                                        @if ($product->id == $id->product_id)
                                            <div class="flex-grow-1 ms-3">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3 mb-md-0">
                                                        <a class="h5 d-block">{{ $product->title }}</a>

                                                    </div>
                                                    <!-- End Col -->

                                                    <div class="col col-md-2 align-self-center">
                                                        <h5>SAR {{ number_format($product->price) }} </h5>
                                                    </div>
                                                    <!-- End Col -->

                                                    <div class="col col-md-2 align-self-center">
                                                        <h5>{{ number_format($id->amount) }}</h5>
                                                    </div>
                                                    <!-- End Col -->

                                                    <div class="col col-md-2 align-self-center text-end">
                                                        <h5>SAR {{ number_format($product->price * $id->amount) }}</h5>
                                                    </div>
                                                    <!-- End Col -->
                                                </div>
                                                <!-- End Row -->
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                                <!-- End Media -->

                                <hr>


                                <!-- End Row -->
                            </div>
                            <!-- End Body -->
                        </div>
                        <!-- End Card -->


                    </div>

                    <div class="col-lg-4">
                        <!-- Card -->
                        <div class="card">
                            <!-- Header -->
                            <div class="card-header">
                                <h4 class="card-header-title">Customer</h4>
                            </div>
                            <!-- End Header -->

                            <!-- Body -->
                            <div class="card-body">
                                <!-- List Group -->
                                <ul class="list-group list-group-flush list-group-no-gutters">
                                    <li class="list-group-item">
                                        <a class="d-flex align-items-center">

                                            <div class="flex-grow-1 ms-3">
                                                <span class="text-body text-inherit">{{ $id->username }}</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5>Contact info</h5>
                                        </div>

                                        <ul class="list-unstyled list-py-2 text-body">
                                            <li><i class="bi-at me-2"></i>
                                                @foreach ($users as $user)
                                                    @if ($user->id == $id->user_id)
                                                        {{ $user->email }}
                                                    @endif
                                                @endforeach
                                            </li>
                                            <li><i class="bi-phone me-2"></i>{{ $id->phone }}</li>
                                        </ul>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5>Shipping address</h5>
                                        </div>

                                        <span class="d-block text-body">
                                            @foreach ($users as $user)
                                                @if ($user->id == $id->user_id)
                                                    {{ $user->city }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5>Billing </h5>
                                        </div>

                                        <span class="d-block text-body">
                                            COD<br>
                                        </span>

                                    </li>
                                </ul>
                                <!-- End List Group -->
                            </div>
                            <!-- End Body -->
                        </div>
                        <!-- End Card -->
                    </div>
                </div>
                <!-- End Row -->
            </div>
            <!-- End Content -->


        </main>
        <!-- ========== END MAIN CONTENT ========== -->
    @endsection
</x-family>
