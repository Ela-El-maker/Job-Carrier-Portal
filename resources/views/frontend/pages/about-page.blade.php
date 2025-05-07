@extends('frontend.layouts.master')
@section('contents')
<!-- =============== Start of Page Header 1 Section =============== -->
<section class="page-header">
    <div class="container">

        <!-- Start of Page Title -->
        <div class="row">
            <div class="col-md-12">
                <h2>about us</h2>
            </div>
        </div>
        <!-- End of Page Title -->

        <!-- Start of Breadcrumb -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">home</a></li>
                    <li class="active">About Us</li>
                </ul>
            </div>
        </div>
        <!-- End of Breadcrumb -->

    </div>
</section>
<!-- =============== End of Page Header 1 Section =============== -->
    <!-- ===== Start of About Us Section ===== -->
    <section class="about-us ptb80">
        <div class="container">
            <div class="row">

                <!-- Start of First Column -->
                <div class="col-md-6 col-xs-12">
                    <h3 class="text-blue">{{ $about?->title }}</h3>
                    <p class="pt30">
                        {!! $about?->description !!}
                    </p>

                </div>

                <!-- Start of Second Column -->
                <div class="col-md-6 col-xs-12">
                    @if ($about?->media_type === 'image' && $about?->media_path)
                        <img src="{{ asset($about->media_path) }}" alt="Section Image" class="img-fluid rounded shadow-sm"
                            style="max-height: 400px; object-fit: cover; width: 100%;">
                    @elseif ($about?->media_type === 'video' && $about?->media_path)
                        <div class="embed-responsive embed-responsive-16by9">
                            <video controls class="embed-responsive-item">
                                <source src="{{ asset($about->media_path) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    @endif
                </div>
                <!-- End of Second Column -->

            </div>
        </div>
    </section>
    <!-- ===== End of About Us Section ===== -->
    @include('frontend.home.sections.testimonial-section')
    @include('frontend.home.sections.latest-news-section')
@endsection
