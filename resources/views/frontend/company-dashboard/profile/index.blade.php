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
                                                        <x-image-preview :height="85" :width="200"
                                                            :source="$companyInfo?->logo" />
                                                        <!-- Use % for height and px for width -->
                                                        {{-- @if ($companyInfo?->logo)
                                                            <div>
                                                                <img style="height: 100%; width: 200px; object-fit: cover;"
                                                                    src="{{ $companyInfo->logo }}" alt="">
                                                            </div>
                                                        @endif --}}
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
                                                        <x-image-preview :height="85" :width="400"
                                                            :source="$companyInfo?->banner" />

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
                                                    <input
                                                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
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
                                        <div class="tab-pane fade" id="profile" role="tabpanel"
                                            aria-labelledby="profile-tab">
                                            <br>

                                            <form action="{{ route('company.profile.founding-info') }}" method="post">
                                                @csrf
                                                <div class="row">

                                                    <div class="col-md-4">

                                                        <!-- Form Group -->
                                                        <!-- Form Group -->
                                                        <div class="form-group">
                                                            <label for="industry_type">Industry Type *</label>

                                                            <!-- Industry Type Dropdown with Error Handling -->
                                                            <select name="industry_type"
                                                                class="form-control form-icons selectpicker {{ $errors->has('industry_type') ? 'is-invalid' : '' }}"
                                                                data-live-search="true" data-size="5" data-container="body"
                                                                value="{{ $companyInfo?->industry_type }}" id="">
                                                                <option value="">Select</option>
                                                                @foreach ($industryTypes as $industryType)
                                                                    <option value="{{ $industryType->id }}"
                                                                        @selected($industryType->id === $companyInfo?->industry_type_id)>
                                                                        {{ $industryType->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                            <!-- Error Message -->
                                                            <x-input-error :messages="$errors->get('industry_type')" class="mt-2" />
                                                        </div>

                                                    </div>


                                                    <div class="col-md-4">
                                                        <!-- Form Group -->
                                                        <div class="form-group">
                                                            <label>Organization Type *</label>

                                                            <select name="organization_type"
                                                                class="form-control form-icons selectpicker {{ $errors->has('organization_type') ? 'is-invalid' : '' }}"
                                                                data-live-search="true" data-size="5"
                                                                data-container="body"
                                                                value="{{ $companyInfo?->organization_type }}"
                                                                id="">
                                                                <option value="">Select</option>
                                                                @foreach ($organizationTypes as $organizationType)
                                                                    <option value="{{ $organizationType->id }}"
                                                                        @selected($organizationType->id === $companyInfo?->organization_type_id)>
                                                                        {{ $organizationType->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <x-input-error :messages="$errors->get('organization_type')" class="mt-2" />

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <!-- Form Group -->
                                                        <div class="form-group">
                                                            <label>Team Size *</label>

                                                            <select name="team_size"
                                                                class="form-control form-icons selectpicker {{ $errors->has('team_size') ? 'is-invalid' : '' }}"
                                                                data-live-search="true" data-size="5"
                                                                data-container="body"
                                                                value="{{ $companyInfo?->team_size }}">
                                                                <option value="">Select</option>
                                                                @foreach ($teamSizes as $teamSize)
                                                                    <option @selected($teamSize->id === $companyInfo?->team_size_id)
                                                                        value="{{ $teamSize->id }}">
                                                                        {{ $teamSize->name }}</option>
                                                                @endforeach
                                                            </select>

                                                            <x-input-error :messages="$errors->get('team_size')" class="mt-2" />

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <!-- Form Group -->
                                                        <div class="form-group">
                                                            <label>Establishment Date *</label>
                                                            <input
                                                                class="form-control datepicker {{ $errors->has('establishment_date') ? 'is-invalid' : '' }}"
                                                                value="{{ $companyInfo?->establishment_date }}"
                                                                name="establishment_date" type="text">
                                                            <x-input-error :messages="$errors->get('establishment_date')" class="mt-2" />

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <!-- Form Group -->
                                                        <div class="form-group">
                                                            <label>Website</label>
                                                            <input
                                                                class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}"
                                                                value="{{ $companyInfo?->website }}" name="website"
                                                                type="text">
                                                            <x-input-error :messages="$errors->get('website')" class="mt-2" />

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <!-- Form Group -->
                                                        <div class="form-group">
                                                            <label>Email Address *</label>
                                                            <input
                                                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} "
                                                                value="{{ $companyInfo?->email }}" name="email"
                                                                type="email">
                                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <!-- Form Group -->
                                                        <div class="form-group">
                                                            <label>Contact Number *</label>
                                                            <input
                                                                class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                                                value="{{ $companyInfo?->phone }}" name="phone"
                                                                type="text">
                                                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <!-- Form Group -->
                                                        <div class="form-group">
                                                            <label>Country</label>
                                                            <select name="country"
                                                                class="form-control selectpicker country {{ $errors->has('country') ? 'is-invalid' : '' }}"
                                                                data-live-search="true" data-size="5"
                                                                data-container="body"
                                                                value="{{ $companyInfo?->country }}">
                                                                <option value="">Select</option>
                                                                @foreach ($countries as $country)
                                                                    <option @selected($country->id === $companyInfo?->country)
                                                                        value="{{ $country->id }}">
                                                                        {{ $country->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <x-input-error :messages="$errors->get('country')" class="mt-2" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <!-- Form Group -->
                                                        <div class="form-group">
                                                            <label>State </label>
                                                            <select name="state"
                                                                class="form-control form-icons state {{ $errors->has('state') ? 'is-invalid' : '' }}"
                                                                data-live-search="true" data-size="5"
                                                                data-container="body" value="{{ $companyInfo?->state }}">
                                                                <option value="">Select</option>
                                                                @foreach ($states as $state)
                                                                    <option @selected($state->id === $companyInfo?->state)
                                                                        value="{{ $state->id }}">
                                                                        {{ $state->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <x-input-error :messages="$errors->get('state')" class="mt-2" />

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <!-- Form Group -->
                                                        <div class="form-group">
                                                            <label>City</label>
                                                            <select name="city"
                                                                class="form-control form-icons city {{ $errors->has('city') ? 'is-invalid' : '' }}"
                                                                value="{{ $companyInfo?->city }}" id="">
                                                                @foreach ($cities as $city)
                                                                    <option @selected($city->id === $companyInfo?->city)
                                                                        value="{{ $city->id }}">
                                                                        {{ $city->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <x-input-error :messages="$errors->get('city')" class="mt-2" />

                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <!-- Form Group -->
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" rows="3">{{ old('address', $companyInfo?->address) }}</textarea>
                                                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <!-- Form Group -->
                                                        <div class="form-group">
                                                            <label>Map Link</label>
                                                            <textarea class="form-control {{ $errors->has('map_link') ? 'is-invalid' : '' }}" name="map_link" rows="3">{{ old('map_link', $companyInfo?->map_link) }}</textarea>
                                                            <x-input-error :messages="$errors->get('map_link')" class="mt-2" />
                                                        </div>
                                                    </div>


                                                </div>


                                                <div class="form-group pt30 nomargin" id="last">
                                                    <button class="btn btn-blue btn-lg btn-block">Save All Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="contact" role="tabpanel"
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
                                        </div>

                                    </div>
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

{{-- @push('scripts')
    <script>
        $(document).ready(function() {
            $('.country').on('change', function() {
                let country_id = $(this).val();
                // remove all previous cities
                $('.city').html("")
                $.ajax({
                    method: 'GET',
                    url: '{{ route('get-states', ':id') }}'.replace(":id", country_id),
                    data: {},
                    success: function(response) {
                        let html = '';
                        $.each(response, function(index, value) {
                            html +=
                                `<option value = "${value.id}">${value.name}</option>`
                        });
                        $('.state').html(html);
                    },
                    error: function(xhr, status, error) {

                    }
                })
            });

            // get cities
            $('.state').on('change', function() {
                let state_id = $(this).val();


                $.ajax({
                    method: 'GET',
                    url: '{{ route('get-cities', ':id') }}'.replace(":id", state_id),
                    data: {},
                    success: function(response) {
                        let html = '';
                        $.each(response, function(index, value) {
                            html +=
                                `<option value = "${value.id}">${value.name}</option>`
                        });
                        $('.city').html(html);
                    },
                    error: function(xhr, status, error) {

                    }
                })
            });
        })
    </script>
@endpush --}}

@push('scripts')
    <script>
        $(document).ready(function() {
            // Handle country change event to load states
            $('.country').on('change', function() {
                let country_id = $(this).val();

                // Clear state and city dropdowns before loading new data
                $('.state').html('<option value="">Select</option>');
                $('.city').html('<option value="">Select</option>');

                if (country_id) {
                    $.ajax({
                        method: 'GET',
                        url: '{{ route('get-states', ':id') }}'.replace(":id", country_id),
                        success: function(response) {
                            let html = '<option value="">Select</option>';
                            if (response.length > 0) {
                                $.each(response, function(index, value) {
                                    html +=
                                        `<option value="${value.id}">${value.name}</option>`;
                                });
                            } else {
                                html = '<option value="">No states available</option>';
                            }
                            $('.state').html(html);
                        },
                        error: function(xhr, status, error) {
                            console.error("An error occurred while fetching states.");
                        }
                    });
                }
            });

            // Handle state change event to load cities
            $('.state').on('change', function() {
                let state_id = $(this).val();

                // Clear city dropdown before loading new data
                $('.city').html('<option value="">Select</option>');

                if (state_id) {
                    $.ajax({
                        method: 'GET',
                        url: '{{ route('get-cities', ':id') }}'.replace(":id", state_id),
                        success: function(response) {
                            let html = '<option value="">Select</option>';
                            if (response.length > 0) {
                                $.each(response, function(index, value) {
                                    html +=
                                        `<option value="${value.id}">${value.name}</option>`;
                                });
                            } else {
                                html = '<option value="">No cities available</option>';
                            }
                            $('.city').html(html);
                        },
                        error: function(xhr, status, error) {
                            console.error("An error occurred while fetching cities.");
                        }
                    });
                }
            });
        });
    </script>
@endpush
