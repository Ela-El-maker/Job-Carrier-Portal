@extends('frontend.layouts.master')
@section('contents')
    <style>
        .vertical-line {
            border-left: 2px solid #000;
            height: 100%;
            margin: 0 15px;
        }

        /* Constrain the dropdown width */
        .bootstrap-select .dropdown-menu {
            max-width: 250px !important;
            /* Adjust this value to match your col-3 width */
            width: 100% !important;
        }

        /* Handle long text in dropdown options */
        .bootstrap-select .dropdown-menu .text {
            white-space: normal;
            word-break: break-word;
        }

        /* Ensure the dropdown doesn't expand beyond the container */
        .bootstrap-select.show-tick .dropdown-menu .selected span.check-mark {
            right: 10px;
        }

        /* Customize the Select All button to be blue */
        .bootstrap-select .bs-actionsbox .btn-group button.actions-btn.bs-select-all {
            background-color: #3498db;
            color: white;
            border-color: #2980b9;
        }

        .bootstrap-select .bs-actionsbox .btn-group button.actions-btn.bs-select-all:hover {
            background-color: #2980b9;
        }

        /* Customize the Deselect All button to be red */
        .bootstrap-select .bs-actionsbox .btn-group button.actions-btn.bs-deselect-all {
            background-color: #e74c3c;
            color: white;
            border-color: #c0392b;
        }

        .bootstrap-select .bs-actionsbox .btn-group button.actions-btn.bs-deselect-all:hover {
            background-color: #c0392b;
        }
    </style>
    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-header" id="find-candidate">
        <div class="container">

            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>Find Candidates</h2>
                </div>
            </div>
            <!-- End of Page Title -->

            <!-- Start of Breadcrumb -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">home</a></li>
                        <li class="active">for Candidates</li>
                    </ul>
                </div>
            </div>
            <!-- End of Breadcrumb -->

        </div>
    </section>
    <!-- =============== End of Page Header 1 Section =============== -->

    <!-- ===== Start of Main Wrapper Section ===== -->
    <section class="find-candidate ptb80" id="version2">
        <div class="container">

            <!-- Start of Row -->
            <div class="row mt60">

                <!-- Sidebar -->
                <div class="col-md-3 col-xs-12 job-post-sidebar">

                    <form action="{{ route('candidates.index') }}" method="GET">
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

                    <div class="section-divider"></div>


                    <form action="{{ route('candidates.index') }}" method="GET" id="filterForm">

                        <!-- Skills Section -->
                        <div class="filter-block mb-30">
                            <div class="d-flex justify-content-between align-items-center mb-15">
                                <h5 class="medium-heading">Skills</h5>
                                <span class="font-xs color-text-mutted">Select skills</span>
                            </div>

                            <div class="sidebar-border-bottom mb-20"></div>

                            <div class="skills-selection">
                                <select class="form-control selectpicker custom-actions-buttons" name="skills[]" multiple
                                    data-live-search="true" data-actions-box="true" data-selected-text-format="count > 2"
                                    data-size="8" data-width="100%" data-dropdown-align-right="auto" data-container="body">

                                    @foreach ($skills as $skill)
                                        <option value="{{ $skill->slug }}" @selected(in_array($skill->slug, request()->skills ?? []))>
                                            {{ $skill->name }}
                                        </option>
                                    @endforeach
                                </select>
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


                <!-- Start of Candidate Main -->
                <div class="col-md-9 candidate-main">

                    <!-- Start of Candidates Wrapper -->
                    <div class="candidate-wrapper">

                        <!-- ===== Start of Single Candidate 1 ===== -->
                        @forelse ($candidates as $candidate)
                            <div class="single-candidate row shadow-hover" style="margin-bottom: 20px;">

                                <!-- Candidate Image -->
                                <div class="col-md-2 col-xs-3">
                                    <div class="candidate-img">
                                        <a href="{{ route('candidates.show', $candidate?->slug) }}">
                                            <img src="{{ asset($candidate?->image) }}" class="img-responsive"
                                                alt="">
                                        </a>
                                    </div>
                                </div>

                                <!-- Start of Candidate Name, Line & Skills -->
                                <div class="col-md-8 col-xs-6 ptb20">
                                    <div class="d-flex align-items-start" style="height: 100%;">

                                        <!-- Candidate Name and Status -->
                                        <div>
                                            <!-- Candidate Name -->
                                            <div class="candidate-name">
                                                <a href="{{ route('candidates.show', $candidate?->slug) }}">
                                                    <h5>{{ $candidate?->full_name }}</h5>
                                                </a>
                                            </div>

                                            <!-- Candidate Status -->
                                            @if ($candidate?->status === 'available')
                                                <p class="font-sm color-text-paragraph-2"><b>I am available.</b></p>
                                            @else
                                                <p class="font-sm color-text-paragraph-2"><b>I am not available.</b></p>
                                            @endif
                                        </div>

                                        <!-- Vertical Line (Pipe) -->
                                        <div class="vertical-line"
                                            style="border-left: 2px solid #000; height: 100%; margin: 0 15px;"></div>

                                        <!-- Skills -->
                                        <div class="skills">
                                            @foreach ($candidate->skills as $candidateSkill)
                                                @if ($loop->index <= 5)
                                                    <span class="badge badge-secondary">
                                                        {{ $candidateSkill->skill?->name }}
                                                    </span>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Candidate Info -->
                                    <div class="candidate-info mt5">
                                        <ul class="list-inline">
                                            <li>
                                                <span>
                                                    <i class="fa fa-briefcase"></i>
                                                    {{ $candidate?->title }}
                                                </span>
                                            </li>
                                            <li>
                                                <span>
                                                    <i class="fa fa-map-marker"></i>
                                                    {{ $candidate?->candidateCity?->name ? '' . $candidate?->candidateCity?->name : ' ' }}
                                                    {{ $candidate?->candidateState?->name ? ', ' . $candidate?->candidateState?->name : '' }}
                                                    {{ $candidate?->candidateCountry?->name ? ', ' . $candidate?->candidateCountry?->name : '' }}
                                                </span>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <!-- CTA -->
                                <div class="col-md-2 col-xs-3">
                                    <div class="candidate-cta ptb30">
                                        <a href="{{ route('candidates.show', $candidate?->slug) }}"
                                            class="btn btn-blue btn-small btn-effect">hire
                                            me</a>
                                    </div>
                                </div>

                            </div>
                        @empty
                            <div
                                class="no-candidates text-center p-8 my-6 bg-pink-50 rounded-lg shadow-sm border border-pink-100">
                                <img src="{{ asset('frontend/default-uploads/remote-work.svg') }}" alt="No candidates"
                                    style="height: 400px; width:400px" class="mx-auto mb-4" />
                                <h4 class="text-xl font-semibold text-pink-700 mb-2">Oops! No candidates yet</h4>
                                <p class="text-purple-600 mb-4">We haven't found any matching candidates for you right now.
                                </p>
                                <div class="flex justify-center space-x-4">
                                    <a href="{{ route('candidates.index') }}" class="btn btn-primary mt-3">
                                        <i class="fas fa-undo"></i> Reset Search
                                    </a>
                                </div>
                                <p class="text-sm text-pink-400 mt-6">
                                    Adjust your search or check back soon for new candidates!
                                </p>
                            </div>
                        @endforelse
                        <!-- ===== End of Single Candidate 1 ===== -->

                    </div>
                    <!-- End of Candidates Wrapper -->

                    <!-- Start of Pagination -->
                    <div class="col-md-12 mt10">
                        @if ($candidates?->hasPages())
                            {{ $candidates->withQueryString()->links() }}
                        @endif
                    </div>
                    <!-- End of Pagination -->

                </div>
                <!-- End of Candidate Main -->

            </div>
            <!-- End of Row -->

        </div>
    </section>
    <!-- ===== End of Main Wrapper Section ===== -->
@endsection
