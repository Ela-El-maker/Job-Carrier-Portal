@extends('frontend.layouts.master')
@section('contents')
    <style>
        .job-detail-section {
            padding: 50px 0;
        }

        .job-detail-header {
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12);
            margin-bottom: 30px;
        }

        .job-detail-body {
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12);
            margin-bottom: 30px;
        }

        .job-company-logo {
            width: 100px;
            height: 100px;
            object-fit: contain;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
        }

        .job-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #333;
        }

        .job-company {
            font-size: 16px;
            color: #29b1fd;
            margin-bottom: 15px;
        }

        .job-info-item {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .job-info-icon {
            margin-right: 10px;
            color: #29b1fd;
            font-size: 16px;
            width: 20px;
            text-align: center;
        }

        .review-content img {
            max-width: 100%;
            max-height: 250px;
            height: auto;
            width: auto;
            border-radius: 6px;
            object-fit: contain;
            display: block;
            margin: 10px 0;
        }
        .job-badge {
            display: inline-block;
            padding: 5px 10px;
            margin-right: 10px;
            margin-bottom: 10px;
            border-radius: 3px;
            font-size: 12px;
            font-weight: 600;
        }

        .job-badge-highlight {
            background-color: #ffeeba;
            color: #856404;
        }

        .job-badge-featured {
            background-color: #bee5eb;
            color: #0c5460;
        }

        .job-badge-golden {
            background-color: #ffd700;
            color: #856404;
        }

        .job-detail-section-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .job-detail-text {
            line-height: 1.7;
            color: #666;
        }

        .job-skills {
            display: flex;
            flex-wrap: wrap;
            margin-top: 10px;
        }

        .job-skill-tag {
            background-color: #e9ecef;
            color: #495057;
            padding: 5px 12px;
            margin-right: 10px;
            margin-bottom: 10px;
            border-radius: 3px;
            font-size: 13px;
        }

        .job-benefits {
            list-style-type: none;
            padding-left: 0;
        }

        .job-benefits li {
            position: relative;
            padding-left: 25px;
            margin-bottom: 10px;
        }

        .job-benefits li:before {
            content: "\f00c";
            font-family: 'FontAwesome';
            position: absolute;
            left: 0;
            color: #28a745;
        }

        .job-apply-btn {
            margin-top: 20px;
            padding: 12px 30px;
            font-size: 16px;
        }

        .job-salary {
            font-size: 20px;
            font-weight: 700;
            color: #28a745;
            margin-bottom: 20px;
        }

        /* Vertical divider */
        .job-vertical-divider {
            position: absolute;
            left: 66.66%;
            /* Position at the boundary of col-md-8 */
            top: 0;
            bottom: 0;
            width: 1px;
            background-color: #e0e0e0;
            /* Light gray color */
        }

        /* Add some spacing between main content and sidebar */
        .job-main-content {
            padding-right: 30px;
        }

        .job-sidebar {
            padding-left: 30px;
        }


        .golden-card {
            background: linear-gradient(135deg, #fffbe6, #fff1b8);
            border: 2px solid #ffd700;
            box-shadow: 0 0 15px rgba(255, 215, 0, 0.5);
            padding: 25px;
            border-radius: 8px;
            position: relative;
        }

        .job-badge-golden {
            background-color: #ffd700;
            color: #000;
            font-weight: bold;
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 13px;
            text-transform: uppercase;
            box-shadow: 0 0 5px rgba(255, 215, 0, 0.6);
        }


        /* Hide the divider on mobile screens */
        @media (max-width: 767px) {
            .job-vertical-divider {
                display: none;
            }

            .job-main-content,
            .job-sidebar {
                padding-left: 15px;
                padding-right: 15px;
            }
        }
    </style>

    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-header">
        <div class="container">
            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>Job Details</h2>
                </div>
            </div>
            <!-- End of Page Title -->

            <!-- Start of Breadcrumb -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ route('company.jobs.index') }}">Jobs</a></li>
                        <li class="active">{{ $job->title }}</li>
                    </ul>
                </div>
            </div>
            <!-- End of Breadcrumb -->
        </div>
    </section>
    <!-- =============== End of Page Header 1 Section =============== -->

    <!-- ===== Start of Job Detail Section ===== -->
    <section class="job-detail-section ptb80">
        <div class="container">
            <div class="row">
                <!-- Main content column -->
                <div class="col-md-8 col-sm-12 job-main-content">
                    <!-- Job Header -->
                    <div class="job-detail-header" style="position: relative;">
                        @php
                            $status = 'Pending';
                            $statusColor = '#ffc107'; // Yellow by default

                            if ($job->status === 'active' && strtotime($job->deadline) >= now()->timestamp) {
                                $status = 'Active';
                                $statusColor = '#28a745'; // Green
                            } elseif (strtotime($job->deadline) < now()->timestamp) {
                                $status = 'Expired';
                                $statusColor = '#dc3545'; // Red
                            }
                        @endphp

                        <!-- Status Badge -->
                        <div
                            style="
                            position: absolute;
                            top: 15px;
                            right: 20px;
                            background-color: {{ $statusColor }};
                            color: #fff;
                            padding: 6px 12px;
                            font-size: 14px;
                            font-weight: bold;
                            border-radius: 4px;
                            z-index: 10;">
                            {{ $status }}
                        </div>

                        <div class="row">
                            <div class="col-md-2 col-sm-3 col-xs-12 text-center">
                                <img src="{{ asset($job->company->logo ?? 'frontend/default-uploads/default-company.png') }}"
                                    alt="{{ $job->company->name ?? 'Company Logo' }}" class="job-company-logo">
                            </div>

                            <div class="col-md-10 col-sm-9 col-xs-12 {{ $job->is_golden ? 'golden-card' : '' }}">
                                <h1 class="job-title">{{ $job->title }}</h1>
                                <p class="job-company">{{ $job->company->name }}</p>

                                <div class="job-badges mb20">
                                    @if ($job->is_highlighted)
                                        <span class="job-badge job-badge-highlight">Highlighted</span>
                                    @endif

                                    @if ($job->is_featured)
                                        <span class="job-badge job-badge-featured">Featured</span>
                                    @endif

                                    @if ($job->is_golden)
                                        <span class="job-badge job-badge-golden">Gold Job</span>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="job-info-item">
                                            <i class="job-info-icon fa fa-map-marker"></i>
                                            <span>{{ $job->address }}</span>
                                        </div>
                                        <div class="job-info-item">
                                            <i class="job-info-icon fa fa-briefcase"></i>
                                            <span>{{ $job->jobType->name ?? 'N/A' }}</span>
                                        </div>
                                        <div class="job-info-item">
                                            <i class="job-info-icon fa fa-graduation-cap"></i>
                                            <span>{{ $job->jobEducation->name ?? 'N/A' }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="job-info-item">
                                            <i class="job-info-icon fa fa-calendar"></i>
                                            <span>Deadline: {{ date('M d, Y', strtotime($job->deadline)) }}</span>
                                        </div>
                                        <div class="job-info-item">
                                            <i class="job-info-icon fa fa-clock-o"></i>
                                            <span>Posted: {{ $job->created_at->diffForHumans() }}</span>
                                        </div>
                                        <div class="job-info-item">
                                            <i class="job-info-icon fa fa-users"></i>
                                            <span>Vacancies: {{ $job->vacancies }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Job Details -->
                    <div class="job-detail-body">
                        <!-- Salary Info -->
                        <h3 class="job-detail-section-title">Salary</h3>
                        <div class="job-salary">
                            @if ($job->salary_mode == 'range')
                                {{ number_format($job->min_salary) }} - {{ number_format($job->max_salary) }}
                                {{ $job->salaryType->name ?? '' }}
                            @else
                                {{ $job->custom_salary }} {{ $job->salaryType->name ?? '' }}
                            @endif
                        </div>
                        <hr>
                        <!-- Job Description -->
                        <h3 class="job-detail-section-title">Job Description</h3>
                        <div class="job-detail-text review-content" style="min-height: 100px;">
                            {!! $job->description !!}
                        </div>
                        <hr>
                        <!-- Skills -->
                        <h3 class="job-detail-section-title">Skills</h3>
                        <div class="job-skills">
                            @forelse($job?->skills->shuffle() as $jobSkill)
                                <span class="job-skill-tag">{{ $jobSkill?->skill?->name }}</span>
                            @empty
                                <p>No specific skills required</p>
                            @endforelse
                        </div>
                        <hr>
                        <!-- Benefits -->
                        @if ($job->benefits)
                            <h3 class="job-detail-section-title">Benefits</h3>
                            <ul class="job-benefits">
                                @foreach ($job?->benefits->shuffle() as $jobBenefit)
                                    <li>{{ $jobBenefit?->benefit?->name }}</li>
                                @endforeach

                            </ul>
                        @endif
                        <hr>
                        <!-- Application Button -->
                        <div class="text-center">
                            @if ($job->receive_applications == 'app')
                                <a href="{{ route('jobs.apply', $job->slug) }}"
                                    class="btn btn-blue btn-effect job-apply-btn">Apply Now</a>
                            @elseif($job->receive_applications == 'email')
                                <a href="mailto:{{ $job->company->email }}"
                                    class="btn btn-blue btn-effect job-apply-btn">Apply via Email</a>
                            @elseif($job->receive_applications == 'custom_url')
                                <a href="{{ $job->application_url }}" target="_blank"
                                    class="btn btn-blue btn-effect job-apply-btn">Apply on Company Website</a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Vertical Divider -->
                <div class="job-vertical-divider d-none d-md-block"></div>

                <!-- Sidebar -->
                <div class="col-md-4 col-sm-12 job-sidebar">
                    <!-- Company Information -->
                    <div class="job-detail-body">
                        <h3 class="job-detail-section-title">Company Information</h3>
                        <div class="text-center mb20">
                            <img src="{{ asset($job->company->logo ?? 'frontend/default-uploads/default-company.png') }}"
                                alt="{{ $job->company->name }}" style="max-width: 150px;">
                            <h4 class="mt10">{{ $job->company->name }}</h4>
                        </div>

                        <div class="job-info-item">
                            <i class="job-info-icon fa fa-globe"></i>
                            <a href="{{ $job->company->website }}" target="_blank">{{ $job->company->website }}</a>
                        </div>

                        <div class="job-info-item">
                            <i class="job-info-icon fa fa-envelope"></i>
                            <a href="mailto:{{ $job->company->email }}">{{ $job->company->email }}</a>
                        </div>

                        <div class="job-info-item">
                            <i class="job-info-icon fa fa-phone"></i>
                            <span>{{ $job->company->phone }}</span>
                        </div>

                        <div class="job-info-item">
                            <i class="job-info-icon fa fa-map-marker"></i>
                            <span>{{ $job->company->address }}</span>
                        </div>

                        <div class="mt20">
                            <a href="{{ route('company.profile', $job->company->slug) }}"
                                class="btn btn-blue btn-effect btn-small">View Company Profile</a>
                        </div>
                    </div>

                    <!-- Job Overview -->
                    <div class="job-detail-body">
                        <h3 class="job-detail-section-title">Job Overview</h3>

                        <div class="job-info-item">
                            <i class="job-info-icon fa fa-th-large"></i>
                            <span><strong>Category:</strong> {{ $job->category->name ?? 'N/A' }}</span>
                        </div>

                        <div class="job-info-item">
                            <i class="job-info-icon fa fa-user-circle"></i>
                            <span><strong>Job Role:</strong> {{ $job->jobRole->name ?? 'N/A' }}</span>
                        </div>

                        <div class="job-info-item">
                            <i class="job-info-icon fa fa-history"></i>
                            <span><strong>Experience:</strong> {{ $job->jobExperience->name ?? 'N/A' }}</span>
                        </div>

                        <div class="job-info-item">
                            <i class="job-info-icon fa fa-map-marker"></i>
                            <span><strong>Location:</strong>
                                {{ $job->city->name ?? '' }}{{ $job->city ? ', ' : '' }}
                                {{ $job->state->name ?? '' }}{{ $job->state ? ', ' : '' }}
                                {{ $job->country->name ?? '' }}
                            </span>
                        </div>
                    </div>

                    <!-- Share Job -->
                    <div class="job-detail-body">
                        <h3 class="job-detail-section-title">Share This Job</h3>
                        <ul class="social-btns list-inline mt20">
                            <li>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                    target="_blank" class="social-btn-roll facebook transparent">
                                    <div class="social-btn-roll-icons">
                                        <i class="social-btn-roll-icon fa fa-facebook"></i>
                                        <i class="social-btn-roll-icon fa fa-facebook"></i>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $job->title }}"
                                    target="_blank" class="social-btn-roll twitter transparent">
                                    <div class="social-btn-roll-icons">
                                        <i class="social-btn-roll-icon fa fa-twitter"></i>
                                        <i class="social-btn-roll-icon fa fa-twitter"></i>
                                    </div>
                                </a>
                            </li>
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
                        </ul>
                    </div>

                    <!-- Similar Jobs -->
                    <div class="job-detail-body">
                        <h3 class="job-detail-section-title">Similar Jobs</h3>

                        @forelse($similarJobs as $similarJob)
                            <div class="sidebar-blog-post">
                                <div class="post-info">
                                    <a href="{{ route('jobs.show', $similarJob->slug) }}">{{ $similarJob->title }}</a>
                                    <span>{{ $similarJob->company->name }}</span>
                                    <span>Posted {{ $similarJob->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-4">
                                <p class="text-muted">No similar jobs found</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===== End of Job Detail Section ===== -->
@endsection
