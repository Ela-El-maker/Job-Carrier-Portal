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
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            text-align: center;
            display: inline-block;
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
                        <li class="active">Company Profile</li>
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
                @include('frontend.company-dashboard.sidebar')
                <!-- ===== Start of Job Post Main ===== -->
                <div class="col-md-8 col-xs-12 job-post-main">
                    <h4>Welcome John Doe!</h4>

                    <!-- Start of Job Post Wrapper -->
                    <div class="job-post-wrapper mt20">
                        <!-- Start of Row -->
                        <div class="row candidate-profile">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="active">
                                    <a href="#home" data-toggle="tab" role="tab" aria-controls="home"
                                        aria-selected="true">Company Info</a>
                                </li>
                                <li>
                                    <a href="#profile" data-toggle="tab" role="tab" aria-controls="profile"
                                        aria-selected="false">Founding Info</a>
                                </li>
                                <li>
                                    <a href="#contact" data-toggle="tab" role="tab" aria-controls="contact"
                                        aria-selected="false">Account Setting</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade in active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <br>
                                    <form action="{{ route('company.profile.company-info') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <x-image-preview :height="200" :width="200" :source="$companyInfo?->logo" />

                                                <!-- Form Group -->
                                                <label>Logo *</label>

                                                <div class="form-group">

                                                    <!-- Upload Button -->
                                                    <div class="upload-file-btn">
                                                        <span><i class="fa fa-upload"></i> Upload</span>
                                                        <input type="file"
                                                            class="{{ $errors->has('logo') ? 'is-invalid' : '' }}"
                                                            name="logo">
                                                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <x-image-preview :height="200" :width="400" :source="$companyInfo?->banner" />

                                                <!-- Form Group -->
                                                <label>Banner *</label>

                                                <div class="form-group">

                                                    <!-- Upload Button -->
                                                    <div class="upload-file-btn">
                                                        <span><i class="fa fa-upload"></i> Upload</span>
                                                        <input type="file"
                                                            class="{{ $errors->has('banner') ? 'is-invalid' : '' }}"
                                                            name="banner">
                                                        <x-input-error :messages="$errors->get('banner')" class="mt-2" />

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label>Company Name *</label>
                                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                type="text" name="name" value="{{ $companyInfo?->name }}">
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                        </div>
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label>Company Bio *</label>
                                            <textarea name="bio" class="tinymce {{ $errors->has('bio') ? 'is-invalid' : '' }}">{{ $companyInfo?->bio }}</textarea>
                                            <x-input-error :messages="$errors->get('bio')" class="mt-2" />

                                        </div>
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label>Company Vision *</label>
                                            <textarea name="vision" class="tinymce {{ $errors->has('vision') ? 'is-invalid' : '' }}">{{ $companyInfo?->vision }}</textarea>
                                            <x-input-error :messages="$errors->get('vision')" class="mt-2" />

                                        </div>

                                        <div class="form-group pt30 nomargin" id="last">
                                            <button class="btn btn-blue btn-lg btn-block">Save All Changes</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <br>

                                    <form action="" method="post">
                                        <div class="row">

                                            <div class="col-md-4">

                                                <!-- Form Group -->
                                                <div class="form-group">
                                                    <label>Industry Type *</label>
                                                    <select name="job-type" class="selectpicker" data-size="5"
                                                        data-container="body" required>
                                                        <option value="">Choose Type</option>
                                                        <option value="1">Full Time</option>
                                                        <option value="2">Part Time</option>
                                                        <option value="3">Freelance</option>
                                                        <option value="4">Internship</option>
                                                        <option value="5">Temporary</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <!-- Form Group -->
                                                <div class="form-group">
                                                    <label>Organization Type *</label>
                                                    <select name="job-type" class="selectpicker" data-size="5"
                                                        data-container="body" required>
                                                        <option value="">Choose Type</option>
                                                        <option value="1">Full Time</option>
                                                        <option value="2">Part Time</option>
                                                        <option value="3">Freelance</option>
                                                        <option value="4">Internship</option>
                                                        <option value="5">Temporary</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <!-- Form Group -->
                                                <div class="form-group">
                                                    <label>Team Size *</label>
                                                    <select name="job-type" class="selectpicker" data-size="5"
                                                        data-container="body" required>
                                                        <option value="">Choose Type</option>
                                                        <option value="1">Full Time</option>
                                                        <option value="2">Part Time</option>
                                                        <option value="3">Freelance</option>
                                                        <option value="4">Internship</option>
                                                        <option value="5">Temporary</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Form Group -->
                                                <div class="form-group">
                                                    <label>Establishment Date *</label>
                                                    <input class="form-control datepicker" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Form Group -->
                                                <div class="form-group">
                                                    <label>Website</label>
                                                    <input class="form-control datepicker" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Form Group -->
                                                <div class="form-group">
                                                    <label>Email Address *</label>
                                                    <input class="form-control datepicker" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Form Group -->
                                                <div class="form-group">
                                                    <label>Contact Number *</label>
                                                    <input class="form-control datepicker" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <!-- Form Group -->
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <select name="job-type" class="selectpicker" data-size="5"
                                                        data-container="body" required>
                                                        <option value="">Choose Type</option>
                                                        <option value="1">Full Time</option>
                                                        <option value="2">Part Time</option>
                                                        <option value="3">Freelance</option>
                                                        <option value="4">Internship</option>
                                                        <option value="5">Temporary</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <!-- Form Group -->
                                                <div class="form-group">
                                                    <label>State </label>
                                                    <select name="job-type" class="selectpicker" data-size="5"
                                                        data-container="body" required>
                                                        <option value="">Choose Type</option>
                                                        <option value="1">Full Time</option>
                                                        <option value="2">Part Time</option>
                                                        <option value="3">Freelance</option>
                                                        <option value="4">Internship</option>
                                                        <option value="5">Temporary</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <!-- Form Group -->
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <select name="job-type" class="selectpicker" data-size="5"
                                                        data-container="body" required>
                                                        <option value="">Choose Type</option>
                                                        <option value="1">Full Time</option>
                                                        <option value="2">Part Time</option>
                                                        <option value="3">Freelance</option>
                                                        <option value="4">Internship</option>
                                                        <option value="5">Temporary</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <!-- Form Group -->
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <!-- Form Group -->
                                                <div class="form-group">
                                                    <label>Map Link</label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group pt30 nomargin" id="last">
                                            <button class="btn btn-blue btn-lg btn-block">Save All Changes</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <br>
                                    <div class="row">
                                        <!-- Username and Email fields -->
                                        <div class="col-md-6">
                                            <!-- Form Group for Username -->
                                            <div class="form-group">
                                                <label>Username *</label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Form Group for Email -->
                                            <div class="form-group">
                                                <label>Email Address *</label>
                                                <input class="form-control" type="email">
                                            </div>
                                        </div>
                                        <!-- Save Button below Password fields -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-shadow">Save</button>
                                            </div>
                                        </div>
                                        <!-- Divider -->
                                        <div class="col-md-12">
                                            <br>
                                            <hr>
                                        </div>

                                        <!-- Password and Confirm Password on the same row -->
                                        <div class="col-md-6">
                                            <!-- Form Group for Password -->
                                            <div class="form-group">
                                                <label>Password *</label>
                                                <input class="form-control" type="password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Form Group for Confirm Password -->
                                            <div class="form-group">
                                                <label>Confirm Password *</label>
                                                <input class="form-control" type="password">
                                            </div>
                                        </div>

                                        <!-- Save Button below Password fields -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-shadow">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
    </section>
    <!-- ===== End of Main Wrapper Section ===== -->

    <!-- ===== End of Main Wrapper Section ===== -->
@endsection

{{-- <div class="row">
    <!-- Password -->
    <div class="form-group col-md-6">
        <label>Password</label>
        <input type="password" name="password"
            class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
            placeholder="************">
        <x-input-error :messages="$errors->get('password')" class="mt-2" />

    </div>

    <!-- Confirm Password -->
    <div class="form-group col-md-6">
        <label>Confirm Password</label>
        <input type="password"name="password_confirmation"
            class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
            placeholder="************">
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

    </div>
</div> --}}
