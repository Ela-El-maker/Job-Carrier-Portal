@extends('frontend.layouts.master')
@section('contents')
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
                        <li class="active">Company Dashboard</li>
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
                @include('frontend.company-dashboard.sidebar')
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
                                    <div class="card">
                                        <div class="card__info">
                                            <div class="card__logo"><i class="fas fa-briefcase"></i>Profile Completeness
                                            </div>
                                            <div class="card__number">
                                                <span class="card__digit-group">85%</span>
                                            </div>
                                            <div class="card__valid-thru">Last Updated:</div>
                                            <div class="card__exp-date">August 20, 2024</div>
                                        </div>
                                        <div class="card__texture"></div>
                                    </div>
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
