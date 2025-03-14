@extends('frontend.layouts.master')
@section('contents')
    <!-- ===== Start of Job Header Section ===== -->
    <section class="job-header ptb60">
        <div class="container">

            <!-- Start of Row -->
            <div class="row">

                <div class="col-md-6 col-xs-12">
                    <h3>{{ $job?->title }}</h3>
                    @php
                        $jobType = getJobTypeClassAndLabel($job?->jobType?->name);
                    @endphp
                    <a href="#" class="btn btn-small btn-effect {{ $jobType['class'] }}" style="margin-top: 10px;">
                        {{ $jobType['label'] }}
                    </a>
                </div>

                <div class="col-md-6 col-xs-12 clearfix">
                    <a href="#" class="btn btn-blue btn-effect pull-right mt15"><i class="fa fa-star"></i>add to
                        favorites</a>
                </div>


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
                                <a href="{{ route('companies.show', $job?->company?->slug) }}">
                                    <img src="{{ asset($job?->company?->logo) }}" style="height: 50%; object-fit:cover;"
                                        alt="">
                                </a>
                            </div>
                        </div>

                        <!-- Job Company Info -->
                        <div class="col-md-9">
                            <div class="job-company-info mt30">
                                <h3 class="capitalize">{{ $job?->company?->name }}</h3>

                                <ul class="list-inline mt10">
                                    <li><a href="{{ $job?->company?->website }}"><i class="fa fa-link"
                                                aria-hidden="true"></i>Website</a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i>Facebook</a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i>Twitter</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <!-- End of Company Info -->


                    <!-- Start of Job Details -->
                    <div class="row job-details mt40">
                        <div class="col-md-12">

                            <!-- ===== Start of Job Summary Section ===== -->
                            <div class="job-summary mb40">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2>Employment Information</h2>
                                    </div>
                                </div>

                                <!-- Grid for Job Details -->
                                <div class="row mt20">
                                    <!-- Job Role -->
                                    <div class="col-md-3 col-sm-6 col-xs-12 joblist">
                                        <strong><i class="fa fa-user"></i> Job Role</strong>
                                        <p>{{ $job?->jobRole?->name }}</p>
                                    </div>

                                    <!-- Salary -->
                                    <div class="col-md-3 col-sm-6 col-xs-12 joblist">
                                        <strong><i class="fa fa-money"></i> Salary</strong>
                                        <p>
                                            @if ($job?->salary_mode === 'range')
                                                {{ $job?->min_salary }} - {{ $job?->max_salary }}
                                                {{ config('settings.site_default_currency') }}
                                            @else
                                                {{ $job?->custom_salary }}
                                            @endif
                                        </p>
                                    </div>

                                    <!-- Experience -->
                                    <div class="col-md-3 col-sm-6 col-xs-12 joblist">
                                        <strong><i class="fa fa-briefcase"></i> Experience</strong>
                                        <p>{{ $job?->jobExperience?->name }}</p>
                                    </div>

                                    <!-- Job Type -->
                                    <div class="col-md-3 col-sm-6 col-xs-12 joblist">
                                        <strong><i class="fa fa-clock"></i> Job Type</strong>
                                        <p>{{ $job?->jobType?->name }}</p>
                                    </div>



                                    <!-- Education -->
                                    <div class="col-md-3 col-sm-6 col-xs-12 joblist">
                                        <strong><i class="fa fa-graduation-cap"></i> Education</strong>
                                        <p>{{ $job?->jobEducation?->name }}</p>
                                    </div>

                                    <!-- Category -->
                                    <div class="col-md-3 col-sm-6 col-xs-12 joblist">
                                        <strong><i class="fa fa-tags"></i> Category</strong>
                                        <p>{{ $job?->category?->name }}</p>
                                    </div>

                                    <!-- Updated -->
                                    <div class="col-md-3 col-sm-6 col-xs-12 joblist">
                                        <strong><i class="fa fa-calendar"></i> Updated</strong>
                                        <p>{{ formatDate($job?->updated_at) }}</p>
                                    </div>

                                    <!-- Deadline -->
                                    <div class="col-md-3 col-sm-6 col-xs-12 joblist">
                                        <strong><i class="fa fa-calendar-times"></i> Deadline</strong>
                                        <p>{{ formatDate($job?->deadline) }}</p>
                                    </div>

                                </div>
                            </div>
                            <!-- ===== End of Job Summary Section ===== -->



                            <!-- Div wrapper -->
                            <div class="pt40">
                                <h5>Job Overview</h5>

                                <p class="mt20">
                                    {!! $job?->description !!}
                                </p>
                            </div>

                            {{-- <!-- Div wrapper -->
                            <div class="pt40">
                                <h5 class="mt40">Key Requirements</h5>

                                <!-- Start of List -->
                                <ul class="list mt20">
                                    <li>Personally passionate and up to date with current trends and technologies, committed
                                        to quality and comfortable working with adult media.</li>

                                    <li>Bachelor or Master degree level educational background.</li>

                                    <li>4 years relevant PHP dev experience.</li>

                                    <li>Troubleshooting, testing and maintaining the core product software and databases.
                                    </li>
                                </ul>
                                <!-- End of List -->

                            </div>

                            <!-- Div wrapper -->
                            <div class="pt40">
                                <h5 class="mt40">We Offer</h5>

                                <!-- Start of List -->
                                <ul class="list mt20">
                                    <li>An exciting job where you can assume responsibility and develop professionally.</li>

                                    <li>A dynamic team with friendly, highly-qualified colleagues from all over the world.
                                    </li>

                                    <li>Strong, sustainable growth and fresh challenges every day.</li>

                                    <li>Flat hierarchies and short decision paths.</li>
                                </ul>
                                <!-- End of List -->

                                <p class="mt40">If you feel that this is the place where you belong and start your career
                                    with a ton of new opportunities, please don't hesitate to apply for the job position.
                                </p>
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

                        <h4 class="uppercase">share this job</h4>

                        <!-- Start of Social Media ul -->
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
                        <!-- End of Social Media ul -->



                        <ul class="job-overview nopadding mt40">
                            <li>
                                <h5><i class="fa fa-calendar"></i> Date Posted:</h5>
                                <span>Posted {{ $job->created_at->diffForHumans() }}</span>
                            </li>

                            <li>
                                <h5><i class="fa fa-map-marker"></i> Location:</h5>
                                <span>{{ formatLocation($job?->country?->name, $job?->state?->name, $job?->city?->name, $job?->address) }}</span>
                            </li>

                            <li>
                                <h5><i class="fa fa-money"></i> Salary Rate:</h5>
                                <span>
                                    @if ($job?->salary_mode === 'range')
                                        {{ $job?->min_salary }} - {{ $job?->max_salary }}
                                        {{ config('settings.site_default_currency') }}
                                        <span class="text-muted">
                                            per {{ $job?->salaryType?->name }}
                                        </span>
                                    @else
                                        {{ $job?->custom_salary }}
                                        <span class="text-muted">
                                            per {{ $job?->salaryType?->name }}
                                        </span>
                                    @endif
                                </span>
                            </li>

                            <li>
                                @php
                                    $deadlineInfo = calculateDeadline($job->deadline);
                                @endphp


                                <span>
                                    <h5><i class="{{ $deadlineInfo['icon'] }}"></i> Deadline:</h5>
                                    <span class="{{ $deadlineInfo['class'] }}">{{ $deadlineInfo['message'] }}</span>
                                </span>
                            </li>
                        </ul>

                        <div class="mt20">
                            <a href="#" class="btn btn-blue btn-effect">apply for job</a>
                        </div>

                    </div>
                    <!-- Start of Job Sidebar -->


                    <!-- Start of Google Map -->
                    <div class="col-md-12 gmaps mt60">
                        <div class="box-map">
                            {!! $job?->company?->map_link !!}
                        </div>
                    </div>
                    <!-- End of Google Map -->


                </div>
                <!-- ===== End of Job Sidebar ===== -->

            </div>
            <!-- End of Row -->


            <!-- Start of Row -->
            <div class="row mt80">
                <div class="col-md-12">
                    <h2 class="capitalize pb40">related jobs</h2>

                    <!-- Start of Owl Slider -->
                    <div class="owl-carousel related-jobs">

                        <!-- Start of Slide item 1 -->
                        <div class="item">
                            <a href="job-page.html">
                                <h5>UI/UX Designer</h5>
                            </a>
                            <a href="#" class="btn btn-green btn-small btn-effect mt15">full time</a>

                            <h5 class="pt40 pb10"><i class="fa fa-money"></i> Salary:</h5>
                            <h5>$25.000-$35.000</h5>
                        </div>
                        <!-- End of Slide item 1 -->


                        <!-- Start of Slide item 2 -->
                        <div class="item">
                            <a href="job-page.html">
                                <h5>Restaurant Chef</h5>
                            </a>
                            <a href="#" class="btn btn-red btn-small btn-effect mt15">temporary</a>

                            <h5 class="pt40 pb10"><i class="fa fa-money"></i> Salary:</h5>
                            <h5>$15.000-$20.000</h5>
                        </div>
                        <!-- End of Slide item 2 -->


                        <!-- Start of Slide item 3 -->
                        <div class="item">
                            <a href="job-page.html">
                                <h5>Social Marketing</h5>
                            </a>
                            <a href="#" class="btn btn-purple btn-small btn-effect mt15">part time</a>

                            <h5 class="pt40 pb10"><i class="fa fa-money"></i> Salary:</h5>
                            <h5>$25.000-$35.000</h5>
                        </div>
                        <!-- End of Slide item 3 -->


                        <!-- Start of Slide item 4 -->
                        <div class="item">
                            <a href="job-page.html">
                                <h5>PHP Developer</h5>
                            </a>
                            <a href="#" class="btn btn-green btn-small btn-effect mt15">full time</a>

                            <h5 class="pt40 pb10"><i class="fa fa-money"></i> Salary:</h5>
                            <h5>$35.000-$40.000</h5>
                        </div>
                        <!-- End of Slide item 4 -->


                        <!-- Start of Slide item 5 -->
                        <div class="item">
                            <a href="job-page.html">
                                <h5>IOS Developer</h5>
                            </a>
                            <a href="#" class="btn btn-blue btn-small btn-effect mt15">freelancer</a>

                            <h5 class="pt40 pb10"><i class="fa fa-money"></i> Salary:</h5>
                            <h5>$30.000</h5>
                        </div>
                        <!-- End of Slide item 5 -->


                        <!-- Start of Slide item 6 -->
                        <div class="item">
                            <a href="job-page.html">
                                <h5>Web Developer</h5>
                            </a>
                            <a href="#" class="btn btn-orange btn-small btn-effect mt15">intership</a>

                            <h5 class="pt40 pb10"><i class="fa fa-money"></i> Salary:</h5>
                            <h5>$45.000-$50.000</h5>
                        </div>
                        <!-- End of Slide item 6 -->

                    </div>
                    <!-- End of Owl Slider -->
                </div>
            </div>
            <!-- End of Row -->

        </div>
    </section>
    <!-- ===== End of Main Wrapper Job Section ===== -->
@endsection
