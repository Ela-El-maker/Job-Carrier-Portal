@extends('frontend.layouts.master')
@section('contents')
    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-header">
        <div class="container">

            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>companies</h2>
                </div>
            </div>
            <!-- End of Page Title -->

            <!-- Start of Breadcrumb -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">home</a></li>
                        <li class="active">Companies</li>
                    </ul>
                </div>
            </div>
            <!-- End of Breadcrumb -->

        </div>
    </section>
    <!-- =============== End of Page Header 1 Section =============== -->






    <!-- Start of Main Wrapper Companies Section -->
    <section class="ptb80" id="companies">
        <div class="container">
            <div class="row mt-60">
                <!-- Sidebar -->
                <div class="col-md-3 col-xs-12 job-post-sidebar">
                    <!-- Sidebar content remains unchanged -->

                    <!-- Search Location -->

                    <!-- Job Types -->
                    <form action="{{ route('companies.index') }}" method="GET">
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

                    <form action="{{ route('companies.index') }}" method="GET" id="filterForm">
                        <!-- Job Types -->
                        <div class="job-industries mt60">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4>Industry Types</h4>
                                <span class="text-muted small">Select one</span>
                            </div>

                            <div class="section-divider"></div>

                            <div class="industry-types-list">
                                @foreach ($industryTypes as $type)
                                    <div class="industry-type-item">
                                        <input type="radio" @checked($type?->slug == request()?->industry)
                                            id="industry-{{ $type?->id }}" name="industry" value="{{ $type?->slug }}">
                                        <label for="industry-{{ $type?->id }}">
                                            {{ $type?->name }} <span
                                                class="industry-count">({{ $type?->companies_count }})</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Organizations Section -->
                        <div class="filter-section mt30">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4>Organizations</h4>
                                <span class="text-muted small">Select one</span>
                            </div>

                            <div class="section-divider"></div>

                            <div class="organization-list">
                                @foreach ($organizations as $type)
                                    <div class="organization-item">
                                        <label>
                                            <input @checked($type?->slug == request()->organization) type="radio" name="organization"
                                                value="{{ $type?->slug }}">
                                            <span class="organization-name">{{ $type?->name }}</span>
                                            <span class="organization-count">{{ $type?->companies_count }}</span>
                                        </label>
                                    </div>
                                @endforeach
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

                <div class="col-md-9">
                    @if (request()->has('search') ||
                            request()->has('country') ||
                            request()->has('state') ||
                            request()->has('city') ||
                            request()->has('industry') ||
                            request()->has('organization'))
                        <!-- Start of Search Results -->
                        <div class="search-results-header">
                            <h3>Search Results</h3>
                            <p>Found {{ $paginatedCompanies->total() }} companies matching your criteria</p>
                            <div class="section-divider"></div>
                        </div>

                        <!-- Start of Companies Grid for Search Results -->
                        <!-- Companies Grid for Search Results -->
                        <div class="company-grid mt30">
                            @forelse($paginatedCompanies as $company)
                                <div class="company-card">
                                    <a href="{{ route('companies.show', $company?->slug) }}">
                                        <div class="company-card-header">
                                            <div class="company-logo-container">
                                                <img src="{{ $company->logo ?? 'images/default-company-logo.png' }}"
                                                    alt="{{ $company->name }}" class="img-responsive company-logo">
                                            </div>
                                        </div>
                                        <div class="company-card-body">
                                            <h4 class="company-title">{{ $company->name }}</h4>
                                            <div class="company-jobs">
                                                <span class="badge badge-primary">
                                                    {{ $company->jobs_count }} Open
                                                    Position{{ $company->jobs_count != 1 ? 's' : '' }}
                                                </span>
                                            </div>
                                            <div class="company-meta">
                                                @if ($company->industryType)
                                                    <div class="meta-item">
                                                        <i class="fas fa-industry meta-icon"></i>
                                                        <span>{{ $company->industryType->name }}</span>
                                                    </div>
                                                @endif
                                                @if ($company->city && $company->state)
                                                    <div class="meta-item">
                                                        <i class="fas fa-map-marker-alt meta-icon"></i>
                                                        <span>{{ $company->city }}, {{ $company->state }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="company-card-footer">
                                            <span class="view-profile">
                                                View Profile <i class="fas fa-arrow-right"></i>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            @empty
                                <div class="no-companies-found text-center">
                                    <div class="no-companies-content">
                                        <img src="{{ asset('frontend/default-uploads/man-with-company.svg') }}"
                                            alt="No companies found" class="no-results-image">
                                        <h3 class="mt-3">No Companies Found</h3>
                                        <p class="text-muted">We couldn't find any companies matching your search. Try
                                            adjusting your filters or search terms.</p>
                                        <a href="{{ route('companies.index') }}" class="btn btn-primary mt-3">
                                            <i class="fas fa-undo"></i> Reset Search
                                        </a>
                                    </div>
                                </div>
                            @endforelse
                        </div>


                        <!-- Pagination for search results -->
                        <div class="pagination-container mt30">
                            {{ $paginatedCompanies->appends(request()->query())->links() }}
                        </div>
                    @else
                        <!-- Start of Company Letters - Only show when not searching -->
                        <div class="company-letters">
                            @foreach (range('A', 'Z') as $letter)
                                <a href="#{{ $letter }}">{{ $letter }}</a>
                            @endforeach
                        </div>
                        <!-- End of Company Letters -->

                        <!-- Start of Companies A-Z View -->
                        <div class="row companies-grid mt60">
                            @foreach (range('A', 'Z') as $letter)
                                <!-- Company Group -->
                                <div class="col-md-4 col-sm-6 col-xs-12 company-group">
                                    <div id="{{ $letter }}" class="company-letter">
                                        <h4>{{ $letter }}</h4>
                                    </div>

                                    <!-- Companies -->
                                    <ul class="nopadding">
                                        @forelse($companiesByLetter[$letter] ?? [] as $company)
                                            <li class="company-name">
                                                <a href="{{ route('companies.show', $company?->slug) }}">
                                                    {{ $company?->name }} ({{ $company?->jobs_count }})
                                                </a>
                                            </li>
                                        @empty
                                            <li class="company-name">
                                                No companies available under "{{ $letter }}".
                                            </li>
                                        @endforelse
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                        <!-- End of Companies -->
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- ===== End of Main Wrapper Companies Section ===== -->
    <!-- ===== End of Main Wrapper Companies Section ===== -->




    <!-- ===== Start of Get Started Section ===== -->
    <section class="get-started ptb40">
        <div class="container">
            <div class="row ">

                <!-- Column -->
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <h3 class="text-white">20,000+ People trust Cariera! Be one of them today.</h3>
                </div>

                <!-- Column -->
                <div class="col-md-2 col-sm-3 col-xs-12">
                    <a href="#" class="btn btn-blue btn-effect">get start now</a>
                </div>

            </div>
        </div>
    </section>
    <!-- ===== End of Get Started Section ===== -->
@endsection
