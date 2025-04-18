@extends('frontend.layouts.master')
@section('contents')
    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-header">
        <div class="container">

            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>search jobs </h2>
                </div>
            </div>
            <!-- End of Page Title -->

            <!-- Start of Breadcrumb -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">home</a></li>
                        <li class="active">Available Jobs</li>
                    </ul>
                </div>
            </div>
            <!-- End of Breadcrumb -->
        </div>
    </section>
    <!-- =============== End of Page Header 1 Section =============== -->
    @php
        $bookmarked = \App\Models\JobBookmark::where('candidate_id', auth()->user()?->candidateProfile?->id)
            ->pluck('job_id')
            ->toArray();
        // dd($bookmarked);
    @endphp

    <!-- ===== Start of Main Wrapper Section ===== -->
    <section class="search-jobs ptb80" id="version4">
        <div class="container">



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
                                        <input type="checkbox" id="job-type-{{ $jobType?->id }}" name="jobtype[]"
                                            value="{{ $jobType?->slug }}">
                                        <label for="job-type-{{ $jobType?->id }}" style="font-weight: 400;">
                                            <!-- Reduce boldness of the label -->
                                            {{ $jobType?->name }}
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
                                        <h4>{{ Str::limit($job?->title, 27, '...') }}</h4>
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
                                        <a href="javascript:;" class="bookmark-icon job-bookmark"
                                            data-id="{{ $job?->id }}">


                                            @if (in_array($job?->id, $bookmarked))
                                                <i class="fas fa-bookmark"></i> <!-- Font Awesome bookmark icon -->
                                            @else
                                                <i class="far fa-bookmark"></i> <!-- Font Awesome bookmark icon -->
                                            @endif

                                        </a>
                                    </li>
                                </ul>

                            </div>
                            <!-- End of Job Post Header -->

                            <!-- Start of Job Post Body -->
                            <div class="job-post-body" style="padding: 1px">
                                <ul>
                                    <li class="skills" style="padding-bottom: 5px; margin-bottom: 5px;">
                                        @foreach ($job?->skills->shuffle() as $index => $jobSkill)
                                            @if ($index < 5)
                                                <a href="" class="btn btn-blue btn-effect mt20"
                                                    style="font-size: 0.85rem; padding: 5px 10px;">
                                                    {{ $jobSkill?->skill?->name }}
                                                </a>
                                            @elseif ($index == 5)
                                                <a class="btn btn-blue btn-effect mt20 job-skill" data-toggle="modal"
                                                    data-target="#skillsModal" href="javascript:void(0)"
                                                    style="font-size: 0.85rem; padding: 5px 10px;">
                                                    {{ count($job->skills) - 5 }} more
                                                </a>
                                            @endif
                                        @endforeach
                                    </li>
                                </ul>
                            </div>
                            <!-- End of Job Post Body -->
                            <div
                                style="
                                    display: flex;
                                    justify-content: space-between;
                                    align-items: center;
                                    padding: 12px 0;
                                    border-top: 1px solid #eee;
                                    margin-top: 15px;
                                    font-size: 14px;
                                    color: #555;
                                    flex-wrap: wrap;
                                        ">
                                <!-- Location - Left Side -->
                                <div
                                    style="flex: 1; min-width: 120px; padding: 0 5px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    <i class="fa fa-map-marker" style="color: #38b2ac; margin-right: 5px;"></i>
                                    <span>{{ formatLocation($job?->company?->companyCountry?->name, $job?->company?->companyState?->name, $job?->company?->companyCity?->name) }}</span>
                                </div>

                                <!-- Years of Experience - Center -->
                                <div
                                    style="flex: 1; min-width: 120px; padding: 0 5px; text-align: center; white-space: nowrap;">
                                    <i class="fa fa-briefcase" style="color: #38b2ac; margin-right: 5px;"></i>
                                    <span>{{ $job?->jobExperience?->name }}</span>
                                </div>

                                <!-- Salary - Right Side -->
                                <div
                                    style="flex: 1; min-width: 120px; padding: 0 5px; text-align: right; white-space: nowrap;">
                                    @if ($job?->salary_mode === 'range')
                                        <i class="fa fa-money" style="color: #38b2ac; margin-right: 5px;"></i>
                                        <span>{{ $job?->min_salary }} - {{ $job?->max_salary }} /
                                            {{ $job?->salaryType?->name }}</span>
                                    @else
                                        <i class="fa fa-money" style="color: #38b2ac; margin-right: 5px;"></i>
                                        <span>{{ $job?->custom_salary }} / {{ $job?->salaryType?->name }}</span>
                                    @endif
                                </div>
                            </div>

                            <style>
                                @media (max-width: 600px) {
                                    .job-post-footer>div {
                                        flex: 100% !important;
                                        text-align: left !important;
                                        margin-bottom: 8px;
                                        min-width: 100% !important;
                                    }

                                    .job-post-footer>div:last-child {
                                        margin-bottom: 0;
                                    }
                                }
                            </style>

                        </div>
                        <!-- ===== End of Job Post Column 1 ===== -->
                    @empty
                        <div class="col-12">
                            <div class="empty-jobs-container text-center py-5 my-4">
                                <div class="empty-state-icon mb-4">
                                    <img src="{{ asset('frontend/default-uploads/employees-tired.svg') }}"
                                        alt="No jobs found" class="img-fluid" style="max-width: 450px;">
                                </div>
                                <h3 class="font-bold mb-3">No Job Listings Found</h3>
                                <p class="text-muted mb-4">We couldn't find any job openings matching your current
                                    filters. Try adjusting your search criteria or explore our popular categories below.</p>
                                <div class="empty-state-actions d-flex justify-content-center gap-3 flex-wrap">
                                    <a href="{{ route('jobs.index') }}" class="btn btn-outline">
                                        <i class="fas fa-filter me-2"></i> Clear All Filters
                                    </a>
                                    <a href="{{ route('company.jobs.create') }}" class="btn btn-default"
                                        style="background-color: #ff6b6b; color: white; border: none;margin-left: 20px;padding: 12px;">
                                        <i class="fas fa-plus me-2"></i> Post a Job
                                    </a>
                                </div>

                                <div class="job-suggestions mt-5">
                                    <h5 class="font-medium mb-3">Popular Categories</h5>
                                    <div class="suggested-searches d-flex flex-wrap justify-content-center gap-2 mt-3">
                                        @foreach ($popularCategories as $category)
                                            <a href="{{ route('jobs.index', ['category' => $category?->slug]) }}"
                                                class="badge rounded-pill px-3 py-2"
                                                style="background-color: rgba(18, 144, 121, 0.1); color: #129079; text-decoration: none; font-weight: normal;">
                                                {{ $category->name }}
                                            </a>
                                        @endforeach

                                        @foreach ($popularJobTypes as $type)
                                            <a href="{{ route('jobs.index', ['jobtype' => $type->slug]) }}"
                                                class="badge rounded-pill px-3 py-2"
                                                style="background-color: rgba(18, 144, 121, 0.1); color: #129079; text-decoration: none; font-weight: normal;">
                                                {{ $type->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
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

            $('.job-bookmark').on('click', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                $.ajax({
                    method: 'GET',
                    url: '{{ route('job.bookmark', ':id') }}'.replace(":id", id),
                    data: {},
                    beforeSend: function() {

                    },
                    success: function(response) {
                        $('.job-bookmark').each(function() {
                            let elementId = $(this).data('id');
                            if (elementId == response.id) {
                                $(this).find('i').addClass('fas fa-bookmark');
                            }
                        });
                        notyf.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr);
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(index, value) {
                            // alert(value[0]);
                            // console.log(value);
                            notyf.error(value[index]);
                        });
                    }
                })
            });
        });
    </script>
@endpush
