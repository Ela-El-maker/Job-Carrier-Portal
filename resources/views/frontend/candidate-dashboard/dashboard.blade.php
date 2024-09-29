@extends('frontend.layouts.master')
@section('contents')
@php
$completionPercentage = getCandidateProfileCompletion();
@endphp
<!-- CSS for styling the layout -->
<style>
    .card__profile-image {
        text-align: center;
    }

    .profile-image {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
    }

    .edit-profile-btn {
        display: block;
        margin: 10px auto;
        padding: 5px 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .edit-profile-btn:hover {
        background-color: #0056b3;
    }

    /* Styling for the warning card */
    .warning-card {
        flex-grow: 1;
        background-color: #ffcc00;
        color: #333;
        padding: 15px;
        border-radius: 8px;
        display: flex;
        align-items: center;
    }

    .warning-content {
        font-size: 16px;
    }

    .warning-content strong {
        font-size: 18px;
    }
</style>
    <!-- =============== Start of Page Header 1 Section =============== -->
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
    <!-- =============== End of Page Header 1 Section =============== -->


    <!-- ===== Start of Main Wrapper Section ===== -->
    <section class="search-jobs ptb80" id="version2">
        <div class="container">
            <!-- Start of Row -->
            <div class="row">
            @include('frontend.candidate-dashboard.sidebar')
                <!-- ===== Start of Job Post Main ===== -->
                <div class="col-md-8 col-xs-12 job-post-main">
                    <h4>Welcome John Doe!</h4>

                    <!-- Start of Job Post Wrapper -->
                    <div class="job-post-wrapper mt20">
                        <!-- Start of Row -->
                        <div class="row candidate-profile">
                            <!-- Start of Profile Description and Dashboard Cards -->
                            <div class="col-md-12 col-xs-12">
                                <!-- Card Container for Candidate Details -->
                                <div class="card-container">
                                    <!-- Card 1: Jobs Applied -->
                                    <div class="card">
                                        <div class="card__info">
                                            <div class="card__logo"><i class="fas fa-briefcase"></i>Jobs You Applied</div>
                                            <div class="card__number">
                                                <span class="card__digit-group">3</span>
                                            </div>
                                            <div class="card__valid-thru">Next Interview:</div>
                                            <div class="card__exp-date">September 10, 2024</div>
                                        </div>
                                        <div class="card__texture"></div>
                                    </div>
                                    <!-- Card 2: Interviews Scheduled -->
                                    <div class="card">
                                        <div class="card__info">
                                            <div class="card__logo"><i class="fas fa-briefcase"></i>Interviews Scheduled
                                            </div>
                                            <div class="card__number">
                                                <span class="card__digit-group">3</span>
                                            </div>
                                            <div class="card__valid-thru">Next Interview:</div>
                                            <div class="card__exp-date">September 10, 2024</div>
                                        </div>
                                        <div class="card__texture"></div>
                                    </div>
                                    <!-- Card 3: Profile Completeness -->
                                    @if ($completionPercentage < 100)
                                        <div class="card">
                                            <div class="card__info" style="display: flex; align-items: center; gap: 20px;">
                                                <!-- Profile Image Section -->
                                                <div class="card__profile-image">
                                                    <img src="{{ asset(auth()->user()->image) }}" alt="Profile Image"
                                                        class="profile-image">
                                                    <a href="{{ route('candidate.profile.index') }}" class="edit-profile-btn">Edit
                                                        Profile</a>

                                                </div>

                                                <!-- Warning Card Section -->
                                                <div class="warning-card">
                                                    <div class="warning-content">
                                                        <strong>Incomplete Profile</strong>
                                                        <p>Your profile details are only
                                                            <strong>{{ $completionPercentage }}%</strong> complete.
                                                            Please
                                                            update your profile to 100% for better visibility.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card__texture"></div>
                                        </div>
                                    @else
                                        <!-- Content to display if the profile is complete -->
                                    @endif
                                </div>
                                <!-- End of Card Container -->
                            </div>
                            <!-- End of Profile Description and Dashboard Cards -->
                        </div>
                        <!-- End of Row -->
                    </div>
                    <!-- End of Job Post Wrapper -->

                    <!-- Start of Pagination -->
                    <ul class="pagination list-inline text-center">
                        <li class="active"><a href="javascript:void(0)">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                    <!-- End of Pagination -->
                </div>
                <!-- ===== End of Job Post Main ===== -->
            </div>
        </div>
    </section>
    <!-- ===== End of Main Wrapper Section ===== -->

    <!-- ===== End of Main Wrapper Section ===== -->
@endsection
