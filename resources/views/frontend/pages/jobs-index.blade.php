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
    {{-- <section class="search-jobs ptb80" id="version4">
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
                    <h4>We found 234 matches.</h4>
                </div>


                <!-- ===== Start of Job Sidebar ===== -->
                <div class="col-md-4 col-xs-12 job-post-sidebar">

                    <!-- Search Location -->
                    <div class="search-location">
                        <input type="text" name="search-location" class="form-control" placeholder="Location">
                    </div>

                    <!-- Job Types -->
                    <div class="job-types mt30">
                        <h4>Job Type</h4>

                        <ul class="list-inline mt20">
                            <li>
                                <input type="checkbox" id="full-time">
                                <label for="full-time">Full Time</label>
                            </li>

                            <li>
                                <input type="checkbox" id="part-time">
                                <label for="part-time">Part Time</label>
                            </li>

                            <li>
                                <input type="checkbox" id="freelance">
                                <label for="freelance">Freelance</label>
                            </li>

                            <li>
                                <input type="checkbox" id="intership">
                                <label for="intership">Intership</label>
                            </li>

                            <li>
                                <input type="checkbox" id="temporary">
                                <label for="temporary">Temporary</label>
                            </li>
                        </ul>
                    </div>

                    <!-- Job Types -->
                    <div class="job-categories mt30">
                        <h4 class="pb20">Categories</h4>

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

                    <!-- Job Types -->
                    <div class="job-types mt30">

                        <ul class="list-inline">
                            <li>
                                <input type="checkbox" id="salary">
                                <label for="salary">Filter by Salary</label>
                            </li>

                            <li>
                                <input type="checkbox" id="rate">
                                <label for="rate">filter by Rate</label>
                            </li>
                        </ul>
                    </div>

                    <!-- Advertisment -->
                    <div class="job-advert mt30">
                        <a href="#">
                            <img src="images/img/advert.jpg" class="img-responsive" alt="">
                        </a>
                    </div>

                </div>
                <!-- ===== End of Job Sidebar ===== -->



                @forelse ($jobs as $job)
                    <!-- ===== Start of Job Post Column 1 ===== -->
                    <div class="col-md-8 mt20">
                        <div class="item-block shadow-hover">

                            <!-- Start of Job Post Header -->
                            <div class="job-post-header clearfix">
                                <a href="{{ route('companies.show', $job?->company?->slug) }}"><img
                                        src="{{ asset($job?->company?->logo) }}" alt=""></a>
                                <div>
                                    <a href="job-page.html">
                                        <h4>{{ $job?->title }}</h4>
                                    </a>
                                    <h5><small>{{ $job?->company?->name }}</small></h5>
                                </div>

                                <ul class="pull-right">
                                    <li>
                                        <h6 class="time">{{ $job->created_at->diffForHumans() }}</h6>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-green btn-small btn-effect">full time</a>
                                    </li>
                                    <li>
                                        <!-- Bookmark Icon -->
                                        <a href="#" class="bookmark-icon" data-job-id="{{ $job->id }}">
                                            <i class="far fa-bookmark"></i> <!-- Font Awesome bookmark icon -->
                                        </a>
                                    </li>
                                </ul>

                            </div>
                            <!-- End of Job Post Header -->

                            <!-- Start of Job Post Body -->
                            <div class="job-post-body">
                                <p>Responsibilities:</p>
                                <ul class="list mt10">
                                    <li>Designing modern and minimal PSD Templates</li>

                                    <li>Converting PSD into HTML5 & CSS3</li>

                                    <li>WordPress Theme Development</li>

                                    <li>Troubleshooting, testing and maintaining web Themes</li>
                                </ul>
                            </div>
                            <!-- End of Job Post Body -->

                            <!-- Start of Job Post Footer -->
                            <div class="job-post-footer row">

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <i class="fa fa-map-marker"></i>
                                    <span>{{ formatLocation($job?->company?->companyCountry?->name, $job?->company?->companyState?->name, $job?->company?->companyCity?->name) }}</span>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <i class="fa fa-money"></i>
                                    <span>$50,000 - $80,000 / year</span>
                                </div>

                            </div>
                            <!-- End of Job Post Footer -->

                        </div>
                        <!-- ===== End of Job Post Column 1 ===== -->
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



        </div>
    </section> --}}
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
                    <h4>We found 234 matches.</h4>
                </div>

                <!-- ===== Start of Job Sidebar ===== -->
                <div class="col-md-4 col-xs-12 job-post-sidebar">

                    <!-- Search Location -->
                    <div class="search-location">
                        <input type="text" name="search-location" class="form-control" placeholder="Location">
                    </div>

                    <!-- Job Types -->
                    <div class="job-types mt30">
                        <h4>Job Type</h4>

                        <ul class="list-inline mt20">
                            <li>
                                <input type="checkbox" id="full-time">
                                <label for="full-time">Full Time</label>
                            </li>

                            <li>
                                <input type="checkbox" id="part-time">
                                <label for="part-time">Part Time</label>
                            </li>

                            <li>
                                <input type="checkbox" id="freelance">
                                <label for="freelance">Freelance</label>
                            </li>

                            <li>
                                <input type="checkbox" id="intership">
                                <label for="intership">Intership</label>
                            </li>

                            <li>
                                <input type="checkbox" id="temporary">
                                <label for="temporary">Temporary</label>
                            </li>
                        </ul>
                    </div>

                    <!-- Job Types -->
                    <div class="job-categories mt30">
                        <h4 class="pb20">Categories</h4>

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

                    <!-- Job Types -->
                    <div class="job-types mt30">

                        <ul class="list-inline">
                            <li>
                                <input type="checkbox" id="salary">
                                <label for="salary">Filter by Salary</label>
                            </li>

                            <li>
                                <input type="checkbox" id="rate">
                                <label for="rate">filter by Rate</label>
                            </li>
                        </ul>
                    </div>

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
                                            {{ config('settings.site_default_currency') }} /
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
