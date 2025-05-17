@extends('frontend.layouts.master')

@section('contents')

<!-- ===== Start of Page Expired Section ===== -->
<section class="ptb160" id="error-419">
    <div class="container">
        <div class="col-md-12 text-center">
            <h2>419</h2>
            <h3 class="capitalize">Page Expired</h3>
            <p class="mt10">Your session has expired. Please refresh the page and try again.</p>
            <a href="{{ url()->current() }}" class="btn btn-blue btn-effect mt20">Reload Page</a>
        </div>
    </div>
</section>
<!-- ===== End of Page Expired Section ===== -->



@endsection
