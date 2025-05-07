@extends('frontend.layouts.master')
@section('contents')
    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-header">
        <div class="container">

            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $page?->page_name }}</h2>
                </div>
            </div>
            <!-- End of Page Title -->

            <!-- Start of Breadcrumb -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">home</a></li>
                        <li class="active">{{ $page?->page_name }}</li>
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

                {!! $page?->content !!}

            </div>
        </div>
    </section>
    <!-- ===== End of About Us Section ===== -->
@endsection
