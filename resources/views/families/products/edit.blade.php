@if(Auth::guard('families')->check())

<x-family>

    @section('content')
        <main id="content" role="main" class="main">
            <!-- Content -->
            <div class="content container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col-sm mb-2 mb-sm-0">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-no-gutter">
                                    <li class="breadcrumb-item active" aria-current="page">Product details</li>
                                </ol>
                            </nav>

                            <h1 class="page-header-title">{{ $id->title }}</h1>

                        </div>
                        <!-- End Col -->

                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Page Header -->

                <div class="row">
                    <div class="col-lg-8">
                        <div class="card mb-3 mb-lg-5">
                            <!-- Header -->
                            <div class="card-header">
                                <form action="/family/product/{{ $id->id }}/update" method="post">
                                    @csrf
                                <!-- Card -->
                                <h4 class="card-header-title">Product information</h4>
                                </div>
                                <!-- End Header -->
                                <input type="text" hidden id="imghere" name="img" value="0">

                                <!-- Body -->
                                <div class="card-body">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label for="productNameLabel" class="form-label">Name <i
                                                class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Products are the goods or services you sell."></i></label>

                                        <input type="text" class="form-control" name="title" id="productNameLabel"
                                            placeholder="Shirt, t-shirts, etc." aria-label="Shirt, t-shirts, etc."
                                            value="{{ $id->title }}">
                                    </div>
                                    <!-- End Form -->

                                    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
                                    <label class="form-label">Description <span class="form-label-secondary"></span></label>

                                    <!-- Quill -->
                                    <textarea name="description" id="editor" cols="30" rows="10">{{ $id->description }}</textarea>
                                    <script>
                                        ClassicEditor
                                            .create(document.querySelector('#editor'), {
                                                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote',
                                                    'undo', 'redo'
                                                ],
                                                heading: {
                                                    options: [{
                                                            model: 'paragraph',
                                                            title: 'Paragraph',
                                                            class: 'ck-heading_paragraph'
                                                        },
                                                        {
                                                            model: 'heading1',
                                                            view: 'h1',
                                                            title: 'Heading 1',
                                                            class: 'ck-heading_heading1'
                                                        },
                                                        {
                                                            model: 'heading2',
                                                            view: 'h2',
                                                            title: 'Heading 2',
                                                            class: 'ck-heading_heading2'
                                                        }
                                                    ]
                                                }
                                            })
                                            .catch(error => {
                                                console.log(error);
                                            });
                                    </script>

                                    <!-- End Quill -->
                                </div>
                                <!-- Body -->
                            </div>
                            <!-- End Card -->


                            <!-- Card -->
                            <div class="js-add-field card mb-3 mb-lg-5"
                                data-hs-add-field-options='{
                "template": "#addVariantsTemplate",
                "container": "#addVariantsContainer",
                "defaultCreated": 0,
                "limit": 100
              }'>
                                <!-- Header -->
                                <div class="card-header card-header-content-sm-between">
                                    <h4 class="card-header-title mb-2 mb-sm-0"></h4>

                                    <div class="d-sm-flex align-items-center gap-2">
                                        <!-- Datatable Info -->

                                        <!-- End Datatable Info -->


                                    </div>
                                </div>
                                <!-- End Header -->

                                <!-- Table -->
                                <div class="table-responsive datatable-custom">
                                    <table id="datatable"
                                        class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                    </table>
                                </div>
                                <!-- End Table -->

                                <!-- Footer -->
                                <div class="card-footer">

                                </div>
                                <!-- End Footer -->

                                <!-- End Add Variants Field -->
                            </div>
                            <!-- End Card -->
                        </div>
                        <!-- End Col -->

                        <div class="col-lg-4">
                            <!-- Card -->
                            <div class="card mb-3 mb-lg-5">
                                <!-- Header -->
                                <div class="card-header">
                                    <h4 class="card-header-title">Pricing</h4>
                                </div>
                                <!-- End Header -->

                                <!-- Body -->
                                <div class="card-body">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label for="priceNameLabel" class="form-label">Price</label>

                                        <div class="input-group">
                                            <input type="text" class="form-control" name="price"
                                                id="priceNameLabel" placeholder="0.00" aria-label="0.00" value="{{ $id->price }}">

                                            <div class="input-group-append">
                                                <!-- Select -->
                                                <div class="tom-select-custom tom-select-custom-end">

                                                </div>
                                                <!-- End Select -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form -->


                                    <div class="mb-4">
                                        <label for="vendorLabel" class="form-label">Amount</label>

                                        <input type="text" class="form-control" name="amount" id="vendorLabel"
                                            placeholder="eg. Amount" value="{{ $id->amount }}">
                                    </div>


                                    <!-- Form -->
                                    <div class="mb-4">
                                      <label for="categoryLabel" class="form-label">Category</label>

                                      <!-- Select -->
                                      <div class="tom-select-custom">
                                        <select class="js-select form-select" name="category" autocomplete="off" id="categoryLabel" data-hs-tom-select-options='{
                                                  "searchInDropdown": false,
                                                  "hideSearch": true,
                                                  "placeholder": "Select category"
                                                }'>
                                          <option label="empty"></option>
                                        
                                         @foreach ($cates as $cate)
                                                <option @if($cate->title == $id->category)
selected
@endif value="{{ $cate->title }}">{{ $cate->title }}</option>
                                            @endforeach
                                        
                                        </select>
                                      </div>
                                      <!-- End Select -->
                                    </div>
                                    <!-- Form -->

                                    <!-- Form Switch -->
                                    <label class="row form-check form-switch" for="availabilitySwitch1">
                                      <span class="col-8 col-sm-9 ms-0">
                                        <span class="text-dark">Availability <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Product availability switch toggler."></i></span>
                                      </span>
                                      <span class="col-4 col-sm-3 text-end">
                                        @if ($id->status == "on")
                                        <input type="checkbox" class="form-check-input" name="status" id="availabilitySwitch1" checked>
                                            @else
                                        <input type="checkbox" class="form-check-input" name="status" id="availabilitySwitch1">

                                        @endif
                                    </span>
                                    </label>
                                    <!-- End Form Switch -->
                                    <div class="position-fixed start-50 bottom-0 translate-middle-x w-100 zi-99 mb-3"
                                        style="max-width: 40rem;">
                                        <!-- Card -->
                                        <div class="card card-sm bg-dark border-dark mx-2">
                                            <div class="card-body">
                                                <div class="row justify-content-center justify-content-sm-between">
                                                    <div class="col">
                                                        <a href="/family/products/all"
                                                            class="btn btn-ghost-danger">Discard</a>
                                                    </div>
                                                    <!-- End Col -->

                                                    <div class="col-auto">
                                                        <div class="d-flex gap-3">
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </div>
                                                    <!-- End Col -->
                                                </div>
                                                <!-- End Row -->
                                            </div>
                                        </div>
                                        <!-- End Card -->
                                    </div>

                                </div>


                                <!-- Body -->
                            </div>

                        </form>

                        <!-- Card -->
                        <div class="card mb-3 mb-lg-5">
                            <!-- Header -->
                            <div class="card-header card-header-content-between">
                                <h4 class="card-header-title">Media</h4>


                            </div>
                            <!-- End Header -->

                            <!-- Body -->
                            <div class="card-body">
                                <link rel="stylesheet"
                                    href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
                                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

                                <!-- Dropzone -->
                                <form action="{{ url('image/upload/store') }}" enctype="multipart/form-data"
                                    id="dropzone" class="dropzone" method="post">
                                    @csrf
                                    <div id="attachFilesNewProjectLabel"
                                        class="js-dropzone dz-dropzone dz-dropzone-card">
                                        <div class="dz-message">
                                            <img class="avatar avatar-xl avatar-4x3 mb-3"
                                                src="{{ asset('dashboard/svg/illustrations/oc-browse.svg') }}"
                                                alt="Image Description" data-hs-theme-appearance="default">
                                            <img class="avatar avatar-xl avatar-4x3 mb-3"
                                                src="{{ asset('dashboard/svg/illustrations-light/oc-browse.svg') }}"
                                                alt="Image Description" data-hs-theme-appearance="dark">

                                            <h5>Drag and drop your file here</h5>

                                            <p class="mb-2">or</p>

                                            <span class="btn btn-white btn-sm">Browse files</span>
                                        </div>
                                    </div>

                                </form>

                                <script type="text/javascript">
                                    Dropzone.options.dropzone = {
                                        maxFiles: 1,
                                        renameFile: function(file) {
                                            var dt = new Date();
                                            var time = dt.getTime();
                                            return time + file.name;
                                        },
                                        acceptedFiles: ".jpeg,.jpg,.png,.gif",
                                        addRemoveLinks: true,
                                        timeout: 50000,
                                        removedfile: function(file) {
                                            var name = file.upload.filename;
                                            $.ajax({
                                                headers: {
                                                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                                },
                                                type: 'POST',
                                                url: '{{ url('image/delete') }}',
                                                data: {
                                                    filename: name
                                                },
                                                success: function(data) {
                                                    console.log("File has been successfully removed!!");
                                                },
                                                error: function(e) {
                                                    console.log(e);
                                                }
                                            });
                                            var fileRef;
                                            return (fileRef = file.previewElement) != null ?
                                                fileRef.parentNode.removeChild(file.previewElement) : void 0;
                                        },

                                        success: function(file, response) {
                                            console.log(response);
                                            const obj = JSON.stringify(response);

                                            $('#imghere').val(response);
                                            {{--  console.log(obj.replace(/[^a-zA-Z ]/g, ""));  --}}


                                        },
                                        error: function(file, response) {
                                            return false;
                                        }
                                    };
                                </script>


                                <!-- End Dropzone -->
                            </div>
                            <!-- Body -->
                        </div>
                        <!-- End Card -->
                    </div>
                        <!-- End Col -->

                </div>
                    <!-- End Row -->


            </div>
            <!-- End Content -->

            <!-- Footer -->

            <div class="footer">
                <div class="row justify-content-between align-items-center">
                    <div class="col">
                        <p class="fs-6 mb-0">&copy; Front. <span class="d-none d-sm-inline-block">2022
                                Htmlstream.</span></p>
                    </div>
                    <!-- End Col -->

                    <div class="col-auto">
                        <div class="d-flex justify-content-end">
                            <!-- List Separator -->
                            <ul class="list-inline list-separator">
                                <li class="list-inline-item">
                                    <a class="list-separator-link" href="#">FAQ</a>
                                </li>

                                <li class="list-inline-item">
                                    <a class="list-separator-link" href="#">License</a>
                                </li>

                                <li class="list-inline-item">
                                    <!-- Keyboard Shortcuts Toggle -->
                                    <button class="btn btn-ghost-secondary btn btn-icon btn-ghost-secondary rounded-circle"
                                        type="button" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasKeyboardShortcuts"
                                        aria-controls="offcanvasKeyboardShortcuts">
                                        <i class="bi-command"></i>
                                    </button>
                                    <!-- End Keyboard Shortcuts Toggle -->
                                </li>
                            </ul>
                            <!-- End List Separator -->
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>

            <!-- End Footer -->
        </main>
        <!-- ========== END MAIN CONTENT ========== -->
    @endsection
</x-family>
@else
    <meta http-equiv="refresh" content="0; url=/family/login">
@endif
