
@extends('frontend.layouts.master')
@section('contents')

 <!-- =============== Start of Page Header 1 Section =============== -->
 <section class="page-header">
    <div class="container">

        <!-- Start of Page Title -->
        <div class="row">
            <div class="col-md-12">
                <h2>Forgot password</h2>
            </div>
        </div>
        <!-- End of Page Title -->

        <!-- Start of Breadcrumb -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">home</a></li>
                    <li class="active">pages</li>
                </ul>
            </div>
        </div>
        <!-- End of Breadcrumb -->

    </div>
</section>
<!-- =============== End of Page Header 1 Section =============== -->





<!-- ===== Start of Login - Register Section ===== -->
<section class="ptb80" id="login">
    <div class="container">
        <div class="col-md-6 col-md-offset-3 col-xs-12">

            <!-- Start of Login Box -->
            <div class="login-box">

                <div class="login-title">
                    <h4>Forgot password</h4>
                </div>

                <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
          <!-- Form Group -->
                    <div class="form-group">
                        <label>Enter Your Email</label>
                        <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}" placeholder="example@example.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Form Group -->
                    <div class="form-group text-center">
                        <button class="btn btn-blue btn-effect">send email</button>
                        <a href="{{ route('login') }}" class="btn btn-blue btn-effect">login</a>
                    </div>

                </form>
                <!-- End of Login Form -->
            </div>
            <!-- End of Login Box -->

        </div>
    </div>
</section>
<!-- ===== End of Login - Register Section ===== -->

@endsection
