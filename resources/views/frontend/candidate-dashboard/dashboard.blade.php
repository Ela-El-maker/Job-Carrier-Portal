@extends('frontend.layouts.master')
@section('contents')
    @php
        $completionPercentage = getCandidateProfileCompletion(); // Calculate completion percentage
    @endphp
    <!-- CSS for styling the layout -->
    <style>
        :root {
            --primary-color: #8e6cd4;
            /* Softer purple */
            --primary-hover-color: #7757c2;
            --warning-color: #ffefd5;
            /* Soft peach */
            --warning-text-color: #85586f;
            /* Muted plum */
            --success-color: #e6f7e6;
            /* Soft mint green */
            --success-text-color: #4c7155;
            --white-color: #ffffff;
            --card-shadow: 0 6px 15px rgba(0, 0, 0, 0.05);
            --border-radius: 12px;
            --font-main: 'Poppins', sans-serif;
            --card-bg: #fff;
            --text-color: #555;
            --heading-color: #444;
            --breadcrumb-bg: #f9f5ff;
        }

        /*
                                    body {
                                        font-family: var(--font-main);
                                        color: var(--text-color);
                                        background-color: #fcfaff;
                                    } */

        .page-header {
            background-color: var(--breadcrumb-bg);
            border-radius: 0 0 30px 30px;
            padding: 25px 0;
            margin-bottom: 40px;
            box-shadow: 0 4px 12px rgba(138, 110, 192, 0.06);
        }

        .page-header h2 {
            color: var(--heading-color);
            font-weight: 600;
            font-size: 28px;
            position: relative;
            display: inline-block;
        }

        .page-header h2:after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 40%;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color), transparent);
            border-radius: 10px;
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin-top: 10px;
        }

        .breadcrumb li a {
            color: var(--primary-color);
            font-weight: 500;
            transition: all 0.3s;
        }

        .breadcrumb li a:hover {
            color: var(--primary-hover-color);
            text-decoration: none;
        }

        .breadcrumb li.active {
            color: var(--text-color);
            font-weight: 500;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
            margin-top: 30px;
            margin-bottom: 40px;
        }

        /* Make the profile status card span full width */
        .profile-completeness-card {
            grid-column: 1 / -1;
            /* This makes it span the full width */
            margin-top: 10px;
        }

        .card {
            background-color: var(--card-bg);
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
            overflow: hidden;
            transition: all 0.3s ease;
            border: none;
            position: relative;
            height: 100%;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(142, 108, 212, 0.1);
        }

        .card__info {
            padding: 24px;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .card__logo {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--heading-color);
            display: flex;
            align-items: center;
        }

        .card__logo i {
            color: var(--primary-color);
            margin-right: 10px;
            font-size: 20px;
        }

        .card__number {
            font-size: 42px;
            font-weight: 700;
            color: var(--primary-color);
            margin: 15px 0;
        }

        .card__valid-thru {
            font-size: 14px;
            color: #888;
            margin-bottom: 5px;
        }

        .card__exp-date {
            font-size: 16px;
            font-weight: 600;
            color: var(--heading-color);
        }

        .card__texture {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #d4b8ff, #e9ddff, #d4b8ff);
            opacity: 0.8;
        }

        .profile-card-content {
            display: flex;
            flex-direction: row;
            align-items: center;
            width: 100%;
        }

        .card__profile-image {
            text-align: center;
            padding: 5px;
            flex-shrink: 0;
            width: 120px;
        }

        .profile-image {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #fff;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .profile-image:hover {
            transform: scale(1.05);
        }

        .edit-profile-btn {
            display: block;
            margin: 15px auto 5px;
            padding: 10px 20px;
            background-color: var(--primary-color);
            color: var(--white-color);
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            box-shadow: 0 4px 8px rgba(142, 108, 212, 0.2);
        }

        .edit-profile-btn:hover {
            background-color: var(--primary-hover-color);
            box-shadow: 0 6px 12px rgba(142, 108, 212, 0.3);
            text-decoration: none;
            color: var(--white-color);
        }

        /* Styling for the warning card */
        .warning-card {
            flex-grow: 1;
            background-color: var(--warning-color);
            color: var(--warning-text-color);
            padding: 20px;
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            margin-left: 20px;
        }

        .warning-card:before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.6) 0%, rgba(255, 255, 255, 0) 70%);
            opacity: 0.5;
        }

        .warning-content {
            font-size: 15px;
            position: relative;
            z-index: 1;
            width: 100%;
        }

        .warning-content strong {
            font-size: 18px;
            color: #85586f;
            display: block;
            margin-bottom: 8px;
        }

        .warning-content p {
            margin-bottom: 0;
            line-height: 1.5;
        }

        /* Success card styling */
        .success-card {
            flex-grow: 1;
            background-color: var(--success-color);
            color: var(--success-text-color);
            padding: 20px;
            border-radius: var(--border-radius);
            position: relative;
            overflow: hidden;
            margin-left: 20px;
        }

        .success-card:before {
            content: '';
            position: absolute;
            bottom: -20px;
            right: -20px;
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.8) 0%, rgba(255, 255, 255, 0) 70%);
        }

        .success-content {
            position: relative;
            z-index: 1;
            width: 100%;
        }

        .success-content strong {
            font-size: 20px;
            display: block;
            margin-bottom: 8px;
        }

        .success-content p {
            font-size: 16px;
            margin-bottom: 5px;
        }

        /* Welcome message styling */
        .welcome-message {
            position: relative;
            margin-bottom: 30px;
            padding-bottom: 15px;
        }

        .welcome-message h4 {
            font-size: 26px;
            font-weight: 600;
            color: var(--heading-color);
            margin-bottom: 10px;
        }

        .welcome-message:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color), transparent);
            border-radius: 3px;
        }

        /* Pagination styling */
        .pagination {
            margin-top: 40px;
        }

        .pagination li {
            display: inline-block;
            margin: 0 5px;
        }

        .pagination li a {
            display: block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            text-align: center;
            border-radius: 50%;
            color: var(--text-color);
            text-decoration: none;
            font-weight: 500;
            background-color: #f9f5ff;
            transition: all 0.3s ease;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .pagination li.active a,
        .pagination li a:hover {
            background-color: var(--primary-color);
            color: var(--white-color);
            box-shadow: 0 4px 10px rgba(142, 108, 212, 0.2);
        }

        /* Profile completeness visualization */
        .profile-completeness {
            width: 100%;
            height: 8px;
            background-color: #f1e8ff;
            border-radius: 10px;
            margin-top: 10px;
            overflow: hidden;
        }

        .profile-completeness-bar {
            height: 100%;
            border-radius: 10px;
            background: linear-gradient(90deg, #a589d9, #8e6cd4);
            transition: width 0.5s ease;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .card-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }

            .profile-card-content {
                flex-direction: column;
            }

            .warning-card,
            .success-card {
                margin-left: 0;
                margin-top: 15px;
            }
        }

        @media (max-width: 768px) {
            .card-container {
                grid-template-columns: 1fr;
            }

            .card__info {
                flex-direction: column;
                text-align: center;
            }

            .profile-card-content {
                flex-direction: column;
            }

            .warning-card,
            .success-card {
                margin-left: 0;
                margin-top: 15px;
            }

            .edit-profile-btn {
                width: 100%;
                max-width: 200px;
            }

            .page-header h2 {
                font-size: 24px;
            }
        }

        /* Add cute elements */
        .card:nth-child(1):before,
        .card:nth-child(2):before {
            content: '';
            position: absolute;
            top: 10px;
            right: 10px;
            width: 30px;
            height: 30px;
            background-size: contain;
            background-repeat: no-repeat;
            opacity: 0.3;
            z-index: 1;
        }

        .card:nth-child(1):before {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%238e6cd4'%3E%3Cpath d='M20 6h-3V4c0-1.103-.897-2-2-2H9c-1.103 0-2 .897-2 2v2H4c-1.103 0-2 .897-2 2v11c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V8c0-1.103-.897-2-2-2zm-5-2v2H9V4h6zM4 8h16v4h-3v-2h-2v2H9v-2H7v2H4V8zm0 11v-5h3v2h2v-2h6v2h2v-2h3v5H4z'%3E%3C/path%3E%3C/svg%3E");
        }

        .card:nth-child(2):before {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%238e6cd4'%3E%3Cpath d='M19 4h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm.001 16H5V8h14l.001 12z'%3E%3C/path%3E%3C/svg%3E");
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
                    <div class="welcome-message">
                        <h4>Welcome, {{ auth()->user()->name }}! <span style="font-size: 24px;">👋</span></h4>
                        <p>Your job search journey dashboard is ready. Track your progress and manage your career path here.
                        </p>
                    </div>

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
                                            <div class="card__logo"><i class="fas fa-calendar-check"></i>Interviews
                                                Scheduled
                                            </div>
                                            <div class="card__number">
                                                <span class="card__digit-group">3</span>
                                            </div>
                                            <div class="card__valid-thru">Next Interview:</div>
                                            <div class="card__exp-date">September 10, 2024</div>
                                        </div>
                                        <div class="card__texture"></div>
                                    </div>
                                    <!-- Card 3: Profile Completeness (Full Width) -->
                                    @php
                                        // Ensure $completionPercentage is defined and has a default value
                                        $completionPercentage = $completionPercentage ?? 0;
                                    @endphp

                                    @if ($completionPercentage < 100)
                                        <div class="card profile-completeness-card">
                                            <div class="card__info">
                                                <div class="profile-card-content">
                                                    <!-- Profile Image Section -->
                                                    <div class="card__profile-image">
                                                        <!-- Use a default placeholder image if the user's image is missing -->
                                                        <img src="{{ asset(auth()->user()?->candidateProfile?->image) ? asset($candidate?->image) : asset('images/default-profile.png') }}"
                                                            alt="Profile Image" class="profile-image">


                                                        <a href="{{ route('candidate.profile.index') }}"
                                                            class="edit-profile-btn">Edit Profile</a>
                                                    </div>


                                                    <!-- Warning Card Section -->
                                                    <div class="warning-card">
                                                        <div class="warning-content">
                                                            <strong>Profile in Progress <span
                                                                    style="font-size: 18px;">✏️</span></strong>
                                                            <p>Your profile is <strong>{{ $completionPercentage }}%</strong>
                                                                complete.
                                                                Let's get it to 100% for better visibility!</p>
                                                            <div class="profile-completeness">
                                                                <div class="profile-completeness-bar"
                                                                    style="width: {{ $completionPercentage }}%"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card__texture"></div>
                                        </div>
                                    @else
                                        <!-- Content to display if the profile is complete -->
                                        <div class="card profile-completeness-card">
                                            <div class="card__info">
                                                <div class="profile-card-content">
                                                    <!-- Profile Image Section -->
                                                    <div class="card__profile-image">
                                                        <img src="{{ auth()->user()->candidateProfile?->image }}"
                                                            alt="Profile Image" class="profile-image">
                                                        <a href="{{ route('candidate.profile.index') }}"
                                                            class="edit-profile-btn">View Profile</a>
                                                    </div>

                                                    <div class="success-card">
                                                        <div class="success-content">
                                                            <strong>Profile Complete! <span
                                                                    style="font-size: 18px;">🎉</span></strong>
                                                            <p>Your profile is 100% complete. You're all set for your dream
                                                                job!</p>
                                                            <div class="profile-completeness">
                                                                <div class="profile-completeness-bar" style="width: 100%">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card__texture"></div>
                                        </div>
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
@endsection
