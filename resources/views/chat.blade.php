<x-app-layout>
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
                                    <li class="breadcrumb-item"><a class="breadcrumb-link"
                                            href="">Contact</a></li>
                                </ol>
                            </nav>

                            <h1 class="page-header-title">Send Message</h1>


                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
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
                            <div class="card-header">
                                <h4 class="card-header-title">Message information</h4>
                            </div>
                            <!-- End Header -->

                            <!-- Body -->
                            <form action="/chat/store" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="card-body">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label for="productNameLabel" class="form-label">Title <i
                                                class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Products are the goods or services you sell."></i></label>

                                        <input type="text" class="form-control" name="title" id="productNameLabel"
                                            placeholder="Facebook Posts,etc." aria-label="I need...">
                                    </div>
                                    <!-- End Form -->

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- Form -->
                                            <div class="mb-4">
                                                <label for="SKULabel" class="form-label">Family</label>
                                                <link rel="stylesheet"
                                                    href="/assets/vendor/tom-select/dist/css/tom-select.bootstrap5.css">
                                                <!-- Select -->
                                                <div class="tom-select-custom">
                                                    <select class="js-select form-select" name="family_id"
                                                        autocomplete="off"
                                                        data-hs-tom-select-options='{
            "placeholder": "Select family..."
          }'>
                                                        <option value="">Select a service...</option>
                                    @foreach($families as $familiy)
                                                                                            <option value="{{$familiy->id}}">{{$familiy->name}}</option>

                                    @endforeach

                                                    </select>
                                                </div>
                                                <!-- End Select -->

                                            </div>
                                            <!-- End Form -->
                                        </div>
                                        <!-- End Col -->

                                        <div class="col-sm-6">
                                            <!-- Form -->
                                            <div class="mb-4">
                                                <label for="weightLabel" class="form-label">Subject</label>

                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="subject"
                                                        id="weightLabel" placeholder="About?" aria-label="0.0">

                                                    <div class="input-group-append">

                                                    </div>
                                                </div>

                                            </div>
                                            <!-- End Form -->
                                        </div>
                                        <!-- End Col -->
                                    </div>
                                    <!-- End Row -->



                                    <label class="form-label">Description <span class="form-label-secondary"></span></label>
                                    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>

                                    <!-- Quill -->
                                    <textarea name="msg" id="editor" cols="30" rows="10" maxlength="50"></textarea>

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

                            <button type="submit" class="btn btn-primary">Submit</button>

                                    <!-- End Quill -->
                                </div>
                                <!-- Body -->
                        </div>
                        <!-- End Card -->

                        </form>

                    </div>
                    <!-- Body -->
                </div>
                <!-- End Card -->
            </div>
            <!-- End Col -->


            <!-- End Col -->
            </div>
            <!-- End Row -->


            </div>
            <!-- End Content -->


            <div class="footer">
                <div class="row justify-content-between align-items-center">
                    <div class="col">
                        <p class="fs-6 mb-0">&copy; Front. <span class="d-none d-sm-inline-block">2022 Htmlstream.</span>
                        </p>
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
    @endsection
</x-app-layout>
