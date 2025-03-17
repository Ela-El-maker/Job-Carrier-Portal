@extends('frontend.layouts.master')
@section('contents')
    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-header">
        <div class="container">

            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>search jobs ver. 2</h2>
                </div>
            </div>
            <!-- End of Page Title -->

            <!-- Start of Breadcrumb -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">home</a></li>
                        <li class="active">for canditates</li>
                    </ul>
                </div>
            </div>
            <!-- End of Breadcrumb -->
        </div>
    </section>
    <!-- =============== End of Page Header 1 Section =============== -->


    <!-- ===== Start of Main Wrapper Section ===== -->
    <section class="search-jobs ptb80" id="version4">
        <div class="container">

            <!-- Start of Form -->
            <form class="job-search-form row" action="#" method="get">

                <!-- Start of keywords input -->
                <div class="col-md-3 col-sm-12 search-keywords">
                    <label for="search-keywords">Keywords</label>
                    <input type="text" name="search-keywords" class="form-control" id="search-keywords"
                        placeholder="Keywords">
                </div>

                <!-- Start of category input -->
                <div class="col-md-3 col-sm-12 search-categories">
                    <label for="search-categories">Category</label>
                    <select name="search-categories" class="selectpicker" id="search-categories" data-live-search="true"
                        title="Any Category" data-size="5" data-container="body">
                        <option value="1">Accountance</option>
                        <option value="2">Banking</option>
                        <option value="3">Design & Art</option>
                        <option value="4">Developement</option>
                        <option value="5">Insurance</option>
                        <option value="6">IT Engineer</option>
                        <option value="7">Healthcare</option>
                        <option value="8">Marketing</option>
                        <option value="9">Management</option>
                    </select>
                </div>

                <!-- Start of location input -->
                <div class="col-md-4 col-sm-12 search-location">
                    <label for="search-location">Location</label>
                    <input type="text" name="search-location" class="form-control" id="search-location"
                        placeholder="Location">
                </div>

                <!-- Start of submit input -->
                <div class="col-md-2 col-sm-12 search-submit">
                    <button type="submit" class="btn btn-blue btn-effect"><i class="fa fa-search"></i>search</button>
                </div>

            </form>
            <!-- End of Form -->

            <!-- Start of Row -->
            <div class="row mt60">
                <div class="col-md-12">
                    <h4>Advanced Search. Find Matches</h4>
                    <hr style="border: 1px solid #e0e0e0; margin: 10px 0;"> <!-- Make the HR more visible -->

                </div>

                <!-- ===== Start of Job Sidebar ===== -->
                <div class="col-md-4 col-xs-12 job-post-sidebar">

                    <!-- Search Location -->

                    <!-- Job Types -->
                    <form action="{{ route('jobs.index') }}" method="GET">
                        <div class="job-categories mt30">
                            <div class="input-with-icon">
                                <input type="text" name="search" class="form-control" id="search-keywords"
                                    value="{{ request()?->search }}" placeholder="Search">
                                <i class="fas fa-search input-icon"></i> <!-- Font Awesome search icon -->
                            </div>
                        </div>

                        <div class="job-categories mt30">
                            <div class="select-wrapper">
                                <select name="country" class="selectpicker country" id="search-categories"
                                    data-live-search="true" title="Country" data-size="5" data-container="body">
                                    <option value="">Country</option>
                                    @foreach ($countries as $country)
                                        <option @selected(request()?->country == $country?->id) value="{{ $country?->id }}">
                                            {{ $country?->name }}</option>
                                    @endforeach
                                </select>
                                <i class="fas fa-globe select-icon"></i>
                            </div>
                        </div>

                        <div class="job-categories mt30">
                            <div class="select-wrapper">
                                <select name="state" class="form-control form-icons state" data-live-search="true"
                                    data-size="5" title="States" data-container="body">
                                    <option value="">All</option>
                                    @if ($selectedStates)
                                        @foreach ($selectedStates as $state)
                                            <option @selected($state->id == request()?->state) value="{{ $state?->id }}">
                                                {{ $state?->name }}</option>
                                        @endforeach
                                    @else
                                        <option value="">States</option>
                                    @endif
                                </select>
                                <i class="fas fa-map-marked-alt select-icon"></i>
                            </div>
                        </div>

                        <div class="job-categories mt30">
                            <div class="select-wrapper">
                                <select name="city" class="form-control form-icons city" data-live-search="true"
                                    data-size="5" title="Cities" data-container="body">

                                    <option value="">All</option>
                                    @if ($selectedCities)
                                        @foreach ($selectedCities as $city)
                                            <option @selected(request()?->city == $city?->id) value="{{ $city?->id }}">
                                                {{ $city?->name }}</option>
                                        @endforeach
                                    @else
                                        <option value="">Cities</option>
                                    @endif
                                </select>
                                <i class="fas fa-city select-icon"></i>
                            </div>
                        </div>
                        <div class="mt30 text-center">
                            <button class="sweet-button">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </div>
                    </form>



                    <form action="{{ route('jobs.index') }}" method="GET" id="filterForm">
                        <!-- Job Types -->
                        <div class="job-categories mt30">
                            <h4 class="pb20">Categories</h4>
                            <hr style="border: 1px solid #e0e0e0; margin: 10px 0;"> <!-- Make the HR more visible -->

                            <ul class="list-inline mt20">
                                @foreach ($jobCategories as $jobCategory)
                                    <li>
                                        <input type="checkbox" id="category-{{ $jobCategory?->id }}" name="category[]"
                                            value="{{ $jobCategory?->slug }}">
                                        <label for="category-{{ $jobCategory?->id }}">
                                            <span style="font-weight: 400;">{{ $jobCategory?->name }}</span>
                                            <span class="job-count">({{ $jobCategory?->jobs_count }})</span>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Job Types -->
                        <div class="job-types mt30">
                            <h4 style="font-weight: 600;">Job Type</h4> <!-- Reduce boldness of the heading -->
                            <hr style="border: 1px solid #e0e0e0; margin: 10px 0;"> <!-- Make the HR more visible -->
                            <ul class="list-inline mt20">
                                @foreach ($jobTypes as $jobType)
                                    <li>
                                        <input type="checkbox" id="job-type-{{ $jobType->id }}" name="jobtype[]"
                                            value="{{ $jobType->slug }}">
                                        <label for="job-type-{{ $jobType->id }}" style="font-weight: 400;">
                                            <!-- Reduce boldness of the label -->
                                            {{ $jobType->name }} <span>(24)</span>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Job Types -->

                        <br>

                        <div class="job-filter">
                            <!-- Hidden input with min_salary name -->
                            <input type="hidden" name="min_salary" id="min_salary" value="">

                            <div class="job-types mt30">
                                <div class="filter-option">
                                    <span class="filter-label">Filter by:</span>
                                    <hr>
                                    <div class="filter-toggle">
                                        <button type="button" class="toggle-btn active"
                                            id="salary-toggle">Salary</button>
                                        <button type="button" class="toggle-btn" id="rate-toggle">Rate</button>
                                    </div>
                                </div>

                                <!-- Salary Slider -->
                                <div class="slider-container" id="salary-slider">
                                    <div class="slider">
                                        <div class="slider-track"></div>
                                        <div class="slider-thumb"></div>
                                    </div>

                                    <div class="range-values">
                                        <span>$0</span>
                                        <span>$200,000</span>
                                    </div>

                                    <div class="salary-display">$3,000</div>
                                </div>

                                <!-- Rate Slider -->
                                <div class="slider-container hidden" id="rate-slider">
                                    <div class="slider">
                                        <div class="slider-track"></div>
                                        <div class="slider-thumb"></div>
                                    </div>

                                    <div class="range-values">
                                        <span>$0/hr</span>
                                        <span>$100/hr</span>
                                    </div>

                                    <div class="salary-display">$45/hr</div>
                                </div>
                            </div>

                        </div>

                        <div class="mt30 text-center">
                            <button class="sweet-button">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </div>
                    </form>

                    <!-- Advertisment -->
                    <div class="job-advert mt30">
                        <a href="#">
                            <img src="images/img/advert.jpg" class="img-responsive" alt="">
                        </a>
                    </div>

                </div>
                <!-- ===== End of Job Sidebar ===== -->

                <!-- ===== Start of Job Listings ===== -->
                <div class="col-md-8 col-xs-12">
                    @forelse ($jobs as $job)
                        <!-- ===== Start of Job Post Column 1 ===== -->
                        <div class="item-block shadow-hover mt20">

                            <!-- Start of Job Post Header -->
                            <div class="job-post-header clearfix">
                                <a href="{{ route('companies.show', $job?->company?->slug) }}">
                                    <img src="{{ asset($job?->company?->logo) }}" alt="">
                                </a>
                                <div>
                                    <a href="{{ route('jobs.show', $job?->slug) }}">
                                        <h4>{{ $job?->title }}</h4>
                                    </a>
                                    <h5><small>{{ $job?->company?->name }}</small></h5>
                                    @php
                                        $jobType = getJobTypeClassAndLabel($job?->jobType?->name);
                                    @endphp
                                    <a href="javascript:;" class="btn btn-small btn-effect {{ $jobType['class'] }}"
                                        style="margin-top: 10px;">
                                        {{ $jobType['label'] }}
                                    </a>
                                </div>

                                <ul class="pull-right">
                                    <li>
                                        <h6 class="time"><i class="fa fa-clock"></i>
                                            {{ $job->created_at->diffForHumans() }}</h6>
                                    </li>
                                    <li>
                                        <b>
                                            @if ($job?->is_featured)
                                                <a href="#" class="btn-small btn-effect featured"
                                                    style="padding: 10px; border-radius:5px;">Featured</a>
                                            @endif
                                            @if ($job?->is_highlighted)
                                                <a href="#" class="btn-small btn-effect highlighted"
                                                    style="padding: 10px; border-radius:5px;">Highlighted</a>
                                            @endif
                                        </b>
                                    </li>

                                    <li>
                                        <!-- Bookmark Icon -->
                                        <a href="#" class="bookmark-icon" data-job-id="{{ $job->id }}">
                                            <i class="far fa-bookmark"></i> <!-- Font Awesome bookmark icon -->
                                            <i class="fas fa-bookmark"></i> <!-- Font Awesome bookmark icon -->
                                        </a>
                                    </li>
                                </ul>

                            </div>
                            <!-- End of Job Post Header -->

                            <!-- Start of Job Post Body -->
                            <div class="job-post-body">
                                <ul>
                                    <li class="skills" style="padding-bottom: 10px;">
                                        @foreach ($job?->skills->shuffle() as $jobSkill)
                                            @if ($loop->iteration < 6)
                                                <a href="" class="btn btn-blue btn-effect mt20">
                                                    {{ $jobSkill?->skill?->name }}
                                                </a>
                                            @elseif ($loop->iteration == 6)
                                                <a class="btn btn-blue btn-effect mt20 job-skill" data-toggle="modal"
                                                    data-target="#skillsModal" href="javascript:void(0)">
                                                    More ...
                                                </a>
                                            @endif
                                        @endforeach
                                    </li>
                                </ul>
                            </div>
                            <!-- End of Job Post Body -->

                            <!-- Start of Job Post Footer -->
                            <div class="job-post-footer row">

                                <!-- Location -->
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <i class="fa fa-map-marker"></i>
                                    <span>{{ formatLocation($job?->company?->companyCountry?->name, $job?->company?->companyState?->name, $job?->company?->companyCity?->name) }}</span>
                                </div>

                                <!-- Years of Experience -->
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <i class="fa fa-briefcase"></i>
                                    <span>{{ $job?->jobExperience?->name }}</span>
                                </div>

                                <!-- Salary -->
                                @if ($job?->salary_mode === 'range')
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <i class="fa fa-money"></i>
                                        <span>{{ $job?->min_salary }} - {{ $job?->max_salary }}
                                            /
                                            {{ $job?->salaryType?->name }}</span>
                                    </div>
                                @else
                                    <div class="col-lg-7 col-7">
                                        <span class="card-text-price">
                                            {{ $job?->custom_salary }} / {{ $job?->salaryType?->name }}
                                        </span>
                                        <span class="text-muted">

                                        </span>
                                    </div>
                                @endif
                            </div>
                            <!-- End of Job Post Footer -->

                        </div>
                        <!-- ===== End of Job Post Column 1 ===== -->
                    @empty
                        <!-- Fallback message if no jobs are available -->
                        <div class="col-md-12">
                            <div class="alert alert-info">
                                No jobs available at the moment. Please check back later!
                            </div>
                        </div>
                    @endforelse
                </div>
                <!-- ===== End of Job Listings ===== -->
            </div>
        </div>
    </section>
    <!-- ===== End of Main Wrapper Section ===== -->
@endsection
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
                                html = `<option value="">No states available</option>`;
                            }
                            html = ` <option value="">Choose</option>` + html;
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
                                html = `<option value="">No cities available</option>`;
                            }
                            html = ` <option value="">Choose</option>` + html;
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
