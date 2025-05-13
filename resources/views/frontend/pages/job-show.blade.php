@extends('frontend.layouts.master')
@section('contents')
    {{-- <!-- ===== Start of Job Header Section ===== -->
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
                    <div class="pull-right mt15" style="display: flex; align-items: center; gap: 12px;">
                        <!-- Vacancy Badge -->
                        <div style="
                            display: flex;
                            align-items: center;
                            background: linear-gradient(to right, #17a2b8, #138496);
                            color: #fff;
                            padding: 6px 14px;
                            border-radius: 50px;
                            font-size: 13px;
                            font-weight: 500;
                            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
                            ">
                            <i class="fa fa-user" style="margin-right: 6px;"></i>
                            {{ $job->vacancies ?? 1 }} Vacanc{{ ($job->vacancies ?? 1) > 1 ? 'ies' : 'y' }}
                        </div>

                        <!-- Print Button -->
                        <a href="javascript:window.print()" class="btn btn-blue btn-effect" style="
                            border-radius: 8px;
                            padding: 8px 14px;
                            font-weight: 500;
                            display: inline-flex;
                            align-items: center;
                            gap: 6px;
                            ">
                            <i class="fa fa-print"></i> Print Job
                        </a>


                    </div>
                </div>




            </div>
            <!-- End of Row -->

        </div>
    </section>
    <!-- ===== End of Job Header Section ===== --> --}}

    <!-- ===== Start of Job Header Section ===== -->
    <section class="job-header ptb60"
        @if ($job->is_golden) style="background: linear-gradient(to right, #FFF9E6, #FFF0C2); border-bottom: 2px solid #FFD700;" @endif>
        <div class="container">

            <!-- Start of Row -->
            <div class="row">

                <div class="col-md-6 col-xs-12">
                    <!-- Golden Job Badge (only shown if job is golden) -->
                    @if ($job->is_golden)
                        <div
                            style="display: inline-block; background-color: #FFD700; color: #000; padding: 4px 12px; border-radius: 4px; font-weight: bold; margin-bottom: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                            <i class="fa fa-star" style="margin-right: 5px;"></i> Golden Job
                        </div>
                    @endif

                    <h3 @if ($job->is_golden) style="color: #D4AF37;" @endif>{{ $job?->title }}</h3>
                    @php
                        $jobType = getJobTypeClassAndLabel($job?->jobType?->name);
                    @endphp
                    <a href="#" class="btn btn-small btn-effect {{ $jobType['class'] }}" style="margin-top: 10px;">
                        {{ $jobType['label'] }}
                    </a>
                </div>


                <div class="col-md-6 col-xs-12 clearfix">
                    <div class="pull-right mt15" style="display: flex; align-items: center; gap: 12px;">
                        <!-- Golden Job Premium Badge (only shown if job is golden) -->
                        @if ($job->is_golden)
                            <div
                                style="
                            display: flex;
                            align-items: center;
                            background: linear-gradient(to right, #D4AF37, #FFD700);
                            color: #000;
                            padding: 6px 14px;
                            border-radius: 50px;
                            font-size: 13px;
                            font-weight: 600;
                            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
                            ">
                                <i class="fa fa-crown" style="margin-right: 6px;"></i>
                                Premium Listing
                            </div>
                        @endif

                        <!-- Vacancy Badge -->
                        <div
                            style="
                        display: flex;
                        align-items: center;
                        background: linear-gradient(to right, #17a2b8, #138496);
                        color: #fff;
                        padding: 6px 14px;
                        border-radius: 50px;
                        font-size: 13px;
                        font-weight: 500;
                        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
                        ">
                            <i class="fa fa-user" style="margin-right: 6px;"></i>
                            {{ $job->vacancies ?? 1 }} Vacanc{{ ($job->vacancies ?? 1) > 1 ? 'ies' : 'y' }}
                        </div>

                        <!-- Print Button -->
                        <a href="javascript:window.print()" class="btn btn-blue btn-effect"
                            style="
                        border-radius: 8px;
                        padding: 8px 14px;
                        font-weight: 500;
                        display: inline-flex;
                        align-items: center;
                        gap: 6px;
                        ">
                            <i class="fa fa-print"></i> Print Job
                        </a>
                    </div>
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
                                <a href="">
                                    <img src="{{ asset($job?->company?->logo) }}" class="img-responsive" alt="">
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
                                <hr>
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
                        <hr>
                        <!-- Start of Social Media ul -->
                        <ul class="social-btns list-inline mt20">
                            <!-- Social Media -->
                            <li>
                                <a data-social="facebook" href="#" class="social-btn-roll facebook transparent">
                                    <div class="social-btn-roll-icons">
                                        <i class="social-btn-roll-icon fa fa-facebook"></i>
                                        <i class="social-btn-roll-icon fa fa-facebook"></i>
                                    </div>
                                </a>
                            </li>

                            <!-- Social Media -->
                            <li>
                                <a data-social="twitter" href="#" class="social-btn-roll twitter transparent">
                                    <div class="social-btn-roll-icons">
                                        <i class="social-btn-roll-icon fa fa-twitter"></i>
                                        <i class="social-btn-roll-icon fa fa-twitter"></i>
                                    </div>
                                </a>
                            </li>

                            <!-- Social Media -->
                            <li>
                                <a href="https://wa.me/?text=Check%20out%20this%20job%20{{ url()->current() }}"
                                    class="social-btn-roll whatsapp transparent" target="_blank">
                                    <div class="social-btn-roll-icons">
                                        <i class="social-btn-roll-icon fa fa-whatsapp"></i>
                                        <i class="social-btn-roll-icon fa fa-whatsapp"></i>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ url()->current() }}"
                                    class="social-btn-roll linkedin transparent" target="_blank">
                                    <div class="social-btn-roll-icons">
                                        <i class="social-btn-roll-icon fa fa-linkedin"></i>
                                        <i class="social-btn-roll-icon fa fa-linkedin"></i>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="https://www.reddit.com/submit?url={{ url()->current() }}&title=Check%20this%20job%20out"
                                    class="social-btn-roll reddit transparent" target="_blank">
                                    <div class="social-btn-roll-icons">
                                        <i class="social-btn-roll-icon fa fa-reddit"></i>
                                        <i class="social-btn-roll-icon fa fa-reddit"></i>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.pinterest.com/pin/create/button/?url={{ url()->current() }}&media=&description=Check%20this%20job%20out"
                                    class="social-btn-roll pinterest transparent" target="_blank">
                                    <div class="social-btn-roll-icons">
                                        <i class="social-btn-roll-icon fa fa-pinterest"></i>
                                        <i class="social-btn-roll-icon fa fa-pinterest"></i>
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
                                    $deadlineInfo = calculateDeadline($job?->deadline);
                                @endphp


                                <span>
                                    <h5><i class="{{ $deadlineInfo['icon'] }}"></i> Deadline:</h5>
                                    <span class="{{ $deadlineInfo['class'] }}">{{ $deadlineInfo['message'] }}</span>
                                </span>
                            </li>
                        </ul>

                        @if ($alreadyAppliedJob)
                            <div class="mt20">
                                <a href="javascript:;" class="apply-now"
                                    style="
                                            background-color: #a4aca4;
                                            border: none; /* No border */
                                            color: rgb(0, 0, 0); /* White text */
                                            padding: 15px 32px; /* Padding */
                                            text-align: center; /* Centered text */
                                            text-decoration: none; /* No underline */
                                            display: inline-block; /* Inline block */
                                            font-size: 16px; /* Font size */
                                            margin: 4px 2px; /* Margin */
                                            cursor: not-allowed;
                                            border-radius: 12px; /* Rounded corners */
                                            transition: background-color 0.3s ease; /* Smooth transition */
                                        ">
                                    Applied
                                </a>
                            </div>
                        @else
                            <div class="mt20">
                                <a href="javascript:;" class="apply-now"
                                    style="
                                            background-color: #0fe6ee; /* Green background */
                                            border: none; /* No border */
                                            color: white; /* White text */
                                            padding: 15px 32px; /* Padding */
                                            text-align: center; /* Centered text */
                                            text-decoration: none; /* No underline */
                                            display: inline-block; /* Inline block */
                                            font-size: 16px; /* Font size */
                                            margin: 4px 2px; /* Margin */
                                            cursor: pointer; /* Pointer cursor on hover */
                                            border-radius: 12px; /* Rounded corners */
                                            transition: background-color 0.3s ease; /* Smooth transition */
                                        ">
                                    Apply this Job
                                </a>
                            </div>
                        @endif


                    </div>
                    <!-- Start of Job Sidebar -->
                    <br>
                    <!-- Start of Job Sidebar -->
                    <div class="job-sidebar">

                        <h4 class="uppercase">Skills</h4>
                        <hr>
                        <ul class="job-overview nopadding ">

                            @foreach ($job?->skills->shuffle() as $jobSkill)
                                <a href="" class="btn btn-blue btn-effect mt20">
                                    {{ $jobSkill?->skill?->name }}
                                </a>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Start of Job Sidebar -->


                    <br>
                    <!-- Start of Job Sidebar -->
                    <div class="job-sidebar">

                        <h4 class="uppercase">Benefits</h4>
                        <hr>
                        <ul class="job-overview nopadding ">

                            @foreach ($job?->benefits->shuffle() as $jobBenefit)
                                <a href="" class="btn btn-blue btn-effect mt20">
                                    {{ $jobBenefit?->benefit?->name }}
                                </a>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Start of Job Sidebar -->

                    <br>
                    <!-- Start of Job Sidebar -->
                    <div class="job-sidebar">

                        <h4 class="uppercase">Tags</h4>
                        <hr>
                        <ul class="job-overview nopadding ">

                            @foreach ($job?->tags->shuffle() as $jobTag)
                                <a href="" class="btn btn-blue btn-effect mt20">
                                    {{ $jobTag?->tag?->name }}
                                </a>
                            @endforeach
                        </ul>
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

            {{-- @foreach ($similarJobs as $similarJob)
                <p>{{ $loop->index + 1 }} - {{ $similarJob->id }} - {{ $similarJob->title }}</p>
            @endforeach --}}


            <!-- Start of Row -->
            <div class="row mt80">
                <div class="col-md-12">
                    <h2 class="capitalize pb40">related jobs</h2>

                    <!-- Start of Owl Slider -->
                    <div class="owl-carousel related-jobs">


                        @forelse ($similarJobs->shuffle() as $similarJob)
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
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var itemCount = $(".related-jobs .item").length; // Count items

            $(".related-jobs").owlCarousel({
                loop: itemCount > 3, // Only loop if there are more than 3 items
                margin: 10,
                nav: true,
                autoplay: true, // Enable auto-slide
                autoplayTimeout: 3000, // Slides every 3 seconds
                autoplayHoverPause: true, // Pause on hover
                items: itemCount >= 3 ? 3 : itemCount, // Show only available items
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: Math.min(itemCount, 2)
                    }, // Show max 2 items on medium screens
                    1000: {
                        items: Math.min(itemCount, 3)
                    } // Show max 3 items on large screens
                }
            });


            $('.apply-now').on('click', function() {
                // alert('Apply now');
                $.ajax({
                    method: 'POST',
                    url: '{{ route('apply-job.store', $job?->id) }}',
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    beforeSend: function() {

                    },
                    success: function(response) {
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
                    },
                });
            });

        });

        document.addEventListener('DOMContentLoaded', function() {
            trackView('job', {{ $job->id }});
        });
    </script>
@endpush
