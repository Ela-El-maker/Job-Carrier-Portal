@extends('frontend.layouts.master')

@section('contents')
    <!-- ===== Start of Forbidden Section ===== -->
    <section class="ptb160" id="error-401">
        <div class="container text-center">
            <h2>401</h2>
            <h3 class="capitalize">Unauthorized</h3>
            <p class="mt10">You need to be logged in to access this page.</p>
            <a href="{{ route('login') }}" class="btn btn-blue btn-effect mt20">Login</a>
        </div>
    </section>

    <!-- ===== End of Forbidden Section ===== -->
@endsection
