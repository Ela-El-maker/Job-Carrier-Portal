@extends('frontend.layouts.master')

@section('contents')

<!-- ===== Start of Forbidden Section ===== -->
<section class="ptb160" id="error-402">
    <div class="container text-center">
        <h2>402</h2>
        <h3 class="capitalize">Payment Required</h3>
        <p class="mt10">This feature requires payment before use.</p>
        <a href="{{ url('/') }}" class="btn btn-blue btn-effect mt20">Back to Home</a>
    </div>
</section>

<!-- ===== End of Forbidden Section ===== -->



@endsection
