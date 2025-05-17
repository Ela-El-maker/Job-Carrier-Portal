@extends('frontend.layouts.master')
@section('contents')
    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-header">
        <div class="container">

            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>Package Pricing Plan</h2>
                </div>
            </div>
            <!-- End of Page Title -->

            <!-- Start of Breadcrumb -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">home</a></li>
                        <li class="active">Packages</li>
                    </ul>
                </div>
            </div>
            <!-- End of Breadcrumb -->

        </div>
    </section>
    <!-- =============== End of Page Header 1 Section =============== -->

    <!-- ===== Start of Pricing Tables Section ===== -->
    <section class="pricing-tables pb80">
        <div class="container">
            <!-- Start Row -->
            <div class="row">
                @foreach ($plans as $plan)
                    <!-- Start of Pricing Table -->
                    <div class="col-md-4 col-xs-12 mt80">
                        @if ($plan?->recommended)
                            <div class="pricing-table shadow-hover" id="popular">
                        @else
                            <div class="pricing-table shadow-hover" id="">
                        @endif

                        <!-- Pricing Header -->
                        <div class="pricing-header">
                            <h2>{{ $plan?->label }}</h2>
                        </div>

                        <!-- Pricing -->
                        <div class="pricing">
                            <span class="currency">$</span>
                            <span class="amount">{{ $plan?->price }}</span>
                            <span class="month">month</span>
                        </div>

                        <!-- Pricing Body -->
                        <div class="pricing-body">
                            <ul class="list">
                                <li>{{ $plan?->job_limit }} Job Postings</li>
                                <li>{{ $plan?->featured_job_limit }} Featured Jobs</li>
                                <li>{{ $plan?->highlight_job_limit }} Highlighted Jobs</li>
                                <li>{{ $plan?->golden_job }} Golden Jobs</li>
                                @if ($plan?->profile_verified)
                                    <li>Verified Profile</li>
                                @else
                                    <strike>Verified Profile</strike>
                                @endif
                            </ul>
                        </div>

                        <!-- Pricing Footer -->
                        <div class="pricing-footer">
                            <a href="{{ route('checkout.index', $plan?->id) }}" class="btn btn-blue btn-effect">
                                Get Started
                            </a>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
            <!-- End Row -->
        </div>
    </section>
    <!-- ===== End of Pricing Tables Section ===== -->

    <!-- ===== Start of Get Started Section ===== -->

    <!-- ===== End of Get Started Section ===== -->
@endsection
