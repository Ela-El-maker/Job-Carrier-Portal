@extends('frontend.layouts.master')
@section('contents')
    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-header">
        <div class="container">

            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>companies</h2>
                </div>
            </div>
            <!-- End of Page Title -->

            <!-- Start of Breadcrumb -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">home</a></li>
                        <li class="active">pages</li>
                    </ul>
                </div>
            </div>
            <!-- End of Breadcrumb -->

        </div>
    </section>
    <!-- =============== End of Page Header 1 Section =============== -->





    <!-- Start of Main Wrapper Companies Section -->
    <section class="ptb80" id="companies">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <!-- Start of Company Letters -->
                    <div class="company-letters">
                        @foreach (range('A', 'Z') as $letter)
                            <a href="#{{ $letter }}">{{ $letter }}</a>
                        @endforeach
                    </div>
                    <!-- End of Company Letters -->

                    <!-- Start of Companies -->
                    <div class="row companies-grid mt60">
                        @foreach (range('A', 'Z') as $letter)
                            <!-- Company Group -->
                            <div class="col-md-4 col-sm-6 col-xs-12 company-group">
                                <div id="{{ $letter }}" class="company-letter">
                                    <h4>{{ $letter }}</h4>
                                </div>

                                <!-- Companies -->
                                <ul class="nopadding">
                                    @forelse($companies[$letter] ?? [] as $company)
                                        <li class="company-name">
                                            <a href="{{ route('companies.show',$company?->slug) }}">
                                                {{ $company->name }} ({{ $company->jobs_count }})
                                            </a>
                                        </li>
                                    @empty
                                        <li class="company-name">
                                            No companies available under "{{ $letter }}".
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                        @endforeach
                    </div>
                    <!-- End of Companies -->

                </div>
            </div>
        </div>
    </section>

    <!-- ===== End of Main Wrapper Companies Section ===== -->




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
