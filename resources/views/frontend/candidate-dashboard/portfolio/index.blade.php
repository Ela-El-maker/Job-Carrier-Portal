@extends('frontend.layouts.master')
@section('contents')
    <style>
        .upload-file-btn {
            position: relative;
            overflow: hidden;
            background: #29b1fd;
            color: #f6f6f6;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 700;
            border-radius: 5px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .upload-file-btn input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }
    </style>
    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-header" style="padding-top: 200px;">
        <div class="container">

            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>Portfolio</h2>
                </div>
            </div>
            <!-- End of Page Title -->

            <!-- Start of Breadcrumb -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">home</a></li>
                        <li class="active">Candidate Portfolio Builder</li>
                    </ul>
                </div>
            </div>
            <!-- End of Breadcrumb -->

        </div>
    </section>
    <!-- =============== End of Page Header 1 Section =============== -->


    <!-- ===== Start of Main Wrapper Section ===== -->
    <section class="search-jobs ptb80" id="version2">
        <div class="container">
            <!-- Start of Row -->
            <div class="row">
                @include('frontend.candidate-dashboard.sidebar')
                <!-- ===== Start of Job Post Main ===== -->
                <div class="col-md-9 col-xs-12 job-post-main">
                    <h4>Welcome {{ auth()->user()->name }}!</h4>

                    <!-- Start of Job Post Wrapper -->
                    <!-- Start of Row -->
                    <div class="row">
                        <!-- Start of Product Wrapper -->
                        <div class="col-md-12 product-wrapper">



                            <!-- ===== Start of Row ===== -->
                            <div class="row mt60">
                                <div class="col-md-12">

                                    <!-- Start of Tabs Product -->
                                    <div class="tabs tabs-product">

                                        <!-- Start of Nav Tabs -->
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#heroSection" data-toggle="tab" aria-expanded="false">
                                                    <h6>Hero</h6>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#aboutSection" data-toggle="tab" aria-expanded="true">
                                                    <h6>About</h6>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#serviceSection" data-toggle="tab" aria-expanded="true">
                                                    <h6>My Work</h6>
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- End of Nav Tabs -->


                                        <!-- Start of Tab Content -->
                                        <div class="tab-content">

                                            <!-- Start of Tab Pane -->
                                            @include('frontend.candidate-dashboard.portfolio.sections.hero-section')
                                            <!-- End of Tab Pane -->

                                            <!-- Start of Tab Pane -->
                                            @include('frontend.candidate-dashboard.portfolio.sections.about-section')
                                            <!-- End of Tab Pane -->

                                            <!-- Start of Tab Pane -->
                                            @include('frontend.candidate-dashboard.portfolio.sections.service-section')
                                            <!-- End of Tab Pane -->

                                        </div>
                                        <!-- End of Tab Content -->

                                    </div>
                                    <!-- End of Tabs Product -->

                                </div>
                            </div>
                            <!-- ===== End of Row ===== -->
                        </div>
                        <!-- End of Product Wrapper -->
                    </div>
                    <!-- End of Row -->
                </div>
            </div>
        </div>
    </section>

    <!-- What i Do  Modal -->

    <!---Service Modal -->
    <div class="modal fade" id="myServiceModal" role="dialog">
        <div class="modal-dialog" style="max-width: 550px; margin: 1.75rem auto;">
            <!-- Modal content-->
            <div class="modal-content"
                style="border: none; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); overflow: hidden;">
                <div class="modal-header"
                    style="background-color: #f8fafc; padding: 20px 24px; border-bottom: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: space-between;">
                    <h4 class="modal-title" style="margin: 0; font-size: 18px; font-weight: 600; color: #1e293b;">Add New
                        Service</h4>
                    <button type="button" class="close" data-dismiss="modal"
                        style="background: none; border: none; cursor: pointer; padding: 0; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; border-radius: 6px; transition: all 0.2s ease;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="#64748b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>

                <div class="modal-body" style="padding: 24px;">
                    <form action="" method="POST" id="ServiceForm">
                        @csrf
                        <div style="margin-bottom: 24px;">
                            <div style="display: flex; flex-wrap: wrap; margin: -8px;">
                                <!-- Service Name (6 cols) -->
                                <div style="flex: 0 0 50%; padding: 8px;">
                                    <div style="margin-bottom: 18px;">
                                        <label for="service_name"
                                            style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500; color: #475569;">
                                            Service Name <span style="color: #ef4444;">*</span>
                                        </label>
                                        <input type="text" class="form-control" required name="service_name"
                                            id="service_name"
                                            style="width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; color: #334155; transition: border-color 0.2s ease; outline: none; box-shadow: 0 1px 2px rgba(0,0,0,0.05);"
                                            placeholder="Enter service name">
                                    </div>
                                </div>

                                <!-- URL (6 cols) -->
                                <div style="flex: 0 0 50%; padding: 8px;">
                                    <div style="margin-bottom: 18px;">
                                        <label for="service_url"
                                            style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500; color: #475569;">
                                            URL <span style="color: #ef4444;">*</span>
                                        </label>
                                        <input type="text" class="form-control" required name="service_url"
                                            id="service_url"
                                            style="width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; color: #334155; transition: border-color 0.2s ease; outline: none; box-shadow: 0 1px 2px rgba(0,0,0,0.05);"
                                            placeholder="https://example.com">
                                    </div>
                                </div>

                                <!-- Icon & Status Row -->
                                <div style="width: 100%; display: flex; gap: 16px; padding: 8px;">

                                    <!-- Icon -->
                                    <div style="flex: 1;">
                                        <div style="margin-bottom: 18px;">
                                            <label for="service_icon"
                                                style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500; color: #475569;">
                                                Icon
                                            </label>
                                            <div role="iconpicker" data-align="left" name="service_icon"
                                                class="{{ hasError($errors, 'service_icon') }}"
                                                style="border: 1px solid #cbd5e1; border-radius: 6px; padding: 10px; background-color: white; min-height: 42px; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
                                            </div>
                                            <x-input-error :messages="$errors->get('service_icon')" class="mt-2"
                                                style="font-size: 12px; color: #ef4444; margin-top: 6px;" />
                                        </div>
                                    </div>

                                    <!-- Status -->
                                    <div style="flex: 1;">
                                        <div style="margin-bottom: 18px;">
                                            <label for="service_description"
                                                style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500; color: #475569;">
                                                Service Status <span style="color: #ef4444;">*</span>
                                            </label>
                                            <select
                                                class="form-control form-icons selectpicker {{ $errors->has('service_visible') ? 'is-invalid' : '' }}"
                                                name="service_visible" value="" data-live-search="true">
                                                <option value="">Select One</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('service_visible')" class="mt-2"
                                                style="font-size: 12px; color: #ef4444; margin-top: 6px;" />
                                        </div>
                                    </div>

                                </div>

                                <!-- Description -->
                                <div style="width: 100%; padding: 8px;">
                                    <div style="margin-bottom: 18px;">
                                        <label for="service_description"
                                            style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500; color: #475569;">
                                            Service Description <span style="color: #ef4444;">*</span>
                                        </label>
                                        <textarea class="form-control textarea-box" rows="6" name="service_description" id="service_description"
                                            placeholder="Describe your service..."
                                            style="width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; color: #334155; transition: border-color 0.2s ease; outline: none; resize: vertical; font-family: inherit; box-shadow: 0 1px 2px rgba(0,0,0,0.05);"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            style="display: flex; justify-content: flex-end; gap: 12px; padding-top: 16px; border-top: 1px solid #e2e8f0;">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"
                                style="padding: 10px 16px; background-color: #d62b0d; color: #475569; border: none; border-radius: 6px; font-size: 14px; font-weight: 500; cursor: pointer; transition: all 0.2s ease;">Cancel</button>
                            <button type="submit" class="btn btn-primary"
                                style="padding: 10px 20px; background-color: #3b82f6; color: white; border: none; border-radius: 6px; font-size: 14px; font-weight: 500; cursor: pointer; transition: all 0.2s ease; box-shadow: 0 2px 5px rgba(59, 130, 246, 0.3);">Add
                                Service</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- My Clients Modal -->
    <div class="modal fade" id="myClientModal" role="dialog">
        <div class="modal-dialog" style="max-width: 550px; margin: 1.75rem auto;">
            <div class="modal-content"
                style="border: none; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); overflow: hidden;">
                <div class="modal-header"
                    style="background-color: #f8fafc; padding: 20px 24px; border-bottom: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: space-between;">
                    <h4 class="modal-title" style="margin: 0; font-size: 18px; font-weight: 600; color: #1e293b;">Add New
                        Client</h4>
                    <button type="button" class="close" data-dismiss="modal"
                        style="background: none; border: none; cursor: pointer; padding: 0; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; border-radius: 6px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="#64748b" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>

                <div class="modal-body" style="padding: 24px;">
                    <form action="" method="POST" id="ClientForm">
                        @csrf
                        <div style="margin-bottom: 24px;">
                            <div style="display: flex; flex-wrap: wrap; margin: -8px;">

                                <!-- 2 Up -->
                                <div style="flex: 0 0 50%; padding: 8px;">
                                    <label for="client_name"
                                        style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500; color: #475569;">
                                        Client Name <span style="color: #ef4444;">*</span>
                                    </label>
                                    <input type="text" class="form-control" required name="client_name"
                                        id="client_name" placeholder="Enter client name"
                                        style="width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; color: #334155;">
                                </div>

                                <div style="flex: 0 0 50%; padding: 8px;">
                                    <label for="client_visible"
                                        style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500; color: #475569;">
                                        Show <span style="color: #ef4444;">*</span>
                                    </label>
                                    <select name="client_visible" id="client_visible"
                                        class="form-control form-icons selectpicker"
                                        style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; background-color: white; font-size: 14px; color: #334155; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('client_visible')" class="mt-2"
                                        style="font-size: 12px; color: #ef4444;" />
                                </div>



                                <!-- 2 Down -->
                                <div style="flex: 0 0 50%; padding: 8px;">
                                    <label for="client_company"
                                        style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500; color: #475569;">
                                        Company <span style="color: #ef4444;">*</span>
                                    </label>
                                    <input type="text" class="form-control" required name="client_company"
                                        id="client_company" placeholder="Enter company name"
                                        style="width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; color: #334155;">
                                </div>

                                <div style="flex: 0 0 50%; padding: 8px;">
                                    <label for="client_title"
                                        style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500; color: #475569;">
                                        Title <span style="color: #ef4444;">*</span>
                                    </label>
                                    <input type="text" class="form-control" required name="client_title"
                                        id="client_title" placeholder="Ex: CEO, Director..."
                                        style="width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; color: #334155;">
                                </div>

                                <!-- Note (Full Width) -->
                                <div style="flex: 0 0 100%; padding: 8px;">
                                    <label for="client_note"
                                        style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500; color: #475569;">
                                        Client Note
                                    </label>
                                    <textarea class="form-control textarea-box" name="client_note" id="client_note" rows="4"
                                        placeholder="Add a note about the client (optional)"
                                        style="width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; color: #334155; resize: vertical; font-family: inherit;"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div
                            style="display: flex; justify-content: flex-end; gap: 12px; padding-top: 16px; border-top: 1px solid #e2e8f0;">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"
                                style="padding: 10px 16px; background-color: #ea301f; color: white; border: none; border-radius: 6px; font-size: 14px; font-weight: 500;">Cancel</button>
                            <button type="submit" class="btn btn-primary"
                                style="padding: 10px 20px; background-color: #3b82f6; color: white; border: none; border-radius: 6px; font-size: 14px; font-weight: 500;">Add
                                Client</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var editId = "";
        var editMode = false;


        /***
         * Service Section
         *
         */
        // Function to fetch all Services and update the table
        function fetchService() {
            $.ajax({
                method: 'GET',
                url: "{{ route('candidate.portfolio.service.index') }}",
                success: function(response) {
                    $('.service-tbody').html(response);
                },
                error: function(xhr, status, error) {
                    console.log('Error fetching services:', error);
                }
            });
        }

        // Function to show the loader (Optional)
        function showLoader() {
            // Your loader show logic
        }

        // Function to hide the loader (Optional)
        function hideLoader() {
            // Your loader hide logic
        }

        // Handle form submission for adding or editing service
        $('#ServiceForm').on('submit', function(event) {
            event.preventDefault();

            const formData = $(this).serialize();
            let method = editMode ? 'PUT' : 'POST';
            let url = editMode ?
                "{{ route('candidate.portfolio.service.update', ':id') }}".replace(':id', editId) :
                "{{ route('candidate.portfolio.service.store') }}";

            $.ajax({
                method: method,
                url: url,
                data: formData,
                beforeSend: function() {
                    showLoader();
                },
                success: function(response) {
                    fetchService(); // Refresh the Service list
                    $('#ServiceForm').trigger('reset'); // Clear the form
                    $('#myServiceModal').modal('hide'); // Hide the modal
                    hideLoader();
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    notyf.success(response.message);
                    editId = ""; // Reset the editId
                    editMode = false; // Switch off edit mode
                },
                error: function(xhr, status, error) {
                    hideLoader();
                    console.log('Error saving Service:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'There was an error saving the Service.',
                    });
                }
            });
        });

        // Handle edit button click to populate modal with service data
        $('body').on('click', '.edit-service', function(e) {
            e.preventDefault(); // Prevent default link behavior

            let url = $(this).attr('href'); // Get the edit URL

            $.ajax({
                method: 'GET',
                url: url,
                beforeSend: function() {
                    showLoader();
                },
                success: function(response) {
                    // Populate modal fields with the service data
                    $('#ServiceForm input[name="service_name"]').val(response.service_name);
                    $('#ServiceForm input[name="service_icon"]').val(response.service_icon);
                    $('#ServiceForm input[name="service_url"]').val(response
                        .service_url);
                    $('#ServiceForm input[name="service_visible"]').val(response.service_visible);
                    $('#ServiceForm textarea[name="service_description"]').val(response
                        .service_description);



                    $('#myServiceModal').modal('show'); // Open the modal
                    hideLoader();

                    editId = response.id; // Set the ID for updating
                    editMode = true; // Enable edit mode
                },
                error: function(xhr, status, error) {
                    hideLoader();
                    console.log('Error loading Service:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to load Service data.',
                    });
                }
            });
        });

        // Delete Item
        $("body").on('click', '.delete-service', function(e) {
            e.preventDefault();
            let url = $(this).attr('href')

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // console.log(url);
                    $.ajax({
                        method: 'DELETE',
                        url: url,
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        beforeSend: function() {
                            showLoader();
                        },
                        success: function(response) {
                            fetchService();
                            hideLoader();
                            // window.location.reload();
                            notyf.success(response.message);

                        },
                        error: function(xhr, status, error) {
                            console.log(xhr);
                            swal(xhr.responseJSON.message, {
                                icon: 'error',
                            });
                            hideLoader();
                        }
                    });
                }
            });
        });

        // Fetch Services on page load
        fetchService();


        // Client Section Variables
        var clientEditId = "";
        var clientEditMode = false;

        /***
         * Client Section
         *
         */
        // Function to fetch all Clients and update the table
        function fetchClients() {
            $.ajax({
                method: 'GET',
                url: "{{ route('candidate.portfolio.client.index') }}", // Update with your actual route
                success: function(response) {
                    $('.client-tbody').html(response);
                },
                error: function(xhr, status, error) {
                    console.log('Error fetching clients:', error);
                }
            });
        }

        // Handle form submission for adding or editing client
        $('#ClientForm').on('submit', function(event) {
            event.preventDefault();

            const formData = $(this).serialize();
            let method = clientEditMode ? 'PUT' : 'POST';
            let url = clientEditMode ?
                "{{ route('candidate.portfolio.client.update', ':id') }}".replace(':id', clientEditId) :
                "{{ route('candidate.portfolio.client.store') }}"; // Update with your actual routes

            $.ajax({
                method: method,
                url: url,
                data: formData,
                beforeSend: function() {
                    showLoader();
                },
                success: function(response) {
                    fetchClients(); // Refresh the Client list
                    $('#ClientForm').trigger('reset'); // Clear the form
                    $('#myClientModal').modal('hide'); // Hide the modal
                    hideLoader();
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    notyf.success(response.message);
                    clientEditId = ""; // Reset the editId
                    clientEditMode = false; // Switch off edit mode
                },
                error: function(xhr, status, error) {
                    hideLoader();
                    console.log('Error saving Client:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'There was an error saving the Client.',
                    });
                }
            });
        });

        // Handle edit button click to populate modal with client data
        $('body').on('click', '.edit-client', function(e) {
            e.preventDefault(); // Prevent default link behavior

            let url = $(this).attr('href'); // Get the edit URL

            $.ajax({
                method: 'GET',
                url: url,
                beforeSend: function() {
                    showLoader();
                },
                success: function(response) {
                    // Populate modal fields with the client data
                    $('#ClientForm input[name="client_name"]').val(response.client_name);
                    $('#ClientForm select[name="service_visible"]').val(response.service_visible);
                    $('#ClientForm input[name="client_company"]').val(response.client_company);
                    $('#ClientForm input[name="client_title"]').val(response.client_title);
                    $('#ClientForm textarea[name="client_note"]').val(response.client_note);

                    $('#myClientModal').modal('show'); // Open the modal
                    hideLoader();

                    clientEditId = response.id; // Set the ID for updating
                    clientEditMode = true; // Enable edit mode
                },
                error: function(xhr, status, error) {
                    hideLoader();
                    console.log('Error loading Client:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to load Client data.',
                    });
                }
            });
        });

        // Delete Client
        $("body").on('click', '.delete-client', function(e) {
            e.preventDefault();
            let url = $(this).attr('href')

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'DELETE',
                        url: url,
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        beforeSend: function() {
                            showLoader();
                        },
                        success: function(response) {
                            fetchClients();
                            hideLoader();
                            notyf.success(response.message);
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: xhr.responseJSON.message ||
                                    'Failed to delete client',
                            });
                            hideLoader();
                        }
                    });
                }
            });
        });

        // Fetch Clients on page load
        fetchClients();
    </script>
@endpush
