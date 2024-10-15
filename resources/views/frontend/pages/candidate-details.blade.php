@extends('frontend.layouts.master')
@section('contents')
    <style>
        .steal {
            margin-top: 10px;
            /* Adjust the spacing as needed */
        }
    </style>
    <!-- ===== Start of Candidate Profile Header Section ===== -->
    <section class="profile-header"
        style="background-image: url('{{ asset($candidate?->image) }}'); background-size: cover; background-position: center;">
        <!-- Your content here -->

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
                        <img src="{{ asset($candidate?->image) }}" class="img-responsive" alt="">
                    </div>

                </div>
                <!-- End of Profile Picture -->


                <!-- Start of Profile Description -->
                <div class="col-md-6 col-xs-12 mt80">
                    <div class="profile-descr">

                        <!-- Profile Title -->
                        <div class="profile-title">
                            <div class="pull-left">
                                <h2 class="capitalize">{{ $candidate?->full_name }}</h2>
                                <h5 class="pt10">{{ $candidate?->title }}</h5>
                            </div>
                            <!-- CV Download Button -->
                            <div class="pull-right">
                                @if ($candidate->cv)
                                    <a href="{{ asset($candidate?->cv) }}" class="btn btn-success" download>
                                        <i class="fa fa-download" aria-hidden="true"></i>
                                        Download CV
                                    </a>
                                @endif
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <!-- Start of Social Media Buttons -->
                        <ul class="social-btns list-inline mt20">
                            <!-- Social Media Buttons -->
                            <li><a href="#" class="social-btn-roll facebook transparent">
                                    <div class="social-btn-roll-icons"><i class="social-btn-roll-icon fa fa-facebook"></i><i
                                            class="social-btn-roll-icon fa fa-facebook"></i></div>
                                </a></li>
                            <li><a href="#" class="social-btn-roll twitter transparent">
                                    <div class="social-btn-roll-icons"><i class="social-btn-roll-icon fa fa-twitter"></i><i
                                            class="social-btn-roll-icon fa fa-twitter"></i></div>
                                </a></li>
                            <li><a href="#" class="social-btn-roll google-plus transparent">
                                    <div class="social-btn-roll-icons"><i
                                            class="social-btn-roll-icon fa fa-google-plus"></i><i
                                            class="social-btn-roll-icon fa fa-google-plus"></i></div>
                                </a></li>
                            <li><a href="#" class="social-btn-roll instagram transparent">
                                    <div class="social-btn-roll-icons"><i
                                            class="social-btn-roll-icon fa fa-instagram"></i><i
                                            class="social-btn-roll-icon fa fa-instagram"></i></div>
                                </a></li>
                            <li><a href="#" class="social-btn-roll linkedin transparent">
                                    <div class="social-btn-roll-icons"><i class="social-btn-roll-icon fa fa-linkedin"></i><i
                                            class="social-btn-roll-icon fa fa-linkedin"></i></div>
                                </a></li>
                        </ul>
                        <!-- End of Social Media Buttons -->
                        <hr>
                        <!-- Profile Details -->
                        <div class="profile-details mt40">
                            <h5 class="capitalize">My Biography</h5>
                            <br>
                            <p>{!! $candidate?->bio !!}</p>
                        </div>
                        <hr>

                        <!-- Experience Section -->
                        <div class="profile-details mt40">
                            <div class="mt-5 mb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Experience</h4>
                                        <ul class="timeline">
                                            @foreach ($candidate->experiences as $experience)
                                                <li class="d-flex justify-content-between align-items-start">
                                                    <div>
                                                        <a href="javascript:;">{{ $experience?->designation }}</a> |
                                                        <span>{{ $experience?->department }}</span>
                                                        <p class="steal">{{ $experience?->company }}</p>
                                                        <p>{!! $experience?->responsibilities !!}</p>
                                                    </div>
                                                    <div class="text-right">
                                                        <a href="#">{{ formatDate($experience?->start) }} -
                                                            {{ $experience?->currently_working ? 'Currently' : formatDate($experience?->end) }}</a>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <hr>

                                <!-- Education Section -->
                                <div class="row">
                                    <div class="col-md-12 mt-4">
                                        <h4>Education</h4>
                                        <ul class="timeline">
                                            @foreach ($candidate->educations as $education)
                                                <li class="d-flex justify-content-between align-items-start">
                                                    <div>
                                                        <a href="javascript:void(0);">{{ $education?->level }}</a>
                                                        <p class="steal">{{ $education?->degree }}</p>
                                                        <p>{!! $education?->note !!}</p>
                                                    </div>
                                                    <div class="text-right">
                                                        <a href="#">{{ formatDate($education?->year) }}</a>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Profile Description -->



                <!-- Start of Profile Info -->
                <div class="col-md-4 col-md-offset-2 col-xs-12 mt80">
                    <ul class="profile-info">
                        <h5 class="capitalize align-items-center">Overview</h5>
                        <hr>
                        <li>
                            <i class="fa fa-map-marker"></i>
                            <span>
                                {{ $candidate?->address }}
                                {{ $candidate->candidateCity?->name ? ' ' . $candidate->candidateCity?->name : ' ' }}
                                {{ $candidate->candidateState?->name ? ', ' . $candidate->candidateState?->name : '' }}
                                {{ $candidate->candidateCountry?->name ? ', ' . $candidate->candidateCountry?->name : '' }}
                            </span>
                        </li>
                        <hr>
                        <li>
                            <i class="fa fa-address-card" aria-hidden="true"></i>
                            <span>{{ $candidate->profession?->name }}</span>
                        </li>

                        <li>
                            <i class="fa fa-briefcase"></i>
                            <span>{{ $candidate->experience?->name }} Experience</span>
                        </li>

                        <li>
                            <i class="fa fa-sliders" aria-hidden="true"></i>
                            <span><strong>
                                    @foreach ($candidate->skills as $candidateSkill)
                                        <p class="label label-success text-light ">{{ $candidateSkill->skill?->name }}</p>
                                    @endforeach
                                </strong></span>
                        </li>

                        <li>
                            <i class="fa fa-language" aria-hidden="true"></i>
                            <span><strong>
                                    @foreach ($candidate->languages as $candidateLanguage)
                                        <p class="badge bg-secondary text-light ">
                                            {{ $candidateLanguage->language?->name }}</p>
                                    @endforeach
                                </strong></span>
                        </li>

                        <li>
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                            <span>{{ $candidate?->gender }}</span>
                        </li>

                        <li>
                            <i class="fa fa-user-o" aria-hidden="true"></i>
                            <span>{{ $candidate?->marital_status }}</span>
                        </li>


                        <li>
                            <i class="fa fa-globe"></i>
                            <a href="{{ $candidate?->website }}">{{ $candidate?->website }}</a>
                        </li>


                        <li>
                            <i class="fa fa-birthday-cake"></i>
                            <span>{{ formatDate($candidate?->birth_date) }}</span>
                        </li>


                        <li>
                            <i class="fa fa-phone-square" aria-hidden="true"></i>
                            <span>{{ $candidate?->phone_one }}</span>
                        </li>
                        <li>
                            <i class="fa fa-phone"></i>
                            <span>{{ $candidate?->phone_two }}</span>
                        </li>

                        <li>
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:{{ $candidate?->email }}">{{ $candidate?->email }}</a>
                        </li>
                    </ul>

                    <div class="mt20">
                        <a href="mailto:{{ $candidate?->email }}" class="btn btn-blue btn-effect"><i
                                class="fa fa-envelope"></i> Message</a>
                    </div>
                </div>
                <!-- End of Profile Info -->

            </div>
            <!-- End of Row -->
        </div>
    </section>
    <!-- ===== End of Candidate Profile Section ===== -->





    <!-- ===== Start of Portfolio Section ===== -->
    <section class="portfolio ptb80">
        <div class="container">

            <div class="row">
                <h3 class="text-center pb60">Recent Work</h3>

                <!-- Filter Buttons -->
                <ul class="list-inline text-center uppercase" id="portfolio-sorting">
                    <li><a href="#0" data-filter="*" class="current">all</a></li>
                    <li><a href="#0" data-filter=".portfolio-cat1">logos</a></li>
                    <li><a href="#0" data-filter=".portfolio-cat2">websites</a></li>
                    <li><a href="#0" data-filter=".portfolio-cat3">ui</a></li>
                    <li><a href="#0" data-filter=".portfolio-cat4">printings</a></li>
                </ul>
            </div>

            <!-- Start of Portfolio Grid -->
            <div class="row portfolio-grid mt40">

                <!-- Portfolio Item -->
                <div class="element col-md-4 col-sm-6 col-xs-6 portfolio-cat1">
                    <figure>
                        <a href="images/portfolio/image1.jpg" class="hover-zoom">
                            <img src="images/portfolio/image1.jpg" class="img-responsive" alt="">
                        </a>
                    </figure>
                </div>

                <!-- Portfolio Item -->
                <div class="element col-md-4 col-sm-6 col-xs-6 portfolio-cat2">
                    <figure>
                        <a href="images/portfolio/image2.jpg" class="hover-zoom">
                            <img src="images/portfolio/image2.jpg" class="img-responsive" alt="">
                        </a>
                    </figure>
                </div>

                <!-- Portfolio Item -->
                <div class="element col-md-4 col-sm-6 col-xs-6 portfolio-cat3">
                    <figure>
                        <a href="images/portfolio/image3.jpg" class="hover-zoom">
                            <img src="images/portfolio/image3.jpg" class="img-responsive" alt="">
                        </a>
                    </figure>
                </div>

                <!-- Portfolio Item -->
                <div class="element col-md-4 col-sm-6 col-xs-6 portfolio-cat4">
                    <figure>
                        <a href="images/portfolio/image4.jpg" class="hover-zoom">
                            <img src="images/portfolio/image4.jpg" class="img-responsive" alt="">
                        </a>
                    </figure>
                </div>

                <!-- Portfolio Item -->
                <div class="element col-md-4 col-sm-6 col-xs-6 portfolio-cat1">
                    <figure>
                        <a href="images/portfolio/image5.jpg" class="hover-zoom">
                            <img src="images/portfolio/image5.jpg" class="img-responsive" alt="">
                        </a>
                    </figure>
                </div>

                <!-- Portfolio Item -->
                <div class="element col-md-4 col-sm-6 col-xs-6 portfolio-cat2">
                    <figure>
                        <a href="images/portfolio/image6.jpg" class="hover-zoom">
                            <img src="images/portfolio/image6.jpg" class="img-responsive" alt="">
                        </a>
                    </figure>
                </div>

            </div>
            <!-- End of Portfolio Grid -->

            <div class="row">
                <div class="col-md-12 text-center mt20">
                    <a href="#" class="btn btn-blue btn-effect">show more</a>
                </div>
            </div>

        </div>
    </section>
    <!-- ===== End of Portfolio Section ===== -->





    <!-- ===== Start of Education Section ===== -->
    <section class="education ptb80">
        <div class="container">

            <div class="col-md-12 text-center">
                <h3 class="pb60">Education</h3>
            </div>

            <!-- Start of Education Column -->
            <div class="col-md-12">
                <div class="item-block shadow-hover">

                    <!-- Start of Education Header -->
                    <div class="education-header clearfix">
                        <img src="images/companies/envato.svg" alt="">
                        <div>
                            <h4>Master <small>- Computer Science</small></h4>
                            <h5>Massachusetts Institute of Technology</h5>
                        </div>
                        <h6 class="time">2014 - 2016</h6>
                    </div>
                    <!-- End of Education Header -->

                    <!-- Start of Education Body -->
                    <div class="education-body">
                        <p>The mission of MIT is to advance knowledge and educate students in science, technology, and other
                            areas of scholarship that will best serve the nation and the world in the 21st century. The
                            Institute is committed to generating, disseminating, and preserving knowledge, and to working
                            with others to bring this knowledge to bear on the world's great challenges.</p>
                    </div>
                    <!-- End of Education Body -->

                </div>
            </div>
            <!-- End of Education Column -->


            <!-- Start of Education Column -->
            <div class="col-md-12 mt40">
                <div class="item-block shadow-hover">

                    <!-- Start of Education Header -->
                    <div class="education-header clearfix">
                        <img src="images/companies/envato.svg" alt="">
                        <div>
                            <h4>Bachelor <small>- Computer Science</small></h4>
                            <h5>Massachusetts Institute of Technology</h5>
                        </div>
                        <h6 class="time">2009 - 2013</h6>
                    </div>
                    <!-- End of Education Header -->

                    <!-- Start of Education Body -->
                    <div class="education-body">
                        <p>The mission of MIT is to advance knowledge and educate students in science, technology, and other
                            areas of scholarship that will best serve the nation and the world in the 21st century. The
                            Institute is committed to generating, disseminating, and preserving knowledge, and to working
                            with others to bring this knowledge to bear on the world's great challenges.</p>
                    </div>
                    <!-- End of Education Body -->

                </div>
            </div>
            <!-- End of Education Column -->

        </div>
    </section>
    <!-- ===== End of Education Section ===== -->





    <!-- ===== Start of Work Experience Section ===== -->
    <section class="work-experience ptb80">
        <div class="container">

            <div class="col-md-12 text-center">
                <h3 class="pb60">Work Experience</h3>
            </div>

            <!-- Start of Work Experience Column -->
            <div class="col-md-12">
                <div class="item-block shadow-hover">

                    <!-- Start of Work Experience Header -->
                    <div class="experience-header clearfix">
                        <img src="images/companies/envato.svg" alt="">
                        <div>
                            <h4>Envato</h4>
                            <h5><small>Theme Developer</small></h5>
                        </div>
                        <h6 class="time">2014 - present</h6>
                    </div>
                    <!-- End of Work Experience Header -->

                    <!-- Start of Work Experience Body -->
                    <div class="experience-body">
                        <p>Responsibilities:</p>
                        <ul class="list mt10">
                            <li>Designing modern and minimal PSD Templates</li>

                            <li>Converting PSD into HTML5 & CSS3</li>

                            <li>WordPress Theme Development</li>

                            <li>Troubleshooting, testing and maintaining web Themes</li>
                        </ul>
                    </div>
                    <!-- End of Work Experience Body -->

                </div>
            </div>
            <!-- End of Work Experience Column -->


            <!-- Start of Work Experience Column -->
            <div class="col-md-12 mt40">
                <div class="item-block shadow-hover">

                    <!-- Start of Work Experience Header -->
                    <div class="experience-header clearfix">
                        <img src="images/companies/envato.svg" alt="">
                        <div>
                            <h4>Envato</h4>
                            <h5><small>Theme Developer</small></h5>
                        </div>
                        <h6 class="time">2010 - 2014</h6>
                    </div>
                    <!-- End of Work Experience Header -->

                    <!-- Start of Work Experience Body -->
                    <div class="experience-body">
                        <p>Responsibilities:</p>
                        <ul class="list mt10">
                            <li>Designing modern and minimal PSD Templates</li>

                            <li>Converting PSD into HTML5 & CSS3</li>
                        </ul>
                    </div>
                    <!-- End of Work Experience Body -->

                </div>
            </div>
            <!-- End of Work Experience Column -->

        </div>
    </section>
    <!-- ===== End of Work Experience Section ===== -->





<!-- ===== Start of Get Started Section ===== -->
<section class="get-started" style="background: #333; padding: 40px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-sm-9 col-xs-12">
                <h3 class="text-white">20,000+ People trust Cariera! Be one of them today.</h3>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-12 text-right">
                <a href="#" class="btn btn-success btn-lg"
                   style="border-radius: 20px; padding: 10px 20px; background-color: #1ca774;">
                   Get Started Now
                </a>
            </div>
        </div>
    </div>
</section>
<!-- ===== End of Get Started Section ===== -->
@endsection
