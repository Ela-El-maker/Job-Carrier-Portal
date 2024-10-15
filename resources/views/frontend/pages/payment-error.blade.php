@extends('frontend.layouts.master')
@section('contents')
    <!-- =============== Start of Page Header Section =============== -->
    <section class="page-header" style="background: linear-gradient(to bottom right, #0066ff, #33cc99); color: #fff; padding: 40px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Payment Status</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="breadcrumb" style="background: transparent; padding: 0; margin: 10px 0;">
                        <li><a href="{{ url('/') }}" style="color: #fff; text-decoration: underline;">Home</a></li>
                        <li class="active" style="color: #d4f0ff;">Errors</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- =============== End of Page Header Section =============== -->

    <!-- ===== Start of Payment Cancellation Section ===== -->
    <section class="pricing-tables" style="background-color: #f8f9fa; padding: 60px 0;">
        <div class="container">
            <div class="text-center" style="margin-bottom: 60px;">
                <h2>
                    <i class="fa fa-times-circle" style="font-size: 100px; color: #c51307;"></i>
                    <br>Your Payment Was Cancelled.
                </h2>

                @if (session('errors'))
                    <p class="alert alert-danger" style="width: 400px; margin: auto; margin-top: 20px;">
                        {{ session('errors')->first('error') }}
                    </p>
                @endif

                <a class="btn btn-primary btn-lg" href="{{ route('company.dashboard') }}"
                   style="border-radius: 25px; padding: 10px 30px; font-size: 18px; margin-top: 20px;">
                   Go to Dashboard
                </a>
            </div>
        </div>
    </section>
    <!-- ===== End of Payment Cancellation Section ===== -->
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
