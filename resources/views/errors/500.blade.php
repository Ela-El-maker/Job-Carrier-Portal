@extends('frontend.layouts.master')

@section('contents')

<!-- ===== Start of Server Error Section ===== -->
<section class="ptb160" id="error-500">
    <div class="container">
        <div class="col-md-12 text-center">
            <h2>500</h2>
            <h3 class="capitalize">Internal Server Error</h3>
            <p class="mt10">Something went wrong on our end. We're working on it.</p>
            <a href="{{ url('/') }}" class="btn btn-blue btn-effect mt20">Back to Home</a>
        </div>
    </div>
</section>
<!-- ===== End of Server Error Section ===== -->



@endsection
