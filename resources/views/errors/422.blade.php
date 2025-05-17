@extends('frontend.layouts.master')

@section('contents')

<!-- ===== Start of Page Expired Section ===== -->
<section class="ptb160" id="error-422">
    <div class="container text-center">
        <h2>422</h2>
        <h3 class="capitalize">Unprocessable Entity</h3>
        <p class="mt10">The request was understood but couldn't be processed.</p>
        <a href="{{ url()->previous() }}" class="btn btn-blue btn-effect mt20">Try Again</a>
    </div>
</section>

<!-- ===== End of Page Expired Section ===== -->



@endsection
