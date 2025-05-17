@extends('frontend.layouts.master')

@section('contents')

<!-- ===== Start of Page not Found Section ===== -->
<section class="ptb160" id="page-not-found2">
    <div class="container">
        <div class="col-md-12 text-center">
            <h2>404</h2>
            <h3 class="capitalize">Oops! The page you're looking for doesn't exist.</h3>
            <p class="mt10">It might have been moved or deleted. Please check the URL or return to the homepage.</p>
            <a href="{{ url('/') }}" class="btn btn-blue btn-effect mt20">Back to Home</a>
        </div>
    </div>
</section>
<!-- ===== End of Page not Found Section ===== -->


@endsection
