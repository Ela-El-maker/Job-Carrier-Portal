@extends('frontend.layouts.master')

@section('contents')

<!-- ===== Start of Page not Found Section ===== -->
<section class="ptb160" id="error-405">
    <div class="container text-center">
        <h2>405</h2>
        <h3 class="capitalize">Method Not Allowed</h3>
        <p class="mt10">The request method is not supported for this route.</p>
        <a href="{{ url()->previous() }}" class="btn btn-blue btn-effect mt20">Go Back</a>
    </div>
</section>

<!-- ===== End of Page not Found Section ===== -->


@endsection
