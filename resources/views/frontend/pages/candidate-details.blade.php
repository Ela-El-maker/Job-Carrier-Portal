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
                        <hr>

                        <!-- Start of Social Media Buttons -->
                        <ul class="social-btns list-inline mt-4">
                            <!-- Portfolio -->
                            <li class="list-inline-item">
                                <a href="{{ $candidate?->portfolio?->website_url }}"
                                    class="social-btn-roll portfolio transparent" target="_blank">
                                    <div class="social-btn-roll-icons">
                                        <i class="social-btn-roll-icon fa fa-briefcase"></i>
                                        <i class="social-btn-roll-icon fa fa-briefcase"></i>
                                    </div>
                                </a>
                            </li>

                            <!-- Instagram -->
                            <li class="list-inline-item">
                                <a href="{{ $candidate?->portfolio?->instagram_url }}"
                                    class="social-btn-roll instagram transparent" target="_blank">
                                    <div class="social-btn-roll-icons">
                                        <i class="social-btn-roll-icon fa fa-instagram"></i>
                                        <i class="social-btn-roll-icon fa fa-instagram"></i>
                                    </div>
                                </a>
                            </li>

                            <!-- LinkedIn -->
                            <li class="list-inline-item">
                                <a href="{{ $candidate?->portfolio?->linkedin_url }}"
                                    class="social-btn-roll linkedin transparent" target="_blank">
                                    <div class="social-btn-roll-icons">
                                        <i class="social-btn-roll-icon fa fa-linkedin"></i>
                                        <i class="social-btn-roll-icon fa fa-linkedin"></i>
                                    </div>
                                </a>
                            </li>

                            <!-- GitHub -->
                            <li class="list-inline-item">
                                <a href="{{ $candidate?->portfolio?->github_url }}"
                                    class="social-btn-roll github transparent" target="_blank">
                                    <div class="social-btn-roll-icons">
                                        <i class="social-btn-roll-icon fa fa-github"></i>
                                        <i class="social-btn-roll-icon fa fa-github"></i>
                                    </div>
                                </a>
                            </li>

                            <!-- WhatsApp -->
                            <li class="list-inline-item">
                                <a href="{{ $candidate?->portfolio?->whatsapp_url }}"
                                    class="social-btn-roll whatsapp transparent" target="_blank">
                                    <div class="social-btn-roll-icons">
                                        <i class="social-btn-roll-icon fa fa-whatsapp"></i>
                                        <i class="social-btn-roll-icon fa fa-whatsapp"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- End of Social Media Buttons -->

                        <hr>
                        <!-- Profile Details -->
                        <div class="profile-details mt40">
                            {{-- <h5 class="capitalize">My Biography</h5> --}}
                            <br>
                            <p>{!! $candidate?->bio !!}</p>
                        </div>
                        <hr>

                        <div class="mt-4">
                            <a href="{{ route('candidates.portfolio.show', ['slug' => $candidate->slug]) }}"
                                class="btn btn-blue btn-effect" target="_blank">
                                <i class="fa fa-briefcase"></i> Visit Portfolio
                            </a>
                        </div>
                        <!-- Experience Section -->
                        {{-- <div class="profile-details mt40">
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
                        </div> --}}
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
    @include('frontend.home.sections.get-started-section')
@endsection
