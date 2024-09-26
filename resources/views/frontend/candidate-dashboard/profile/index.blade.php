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
            /* Flexbox layout */
            align-items: center;
            /* Vertical centering */
            justify-content: center;
            /* Horizontal centering */
            cursor: pointer;
            /* Adds pointer on hover */
        }

        .upload-file-btn input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
            /* Ensures input behaves as clickable */
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
                            <!-- Start of Profile Description and Dashboard Cards -->
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

                                        {{-- <div class="tab-pane fade" id="contact" role="tabpanel"
                                            aria-labelledby="contact-tab">
                                            <br>

                                            <form action="{{ route('company.profile.account-info') }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <!-- Username and Email fields -->
                                                    <div class="col-md-6">
                                                        <!-- Form Group for Username -->
                                                        <div class="form-group">
                                                            <label>Username *</label>
                                                            <input name="name"
                                                                class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                                value="{{ auth()->user()->name }}" type="text">
                                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <!-- Form Group for Email -->
                                                        <div class="form-group">
                                                            <label>Email Address *</label>
                                                            <input name="email"
                                                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                                value="{{ auth()->user()->email }}" type="email">
                                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                                        </div>
                                                    </div>
                                                    <!-- Save Button below Password fields -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <button type="submit"
                                                                class="btn btn-primary btn-shadow">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- Divider -->
                                            <div class="col-md-12">
                                                <br>
                                                <hr>
                                            </div>

                                            <form action="{{ route('company.profile.password-update') }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <!-- Password and Confirm Password on the same row -->
                                                    <div class="col-md-6">
                                                        <!-- Form Group for Password -->
                                                        <div class="form-group">
                                                            <label>Password *</label>
                                                            <input name="password"
                                                                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                                                type="password">
                                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <!-- Form Group for Confirm Password -->
                                                        <div class="form-group">
                                                            <label>Confirm Password *</label>
                                                            <input name="password_confirmation"
                                                                class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                                                type="password">
                                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                                                        </div>
                                                    </div>

                                                    <!-- Save Button below Password fields -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <button type="submit"
                                                                class="btn btn-primary btn-shadow">Save</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                        </div> --}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Experience</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id = "ExperienceForm">
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
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                            <button type="submit" class="btn btn-primary">Add
                                Experience</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>

        </div>
    </div>
    <!-- ===== End of Login Pop Up div ===== -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#ExperienceForm').on('submit', function(event) {
                event.preventDefault();
                const formData = $(this).serialize();
                console.log(formData);
                $.ajax({
                    method: 'POST',
                    url: "{{ route('candidate.experience.store') }}",
                    data: formData,
                    success: function(response) {

                    },
                    error: function(xhr, status, error) {

                    }
                });
            });
        });
    </script>
@endpush
