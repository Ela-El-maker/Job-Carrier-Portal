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
                        <li class="active">Checkout Packages</li>
                    </ul>
                </div>
            </div>
            <!-- End of Breadcrumb -->
        </div>
    </section>
    <!-- =============== End of Page Header 1 Section =============== -->

    <section class="section-box mt-90">
        <div class="container">
            <div class="row">
                <!-- Image Cards -->
                <div class="col-md-8 col-xs-12 d-flex align-items-start flex-column">
                    <br>
                    <br>
                    <h4>Choose Your Payment Method</h4>
                    <div class="row pt-40">
                        <div class="col-md-6 col-xs-12 mb-4">
                            <a href="">
                                <img class="img-fluid" style="border-radius: 5px; border: 3px solid #1ca774; max-width: 150px; height: auto;"
                                     src="https://placehold.co/500x500" alt="Payment Method 1">
                            </a>
                        </div>
                        <div class="col-md-6 col-xs-12 mb-4">
                            <a href="">
                                <img class="img-fluid" style="border-radius: 5px; border: 3px solid #1ca774; max-width: 150px; height: auto;"
                                     src="https://placehold.co/500x500" alt="Payment Method 2">
                            </a>
                        </div>
                    </div>
                </div>

                       <!-- Pricing Table -->
            <div class="col-md-4 col-xs-12 mt80">
                <div class="pricing-table shadow-hover">
                    <!-- Pricing Header -->
                    <div class="pricing-header">
                        <h2>Premium Plan</h2>
                    </div>

                    <!-- Pricing -->
                    <div class="pricing">
                        <span class="currency">$</span>
                        <span class="amount">29</span>
                        <span class="month">month</span>
                    </div>

                    <!-- Pricing Body -->
                    <div class="pricing-body">
                        <ul class="list">
                            <li>10 Job Limits</li>
                            <li>5 Featured Job Limits</li>
                            <li>3 Highlight Job Limits</li>
                            <li>Verified Profile</li>
                        </ul>
                    </div>

                    <!-- Pricing Footer -->
                    <div class="pricing-footer">
                        <a href="#" class="btn btn-blue btn-effect">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ===== End of Pricing Tables Section ===== -->


    <!-- ===== Start of Get Started Section ===== -->
    <section class="get-started ptb40">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <h3 class="text-white">20,000+ People trust Cariera! Be one of them today.</h3>
                </div>
                <div class="col-md-2 col-sm-3 col-xs-12">
                    <a href="#" class="btn btn-blue btn-effect">Get Started Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ===== End of Get Started Section ===== -->
@endsection
