@extends('frontend.layouts.master')
@section('contents')

    <!-- CSS for professional scrollable feature -->
    <style>
        /* Scrollable container styles */
        .sidebar-scrollable {
            max-height: 85vh;
            /* Adjust height as needed */
            overflow-y: auto;
            padding-right: 10px;
            /* Space for the scrollbar */
            position: relative;

            /* Smooth scrolling */
            scroll-behavior: smooth;

            /* Custom scrollbar styling for webkit browsers (Chrome, Safari, Edge, etc.) */
            &::-webkit-scrollbar {
                width: 6px;
                background: transparent;
            }

            &::-webkit-scrollbar-track {
                background: rgba(240, 240, 240, 0.8);
                border-radius: 10px;
                margin: 5px 0;
            }

            &::-webkit-scrollbar-thumb {
                background: rgba(180, 180, 180, 0.8);
                border-radius: 10px;
                transition: background 0.3s ease;
            }

            &::-webkit-scrollbar-thumb:hover {
                background: rgba(140, 140, 140, 0.9);
            }

            /* For Firefox */
            scrollbar-width: thin;
            scrollbar-color: rgba(180, 180, 180, 0.8) rgba(240, 240, 240, 0.8);
        }

        /* Add subtle shadow to indicate scrollable content */
        .job-post-sidebar {
            position: relative;
        }

        .job-post-sidebar::after {
            content: '';
            display: block;
            position: absolute;
            bottom: 0;
            left: 15px;
            right: 15px;
            height: 40px;
            background: linear-gradient(to top, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 0) 100%);
            pointer-events: none;
            opacity: 0.8;
            z-index: 1;
        }

        .job-post-sidebar::before {
            content: '';
            display: block;
            position: absolute;
            top: 0;
            left: 15px;
            right: 15px;
            height: 40px;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 0) 100%);
            pointer-events: none;
            opacity: 0.8;
            z-index: 1;
        }

        /* Add subtle visual indicator for overflow */
        .sidebar-scrollable:after {
            content: '';
            display: block;
            width: 30px;
            height: 30px;
            background-color: rgba(0, 0, 0, 0.05);
            position: absolute;
            right: 10px;
            bottom: 10px;
            border-radius: 50%;
            backdrop-filter: blur(2px);
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23555' viewBox='0 0 16 16'%3E%3Cpath d='M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: center;
            z-index: 2;
        }

        .sidebar-scrollable:not(:hover):after {
            opacity: 0.7;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: translateY(0);
                opacity: 0.7;
            }

            50% {
                transform: translateY(-5px);
                opacity: 1;
            }

            100% {
                transform: translateY(0);
                opacity: 0.7;
            }
        }

        /* Smooth transition when hovering elements in the sidebar */
        .job-post-sidebar .job-categories,
        .job-post-sidebar .job-types,
        .job-post-sidebar .job-filter,
        .job-post-sidebar .job-advert {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .job-post-sidebar .job-categories:hover,
        .job-post-sidebar .job-types:hover,
        .job-post-sidebar .job-filter:hover,
        .job-post-sidebar .job-advert:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        /* Add a subtle transition effect on scroll */
        @media (min-width: 768px) {
            .sidebar-scrollable>* {
                opacity: 0.85;
                transition: opacity 0.3s ease;
            }

            .sidebar-scrollable>*:hover,
            .sidebar-scrollable>*:focus-within {
                opacity: 1;
            }
        }

        /* Position relative for proper badge positioning */
        .item-block {
            position: relative;
            overflow: hidden;
        }

        /* Golden job badge styling */
        .golden-job-badge {
            position: absolute;
            top: 15px;
            right: -35px;
            background-color: #FFD700;
            color: #000;
            font-weight: bold;
            font-size: 12px;
            z-index: 2;
            transform: rotate(45deg);
            padding: 5px 40px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .golden-job-badge i {
            margin-right: 3px;
        }

        /* Company logo styling */
        .company-logo {
            display: inline-block;
            width: 60px;
            height: 60px;
            overflow: hidden;
            float: left;
            margin-right: 15px;
        }

        .company-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        /* Job title container */
        .job-title-container {
            float: left;
            max-width: calc(100% - 200px);
        }

        /* Job meta (right side items) */
        .job-meta {
            display: flex;
            align-items: center;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .job-meta li {
            margin-left: 10px;
        }

        /* Fix for the job details footer */
        .job-details-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 15px;
            border-top: 1px solid #eee;
            margin-top: 15px;
            font-size: 14px;
            color: #555;
            flex-wrap: wrap;
            gap: 5px;
        }

        .job-detail-item {
            flex: 1;
            min-width: 110px;
            display: flex;
            align-items: center;
        }

        .job-detail-item i {
            color: #38b2ac;
            margin-right: 5px;
            min-width: 15px;
            text-align: center;
        }

        .detail-text {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100%;
        }

        .location-item {
            text-align: left;
        }

        .experience-item {
            text-align: center;
            justify-content: center;
        }

        .salary-item {
            text-align: right;
            justify-content: flex-end;
        }

        /* Responsive adjustments */
        @media (max-width: 767px) {
            .job-details-footer {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

            .job-detail-item {
                width: 100%;
            }

            .experience-item,
            .salary-item {
                justify-content: flex-start;
            }

            .job-title-container {
                max-width: 100%;
                float: none;
                margin-top: 10px;
            }

            .job-meta {
                float: none;
                margin-top: 15px;
                justify-content: flex-start;
            }

            .job-meta li:first-child {
                margin-left: 0;
            }
        }

        /* For medium screens where things might still wrap */
        @media (min-width: 768px) and (max-width: 991px) {
            .detail-text {
                font-size: 13px;
            }

            .job-detail-item {
                min-width: 100px;
            }
        }
    </style>
    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-header" style="padding-top: 200px;">
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



                <!-- ===== Start of Job Sidebar with Scrollable Feature ===== -->
                <div class="col-md-4 col-xs-12 job-post-sidebar">
                    <!-- Scrollable container wrapper -->
                    <div class="sidebar-scrollable">
                        <!-- Original sidebar content - unchanged -->
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
                                            <span>{{ config('settings.site_currency_icon') }}0</span>
                                            <span>{{ config('settings.site_currency_icon') }}200,000</span>
                                        </div>

                                        <div class="salary-display">{{ config('settings.site_currency_icon') }}3,000</div>
                                    </div>

                                    <!-- Rate Slider -->
                                    <div class="slider-container hidden" id="rate-slider">
                                        <div class="slider">
                                            <div class="slider-track"></div>
                                            <div class="slider-thumb"></div>
                                        </div>

                                        <div class="range-values">
                                            <span>{{ config('settings.site_currency_icon') }}0/hr</span>
                                            <span>{{ config('settings.site_currency_icon') }}100/hr</span>
                                        </div>

                                        <div class="salary-display">{{ config('settings.site_currency_icon') }}45/hr</div>
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
                </div>
                <!-- ===== End of Job Sidebar ===== -->



                <!-- ===== Start of Job Listings ===== -->
                <div class="col-md-8 col-xs-12">

                    @forelse ($jobs as $job)
                        <!-- ===== Start of Job Post Column 1 ===== -->
                        <!-- ===== Start of Job Post Column 1 ===== -->
                        <div class="item-block shadow-hover mt20 position-relative"
                            @if ($job->is_golden) style="border: 2px solid #FFD700; background-color: #FFF9E6;" @endif>

                            <!-- Golden job ribbon (only shown if job is golden) - Repositioned and restyled -->
                            @if ($job->is_golden)
                                <div class="golden-job-badge">
                                    <span><i class="fas fa-medal"></i> Premium</span>
                                </div>
                            @endif

                            <!-- Start of Job Post Header -->
                            <div class="job-post-header clearfix">
                                <a href="{{ route('companies.show', $job?->company?->slug) }}" class="company-logo">
                                    <img src="{{ asset($job?->company?->logo) }}"
                                        alt="{{ $job?->company?->name }} logo">
                                </a>
                                <div class="job-title-container">
                                    <a href="{{ route('jobs.show', $job?->slug) }}">
                                        <h4 @if ($job->is_golden) style="color: #D4AF37;" @endif>
                                            {{ Str::limit($job?->title, 27, '...') }}
                                        </h4>
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
                                                <i class="fas fa-bookmark"></i>
                                            @else
                                                <i class="far fa-bookmark"></i>
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
                                style="display: flex; justify-content: space-between; align-items: center; padding: 12px 0; border-top: 1px solid #eee; margin-top: 15px; font-size: 14px; color: #555; flex-wrap: wrap;">
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
                                <div class="job-detail-item salary-item">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                    <span class="detail-text">
                                        @if ($job?->salary_mode === 'range')
                                            {{ $job?->min_salary }} - {{ $job?->max_salary }} /
                                            {{ $job?->salaryType?->name }}
                                        @else
                                            {{ $job?->custom_salary }} / {{ $job?->salaryType?->name }}
                                        @endif
                                    </span>
                                </div>
                            </div>
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
                                <!-- Action Buttons -->
                                <div class="empty-state-actions row justify-content-center mt-4">
                                    <div class="mb-5">
                                        <a href="{{ route('jobs.index') }}" class="btn btn-outline">
                                            <i class="fas fa-filter me-2"></i> Clear All Filters
                                        </a>
                                        <a href="{{ route('company.jobs.create') }}" class="btn"
                                            style="background-color: #ff6b6b; color: white;">
                                            <i class="fas fa-plus me-2"></i> Post a Job
                                        </a>
                                    </div>
                                </div>

                                <!-- Popular Categories -->
                                <div class="job-suggestions mt-5 text-center">
                                    <div class="mt-5">
                                        <h5 class="mb-3">Popular Categories</h5>
                                        <div class="text-center">
                                            @foreach ($popularCategories as $category)
                                                <a href="{{ route('jobs.index', ['category' => $category?->slug]) }}"
                                                    class="label label-default"
                                                    style="background-color: rgba(18, 144, 121, 0.1); color: #129079; margin: 5px; display: inline-block; padding: 6px 12px; border-radius: 50px;">
                                                    {{ $category->name }}
                                                </a>
                                            @endforeach

                                            @foreach ($popularJobTypes as $type)
                                                <a href="{{ route('jobs.index', ['jobtype' => $type->slug]) }}"
                                                    class="label label-default"
                                                    style="background-color: rgba(18, 144, 121, 0.1); color: #129079; margin: 5px; display: inline-block; padding: 6px 12px; border-radius: 50px;">
                                                    {{ $type->name }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    @endforelse


                    <!-- Pagination -->
                    <div class="pagination-container">
                        <div class="pagination-info">
                            Showing <span>{{ $jobs->firstItem() ?? 0 }}-{{ $jobs->lastItem() ?? 0 }}</span> of
                            <span>{{ $jobs->total() }}</span> jobs
                        </div>

                        @if ($jobs->hasPages())
                            <div class="pagination">
                                {{-- Previous --}}
                                <a href="{{ $jobs->previousPageUrl() ?? '#' }}"
                                    class="{{ $jobs->onFirstPage() ? 'disabled' : '' }}">&laquo;</a>

                                {{-- Pages --}}
                                @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
                                    <a href="{{ $url }}"
                                        class="{{ $page == $jobs->currentPage() ? 'active' : '' }}">{{ $page }}</a>
                                @endforeach

                                {{-- Next --}}
                                <a href="{{ $jobs->nextPageUrl() ?? '#' }}"
                                    class="{{ !$jobs->hasMorePages() ? 'disabled' : '' }}">&raquo;</a>
                            </div>
                        @endif
                    </div>

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
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.querySelector('.sidebar-scrollable');

            if (sidebar) {
                // Show/hide scroll indicator based on scroll position
                sidebar.addEventListener('scroll', function() {
                    const isAtBottom = sidebar.scrollHeight - sidebar.scrollTop <= sidebar.clientHeight +
                        50;
                    const scrollIndicator = sidebar.querySelector(':after');

                    if (scrollIndicator) {
                        if (isAtBottom) {
                            sidebar.style.setProperty('--scroll-indicator-opacity', '0');
                        } else {
                            sidebar.style.setProperty('--scroll-indicator-opacity', '0.7');
                        }
                    }
                });

                // Add scroll to top functionality
                const scrollToTop = document.createElement('div');
                scrollToTop.className = 'scroll-to-top';
                scrollToTop.innerHTML = '<i class="fas fa-arrow-up"></i>';
                scrollToTop.style.cssText = `
            position: absolute;
            bottom: 20px;
            right: 20px;
            width: 40px;
            height: 40px;
            background: rgba(0,0,0,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 3;
        `;

                sidebar.appendChild(scrollToTop);

                sidebar.addEventListener('scroll', function() {
                    if (sidebar.scrollTop > 300) {
                        scrollToTop.style.opacity = '1';
                    } else {
                        scrollToTop.style.opacity = '0';
                    }
                });

                scrollToTop.addEventListener('click', function() {
                    sidebar.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            }
        });
    </script>
@endpush
