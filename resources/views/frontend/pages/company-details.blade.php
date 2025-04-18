@extends('frontend.layouts.master')
@section('contents')
    <!-- ===== Start of Candidate Profile Header Section ===== -->
    <section class="profile-header"
        style="background-image: url('{{ asset($company?->banner) }}'); background-size: cover; background-position: center;">
        <!-- Your content here -->
    </section>
    <!-- ===== End of Candidate Header Section ===== -->

    <!-- ===== Start of Job Header Section ===== -->
    <section class="job-header ptb60">
        <div class="container">

            <!-- Start of Row -->
            <div class="row">
                @php
                    $mostCommonType = $company->jobs
                        ->groupBy('jobType.name')
                        ->sortByDesc(function ($group) {
                            return $group->count();
                        })
                        ->keys()
                        ->first();

                    // Fetch class and label for the most common job type
                    $jobType = getJobTypeClassAndLabel($mostCommonType);
                @endphp

                <div class="col-md-6 col-xs-12">
                    <h3>Welcome to {{ $company?->name }}</h3>

                    @if ($mostCommonType)
                        <a href="javascript:;" class="btn btn-small btn-effect {{ $jobType['class'] }} mt15">
                            {{ ucfirst($mostCommonType) }}
                        </a>
                    @endif
                </div>

                <a href="javascript:;" onclick="document.getElementById('open-positions').scrollIntoView()"
                    class="btn btn-blue btn-effect pull-right mt15">
                    <i class="fa fa-briefcase"></i> View Openings ({{ $company->jobs->count() }})
                </a>
            </div>
            <!-- End of Row -->


        </div>
    </section>
    <!-- ===== End of Job Header Section ===== -->


    <!-- ===== Start of Main Wrapper Job Section ===== -->
    <section class="ptb80" id="job-page">
        <div class="container">

            <!-- Start of Row -->
            <div class="row">

                <!-- ===== Start of Job Details ===== -->
                <div class="col-md-8 col-xs-12">

                    <!-- Start of Company Info -->
                    <div class="row company-info">

                        <!-- Job Company Image -->
                        <div class="col-md-3">
                            <div class="job-company">
                                <a href="">
                                    <img src="{{ asset($company?->logo) }}" class="img-responsive" alt="">
                                </a>
                            </div>
                        </div>

                        <!-- Job Company Info -->
                        <div class="col-md-9">
                            <div class="job-company-info mt30">
                                <h3 class="capitalize">{{ $company?->name }}</h3>

                                <ul class="list-inline mt10">
                                    <li><a href="{{ $company?->website }}"><i class="fa fa-link"
                                                aria-hidden="true"></i>Website</a></li>

                                </ul>
                            </div>
                        </div>

                    </div>
                    <!-- End of Company Info -->


                    <!-- Start of Job Details -->
                    <div class="row job-details mt40">
                        <div class="col-md-12">

                            <!-- Vimeo Video -->


                            <!-- Div wrapper -->
                            <div class="pt40">
                                <h5>About US</h5>

                                <p class="mt20">{!! $company->bio !!}</p>
                            </div>

                            <!-- Div wrapper -->
                            <div class="pt40">
                                <h5>Our Vision</h5>

                                <p class="mt20">{!! $company->vision !!}</p>
                            </div>
                            <br>
                            <hr>
                            <!-- Div wrapper -->
                            {{-- <h5>Our Location</h5>
                            <br>
                            <div class="embed-responsive embed-responsive-16by9">
                                {!! $company?->map_link !!}
                            </div> --}}
                        </div>
                    </div>
                    <!-- End of Job Details -->

                </div>
                <!-- ===== End of Job Details ===== -->





                <!-- ===== Start of Job Sidebar ===== -->
                <div class="col-md-4 col-xs-12">

                    <!-- Start of Job Sidebar -->
                    <div class="job-sidebar">

                        <h4 class="uppercase">{{ $company?->name }}</h4>
                        <br>
                        <div>
                            <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                {{ $company->companyCity?->name ? '  ' . $company->companyCity?->name : ' ' }}
                                {{ $company->companyState?->name ? ', ' . $company->companyState?->name : '' }}
                                {{ $company->companyCountry?->name ? ', ' . $company->companyCountry?->name : '' }}</a>
                        </div>
                        <hr>
                        {{-- <!-- Start of Social Media ul -->
                        <ul class="social-btns list-inline mt20">
                            <!-- Social Media -->
                            <li>
                                <a href="#" class="social-btn-roll facebook transparent">
                                    <div class="social-btn-roll-icons">
                                        <i class="social-btn-roll-icon fa fa-facebook"></i>
                                        <i class="social-btn-roll-icon fa fa-facebook"></i>
                                    </div>
                                </a>
                            </li>

                            <!-- Social Media -->
                            <li>
                                <a href="#" class="social-btn-roll twitter transparent">
                                    <div class="social-btn-roll-icons">
                                        <i class="social-btn-roll-icon fa fa-twitter"></i>
                                        <i class="social-btn-roll-icon fa fa-twitter"></i>
                                    </div>
                                </a>
                            </li>

                            <!-- Social Media -->
                            <li>
                                <a href="#" class="social-btn-roll google-plus transparent">
                                    <div class="social-btn-roll-icons">
                                        <i class="social-btn-roll-icon fa fa-google-plus"></i>
                                        <i class="social-btn-roll-icon fa fa-google-plus"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- End of Social Media ul --> --}}



                        <ul class="job-overview nopadding mt40">

                            <li>
                                <h5><i class="fa fa-calendar"></i> Organization Type:</h5>
                                <span>{{ $company->organizationType?->name }}</span>
                            </li>

                            <li>
                                <h5><i class="fa fa-calendar"></i> Industry Type:</h5>
                                <span>{{ $company->industryType?->name }}</span>
                            </li>

                            <li>
                                <h5><i class="fa fa-calendar"></i> Team Size:</h5>
                                <span>{{ $company->teamSize?->name }}</span>
                            </li>

                            <li>
                                <h5><i class="fa fa-calendar"></i> Date Established:</h5>
                                <span>Posted {{ formatDate($company?->establishment_date) }}</span>
                            </li>

                            <li>
                                <h5><i class="fa fa-map-marker"></i> Location:</h5>
                                <span>{{ $company?->address }}
                                    {{ $company->companyCity?->name ? '  ' . $company->companyCity?->name : ' ' }}
                                    {{ $company->companyState?->name ? ', ' . $company->companyState?->name : '' }}
                                    {{ $company->companyCountry?->name ? ', ' . $company->companyCountry?->name : '' }}
                                </span>
                            </li>
                            <hr>
                            <li>
                                <h5><i class="fa fa-link" aria-hidden="true"></i>Website:</h5>
                                <span><a href="{{ $company?->website }}">{{ $company?->website }}</a></span>
                            </li>
                            <li>
                                <h5><i class="fa fa-envelope"></i> Email Address:</h5>
                                <span>{{ $company?->email }}</span>
                            </li>

                            <li>
                                <h5><i class="fa fa-phone"></i> Phone:</h5>
                                <span>{{ $company?->phone }}</span>
                            </li>


                        </ul>

                        <div class="mt20">
                            <a href="mailto:{{ $company?->email }}" class="btn btn-blue btn-effect"><i
                                    class="fa fa-envelope"></i> Message</a>
                        </div>

                        <hr>

                    </div>
                    <!-- Start of Job Sidebar -->


                    <!-- Start of Google Map -->
                    <div class="col-md-12 gmaps mt60">
                        <div class="box-map">
                            {!! $company?->map_link !!}
                        </div>
                    </div>
                    <!-- End of Google Map -->
                </div>
            </div>
            <!-- Start of Row -->
            <div class="row mt80" id="open-positions">
                <div class="col-md-12">
                    <h2 class="capitalize pb40">Related Jobs at {{ $company?->name }}</h2>

                    <!-- Start of Owl Slider -->
                    <div class="owl-carousel related-jobs">
                        @forelse ($companySimilarJobs->shuffle() as $similarJob)
                            <!-- Start of Slide item 2 -->
                            <div class="item">
                                <a href="{{ route('jobs.show', $similarJob?->slug) }}">
                                    <h5>{{ $similarJob?->title }}</h5>
                                </a>
                                @php
                                    $jobType = getJobTypeClassAndLabel($similarJob?->jobType?->name);
                                @endphp
                                <a href="javascript:;" class="btn btn-small btn-effect {{ $jobType['class'] }}"
                                    style="margin-top: 10px;">
                                    {{ $jobType['label'] }}
                                </a>
                                <h5 class="pt40 pb10"><i class="fa fa-money"></i> Salary:</h5>
                                <h5>
                                    @if ($similarJob?->salary_mode === 'range')
                                        <span>${{ $similarJob?->min_salary }} - ${{ $similarJob?->max_salary }}</span>
                                    @else
                                        <span>${{ $similarJob?->custom_salary }}</span>
                                    @endif
                                </h5>
                            </div>
                            <!-- End of Slide item 2 -->
                        @empty
                            <div class="item">
                                <a href="{{ route('jobs.index') }}">
                                    <h5>No related jobs found</h5>

                                </a>
                            </div>
                        @endforelse
                    </div>
                    <!-- End of Owl Slider -->
                </div>
            </div>
            <!-- End of Row -->
        </div>

    </section>
    <!-- ===== End of Main Wrapper Job Section ===== -->

    <!-- ===== End of Main Wrapper Job Section ===== -->

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
