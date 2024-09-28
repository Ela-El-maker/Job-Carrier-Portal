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

        .modal-dialog {
            display: flex;
            align-items: center;
            min-height: calc(100% - 1rem);
            margin: auto;
        }
    </style>
    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-header">
        <div class="container">

            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>PROFILE</h2>
                </div>
            </div>
            <!-- End of Page Title -->

            <!-- Start of Breadcrumb -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">home</a></li>
                        <li class="active">Candidate Profile</li>
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
                <div class="col-md-8 col-xs-12 job-post-main">
                    <h4>Welcome {{ auth()->user()->name }}!</h4>

                    <!-- Start of Job Post Wrapper -->
                    <div class="job-post-wrapper mt20">
                        <!-- Start of Row -->
                        <div class="row candidate-profile">
                            <div class="col-md-12 col-xs-12">
                                <!-- Card Container for Candidate Details -->
                                <div class="card-container">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="active">
                                            <a href="#home" data-toggle="tab" role="tab" aria-controls="home"
                                                aria-selected="true">Basic</a>
                                        </li>
                                        <li>
                                            <a href="#profile" data-toggle="tab" role="tab" aria-controls="profile"
                                                aria-selected="false">Profile</a>
                                        </li>
                                        <li>
                                            <a href="#experience" data-toggle="tab" role="tab"
                                                aria-controls="experience" aria-selected="false">Experience & Education</a>
                                        </li>
                                        <li>
                                            <a href="#contact" data-toggle="tab" role="tab" aria-controls="contact"
                                                aria-selected="false">Account Setting</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="myTabContent">

                                        @include('frontend.candidate-dashboard.profile.sections.basic-section')

                                        @include('frontend.candidate-dashboard.profile.sections.profile-section')

                                        @include('frontend.candidate-dashboard.profile.sections.experience-section')

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Experience  Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Experience</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="ExperienceForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Company *</label>
                                    <input type="text" class="form-control" required name="company" id="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Department *</label>
                                    <input type="text" class="form-control" required name="department" id="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Designation *</label>
                                    <input type="text" class="form-control" required name="designation" id="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Start Date *</label>
                                    <input type="text" required class="form-control datepicker" name="start"
                                        id="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">End Date *</label>
                                    <input type="text" required class="form-control datepicker" name="end"
                                        id="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="currently_working"
                                        id="currently-working">
                                    <label class="form-check-label" for="currently-working">I am Currently Working</label>
                                </div>
                            </div>

                            <div class="col-md-12 form-group mb30">
                                <textarea class="form-control textarea-box" rows="8" name="responsibilities" placeholder="..."></textarea>
                            </div>

                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Experience</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>


    <!-- Education  Modal -->
    <div class="modal fade" id="myEducationModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Education</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="EducationForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Level *</label>
                                    <input type="text" class="form-control" required name="level" id="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Degree *</label>
                                    <input type="text" class="form-control" required name="degree"
                                        id="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Year *</label>
                                    <input type="text" class="form-control yearpicker" required name="year"
                                        id="">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Note *</label>
                                    <textarea class="form-control textarea-box" rows="8" name="note" placeholder="..."></textarea>

                                </div>
                            </div>


                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Education</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
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
             * Experience Section
             *
             */
            // Function to fetch all experiences and update the table
            function fetchExperience() {
                $.ajax({
                    method: 'GET',
                    url: "{{ route('candidate.experience.index') }}",
                    success: function(response) {
                        $('.experience-tbody').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.log('Error fetching experiences:', error);
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

            // Handle form submission for adding or editing experience
            $('#ExperienceForm').on('submit', function(event) {
                event.preventDefault();

                const formData = $(this).serialize();
                let method = editMode ? 'PUT' : 'POST';
                let url = editMode ?
                    "{{ route('candidate.experience.update', ':id') }}".replace(':id', editId) :
                    "{{ route('candidate.experience.store') }}";

                $.ajax({
                    method: method,
                    url: url,
                    data: formData,
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        fetchExperience(); // Refresh the experience list
                        $('#ExperienceForm').trigger('reset'); // Clear the form
                        $('#myModal').modal('hide'); // Hide the modal
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
                        console.log('Error saving experience:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'There was an error saving the experience.',
                        });
                    }
                });
            });

            // Handle edit button click to populate modal with experience data
            $('body').on('click', '.edit-experience', function(e) {
                e.preventDefault(); // Prevent default link behavior

                let url = $(this).attr('href'); // Get the edit URL

                $.ajax({
                    method: 'GET',
                    url: url,
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        // Populate modal fields with the experience data
                        $('#ExperienceForm input[name="company"]').val(response.company);
                        $('#ExperienceForm input[name="department"]').val(response.department);
                        $('#ExperienceForm input[name="designation"]').val(response
                            .designation);
                        $('#ExperienceForm input[name="start"]').val(response.start);
                        $('#ExperienceForm input[name="end"]').val(response.end);
                        $('#ExperienceForm textarea[name="responsibilities"]').val(response
                            .responsibilities);

                        // Set the checkbox for currently working
                        if (response.currently_working === 1) {
                            $('#ExperienceForm input[name="currently_working"]').prop('checked',
                                true);
                        } else {
                            $('#ExperienceForm input[name="currently_working"]').prop('checked',
                                false);
                        }

                        $('#myModal').modal('show'); // Open the modal
                        hideLoader();

                        editId = response.id; // Set the ID for updating
                        editMode = true; // Enable edit mode
                    },
                    error: function(xhr, status, error) {
                        hideLoader();
                        console.log('Error loading experience:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Failed to load experience data.',
                        });
                    }
                });
            });

            // Delete Item
            $("body").on('click', '.delete-experience', function(e) {
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
                                fetchExperience();
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

            // Fetch experiences on page load
            fetchExperience();

            /***
             *
             *
             * Education Section
             *
             *
             ***/
            // Function to fetch all education and update the table
            function fetchEducation() {
                $.ajax({
                    method: 'GET',
                    url: "{{ route('candidate.education.index') }}",
                    success: function(response) {
                        $('.education-tbody').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.log('Error fetching education:', error);
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

            // Handle form submission for adding or editing education
            $('#EducationForm').on('submit', function(event) {
                event.preventDefault();

                const formData = $(this).serialize();
                let method = editMode ? 'PUT' : 'POST';
                let url = editMode ?
                    "{{ route('candidate.education.update', ':id') }}".replace(':id', editId) :
                    "{{ route('candidate.education.store') }}";

                $.ajax({
                    method: method,
                    url: url,
                    data: formData,
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        fetchEducation(); // Refresh the experience list
                        $('#EducationForm').trigger('reset'); // Clear the form
                        $('#myEducationModal').modal('hide'); // Hide the modal
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
                        console.log('Error saving education:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'There was an error saving the education.',
                        });
                    }
                });
            });

            // Handle edit button click to populate modal with education data
            $('body').on('click', '.edit-education', function(e) {
                e.preventDefault(); // Prevent default link behavior

                let url = $(this).attr('href'); // Get the edit URL

                $.ajax({
                    method: 'GET',
                    url: url,
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        // Populate modal fields with the education data
                        $('#EducationForm input[name="level"]').val(response.level);
                        $('#EducationForm input[name="degree"]').val(response.degree);
                        $('#EducationForm input[name="year"]').val(response
                            .year);
                        $('#EducationForm input[name="note"]').val(response.note);



                        $('#myEducationModal').modal('show'); // Open the modal
                        hideLoader();

                        editId = response.id; // Set the ID for updating
                        editMode = true; // Enable edit mode
                    },
                    error: function(xhr, status, error) {
                        hideLoader();
                        console.log('Error loading education:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Failed to load education data.',
                        });
                    }
                });
            });

            // Delete Item
            $("body").on('click', '.delete-education', function(e) {
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
                                fetchEducation();
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

            // Fetch education on page load
            fetchEducation();




    </script>
@endpush
