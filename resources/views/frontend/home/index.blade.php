@extends('frontend.layouts.master')
@section('contents')
    <!-- ===== Start of Hero Page Title Section ===== -->
    @include('frontend.home.sections.hero-section')
    <!-- ===== End of Hero Page Title Section ===== -->

    <!-- ===== Start of Main Search Section ===== -->
    @include('frontend.home.sections.search-section')
    <!-- ===== End of Main Search Section ===== -->

    <!-- ===== Start of Popular Categories Section ===== -->
    @include('frontend.home.sections.popular-categories-section')
    <!-- ===== End of Popular Categories Section ===== -->

    <!-- ===== Start of Featured Categories Section ===== -->
    @include('frontend.home.sections.featured-categories-section')
    <!-- ===== End of Featured Categories Section ===== -->

    <!-- ===== Start of Signup & Video Section ===== -->
    @include('frontend.home.sections.signup-video-section')
    <!-- ===== End of Signup & Video Section ===== -->

    <!-- ===== Start of Top Companies ===== -->
    @include('frontend.home.sections.top-companies-section')
    <!-- ===== End of Top Companies ===== -->

    <!-- ===== Start of Job Post Section ===== -->
    @include('frontend.home.sections.job-post-section')
    <!-- ===== End of Job Post Section ===== -->

    <!-- ===== Start of CountUp Section ===== -->
    @include('frontend.home.sections.counter-up-section')
    <!-- ===== End of CountUp Section ===== -->

    <!-- ===== Start of Pricing Plan Section ===== -->
    @include('frontend.home.sections.package-plan-section')
    <!-- ===== End of Pricing Plan Section ===== -->

    <!-- ===== Start of Testimonial Section ===== -->
    @include('frontend.home.sections.testimonial-section')
    <!-- ===== End of Testimonial Section ===== -->

    <!-- ===== Start of Latest News Section ===== -->
    @include('frontend.home.sections.latest-news-section')
    <!-- ===== End of Latest News Section ===== -->

    <!-- ===== Start of Partners ===== -->
    @include('frontend.home.sections.partners-section')
    <!-- ===== End of Partners ===== -->
    <!-- ===== Start of Login Pop Up div ===== -->
    @include('frontend.home.sections.login-pop-up-section')
    <!-- cd-user-modal -->
    <!-- ===== End of Login Pop Up div ===== -->
@endsection
