@extends('frontend.layouts.master')
@section('contents')
    <!-- =============== Start of Page Header Section =============== -->
    <section class="page-header">
        <div class="container">
            <!-- Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>Package Pricing Plan</h2>
                </div>
            </div>

            <!-- Breadcrumb -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="active">Checkout Packages</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- =============== End of Page Header Section =============== -->

    <!-- ===== Start of Checkout Section ===== -->
    <section class="section-box mt-90">
        <div class="container">
            <div class="row">
                <!-- Payment Methods Column -->
                <div class="col-md-8 col-xs-12">
                    <div class="payment-methods-wrapper">
                        <h4 class="payment-title">Choose Your Payment Method</h4>
                        <div class="row pt-40">
                            <!-- PayPal -->
                            <div class="col-md-6 col-xs-12 mb-4">
                                <a href="{{ route('company.paypal.payment') }}" class="payment-method-card">
                                    <img src="{{ asset('default-uploads/payment/paypal1.png') }}"
                                         alt="PayPal Payment"
                                         class="img-fluid payment-method-img">
                                </a>
                            </div>

                            <!-- M-Pesa -->
                            <div class="col-md-6 col-xs-12 mb-4">
                                <a href="{{ route('company.paypal.payment') }}" class="payment-method-card">
                                    <img src="{{ asset('default-uploads/payment/mpesa1.png') }}"
                                         alt="M-Pesa Payment"
                                         class="img-fluid payment-method-img">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pricing Summary Column -->
                <div class="col-md-4 col-xs-12">
                    <div class="pricing-summary-card shadow-hover">
                        <!-- Plan Header -->
                        <div class="pricing-header">
                            <h2>{{ $plan?->label }} Plan</h2>
                        </div>

                        <!-- Price -->
                        <div class="pricing">
                            <span class="currency">$</span>
                            <span class="amount">{{ $plan?->price }}</span>
                            <span class="month">/month</span>
                        </div>

                        <!-- Features List -->
                        <div class="pricing-body">
                            <ul class="features-list">
                                <li>{{ $plan?->job_limit }} Job Postings</li>
                                <li>{{ $plan?->featured_job_limit }} Featured Jobs</li>
                                <li>{{ $plan?->highlight_job_limit }} Highlighted Jobs</li>
                                <li>{{ $plan?->golden_job }} Golden Jobs</li>
                                <li>
                                    @if ($plan?->profile_verified)
                                        <i class="fas fa-check-circle text-success"></i> Verified Profile
                                    @else
                                        <i class="fas fa-times-circle text-muted"></i> <span class="text-muted">Verified Profile</span>
                                    @endif
                                </li>
                            </ul>
                        </div>

                        <!-- Action Button -->
                        <div class="pricing-footer">
                            <a href="{{ route('checkout.index', $plan?->id) }}"
                               class="btn btn-primary btn-block btn-effect">
                               Confirm & Pay
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===== End of Checkout Section ===== -->

    <!-- ===== Start of CTA Section ===== -->
    <section class="cta-section" style="background: #333; padding: 40px 0;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <h3 class="text-white mb-0">20,000+ People trust Cariera! Be one of them today.</h3>
                </div>
                <div class="col-md-2 col-sm-3 col-xs-12 text-right">
                    <a href="#" class="btn btn-success btn-lg cta-btn">
                        Get Started Now
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- ===== End of CTA Section ===== -->

    <style>
        /* Payment Method Styling */
        .payment-method-card {
            display: block;
            transition: all 0.3s ease;
        }

        .payment-method-img {
            border-radius: 5px;
            border: 3px solid #1ca774;
            max-width: 150px;
            height: 110px;
            object-fit: contain;
            padding: 10px;
            background: white;
        }

        .payment-method-card:hover {
            transform: translateY(-5px);
        }

        .payment-title {
            font-weight: 600;
            margin-bottom: 30px;
            color: #333;
        }

        /* Pricing Summary Card */
        .pricing-summary-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-top: 80px;
        }

        .pricing-header {
            background: #1ca774;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .pricing-header h2 {
            margin: 0;
            font-size: 22px;
        }

        .pricing {
            padding: 20px;
            text-align: center;
            background: #f9f9f9;
        }

        .amount {
            font-size: 36px;
            font-weight: 700;
        }

        .currency {
            font-size: 24px;
            vertical-align: top;
            margin-right: 5px;
        }

        .month {
            font-size: 16px;
            color: #777;
        }

        .features-list {
            padding: 20px;
            list-style: none;
        }

        .features-list li {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
        }

        .features-list li:last-child {
            border-bottom: none;
        }

        .pricing-footer {
            padding: 20px;
            text-align: center;
        }

        .btn-effect {
            transition: all 0.3s ease;
        }

        .btn-effect:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .cta-btn {
            border-radius: 20px;
            padding: 10px 20px;
            background-color: #1ca774;
            border: none;
        }
    </style>
@endsection
