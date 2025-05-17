@extends('frontend.layouts.master')

@section('contents')

<!-- ===== Start of Forbidden Section ===== -->
<section class="ptb160" id="error-403">
    <div class="container">
        <div class="col-md-12 text-center">
            <h2>403</h2>
            <h3 class="capitalize">Access Denied</h3>
            <p class="mt10">You don’t have permission to view this page.</p>
            <a href="{{ url()->previous() }}" class="btn btn-blue btn-effect mt20">Go Back</a>
        </div>
    </div>
</section>
<!-- ===== End of Forbidden Section ===== -->



@endsection
