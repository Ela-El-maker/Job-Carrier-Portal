@extends('frontend.portfolio.layouts.master')
@section('content')
    <div class='animation-block'></div>


    <!--==================================================
                                                     Sections
                                                    ===================================================-->
    <div class='sections'>

        <!--=====================================================
                                                        Main Section
                                                        =====================================================-->
        @include('frontend.portfolio.sections.main-section')


        <!--=====================================================
                                                                  About Section
                                                                ====================================================-->
        @include('frontend.portfolio.sections.about-section')


        <!--=====================================================
                                                                Resume Section
                                                                =====================================================-->
        @include('frontend.portfolio.sections.resume-section')


    </div>
@endsection
