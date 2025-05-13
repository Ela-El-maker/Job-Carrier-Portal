@extends('frontend.layouts.master')
@section('contents')
@php
$completionPercentage = getCandidateProfileCompletion() ?? 0;
$profileImage = auth()->user()?->candidateProfile?->image ?? 'images/default-profile.png';
$nextInterviewDate = 'September 10, 2024'; // This could be dynamic in the future
@endphp

<!-- =============== Start of Page Header Section =============== -->
<section class="page-header">
    <div class="container">
        <!-- Start of Page Title -->
        <div class="row">
            <div class="col-md-12">
                <h2>DASHBOARD</h2>
            </div>
        </div>
        <!-- End of Page Title -->

        <!-- Start of Breadcrumb -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">home</a></li>
                    <li class="active">Candidate Dashboard</li>
                </ul>
            </div>
        </div>
        <!-- End of Breadcrumb -->
    </div>
</section>
<!-- =============== End of Page Header Section =============== -->

<!-- ===== Start of Main Wrapper Section ===== -->
<section class="search-jobs ptb80" id="version2">
    <div class="container">
        <div class="row">
            <!-- Include Sidebar -->
            @include('frontend.candidate-dashboard.sidebar')

            <!-- Main Content Column -->
            <div class="col-md-9 col-12 job-post-main ps-md-3">
                <div class="welcome-message">
                    <h4>Welcome, {{ auth()->user()->name }}! <span style="font-size: 24px;">👋</span></h4>
                    <p>Your job search journey dashboard is ready. Track your progress and manage your career path here.</p>
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

                                <a href="{{ route('candidate.profile.index') }}" class="edit-profile-btn"
                                    style="padding-right: 30px;">
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
                                        <h3 class="mb-0">{{ $jobApplied }}</h3>
                                    </div>
                                    <div class="metric-icon bg-primary-light">
                                        <i class="fas fa-briefcase text-primary"></i>
                                    </div>
                                </div>
                                <a href="{{ route('candidate.applied-jobs.index') }}" class="small text-primary">View all
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
                                        <h6 class="card-title">Bookmarked Jobs</h6>
                                        <h3 class="mb-0">{{ $userBookmarkedJobs }}</h3>
                                    </div>
                                    <div class="metric-icon bg-success-light">
                                        <i class="fas fa-file-alt text-success"></i>
                                    </div>
                                </div>
                                <a href="{{ route('candidate.bookmarked-jobs.index') }}" class="small text-success">View
                                    Bookmarks</a>
                            </div>
                        </div>
                    </div>
                </div>
<hr>
                <!-- Applications Table -->
                <div class="row">
                    <h3 class="card-title">Latest Applied Jobs</h3>
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead style="background: linear-gradient(to right, #4361ee, #3a0ca3);">
                            <tr>
                                <th style="padding: 12px 15px; color: white; font-weight: 600; text-align: left; font-size: 13px; white-space: nowrap;">#</th>
                                <th style="padding: 12px 15px; color: white; font-weight: 600; text-align: left; font-size: 13px; white-space: nowrap;">Position</th>
                                <th style="padding: 12px 15px; color: white; font-weight: 600; text-align: left; font-size: 13px; white-space: nowrap;">Category</th>
                                <th style="padding: 12px 15px; color: white; font-weight: 600; text-align: left; font-size: 13px; white-space: nowrap;">Applied</th>
                                <th style="padding: 12px 15px; color: white; font-weight: 600; text-align: left; font-size: 13px; white-space: nowrap;">Status</th>
                                <th style="padding: 12px 15px; color: white; font-weight: 600; text-align: center; font-size: 13px; white-space: nowrap;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($appliedJobs as $appliedJob)
                                <tr style="border-bottom: 1px solid #eaedf2; transition: background-color 0.2s ease;">
                                    <td style="padding: 12px 15px; vertical-align: middle; color: #6c757d;">
                                        {{ $loop->iteration }}</td>
                                    <td style="padding: 12px 15px; vertical-align: middle;">
                                        <div style="margin-bottom: 4px; font-weight: 600; color: #333; max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                            {{ $appliedJob?->job?->title }}
                                        </div>
                                        <div style="display: flex; align-items: center;">
                                            <span style="background-color: #f1f3f9; color: #4361ee; padding: 2px 6px; border-radius: 4px; font-size: 11px; margin-right: 8px; max-width: 120px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                {{ $appliedJob?->job?->company?->name }}
                                            </span>
                                            <span style="color: #6c757d; font-size: 12px;">{{ $appliedJob?->job?->jobType?->name }}</span>
                                        </div>
                                    </td>
                                    <td style="padding: 12px 15px; vertical-align: middle;">
                                        <div style="font-weight: 500; color: #333; font-size: 13px; margin-bottom: 4px; max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                            {{ $appliedJob?->job?->category?->name }}
                                        </div>
                                        <div style="font-size: 11px; background-color: #f1f3f9; display: inline-block; padding: 2px 6px; border-radius: 4px; color: #6c757d; max-width: 120px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                            {{ $appliedJob?->job?->jobRole?->name }}
                                        </div>
                                    </td>
                                    <td style="padding: 12px 15px; vertical-align: middle;">
                                        <div style="font-size: 13px; color: #333; margin-bottom: 3px;">
                                            {{ relativeTime($appliedJob?->created_at) }}
                                        </div>
                                        <div style="font-size: 12px; color: #6c757d;">
                                            Deadline: {{ formatDate($appliedJob?->job?->deadline) }}
                                        </div>
                                    </td>
                                    <td style="padding: 12px 15px; vertical-align: middle;">
                                        @if ($appliedJob?->job?->status === 'pending')
                                            <span style="display: inline-block; padding: 3px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background-color: rgba(255, 152, 0, 0.15); color: #ed8936;">Pending</span>
                                        @elseif ($appliedJob?->job?->deadline > now())
                                            <span style="display: inline-block; padding: 3px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background-color: rgba(76, 175, 80, 0.15); color: #48bb78;">Active</span>
                                        @else
                                            <span style="display: inline-block; padding: 3px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background-color: rgba(244, 67, 54, 0.15); color: #f56565;">Expired</span>
                                        @endif
                                    </td>
                                    <td style="padding: 12px 15px; vertical-align: middle; text-align: center;">
                                        @if ($appliedJob?->job?->deadline < now())
                                            <button style="display: inline-flex; align-items: center; justify-content: center; padding: 6px 12px; background-color: #6c757d; color: white; border-radius: 4px; border: none; font-size: 13px; cursor: not-allowed; opacity: 0.7;">
                                                <i class="fas fa-eye-slash" style="margin-right: 5px;"></i> Expired
                                            </button>
                                        @else
                                            <a href="{{ route('jobs.show', $appliedJob?->job?->slug) }}"
                                                style="display: inline-flex; align-items: center; justify-content: center; padding: 6px 12px; background-color: #4361ee; color: white; border-radius: 4px; text-decoration: none; font-size: 13px; box-shadow: 0 2px 4px rgba(67, 97, 238, 0.2);">
                                                <i class="fas fa-eye" style="margin-right: 5px;"></i> View
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="padding: 40px 20px; text-align: center;">
                                        <div style="padding: 20px;">
                                            <i class="fas fa-clipboard-list" style="font-size: 48px; color: #d1d5db; margin-bottom: 15px;"></i>
                                            <h5 style="font-size: 18px; color: #333; margin-bottom: 10px; font-weight: 600;">
                                                No Job Applications Found</h5>
                                            <p style="color: #6c757d; margin-bottom: 20px; font-size: 14px;">You haven't applied to any jobs yet.</p>
                                            <a href="{{ route('jobs.index') }}"
                                                style="display: inline-block; padding: 8px 16px; background-color: #4361ee; color: white; text-decoration: none; border-radius: 4px; font-weight: 500; transition: all 0.3s ease;">
                                                Explore Jobs
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                </div>

                <!-- Pagination -->
                @if ($appliedJobs->hasPages())
                    <div style="padding: 15px; border-top: 1px solid #eaedf2; text-align: right;">
                        {{ $appliedJobs->withQueryString()->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- ===== End of Main Wrapper Section ===== -->
@endsection
