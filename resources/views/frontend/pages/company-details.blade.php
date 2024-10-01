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

                <div class="col-md-6 col-xs-12">
                    <h3>Welcome to {{ $company?->name }}</h3>
                    <a href="#" class="btn btn-green btn-small btn-effect mt15">full time</a>
                </div>

                <div class="col-md-6 col-xs-12 clearfix">
                    <a href="javascript:;" onclick="document.getElementById('open-positions').scrollIntoView()"
                        class="btn btn-blue btn-effect pull-right mt15"><i class="fa fa-star"></i>Open Positions</a>
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
                            <h5>Our Location</h5>
                            <br>
                            <div class="embed-responsive embed-responsive-16by9">
                                {!! $company?->map_link !!}
                            </div>
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
                                {{ $company->companyCity?->name ? ', ' . $company->companyCity?->name : ' ' }}
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
                                    {{ $company->companyCity?->name ? ', ' . $company->companyCity?->name : ' ' }}
                                    {{ $company->companyState?->name ? ', ' . $company->companyState?->name : '' }}
                                    {{ $company->companyCountry?->name ? ', ' . $company->companyCountry?->name : '' }}
                                </span>
                            </li>
                            <hr>
                            <li>
                                <h5><i class="fa fa-link"
                                    aria-hidden="true"></i>Website:</h5>
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

                    </div>
                </div>
            </div>
            <!-- Start of Row -->
            <div class="row mt80" id="open-positions">
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
