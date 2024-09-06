@extends('frontend.layouts.master')
@section('contents')
    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-header">
        <div class="container">

            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>Login </h2>
                </div>
            </div>
            <!-- End of Page Title -->

            <!-- Start of Breadcrumb -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">home</a></li>
                        <li class="active">Login</li>
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
                        <h4>login</h4>
                    </div>
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <!-- Start of Login Form -->

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <!-- Form Group -->
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email"
                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                placeholder="example@example.com" value="{{ old('email') }}">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                        </div>


                        <!-- Password -->
                        <!-- Form Group -->
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="password" name="password"
                                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                placeholder="********">

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                        </div>
                        <!-- Remember Me -->
                        <!-- Form Group -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6">

                                    <input type="checkbox" id="remember_me" name="remember">
                                    <label for="remember-me2">Remember me?</label>

                                </div>



                                <div class="col-xs-6 text-right">
                                    <a href="{{ route('password.request') }}">Forgot password?</a>
                                </div>
                            </div>
                        </div>

                        <!-- Form Group -->
                        <div class="form-group text-center">
                            <button class="btn btn-blue btn-effect">Login</button>
                            <a href="{{ route('register') }}" class="btn btn-blue btn-effect">signup</a>
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
