@extends('frontend.layouts.master')
@section('contents')
    <style>
        .vertical-line {
            border-left: 2px solid #000;
            height: 100%;
            margin: 0 15px;
        }
    </style>
    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-header" id="find-candidate">
        <div class="container">

            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>find candidate ver. 2</h2>
                </div>
            </div>
            <!-- End of Page Title -->

            <!-- Start of Breadcrumb -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">home</a></li>
                        <li class="active">for employers</li>
                    </ul>
                </div>
            </div>
            <!-- End of Breadcrumb -->

        </div>
    </section>
    <!-- =============== End of Page Header 1 Section =============== -->

    <!-- ===== Start of Main Wrapper Section ===== -->
    <section class="find-candidate ptb80" id="version2">
        <div class="container">

            <!-- Start of Form -->
            <form class="row" action="#" method="get">

                <!-- Start of keywords input -->
                <div class="col-md-6 col-md-offset-2 col-sm-6 col-sm-offset-2 col-xs-8">
                    <label for="search-keywords">Keywords</label>
                    <input type="text" name="search-keywords" id="search-keywords" class="form-control"
                        placeholder="Keywords">
                </div>

                <!-- Start of submit input -->
                <div class="col-md-2 col-sm-2 col-xs-4">
                    <button type="submit" class="btn btn-blue btn-effect"><i class="fa fa-search"></i>search</button>
                </div>

            </form>
            <!-- End of Form -->


            <!-- Start of Row -->
            <div class="row mt60">

                <!-- Start of Candidate Main -->
                <div class="col-md-12 candidate-main">

                    <!-- Start of Candidates Wrapper -->
                    <div class="candidate-wrapper">

                        <!-- ===== Start of Single Candidate 1 ===== -->
                        @forelse ($candidates as $candidate)
                            <div class="single-candidate row shadow-hover" style="margin-bottom: 20px;">

                                <!-- Candidate Image -->
                                <div class="col-md-2 col-xs-3">
                                    <div class="candidate-img">
                                        <a href="{{ route('candidates.show', $candidate?->slug) }}">
                                            <img src="{{ asset($candidate?->image) }}" class="img-responsive"
                                                alt="">
                                        </a>
                                    </div>
                                </div>

                                <!-- Start of Candidate Name, Line & Skills -->
                                <div class="col-md-8 col-xs-6 ptb20">
                                    <div class="d-flex align-items-start" style="height: 100%;">

                                        <!-- Candidate Name and Status -->
                                        <div>
                                            <!-- Candidate Name -->
                                            <div class="candidate-name">
                                                <a href="{{ route('candidates.show', $candidate?->slug) }}">
                                                    <h5>{{ $candidate?->full_name }}</h5>
                                                </a>
                                            </div>

                                            <!-- Candidate Status -->
                                            @if ($candidate?->status === 'available')
                                                <p class="font-sm color-text-paragraph-2"><b>I am available.</b></p>
                                            @else
                                                <p class="font-sm color-text-paragraph-2"><b>I am not available.</b></p>
                                            @endif
                                        </div>

                                        <!-- Vertical Line (Pipe) -->
                                        <div class="vertical-line"
                                            style="border-left: 2px solid #000; height: 100%; margin: 0 15px;"></div>

                                        <!-- Skills -->
                                        <div class="skills">
                                            @foreach ($candidate->skills as $candidateSkill)
                                                @if ($loop->index <= 5)
                                                    <span
                                                        class="badge badge-secondary">{{ $candidateSkill->skill?->name }}</span>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Candidate Info -->
                                    <div class="candidate-info mt5">
                                        <ul class="list-inline">
                                            <li>
                                                <span><i class="fa fa-briefcase"></i>{{ $candidate?->title }}</span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-map-marker"></i>
                                                    {{ $candidate->candidateCity?->name ? '' . $candidate->candidateCity?->name : ' ' }}
                                                    {{ $candidate->candidateState?->name ? ', ' . $candidate->candidateState?->name : '' }}
                                                    {{ $candidate->candidateCountry?->name ? ', ' . $candidate->candidateCountry?->name : '' }}
                                                </span>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <!-- CTA -->
                                <div class="col-md-2 col-xs-3">
                                    <div class="candidate-cta ptb30">
                                        <a href="{{ route('candidates.show', $candidate?->slug) }}"
                                            class="btn btn-blue btn-small btn-effect">hire
                                            me</a>
                                    </div>
                                </div>

                            </div>
                        @empty
                            <div class="no-candidates text-center">
                                <h4>No candidates found!</h4>
                                <p>It seems like we don't have any candidates available at the moment.</p>
                            </div>
                        @endforelse
                        <!-- ===== End of Single Candidate 1 ===== -->

                    </div>
                    <!-- End of Candidates Wrapper -->

                    <!-- Start of Pagination -->
                    <div class="col-md-12 mt10">
                        <ul class="pagination list-inline text-center">
                            <li class="active"><a href="javascript:void(0)">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                    <!-- End of Pagination -->

                </div>
                <!-- End of Candidate Main -->

            </div>
            <!-- End of Row -->

        </div>
    </section>
    <!-- ===== End of Main Wrapper Section ===== -->
@endsection
