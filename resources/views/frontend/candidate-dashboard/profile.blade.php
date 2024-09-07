
@extends('frontend.layouts.master')
@section('contents')
    <!-- ===== Start of Candidate Profile Header Section ===== -->
    <section class="profile-header">
    </section>
    <!-- ===== End of Candidate Header Section ===== -->





    <!-- ===== Start of Main Wrapper Candidate Profile Section ===== -->
    <section class="pb80" id="candidate-profile2">
        <div class="container">

            <!-- Start of Row -->
            <div class="row candidate-profile">

                <!-- Start of Profile Picture -->
                <div class="col-md-12">
                    <div class="profile-photo">
                        <img src="{{ asset('frontend/assets/images/clients/client1.jpg') }}" class="img-responsive"
                            alt="">
                    </div>

                </div>
                <!-- End of Profile Picture -->


                <!-- Start of Profile Description -->
                <div class="col-md-6 col-xs-12 mt80">
                    <div class="profile-descr">

                        <!-- Profile Title -->
                        <div class="profile-title">
                            <h2 class="capitalize">john doe</h2>
                            <h5 class="pt10">Front-End Developer</h5>
                        </div>

                        <!-- Start of Social Media Buttons -->
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

                            <!-- Social Media -->
                            <li>
                                <a href="#" class="social-btn-roll instagram transparent">
                                    <div class="social-btn-roll-icons">
                                        <i class="social-btn-roll-icon fa fa-instagram"></i>
                                        <i class="social-btn-roll-icon fa fa-instagram"></i>
                                    </div>
                                </a>
                            </li>

                            <!-- Social Media -->
                            <li>
                                <a href="#" class="social-btn-roll linkedin transparent">
                                    <div class="social-btn-roll-icons">
                                        <i class="social-btn-roll-icon fa fa-linkedin"></i>
                                        <i class="social-btn-roll-icon fa fa-linkedin"></i>
                                    </div>
                                </a>
                            </li>

                        </ul>
                        <!-- End of Social Media Buttons -->

                        <!-- Profile Details -->
                        <div class="profile-details mt40">
                            <p>Front end developers use HTML, CSS, and JavaScript to code the website and web app designs
                                created by web designers. The code they write runs inside the user’s browser (as opposed to
                                a back end developer, whose code runs on the web server). Being also in charge of making
                                sure that there are no errors or bugs on the front end, as well as making sure that the
                                design appears as it’s supposed to across various platforms and browsers.</p>
                        </div>
                    </div>

                </div>
                <!-- End of Profile Description -->


                <!-- Start of Profile Info -->
                <div class="col-md-4 col-md-offset-2 col-xs-12 mt80">
                    <ul class="profile-info">
                        <li>
                            <i class="fa fa-map-marker"></i>
                            <span>New York, USA</span>
                        </li>

                        <li>
                            <i class="fa fa-globe"></i>
                            <a href="#">cariera.com</a>
                        </li>

                        <li>
                            <i class="fa fa-money"></i>
                            <span>$65 / hour</span>
                        </li>

                        <li>
                            <i class="fa fa-birthday-cake"></i>
                            <span>29 years-old</span>
                        </li>

                        <li>
                            <i class="fa fa-phone"></i>
                            <span>(+1) 123 456 7890</span>
                        </li>

                        <li>
                            <i class="fa fa-envelope"></i>
                            <a href="#">myemail@cariera.com</a>
                        </li>
                    </ul>
                </div>
                <!-- End of Profile Info -->

            </div>
            <!-- End of Row -->


            <!-- Start of Row -->
            <div class="row skills mt40">

                <div class="col-md-12 text-center">
                    <h3 class="pb40">My Skills</h3>
                </div>

                <!-- Start of Skill Bars Wrapper -->
                <div class="col-md-6 col-xs-12 mt20">
                    <!-- Start of Skill Bar -->
                    <div class="skillbar clearfix " data-percent="90%">
                        <div class="skillbar-title"><span>HTML5</span></div>
                        <div class="skillbar-bar"></div>
                        <div class="skill-bar-percent">90%</div>
                    </div>
                    <!-- End Skill Bar -->

                    <!-- Start of Skill Bar -->
                    <div class="skillbar clearfix " data-percent="85%">
                        <div class="skillbar-title"><span>CSS3</span></div>
                        <div class="skillbar-bar"></div>
                        <div class="skill-bar-percent">85%</div>
                    </div>
                    <!-- End Skill Bar -->

                    <!-- Start of Skill Bar -->
                    <div class="skillbar clearfix " data-percent="75%">
                        <div class="skillbar-title"><span>JavaScript</span></div>
                        <div class="skillbar-bar"></div>
                        <div class="skill-bar-percent">75%</div>
                    </div>
                    <!-- End Skill Bar -->
                </div>
                <!-- End of Skill Bars Wrapper -->


                <!-- Start of Skill Bars Wrapper -->
                <div class="col-md-6 col-xs-12 mt20">
                    <!-- Start of Skill Bar -->
                    <div class="skillbar clearfix " data-percent="75%">
                        <div class="skillbar-title"><span>PHP</span></div>
                        <div class="skillbar-bar"></div>
                        <div class="skill-bar-percent">75%</div>
                    </div>
                    <!-- End Skill Bar -->

                    <!-- Start of Skill Bar -->
                    <div class="skillbar clearfix " data-percent="65%">
                        <div class="skillbar-title"><span>MySql</span></div>
                        <div class="skillbar-bar"></div>
                        <div class="skill-bar-percent">65%</div>
                    </div>
                    <!-- End Skill Bar -->

                    <!-- Start of Skill Bar -->
                    <div class="skillbar clearfix " data-percent="65%">
                        <div class="skillbar-title"><span>Wordpress</span></div>
                        <div class="skillbar-bar"></div>
                        <div class="skill-bar-percent">65%</div>
                    </div>
                    <!-- End Skill Bar -->
                </div>
                <!-- End of Skill Bars Wrapper -->

            </div>
            <!-- End of Row -->

        </div>
    </section>
    <!-- ===== End of Candidate Profile Section ===== -->
@endsection

    {{-- <!-- ===== Start of Main Wrapper Candidate Dashboard Section ===== -->
    <section class="pb80" id="candidate-profile">
        <div class="container">
            <!-- Start of Row -->
            <div class="row candidate-profile">
                <!-- Start of Profile Description and Dashboard Cards -->
                <div class="col-md-9 col-xs-12">
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
                                <div class="card__logo"><i class="fas fa-briefcase"></i>Interviews Scheduled</div>
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
                                <div class="card__logo"><i class="fas fa-briefcase"></i>Profile Completeness</div>
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

            <!-- Start of Profile Picture and Basic Info -->
            <div class="col-md-9 col-xs-12">
                <!-- Profile Picture and Basic Info Card -->
                <div class="profile-card card">
                    <div class="card__info">
                        <div class="profile-content">
                            <div class="profile-picture">
                                <img src="{{ asset('default-uploads/avatar/pngwing.com(10).png') }}"
                                    alt="Candidate Profile Picture" class="img-responsive">
                            </div>
                            <div class="profile-details">
                                <h3 class="candidate-name">John Doe</h3>
                                <p class="candidate-title">Software Developer</p>
                                <p class="candidate-desc">Passionate software developer with 5 years of experience in
                                    building scalable applications and improving system performance. Looking for
                                    opportunities to leverage expertise in a dynamic team environment.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card__texture"></div>
                </div>
            </div>
            <!-- End of Profile Picture and Basic Info -->


        </div>
    </section>

    <!-- ===== End of Candidate Dashboard Section ===== --> --}}
