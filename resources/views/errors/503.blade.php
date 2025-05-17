@extends('frontend.layouts.master')

@section('contents')

<!-- ===== Start of Server Error Section ===== -->
<section class="ptb160" id="error-503">
    <div class="container text-center">
        <h2>503</h2>
        <h3 class="capitalize">Service Unavailable</h3>
        <p class="mt10">We’re down for maintenance. Please check back soon.</p>
        <a href="{{ url('/') }}" class="btn btn-blue btn-effect mt20">Back to Home</a>
    </div>
</section>

<!-- ===== End of Server Error Section ===== -->



@endsection
