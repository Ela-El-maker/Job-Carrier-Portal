@extends('frontend.layouts.master')
@section('contents')
    @php
        $completionPercentage = getCompanyProfileCompletion() ?? 0;
        $profileImage = auth()->user()?->company?->logo ?? 'images/default-profile.png';
        $nextInterviewDate = 'September 10, 2024'; // This could be dynamic in the future
    @endphp

    <!-- =============== Start of Page Header Section =============== -->
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Company Dashboard</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="company-dashboard ptb80">
        <div class="container">
            <div class="row">
                @include('frontend.company-dashboard.sidebar')

                <div class="col-md-9 col-xs-12">
                    <div class="welcome-message mb-4">
                        <h4>Welcome back, {{ auth()->user()->name }}!</h4>
                        @if ($company)
                            <p class="text-muted">{{ $company->name }}</p>
                        @endif
                    </div>

                    <!-- Profile Completeness Card -->
                    <div class="card profile-completeness-card">
                        <div class="card__info">
                            <div class="profile-card-content">
                                <!-- Profile Image Section -->
                                <div class="card__profile-image">
                                    <div class="profile-image-container">
                                        <img src="{{ asset($profileImage) }}" alt="Profile Image" class="profile-image">
                                    </div>

                                    <a href="{{ route('candidate.profile.index') }}" class="edit-profile-btn" style="padding-right: 30px;">
                                        {{ $completionPercentage == 100 ? 'View Profile' : 'Edit Profile' }}
                                    </a>
                                </div>

                                <!-- Status Card Section -->
                                @if ($completionPercentage < 100)
                                    <div class="warning-card">
                                        <div class="warning-content">
                                            <strong>Profile in Progress <span style="font-size: 18px;">✏️</span></strong>
                                            <p>Your profile is
                                                <strong>{{ $completionPercentage }}%</strong> complete.
                                                Let's get it to 100% for better visibility!
                                            </p>
                                            <div class="profile-completeness">
                                                <div class="profile-completeness-bar"
                                                    style="width: {{ $completionPercentage }}%">
                                                    <span class="percentage-indicator">{{ $completionPercentage }}%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="success-card">
                                        <div class="success-content">
                                            <strong>Profile Complete! <span style="font-size: 18px;">🎉</span></strong>
                                            <p>Your profile is 100% complete. You're all set for your dream
                                                job!</p>
                                            <div class="profile-completeness">
                                                <div class="profile-completeness-bar" style="width: 100%">
                                                    <span class="percentage-indicator">100%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card__texture"></div>
                    </div>

                    <!-- Key Metrics Cards -->
                    <div class="row mb-4">
                        <!-- Active Jobs Card -->
                        <div class="col-md-6 mb-3">
                            <div class="card metric-card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="card-title">Active Jobs</h6>
                                            <h3 class="mb-0">{{ $company->jobs()->where('status', 'active')->count() }}
                                            </h3>
                                        </div>
                                        <div class="metric-icon bg-primary-light">
                                            <i class="fas fa-briefcase text-primary"></i>
                                        </div>
                                    </div>
                                    <a href="{{ route('company.jobs.index') }}" class="small text-primary">View all
                                        jobs</a>
                                </div>
                            </div>
                        </div>

                        <!-- Applications Card -->
                        <div class="col-md-6 mb-3">
                            <div class="card metric-card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="card-title">New Applications</h6>
                                            <h3 class="mb-0">{{ $company->applications()->count() }}</h3>
                                        </div>
                                        <div class="metric-icon bg-success-light">
                                            <i class="fas fa-file-alt text-success"></i>
                                        </div>
                                    </div>
                                    <a href="{{ route('company.jobs.index') }}" class="small text-success">View
                                        applications</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h5 class="mb-0">Quick Actions</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <a href="{{ route('company.jobs.create') }}" class="btn btn-primary btn-block">
                                        <i class="fas fa-plus"></i> Post New Job
                                    </a>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <a href="{{ route('company.profile') }}" class="btn btn-success btn-block">
                                        <i class="fas fa-edit"></i> Edit Profile
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Subscription Plan Card -->
                    <div class="card shadow-sm rounded-lg mb-4">
                        <div class="card-header bg-primary text-white p-4 rounded-top">
                            <h5 class="mb-0 fw-bold">Your Subscription Plan</h5>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-borderless align-middle mb-0">
                                    <tbody>
                                        <tr class="subscription-row">
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="icon-circle bg-light text-primary">
                                                        <i class="fas fa-box-open"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0 fw-semibold">Current Package</h6>
                                                        <small class="text-muted">Your active subscription</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                <span class="badge bg-primary text-white fs-6 px-3 py-2">
                                                    {{ $userPlan?->plan?->label }} Package
                                                </span>
                                            </td>
                                        </tr>

                                        <tr class="subscription-row">
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="icon-circle bg-light text-success">
                                                        <i class="fas fa-briefcase"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0 fw-semibold">Job Posts</h6>
                                                        <small class="text-muted">Number of jobs you can post</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                <span class="badge bg-success text-white fs-6 px-3 py-2">
                                                    {{ $userPlan?->plan?->job_limit }}
                                                </span>
                                            </td>
                                        </tr>

                                        <tr class="subscription-row">
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="icon-circle bg-light text-warning">
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0 fw-semibold">Featured Posts</h6>
                                                        <small class="text-muted">Jobs that appear at the top</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                <span class="badge bg-warning text-dark fs-6 px-3 py-2">
                                                    {{ $userPlan?->plan?->featured_job_limit }}
                                                </span>
                                            </td>
                                        </tr>

                                        <tr class="subscription-row">
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="icon-circle bg-light text-info">
                                                        <i class="fas fa-bookmark"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0 fw-semibold">Highlighted Posts</h6>
                                                        <small class="text-muted">Jobs with enhanced visibility</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                <span class="badge bg-info text-white fs-6 px-3 py-2">
                                                    {{ $userPlan?->plan?->highlight_job_limit }}
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div
                            class="card-footer bg-white px-4 py-3 d-flex justify-content-between align-items-center rounded-bottom">
                            <small class="text-muted">Last updated: {{ date('F d, Y') }}</small>
                            <a href="{{ route('pricing.index') }}" class="btn btn-primary btn-sm">Upgrade Plan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
